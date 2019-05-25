<?php
defined('BASEPATH') or exit('No direct script access allowed');

class newPassword extends CI_Controller
{ //cambiar nombre al controlador
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('form');	//helper para poder manejar formularios
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		//$this->load->library('encrypt'); //libreria para encriptar psswd
		$this->load->library('form_validation');	//libreria para validar formularios
	}

	function index()
	{
		$this->load->view('recuperarPassword.php');	//este footer contiene el archivo js SIN el login abierto
		$this->load->view('footer.php');
	}
}
