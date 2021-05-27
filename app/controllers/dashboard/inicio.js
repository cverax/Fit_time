document.addEventListener('DOMContentLoaded', function () {

    //INICIALIZADOR DEL NAVBAR  
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);



  });

  //GRÁFICO DE PASTEL
  parametros = ['Pesas rusas', 'Saltacuerdas', 'Tennis', 'Pesas'];
  valores = [2, 2, 1, 1];
  
  var data_pie = [{
  
    labels: parametros,
    values: valores,
    type: "pie",
  }];
  
  var layout_pie = {
  
    title: {
      text:'Porcentaje de productos',
      font: {
        family: 'Helvetica, monospace',
        size: 24
        },
      xref: 'paper',
      x: 0.05,
    }
  };
  
  Plotly.newPlot("pastel", data_pie, layout_pie);
  
  window.onresize = function() {
    Plotly.Plots.resize("pastel");
  };
