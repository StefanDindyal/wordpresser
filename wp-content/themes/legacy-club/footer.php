<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="footer" class="site-footer" role="contentinfo">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			<div class="site-info clearfix">
				<div class="cont">
					<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1>
					</a>
					<div class="legal">
						<span class="push">&copy; 2014 <a href="http://www.sonymusic.de/" target="_blank">Sony Music Entertainment Germany GMBH</a></span><p><a target="_blank" href="http://www.sonymusic.de/Datenschutz" class="external">DATENSCHUTZ</a><span>&nbsp;|&nbsp;</span><a target="_blank" href="http://www.sonymusic.de/Impressum" class="external">IMPRESSUM</a></p>
					</div>
				</div>				
				<div class="side">
					<?php wp_nav_menu( array( 'menu' => 'social_nav', 'menu_class' => 'social-menu' ) ); ?>
				</div>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #within -->
	</div><!-- #page -->
	<a href="#page" id="backup" class="hidetext">backup</a>
	<div class="hideform">
		<div class="news-form">
			<form name="Signup" signupform="true" action="https://subs.sonymusic.com/app/ly/signup" method="POST" onsubmit="return validateSignupForm(this)">
			<?php 
				$query = new WP_Query( 'pagename=newsletter' );
				if ( $query->have_posts() ) :		
					while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="inner">
						<div class="heading">
							<?php the_title(); ?>
							<a href="#" class="closer hidetext">Closer</a>
						</div>
						<div class="email-p">
							<div class="e-icon"></div>
							<div class="conter">
								<div class="whip">
									<div class="dank">Vielen Dank!</div>
									<?php the_content(); ?>
								</div>					
								
