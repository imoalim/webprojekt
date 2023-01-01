<?php
include "../includes/config.php";


$sql = "SELECT * FROM users ORDER BY usersID";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($user = mysqli_fetch_assoc($res)) { ?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $user['usersID'] ?> </li>
            <li class="list-group-item"><?= $user['usersUsername'] ?> </li>
            <li class="list-group-item"><?= $user['usersFName'] ?> </li>
            <li class="list-group-item"><?= $user['usersEmail'] ?> </li>
        </ul>
    <?php }
} ?>
