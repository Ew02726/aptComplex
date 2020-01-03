
<?php
//need this to connect to database.
include('connetDB.php');
//need this to continue session.
session_start();
//checks to see if the user has signed.
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
	//will send user back to sign-in.
	header('location:rentSign.php');
	exit;
}
//if user is signed in.
else{
	//stores the session's user name in variable.
	$usr = $_SESSION['user_id'];
	//stores query in variable.
	$q = 'SELECT renterFirst, renterLast, email FROM renters;';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$usr,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	//fetch the data from the database.
	$row = $statement->fetch();
	
	$first = $row['renterFirst'];
	$last = $row['renterLast'];
	$eml = $row['email'];
}
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Work Order</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="welcome.php">Apartment Portal</a> Work Orders</h1>
					<nav id="nav">
						<ul>
							<li><a href="rentHome.php">Home</a></li>
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<h2>Work Order</h2>
					<p>Call us or…screw it up yourself.</p>
				</section>
			
			<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Current Work Orders</h2><br />
							<p>
							<?php 
								$q = 'Select name FROM workOrder WHERE id = ANY(SELECT id FROM rentWork WHERE rentUser = ?);';
								//prepares sql statement.
								$statement = $conn->prepare($q);
								//bind the values to the statement.
								$statement->bindValue(1,$usr,PDO::PARAM_STR);
								//executes the sql statement.
								$statement->execute();
								$row = $statement->fetchAll();
								
								if($row != null){
									echo "<table>
									<tr>
									<th><center>NO.</center></th>
									<th><center>Name</center></th>
									</tr>";
									
									$i = 1;
									foreach($row as $r){
									echo "<tr>";
										echo "<td>" .$i ."</td>";
										echo "<td>" .$r['name'] ."</td>";
										echo "</tr>";
										$i = $i + 1;
									}
									echo "</table>";								
								}
								
								?>
							</p>
						</header>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>

			<!-- CTA -->
				<section id="cta">

					<h2>Work Order Form</h2>
					<form action="work.php" method="POST">
						
							<div class="col-8 col-12-mobilep">
								<input type="text" name="fName" placeholder="First Name" />
							</div><br>
							<div class="col-8 col-12-mobilep">
								<input type="text" name="lName" placeholder="Last Name" />
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="item" placeholder="What is broken?" />
							</div><br>
							<div class="col-8 col-12-mobilep">
								<textarea name="des" placeholder="Type problem here..." ></textarea>
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