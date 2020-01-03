
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
	$petId = $_POST['petId'];
    $rentId = $_POST['renterUser'];
	$nam =$_POST['petName'];
	$d = $_POST['breed'];
	$act = $_POST['active'];
		
   // $query = 'SELECT renterUser FROM renters WHERE renterUser = .$rentId;';
        
     //   $statement = $conn->prepare($query);
       // $statement->bindValue(1,$query,PDO::PARAM_STR);
        //$statement->execute();
        
       // if(mysqli_num_rows($query) != 0)//You are mixing the mysql and mysqli, change this line of code
         // {
          // echo"name already exists";
            //  exit('not valid userName');
         // }
        //else
           //{
        
	//stores query in variable.
        $q = 'INSERT INTO pets(petId,petName, breed, active) VALUES(?,?,?,?);';
        //prepares sql statement.
        $statement = $conn->prepare($q);
        //bind the values to the statement.
        $statement->bindValue(1,$petId,PDO::PARAM_STR);
        $statement->bindValue(2,$nam,PDO::PARAM_STR);
        $statement->bindValue(3,$d,PDO::PARAM_STR);
        $statement->bindValue(4,$act,PDO::PARAM_STR);
      
        //$statement->bindValue(5,$q,PDO::PARAM_STR);
       //executes the sql statement.
        $statement->execute();
       
        //stores query in variable.
       $q = 'INSERT INTO rentPets(renterUser,petId) VALUES(?,?);';
    //prepares sql statement.
    $statement = $conn->prepare($q);
        
	//bind the values to the statement.
	$statement->bindValue(1,$rentId,PDO::PARAM_STR);
    $statement->bindValue(2,$petId,PDO::PARAM_STR);
	//$statement->bindValue(3,$q,PDO::PARAM_STR);
  
	//executes the sql statement.
	$statement->execute();
        //$q = 'INSERT INTO othertable(whatever) VALUES(?)
        //$statement  = $conn->prepare($q)
        //$statement->bindvalue(1,$petId,PDO::PARAM_STR)
        //$statement->execute
	header('location:pets.php');
		die;
	}

}
?>
