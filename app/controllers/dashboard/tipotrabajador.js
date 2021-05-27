// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_TIPOTRABAJADOR = '../../app/api/dashboard/tipotrabajador.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    readRows(API_TIPOTRABAJADOR);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    dataset.map(function (row) {
        content += `
            <tr>
                <td>${row.nombre_tipotrabajador}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.Id_tipo_trabajador})" class="waves-effect waves-yellow btn updateButton"><i class="material-icons left">create</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.Id_tipo_trabajador})" class="waves-effect waves btn deleteButton"><i class="material-icons left">delete</i></a>  
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
    searchRows(API_TIPOTRABAJADOR, 'search-form');
});

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Registrar tipo trabajador';    
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
   /* document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    document.getElementById('modal-title').textContent = 'Actualizar proveedor';

    const data = new FormData();
    data.append('Id_tipo_trabajador', id);
    data.append('action', 'create');
    */
    console.log('hola');
    
        /*
    fetch(API_TIPOTRABAJADOR + 'readOne', {
        method: 'post',
        body: data
        
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    document.getElementById('Id_tipo_trabajador').value = response.dataset.Id_tipo_trabajador;
                    document.getElementById('nombre_tipotrabajador').value = response.dataset.nombre_tipotrabajador;
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
    */

}


// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    event.preventDefault();
    let action = '';
    if (document.getElementById('Id_tipo_trabajador').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRowsTrabajadores(API_TIPOTRABAJADOR, 'save-form');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {   
    const data = new FormData();
    data.append('Id_tipo_trabajador', id);
    confirmDelete(API_TIPOTRABAJADOR, data);
}

