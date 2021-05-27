<?php
include("../../app/helpers/header_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>

<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align cyan darken-4">
                <!--Se cambia el color de la letra-->
                <span class=" white-text text-white">
                    <h4>Crear cuenta</h4>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="container section">
    <div class="row ">
        <form class="col s12">
            <div class="row">
                <div class="input-field col l6 m6 s12">
                    <input id="name" type="text" class="validate">
                    <label for="name">Nombre</label>
                </div>
                <div class="input-field col l6 m6 s12">
                    <input id="username" type="text" class="validate">
                    <label for="username">Nombre de usuario</label>
                </div>
            </div>
            <div class="row">
            <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate">
                <label for="email">Correo electrónico</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="cellphone" type="text" class="validate">
                <label for="cellphone">Teléfono</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="direction" type="text" class="validate">
                <label for="direction">Dirección</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="date" type="text" class="datepicker">
                <label for="date">Fecha de nacimiento</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="password" type="text" class="validate">
                <label for="password">Contraseña</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="passwordconfirm" type="text" class="validate">
                <label for="passwordconfirm">Confirmar contraseña</label>
            </div>
        </div>

        </form>
    </div>
</div>

<div class="center align">
    <p>
        <label>
            <input type="checkbox" checked="checked" />
            <span><a class="red-text text-accent-4" href="../../views/publica/terminosycondiciones.php"> Acepto los
                    términos y condiciones</a></span>
        </label>
    </p>
</div>

<div class="section">
    <div class="center-align">
        <a class="waves-effect waves-light btn"><i class="material-icons left">person</i>Registrarme</a>
    </div>
</div>


<?php
include("../../app/helpers/footer_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>