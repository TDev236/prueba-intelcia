<?php
    $id = $_GET['id'];

    //Aqui hacemos la consulta  la tabla
    
    $eliminar = "DELETE FROM `incidencias` WHERE id = '$id'";
    $conexionDB = mysqli_connect('localhost', 'tiffani', '1723FaKing', 'incidencias_restaurante' );
    $eliminar_registro = mysqli_query($conexionDB, $eliminar);

    if($eliminar_registro){
       header("Location: index.php");
    } else {
        echo "<script>alert('Error al intentar eliminar por favor intente nuevamente ');
            window.history.go(-1);
        </script>";
    }

?>
