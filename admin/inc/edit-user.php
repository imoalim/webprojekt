<?php

include "../../includes/header.php";
include "../../includes/config.php";



//var_dump(isset($_GET['usersID']));
//var_dump(isset($_GET['id']));
//var_dump($_GET['id']);

//get usersID from url-parameter through GET_METHODE

if ((!isset($_GET['error'])) && ($_GET['id'])){
$users_id = $_GET['id'];
//save it in a variable
$users = "SELECT * FROM users WHERE usersID='$users_id'";
$sql_run = mysqli_query($conn, $users);
//excute querry
//check if record exist
if (mysqli_num_rows($sql_run) > 0) {
//show the data with foreach loop
foreach ($sql_run
         as $users) {
?>
<div class="container-fluid px-4" >
    <h1 class="mt-4">User: <?php echo $users ['usersUsername'] ?></h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item">Edit Users</li>
    </ol>
    <div class="row" style="height: 100vh">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User: <?php echo $users ['usersUsername'] ?></h4>
                </div>
                <div class="card-body">
                    <form action="admin_userUpdate.php" method="POST">
                        <input type="hidden" name="user_id" value="<?= $users['usersID'] ?>">
                        <input type="hidden" name="status" value="<?= $users['status'] ?>">
                        <div class="row">
                            <div class="col-sm-6 my-2">
                                <input type="text" class="form-control py-2" id="fname" name="fname"
                                       placeholder="Vorname"
                                       required="required" value="<?php echo $users ['usersFName'] ?>">
                            </div>
                            <div class="col-sm-6 my-2">
                                <input type="text" class="form-control py-2" id="lname" name="lname"
                                       placeholder="Nachname"
                                       required="required" value="<?php echo $users ['usersLName'] ?>">
                            </div>
                            <div class="col-md-6  my-2">
                                <input type="text" class="form-control py-2" id="username" name="username"
                                       placeholder="Username" required="required"
                                       value="<?php echo $users ['usersUsername'] ?>">
                            </div>
                            <div class="col-md-6  my-2">
                                <input type="email" class="form-control py-2" id="email" name="email"
                                       placeholder="Email"
                                       required="required" value="<?php echo $users ['usersEmail'] ?>">
                            </div>

                            <div class="col-md-6  my-2">
                                <input type="password" class="form-control py-2" id="new_password" name="new_password"
                                       placeholder="Neues Passwort" required="required" value="">
                            </div>
                            <div class="col-md-6  my-2">
                                <input type="password" class="form-control py-2" id="confirm_new_password"
                                       name="confirm_new_password" placeholder="Neues Passwort bestätigen"
                                       required="required" value="">
                            </div>
                            <div class="col-md-12 my-2">
                                <button type="submit" name="Update" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                    </form>

                    <?php
                    }
                    } else {
                        ?>
                        <h4>
                            NO record
                        </h4>
                        <?php

                    }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../../includes/footer.php';
?>
