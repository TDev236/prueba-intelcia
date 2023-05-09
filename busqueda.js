const busqueda = document.getElementById('formulario-buscar');
const buscador = document.getElementById('buscador');
const tablaResultados = document.getElementById('tabla-resultados').querySelector('tbody');

buscador.addEventListener('input', () => {
    //Obtener el valor de el input buscador para relizar la peticion al server
    const datoBuscar = buscador.value;

    //Realizar la solicitud al servidor atravez de fetch

    fetch(`buscar.php?q=${datoBuscar}`)
        .then(res => {
            res.json()
            console.log(res.json())
        })
        .then(data => {
            //Actualizar tabla en tiempo real con palabra buscada
            tablaResultados.innerHTML = '';
            data.map(fila => {
                console.log(fila.id)
                tablaResultados.innerHTML += 
                `<tr>
                    <td>${fila.id}</td>
                    <td>${fila.fecha_reporte}</td>
                    <td>${fila.numero_mesa}</td>
                    <td>${fila.descripcion_incidente}</td>
                    <td>${fila.prioridad_incidente}</td>
                    <td>${fila.estado_incidente}</td>            
                </tr>`
            })
        })
        .catch(e => console.log(e))
});