<?php
function getCSS() {
    //αν δεν υπάρχει σχετικό cookie, τότε ο χρήστης
    //ΔΕΝ έχει επιλέξει - δώσε το default (δηλ. το villacss.css)    
    if (!isset($_COOKIE['css'] )   )
       $css='css/villacss.css';
    else
      //αλλιώς δώσε ότι λέει το cookie
      $css= $_COOKIE['css'];
    //επέστρεψε το αποτέλεσμα
    return $css;
  }
  ?>