<?php
/*
*	Clase para manejar las tablas pedidos y detalle_pedido de la base de datos. Es clase hija de Validator.
*/
class Pedidos extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_pedido = null;
    private $id_detalle = null;
    private $cliente = null;
    private $producto = null;
    private $cantidad = null;
    private $precio = null;
    private $estado = null; // Valor por defecto en la base de datos: 0
    /*
    *   ESTADOS PARA UN PEDIDO
    *   1: En proceso. El pedido se encuentra activo por parte del cliente y puede modificar el pedido y el detalle.
    *   2: Entregado. Es cuando la tienda entrega el pedido realizado por el cliente.
    *   3: Finalizado. El cliente termina el pedido y ya no puede modificar el pedido ni el detalle.
    *   4: Anulado. El cliente anula el pedido y se desactiva.
    */

    /*
    *   Métodos para validar y asignar valores de los atributos.
    */
    public function setIdPedido($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_pedido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalle($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_detalle = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setProducto($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ($this->validateMoney($value)) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->estado = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    // Método para verificar si existe un pedido en proceso para seguir comprando, de lo contrario se crea uno.
    public function startOrder()
    {
        $this->estado = 1;

        $sql = 'SELECT "Id_pedido"
                FROM "Pedido"
                WHERE "Id_estado" = ? AND "Id_cliente" = ?';
        $params = array($this->estado, $_SESSION['Id_cliente']);
        if ($data = Database::getRow($sql, $params)) {
            $this->id_pedido = $data['Id_pedido'];
            return true;
        } else {
            $sql = 'INSERT INTO "Pedido"("Id_estado", "Id_cliente")
                    VALUES(?, ?)';
            $params = array($this->estado, $_SESSION['Id_cliente']);
            // Se obtiene el ultimo valor insertado en la llave primaria de la tabla pedidos.
            if ($this->id_pedido = Database::getLastRow($sql, $params)) {
                return true;
            } else {
                return false;
            }
        }
    }

    // Método para agregar un producto al carrito de compras.
    public function createDetail()
    {
        // Se realiza una subconsulta para obtener el precio del producto.
        $sql = 'INSERT INTO "Detalle_pedido"("Id_producto", precio, cantidad, "Id_pedido")
                VALUES(?, (SELECT precio FROM "Producto" WHERE "Id_producto" = ?), ?, ?)';
        $params = array($this->producto, $this->producto, $this->cantidad, $this->id_pedido);
        return Database::executeRow($sql, $params);
    }

    // Método para obtener los productos que se encuentran en el carrito de compras.
    public function readOrderDetail()
    {
        $sql = 'SELECT "Id_detalle_pedido", nombre_producto, t.precio, a.cantidad 
                FROM "Detalle_pedido" a
                INNER JOIN "Pedido" p 
                ON p."Id_pedido" = a."Id_pedido"
                INNER JOIN "Producto" t
                ON t."Id_producto" = a."Id_producto"
                WHERE p."Id_pedido" = ?';
        $params = array($this->id_pedido);
        return Database::getRows($sql, $params);
    }

    // Método para finalizar un pedido por parte del cliente.
    public function finishOrder()
    {
        // Se establece la zona horaria local para obtener la fecha del servidor.
        date_default_timezone_set('America/El_Salvador');
        $date = date('Y-m-d');
        $this->estado = 3;
        $sql = 'UPDATE "Pedido"
                SET "Id_estado" = ?, fecha_pedido = ?
                WHERE "Id_pedido" = ?';
        $params = array($this->estado, $date, $_SESSION['Id_pedido']);
        return Database::executeRow($sql, $params);
    }

    // Método para actualizar la cantidad de un producto agregado al carrito de compras.
    public function updateDetail()
    {
        $sql = 'UPDATE "Detalle_pedido"
                SET cantidad = ?
                WHERE "Id_detalle_pedido" = ? AND "Id_pedido" = ?';
        $params = array($this->cantidad, $this->id_detalle, $_SESSION['Id_pedido']);
        return Database::executeRow($sql, $params);
    }

    // Método para eliminar un producto que se encuentra en el carrito de compras.
    public function deleteDetail()
    {
        $sql = 'DELETE FROM "Detalle_pedido"
                WHERE "Id_detalle_pedido" = ? AND "Id_pedido" = ?';
        $params = array($this->id_detalle, $_SESSION['Id_pedido']);
        return Database::executeRow($sql, $params);
    }
}
