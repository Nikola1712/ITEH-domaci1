<?php


include "konekcija.php";

$id=$_GET["id"];
$sql="DELETE FROM korpa WHERE korpaID='".$id."'";
if ($rezultat = $konekcija->query($sql)){
    header('Location: korpa.php');
}


?>

