<?php
/*
Plugin Name: RG Media Player
Description: A plugin for custom audio media using Soundcloud, MP3 or other media formats.
Version: 1.0.1
Author: rGenerator
Author URI: http://www.rgenerator.com/
License: GPL v2.0
*/

if ( ! function_exists( 'add_action' ) ) {
	_e( "Hi there! I'm just a plugin, not much I can do when called directly." );
	exit;
}

/* The Player
========================================================*/

	
	if ( ! defined( 'RG_LOCALE' ) )
			define( 'RG_LOCALE', '' );
		
	if ( ! defined( 'RG_MEDIA_DIR' ) )
		define( 'RG_MEDIA_DIR', get_template_directory(). '/inc/media' );

	if ( ! defined( 'RG_MEDIA_URL' ) )
		define( 'RG_MEDIA_URL', get_template_directory_uri(). '/inc/media' );
	
	add_action( 'wp_enqueue_scripts', 'rg_enqueue_audio_scripts' );
	add_action( 'init', 'rg_media_admin_options' );        

	function rg_media_player(){
		global $settings;

		$settings = get_option( 'rg_media_options' );

		$output = '<div id="media-block" class="'.$class.'clearfix">' . "\n";
		
		$imageID = rg_media_get_attachment_id_from_url( $settings['rg_cover'] );
		$image = wp_get_attachment_image_src($imageID, 'medium');
		$customImage = wp_get_attachment_image_src($imageID, 'spot-thumb');
		
		$expires = 0;
	    $flashPath = RG_MEDIA_URL . '/js/Jplayer.swf';
		
		if($settings['rg_soundcloud'] != ''){
		   $sc_user = 'https://api.soundcloud.com/users/'.$settings['rg_soundcloud'].'/tracks.json?client_id=08a753e12396eb6afcff3167f17ca1e4';
		   
		   if ( false === ( $json = get_transient( 'rg_sc_'.$settings['rg_soundcloud'] ) ) ) {
		      $json = file_get_contents($sc_user); 
		      set_transient( 'rg_sc_'.$settings['rg_soundcloud'], $json, $expires );
		   }
		   $data = json_decode($json, true);
		   
		   if( empty($data) )
		   	return;
		   
		   $sc_stream = array();
		
		   for($i = 0; $i < count($data); $i++) {
		   	$sc_title = $data[$i]['title'];
		      $stream_url = $data[$i]['stream_url'];
		      $sc_artwork = $data[$i]['artwork_url'];
		      $artwork = str_replace('large', 't300x300', $sc_artwork);

		 //   t500x500:     500×500
	     //   crop:         400×400
	     //   t300x300:     300×300
	     //   large:        100×100 (default)
	     //   t67x67:       67×67    (only on artworks)
	     //   badge:        47×47
	     //   small:        32×32
	     //   tiny:         20×20    (on artworks)
	     //   tiny:         18×18    (on avatars)
	     //   mini:         16×16
	     //   original:     (originally uploaded image)
		      
		      $sc_stream[] = array('sc_title' => $sc_title, 'sc_stream' => $stream_url, 'sc_artwork' => $artwork);
		   }
		   
		}
		
		// Some default css
		$output .= '<style type="text/css">';
		   	$output .= '
		   		@font-face {
		   		    font-family: "wordpress_surface_rgeneratoRg";
		   		    src: url("'.RG_MEDIA_URL.'/css/font/wordpress_surface_rgenerator-webfont.eot");
		   		    src: url("'.RG_MEDIA_URL.'/css/font/wordpress_surface_rgenerator-webfont.eot?#iefix") format("embedded-opentype"),
		   		         url("'.RG_MEDIA_URL.'/css/font/wordpress_surface_rgenerator-webfont.woff") format("woff"),
		   		         url("'.RG_MEDIA_URL.'/css/font/wordpress_surface_rgenerator-webfont.ttf") format("truetype"),
		   		         url("'.RG_MEDIA_URL.'/css/font/wordpress_surface_rgenerator-webfont.svg#wordpress_surface_rgeneratoRg") format("svg");
		   		    font-weight: normal;
		   		    font-style: normal;
		   		}
		   	';
		   	if($settings['rg_vertvolume'] == 'vertical'){
		   		$output .= '.jp-volume-bar { background: #000; position:relative; width: 10px; height: 200px; overflow: hidden; }
		   						.jp-volume-bar-value { position:absolute; bottom: 0; background: #911; width: 100%; }';
		   	} else {
		   		$output .= '.jp-volume-bar { background: #000; width: 200px; height: 10px; overflow: hidden; }
		   						.jp-volume-bar-value { background: #911; height: 10px; width: 100%; }';
		   	}
		   	$output .= '
		   	.jp-progress { background: #000; width: 200px; height: 15px; overflow: hidden; }
		   	.jp-seek-bar { background: #000; width: 0px; height: 100%; overflow: hidden; cursor: pointer; }
		   	.jp-play-bar { background: #911; width: 0px; height: 100%; overflow: hidden; }
		   	.jp-controls li { display: inline-block; }
		   	.jp-play, .jp-previous, .jp-pause, .jp-next { font: 40px/40px "wordpress_surface_rgeneratoRg", sans-serif; color: #911; text-decoration: none; }
		   	';
		$output .= '</style>';   

		/// The js
		$output .= '<script type="text/javascript">
	         (function($){
	         	$(document).ready(function(){
	         	         		
	      			new jPlayerPlaylist({
	      			   jPlayer: ".jp-player",
	      			   cssSelectorAncestor: ".jp-container"
	      			   }, [';
	      			   	if($settings['rg_soundcloud'] != ''){ 
		   						foreach($sc_stream as $sc):
		   							$output .= '{';
									   $sc_url = $sc['sc_stream'].'?client_id=08a753e12396eb6afcff3167f17ca1e4';
									   $idQuery = array();
									   $idQuery = get_headers($sc_url);
									   $sourceURL = explode(' ', $idQuery[9]);
									   $shortTitle = substr($sc['sc_title'], 0, 20) . '...';

		   							   $output .= 'title:"'.htmlentities($shortTitle).'",';
		   							   $output .= 'mp3: "'.$sourceURL[1].'",';
		   							   $output .= 'poster: "'.$sc['sc_artwork'].'"';
		   							$output .= '},';
		   						endforeach; 
		                } elseif($settings['rg_tracks'] != ''){
		                  	foreach($settings['rg_tracks'] as $tracks):
		                  			if($settings['rg_audio_format'] == 'flv' || $settings['rg_audio_format'] == 'rtmpa'):
		                  				$track_url = $tracks['rg_track_url'];
		   							   	$xml = simplexml_load_file($track_url);
		   							   	$url = $xml->choice->url;
		   							   	$tracks['rg_track_url'] = $url;
		   							endif;
		                  		$output .= '{';
		                  			$shortTitle = substr($tracks['rg_track_title'], 0, 20) . '...';
		                     		$output .= 'title:"'.htmlentities($shortTitle).'",';
		   							if($settings['rg_audio_format']){
		   								$count = count($settings['rg_audio_format']);
		   								foreach($settings['rg_audio_format'] as $key => $format):
		   									$output .= $format.':"'.$tracks['rg_track_url_'.$key].'",';
		   									//echo "<pre>"; print_r(implode(',', $settings['rg_audio_format'])); echo "</pre>";
		   								endforeach;
		   							}
		   							if($settings['rg_cover'] != ''){ $output .= 'poster: "'.$customImage[0].'"'; } else {} 
		                        $output .=  '},';
		                    endforeach;
		                } else { }
		   			$output .= '], {
	      			   	swfPath: "'.$flashPath.'",
	      			   	solution: "html, flash",
	      			   	preload: "metadata",';
	      			   	$output .= 'supplied: "'; 
		   					if($settings['rg_soundcloud'] != ''){
		   						$output .= 'mp3';
		   					} elseif($settings['rg_tracks'] != ''){
		   						$output .= implode(',', $settings['rg_audio_format']);
		   					}
	      			   	$output .= '",';
	      			   	$output .= 'volume: 0.9,
	      			   	wmode: "window",
	      			   	smoothPlayBar: true,
	      			   	keyEnabled: true,
	      			   	audioFullScreen: false,
                		loop: true,
	      			   	verticalVolume: '.( $settings['rg_vertvolume'] == 'vertical' ? "true" : "false" ).',';
	      			   
	      			  if($settings['rg_soundcloud'] != '' || $settings['rg_cover'] != ''){
	      			   $output .= 'size: {';
		   				   if($settings['rg_cover'] != ''){
		   				   	$output .= 'width: "'.$customImage[1].'",';
		   				   	$output .= 'height: "'.$customImage[2].'",';
		   				   } else { 
		   				   	$output .= 'width: "300px",';
		   				   	$output .= 'height: "300px",';
		   				   }
		   				   $output .= 'cssClass: "jp-container"';
		   				$output .= '},';
		   				}
		   			$output .= '});
	      			
	      			$("#jplayer_inspector").jPlayerInspector({ jPlayer:$(".jp-player") });
	         	});
	         })(jQuery)        			
	      </script>';      			
	      	
		$output .= '<div class="jp-player"></div>';
		$output .= '<div class="jp-container">';
	      $output .= '<div class="jp-gui">';
	      	if(!$settings['rg_volume']){
		   		$output .= '<div class="jp-volume-bar">';
		   		   $output .= '<div class="jp-volume-bar-value"></div>';
		   		$output .= '</div>';
	         }
	         $output .= '<ul class="jp-controls">';	         	
	      	   $output .= '<li><a href="" class="jp-play">1</a></li>';
	      	   $output .= '<li><a href="" class="jp-pause">2</a></li>';
	      	   $output .= '<li class="set"><a href="" class="jp-previous">3</a><a href="" class="jp-next">4</a></li>';
	        $output .= '</ul>';
	        if(!$settings['rg_progress']){
		   	  $output .= '<div class="jp-progress">';
		   	     $output .= '<div class="jp-seek-bar">';
		   	     		$output .= '<div class="jp-play-bar"></div>';
		   	     $output .= '</div>';
		   	  $output .= '</div>';
		     }
		     if(!$settings['rg_c_time'] || !$settings['rg_duration']){
		     		$output .= '<div class="jp-time">';
		     		 	if(!$settings['rg_c_time']){ $output .= '<div class="jp-current-time"></div>'; }
		     		 	if(!$settings['rg_duration']){ $output .= '<div class="jp-duration"></div>'; }
		     		$output .= '</div>';
		     }
	      $output .= '</div>';
	      $output .= '<div class="jp-playlist" style="'.(!$settings['rg_playlist'] ? 'display:block;' : 'display:none;').'">';
	        $output .= '<ul></ul>';
	      $output .= '</div>';
	      $output .= '
	      	<div class="jp-no-solution">
	         <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
	         </div>';
	   $output .= '</div>';

	   	if($settings['rg_officialsite']||$settings['rg_itunes']||$settings['rg_amazon']){
			$output .= '<ul class="buy-options">';
			if($settings['rg_officialsite']){
				$output .= '<li><a href="'.$settings['rg_officialsite'].'" target="_blank">Official Store</a></li>';
			}
			if($settings['rg_itunes']){
				$output .= '<li><a href="'.$settings['rg_itunes'].'" target="_blank">iTunes</a></li>';
			}
			if($settings['rg_amazon']){
				$output .= '<li><a href="'.$settings['rg_amazon'].'" target="_blank">Amazon</a></li>';
			}
			$output .= '</ul>';
		}
	   
	   $output .= '<div id="jplayer_inspector"><p></p></div>';
		
		$output .= "</div>\n";
		
		
		if($settings['rg_soundcloud'] != '' || $settings['rg_tracks'] != ''):
			return $output;
		else:
			return;
		endif;
	}//rg_media_player


	function rg_enqueue_audio_scripts() {
		if ( !is_admin() ) {
			wp_enqueue_script( 'custom-jplayer', RG_MEDIA_URL . '/js/jquery.jplayer.min.js', array('jquery'), '2.4.0', true);
			wp_enqueue_script( 'custom-playlist', RG_MEDIA_URL . '/js/jplayer.playlist.min.js', array('jquery'), '2.3.0', true);
			wp_enqueue_script( 'jPlayerInspector', 'http://www.jplayer.org/2.0.0/js/jquery.jplayer.inspector.js', array('jquery'), '2.0.0', true);
		}
	}      			
	      

	/* ADD ADMIN PANEL
	========================================================*/
	function rg_media_admin_options(){
		global $settings;
		require_once( RG_MEDIA_DIR . '/admin-panel.php' );

		$settings = get_option( 'rg_media_options' );
		$prefix = 'rg_';

		if($settings['rg_audio_format']){
			$format_options['title'] = array(
				'label' => 'Track Title',
				'id' => $prefix.'track_title',
				'type' => 'text',
				'width' => '70%'
			); 
	    	foreach($settings['rg_audio_format'] as $key => $format):
				$format_options[$key] = array(
					'label' => $format.' Track URL',
					'id' => $prefix.'track_url_'.$key,
					'type' => 'text',
					'width' => '70%'
				);
			endforeach;//format_options
		}
		//echo "<pre>"; print_r($format_options); echo "</pre>";
		$rg_media_fields = array(
			// AUDIO SELECT SECTION
			array(
				'id'	=> $prefix.'audio_options',
				'type'	=> 'section',
				'label' => __( 'Audio Type', RG_MEDIA_LOCALE )
			),
			array(
				'label'=> __( 'Audio Type', RG_MEDIA_LOCALE ),
				'desc'	=> sprintf( __( 'Select the type of audio player.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'type',
				'type'	=> 'select',
				'options' => array(
					'one' => array(
						'label' => 'Select One',
						'value'	=> ''
					),
					'two' => array(
						'label' => 'Soundcloud',
						'value'	=> 'soundclouduser'
					),
					'three' => array(
						'label' => 'Track URL',
						'value'	=> 'mp3url'
					)
				)
			),
			// SOUNDCLOUD SECTION
			array(
				'id'	=> $prefix.'soundcloud_options',
				'type'	=> 'section',
				'label' => __( 'Soundcloud Options', RG_MEDIA_LOCALE )
			),
			array(
				'label'   => __( 'Soundcloud Username', RG_MEDIA_LOCALE ),
				'desc'    => sprintf( __( '', RG_MEDIA_LOCALE )),
				'std'     => '',
				'id'	=> $prefix.'soundcloud',
				'type'	=> 'text'
			),
			// MP3 SECTION
			array(
				'id'	=> $prefix.'mp_options',
				'type'	=> 'section',
				'label' => __( 'MP3 Options', RG_MEDIA_LOCALE )
			),
			array(
				'label' => 'MP3 Album Cover',
			   'id' => $prefix.'cover',
			   'desc'	=> sprintf( __( 'Add a album image for the tracks. (Optional)', RG_MEDIA_LOCALE )),
			   'type'	=> 'image',
			),
			array(
			   	'label'	=> 'Format',
			   	'desc'	=> sprintf( __( 'Select the audio format.', RG_MEDIA_LOCALE )),
			   	'id'	=> $prefix.'audio_format',
			   	'type'	=> 'checkbox_group',
			   	'options' => array(
			   		'mp3' => array(
			   			'label' => 'MP3',
			   			'value'	=> 'mp3'
			   		),
			   		'oga' => array(
			   			'label' => 'OGA / OGV',
			   			'value'	=> 'oga'
			   		),
			   		'm4a' => array(
			   			'label' => 'M4A',
			   			'value'	=> 'm4a'
			   		),
			   		'flv' => array(
			   			'label' => 'FLA / FLV',
			   			'value'	=> 'flv'
			   		),
			   		'rtmpa' => array(
			   			'label' => 'RTMPA / RTMPV',
			   			'value'	=> 'rtmpa'
			   		),
			   		'wav' => array(
			   			'label' => 'WAV',
			   			'value'	=> 'wav'
			   		),
			   		'flac' => array(
			   			'label' => 'FLAC',
			   			'value'	=> 'flac'
			   		)
			   	)
			),
			array(
			   'label' => 'Tracks',
			   'id' => $prefix.'tracks',
			   'desc'	=> sprintf( __( 'Add a title and url for each track.', RG_MEDIA_LOCALE )),
			   'type'	=> 'repeatable',
			   'repeatable_fields' => $format_options
			),
			// BUY SECTION
			array(
				'id'	=> $prefix.'buy_options',
				'type'	=> 'section',
				'label' => __( 'Buy Options', RG_MEDIA_LOCALE )
			),
			array(
				'label'   => __( 'Official Store', RG_MEDIA_LOCALE ),
				'desc'    => sprintf( __( '', RG_MEDIA_LOCALE )),
				'std'     => '',
				'id'	=> $prefix.'officialsite',
				'type'	=> 'text'
			),
			array(
				'label'   => __( 'iTunes', RG_MEDIA_LOCALE ),
				'desc'    => sprintf( __( '', RG_MEDIA_LOCALE )),
				'std'     => '',
				'id'	=> $prefix.'itunes',
				'type'	=> 'text'
			),
			array(
				'label'   => __( 'Amazon', RG_MEDIA_LOCALE ),
				'desc'    => sprintf( __( '', RG_MEDIA_LOCALE )),
				'std'     => '',
				'id'	=> $prefix.'amazon',
				'type'	=> 'text'
			),
			// DISPLAY SECTION 
			array(
				'id'	=> $prefix.'display_options',
				'type'	=> 'section',
				'label' => __( 'Player Display Options', RG_MEDIA_LOCALE )
			),
			array(
				'label'	=> 'Volume',
				'desc'	=> sprintf( __( 'Check to disable volume bar.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'volume',
				'type'	=> 'checkbox'
			),
			array(
				'label'	=> 'Volume Type',
				'desc'	=> sprintf( __( 'Select the orientation of the volume bar. Default is Horizontal.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'vertvolume',
				'type'	=> 'select',
				'options' => array(
					'horizontal' => array(
						'label' => 'Horizontal Bar',
						'value'	=> 'horizontal'
					),
					'vertical' => array(
						'label' => 'Vertical Bar',
						'value'	=> 'vertical'
					)
				)
			),
			array(
				'label'	=> 'Progress Bar',
				'desc'	=> sprintf( __( 'Check to disable the progress bar.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'progress',
				'type'	=> 'checkbox'
			),
			array(
				'label'	=> 'Current Time',
				'desc'	=> sprintf( __( 'Check to disable current time.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'c_time',
				'type'	=> 'checkbox'
			),
			array(
				'label'	=> 'Duration Time',
				'desc'	=> sprintf( __( 'Check to disable the duration.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'duration',
				'type'	=> 'checkbox'
			),
			array(
				'label'	=> 'Playlist',
				'desc'	=> sprintf( __( 'Check to disable playlist.', RG_MEDIA_LOCALE )),
				'id'	=> $prefix.'playlist',
				'type'	=> 'checkbox'
			),
			array(
				'type'	=> 'section_end'
			)
		
		);
		
	}
?>