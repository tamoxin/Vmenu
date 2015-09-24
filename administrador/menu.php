<?php
	$id="";
    $name="";
    $price="";
    $category="";

	 //se establece la conexión con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	//se establece el query para la consulta
        $sql = 'SELECT ID,Name,Price,Category FROM Dishes';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	//si hubo respuesta a la consulta
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
        		$tabla['ID'][] = $arreglo['ID'];
        		$tabla['Name'][] = $arreglo['Name'];
        		$tabla['Price'][] = $arreglo['Price'];
        		$tabla['Category'][] = $arreglo['Category'];
        	}


        	for ($x=0; $x <= count($tabla['ID'])-1; $x++){
        		$id .= "<table><tr><td>".$tabla['ID'][$x]."</td></tr></table>";
        		$name.= "<table><tr><td>".$tabla['Name'][$x]."</td></tr></table>";
        		$price.= "<table><tr><td>".$tabla['Price'][$x]."</td></tr></table>";
        		$category .= "<table><tr><td>".$tabla['Category'][$x]."</td></tr></table>";
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
					<li><a class="active" href="menu.php">Men&uacute</a><span> </span></li>
					<li><a href="cocina.php">Cocina</a><span> </span></li>
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
    <td>ID</td>
    <td>Nombre</td>
    <td>Precio</td>
    <td>Categor&iacutea</td>
  </tr>
  <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $name; ?></td>
    <td><?php echo $price; ?></td>
    <td><?php echo $category; ?></td>
  </tr>
</table>

<form action="regplatillo.php">
<input type="submit" value="Agregar platillo"></input>
</form>

<form action="borrarplatillo.php">
<input type="submit" value="Borrar platillo"></input>
</form>

</center>