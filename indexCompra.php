<?php 

$conexion = new mysqli("127.0.0.1","root","","parcial");
$sql= " SELECT p.id,pr.id,c.fecha_hora,pr.stock,p.nombre,p.apellido,pr.nombre
  FROM compra as c 
                        INNER JOIN persona as p ON c.id_persona = p.id 
                        INNER JOIN producto as pr ON c.id_producto = pr.id;";

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
    
    
                  
    <?php foreach($resultado -> fetch_all(MYSQLI_ASSOC) as $fila) :?>
            
        <b>ID del Cliente:</b> <?=$fila['id']?>  
        <b>ID del Producto :</b>  <?=$fila['id2']?> 
        <b>Fecha:</b> <?=$fila['fecha']?> 
        <b>Stock:</b> <?=$fila['stock']?> 
        <b>Nombre Cliente:</b> <?=$fila['Nombre']?> 
        <b>Apellido Cliente</b> <?=$fila['apellido']?> 
        <b>Nombre Producto:</b> <?=$fila['Nombre']?> 
        
        
        
        <a href="eliminarCompra.php?id=<?=$fila['id']?>">
            
        Eliminar</a>
        <a href="formularioModificarCompra.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    
    <br /> <br />
    <form action="insertarCompra.php" method="post">
        ID del cliente: <input type="text" name="id" > <br />
        Id del Producto: <input type="text" name="id2" > <br />
        Fecha: <input type="datetime-local" name="fecha" > <br />         
        <input type="submit" value="Comprar">

    </form>
    <br /> <br />    <br /> <br />
<form action="index.php">
    <input type="submit" value="Personas" />
    </form>
    <form action="indexproducto.php">
    <input type="submit" value="Productos" />

</form>


    <?php if(isset($_GET['exito']) && $_GET['exito'] === "true" ) :?>
        <div style="color: green;">Se realizo la compra correctamente</div>
       <br/> <a href><img src="https://meme.museum/_thumbs/9ed0ec64abcfada0214d975dc748b176/thumb.jpg"></a>

    <?php endif;?>
    <?php if(isset($_GET['exito']) && $_GET['exito'] === "false" ) :?>
        <div style="color: red;">Hubo un problema :(.</div>

    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div style="color: green;">Se realizo la compra correctamente
       <br/> <a href><img src="https://meme.museum/_thumbs/9ed0ec64abcfada0214d975dc748b176/thumb.jpg"></a>
        </div>
    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "false" ) :?>
        <div style="color: red;">Hubo un error al eliminar</div>

    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "true" ) :?>
        <div style="color: green;">Se modificaron los datos correctamente</div>
        <br/><a href><img src="https://meme.museum/_thumbs/9ed0ec64abcfada0214d975dc748b176/thumb.jpg"></a>
    <?php endif;?>

    <?php if(isset($_GET['modificado']) && $_GET['modificado'] === "false" ) :?>
        <div style="color: red;">Hubo un error al modificar al usuario</div>
    <?php endif;?>
</body>
</html>