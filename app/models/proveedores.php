<?php

class Proveedor extends Validator
{
    // Declaración de atributos de la tabla proveedor (propiedades).

    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $telefono = null;
    private $direccion = null;
   
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
        if ($this->validateAlphabetic($value, 1, 300)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTelefono($value)
    {
        if ($this->validatePhone($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 300)) {
            $this->direccion = $value;
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

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function searchRows($value)
    {
        $sql = 'SELECT "Id_proveedor", nombre, correo, telefono , direccion
                FROM "Proveedor"
                WHERE nombre ILIKE ? OR correo ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        $sql = 'INSERT INTO "Proveedor"(nombre, correo, telefono, direccion)
        VALUES(? , ? , ? , ?)';
        $params = array($this->nombre, $this->correo, $this->telefono, $this->direccion);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_proveedor", nombre, correo, telefono, direccion
                FROM "Proveedor"
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_proveedor", nombre, correo, telefono, direccion
        FROM "Proveedor"
        WHERE "Id_proveedor" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {

        $sql = 'UPDATE "Proveedor"
        SET nombre=?, correo=?, telefono=?, direccion=?
        WHERE "Id_proveedor"=?;';
        $params = array($this->nombre, $this->correo, $this->telefono, $this->direccion, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Proveedor"
        WHERE "Id_proveedor" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    
    public function readProductoProveedor()
    { 
        $sql = 'SELECT nombre, "Id_producto", nombre_producto, detalle, precio, cantidad , nombre_tipoproducto
                FROM "Producto" INNER JOIN "Proveedor" USING("Id_proveedor") INNER JOIN "Tipo_producto" USING("Id_tipo_producto")
                WHERE "Id_proveedor" = ? 
                ORDER BY nombre_producto';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    } 

    public function readProv()
    {
        
      $sql =' SELECT "Id_proveedor", nombre
      FROM "Proveedor"
      WHERE "Id_proveedor" = ?';
      $params = array($this->id);
      return Database::getRow($sql, $params);
    }
    
}

