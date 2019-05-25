<?php
defined('BASEPATH') or exit('No direct script access allowed');

class administratorPanel extends CI_Controller
{ //cambiar nombre al controlador

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');	//helper para poder usar el comando base_url()
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
	}

	function index()
	{
		$this->load->view('panelDeAdministrador.php');
		$this->load->view('footerPanelDeAdministrador.php');	//este footer contiene el archivo js para el panel de admin
	}

	function getDefaultDataStock()
	{
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["fetch_data"] = $this->BDGetData->bringStock();
		foreach ($data["fetch_data"]->result() as $row) {
			echo "<tr>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->cantidad</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->marca " . "$row->modelo " . "$row->linea</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->tipo</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->garantiaEnMeses</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->calle " . "$row->numeroDeCalle</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->telefono</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">";
			if ($row->disponible == 1) {
				echo "YES";
			} else {
				echo "NO";
			}
			echo "</td>
					<td>
					<a onclick=" . '"toggleEditStockModal(event)"' . " id=$row->idUnitario class=" . '"button is-small is-fullwidth has-background-light"' . ">
					<span class=" . '"icon"' . " id=$row->idUnitario>
						<i class=" . '"fas fa-edit"' . " id=$row->idUnitario></i>
					</span>
				</a>
					</td>
				</tr>";
		}
	}

	function filterStock()
	{
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
		$keyword = $this->input->post("keyword");
		$keyword = $this->security->xss_clean($keyword);	//limpio campos
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["fetch_data"] = $this->BDGetData->filterStock($keyword);
		foreach ($data["fetch_data"]->result() as $row) {
			echo "<tr>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->cantidad</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->marca " . "$row->modelo " . "$row->linea</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->tipo</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->garantiaEnMeses</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->calle " . "$row->numeroDeCalle</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->telefono</td>
					<td ";
			if ($row->disponible == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">";
			if ($row->disponible == 1) {
				echo "YES";
			} else {
				echo "NO";
			}
			echo "</td>
					<td>
						<a onclick=" . '"toggleEditStockModal(event)"' . " id=$row->idUnitario class=" . '"button is-small is-fullwidth has-background-light"' . ">
							<span class=" . '"icon"' . " id=$row->idUnitario>
								<i class=" . '"fas fa-edit"' . " id=$row->idUnitario></i>
							</span>
						</a>
					</td>
				</tr>";
		}
	}

	function modify()
	{
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
		$id = $this->input->post('id');
		$amount = $this->input->post('amount');
		$id = $this->security->xss_clean($id);	//limpio campos
		$amount = $this->security->xss_clean($amount);	//limpio campos
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$this->BDGetData->changeAmount($id, $amount);
	}

	function addProduct()
	{
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
		$cantidad = $this->input->post('amount');
		$modelo = $this->input->post('model');
		$marca = $this->input->post('brand');
		$linea = $this->input->post('line');
		$tipo = $this->input->post('type');
		$garantiaEnMeses = $this->input->post('guarantee');
		$calle = $this->input->post('street');
		$cantidad = $this->security->xss_clean($cantidad);	//limpio campos
		$garantiaEnMeses = $this->security->xss_clean($garantiaEnMeses);	//limpio campos
		$this->load->model('BDInsertData');	//se carga el modelo que hace consultas con la database hardstore
		$this->BDInsertData->insertProduct($cantidad, $modelo, $marca, $linea, $tipo, $garantiaEnMeses, $calle);
	}

	function getDefaultDataAccounts()
	{
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["fetch_data"] = $this->BDGetData->bringAccounts();
		foreach ($data["fetch_data"]->result() as $row) {
			echo "<tr>
					<th ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->condicion</th>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->nombreDeUsuario</td>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->nombre</td>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->apellido</td>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->email</td>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">$row->contraseña</td>
					<td ";
			if ($row->activo == 0) {
				echo "class=" . '"transparentStrong"';
			}
			echo ">";
			if ($row->activo == 1) {
				echo "YES";
			} else {
				echo "NO";
			}
			echo "</td>
					<td>
						<div class=" . '"field is-grouped is-grouped-left"' . ">
							<p class=" . '"control"' . ">
								<a onclick=" . '"toggleEditAccountsModal(event)"' . " id=$row->idCuenta class=" . '"button is-small is-fullwidth has-background-light"' . ">
									<span class=" . 'icon' . " id=$row->idCuenta>
										<i class=" . '"fas fa-user-edit"' . " id=$row->idCuenta></i>
									</span>
								</a>
							</p>
							<p class=" . '"control"' . ">
								<a style=" . '"border-radius: 40px"' . " onclick=" . '"blockAccount(event)"' . " id=$row->idCuenta class=" . '"button is-small is-success"' . ">
									<span class=" . 'icon' . " id=$row->idCuenta>
										<i class=" . '"fas fa-ban"' . " id=$row->idCuenta></i>
									</span>
								</a>
							</p>
						</div>
					</td>
				</tr>";
		}
	}

	function getAccountForEdit()
	{
		$campos = array();
		$id = $this->input->post('id');
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["fetch_data"] = $this->BDGetData->bringAccountsForEdit($id);
		foreach ($data["fetch_data"]->result() as $row) {
			$campos[] = $row->nombre;
			$campos[] = $row->apellido;
			$campos[] = $row->nombreDeUsuario;
			$campos[] = $row->email;
		}
		echo json_encode($campos);
	}

	function editAccount()
	{
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
		$nombre = $this->input->post('newName');
		$apellido = $this->input->post('newLastName');
		$username = $this->input->post('newUsername');
		$password = $this->input->post('newPassword');
		$email = $this->input->post('newEmail');
		$rol = $this->input->post('rol');
		switch ($rol) {
			case 'ADMIN':
				$rol = 2;
				break;
			case 'USER':
				$rol = 1;
				break;
		}
		$id = $this->input->post('id');
		$nombre = $this->security->xss_clean($nombre);	//limpio campos
		$apellido = $this->security->xss_clean($apellido);	//limpio campos
		$username = $this->security->xss_clean($username);	//limpio campos
		$password = $this->security->xss_clean($password);	//limpio campos
		$email = $this->security->xss_clean($email);	//limpio campos
		$rol = $this->security->xss_clean($rol);	//limpio campos
		$id = $this->security->xss_clean($id);	//limpio campos
		$this->load->model('BDInsertData');	//se carga el modelo que hace consultas con la database hardstore
		$this->BDInsertData->updateAccount($nombre, $apellido, $username, $password, $email, $rol, $id);
	}

	// funciones para agregar accounts

	function addAccount()
	{
		$this->load->helper('security');	//helper para poder usar el comando xss_clean()
		$nombre = $this->input->post('name');
		$apellido = $this->input->post('LastName');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$rol = $this->input->post('rol');
		switch ($rol) {
			case 'ADMIN':
				$rol = 2;
				break;
			case 'USER':
				$rol = 1;
				break;
		}
		$nombre = $this->security->xss_clean($nombre);	//limpio campos
		$apellido = $this->security->xss_clean($apellido);	//limpio campos
		$username = $this->security->xss_clean($username);	//limpio campos
		$password = $this->security->xss_clean($password);	//limpio campos
		$email = $this->security->xss_clean($email);	//limpio campos
		$rol = $this->security->xss_clean($rol);	//limpio campos
		$this->load->model('BDInsertData');	//se carga el modelo que hace consultas con la database hardstore
		$this->BDInsertData->insertAccount($nombre, $apellido, $username, $password, $email, $rol);
	}

	function checkUsersAdd()
	{
		$username = $this->input->post('newUsername');
		$email = $this->input->post('newEmail');
		$username = $this->security->xss_clean($username);	//limpio campos
		$email = $this->security->xss_clean($email);	//limpio campos
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["username_data"] = $this->BDGetData->checkUsernameAddAccount($username);
		$data["email_data"] = $this->BDGetData->checkEmailAddAccount($email);
		if ($data["username_data"]->num_rows() < 1) {
			if ($data["email_data"]->num_rows() < 1) {
				echo "no user no email";
			} else {
				echo "no user yes email";
			}
		} else {
			if ($data["email_data"]->num_rows() < 1) {
				echo "yes user no email";
			} else {
				echo "yes user yes email";
			}
		}
	}

	function checkUsersEdit()
	{
		$username = $this->input->post('newUsername');
		$email = $this->input->post('newEmail');
		$id = $this->input->post('id');
		$username = $this->security->xss_clean($username);	//limpio campos
		$email = $this->security->xss_clean($email);	//limpio campos
		$id = $this->security->xss_clean($id);	//limpio campos
		$this->load->model('BDGetData');	//se carga el modelo que hace consultas con la database hardstore
		$data["username_data"] = $this->BDGetData->checkUsernameEditAccount($username, $id);
		$data["email_data"] = $this->BDGetData->checkEmailEditAccount($email, $id);
		if ($data["username_data"]->num_rows() < 1) {
			if ($data["email_data"]->num_rows() < 1) {
				echo "no user no email";
			} else {
				echo "no user yes email";
			}
		} else {
			if ($data["email_data"]->num_rows() < 1) {
				echo "yes user no email";
			} else {
				echo "yes user yes email";
			}
		}
	}

	// funcion para desactivar una cuenta

	function blockAccount()
	{
		$id = $this->input->post('id');
		$id = $this->security->xss_clean($id);	//limpio campos
		$this->load->model('BDInsertData');	//se carga el modelo que hace consultas con la database hardstore
		$this->BDInsertData->blockAccount($id);
	}
}
