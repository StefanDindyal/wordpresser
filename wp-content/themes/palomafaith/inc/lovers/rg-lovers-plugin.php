<?php

	$prefix = 'rg_';

	$rg_lovers_fields = array(
		// About Lovers
		array(
			'id'	=> $prefix.'about_lovers',
			'type'	=> 'section',
			'label' => __( 'About Lovers')
		),
		array(
			'label'   => __( 'The Leader'),
			'desc'    => sprintf( __( 'Description of The Leader')),
			'std'     => '',
			'id'	=> $prefix.'disc_leader',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'The Lover'),
			'desc'    => sprintf( __( 'Description of The Lover')),
			'std'     => '',
			'id'	=> $prefix.'disc_lover',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'The Surgeon'),
			'desc'    => sprintf( __( 'Description of The Surgeon')),
			'std'     => '',
			'id'	=> $prefix.'disc_surgeon',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'The Stable Boy'),
			'desc'    => sprintf( __( 'Description of The Stable Boy')),
			'std'     => '',
			'id'	=> $prefix.'disc_boy',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'The Chauffeur'),
			'desc'    => sprintf( __( 'Description of The Chauffeur')),
			'std'     => '',
			'id'	=> $prefix.'disc_chauffeur',
			'width'  => '30%',
			'type'	=> 'textarea'
		),		
		// The Leader
		array(
			'id'	=> $prefix.'leader',
			'type'	=> 'section',
			'label' => __( 'The Leader')
		),
		array(
			'label'   => __( 'Passage Text'),
			'desc'    => sprintf( __( '')),
			'std'     => '',
			'id'	=> $prefix.'leader_passage',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		// The Lover
		array(
			'id'	=> $prefix.'lover',
			'type'	=> 'section',
			'label' => __( 'The Lover')
		),
		array(
		   'label' => 'The Lover Images',
		   'id' => $prefix.'love_images',
		   'desc'	=> sprintf( __( 'Upload Gallery Images.')),
		   'type'	=> 'repeatable',
		   'sanitizer' => array( // array of sanitizers with matching kets to next array
				'aimg' => 'sanitize_file_name'					
			),
		   'repeatable_fields' => array( // array of fields to be repeated				
				array(
					'label'	=> 'Image',
					'width'	=> '30%',
					'id'	=> 'limage',
					'type'	=> 'image'
				)
			)
		),
		// The Surgeon
		array(
			'id'	=> $prefix.'surgeon',
			'type'	=> 'section',
			'label' => __( 'The Surgeon')
		),
		array(
			'label'   => __( 'Passage Text'),
			'desc'    => sprintf( __( '')),
			'std'     => '',
			'id'	=> $prefix.'surgeon_passage',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		// The Stable Boy
		array(
			'id'	=> $prefix.'boy',
			'type'	=> 'section',
			'label' => __( 'The Stable Boy')
		),
		array(
			'label'   => __( 'Video URL'),
			'desc'    => sprintf( __( 'This field accepts YouTube and Vimeo URLs')),
			'std'     => '',
			'id'	=> $prefix.'boy_video',
			'width'  => '30%',
			'type'	=> 'text'
		),
		// The Chauffeur
		array(
			'id'	=> $prefix.'chauffeur',
			'type'	=> 'section',
			'label' => __( 'The Chauffeur')
		),
		array(
			'label'   => __( 'Meter Word'),
			'desc'    => sprintf( __( '')),
			'std'     => '',
			'id'	=> $prefix.'chau_word',
			'width'  => '30%',
			'type'	=> 'text'
		),
		array(
			'label'   => __( 'Meter Word After'),
			'desc'    => sprintf( __( '')),
			'std'     => '',
			'id'	=> $prefix.'chau_word_after',
			'width'  => '30%',
			'type'	=> 'text'
		)
	);

	$rg_landing_fields = array(
		// About Lovers
		array(
			'id'	=> $prefix.'about_lovers',
			'type'	=> 'section',
			'label' => __( 'Lovers Experience Box')
		),
		array(
			'label'   => __( 'Title Text'),
			'desc'    => sprintf( __( 'The heading of this box')),
			'std'     => '',
			'id'	=> $prefix.'title_love',
			'width'  => '30%',
			'type'	=> 'text'
		),
		array(
			'label'   => __( 'Description Text'),
			'desc'    => sprintf( __( 'Description of this section')),
			'std'     => '',
			'id'	=> $prefix.'disc_love',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'Button Text'),
			'desc'    => sprintf( __( 'Text that appears on the enter button for this section')),
			'std'     => '',
			'id'	=> $prefix.'btn_love',
			'width'  => '30%',
			'type'	=> 'text'
		),
		array(
			'id'	=> $prefix.'about_lovers',
			'type'	=> 'section',
			'label' => __( 'Main Site Box')
		),
		array(
			'label'   => __( 'Title Text'),
			'desc'    => sprintf( __( 'The heading of this box')),
			'std'     => '',
			'id'	=> $prefix.'title_full',
			'width'  => '30%',
			'type'	=> 'text'
		),
		array(
			'label'   => __( 'Description Text'),
			'desc'    => sprintf( __( 'Description of this section')),
			'std'     => '',
			'id'	=> $prefix.'disc_full',
			'width'  => '30%',
			'type'	=> 'textarea'
		),
		array(
			'label'   => __( 'Button Text'),
			'desc'    => sprintf( __( 'Text that appears on the enter button for this section')),
			'std'     => '',
			'id'	=> $prefix.'btn_full',
			'width'  => '30%',
			'type'	=> 'text'
		),
		array(
			'id'	=> $prefix.'about_lovers',
			'type'	=> 'section',
			'label' => __( 'Mobile Options')
		),
		array(
			'label'   => __( 'Choice Text'),
			'desc'    => sprintf( __( 'Choice copy below the door on mobile')),
			'std'     => '',
			'id'	=> $prefix.'disc_mob',
			'width'  => '30%',
			'type'	=> 'text'
		)
	);	
	
	$post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	$template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
	  // check for a template type
	if ($template_file == 'page-templates/lovers-page.php') {
		$rg_lovers_box = new custom_add_meta_box( 'lovers', 'Lovers Options', $rg_lovers_fields, 'page', true );
	}
	if ($template_file == 'page-templates/landing-page.php') {
		$rg_landing_box = new custom_add_meta_box( 'landing', 'Landing Page Options', $rg_landing_fields, 'page', true );
	}
?>