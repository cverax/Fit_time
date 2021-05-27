<?php

class Tipotrabajador extends Validator
{

    // Declaración de atributos de la tabla proveedor (propiedades).

    private $id = null;
    private $nombre = null;

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

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT "Id_tipo_trabajador", nombre_tipotrabajador
                FROM "Prueba"
                WHERE nombre_tipotrabajador ILIKE ? 
                ORDER BY nombre_tipotrabajador';
        $params = array("%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO "Tipo_trabajador"(nombre_tipotrabajador)
        VALUES(?)';
        $params = array($this->nombre);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_tipo_trabajador" , nombre_tipotrabajador
                FROM "Prueba"
                ORDER BY nombre_tipotrabajador';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_tipo_trabajador" , nombre_tipotrabajador
        FROM "Prueba"
        WHERE "Id_tipo_trabajador" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {

        $sql = 'UPDATE "Prueba"
        SET nombre_tipotrabajador=?
        WHERE  "Id_tipo_trabajador"=?;';
        $params = array($this->nombre, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Prueba"
        WHERE "Id_tipo_trabajador" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    
}