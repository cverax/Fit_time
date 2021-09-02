<?php

class Tipopro extends Validator
{

    // Declaración de atributos de la tabla proveedor (propiedades).

    private $id = null;
    private $nombre = null;
    private $descripcion = null;
    private $foto_tipopro = null;
    private $ruta = '../../../resources/img/cards/';

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

    public function setImagen($file)
    {
        if ($this->validateImageFile($file, 500, 500)) {
            $this->imagen = $this->getImageName();
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

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }


    //Para que se muestren los tipos de producto
    public function readAllTipopro()
    {
        $sql = 'SELECT "Id_tipo_producto", nombre_tipoproducto, descripcion, foto_tipopro
        FROM "Tipo_producto"';
        $params = null;
        return Database::getRows($sql, $params);
    }

    //Para que se lea uno por uno
    public function readOne()
    {
        $sql = 'SELECT "Id_producto", nombre_producto , detalle , precio , cantidad , foto_pro 
        FROM "Producto"
        WHERE "Id_producto" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    //Para que se muestren todos los productos por tipo de producto
    public function readProducto()
    {
        $sql = 'SELECT "Id_producto", nombre_producto , detalle , precio , cantidad , foto_pro
        FROM "Producto"
        WHERE "Id_tipo_producto" = ? AND "estado" = true';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

}