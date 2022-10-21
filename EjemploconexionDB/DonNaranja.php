

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

<?php
    include 'conexion.php';
    session_start();
    $varsession = $_SESSION['Rol'];

    if ($varsession == 1 ){
        echo "

        
        <h4> <a href='crear.php'>Añadir Producto</a></h4>
        
        ";
    }
    
    ?>
    <h4> <a href='index.php'>Volver</a> </h4>

<table class="table table-responsive">
    <tr> 
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Cantidad</th>
        <th>Precio</th>
    </tr>

    <?php
    include "./conexion.php";

    $consulta = "SELECT * FROM producto";
    $resultado = $con->query($consulta);

   
    while($filas = $resultado->fetch_array() ) {
        if ($filas[4] == 1){
            echo "
                <tr>
                    <td>".$filas[0]."</td>  
                    <td>".$filas[1]."</td>
                    <td>".$filas[2]."</td>
                    <td>".$filas[3]."</td>
                   
            ";
            if ($varsession == 1 ){
                echo "
        
                <td>
                    <a href='actualizar.php?codigo=".$filas[0]."&nombre=".$filas[1]."&cantidad=".$filas[2]."&precio=".$filas[3]."'>actualizar</a>
                    <a href='eliminar.php?codigo=".$filas[0]."'>eliminar</a>
                </td>
                
                ";
            }
        }       
    } 

?>
    </tr>

</table>

</body>
<?php include "./Cabeza/footer.php";?>
</html>