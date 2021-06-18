<?php
include("../../app/helpers/header_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>

<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align white">
                <!--Se cambia el color de la letra-->
                <span class=" black-text text-white">
                    <h4>Carrito de compras</h4>
                </span>  

                <i class="material-icons left">add_shopping_cart</i>
                <i class="material-icons right">add_shopping_cart</i>

            </div>
        </div>
    </div>
</div>


<div class="container section">
    <div class="row">
        <div class="col s12 m12 l12">
            <img class="responsive-img" src="../../resources/img/cards/Zapato1.jpg">
        </div>
    </div>
</div>


<div class="container section">
    <div class="row">
        <div class="col s12 m12 l12">
            <table class="highlight  grey darken-1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Tenis</td>
                        <td>$70.00</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>$70.00</td>
                    </tr>
                    <tr>
                        <td>JTotal</td>
                        <td>$70.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="section">
    <div class="center-align">
        <a href="../../views/publica/catalogo.php" class="waves-effect waves-light btn"><i
                class="material-icons left">shopping_cart</i>Continuar comprando</a>
    </div>
</div>

<?php
include("../../app/helpers/footer_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>