<?php
    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once 'config.php';
        require_once 'functions.inc.php';

        /* error handling */

        //checks if the user left anything blank
        if(emptyInputLogin($username, $password) !== false) {
            header("location: ../pages/login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $password);
        
    }
    else {
        header("location: ../pages/login.php");
        exit();
    }