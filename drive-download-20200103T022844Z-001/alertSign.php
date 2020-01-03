<?php 
include('connetDB.php');
session_start();
$usr = $_SESSION['user_id'];
if($_POST['e']){
	$email = $_POST['email'];
	$q = 'UPDATE renters SET email = ? WHERE renterUser = ?;';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$email,PDO::PARAM_STR);
	$statement->bindValue(2,$usr,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	header('location:rentHome.php');
}
?>