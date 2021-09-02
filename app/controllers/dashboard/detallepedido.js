// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_DETALLEPEDIDO = '../../app/api/dashboard/detallepedido.php?action=';
const ENDPOINT_PEDIDO = '../../app/api/dashboard/pedido.php?action=readAll';
const ENDPOINT_PRODUCTO = '../../app/api/dashboard/productos.php?action=readAll';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_DETALLEPEDIDO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.detalle_pedido}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio}</td>
                <td>${row.nombre}</td>
                <td>${row.nombre_producto}</td>

                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_detalle_pedido})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.Id_detalle_pedido})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a>  
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
    searchRows(API_DETALLEPEDIDO, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar detalle pedido';   
    fillSelect(ENDPOINT_PEDIDO, 'nombre', null); 
    fillSelect(ENDPOINT_PRODUCTO, 'nombre_producto', null);
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar detalle pedido';

    const data = new FormData();
    data.append('Id_detalle_pedido', id);
    
    fetch(API_DETALLEPEDIDO + 'readOne', {
        method: 'post',
        body: data
        
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_detalle_pedido').value = response.dataset.Id_detalle_pedido;
                    document.getElementById('detalle_pedido').value = response.dataset.detalle_pedido;
                    document.getElementById('cantidad').value = response.dataset.cantidad;
                    document.getElementById('precio').value = response.dataset.precio;
                    fillSelect(ENDPOINT_PEDIDO, 'nombre', response.dataset.Id_pedido);
                    fillSelect(ENDPOINT_PRODUCTO, 'nombre_producto', response.dataset.Id_producto);

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
    if (document.getElementById('Id_detalle_pedido').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_DETALLEPEDIDO, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {   
    const data = new FormData();
    data.append('Id_detalle_pedido', id);
    confirmDelete(API_DETALLEPEDIDO, data);
}