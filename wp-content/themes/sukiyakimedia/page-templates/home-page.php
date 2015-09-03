<?php
/*
Template Name: Home Page
*/
get_header(); ?>
<div id="main-content" class="main-content">
<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<section id="news" class="b">
		<h2 class="section-title">News</h2>
		<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'content', get_post_format() );
				endwhile;
			else :
				get_template_part( 'content', 'none' );
			endif;
		?>
	</section>
	<section id="about" class="b">
		<h2 class="section-title">About Us</h2>
		<div class="ico">
			<i class="icon">
				<i class="r"></i>
				<i class="g"></i>
				<i class="b"></i>
			</i>
		</div>
		<div id="us">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</div>
		<ul id="members">
			<li class="caleb">
				<div class="avatar"></div>
				<span>Caleb</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<strong>Skills</strong>
				<ul>
					<li>Skill</li>
					<li>Skill</li>
					<li>Skill</li>
				</ul>
			</li>
			<li class="mark">
				<div class="avatar"></div>
				<span>Mark</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<strong>Skills</strong>
				<ul>
					<li>Skill</li>
					<li>Skill</li>
					<li>Skill</li>
				</ul>
			</li>
			<li class="stefan">
				<div class="avatar"></div>
				<span>Stefan</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<strong>Skills</strong>
				<ul>
					<li>Skill</li>
					<li>Skill</li>
					<li>Skill</li>
				</ul>
			</li>
		</ul>
		<div class="clear"></div>
	</section>
	<section id="works" class="b">
		<h2 class="section-title">Works</h2>
		<ul class="story">
			<li class="wod">
				<div class="large-img"></div>
				<span>Wings of Destiny</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<ul class="gallery">
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
				</ul>
			</li>
			<li class="ew">
				<div class="large-img"></div>
				<span>Eternal Wonderer</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<ul class="gallery">
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
				</ul>
			</li>
			<li class="el">
				<div class="large-img"></div>
				<span>Project: Death Sentence</span>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
				</p>
				<ul class="gallery">
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
					<li>
						<a href="#"></a>
					</li>
				</ul>
			</li>
		</ul>
	</section>
</div><!-- #main-content -->
<?php
get_footer();
