		<div id="lang" class="clearfix"><div class="leaf">
			<?php do_action('icl_language_selector'); ?>
		</div></div>
		<?php if(is_home()): ?>
		<div id="logo">
			<a class="burger"></a>
			<a class="newsletter-mob" href="#form"></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			<div class="leaf clearfix">				
				<a class="home-link return" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" data-id="epilogue"><h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1></a>
			</div>
		</div>
		<?php else: ?>		
		<div id="logo" class="active">
			<a class="burger"></a>
			<a class="newsletter-mob" href="#form"></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			<div class="leaf clearfix">								
				<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><h1 class="site-title hidetext"><?php bloginfo( 'name' ); ?></h1></a>
			</div>
		</div>
		<?php endif; ?>
		<div id="spine">
			<div class="nav-options">
				<div class="leaf clearfix">
					<div class="inner">
						<a href="<?php bloginfo('url'); ?>" class="door"><img src="<?php bloginfo('template_directory') ?>/images/door-open.png" border="0" alt=""/></a>
						<ul class="icons">
							<li class="audio"><a href="#" class="hidetext">Listen</a>
								<div class="player">
									<div class="cut">
										<?php if(rg_media_player()){echo rg_media_player();} ?>
									</div>
									<a href="#" class="close"></a>
								</div>
							</li>
							<li class="signup">
								<a href="#form" class="hidetext">Signup</a>
								<div class="slip">
									<div class="cut">Keep up with Paloma! <a href="#form" class="nl">Subscribe Now</a></div>
									<a href="#" class="close"></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="top">
				<div class="leaf clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
				</div>			
			</div>
			<div class="lower">
				<!-- <div class="mobile-top">
					Back to top
				</div>		 -->
				<div class="mobile-lang">
					<?php do_action('icl_language_selector'); ?>
				</div>		
				<div class="leaf clearfix">
					<?php wp_nav_menu( array( 'menu' => 'social-nav', 'menu_class' => 'social-nav' ) ); ?>
					<div class="legal">&copy; 2014 Sony Music Entertainment UK &bull; <a href="http://www.columbia.co.uk/uk/artists#privacy-policy" target="_blank">Privacy</a></div>
				</div>
			</div>
		</div><!-- #spine -->		
	</div><!-- #book -->
	<div style="display:none;">
		<div id="form">
			<a href="#" class="close_lb"></a>
			<iframe name="mailingList" id="mailingList" width="100%" height="700" scrolling="no" frameborder="0" src="https://www.myplaydirectcrm.com/fc/paloma-faith/193bd/" allowtransparency="true"></iframe>
			<?php /*<form name="Signup" signupform="true" action="https://subs.sonymusic.com/app/ly/signup" method="POST" onsubmit="return validateSignupForm(this)">
					<div class="wwFormTable">
						<div class="form-title">Newsletter</div>
						<div class="first-name-field active-input">							
				      		<div class="input-fields">
				      			<input type="text" name="first_name" maxlength="50" size="20" value="Name"/>
				      			<input type="hidden" name="demographics_on_form" value="first_name"/>
				      		</div>
						</div>   					      	          				      	
				      	<div class="email-field active-input">				      		
				      		<div class="input-fields">
				      			<input type="text" name="email" maxlength="50" size="20" value="E-Mail*" />
				      			<input type="hidden" name="required_fields" value="email"/>
				      			<input type="hidden" name="demographics_on_form" value="email"/>
				      		</div>		              
				      	</div>					      	
						<div class="country-field selective-input">							
							<div class="input-fields">
								<select name="country" >
									<option value=" ">Select Country*</option>
									<option value="US">United States</option>
									<option value="GB">United Kingdom</option>
									<option value="CA">Canada</option>
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
									<option value="IO">British Indian Ocean Territory</option>
									<option value="BN">Brunei Darussalam</option>
									<option value="BG">Bulgaria</option>
									<option value="BF">Burkina Faso</option>
									<option value="BI">Burundi</option>
									<option value="KH">Cambodia</option>
									<option value="CM">Cameroon</option>
									<option value="CV">Cape Verde</option>
									<option value="KY">Cayman Islands</option>
									<option value="CF">Central African Republic</option>
									<option value="TD">Chad</option>
									<option value="CL">Chile</option>
									<option value="CN">China</option>
									<option value="CX">Christmas Island</option>
									<option value="CC">Cocos (Keeling) Islands</option>
									<option value="CO">Colombia</option>
									<option value="KM">Comoros</option>
									<option value="CG">Congo</option>
									<option value="CD">Congo The Democratic Republic Of The</option>
									<option value="CK">Cook Islands</option>
									<option value="CR">Costa Rica</option>
									<option value="CI">Cote D'Ivoire</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CY">Cyprus</option>
									<option value="CZ">Czech Republic</option>
									<option value="DK">Denmark</option>
									<option value="DJ">Djibouti</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EG">Egypt</option>
									<option value="SV">El Salvador</option>
									<option value="GQ">Equatorial Guinea</option>
									<option value="ER">Eritrea</option>
									<option value="EE">Estonia</option>
									<option value="ET">Ethiopia</option>
									<option value="FK">Falkland Islands (Malvinas)</option>
									<option value="FO">Faroe Islands</option>
									<option value="FJ">Fiji</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="GF">French Guiana</option>
									<option value="PF">French Polynesia</option>
									<option value="TF">French Southern Territories</option>
									<option value="GA">Gabon</option>
									<option value="GM">Gambia</option>
									<option value="GE">Georgia</option>
									<option value="DE">Germany</option>
									<option value="GH">Ghana</option>
									<option value="GI">Gibraltar</option>
									<option value="GR">Greece</option>
									<option value="GL">Greenland</option>
									<option value="GD">Grenada</option>
									<option value="GP">Guadeloupe</option>
									<option value="GU">Guam</option>
									<option value="GT">Guatemala</option>
									<option value="GN">Guinea</option>
									<option value="GW">Guinea-Bissau</option>
									<option value="GY">Guyana</option>
									<option value="HT">Haiti</option>
									<option value="HM">Heard Island and McDonald Islands</option>
									<option value="VA">Holy See (Vatican City State)</option>
									<option value="HN">Honduras</option>
									<option value="HK">Hong Kong</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IR">Iran Islamic Republic Of</option>
									<option value="IQ">Iraq</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JP">Japan</option>
									<option value="JO">Jordan</option>
									<option value="KZ">Kazakhstan</option>
									<option value="KE">Kenya</option>
									<option value="KI">Kiribati</option>
									<option value="KP">Korea Democratic People's Republic Of</option>
									<option value="KR">Korea Republic Of</option>
									<option value="KW">Kuwait</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="LA">Lao People's Democratic Republic</option>
									<option value="LV">Latvia</option>
									<option value="LB">Lebanon</option>
									<option value="LS">Lesotho</option>
									<option value="LR">Liberia</option>
									<option value="LY">Libyan Arab Jamahiriya</option>
									<option value="LI">Liechtenstein</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="MO">Macao</option>
									<option value="MK">Macedonia The Former Yugoslav Republic of</option>
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
									<option value="MX">Mexico</option>
									<option value="FM">Micronesia Federated States of</option>
									<option value="MD">Moldova Republic of</option>
									<option value="MC">Monaco</option>
									<option value="MN">Mongolia</option>
									<option value="MS">Montserrat</option>
									<option value="MA">Morocco</option>
									<option value="MZ">Mozambique</option>
									<option value="MM">Myanmar</option>
									<option value="NA">Namibia</option>
									<option value="NR">Nauru</option>
									<option value="NP">Nepal</option>
									<option value="NL">Netherlands</option>
									<option value="AN">Netherlands Antilles</option>
									<option value="NC">New Caledonia</option>
									<option value="NZ">New Zealand</option>
									<option value="NI">Nicaragua</option>
									<option value="NE">Niger</option>
									<option value="NG">Nigeria</option>
									<option value="NU">Niue</option>
									<option value="NF">Norfolk Island</option>
									<option value="MP">Northern Mariana Islands</option>
									<option value="NO">Norway</option>
									<option value="OM">Oman</option>
									<option value="PK">Pakistan</option>
									<option value="PW">Palau</option>
									<option value="PS">Palestinian Territory Occupied</option>
									<option value="PA">Panama</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PY">Paraguay</option>
									<option value="PE">Peru</option>
									<option value="PH">Philippines</option>
									<option value="PN">Pitcairn</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="PR">Puerto Rico</option>
									<option value="QA">Qatar</option>
									<option value="RE">Reunion</option>
									<option value="RO">Romania</option>
									<option value="RU">Russian Federation</option>
									<option value="RW">Rwanda</option>
									<option value="SH">Saint Helena</option>
									<option value="KN">Saint Kitts And Nevis</option>
									<option value="LC">Saint Lucia</option>
									<option value="PM">Saint Pierre And Miquelon</option>
									<option value="VC">Saint Vincent and The Grenadines</option>
									<option value="WS">Samoa</option>
									<option value="SM">San Marino</option>
									<option value="ST">Sao Tome and Principe</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SN">Senegal</option>
									<option value="CS">Serbia and Montenegro</option>
									<option value="SC">Seychelles</option>
									<option value="SL">Sierra Leone</option>
									<option value="SG">Singapore</option>
									<option value="SK">Slovakia</option>
									<option value="SI">Slovenia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SO">Somalia</option>
									<option value="ZA">South Africa</option>
									<option value="GS">South Georgia and The South Sandwich Islands</option>
									<option value="ES">Spain</option>
									<option value="LK">Sri Lanka</option>
									<option value="SD">Sudan</option>
									<option value="SR">Suriname</option>
									<option value="SJ">Svalbard and Jan Mayen</option>
									<option value="SZ">Swaziland</option>
									<option value="SE">Sweden</option>
									<option value="CH">Switzerland</option>
									<option value="SY">Syrian Arab Republic</option>
									<option value="TW">Taiwan</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania United Republic of</option>
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
									<option value="UG">Uganda</option>
									<option value="UA">Ukraine</option>
									<option value="AE">United Arab Emirates</option>
									<option value="UM">United States Minor Outlying Islands</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VU">Vanuatu</option>
									<option value="VE">Venezuela</option>
									<option value="VN">Vietnam</option>
									<option value="VG">Virgin Islands British</option>
									<option value="VI">Virgin Islands U.S.</option>
									<option value="WF">Wallis and Futuna</option>
									<option value="EH">Western Sahara</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
		                    	<input type="hidden" name="demographics_on_form" value="country"/>
		                    	<input type="hidden" name="required_fields" value="country"/>
							</div>
						</div><!-- e: .country-field -->					      	
						<div class="submit-btn">
							<input type="submit"  value="subscribe now"/>
						</div>
						<div class="form-legal">							
							<a href="http://www.sonymusic.com/privacypolicy.html" target="_blank">Privacy Policy / Your Privacy Rights</a>
						</div>
						<!-- Form List ID -->
						<?php  $list_id = get_option( 'rg_options' ); ?>
		                <input type="hidden" name="list" value="<?php echo $list_id['list_id']; ?>">
		                <input type="hidden" name="lists_on_form" value="<?php echo $list_id['list_id']; ?>" />
		                <!-- Thank You Page URL -->
		                <input type="hidden" name="post_signup_url" value="<?php bloginfo('url'); ?>/#thankyou"/>
		                <!-- Form Misc -->
		                <input type="hidden" name="confirm" value="Y"/>
		                <input type="hidden" name="email_vc" value="NL"/>
		                <input type="hidden" name="mobile_vc" value="MZ"/>
		                <input type="hidden" name="formgen_timestamp" value="Jul 9, 2012 1:44:13 PM"/>
		                <input type="hidden" name="formgen_version" value="2.0"/>                
					</div><!-- e: .wwFormTable -->
				</form> */?>
		</div>
	</div>	
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/plugins.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/scripts.js"></script>	
	<?php wp_footer(); ?>	
	<!-- SONY MUSIC GOOGLE ANALYTICS TRACKING -->
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	    (function() {
	       var e = document.createElement("script");
	       e.type = "text/javascript"; e.async = true;
	       e.src = "http" + (document.location.protocol === "https:" ? "s://ssl" : "://") + "tag.myplay.com/t/a/" + document.location.hostname;
	       var s = document.getElementsByTagName("script")[0];
	       s.parentNode.insertBefore(e, s);
	     })();
	//--><!]]>
	</script>
	    
	<!-- SONY MUSIC UK FACEBOOK WEBSITE RETARGETING -->
	<script type="text/javascript">(function(){
	  window._fbds = window._fbds || {};
	  _fbds.pixelId = 225865057601412;
	  var fbds = document.createElement('script');
	  fbds.async = true;
	  fbds.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//connect.facebook.net/en_US/fbds.js';
	  var s = document.getElementsByTagName('script')[0];
	  s.parentNode.insertBefore(fbds, s);
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(["track", "PixelInitialized", {}]);
	</script>
	<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=225865057601412&amp;ev=NoScript" /></noscript>
</body>
</html>