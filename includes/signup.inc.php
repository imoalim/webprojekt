<?php
    //checks if user got to the page clicking the submit button
    if(isset($_POST["submit"])) {
        
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $passwordrpt = $_POST["passwordrpt"];

        require_once 'config.php';
        require_once 'functions.inc.php';

        /* error handling */


        //checks if the user left anything blank
        if(emptyInputSignup($fname, $lname, $email, $username, $password, $passwordrpt) !== false) {
             header("location: ../pages/signup.php?error=emptyinput");
             exit();
        }
        //checks if the username is valid
        if(invalidUsername($username) !== false) {
            header("location: ../pages/signup.php?error=invalidusername");
            exit();
        }
        //checks if the email is valid
        if(invalidEmail($email) !== false) {
            header("location: ../pages/signup.php?error=invalidemail");
            exit();
        }
        //checks if the passwords match
        if(passwordMatch($password, $passwordrpt) !== false) {
            header("location: ../pages/signup.php?error=passwordsdontmatch");
         
            exit();
        }
        //checks if the username is already taken
        if(usernameExists($conn, $username, $email) !== false) {
            header("location: ../pages/signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $fname, $lname, $email, $username, $password);
        echo "heahj";
        
    }
    else {
        header("location: ../pages/signup.php");
        exit();
    }