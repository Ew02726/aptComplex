
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

?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>Pets</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header" class="alt">
					<h1><a href="welcome.php">Apartment Portal</a> Pets</h1>
					<nav id="nav">
						<ul>
							<li><a href="homePage.php">Home</a></li>
							<li><a href="logout.php" class="button">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->

				<section id="banner">
					<h2>Admin - Pets</h2>
					<p>Pets in Complex</p>
				</section>
			
			<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Current Pets</h2><br />
							<p>
							<?php
                                
                                $q = 'Select pets.petId, pets.petName, pets.breed, pets.active, rentPets.renterUser FROM pets join rentPets on rentPets.petId = pets.petId';
                                
                                $statement = $conn->prepare($q);
                                //bind the values to the statement.
                                $statement->bindValue(1,$q,PDO::PARAM_STR);
                                //executes the sql statement.
                                $statement->execute();
                                
                                $row2 = $statement->fetchAll();
								
								if($row2 != null){
									echo "<table>
									<tr>
									<th><center>petId</center></th>
									<th><center>PetName</center></th>
                                    <th><center>Breed</center></th>
                                    <th><center>Active</center></th>
                                    <th><center>renterUser</center></th>
                                    
                                   
									</tr>";
									
                                   
                                    foreach($row2 as $r){
                                        
									echo "<tr>";
										
										echo "<td>" .$r['petId'] ."</td>";
                                        
                                        echo "<td>" .$r['petName'] ."</td>";
                                        echo "<td>" .$r['breed'] ."</td>";
                                        echo "<td>" .$r['active'] ."</td>";
                                        
									
                                        echo "<td>" .$r['renterUser']."</td>";
                                        
                                        echo "</tr>";
                                        
                                    }
                                    echo "</table>";
                                }
								?>
                


        <div><br>
            <input type="submit" name="tb" value="Remove Pet" onclick="return foo();" />
        </div>

<script>
function foo(){
    alert("click click bitch");
     return true;

}

</script>

<span class="image featured"><img src="images/pet.jpg" alt="" / height = "250" width = "200">
							</p>
						</header>
						</span>
					</section>

			<!-- CTA -->
				<section id="cta">

					<h2>Add Pets</h2>


					<form action="pet.php" method="POST">
						
							<div class="col-8 col-12-mobilep">
								<input type="text" name="petId" placeholder="Pet Id" /required>
							</div><br>
                            

    
                        <div class="col-8 col-12-mobilep">
                            <input type="text" name="renterUser" placeholder="Renter UserName" /required>
                        </div><br>

							<div class="col-8 col-12-mobilep">
								<input type="text" name="petName" placeholder="Pet Name" /required>
							</div><br>
						<div class="col-8 col-12-mobilep">
								<input type="text" name="breed" placeholder="Breed" / required>
							</div><br>
							<div class="col-8 col-12-mobilep">
								<input type="text" name="active" placeholder="t/f"  required/>
							</div>
							
						<div class="col-4 col-12-mobilep"><br>
								<input type="submit" name="sb" value="Add Pet" class="fit" />
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
