

<?php echo  tfuse_footer_adds(); ?>
<div class="divider_thin"></div>
<!-- bottom content/widgets -->

            <?php tfuse_action_footer() ?>

<!--/ bottom content/widgets -->
<!--Footer-->
<div class="footer">
    <div class="container_24">  
      <div class="twtr-foot">     
        <div id="tweet-container-b" class="twtr-feed"></div>
      </div>        
      <div class="clear"></div>
      <p class="copyright"><?php  echo tfuse_options('custom_copyright') ?></p>
      <div class="clear"></div>
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
