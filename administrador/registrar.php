<?php

$nombrereg=$_POST['usuario'];
$passreg=$_POST['pass'];

if($nombrereg&&$passreg){

	$con = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	$insert = "INSERT INTO admins VALUES ('$nombrereg', '$passreg')";
	
	$result = mysqli_query($con, $insert);

	mysqli_close($con);

	header('Location: usuarios.php?var=1');

}else{
	echo "Fill out every field";
}



?>