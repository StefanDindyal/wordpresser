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
	<? /* <section id="news" class="b">
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
	</section> */ ?>
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
			We are students of the former Art Institutes, still waiting for our money back. We joined up to try and create cool things and get our ideas out into the world. We have been working at it for a while now and despite life being hectic we haven't given up. We hope that our big break is around the corner and we'll keep on turning till we find it. Maybe one day our mixed, mashed works will find a customer and that our brand of Sukiyaki will be to their liking.
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
					<li>Photography</li>
					<li>Videography</li>					
				</ul>
			</li>
			<li class="stefan">
				<div class="avatar"></div>
				<span>Stefan</span>
				<p>
					I originally went to school in order to learn to be a better illustrator. It didn't really work out that way, but I wound up finding another passion for Web Development. I went on to persue web development as a way to get our work as group out there on the web. I have been trying keeping up with my illustration as well and I try to do as much of our artwork as I can. Though recently I have been drawing less I plan to get back on the horse and really push it. I hope we can do something amazing. I have Hope!
				</p>
				<strong>Skills</strong>
				<ul>
					<li>Web Development</li>
					<li>Illustrator</li>					
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
					A man, by the name of Myros, strikes a terrible deal with power beyond his imagination for a chance to live again; all for the sake of protecting his love ones that he was forced to leave behind. Myros embarks into a journey for answers that will question his morals, push his resolve to the limits, and test what remains of his humanity.
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
					“I never asked to be born the way that I was. I never asked to be born with the fate that I was given. I never wanted any of this. I never had a choice.” Eleanor is the story that we have worked on as a team for some time now, over the past few years. Because of my own personal feelings about the development of Eleanor, she has been given a bit of a vacation, not that she doesn’t deserve one. Death Sentence is a variant story of Eleanor that I have decided to take on. A version of the story that exists outside of what was originally concepted but with enough overlap to maintain some of its heart. I hope to use this tale to put my own heart to rest and get back to Eleanor down the line. “There is always a choice, Eleanor. It’s how you live with the consequences of that choice that will define you.”
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
