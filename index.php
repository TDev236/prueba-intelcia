<?php
    include("./conexion.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Reporte Incidencias</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script >
        $(document).ready(function(){
            $("#buscador").on("keyup", function () {
                const value = $(this).val().toLowerCase();
                $("#cuerpo-tabla tr").filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                })
            })
        })
    </script>
</head>
<body>
    <div class="container">
        <!--Titulo-->
        
        <div class="contenedor-busqueda-creacion">
            <div href="/index.php" class="container-titulos">
                <h1>
                    <a href="/">PRI</a>
                </h1>
                <p>Plataforma Reporte Incidencias</p>      
            </div>
        
            

            <form action="" method="post" class="formulario-incidente">
                
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
            <form action="" method="get" class="buscador" id="formulario-buscar">
                <input type="text" name="buscador" id="buscador" placeholder="Buscar Incidencia">
            </form>
            

            <?php
               
            ?>
            <div class="crear-incidencia hidden" id="boton-incidencia">
                <button onclick="">Crear Incidencia <i class="fa-solid fa-plus fa-crear"></i></button>
            </div>
            <div class="listaIncidencias">
                

            <?php
                $link = new PDO("mysql:host=localhost; dbname=incidencias_restaurante", "tiffani", "1723FaKing")
            ?>
            <table class='tabla-incidencias' id="tabla-resultados">
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
                    <tbody id="cuerpo-tabla">
                    <?php
                    foreach($link->query("SELECT * from incidencias") as $fila){ ?>
                    <tr class="fila-datos">
                        <td><?php echo $fila["id"] ?></td>
                        <td><?php echo $fila["fecha_reporte"]?></td>
                        <td><?php echo $fila["numero_mesa"] ?></td>
                        <td class="descripcion-fila"><?php echo $fila["descripcion_incidente"] ?> 
                        </td>
                        
                        <td><?php echo $fila["prioridad_incidente"]?></td>
                        <td><?php echo $fila["estado_incidente"]?>
                        
                          <select name="estado" id="estado" style="display:none;">
                              <option value="" hidden>Selecciona el Nuevo Estado de la Incidencia</option>
                              <option value="pendiente">Pendiente</option>
                              <option value="en proceso">En Proceso</option>
                              <option value="resuelto">Resuelta</option>
                          </select>
                        </td>
                        <td>
                            <a href="editar.php?id=<?php echo $fila["id"];?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="eliminar.php?id=<?php echo $fila["id"];?>" class="accion-eliminar"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }
                    ?>
                    </tbody>
                
                </thead>
            </table>
        </div>
        </div>
        <!--Listado de Incidencias-->
        
    </div>
    <script src="https://kit.fontawesome.com/ee34759469.js" crossorigin="anonymous"></script>
    <script src="./confirmacion.js"></script>
</body>
</html>