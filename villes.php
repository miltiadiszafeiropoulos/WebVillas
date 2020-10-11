<?php
    session_start();
    require 'db_params.php';
    include 'layout/header.php';

    $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
    $pdoObject->exec('set names utf8');
    $sql = 'SELECT * FROM villa';
    $statement = $pdoObject->query($sql);

    while ( $record = $statement -> fetch() ) {
        echo 
        '<p class="skouro">'
            .'Όνομα βίλλας : '.$record['title'].
            '<br> <a href="villa_leptomereies.php?title='.$record['title'].'">Λεπτομέρειες</a>'.
        '</p>'; 
    }
    $statement->closeCursor();
    $pdoObject = null;
?>

<?php 
include 'layout/footer.php';
?>