	</div><!-- #page -->
	<?php wp_footer(); ?>
	<script type="text/javascript">
		var blogDir = "<?php bloginfo('template_directory'); ?>";
	</script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/animator.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/soundmanager2-jsmin.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/360player.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scripts.js"></script>
	<script type="text/javascript">
		soundManager.setup({
  			// path to directory containing SM2 SWF
  			url: blogDir + "/src/"
		});
	</script>
</body>
</html>