<?php 

    if($_SERVER['REQUEST_METHOD'] !== "POST"){
        header('Location: 404.php');
        echo "404 Not found";    
    }
    
    $id = $_POST['id'];
    $id2 = $_POST['id2'];
    $fecha = $_POST['fecha'];
    $stock=$_POST['stock'];
   $stock2=$stock-1;


    $conexion = new mysqli("127.0.0.1","root","","parcial");

        $sql = "INSERT INTO compra (id_persona,id_producto,fecha_hora)
        VALUES ($id,$id2,'$fecha')";
        $sql= "UPDATE producto
        SET stock=$stock2
        where id=".$id2;
        
    

    if($conexion -> query($sql) === TRUE )
        header("Location: indexCompra.php?exito=true");
    else 
        header("Location: indexCompra.php?exito=false");