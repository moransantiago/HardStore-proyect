var products = document.querySelector(`#products`);
var total = document.querySelector(`#total`);
var buy = document.querySelector(`#buy`);
var buyForm = document.querySelector(`#buyForm`);
var name = document.querySelector(`#name`);
var number = document.querySelector(`#number`);
var expiracy = document.querySelector(`#expiracy`);
var cardCCV = document.querySelector(`#CCV`);

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
			.then(arrayData => {
				console.log(arrayData);
			})
	}

	// checkCorrectData(){
	// 	let errors = Array();
	// 	return (number.value.length === 16);
	// 	return (cardCCV.value.length === 3);
	// 	return (cardCCV.value.length === 3);
	// }
}

const myCheckout = new checkout();
