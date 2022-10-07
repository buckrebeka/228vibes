<?php
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getId = $_GET['id'];
    $getArtist = $bdd->prepare('SELECT * FROM artists WHERE id = ?');
    $getArtist->execute(array($getId));
    if ($getArtist->rowCount() > 0) {
        $artist = $getArtist->fetch();
    }
    if (isset($_POST['send'])) {
        $newArtist = htmlspecialchars($_POST['nom']);
        $newPhoto = 
        $updateArtist = $bdd->prepare('UPDATE artists SET name = ? WHERE id = ?');
        $updateArtist->execute(array($newArtist, $getId));
        header('Location:artistes.php');
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
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>Modifier artist</title>
</head>

<body>
    <div class="new-category-container">
        <div class="new-category">Modifier un artist</div>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="nom" value="<?= $artist['name']; ?>">
            <input type="file" name="photo" id="" value="<?= $artist['photo']; ?>" class="file">
            <button name="send">Modifier</button>

        </form>
    </div>

</body>

</html>