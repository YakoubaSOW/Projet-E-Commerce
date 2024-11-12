<?php
$id = mysqli_connect("localhost:3307","root","","leboncoin");
$idm = $_GET["idm"];
$req = "delete from message where idm = $idm";
mysqli_query($id, $req);
header("location:listeMessage.php");
?>