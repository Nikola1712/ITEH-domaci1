<?php

include("konekcija.php");   
$connection = new Mysqli('localhost','root','','dekoracijedb');
if (isset($_POST['dodaj']))
{
   $proizvod = $_POST['proizvod']; 
   $kolicina   = $_POST['kolicina'];

   $query = "INSERT INTO korpa(proizvodID,kolicina) VALUES ('$proizvod','$kolicina')";
   $result_query = mysqli_query($connection,$query);

    if(!$result_query){
        die("Query Failed" . mysqli_error($connection));
    }
    else {
     
      }
}


?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dekoracije</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

       
    </head>
   
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
               
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link" href="index.html">Početna</a></li>
                        <li class="nav-item"><a class="nav-link" href="listaProizvoda.php">Lista proizvoda</a></li>
                        <li class="nav-item"><a class="nav-link" href="korpa.php">Korpa</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       
        <div class="container">
        <h1 class="text-center" style="margin-top:170px;margin-bottom:20px; color:#fed136">Moja korpa</h1>
        <form action="" method="post" name="form">
        <table class="table table-hover">
  
 <tbody>

<tr>
<div class="col-md-6">
<?php
$sql = "SELECT * FROM proizvodi";
$rezultat = $konekcija->query($sql);
echo "<td><select class='form-control' name='proizvod'>
<option value=''>Izaberite proizvod</option>";
while ($red = $rezultat->fetch_assoc()) {
echo "<option value='$red[proizvodID]'>$red[nazivProizvoda]</option>"; 
}
echo "</select></td>";
echo "<td><input class='form-control' style='weight:50px !important' type='text' id='kolicina' name='kolicina'></td>";
?>
<td><input type="submit" name="dodaj" value="Dodaj u korpu" /></td>
 
</tr>
</tbody>
</table>
<?php
$sql = "SELECT k.korpaID as korpaID,k.proizvodID as proizvodID,p.nazivProizvoda as nazivProizvoda,k.kolicina as kolicina,(p.cena*k.kolicina) as cena FROM korpa k join proizvodi p on k.proizvodID=p.proizvodID order by k.korpaID";
$rezultat = $konekcija->query($sql);
?>
<table style="margin-top:30px;" class="table table-hover">
   <thead>
   <tr>
     <th style="width:50%">Naziv proizvoda</th>
     <th>Kolicina</th>
     <th>Cena</th>
     <th style="width:5%">Izmeni</th>
     <th style="width:5%">Obriši</th>
   </tr>
 </thead>
 <tbody>

<?php
while($red = $rezultat->fetch_assoc()){
?>
<tr>

  <td><?php echo $red['nazivProizvoda']; ?></td>
  <td><?php echo $red['kolicina']; ?></td>
  <td><?php echo $red['cena']; ?> rsd</td>
  <td>
  <button type="button" name="update" onclick="window.location.href='izmeni.php?id=<?=$red['korpaID']?>';" value="<?php echo $red->proizvodID;?>" class="btn btn-warning btn-lg warning" id="'.$red["proizvodID"].'"><i class="far fa-edit" aria-hidden="true"></i></button>
  </td>
  <td>
  <button type="button" name="delete" onclick="window.location.href='obrisi.php?id=<?=$red['korpaID']?>';" value="<?php echo $red->korpaID;?>" class="btn btn-danger btn-lg delete" id="'.$red["korpaID"].'"><i class="fa fa-times" aria-hidden="true"></i></button>
  </td>
  
 
</tr>
<?php

}
 ?>

</tbody>
</table>

</form>

		</div>
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
 
      
    </body>
    
</html>

