<?php
require('db_params.php');


// έλεγχος το password να έχει μόνο χαρακτήρες ή κάτω παύλα
$password=trim($_POST['password']);//trim για τα κενά αν τυχόν έβαλαν καταλάθος 
$username=trim($_POST['username']);//trim για τα κενά αν τυχόν έβαλαν καταλάθος
$email=trim($_POST['email']);//trim για τα κενά αν τυχόν έβαλαν καταλάθος


$patern_name = '/^[a-zA-Z0-9_]+$/';
  if(!preg_match($patern_name,$password)) {
    header('Location: register.php?msg=O Κωδικός πρέπει να έχει χαρακτήρες ή κάτω παύλα "_"');
    exit();
  }

$passwordlength = strlen($_POST['password']);
  if ($passwordlength < 8) {
    header('Location: register.php?msg=O Κωδικός πρέπει να είναι μεγαλύτερος απο 8 χαρακτήρες');
    exit();
  }
  
//κρυπτογραφημένο
$hashed = crypt($password,'$6$aek159951'); 

$code=rand(10000, 99999);//το activation code ένα random 5-ψήφιο νούμερο.


try {
    $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject->exec('set names utf8');
     $sql = 'INSERT INTO account (username,password,email,code) VALUES (:username,:password,:email,:code)';
//prepare επειδή έρχονται παράμετροι από εξωτερικό χρήστη
    $statement = $pdoObject->prepare($sql);
    $myresult = $statement->execute(array(
    ':username' => $username,
    ':password' => $hashed,
    ':email' => $email,
    ':code' => $code));
                
    $statement->closeCursor();
    $pdoObject = null;

    
    if ($myresult==true) {
       // verification code στέλνουμε στον χρήστη
       $me = "mzafeiropoulos10000@gmail.com";
       $to = $_POST['email'];
       $subject = "Verification Code";
       $body = $code;
       $headers = 'From: ' .$me . "\r\n".'Reply-To: ' . $to. "\r\n".'X-Mailer: PHP/';
       if (mail($to, $subject, $body, $headers)) echo("<p>Email successfully sent</p>");
       else echo("<p>Email delivery failed</p>");
      
      // αν εκτελέστηκε ΟΚ η εντολή
        header('Location: activate_form.php?msg=Επιτυχής εγγραφή!');//να τον οδηγήσουμε στο Login
        exit();
      } else {
        // αν ΔΕΝ εκτελέστηκε
        header('Location: register.php?msg=ΠΡΟΒΛΗΜΑ! Δεν έγινε εγγραφή!');
        exit();
      }

     } catch (PDOException $e) {
        echo('Location: register.php?msg=PDO Exception: '.$e->getMessage());
        exit();
        }

// έλεγχος recaptcha
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