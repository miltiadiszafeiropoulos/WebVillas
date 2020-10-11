<?php
    session_start();
    include 'layout/header.php';
?>
 <h2 class="titlomegalieikona">Η Νο1 Ελληνική ιστοσελίδα για βίλες</h2>
        <img class="villa_image" src="media/img1.jpg" alt="villa view"/>
        <main>
            <h2 class=title>WEB VILLAS</h2>
            <button class="button_cookie1" onclick="location.href='store_css.php?style=1'" type="button">Ανοιχτό θέμα</button>
            <button class="button_cookie2" onclick="location.href='store_css.php?style=2'" type="button">Σκούρο θέμα</button>
            <div class="row">
                <div class="border1 column">
                    <h3 class="xroma1"><i class="fas fa-search"></i>   Αναζητήστε βίλες από όλη την Ελλάδα</h3>
                        <p>
                            Με το <b>Webvillas</b> πλέον μπορείτε να βρείτε εύκολα
                            και γρήγορα την βίλα που σας ταιριάζει απ'ολόκληρη την Ελλάδα.
                        </p>
                        <a href="villes.php" class="button1">Αναζήτηση Βίλας</a>
                </div>

                <div class="border2 column">
                    <h3 class="xroma2"><i class="fas fa-pen"></i>   Κάντε εγγραφή στο WebVillas</h3>
                        <p>
                            Κάντε τώρα εγγραφή στο <b>WebVillas</b> για να καταχωρήσετε την βίλα σας,
                            και να γίνει γνωστή σε όλο τον κόσμο.
                        </p>
                        <a href="register.php" class="button2">Εγγραφή</a>
                </div>

                <div class="border3 column">
                    <h3 class="xroma3"><i class="fas fa-thumbtack"></i>   Καταχωρήστε την βίλα σας.</h3>
                    <p>
                        Οι εγγεγραμμένοι χρήστες έχουν την δυνατότητα να καταχωρήσουν την βίλα τους
                        στο <b>WebVillas</b>.
                    </p>
                    <a href="vila_insert.php" class="button3">Καταχώρηση Βίλας</a>
                    <a href="villa_login_image.php" class="button3">Καταχώρηση Εικόνων Βίλας</a>
                </div>
            </div>
                
        </main>

<?php
    include 'layout/footer.php';
?>