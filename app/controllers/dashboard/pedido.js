// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PEDIDO = '../../app/api/dashboard/pedido.php?action=';
const ENDPOINT_ESTADO = '../../app/api/dashboard/estado.php?action=readAll';
const ENDPOINT_TRABAJADOR = '../../app/api/dashboard/trabajadores.php?action=readAll';
const ENDPOINT_CLIENTE = '../../app/api/dashboard/clientes.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PEDIDO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                
                <td>${row.fecha_entrega}</td>
                <td>${row.total_compra}</td>
                <td>${row.estadope}</td>
                <td>${row.nombres}</td>
                <td>${row.nombre}</td>
                

                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_pedido})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.Id_pedido})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a>  
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
    searchRows(API_PEDIDO, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar pedido';
    fillSelect(ENDPOINT_ESTADO, 'estado', null);
    fillSelect(ENDPOINT_TRABAJADOR, 'nombres', null);
    fillSelect(ENDPOINT_CLIENTE, 'nombre', null);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar pedido';

    const data = new FormData();
    data.append('Id_pedido', id);

    fetch(API_PEDIDO + 'readOne', {
        method: 'post',
        body: data

    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_pedido').value = response.dataset.Id_pedido;
                    document.getElementById('fecha_entrega').value = response.dataset.fecha_entrega;
                    document.getElementById('total_compra').value = response.dataset.total_compra;
                    fillSelect(ENDPOINT_ESTADO, 'estado', response.dataset.estadope);
                    fillSelect(ENDPOINT_TRABAJADOR, 'nombres', response.dataset.nombres);
                    fillSelect(ENDPOINT_CLIENTE, 'nombre', response.dataset.nombre);
                    

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
    if (document.getElementById('Id_pedido').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_PEDIDO, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    const data = new FormData();
    data.append('Id_pedido', id);
    confirmDelete(API_PEDIDO, data);
}