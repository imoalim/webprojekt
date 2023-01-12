<?php

include "../includes/header.php";
include "../includes/config.php";

?>
<div class="form-wrapper">
    <div class="container">
        <form class="row g-2" action="../includes/profil_userUpdate.php" method="POST">
            <?php
            if (isset($_GET['error'])) {
                $a = $_GET ['error'];
                echo "<div class='d-flex justify-content-center'> $a </div>";
            }
            include "../includes/functions.inc.php";
            $sql = "SELECT * FROM users WHERE usersUsername= '$_SESSION[username]'";
            $res = mysqli_query($conn, $sql);
            if ($res) {

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_array($res)) {
                        //print_r($row ['usersUsername']);
                       // var_dump(($_SESSION["username"]));

                        ?>

                        <div class="col-12">
                            <h2>Profilverwaltung</h2>
                            <p>Bitte ändern sie wie gewünscht!</p>
                            <hr>
                        </div>
                        <div class="col-sm-6 my-2">
                            <input type="text" class="form-control py-2" id="fname" name="fname" placeholder="Vorname"
                                   required="required" value="<?php echo $row ['usersFName'] ?>">
                        </div>
                        <div class="col-sm-6 my-2">
                            <input type="text" class="form-control py-2" id="lname" name="lname" placeholder="Nachname"
                                   required="required" value="<?php echo $row ['usersLName'] ?>">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="text" class="form-control py-2" id="username" name="username"
                                   placeholder="Username" required="required"
                                   value="<?php echo $row ['usersUsername'] ?>">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="email" class="form-control py-2" id="email" name="email" placeholder="Email"
                                   required="required" value="<?php echo $row ['usersEmail'] ?>">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="password" class="form-control py-2" id="current_password"
                                   name="current_password" placeholder="Altes Passwort bestätigen" required="required"
                                   value="">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="password" class="form-control py-2" id="new_password" name="new_password"
                                   placeholder="Neues Passwort" required="required" value="">
                        </div>
                        <div class="col-md-12 my-2">
                            <input type="password" class="form-control py-2" id="confirm_new_password"
                                   name="confirm_new_password" placeholder="Neues Passwort bestätigen"
                                   required="required" value="">
                        </div>
                        <div class="col-md-12 my-2">
                            <button type="submit" name="Update" class="btn btn-primary btn-lg">Update</button>
                        </div>

                        <?php
                    }
                }
            }

            ?>

        </form>
    </div>
</div>
