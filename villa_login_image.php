<?php
    session_start();
    require ('db_params.php');

 $usernamefk = $_SESSION['username'];
 $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
 $sql = 'SELECT title FROM villa where usernamefk=:usernamefk';
 $statement = $pdoObject -> prepare($sql);
 $statement->execute( array(
    ':usernamefk' => $usernamefk));
 
if ( $record = $statement -> fetch() ) {
    $_SESSION['title'] = $record['title'];
    header('Location:villa_image.php?'); 
 }  
 else  
 {  
   header('Location: index.php?msg=Πρέπει να καταχωρήσεις πρώτα την βίλα!');     
 }  

?>
