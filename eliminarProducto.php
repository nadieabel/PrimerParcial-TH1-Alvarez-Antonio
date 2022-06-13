<?php 

    $conexion = new mysqli("127.0.0.1","root","","parcial");
    $sql = "DELETE FROM producto WHERE id = " . $_GET['id'];
    if($conexion -> query($sql) === TRUE )
        header("Location: indexproducto.php?eliminado=true");
    else 
        header("Location: indexproducto.php?eliminado=false");