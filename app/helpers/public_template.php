<?php
/*
*   Clase para definir las plantillas de las páginas web del sitio público.
*/
class Public_Page
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML para el encabezado del documento.
        print('
            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="utf-8">
                    <title>Fittime - '.$title.'</title>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/material_icons.css"/>
                    <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css"/>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                </head>
                <body>
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de cliente para mostrar el menú de opciones, de lo contrario se muestra otro menú.
        if (isset($_SESSION['Id_cliente'])) {
            // Se verifica si la página web actual es diferente a login.php y register.php, de lo contrario se direcciona a index.php
            if ($filename != 'iniciosesion.php' && $filename != 'crearcuenta.php') {
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav class="blue-grey darken-1">
                                <div class="nav-wrapper">
                                    <a href="index.php" class="brand-logo"><img src="../../resources/img/navbar/Log 100x64.jpg" height="60"></a>
                                    <a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                    <ul class="right hide-on-med-and-down">
                                        <li><a href="catalogo.php"><i class="material-icons left">grid_on</i>Catálogo</a></li>
                                        <li><a href="carrito.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                                        <li><a href="#" onclick="logOut()"><i class="material-icons left">close</i>Cerrar sesión</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="sidenav" id="mobile">
                            <li><a href="catalogo.php"><i class="material-icons left">grid_on</i>Catálogo</a></li>
                            <li><a href="carritot.php"><i class="material-icons left">shopping_cart</i>Carrito</a></li>
                            <li><a href="#" onclick="logOut()"><i class="material-icons left">close</i>Cerrar sesión</a></li>
                        </ul>
                    </header>
                    <main>
                ');
            } else {
                header('location: index.php');
            }
        } else {
            // Se verifica si la página web actual es diferente a index.php (Iniciar sesión) y a register.php (Crear primer usuario) para direccionar a index.php, de lo contrario se muestra un menú vacío.
            if ($filename != 'carrito.php') {
                print('
                    <header>
                        <div class="navbar-fixed">
                            <nav class="blue-grey darken-1">
                                <div class="nav-wrapper">
                                    <a href="index.php" class="brand-logo"><img src="../../resources/img/navbar/Log 100x64.jpg"></a>
                                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                    <!--Menú que aparece normal en la página-->
                                    <ul class="right hide-on-med-and-down">
                                        <li><a href="catalogo.php"><i class="material-icons left">grid_on</i>Catálogo</a></li>
                                        <li><a href="crearcuenta.php"><i class="material-icons left">account_circle</i>Crear cuenta</a></li>
                                        <li><a href="iniciosesion.php"><i class="material-icons left">person</i>Inicio de sesión</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <ul class="sidenav" id="mobile">
                            <li><a href="catalogo.php"><i class="material-icons left">view_module</i>Catálogo</a></li>
                            <li><a href="crearcuenta.php"><i class="material-icons left">person</i>Crear cuenta</a></li>
                            <li><a href="iniciosesion.php"><i class="material-icons left">iniciosesion</i>Iniciar sesión</a></li>
                        </ul>
                    </header>
                    <main>
                ');
            } else {
                header('location: iniciosesion.php');
            }
        }

    }

    /*
    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se imprime el código HTML para el pie del documento.
        print('
                </main>
                <footer class="page-footer teal darken-3">
    <div class="container">
        <div class="row">
            <!--Se hace responsivo-->
            <div class="col l6 s12">
                <h5 class="white-text">Fittime</h5>
                <div class="section">
                    <p class="grey-text text-lighten-4"> Síguenos :</p>

                    <div class="section">
                        <i class="material-icons left">camera</i>Instagram @Fittime.</a>
                    </div>
                    <div class="section">
                        <i class="material-icons left">movie</i>Tik tok @Fittime.</a>
                    </div>
                </div>

                <div class="section">
                    <p class="grey-text text-lighten-4"> Contáctanos :</p>
                    <div class="section">
                        <i class="material-icons left">phone</i>WhatsApp 7088-0687.</a>
                    </div>
                </div>

            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text"></h5>
                <ul>
                    <div class="section">
                        <li><a class="grey-text text-lighten-3" href="../../views/publica/quienessomos.php">¿Quiénes somos?</a></li>
                    </div>
                    <div class="section">
                        <li><a class="grey-text text-lighten-3" href="../../views/publica/tipsnutricionales.php">Tips nutricionales</a></li>
                    </div>
                    <div class="section">
                        <li><a class="grey-text text-lighten-3" href="../../views/publica/terminosycondiciones.php">Términos y condiciones</a></li>
                    </div>
                    <div class="section">
                        <li><a class="grey-text text-lighten-3" href="../../views/publica/serviciocliente.php">Servicio al cliente</a></li>
                    </div>
                </ul>
            </div>
            
        </div>
    </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2021 Derechos de autor : Fittime
           
        </div>
    </div>
</footer>

                <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                <script type="text/javascript" src="../../app/helpers/components.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/initialization.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/account.js"></script>
                <script type="text/javascript" src="../../app/controllers/public/'.$controller.'"></script>
            </body>
            </html>
        ');
    }
}