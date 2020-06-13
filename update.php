<?php 

error_reporting(~E_NOTICE); 

try {
    $bdd = new PDO("mysql:host=localhost;dbname=demo;charset=UTF8", "root", "");
} catch (Exception $e) {
   die('Erreur : '.$e->getMessage());
}

$id = $_GET['id'];

$req = $bdd->query('SELECT * FROM users WHERE id='.$id);
$users = $req->fetch();

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];



if ($_POST['bouton']) {
    $req = $bdd->prepare('UPDATE users SET nom=:nom, prenom=:prenom WHERE id='.$id);
    $req->execute(compact('nom', 'prenom'));
    header('location:index.php');
    //var_dump($users);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Title</title>
</head>
<body>

    <button class="btn btn-primary" type="button" onClick="javascript:document.location.href='index.php'">
        Retour
    </button>
    
    <div class="container">
        <div class="jumbotron mt-5 w-75 ">
            <h1 class="display-4">Ajouter un utilisateur</h1>
            <hr class="my-4">
            <div class="container">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="nom" value="<?= $user[1] ?>">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom :</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user[2] ?>">
                    </div>
                    <input type="submit" value="Valider" class="btn btn-primary" name="bouton">
                </form>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>