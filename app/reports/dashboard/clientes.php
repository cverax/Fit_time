<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/clientes.php');
// Se instancia la clase para crear el reporte.
$pdf = new Report;
    // Se inicia el reporte con el encabezado del documento.

$pdf->startReport('Lista de clientes por estado');

$cliente = new Cliente;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataCliente = $cliente->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataCliente as $rowCliente) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(175);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0, 10, utf8_decode('Estado: '.$rowCliente['estado']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($cliente->setEstado($rowCliente['estado'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataCliente = $cliente->readEstadoCliente()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(175);
                // Se establece la fuente para el nombre de la categoría.
                $pdf->SetFont('Times', 'B', 12);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(100, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(55, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataCliente as $rowCliente) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(100, 10, utf8_decode($rowCliente['nombre']), 1, 0);
                    $pdf->Cell(55, 10, utf8_decode($rowCliente['correo']), 1, 0,);
                    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay clientes para mostrar'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Marca incorrecta o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay clientes para mostrar'), 1, 1);
}

 // Se envía el documento hacia el navegador y se invoca al método Footer()
$pdf->Output();
?>

