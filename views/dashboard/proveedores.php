<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Proveedores');
?>


<br>
<br>

<img class="centrado" width="145" src="../../resources/img/Iconosdash/proveedor.png">

<!--TITULO-->
<div class="section white">
    <div class="row container">
        <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR PROVEEDORES</h3>
    </div>
</div>
<!--TITULO-->

<!--SEARCHBAR-->
<div class="row container">
    <form method="post" id="search-form" class="col s12 l6">
        <div class="row ">
            <div class="input-field col s9">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" class="validate" required>
                <label for="search">Buscar proveedores</label>
            </div>
            <div class="col 3 input-field  ">
                <button type="submit" class="btn darken-2 waves-effect waves-light" data-tooltip="Buscar"><i
                        class="material-icons">check</i></button>
            </div>
        </div>
    </form>
    <div class="input-field center-align col s12 l6">
        <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
        <a href="#" onclick="openCreateDialog()" class="btn center-align green lighten-1 modal-trigger no-mayus"
            data-tooltip="Crear"><i class="material-icons right">add</i>Agregar</a>
    </div>
</div>
<!--SEARCHBAR-->

<!--REGISTROS-->

<div class="container">
<table class="highlight responsive-table">
    <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th class="actions-column">Acciones</th>
        </tr>
    </thead>
    <!-- Cuerpo de la tabla para mostrar un registro por fila -->
    <tbody id="tbody-rows">
    </tbody>
</table>
</div>

<!--REGISTROS-->

<!--MODAL AGREGAR Y ACTUALIZAR-->
<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <form method="post" id="save-form" enctype="multipart/form-data">
            
            <div class="row">
                <div class="input-field col s12 m6">
                  	<input id="txtId" type="number" name="txtId" class="validate" required/>
                  	<label for="txtId">Id</label>
                </div>   
                <div class="input-field col s12 m6">
                  	<input id="txtNombre" type="text" name="txtNombre" class="validate" required/>
                  	<label for="txtNombre">Nombre</label>
                </div>    
                <div class="input-field col s12 m6">
                  	<input id="txtCorreo" type="text" name="txtCorreo" class="validate" required/>
                  	<label for="txtCorreo">Correo</label>
                </div>
                <div class="input-field col s12 m6">
                  	<input id="txtTelefono" type="text" name="txtTelefono" class="validate" required/>
                  	<label for="txtTelefono">Telefono</label>
                </div>    
                <div class="input-field col s12 m12">
                  	<input id="txtDireccion" type="text" name="txtDireccion" class="validate" required/>
                  	<label for="txtDireccion">Direccion</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<!--MODAL AGREGAR Y ACTUALIZAR-->

<?php 

    Dashboard_Page::footerTemplate('proveedores');
?>