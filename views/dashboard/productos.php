<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Productos');
?>

<br>
<br>

<img class="centrado" width="145" src="../../resources/img/Iconosdash/producto.png">

<!--TITULO-->
<div class="section white">
    <div class="row container">
        <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR PRODUCTOS</h3>
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
                <label for="usuario">Buscar productos</label>
            </div>
            <div class="col 3 input-field">
                <a class="btn darken-2 waves-effect waves-light">
                    <i class="material-icons">check</i> </a>
            </div>
        </div>
    </form>
    <div class="col s12 l6">
        <p class="center input-field">
            <a href="#agregarProducto" class="btn center-align green lighten-1 modal-trigger no-mayus"><i
                    class="material-icons right">add</i> Agregar</a>
                    <!-- Enlace para generar un reporte en formato PDF -->
        <a href="../../app/reports/dashboard/productos.php" target="_blank" class="btn waves-effect amber tooltipped" data-tooltip="Reporte de productos por categoría"><i class="material-icons">assignment</i></a>
        <a href="../../app/reports/dashboard/tipoprodu.php" target="_blank" class="btn waves-effect blue tooltipped" data-tooltip="Reporte de productos por tipo de producto"><i class="material-icons">assignment</i></a>
        </p>
    </div>
</div>
<!--SEARCHBAR-->

<!--REGISTROS-->
<div class="container">
    <table class="highlight responsive-table">
        <thead>
            <tr>

                <th>Imagen</th>
                <th>Nombre</th>
                <th>Detalle</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Tipo producto</th>
                <th>Marca</th>
                <th>Proveedor</th>
                <th>Estado</th>
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
                <td></td>
                <td>
                    <a href="#editarProducto" class="btn-small orange lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Editar">create</i></a>
                    <a href="#eliminarProducto" class="btn-small red lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Eliminar">delete</i></a>
                </td>

            </tr>

        </tbody>
    </table>
</div>
<br>
<!--REGISTROS-->

<!--MODAL AGREGAR-->
<div id="agregarProducto" class="modal">
    <div class="modal-content">
        <h4>Agregar producto</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <img class="materialboxed col s5 l3 z-depth-1 responsive-img"
                src="../../resources/img/Iconosdash/deporte.png">
            <a class="btn-floating btn-large waves-effect waves-light teal lighten-1 file-field"
                style="position: relative;">
                <i class="material-icons">create</i>
                <input type="file" accept="image/x-png,image/jpg,image/jpeg">
            </a>
            <div class="input-field col s6">
                <input id="nombre_producto" type="text" class="validate">
                <label for="nombre-producto">Nombre producto</label>
            </div>
            <div class="input-field col s6">
                <input id="detalle_producto" type="text" class="validate">
                <label for="detalle_producto">Detalle producto</label>
            </div>
            <div class="input-field col s6">
                <input id="precio_producto" type="text" class="validate">
                <label for="precio_producto">Precio producto(US$)</label>
            </div>
            <div class="input-field col s6">
                <input id="cantidad_producto" type="text" class="validate">
                <label for="cantidad_producto">Cantidad producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Tipo producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Marca producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Proveedor producto</label>
            </div>
            <div class="col s12 m6">
                <p>
                <div class="switch">
                    <span>Estado:</span>
                    <label>
                        <i class="material-icons">visibility_off</i>
                        <input id="estado_producto" type="checkbox" name="estado_producto" checked />
                        <span class="lever"></span>
                        <i class="material-icons">visibility</i>
                    </label>
                </div>
                </p>
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
<div id="editarProducto" class="modal">
    <div class="modal-content">
        <h4>Editar productor</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <img class="materialboxed col s5 l3 z-depth-1 responsive-img"
                src="../../resources/img/Iconosdash/deporte.png">
            <a class="btn-floating btn-large waves-effect waves-light teal lighten-1 file-field"
                style="position: relative;">
                <i class="material-icons">create</i>
                <input type="file" accept="image/x-png,image/jpg,image/jpeg">
            </a>
            <div class="input-field col s6">
                <input id="nombre_producto" type="text" class="validate">
                <label for="nombre-producto">Nombre producto</label>
            </div>
            <div class="input-field col s6">
                <input id="detalle_producto" type="text" class="validate">
                <label for="detalle_producto">Detalle producto</label>
            </div>
            <div class="input-field col s6">
                <input id="precio_producto" type="text" class="validate">
                <label for="precio_producto">Precio producto(US$)</label>
            </div>
            <div class="input-field col s6">
                <input id="cantidad_producto" type="text" class="validate">
                <label for="cantidad_producto">Cantidad producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Tipo producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Marca producto</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Proveedor producto</label>
            </div>
            <div class="col s12 m6">
                <p>
                <div class="switch">
                    <span>Estado:</span>
                    <label>
                        <i class="material-icons">visibility_off</i>
                        <input id="estado_producto" type="checkbox" name="estado_producto" checked />
                        <span class="lever"></span>
                        <i class="material-icons">visibility</i>
                    </label>
                </div>
                </p>
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
<div id="eliminarProducto" class="modal">
    <div class="modal-content">
        <h4>Eliminar producto</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <h5>¿Estás seguro de querer eliminar este producto?</h5>
    </div>
    <div class="modal-footer">
        <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
        <a class="modal-close green lighten-2 waves-effect waves-green btn">Eliminar</a>
    </div>
</div>
<!--MODAL ELIMINAR-->



<?php 

    Dashboard_Page::footerTemplate('productos');
?>