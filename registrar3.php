<?php
    session_start();
    $id = session_id();

        $cuartoreg=$_POST['room'];
        $pagoreg=$_POST['payment'];
        $comentarioreg=$_POST['comentario'];
        $nombrereg = $_POST['name'];

        $nombre="";
        $total= 0;

        if($cuartoreg&&$pagoreg&&$nombrereg){

        	    $con = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

                $sql2 = 'SELECT Name FROM Users WHERE Room="'.$cuartoreg.'"';
                $cons2 = mysqli_query($con, $sql2);

                if ($cons2) {
                        $arreglo2 = mysqli_fetch_array($cons2, MYSQLI_ASSOC);
                	$nombre = $arreglo2['Name'];
                }
        	    else{
                	printf("Could not retrieve records: %s\n", mysqli_error($con));
                }

                $sql = 'SELECT Price FROM DetOrder WHERE ID= "'.$id.'"';

                $cons = mysqli_query($con, $sql);

                 if ($cons) {

                        while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
                            $tabla['Price'][] = $arreglo['Price'];
                        }

                        for ($x=0; $x <= count($tabla['Price'])-1; $x++){
                            $total = $total + $tabla['Price'][$x];
                        }
                }
                else{
                        printf("Could not retrieve records: %s\n", mysqli_error($con));
                }

               
                if($nombre == $nombrereg){
        	       $insert = "INSERT INTO Orden VALUES ('$id', '$nombre', $cuartoreg, curtime(), '$total', '$pagoreg', '$comentarioreg')";
        	       $result = mysqli_query($con, $insert);
                   session_regenerate_id();
                }
        	    mysqli_close($con);

        	    header('Location: index.php?var=1');

        }
        else{
        	echo "Fill out every field";
        }

?>