<?php

	$con=mysql_connect('localhost','root','');
	if(!$con){
		die('could not connect to server');
	}

	$db=mysql_select_db('vmenu',$con);
	if(!$db){
		die('could not connect to database');
	}
	$query="SELECT * FROM Users";
	$data=mysql_query($query,$con);
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
<table border="1">
  <tr>
    <td>id</td>
    <td>nombre</td>
    <td>telefono</td>
    <td>email</td>
    <td>compania</td>
    <td>direccion</td>
    <td>rfc</td>
  </tr>
  <?php while($row = mysql_fetch_array($data)) : ?>
  <tr>
  	<form action="editusuario.php" method="post">
    <td><input type="text" name="id" value="<?php echo $row['id']; ?>"></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['telefono']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['compania']; ?></td>
    <td><?php echo $row['direccion']; ?></td>
    <td><?php echo $row['rfc']; ?></td>
    <td>
      <input type="submit" name="Update" value="Update">
    </td>
</form>
  </tr>
  <?php endwhile; ?>
</table>
<?php

	mysql_close($con);

?>

<form action="regusuario.php">
<input type="submit" value="Crear usuario"></input>
</form>