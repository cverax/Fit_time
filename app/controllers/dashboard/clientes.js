// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_CLIENTE = '../../app/api/dashboard/clientes.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_CLIENTE);
    
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.telefono}</td>
                <td>${row.correo}</td>
                <td>${row.usuario}</td>
                <td>${row.estado}</td>

                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_cliente})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a> <br>
                    <a href="#" onclick="openDeleteDialog(${row.Id_cliente})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a> <br>  
                    <a href="../../app/reports/dashboard/clientes_pedido.php? id=${row.Id_cliente}" target="_blank" class="btn waves-effect blue tooltipped" data-tooltip="Reporte de pedidos por cliente"><i class="material-icons">assignment</i></a>
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
    searchRows(API_CLIENTE, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar cliente';    
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar cliente';

    const data = new FormData();
    data.append('Id_cliente', id);
    
    fetch(API_CLIENTE + 'readOne', {
        method: 'post',
        body: data
        
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_cliente').value = response.dataset.Id_cliente;
                    document.getElementById('nombre').value = response.dataset.nombre;
                    document.getElementById('correo').value = response.dataset.correo;
                    document.getElementById('clave').value = response.dataset.clave;
                    document.getElementById('telefono').value = response.dataset.telefono;
                    document.getElementById('direccion').value = response.dataset.direccion;
                    document.getElementById('fecha_login').value = response.dataset.fecha_login;
                    document.getElementById('fecha_nacimiento').value = response.dataset.fecha_nacimiento;
                    document.getElementById('usuario').value = response.dataset.usuario;
                    document.getElementById('dui').value = response.dataset.dui;
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
    if (document.getElementById('Id_cliente').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_CLIENTE, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {   
    const data = new FormData();
    data.append('Id_cliente', id);
    confirmDelete(API_CLIENTE, data);
}


