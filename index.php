<?php 

try {
    $bdd = new PDO("mysql:host=localhost;dbname=demo;charset=UTF8", "root", "");
} catch (Exception $e) {
   die('Erreur : '.$e->getMessage());
}

$req = $bdd->query('SELECT * FROM users');
$users = $req->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
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

    

    <button class="btn btn-primary" type="button" onClick="javascript:document.location.href='add.php'">
        Ajouter
    </button>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Informations</h1>
            <hr class="my-4">
            <table class="table table-dark">
                <tbody>
                    <tr>
                        <td>N°</td>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>Action 1</td>
                        <td>Action 2</td>
                    </tr>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user[0] ?></td>
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user[2] ?></td>
                        <td><a href="update.php?id=<?= $user[0] ?>" onclick="return confirm('Modifier cette donnée ?')">Modifier</a></td>
                        <td><a href="delete.php?id=<?= $user[0] ?>" onclick="return confirm('Supprimer cette donnée ?')">Supprimer</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>