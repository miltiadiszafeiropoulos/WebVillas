<?php
session_start();  
    require 'db_params.php';
    include 'layout/header.php';
?>
<h1 class="skouro">Ενεργοποιήση Λογαριασμού</h1>
<hr>
<div class="kentro">
<img class="avatar" src="media/avatar.png" alt="avatar"> 
</div>
<form method="post" action="activate.php" onsubmit="return validate_form()">
<br>
<label class="skouro" for="username"><b>Username</b></label>
<input type="text" class="emailcss" placeholder="Βάλτε το username" id="username" name="username" required>
<br>
<br>
<label class="skouro" for="username"><b>Password</b></label>
<input type="password" placeholder="Βάλτε το κωδικό" id="password" name="password" required>
<br>
<br>
<label class="skouro" for="code"><b>Activate code</b></label>
<input type="text" placeholder="Βάλτε το κωδικό από το email" id="code" name="code" size="5" maxlength="5" onkeypress="return isNumber(event)" required>
<br>
<hr>

<button  type="submit" name="submit" class="registerbtn">Σύνδεση</button>

</form>

<?php
include 'layout/footer.php';
?>