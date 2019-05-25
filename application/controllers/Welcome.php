<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{ //cambiar nombre al controlador
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('form');	//helper para poder manejar formularios
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$this->load->library('form_validation');	//libreria para validar formularios
	}

	function index()
	{
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('form');	//helper para poder manejar formularios
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$this->load->library('form_validation');	//libreria para validar formularios
		$this->load->view('headerSinLoguear.php');	//este header contiene el nav bar CON los botones sign up y log in
		$this->load->view('index.php');	// mi pagina
		$this->load->view('footerIndex.php');	//este footer contiene el archivo js SIN el login abierto
	}

	function validarAcceso()
	{	//funcion que se ejecuta cuando tratas de iniciar sesion
		$this->load->helper('url');		//helper para poder usar el comando base_url()
		$this->load->helper('form');		//helper para poder manejar formularios
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$this->load->library('form_validation');	//libreria para validar formularios
		$this->form_validation->set_rules('usuario', 'usuario', 'trim|required');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		$this->form_validation->set_rules('contraseña', 'contraseña', 'trim|required');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		if ($this->form_validation->run()) {	//si se corre el form
			$username = $this->input->post('usuario');	//recibo el post y almaceno el usuario ingresado en el input en la variable username
			$password = $this->input->post('contraseña');	//recibo el post y almaceno la pass ingresada en el input en la variable password
			$username = $this->security->xss_clean($username);	//limpio campos
			$password = $this->security->xss_clean($password);	//limpio campos
			//$this->encrypt->encode($password);
			$this->load->model('BDLogin');	//se carga el modelo que hace consultas con la database hardstore
			if ($this->BDLogin->accesoPermitido($username, $password)) {	//se ejecuta cuando se ingresa con exito
				date_default_timezone_set("America/Argentina/Buenos_Aires");
				$momento = date("m/d/Y H:i:s");
				$accion = "login";
				$this->load->model('BDInsertData');	//se carga el modelo que hace inserts a la database hardstore
				$this->BDInsertData->refreshBinnacle($accion, $momento, $username);
				$this->load->model('BDGetData');	//se carga el modelo que hace gets a la database hardstore
				$data["fetch_data"] = $this->BDGetData->userData($username, $password);
				foreach ($data["fetch_data"]->result() as $row) {
					$session_data = array(	//creo el array con el nombre de usuario para crear la session
						'username' => $username,	//almaceno algunos datos necesarios
						'condicion' => $row->condicion,	//almaceno algunos datos necesarios
						'nombre' => $row->nombre,
						'apellido' => $row->apellido,
						'email' => $row->email,
						'activo' => $row->activo
					);
				}
				$this->session->set_userdata($session_data);	//almaceno el array en userdata de la libreria de session
			} else {
				echo "Usuario y/o contraseña incorrectos";	//notifica fallo de inicio de sesion
			}
		}
	}

	function fillMostWanted(){
		$this->load->model('BDGetData');	//se carga el modelo que hace inserts a la database hardstore
		$data["fetch_data"] = $this->BDGetData->getMostWanted()->result();
		$fields = ($data["fetch_data"]);
		echo json_encode($fields);
	}
	
	function logout() //funcion para salir de la cuenta
	{
		date_default_timezone_set("America/Argentina/Buenos_Aires");
		$momento = date("m/d/Y H:i:s");
		$accion = "logout";
		$this->load->model('BDInsertData');	//se carga el modelo que hace inserts a la database hardstore
		$this->BDInsertData->refreshBinnacle($accion, $momento, $this->session->userdata('username'));
		$this->session->unset_userdata('username');	//saca los datos de sesion
		$this->session->unset_userdata('condicion');	//saca los datos de sesion
		$this->session->unset_userdata('nombre');	//saca los datos de sesion
		$this->session->unset_userdata('apellido');	//saca los datos de sesion
		$this->session->unset_userdata('email');	//saca los datos de sesion
		$this->session->unset_userdata('activo');	//saca los datos de sesion
		$this->session->sess_destroy();	//destruye la sesion
		redirect(base_url() . 'index.php/Welcome');
	}
}