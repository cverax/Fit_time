<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Clientes');
?>

<br>
<br>

<img class="centrado" width="145" src="../../resources/img/Iconosdash/cliente.png">

<!--TITULO-->
<div class="section white">
    <div class="row container">
        <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR CLIENTES</h3>
    </div>
</div>
<!--TITULO-->

<!--SEARCHBAR-->
<div class="row container">
    <form class="col s12 l6">
        <div class="row">
            <div class="input-field col s9">
                <i class="material-icons prefix">search</i>
                <input id="usuario" type="text" class="validate">
                <label for="usuario">Buscar clientes</label>
            </div>
            <div class="col 3 input-field">
                <a class="btn darken-2 waves-effect waves-light">
                    <i class="material-icons">check</i> </a>
            </div>
        </div>
    </form>
    <div class="col s12 l6">
        <p class="center input-field">
            <a href="#agregarCliente" class="btn center-align green lighten-1 modal-trigger no-mayus"><i
                    class="material-icons right">add</i> Agregar</a>
        </p>
    </div>
</div>
<!--SEARCHBAR-->

<!--REGISTROS-->
<div class="container">
    <table class="highlight responsive-table">
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Usuario</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Dui</th>
                <th>Dirección</th>
                <th>Fecha de nacimiento</th>
                <th>Fecha login</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href="#editarCliente" class="btn-small orange lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Editar">create</i></a>
                    <a href="#eliminarCliente" class="btn-small red lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Eliminar">delete</i></a>
                </td>

            </tr>

        </tbody>
    </table>
</div>
<br>
<!--REGISTROS-->

<!--MODAL AGREGAR-->
<div id="agregarCliente" class="modal">
    <div class="modal-content">
        <h4>Agregar cliente</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <input id="nombre_cliente" type="text" class="validate">
                <label for="nombre_cliente">Nombre</label>
            </div>
            <div class="input-field col s6">
                <input id="nombre_usuario" type="text" class="validate">
                <label for="nombre_usuario">Nombre de usuario</label>
            </div>
            <div class="input-field col s6">
                <input id="telefono_cliente" type="text" class="validate">
                <label for="telefono_cliente">Teléfono cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="correo_cliente" type="text" class="validate">
                <label for="correo_cliente">Correo cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="dui_cliente" type="text" class="validate">
                <label for="dui_cliente">Dui cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="direccion_cliente" type="text" class="validate">
                <label for="direccion_cliente">Dirección</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_nacimiento" type="text" class="datepicker">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_nacimiento" type="text" class="datepicker">
                <label for="fecha_nacimiento">Fecha login</label>
            </div>
            <div class="input-field col s6">
                <input id="clave_trabajador" type="password" class="validate">
                <label for="clave_trabajador">Contraseña</label>
            </div>
            <div class="input-field col s6">
                <input id="confirmar_clave" type="password" class="validate">
                <label for="confirmar_clave">Confirmar contraseña</label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
        <a class="modal-close green lighten-2 waves-effect waves-green btn">Ingresar</a>
    </div>
</div>
<!--MODAL AGREGAR-->

<!--MODAL ACTUALIZAR-->
<div id="editarCliente" class="modal">
    <div class="modal-content">
        <h4>Editar cliente</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <input id="nombre_cliente" type="text" class="validate">
                <label for="nombre_cliente">Nombre</label>
            </div>
            <div class="input-field col s6">
                <input id="nombre_usuario" type="text" class="validate">
                <label for="nombre_usuario">Nombre de usuario</label>
            </div>
            <div class="input-field col s6">
                <input id="telefono_cliente" type="text" class="validate">
                <label for="telefono_cliente">Teléfono cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="correo_cliente" type="text" class="validate">
                <label for="correo_cliente">Correo cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="dui_cliente" type="text" class="validate">
                <label for="dui_cliente">Dui cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="direccion_cliente" type="text" class="validate">
                <label for="direccion_cliente">Dirección</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_nacimiento" type="text" class="datepicker">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_nacimiento" type="text" class="datepicker">
                <label for="fecha_nacimiento">Fecha login</label>
            </div>
            <div class="input-field col s6">
                <input id="clave_trabajador" type="password" class="validate">
                <label for="clave_trabajador">Contraseña</label>
            </div>
            <div class="input-field col s6">
                <input id="confirmar_clave" type="password" class="validate">
                <label for="confirmar_clave">Confirmar contraseña</label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
        <a class="modal-close green lighten-2 waves-effect waves-green btn">Actualizar</a>
    </div>
</div>
<!--MODAL ACTUALIZAR-->

<!--MODAL ELIMINAR-->
<div id="eliminarCliente" class="modal">
    <div class="modal-content">
        <h4>Eliminar cliente</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <h5>¿Estás seguro de querer eliminar este cliente?</h5>
    </div>
    <div class="modal-footer">
        <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
        <a class="modal-close green lighten-2 waves-effect waves-green btn">Eliminar</a>
    </div>
</div>
<!--MODAL ELIMINAR-->






<?php 

    Dashboard_Page::footerTemplate('clientes');
?>