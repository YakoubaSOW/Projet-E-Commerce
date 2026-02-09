<?php
session_start();
include("connect.php");
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
    <a class="nav-link active" aria-current="page" href="listeAnnonce.php">Mes Annonce</a>
  </li>
  <li class="nav-item">   
    <a class="nav-link active " aria-current="page" href="deconnexion.php">Deconnexion</a>
  </li>
  </ul><hr>


   <h1>Liste de mes Conversation </h1><hr>
    <table class="table">
        <tr>
            <th>CONVERSATION</th><th>DESTINATAIRE<th>DATE</th>
            <th><img src="message.png" width="30"></th>
            <th><img src="sup.png" width="30"></th>
        </tr>

        <?php
        $req = "select * from message";
        if($_SESSION["idu"] == $idu){
            $req = "select * from message where idu ='$idu'";
        }
        $res = mysqli_query($id, $req);
        while($ligne = mysqli_fetch_assoc($res)){
        $req2 = "select user.mail
                 from user, message
                 where user.idu = message.idu
                 and message.idm = ".$ligne["idm"];
        $res2 = mysqli_query($id, $req2);
        $ligne2 = mysqli_fetch_assoc($res2);
            echo "<tr>
                    <td class='gauche'>".$ligne["idm"]."</td>
                    <td>".$ligne["destinataire"]."</td>
                    <td>".$ligne["date"]."</td>
                    <td><a href='message.php?idm=".$ligne["idm"]."'><img src='message.png' width='30'></a></td>
                    <td><a href='supM.php?idm=".$ligne["idm"]."'><img src='sup.png' width='30'></a></td>
                </tr>";
        }
        ?>
  <ul class="nav justify-content-end ">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="message.php">Crée une nouvelle conversation</a>
  </li>
    </table>
</body>
</html>