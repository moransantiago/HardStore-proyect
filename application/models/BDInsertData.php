<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BDInsertData extends CI_Model
{
    function __construct()
    {
        $this->load->database();    //cargo la base de datos (no es necesario porque ya puse el autoload)
    }

    function insertProduct($cantidad, $modelo, $marca, $linea, $tipo, $garantiaEnMeses, $calle)
    {  //recibo lo ingresado en el form desde el controlador
        $cantidad = strtoupper($cantidad);
        $modelo = strtoupper($modelo);
        $marca = strtoupper($marca);
        $linea = strtoupper($linea);
        $tipo = strtoupper($tipo);
        $garantiaEnMeses = strtoupper($garantiaEnMeses);
        $calle = strtoupper($calle);
        $query = $this->db->query("call insertProduct('$cantidad', '$modelo', '$marca', '$linea', '$tipo', '$garantiaEnMeses', '$calle');");
    }

    function insertAccount($nombre, $apellido, $username, $password, $email, $rol)
    {
        $query = $this->db->query("INSERT INTO cuentas (nombre, apellido, email, nombreDeUsuario, contraseña, idRoll, activo) VALUES('$nombre', '$apellido', '$email', '$username', '$password', $rol, 1);");
    }

    function updateAccount($nombre, $apellido, $username, $password, $email, $rol, $id)
    {
        $query = $this->db->query("call updateAccount('$nombre', '$apellido', '$username', '$password', '$email', $rol, $id);");
    }

    function refreshBinnacle($accion, $momento, $username)
    {
        $query = $this->db->query("INSERT INTO bitacora (nombre, momento, idCuenta) VALUES('$accion', '$momento', (SELECT idCuenta FROM cuentas WHERE cuentas.nombreDeUsuario = '$username'));");
    }

    function blockAccount($id)
    {
        $query = $this->db->query("UPDATE cuentas SET activo = IF(((SELECT activo WHERE idCuenta = $id) = false), true, false) WHERE idCuenta = $id;");
    }

    function addAmountCart($idProduct, $username)
    {
        $query = $this->db->query("UPDATE carrito SET cantidad = cantidad + 1 WHERE carrito.idUnitario = $idProduct AND carrito.idCuenta = (SELECT idCuenta FROM cuentas WHERE cuentas.nombreDeUsuario = '$username');");
    }

    function substractAmountCart($idProduct, $username)
    {
        $query = $this->db->query("call substractCart($idProduct, '$username');");
    }

    function addProductToCart($idProduct, $username)
    {
        if ($username != null) {
            $query = $this->db->query("INSERT INTO carrito (cantidad, idCuenta, idUnitario) VALUES (1, (SELECT idCuenta FROM cuentas WHERE cuentas.nombreDeUsuario = '$username'), $idProduct);");
        }
    }

    function generateOrder($username, $cardName, $cardNumber, $cardExpDay, $cardCCV){
        $this->db->query("INSERT INTO pagos (metodo, propietarioTarjeta, numeroTarjeta, expiracionTarjeta, ccvTarjeta, idCuenta) VALUES ('tarjeta', '$cardName', $cardNumber, '$cardExpDay', $cardCCV, (SELECT idCuenta FROM cuentas WHERE cuentas.nombreDeUsuario = '$username'));");
        // return $query;
    }
}
