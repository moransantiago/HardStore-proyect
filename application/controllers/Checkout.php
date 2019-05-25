<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{ //cambiar nombre al controlador
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');    //helper para poder usar el comando base_url()
        $this->load->helper('security');    //helper para implementar xss_clean y no permitir codigo en inputs
    }

    function index()
    {
        $this->load->view('Checkout.php');
        $this->load->view('footerCheckout.php');
        $this->load->helper('url');    //helper para poder usar el comando base_url()
        $this->load->helper('security');    //helper para implementar xss_clean y no permitir codigo en inputs
    }

    function buy(){
        $this->load->helper('url');		//helper para poder usar el comando base_url()
		$this->load->helper('form');		//helper para poder manejar formularios
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
        $this->load->library('form_validation');	//libreria para validar formularios
		$this->form_validation->set_rules('cardName', 'cardName', 'trim|required|max_length[16]|min_length[16]');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		$this->form_validation->set_rules('cardNumber', 'cardNumber', 'trim|required');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		$this->form_validation->set_rules('cardExpDay', 'cardExpDay', 'trim|required');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		$this->form_validation->set_rules('cardCCV', 'cardCCV', 'trim|required');	//setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
		if ($this->form_validation->run()) {	//si se corre el form
			// $cardName = $this->input->post('usuario');	//recibo el post y almaceno el usuario ingresado en el input en la variable username
			// $cardNumber = $this->input->post('contraseña');	//recibo el post y almaceno la pass ingresada en el input en la variable password
			// $cardExpDay = $this->input->post('contraseña');	//recibo el post y almaceno la pass ingresada en el input en la variable password
			// $cardCCV = $this->input->post('contraseña');	//recibo el post y almaceno la pass ingresada en el input en la variable password
			// $cardName = $this->security->xss_clean($username);	//limpio campos
			// $cardNumber = $this->security->xss_clean($username);	//limpio campos
			// $cardExpDay = $this->security->xss_clean($username);	//limpio campos
			// $cardCCV = $this->security->xss_clean($password);	//limpio campos
            // $this->load->model('BDLogin');	//se carga el modelo que hace consultas con la database hardstore
            echo "success";
		} else {
            echo "failure";
        }
    }
}
