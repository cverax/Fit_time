// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_PROVEEDOR = '../../app/api/dashboard/proveedores.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    readRows(API_PROVEEDOR);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.nombre}</td>
                <td>${row.correo}</td>
                <td>${row.telefono}</td>
                <td>${row.direccion}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_proveedor})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a> <br>
                    <a href="#" onclick="openDeleteDialog(${row.Id_proveedor})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a>  <br>
                    <a href="../../app/reports/dashboard/proveedores_pcu.php? id=${row.Id_proveedor}" target="_blank" class="btn waves-effect blue tooltipped" data-tooltip="Reporte de productos de este proveedor"><i class="material-icons">assignment</i></a>
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
    searchRows(API_PROVEEDOR, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar proveedor';
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar proveedor';

    const data = new FormData();
    data.append('txtId', id);

    fetch(API_PROVEEDOR + 'readOne', {
        method: 'post',
        body: data

    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('txtId').value = response.dataset.Id_proveedor;
                    document.getElementById('txtNombre').value = response.dataset.nombre;
                    document.getElementById('txtCorreo').value = response.dataset.correo;
                    document.getElementById('txtTelefono').value = response.dataset.telefono;
                    document.getElementById('txtDireccion').value = response.dataset.direccion;
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
    if (document.getElementById('txtId').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_PROVEEDOR, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    data.append('txtId', id);
    confirmDelete(API_PROVEEDOR, data);
}
