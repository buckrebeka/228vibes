<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$adminLog = "";
$adminEmpty = "";
if (isset($_POST['send'])) {
    // verification
    if (!empty($_POST['identifiant']) and !empty($_POST['mdp'])) {

        $identifiant = $_POST['identifiant'];
        $mdp = $_POST['mdp'];
        $req = 'SELECT * FROM admin WHERE identifiant = ? AND password = ?';
        $getAdmin = $bdd->prepare($req);
        $getAdmin->execute(array($identifiant, $mdp));
        $array = array(
            "identifiant" => $identifiant,
            "password" => $mdp,
        );
        $admin = $getAdmin->fetch();
        if ($admin) {
            $_SESSION['identifiant'] = $identifiant;
            $_SESSION['mdp'] = $mdp;
            header('Location:tableau-de-bord.php');
        }
        // mot de passe ou identifiant incorrect

        else {
            $adminLog = "Vérifiez votre identifiant ou mot de passe";
        }
    }
    // champs vides
    else {
        $adminEmpty = "Remplissez tous les champs";
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
    <link rel="stylesheet" href="../../public/assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228VibesAdmin page</title>
</head>

<body>
    <div class="admin">
        <div>
            <img src="../../public/assets/icons/Group 10.png" alt="">
        </div>
        <form method="POST" action="">
            <span class="error"><?= $adminLog ?></span>
            <span class="error"><?= $adminEmpty ?></span>
            <input type="text" name="identifiant" id="" placeholder="identifiant">
            <br>
            <input type="password" name="mdp" id="" placeholder="mot de passe">
            <br>
            <button type="submit" name="send">Connexion</button>
        </form>
    </div>

</body>

</html>