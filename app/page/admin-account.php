<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
 
    if (isset($_POST['send'])) {
        $id_saisi = htmlspecialchars($_POST['identifiant']);
        $updateAdmin  = $bdd->prepare('UPDATE admin SET identifiant=?');
        $updateAdmin->execute(array($id_saisi));
        $_SESSION['identifiant'] =  $id_saisi;
        // header('Location:tableau-de-bord.php');
        
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
    <title>228VibesAdmin compte page</title>
</head>

<body>

    <div class="nav-bar-flex">
        <div class="item-container">
            <div class="admin-logo">
                <img src="../../public/assets/icons/Group 10.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="tableau-de-bord.php">
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
                    <a href="admin-account.php" id="account">
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

            <!-- admin profil -->
            <div class="user-container">
                <div class="user-profil-contain">
                    <div class="profil-user-title">Profil de l'administrateur</div>
                    <form method="POST" action="">
                        <input type="text" name="identifiant" id="" value="<?= $_SESSION['identifiant'] ?? '' ?>">
                        <br>
                        <button type="submit" name="send">Modifier</button>
                    </form>
                </div>
            </div>
        </div>


</html>