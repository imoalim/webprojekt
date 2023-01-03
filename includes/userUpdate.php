<?php
include "config.php";
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

    $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);

    //check if current pwassword is corrcect
    $sql = "SELECT * FROM users ORDER BY usersID";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_object($res);
            // update
            $sql = "UPDATE users SET usersFName='" . $fname . "', 
                                     usersLName = '" . $lname . "', 
                                     usersEmail = '" . $email . "', 
                                     usersUsername = '" . $username . "', 
                                     usersPassword = '" . $hash_new_password . "' WHERE usersID='$row [usersUsername]'";
            print_r($fname);
            mysqli_query($conn, $sql);
            $msg = "<p> Profile has been successfully updated. </p>";
        } else {
            $msg = "<p> Password  does not match. </p>";
        }

    header("Location: ../pages/userverwaltung.php?error=$msg");
