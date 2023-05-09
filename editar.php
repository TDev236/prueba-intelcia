<?php
    include('./conexion.php');
    $id = $_GET['id'];
    print($id);
    $incidencias = "SELECT * FROM incidencias WHERE id ='$id'";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Reporte Incidencias</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./style-editar.css">
</head>
<body>
    <div class="container-editar">
        <!--Titulo-->
        
        <div class="contenedor-busqueda-creacion ">
            <div class="container-titulos">
                <a href="/prueba-intelcia/index.php">
                    <h1>PRI</h1>
                </a>
                
                <p>Plataforma Reporte Incidencias</p>      
            </div>
        
            

            <form action="" method="post" class="formulario-incidente ocultar-formulario">
                
                <h2>Crear Nueva Incidencia</h2>
                <label for="mesa">Numero de Mesa</label>
                <input type="number" name="mesa" min="1" id="mesa">
    
                <label for="descripcion">Descripcion Incidente</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10"></textarea>

                <label for="prioridad">Prioridad</label>
                <select name="prioridad" id="prioridad">
                    <option value="" hidden>Selecciona Nivel de Prioridad</option>
                    <option value="leve">Leve</option>
                    <option value="moderado">Moderado</option>
                    <option value="grave">Grave</option>
                </select>

                <label for="estado">Estado Incidente</label>
                <select name="estado" id="estado">
                    <option value="" hidden>Selecciona el Estado de la Incidencia</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="en proceso">En Proceso</option>
                    <option value="resuelto">Resuelta</option>
                </select>

                <button type="submit" name="submit">Enviar</button>
                <?php 
                    if($flag == '1'){
                ?>
                    <p>Creacion de incidencia<strong> Exitosa </strong></p>
                <?php
                    }
                    if($flag == '0'){
                ?>
                    <p>Incidencia no se puede enviar <strong> Error </strong></p>
                <?php
                    }
                ?>
            </form>
        </div>
        <div class="container-derecha">
            <!--Elemento para el buscador-->
            <div class="buscador hidden">
                <input type="search" name="buscador" id="buscador" placeholder="Buscar Incidencia">
            </div>
            <form class="listaIncidencias" action="actualizar.php" method="post">
            <?php
                $link = new PDO("mysql:host=localhost; dbname=incidencias_restaurante", "tiffani", "1723FaKing")
            ?>
            <table class='tabla-incidencias'>
                <thead>
                    <tr class='fila-titulos'>
                        <th>ID</th>
                        <th>Fecha Reporte</th>
                        <th>Numero Mesa</th>
                        <th>Descripcion Incidente</th>
                        <th>Prioridad</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                <?php
                    
                    foreach($link->query("SELECT * from incidencias Where id = '$id'") as $fila){ ?>
                    <tr class="fila-datos">
                        <td>
                            <input type="hidden" value="<?php echo $fila["id"];?>" name="id">
                        </td>
                        <td><?php echo $fila["fecha_reporte"]?></td>
                        <td><?php echo $fila["numero_mesa"] ?></td>
                        <td class="descripcion-fila"><?php echo $fila["descripcion_incidente"] ?> </td>
                        <td><?php echo $fila["prioridad_incidente"]?></td>
                        <td>
                        <label for="estado">Estado Incidente</label>
                        <select name="estado" id="estado">
                            <option value="" hidden>Selecciona el Estado de la Incidencia</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="en proceso">En Proceso</option>
                            <option value="resuelto">Resuelta</option>
                        </select>
                        </td>
                        <td>
                            <button class="submit-editar" name="submit" type="submit"><i class="fa-solid fa-floppy-disk"></i></button>
                            <a href="eliminar.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                </thead>
            </table>
        </form>
        </div>
        <!--Listado de Incidencias-->
        
    </div>
    <script src="https://kit.fontawesome.com/ee34759469.js" crossorigin="anonymous"></script>
    <script>
        
    </script>
</body>
</html>