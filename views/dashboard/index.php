<!DOCTYPE html>
<html lang="es">

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
                    <div class="card-panel caption center-align black">
                        <!--Se cambia el color de la letra-->
                        <span class=" white-text text-white">
                            <h4>INICIO DE SESIÓN</h4>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--TITULO-->

        <div class="row container">
            <div class="col s12 m10 offset-m1 card-panel z-depth-5 pink lighten-4">
                <br>
                <div class="row">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="input-field col s12 ">
                                    <i class="material-icons prefix">account_circle</i>
                                    <input id="usuario" type="text" class="validate">
                                    <label for="usuario" data-error="wrong" data-success="right">Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <input id="password" type="password" class="validate">
                                    <label for="password" data-error="wrong" data-success="right"> Contraseña</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <a href="inicio.php"
                                        class="btn waves-effect waves-light col s8 offset-s2 black">Iniciar sesión</a>
                                </div>
                                <div class="input-field col s12">
                                    <a href="recuperar_cuenta.php"
                                        class="btn waves-effect waves-light col s8 offset-s2 black center-align">Olvidé
                                        mi contraseña</a>
                                </div>
                            </div>
                        </form>
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