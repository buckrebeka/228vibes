<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
?>
<?php
$getUsers = $bdd->query('SELECT * FROM users');
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
    <title>Afficher les utilisateurs</title>
</head>

<body>
    <!-- Afficher les utilisateurs -->
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
                    <a href="users.php" id="myUserpage">
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
                    <a href="chansons.php">
                        <span><i class="fa-solid fa-music"></i></span>
                        <span>Chansons</span>
                    </a>
                </li>
                <li>
                    <a href="categories.php">
                        <span><i class="fa-solid fa-note-sticky"></i></span>
                        <span>Catégories</span>
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

            <table>
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($user = $getUsers->fetch()) {
                    ?>
                        <tr>
                            <td><?= $user['pseudo']  ?></td>
                            <td><?= $user['email']  ?></td>
                            <td><a href="delete.php? id=<?= $user['id']; ?>"><i class="fa-solid fa-trash-can"></i></a></td>
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