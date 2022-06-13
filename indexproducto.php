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
        
        
        <a href="eliminarProducto.php?id=<?=$fila['id']?>">Eliminar</a>
        <a href="formularioModificarProducto.php?id=<?=$fila['id']?>">Modificar</a>

        <br />

    <?php endforeach; ?>

    
    <br /> <br />
    <form action="insertarProducto.php" method="post">
        ID: <input type="text" name="id" > <br />
        Nombre: <input type="text" name="nombre" > <br />
      	Descrpcion: <input type="text" name="descripcion" > <br />
        Stock:<input type="number" name="stock" > <br />
         <input type="submit" value="Enviar">
    </form>
    <br /> <br />    <br /> <br />
<form action="index.php">
    <input type="submit" value="Personas" />
</form>
</form>
<form action="indexcompra.php">
    <input type="submit" value="Comprar" />
</form>

    <?php if(isset($_GET['exito']) && $_GET['exito'] === "true" ) :?>
        <div style="color: green;">Se ingreso el producto correctamente</div>
       <br/> <a href><img src="https://meme.museum/_thumbs/9ed0ec64abcfada0214d975dc748b176/thumb.jpg"></a>

    <?php endif;?>
    <?php if(isset($_GET['exito']) && $_GET['exito'] === "false" ) :?>
        <div style="color: red;">Hubo un problema :(.</div>

    <?php endif;?>

    <?php if(isset($_GET['eliminado']) && $_GET['eliminado'] === "true" ) :?>
        <div style="color: green;">Se eliminó el producto correctamente 
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