<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Trabajadores');
?>

<br>
<br>

<main>

    <br>
    <img class="centrado" width="145" src="../../resources/img/Iconosdash/trabajador.png">

    <!--TITULO-->
    <div class="section white">
        <div class="row container">
            <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR TRABAJADORES</h3>
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
                    <label for="usuario">Buscar trabajador</label>
                </div>
                <div class="col 3 input-field">
                    <a class="btn darken-2 waves-effect waves-light">
                        <i class="material-icons">check</i> </a>
                </div>
            </div>
        </form>
        <div class="col s12 l6">
            <p class="center input-field">
                <a href="#agregarTrabajador" class="btn center-align green lighten-1 modal-trigger no-mayus"><i
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

                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Dui</th>
                    <th>Salario</th>
                    <th>Fecha de nacimiento</th>
                    <th>Tipo trabajador</th>
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
                        <a href="#editarTrabajador" class="btn-small orange lighten-1 modal-trigger"
                            style="width: 60px;"><i class="material-icons hint--bottom hint--bounce"
                                aria-label="Editar">create</i></a>
                        <a href="#eliminarTrabajador" class="btn-small red lighten-1 modal-trigger"
                            style="width: 60px;"><i class="material-icons hint--bottom hint--bounce"
                                aria-label="Eliminar">delete</i></a>
                    </td>

                </tr>

            </tbody>
        </table>
    </div>
    <br>
    <!--REGISTROS-->

    <!--MODAL AGREGAR-->
    <div id="agregarTrabajador" class="modal">
        <div class="modal-content">
            <h4>Agregar trabajador</h4>
            <div class="divider" style="margin-bottom: 20px;"></div>
            <form class="row">
                <div class="input-field col s6">
                    <input id="nombres_trabajador" type="text" class="validate">
                    <label for="nombres_trabajador">Nombres trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="apellidos_trabajador" type="text" class="validate">
                    <label for="apellidos_trabajador">Apellidos trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="nombre_usuario" type="text" class="validate">
                    <label for="nombre_usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s6">
                    <input id="telefono_trabajador" type="text" class="validate">
                    <label for="telefono_trabajador">Teléfono trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="correo_trabajador" type="text" class="validate">
                    <label for="correo_trabajador">Correo trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="dui_trabajador" type="text" class="validate">
                    <label for="dui_trabajador">Dui trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="salario_trabajador" type="text" class="validate">
                    <label for="salario_trabajador">Salario</label>
                </div>
                <div class="input-field col s6">
                    <input id="direccion_trabajador" type="text" class="validate">
                    <label for="direccion_trabajador">Dirección</label>
                </div>
                <div class="input-field col s6">
                    <input id="fecha_nacimiento" type="text" class="datepicker">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
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
    <div id="editarTrabajador" class="modal">
        <div class="modal-content">
            <h4>Editar trabajador</h4>
            <div class="divider" style="margin-bottom: 20px;"></div>
            <form class="row">
                <div class="input-field col s6">
                    <input id="nombres_trabajador" type="text" class="validate">
                    <label for="nombres_trabajador">Nombres trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="apellidos_trabajador" type="text" class="validate">
                    <label for="apellidos_trabajador">Apellidos trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="nombre_usuario" type="text" class="validate">
                    <label for="nombre_usuario">Nombre de usuario</label>
                </div>
                <div class="input-field col s6">
                    <input id="telefono_trabajador" type="text" class="validate">
                    <label for="telefono_trabajador">Teléfono trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="correo_trabajador" type="text" class="validate">
                    <label for="correo_trabajador">Correo trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="dui_trabajador" type="text" class="validate">
                    <label for="dui_trabajador">Dui trabajador</label>
                </div>
                <div class="input-field col s6">
                    <input id="salario_trabajador" type="text" class="validate">
                    <label for="salario_trabajador">Salario</label>
                </div>
                <div class="input-field col s6">
                    <input id="direccion_trabajador" type="text" class="validate">
                    <label for="direccion_trabajador">Dirección</label>
                </div>
                <div class="input-field col s6">
                    <input id="fecha_nacimiento" type="text" class="datepicker">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
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
    <div id="eliminarTrabajador" class="modal">
        <div class="modal-content">
            <h4>Eliminar trabajador</h4>
            <div class="divider" style="margin-bottom: 20px;"></div>
            <h5>¿Estás seguro de querer eliminar este trabajador?</h5>
        </div>
        <div class="modal-footer">
            <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
            <a class="modal-close green lighten-2 waves-effect waves-green btn">Eliminar</a>
        </div>
    </div>
    <!--MODAL ELIMINAR-->


    <?php 

    Dashboard_Page::footerTemplate('trabajadores');
?>