<div class="real">
   <!--  <div class="fields">    
	    <div class="name">
	    	<label for="firstname">Dein Name</label>
			<input type="text" name="firstname" id="firstname" value="" size="40" maxlength="40" class="break">
			<label for="email">Deine E-Mail Adresse</label>
			<input type="text" name="email" id="email" value="" size="40" maxlength="100">
			<label for="country">Dein Land</label>
			<select name="country" id="country" class="select big" size="1">
	        <option value="AF">Afghanistan</option>
	        <option value="AL">Albania</option>
	        <option value="DZ">Algeria</option>
	        <option value="AS">American Samoa</option>
	        <option value="AD">Andorra</option>
	        <option value="AO">Angola</option>
	        <option value="AI">Anguilla</option>
	        <option value="AQ">Antarctica</option>
	        <option value="AG">Antigua and Barbuda</option>
	        <option value="AR">Argentina</option>
	        <option value="AM">Armenia</option>
	        <option value="AW">Aruba</option>
	        <option value="AU">Australia</option>
	        <option value="AT">Austria</option>
	        <option value="AZ">Azerbaijan</option>
	        <option value="BS">Bahamas</option>
	        <option value="BH">Bahrain</option>
	        <option value="BD">Bangladesh</option>
	        <option value="BB">Barbados</option>
	        <option value="BY">Belarus</option>
	        <option value="BE">Belgium</option>
	        <option value="BZ">Belize</option>
	        <option value="BJ">Benin</option>
	        <option value="BM">Bermuda</option>
	        <option value="BT">Bhutan</option>
	        <option value="BO">Bolivia</option>
	        <option value="BA">Bosnia and Herzegovina</option>
	        <option value="BW">Botswana</option>
	        <option value="BV">Bouvet Island</option>
	        <option value="BR">Brazil</option>
	        <option value="BQ">British Antarctic Territory</option>
	        <option value="IO">British Indian Ocean Territory</option>
	        <option value="VG">British Virgin Islands</option>
	        <option value="BN">Brunei</option>
	        <option value="BG">Bulgaria</option>
	        <option value="BF">Burkina Faso</option>
	        <option value="BI">Burundi</option>
	        <option value="KH">Cambodia</option>
	        <option value="CM">Cameroon</option>
	        <option value="CA">Canada</option>
	        <option value="CT">Canton and Enderbury Islands</option>
	        <option value="CV">Cape Verde</option>
	        <option value="KY">Cayman Islands</option>
	        <option value="CF">Central African Republic</option>
	        <option value="TD">Chad</option>
	        <option value="CL">Chile</option>
	        <option value="CN">China</option>
	        <option value="CX">Christmas Island</option>
	        <option value="CC">Cocos [Keeling] Islands</option>
	        <option value="CO">Colombia</option>
	        <option value="KM">Comoros</option>
	        <option value="CG">Congo - Brazzaville</option>
	        <option value="CD">Congo - Kinshasa</option>
	        <option value="CK">Cook Islands</option>
	        <option value="CR">Costa Rica</option>
	        <option value="HR">Croatia</option>
	        <option value="CU">Cuba</option>
	        <option value="CY">Cyprus</option>
	        <option value="CZ">Czech Republic</option>
	        <option value="CI">C&ocirc;te d?Ivoire</option>
	        <option value="DK">Denmark</option>
	        <option value="DJ">Djibouti</option>
	        <option value="DM">Dominica</option>
	        <option value="DO">Dominican Republic</option>
	        <option value="NQ">Dronning Maud Land</option>
	        <option value="DD">East Germany</option>
	        <option value="EC">Ecuador</option>
	        <option value="EG">Egypt</option>
	        <option value="SV">El Salvador</option>
	        <option value="GQ">Equatorial Guinea</option>
	        <option value="ER">Eritrea</option>
	        <option value="EE">Estonia</option>
	        <option value="ET">Ethiopia</option>
	        <option value="FK">Falkland Islands</option>
	        <option value="FO">Faroe Islands</option>
	        <option value="FJ">Fiji</option>
	        <option value="FI">Finland</option>
	        <option value="FR">France</option>
	        <option value="GF">French Guiana</option>
	        <option value="PF">French Polynesia</option>
	        <option value="TF">French Southern Territories</option>
	        <option value="FQ">French Southern and Antarctic Territories</option>
	        <option value="GA">Gabon</option>
	        <option value="GM">Gambia</option>
	        <option value="GE">Georgia</option>
	        <option value="DE" selected="selected">Germany</option>
	        <option value="GH">Ghana</option>
	        <option value="GI">Gibraltar</option>
	        <option value="GR">Greece</option>
	        <option value="GL">Greenland</option>
	        <option value="GD">Grenada</option>
	        <option value="GP">Guadeloupe</option>
	        <option value="GU">Guam</option>
	        <option value="GT">Guatemala</option>
	        <option value="GG">Guernsey</option>
	        <option value="GN">Guinea</option>
	        <option value="GW">Guinea-Bissau</option>
	        <option value="GY">Guyana</option>
	        <option value="HT">Haiti</option>
	        <option value="HM">Heard Island and McDonald Islands</option>
	        <option value="HN">Honduras</option>
	        <option value="HK">Hong Kong SAR China</option>
	        <option value="HU">Hungary</option>
	        <option value="IS">Iceland</option>
	        <option value="IN">India</option>
	        <option value="ID">Indonesia</option>
	        <option value="IR">Iran</option>
	        <option value="IQ">Iraq</option>
	        <option value="IE">Ireland</option>
	        <option value="IM">Isle of Man</option>
	        <option value="IL">Israel</option>
	        <option value="IT">Italy</option>
	        <option value="JM">Jamaica</option>
	        <option value="JP">Japan</option>
	        <option value="JE">Jersey</option>
	        <option value="JT">Johnston Island</option>
	        <option value="JO">Jordan</option>
	        <option value="KZ">Kazakhstan</option>
	        <option value="KE">Kenya</option>
	        <option value="KI">Kiribati</option>
	        <option value="KW">Kuwait</option>
	        <option value="KG">Kyrgyzstan</option>
	        <option value="LA">Laos</option>
	        <option value="LV">Latvia</option>
	        <option value="LB">Lebanon</option>
	        <option value="LS">Lesotho</option>
	        <option value="LR">Liberia</option>
	        <option value="LY">Libya</option>
	        <option value="LI">Liechtenstein</option>
	        <option value="LT">Lithuania</option>
	        <option value="LU">Luxembourg</option>
	        <option value="MO">Macau SAR China</option>
	        <option value="MK">Macedonia</option>
	        <option value="MG">Madagascar</option>
	        <option value="MW">Malawi</option>
	        <option value="MY">Malaysia</option>
	        <option value="MV">Maldives</option>
	        <option value="ML">Mali</option>
	        <option value="MT">Malta</option>
	        <option value="MH">Marshall Islands</option>
	        <option value="MQ">Martinique</option>
	        <option value="MR">Mauritania</option>
	        <option value="MU">Mauritius</option>
	        <option value="YT">Mayotte</option>
	        <option value="FX">Metropolitan France</option>
	        <option value="MX">Mexico</option>
	        <option value="FM">Micronesia</option>
	        <option value="MI">Midway Islands</option>
	        <option value="MD">Moldova</option>
	        <option value="MC">Monaco</option>
	        <option value="MN">Mongolia</option>
	        <option value="ME">Montenegro</option>
	        <option value="MS">Montserrat</option>
	        <option value="MA">Morocco</option>
	        <option value="MZ">Mozambique</option>
	        <option value="MM">Myanmar [Burma]</option>
	        <option value="NA">Namibia</option>
	        <option value="NR">Nauru</option>
	        <option value="NP">Nepal</option>
	        <option value="NL">Netherlands</option>
	        <option value="AN">Netherlands Antilles</option>
	        <option value="NT">Neutral Zone</option>
	        <option value="NC">New Caledonia</option>
	        <option value="NZ">New Zealand</option>
	        <option value="NI">Nicaragua</option>
	        <option value="NE">Niger</option>
	        <option value="NG">Nigeria</option>
	        <option value="NU">Niue</option>
	        <option value="NF">Norfolk Island</option>
	        <option value="KP">North Korea</option>
	        <option value="VD">North Vietnam</option>
	        <option value="MP">Northern Mariana Islands</option>
	        <option value="NO">Norway</option>
	        <option value="OM">Oman</option>
	        <option value="PC">Pacific Islands Trust Territory</option>
	        <option value="PK">Pakistan</option>
	        <option value="PW">Palau</option>
	        <option value="PS">Palestinian Territories</option>
	        <option value="PA">Panama</option>
	        <option value="PZ">Panama Canal Zone</option>
	        <option value="PG">Papua New Guinea</option>
	        <option value="PY">Paraguay</option>
	        <option value="YD">People's Democratic Republic of Yemen</option>
	        <option value="PE">Peru</option>
	        <option value="PH">Philippines</option>
	        <option value="PN">Pitcairn Islands</option>
	        <option value="PL">Poland</option>
	        <option value="PT">Portugal</option>
	        <option value="PR">Puerto Rico</option>
	        <option value="QA">Qatar</option>
	        <option value="RO">Romania</option>
	        <option value="RU">Russia</option>
	        <option value="RW">Rwanda</option>
	        <option value="RE">R&eacute;union</option>
	        <option value="BL">Saint Barth&eacute;lemy</option>
	        <option value="SH">Saint Helena</option>
	        <option value="KN">Saint Kitts and Nevis</option>
	        <option value="LC">Saint Lucia</option>
	        <option value="MF">Saint Martin</option>
	        <option value="PM">Saint Pierre and Miquelon</option>
	        <option value="VC">Saint Vincent and the Grenadines</option>
	        <option value="WS">Samoa</option>
	        <option value="SM">San Marino</option>
	        <option value="SA">Saudi Arabia</option>
	        <option value="SN">Senegal</option>
	        <option value="RS">Serbia</option>
	        <option value="CS">Serbia and Montenegro</option>
	        <option value="SC">Seychelles</option>
	        <option value="SL">Sierra Leone</option>
	        <option value="SG">Singapore</option>
	        <option value="SK">Slovakia</option>
	        <option value="SI">Slovenia</option>
	        <option value="SB">Solomon Islands</option>
	        <option value="SO">Somalia</option>
	        <option value="ZA">South Africa</option>
	        <option value="GS">South Georgia and the South Sandwich Islands</option>
	        <option value="KR">South Korea</option>
	        <option value="ES">Spain</option>
	        <option value="LK">Sri Lanka</option>
	        <option value="SD">Sudan</option>
	        <option value="SR">Suriname</option>
	        <option value="SJ">Svalbard and Jan Mayen</option>
	        <option value="SZ">Swaziland</option>
	        <option value="SE">Sweden</option>
	        <option value="CH">Switzerland</option>
	        <option value="SY">Syria</option>
	        <option value="ST">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
	        <option value="TW">Taiwan</option>
	        <option value="TJ">Tajikistan</option>
	        <option value="TZ">Tanzania</option>
	        <option value="TH">Thailand</option>
	        <option value="TL">Timor-Leste</option>
	        <option value="TG">Togo</option>
	        <option value="TK">Tokelau</option>
	        <option value="TO">Tonga</option>
	        <option value="TT">Trinidad and Tobago</option>
	        <option value="TN">Tunisia</option>
	        <option value="TR">Turkey</option>
	        <option value="TM">Turkmenistan</option>
	        <option value="TC">Turks and Caicos Islands</option>
	        <option value="TV">Tuvalu</option>
	        <option value="UM">U.S. Minor Outlying Islands</option>
	        <option value="PU">U.S. Miscellaneous Pacific Islands</option>
	        <option value="VI">U.S. Virgin Islands</option>
	        <option value="UG">Uganda</option>
	        <option value="UA">Ukraine</option>
	        <option value="SU">Union of Soviet Socialist Republics</option>
	        <option value="AE">United Arab Emirates</option>
	        <option value="GB">United Kingdom</option>
	        <option value="US">United States</option>
	        <option value="ZZ">Unknown or Invalid Region</option>
	        <option value="UY">Uruguay</option>
	        <option value="UZ">Uzbekistan</option>
	        <option value="VU">Vanuatu</option>
	        <option value="VA">Vatican City</option>
	        <option value="VE">Venezuela</option>
	        <option value="VN">Vietnam</option>
	        <option value="WK">Wake Island</option>
	        <option value="WF">Wallis and Futuna</option>
	        <option value="EH">Western Sahara</option>
	        <option value="YE">Yemen</option>
	        <option value="ZM">Zambia</option>
	        <option value="ZW">Zimbabwe</option>
	        <option value="AX">&Aring;land Islands</option>
	        </select>
		</div>
	</div>
    <div id="u13outer">Bist du unter 13 Jahre alt? Dann klicke bitte <a href="#" onclick="document.getElementById('u13inner').style.display = 'block'; document.getElementById('u13outer').style.display = 'none'; document.getElementById('u13active').value=1;">hier</a></div>
    <div id="u13inner" style="display:none">
    	<div>Wenn du unter 13 Jahre alt bist, dann ben&ouml;tigen wir f&uuml;r die Speicherung deiner Daten die Zustimmung deiner Eltern. Bitte gib uns daf&uuml;r deren E-Mail-Adresse, damit wir ihre Zustimmung einholen k&ouml;nnen.</div><label for="parent_email" style="font-weight:bold">E-Mail deiner Eltern *</label>
		<input type="text" name="parent_email" id="parent_email" value="" size="40" maxlength="100">
	</div>
	<input type="hidden" name="u13active" id="u13active" value="0" style="display: none;">
    <div class="Row"><input type="hidden" value="DE_34625" name="newsletter[]" id="newsletteridDE_34625"><input type="checkbox" value="DE_34625" name="disnewsletter[]" id="disnewsletteridDE_34625" checked="checked" disabled="disabled" class="check"><label for="newsletteridDE_34625" style="margin-left:10px; width:80%;">Ja, ich m&ouml;chte regelm&auml;&szlig;ig News zu Legacy Club erhalten.</label></div>
    <div class="Row"><input type="checkbox" value="1" name="acceptdatasecurity" id="acceptdatasecurity1"><label for="acceptdatasecurity1" style="margin-left:10px; width:80%;">Ja, ich akzeptiere die <a href="http://www.sonymusic.de/Datenschutz" target="_blank" class="ds_link">Datenschutzbestimmungen</a>. *</label></div>
    <div class="infotext">* Pflichtfelder</div>
    <div><input type="hidden" name="newsletterclasssubmissiondetector" id="newsletterclasssubmissiondetector" value="1" style="display: none;"></div>
						<div class="footing">
							<input type="submit" value="Absenden" class="submit closer"/>
							<a href="#" class="closer">Schliessen</a>
						</div>			
					</div> -->
					<iframe src="http://lp.sonymusic.de/newsletter/newsletter-legacy-club-neu.php" width="365" height="350" scrolling="no" frameborder="0"></iframe>
				</div>
						<div class="thanks">
							<div class="footing">
								<a href="#" class="submit closer">Schliessen</a>
							</div>			
						</div>
					</div>			
			<?php
					endwhile;
				endif;
			?>			
		</form>
	</div>	
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1&appId=111335562299231";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.fitvids.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/script.js"></script>
	<?php wp_footer(); ?>
	<img src="https://ad3.adfarm1.adition.com/tagging?network=250&tag[sonyp.legacyclub]&type=src" width="1" height="1"> 




	<!-- Google Code for Legacy-Club.de Besucher --> 
	<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup --> 
	<script type=""text/javascript""> 
	/* <![CDATA[ */ 
	var google_conversion_id = 968933935; 
	var google_conversion_label = ""RhicCIHGxwUQr4SDzgM""; 
	var google_custom_params = window.google_tag_params; 
	var google_remarketing_only = true; 
	/* ]]> */ 
	<﻿/script> 
	<﻿script type=""text/javascript"" src=""//www.googleadservices.com/pagead/conversion.js""> 
	<﻿/script> 
	<noscript> 
	<div style=""display:inline;""> 
	<﻿img height=""1"" width=""1"" style=""border-style:none;"" alt="""" src=""//googleads.g.doubleclick.net/pagead/viewthroughconversion/968933935/?value=0&amp;label=RhicCIHGxwUQr4SDzgM&amp;guid=ON&amp;script=0""/> 
	</div> 
	</noscript>	
</body>
</html>