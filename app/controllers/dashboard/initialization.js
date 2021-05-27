document.addEventListener('DOMContentLoaded', function() {

    //Se inicializa el menú vertical responsivo. index.php
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    //Se inicializa el slider, hace que aparezcan las imágenes y los puntitos. index.php
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems);

    //Se inicializa el datepicker para las fechas crearcuenta y mi cuenta.

    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems,{
        format : 'yy-mm-dd'
    });

    M.Tooltip.init(document.querySelectorAll('.tooltipped'));
    // Se inicializa el componente Modal para que funcionen las cajas de dialogo.

    // Se inicializa el componente Dropdown para que funcione la lista desplegable en los menús.
    M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'));

    //INICIALIZADOR DEL MODAL
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    //Se inicializa el combobox
    
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);



});