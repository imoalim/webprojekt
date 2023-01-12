<?php
include "config.php";
include "functions.inc.php";
session_start();
if (isset($_POST['Update'])) {
    //get all input fields
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_new_password = $_POST["confirm_new_password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    var_dump($current_password);

    $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    //check if current pwassword is corrcect
    $sql = "SELECT * FROM users WHERE usersID= '$_SESSION[userid]'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($res);

    if (password_verify($current_password, $row->usersPassword)) {

        //TODO: checks if the username is already taken
        /*if((usernameExists($conn, $username, $email)!== false) && (!isset ($_SESSION["username"]))){
            $msg = "<p> User is already taken. </p>";
            header("Location: ../pages/profil.php?error=$msg");
            exit();
        }*/
        //check if password is same
        if ($new_password == $confirm_new_password) {
            // update
            $sql = "UPDATE users SET usersFName='" . $fname . "', 
                                     usersLName = '" . $lname . "', 
                                     usersEmail = '" . $email . "', 
                                     usersUsername = '" . $username . "', 
                                     usersPassword = '" . $hash_new_password . "' WHERE usersID='$_SESSION[userid]'";
            print_r($sql);
            mysqli_query($conn, $sql);
            $msg = "<p> Profile has been successfully updated. </p>";
        } else {
            $msg = "<p> Password  does not match. </p>";
        }
    } else {
        $msg = "<p> Password  is not correct. </p>";
    }
    header("Location: ../pages/profil.php?error=$msg");

}
