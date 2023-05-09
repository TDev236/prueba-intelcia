<?php
$flag = '';
    if(isset($_POST['submit'])){
        $numero_mesa = $_POST['mesa'];
        $descripcion_incidente = $_POST['descripcion'];
        $prioridad_incidente = $_POST['prioridad'];
        $estado_incidente = $_POST['estado'];
        $conexion = mysqli_connect('localhost', 'tiffani', '1723FaKing', 'incidencias_restaurante' );
        $querysql = mysqli_query($conexion, "INSERT INTO `incidencias`(`numero_mesa`, `descripcion_incidente`, `prioridad_incidente`, `estado_incidente`) 
        VALUES ('$numero_mesa','$descripcion_incidente','$prioridad_incidente','$estado_incidente')");

        if($querysql){
            $flag= '1';
        } else {
            $flag = '0';
        }
    }
?>