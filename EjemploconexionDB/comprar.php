<?php
session_start();

//! negación, !isset = Que no exista
if (!isset($_SESSION['Nombre'])) {
    header('Location: inicio.php');
}
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

   

<table class="table table-responsive">
    <tr> 
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>
    <?php

        include "conexion.php";

        
        $consulta = "SELECT * FROM producto";
        $resultado = $con->query($consulta);

        $filas = $resultado->fetch_array();

        while($filas = $resultado->fetch_array()){
            echo "
                    <tr>
                        <td>".$filas[0]."</td>
                        <td>".$filas[1]."</td>
                        <td>".$filas[2]."</td>
                        <td>".$filas[3]."</td>
                        <td>                        
                            <a href='comprar.php?codigo=".$filas[0]."&nombre=".$filas[1]."&cantidad=".$filas[2]."&precio=".$filas[3]."'>agregar</a>
                        </td>
                    
                ";
                
        }
    ?>
    </tr>

</table>

</body>

</html>