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

    if($id === "")
        $sql = "INSERT INTO producto values($nombre,$descripcion,stock)
        VALUES ('$nombre','$descripcion',$stock)";
           else 
        $sql = "INSERT INTO producto VALUES($id,'$nombre','$descripcion',$stock)";

    if($conexion -> query($sql) === TRUE )
        header("Location: indexproducto.php?exito=true");
    else 
        header("Location: indexproducto.php?exito=false");