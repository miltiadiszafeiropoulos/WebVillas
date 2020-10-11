//hamburger button  
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  
  //login pop up παράθυρο
  function openForm() {
    document.getElementById("myForm").style.display = "block";
  }
  
  function closeForm() {
    document.getElementById("myForm").style.display = "none";
  }

  //έλεγχος recaptcha
  function recaptcha_callback() {
    var registerbtn = document.querySelector("#register-btn");
    registerbtn.removeAttribute("disabled");
    registerbtn.style.cursor="pointer";
  }
 
    //έλεγχος εγγραφής
  function validate_form(){
    
    var result=true;  
  
      
      var username = document.getElementById("username").value;
    if (username.length < 0) {
      result=false;
      alert("Το όνομα χρήστη πρέπει να έχει μήκος πάνω από 0.\n");
    }

    var password=document.getElementById("password").value;
    var illegalchars = /^[a-zA-Z0-9_]+$/;
  if (password.length < 8 || password.length > 60 || !illegalchars.test(password)) {
    result=false;
	alert("Το password να είναι τουλάχιστον 8 λατινικοί χαρακτήρες, αριθμοί ή κάτω παύλα.");
  }

  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirm_password").value;
  if (password != confirmPassword) {
    result=false;
    alert("Ο Password είναι διαφορετικός από τον Repeat Password");
  }
  
  return result;  
  }

  //ajax δείχνει το validate or not

  $(document).ready(function(){

    $("#username").keyup(function(){
 
      var username = $(this).val().trim();
 
      if(username != ''){
 
         $.ajax({
            url: 'ajax.php',
            type: 'post',
            data: {username:username},
            success: function(response){
 
               // Show response
               $("#uname_response").html(response);
 
            }
         });
      }else{
         $("#uname_response").html("");
      }
 
   });
 
 });

//  για την φόρμα της βίλας

// καταχώρηση βίλας μόνο νούμερα στο τηλέφωνο 
 function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      return false;
  }
  return true;
}
    //έλεγχος εγγραφής
function villa_validate_form(){
    
      var result=true;  
      
var title = document.getElementById("title").value;
if (title === "") {
  result=false;
  alert("Ο title είναι κενός");
}

var address = document.getElementById("address").value;
if (address === "") {
  result=false;
  alert("Η διεύθυνση είναι κενή");
}

var phone = document.getElementById("phone").value;
if (phone.toString().length == 0 || phone.toString().length >11) {
  result=false;
  alert("Το κελί του τηλεφώνου είναι κενό");
}

var people = document.getElementById("people").value;
if (people.toString().length == 0 || people.toString().length >3) {
  result=false;
  alert("Το κελί με τα άτομα που μπορεί να φιλοξενήσει η βίλα είναι κενή");
}

return result;
}


function villa(){
    
  var result=true;  

    var alt = document.getElementById("alt").value;
    if (alt.toString().length > 80 || alt.toString().length == 0 ) {
    result=false;
    alert("Η λεζάντα πρέπει να έχει μέχρι 80 χαρακτήρες και η λεζάντα δεν πρέπει να είναι κενή\n");
  }

  return result;  
}
