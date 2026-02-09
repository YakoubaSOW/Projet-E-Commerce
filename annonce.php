<?php
session_start();
$idu = $_SESSION["idu"];
$mail = $_SESSION["mail"];
include("connect.php");
if(isset($_POST["bout"])){
    $produit = $_POST["produit"];
    $description = $_POST["description"];
    $prix = $_POST["prix"];
    $photo = $_POST["photo"];
    $categorie = $_POST["categorie"];
    $req = "insert into annonce (ida, idu, mail, produit, description, prix, photo, categorie, date)
    values (null, '$idu', '$mail', '$produit', '$description', '$prix', '$photo', '$categorie', now())";
    mysqli_query($id, $req);
    echo "L'annonce du $produit a bien été posté, vous allez être redirigé....";
    header("refresh:3; url=listeAnnonce.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary">

<div class="text-center bg-light rounded m-5 p-5">
    <h1>Création d'une annonce </h1><hr>
    <form action="" method="post">
        <label for="">Produit</label>
        <input class="form-control" type="text" name="produit" id="">
       
        <label for="">Description du produit</label>
        <input class="form-control" type="text" name="description" id="">

        <label for="">Prix</label>
        <input class="form-control" type="text" name="prix" id="">

        <label for="">Photo du produit</label>
        <input class="form-control" type="file" name="photo" id="">

        <label for="">Catégorie</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="categorie">
                    <?php
                        $req = "select distinct categorie from annonce";
                        $res = mysqli_query($id,$req);
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option>".$ligne["categorie"]."</option>";
                        }
                    ?>
                </select>

        <input type="submit" class="btn btn-outline-success mt-3" value="Envoyer" name="bout">
</div>
    </form>
</body>
</html>