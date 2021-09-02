<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/public_template.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Public_Page::headerTemplate('Crear cuenta');

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

<!-- Contenedor para mostrar el formulario de registro de clientes -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center-align indigo-text">Regístrate como cliente.</h4>
    <!-- Formulario para crear cuenta -->
    <form method="post" id="register-form">
        <!-- Campo oculto para asignar el token del reCAPTCHA -->
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
        <div class="row">
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">account_box</i>
                <input type="text" id="nombre" name="nombre" required autocomplete="off" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="nombre">Nombre completo</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">person</i>
                <input type="text" id="usuario" name="usuario" required autocomplete="off" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="usuario">Usuario</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">email</i>
                <input type="email" id="correo" name="correo" required autocomplete="off" maxlength="100" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="correo">Correo electrónico</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">how_to_reg</i>
                <input type="text" id="dui" name="dui" required autocomplete="off" placeholder="00000000-0" pattern="[0-9]{8}[-][0-9]{1}" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="dui">Dui</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">phone</i>
                <input type="text" id="telefono" name="telefono" required autocomplete="off" placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="telefono">Teléfono</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix ">event_note</i>
                <input type="date" id="fecha_login" name="fecha_login" class="validate white-text" required />
                <label for="fecha_login">Fecha login</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix ">cake</i>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="validate white-text" required />
                <label for="fecha_nacimiento">Fecha nacimiento</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">security</i>
                <input type="password" id="clave" name="clave" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="clave">Clave</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">security</i>
                <input type="password" id="confirmar_clave" name="confirmar_clave" class="validate white-text" required oncopy="return false" oncut="return false" onpaste="return false"/>
                <label for="confirmar_clave">Confirmar clave</label>
            </div>
            <div class="input-field col s12 m6">
                <i class="material-icons icon-white prefix">place</i>
                <input type="text" id="direccion" name="direccion" required autocomplete="off" maxlength="200" class="validate white-text" required />
                <label for="direccion">Dirección</label>
            </div>
            <label class="center-align col s12">
                <input type="checkbox" id="condicion" name="condicion" required />
                <span>Acepto <a href="terminosycondiciones.php" class="modal-trigger">términos y condiciones</a></span>
            </label>
        </div>
        <div class="row center-align">
            <div class="col s12">
                <button type="submit" class="btn waves-effect waves-light tooltipped" data-tooltip="Registrar"><i class="material-icons left">person</i>Registrarme</button>
            </div>
        </div>
    </form>
</div>

<!-- Importación del archivo para que funcione el reCAPTCHA. Para más información https://developers.google.com/recaptcha/docs/v3 -->
<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?render=6LdBzLQUAAAAAJvH-aCUUJgliLOjLcmrHN06RFXT"></script>

<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Public_Page::footerTemplate('crearcuenta.js');

?>