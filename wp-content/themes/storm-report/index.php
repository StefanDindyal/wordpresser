<?php get_header(); ?>

		<div class="row">

			<div id="login">

				<h1><a href="http://wordpress.org/">WordPress</a></h1>

				<form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
					
					<label>Login:<input type="text" name="log" id="log" value="" size="20" tabindex="1" /></label>

					<label>Password: <input type="password" name="pwd" id="pwd" value="" size="20" tabindex="2" /></label>

					<input type="submit" name="submit" id="submit" value="Login &raquo;" tabindex="3" />
					
					<input type="hidden" name="redirect_to" value="wp-admin/" />

				</form>
				
				<ul>
					
					<li><a href="<?php bloginfo('url'); ?>/" title="Are you lost?">&laquo; Back to blog</a></li>
					
					<li><a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword">Lost your password?</a></li>

				</ul>

			</div>

		</div>

<?php get_footer(); ?>
