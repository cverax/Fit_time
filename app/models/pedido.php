<?php
/*
*	Clase para manejar las tablas pedidos y detalle_pedido de la base de datos. Es clase hija de Validator.
*/
class Pedido extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $fecha_entrega = null;
    private $total_compra = null;
    private $estado = null;
    private $nombres = null;
    private $nombre = null;


    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }
    public function setFechaEntrega($value)
    {
        if ($this->validateDate($value)) {
            $this->fecha_entrega = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotalCompra($value)
    {
        if ($this->validateMoney($value)) {
            $this->total_compra = $value;
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

    public function setNombres($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->nombres = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->nombre = $value;
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

    public function getEntrega()
    {
        return $this->fecha_entrega;
    }

    public function getTotal()
    {
        return $this->total_compra;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getNombres()
    {
        return $this->nombres;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT "Id_pedido", fecha_entrega, total_compra , estadope , nombres, nombre
                FROM "Pedido"  
                INNER JOIN "Estado_pedido" a
                ON a."Id_estado" = p."Id_estado"
                INNER JOIN "Trabajador" t
                ON t."Id_trabajador" = p."Id_trabajador"
                INNER JOIN "Cliente" c
                ON c."Id_cliente" = p."Id_cliente"
                WHERE fecha_entrega ILIKE ? OR total_compra ILIKE ?
                ORDER BY cantidad';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO "Pedido"(fecha_entrega, total_compra , estadope , nombres, nombre)
        VALUES(? , ? , ? , ? , ?)';
        $params = array($this->fechaentrega, $this->totalcompra, $this->estado, $this->nombres, $this->nombre);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_pedido", fecha_entrega, total_compra , estadope , nombres , nombre
        FROM "Pedido" p
        INNER JOIN "Estado_pedido" a
        ON a."Id_estado" = p."Id_estado"
        INNER JOIN "Trabajador" t
        ON t."Id_trabajador" = p."Id_trabajador"
        INNER JOIN "Cliente" c
        ON c."Id_cliente" = p."Id_cliente"
        ORDER BY total_compra';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_pedido", fecha_entrega, total_compra , estadope , nombres, nombre
        FROM "Pedido"
        WHERE "Id_pedido" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {

        $sql = 'UPDATE "Pedido"
        SET fecha_entrega = ?, total_compra = ? , estadope = ? , nombres = ? , nombre = ?
        WHERE "Id_pedido"= ?;';
        $params = array($this->fechaentrega, $this->totalcompra, $this->estado, $this->nombres, $this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Pedido"
        WHERE "Id_pedido" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
}
