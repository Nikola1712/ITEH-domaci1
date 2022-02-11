<!DOCTYPE html>

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
        <h1 class="text-center" style="margin-top:170px;margin-bottom:20px; color:#fed136">Cenovnik</h1>
        <h3>Vrsta dekoracije</h3>
		<div style="margin-top:25px;margin-bottom:25px" id="kategorije" class="text-left">

		</div>
		<h3>Sortiranje</h3>
		<div class="row">
			<div class="col-md-6">
				<select class="form-control" id="kolona" onchange="popuniProizvode(sessionStorage.getItem('broj'))">
					<option value="nazivProizvoda" >Naziv</option>
					<option value="cena" >Cena</option>
				</select>
			</div>
			<div class="col-md-6">
				<select class="form-control" id="order" onchange="popuniProizvode(sessionStorage.getItem('broj'))">
					<option value="asc">Rastuce</option>
					<option value="desc">Opadajuce</option>
				</select>
			</div>
		</div>

		<div style="margin-top:20px" id="cenovnik">

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
        <script>
	function popuniKategorije(){
		$.ajax({
			url: "vratiKategorije.php",
			success: function(html){
				$("#kategorije").html(html);
			}
		})
	}

	</script>
	<script>
	function popuniProizvode(id){
		var kolona = $("#kolona").val();
		var order = $("#order").val();
		$.ajax({
			url: "vratiProizvode.php",
			data: "id="+id+"&kolona="+kolona+"&order="+order,
			success: function(html){
				$("#cenovnik").html(html);
			}
		})
	}

	</script>
	<script>
	popuniKategorije();
	popuniProizvode(0);
    sessionStorage.setItem("broj", "0");
	</script>
    </body>
</html>
