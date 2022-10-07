<?php
session_start();
// verifier si les champs sont vides
$error = "";
$emailError = "";
$regex = "";
$regexMdp = "";
$empty_pseudo = false;
$empty_email = false;
$empty_mdp = false;




if (isset($_POST['send'])) {

    if (empty($_POST['pseudo'])) {
        echo "pseudo vide";
        $empty_pseudo = true;
    }
    if (empty($_POST['email'])) {
        echo "email vide";

        $empty_email = true;
    }
    if (empty($_POST['mdp'])) {
        echo "mdp vide";

        $empty_mdp = true;
    }
    // verification des champs 
    if (!$empty_pseudo and !$empty_email and !$empty_mdp) {
        echo 'loooo';

        $bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
        // déclaration des variables
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $email = $_POST['email'];
        $mdp = sha1($_POST['mdp']);
        // verification de l'email existant
        $request = 'SELECT * FROM users WHERE email = ?';
        $verify = $bdd->prepare($request);
        $verify->execute(array($email));
        $verificationResult = $verify->fetch();
        //  Validation de l'inscription
        if (!($verify->rowCount() > 0)) {
            // Insertion dans la base de données
            $array = array(
                "pseudo" => $pseudo,
                "email" => $email,
                "password" => $mdp
            );
            $query = 'INSERT INTO users(pseudo,email,`password`) VAlUES(:pseudo,:email,:password)';
            $addUser = $bdd->prepare($query);
            $result = $addUser->execute($array);
            header('Location:playlist-page.php');
            
        } else {
            $emailError = "Utilisateur existant";
        }
        
        // si le champ est vide
    } else {
        $error =  "Remplissez le champ";
    }
    
}
// $_SESSION['pseudo'] =$pseudo;
// $_SESSION['email'] =$email;
// $_SESSION['mdp'] =$mdp;


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
    <title>228VibesInscription page</title>
</head>

<body id="body-inscrip">

    <div class="main-container">
        <div class="logos">
            <a href="index.php">
                <img src="../../public/assets/icons/Group 16.png" alt="">
            </a>
        </div>
        <div class="inscription-text">Inscrivez-vous gratuitement.</div>
        <div class="big-container">
            <div class="left-container">
                <img src="../../public/assets/images/Listening happy music-amico.png" alt="">
            </div>
            <div class="right-container">
                <div class="login-text">
                    <div class="inscription">
                        <a href="inscription-page.php" id="inscrip_under">Inscription</a>
                    </div>
                    <div class="connexion">
                        <a href="Login-page.php">Connexion</a>
                    </div>
                </div>
                <form method="POST" action="">
                    <input type="text" name="pseudo" id="" placeholder="Votre Pseudo">

                    <?php if ($empty_pseudo) : ?>
                        <br>
                        <span class="error"><?= $error . " pseudo" ?></span>
                    <?php endif; ?>
                    <br><br>
                    <input type="email" name="email" id="" placeholder="Email">
                    <?php if ($empty_email) : ?>
                        <br>
                        <span class="error"><?= $error . " email" ?></span>
                    <?php endif; ?>
                    <br>
                    <div class="error"><?= $regex ?></div>
                    <br>
                    <span class="error"><?= $emailError ?></span>
                    <br>
                    <input type="password" name="mdp" id="" placeholder="Mot de passe">
                    <?php if ($empty_mdp) : ?>
                        <br>
                        <span class="error"><?= $error . " mot de passe" ?></span>
                    <?php endif; ?>
                    <br>
                    <div class="error"><?= $regexMdp ?></div>
                    <br>
                    <button type="submit" name="send" class="btn">Inscription</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>