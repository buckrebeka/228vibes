<?php 
$bdd = new PDO('mysql:host=localhost;dbname=vibes;port=3307;','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    $getArtists = $bdd->prepare('SELECT * FROM artists WHERE id = ?');
    $display = $getArtists->execute(array($getId));
    if($getArtists->rowCount() > 0 ){
        $deleteArtist = $bdd->prepare('DELETE FROM artists WHERE id = ?');
        $deleteArtist->execute(array($getId));

        header('Location:artistes.php');
}
  }
?>