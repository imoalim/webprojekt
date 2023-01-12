<?php
  include_once '../includes/header.php';
if (isset($_GET['error'])) {
    $a = $_GET ['error'];
    echo "<div class='d-flex justify-content-center'> $a </div>";
}
  ?>


<div class="form-wrapper">
    <div class="container">
        <form class="row g-2 align-items-center" action="../includes/login.inc.php" method="POST">
            <div class="col-12">
                <h2>Login</h2>
                <hr>
            </div>
            <?php
            if(isset($_GET["error"])){
                if($_GET["error"] == "emptyinput"   ){
                    echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                            <span class='align-middle p-1'>Bitte alle Felder ausfüllen!</span>
                        </div>";
                    }
                else if($_GET["error"] == "wronglogin"){
                    echo "<div class='errormsg mb-2 p-2 border border-1 border-danger rounded-1 text-align-center text-danger d-flex justify-content-center'>
                            <span class='align-middle p-1'>Ihr Passwort oder Username ist falsch!</span>
                        </div>";
                    }
            }
            ?>
            <!-- TODO Speicher Variablen -->
            <div class="col-12 my-2">
                <input type="text" class="form-control py-2" name="username" placeholder="Username" required="required">     	
            </div>
            <div class="col-12 my-2">
                <input type="password" class="form-control py-2" name="password" id="password" placeholder="Passwort" required="required">    	
            </div>
            <div class="col-md-12 my-2">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Anmelden</button>
            </div>
            <div class="col-md-12 my-2 d-flex justify-content-center">
                <span>Sie haben sich noch nicht registriert? <a href="signup.php">Sign Up</a></span> 
            </div>
        </form>
    </div>
</div>


<?php
  include '../includes/footer.php';
?>