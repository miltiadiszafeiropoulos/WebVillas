<?php
    session_start();
    require 'db_params.php';
    include 'layout/header.php';

    
    $title=$_GET['title']; 
    $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
    $sql = 'SELECT * FROM villa WHERE title=:title';
    $statement = $pdoObject -> prepare($sql);
    $statement->execute( array(':title'=>$title));

    while ( $record = $statement -> fetch() ) {
        if ($record['rating']==1){
            $record['rating']='1 αστέρι';
        }
        if ($record['rating']==2){
            $record['rating']='2 αστέρια';
        }
        if ($record['rating']==3){
            $record['rating']='3 αστέρια';
        }
        if ($record['sauna']==1){
            $record['sauna']='Nαι';
        }else{
            $record['sauna']='Όχι';
        }
        if ($record['pool']==1){
            $record['pool']='Nαι';
        }else{
            $record['pool']='Όχι';
        }
        if ($record['parking']==1){
            $record['parking']='Nαι';
        }else{
            $record['parking']='Όχι';
        }
        if ($record['gym']==1){
            $record['gym']='Nαι';
        }else{
            $record['gym']='Όχι';
        }
        echo 
        '<p class="skouro">'

            .'<br>Όνομα βίλλας : '.$record['title'].'<br>Περιοχή : '.$record['area'].'<br>Διεύθυνση : '.$record['address'].'<br>Τηλέφωνο : '.$record['phone'].'<br>Άνθρωποι : '.$record['people'].'<br>Rating : '.$record['rating']
            .'<br>Pool : '.$record['pool'].  
             '<br>Gym : '.$record['gym'].  
             '<br>Parking : '.$record['parking'].  
             '<br>Sauna : '.$record['sauna'].  

        '</p>';
    }
$statement->closeCursor();
$pdoObject = null; 
?>

<?php
$villa_title=$_GET['title'];
$pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
$sql = 'SELECT namephoto,alt,villa_title FROM photo WHERE villa_title=:villa_title';
$statement = $pdoObject -> prepare($sql);
$statement->execute( array(
':villa_title' => $villa_title));

// τα παίρνω από την βάση δεδομένων  τα στοιχεία που θέλω για να έχει η κάθε βίλα τις δικές του photo το ίδιο 
// ισχύει και για τις εικόνες που μπορεί να διαγράψει ο χρήστης ο καθένας τα δικά του.
while ( $record = $statement -> fetch() ) {
    echo '<a href="image/'.$record['namephoto'].'" data-lightbox="'.$record['villa_title'].'"><img src="image/'.$record['namephoto'].'" alt="'.$record['alt'].'" style="height=300px; width:300px;margin:5px;" > </a>';
}

 
?>

</fieldset>
</div>
<br>

<?php
include 'layout/footer.php';
?>