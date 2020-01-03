<?php
//need this to connect to database.
include('connetDB.php');
//need this to continue session.
session_start();
//checks to see if the user has signed.
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || $_SESSION['type'] != "renter"){
	//will send user back to sign-in.
	header('location:rentSign.php');
	exit;
}
else{
	$usr = $_SESSION['user_id'];
}
//if user is signed in.


?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Payments</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="welcome.php">Apartment Portal</a>Make Payments</h1>
					<nav id="nav">
						<ul>
							<li><a href="rentHome.php">Home</a></li>
							
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<section id="main" class="container medium">
					<header>
						<h2>Payments</h2>
					</header>
					<div class="box">
						<?php
						$q = 'Select* FROM payments WHERE paid = "false" AND payID= Any(SELECT payID FROM rentPay WHERE renterUser =?);';
								//prepares sql statement.
								$statement = $conn->prepare($q);
								$statement->bindValue(1,$usr,PDO::PARAM_STR);
								//executes the sql statement.
								$statement->execute();
								$row = $statement->fetchAll();
								
								if($row != null){
									echo "<table>
									<tr>
									<th><h3>ID</h3></th>
									<th><h3>Name</h3></th>
									<th><h3>Description</h3></th>
									<th><h3>Cost</h3></th>
									<th><h3>Date</h3></th>
									</tr>";
									
									foreach($row as $r){
									echo "<tr>";
										echo "<td>" .$r['payID'] ."</td>";
										echo "<td>" .$r['payName'] ."</td>";
										echo "<td>" .$r['payDesc'] ."</td>";
										echo "<td>" .$r['payCost'] ."</td>";
										echo "<td>" .$r['payDate'] ."</td>";
										echo "</tr>";
									}
									echo "</table>";								
								}
								
								?>
						
					</div>
						
					
					</section>
				<section id="cta">

					<h2>Post Payment Form</h2>
					<form action="makeP.php" method="POST">
						
							<div class="col-8 col-12-mobilep">
								<input type="text" name="id" placeholder="ID" />
							</div><br>
							<div class="col-8 col-12-mobilep">
								<input type="text" name="cardNum" placeholder="Card Number" />
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="code" placeholder="Security Code" />
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="am" placeholder="Amount" />
							</div><br>
							
						<div class="col-4 col-12-mobilep"><br>
								<input type="submit" name="sb" value="Submit" class="fit" />
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