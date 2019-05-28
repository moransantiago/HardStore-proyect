var products = document.querySelector(`#products`);
var total = document.querySelector(`#total`);
var buy = document.querySelector(`#buy`);
var buyForm = document.querySelector(`#buyForm`);

var fullName = document.querySelector(`#name`);
var number = document.querySelector(`#number`);
var expiracy = document.querySelector(`#expiracy`);
var cardCCV = document.querySelector(`#CCV`);

var cardFullNameError = document.querySelector(`#cardNameError`);
var cardNumberError = document.querySelector(`#cardNumError`);
var cardExpiracyError = document.querySelector(`#cardExpError`);
var cardCCVError = document.querySelector(`#cardCCVError`);

class checkout {
	constructor() {
		this.initialize();
	}

	initialize() {
		this.setEvents();
		this.fillCart();
	}

	setEvents() {
		window.addEventListener(`load`, this.scrollTop);
		buy.addEventListener(`click`, this.submitData);
	}

	fillCart() {
		let totalProducts = 0;
		let totalPrice = 0;
		fetch(`http://localhost/HardStore/index.php/Cart/fillCart`, {})
			.then(response => response.json())
			.then(arrayData => {
				if (arrayData.length > 0) {
					for (let index = 0; index < arrayData.length; index++) {
						totalPrice += arrayData[index].amount * arrayData[index].cantidad;
						products.innerHTML +=
							`<tr>
                                <th class="has-text-weight-semibold">${arrayData[index].nombre} x${arrayData[index].cantidad}</th>
                                <td class="has-text-right">$${arrayData[index].amount*arrayData[index].cantidad}</td>
                            </tr>`;
						totalProducts += parseInt(arrayData[index].cantidad);
					}
				}
				total.innerHTML = `${totalProducts} products $ ${totalPrice}`;
			})

	}

	submitData() {
		let formData = new FormData(buyForm);
		fetch(`http://localhost/HardStore/index.php/Checkout/buy`, {
				method: 'POST',
				body: formData
			})
			.then(response => response.json())
			.then(errors => {
				const input = [
					fullName,
					number,
					expiracy,
					cardCCV
				];
				const messages = [
					cardFullNameError,
					cardNumberError,
					cardExpiracyError,
					cardCCVError
				];
				const keyValue = Object.values(errors);
				myCheckout.notifyErrors(input, messages, keyValue);
			})
	}

	notifyErrors(input, messages, keyValue) {
		let indexOfErrors = 0;
		keyValue.forEach(index => {
			switch (index) {
				case "cant contain numbers nor symbols":
					messages[indexOfErrors].innerHTML = `This field can not contain numbers nor symbols`;
					this.blankInputNotify(messages[indexOfErrors]);
					this.setDanger(input[indexOfErrors]);
					break;
				case "no":
					messages[indexOfErrors].innerHTML = `This field can not be in blank`;
					this.blankInputNotify(messages[indexOfErrors]);
					this.setDanger(input[indexOfErrors]);
					break;
				case "incorrect amount":
					messages[indexOfErrors].innerHTML = `Please enter a valid value`;
					this.blankInputNotify(messages[indexOfErrors]);
					this.setDanger(input[indexOfErrors]);
					break;
				case "incorrect expiracy date":
					messages[indexOfErrors].innerHTML = `This credit card has already expired`;
					this.blankInputNotify(messages[indexOfErrors]);
					this.setDanger(input[indexOfErrors]);
					break;
				case "cant contain letters nor symbols":
					messages[indexOfErrors].innerHTML = `This field can not contain letters nor symbols`;
					this.blankInputNotify(messages[indexOfErrors]);
					this.setDanger(input[indexOfErrors]);
					break;
				default:
					this.removeErrorNotify(messages[indexOfErrors]);
					this.substractDanger(input[indexOfErrors]);
					break;
			}
			indexOfErrors++;
		});
		indexOfErrors = 0;
	}

	setDanger(input) {
		input.classList.add("is-danger");
	}

	substractDanger(input) {
		input.classList.remove("is-danger");
	}

	blankInputNotify(notification) {
		notification.classList.remove(`animated`, `fadeOut`, `faster`);
		notification.classList.remove(`hide`);
		notification.classList.add(`animated`, `fadeIn`, `faster`);
	}

	removeErrorNotify(notification) {
		notification.classList.remove(`animated`, `fadeIn`, `faster`);
		notification.classList.add(`animated`, `fadeOut`, `faster`);
	}
}

const myCheckout = new checkout();
