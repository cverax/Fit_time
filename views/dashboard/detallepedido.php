<?php
include('../../app/helpers/template.php');

Dashboard_Page::headerTemplate('Detalle pedido');
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
    <form method="post" id="search-form" class="col s12 l6">
        <div class="row ">
            <div class="input-field col s9">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" class="validate" required>
                <label for="search">Buscar detalle de pedidos</label>
            </div>
            <div class="col 3 input-field  ">
                <button type="submit" class="btn darken-2 waves-effect waves-light indigo tooltipped" data-tooltip="Buscar"><i class="material-icons">check</i></button>
            </div>
        </div>
    </form>
    <div class="input-field center-align col s12 l6">
        <!-- Enlace para abrir la caja de dialogo (modal) al momento de crear un nuevo registro -->
        <a href="#" onclick="openCreateDialog()" class="btn center-align green darken-2 modal-trigger no-mayus tooltipped" data-tooltip="Agregar"><i class="material-icons right">add</i>Agregar</a>
    </div>
</div>
<!--SEARCHBAR-->

<!--REGISTROS-->
<div class="container">
    <table class="highlight responsive-table">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th>Detalle</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Pedido</th>
                <th>Producto</th>
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
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4>
        <form method="post" id="save-form" enctype="multipart/form-data">
            <input class="hide" type="number" id="Id_detalle_pedido" name="Id_detalle_pedido" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="detalle_pedido" type="text" name="detalle_pedido" class="validate" required />
                    <label for="detalle_pedido">Detalle pedido</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="cantidad" type="number" name="cantidad" class="validate" required />
                    <label for="cantidad">Cantidad</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="precio" type="number" name="precio" class="validate" required />
                    <label for="precio">Precio</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="nombre" name="nombre">
                    </select>
                    <label>Pedido</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="nombre_producto" name="nombre_producto">
                    </select>
                    <label>Producto</label>
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

Dashboard_Page::footerTemplate('detallepedido');
?>