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
        <form method="post" id="search-form" class="col s12 l6">
            <div class="row ">
                <div class="input-field col s9">
                    <i class="material-icons prefix">search</i>
                    <input id="search" type="text" name="search" class="validate" required>
                    <label for="search">Buscar trabajador</label>
                </div>
                <div class="col 3 input-field  ">
                    <button type="submit" class="btn darken-2 waves-effect waves-light indigo tooltipped" data-tooltip="Buscar"><i
                            class="material-icons">check</i></button>
                </div>
            </div>
        </form>
        <div class="input-field center-align col s12 l6">
            <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
            <a href="#" onclick="openCreateDialog()" class="btn center-align green darken-2 modal-trigger no-mayus tooltipped"
                data-tooltip="Agregar"><i class="material-icons right">add</i>Agregar</a>
                <a href="../../app/reports/dashboard/trabajadores.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de tipo de trabajador por persona"><i class="material-icons">assignment</i></a>
        </div>
    </div>
    <!--SEARCHBAR-->


    <!--REGISTROS-->
    <div class="container">
        <table class="highlight responsive-table">
            <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
            <thead>
                <tr>
                    
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Alias</th>
                    <th>Estado</th>

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
                <input class="hide" type="number" id="Id_trabajador" name="Id_trabajador" />
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input id="nombres" type="text" name="nombres" class="validate" required />
                        <label for="nombres">Nombres trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="apellidos" type="text" name="apellidos" class="validate" required />
                        <label for="apellidos">Apellidos trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="telefono" type="text" name="telefono" class="validate" required />
                        <label for="telefono">Teléfono trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="correo" type="email" name="correo" class="validate" required/>
                        <label for="correo">Correo trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="dui" type="text" name="dui" class="validate" required/>
                        <label for="dui">Dui trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="salario" type="number" name="salario" class="validate" max="9999.99" min="0.01" step="any" required/>
                        <label for="salario">Salario (US$)</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" class="validate" required/>
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="direccion" type="text" name="direccion" class="validate" required/>
                        <label for="direccion">Dirección trabajador</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="nomusuario" type="text" name="nomusuario" class="validate" required/>
                        <label for="nomusuario">Alias</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="clave" type="password" name="clave" class="validate" required/>
                        <label for="clave">Clave</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input id="confirmar_clave" type="password" name="confirmar_clave" class="validate" required/>
                        <label for="confirmar_clave">Confirmar clave</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select id="nombre_tipotrabajador" name="nombre_tipotrabajador">
                        </select>
                        <label> Tipo trabajador</label>
                    </div>
                    <div class="col s12 m6">
                        <p>
                            <div class="switch">
                                <span>Estado:</span>
                                <label>
                                    <i class="material-icons">visibility_off</i>
                                    <input id="estado" type="checkbox" name="estado" checked/>
                                    <span class="lever"></span>
                                    <i class="material-icons">visibility</i>
                                </label>
                            </div>
                        </p>
                    </div>

                </div>

                <div class="row center-align">
                    <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i
                            class="material-icons">cancel</i></a>
                    <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i
                            class="material-icons">save</i></button>
                </div>
            </form>
        </div>
    </div>

    <!--MODAL AGREGAR Y ACTUALIZAR-->


    <?php 

    Dashboard_Page::footerTemplate('trabajadores');
?>