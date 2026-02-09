<?php
session_start();
$idu = $_SESSION["idu"];
include("connect.php");
if(!isset($_SESSION["idu"])){//si la variable de session mail n'existe pas
    header("location:connexion.php");
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
    <script src="https://kit.fontawesome.com/13086b36a6.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<img src="logo.jpeg" width="250" class="img-thumbnail" alt="...">

<div class="text-center">
    <h1>Bienvenue sur Leboncoin <?php echo $_SESSION["prenom"]?> <?php echo $_SESSION["nom"]?> <?php echo "<img src='avatar/".$_SESSION["avatar"]."' width='200'>"?></h1>
    </div>

    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="annonce.php">Faire une Annonce</a>
  </li>    
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="listeAnnonce.php">Mes Annonces</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="listefavoris.php">Mes Favoris</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="listeMessage.php">Mes Messages</a>
  </li>
  <li class="nav-item">   
    <a class="nav-link active " aria-current="page" href="deconnexion.php">Deconnexion</a>
  </li>
  
</ul><hr>

    <h3>Liste des annonces </h3>
    <form action="" method="post">
        Recherche :
        <input class="form-control" type="text" name="produit" placeholder="Nom du produit :">
        Catégorie :
        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mail">
                <option value="ctg">  Reset  </option>
            <?php
            $req = "select distinct categorie from annonce order by date DESC";
            $res = mysqli_query($id, $req);
            while($ligne = mysqli_fetch_assoc($res)){
                echo "<option value='".$ligne["categorie"]."'>".$ligne["categorie"]."</option>";
            }
            ?>
        </select>
        <input class="btn btn-outline-success mt-3" type="submit" value="Rechercher" name="bouton">
    </form><hr>

    <table class="table">
        <tr>
            <th>NUMERO</th><th>PHOTO</th><th>PRODUIT</th><th>PRIX</th><th>CATEGORIE</th><th>Date</th>
            <th><img src="favoris.png" width="30"></th>
            <th><img src="detail.png" width="30"></th>
        </tr>
        <?php
        $req = "select * from annonce order by date DESC";
        if(isset($_POST["bouton"])){
            $produit = $_POST["produit"];
            $categorie = $_POST["mail"];
            $req = "select * from annonce where produit like '%$produit%' order by date DESC";
            if($categorie != "ctg"){
              $req = "select * from annonce
                  where produit like '%$produit%'
                  and categorie='$categorie'
                  order by date DESC";
            }
        }
        $res = mysqli_query($id, $req);
        while($ligne = mysqli_fetch_assoc($res)){
            echo "<tr>
                    <td class='gauche'>".$ligne["ida"]."</td>
                    <td><img src='image/".$ligne["photo"]."' width='100'></td>
                    <td>".$ligne["produit"]."</td>
                    <td>".$ligne["prix"]."</td>
                    <td>".$ligne["categorie"]."</td>
                    <td>".$ligne["date"]."</td>
                    <td><a href='favoris.php?ida=".$ligne["ida"]."'><img src='favoris.png' width='30'></a></td>
                    <td><a href='detailAnnonce.php?ida=".$ligne["ida"]."'><img src='detail.png' width='30'></a></td>
                </tr>";
        }

        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>