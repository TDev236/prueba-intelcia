const confirmacion = (e) =>{
    if (confirm('¿Esta seguro que desea eliminar este registro')) {
        return true;
    } else {
        e.preventDefault();
    }
}

let opcionBorrar = document.querySelectorAll(".accion-eliminar");

for(let i = 0; i < opcionBorrar.length; i++){
    opcionBorrar[i].addEventListener('click', confirmacion);
}