<?php

include "../includes/header.php";
include "../includes/config.php";

?>
<div class="form-wrapper">
    <div class="container">
        <form class="row g-2" action="../includes/signup.inc.php" method="POST">
            <?php
            include "../includes/functions.inc.php";
            $sql="SELECT * FROM users WHERE usersUsername= '$_SESSION[username]'";
            $res = mysqli_query($conn, $sql);
            if($res){
                if (mysqli_num_rows($res) > 0) {
                    while ($row=mysqli_fetch_array($res)){
                        print_r($row);
                    }
                }
            }

            ?>
            <div class="col-12">
                <h2>Profilverwaltung</h2>
                <p>Bitte ändern sie wie gewünscht!</p>
                <hr>
            </div>
            <!-- TODO Speicher Variablen -->
            <div class="col-sm-6 my-2">
                <input type="text" class="form-control py-2" id="fname" name="fname" placeholder="Vorname" required="required" value="">
            </div>
            <div class="col-sm-6 my-2">
                <input type="text" class="form-control py-2" id="lname" name="lname" placeholder="Nachname" required="required" value="">
            </div>
            <div class="col-md-12 my-2">
                <input type="text" class="form-control py-2" id="username" name="username" placeholder="Username" required="required" value="">
            </div>
            <div class="col-md-12 my-2">
                <input type="email" class="form-control py-2" id="email" name="email" placeholder="Email" required="required" value="">
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control py-2" id="password" name="password" placeholder="Passwort" required="required" value="">
            </div>
            <div class="col-md-12 my-2">
                <input type="password" class="form-control py-2" id="passwordrpt" name="passwordrpt" placeholder="Passwort bestätigen" required="required" value="">
            </div>
            <div class="col-md-12 my-2">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
        </form>
    </div>
</div>
