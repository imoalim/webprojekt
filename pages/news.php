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
                   <p class=''>You are logged in as admin, you can upload .... </p>                   
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


    <title>View</title>
    <style>
        .news {
            width: 200px;
            height: 200px;
            padding: 5px;
        }

        .news img {
            width: 100%;
            height: 100%;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>


    <!--<a href="news.php">&#8592;</a>-->
    <div class="d-flex justify-content-center">
        <?php
        include "../includes/config.php";


        $sql = "SELECT * FROM news ORDER BY time DESC";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($news = mysqli_fetch_assoc($res)) { ?>
                <div class="news">
                    <?= $news['content'] ?>
                    <img src="../uploads/<?= $news['img_url'] ?>" alt="">
                </div>
            <?php }


//include_once '../includes/footer.php';
        } ?>

    </div>


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


