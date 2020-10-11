<?php
session_start();  
require('db_params.php');

$password=$_POST['password'];
$username=$_POST['username'];
$activate=1;
$hashed = crypt($password,'$6$aek159951'); 
  $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
  $pdoObject->exec('set names utf8');
  $sql = 'SELECT * FROM account WHERE username=:username and password=:password and activate=:activate';
  $statement = $pdoObject->prepare($sql);
  $myresult = $statement->execute(array(
    ':username' => $username,
    ':password' => $hashed,
    ':activate' => $activate));
    
    //rowcount επιστρέφει το πλήθος των εγγραφών που επηρέασε 'επέλεξε,μετέβαλε,διέγραψε.
    $count = $statement->rowCount();  
    if($count > 0)  
    {  
         $_SESSION['username'] = $username;
         header('location:index.php?msg= έγινε σύνδεση!');  
    }  
    else  
    {  
      header('Location: login.php?msg=ΠΡΟΒΛΗΜΑ! Δεν έγινε σύνδεση!');     
    }  
   
?>