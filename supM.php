<?php
include("connect.php");
$idm = $_GET["idm"];
$req = "delete from message where idm = $idm";
mysqli_query($id, $req);
header("location:listeMessage.php");
?>