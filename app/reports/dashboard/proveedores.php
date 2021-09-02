<?php
require('../../helpers/report.php');
require('../../models/proveedores.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Productos por proveedor');

// Se instancia el módelo Direccion para obtener los datos.
$proveedor = new Proveedor;
// Se verifica si existen registros (Direccion) para mostrar, de lo contrario se imprime un mensaje.
if ($dataProveedor = $proveedor->readAll()) {
    // Se recorren los registros ($dataDireccion) fila por fila ($rowCategoria).
    foreach ($dataProveedor as $rowProveedor) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(200, 162, 200);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre del proveedor
        $pdf->Cell(0, 10, utf8_decode('Nombre: '.$rowProveedor['nombre']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($proveedor->setId($rowProveedor['Id_proveedor'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataProducto = $proveedor->readProductoProveedor()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(224 , 176, 255);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(100, 10, utf8_decode('Detalle'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Precio (US$)'), 1, 0, 'C', 1);
                $pdf->Cell(21, 10, utf8_decode('Cantidad)'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');

                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataDireccion) fila por fila ($rowDireccion).
                foreach ($dataProducto as $rowProducto) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(40, 10, utf8_decode($rowProducto['nombre_producto']), 1, 0);
                    $pdf->Cell(100, 10, utf8_decode($rowProducto['detalle']), 1, 0);
                    $pdf->Cell(25, 10, $rowProducto['precio'], 1, 0);
                    $pdf->Cell(21, 10, $rowProducto['cantidad'], 1, 0);
                    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para este proveedor'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Proveedor incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay proveedores para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>