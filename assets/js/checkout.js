var products = document.querySelector(`#products`);
var total = document.querySelector(`#total`);
var buy = document.querySelector(`#buy`);
var buyForm = document.querySelector(`#buyForm`);

var fullName = document.querySelector(`#name`);
var number = document.querySelector(`#number`);
var expiracy = document.querySelector(`#expiracy`);
var cardCCV = document.querySelector(`#CCV`);

var cardNameError = document.querySelector(`#cardNameError`);
var cardNumError = document.querySelector(`#cardNumError`);
var cardExpError = document.querySelector(`#cardExpError`);
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
                                <td class="has-text-right">$${arrayData[index].amount}</td>
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
				myCheckout.notifyErrors(errors);
			})
	}

	notifyErrors(errors) {
		for (let key in errors) {
			switch (key.hasOwnProperty()) {
				case "name cant contain numbers nor symbols":
					this.blankInputNotify(cardNameError);
					this.setDanger(fullName);
					break;
				case "no NAME":
					this.blankInputNotify(cardNameError);
					this.setDanger(fullName);
					break;
				case "incorrect NUM amount":
					this.blankInputNotify(cardNumError);
					this.setDanger(number);
					break;
				case "num cant contain letters nor symbols":
					this.blankInputNotify(cardNumError);
					this.setDanger(number);
					break;
				case "no NUM":
					this.blankInputNotify(cardNumError);
					this.setDanger(number);
					break;
				case "incorrect NUM expiracy date":
					this.blankInputNotify(cardExpError);
					this.setDanger(expiracy);
					break;
				case "no EXP":
					this.blankInputNotify(cardExpError);
					this.setDanger(expiracy);
					break;
				case "incorrect CCV amount":
					this.blankInputNotify(cardCCVError);
					this.setDanger(cardCCV);
					break;
				case "no CCV":
					this.blankInputNotify(cardCCVError);
					this.setDanger(cardCCV);
					break;
				default:
					this.substractDanger(number);
					this.removeErrorNotify(cardCCVError);
					break;
			}
		}
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
		notification.innerHTML = `This field can not be in blank`;
	}

	removeErrorNotify(notification) {
		notification.classList.remove(`animated`, `fadeIn`, `faster`);
		notification.classList.add(`animated`, `fadeOut`, `faster`);
		notification.classList.add(`hide`);
		notification.innerHTML = `default`;
	}
}

const myCheckout = new checkout();
