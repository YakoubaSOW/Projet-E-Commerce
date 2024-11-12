<?php
session_start();
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$idu = $_SESSION["idu"]
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
<body class="bg-light">
<img src="logo.jpeg" width="250" class="img-thumbnail" alt="...">

<ul class="nav justify-content-end ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="leboncoin.php">Accueil</a>
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


   <h1>Liste de mes Annonces </h1><hr>
    <table class="table">
        <tr>
            <th>Numéro du produit</th><th>PRODUIT</th><th>IMAGE</th><th>PRIX</th><th>DESCRIPTION</th><th>CATEGORIE</th><th>Date</th>
            <th><img src="modif.png" width="30"></th>
            <th><img src="sup.png" width="30"></th>
        </tr>

        <?php
        $req = "select * from annonce";
        if($_SESSION["idu"] == $idu){
            $req = "select * from annonce where idu ='$idu'";
        }
        $res = mysqli_query($id, $req);
        while($ligne = mysqli_fetch_assoc($res)){
        $req2 = "select user.mail
                 from user, annonce
                 where user.idu = annonce.idu
                 and annonce.ida = ".$ligne["ida"];
        $res2 = mysqli_query($id, $req2);
        $ligne2 = mysqli_fetch_assoc($res2);
            echo "<tr>
                    <td class='gauche'>".$ligne["ida"]."</td>
                    <td><img src='image/".$ligne["photo"]."' width='100'></td>
                    <td>".$ligne["produit"]."</td>
                    <td>".$ligne["prix"]."</td>
                    <td>".$ligne["description"]."</td>
                    <td>".$ligne["categorie"]."</td>
                    <td>".$ligne["date"]."</td>
                    <td><a href='modif.php?ida=".$ligne["ida"]."'><img src='modif.png' width='30'></a></td>
                    <td><a href='sup.php?ida=".$ligne["ida"]."'><img src='sup.png' width='30'></a></td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>