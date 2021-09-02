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


    <div class="container">
       
        <!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
        <div class="row">
            <div class="col s12 m6">
                <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                <canvas id="chart1"></canvas>
            </div>
            <div class="col s12 m6">
                <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
                <canvas id="chart2"></canvas>
            </div>
        </div>

        <!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
        <div class="row">
            <div class="col s12 m6">
                <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                <canvas id="chart3"></canvas>
            </div>
            <div class="col s12 m6">
                <!-- Se muestra una gráfica de pastel con el porcentaje de productos por categoría -->
                <canvas id="chart4"></canvas>
            </div>
        </div>

        <!-- Se muestran las gráficas de acuerdo con algunos datos disponibles en la base de datos -->
        <div class="row">
            <div class="col s12 m6 center-align">
                <!-- Se muestra una gráfica de barra con la cantidad de productos por categoría -->
                <canvas id="chart5"></canvas>
            </div>
        </div>

        <!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
        <script type="text/javascript" src="../../resources/js/chart.js"></script>   
        
    </div>
    
</main>

<?php 

    Dashboard_Page::footerTemplate('inicio');
?>