<?php

include "../../includes/config.php";

//  Check if id is set or not if true toggle,
// else simply go back to the page
if (isset($_GET['id'])) {

    // Store the value from get to a
    // local variable "id"
    $id = $_GET['id'];

    // SQL query that sets the status
    // to 1 == active.
    $sql = "UPDATE `users` SET 
             `status`=1 WHERE usersID='$id'";

    // Execute the query
    mysqli_query($conn, $sql);
}
// Go back to userverwaltung.php
header('location: ../userverwaltung.php');
