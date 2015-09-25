<?php
    session_start();
    $id = session_id();

    $_SESSION["envio"]= 1;

    $platiagreg = $_POST["agregar"];
    $priceplatiagreg = "";

     //se establece la conexión con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{

        $sql2 = 'SELECT Price FROM Dishes WHERE Name = "'.$platiagreg.'"';
        $cons2 = mysqli_query($mysqli, $sql2);

        if ($cons2) {
            $arreglo2 = mysqli_fetch_array($cons2, MYSQLI_ASSOC);
            $priceplatiagreg = $arreglo2['Price'];
        }
        else{
            printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }


        $insert = "INSERT INTO DetOrder VALUES ('$id', '$platiagreg', '$priceplatiagreg')";
        $cons3 = mysqli_query($mysqli, $insert);


        mysqli_free_result($cons2);
        mysqli_close($mysqli);

        header("Location: " . $_SERVER["HTTP_REFERER"]); 
    }

?>