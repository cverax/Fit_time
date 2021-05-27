<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Mi perfil');
?>

<br>
<br>

<div class="col s12 m12 l12">
    <!--Se cambia el color de la letra-->
    <span class="center-align black-text text-black">
        <h4>Mi perfil</h4>
    </span>
</div>


<!--TITULO-->

<div class="container">
    <div class="row">
        <img class="materialboxed col s5 l3 z-depth-1 responsive-img circle" src="../../resources/img/perfil.jpg">
        <a class="btn-floating btn-large waves-effect waves-light teal lighten-1 file-field"
            style="position: relative;">
            <i class="material-icons">create</i>
            <input type="file" accept="image/x-png,image/jpg,image/jpeg">
        </a>
        <form>
            <div class="input-field col s12 l8 offset-l1">
                <input id="nombres"  type="text" class="validate">
                <label for="nombres">Nombres</label>
            </div>
            <div class="input-field col s12 l8 offset-l1">
                <input id="apellidos" type="text" class="validate"  >
                <label for="apellidos">Apellidos</label>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="nombre_usuario" type="text" class="validate">
            <label for="nombre_usuario">Nombre de usuario</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="dui" type="text" class="validate">
            <label for="dui">Dui</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="correo" type="email" class="validate">
            <label for="correo">Correo electrónico</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="telefono" type="text" class="validate">
            <label for="telefono">Teléfono</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="direccion" type="text" class="validate">
            <label for="direccion">Dirección</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="fecha_nacimiento" type="text" class="datepicker">
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="salario" type="text" class="validate">
            <label for="salario">Salario</label>
        </div>
        <div class="input-field col s6">
            <select>
                <option value="1">Nutricionista</option>
                <option value="2">Programador</option>
                <option value="3">Diseñador</option>
                <option value="4">Vendedor</option>
                <option value="5">Repartidor</option>
                <option value="6">Manager</option>
                <option value="7">Administrador</option>
            </select>
            <label>Tipo de usuario</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <input id="clave" type="password" class="validate">
            <label for="clave">Contraseña</label>
        </div>
        <div class="input-field col s12 m6">
            <input id="confirmar_clave" type="password" class="validate">
            <label for="confirmar_clave">Confirmar contraseña</label>
        </div>
    </div>
    <div class="row">
        <a href="#" class="btn col s3 l2 offset-s3 offset-l4 green lighten-1 waves-effect waves-light"
            style="margin-right: 10px;">Actualizar</a>
        <a href="#" class="btn col s3 l2 red lighten-1 waves-effect waves-light">Cancelar</a>
    </div>
</div>
</main>

<?php 

    Dashboard_Page::footerTemplate('perfil');
?>