<?php 
	$name="";
    $price="";
    $description="";

     //se establece la conexi�n con el servidor
    $mysqli = mysqli_connect("localhost", "phpuser", "phpuser", "vmenu");

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    else{
    	//se establece el query para la consulta
        $sql = 'SELECT Name, Price, Description FROM Dishes WHERE Category = 6';

        $cons = mysqli_query($mysqli, $sql);

        if ($cons) {
        	//si hubo respuesta a la consulta
        	while ($arreglo = mysqli_fetch_array($cons, MYSQLI_ASSOC)) {
        		$tabla['name'][] = $arreglo['Name'];
        		$tabla['price'][] = $arreglo['Price'];
        		$tabla['description'][] = $arreglo['Description'];

        		echo $arreglo['name'];
        	}


        	for ($x=0; $x <= count($tabla['name'])-1; $x++){
        		$name .= "<table><tr><td>".$tabla['name'][$x]."</td></tr></table>";
        		$price.= "<table><tr><td>".$tabla['price'][$x]."</td></tr></table>";
        		$description.= "<table><tr><td>".$tabla['description'][$x]."</td></tr></table>";
        	}
        }
        else{
        	printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
        }

        //borra el resultado del query
        mysqli_free_result($cons);
        mysqli_close($mysqli); 
    }
?>

<!DOCTYPE html>
<html>
	
	<head>
	</head>
	<body>
		<div>
		    <table>        
                <tr>
		        <th>Name</th>
		        <th>Price</th>
		        <th>Description</th>
		        </tr>

		        <td><?php echo $name;?></td>
		        <td><?php echo $price;?></td>
		        <td><?php echo $description;?></td>
		    </table>
		</div>
	</body>
</html>

