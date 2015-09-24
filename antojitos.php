<?php 
	$name="";
    $price="";
    $description="";
	$platillos="";
	$image="";
	
     //se establece la conexión con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	//se establece el query para la consulta
        $sql = 'SELECT Name, Price, Description, ID FROM Dishes WHERE Category = 13';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	//si hubo respuesta a la consulta
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
        		$tabla['name'][] = $arreglo['Name'];
        		$tabla['price'][] = $arreglo['Price'];
        		$tabla['description'][] = $arreglo['Description'];
				$tabla['image'][] = $arreglo['ID'];
        	}


        	for ($x=0; $x <= count($tabla['name'])-1; $x++){
        		$name = $tabla['name'][$x];
        		$price = $tabla['price'][$x];
        		$description = $tabla['description'][$x];
				$image = $tabla['image'][$x];
				if($x%4 != 0){
					$platillos.='
							<div class="col-md-3 offer-left">
							<a href="single.html"><img src="images/menu/'.$image.'.jpg"alt="" />
							<h6> $'.$price.'</h6></a>
							<h4><a href="single.html"> '.$name.'</a></h4>
							<p> '.$description.'</p>
							<div class="o-btn">	
							<form action="ordenchecar.php" method="post"> 
								<button type="submit" name="agregar" value="'.$name.'">Agregar a la orden</button> 
							</form>
							</div>
							</div>';
				}
				else{
					$platillos.='<div class="clearfix"> </div>
							<br> 
							<div class="col-md-3 offer-left">
							<a href="single.html"><img src="images/menu/'.$image.'.jpg"alt="" />
							<h6> $'.$price.'</h6></a>
							<h4><a href="single.html"> '.$name.'</a></h4>
							<p> '.$description.'</p>
							<div class="o-btn">	
							<form action="ordenchecar.php" method="post"> 
								<button type="submit" name="agregar" value="'.$name.'">Agregar a la orden</button> 
							</form>
							</div>
							</div>';
				}
        	}
        }
        else{
        	printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }

		//Segunda consulta
		$sql2 = 'SELECT Dato FROM didYouKnow WHERE ID = 13';
		$cons2 = mysqli_query($mysqli, $sql2);
		if($cons2){
			while ($arreglo2 = mysqli_fetch_array($cons2, MYSQLI_ASSOC)) {
        		$tabla2['dato'][] = $arreglo2['Dato'];
			}
			$dato=$tabla2['dato'][0];
		}else{
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
<meta http-equiv="Content-Type" content="text/html"/>
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
					<li><a href="index.php">Home</a><span> </span></li>
					<li><a href="desayunos.php">Desayunos</a><span> </span></li>
					<li><a class="active" href="comidasycenas.php">Comidas y Cenas</a><span> </span></li>
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
	<div class="bannerAntojitos" id="home">
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
	<!--offer-starts-->
	<div class="offer">
		<div class="container">
			<div class="offer-top heading">
				<h4>Antojitos</h4>
			</div>
			<div class="offer-bottom">
				<?php echo $platillos;?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--offer-ends--> 
	<!--nature-starts--> 
	<div class="nature13">
			<div class="nature-top">
				<h3>&#191Sab&iacuteas que?</h3>
				<p><?php echo $dato?></p>
			</div>
		</div>
	<!--nature-ends--> 
	<!--footer-->
			<div class="copy">
		              <p>2015 Holiday inn. All Rights Reserved | Design by Equipo 4 <a href="http://itesm.com.mx/">ITESM</a> </p>
		            </div>
	<!--/footer-->
		<script type="text/javascript">
									$(document).ready(function() {
										/*
										var defaults = {
								  			containerID: 'toTop', // fading element id
											containerHoverID: 'toTopHover', // fading element hover id
											scrollSpeed: 1200,
											easingType: 'linear' 
								 		};
										*/
										
										$().UItoTop({ easingType: 'easeOutQuart' });
										
									});
								</script>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!--footer-ends--> 
</body>
</html>


<!-- 
Fruit_Salad Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design -->