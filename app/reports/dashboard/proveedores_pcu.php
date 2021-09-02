<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../helpers/report.php');
    require('../../models/proveedores.php');

    // Se instancia el módelo Categorias para procesar los datos.
    $categoria = new Proveedor ;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($categoria->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowCategoria = $categoria->readProv()) {
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Productos de ' .$rowCategoria['nombre']);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProductos = $categoria->readProductoProveedor()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(200, 162, 200);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(90, 10, utf8_decode('Nombre producto'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                $pdf->Cell(70, 10, utf8_decode('Tipo producto'), 1, 1, 'C', 1);                 
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataProductos as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(90, 10, utf8_decode($rowProducto['nombre_producto']), 1, 0,'C');
                    $pdf->Cell(25, 10, ('$ '. $rowProducto['precio']), 1, 0,'C');                    
                    $pdf->Cell(70, 10, utf8_decode($rowProducto['nombre_tipoproducto']), 1, 1,'C');
                   
                    
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta categoría'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
           //header('location: ../../../views/dashboard/proveedores.php');
        }
    } else {
       //header('location: ../../../views/dashboard/proveedores.php');
    }
} else {
    header('location: ../../../views/dashboard/proveedores.php');
}
?>