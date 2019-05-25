var idToModifyStock; //el id a modificar cierta cantidad en stock
var idToModifyAccounts; //el id a modificar cierta cantidad en accounts
var idToBlockAccount; //el id a bloquear un user
var amountToModifyStock = document.querySelector('#amountToModifyStock');; //la cantidad a modificar
var modifyAmountBtn = document.querySelector('#modifyAmountBtn'); //boton para guardar cambios

var containerTableStock = document.querySelector('#containerTableStock');
var containerTableAccounts = document.querySelector('#containerTableAccounts');
var bodyTableStock = document.querySelector('#bodyTableStock');
var bodyTableAccounts = document.querySelector('#bodyTableAccounts');

var formAddProduct = document.querySelector('#formAddProduct');
var searchBarStock = document.querySelector('#searchBarStock');
var formAddAccount = document.querySelector('#formAddAccount');
var formEditAccount = document.querySelector('#formEditAccount');

//validacion frontend
var inputGuarantee = document.querySelector('#inputGuarantee');
var guaranteeError = document.querySelector('#guaranteeError');
var guaranteeErrorContainer = document.querySelector('#guaranteeErrorContainer');
var inputAmount = document.querySelector('#inputAmount');
var amountError = document.querySelector('#amountError');
var amountErrorContainer = document.querySelector('#amountErrorContainer');

var inputName = document.querySelector('#inputName');
var inputLastName = document.querySelector('#inputLastName');
var inputUsername = document.querySelector('#inputUsername');
var inputPassword = document.querySelector('#inputPassword');
var inputEmail = document.querySelector('#inputEmail');
var nameError = document.querySelector('#nameError');
var nameErrorContainer = document.querySelector('#nameErrorContainer');
var lastNameError = document.querySelector('#lastNameError');
var lastNameErrorContainer = document.querySelector('#lastNameErrorContainer');
var usernameError = document.querySelector('#usernameError');
var usernameErrorContainer = document.querySelector('#usernameErrorContainer');
var passwordError = document.querySelector('#passwordError');
var passwordErrorContainer = document.querySelector('#passwordErrorContainer');
var emailError = document.querySelector('#emailError');
var emailErrorContainer = document.querySelector('#emailErrorContainer');

var inputNameAdd = document.querySelector('#inputNameAdd');
var inputLastNameAdd = document.querySelector('#inputLastNameAdd');
var inputUsernameAdd = document.querySelector('#inputUsernameAdd');
var inputPasswordAdd = document.querySelector('#inputPasswordAdd');
var inputConfirmPasswordAdd = document.querySelector('#inputConfirmPasswordAdd');
var inputEmailAdd = document.querySelector('#inputEmailAdd');
var nameErrorAdd = document.querySelector('#nameErrorAdd');
var nameErrorContainerAdd = document.querySelector('#nameErrorContainerAdd');
var lastNameErrorAdd = document.querySelector('#lastNameErrorAdd');
var lastNameErrorContainerAdd = document.querySelector('#lastNameErrorContainerAdd');
var usernameErrorAdd = document.querySelector('#usernameErrorAdd');
var usernameErrorContainerAdd = document.querySelector('#usernameErrorContainerAdd');
var passwordErrorAdd = document.querySelector('#passwordErrorAdd');
var passwordErrorContainerAdd = document.querySelector('#passwordErrorContainerAdd');
var confirmPasswordErrorAdd = document.querySelector('#confirmPasswordErrorAdd');
var confirmPasswordErrorContainerAdd = document.querySelector('#confirmPasswordErrorContainerAdd');
var emailErrorAdd = document.querySelector('#emailErrorAdd');
var emailErrorContainerAdd = document.querySelector('#emailErrorContainerAdd');

//cosas que se enviaran en el form
var rolSelectionEdit = document.querySelector('#rolSelectionEdit');
var rolSelectionAdd = document.querySelector('#rolSelectionAdd');

