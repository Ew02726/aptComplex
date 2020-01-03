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
//if user is signed in.
else{
	if($_POST['sb']){
	//stores the session's user name in variable.
	$usr = $_SESSION['user_id'];
	$workId = rand(11,100000000);
	$d = $_POST['des'];
	$nam =$_POST['item'];
		
	
	//stores query in variable.
	$q = 'INSERT INTO rentWork(rentUser,id) VALUES(?,?);
	INSERT INTO workOrder(id,name,des) VALUES(?,?,?);';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$usr,PDO::PARAM_STR);
	$statement->bindValue(2,$workId,PDO::PARAM_STR);
	$statement->bindValue(3,$workId,PDO::PARAM_STR);
	$statement->bindValue(4,$nam,PDO::PARAM_STR);
	$statement->bindValue(5,$d,PDO::PARAM_STR);
	//executes the sql statement.
	$statement->execute();
	header('location:workOrder.php');
		die;
	}
}

?>