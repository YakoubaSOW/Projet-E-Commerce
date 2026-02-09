<?php
session_start();
include("connect.php");
if(isset($_POST["bout"])){
    $ida = $_POST["ida"];
    $idu = $_POST["idu"];
    $mail = $_POST["mail"];
    $produit = $_POST["produit"];
    $prix = $_POST["prix"];
    $photo = $_POST["photo"];
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];
    $req3 = "update annonce set produit = '$produit',
                                photo = '$photo',
                                prix = '$prix',
                                description = '$description',
                                categorie = '$categorie',
                                date = now()
            where ida = $ida";
    mysqli_query($id, $req3);
    header("location:listeAnnonce.php");
}
$ida = $_GET["ida"];
$req2 = "select * from annonce where ida = $ida";
$res2 = mysqli_query($id, $req2);
$ligne2 = mysqli_fetch_assoc($res2);
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
    <h1>Modification des infos du <?=$ligne2["produit"]?></h1>
    <form action="" method="post">
        <input type="hidden" name="ida" value="<?=$ligne2["ida"]?>">
        <input type="hidden" name="idu" value="<?=$ligne2["idu"]?>">
        <input type="hidden" name="mail" value="<?=$ligne2["mail"]?>">

        <label for="">Produit</label>
        <input class="form-control" type="text" name="produit" value="<?=$ligne2["produit"]?>" required>

        <label for="">Prix</label>
        <input class="form-control" type="text" name="prix" value="<?=$ligne2["prix"]?>" required>

        <label for="">Description</label>
        <input class="form-control" type="text" name="description" value="<?=$ligne2["description"]?>" required>

        <label for="">Photo du produit</label>
        <input class="form-control" type="file" name="photo" value="<?=$ligne2["photo"]?>">

        <label for="">Catégorie</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="categorie" value="<?=$ligne2["categorie"]?>" required>
                    <?php
                        $req = "select distinct categorie from annonce";
                        $res = mysqli_query($id,$req);
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option>".$ligne["categorie"]."</option>";
                        }
                    ?>
                </select>

        <input type="submit" class="btn btn-outline-success mt-3" value="Enregistrer" name="bout">
        </div>
</form>
</body>
</html>