<?php

/* Sign Up Functions */
function emptyInputSignup($fname, $lname, $email, $username, $password, $passwordrpt)
{
    $result;

    if (empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password) || empty($passwordrpt)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username)
{
    $result;

    if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;

    if (filter_var(!$email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $passwordrpt)
{
    $result;

    if ($password !== $passwordrpt) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    //prepared statement makes sure user cannot inject data into database
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $fname, $lname, $email, $username, $password)
{

    $sql = "INSERT INTO users (usersFName, usersLName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?, ?);";
    //prepared statement makes sure user cannot inject data into database
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pages/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    // check if eroor print_r(mysqli_stmt_error_list($stmt));
    mysqli_stmt_close($stmt);

    header("location: ../pages/signup.php?error=none");
    exit();
}

/* Login Functions */
function emptyInputLogin($username, $password)
{
    $result;

    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password)
{
    //admin login
    if ($username == 'admin' && $password == '123') {
        session_start();
        $_SESSION["userid"] = '111';
        $_SESSION["username"] = 'admin';
        header("location: ../index.php");
        exit();
    }

    //TODO: check if the status is active


    //checks if username already exists
    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    }

    $passwordHashed = $usernameExists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if ($checkPassword === false) {
        header("location: ../pages/login.php?error=wronglogin");
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersID"];
        $_SESSION["username"] = $usernameExists["usersUsername"];
        $_SESSION["userfname"] = $usernameExists["usersFName"];
        $_SESSION["useremail"] = $usernameExists["usersEmail"];
        header("location: ../index.php");
        exit();
    }
}

