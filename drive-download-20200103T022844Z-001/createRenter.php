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
	if($_POST['create']){
	//stores the session's user name in variable.
	
	$usr = $_POST['rentUsr'];
	$pass = $_POST['rentP'];
	$pass2 = $_POST['rentP2'];
	$first = $_POST['rentFirst'];
	$last = $_POST['rentLast'];
	$apt = $_POST['aNum'];
		
	if($pass == $pass2){
	//stores query in variable.
	$q = 'INSERT INTO renters(renterUser,renterPass,renterFirst,renterLast,aptNum) VALUES(?,?,?,?,?);';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$usr,PDO::PARAM_STR);
	$statement->bindValue(2,$pass,PDO::PARAM_STR);
	$statement->bindValue(3,$first,PDO::PARAM_STR);
	$statement->bindValue(4,$last,PDO::PARAM_STR);
	$statement->bindValue(5,$apt,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	}
	}
	
	header('location: newUser.php');
}

