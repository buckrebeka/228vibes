<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $getCategories = $bdd->prepare('SELECT * FROM categories WHERE id = ?');
    $display = $getCategories->execute(array($getId));
    if($getCategories->rowCount() > 0 ){
        $deleteCategory = $bdd->prepare('DELETE FROM categories WHERE id = ?');
        $deleteCategory->execute(array($getId));

        header('Location:categories.php');
}
  }
?>