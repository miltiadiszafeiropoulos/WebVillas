<?php
  require('con_is_logged_in.php');
  include 'layout/header.php';
?>

<h1 class="skouro">Φόρμα βίλας</h1>
<h2 class="skouro">Όσα είναι με " * " είναι υποχρεωτικά.</h2>
<hr>
<form action="con_vila_insert.php" method="post"  onsubmit="return villa_validate_form()">
  
  <label class="skouro" for="title"><b>* Όνομα Βίλας</b></label>
    <input  type="text" id="title" name="title" placeholder="Βάλτε το όνομα της βίλας" size="50" maxlength="50"> <!--maxlength όσο και στο workbench -->
  <br>
  <br>
  <label class="skouro" for="title"><b>* Νομός</b></label>
  <!-- 200 varchar για σιγουριά στο workbench στο area -->
    <select style="width:250px;" id="area" name="area">
      <option value="-1">--Επιλέξτε Νομό--</option>
      <optgroup label="Αττική">
        <option value="Νομός Αθηνών-Αθήνα">Νομός Αθηνών-Αθήνα</option>
        <option value="Νομός Ανατολικής Αττικής-Παλλήνη">Νομός Ανατολικής Αττικής-Παλλήνη</option>
        <option value="Νομός Δυτικής Αττικής-Ελευσίνα">Νομός Δυτικής Αττικής-Ελευσίνα</option>
        <option value="Νομός Πειραιά-Πειραιάς">Νομός Πειραιά-Πειραιάς</option>
      </οptgroup>

      <optgroup label="Κεντρική Μακεδονία">
        <option value="Νομός Χαλκιδικής-Πολύγυρος">Νομός Χαλκιδικής-Πολύγυρος</option>
        <option value="Νομός Ημαθίας-Βέροια">Νομός Ημαθίας-Βέροια</option>
        <option value="Νομός Κιλκίς-Κιλκίς">Νομός Κιλκίς-Κιλκίς</option>
        <option value="Νομός Πέλλας-Έδεσσα">Νομός Πέλλας-Έδεσσα</option>
        <option value="Νομός Βοιωτίας-Κατερίνη">Νομός Βοιωτίας-Κατερίνη</option>
        <option value="Νομός Σερρών-Σέρρες">Νομός Σερρών-Σέρρες</option>
        <option value="Νομός Θεσσαλονίκης-Θεσσαλονίκη">Νομός Θεσσαλονίκης-Θεσσαλονίκη</option>
      </οptgroup>

      <optgroup label="Στερεά Ελλάδα">
        <option value="Νομός Ευβοίας-Χαλκίδα">Νομός Ευβοίας-Χαλκίδα</option>
        <option value="Νομός Ευρυτανίας-Καρπενήσι">Νομός Ευρυτανίας-Καρπενήσι</option>
        <option value="Νομός Φωκίδας-Άμφισσα">Νομός Φωκίδας-Άμφισσα</option>
        <option value="Νομός Φθιώτιδας-Λαμία">Νομός Φθιώτιδας-Λαμία</option>
        <option value="Νομός Βοιωτίας-Λιβαδειά">Νομός Βοιωτίας-Λιβαδειά</option>
      </οptgroup>

      <optgroup label="Κρήτη">
        <option value="Νομός Χανίων-Χανιά">Νομός Χανίων-Χανιά</option>
        <option value="Νομός Ηρακλείου-Ηράκλειο">Νομός Ηρακλείου-Ηράκλειο</option>
        <option value="Νομός Λασιθίου-Άγιος Νικόλαος">Νομός Λασιθίου-Άγιος Νικόλαος</option>
        <option value="Νομός Ρεθύμνης-Ρέθυμνο">Νομός Ρεθύμνης-Ρέθυμνο</option>
      </optgroup>

      <optgroup label="Ανατολική Μακεδονία & Θράκη">
        <option value="Νομός Δράμας-Δράμα">Νομός Δράμας-Δράμα</option>
        <option value="Νομός Έβρου-Αλεξανδρούπολη">Νομός Έβρου-Αλεξανδρούπολη</option>
        <option value="Νομός Καβάλας-Καβάλα">Νομός Καβάλας-Καβάλα</option>
        <option value="Νομός Ροδόπης-Κομοτηνή">Νομός Ροδόπης-Κομοτηνή</option>
        <option value="Νομός Ξάνθης-Ξάνθη">Νομός Ξάνθης-Ξάνθη</option>
      </optgroup>

      <optgroup label="Ήπειρος">
        <option value="Νομός Άρτας-Άρτα">Νομός Άρτας-Άρτα</option>
        <option value="Νομός Ιωαννίνων-Ιωάννινα">Νομός Ιωαννίνων-Ιωάννινα</option>
        <option value="Νομός Πρέβεζας-Πρέβεζα">Νομός Πρέβεζας-Πρέβεζα</option>
        <option value="Νομός Θεσπρωτίας-Ηγουμενίτσα">Νομός Θεσπρωτίας-Ηγουμενίτσα</option>
      </optgroup>

      <optgroup label="Ιόνιοι Νήσοι">
        <option value="Νομός Κέρκυρας-Κέρκυρα">Νομός Κέρκυρας-Κέρκυρα</option>
        <option value="Νομός Κεφαλληνίας-Αργοστόλι">Νομός Κεφαλληνίας-Αργοστόλι</option>
        <option value="Νομός Λευκάδας-Λευκάδα">Νομός Λευκάδας-Λευκάδα</option>
        <option value="Νομός Ζακύνθου-Ζάκυνθος">Νομός Ζακύνθου-Ζάκυνθος</option>
      </optgroup>

      <optgroup label="Βόρειο Αιγαίο">
        <option value="Νομός Χίου-Χίος">Νομός Χίου-Χίος</option>
        <option value="Νομός Λέσβου-Μυτιλήνη">Νομός Λέσβου-Μυτιλήνη</option>
        <option value="Νομός Σάμου-Σάμος">Νομός Σάμου-Σάμος</option>
      </optgroup>

      <optgroup label="Πελοπόννησος">
        <option value="Νομός Αρκαδίας-Τρίπολη">Νομός Αρκαδίας-Τρίπολη</option>
        <option value="Νομός Αργολίδας-Ναύπλιο">Νομός Αργολίδας-Ναύπλιο</option>
        <option value="Νομός Κορινθίας-Κόρινθος">Νομός Κορινθίας-Κόρινθος</option>
        <option value="Νομός Λακωνίας-Σπάρτη">Νομός Λακωνίας-Σπάρτη</option>
        <option value="Νομός Μεσσηνίας-Καλαμάτα">Νομός Μεσσηνίας-Καλαμάτα</option>
      </optgroup>

      <optgroup label="Νότιο Αιγαίο">
        <option value="Νομός Κυκλάδων-Ερμούπολη">Νομός Κυκλάδων-Ερμούπολη</option>
        <option value="Νομός Δωδεκανήσου-Ρόδος">Νομός Δωδεκανήσου-Ρόδος</option>
      </optgroup>

      <optgroup label="Θεσσαλία">
        <option value="Νομός Καρδίτσας-Καρδίτσα">Νομός Καρδίτσας-Καρδίτσα</option>
        <option value="Νομός Λάρισας-Λάρισα">Νομός Λάρισας-Λάρισα</option>
        <option value="Νομός Μαγνησίας-Βόλος">Νομός Μαγνησίας-Βόλος</option>
        <option value="Νομός Τρικάλων-Τρίκαλα">Νομός Τρικάλων-Τρίκαλα</option>
      </optgroup>

      <optgroup label="Δυτική Ελλάδα">
        <option value="Νομός Αχαΐας-Πάτρα">Νομός Αχαΐας-Πάτρα</option>
        <option value="Νομός Αιτωλοακαρνανίας-Μεσολόγγι">Νομός Αιτωλοακαρνανίας-Μεσολόγγι</option>
        <option value="Νομός Ηλείας-Πύργος">Νομός Ηλείας-Πύργος</option>
      </optgroup>

      <optgroup label="Δυτική Μακεδονία">
        <option value="Νομός Φλώρινας-Φλώρινα">Νομός Φλώρινας-Φλώρινα</option>
        <option value="Νομός Γρεβενών-Γρεβενά">Νομός Γρεβενών-Γρεβενά</option>
        <option value="Νομός Καστοριάς-	Καστοριά">Νομός Καστοριάς-Καστοριά</option>
        <option value="Νομός Κοζάνης-Κοζάνη">Νομός Κοζάνης-Κοζάνη</option>
      </optgroup>
  
