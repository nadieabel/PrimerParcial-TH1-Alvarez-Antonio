<?php 

$conexion = new mysqli("127.0.0.1","root","","parcial");
$sql = "SELECT * FROM producto";
$resultado = $conexion -> query($sql);

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
    
    <h1>Productos</h1>

    <?php foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
            
        <b>ID:</b> <?=$fila['id']?>  
        <b>Nombre:</b>  <?=$fila['nombre']?> 
        <b>Descripcion:</b> <?=$fila['descripcion']?> 
        <b>Stock:</b> <?=$fila['stock']?> 
        
        
        <a href="eliminarCompra.php?id=<?=$fila['id']?>">Eliminar</a>
        <a href="formularioModificarCompra.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    
    <br /> <br />
    <form action="insertarCompra.php" method="post">
        ID Persona: <input type="text" name="id" > <br />
        ID producto: <input type="text" name="nombre" > <br />
      	Fecha: <input type="text" name="descripcion" > <br />
       <input type="submit" value="Enviar">
    </form>
    <br /> <br />    <br /> <br />
<form action="index.php">
    <input type="submit" value="Personas" />
</form>

    <?php if(isset($_GET['exito']) && $_GET['exito'] === "true" ) :?>
        <div style="color: green;">Se realizo la compra exitosamente</div>
    

    <?php endif;?>
    <?php if(isset($_GET['exito']) && $_GET['exito'] === "false" ) :?>
        <div style="color: red;">Hubo un problema :(.</div>

    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div style="color: green;">Se elimino la compra correctamente
        </div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div style="color: red;">Hubo un error al eliminar la compra </div>

    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div style="color: green;">Se modificaron los datos correctamente :D</div>
        <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div style="color: red;">Hubo un error al modificar la compra</div>
    <?php endif;?>
</body>
</html>