<?php
if(is_single()) {
	echo '<div class="kill">';
	tf_do_placeholder('blue');
	echo '</div>';
} else {
	tf_do_placeholder('blue');	
}