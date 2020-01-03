<?php
include('rentH.php');

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script type="text/javascript">
			document.getElementById('em').hidden = "true";
		var email = "<?php echo $eml?>";
		if (email == null){
			document.getElementById("me").style.visibility = "hidden";
		}
			else{
				document.getElementById("em").style.visibility = "hidden";
			}
			
		</script>
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="welcome.php">Apartment Portal</a> Home Page</h1>
					<nav id="nav">
						<ul>
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2><?php echo "Welcome ".$first ." " .$last ." !";?></h2>
					<p></p>
					<ul class="actions special">
						<li><a href="makePayments.php" class="button primary">Make Payment</a></li>
						<li><a href="payHistory.php" class="button">Payment History</a></li>
						<li><a href="workOrder.php" class="button">Work Order</a></li>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Announcements</h2>
							<p>November 20 - PIZZA PARTY!!!<br />
							Come join us for an evening full of fun! Free pizza from Papa Johns. We look forward to seeing everyone.</p>
						</header>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>

					<section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon solid major fa-bolt accent2"></span>
								<h3>Save Power</h3>
								<p>Remember to turn heater off when opening windows. This will help save on the electricty bill.</p>
							</section>
							<section>
								<span class="icon solid major fa-chart-area accent3"></span>
								<h3>Door Prize</h3>
								<p>Judges will be coming around December 20th to pick the best Christmas door. Good Luck</p>
							</section>
						</div>
						<div class="features-row">
							<section>
								<span class="icon solid major fa-cloud accent4"></span>
								<h3>Weather</h3>
								<p>This month's forecast calls for stormy weather. Stay safe!</p>
							</section>
							<section>
								<span class="icon solid major fa-lock accent5"></span>
								<h3>Caution</h3>
								<p>Please remember to keep your apartment doors locked at all times. </p>
							</section>
						</div>
					</section>

			<!-- CTA -->
				<section id="cta">
				<div id="em" style="block">
					<h2>Sign up for Alerts!</h2>
					<p>Keep up to date on what is happening in the neighborhood!</p>

					<form action="alertSign.php" method="POST">
						<div class="row gtr-50 gtr-uniform">
							
							<div class="col-8 col-12-mobilep">
								<input type="email" name="email" id="email" placeholder="Email Address" />
							</div>
							<div class="col-4 col-12-mobilep">
								<input type="submit" name="e" value="Sign Up" class="fit" />
							</div>
								</div>
						</div>
					<div id="me" hidden="true" style="none">
					<h2>You are already signed up for text alerts.</h2>
					</div>
					</form>

				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
						<li><a href="#" class="icon brands fa-google-plus"><span class="label">Google+</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>