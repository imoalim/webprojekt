<?php
include "../../includes/config.php";
include "../../includes/header.php";
include "../../includes/functions.inc.php";


if (isset($_POST['Update'])) {

    //get all input fields
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];
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
    if ($new_password == $confirm_new_password) {

        //checks if the username is already taken

        /* TODO: check if the username is already taken
         * if(usernameExists($conn, $username, $email) !== false) {
            $msg = "<p> User is already taken. </p>";
            header("Location: ../view-edit_user.php?error=$msg");
            exit();
        }*/
        // update
        $sql = "UPDATE users SET usersFName='" . $fname . "', 
                                     usersLName = '" . $lname . "', 
                                     usersEmail = '" . $email . "', 
                                     usersUsername = '" . $username . "', 
                                     usersPassword = '" . $hash_new_password . "' WHERE usersID='$user_id'";
        print_r($fname);
        mysqli_query($conn, $sql);
        $msg = "<p> Profile has been successfully updated. </p>";
        header("Location: ../view-edit_user.php?error=$msg");

    } else {
        $msg = "<p> Password  does not match. </p>";
        header("Location: ../view-edit_user.php?error=$msg");
    }

}
    if (isset($_POST['Inactive'])) {
        $inactive = $_POST['Inactive'];
        $inactive = 0;
        // update
        $sql = "UPDATE users SET status='" . '$inactive' . "' WHERE usersID='$user_id'";

        mysqli_query($conn, $sql);
        $msg = "<p> Profile has been successfully updated. </p>";
        header("Location: admin_userUpdate.php?error=$msg");
    } else {
        $msg = "<p> Password  does not match muia. </p>";
        header("Location: admin_userUpdate.php?error=$msg");


    }

?>

