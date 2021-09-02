<?php
require_once('../../app/helpers/private_template.php');
Public_Page::headerTemplate('Iniciar sesión');
?>

<head>
    <meta charset="utf-8">
    <!--Se importan los íconos de Google que se van a usar-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Se importa materialize.css y el segundo de styles.css donde se pueden aplicar cambios de colores a letra, etc-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
    <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" />

    <!--Informa al navegador que el sitio web está optimizado para dispositivos móviles(responsive)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login fittime</title>

</head>

<body>
    <header>
        <!--NAVBAR-->
        <nav class="blue-grey darken-4">
            <div class="nav-wrapper container fixed">
                <img width="100" src="../../resources/img/navbar/Log 100x64.jpg">
                <a href="index.php" class="brand-logo">FITTIME</a>
                <ul class="right hide-on-med-and-down">
                    <!--<li><a href="badges.html"><i class="material-icons right">exit_to_app</i>Iniciar sesión</a></li>-->
                </ul>
            </div>
        </nav>
        <!--NAVBAR-->
    </header>

    <main>
        <!--TITULO-->
        <div class="section">
            <div class="row">
                <div class="col s12 m12 l12">
                    <!--Se cambia el color del fondo-->
                    <div class="col-12 col-lg-6 center" id="CajaDatos">
                        <div class="container">
                            <form method="post" id="session-form">
                                <!-- Titulo de iniciar Sesion -->
                                <div class="row" id="RowTitulo">
                                    <div class="col-12" id="TituloLogin">
                                        <span class=" white-text text-white">
                                            <h4>INICIO DE SESIÓN</h4>
                                        </span>
                                    </div>
                                </div>
                        </div>

                        <!--TITULO-->

                        <div class="center">
                            <div class="col s12 m10 offset-m1 card-panel z-depth-5 pink lighten-4 center" id="CajaDatos">
                                <br>
                                <div class="row">
                                    <div class="container center">
                                    <form method="post" id="session-form">
                                        <form action="iniciosesion.php">
                                            <div class="row">
                                                <div class="input-field col s12 ">
                                                    <i class="material-icons prefix">account_circle</i>
                                                    <input class="form-control me-2" type="text" placeholder="Ingrese su nombre de usuario" aria-label="Usuario" name="username" class="validate" required>
                                                    <label for="usuario" data-error="wrong" data-success="right">Usuario: </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">vpn_key</i>
                                                    <input class="form-control me-2" type="password" placeholder="Ingrese su contraseña" aria-label="Usuario" name="clave" class="validate" required>
                                                    <label for="password" data-error="wrong" data-success="right">
                                                        Contraseña: </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <div class="row center-align">
                                                        <button type="submit" class="btn waves-effect purple tooltipped"
                                                            data-tooltip="Ingresar">
                                                            <i class="material-icons right">send</i>
                                                            Iniciar sesión
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

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
                    funcioanles.</a>
                <br>
                <a class="white-text text-white right">Vive bien con Fittime.
                </a>
            </div>
        </div>
    </footer>

    <!--JavaScript al final del cuerpo para una carga optimizada-->
    <script type="text/javascript" src="../../resources/js/materialize.min.js"></script>
    <script type="text/javascript" src="../../resources/js/initialization.js"></script>

</body>

</html>

<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::footerTemplate('login.js');
?>