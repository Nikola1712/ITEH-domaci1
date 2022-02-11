<?php
include 'konekcija.php';

$sql = "select * from vrstaDekoracije";

$rezultat = $konekcija->query($sql);


 ?>
 <button class="btn btn-success" 
 onclick="popuniProizvode(0); sessionStorage.setItem('broj',0)">Sve dekoracije</button>
<?php
while($red = $rezultat->fetch_assoc()){
?>
 <button class="btn btn-success" 
 onclick="popuniProizvode(<?php echo $red['vrstaDekoracijeID'] ?>);sessionStorage.setItem('broj', <?php echo $red['vrstaDekoracijeID'] ?>);
">
 <?php echo $red['nazivVrsteDekoracije'] ?></button>

<?php

}



?>        


