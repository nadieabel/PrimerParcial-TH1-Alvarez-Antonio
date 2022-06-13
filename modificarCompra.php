<?php 

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_POST['id'];
    $id2= $_POST['id2'];
    $fecha = $_POST['fecha'];
   
   

    $conexion = new mysqli("127.0.0.1","root","","parcial");

    $sql = "UPDATE compra SET 
      fecha='$fecha',
      WHERE "id=$id and id2=$id2;

    if($conexion -> query($sql) === TRUE )
        header("Location: indexproducto.php?modificado=true");
    else 
        header("Location: indexproducto.php?modificado=false");