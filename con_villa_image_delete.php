<?php
    require ('db_params.php');
    
  if ( !isset( $_GET['file']) || $_GET['file']=='' ) {
    header('Location: villa_image.php?msg=ERROR: Ανεπαρκή δεδομένα για διαγραφή!');
    exit();
  }


  $filePath='image/';
  if ( !file_exists($filePath.$_GET['file']) ) {
    header('Location: villa_image.php?msg=ERROR: Δεν υπάρχει τέτοιο αρχείο στον φάκελο!');
    exit();
  }

  $namephoto=$_GET['file'];
  try {

$pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
$pdoObject->exec('set names utf8');
  $sql = 'DELETE FROM photo WHERE namephoto=:namephoto';
    $statement = $pdoObject->prepare($sql);
    $statement->execute(array(
      ':namephoto' => $namephoto));
    } catch (Exception $ex) {
        header('Location: editphotosgallery.php?msg = Αδύνατη η σύνδεση με τον server');
        exit();}

  $fileDelResult=unlink($filePath.$_GET['file']);
  if ($fileDelResult==true)
    $msg= 'Έγινε διαγραφή';
  else
    $msg= 'ERROR: Το αρχείο δεν διαγράφηκε!';
  header('Location: villa_image.php?msg='.$msg);
  exit();


?>