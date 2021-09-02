<?php

class Detallepedido extends Validator
{

    // Declaración de atributos de la tabla proveedor (propiedades).

    private $id = null;
    private $detalle = null;
    private $cantidad = null;
    private $precio = null;
    private $pedido = null;
    private $producto = null;

    /*
*   Métodos para dar (guardarlos) valores a los atributos.
*/

    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDetalle($value)
    {
        if ($this->validateAlphabetic($value, 1, 300)) {
            $this->detalle = $value;
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

    public function setPedido($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->pedido = $value;
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

    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getPedido()
    {
        return $this->pedido;
    }

    public function getProducto()
    {
        return $this->producto;
    }

        /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT "Id_detalle_pedido", detalle_pedido, cantidad, precio , "Id_pedido","Id_producto"
                FROM "Detalle_pedido"
                WHERE detalle_pedido ILIKE ? OR correo ILIKE ?
                ORDER BY cantidad';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO "Detalle_pedido"(detalle_pedido, cantidad, precio, "Id_pedido","Id_producto")
        VALUES(? , ? , ? , ? , ?)';
        $params = array($this->detalle, $this->cantidad, $this->precio, $this->pedido , $this->producto);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_detalle_pedido", detalle_pedido, cantidad, precio , "Id_pedido","Id_producto"
                FROM "Detalle_pedido"
                ORDER BY cantidad';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_detalle_pedido", detalle_pedido, cantidad, precio , "Id_pedido","Id_producto"
        FROM "Detalle_pedido"
        WHERE "Id_detalle_pedido" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {

        $sql = 'UPDATE "Detalle_pedido"
        SET detalle_pedido = ?, cantidad = ?, precio = ? , "Id_pedido" = ? ,"Id_producto" = ?
        WHERE "Id_detalle_pedido"=?;';
        $params = array($this->detalle, $this->cantidad, $this->precio, $this->pedido , $this->producto, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Detalle_pedido"
        WHERE "Id_detalle_pedido" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function top5Productos()
    {
        $sql = 'SELECT COUNT ("Id_producto") AS cantidad, nombre_producto
                FROM "Detalle_pedido" INNER JOIN "Producto" USING ("Id_producto")
                GROUP BY nombre_producto
                ORDER BY cantidad DESC
                LIMIT 5';
        $params = null;
        return Database::getRows($sql, $params);
    }
    
    public function stockProductos()
    {
        $sql = 'SELECT cantidad, nombre_producto 
                FROM "Producto" 
                ORDER BY cantidad ASC 
                LIMIT 5';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function pedidosDia()
    {
        $sql = 'SELECT COUNT ("Id_pedido") AS cantidad, fecha_pedido
                FROM "Pedido"
                WHERE fecha_pedido  BETWEEN (SELECT CAST (CURRENT_DATE AS DATE) - CAST(\'7 DAYS\' AS INTERVAL) AS rango) AND CURRENT_DATE
                GROUP BY fecha_pedido';
        $params = null;
        return Database::getRows($sql, $params);
    }

}
