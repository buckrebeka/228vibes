<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$getCategories = $bdd->query('SELECT name FROM categories ORDER BY name ASC');
$getArtist = $bdd->query('SELECT name FROM artists ORDER BY name ASC');
if (isset($_POST['send'])) {
    if (!empty($_POST['category_name']) && !empty($_POST['artist_name']) && !empty($_POST['title']) && !empty($_FILES['music'])) {
        $categoryName = $_POST['category_name'];
        $artistName = $_POST['artist_name'];
        $title = $_POST['title'];
        $songPath = $_FILES['music'];
        $emplacement = "../../audio/" . basename($_FILES['music']['name']);
        echo $emplacement;
        // Recuperer l'id du catégorie sélectionnée
        $selectCategory = $bdd->prepare('SELECT id FROM categories WHERE name=?');
        $selectCategory->execute(array($categoryName));

        // Recuperer l'id de l'atiste sélectionné
        $selectArtiste = $bdd->prepare('SELECT id FROM artists WHERE name=?');
        $selectArtiste->execute(array($artistName));
        //Ajout de l'audio dans l'emplacement indiqué

        $allowed = ['audio/mp3'];
				if(in_array($_FILES['music']['type'], $allowed))
				{
					
					move_uploaded_file($_FILES['file']['tmp_name'], $emplacement);

				}else{
					$errors['file'] = "file not valid. allowed types are ". implode(",", $allowed);
				}

        // move_uploaded_file($_FILES['music']['tmp_name'], $emplacement);
        echo  move_uploaded_file($_FILES['music']['tmp_name'], $emplacement);
        echo "<br>";
        echo " chanson ajoutée";
        echo $title;

        // Ajout dans la table song
        echo "Avant la requette";
        if ($selectCategory->rowCount() > 0 && $selectArtiste->rowCount() > 0) {
            echo "Dans la requette";
            $categoryId = $selectCategory->fetch();
            $artisteId = $selectArtiste->fetch();
            $insertSong = $bdd->prepare('INSERT INTO songs(artist_id,category_id,song,title,created_at,updated_at) VALUES (?,?,?,?,NOW(),NOW())');
            echo $categoryId['id'];
            $insertSong->execute(array($categoryId['id'],$artisteId['id'],$emplacement,$title));
            header('Location:chansons.php');
        } else{ //Sinon FALSE.
                     
           echo 'Echec du téléchargement !';
        }
    } else{ //Sinon FALSE.
                     
        echo 'Ajoutez une chanson';
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
    <title>228Vibes Nouvelle chanson</title>
</head>

<body>

    <div class="main-container">
        <div class="logos">
            <img src="../../public/assets/icons/Group 16.png" alt="">
        </div>
        <div class="new-category-container" id="add_songs">
            <div class="new-category">Ajouter une nouvelle Musique</div>

            <form method="POST" action="" enctype="multipart/form-data">
                <input type="text" name="title" id="" placeholder="Titre">
                <br>
                <select name="category_name" id="">
                    <option value="">--Choisir categorie--</option>
                    <?php
                    while ($category = $getCategories->fetch()) {
                    ?>
                        <option value="<?php echo $category["name"]; ?>"><?php echo $category["name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br>
                <select name="artist_name" id="">
                    <option value="">--Choisir artiste--</option>
                    <?php
                    while ($artist = $getArtist->fetch()) {
                    ?>
                        <option value="<?php echo $artist["name"]; ?>"><?php echo $artist["name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <input type="file" name="music" id="" class="file">
                <br>

                <button type="submit" name="send">Ajouter</button>
            </form>
        </div>
    </div>

</body>

</html>