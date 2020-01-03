<?php
//need this to connect to database.
include('connetDB.php');
//need this to continue session.
session_start();
//checks to see if the user has signed.
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
	//will send user back to sign-in.
	header('location:adminSign.php');
	exit;
}
//if user is signed in.
else{
	if($_POST['sb']){
	//stores the session's user name in variable.
	$wID = $_POST['workID'];
		
	//stores query in variable.
	$q = 'DELETE FROM rentWork WHERE id = ?;
	DELETE FROM workOrder WHERE id = ?;';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$wID,PDO::PARAM_STR);
	$statement->bindValue(2,$wID,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	header('location:workAdmin.php');
		die;
	}
	}


?>