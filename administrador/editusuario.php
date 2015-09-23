<?php
$database="proyecto";
$username="root";
$password="";

$con=mysql_connect("localhost", $username, $password) or die("Unable to connect");
	@mysql_select_db($database, $con) or die("Unable to connect");

if(isset($_POST['update'])){
	$id=$_POST['id'];
	$res= mysql_query("SELECT * FROM clientes WHERE id='$id'");
	echo $res;
	$row=mysql_fetch_array($res);
}






if(isset($_POST['nombre'])){
	$newName=$_POST['nombre'];
	$newTel=$_POST['telefono'];
	$newEmail=$_POST['email'];
	$newCom=$_POST['compania'];
	$newDir=$_POST['direccion'];
	$newRfc=$_POST['rfc'];
	$idi=$_POST['idi'];
	$sql="UPDATE clientes SET nombre='$newName', telefono='$newTel', email='$newEmail', compania='$newCom', direccion='$newDir', rfc='$newRfc' WHERE id='$idi'";
	echo $sql;
	$res=mysql_query($sql);

	header('Location: clientes.php');
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
					<li><a class="active" href="usuarios.php">Usuarios</a><span> </span></li>
					<li><a href="comidasycenas.php">Menú</a><span> </span></li>
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
<form action="editusuario.php" method="post">
<h3>Nombre completo</h3><input type="text" name="nombre" value="$row[1]"></input><br><br>
<h3>Telefono</h3><input type="text" name="telefono" value="$row[2]"></input><br><br>
<h3>E-mail</h3><input type="text" name="email" value="$row[3]"></input><br><br>
<h3>Compania</h3><input type="text" name="compania" value="$row[4]"></input><br><br>
<h3>Direccion</h3><input type="text" name="direccion" value="$row[5]"></input><br><br>
<h3>RFC</h3><input type="text" name="rfc" value="$row[6]"></input><br><br>
<input type="hidden" name="idi" value="$row[0]"></input>
<input type="submit" value="Update"></input>
</form>