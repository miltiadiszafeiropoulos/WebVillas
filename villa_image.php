  <?php
    require ('con_is_logged_in_villa.php');
    include ('layout/header.php');
    require ('db_params.php');
  ?>


  <div>
    <h3 class="skouro">Ανεβάστε εικόνες ( ως 500KB σε φορμάτ jpg ).</h3>
    <fieldset>
      <legend class="skouro">Upload Image</legend>
      <form method="POST" action="con_villa_image.php" enctype="multipart/form-data" onsubmit="return villa()">
        <br>
        <br>
        <p class="skouro">Αρχείο:  <input type="file" name="imgFilename"/></p>
        <br>
        <br>
        <label class="skouro" for="alt"><b>Λεζάντα</b></label>
        <input type="text" placeholder="Βάλτε την λεζάντα" id="alt" name="alt" require>

        <p><input name="submit" type="submit" value="Upload"/></p>

      </form>
    </fieldset>
  </div>

  <div>
    <h3 class="skouro">Εικόνες</h3>
    <fieldset>

  <?php
    $username_fk = $_SESSION['username'];
    $pdoObject = new PDO("mysql:host=$dbhost; port=3308; dbname=$dbname;", $dbuser, $dbpass);
    $sql = 'SELECT namephoto FROM photo WHERE username_fk=:username_fk';
    $statement = $pdoObject -> prepare($sql);
    $statement->execute( array(
    ':username_fk' => $username_fk));

    while ( $record = $statement -> fetch() ) {
      echo '<p class="skouro">'.$record['namephoto'].'</p>'.'<a  href="con_villa_image_delete.php?file='.$record['namephoto'].'">Del</a>'.'<a style="margin-left:10px;" href="image/'.$record['namephoto'].'">View</a>';
    }
      $statement->closeCursor();
      $pdoObject = null;
      
  ?>
    </fieldset>
  </div>
  <br>

  <?php
      include 'layout/footer.php';
  ?>