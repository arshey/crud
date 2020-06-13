<?php 

try {
    $bdd = new PDO("mysql:host=localhost;dbname=demo;charset=UTF8", "root", "");
} catch (Exception $e) {
   die('Erreur : '.$e->getMessage());
}

$id = $_GET['id'];
$req = $bdd->prepare('DELETE FROM users WHERE id='.$id);
$req->execute(compact('id'));
header('location:index.php');