var addStockModal = document.querySelector('#addStockModal');
var editStockModal = document.querySelector('#editStockModal');
var addAccountsModal = document.querySelector('#addAccountsModal');
var editAccountsModal = document.querySelector('#editAccountsModal');

var tabStock = document.querySelector('#tabStock');
var tabAccounts = document.querySelector('#tabAccounts');

tabStock.addEventListener('click', selectTabStock);
tabAccounts.addEventListener('click', selectTabAccounts);

function selectTabStock() {
	tabStock.classList.add("is-active");
	tabStock.classList.remove("transparente");
	tabAccounts.classList.remove("is-active");
	tabAccounts.classList.add("transparente");
	containerTableAccounts.classList.add("animated", "zoomOut", "faster");
	containerTableStock.classList.remove("hide");
	containerTableStock.classList.remove("animated", "zoomOut", "faster");
	containerTableStock.classList.add("animated", "zoomIn", "faster");
	containerTableAccounts.classList.add("hide");
}

function selectTabAccounts() {
	tabAccounts.classList.add("is-active");
	tabAccounts.classList.remove("transparente");
	tabStock.classList.remove("is-active");
	tabStock.classList.add("transparente");
	containerTableStock.classList.add("animated", "zoomOut", "faster");
	containerTableAccounts.classList.remove("hide");
	containerTableAccounts.classList.remove("animated", "zoomOut", "faster");
	containerTableAccounts.classList.add("animated", "zoomIn", "faster");
	containerTableStock.classList.add("hide");
}

function toggleAddStockModal() {
	addStockModal.classList.toggle("is-active");
	if (addStockModal.classList.contains("is-active")) {
		amountError.innerHTML = '';
		guaranteeError.innerHTML = '';
		inputAmount.classList.remove("is-danger");
		inputGuarantee.classList.remove("is-danger");
		amountErrorContainer.classList.remove("animated", "fadeIn", "faster");
		guaranteeErrorContainer.classList.remove("animated", "fadeIn", "faster");
	}
}

function toggleEditStockModal(event) {
	if (event.target.id) {
		idToModifyStock = event.target.id;
	}
	editStockModal.classList.toggle("is-active");
}

function toggleAddAccountsModal() {
	addAccountsModal.classList.toggle("is-active");
}

function toggleEditAccountsModal(event) {
	if (event.target.id) {
		idToModifyAccounts = event.target.id;
	}
	if (editAccountsModal.classList.contains("is-active")) {
		nameError.innerHTML = '';
		lastNameError.innerHTML = '';
		usernameError.innerHTML = '';
		emailError.innerHTML = '';
		passwordError.innerHTML = '';
		inputName.classList.remove("is-danger");
		inputLastName.classList.remove("is-danger");
		inputUsername.classList.remove("is-danger");
		inputEmail.classList.remove("is-danger");
		inputPassword.classList.remove("is-danger");
		inputPassword.value = '';
		nameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		lastNameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		usernameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		passwordErrorContainer.classList.remove("animated", "fadeIn", "faster");
		emailErrorContainer.classList.remove("animated", "fadeIn", "faster");
	}
	var formData = new FormData();
	formData.append('id', idToModifyAccounts);
	fetch('http://localhost/HardStore/index.php/administratorPanel/getAccountForEdit', {
			method: 'POST',
			body: formData
		}).then(response => response.json())
		.then(arrayData => {
			inputName.value = arrayData[0];
			inputLastName.value = arrayData[1];
			inputUsername.value = arrayData[2];
			inputEmail.value = arrayData[3];
		})
	setTimeout(() => {
		editAccountsModal.classList.toggle("is-active");
	}, 50)
}

function cargarStockDefault() {
	window.scrollTo(0, 0);
	fetch('http://localhost/HardStore/index.php/administratorPanel/getDefaultDataStock', {}).then(response => response.text())
		.then(text => {
			bodyTableStock.innerHTML = text;
		})
}

