<?php 

	// $headers[] = "From: {$name} <{$email}>";
    // wp_mail( $emails, $subject, $message, $headers );
	$response = "";
	function my_contact_form_generate_response($type, $message){
		global $response;			 
		if($type == "success"){ 
			$response = "<div class='success code'>{$message}</div>";
		}
		else 
		{	
			$response = "<div class='error code'>{$message}</div>";			 
		}
	}
	//response messages
	$message_unsent  = "Message was not sent. Try Again.";
	$message_sent    = "Thanks! Your message has been sent.";
	//user posted variables
	$name = $_POST['message_name'];
	$email = $_POST['message_email'];
	$subject = $_POST['message_subject'];
	$message = $_POST['message_text'];
	$message = strip_tags($message);
	//php mailer variables
	$kc_options = get_option('kc_options');
	$to = $kc_options['kc_email_url'];	
	if($to){		
		$to = $to;
	} else {
		// marketing@voltage-ent.com
		$to = 'marketing@voltage-ent.com';
	}
	if($subject){
		$subject = $subject;
	} else {
		$subject = '';
	}
	if($message){
		$message = 'From: '.$email.', '.$message;
	} else {
		$message = 'No message.';
	}
	$headers[] = '';
	$sent = wp_mail($to, $subject, $message, $headers);
    if($_POST['submitted']){
		if($sent){
			my_contact_form_generate_response("success", $message_sent); //message sent!
		}
		else
		{
			my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
		}
	}	

	/* Template Name: Contact Us */ 
	get_header(); 
	$contact_copy = get_post_meta($post->ID, 'kc_contact_copy', true);
?>
<div id="contact-page" class="clearfix">	
	<div id="contact" class="section">		
		<div class="letter">
			<div class="rig">
				<div class="left">			
					<h2>Contact Us</h2>
					<img src="<?php bloginfo('template_directory'); ?>/images/letter.png" alt="" border="0">
				</div>
				<div class="right">
					<?php echo wpautop($contact_copy); ?>
					<div id="respond">
						<div class="resp"><?php 
							global $response;
							echo $response;			  	
						?></div>
						<form action="<?php bloginfo('url'); ?>/contact-us" method="post">
							<input type="text" name="message_name" value="" placeholder="Name">
							<input type="text" name="message_email" value="" placeholder="Email">
							<input type="text" name="message_subject" value="" placeholder="Subject">
							<textarea type="text" name="message_text" placeholder="Message"></textarea>
							<input type="hidden" name="submitted" value="1">
							<div class="clearfix">
								<input type="submit" value="Send">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<?php
	get_footer();
