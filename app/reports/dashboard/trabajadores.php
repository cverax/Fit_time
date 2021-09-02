<?php
require('../../helpers/report.php');
require('../../models/tipotrabajador.php');

// Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReport('Tipo de trabajador por persona');

// Se instancia el módelo Categorías para obtener los datos.
$trabajador = new Tipotrabajador;
// Se verifica si existen registros (categorías) para mostrar, de lo contrario se imprime un mensaje.
if ($dataTipoTra = $trabajador->readAll()) {
    // Se recorren los registros ($dataCategorias) fila por fila ($rowCategoria).
    foreach ($dataTipoTra as $rowTipoTra) {
        // Se establece un color de relleno para mostrar el nombre de la categoría.
        $pdf->SetFillColor(200, 162, 200);
        // Se establece la fuente para el nombre de la categoría.
        $pdf->SetFont('Times', 'B', 12);
        // Se imprime una celda con el nombre de la categoría.
        $pdf->Cell(0,10, utf8_decode('Tipo de trabajador: '.$rowTipoTra['nombre_tipotrabajador']), 1, 1, 'C', 1);
        // Se establece la categoría para obtener sus productos, de lo contrario se imprime un mensaje de error.
        if ($trabajador->setId($rowTipoTra['Id_tipo_trabajador'])) {
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataTrabajador = $trabajador->readTipoTrabajador()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(224 , 176, 255);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(60, 10, utf8_decode('Nombre trabajador'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Nombre usuario'), 1, 0, 'C', 1);
                $pdf->Cell(36, 10, utf8_decode('Telefono'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');

                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataTrabajador as $rowTrabajador) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(60, 10, utf8_decode($rowTrabajador['nombre']), 1, 0);
                    $pdf->Cell(50, 10, utf8_decode($rowTrabajador['correo']), 1, 0);
                    $pdf->Cell(40, 10, utf8_decode($rowTrabajador['nomusuario']), 1, 0);
                    $pdf->Cell(36, 10, $rowTrabajador['telefono'], 1, 0);
                    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');

                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay persona para este tipo de trabajador'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Trabajador incorrecto o inexistente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay trabajadores para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>