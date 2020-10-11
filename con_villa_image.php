<?php
session_start();  
require ('db_params.php');
function guid( $opt = false ){
  if( function_exists('com_create_guid') ){
      if( $opt ){ return com_create_guid(); }
          else { return trim( com_create_guid(), '{}' ); }
  } else {
    mt_srand( (double)microtime() * 10000 );
    $charid = strtoupper( md5(uniqid(rand(), true)) );
    $hyphen = chr( 45 );    // "-"
    $left_curly = $opt ? chr(123) : "";     //  "{"
    $right_curly = $opt ? chr(125) : "";    //  "}"
    $uuid = $left_curly
            . substr( $charid, 0, 8 ) . $hyphen
            . substr( $charid, 8, 4 ) . $hyphen
            . substr( $charid, 12, 4 ) . $hyphen
            . substr( $charid, 16, 4 ) . $hyphen
            . substr( $charid, 20, 12 )
            . $right_curly;
   return $uuid;
  }
}


if ( !isset($_FILES['imgFilename']) || $_FILES['imgFilename']['name']=='') {
  header('Location: villa_image.php?msg=ERROR: Ελλιπή δεδομένα!');
  exit();
} else $filename= $_FILES['imgFilename']['name'];

//ελέγχοι για jpg και size μέχρι 500 kb.
$ext = strtolower(substr($filename, -3));
//μόνο jpg
if (($ext!=="jpg")) {
  header('Location: villa_image.php?msg=ERROR: Μη αποδεκτός τύπος αρχείου!');
  exit();
}

//Έλεγχος ότι το αρχείο δεν είναι μεγαλύτερο από 500 KB
$max_size=500;  
$size=filesize($_FILES['imgFilename']['tmp_name']);
if ($size > $max_size*1024) {
  header('Location: villa_image.php?msg=ERROR: Το αρχείο είναι μεγαλύτερο από το όριο!');
  exit();
}

$new_filename = guid().'.'.$ext;

 
$copyResult = copy($_FILES['imgFilename']['tmp_name'], 'image/'.$new_filename);
if (!$copyResult) {
  header('Location: villa_image.php?msg=ERROR: Η αντιγραφή του προσωρινού αρχείου απέτυχε!');
  exit();
} else {
  header('Location: villa_image.php?msg=Πετυχημένο upload!');
}

  
$namephoto=$new_filename;
 
$alt = $_POST['alt'];

$altlength = strlen($alt);
  if ($altlength > 80 || $altlength == 0 ) {
    header('Location: villa_image.php?msg=Η λεζάντα πρέπει να έχει μέχρι 80 χαρακτήρες και η λεζάντα δεν πρέπει να είναι κενή');
    exit();
  }

$villa_title = $_SESSION['title'];
$username_fk = $_SESSION['username'];
$pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
$pdoObject->exec('set names utf8');

$sql = 'INSERT INTO photo (namephoto,alt,villa_title,username_fk) VALUES (:namephoto,:alt,:villa_title,:username_fk)';
$statement = $pdoObject->prepare($sql);
$myresult = $statement->execute(array(
':namephoto' => $namephoto,
':alt' => $alt,
':villa_title' => $villa_title,
':username_fk' => $username_fk));

$statement->closeCursor();
$pdoObject = null;

?>