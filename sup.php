<?php
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$ida = $_GET["ida"];
$req = "delete from annonce where ida = $ida";
mysqli_query($id, $req);
header("location:listeAnnonce.php");
?>