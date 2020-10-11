<?php
  session_start(); 
  if (!isset($_SESSION['username'])) {
     header("Location: index.php?msg=κάτι πήγε λάθος!");
     exit();
  }   
  if (!isset($_SESSION['title'])) {
    header("Location: index.php?msg=κάτι πήγε λάθος!");
    exit();
 }   
 ?>