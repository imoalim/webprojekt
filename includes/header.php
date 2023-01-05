<?php
    session_start();

    //creates the path to the root folder
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
    }
    else{
        $protocol = 'http://';
    }

    $path = $protocol . $_SERVER['SERVER_NAME'] . '/' . 'webprojekt' . '/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel am Graben</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- TODO PHP Path dynamisch determine -->
    <link rel="stylesheet" href="../style/stylesheet.css">
    <link rel="stylesheet" href="./style/stylesheet.css">
    <link rel="stylesheet" href="../style/booking.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" <?php echo 'href="'.$path.'/index.php"'?>>Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Menü</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" <?php echo 'href="'.$path.'pages/about.php"'?>>About</a></li>
                    <li><a class="dropdown-item" <?php echo 'href="'.$path.'pages/news.php"'?>>News</a></li>
                    <li><a class="dropdown-item" <?php echo 'href="'.$path.'pages/hilfe_faq.php"'?>>FAQ</a></li>
                    <li><a class="dropdown-item" <?php echo 'href="'.$path.'pages/impressum.php"'?>>Impressum</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" <?php echo 'href="'.$path.'pages/booking.php"'?>>Zimmer buchen</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <?php
            if (isset($_SESSION['username']) && ($_SESSION['username']) == 'admin' ){
                echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="'.$path.'admin/userverwaltung.php">Userverwaltung</a></li>';
                echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.$path.'includes/logout.inc.php">Abmelden</a></li>';
            }
               if(isset($_SESSION["username"]) && ($_SESSION['username']) != 'admin') {
                    echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.$path.'includes/logout.inc.php">Abmelden</a></li>';
                    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="'.$path.'pages/profil.php">Profil</a></li>';
                }
                 if(empty($_SESSION)){
                    echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="'.$path.'pages/signup.php">Registrieren</a></li>';
                    echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="'.$path.'pages/login.php">Login</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>