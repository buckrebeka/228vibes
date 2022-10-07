<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$getCategories = $bdd->query('SELECT * FROM categories');
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
    <title>Afficher les categories</title>
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
                    <a href="chansons.php">
                        <span><i class="fa-solid fa-music"></i></span>
                        <span>Chansons</span>
                    </a>
                </li>
                <li>
                    <a href="categories.php" id="catpage">
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

            <div>
                <button id="add-btn">
                    <a href="add-category.php" id="add-category">
                        <i class="fa-solid fa-plus"></i>
                        <span>Ajouter</span>
                    </a>
                </button>
            </div>


            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Noms</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($category = $getCategories->fetch()) {
                    ?>
                        <tr>
                            <td>
                                <img src="<?= $category['photo']  ?>" alt="" width="50px" height="50px">
                            </td>
                            <td><?php echo $category["name"]; ?></td>
                            <td>
                                <a href="modify-category.php? id=<?= $category['id']; ?>"><i class="fa-solid fa-pencil"></i></a>
                                <a href="delete-category.php? id=<?= $category['id']; ?>" class="del"><i class="fa-solid fa-trash-can"></i></a>
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