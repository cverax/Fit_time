<?php
include("../../app/helpers/headerlog_template.php");
//Se usa esto para poder utilizar la plantilla del header
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
<!--Formulario de inicio de sesión-->

<div class="container section">
    <div class="row">
        <form class="col s12">

            <div class="row">
                <div class="input-field col s12 ">
                    <input id="email" type="email" class="validate">
                    <label for="email" data-error="wrong" data-success="right">Correo electrónico</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate">
                    <label for="password"  data-error="wrong" data-success="right">Contraseña</label>
                </div>
            </div>

            <div class="center-align">
                <button class="btn waves-effect waves-light" type="submit" name="action" href="../app/helpers/headerlog_template.php">Iniciar sesión
                    <i class="material-icons right">send</i>
                </button>
            </div>

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
                    <span><a class="red-text text-accent-4" href="../../views/publica/crearcuenta.php">
                            Regístrate</a></span>
                </div>
            </div>

        </form>
    </div>
</div>


<?php
include("../../app/helpers/footer_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>