
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;', 'root', 'root');
$getCategories = $bdd->prepare('SELECT * FROM categories');
$getCategories->execute();
$reslts = $getCategories->fetchAll();
?>