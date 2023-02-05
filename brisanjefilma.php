<?php
include "server/konekcija.php";

$id=$_GET['id'];
$sql = "DELETE FROM film WHERE id='".$id."'";
$mysqli->query($sql) or die($sql);

header("Location:repertoar.php");
 ?>