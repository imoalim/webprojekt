<?php

include "../includes/header.php";
include "../includes/config.php";
?>
<div class="container-fluid px-4" style="height: 100vh;">
    <h1 class="mt-4">Users</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Registered Users</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>userID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Roles</th>
                            <th>Edit</th>
                            <th>Userstatus</th>
                        </tr>
                        </thead>
                        <tbody>
                        <form action="inc/admin_userUpdate.php" method="POST">
                            <?php

                            if (isset($_GET['error'])) {
                                $a = $_GET ['error'];
                                echo "<div class='d-flex justify-content-center'> $a </div>";
                            }
                            //selecting everyone except admiin
                            $sql = "SELECT * FROM users";
                            $res = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                foreach ($res as $row) {
                                    //print_r($row ['usersUsername']);
                                    ?>
                                    <tr>
                                        <td style="font-size: 1.5vw"><?php echo $row['usersID'] ?></td>
                                        <td style="font-size: 1.5vw"><?php echo $row['usersFName'] ?></td>
                                        <td style="font-size: 1.5vw"><?php echo $row['usersLName'] ?></td>
                                        <td style="font-size: 1.5vw"><?php echo $row['usersEmail'] ?></td>
                                        <td style="font-size: 1.5vw"><?php echo $row['usersUsername'] ?></td>
                                        <td style="font-size: 1.5vw">
                                            <?php
                                            if ($row['usersID'] == '111') {
                                                echo "Admin";
                                            } else {
                                                echo "User";
                                            }
                                            ?>
                                        </td>
                                        <td><a href="inc/edit-user.php?id=<?=$row["usersID"];?>"
                                               class="btn btn-success">Edit</a></td>
                                        <td>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </form>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>
<?php
include_once '../includes/footer.php';
?>
