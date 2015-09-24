<?php
    session_start();
    $id = session_id();

    $dish="";
    $price="";
    $total= 0;

	 //se establece la conexi�n con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{

    	//se establece el query para la consulta
        $sql = 'SELECT Dish,Price FROM DetOrder WHERE ID= "'.$id.'"';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	//si hubo respuesta a la consulta
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
        		$tabla['Dish'][] = $arreglo['Dish'];
        		$tabla['Price'][] = $arreglo['Price'];
        	}

        	if(isset($tabla)){
	        	for ($x=0; $x <= count($tabla['Dish'])-1; $x++){
	        		$dish.= "<table><tr><td>".$tabla['Dish'][$x]."</td></tr></table>";
	        		$price.= "<table><tr><td>".$tabla['Price'][$x]."</td></tr></table>";
	                $total = $total + $tabla['Price'][$x];
	        	}
        	}

        }
        else{
        	printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }

        //borra el resultado del query
        mysqli_free_result($cons);
        mysqli_close($mysqli); 
    }
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Vmenu_Equipo4</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html;" />
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
		<center>
			<table border="1">
			  <tr>
			    <td>platillo</td>
			    <td>precio</td>
			  </tr>
			  <tr>
			    <td><?php echo $dish; ?></td>
			    <td><?php echo $price; ?></td>
			  </tr>
			</table><br><br>

			<h3> Total: "<?php echo $total; ?>"</h3><br>

			<form action="registrar3.php" method="post">
				<h3>Nombre completo</h3><input type="text" name="name"></input><br>
				<h3>N&uacutemero de cuarto</h3><input type="text" name="room"></input><br><br>

				<h3>Forma de pago: 1- Efectivo, 2- Cr&eacutedito, 3- Cargo a la habitaci&oacuten (Escribir el n&uacutemero)</h3><br>
				<input type="text" name="payment"></input><br><br>

				<h3>Comentarios adicionales:</h3><br>
				<textarea rows="15" cols="50" name="comentario"></textarea><br>

				<input type="submit" value="Confirmar orden"></input>
			</form>
		</center>
		<!--footer-->
		<div class="copy">
			<p>2015 Holiday inn. All Rights Reserved | Design by Equipo 4 <a href="http://itesm.com.mx/">ITESM</a> </p>
	    </div>
		<!--/footer-->
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
		<!--footer-ends--> 
	</body>
</html>


<!-- 
Fruit_Salad Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design -->