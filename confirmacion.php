<?php
    session_start();
    $id = session_id();

    $dish="";
    $price="";
    $numOrder="";
    $total= 0;

	 //se establece la conexi�n con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{

    	$sql1 = 'SELECT ID FROM Orden ORDER BY ID DESC LIMIT 1';
        $cons1 = mysqli_query($mysqli, $sql1);

        if ($cons1) {
        	$arreglo1 = mysqli_fetch_array($cons1, MYSQLI_ASSOC);
        	$numOrder = $arreglo1['ID'];
        	$numOrder++;
        }
		else{
        	printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }

    	//se establece el query para la consulta
        $sql = 'SELECT Dish,Price FROM DetOrder WHERE ID= "'.$id.'"';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	//si hubo respuesta a la consulta
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
        		$tabla['Dish'][] = $arreglo['Dish'];
        		$tabla['Price'][] = $arreglo['Price'];
        	}


        	for ($x=0; $x <= count($tabla['Dish'])-1; $x++){
        		$dish.= "<table><tr><td>".$tabla['Dish'][$x]."</td></tr></table>";
        		$price.= "<table><tr><td>".$tabla['Price'][$x]."</td></tr></table>";
                $total = $total + $tabla['Price'][$x];
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

<!---- start-smoth-scrolling---->
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
					<li><a href="administrador.php">Home</a><span> </span></li>
					<li><a href="usuarios.php">Usuarios</a><span> </span></li>
					<li><a href="menu.php">Menú</a><span> </span></li>
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
	<!--FlexSlider-->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>
			<!--End-slider-script-->
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
<h3>Número de cuarto</h3><input type="text" name="room"></input><br><br>

<h3>Forma de pago: 1- Efectivo, 2- Crédito, 3- Cargo a la habitación (Escribir el número)</h3><br>
<input type="text" name="payment"></input><br><br>

<h3>Comentarios adicionales:</h3><br>
<textarea rows="15" cols="50" name="comentario"></textarea><br>

<input type="submit" value="Confirmar orden"></input>
</form>
</center>
