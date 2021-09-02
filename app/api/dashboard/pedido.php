<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/pedido.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    //session_start();
    $pedido = new Pedido;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
    switch ($_GET['action']) {
        case 'readAll': // METODO READ CARGAR TODOS LOS DATOS 
            if ($result['dataset'] = $pedido->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay pedidos registrados';
                }
            }
            break;
        case 'search': // METODO BUSQUEDA FILTRADA
            $_POST = $pedido->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $pedido->searchRows($_POST['search'])) {
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
            $_POST = $pedido->validateForm($_POST);
            if ($pedido->setFechaEntrega($_POST['fecha_entrega'])) {
                if ($pedido->setTotalCompra($_POST['total_compra'])) {
                    if (isset($_POST['estado'])) {
                        if ($pedido->setEstado($_POST['estado'])) {
                            if (isset($_POST['nombres'])) {
                                if ($pedido->setNombres($_POST['nombres'])) {
                                    if (isset($_POST['nombre'])) {
                                        if ($pedido->setNombre($_POST['nombre'])) {
                                            if ($pedido->createRow()) {
                                                $result['status'] = 1;
                                                $result['message'] = 'Pedido ingresado correctamente';
                                            } else {
                                                $result['exception'] = Database::getException();;
                                            }
                                        } else {
                                            $result['exception'] = 'Nombre de cliente incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione el nombre del cliente';
                                    }
                                } else {
                                    $result['exception'] = 'Nombre de trabajador incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Seleccione un trabajador';
                            }
                        } else {
                            $result['exception'] = 'Estado de pedido incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Seleccione un estado';
                    }
                } else {
                    $result['exception'] = 'Total de compra incorrecta';
                }
            } else {
                $result['exception'] = 'Fecha de entrega incorrecta';
            }
            break;
        case 'readOne': // METODO PARA CARGAR LOS DATOS DE UN REGISTRO (SE OCUPA EN MODAL MODIFICAR Y ELIMINAR)
            if ($pedido->setId($_POST['Id_pedido'])) {
                if ($result['dataset'] = $pedido->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Pedido inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
            }
        case 'update': // METODO PARA MODIFICAR DATOS 
            $_POST = $pedido->validateForm($_POST);
            if ($pedido->setId($_POST['Id_pedido'])) {
                if ($pedido->readOne()) {
                    if ($pedido->setFechaEntrega($_POST['fecha_entrega'])) {
                        if ($pedido->setTotalCompra($_POST['total_compra'])) {
                            if ($pedido->setEstado($_POST['estado'])) {
                                if ($pedido->setNombres($_POST['nombres'])) {
                                    if ($pedido->setNombre($_POST['nombre'])) {
                                        if ($pedido->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Pedido modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre de cliente incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Nombres de trabajador incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Estado incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Total de la compra incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Fecha de entrega incorrecta';
                    }
                } else {
                    $result['exception'] = 'Pedido inexistente';
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
            }
            break;
        case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
            $_POST = $pedido->validateForm($_POST);
            if ($pedido->setId($_POST['Id_pedido'])) {
                if ($data = $pedido->readOne()) {
                    if ($pedido->deleteRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Pedido eliminado';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Pedido inexistente';
                }
            } else {
                $result['exception'] = 'Pedido incorrecto';
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
