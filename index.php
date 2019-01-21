<?php
include "inc/header.php";
?>

<!-- Title Section -->
<section id="home" class="text-white">
	<div class="pl-0 pr-0 pt-0">
		<div class="row" style="margin-left: 0px; margin-right: 0px;">

			<?php
			if (curPageURL() != "" && !is_array(curPageURL()) && curPageURL() != 'index') {
				if (file_exists("pages/" . curPageURL() . ".php")) {
					?>
					<div class="panel position-fixed table-wrapper-scroll-y">
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
			<div class="side-left table-wrapper-scroll-y text-left text-info border-right border-info">
				<h4 class="pl-3 pr-3">Latest Achievements</h4>
				<?php activityfeed() ?>
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
				<a class="pc btn btn-dark btn-outline-info btn-link" href="#" role="button">PC Client</a>
				<button type="button" class="mobile btn btn-dark text-primary btn-outline-info">Android</button>
				<br>
				<br>
				<div class="middle container-fluid border-top border-info">
					<div class="text-left text-primary small">
						<br>
						<h4 class="text-info">Statistics</h4>
						<div>
							Players Online:
							<b>
								<a href="online">
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
								<a href="registrationstoday">
								<span class="text-info float-right">
									<?php echo newRegistrationsToday(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Online Last 48 Hours:
							<b>
								<a href="logins48">
								<span class="text-info float-right">
									<?php echo logins48(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Unique Players:
							<b>
								<a href="stats">
								<span class="text-info float-right">
									<?php echo uniquePlayers(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Total Players:
							<b>
								<a href="stats">
								<span class="text-info float-right">
									<?php echo totalGameCharacters(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Sum Gold:
							<b>
								<a href="stats">
								<span class="text-info float-right">
									<?php echo banktotalGold(); ?>
								</span>
								</a>
							</b>
						</div>
						<div>
							Cumulative Play:
							<b>
								<a href="stats">
								<span class="text-info float-right">
									<?php echo totalTime(); ?>
								</span>
								</a>
							</b>
						</div>
						<br>
					</div>

					<?php include "inc/footer.php"; ?>

				</div>
			</div>

			<!-- Right column -->
			<div class="side-right table-wrapper-scroll-y border-left border-info">
				<!-- Twitter feed -->
				<h4 class="mt-3 text-info">Recent News</h4>
				<div class="text-primary small" id="tweets"></div>
			</div>
		</div>

		<?php } ?>
</section>

</body>
</html>
