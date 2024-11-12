<?php
session_start();
$id = mysqli_connect("localhost:3307","root","","leboncoin");
if(isset($_POST["bout"])){
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $req = "select * from user where mail='$mail' and mdp='$mdp'";
    $res = mysqli_query($id, $req);
    $ligne = mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res)>0){
        $_SESSION["mail"] = $mail;
        $_SESSION["idu"] = $ligne["idu"];
        $_SESSION["nom"] = $ligne["nom"];
        $_SESSION["prenom"] = $ligne["prenom"];
        $_SESSION["avatar"] = $ligne["avatar"];
        header("location:leboncoin.php");
    }else $erreur = "<h3>Erreur de login ou de mot de passe!!</h3>";
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
    <h1>Connexion</h1><hr>
    <form action="" method="post">
        <label for="">Mail</label>
        <input class="form-control" type="text" name="mail" placeholder="Entrez votre login/mail" required>
        
        <label for="">Mot de passe</label>
        <input class="form-control" type="password" name="mdp" placeholder="Mot de passe" required>
        
        <?php if(isset($erreur)) echo $erreur ?>
        <input class="btn btn-outline-success mt-3" type="submit" value="Connexion" name="bout">
    </form><b></b>
    
    <a href="creationUser.php">Création d'un utilisateur</a>
</body>
</html>