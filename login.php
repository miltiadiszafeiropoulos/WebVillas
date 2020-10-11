<?php
    session_start();
    require 'db_params.php';
    include 'layout/header.php';
?>
<h1 class="skouro">Φόρμα Σύνδεσης</h1>
<hr>
<div class="kentro">
<img class="avatar" src="media/avatar.png" alt="avatar"> 
</div>
<form method="post" action="con_login.php"  onsubmit="return validate_form()">
<br>
<label class="skouro" for="username"><b>username</b></label>
<input type="text" class="emailcss" placeholder="Βάλτε το username" id="username" name="username" required>
<br>
<br>
<label class="skouro" for="psw"><b>Password</b></label>
<input type="password" placeholder="Βάλτε το κωδικό" id="password" name="password" required>
<br>
<hr>

<button type="submit" name="submit" class="registerbtn">Σύνδεση</button>

</form>
<br> 
<?php 
include 'layout/footer.php';
?>