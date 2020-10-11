<?php
 $dbhost='localhost';
 $dbname='webvillas';
 $dbuser='webvillasuser';   
 $dbpass='aek159951';   

try{
   $conn = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
}catch(PDOException $e){
   die('Unable to connect with the database');
}

if(isset($_POST['username'])){
   $username = $_POST['username'];

   $stmt = $conn->prepare("SELECT count(*)  FROM account WHERE username=:username");
   $stmt->bindValue(':username', $username, PDO::PARAM_STR);
   $stmt->execute(); 
   $count = $stmt->fetchColumn();

   $response = "<span style='color: green;'>Διαθέσιμο-Available.</span>";
   if($count > 0){
      $response = "<span style='color: red;'>ΟΧΙ διαθέσιμο-Not Available.</span>";
   }

   echo $response;
   exit;
}
?>