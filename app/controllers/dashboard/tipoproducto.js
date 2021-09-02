// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_TIPOPRODUCTO = '../../app/api/dashboard/tipoproducto.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    readRows(API_TIPOPRODUCTO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.nombre_tipoproducto}</td>
                <td>${row.descripcion}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_tipo_producto})" class="waves-effect tooltipped waves-yellow btn updateButton" data-tooltip="Actualizar"><i class="material-icons left">create</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.Id_tipo_producto})" class="waves-effect tooltipped waves btn deleteButton" data-tooltip="Eliminar"><i class="material-icons left">delete</i></a>  
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
    searchRows(API_TIPOPRODUCTO, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar tipo producto';    
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar tipo producto';

    const data = new FormData();
    data.append('Id_tipo_producto', id);
    
    fetch(API_TIPOPRODUCTO + 'readOne', {
        method: 'post',
        body: data
        
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_tipo_producto').value = response.dataset.Id_tipo_producto;
                    document.getElementById('nombre_tipoproducto').value = response.dataset.nombre_tipoproducto;
                    document.getElementById('descripcion').value = response.dataset.descripcion;
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
    if (document.getElementById('Id_tipo_producto').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_TIPOPRODUCTO, action, 'save-form', 'save-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {   
    const data = new FormData();
    data.append('Id_tipo_producto', id);
    confirmDelete(API_TIPOPRODUCTO, data);
}