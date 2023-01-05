<?php
include "../includes/header.php";

if (isset($_GET['error'])) {
    $a = $_GET ['error'];
    echo "<div class='d-flex justify-content-center' style='margin-top: 10%'> $a </div>";

?>
<div class="d-flex justify-content-center" style="margin-bottom: 40%">
    <a href="userverwaltung.php "
       class="btn btn-success">Userverwaltung</a>

</div>

<?php

}

include "../includes/footer.php";