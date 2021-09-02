<?php
/*
*	Clase para manejar las tablas pedidos y detalle_pedido de la base de datos. Es clase hija de Validator.
*/
class Estadopedido extends Validator
{
    //Se definien los atributos.
    private $id = null;
    private $nombre = null;

    //Se toma un valor para los atributos.
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
        if ($this->validateAlphabetic($value, 1, 20)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

  //Se obtienen los valores de los atributos.
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


}