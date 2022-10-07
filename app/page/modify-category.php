<?php
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
if (isset($_GET['id'])) {
    $getId = $_GET['id'];

    $getCategory = $bdd->prepare('SELECT * FROM categories WHERE id = ?');
    $getCategory->execute(array($getId));
    if ($getCategory->rowCount() > 0) {
        $category = $getCategory->fetch();
    }
}
if (isset($_GET['id']) and !empty($_GET['id'])) {

    if (isset($_POST['send'])) {

        $emplacement = "../../test/".basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], $emplacement);
        $newCategory = htmlspecialchars($_POST['titre']);
        $newImage = $_FILES['photo'];
        $updateCategory = $bdd->prepare('UPDATE categories SET name = ?,photo = ? WHERE id = ?');
        $updateCategory->execute(array($newCategory, $emplacement, $getId));
        header('Location:categories.php');
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
    <title>Modifier une categorie</title>
</head>

<body>
    <div class="new-category-container">
        <div class="new-category">Modifier une nouvelle categorie</div>

        <form method="post" action="" enctype="multipart/form-data">
            <input type="text" name="titre" value="<?= $category['name']; ?>">
            <input type="file" name="photo" id="" value="<?= $category['photo']; ?>" class="file">
            <br>

            <button name="send" type="submit">Modifier</button>

        </form>
    </div>

</body>

</html>