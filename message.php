<?php
session_start();
$idu = $_SESSION["idu"];
if(!isset($_SESSION["mail"])){//si la variable de session mail n'existe pas
    header("location:connexion.php");
}
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$mail = $_SESSION["mail"];
if(isset($_POST["bout"])){
    
    $message = $_POST["message"];
    $destinataire = $_POST["destinataire"];
    $req = "insert into message (idm, idu, mail, message, date, destinataire)
            values (null, '$idu', '$mail', '$message', now(), '$destinataire')";
    mysqli_query($id,$req);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
    <ul class="nav justify-content-end">
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="leboncoin.php">Accueil</a>
  </li> 
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="listeMessage.php">Mes Messages</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="annonce.php">Faire une Annonce</a>
  </li>    
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="listeAnnonce.php">Mes Annonces</a>
  </li>
  <li class="nav-item">   
    <a class="nav-link active " aria-current="page" href="deconnexion.php">Deconnexion</a>
  </li>
  </ul>

    <div class="container">
       <header>
            <div classe="text-center">
            <h1>Envoyer un message</h1>
            </div>
       </header> 
        <div class="messages">
            <ul>
                <?php
                
                $req = "select * from message 
                        where destinataire = '$mail'
                        order by date";
                $res = mysqli_query($id,$req);
                while($ligne = mysqli_fetch_assoc($res)){
                    echo "<li class='message'>".$ligne["date"]." - "
                               .$ligne["mail"]." - "
                               .$ligne["message"].
                        "</li>";
                }
                ?>
                
            </ul>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <input type="text" name="message" placeholder="Message : " required>
                <select name="destinataire">
                    <?php
                        $req = "select * from user order by mail";
                        $res = mysqli_query($id,$req);
                        while($ligne = mysqli_fetch_assoc($res)){
                            echo "<option>".$ligne["mail"]."</option>";
                        }
                    ?>
                </select>
                <input type="submit" value="Envoyer" name="bout">
            </form>
        </div>
    </div>
</body>
</html>