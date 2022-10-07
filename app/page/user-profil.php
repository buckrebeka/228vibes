<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');

if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $getUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $getUser->execute(array($getId));
    if ($getUser->rowCount() > 0) {
        $user = $getUser->fetchAll();
    }

    if (isset($_POST['send'])) {
        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $email_saisi = htmlspecialchars($_POST['email']);
        $mdp_saisi = sha1($_POST['mdp']);

        $updateUser  = $bdd->prepare('UPDATE users SET :pseudo_saisi,:email_saisi,:password_saisi=? WHERE id = ?');
        // Insertion dans la base de données
        $array = array(
            "pseudo_saisi" => $pseudo_saisi,
            "email_saisi" => $email_saisi,
            "password_saisi" =>  $mdp_saisi
        );
        $updateUser->execute($array);
        header('Location:playlist-page.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="stylesheet" href="../../public/assets/css/media_query.css">
    <link rel="stylesheet" href="../../public/assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228VibesMon profil</title>
</head>

<body>

    <div class="nav-bar-flex">
        <div class="item-container">
            <div class="admin-logo">
                <img src="../../public/assets/icons/Group 10.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="recherche-page.php">
                        <span> <i class="fa-solid fa-magnifying-glass"></i></span>
                        <span>Recherche</span>
                    </a>
                </li>
                <li>
                    <a href="playlist-page.php">
                        <span><i class="fa-solid fa-house-chimney"></i></span>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="userplaylist.php">
                        <span><i class="fa-solid fa-list-ul"></i></span>
                        <span>Bibliothèques</span>
                    </a>
                </li>
                <li id="myUser">
                    <a href="user-profil.php" id="profil">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span class="user_pseudo">Mon profil</span>
                    </a>
                </li>
                <li>
                    <a href="landing-page.php" class="user-deconnexion">
                        <span><i class="fa-solid fa-power-off"></i></span>
                        <span>Deconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="display-container">
            <div class="user-container">
                <div class="user-profil-contain">
                    <div class="profil-user-title">Vue d'ensemble du compte</div>
                    <form method="POST" action="">
                        <input type="text" name="pseudo" id="" value="<?= $_SESSION['pseudo'] ?? null; ?>">
                        <br>
                        <input type="email" name="email" id="" value="<?= $_SESSION['email'] ??null; ?>">
                        <br>
                        <input type="password" name="mdp" id="" value="<?= $_SESSION['mdp'] ??null; ?>">
                        <br>
                        <button type="submit" name="send" id="modif">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </main>
</body>




</html>