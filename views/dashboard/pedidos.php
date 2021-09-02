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
    <form method="post" id="search-form" class="col s12 l6">
        <div class="row ">
            <div class="input-field col s9">
                <i class="material-icons prefix">search</i>
                <input id="search" type="text" name="search" class="validate" required>
                <label for="search">Buscar pedidos</label>
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
                <th>Fecha entrega</th>
                <th>Total compra</th>
                <th>Estado</th>
                <th>Trabajador</th>
                <th>Cliente</th>
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
            <input class="hide" type="number" id="Id_pedido" name="Id_pedido" />
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="fecha_entrega" type="date" name="fecha_entrega" class="validate" required />
                    <label for="fecha_entrega">Fecha de entrega</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="total_compra" type="number" name="total_compra" class="validate" required />
                    <label for="total_compra">Total compra($)</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="estado" name="estado">
                    </select>
                    <label>Estado</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="nombres" name="nombres">
                    </select>
                    <label>Trabajador</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="nombre" name="nombre">
                    </select>
                    <label>Cliente</label>
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

Dashboard_Page::footerTemplate('pedido');
?>