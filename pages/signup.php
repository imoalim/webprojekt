<?php
  include_once '../includes/header.php';
?>

<div class="form-wrapper">
    <div class="container">
        <form class="row g-2" action="../includes/signup.inc.php" method="POST">
            <div class="col-12">
                <h2>Registrierung</h2>
                <p>Bitte füllen Sie die folgenden Felder aus!</p>
                <hr>
            </div>

            <!-- error messages -->
            <!-- TODO invalidusername fixen -->
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Bitte füllen Sie alle Felder aus!</span>
                            </div>";
                    }
                    else if($_GET["error"] == "invalidusername"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Bitte geben Sie einen gültigen Username ein! (nur Buchstaben und Zahlen)</span>
                            </div>";
                    }
                    else if($_GET["error"] == "invalidemail"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Bitte geben Sie eine gültige Email Adresse ein!</span>
                            </div>";
                    }
                    else if($_GET["error"] == "passwordsdontmatch"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Ihre Passwörter stimmen nicht überein!</span>
                            </div>";
                    }
                    else if($_GET["error"] == "usernametaken"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Username/Email Adresse existiert bereits!</span>
                            </div>";
                    }
                    else if($_GET["error"] == "smtfailed"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                                <span class='align-middle p-1'>Oh nein! Etwas ist falschgelaufen!</span>
                            </div>";
                    }
                    else if($_GET["error"] == "none"){
                        echo "<div class='errormsg mb-2 p-2 border border-1 border-success rounded-1 text-align-center text-success d-flex justify-content-center'>
                                <span class='align-middle p-1'>Sie sind registriert!</span>
                            </div>";
                    }
                }
            ?>

            <!-- TODO Speicher Variablen -->
            <div class="col-sm-6 my-2">
                <input type="text" class="form-control py-2" id="fname" name="fname" placeholder="Vorname" required="required">     	
            </div>
            <div class="col-sm-6 my-2">
                <input type="text" class="form-control py-2" id="lname" name="lname" placeholder="Nachname" required="required">    	
            </div>
            <div class="col-md-12 my-2">
                <input type="text" class="form-control py-2" id="username" name="username" placeholder="Username" required="required">
            </div>
            <div class="col-md-12 my-2">
                <input type="email" class="form-control py-2" id="email" name="email" placeholder="Email" required="required">
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control py-2" id="password" name="password" placeholder="Passwort" required="required">
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control py-2" id="passwordrpt" name="passwordrpt" placeholder="Passwort bestätigen" required="required">
            </div>        
            <div class="col-md-12 my-2">
                <label class="form-check-label">
                <input type="checkbox" required="required"> I accept the <a href="terms&conditions.php">Terms of Use</a> &amp; <a href="privacy_policy.php">Privacy Policy</a></label>
            </div>
            <div class="col-md-12 my-2">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Registrieren</button>
            </div>
        </form>
    </div>
</div>

<?php
  include '../includes/footer.php';
?>