
<?php
//includes the database credentials.
include('database.php');
try{
	//connets to the database.
	$conn = new PDO("mysql:host:$dbHost;dbname:$db",$dbUserName,$dbPassword);
	//sets error mode to exceptions.
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	//if database does not connect.
	echo $e->getMessage();
}

//query to use database.
$conn->query("use aptComplex");
