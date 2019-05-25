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

    function buy()
    {
        $this->load->helper('url');        //helper para poder usar el comando base_url()
        $this->load->helper('form');        //helper para poder manejar formularios
        $this->load->helper('security');    //helper para implementar xss_clean y no permitir codigo en inputs
        $this->load->library('form_validation');    //libreria para validar formularios
        $this->form_validation->set_rules('cardName', 'cardName', 'trim|required|max_length[16]|min_length[16]');    //setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
        $this->form_validation->set_rules('cardNumber', 'cardNumber', 'trim|required');    //setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
        $this->form_validation->set_rules('cardExpDay', 'cardExpDay', 'trim|required');    //setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
        $this->form_validation->set_rules('cardCCV', 'cardCCV', 'trim|required|max_length[4]|min_length[3]');    //setea reglas de obligatoriedad para llenar el campo (trim limpia spaces)
        if ($this->form_validation->run()) {    //si se corre el form
            // $cardName = $this->input->post('cardName');	//recibo el post y almaceno el usuario ingresado en el input en la variable username
            // $cardNumber = $this->input->post('cardNumber');	//recibo el post y almaceno la pass ingresada en el input en la variable password
            // $cardExpDay = $this->input->post('cardExpDay');	//recibo el post y almaceno la pass ingresada en el input en la variable password
            // $cardCCV = $this->input->post('cardCCV');	//recibo el post y almaceno la pass ingresada en el input en la variable password
            // $cardName = $this->security->xss_clean($cardName);	//limpio campos
            // $cardNumber = $this->security->xss_clean($cardNumber);	//limpio campos
            // $cardExpDay = $this->security->xss_clean($cardExpDay);	//limpio campos
            // $cardCCV = $this->security->xss_clean($cardCCV);	//limpio campos
            // $this->load->model('BDLogin');	//se carga el modelo que hace consultas con la database hardstore
            echo "success";
        } else {
            date_default_timezone_set("America/Argentina/Buenos_Aires");
            $moment = date("Y");
            $errors = new stdClass(
                $this->NAME = false,
                $this->NUM = false,
                $this->EXP = false,
                $this->CCV = false,
            );
            $cardName = $this->input->post('cardName');
            $cardNumber = $this->input->post('cardNumber');
            $cardExpDay = $this->input->post('cardExpDay');
            $cardCCV = $this->input->post('cardCCV');
            if (ctype_alpha($cardName) == false) {
                $errors->NAME = "name cant contain numbers nor symbols";
                if ($cardName == null) {
                    $errors->NAME = "no NAME";
                }
            }
            if (strlen($cardNumber) != 16) {
                $errors->NUM = "incorrect NUM amount";
            }
            if (is_numeric($cardNumber) == false) {
                $errors->NUM = "num cant contain letters nor symbols";
                if ($cardNumber == null) {
                    $errors->NUM = "no NUM";
                }
            }
            if (substr($cardExpDay, 4) < $moment) {
                $errors->EXP = "incorrect NUM expiracy date";
                if ($cardExpDay == null) {
                    $errors->EXP = "no EXP";
                }
            }
            if (strlen($cardCCV) < 2 || strlen($cardCCV) > 4) {
                $errors->CCV = "incorrect CCV amount";
                if ($cardCCV == null) {
                    $errors->CCV = "no CCV";
                }
            }
            echo json_encode($errors);
        }
    }
}
