<div class="search_box">
    <form method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
        <input type="text" value="<?php echo tfuse_options('search_box_text'); ?>"  onfocus="if (this.value == '<?php echo tfuse_options('search_box_text'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php echo tfuse_options('search_box_text'); ?>';}" name="s" id="s" class="inputField" />
        <input type="submit" id="searchsubmit" value="<?php _e("Search","tfuse");?>" class="btn-search" />
    </form>
</div>