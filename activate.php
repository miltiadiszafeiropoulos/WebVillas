<?php
session_start();  
require 'db_params.php';

$code=$_POST['code'];
$username=$_POST['username'];
$password=$_POST['password'];
$hashed = crypt($password,'$6$aek159951'); 

$passwordlength = strlen($password);
  if ($passwordlength < 8) {
    header('Location: activate_form.php?msg=O Κωδικός πρέπει να είναι μεγαλύτερος απο 8 χαρακτήρες');
    exit();
  }
  $codelength = strlen($code);
  if($codelength != 5){
    header('Location: activate_form.php?msg=O Κωδικός πρέπει να είναι 5 χαρακτήρες');
    exit();
  }
 
$pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
$pdoObject->exec('set names utf8');
$sql = 'UPDATE account SET activate=1 WHERE code=:code and username=:username and password=:password';
// Κάνουμε το activate από 0 σε 1 για να ξέρουμε ότι ο χρήστης ενεργοποιήσε τον λογαριασμό
$statement = $pdoObject->prepare($sql);

$myresult = $statement->execute(array(
 ':code' => $code,
 ':password' => $hashed,
 ':username' =>$username));

 $count = $statement->rowCount();  

  if($count > 0 )  
  {  
    $_SESSION['code'] = $code; 
    header('location:index.php');  
  }  
  else  
  {  
    header('Location: activate_form.php?msg=ΠΡΟΒΛΗΜΑ! Δεν έγινε σύνδεση!');     
  }  
?>
