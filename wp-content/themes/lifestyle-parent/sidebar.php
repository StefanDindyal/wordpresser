<?php
tf_do_placeholder('blue');

echo '<div class="aff"><h3>Affiliates</h3><div class="split"></div><ul>';
wp_list_bookmarks('title_li=&categorize=0&limit=5');
echo '</ul></div>';