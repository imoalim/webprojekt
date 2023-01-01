<?php
  include_once './includes/header.php';
?>

<div class="index-wrapper d-flex justif-content-center align-items-center">
  <div class="container d-flex justify-content-center text-center">
    <div class="row">
      <?php
        if(isset($_SESSION['username'])){
          echo "<div class='col-12'>
                  <span class='align-middle p-1'>Willkommen " . $_SESSION['username'] . "</span>
                </div>";
        }
        else {
          echo "<div class='col-12'>
                  <span class='align-middle p-1'>Hotel am OPER</span>
                </div>";
        }
      ?>
      <hr class="my-2" size="10">
      <div class="col-12">
        <a href="pages/booking.php" class="btn btn-primary btn-lg mt-4" role="button" aria-pressed="true">Zimmer buchen!</a>
      </div>
    </div>
  </div>
</div>

<?php
  include './includes/footer.php';
?>