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
        
        $q = 'SELECT adminUser, adminPass FROM admins WHERE adminUser = ? AND adminPass = ?';
        $statement = $conn->prepare($q);
        $statement->bindValue(1,$usr,PDO::PARAM_STR);
        $statement->bindValue(2,$pass,PDO::PARAM_STR);
        $statement->execute();
        $row = $statement->fetch();
        
        
        echo $row;
        if($row['adminUser'] != $usr || $row['adminPass'] != $pass){
            header('location:adminSign.php');
            die('INCORRECT PASSWORD/USERNAME.');
        }
        else{
            
            $vp = true;
            
            if($vp){
                $_SESSION['user_id'] = $row['adminUser'];
				$_SESSION['type'] = "admin";
                $_SESSION['logged_in'] = time();
                header('location:homePage.php');
                exit;
            }
            else{
                header('location:adminSign.php');
                die('INCORRECT PASSWORD/USERNAME.');
            }
        }
        
    
    }
    
    
}
?>
