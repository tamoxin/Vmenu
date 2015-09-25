<?php 

    $orden = $_POST['quitaro'];

     //se establece la conexi�n con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	//se establece el query para la consulta
        $upd = 'UPDATE Orden SET Aux = 1 WHERE ID = "'.$orden.'"';

        $cons = mysqli_query($mysqli, $upd);

        mysqli_close($mysqli); 
        header("Location: " . $_SERVER["HTTP_REFERER"]); 
    }
?>
