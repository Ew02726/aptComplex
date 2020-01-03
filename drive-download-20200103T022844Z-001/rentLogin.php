<?php
include('connetDB.php');
//variables for the forms.
session_start();
if(isset($_POST['sb'])){
    
    $usr = $_POST['usrName'];
    $pass = $_POST['password'];
    
    if(empty($usr) || empty($pass)){
        $message = '<label> Fill out the form.</label>';
        echo $message;
    }
    else{
        
        $q = 'SELECT renterUser, renterPass FROM renters WHERE renterUser = ? AND renterPass = ?';
        $statement = $conn->prepare($q);
        $statement->bindValue(1,$usr,PDO::PARAM_STR);
        $statement->bindValue(2,$pass,PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();
        
        
        echo $row;
        if($row['renterUser'] != $usr || $row['renterPass'] != $pass){
            header('location:rentSign.php');
            die('INCORRECT PASSWORD/USERNAME.');
        }
        else{
            
            $vp = true;
            
            if($vp){
                $_SESSION['user_id'] = $row['renterUser'];
				$_SESSION['type'] = "renter";
                $_SESSION['logged_in'] = time();
                header('location:rentHome.php');
                exit;
            }
            else{
                header('location:rentSign.php');
                die('INCORRECT PASSWORD/USERNAME.');
            }
        }
        
    
    }
    
    
}
?>
