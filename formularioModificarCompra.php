<?php 


    $conexion = new mysqli("127.0.0.1","root","","parcial");
    $sql = "SELECT * FROM compra WHERE id =" . $_GET['id'];
    $resultado = $conexion -> query($sql)  -> fetch_all(MYSQLI_ASSOC)[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Modificar cliente</h1>

<form action="modificarCompra.php" method="post">
        ID1: <input type="text" name="id" value="<?= $resultado['id'] ?>" readonly> <br />
       ID2: <input type="text" name="id2" value="<?= $resultado['id2'] ?>" readonly> <br />
       Fecha: <input type="datetime-local" name="fecha" value="<?= $resultado['apellido'] ?>" > <br />
        <input type="submit" value="Enviar">
    </form>
</body>
</html>