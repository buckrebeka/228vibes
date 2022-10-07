<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $getSongs = $bdd->prepare('SELECT * FROM songs WHERE id = ?');
    $display = $getSongs->execute(array($getId));
    if($getSongs->rowCount() > 0 ){
        $deleteSongs = $bdd->prepare('DELETE FROM songs WHERE id = ?');
        $deleteSongs->execute(array($getId));

        header('Location:chansons.php');
}
  }
?>