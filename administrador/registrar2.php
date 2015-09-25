<?php

$nombrereg=$_POST['name'];
$descreg=$_POST['description'];
$precioreg=$_POST['price'];
$catreg=$_POST['category'];
$filetmp = $_FILES["uploadedfile"]["tmp_name"];
$filename = $_FILES["uploadedfile"]["name"];
$filetype = $_FILES["uploadedfile"]["type"];
$filepath = "/var/www/html/images/menu/".$filename;

if($nombrereg&&$descreg&&$precioreg&&$catreg){
	
	move_uploaded_file($filetmp,$filepath);

	$con = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

	$insert = "INSERT INTO Dishes(Name, Description, Price, Category, imgName) VALUES ('$nombrereg', '$descreg', '$precioreg', '$catreg', '$filename')";
	
	$result = mysqli_query($con, $insert);

	mysqli_close($con);

	header('Location: menu.php?var=1');

}else{
	echo "Fill out every field";
}

?>