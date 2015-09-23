<?php

$inputuser=$_POST['user'];
$inputpass=$_POST['pass'];
$user="root";
$password="";
$database="vmenu";

$connect=mysql_connect("localhost",$user,$password);
@mysql_select_db($database) or ("database not found");

$query="SELECT * FROM `usuarios` WHERE `usuario`='$inputuser'";
$querypass="SELECT FROM `usuarios` WHERE `pass`='$inputpass'";

$result=mysql_query($query);
$resultpass=mysql_query($querypass);

$row=mysql_fetch_array($result);
$rowpass=mysql_fetch_array($resultpass);

$serveruser=$row["usuario"];
$serverpass=$row["pass"];

if($serveruser&&$serverpass){
	if(!$result){
		die("username or password is invalid");
	}

	echo "<br><center>Database output</b></center><br><br>";
	mysql_close();

	echo $inputpass;
	echo $serverpass;

	if($inputpass==$serverpass){
		header('Location: administrador.php');
	}else{
		echo "sorry, bad login";
	}
}

