// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TIPOPRO = '../../app/api/public/catalogo.php?action=';
const API_PEDIDOS = '../../app/api/public/pedidos.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que muestra las categorías disponibles.
    readAllTipopros();
});

// Función para obtener y mostrar las categorías existentes en la base.
function readAllTipopros() {
    fetch(API_TIPOPRO + 'readAllTipopro', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    let content = '';
                    let url = '';
                    response.dataset.map(function (row) {
                        content += `
                        <div class="col s12 m6 l3">
                            <div class="card">
                                <!--Imagen del tipo producto-->
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" width="250px" height="250px" id="cent" src="../../resources/img/cards/${row.foto_tipopro}">
                                </div>
                                <div class="card-content" id="cent">
                                    <!--Nombre del tipo producto-->
                                    <p><a class="black-text">${row.nombre_tipoproducto} </a></p>
                                    <!--Button add shopping cart--><br>
                                    <button class="btn-floating halfway-fab waves-effect waves-light red" onclick="readProducto(${row.Id_tipo_producto},'${row.nombre_tipoproducto}')" type="local_grocery_store" name="action">Ver productos
                                        <i class="material-icons right">local_grocery_store</i>
                                    </button><br>
                                </div>
                            </div>
                        </div>                    
                        `;

                    });
                    document.getElementById('catalogo').innerHTML = content;
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                } else {
                    document.getElementById('title').innerHTML = `<i class="material-icons small">cloud_off</i><span class="red-text">${response.exception}</span>`;
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Se crea una función para obtener los productos filtrándolos con el tipo producto
function readProducto(id,tipopro) {
    // Se define un objeto con los datos del registro seleccionado.
    document.getElementById('Titulotipopro').innerHTML = tipopro;
    const data = new FormData();
    data.append('Id_producto', id);

    fetch(API_TIPOPRO + 'readProducto', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                let Id_tipo_producto = '';
                if (response.status) {
                    let content = '';
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se crean y concatenan las tarjetas con los datos de cada producto.
                        content += `
                            <div class="col s12 m6 l3">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../../resources/img/cards/${row.foto_pro}" width="250px" height="250px" class="materialboxed">
                                        <a href="carrito.php?id=${row.Id_producto}" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-tooltip="Comprar">
                                            <i class="material-icons">add</i>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title" >${row.nombre_producto}</span>
                                        <p>Precio(US$) ${row.precio}</p><br>
                                        <a onclick="openCreateDialog(${row.Id_producto})" class="waves-effect waves-light btn tooltipped boton" data-tooltip="Ver detalle">Mas informacion</a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        `;

                             /* <div class="col s3">
                                <div class="card hoverable">
                                    <div class="card-image">
                                        <img src="../../resources/img/cards/${row.foto_pro}" width="250px" height="250px" class="materialboxed">
                                    </div>
                                    <div class="card-content">
                                        <span class="card-title">${row.nombre_producto}</span>
                                        <p>Precio(US$) ${row.precio}</p><br>
                                        <a onclick="openCreateDialog(${row.Id_producto})" class="waves-effect waves-light btn tooltipped boton" data-tooltip="Ver detalle">Mas informacion</a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            */
                    });
                    // Se agregan las tarjetas a la etiqueta div mediante su id para mostrar los productos.
                    document.getElementById('producto').innerHTML = content;
                    M.Materialbox.init(document.querySelectorAll('.materialboxed'));
                    // Se inicializa el componente Tooltip asignado a los enlaces para que funcionen las sugerencias textuales.
                    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog(id) {
    document.getElementById('save-form').reset();
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    const data = new FormData();
    data.append('Id_producto', id);
    fetch(API_TIPOPRO + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        if (request.ok) {
            request.json().then(function (response) {
                if (response.status) {
                    let content = '';
                    content += `
                        <img src="../../resources/img/cards/${response.dataset.foto_pro}" width="350px" height="300px" alt="foto_pro">
                    `;
                    document.getElementById('foto_pro').innerHTML = content;
                    document.getElementById('Id_producto').value = response.dataset.Id_producto; 
                    document.getElementById('modal-title').textContent = `Detalle del producto: ${response.dataset.nombre_producto}`;
                    document.getElementById('producto').textContent = `Producto: ${response.dataset.nombre_producto}`;
                    document.getElementById('detalle').textContent = `Descripcion del producto:  ${response.dataset.detalle}`;
                    document.getElementById('lblPrecio').textContent = `Precio del producto (US$): ${response.dataset.precio}`;
                    let content2 = '';
                    content2 += `
                        <i class="material-icons prefix">list</i>
                        <input type="number" id="cantidad" name="cantidad" min="1" max="${response.dataset.cantidad}" class="validate" required/>
                        <label for="cantidad">Cantidad</label>
                        `;
                    document.getElementById('input-cantidad').innerHTML = content2;

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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de agregar un producto al carrito.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    fetch(API_PEDIDOS + 'createDetail', {
        method: 'post',
        body: new FormData(document.getElementById('save-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se constata si el cliente ha iniciado sesión.
                if (response.status) {
                    sweetAlert(1, response.message, 'carrito.php');
                } else {
                    // Se verifica si el cliente ha iniciado sesión para mostrar la excepción, de lo contrario se direcciona para que se autentique. 
                    if (response.session) {
                        sweetAlert(2, response.exception, null);
                    } else {
                        sweetAlert(3, response.exception, 'iniciosesion.php');
                    }
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
});



