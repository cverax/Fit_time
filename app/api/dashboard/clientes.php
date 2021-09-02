<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    //session_start();
    $cliente = new Cliente; 
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
    // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch ($_GET['action']) {
        case 'readAll': //Método para mostras todos los registros
            if ($result['dataset'] = $cliente->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay clientes registrados';
                }
            }
            break;
        case 'search': //Método para buscar
            $cliente->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $cliente->searchRows($_POST['search'])) {
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
        case 'create': //Método para ingresar datos.
            $_POST = $cliente->validateForm($_POST);
            if ($cliente->setNombre($_POST['nombre'])) {
                if ($cliente->setCorreo($_POST['correo'])) {
                    if ($_POST['clave'] == $_POST['confirmar_clave']) {
                        if ($cliente->setClave($_POST['clave'])) {
                            if ($cliente->setTelefono($_POST['telefono'])) {
                                if ($cliente->setDireccion($_POST['direccion'])) {
                                    if ($cliente->setFlog($_POST['fecha_login'])) {
                                        if ($cliente->setNacimiento($_POST['fecha_nacimiento'])) {
                                            if ($cliente->setUsuario($_POST['usuario'])) {
                                                if ($cliente->setDui($_POST['dui'])) {
                                                    if ($cliente->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                        if ($cliente->createRow()) {
                                                            $result['status'] = 1;
                                                            $result['message'] = 'Cliente creado correctamente';
                                                        } else {
                                                            $result['exception'] = Database::getException();
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Estado incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Dui incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Usuario incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha de nacimiento incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha de login incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Dirección incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Teléfono incorrecto';
                            }
                        } else {
                            $result['exception'] = $usuario->getPasswordError();
                        }
                    } else {
                        $result['exception'] = 'Claves diferentes';
                    }
                } else {
                    $result['exception'] = 'Correo incorrecto';
                }
            } else {
                $result['exception'] = 'Nombre incorrecto';
            }
            break;
        case 'readOne': //Método para tomar los datos de cada registro y mostrarlos al momento de actualizar y el id para eliminar
            if ($cliente->setId($_POST['Id_cliente'])) {
                if ($result['dataset'] = $cliente->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Cliente inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'update': //Método para actualizar un registro
            $_POST = $cliente->validateForm($_POST);
            if ($cliente->setId($_POST['Id_cliente'])) {
                if ($cliente->readOne()) {
                    if ($cliente->setNombre($_POST['nombre'])) {
                        if ($cliente->setCorreo($_POST['correo'])) {
                            if ($cliente->setClave($_POST['clave'])) {
                                if ($cliente->setTelefono($_POST['telefono'])) {
                                    if ($cliente->setDireccion($_POST['direccion'])) {
                                        if ($cliente->setFlog($_POST['fecha_login'])) {
                                            if ($cliente->setNacimiento($_POST['fecha_nacimiento'])) {
                                                if ($cliente->setUsuario($_POST['usuario'])) {
                                                    if ($cliente->setDui($_POST['dui'])) {
                                                        if ($cliente->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                            if ($cliente->updateRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Cliente modificado correctamente';
                                                            } else {
                                                                $result['exception'] = Database::getException();
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Estado incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Dui incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Usuario incorrecto';
                                                }
                                            } else {
                                                $result['exception'] = 'Fecha de nacimiento incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Fecha de login incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Teléfono incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Clave diferentes';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'Cliente inexistente';
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'delete': // METODO PARA ELIMINAR UN REGISTRO 
            if ($cliente->setId($_POST['Id_cliente'])) {
                if ($cliente->readOne()) {
                    if ($cliente->deleteRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Cliente eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Cliente inexistente';
                }
            } else {
                $result['exception'] = 'Cliente incorrecto';
            }
            break;
        case 'pedidosCliente': //Método para gráfica clientes con más pedidos
            if ($result['dataset'] = $cliente->pedidosCliente()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay clientes registrados';
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
