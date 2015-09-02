	</div><!-- #page -->
	<div class="galleryG">
		<div class="cell"></div>
		<div class="nav">
			<div class="earlier"></div>
			<div class="close"><a href="#">close</a></div>
			<div class="later"></div>
		</div>
	</div>
	<script type="text/javascript">
		var blogDir = "<?php bloginfo('template_directory'); ?>";
	</script>
	<script src="https://maps.googleapis.com/maps/api/js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/animator.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/soundmanager2-jsmin.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/360player.js"></script>
	<script type="text/javascript">
		soundManager.setup({
  			// path to directory containing SM2 SWF
  			url: blogDir + "/src/"
		});
	</script>
	<?php wp_footer(); ?>
</body>
</html>