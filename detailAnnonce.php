<?php
session_start();
$idu = $_SESSION["idu"];
include("connect.php");
if(!isset($_SESSION["idu"])){//si la variable de session mail n'existe pas
    header("location:connexion.php");
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
    <script src="https://kit.fontawesome.com/13086b36a6.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
<img src="logo.jpeg" width="250" class="img-thumbnail" alt="...">
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="leboncoin.php">Accueil</a>
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

<div class="text-center bg-light">
<h1><?=$ligne2["produit"]?></h1>
<?php
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$ida = $_GET["ida"];
$req = "select * from annonce where ida = $ida";
$res = mysqli_query($id, $req);
while($ligne = mysqli_fetch_assoc($res)){
            echo "<h2> 
                 <img src='image/".$ligne["photo"]."'width='200'><br>PRIX : " 
                 .$ligne["prix"]."€ <br> "
                 .$ligne["description"]." <br> "
                 .$ligne["categorie"]." <br> Annonce faite par :  "
                 .$ligne["mail"]." <br> Annonce faite le :  "
                 .$ligne["date"]." ";
}
?>
</div>
</body>
</html>


