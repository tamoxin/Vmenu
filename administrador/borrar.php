<?php

$idreg=$_POST['id'];

if($idreg){

	$con = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	$delete = "DELETE FROM Dishes WHERE ID=$idreg";
	
	$result = mysqli_query($con, $delete);

	mysqli_close($con);

	header('Location: menu.php?var=1');

}else{
	echo "Fill out every field";
}



?>