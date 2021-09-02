<?php

class Dashboard_Page
{
    public static function headerTemplate($title)
    {
        print('
            <!DOCTYPE html>
            <html lang="es">
            
                <head>
                    <meta charset="utf-8">
                    <title>' . $title . '</title>
                    <!--Se importan los íconos de Google que se van a usar-->
                    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                
                    <!--Se importa materialize.css y el segundo de styles.css donde se pueden aplicar cambios de colores a letra, etc-->
                    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
                    <link type="text/css" rel="stylesheet" href="../../resources/css/stylesdash.css" />
                    <script type="text/javascript" src="../../app/controllers/public/account.js"></script>
                
                    <!--Informa al navegador que el sitio web está optimizado para dispositivos móviles(responsive)-->
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                   
                    <!--Es una ruta que brinda acceso a las librerías de gráficos-->
                    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

                
                </head>
                
                <body>
                    <header>
                        <!--NAVBAR-->
                        <div class="navbar-fixed">
                        <nav class="blue-grey darken-4" >
                            <div class="nav-wrapper container ">
                                <a href="inicio.php" class="brand-logo valign-wrapper"><img width="55" src="../../resources/img/navbar/Log 100x64.jpg"></a>
                                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                                <ul class="right hide-on-med-and-down">
                                    <li><a href="trabajadores.php">Trabajadores</a></li>
                                    <li><a href="clientes.php">Clientes</a></li>
                                    <li><a href="marcas.php">Marcas</a></li>
                                    <li><a href="productos.php">Productos</a></li>
                                    <li><a href="proveedores.php">Proveedores</a></li>
                                    <li><a href="aplipromo.php">Aplipromos</a></li>
                                    <li><a href="detallepedido.php">Detalle pedidos</a></li>
                                    <li><a href="pedidos.php">Pedidos</a></li>
                                    <li class="hint--bottom hint--bounce" aria-label="Mi perfil"><a href="perfil.php" class="waves-effect waves-light large"> <i class="material-icons"> account_circle</i></a></li> 
                                    <li class="hint--bottom hint--bounce" aria-label="Cerrar Sesión"><a href="#" onclick="logOut()"><i class="material-icons">power_settings_new</i></a></li>
                                </ul>
                            </div>
                        </nav>
                        </div>
                
                        <ul class="sidenav" id="mobile-demo">
                            <li><a href="perfil.php" class="waves-effect waves-teal darken-3">Mi perfil</a> <div class="divider"></div></li>
                            <li><a href="inicio.php">Inicio</a></li>
                            <li><a href="trabajadores.php">Trabajadores</a></li>
                            <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="marcas.php">Marcas</a></li>
                            <li><a href="productos.php">Productos</a></li>
                            <li><a href="proveedores.php">Proveedores</a></li>
                            <li><a href="aplipromo.php">Aplipromos</a></li>
                            <li><a href="detallepedido.php">Detalle pedidos</a></li>
                            <li><a href="pedidos.php">Pedidos</a></li>
                            <li><a href="tipotrabajador.php">Tipo trabajador</a></li>
                            <li><a href="tipoproducto.php">Tipo prodcuto</a></li>
                            <li class="hint--bottom hint--bounce" aria-label="Cerrar Sesión"><a href="#" onclick="logOut()" class="waves-effect waves-teal darken-3"><i class="material-icons">power_settings_new</i></a></li>
                        </ul>
                        <!--NAVBAR-->
                    </header>
            
        ');
    }

    public static function footerTemplate($controller)
    {
        print('
                <footer class="page-footer blue-grey darken-4">
                    <div class="container">
                        <div class="row">
                            <div class="col l6 s12">
                                <img width="60" src="../../resources/img/navbar/Log 100x64.jpg">
                                    <h5 class="white-text">Fittime</h5>
                                    <p class="white-text text-white">
                                        Bienvenidos al área de gestionamiento Fittime.
                                    </p>
                                    <p class="white-text text-white">
                                        Nuestro proyecto de venta de accesorios deportivos.
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-copyright">
                        <div class="container">
                            © 2021 Derechos de autor : Fittime
                            <a class="white-text text-white right"> Fittime, venta de accesorios deportivos, ecológicos y
                            funcionales.</a>
                            <br>
                            <a class="white-text text-white right">Vive bien con Fittime.
                            </a>
                        </div>
                    </div>
                </footer>

                    <!--JavaScript al final del cuerpo para una carga optimizada-->

                    <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
                    <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
                    <script type="text/javascript" src="../../app/helpers/components.js"></script>
                    <script type="text/javascript" src="../../app/controllers/dashboard/initialization.js"></script>
                    <script type="text/javascript" src="../../app/controllers/dashboard/' . $controller . '.js"></script>

                </body>

            </html>
            ');
    }
}