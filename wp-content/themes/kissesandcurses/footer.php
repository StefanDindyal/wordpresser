		</div><!-- #mid -->
		<footer id="footer">
			<div class="rig clearfix">
				<div class="to-top"></div>
				<h1 class="logo">
					<a href="http://voltage-ent.com/" class="hidetext" target="_blank">VOLTAGE entertainment USA</a>
				</h1>
				<div class="copyright">
					<?php wp_nav_menu( array( 'menu' => 'footer', 'menu_class' => 'footer-menu' ) ); ?>
					<p>Copyright &copy; <?php echo date('Y'); ?> Voltage Entertainment USA, Inc. All Rights Reserved.</p>
				</div>
			</div>
		</footer><!-- #footer -->
	</div><!-- #main -->
	<div class="over">
		<div class="inner">
			<div class="close">close X</div>
			<ul>
				<li>
					<a href="javascript: void(0)" class="facebook hidetext" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo esc_url( home_url( '/' ) ); ?>','sharer','toolbar=0,status=0,width=580,height=325');">Facebook Share</a>
				</li>
				<li>
					<a href="javascript: void(0)" class="twitter hidetext" onclick="window.open('https://twitter.com/intent/tweet?text=Kisses &amp; Curses <?php echo esc_url( home_url( '/' ) ); ?>','sharer','toolbar=0,status=0,width=580,height=500');">Twitter Share</a>
				</li>
				<li>
					<a href="mailto:example@example.com?subject=Kisses&amp;body=<?php echo esc_url( home_url( '/' ) ); ?>" class="email hidetext">Email Share</a>
				</li>
			</ul>
		</div>
	</div>
	<?php wp_footer(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>
</body>
</html>