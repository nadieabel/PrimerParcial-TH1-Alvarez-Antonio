	<?php 

    $conexion = new mysqli("127.0.0.1","root","","parcial");
    $sql = "DELETE FROM compra 
    WHERE id_persona =  .$_GET-['id'] 
    and id_producto= .$_GET-['id2']";

    if($conexion -> query($sql) === TRUE )
        header("Location: index.php?eliminado=true");
    else 
        header("Location: index.php?eliminado=false");




        