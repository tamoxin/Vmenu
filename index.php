<?php
	// Start the session
	session_start();

	if(isset($_SESSION['Platillos'])){
		foreach(unserialize($_SESSION['Platillos']) as $x) { 
			$orden[]=$x; 
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vmenu_Equipo4</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="" />

		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
			function hideURLbar(){ window.scrollTo(0,1); } 
		</script>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'><script src="js/jquery-1.11.0.min.js"></script>

		<script src="js/jquery.min.js"> </script>

		<!---- start-smoth-scrolling---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
		</script>
	</head>



	<body>
		<!----start-header---->
		<div class="header" id="home">
			<div class="container">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt=""></a>
				</div>
				<div class="navigation">
				 <span class="menu"></span> 
					<ul class="navig">
						<li><a class="active" href="index.php">Home</a><span> </span></li>
						<li><a href="desayunos.php">Desayunos</a><span> </span></li>
						<li><a href="comidasycenas.php">Comidas y Cenas</a><span> </span></li>
						<li><a href="postres.php">Postres</a><span> </span></li>
						<li><a href="bebidas.php">Bebidas</a><span> </span></li>
					</ul>
				</div>
					 <!-- script-for-menu -->
				<script>
					$("span.menu").click(function(){
						$(" ul.navig").slideToggle("slow" , function(){
						});
					});
			 	</script>
			 <!-- script-for-menu -->
			</div>
		</div>	
		<!----end-header---->
		<!--banner-starts-->
		<div class="bannerHome" id="home">
		</div>	
		<!--banner-ends--> 

		<!--Se muestra la orden-->
		<?php
			if(empty($orden)){
				echo "No hay platillos en la orden";
			}
			else{
				echo "Si hay platillos en la orden";
				foreach($orden as $x) { 
		?>
					<br></br>
		<?php		print_r($x);
				}
			}
		?>
		<!--footer-->
		<div class="copy">
			<p>© 2015 Holiday inn. All Rights Reserved | Design by Equipo 4 <a href="http://itesm.com.mx/">ITESM</a> </p>
	    </div>
		<!--/footer-->
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!--footer-ends--> 
	</body>
</html>


<!-- 
Fruit_Salad Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design -->