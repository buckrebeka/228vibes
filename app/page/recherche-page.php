<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$allChansons = $bdd->query('SELECT * FROM artists ');
if(isset($_POST['search']) AND !empty($_POST['search'])){
    $recherche = htmlspecialchars($_POST['search']);
    $allChansons = $bdd->query('SELECT `name` FROM artists WHERE `name` LIKE "%'.$recherche.'%" ' );

   
}
$getCategories = $bdd->prepare('SELECT * FROM categories');
$getCategories->execute();
$reslts = $getCategories->fetchAll();
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
  <title>228VibesMusic page</title>
</head>

<body>

  <div class="nav-bar-flex">
    <div class="item-container">
      <div class="admin-logo">
        <img src="../../public/assets/icons/Group 10.png" alt="">
      </div>
      <ul>
        <li>
          <a href="recherche-page.php" class="search-nav">
            <span> <i class="fa-solid fa-magnifying-glass"></i></span>
            <span>Recherche</span>
          </a>
        </li>
        <li>
          <a href="playlist-page.php" >
            <span><i class="fa-solid fa-house-chimney"></i></span>
            <span>Accueil</span>
          </a>
        </li>
        <li>
          <a href="userplaylist.php" >
            <span><i class="fa-solid fa-list-ul"></i></span>
            <span>Bibliothèques</span>
          </a>
        </li>
        <li>
        <li id="myUser">
          <a href="user-profil.php">
            <span><i class="fa-solid fa-gear"></i></span>
            <span class="user_pseudo">Mon profil</span>
          </a>
        </li>
        <li>
            <a href="Login-page.php" class="user-deconnexion">
                <span><i class="fa-solid fa-power-off"></i></span>
                <span>Deconnexion</span>
            </a>
        </li>
      </ul>
    </div>
    <div class="display-container">
      <!-- conteneur d'image -->
      <div class="search_content">
        <div>
            <input type="search" name="search" id="" placeholder="Recherche..." class="input-search">
        </div>
        <div class="search-icon">
        <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <!-- conteneur d'image de categories -->
      <div class="categories-container">
            <?php
            foreach($reslts as $reslt):?>
            <div class="box">
            <a href="music-list-page.php id=<?= $reslt['id']; ?>">
                        <img src="<?= $reslt['photo']  ?>" alt="">
                </a>
                <div>
                    <?= $reslt['name']; ?>
                </div>
            </div>
<?php endforeach  ?>
        </div>
      
      </div>
    </div>
  </div>
  </main>
</body>

</html>