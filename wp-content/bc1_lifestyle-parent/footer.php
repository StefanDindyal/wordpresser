

<?php echo  tfuse_footer_adds(); ?>
<div class="divider_thin"></div>
<!-- bottom content/widgets -->

            <?php tfuse_action_footer() ?>

<!--/ bottom content/widgets -->
<!--Footer-->
<div class="footer">
    <div class="container_24">
            <?php  tfuse_menu('footer');?>
            <div class="clear"></div>
        <br>
        <div class="footer_logo">
            <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
            <img src="<?php echo tfuse_logo_footer(); ?>" alt="<?php bloginfo('name'); ?>"  border="0" /></a>
        </div>
        <p class="copyright"><?php  echo tfuse_options('custom_copyright') ?></p>
        <div class="clear"></div>
    </div>

</div>
<!--/ Footer-->
<?php wp_footer(); ?>
</body>
</html>