formAddProduct.addEventListener("submit", function (event) {
	event.preventDefault();
	inputAmount.value = inputAmount.value.trim();
	inputGuarantee.value = inputGuarantee.value.trim();
	if (inputAmount.value === '' || inputGuarantee.value === '' || inputAmount.value > 200 || inputAmount.value < 0) {
		if (inputAmount.value === '') {
			inputAmount.classList.add("is-danger");
			amountErrorContainer.classList.add("animated", "fadeIn", "faster");
			amountError.innerHTML = 'You must specify the amount';
		} else if (inputAmount.value > 200) {
			inputAmount.classList.add("is-danger");
			amountErrorContainer.classList.add("animated", "fadeIn", "faster");
			amountError.innerHTML = '200 is the top of products';
		} else if (inputAmount.value < 0) {
			inputAmount.classList.add("is-danger");
			amountErrorContainer.classList.add("animated", "fadeIn", "faster");
			amountError.innerHTML = '0 is the minimum amount';
		} else {
			amountError.innerHTML = '';
			inputAmount.classList.remove("is-danger");
			amountErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputGuarantee.value === '') {
			inputGuarantee.classList.add("is-danger");
			guaranteeErrorContainer.classList.add("animated", "fadeIn", "faster");
			guaranteeError.innerHTML = 'You must specify the guarantee';
		} else {
			guaranteeError.innerHTML = '';
			inputGuarantee.classList.remove("is-danger");
			guaranteeErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
	} else {
		var formData = new FormData(this);
		fetch('http://localhost/HardStore/index.php/administratorPanel/addProduct/', { //api añade producto
			method: 'POST',
			body: formData
		}).then(() => {
			cargarStockDefault();
			toggleAddStockModal();
		})
	}
});

searchBarStock.addEventListener("keypress", function () {
	var formData = new FormData();
	setTimeout(function () {
		formData.append('keyword', searchBarStock.value);
		if (!searchBarStock.value) {
			cargarStockDefault();
		} else {
			fetch('http://localhost/HardStore/index.php/administratorPanel/filterStock/', { //api devuelve filtrando por palabra
					method: 'POST',
					body: formData
				}).then(response => response.text())
				.then(text => {
					bodyTableStock.innerHTML = text;
				})
		}
	}, 50)
});

modifyAmountBtn.addEventListener("click", function () {
	var formData = new FormData();
	formData.append('id', idToModifyStock);
	formData.append('amount', amountToModifyStock.value);
	fetch('http://localhost/HardStore/index.php/administratorPanel/modify/', {
		method: 'POST',
		body: formData
	}).then(() => {
		cargarStockDefault();
	})
});

function cargarAccountsDefault() {
	window.scrollTo(0, 0);
	fetch('http://localhost/HardStore/index.php/administratorPanel/getDefaultDataAccounts', {}).then(response => response.text())
		.then(text => {
			bodyTableAccounts.innerHTML = text;
		})
}

formAddAccount.addEventListener("submit", function (event) {
	event.preventDefault();
	inputNameAdd.value = inputNameAdd.value.trim();
	inputLastNameAdd.value = inputLastNameAdd.value.trim();
	inputUsernameAdd.value = inputUsernameAdd.value.trim();
	inputEmailAdd.value = inputEmailAdd.value.trim();
	inputPasswordAdd.value = inputPasswordAdd.value.trim();
	inputConfirmPasswordAdd.value = inputConfirmPasswordAdd.value.trim();
	if ((inputNameAdd.value === '' || inputLastNameAdd.value === '' || inputUsernameAdd.value === '' || inputPasswordAdd.value === '' || inputConfirmPasswordAdd.value === '' || inputEmailAdd.value === '') || inputPasswordAdd.value != inputConfirmPasswordAdd.value) {
		if (inputNameAdd.value === '') {
			inputNameAdd.classList.add("is-danger");
			nameErrorContainerAdd.classList.remove("hide");
			nameErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			nameErrorAdd.innerHTML = 'You must specify the name';
		} else {
			nameErrorAdd.innerHTML = 'p';
			inputNameAdd.classList.remove("is-danger");
			nameErrorContainerAdd.classList.add("hide");
			nameErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputLastNameAdd.value === '') {
			inputLastNameAdd.classList.add("is-danger");
			lastNameErrorContainerAdd.classList.remove("hide");
			lastNameErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			lastNameErrorAdd.innerHTML = 'You must specify the last name';
		} else {
			lastNameErrorAdd.innerHTML = 'p';
			inputLastNameAdd.classList.remove("is-danger");
			lastNameErrorContainerAdd.classList.add("hide");
			lastNameErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputUsernameAdd.value === '') {
			inputUsernameAdd.classList.add("is-danger");
			usernameErrorContainerAdd.classList.remove("hide");
			usernameErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			usernameErrorAdd.innerHTML = 'You must specify the username';
		} else {
			usernameErrorAdd.innerHTML = 'p';
			inputUsernameAdd.classList.remove("is-danger");
			usernameErrorContainerAdd.classList.add("hide");
			usernameErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputPasswordAdd.value === '') {
			inputPasswordAdd.classList.add("is-danger");
			passwordErrorContainerAdd.classList.remove("hide");
			passwordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			passwordErrorAdd.innerHTML = 'You must specify the password';
		} else {
			passwordErrorAdd.innerHTML = 'p';
			inputPasswordAdd.classList.remove("is-danger");
			passwordErrorContainerAdd.classList.add("hide");
			passwordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
			if (inputPasswordAdd.value !== inputConfirmPasswordAdd) {
				inputPasswordAdd.classList.add("is-danger");
				passwordErrorContainerAdd.classList.remove("hide");
				passwordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
				passwordErrorAdd.innerHTML = 'The passwords doesn´t match';
				inputConfirmPasswordAdd.classList.add("is-danger");
				confirmPasswordErrorContainerAdd.classList.remove("hide");
				confirmPasswordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
				confirmPasswordErrorAdd.innerHTML = 'The passwords doesn´t match';
			} else {
				inputPasswordAdd.classList.remove("is-danger");
				passwordErrorContainerAdd.classList.add("hide");
				passwordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
				passwordErrorAdd.innerHTML = 'p';
				inputConfirmPasswordAdd.classList.remove("is-danger");
				confirmPasswordErrorContainerAdd.classList.add("hide");
				confirmPasswordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
				confirmPasswordErrorAdd.innerHTML = 'p';
			}
		}
		if (inputConfirmPasswordAdd.value === '') {
			inputConfirmPasswordAdd.classList.add("is-danger");
			confirmPasswordErrorContainerAdd.classList.remove("hide");
			confirmPasswordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			confirmPasswordErrorAdd.innerHTML = 'You must specify the password';
		} else {
			confirmPasswordErrorAdd.innerHTML = 'p';
			inputConfirmPasswordAdd.classList.remove("is-danger");
			confirmPasswordErrorContainerAdd.classList.add("hide");
			confirmPasswordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
			if (inputPasswordAdd.value !== inputConfirmPasswordAdd) {
				inputPasswordAdd.classList.add("is-danger");
				passwordErrorContainerAdd.classList.remove("hide");
				passwordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
				passwordErrorAdd.innerHTML = 'The passwords doesn´t match';
				inputConfirmPasswordAdd.classList.add("is-danger");
				confirmPasswordErrorContainerAdd.classList.remove("hide");
				confirmPasswordErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
				confirmPasswordErrorAdd.innerHTML = 'The passwords doesn´t match';
			} else {
				inputPasswordAdd.classList.remove("is-danger");
				passwordErrorContainerAdd.classList.add("hide");
				passwordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
				passwordErrorAdd.innerHTML = 'p';
				inputConfirmPasswordAdd.classList.remove("is-danger");
				confirmPasswordErrorContainerAdd.classList.add("hide");
				confirmPasswordErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
				confirmPasswordErrorAdd.innerHTML = 'p';
			}
		}
		if (inputEmailAdd.value === '') {
			inputEmailAdd.classList.add("is-danger");
			emailErrorContainerAdd.classList.remove("hide");
			emailErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
			emailErrorAdd.innerHTML = 'You must specify the email';
		} else {
			emailErrorAdd.innerHTML = 'p';
			inputEmailAdd.classList.remove("is-danger");
			emailErrorContainerAdd.classList.add("hide");
			emailErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
		}
	} else {
		var formData = new FormData(formAddAccount);
		fetch('http://localhost/HardStore/index.php/administratorPanel/checkUsersAdd', {
				method: 'POST',
				body: formData
			}).then(response => response.text())
			.then(text => {
				if (text === "yes user yes email") {
					inputUsernameAdd.classList.add("is-danger");
					usernameErrorContainerAdd.classList.remove("hide");
					usernameErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
					usernameErrorAdd.innerHTML = 'This username is already taken!';
					inputEmailAdd.classList.add("is-danger");
					emailErrorContainerAdd.classList.remove("hide");
					emailErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
					emailErrorAdd.innerHTML = 'This email is already linked to an account';
				} else if (text === "no user yes email") {
					inputUsernameAdd.classList.remove("is-danger");
					usernameErrorContainerAdd.classList.add("hide");
					usernameErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
					usernameErrorAdd.innerHTML = 'p';
					inputEmailAdd.classList.add("is-danger");
					emailErrorContainerAdd.classList.remove("hide");
					emailErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
					emailErrorAdd.innerHTML = 'This email is already linked to an account';
				} else if (text === "yes user no email") {
					inputUsernameAdd.classList.add("is-danger");
					usernameErrorContainerAdd.classList.remove("hide");
					usernameErrorContainerAdd.classList.add("animated", "fadeIn", "faster");
					usernameErrorAdd.innerHTML = 'This username is already taken!';
					inputEmailAdd.classList.remove("is-danger");
					emailErrorContainerAdd.classList.add("hide");
					emailErrorContainerAdd.classList.remove("animated", "fadeIn", "faster");
					emailErrorAdd.innerHTML = 'p';
				} else {
					formData.append('rol', rolSelectionAdd.value);
					fetch('http://localhost/HardStore/index.php/administratorPanel/addAccount', {
						method: 'POST',
						body: formData
					}).then(() => {
						cargarAccountsDefault();
						toggleAddAccountsModal();
					})
				}
			})
	}
});

formEditAccount.addEventListener("submit", function (event) {
	event.preventDefault();
	inputName.value = inputName.value.trim();
	inputLastName.value = inputLastName.value.trim();
	inputUsername.value = inputUsername.value.trim();
	inputPassword.value = inputPassword.value.trim();
	inputEmail.value = inputEmail.value.trim();
	if (inputName.value === '' || inputLastName.value === '' || inputUsername.value === '' || inputPassword.value === '' || inputEmail.value === '') {
		if (inputName.value === '') {
			inputName.classList.add("is-danger");
			nameErrorContainer.classList.add("animated", "fadeIn", "faster");
			nameError.innerHTML = 'You must specify the name';
		} else {
			nameError.innerHTML = '';
			inputName.classList.remove("is-danger");
			nameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputLastName.value === '') {
			inputLastName.classList.add("is-danger");
			lastNameErrorContainer.classList.add("animated", "fadeIn", "faster");
			lastNameError.innerHTML = 'You must specify the last name';
		} else {
			lastNameError.innerHTML = '';
			inputLastName.classList.remove("is-danger");
			lastNameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputUsername.value === '') {
			inputUsername.classList.add("is-danger");
			usernameErrorContainer.classList.add("animated", "fadeIn", "faster");
			usernameError.innerHTML = 'You must specify the username';
		} else {
			usernameError.innerHTML = '';
			inputUsername.classList.remove("is-danger");
			usernameErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputPassword.value === '') {
			inputPassword.classList.add("is-danger");
			passwordErrorContainer.classList.add("animated", "fadeIn", "faster");
			passwordError.innerHTML = 'You must specify the password';
		} else {
			passwordError.innerHTML = '';
			inputPassword.classList.remove("is-danger");
			passwordErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
		if (inputEmail.value === '') {
			inputEmail.classList.add("is-danger");
			emailErrorContainer.classList.add("animated", "fadeIn", "faster");
			emailError.innerHTML = 'You must specify the email';
		} else {
			emailError.innerHTML = '';
			inputEmail.classList.remove("is-danger");
			emailErrorContainer.classList.remove("animated", "fadeIn", "faster");
		}
	} else {
		var formData = new FormData(formEditAccount);
		formData.append('id', idToModifyAccounts);
		fetch('http://localhost/HardStore/index.php/administratorPanel/checkUsersEdit', {
				method: 'POST',
				body: formData
			}).then(response => response.text())
			.then(text => {
				if (text === "yes user yes email") {
					inputUsername.classList.add("is-danger");
					usernameErrorContainer.classList.remove("hide");
					usernameErrorContainer.classList.add("animated", "fadeIn", "faster");
					usernameError.innerHTML = 'This username is already taken!';
					inputEmail.classList.add("is-danger");
					emailErrorContainer.classList.remove("hide");
					emailErrorContainer.classList.add("animated", "fadeIn", "faster");
					emailError.innerHTML = 'This email is already linked to an account';
				} else if (text === "no user yes email") {
					inputUsername.classList.remove("is-danger");
					usernameErrorContainer.classList.add("hide");
					usernameErrorContainer.classList.remove("animated", "fadeIn", "faster");
					usernameError.innerHTML = '';
					inputEmail.classList.add("is-danger");
					emailErrorContainer.classList.remove("hide");
					emailErrorContainer.classList.add("animated", "fadeIn", "faster");
					emailError.innerHTML = 'This email is already linked to an account';
				} else if (text === "yes user no email") {
					inputEmail.classList.remove("is-danger");
					emailErrorContainer.classList.add("hide");
					emailErrorContainer.classList.remove("animated", "fadeIn", "faster");
					emailError.innerHTML = '';
					inputUsername.classList.add("is-danger");
					usernameErrorContainer.classList.remove("hide");
					usernameErrorContainer.classList.add("animated", "fadeIn", "faster");
					usernameError.innerHTML = 'This username is already taken!';
				} else {
					var formData = new FormData(formEditAccount);
					formData.append('id', idToModifyAccounts);
					fetch('http://localhost/HardStore/index.php/administratorPanel/editAccount', {
						method: 'POST',
						body: formData
					}).then(() => {
						cargarAccountsDefault();
						nameError.innerHTML = '';
						lastNameError.innerHTML = '';
						usernameError.innerHTML = '';
						emailError.innerHTML = '';
						passwordError.innerHTML = '';
						inputName.classList.remove("is-danger");
						inputLastName.classList.remove("is-danger");
						inputUsername.classList.remove("is-danger");
						inputEmail.classList.remove("is-danger");
						inputPassword.classList.remove("is-danger");
						inputPassword.value = '';
						nameErrorContainer.classList.remove("animated", "fadeIn", "faster");
						lastNameErrorContainer.classList.remove("animated", "fadeIn", "faster");
						usernameErrorContainer.classList.remove("animated", "fadeIn", "faster");
						passwordErrorContainer.classList.remove("animated", "fadeIn", "faster");
						emailErrorContainer.classList.remove("animated", "fadeIn", "faster");
						editAccountsModal.classList.toggle("is-active");
						inputName.value = '';
						inputLastName.value = '';
						inputUsername.value = '';
						inputEmail.value = '';
					})
				}
			})
	}
});

function blockAccount(event) {
	idToBlockAccount = event.target.id;
	var formData = new FormData();
	formData.append('id', idToBlockAccount);
	fetch('http://localhost/HardStore/index.php/administratorPanel/blockAccount', {
		method: 'POST',
		body: formData
	}).then(() => {
		cargarAccountsDefault();
	})
}

window.addEventListener('load', function () {
	cargarStockDefault();
	cargarAccountsDefault();
});
