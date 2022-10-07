<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
if (isset($_GET['id']) and !empty($_GET['id'])) {
  $getCategoryId = $_GET['id'];
  $selectIdCategory = $bdd->prepare('SELECT song,title,artist_id FROM songs WHERE category_id=?');
  $selectIdCategory->execute(array($getCategoryId));
} else {
  echo "Identifiant manquant";
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
          <a href="playlist-page.php">
            <span><i class="fa-solid fa-house-chimney"></i></span>
            <span>Accueil</span>
          </a>
        </li>
        <li>
          <a href="music-list-page.php" id="music">
            <span><i class="fa-solid fa-headphones"></i></span>
            <span>Musiques</span>
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
      <table>
        <thead>
          <tr>
            <th>Photos</th>
            <th>Non de l'artistes</th>
            <th>Titres</th>
            <th class="none">Chansons</th>
          </tr>
        </thead>
        <tbody id="table-song">
          <?php
          if ($selectIdCategory->rowCount() > 0) {
            while ($data = $selectIdCategory->fetch()) {
              $selectArtist = $bdd->prepare('SELECT name,photo FROM artists WHERE id=?');
              $selectArtist->execute(array($data['artist_id']));
              $artistInfo = $selectArtist->fetch();

          ?>
              <tr class="play-box">
                <td>
                  <img src="<?php echo $artistInfo['photo'] ?>" alt="" width="50px" height="50px">
                </td>
                <td class="artist-name"><?php echo $artistInfo['name'] ?></td>
                <td class="song-name"><?php echo $data['title'] ?></td>
                <td id="song-path" class="none  audio-path"><?php echo $data['song'] ?></td>
                <td class="none image-path"><?php echo $artistInfo['photo'] ?></td>
              </tr>


          <?php }
          } else {
            echo "Echec";
          }
          ?>


    </div>
    <div class="play_nav" id="nav">
      <div class="infoArtist">
        <div>
          <img src="../../public/assets/images/disk.jpg" alt="" width="50px" height="50px" id="music-image">
        </div>
        <div class="titleName">
          <div class="songTitle" id="song">Titre</div>
          <div class="titleSong" id="artist">Nom de l'artiste</div>
        </div>
      </div>
      <div class="play_bar">
        <audio controls autoplay id="player">

          <source src="" type="audio/ogg">
        </audio>



      </div>
    </div>
  </div>

  </main>
</body>
<script src="../../public/assets/js/play.js"></script>

</html>