<?php
    require('db_params.php');
    session_start();

    $pool = 0;
    $gym = 0;
    $parking = 0;
    $sauna = 0;


    if (isset($_POST['pool'])){
        $pool=1;
    }

    if (isset($_POST['gym'])){
        $gym=1;
    }

    if (isset($_POST['parking'])){
        $parking=1;
    }

    if (isset($_POST['sauna'])){
        $sauna=1;
    }
    
    $addresslength = strlen($_POST['address']);
    if ($addresslength > 100 || $addresslength == 0) {
      header('Location: vila_insert.php?msg=Τοποθετήστε ξανά την διεύθυνση');
      exit();
    }

    $latitudelength = strlen($_POST['latitude']);
    if ($latitudelength > 10 ) {
      header('Location: vila_insert.php?msg=Τοποθε τήστε ξανά το γεωγραφικό πλάτος');
      exit();
    } 
    
    $longitudelength = strlen($_POST['longitude']);
    if ($longitudelength > 10 ) {
      header('Location: vila_insert.php?msg=Τοποθετήστε ξανά το γεωγραφικό μήκος');
      exit();
    }
  

    $phonelength = strlen($_POST['phone']);
  if ($phonelength > 10 || $phonelength <10) {
    header('Location: vila_insert.php?msg=ΤO νούμερο πρέπει να έχει 10 ψηφία.');
    exit();
  }

  $titlelength = strlen($_POST['title']);
  if ($titlelength > 50 || $titlelength < 0 ) {
    header('Location: vila_insert.php?msg=Το όνομα της βίλας πρέπει να έχει λιγότερο από 50 χαρακτήρες και τουλάχιστον 1 χαρακτήρα.');
    exit();
  }

  $nonearea = $_POST['area'];
  if ($nonearea == -1) { //Οσο το value στο selected
    header('Location: vila_insert.php?msg=Επιλέξτε έναν νομό.');
    exit();
  }

  $how_many_people =($_POST['people']);
  if ( $how_many_people > 1000 ||  $how_many_people <= 0) {
    header('Location: vila_insert.php?msg=προέκυψε λάθος με τα άτομα που μπορούν να φιλοξενηθούν.');
    exit();
  }
    $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject->exec('set names utf8');
    $sql = 'INSERT INTO villa (title,address,area,phone,people,rating,pool,gym,parking,sauna,usernamefk,latitude,longitude) VALUES (:title,:address,:area,:phone,:people,:rating,:pool,:gym,:parking,:sauna,:username,:latitude,:longitude)';
    //prepare επειδή έρχονται παράμετροι από εξωτερικό χρήστη
    $statement = $pdoObject->prepare($sql);
    $myresult = $statement->execute(array(
    ':title' => $_POST['title'],
    ':address' => $_POST['address'],
    ':area' => $_POST['area'],
    ':phone' => $_POST['phone'],
    ':people' => $_POST['people'],
    ':rating' => $_POST['rating'],
    ':pool' => $pool,
    ':gym' => $gym,
    ':parking' => $parking,
    ':sauna' => $sauna,
    ':username' => $_SESSION['username'],
    ':latitude' => $_POST['latitude'],
    ':longitude' => $_POST['longitude'])); //για να μην βάζουν διπλές εγγραφές έχει γίνει uQ στο workbench
                    
$statement->closeCursor();
$pdoObject = null;

if ($myresult==true) {
    // αν εκτελέστηκε ΟΚ η εντολή
    header('Location: vila_insert.php?msg=Επιτυχής καταχώρηση!');
    exit();
} else {
     // αν ΔΕΝ εκτελέστηκε
    header('Location: vila_insert.php?msg=ΠΡΟΒΛΗΜΑ! Δεν έγινε καταχώρηση ή έχετε κάνει ήδη μια καταχώρηση!');
    exit();
        }

if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
}

if(!$captcha){
  echo '<h2>Please check the the captcha form.</h2>';
  exit;
}
$secretKey ="6LdsYvgUAAAAAKlHHR0uQjiBT_d7LBeg9L6ouI2q";

$ip = $_SERVER['REMOTE_ADDR'];
// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
$response = file_get_contents($url);
$responseKeys = json_decode($response,true);
// should return JSON with success as true
if($responseKeys["success"]) {
  echo '<h2>Thanks</h2>';
} else {
  echo '<h2>κάτι πήγε λάθος</h2>';
  }
          
?>  