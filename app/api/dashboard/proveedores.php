<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/proveedores.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
//if (isset($_GET['action'])) {
    //session_start();
    $proveedor = new Proveedor;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
        switch ($_GET['action']) {
            case 'readAll': // METODO READ CARGAR TODOS LOS DATOS 
                if ($result['dataset'] = $proveedor->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay proveedores registrados';
                    }
                }
                break;
            case 'search': // METODO BUSQUEDA FILTRADA
                $_POST = $proveedor->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $proveedor->searchRows($_POST['search'])) {
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
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setNombre($_POST['txtNombre'])) {
                    if ($proveedor->setCorreo($_POST['txtCorreo'])) {
                        if ($proveedor->setTelefono($_POST['txtTelefono'])) {
                            if ($proveedor->setDireccion($_POST['txtDireccion'])) {
                                if ($proveedor->createRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Registro completado';
                                } else {
                                    $result['exception'] = Database::getException();;
                                }                                                                           
                            } else {
                                $result['exception'] = 'Direccion incorrecta';
                            }                                         
                        } else {
                            $result['exception'] = 'Telefono incorrecto';
                        }                                                                                   
                    } else {
                        $result['exception'] = 'Apellido incorrecto';
                    }
                } else {
                    $result['exception'] = 'Nombre incorrecto';
                }               
                break;
            case 'readOne': // METODO PARA CARGAR LOS DATOS DE UN REGISTRO (SE OCUPA EN MODAL MODIFICAR Y ELIMINAR)
                if ($proveedor->setId($_POST['id'])) {
                    if ($result['dataset'] = $proveedor->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Proveedor inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;
            case 'update': // METODO PARA MODIFICAR DATOS 
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setId($_POST['txtId'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->setNombre($_POST['txtNombre'])) {
                            if ($proveedor->setCorreo($_POST['txtCorreo'])) {
                                if ($proveedor->setTelefono($_POST['txtTelefono'])) {
                                    if ($proveedor->setDireccion($_POST['txtDireccion'])) {
                                        if ($proveedor->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Producto modificado correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }                                                                          
                                    } else {
                                        $result['exception'] = 'Direccion incorrecta';
                                    }                                         
                                } else {
                                    $result['exception'] = 'Telefono incorrecto';
                                }                                                                                   
                            } else {
                                $result['exception'] = 'Apellido incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Nombre incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setId($_POST['id'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Registro eliminado';
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
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
//} else {
    //print(json_encode('Recurso no disponible'));
//}
