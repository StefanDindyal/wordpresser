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
	<?php /* <section id="news" class="b">
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
	<section id="works" class="b">
		<h2 class="section-title">Our Works</h2>
		<ul class="story">
			<li class="wod">
				<div class="large-img"></div>
				<div class="disc">
					<span class="helper"></span>
					<div class="contents">
						<span>Wings of Destiny</span>				
						<p>
							A powerful force once thought to be banished forever is destined to return. The future of civilization rests in the fate of the chosen few, with fates intertwined by prophecy, are destined to bring balance within the dimensions. One such fated person is a young man named Ivran Price.  A daunting task lies ahead for the “Soldier of Destiny”. Gifted with unique abilities and chosen by a magic sword, he is fated to lead his allies to destroy the looming onslaught that is drawing near &hellip;
						</p>
						<em>Creator: Caleb</em>
						<em class="note">gallery coming soon</em>
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
					</div>
				</div>
			</li>
			<li class="ew">
				<div class="large-img"></div>
				<div class="disc">
					<span class="helper"></span>
					<div class="contents">
						<span>Eternal Wonderer</span>				
						<p>
							A man, by the name of Myros, strikes a terrible deal with power beyond his imagination for a chance to live again; all for the sake of protecting his love ones that he was forced to leave behind. Myros embarks into a journey for answers that will question his morals, push his resolve to the limits, and test what remains of his humanity.
						</p>
						<em>Creator: Mark</em>
						<em class="note">gallery coming soon</em>
					</div>
				</div>
			</li>
			<li class="el">
				<div class="large-img"></div>
				<div class="disc">
					<span class="helper"></span>
					<div class="contents">
						<span>Project: Death Sentence</span>				
						<p>
							“I never asked to be born the way that I was. I never asked to be born with the fate that I was given. I never wanted any of this. I never had a choice.” Because of my own personal feelings about the development of Eleanor, she has been given a bit of a vacation, not that she doesn’t deserve one. Death Sentence is a variant story of Eleanor that I have decided to take on. A version of the story that exists outside of what was originally concepted but with enough overlap to maintain some of its heart. I hope to use this tale to put my own heart to rest. “There is always a choice, Eleanor. It’s how you live with the consequences of that choice that will define you.”
						</p>
						<em>Creator: Stefan</em>
						<em class="note">gallery coming soon</em>						
					</div>
				</div>
			</li>
		</ul>
	</section>
	<section id="about" class="b">
		<h2 class="section-title">About Us</h2>		
		<div id="us">
			<div class="ico">
				<i class="icon">
					<i class="r"></i>
					<i class="g"></i>
					<i class="b"></i>
				</i>
			</div>
			We are students of the former Art Institutes, still waiting for our money back. We joined up to try and create cool things and get our ideas out into the world. We have been working at it for a while now and despite life being hectic we haven't given up. We hope that our big break is around the corner and we'll keep on turning till we find it. Maybe one day our mixed, mashed works will find a customer and that our brand of Sukiyaki will be to their liking.
			<br><br>
			<p>You can check us out on <a href="https://www.facebook.com/sukiyakimedia">Facebook</a>.</p>
			<p>- or -</p>
			<div>Shoot us a like! <div class="fb-like" data-href="https://www.facebook.com/sukiyakimedia" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
		</div>
		<h2 class="section-title">Members</h2>
		<ul id="members">
			<li class="caleb">
				<div class="avatar"></div>
				<span>Caleb</span>
				<p>
					I am an Army Veteran with a passion for creativity involving writing and film making. I'm a writer, non-union actor and am pursuing a career as a film maker. My goal is to share and create my ideas through webcomics, TV and film.
				</p>
				<strong>Skills</strong>
				<ul>
					<li><span>&raquo;</span> Writing</li>
					<li><span>&raquo;</span> Screenwriting</li>
					<li><span>&raquo;</span> Film Production</li>
				</ul>
			</li>
			<li class="mark">
				<div class="avatar"></div>
				<span>Mark</span>
				<p>
					Greetings; I, Mark A. Torres, am a free lance worker with strong aspirations of completing dream goals such as world traveling and achieving renowned status. My wide variety set of skills and hard working drive allow me to work on most fields of the entertainment industry but my core skills are focus on Videography and Photography. Eventually I wish to leave a legacy of work that will survive the passage of time.
				</p>
				<strong>Skills</strong>
				<ul>
					<li><span>&raquo;</span> Photography</li>
					<li><span>&raquo;</span> Videography</li>					
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
					<li><span>&raquo;</span> Web Development</li>
					<li><span>&raquo;</span> Illustrator</li>					
				</ul>
			</li>
		</ul>
		<div class="clear"></div>
	</section>	
</div><!-- #main-content -->
<?php
get_footer();
