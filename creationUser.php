<?php
include("connect.php");
if(isset($_POST["bout"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $req = "insert into user (idu, nom, prenom, mail, mdp)
            values (null, '$nom', '$prenom', '$mail', '$mdp')";
    mysqli_query($id, $req);
    echo "L'utilisateur $nom $prenom a bien été ajouté à la base, vous allez être redirigé....";
    header("refresh:3; url=connexion.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">

    <div class="text-center bg-light rounded m-5 p-5">
    <h1>Inscription </h1>
    <form action="" method="post">
        <label for="">Nom</label>
        <input class="form-control" type="text" name="nom" placeholder="Nom : " required>

        <label for="">Prenom</label>
        <input class="form-control" type="text" name="prenom" placeholder="Prenom : " required>

        <label for="">Mail</label>
        <input class="form-control" type="text" name="mail" placeholder="Mail : " required>

        <label for="">Mot de passe</label>
        <input class="form-control" type="password" name="mdp" placeholder="Mot de passe : " required>

        <label for="">Photo du profil</label>
        <input class="form-control" type="file" name="avatar">

        <input class="btn btn-outline-success mt-3" type="submit" value="Envoyer" name="bout">
    </form>
</body>
</html>