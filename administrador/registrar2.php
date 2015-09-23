<?php

$nombrereg=$_POST['name'];
$descreg=$_POST['description'];
$precioreg=$_POST['price'];
$catreg=$_POST['category'];

if($nombrereg&&$descreg&&$precioreg&&$catreg){

	$con = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	$insert = "INSERT INTO Dishes(Name, Description, Price, Category) VALUES ('$nombrereg', '$descreg', '$precioreg', '$catreg')";
	
	$result = mysqli_query($con, $insert);

	mysqli_close($con);

	header('Location: menu.php?var=1');

}else{
	echo "Fill out every field";
}



?>