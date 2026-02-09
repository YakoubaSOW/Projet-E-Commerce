<?php
include("connect.php");
$ida = $_GET["ida"];
$req = "delete from annonce where ida = $ida";
mysqli_query($id, $req);
header("location:listeAnnonce.php");
?>