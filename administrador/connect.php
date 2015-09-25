<?php
	 session_start();
	 $_SESSION["inicio"]= 1;

	$inputuser=$_POST['user'];
	$inputpass=$_POST['pass'];

	$connect= mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	$query="SELECT * FROM `admins` WHERE `usuario`='$inputuser'";
	$querypass="SELECT FROM `admins` WHERE `pass`='$inputpass'";

	$result=mysqli_query($connect, $query);
	$resultpass=mysqli_query($connect, $querypass);

	$row=mysqli_fetch_array($result);
	$rowpass=mysqli_fetch_array($resultpass);

	$serveruser=$row["usuario"];
	$serverpass=$row["pass"];

	if($serveruser&&$serverpass){

		if($inputpass==$serverpass){
			header('Location: administrador.php');
		}else{
			echo "<br><center>Usuario o contraseña incorrecto</b></center><br><br>";
		}
	}
	else{
		echo "<br><center>Usuario o contraseña incorrecto</b></center><br><br>";
	}

	mysqli_free_result($result);
	mysqli_free_result($resultpass);
    mysqli_close($connect);  
?>
