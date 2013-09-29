<?php
    global $header_image;
    if ( !empty($header_image) ) :
?>

    <!-- header image/slider -->
    <div class="header_bot header_image">
        <div class="container">
            <?php
                $image = new TF_GET_IMAGE();
                echo $image->width(960)->height(142)->src($header_image)->get_img();
            ?>
        </div>
    </div>
    <!--/ header image/slider -->

<?php else: ?>

    <div class="header_bot"></div>

<?php endif; ?>
