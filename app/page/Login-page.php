<?php
session_start();
$error = "";

$empty_email= false;
$empty_mdp = false;
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');

if (isset($_POST['send'])) {
    
    
    if(empty($_POST['email'])){
        echo "email vide";

        $empty_email =true;
    }
    if(empty($_POST['mdp'])){
        echo "mdp vide";

        $empty_mdp =true;
    }
    if  (!$empty_email and !$empty_mdp) {
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $req = 'SELECT * FROM users WHERE  email = ? AND `password` = ?';
        $getUser = $bdd->prepare($req);
        
        $getUser->execute(array($email,$mdp));
        $userData = $getUser->fetch();
        if ($getUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $userData['id'];
            header('Location:playlist-page.php');
        }else{
            echo"Mot de passe ou email incorrect";
        }
        
    } else {
        $error =  "Remplissez le champ";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228VibesConnexion page</title>
</head>

<body id="body_con">

    <div class="main-container">
        <div class="logos">
            <a href="index.php">
                <img src="../../public/assets/icons/Group 16.png" alt="">
            </a>
        </div>
        <div class="inscription-text">Connectez-vous gratuitement.</div>
        <div class="big-container">
            <div class="left-container">
                <img src="../../public/assets/images/Listening happy music-pana.png" alt="">
            </div>
            <div class="right-container">
                <div class="login-text">
                    <div class="inscription">
                        <a href="inscription-page.php">Inscription</a>
                    </div>
                    <div class="connexion" id="connect_under">
                        <a href="Login-page.php">Connexion</a>
                    </div>
                </div>
                <form method="POST" action="">
                    <input type="email" name="email" id="" placeholder="Email">
                    <?php if ($empty_email) :?>
                        <br>
                        <span class="error"><?= $error." email" ?></span>
                    <?php endif; ?>
                    <br>
                    <input type="password" name="mdp" id="" placeholder="Mot de passe">
                    <?php if ($empty_mdp) :?>
                        <br>
                        <span class="error"><?= $error." mdp" ?></span>
                    <?php endif; ?>
                    <br>
                    <button type="submit" name="send" class="btn">Connexion</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>