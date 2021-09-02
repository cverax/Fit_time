<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/detallepedido.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    //session_start();
    $detallepedido = new Detallepedido;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
    switch ($_GET['action']) {
        case 'readAll': // METODO READ CARGAR TODOS LOS DATOS 
            if ($result['dataset'] = $detallepedido->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay detalles de pedidos registrados';
                }
            }
            break;
        case 'search': // METODO BUSQUEDA FILTRADA
            $_POST = $detallepedido->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $detallepedido->searchRows($_POST['search'])) {
                    $result['status'] = 1;
                    $rows = count($result['dataset']);
                    if ($rows > 1) {
                        $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                    } else {
                        $result['message'] = 'Solo existe una coincidencia';
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                }
            } else {
                $result['exception'] = 'Ingrese un valor para buscar';
            }
            break;
        case 'create': // METODO PARA INGRESAR DATOS
            $_POST = $detallepedido->validateForm($_POST);
            if ($detallepedido->setDetalle($_POST['detalle_pedido'])) {
                if ($detallepedido->setCantidad($_POST['cantidad'])) {
                    if ($detallepedido->setPrecio($_POST['precio'])) {
                        if (isset($_POST['Id_pedido'])) {
                            if ($detallepedido->setPedido($_POST['Id_pedido'])) {
                                if (isset($_POST['nombre_producto'])) {
                                    if ($detallepedido->setProducto($_POST['nombre_producto'])) {
                                        if ($detallepedido->createRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Detalle de pedido ingresado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();;
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de producto incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Seleccione un nombre de producto';
                                }
                            } else {
                                $result['exception'] = 'Cliente incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Seleccione un cliente';
                        }
                    } else {
                        $result['exception'] = 'Precio incorrecto';
                    }
                } else {
                    $result['exception'] = 'Cantidad incorrecta';
                }
            } else {
                $result['exception'] = 'Detalle de pedido incorrecto';
            }
            break;
        case 'readOne': // MÉTODO PARA CARGAR LOS DATOS DE UN REGISTRO (SE OCUPA EN MODAL MODIFICAR Y ELIMINAR)
            if ($detallepedido->setId($_POST['Id_detalle_pedido'])) {
                if ($result['dataset'] = $detallepedido->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Detalle de pedido inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Detalle de pedido incorrecto';
            }
            break;
        case 'update': // METODO PARA MODIFICAR DATOS 
            $_POST = $detallepedido->validateForm($_POST);
            if ($detallepedido->setId($_POST['Id_detalle_pedido'])) {
                if ($data = $detallepedido->readOne()) {
                    if ($detallepedido->setDetalle($_POST['detalle_pedido'])) {
                        if ($detallepedido->setCantidad($_POST['cantidad'])) {
                            if ($detallepedido->setPrecio($_POST['precio'])) {
                                if ($detallepedido->setPedido($_POST['nombre'])) {
                                    if ($detallepedido->setProducto($_POST['nombre_producto'])) {
                                        if ($detallepedido->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Detalle pedido modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de producto incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Nombre de cliente incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Detalle de pedido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Detalle de pedido inexistente';
                }
            } else {
                $result['exception'] = 'Detalle de pedido incorrecto';
            }
            break;
        case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
            $_POST = $detallepedido->validateForm($_POST);
            if ($detallepedido->setId($_POST['Id_detalle_pedido'])) {
                if ($data = $detallepedido->readOne()) {
                    if ($detallepedido->deleteRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Detalle de pedido eliminado';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Detalle de pedido inexistente';
                }
            } else {
                $result['exception'] = 'Detalle de pedido incorrecto';
            }
            break;
        case 'top5Productos': // METODO READ PARA GRÁFICA PRODUCTOS MÁS VENDIDOS
            if ($result['dataset'] = $detallepedido->top5Productos()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay pedidos';
                }
            }
            break;
        case 'stockProductos': // METODO READ PARA GRÁFICA STOCK DE PRODUCTOS
            if ($result['dataset'] = $detallepedido->stockProductos()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay pedidos';
                }
            }
            break;
        case 'pedidosDia': // METODO READ PARA GRÁFICA PEDIDOS DE LOS ÚLTIMOS 7 DÍAS
            if ($result['dataset'] = $detallepedido->pedidosDia()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay pedidos';
                }
            }
            break;
        default: // SI LA ACCION NO COINCIDE CON NINGUNO DE LOS CASOS MUESTRA ESTE MENSAJE
            $result['exception'] = 'Acción no disponible dentro de la sesión';
    }
    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));
    //   } else {
    // print(json_encode('Acceso denegado'));
    //   }
} else {
    print(json_encode('Recurso no disponible'));
}
