<?php
include("../../app/helpers/public_template.php");
//Se usa esto para poder utilizar la plantilla del header
Public_Page::headerTemplate('Carrito');
?>

<!-- Contenedor para mostrar el detalle del carrito de compras -->
<div class="container">
    <!-- Título del contenido principal -->
    <h4 class="center-align green-text">Carrito de compras</h4>
    <!-- Tabla para mostrar el detalle de los productos agregados al carrito de compras -->
    <table class="striped">
        <!-- Cabeza de la tabla para mostrar los títulos de las columnas -->
        <thead>
            <tr>
                <th class="white-text">PRODUCTO</th>
                <th class="white-text">PRECIO (US$)</th>
                <th class="white-text">CANTIDAD</th>
                <th class="white-text">SUBTOTAL (US$)</th>
                <th class="actions-column white-text">ACCIONES</th>
            </tr>
        </thead>
        <!-- Cuerpo de la tabla para mostrar un registro por fila -->
        <tbody id="tbody-rows">
        </tbody>
    </table>
    <!-- Fila para mostrar el monto total a pagar -->
    <div class="row right-align white-text">
        <p>TOTAL A PAGAR (US$) <b id="pago"></b></p>
    </div>
    <!-- Fila para mostrar un botón que finaliza el pedido -->
    <div class="row right-align">
        <button type="button" onclick="finishOrder()" class="btn waves-effect blue tooltipped" data-tooltip="Finalizar pedido"><i class="material-icons">payment</i></button>
    </div>
    <!-- Fila para mostrar un enlace con la dirección de 
    la página web principal para seguir comprando -->
    <div class="row right-align">
        <a href="catalogo.php" class="btn waves-effect indigo tooltipped" data-tooltip="Seguir comprando"><i class="material-icons">store</i></a>
    </div>
</div>

<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="item-modal" class="modal">
    <div class="modal-content">
        <!-- Título para la caja de dialogo -->
        <h4 class="center-align">Cambiar cantidad</h4>
        <!-- Formulario para cambiar la cantidad de producto -->
        <form method="post" id="item-form">
            <!-- Campo oculto para asignar el id del registro al momento de modificar -->
            <input type="number" id="Id_detalle_pedido" name="Id_detalle_pedido" class="hide"/>
            <div class="row">
                <div class="input-field col s12 m4 offset-m4">
                    <i class="material-icons prefix">list</i>
                    <input type="number" id="cantidad" name="cantidad" min="1" class="validate" required/>
                    <label for="cantidad">Cantidad</label>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Guardar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>

<?php

Public_Page::footerTemplate('carrito.js');
?>