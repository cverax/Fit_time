<?php 
    include('../../app/helpers/template.php');

    Dashboard_Page::headerTemplate('Inicio');
?>


<main>
    <!--TITULO-->
    <div class="section white">
        <div class="row container">
            <h2 class="header center-align" style="margin-top: 30px;">¡Bienvenido, Usuario!</h2>
            <h5 class="header center-align" style="margin-top: 30px; margin-bottom: 30px;">Aquí encontrarás información sobre ventas</h5>
        </div>
    </div>
    <!--TITULO-->


    <div class="container" style="width: 80%;">
       
        <div class="row">
            <div class="col s12 l6">
                <!-- <div class="card horizontal z-depth-3"> -->
                    <div id="pastel"></div>
                <!-- </div> -->
                
            </div>
            <div class="col s12 l5 offset-l1">
                <div class="card">
                    <div class="card-content info">
                        <p>Producto más vendido: Pesas rusas y saltacuerdas</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content info">
                        <p>Producto para comprar: Fajas</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content info">
                        <p>Total de ventas del mes: $200.0</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content info">
                        <p>Trabajador del mes: Tatiana Vanessa Menjívar Flores</p>
                    </div>
                </div>
            </div>
        </div>       
        
    </div>
    
</main>

<?php 

    Dashboard_Page::footerTemplate('inicio');
?>