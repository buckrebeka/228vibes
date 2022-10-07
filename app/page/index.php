<?php
include("afficher-categories.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../public/assets/css/media_query.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228VibesPage d'accueil</title>
</head>

<body>
    <!-- header -->
    <header>
        <div class="display">
            <div>
                <img src="../../public/assets/icons/Group 10.png" alt="" class="logo">
            </div>
            <div class="display-link">
                <button>
                    <a href="inscription-page.php">Inscription</a>
                </button>
                <button>
                    <a href="Login-page.php">Connexion</a>
                </button>
            </div>
        </div>
        <div class="header-img">

            <div id="arrow-left" class="arrow"></div>
            <div class="slide slide1"></div>
            <div class="slide slide2"></div>
            <div class="slide slide3"></div>
            <div class="slide slide4"></div>
            <div class="slide slide5"></div>
            <div class="slide slide6"></div>
            <div id="arrow-right" class="arrow"></div>


        </div>
    </header>
    <!-- main -->
    <main>
        <div class="text">Tendances du moment</div>
        <!-- conteneur d'image de categories -->
        <div class="categories-container">
            <?php
            foreach ($reslts as $reslt) : ?>
                <div class="box">
                    <a href="inscription-page.php">
                        <img src="<?= $reslt['photo']  ?>" alt="">
                    </a>
                    <div>
                        <?= $reslt['name']; ?>
                    </div>
                </div>
            <?php endforeach  ?>
        </div>





    </main>

    <!-- footer -->
    <footer>
        <div><a href="admin-login.php" class="copyright">copyright@:rbka</a></div>
    </footer>
    <script src="../../public/assets/js/slide.js"></script>

</body>

</html>