<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $getUsers = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $display = $getUsers->execute(array($getId));
    if($getUsers->rowCount() > 0 ){
        $deleteUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
        $deleteUser->execute(array($getId));

        header('Location:users.php');
}
  }
?>