<?php
include "inc/header.php";
?>

<div class="fullscreen-bg">
	<video id="video" class="fullscreen-bg__video" playsinline="playsinline" autoplay="autoplay" muted="muted"
		   loop="loop">
		<script>
			var videoPlayer = document.getElementById('video');

			function playIt() {
				videoPlayer.play();
				var videos = [
					"1",
					"2",
					"3",
					"4",
				], videos = videos[Math.floor(Math.random() * videos.length)];
				videoPlayer.src = "img/" + videos + ".mp4";
			}

			videoPlayer.addEventListener('ended', playIt, false);
			playIt();
		</script>
	</video>
</div>

<!-- Title Section -->
<section id="home" class="text-white">
	<div class="pl-0 pr-0 pt-0">
		<div class="row" style="margin-left: 0px; margin-right: 0px;">

			<?php
			if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
				if (file_exists("pages/" . curPageURL() . ".php")) {
					?>
					<div class="position-fixed">
						<?php
						include("pages/" . curPageURL() . ".php");
						?>
					</div>
					<?php
				} else {
					include("pages/error.php");
				}
			} else if (is_array(curPageURL()) && curPageURL() != 'index') {
				$page = curPageURL();
				$subpage = $page[1];
				$page = $page[0];
				if (file_exists("pages/" . $page . ".php")) {
					include("pages/" . $page . ".php");
				} else {
					include("pages/error.php");
				}
			} else {
			?>

			<!-- Left column -->
			<div class="side-left table-wrapper-scroll-y text-left text-info border-right border-info pl-1 pr-1"
				 style="font-size: 10px;">
				<h4>Latest Achievements</h4>
				<div>
					<?php activityfeed() ?>
				</div>
			</div>

			<!-- Center column with title text -->
			<div class="side-middle col mx-auto text-center">
				<h2 class="display-3 mb-0">OPEN RSC</h2>
				<div class="text-white-50">Striving for a replica RSC game and more</div>
				<br>
				<a href="https://game.openrsc.com/downloads/openrsc.apk">
					<img class="picture" src="img/android.png" class="img-fluid" height="300px" width="600px;">
				</a>
				<br>
				<button type="button" class="pc btn btn-dark btn-outline-info">PC Client</button>
				<button type="button" class="mobile btn btn-dark btn-outline-info">Android</button>
				<br>
				<br>
				<div class="middle container-fluid border-top border-info">
					<div class="text-left text-primary" style="font-size: 13px;">
						<br>
						<h4 class="text-info">Statistics</h4>
						<div>
							Players Online:
							<b>
								<a href="/online">
							<span class="text-info float-right">
								<?php echo playersOnline(); ?>
							</span>
								</a>
							</b>
						</div>
						<div>
							Server Status:
							<span class="float-right">
							<?php echo checkStatus("game.openrsc.com", "43594"); ?>
						</span>
						</div>
						<div>
							Registrations Today:
							<b>
								<a href="/registrationstoday">
								<span class="text-info float-right">
									<?php echo newRegistrationsToday(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Logins Today:
							<b>
								<a href="/loginstoday">
								<span class="text-info float-right">
									<?php echo loginsToday(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Unique Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo uniquePlayers(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Total Players:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalGameCharacters(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Gold:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo banktotalGold(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Time Played:
							<b>
								<a href="/stats">
								<span class="text-info float-right">
									<?php echo totalTime(); ?>
								</span>
								</a>
							</b>
						</div>
						<br>
					</div>

				</div>
			</div>

			<!-- Right column -->
			<div>
				<div class="side-right table-wrapper-scroll-y border-left border-info pr-1"
					 style="font-size: 13px;">
					<!-- Twitter feed -->
					<h4 class="mt-3 text-info" style="text-indent: 40px">Recent News</h4>
					<div class="text-primary" id="tweets"></div>
				</div>
			</div>
		</div>

		<?php } ?>

		<!-- Footer -->
		<!--<div class="bg-black text-white fixed-bottom social d-flex justify-content-center">
            <a href="#" class="mx-2">
                <i class="fab fa-reddit"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-discord"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-github"></i>
            </a>
        </div>-->
</section>

</body>
</html>
