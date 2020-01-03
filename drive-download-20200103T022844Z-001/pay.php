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
	if($_POST['sb']){
	//stores the session's user name in variable.
	$usr = $_POST['uName'];
	$pId = rand(1,100000000);
	$d = $_POST['desc'];
	$pName =$_POST['pName'];
	$pCost =$_POST['cost'];
	$date = $_POST['da'];
	$p = "false";
		
	
	//stores query in variable.
	$q = 'INSERT INTO rentPay(renterUser,payID) VALUES(?,?);
	INSERT INTO payments(payID,payName,payCost,payDesc,payDate,paid) VALUES(?,?,?,?,?,?);';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$usr,PDO::PARAM_STR);
	$statement->bindValue(2,$pId,PDO::PARAM_STR);
	$statement->bindValue(3,$pId,PDO::PARAM_STR);
	$statement->bindValue(4,$pName,PDO::PARAM_STR);
	$statement->bindValue(5,$pCost,PDO::PARAM_STR);
	$statement->bindValue(6,$d,PDO::PARAM_STR);	
	$statement->bindValue(7,$date,PDO::PARAM_STR);
	$statement->bindValue(8,$p,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	header('location:postPayments.php');
		die;
	}
}

?>