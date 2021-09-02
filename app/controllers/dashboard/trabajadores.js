// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TRABAJADOR = '../../app/api/dashboard/trabajadores.php?action=';
const ENDPOINT_TIPOTRABAJADOR = '../../app/api/dashboard/tipotrabajador.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_TRABAJADOR);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.apellidos}</td>
                <td>${row.nombres}</td>
                <td>${row.telefono}</td>
                <td>${row.correo}</td>
                <td>${row.nomusuario}</td>
                <td>${row.estado}</td>

                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_trabajador})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.Id_trabajador})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a>  
                </td>
            </tr>
        `;          
    });
    document.getElementById('tbody-rows').innerHTML = content;
    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    event.preventDefault();
    searchRows(API_TRABAJADOR, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar trabajador';
    fillSelect(ENDPOINT_TIPOTRABAJADOR, 'nombre_tipotrabajador', null);
}    


// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar trabajador';

    const data = new FormData();
    data.append('Id_trabajador', id);
   
    
    fetch(API_TRABAJADOR + 'readOne', {
        method: 'post',
        body: data
        
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_trabajador').value = response.dataset.Id_trabajador;
                    document.getElementById('nombres').value = response.dataset.nombres;
                    document.getElementById('dui').value = response.dataset.dui;
                    document.getElementById('correo').value = response.dataset.correo;
                    document.getElementById('clave').value = response.dataset.clave;
                    document.getElementById('fecha_nacimiento').value = response.dataset.fecha_nacimiento;
                    document.getElementById('telefono').value = response.dataset.telefono;
                    document.getElementById('salario').value = response.dataset.salario;
                    document.getElementById('direccion').value = response.dataset.direccion;
                    fillSelect(ENDPOINT_TIPOTRABAJADOR, 'nombre_tipotrabajador', response.dataset.Id_tipo_trabajador);
                    document.getElementById('apellidos').value = response.dataset.apellidos;
                    document.getElementById('nomusuario').value = response.dataset.nomusuario;
                    if (response.dataset.estado) {
                        document.getElementById('estado').checked = true;
                    } else {
                        document.getElementById('estado').checked = false;
                    }

                    M.updateTextFields();
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
    

}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    if (document.getElementById('Id_trabajador').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_TRABAJADOR, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {   
    const data = new FormData();
    data.append('Id_trabajador', id);
    confirmDelete(API_TRABAJADOR, data);
}


