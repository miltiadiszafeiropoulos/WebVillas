<!DOCTYPE html>
<?php 
    include('cookie.php');
?>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="webvilla"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> <!-- χρειάζεται για το jquery -->
        <script src="https://kit.fontawesome.com/906502a24b.js" crossorigin="anonymous"></script> <!-- τα buttons στο nav menu -->
        <script src="js/menu.js"></script> <!-- η javascript  -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- χρειάζεται για το recaptcha -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- χρειάζεται για τα εικονίδια πάνω στο menu αλλά και στην main του index -->
        <link rel="shortcut icon" type="image/png" href="media/favicon.png"/> <!-- εικόνα στο tab του browser -->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet"> <!--γραμματοσειρά Roboto -->
        <link href="<?php echo getCSS();  ?>" rel="stylesheet" type="text/css" /><!-- σύνδεση με το css  -->
        <link href="css/lightbox.min.css" rel="stylesheet" type="text/css"/> <!-- lightbox -->

        <title>WebVillas</title>
        

    </head>
    <body>

        <header>
        <img class="logo" src="media/wvlogo.png" alt="WebVillas logo">
        <a href="index.php">WebVillas</a>
        </header>

        <nav>
            <div class="topnav" id="myTopnav"> 
                <a href="index.php"><i class="fas fa-home"></i> Αρχική</a> <!--το fas fa-home είναι τα εικονίδιo δίπλα από την αρχική  το ίδιο ισχυεί και με τα άλλα -->
                <a href="villes.php"><i class="fas fa-vihara"></i> Βίλες</a>
                <a href="register.php"><i class="fas fa-user"></i> Εγγραφή</a>
                
                <?php if (!isset($_SESSION['username']) ) { ?>
                    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Σύνδεση</a>  
                <?php } ?>
                
                <?php if (isset($_SESSION['username']) ) { ?>
                    <a href="con_logout.php"><i class="fas fa-running"></i> Αποσύνδεση</a> <!--όταν φαίνεται η αποσύνδεση δεν φαίνεται η σύνδεση το ανάποδο ισχυεί με την σύνδεση-->
                <?php } ?>              
                
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                </a>
             </div>  
        </nav>