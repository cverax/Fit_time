<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../helpers/report.php');
    require('../../models/clientes.php');

    // Se instancia el módelo Categorias para procesar los datos.
    $cliente = new Cliente;

    // Se verifica si el parámetro es un valor correcto, de lo contrario se direcciona a la página web de origen.
    if ($cliente->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowCliente = $cliente->readOne()) {
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Pedidos hecho por ' . $rowCliente['nombre']);
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($dataPedido = $cliente->readPedidosCliente()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(158, 217, 213);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Times', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(50, 10, utf8_decode('Fecha pedido'), 1, 0, 'C', 1);
                $pdf->Cell(90, 10, utf8_decode('Correo cliente'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Estado pedido'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                
                // Se establece la fuente para los datos de los productos.
                $pdf->SetFont('Times', '', 11);
                // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
                foreach ($dataPedido as $rowPedido) {
                    // Se imprimen las celdas con los datos de los productos.
                    $pdf->Cell(50, 10, utf8_decode($rowPedido['fecha_pedido']), 1, 0);
                    $pdf->Cell(90, 10, $rowPedido['correo'], 1, 0);
                    $pdf->Cell(50, 10, $rowPedido['estadope'], 1, 0);
                    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('Este cliente no tiene pedidos'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()
            $pdf->Output();
        } else {
            header('location: ../../../views/dashboard/categorias.php');
        }
    } else {
        header('location: ../../../views/dashboard/categorias.php');
    }
} else {
    header('location: ../../../views/dashboard/categorias.php');
}
?>