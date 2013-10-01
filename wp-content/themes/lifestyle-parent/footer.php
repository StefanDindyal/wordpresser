

<?php echo  tfuse_footer_adds(); ?>
<!-- <div class="divider_thin"></div> -->
<!-- bottom content/widgets -->

            <?php tfuse_action_footer() ?>

<!--/ bottom content/widgets -->
<!--Footer-->
<div class="footer <?php if(is_single()){echo 'kill';}?>">
    <div class="container_24">
      <div class="foot-top">
      <div class="twtr-foot">  
        <?php tfuse_get_tweets('Hadrok'); ?>   
        <div id="tweet-container-b" class="twtr-feed" data-tuser="<?php echo tfuse_options('tuser_id'); ?>"></div>
      </div>
      <div class="aff"><?php dynamic_sidebar('custom-footer'); ?>
      </ul></div>
      <div class="clear"></div>
    </div>
    <div class="foot-bot">
      <p class="mailer">Contact Girl That’s My Song at <a href="mailto:<?php echo tfuse_options('feedburner_id'); ?>"><?php echo tfuse_options('feedburner_id'); ?></a></p>
      <p class="copyright"><?php  echo tfuse_options('custom_copyright') ?></p>
      <div class="clear"></div>
    </div>
    </div>

</div>
<!--/ Footer-->
<?php wp_footer(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=267619683263571";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
