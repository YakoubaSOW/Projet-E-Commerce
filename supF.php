<?php
include("connect.php");
$idf = $_GET["idf"];
$req = "delete from favoris where idf = $idf";
mysqli_query($id, $req);
header("location:listeFavoris.php");
?>