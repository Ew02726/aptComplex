<?php
//need this to connect to database.
include('connetDB.php');
//need this to continue session.
session_start();
//checks to see if the user has signed.
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || $_SESSION['type'] != "admin"){
	//will send user back to sign-in.
	header('location:adminSign.php');
	exit;
}
//if user is signed in.


?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Work Orders</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="welcome.php">Apartment Portal</a> Work Orders</h1>
					<nav id="nav">
						<ul>
							<li><a href="homePage.php">Home</a></li>
							
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Work Orders</h2>
						<p>Work still waiting to be finished.</p>
					</header>
					<div class="box">
						<?php
						$q = 'Select* FROM workOrder;';
								//prepares sql statement.
								$statement = $conn->prepare($q);
								//executes the sql statement.
								$statement->execute();
								$row = $statement->fetchAll();
								
								if($row != null){
									echo "<table>
									<tr>
									<th><h3>NO.</h3></th>
									<th><h3>Name</h3></th>
									<th><h3>Description</h3></th>
									</tr>";
									
									foreach($row as $r){
									echo "<tr>";
										echo "<td>" .$r['id'] ."</td>";
										echo "<td>" .$r['name'] ."</td>";
										echo "<td>" .$r['des'] ."</td>";
										echo "</tr>";
									}
									echo "</table>";								
								}
								
								?>
						
					</div>
					<div class="box">
						<center><h1>Finished Work Order Check Off</h1></center>
						<form method="post" action="adminWork.php">
							
							<div class="row gtr-50 gtr-uniform">
								<div class="col-12">
									<input type="text" name="workID" id="subject" value="" placeholder="NO." />
								</div>
								<div class="col-12">
									<ul class="actions special">
										<li><input type="submit" name="sb" value="Finished" /></li>
									</ul>
								</div>
							</div>
						</form>
					</div>
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