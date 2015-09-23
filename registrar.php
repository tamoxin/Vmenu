<?php

$nombrereg=$_POST['nombre'];
$telreg=$_POST['telefono'];
$mailreg=$_POST['email'];
$compreg=$_POST['compania'];
$direcreg=$_POST['direccion'];
$rfcreg=$_POST['rfc'];

$taken="false";
$database="vmenu";
$username="root";
$password="";

if($nombrereg&&$telreg&&$mailreg&&$compreg&&$direcreg&&$rfcreg){

	$con=mysql_connect("localhost", $username, $password) or die("Unable to connect");
	@mysql_select_db($database, $con) or die("Unable to connect");

	$insert = "INSERT INTO `clientes` VALUES (0, '$nombrereg', '$telreg', '$mailreg', '$compreg', '$direcreg', '$rfcreg')";
	
	mysql_query($insert, $con);

	mysql_close($con);

	header('Location: usuarios.php');

}else{
	echo "Fill out every field";
}



?>