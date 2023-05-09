<?php
include("./conexion.php");


    $id = $_POST['id'];
    
    $estado_incidente = $_POST['estado'];

    //Aqui actualizamos la tabla
    $actualizar = "UPDATE `incidencias` SET `estado_incidente`='$estado_incidente' WHERE id='$id' ";
    $querysql = mysqli_query($conexion, $actualizar);
    print($id + $querysql);

    if($querysql){
        echo "<script>alert('Estado Incidencia Actualizado con Sucesso');
        window.location='/prueba-intelcia/index.php';
        </script>";
    } else {
        echo "<script>alert('Error al intentar actualizar intente nuevamente')</script>";
    }

?>
