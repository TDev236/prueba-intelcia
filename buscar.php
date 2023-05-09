<?php 
    include("./conexion.php");
    
    $valor = $_GET['q'];
    $conexion = mysqli_connect('localhost', 'tiffani', '1723FaKing', 'incidencias_restaurante' );
    $query = "SELECT * FROM incidencias WHERE id LIKE '%$valor%' OR descripcion_incidente LIKE '%$valor%' OR prioridad_incidente LIKE '%$valor%' ";
    echo $query;
    $resultado = mysqli_query($conexion, $query);
    
    $resultados = array();
    while ($fila = $resultado ->fetch_assoc()){
        $resultados[]= $fila;
    } 
    echo json_encode($resultados);
?>