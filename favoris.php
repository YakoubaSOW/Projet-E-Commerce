<?php
session_start();
$idu = $_SESSION["idu"];
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$ida = $_GET["ida"];
$req = "insert into favoris values (null, '$ida', '$idu')";
mysqli_query($id, $req);
header("location:listeFavoris.php");
?>