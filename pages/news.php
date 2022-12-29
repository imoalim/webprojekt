<?php
include '../includes/header.php';
?>


<?php
//wenn zeitlich es sich ausgeht code schöner gestallten mit funktionen
if (isset($_SESSION['username']) && ($_SESSION['username']) == 'admin' ) {
    if (isset($_GET['error'])) {
        $a = $_GET ['error'];
        echo "<div class='d-flex justify-content-center'> $a </div>";
    }
    echo "<div class='col-12 text-center'>
            <form action='../includes/newsUpload_inc.php' method='post' enctype='multipart/form-data'>
                <div>
                   <p class=''>You are logged in as admin, you can upload something </p>                   
                </div>
                <div>
               <textarea class='col-6' id='content' name='content' rows='4' cols='50'>
               </textarea>
                </div>
                <br>
                <div>
                    <input type='file' name=\"url\">
                </div>
                <div>
                    <input type='submit' value='Upload' name='submit'>
                </div>
                <br>
            </form>
        </div>
    </div>";
    if (isset($_POST['submit'])) {
        include '../includes/newsUpload_inc.php';
    }
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../style/stylesheet.css">
        <title>NEWS</title>
    </head>
    <body>
<header><h1 class="d-flex justify-content-center">NEWS</h1></header>

<section class="d-flex justify-content-center">

    <div class="row " style="padding-left:10%;padding-right:10%; ">
        <?php
        include "../includes/config.php";


        $sql = "SELECT * FROM news ORDER BY time DESC";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($news = mysqli_fetch_assoc($res)) { ?>
                <div class="col-10" style="margin: 10%">
                    <img src="../uploads/<?= $news['img_url'] ?>"  class="rounded mx-auto d-block" style="width:80%; height: auto%;" alt="">
                    <p class="text-align"></p> <?= $news['content'] ?>
                    <br>
                    <a href="#" style="text-decoration: none; margin: 0.5%" class="btn btn-outline-primary">Learn More</a>
                </div>
            <?php }
        } ?>

    </div>
</section>


    </body>
    </html>

<?php
include_once '../includes/footer.php';
?>



<?php
/*
<link rel="stylesheet" href="../style/stylesheet.css">

<section class="news" style="height: 100vh; margin-bottom: 50px">
<div class="d-flex justify-content-center" >
    <h1>NEWS</h1>
    <div class="line"></div>
</div>

<div class="row" style="padding-left:10%;padding-right:10%;">

    <div class="col-6">
        <img src="../img/hotel_view.png" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">
        <h4 style="text-align: center;padding-top: 10px;">New dinning hall</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

    <div class="col-6">
        <img src="../img/Outdoor_Pool.png" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">

        <h4 style="text-align: center;padding-top: 10px;">Exclusive Outdoor Pool</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

    <div class="col-6">
        <img src="../img/dinning.jpg" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">

        <h4 style="text-align: center;padding-top: 10px;">Exclusive Outdoor Pool</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

    <div class="col-6">
        <img src="../img/suit.png" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">

        <h4 style="text-align: center;padding-top: 10px;">Exclusive Outdoor Pool</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

    <div class="col-6">
        <img src="../img/two_bedroom.png" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">

        <h4 style="text-align: center;padding-top: 10px;">Exclusive Outdoor Pool</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

    <div class="col-6">
        <img src="../img/Outdoor_Pool.png" alt="" class="rounded mx-auto d-block" style="width:80%; height: auto;">

        <h4 style="text-align: center;padding-top: 10px;">Exclusive Outdoor Pool</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias architecto dolorem doloremque earum error
            et inventore ipsum minus necessitatibus omnis optio praesentium quae quaerat, quam quod repellendus
            sapiente sunt voluptatum!</p>
        <a href="#" style="text-decoration: none;" class="btn btn-outline-primary">Learn More</a>
    </div>

</div>

</section>




 include_once '../includes/footer.php';

?>

*/


