<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Pedidos');
?>

<br>
<br>

<img class="centrado" width="145" src="../../resources/img/Iconosdash/pedido.png">


<!--TITULO-->
<div class="section white">
    <div class="row container">
        <h3 class="header center-align" style="margin-top: 30px;">ADMINISTRAR PEDIDOS</h3>
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
                <label for="usuario">Buscar pedidos</label>
            </div>
            <div class="col 3 input-field">
                <a class="btn darken-2 waves-effect waves-light">
                    <i class="material-icons">check</i> </a>
            </div>
        </div>
    </form>
    <div class="col s12 l6">
        <p class="center input-field">
            <a href="#agregarPedido" class="btn center-align green lighten-1 modal-trigger no-mayus"><i
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

                <th>Fecha pedido</th>
                <th>Fecha entrega</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Trabajador</th>
                <th>Cliente</th>
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
                <td>
                    <a href="#editarPedido" class="btn-small orange lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Editar">create</i></a>
                    <a href="#eliminarPedido" class="btn-small red lighten-1 modal-trigger" style="width: 60px;"><i
                            class="material-icons hint--bottom hint--bounce" aria-label="Eliminar">delete</i></a>
                </td>

            </tr>

        </tbody>
    </table>
</div>
<br>
<!--REGISTROS-->

<!--MODAL AGREGAR-->
<div id="agregarPedido" class="modal">
    <div class="modal-content">
        <h4>Agregar pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <input id="fecha_pedido" type="text" class="datepicker">
                <label for="fecha_pedido">Fecha de pedido</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_entrega" type="text" class="datepicker">
                <label for="fecha_entrega">Fecha de entrega</label>
            </div>
            <div class="input-field col s6">
                <input id="total_compra" type="text" class="validate">
                <label for="total_compra">Total compra</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre trabajador</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre cliente</label>
            </div>
            <div class="col s12 m6">
                <p>
                <div class="switch">
                    <span>Estado:</span>
                    <label>
                        <i class="material-icons">visibility_off</i>
                        <input id="estado_pedido" type="checkbox" name="estado_pedido" checked />
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
<div id="editarPedido" class="modal">
    <div class="modal-content">
        <h4>Editar pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <form class="row">
            <div class="input-field col s6">
                <input id="fecha_pedido" type="text" class="datepicker">
                <label for="fecha_pedido">Fecha de pedido</label>
            </div>
            <div class="input-field col s6">
                <input id="fecha_entrega" type="text" class="datepicker">
                <label for="fecha_entrega">Fecha de entrega</label>
            </div>
            <div class="input-field col s6">
                <input id="total_compra" type="text" class="validate">
                <label for="total_compra">Total compra</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre trabajador</label>
            </div>
            <div class="input-field col s6">
                <select>
                    <option value="1"></option>
                    <option value="2"></option>
                    <option value="3"></option>
                </select>
                <label>Nombre cliente</label>
            </div>
            <div class="col s12 m6">
                <p>
                <div class="switch">
                    <span>Estado:</span>
                    <label>
                        <i class="material-icons">visibility_off</i>
                        <input id="estado_pedido" type="checkbox" name="estado_pedido" checked />
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
<div id="eliminarPedido" class="modal">
    <div class="modal-content">
        <h4>Eliminar pedido</h4>
        <div class="divider" style="margin-bottom: 20px;"></div>
        <h5>¿Estás seguro de querer eliminar este pedido?</h5>
    </div>
    <div class="modal-footer">
        <a class="modal-close red lighten-2 waves-effect waves-red btn">Cancelar</a>
        <a class="modal-close green lighten-2 waves-effect waves-green btn">Eliminar</a>
    </div>
</div>
<!--MODAL ELIMINAR-->


<?php 

    Dashboard_Page::footerTemplate('pedidos');
?>