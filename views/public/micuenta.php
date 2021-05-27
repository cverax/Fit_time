<?php 
    include('../../app/helpers/headerlog_template.php');

   
?>

<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align deep-purple darken-1">
                <!--Se cambia el color de la letra-->
                <span class=" white-text text-white">
                    <h4>Mi perfil</h4>
                </span>
            </div>
        </div>
    </div>
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
                <input class="validate" type="text" id="nombre">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 l8 offset-l1">
                <input class="validate" type="text" id="username">
                <label for="username">Nombre de usuario</label>
            </div>
        </form>
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
    <div class="row">
        <a href="#" class="btn col s3 l2 offset-s3 offset-l4 green lighten-1 waves-effect waves-light"
            style="margin-right: 10px;">Actualizar</a>
        <a href="#" class="btn col s3 l2 red lighten-1 waves-effect waves-light">Cancelar</a>
    </div>
</div>
</main>

<?php 

include("../../app/helpers/footer_template.php");
?>