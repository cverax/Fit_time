<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/trabajadores.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    //session_start();
    $trabajador = new Trabajador;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    //if (isset($_SESSION['id_usuario'])) {
    // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
    switch ($_GET['action']) {
        case 'readAll':
            if ($result['dataset'] = $trabajador->readAll()) {
                $result['status'] = 1;
            } else {
                if (Database::getException()) {
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No hay trabajadores registrados';
                }
            }
            break;
        case 'create':
            $_POST = $trabajador->validateForm($_POST);
            if ($trabajador->setNombres($_POST['nombres'])) {
                if ($trabajador->setDui($_POST['dui'])) {
                    if ($trabajador->setCorreo($_POST['correo'])) {
                        if ($_POST['clave'] == $_POST['confirmar_clave']) {
                            if ($trabajador->setClave($_POST['clave'])) {
                                if ($trabajador->setNacimiento($_POST['fecha_nacimiento'])) {
                                    if ($trabajador->setTelefono($_POST['telefono'])) {
                                        if ($trabajador->setSalario($_POST['salario'])) {
                                            if ($trabajador->setDireccion($_POST['direccion'])) {
                                                if (isset($_POST['nombre_tipotrabajador'])) {
                                                    if ($trabajador->setTipotrabajador($_POST['nombre_tipotrabajador'])) {
                                                        if ($trabajador->setApellidos($_POST['apellidos'])) {
                                                            if ($trabajador->setAlias($_POST['nomusuario'])) {
                                                                if ($trabajador->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                                    if ($trabajador->createRow()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Trabajador creado correctamente';
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Estado incorrecto';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Alias incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Apellidos incorrectos';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Tipo de trabajador incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Seleccione un tipo trabajador';
                                                }
                                            } else {
                                                $result['exception'] = 'Dirección incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Salario incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Fecha de nacimiento incorrecta';
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
                    $result['exception'] = 'Dui incorrecto';
                }
            } else {
                $result['exception'] = 'Nombres incorrectos';
            }
            break;
        case 'search':
            $_POST = $trabajador->validateForm($_POST);
            if ($_POST['search'] != '') {
                if ($result['dataset'] = $trabajador->searchRows($_POST['search'])) {
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
        case 'readOne':
            if ($trabajador->setId($_POST['Id_trabajador'])) {
                if ($result['dataset'] = $trabajador->readOne()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Trabajador inexistente';
                    }
                }
            } else {
                $result['exception'] = 'Trabajador incorrecto';
            }
            break;
        case 'update':
            $_POST = $trabajador->validateForm($_POST);
            if ($trabajador->setId($_POST['Id_trabajador'])) {
                if ($trabajador->readOne()) {
                    if ($trabajador->setNombres($_POST['nombres'])) {
                        if ($trabajador->setDui($_POST['dui'])) {
                            if ($trabajador->setCorreo($_POST['correo'])) {
                                if ($trabajador->setClave($_POST['clave'])) {
                                    if ($trabajador->setNacimiento($_POST['fecha_nacimiento'])) {
                                        if ($trabajador->setTelefono($_POST['telefono'])) {
                                            if ($trabajador->setSalario($_POST['salario'])) {
                                                if ($trabajador->setDireccion($_POST['direccion'])) {
                                                    if ($trabajador->setTipotrabajador($_POST['nombre_tipotrabajador'])) {
                                                        if ($trabajador->setApellidos($_POST['apellidos'])) {
                                                            if ($trabajador->setAlias($_POST['nomusuario'])) {
                                                                if ($trabajador->setEstado(isset($_POST['estado']) ? 1 : 0)) {
                                                                    if ($trabajador->updateRow()) {
                                                                        $result['status'] = 1;
                                                                        $result['message'] = 'Trabajador modificado correctamente';
                                                                    } else {
                                                                        $result['exception'] = Database::getException();
                                                                    }
                                                                } else {
                                                                    $result['exception'] = 'Estado incorrecto';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Alias incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Apellidos incorrectos';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Tipo trabajador incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Dirección incorrecta';
                                                }
                                            } else {
                                                $result['exception'] = 'Salario incorrecta';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Fecha de nacimiento incorrecta';
                                    }
                                } else {
                                    $result['exception'] = 'Clave incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Dui incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                } else {
                    $result['exception'] = 'Trabajador inexistente';
                }
            } else {
                $result['exception'] = 'Trabajador incorrecto';
            }
            break;
        case 'delete':
            if ($trabajador->setId($_POST['Id_trabajador'])) {
                if ($trabajador->readOne()) {
                    if ($trabajador->deleteRow()) {
                        $result['status'] = 1;
                        $result['message'] = 'Trabajador eliminado correctamente';
                    } else {
                        $result['exception'] = Database::getException();
                    }
                } else {
                    $result['exception'] = 'Trabajador inexistente';
                }
            } else {
                $result['exception'] = 'Trabajador incorrecto';
            }
            break;
        case 'iniciosesion':
            $usuario = $_POST['usuario'];
            $clave = $_POST['password'];
            $check = $trabajador->checkUsuario($usuario, $clave);
            if ($check){
                $result['status'] = 1;
                $result['message'] = 'Ingreso exitoso';
            } else {
                $result['exception'] = 'Los datos ingresados no son correctos';
            }
            break;
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));

    //} else {
    //print(json_encode('Acceso denegado'));
    //}
} else {
    print(json_encode('Recurso no disponible'));
}
