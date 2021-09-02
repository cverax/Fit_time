<?php
include('../../app/helpers/public_template.php');

Public_Page::headerTemplate('Crear cuenta');

?>

<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align light-blue darken-4">
                <!--Se cambia el color de la letra-->
                <span class=" white-text text-white">
                    <h4>Inicio de sesión</h4>
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Contenedor para mostrar el formulario de inicio de sesión -->
<div class="container">
    <!-- Formulario para iniciar sesión -->
    <form method="post" id="session-form">
        <div class="row">
            <div class="input-field col s12 m4 offset-m4">
                <i class="material-icons icon-white prefix">email</i>
                <input type="email" id="usuario" name="usuario" required autocomplete="off" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="usuario">Correo electrónico</label>
            </div>
            <div class="input-field col s12 m4 offset-m4">
                <i class="material-icons icon-white prefix">security</i>
                <input type="password" id="clave" name="clave" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="clave">Clave</label>
            </div>
        </div>
        <div class="row center-align">
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Ingresar"><i
                    class="material-icons right">send</i>Iniciar sesión</button>
        </div>
    </form>
</div>

<div class="container section">

    <div class="section">
        <div class="center-align">
            <a class="red-text text-accent-4">
                <p>Olvidé mi contraseña</p>
            </a>
        </div>
    </div>
    <div class=center-align>
        <span class=" white-text text-white">
            <p>¿No tienes una cuenta?</p>
        </span>
    </div>
    <div class="section">
        <div class="center-align">
            <span><a class="red-text text-accent-4" href="crearcuenta.php">Regístrate</a></span>
        </div>
    </div>
    <div class="row center-align">
        <a href="crearcuenta.php" class="btn waves-effect blue tooltipped" data-tooltip="Registrarse"><i
                class="material-icons">person</i></a>
    </div>

    </form>
</div>
</div>
<br>

<?php

Public_Page::footerTemplate('iniciosesion.js');
?>