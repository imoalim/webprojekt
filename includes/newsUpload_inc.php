<!-- 2c) Put the upload form here-->

<?php
session_start();
//wenn zeitlich es sich ausgeht code schöner gestallten mit funktionen
if (isset($_POST['submit'])) {
    $content=$_POST["content"];
    print $content;
    include 'config.php';
    echo "<prev>";
    print_r($_FILES['content']);
    $img_name = $_FILES['url']['name'];
    echo "<prev>";
    $img_size = $_FILES['url']['size'];
    $tmp_img_name = $_FILES['url']['tmp_name'];
    $error = $_FILES['url']['error'];

    if ($error === 0) {
        print_r($_FILES['url']);
        if ($img_size > 1250000) {
            $msg = "Sorry, your file is too large.";
            header("Location: ../pages/news.php?error=$msg");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = '../uploads/' . $new_img_name;
                move_uploaded_file($tmp_img_name, $img_upload_path);
                print_r($_SESSION);
                // Insert into Database
                $sql = "INSERT INTO news(img_url,user_id, content) 
				        VALUES('$new_img_name', " . $_SESSION["userid"] . ",  ' $content')";
                if (!mysqli_query($conn, $sql)) {
                    die(mysqli_error($conn));
                };

                header("Location: ../pages/news.php");
            } else {
                $msg = "You can't upload files of this type";
                header("Location: ../pages/news.php?error=$msg");
            }
        }
    } else {
        $msg = "unknown error occurred!";
        header("Location: ../pages/news.php?error=$msg");
    }

} else {
    header("Location: ../pages/news.php");
}

?>