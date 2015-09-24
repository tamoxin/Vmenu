<?php 
	$ID = "";
    $User = "";
    $Room = "";
    $Hour = "";
    $Price = "";
    $Payment = "";
    $Comentario = "";

    $orden = "";

	$mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	$sql = 'SELECT Orden.ID, Orden.User, Orden.Room, Orden.Hour, Orden.Price, Payment.name, Orden.Comentario FROM Orden INNER JOIN Payment ON Payment.ID = Orden.Payment';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
                $tabla['ID'][] = $arreglo['ID'];
                $tabla['User'][] = $arreglo['User'];
                $tabla['Room'][] = $arreglo['Room'];
                $tabla['Hour'][] = $arreglo['Hour'];
                $tabla['Price'][] = $arreglo['Price'];
                $tabla['Payment'][] = $arreglo['name'];
                $tabla['Comentario'][] = $arreglo['Comentario'];
            }


            for ($x=0; $x <= count($tabla['ID'])-1; $x++){
                $ID = "<table><tr><td>".$tabla['ID'][$x]."</td></tr></table>";
                $User = "<table><tr><td>".$tabla['User'][$x]."</td></tr></table>";
                $Room = "<table><tr><td>".$tabla['Room'][$x]."</td></tr></table>";
                $Hour = "<table><tr><td>".$tabla['Hour'][$x]."</td></tr></table>";
                $Price = "<table><tr><td>".$tabla['Price'][$x]."</td></tr></table>";
                $Payment = "<table><tr><td>".$tabla['Payment'][$x]."</td></tr></table>";
                $Comentario = "<table><tr><td>".$tabla['Comentario'][$x]."</td></tr></table>";


                $Dish = "";
                $PriceD = "";

                $sql1 = 'SELECT Dish, Price FROM DetOrder WHERE ID = "'.$tabla['ID'][$x].'"';
                $cons1 = mysqli_query($mysqli, $sql1);

                if ($cons1) {
					while ($arregloo = mysqli_fetch_array($cons1, MYSQLI_ASSOC)) {
		                $tablaa['Dish'][] = $arregloo['Dish'];
		                $tablaa['PriceD'][] = $arregloo['Price'];
	                }
	                for ($y=0; $y <= count($tablaa['Dish'])-1; $y++){
		                $Dish .= "<table><tr><td>".$tablaa['Dish'][$y]."</td></table>";
		                $PriceD .= "<table><tr><td>".$tablaa['PriceD'][$y]."</td></tr></table>";
                	}
                	$tablaa = null;
                	$arregloo = null;
	            }

	            $orden.='<center>
						    <table border="1" id = "responsivetable">
								  <tr>
								    <td>Usuario</td>
								    <td>Cuarto</td>
								    <td>Hora</td>
								    <td>Precio Total</td>
								    <td>Modo de pago</td>
								    <td>Comentario</td>
								  </tr>
								  <tr>
								    <td>'.$User. '</td>
								    <td>'.$Room. '</td>
								    <td>'.$Hour. '</td>
								    <td>'.$Price. '</td>
								    <td>'.$Payment. '</td>
								    <td>'.$Comentario.'</td>
								  </tr>
							</table>
							<table border="1" id = "responsivetable">
								  <tr>
								    <td>Platillo</td>
								    <td>Precio</td>
								  </tr>
								  <tr>
								    <td>'.$Dish.'</td>
						    		<td>'.$PriceD.'</td>
								  </tr>
							</table>
							<br>
					    </center>
	            ';
            }
        }
        else{
        	printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }
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
					<li><a href="menu.php">Men&uacute</a><span> </span></li>
					<li><a class="active" href="cocina.php">Cocina</a><span> </span></li>
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

		<?php echo $orden;?>

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