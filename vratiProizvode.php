<?php
include 'konekcija.php';

$id = $_GET['id'];
$order = $_GET['order'];
$kolona = $_GET['kolona'];

if($id == 0){
  $sql = "SELECT * FROM proizvodi p 
  JOIN vrstaDekoracije d ON p.vrstaDekoracijeID = d.vrstaDekoracijeID 
  order by $kolona $order";
}else{
  $sql = "SELECT * FROM proizvodi p 
  JOIN vrstaDekoracije d ON p.vrstaDekoracijeID = d.vrstaDekoracijeID
   where d.vrstaDekoracijeID=$id  
  order by $kolona $order";
}


$rezultat = $konekcija->query($sql);


?>

 <table class="table table-hover">
   <thead>
   <tr>
     <th>Vrsta dekoracije</th>
     <th>Naziv proizvoda</th>
     <th>Cena</th>
     <th>
                        
     </th>
   </tr>
 </thead>
 <tbody>

<?php
while($red = $rezultat->fetch_assoc()){
?>
<tr>

  <td><?php echo $red['nazivVrsteDekoracije']; ?></td>
  <td><?php echo $red['nazivProizvoda']; ?></td>
  <td><?php echo $red['cena']; ?> rsd</td>
 
</tr>
<?php

}
 ?>

</tbody>
</table>
