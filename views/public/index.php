<?php
include("../../app/helpers/header_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>

<!--Slider-->
<!--Se utiliza para dejar espacio en la parte de arriba-->
<div class="section">
    <!--Row , col -->
    <div class="row">
        <!--Se usa el sistema en grillas-->
        <div class="col s12 m12 l12">
            <!--Comienza el slider-->
            <div class="slider">
                <ul class="slides">
                    <li>
                        <img src="../../resources/img/slider/mujersport.jpg">
                        <div class="caption center-align">
                            <h3>Ponte en movimiento!</h3>
                            <h5 class="light grey-text text-lighten-3">Disfruta hacer ejercicio</h5>
                        </div>
                    </li>
                    <li>
                        <img src="../../resources/img/slider/pesitasazules.jpg">
                        <div class="caption right-align">
                            <h1>Pesas</h1>

                        </div>
                    </li>
                    <li>
                        <img src="../../resources/img/slider/entrenamiento.jpg">
                        <div class="caption left-align">
                            <h3>¿Sabías qué?</h3>
                            <h5 class="light grey-text text-lighten-3">Hacer ejercicio mejora tu calidad de vida</h5>
                        </div>
                    </li>
                    <li>
                        <img src="../../resources/img/slider/piernaejer.jpg">
                        <div class="caption center-align">
                            <h3>Salud</h3>
                            <h5 class="light grey-text text-lighten-3">El ejercicio te hace más feliz y triunfador</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--Slider-->

<!--Cuadro con texto-->
<div class="section">
    <div class="row">
        <div class="col s12 m12 l12">
            <!--Se cambia el color del fondo-->
            <div class="card-panel caption center-align pink pink darken-3">
                <!--Se cambia el color de la letra-->
                <span class=" white-text text-white">
                    <h4>Algunos productos</h4>
                </span>
            </div>
        </div>
    </div>
</div>

<!--Cards-->
<div class="container section">
    <div class="row">
        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/Zapato1.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Tenis<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tus zapatos favorito<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Adidas</p>
                    <p> Talla: 9</p>
                    <p> Precio: $70.00 </p>
                    <p> Color: Azul, celeste</p>
                    <p> Suela: Blanca de E-ptpu</p>
                    <p> Estos zapatos cuentan con un grandioso diseño que ayuda a que tu pie se sienta
                        cómodo para realizar
                        todo tipo de ejercicio que quieras.
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/Zapato2.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Tenis<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu zapato<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Puma</p>
                    <p> Talla: 7</p>
                    <p> Precio: $50.00</p>
                    <p> Color: Verde, azul, negro, gris</p>
                    <p> Suela: Blanca de E-ptpu</p>
                    <p> Estos zapatos cuentan con un grandioso diseño que ayuda a que tu pie se sienta
                        cómodo para realizar
                        todo tipo de ejercicio que quieras.
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/Zapato3.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Tenis<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu zapato <i
                            class="material-icons right">close</i></span>
                    <p> Marca: Nike</p>
                    <p> Talla: 7</p>
                    <p> Precio: $40.00</p>
                    <p> Color: Negro, verde musgo, rojo</p>
                    <p> Suela: Blanca de E-ptpu</p>
                    <p> Estos zapatos cuentan con un grandioso diseño que ayuda a que tu pie se sienta
                        cómodo para realizar
                        todo tipo de ejercicio que quieras.
                    </p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/pesasn.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesas<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu pesa<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Fila</p>
                    <p> Peso: 7 kg</p>
                    <p> Precio: $7.00</p>
                    <p> Color: Anaranjado.</p>
                    <p> Material: Forro de goma y hierro sólido.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/pesitasazules.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesas<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu pesa<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Reebok</p>
                    <p> Peso: 2 kg</p>
                    <p> Precio: $2.00</p>
                    <p> Color: Azules.</p>
                    <p> Material: Forro de goma y hierro sólido.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/Pesascel.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesas<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu pesa<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Reebok</p>
                    <p> Peso: 2 kg</p>
                    <p> Precio: $2.00</p>
                    <p> Color: Celeste.</p>
                    <p> Material: Forro de goma y hierro sólido.</p>

                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/saltaever.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Saltacuerda<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu saltacuerda<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Everlast</p>
                    <p> Precio: $3.00</p>
                    <p> Longitud: 2 m.</p>
                    <p> Color: Celeste.</p>
                    <p> Material: Pvc.</p>
                    <p> Mango: Goma.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/saltacuerdanegro.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Saltacuerda<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu saltacuerda<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Adidas</p>
                    <p> Precio: $3.50</p>
                    <p> Longitud: 1.5 m.</p>
                    <p> Color: Negro.</p>
                    <p> Material: Pvc.</p>
                    <p> Mango: Goma.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/saltaeverv.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Saltacuerda<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre tu saltacuerda<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Everlast</p>
                    <p> Precio: $3.00</p>
                    <p> Longitud: 2 m.</p>
                    <p> Color: Verde.</p>
                    <p> Material: Pvc.</p>
                    <p> Mango: Goma.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/pr4kg.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesa rusa 4 kg<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre pesa rusa.<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Nike.</p>
                    <p> Peso: 4 kg.</p>
                    <p> Precio: $4.00 </p>
                    <p> Color: Negro.</p>
                    <p> Material: Caucho.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/pr8kg.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesa rusa 8 kg<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre pesa rusa.<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Nike.</p>
                    <p> Peso: 8 kg.</p>
                    <p> Precio: $8.00</p>
                    <p> Color: Negro.</p>
                    <p> Material: Caucho.</p>
                </div>
            </div>
        </div>

        <div class="col s12 m6 l4">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../resources/img/cards/pr12kg.jpg">
                </div>
                <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">Pesa rusa 12 kg<i
                            class="material-icons right">more_vert</i></span>
                    <p><a href="../../views/publica/carrito.php">Compra</a></p>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Más sobre pesa rusa.<i
                            class="material-icons right">close</i></span>
                    <p> Marca: Nike.</p>
                    <p> Peso: 12 kg.</p>
                    <p> Precio: $12.00</p>
                    <p> Color: Negro.</p>
                    <p> Material: Caucho.</p>

                </div>
            </div>
        </div>


    </div>
</div>
<!--Cards-->


<?php
include("../../app/helpers/footer_template.php");
//Se usa esto para poder utilizar la plantilla del header
?>