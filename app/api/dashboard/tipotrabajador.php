<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/tipotrabajador.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
//if (isset($_GET['action'])) {
    //session_start();
    $tipotrabajador = new Tipotrabajador;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
        switch ($_POST['action']) {
            case 'readAll': // METODO READ CARGAR TODOS LOS DATOS 
                if ($result['dataset'] = $tipotrabajador->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay tipo de trabajadores registrados';
                    }
                }
                break;
            case 'search': // METODO BUSQUEDA FILTRADA
                $_POST = $tipotrabajador->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $tipotrabajador->searchRows($_POST['search'])) {
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
                $_POST = $tipotrabajador->validateForm($_POST);
                if ($tipotrabajador->setNombre($_POST['nombre_tipotrabajador'])) {
                    if ($tipotrabajador->createRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Registro completado';
                        } else {
                            $result['exception'] = Database::getException();
                            $result['message'] = 'Llega al else';
                        }                                                                           
                } else {
                    $result['exception'] = 'Nombre de tipo trabajador incorrecto';
                }               
                break;
            case 'readOne': // METODO PARA CARGAR LOS DATOS DE UN REGISTRO (SE OCUPA EN MODAL MODIFICAR Y ELIMINAR)
                if ($tipotrabajador->setId($_POST['Id_tipo_trabajador'])) {
                    if ($result['dataset'] = $tipotrabajador->readOne()) {
                        $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                            $result['exception'] = 'Tipo trabajador inexistente';
                            }
                        }   
                } else {
                    $result['exception'] = 'Tipo trabajador incorrecto';
                }
                break;
            case 'update': // METODO PARA MODIFICAR DATOS 
                $_POST = $tipotrabajador->validateForm($_POST);
                if ($tipotrabajador->setId($_POST['Id_tipo_trabajador'])) {
                    if ($data = $tipotrabajador->readOne()) {
                        if ($tipotrabajador->setNombre($_POST['nombre_tipotrabajador'])) {
                            if ($tipotrabajador->updateRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Tipo trabajador modificado correctamente';
                            } else {
                                $result['exception'] = Database::getException();
                            }                                                                           
                        } else {
                            $result['exception'] = 'Nombre de trabajador incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Tipo trabajador inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo trabajador incorrecto';
                }
                break;
            case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
                $_POST = $tipotrabajador->validateForm($_POST);
                if ($tipotrabajador->setId($_POST['Id_tipo_trabajador'])) {
                    if ($data = $tipotrabajador->readOne()) {
                        if ($tipotrabajador->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Registro eliminado';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Tipo de trabajador inexistente';
                    }
                } else {
                    $result['exception'] = 'Tipo de trabajador incorrecto';
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
//} else {
    //print(json_encode('Recurso no disponible'));
//}