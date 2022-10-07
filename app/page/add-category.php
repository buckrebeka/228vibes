<?php 
session_start();




if(isset($_POST['send'])){
    $bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
    
    $category = htmlspecialchars($_POST['titre']);
        $photo = $_FILES['photo'];
        $emplacement = "../../test/".basename($_FILES['photo']['name']);

        move_uploaded_file($_FILES['photo']['tmp_name'], $emplacement);
        
        $insertCategory = $bdd->prepare('INSERT INTO categories(name,photo,created_at,updated_at) VALUES (?,?,NOW(),NOW())');
        $insertCategory->execute(array($category,$emplacement));
    header('Location:categories.php');
    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>228Vibes Nouvelle categorie</title>
</head>

<body>

    <div class="main-container">
        <div class="logos">
            <img src="../../public/assets/icons/Group 16.png" alt="">
        </div>
        <div class="new-category-container">
            <div class="new-category">Ajouter une nouvelle categorie</div>

            <form method="POST" action=""  enctype="multipart/form-data">
                <input type="text" name="titre" id="" placeholder="Nouvelle categorie">
                <input type="file" name="photo" id="" class="file">
                <br>
                <button type="submit" name="send">Ajouter</button>
            </form>
        </div>
    </div>

</body>

</html>