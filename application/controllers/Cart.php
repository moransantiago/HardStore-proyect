<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{ //cambiar nombre al controlador
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
	}

	function index()
	{
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
	}

	function fillCart()
	{
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$username = $this->session->userdata('username');
		$username = $this->security->xss_clean($username);
		$this->load->model('BDGetData');
		$data["fetch_data"] = $this->BDGetData->getCart($username)->result();
		$fields = ($data["fetch_data"]);
		echo json_encode($fields);
	}

	function addAmount()
	{
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$username = $this->session->userdata('username');
		$username = $this->security->xss_clean($username);
		$idProduct = $this->input->post('product');
		$this->load->model('BDInsertData');
		$this->BDInsertData->addAmountCart($idProduct, $username);
	}

	function substractAmount()
	{
		$this->load->helper('security');	//helper para implementar xss_clean y no permitir codigo en inputs
		$username = $this->session->userdata('username');
		$username = $this->security->xss_clean($username);
		$idProduct = $this->input->post('product');
		$this->load->model('BDInsertData');
		$this->BDInsertData->substractAmountCart($idProduct, $username);
	}

	function addProductToCart(){
		$idProduct = $this->input->post('id');
		$this->load->model('BDInsertData');	//se carga el modelo que hace inserts a la database hardstore
		$this->BDInsertData->addProductToCart($idProduct, $this->session->userdata('username'));
	}
}