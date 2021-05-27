<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Trabajadores');
?>

<br>
<br>

<img class="centrado" width="145" src="../../resources/img/Iconosdash/detalle_pedido.png">

<!--TITULO-->
<div class="section white">
    <div class="row container">
        <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR DETALLES DE PEDIDOS</h3>
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
                <label for="usuario">Buscar detalles de pedidos</label>
            </div>
            <div class="col 3 input-field">
                <a class="btn darken-2 waves-effect waves-light">
                    <i class="material-icons">check</i> </a>
            </div>
        </div>
    </form>
    <div class="col s12 l6">
        <p class="center input-field">
            <a href="#agregarDetallePedido" class="btn center-align green lighten-1 modal-trigger no-mayus"><i
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

                <th>Cliente</th>
                <th>Detalle</th>
                <th>Cantidad</th>
                <th>Precio final</th>
                <th>Aplicación de promoción</th>
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
                <td>
                    <a href="#editarDetallePedido" class="btn-small orange lighten-1 modal-trigger"
                        style="width: 60px;"><i class="material-icons hint--bottom hint--bounce"
                            aria-label="Editar">create</i></a>
                    <a href="#eliminarDetallePedido" class="btn-small red lighten-1 modal-trigger"
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
<div id="agregarDetallePedido" class="modal">
    <div class="modal-content">
        <h4>Agregar detalle de pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="detalle_pedido" type="text" class="validate">
                <label for="detalle_pedido">Detalle pedido</label>
            </div>
            <div class="input-field col s6">
                <td><input id="detalle_pedido" value="1" type="number" class="validate"></td>
                <label for="detalle_pedido">Cantidad</label>
            </div>
            <div class="input-field col s6">
                <input id="precio_final" type="text" class="validate">
                <label for="precio_final">Precio final(US$)</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Aplicación de promoción</label>
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
<div id="editarDetallePedido" class="modal">
    <div class="modal-content">
        <h4>Editar detalle de pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre cliente</label>
            </div>
            <div class="input-field col s6">
                <input id="detalle_pedido" type="text" class="validate">
                <label for="detalle_pedido">Detalle pedido</label>
            </div>
            <div class="input-field col s6">
                <td><input id="detalle_pedido" value="1" type="number" class="validate"></td>
                <label for="detalle_pedido">Cantidad</label>
            </div>
            <div class="input-field col s6">
                <input id="precio_final" type="text" class="validate">
                <label for="precio_final">Precio final(US$)</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Aplicación de promoción</label>
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
<div id="eliminarDetallePedido" class="modal">
    <div class="modal-content">
        <h4>Eliminar detalle de pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <h5>¿Estás seguro de querer eliminar este detalle de pedido?</h5>
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