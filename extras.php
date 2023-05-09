while($fila = mysqli_fetch_assoc($resultado)){
        echo "<tr>";
        echo "<td>{$fila['id']}</td>";
        echo "<td>{$fila['numero_mesa']}</td>";
        echo "<td>{$fila['descripcion_incidente']}</td>";
        echo "<td>{$fila['prioridad_incidente']}</td>";
        echo "<td>{$fila['estado_incidente']}</td>";
        echo "<td>{$fila['fecha_reporte']}</td>";

        }