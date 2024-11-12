<?php
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$idf = $_GET["idf"];
$req = "delete from favoris where idf = $idf";
mysqli_query($id, $req);
header("location:listeFavoris.php");
?>