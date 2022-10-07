<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
// afficher le nombre d'utilisateur
$sql = 'SELECT COUNT(id) AS nbUser FROM users';
$myResult = $bdd->query($sql);
$data = $myResult->fetch();

// afficher le nombre d'artistes
$requet = 'SELECT COUNT(id) AS nbArtist FROM artists';
$result = $bdd->query($requet);
$singer = $result->fetch();

// afficher le nombre de categories
$nber = 'SELECT COUNT(id) AS nbCategories FROM categories';
$reslt = $bdd->query($nber);
$cat = $reslt->fetch();

// afficher le nombre de chansons
$sing = 'SELECT COUNT(id) AS nbSong FROM songs';
$rslt = $bdd->query($sing);
$song = $rslt->fetch();

// verification
if (!$_SESSION['mdp']) {
    header('Location:admin-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../public/assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228Vibes Tableau de bord page</title>
</head>

<body>

    <div class="nav-bar-flex">
        <div class="item-container">
            <div class="admin-logo">
                <img src="../../public/assets/icons/Group 10.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="tableau-de-bord.php" id="board">
                        <span><i class="fa-solid fa-table-columns"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span>Utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="artistes.php">
                        <span><i class="fa-solid fa-microphone"></i></span>
                        <span>Artistes</span>
                    </a>
                </li>
                <li>
                    <a href="chansons.php">
                        <span><i class="fa-solid fa-music"></i></span>
                        <span>Chansons</span>
                    </a>
                </li>
                <li>
                    <a href="categories.php">
                        <span><i class="fa-solid fa-note-sticky"></i></span>
                        <span>Catégories</span>
                    </a>
                </li>
                <li id="myUser">
                   <a href="admin-account.php">
                   <span><i class="fa-solid fa-gear"></i></span>
                    <span>Mon compte</span>
                   </a>
                </li>
                <li>
            <a href="admin-login.php" class="user-deconnexion">
                <span><i class="fa-solid fa-power-off"></i></span>
                <span>Deconnexion</span>
            </a>
        </li>
            </ul>
        </div>
        <div class="display-container">

            <div class="row">
                <div class="count-row row1">
                    <a href="users.php">
                        <div class="nber"><?php echo ($data["nbUser"]); ?></div>
                        <div class="txt">Utilisateurs</div>
                    </a>
                </div>
                <div class="count-row row2">
                    <a href="artistes.php">
                        <div class="nber"><?php echo ($singer["nbArtist"]); ?></div>
                        <div class="txt">Artistes</div>
                    </a>
                </div>
                <div class="count-row row3">
                    <a href="chansons.php">
                        <div class="nber"><?php echo ($song["nbSong"]); ?></div>
                        <div class="txt">Chansons</div>
                    </a>
                </div>
                <div class="count-row row4">
                    <a href="categories.php">
                        <div class="nber"><?php echo ($cat["nbCategories"]); ?></div>
                        <div class="txt">Catégories</div>
                    </a>
                </div>
            </div>

        </div>
    </div>

    
</body>
<script src="../../public/assets/js/modal-administrateur.js"></script>

</html>