<!DOCTYPE html>
<html>

<head>
    <!--Se importan los íconos de Google que se van a usar-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--Se importa materialize.css y el segundo de styles.css donde se pueden aplicar cambios de colores a letra, etc-->
    <link type="text/css" rel="stylesheet" href="../../resources/css/materialize.min.css" />
    <link type="text/css" rel="stylesheet" href="../../resources/css/styles.css" />

    <!--Informa al navegador que el sitio web está optimizado para dispositivos móviles(responsive)-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Título del documento-->
    <title> FITTIME </title>
</head>

<body>

    <header>
        <!--Menú-->
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

        <!--Al hacerlo responsive se vuelve menú vertical-->
      
        <ul class="sidenav" id="mobile-demo">
            <li><a href="catalogo.php"><i class="material-icons left">grid_on</i>Catálogo</a></li>
            <li><a href="crearcuenta.php"><i class="material-icons left">account_circle</i>Crear cuenta</a></li>
            <li><a href="iniciosesion.php"><i class="material-icons left">person</i>Inicio de sesión</a></li>
        </ul>


    </header>
    <main>