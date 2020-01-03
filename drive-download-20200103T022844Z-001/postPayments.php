
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
else{
	//stores the session's user name in variable.
	$usr = $_SESSION['user_id'];
	//stores query in variable.
	$q = 'SELECT adminFirst, adminLast FROM admins;';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$usr,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	//fetch the data from the database.
	$row = $statement->fetch();
	
	$first = $row['adminFirst'];
	$last = $row['adminLast'];
}
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Post Payments</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="welcome.php">Apartment Portal</a> Post Payments</h1>
					<nav id="nav">
						<ul>
							<li><a href="homePage.php">Home</a></li>
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Post New Payments</h2>
				</section>
			
			<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Posted Payments</h2><br />
							<p>
							<?php 
								$q = 'Select r.renterFirst, r.renterLast, p.payID, p.payName, p.payDate, p.payCost, p.payDesc FROM payments p,rentPay y,renters r where p.payID = y.payID AND y.renterUser = r.renterUser;';
								//prepares sql statement.
								$statement = $conn->prepare($q);
								//bind the values to the statement.
								//executes the sql statement.
								$statement->execute();
								$row = $statement->fetchAll();
								
								if($row != null){
									echo "<table>
									<tr>
									<th><center>NO.</center></th>
									<th><center>First Name</center></th>
									<th><center>Last Name</center></th>
									<th><center>Renter</center></th>
									<th><center>Cost</center></th>
									<th><center>Date</center></th>
									</tr>";
									
									$i = 1;
									foreach($row as $r){
									echo "<tr>";
										echo "<td>" .$i ."</td>";
										echo "<td>" .$r['payName'] ."</td>";
										echo "<td>" .$r['renterFirst'] ."</td>";
										echo "<td>" .$r['renterLast'] ."</td>";
										echo "<td>" .$r['payCost'] ."</td>";
										echo "<td>" .$r['payDate'] ."</td>";
										echo "</tr>";
										$i = $i + 1;
									}
									echo "</table>";								
								}
								
								?>
							</p>
						</header>
						<span class="image featured"></span>
					</section>

			<!-- CTA -->
				<section id="cta">

					<h2>Post Payment Form</h2>
					<form action="pay.php" method="POST">
						
							<div class="col-8 col-12-mobilep">
								<input type="text" name="uName" placeholder="UserName" />
							</div><br>
							<div class="col-8 col-12-mobilep">
								<input type="text" name="pName" placeholder="Payment Name" />
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="cost" placeholder="Payment Cost" />
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="da" placeholder="Due Date" />
							</div><br>
							<div class="col-8 col-12-mobilep">
								<textarea name="desc" placeholder="Payment Description"></textarea>
							</div>
							
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