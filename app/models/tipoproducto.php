<?php

class Tipoproducto extends Validator
{

    // Declaración de atributos de la tabla proveedor (propiedades).

    private $id = null;
    private $nombre = null;
    private $descripcion = null;

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

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 100)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDescripcion($value)
    {
        if ($this->validateString($value, 1, 500)) {
            $this->descripcion = $value;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT "Id_tipo_producto", nombre_tipoproducto , descripcion
                FROM "Tipo_producto"
                WHERE nombre_tipoproducto ILIKE ? 
                ORDER BY nombre_tipoproducto';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO "Tipo_producto"(nombre_tipoproducto , descripcion)
        VALUES(? , ?)';
        $params = array($this->nombre , $this->descripcion);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_tipo_producto" , nombre_tipoproducto , descripcion
                FROM "Tipo_producto"
                ORDER BY nombre_tipoproducto';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_tipo_producto" , nombre_tipoproducto , descripcion
        FROM "Tipo_producto"
        WHERE "Id_tipo_producto" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {

        $sql = 'UPDATE "Tipo_producto"
        SET nombre_tipoproducto=? , descripcion=?
        WHERE  "Id_tipo_producto"=?;';
        $params = array($this->nombre, $this->descripcion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Tipo_producto"
        WHERE "Id_tipo_producto" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }
   
    public function readTipoProducto()
    { 
        $sql = 'SELECT nombre_tipoproducto, "Id_producto" , nombre_producto, precio
                FROM "Producto" INNER JOIN "Tipo_producto" USING ("Id_tipo_producto")
                WHERE "Id_tipo_producto" = ?
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }
}