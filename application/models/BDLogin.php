<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BDLogin extends CI_Model
{
    function __construct()
    {
        $this->load->database();    //cargo la base de datos (no es necesario porque ya puse el autoload)
    }

    function accesoPermitido($username, $password)
    {  //recibo lo ingresado en el form desde el controlador
        $this->db->where('nombreDeUsuario', $username);
        $this->db->where('contraseña', $password);
        $queryDelNombre = $this->db->get('cuentas');    //consulta por si ingreso por nombre
        $this->db->where('email', $username);
        $this->db->where('contraseña', $password);
        $queryDelMail = $this->db->get('cuentas');  //consulta por si ingreso por direccion de correo electronico
        if ($queryDelNombre->num_rows() > 0 || $queryDelMail->num_rows() > 0) { //si hay coincidencia retorno true
            return true;
        } else {
            return false;
        }
    }
}
