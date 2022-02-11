<?php
include "konekcija.php";

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        
        $korpaID = $_POST['korpaID'];
        $proizvodID = $_POST['proizvodID'];
        $kolicina = $_POST['kolicina'];
        
        $connection = new Mysqli('localhost','root','','dekoracijedb');
        $query = "update korpa set korpaID= $korpaID,proizvodID=$proizvodID,kolicina=$kolicina where korpaID=$korpaID";
        $result_query = mysqli_query($connection,$query);
     
         if(!$result_query){
             die("Query Failed" . mysqli_error($connection));
         }
         else {
           $message = "Izmenjena stavka";
           header('Location: korpa.php');
          
     
           }
     }
    
    }
    $id=$_GET["id"];
    $sql = "SELECT k.korpaID as korpaID,k.proizvodID as proizvodID,p.nazivProizvoda as nazivProizvoda,k.kolicina as kolicina,p.cena as cena FROM korpa k join proizvodi p on k.proizvodID=p.proizvodID where k.korpaID='".$id."'";
$rezultat = $konekcija->query($sql);

$stavka = $rezultat->fetch_assoc() ;
    
    
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dekoracije</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
       
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
        <link href="css/styles.css" rel="stylesheet" />

       
    </head>
   
    <body id="page-top">
        
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
        <h1 class="text-center" style="margin-top:170px;margin-bottom:20px; color:#fed136">Izmeni stavku</h1>
        
<div style="width: 315px; height: 315px; text-align: center !important; position: absolute;margin-left:400px;    ">
	
    <form action="izmeni.php?id=<?=$stavka['korpaID']?>" method="post">
    <input type="hidden" text-align: center !important; class='form-control' name="korpaID" value="<?=$stavka['korpaID']?>" id="korpaID">
    <input type="hidden" text-align: center !important; class='form-control' name="proizvodID"value="<?=$stavka['proizvodID']?>" id="proizvodID">
        
        <label style="text-align: center !important;" for="name">Naziv proizvoda</label>
        <input disabled="True" text-align: center !important; class='form-control' type="text" name="nazivProizvoda" value="<?=$stavka['nazivProizvoda']?>" id="nazivProizvoda">
        <label style="margin-top:5px;"for="email">Količina</label>        
        <input class='form-control' type="text" name="kolicina" placeholder="Količina" value="<?=$stavka['kolicina']?>" id="kolicina">
        
        <input style="margin-top:10px;" type="submit" value="Izmeni">
    </form>
    
</div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        
        <script src="js/scripts.js"></script>
 
    </body>
    
</html>