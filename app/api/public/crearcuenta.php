<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/clientes.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $cliente = new Cliente;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'recaptcha' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como cliente para realizar las acciones correspondientes.
    if (isset($_SESSION['Id_cliente'])) {
        // Se compara la acción a realizar cuando un cliente ha iniciado sesión.
        switch ($_GET['action']) {
            case 'logOut':
                if (session_destroy()) {
                    $result['status'] = 1;
                    $result['message'] = 'Sesión eliminada correctamente';
                } else {
                    $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
                }
                break;
        }
    } else {
        // Se compara la acción a realizar cuando el cliente no ha iniciado sesión.
        switch ($_GET['action']) {
            case 'register':
                $_POST = $cliente->validateForm($_POST);
                // Se sanea el valor del token para evitar datos maliciosos.
                $token = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
                if ($token) {
                    $secretKey = '6LdBzLQUAAAAAL6oP4xpgMao-SmEkmRCpoLBLri-';
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $data = array(
                        'secret' => $secretKey,
                        'response' => $token,
                        'remoteip' => $ip
                    );

                    $options = array(
                        'http' => array(
                            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                            'method'  => 'POST',
                            'content' => http_build_query($data)
                        ),
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false
                        )
                    );

                    $url = 'https://www.google.com/recaptcha/api/siteverify';
                    $context  = stream_context_create($options);
                    $response = file_get_contents($url, false, $context);
                    $captcha = json_decode($response, true);

                    if ($captcha['success']) {
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
                                                                if ($cliente->Register()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Cliente creado correctamente';
                                                                } else {
                                                                    $result['exception'] = Database::getException();
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
                                        $result['exception'] = $cliente->getPasswordError();
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
                    } else {
                        $result['recaptcha'] = 1;
                        $result['exception'] = 'No eres un humano';
                    }
                } else {
                    $result['exception'] = 'Ocurrió un problema al cargar el reCAPTCHA';
                }
                break;
            case 'logIn':
                $_POST = $cliente->validateForm($_POST);
                if ($cliente->checkUser($_POST['usuario'])) {
                    if ($cliente->getEstado()) {
                        if ($cliente->checkPassword($_POST['clave'])) {
                            $_SESSION['Id_cliente'] = $cliente->getId();
                            $_SESSION['correo'] = $cliente->getCorreo();
                            $result['status'] = 1;
                            $result['message'] = 'Autenticación correcta';
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Clave incorrecta';
                            }
                        }
                    } else {
                        $result['exception'] = 'La cuenta ha sido desactivada';
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';
        }
    }
    // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
    header('content-type: application/json; charset=utf-8');
    // Se imprime el resultado en formato JSON y se retorna al controlador.
    print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
