<?php 
include('connetDB.php');
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
	$pId = $_POST['id'];
	$cn = $_POST['cardNum'];
	$sc =$_POST['code'];
	$amount =$_POST['am'];
	$p = "true";
	
		
	//if(strlen($cn, "UTF-8") == 16 && strlen($sc, "UTF-8") == 3) {
	//stores query in variable.
	$q = 'Select payID, payCost from payments where payID = ?;';
	//prepares sql statement.
	$statement = $conn->prepare($q);
	//bind the values to the statement.
	$statement->bindValue(1,$id,PDO::PARAM_STR);
	
	//executes the sql statement.
	$statement->execute();
	$row = $statement->fetch();
	
	
		if($amount == $row['payCost']){
			$query = 'UPDATE payments SET paid = ? WHERE payID = ?;';
			$s = $conn->prepare($query);
			$s->bindValue(1,$p,PDO::PARAM_STR);
			
			$s->bindValue(3,$pId,PDO::PARAM_STR);
			$s->execute();
		}
	
		
	
	//}
		header('location:makePayments.php');
		die;
	}
	
}

?>