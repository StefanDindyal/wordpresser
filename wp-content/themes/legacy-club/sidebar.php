<?php
/**
 * The sidebar containing the secondary widget area, displays on posts and pages.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="tertiary" class="side" role="complementary">
		<?php wp_nav_menu( array( 'menu' => 'social_nav', 'menu_class' => 'social-menu' ) ); ?>
		<div class="sidebar-inner">
			<div class="widget-area">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
		<div class="entry-meta">
			<a href="#page" title="Nach Oben" class="up">Nach Oben</a>			
		</div>
	</div><!-- #tertiary -->
<?php endif; ?>