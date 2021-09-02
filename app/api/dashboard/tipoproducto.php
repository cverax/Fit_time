<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipoproducto.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    //session_start();
    $tipoproducto = new Tipoproducto;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
    switch ($_GET['action']) {
        case 'readAll': // METODO READ CARGAR TODOS LOS DATOS 
            if ($result['dataset'] = $tipoproducto->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay tipo de productos registrados';
                }
            }
            break;
        case 'search': // METODO BUSQUEDA FILTRADA
            $_POST = $tipoproducto->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $tipoproducto->searchRows($_POST['search'])) {
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
            $_POST = $tipoproducto->validateForm($_POST);
            if ($tipoproducto->setNombre($_POST['nombre_tipoproducto'])) {
                if ($tipoproducto->setDescripcion($_POST['descripcion'])) {
                    if ($tipoproducto->createRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Registro completado';
                    } else {
                        $result['exception'] = Database::getException();
                        $result['message'] = 'Algo no funciona correctamente';
                    }
                } else {
                    $result['exception'] = 'Descripción de tipo producto incorrecta';
                }
            } else {
                $result['exception'] = 'Nombre de tipo producto incorrecto';
            }
            break;
        case 'readOne': // METODO PARA CARGAR LOS DATOS DE UN REGISTRO (SE OCUPA EN MODAL MODIFICAR Y ELIMINAR)
            if ($tipoproducto->setId($_POST['Id_tipo_producto'])) {
                if ($result['dataset'] = $tipoproducto->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Tipo producto inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Tipo producto incorrecto';
            }
            break;
        case 'update': // METODO PARA MODIFICAR DATOS 
            $_POST = $tipoproducto->validateForm($_POST);
            if ($tipoproducto->setId($_POST['Id_tipo_producto'])) {
                if ($data = $tipoproducto->readOne()) {
                    if ($tipoproducto->setNombre($_POST['nombre_tipoproducto'])) {
                        if ($tipoproducto->setDescripcion($_POST['descripcion'])) {
                            if ($tipoproducto->updateRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Tipo producto modificado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Descripción de producto incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombre de producto incorrecto';
                    }
                } else {
                    $result['exception'] = 'Tipo producto inexistente';
                }
            } else {
                $result['exception'] = 'Tipo producto incorrecto';
            }
            break;
        case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
            $_POST = $tipoproducto->validateForm($_POST);
            if ($tipoproducto->setId($_POST['Id_tipo_producto'])) {
                if ($data = $tipoproducto->readOne()) {
                    if ($tipoproducto->deleteRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Registro eliminado';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Tipo de producto inexistente';
                }
            } else {
                $result['exception'] = 'Tipo de producto incorrecto';
            }
            break;
        default: // SI LA ACCION NO COINCIDE CON NINGUNO DE LOS CASOS MUESTRA ESTE MENSAJE
            $result['exception'] = 'Acción no disponible dentro de la sesión';
    }

    header('content-type: application/json; charset=utf-8');
    print(json_encode($result));

    //} else {
    //print(json_encode('Acceso denegado'));
    //}
} else {
    print(json_encode('Recurso no disponible'));
}
