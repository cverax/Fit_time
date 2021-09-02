// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_TIPO_TRABAJADOR = '../../app/api/dashboard/tipotrabajador.php?action=';
const API_DETALLE = '../../app/api/dashboard/detallepedido.php?action=';
const API_CLIENTE = '../../app/api/dashboard/clientes.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    //INICIALIZADOR DEL NAVBAR  
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
    //Inicializar gráficas
    trabajadoresTipo();
    top5Productos();
    pedidosCliente();
    stockProductos();
    pedidosDia();
  });

// Función para mostrar el porcentaje de trabajadores por tipo de trabajador.
function trabajadoresTipo() {
  fetch(API_TIPO_TRABAJADOR + 'trabajadoresTipo', {
      method: 'get'
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
              if (response.status) {
                  // Se declaran los arreglos para guardar los datos por gráficar.
                  let nombre_tipotrabajador = [];
                  let cantidad = [];
                  // Se recorre el conjunto de registros devuelto por la API TIPO TRABAJADOR(dataset) fila por fila a través del objeto row.
                  response.dataset.map(function (row) {
                      // Se asignan los datos a los arreglos.
                      nombre_tipotrabajador.push(row.nombre_tipotrabajador);
                      cantidad.push(row.cantidad);
                  });
                  // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes.
                  pieGraph('chart1', nombre_tipotrabajador, cantidad, 'Porcentaje de trabajadores por tipo');
              } else {
                  document.getElementById('chart1').remove();
                  console.log(response.exception);
              }
          });
      } else {
          console.log(request.status + ' ' + request.statusText);
      }
  }).catch(function (error) {
      console.log(error);
  });
}

// Función que muestra un top de 5 productos más vendidos.
function top5Productos() {
  fetch(API_DETALLE + 'top5Productos', {
      method: 'get'
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
              if (response.status) {
                  // Se declaran los arreglos para guardar los datos por gráficar.
                  let nombre_producto = [];
                  let cantidad = [];
                  // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                  response.dataset.map(function (row) {
                      // Se asignan los datos a los arreglos.
                      nombre_producto.push(row.nombre_producto);
                      cantidad.push(row.cantidad);
                  });
                  // Se llama a la función que genera y muestra una gráfica de barras, está en el archivo components.js
                  barGraph('chart2', nombre_producto, cantidad, 'Cantidad de ventas', 'Top 5 productos más vendidos');
              } else {
                  document.getElementById('chart2').remove();
                  console.log(response.exception);
              }
          });
      } else {
          console.log(request.status + ' ' + request.statusText);
      }
  }).catch(function (error) {
      console.log(error);
  });
}

// Función para mostrar la cantidad de pedidos por cliente, donde se hace un top de 5 clientes con más pedidos.
function pedidosCliente() {
  fetch(API_CLIENTE + 'pedidosCliente', {
      method: 'get'
  }).then(function (request) {
      // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
      if (request.ok) {
          request.json().then(function (response) {
              // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
              if (response.status) {
                  // Se declaran los arreglos para guardar los datos por gráficar.
                  let usuario = [];
                  let cantidad = [];
                  // Se recorre el conjunto de registros devuelto por la API CLIENTE(dataset) fila por fila a través del objeto row.
                  response.dataset.map(function (row) {
                      // Se asignan los datos a los arreglos.
                      usuario.push(row.usuario);
                      cantidad.push(row.cantidad);
                  });
                  // Se llama a la función que genera y muestra una gráfica de pastel con la cantidad.
                  pieGraph2('chart3', usuario, cantidad, 'Top 5 clientes con más pedidos');
              } else {
                  document.getElementById('chart3').remove();
                  console.log(response.exception);
              }
          });
      } else {
          console.log(request.status + ' ' + request.statusText);
      }
  }).catch(function (error) {
      console.log(error);
  });
}

// Función que muestra a los productos con stock bajo, donde a stock lo definimos como la cantidad del mismo producto
//Es de vital relevancia ya que al momento de hacer un inventario, ya se sabe que productos están por terminarse para pedirle más cantidad al proveedor
function stockProductos() {
    fetch(API_DETALLE + 'stockProductos', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let nombre_producto = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API DETALLE(dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        nombre_producto.push(row.nombre_producto);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de donita con la cantidad.
                    doughnutGraph('chart4', nombre_producto, cantidad, 'Productos con stock bajo');
                } else {
                    document.getElementById('chart4').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
  }
  // Función para mostrar la cantidad de pedidos realizados en los últimos 7 días.
function pedidosDia() {
    fetch(API_DETALLE + 'pedidosDia', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let fecha_pedido = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API DETALLE(dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        fecha_pedido.push(row.fecha_pedido);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica lineal. 
                    linearGraph('chart5', fecha_pedido, cantidad, 'Cantidad de pedidos', 'Cantidad de pedidos de los últimos 7 días');
                } else {
                    document.getElementById('chart5').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
  }