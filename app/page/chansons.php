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
    <link rel="stylesheet" href="../../public/assets/fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/icons/Group 10.png">
    <title>Afficher les chansons</title>
</head>

<body>
    <!-- Afficher les categories -->

    <div class="nav-bar-flex">
        <div class="item-container">
            <div class="admin-logo">
                <img src="../../public/assets/icons/Group 10.png" alt="">
            </div>
            <ul>
                <li>
                    <a href="tableau-de-bord.php">
                        <span><i class="fa-solid fa-table-columns"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="users.php">
                        <span><i class="fa-solid fa-user"></i></span>
                        <span>Utilisateurs</span>
                    </a>
                </li>
                <li>
                    <a href="artistes.php">
                        <span><i class="fa-solid fa-microphone"></i></span>
                        <span>Artistes</span>
                    </a>
                </li>
                <li>
                    <a href="chansons.php" id="songpage">
                        <span><i class="fa-solid fa-music"></i></span>
                        <span>Chansons</span>
                    </a>
                </li>
                <li>
                    <a href="categories.php" >
                        <span><i class="fa-solid fa-note-sticky"></i></span>
                        <span>Cat??gories</span>
                    </a>
                </li>
                <li id="myUser">
                   <a href="admin-account.php">
                   <span><i class="fa-solid fa-gear"></i></span>
                    <span>Mon compte</span>
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

            <div>
                <button id="add-btn">
                    <a href="add-song.php" id="add-category">
                        <i class="fa-solid fa-plus"></i>
                        <span>Ajouter</span>
                    </a>
                </button>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>Titres</th>
                        <th>Audio</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($song = $getSongs->fetch()) {
                    ?>
                        <tr>
                            <td><?php echo $song["title"]; ?></td>
                            <td><?php echo $song["song"]; ?></td>
                            <td>
                                <a href="delete-song.php? id=<?= $song['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>

        </div>
    </div>



</body>

</html>