</select>

  <br>
  <br>
  <label class="skouro" for="address"><b>* Διεύθυνση βίλας</b></label>
    <input type="text" id="address" name="address" placeholder="Βαλτε την διεύθυνσή σας" size="100" maxlength="100">
  <br>
  <br>
  <label class="skouro" for="phone"><b>* Τηλέφωνο</b></label>
    <input  type="text" id="phone" name="phone" placeholder="Βάλτε το τηλέφωνό σας" size="10" maxlength="10" onkeypress="return isNumber(event)">
  <br>
  <br>
  <label class="skouro" for="latitude"><b> Γεωγραφικό πλάτος</b></label>
    <input  type="text" id="latitude" name="latitude" placeholder="Βάλτε το γεωγραφικό πλάτος" size="10"  maxlength="10">
  <br>
  <br>
  <label class="skouro" for="longitude"><b> Γεωγραφικό μήκος</b></label>
    <input  type="text" id="longitude" name="longitude" placeholder="Βάλτε το γεωγραφικό μήκος" size="10" maxlength="10">
  <br>
  <br>
  <label class="skouro" for="people"><b>* Άτομα που μπορεί να φιλοξενήσει η βίλα</b></label>
    <input type="text"  id="people" name="people" placeholder="Βάλτε το νούμερο των ατόμων" size="3" maxlength="3" onkeypress="return isNumber(event)"> 
    <p class="kato skouro">Μόνο νούμερα -- Μέχρι τριψήφιο</p>

  <br>
  <br>
  <br>
  <label class="skouro" for="rating"><b>* Αστέρια</b></label>
    <label class="skouro"><input type="radio" name="rating" id="rating"  value="1"/>1 Αστέρι</label> 
    &nbsp;&nbsp;&nbsp;          
    <label class="skouro"><input type="radio" name="rating"  id="rating" value="2" />2 Αστέρια</label> 
    &nbsp;&nbsp;&nbsp;          
    <label class="skouro"><input type="radio" name="rating"  id="rating" value="3" />3 Αστέρια</label> 
  
  <br>
  <br>
  <br>
  <label class="skouro" for="facilities"><b>Παροχές</b></label>
    <label class="skouro"><input type="checkbox" name="gym" id="gym" value="1" />Γυμναστήριο</label>
        &nbsp;&nbsp;
  
    <label class="skouro"><input type="checkbox" name="pool" id="pool" value="1" />Πισίνα</label>                     
        &nbsp;&nbsp;
    <label class="skouro"><input type="checkbox" name="sauna" id="sauna" value="1" />Σάουνα</label>
        &nbsp;&nbsp;
    <label class="skouro"><input type="checkbox" name="parking" id="parking" value="1" />parking</label>

  <br>
  <br>
  <br>
  <div id="g-recaptcha-response" class="g-recaptcha" data-sitekey="6LdsYvgUAAAAAIh2jNRRTMuMomdLDnOsLoZNd2YP" data-callback="recaptcha_callback"></div>
  <p class="kato skouro">Κάντε κλικ στο κουτί "Δεν είμαι ρομπότ" για να μπορέσετε μετά να κάνετε Καταχώρηση</p>
  <hr>

  <button id="register-btn" type="submit" name="submit" class="registerbtn" disabled>Καταχώρηση</button>
</form>

<?php
    include 'layout/footer.php';
?>
