<?php

$serverName = "localhost";
$dBUsername = "Bob";
$dBPassword = "123";
$dBName = "website1";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
//$stmt=$conn->prepare('Select *from  website1.users');

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());
}