<?php
require_once 'config.php';
require_once 'functions.inc.php';


    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];


//var_dump(isset($_GET['usersID']));
//var_dump(isset($_GET['id']));
//var_dump($_GET['id']);

//get usersID from url-parameter through GET_METHODE

        $sql = "SELECT * FROM users  WHERE usersUsername='$username'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_object($res);

        foreach ($res
                 as $users) {
            if($users ['status']!=1){
                header("location: ../pages/login.php?error=USER ACCOUNT INACTIVE");
                exit();
            }
        }
                /* error handling */

                //checks if the user left anything blank
                if (emptyInputLogin($username, $password) !== false) {
                    header("location: ../pages/login.php?error=emptyinput");
                    exit();
                }

                loginUser($conn, $username, $password);
            }

        else {
                header("location: ../pages/login.php");
                exit();
            }
