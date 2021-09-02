<?php
include("../../app/helpers/public_template.php");
//Se usa esto para poder utilizar la plantilla del header
Public_Page::headerTemplate('Catalogo');
?>


<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align deep-orange darken-4">
                <!--Se cambia el color de la letra-->
                <span class=" white-text text-white">
                    <h4>Productos</h4>
                </span>
            </div>
        </div>
    </div>
</div>

<!--Catalogue items-->
<div id="catalogo" class="row">

</div>

<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align deep-orange darken-4">
            </div>
        </div>
    </div>
</div>

<!--Catalogue items-->
<div class="row">

    <br>
    <class id="cent"><h3 id="Titulotipopro" class="white-text"></h3><br>
    <div id="producto" class="container-fluid"></div>
</div>
<br>



<!-- Componente Modal para mostrar una caja de dialogo -->
<div id="save-modal" class="modal">
    <div class="modal-content">
        <h4 id="modal-title" class="center-align"></h4><br>
        <form method="post" id="save-form" enctype="multipart/form-data">
            <input class="hide" type="number" id="Id_producto" name="Id_producto" />
            <input class="hide" type="number" id="precio" name="precio" />
            <div class="row">
                <div id="foto_pro" class="col s12 m6">
                    <div id="foto_pro" class="row"></div>
                </div>
                <div id="datos-producto" class="col s12 m6">
                    <div class="row">
                        <!-- Seccion de campos de texto. -->
                        <h6 id="nombre_producto"></h6><br>
                        <h6 id="detalle"></h6><br>
                        <h6 id="lblPrecio"></h6><br>
                        <div id="cantidad" class="row">
                            <div id="input-cantidad" class="input-field col s6">
                            </div>
                            <div id="boton-producto" class="col s6"><br>
                                <button type="submit" class="btn waves-effect waves-light blue tooltipped"
                                    data-tooltip="Agregar al carrito"><i
                                        class="material-icons">add_shopping_cart</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Zapatos-->

<!--
<div class="row">
    <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="../../resources/img/cardscat/Zapato1.jpg">
                <span class="card-title black-text ">Tenis deportivo</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"
                    href="../../views/publica/carrito.php"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <p> Marca: Nike</p>
                <p> Talla: 7</p>
                <p> Precio: $30.00 </p>
                <p> Color: Negro, blanco</p>
                <p>Zapatos deportivos, cómodo para realizar cualquier actividad física</p>
            </div>
        </div>
    </div>


    <div class="col s12 m6 l3">
        <div class="card">
            <div class="card-image">
                <img src="../../resources/img/cardscat/Zapato2.jpg">
                <span class="card-title black-text ">Tenis deportivo</span>
                <a class="btn-floating halfway-fab waves-effect waves-light red"
                    href="../../views/publica/carrito.php"><i class="material-icons">add</i></a>
            </div>
            <div class="card-content">
                <p> Marca: Under Armour</p>
                <p> Talla: 7</p>
                <p> Precio: $30.00 </p>
                <p> Color: Gris, rosa, blanco</p>
                <p>Zapatos deportivos, cómodo para realizar cualquier actividad física</p>
            </div>
        </div>
    </div>
</div>
-->



<?php

Public_Page::footerTemplate('catalogo.js');
?>