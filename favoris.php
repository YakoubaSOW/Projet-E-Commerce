<?php
session_start();
$idu = $_SESSION["idu"];
include("connect.php");
$ida = $_GET["ida"];
$req = "insert into favoris values (null, '$ida', '$idu')";
mysqli_query($id, $req);
header("location:listeFavoris.php");
?>