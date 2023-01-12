<?php

include "../includes/header.php";
include "../includes/config.php";

?>

<style>
    /*TODO: FIX = table head when max-width is reached it disappears*/
    /*responsive*/
    @media (max-width: 850px) {
        .table thead {
            display: none;
        }
        .table,
        .table tbody,
        .table tr,
        .table td,
        .card-body
        {
            display: block;
            width: 100%;
        }
        .table tr {
            margin-bottom: 15px;
        }
        .table td {
            padding-left: 50%;
            text-align: left;
            position: relative;
        }
        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
        }
    }

</style>
<!--TODO: GET THE TABLE_FORM RESPONSIVE-->
<div class="container-fluid px-4" style="margin-bottom: 2%">

        <h1 class="mt-4">User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Users</li>
        </ol>
        <div class="row">
            <div class="col-md-12"">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit User</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" >
                            <thead>
                            <tr>
                                <th>userID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Roles</th>
                                <th>User-status</th>
                                <th>Set User-status</th>
                                <th>Edit</th>
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
                                            <td style="align-items: center"><?php echo $row['usersID'] ?></td>
                                            <td ><?php echo $row['usersFName'] ?></td>
                                            <td ><?php echo $row['usersLName'] ?></td>
                                            <td><?php echo $row['usersEmail'] ?></td>
                                            <td><?php echo $row['usersUsername'] ?></td>
                                            <td>
                                                <?php
                                                if ($row['usersID'] == '111') {
                                                    echo "Admin";
                                                } else {
                                                    echo "User";
                                                }
                                                ?>
                                            </td>
                                            <td style="align-items: center"><?php
                                                if ($row['status'] == '1') {
                                                    echo  "<p class='btn btn-success'>Active</p>";
                                                } else {
                                                    echo  "<p class='btn btn-danger'>INACTIVE</p>";
                                                }
                                                ?>
                                            </td>
                                           <td style="align-items: center"><?php
                                                if($row['status']!="1")
                                                    // if a course is active.php i.e. status is 1
                                                    // the toggle button must be able to deactivate
                                                    // we echo the hyperlink to the page "deactivate.php"
                                                    // in order to make it look like a button
                                                    // we use the appropriate css
                                                    // red-deactivate
                                                    // green- activate
                                                    echo
                                                        "<a href=inc/deactivate.php?id=".$row['usersID']." class='btn btn-success'>Activate</a>";
                                                else
                                                    echo
                                                        "<a href=inc/active.php?id=".$row['usersID']." class='btn btn-danger'>Deactivate</a>";

                                                ?>
                                            </td>
                                            <td><a href="inc/edit-user.php?id=<?=$row["usersID"];?>"
                                                   class="btn btn-primary">Edit</a></td>
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

<body>

</body>
<?php
include_once '../includes/footer.php';
?>
