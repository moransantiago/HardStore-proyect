<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BDGetData extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    function bringStock()
    {
        $query = $this->db->query("SELECT idUnitario, disponible, cantidad, marca, modelo, linea, tipo, garantiaEnMeses, calle, numeroDeCalle, telefono FROM stock, sucursales, catalogo, marcas WHERE stock.idSucursal = sucursales.idSucursal AND stock.idProducto = catalogo.idProducto AND catalogo.idMarca = marcas.idMarca ORDER BY marca;");
        return $query;
    }

    function filterStock($keyword)
    {
        $query = $this->db->query("SELECT idUnitario, disponible, cantidad, marca, modelo, linea, tipo, garantiaEnMeses, calle, numeroDeCalle, telefono FROM stock, sucursales, catalogo, marcas WHERE stock.idSucursal = sucursales.idSucursal AND stock.idProducto = catalogo.idProducto AND catalogo.idMarca = marcas.idMarca AND (cantidad LIKE '%$keyword%' OR marca LIKE '%$keyword%' OR modelo LIKE '%$keyword%' OR linea LIKE '%$keyword%' OR tipo LIKE '%$keyword%' OR garantiaEnMeses LIKE '%$keyword%' OR calle LIKE '%$keyword%' OR numeroDeCalle LIKE '%$keyword%' OR telefono LIKE '%$keyword%');");
        return $query;
    }

    function changeAmount($id, $amount)
    {
        $query = $this->db->query("call changeAmount($id, $amount);");
    }

    function bringAccounts()
    {
        $query = $this->db->query("SELECT roles.nombre AS condicion, cuentas.nombre, apellido, email, nombreDeUsuario, contraseña, activo, idCuenta FROM roles, cuentas WHERE cuentas.idRoll = roles.idRoll ORDER BY condicion;");
        return $query;
    }

    function bringAccountsForEdit($id)
    {
        $query = $this->db->query("SELECT nombre, apellido, email, nombreDeUsuario FROM cuentas WHERE idCuenta = $id;");
        return $query;
    }

    function userData($username, $password)
    {
        $query = $this->db->query("SELECT roles.nombre AS condicion, cuentas.nombre, apellido, email, nombreDeUsuario, activo FROM roles, cuentas WHERE nombreDeUsuario = '$username' AND contraseña = '$password' AND cuentas.idRoll = roles.idRoll;");
        return $query;
    }

    function checkUsernameAddAccount($username)
    {
        $query = $this->db->query("SELECT nombreDeUsuario FROM cuentas WHERE nombreDeUsuario = '$username';");
        return $query;
    }

    function checkEmailAddAccount($email)
    {
        $query = $this->db->query("SELECT email FROM cuentas WHERE email = '$email';");
        return $query;
    }

    function checkUsernameEditAccount($username, $id)
    {
        $query = $this->db->query("SELECT nombreDeUsuario FROM cuentas WHERE nombreDeUsuario = '$username' AND idCuenta != $id;");
        return $query;
    }

    function checkEmailEditAccount($email, $id)
    {
        $query = $this->db->query("SELECT email FROM cuentas WHERE email = '$email' AND idCuenta != $id;");
        return $query;
    }

    function getCart($username)
    {
        $query = $this->db->query("SELECT CONCAT (marca, ' ', modelo, ' ', linea ) AS nombre, carrito.cantidad, catalogo.precio AS amount, carrito.idUnitario AS numP FROM marcas, catalogo, carrito, stock WHERE carrito.idUnitario = stock.idUnitario AND catalogo.idMarca = marcas.idMarca AND carrito.idCuenta = (SELECT idCuenta FROM cuentas WHERE nombreDeUsuario = '$username') AND stock.idProducto = catalogo.idProducto;");
        return $query;
    }

    function getMostWanted(){
        $query = $this->db->query("SELECT CONCAT (marca, ' ', modelo, ' ', linea ) AS nombre, stock.idUnitario as numStock from marcas, catalogo, stock where catalogo.idMarca = marcas.idMarca and stock.idProducto = catalogo.idProducto order by rand() limit 5;");
        return $query;
    }
}
