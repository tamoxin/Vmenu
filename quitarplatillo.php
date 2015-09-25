<?php 
    session_start();
    $id = session_id();

    $platilloreg = $_POST['quitar'];

     //se establece la conexi�n con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	//se establece el query para la consulta
        $delet = 'DELETE FROM DetOrder WHERE Dish = "'.$platilloreg.'" AND ID = "'.$id.'" LIMIT 1';

        $cons = mysqli_query($mysqli, $delet);

        mysqli_close($mysqli); 
        header("Location: " . $_SERVER["HTTP_REFERER"]); 
    }
?>
