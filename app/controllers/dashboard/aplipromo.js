document.addEventListener('DOMContentLoaded', function () {

    //INICIALIZADOR DEL NAVBAR  
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    //INICIALIZADOR DEL MODAL
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    //INICIALIZADOR DEL COMBOBOX
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);

});