<?php
    session_start();
    require 'db_params.php';
    include 'layout/header.php';
?>
<form action="con_register.php" method="post" onsubmit="return validate_form();">
  <div class="container">
    <h1 class="skouro">Φόρμα εγγραφής</h1>
    <p class="skouro">Η παρακάτω φόρμα εγγραφής αφορά μόνο τους ιδιοκτήτες βιλών, οι οποίοι θέλουν να προβάλλουν την βίλα τους μέσω της υπηρεσίας μας.</p>
    <hr>

    <label class="skouro" for="email"><b>Email</b></label>
    <input type="email" class="emailcss" placeholder="Βάλτε το email" name="email" required>
    <p class="kato skouro">Συμπληρώστε ξανά τον κωδικό πρόσβασης για επαλήθευση.</p>

    <label class="skouro" for="username"><b>username</b></label>
    <input type="text" class="username" placeholder="Βάλτε το username" id="username" name="username" required>
    <p class="kato skouro">Το όνομα χρήστη που θα χρησιμοποιείται για είσοδο στο σύστημα.</p>
    <div id="uname_response" ></div>


    <label class="skouro" for="psw"><b>Password</b></label>
    <input type="password" placeholder="Βάλτε τον κωδικό" id="password" name="password" required>
    <p class="skouro kato" >Τουλάχιστον 8 λατινικοί χαρακτήρες. Επιτρεπτοί χαρακτήρες: γράμματα κεφαλαία ή πεζά, αριθμοί ή κάτω παύλα.</p>

    <label class="skouro" for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Επιβεβαίωση κωδικού" id="confirm_password" required>
    <p  class="kato skouro">Συμπληρώστε ξανά τον κωδικό πρόσβασης για επαλήθευση.</p>
    
    <br>
    <div id="g-recaptcha-response" class="g-recaptcha" data-sitekey="6LdsYvgUAAAAAIh2jNRRTMuMomdLDnOsLoZNd2YP" data-callback="recaptcha_callback"></div>
    <p class="kato skouro">Κάντε κλικ στο κουτί "Δεν είμαι ρομπότ" για να μπορέσετε μετά να κάνετε εγγραφή </p>
    <hr>
    <button id="register-btn" type="submit" name="submit" class="registerbtn" disabled>Εγγραφή</button>
  
  </div>
</form>

<?php 
include 'layout/footer.php';
?>