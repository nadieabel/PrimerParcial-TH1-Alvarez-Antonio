<?php 

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
   

    $conexion = new mysqli("127.0.0.1","root","","parcial");

    $sql = "UPDATE producto SET 
      nombre='$nombre',
      descripcion='$descripcion',
      stock=$stock
      WHERE id=$id";

    if($conexion -> query($sql) === TRUE )
        header("Location: indexproducto.php?modificado=true");
    else 
        header("Location: indexproducto.php?modificado=false");