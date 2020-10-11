<?php

  // αν δεν υπάρχουν οι παράμετροι που θέλουμε ανακατευθύνουμε, π.χ. στη home
  if ( !isset($_GET['style']) ) {
    header('Location: index.php');
    exit();
  }
  
  
  //Ακολουθεί (στο switch) o προσδιορισμός του css με βάση την επιλογή του χρήστη
  //  το $_GET['style'] έχει ελεγχθεί ότι υπάρχει στο αρχικό if
  switch ($_GET['style']) {  
    case '1':
      $style = 'css/villacss.css';
      break;  
    case '2':
      $style = 'css/villacss2.css';
      break;  
    default:
      // η default επιλογή μας καλύπτει στην περίπτωση που στο URL έρθει
      // για απροσδιόριστο λόγο τιμή δισφορετική από τις προβλεπόμενες 1 ή 2.
      $style = 'css/villacss.css';
  }

  //Διαγραφή παλαιού cookie (αφού πρώτα ελέγξουμε ότι υπάρχει!).
  //Η διαγραφή γίνεται βάζοντας ημ/νία λήξης στο παρελθόν και τιμή ''
  //Σύνταξη: setcookie( <όνομα cookie>, <τιμή cookie>, <ημ/νία λήξης>)
  //Εδώ δεν είναι απαραίτητο να κάνουμε διαγραφή καθώς μετά δίνουμε νέα
  //τιμή στο ίδιο cookie, άρα το παλιό εκ των πραγματων θα καταργηθεί.
  //Μια ασφαλής ημερομηνία στο παρελθόν είναι τουλάχιστον μία μέρα πριν.
  //Εδώ δίνεται ΤΩΡΑ μείον μία ώρα (σε sec)
  if (isset($_COOKIE['css']))
    setcookie ('css', '', time()-86400);

  //έστω μια νέα ημ/νία λήξης, 120 μέρες μετά
  $expire=  time() + 120*24*60*60;

  //βάζουμε το νέο cookie στον browser του χρήστη
  setcookie( 'css', $style, $expire);

  //στέλνουμε header ανακατεύθυνσης προς την αρχική σελίδα
  header('Location: index.php');
  exit();

 ?>
 