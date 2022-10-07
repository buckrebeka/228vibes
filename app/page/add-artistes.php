<?php 
session_start();

if(isset($_POST['send'])){
    $bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
    
        $artiste = htmlspecialchars($_POST['nom']);
        $photo = $_FILES['photo'];
        $emplacement = "../../upload/".basename($_FILES['photo']['name']);

        move_uploaded_file($_FILES['photo']['tmp_name'], $emplacement);
       
        echo $artiste.$photo." image ajoutée";
        
        $insertArtist = $bdd->prepare('INSERT INTO artists(name,created_at,updated_at,photo) VALUES (?,NOW(),NOW(),?)');
        
        $insertArtist->execute(array($artiste,$emplacement));
    header('Location:artistes.php');
    
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
    <title>228Vibes Nouveau artiste</title>
</head>

<body>

    <div class="main-container">
        <div class="logos">
            <img src="../../public/assets/icons/Group 16.png" alt="">
        </div>
        <div class="new-category-container">
            <div class="new-category">Ajouter un artiste</div>

            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="nom" id="" placeholder="Nouveau artiste">
                <input type="file" name="photo" id="" class="file">
                <br>
                <button type="submit" name="send">Ajouter</button>
            </form>
        </div>
    </div>

</body>

</html>