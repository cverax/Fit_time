<?php

class Cliente extends Validator
{

    // Declaración de atributos de la tabla clientes (propiedades).

    private $id = null;
    private $nombre = null;
    private $correo = null;
    private $clave = null;
    private $telefono = null;
    private $direccion = null;
    private $flog = null;
    private $nacimiento = null;
    private $usuario = null;
    private $dui = null;
    private $estado = null;

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
        if ($this->validateAlphabetic($value, 1, 200)) {
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

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
            $this->clave = $value;
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

    public function setFlog($value)
    {
        if ($this->validateDate($value)) {
            $this->flog = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNacimiento($value)
    {
        if ($this->validateDate($value)) {
            $this->nacimiento = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 1, 100)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDui($value)
    {
        if ($this->validateDUI($value)) {
            $this->dui = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            $this->estado = $value;
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

    public function getClave()
    {
        return $this->clave;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getFlog()
    {
        return $this->flog;
    }

    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getDui()
    {
        return $this->dui;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    /*
    *   Métodos para gestionar la cuenta del cliente.
    */

 //Función que me deja utilizar el correo y comprobarlo si es correcto
    public function checkUser($correo)
    {
        $sql = 'SELECT "Id_cliente" , estado FROM "Cliente" WHERE correo = ?';
        $params = array($correo);
        if ($data = Database::getRow($sql, $params)) {
            $this->id = $data['Id_cliente'];
            $this->estado = $data['estado'];
            $this->correo = $correo;
            return true;
        } else {
            return false;
        }
    }
//Función que me comprueba la clave del cliente.
    public function checkPassword($password)
    {
        $sql = 'SELECT clave FROM "Cliente" WHERE "Id_cliente" = ?';
        $params = array($this->id);
        $data = Database::getRow($sql, $params);
        if (password_verify($password, $data['clave'])) {
            return true;
        } else {
            return false;
        }
    }

//Cambia la contraseña

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE "Cliente" SET clave = ? WHERE "Id_cliente" = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function editProfile()
    {
        $sql = 'UPDATE "Cliente"
                SET nombre=?, correo=?, clave=?, telefono=?, direccion=?, fecha_login=?, fecha_nacimiento=?, usuario=?, dui=?, estado=?
                WHERE "Id_cliente" = ?';
        $params = array($this->nombre, $this->correo, $this->clave, $this->telefono, $this->direccion, $this->flog, $this->nacimiento, $this->usuario, $this->dui,  $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function changeStatus()
    {
        $sql = 'UPDATE "Cliente"
                SET estado = ?
                WHERE "Id_cliente" = ?';
        $params = array($this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    /*Creación del método para registrar clientes 
       de la clase Clientes heredada de Validator*/
    public function Register()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO "Cliente"(nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->correo, $hash, $this->telefono, $this->direccion, $this->flog, $this->nacimiento, $this->usuario, $this->dui);
        return Database::executeRow($sql, $params);
    }
    /*Creación del método para obtener clientes 
       de la clase Clientes heredada de Validator*/
    public function getCliente()
    {
        $sql = 'SELECT "Id_cliente", nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui, estado
         FROM "Cliente" 
         WHERE "Id_cliente" = ?';
        $param = array($this->id);
        return Database::getRow($sql, $param);
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function searchRows($value)
    {
        $sql = 'SELECT "Id_cliente", nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui, estado
                FROM "Cliente" 
                WHERE nombre ILIKE ? OR correo ILIKE ? OR direccion ILIKE ?
                ORDER BY nombre';
        $params = array("%$value%", "%$value%", "%$value%");
        return Database::getRows($sql, $params);
    }

    public function createRow()
    {
        // Se encripta la clave por medio del algoritmo bcrypt que genera un string de 60 caracteres.
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO "Cliente"(nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui, estado)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre, $this->correo, $hash, $this->telefono, $this->direccion, $this->flog, $this->nacimiento, $this->usuario, $this->dui,  $this->estado);
        return Database::executeRow($sql, $params);
    }

    public function readAll()
    {
        $sql = 'SELECT "Id_cliente", nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui, estado
                FROM "Cliente"
                ORDER BY nombre';
        $params = null;
        return Database::getRows($sql, $params);
    }

    public function readOne()
    {
        $sql = 'SELECT "Id_cliente", nombre, correo, clave, telefono, direccion, fecha_login, fecha_nacimiento, usuario, dui, estado
                FROM "Cliente"
                WHERE "Id_cliente" = ?';
        $params = array($this->id);
        return Database::getRow($sql, $params);
    }

    public function updateRow()
    {
        $sql = 'UPDATE "Cliente"
                SET nombre=?, correo=?, clave=?, telefono=?, direccion=?, fecha_login=?, fecha_nacimiento=?, usuario=?, dui=?, estado=?
                WHERE "Id_cliente" = ?';
        $params = array($this->nombre, $this->correo, $this->clave, $this->telefono, $this->direccion, $this->flog, $this->nacimiento, $this->usuario, $this->dui,  $this->estado, $this->id);
        return Database::executeRow($sql, $params);
    }

    public function deleteRow()
    {
        $sql = 'DELETE FROM "Cliente"
        WHERE "Id_cliente" = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function readEstadoCliente()
    {
        $sql = 'SELECT nombre, correo, estado
                FROM "Cliente" 
                WHERE estado = true
                ORDER BY nombre';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function readPedidosCliente()
    {
        $sql = 'SELECT "Id_pedido", c.nombre , c.correo , fecha_pedido ,  a.estadope 
                FROM "Pedido" p
                INNER JOIN "Cliente" c
				ON p."Id_cliente" = c."Id_cliente"
				INNER JOIN "Estado_pedido" a
				ON p."Id_estado" = a."Id_estado"
                WHERE p."Id_cliente" = ? ';        
        $params = array($this->id);
        return Database::getRows($sql, $params);         
    }

    public function readPedidos()
    {
        $sql = 'SELECT "Id_pedido"
                FROM "Pedidos"
                WHERE "Id_cliente" = ?
                ';
        $params = array($_SESSION['Id_cliente']);
        return Database::getRows($sql, $params);
    }
    
    public function pedidosCliente()
    {
        $sql = 'SELECT COUNT ("Id_cliente") AS cantidad, "Cliente".usuario
                FROM "Pedido" INNER JOIN "Cliente" USING ("Id_cliente")
                GROUP BY "Cliente".usuario
                ORDER BY cantidad DESC
                LIMIT 5';
        $params = null;
        return Database::getRows($sql, $params);
    }


}
