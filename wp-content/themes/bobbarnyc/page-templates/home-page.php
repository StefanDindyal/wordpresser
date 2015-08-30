<?php
/* Template Name: Home Page */
get_header(); ?>

	<!-- Header -->
	<div class="header">
		<ul class="scheduel">
			<li>
				<p class="days">sun-mon</p>
				<p class="status">Closed</p>
			</li>
			<li>
				<p class="days">sun-mon</p>
				<p class="status">Closed</p>
			</li>
			<li>
				<p class="days">sun-mon</p>
				<p class="status">Closed</p>
			</li>
		</ul>
		<div class="where">
			<h1 class="logo hidetext" title="bob">bob bar nyc</h1>
			<p class="description">lower east side</p>
			<p class="address">235 eldridge</p>
		</div>
	</div>

	<!-- About -->
	<div class="about">
		<div class="top">
			<div class="left">
				<div class="description">
					<div class="contents">
						<h2 class="title">est. 1993</h2>
						<p>A L.E.S. staple bOb has been But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complaete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself.</p>
						<a href="#" title="host your event" class="host-event">host your event</a>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="img-1">

				</div>
				<div class="img-2">

				</div>
			</div>
		</div>
		<div class="bottom">
			<ul class="img-list">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
	</div>

	<!-- Resident Events -->
	<div class="resident-events">
		<div class="head">
			<h2 class="title">hear</h2>
			<h3 class="sub-title">(residencies)</h3>
		</div>
		<ul class="list">
			<li>
				<p class="day">daily</p>
				<p class="time">6pm - closing</p>
				<p class="name">dj Mika</p>				
			</li>
		</ul>
		<div class="note">
			<p>thur -sat : happy hour by dj Mika</p>
		</div>
	</div>

	<!-- Upcoming Events -->
	<div class="upcoming-evetns">
		<div class="head">
			<h3 class="sub-title">(upcoming)</h3>
		</div>
		<ul class="list">
			<li>
				<div class="track">
					<a href="#" class="link"><img src="" alt="Track 01" border="0"/></a>
				</div>
				<p class="day">saturday - mar &bull; 13</p>
				<p class="time">(6pm - 12pm)</p>
				<p class="title">word is bond</p>
				<p class="description">Something here</p>
			</li>
		</ul>
		<div class="nav">
			<a href="#" class="earlier">earlier</a>
			<a href="#" class="later">later</a>
		</div>
	</div>

	<!-- Artist -->
	<div class="artist">
		<div class="left">
			<div class="img-1">

			</div>
			<div class="img-2">

			</div>
		</div>
		<div class="right">
			<div class="head">
				<h2 class="title">see</h2>
				<h3 class="sub-title">(exhibitions)</h3>
			</div>
			<div class="description">
				<div class="contents">
					<h2 class="title">crash one</h2>
					<p>Some stuff here.</p>
					<a href="#" class="preview">preview the artwork</a>
					<a href="#" class="past-artists">past artists</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Map -->
	<div class="location">
		<div class="head">
			<h2 class="title">touch</h2>
			<div id="map"></div>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer">
		<div class="left">
			<div class="form">
				<form name="contact" action="/" method="POST">
					<div class="head">
						<h3 class="sub-title">(event?)</h3>
					</div>
					<ul class="reason">
						<li><label><span class="cursor"></span> general reservation <span class="note">(5 or more)</span></label></li>
						<li><label><span class="cursor"></span> private party</label></li>
						<li><label><span class="cursor"></span> art exhibition</label></li>
						<li><label><span class="cursor"></span> i'd like to dj</label></li>
						<li><label><span class="cursor"></span> general inquiry</label></li>
					</ul>
					<ul class="fields">
						<li class="left">
							<label>(your name)*</label>
							<input type="text" name="your_name" maxlength="50" size="20" value=""/>
						</li>
						<li class="right">
							<label>(your email)*</label>
							<input type="text" name="your_email" maxlength="50" size="20" value=""/>
						</li>
					</ul>
					<ul class="fields">
						<li class="left">
							<label>(party size)</label>
							<input type="text" name="party_size" maxlength="50" size="20" value=""/>
						</li>
						<li class="right">
							<label>(your event date)</label>
							<input type="text" name="month" maxlength="50" size="20" value=""/>
							<input type="text" name="day" maxlength="50" size="20" value=""/>
							<input type="text" name="time" maxlength="50" size="20" value=""/>
						</li>
					</ul>
					<ul class="fields">
						<li class="msg">
							<label>(party size)</label>
							<textarea name="message" wrap="physical"></textarea>
						</li>
					</ul>
					<ul class="fields">
						<li class="left">
							<label><span class="cursor"></span> get updates?</label>
						</li>
						<li class="rigt">
							<input type="submit" value="submit"/>
						</li>
					</ul>
				</form>
			</div>
		</div>
		<div class="right">
			<div class="info">
				<p class="social">
					<h3 class="sub-title">(friends?)</h3>
					<a href="#" target="_blank" class="instagram">instagram</a>
					<a href="#" target="_blank" class="twitter">twitter</a>
					<a href="#" target="_blank" class="facebook">facebook</a>
				</p>
				<p><a href="mailto:bobbarnyc@gmail.com">bobbarnyc@gmail.com</a> - (212) 529 - 1807</p>
				<p class="dark">235 eldridge street</p>
				<p class="dark">Ny, Ny 10002</p>
			</div>
		</div>
	</div>

<?php
get_footer();
