<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$getSongs = $bdd->query('SELECT * FROM songs');
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
                    <a href="recherche-page.php">
                        <span> <i class="fa-solid fa-magnifying-glass"></i></span>
                        <span>Recherche</span>
                    </a>
                </li>
                <li>
                    <a href="playlist-page.php">
                        <span><i class="fa-solid fa-house-chimney"></i></span>
                        <span>Accueil</span>
                    </a>
                </li>
                <li>
                    <a href="userplaylist.php" id="biblo">
                        <span><i class="fa-solid fa-list-ul"></i></span>
                        <span>Bibliothèques</span>
                    </a>
                </li>
                <li id="myUser">
                    <a href="user-profil.php">
                        <span><i class="fa-solid fa-user"></i></span>
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
            <div class="categories-container" id="box-song">

                <?php
                while ($song = $getSongs->fetch()) {
                    $selectArtist = $bdd->prepare('SELECT name,photo FROM artists WHERE id=?');
                    $selectArtist->execute(array($song['artist_id']));
                    $artistInfo = $selectArtist->fetch();

                ?>
                    <div class="box play-box" id="box-music">
                        <img src="../../public/assets/images/notel.jpg" alt="">
                        <div class="artist-name">
                            <?php echo $artistInfo["name"]; ?>
                        </div>
                        <div class="song-name">
                            <?php echo $song["title"]; ?>
                        </div>
                        <div class="none audio-path">
                            <?php echo $song["song"]; ?>
                        </div>
                        <div class="none image-path">
                            <?php echo $artistInfo["photo"]; ?>
                        </div>
                    </div>

                <?php
                }
                ?>
            </div>
        </div>
        <div class="play_nav">
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
                <audio controls  autoplay id="player" >
                    <source src="" type="audio/mp3">
                    <source src="" type="audio/ogg">
                </audio>

            </div>


        </div>
        </main>
</body>
<script src="../../public/assets/js/play.js"></script>

</html>