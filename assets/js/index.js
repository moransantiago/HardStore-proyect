// stuff about login form
var loginBTN = document.querySelector(`#login`);
var cancelBTN = document.querySelector(`#cancel`);
var loginSC = document.querySelector(`#loginSCREEN`);
var blurHeroFondoPrincipal = document.querySelector(`#heroFondoPrincipal`);
var blurHeroNovedades = document.querySelector(`#heroNovedades`);
var blurHeroMarketing = document.querySelector(`#heroMarketing`);
var blurTabs = document.querySelector("#productos");
var blurNavbar = document.querySelector(`#navbar`);
var sliderBTN1 = document.querySelector(`#sliderBTN1`);
var sliderBTN2 = document.querySelector(`#sliderBTN2`);
var htmlUnscrollable = document.querySelector(`#html`);
var navbarCuentaLogueada = document.querySelector(`#logueado`);
var loguearBTNES = document.querySelector(`#sinLoguear`);
var modalBackground = document.querySelector(`#modalBackground`);

//stuff about most wanted hero
var mostWantedTitle = document.querySelector(`#mostWantedTitle`);
var titles = Array(
	title1 = document.querySelector(`#title1`),
	title2 = document.querySelector(`#title2`),
	title3 = document.querySelector(`#title3`),
	title4 = document.querySelector(`#title4`),
	title5 = document.querySelector(`#title5`)
);
var addToCart = Array(
	addToCart1 = document.querySelector(`#addToCart1`),
	addToCart2 = document.querySelector(`#addToCart2`),
	addToCart3 = document.querySelector(`#addToCart3`),
	addToCart4 = document.querySelector(`#addToCart4`),
	addToCart5 = document.querySelector(`#addToCart5`)
);

//stuff about user menu
var menuUsuario = document.querySelector(`#menuUsuario`);
var showUserMenuBTN = document.querySelector(`#showUserMenuBTN`);
var hideUserMenuBTN = document.querySelector(`#hideUserMenuBTN`);

//stuff about cards
var cards = Array(
	card1 = document.querySelector(`#card1`),
	card2 = document.querySelector(`#card2`),
	card3 = document.querySelector(`#card3`),
	card4 = document.querySelector(`#card4`),
	card5 = document.querySelector(`#card5`)
);

//stuff about cart
var cartDropdown = document.querySelector(`#cartDropdown`);
var amountProducts = document.querySelector(`#amountProducts`);

//stuff about form login
var loginForm = document.getElementById(`loginForm`);
var inputNombre = document.querySelector(`#nombreInput`);
var inputPasswd = document.querySelector(`#passwordInput`);
var errorNombreContenedor = document.querySelector(`#errorNombreContenedor`);
var errorNombre = document.querySelector(`#errorNombre`);
var errorPasswordContenedor = document.querySelector(`#errorPasswordContenedor`);
var errorPassword = document.querySelector(`#errorContraseña`);
var errorNombreOContraseña = document.querySelector(`#errorNombreOContraseña`);
var errorNombreOContraseñaContenedor = document.querySelector(`#errorNombreOContraseñaContenedor`);
var errorRepetidoNombre = false;
var errorRepetidoPassword = false;
var errorRepetidoNombreOPassword = false;
var repetirMovimiento = false;
var sesionIniciada = false;

//stuff about burger
var burger = document.querySelector(".burger");
var navbar = document.querySelector("#" + burger.dataset.target);

//class
class myIndex {
	constructor() {
		this.initialize();
	}

	initialize() {
		this.setEvents();
		this.fillCart();
		this.fillMostWanted();
	}

	setEvents() {
		burger.addEventListener(`click`, this.toggleBurger);
		if (loginBTN) loginBTN.addEventListener(`click`, this.showLoginModal);
		if (cancelBTN) cancelBTN.addEventListener(`click`, this.hideLoginModal);
		window.addEventListener(`load`, this.scrollTop);
		loginForm.addEventListener(`submit`, this.submitLogin);
		if (showUserMenuBTN) showUserMenuBTN.addEventListener(`click`, this.showUserMenu);
		if (hideUserMenuBTN) hideUserMenuBTN.addEventListener(`click`, this.hideUserMenu);
		if (modalBackground) modalBackground.addEventListener(`click`, this.hideLoginModal);
		cards.forEach(card => {
			card.addEventListener(`mouseover`, this.cardShadow)
			card.addEventListener(`mouseout`, this.cardRemoveShadow)
		});
		addToCart.forEach(button => {
			button.addEventListener(`click`, this.addProductToCart);
		});
	}

	toggleBurger() {
		burger.classList.toggle("is-active");
		navbar.classList.toggle("is-active");
	}

	showLoginModal() {
		loginSC.classList.add("is-active");
		loginSC.classList.remove("hide");
		loginSC.classList.remove("animated", "slideOutRight", "faster");
		blurHeroFondoPrincipal.classList.remove("takeBlur");
		blurHeroNovedades.classList.remove("takeBlur");
		blurHeroMarketing.classList.remove("takeBlur");
		blurTabs.classList.remove("takeBlur");
		blurNavbar.classList.remove("takeBlur");
		loginSC.classList.add("show");
		loginSC.classList.add("animated", "slideInRight", "faster");
		blurHeroFondoPrincipal.classList.add("giveBlur");
		blurHeroNovedades.classList.add("giveBlur");
		blurHeroMarketing.classList.add("giveBlur");
		blurTabs.classList.add("giveBlur");
		blurNavbar.classList.add("giveBlur");
		mostWantedTitle.classList.remove(`takeBlur`);
		mostWantedTitle.classList.add(`giveBlur`);
		htmlUnscrollable.classList.add("unscrollable");
	}

	hideLoginModal() {
		blurHeroFondoPrincipal.classList.remove("giveBlur");
		blurHeroNovedades.classList.remove("giveBlur");
		blurHeroMarketing.classList.remove("giveBlur");
		blurTabs.classList.remove("giveBlur");
		blurNavbar.classList.remove("giveBlur");
		loginSC.classList.add("animated", "slideOutRight", "faster");
		blurHeroFondoPrincipal.classList.add("takeBlur");
		blurHeroNovedades.classList.add("takeBlur");
		blurHeroMarketing.classList.add("takeBlur");
		mostWantedTitle.classList.remove(`giveBlur`);
		mostWantedTitle.classList.add(`takeBlur`);
		blurTabs.classList.add("takeBlur");
		blurNavbar.classList.add("takeBlur");
		inputNombre.classList.remove("is-danger");
		inputPasswd.classList.remove("is-danger");
		inputNombre.value = ``;
		inputPasswd.value = ``;
		errorNombreContenedor.classList.remove("show");
		errorPasswordContenedor.classList.remove("show");
		errorNombreOContraseñaContenedor.classList.remove("show");
		errorNombreContenedor.classList.add("hide");
		errorPasswordContenedor.classList.add("hide");
		errorNombreOContraseñaContenedor.classList.add("hide");
		errorNombreContenedor.classList.remove("animated", "fadeIn", "faster");
		errorNombreContenedor.classList.remove("animated", "flash", "faster");
		errorPasswordContenedor.classList.remove("animated", "fadeIn", "faster");
		errorPasswordContenedor.classList.remove("animated", "flash", "faster");
		errorNombreOContraseñaContenedor.classList.remove("animated", "fadeIn", "faster");
		errorNombreOContraseñaContenedor.classList.remove("animated", "flash", "faster");
		errorRepetidoNombre = false;
		errorRepetidoPassword = false;
		errorRepetidoNombreOPassword = false;
		htmlUnscrollable.classList.remove("unscrollable");
	}

	scrollTop() {
		window.scrollTo(0, 0);
	}

	submitLogin(event) {
		event.preventDefault();
		inputNombre.value = inputNombre.value.trim();
		inputPasswd.value = inputPasswd.value.trim();
		if (inputNombre.value === `` || inputPasswd.value === ``) {
			errorNombreOContraseñaContenedor.classList.add("animated", "fadeOut", "faster");
			errorNombreOContraseña.value = `p`;
			if (inputNombre.value === ``) {
				errorNombreContenedor.classList.remove("animated", "fadeOut", "faster");
				inputNombre.classList.add("is-danger");
				errorNombre.innerHTML = `The username field is required`;
				errorNombreContenedor.classList.remove("hide");
				errorNombreContenedor.classList.add("show");
				if (errorRepetidoNombre) {
					errorNombreContenedor.classList.remove("animated", "fadeIn", "faster");
					errorNombreContenedor.classList.add("animated", "flash", "faster");
					errorRepetidoNombre = false;
				} else {
					errorNombreContenedor.classList.remove("animated", "flash", "faster");
					errorNombreContenedor.classList.add("animated", "fadeIn", "faster");
					errorRepetidoNombre = true;
				}
			} else {
				inputNombre.classList.remove("is-danger");
				errorNombreContenedor.classList.add("animated", "fadeOut", "faster");
			}
			if (inputPasswd.value === ``) {
				errorPasswordContenedor.classList.remove("animated", "fadeOut", "faster");
				inputPasswd.classList.add("is-danger");
				errorPassword.innerHTML = `The password field is required`;
				errorPasswordContenedor.classList.remove("hide");
				errorPasswordContenedor.classList.add("show");
				if (errorRepetidoPassword) {
					errorPasswordContenedor.classList.remove("animated", "fadeIn", "faster");
					errorPasswordContenedor.classList.add("animated", "flash", "faster");
					errorRepetidoPassword = false;
				} else {
					errorPasswordContenedor.classList.remove("animated", "flash", "faster");
					errorPasswordContenedor.classList.add("animated", "fadeIn", "faster");
					errorRepetidoPassword = true;
				}
			} else {
				inputPasswd.classList.remove("is-danger");
				errorPasswordContenedor.classList.add("animated", "fadeOut", "faster");
			}
			errorRepetidoNombreOPassword = false;
		} else {
			event.preventDefault(); //para que no refresque la pag
			const formData = new FormData(this);
			fetch(`http://localhost/HardStore/index.php/Welcome/validarAcceso`, {
					method: `POST`,
					body: formData,
				})
				.then(response => response.text())
				.then(text => {
					if (text === "Usuario y/o contraseña incorrectos") {
						inputNombre.classList.remove("is-danger");
						inputPasswd.classList.remove("is-danger");
						errorNombreOContraseña.innerHTML = `Wrong username or password`;
						errorNombreOContraseñaContenedor.classList.remove("animated", "fadeOut", "faster");
						errorNombreOContraseñaContenedor.classList.remove("hide");
						errorNombreOContraseñaContenedor.classList.add("show");
						errorNombreContenedor.classList.add("animated", "fadeOut", "faster");
						errorPasswordContenedor.classList.add("animated", "fadeOut", "faster");
						if (errorRepetidoNombreOPassword) {
							errorNombreOContraseñaContenedor.classList.remove("animated", "fadeIn", "faster");
							errorNombreOContraseñaContenedor.classList.add("animated", "flash", "faster");
							errorRepetidoNombreOPassword = false;
						} else {
							errorNombreOContraseñaContenedor.classList.remove("animated", "flash", "faster");
							errorNombreOContraseñaContenedor.classList.add("animated", "fadeIn", "faster");
							errorRepetidoNombreOPassword = true;
						}
						errorRepetidoNombre = false;
						errorRepetidoPassword = false;
					} else {
						location.reload();
					}
				})
		}
	}

	showUserMenu() {
		menuUsuario.classList.remove("hide");
		menuUsuario.classList.remove("animated", "slideOutRight", "faster");
		menuUsuario.classList.add("animated", "slideInRight", "faster");
	}

	hideUserMenu() {
		menuUsuario.classList.remove("animated", "slideInRight", "faster");
		menuUsuario.classList.add("animated", "slideOutRight", "faster");
	}

	fillCart() {
		if (cartDropdown) {
			let totalProducts = 0;
			var totalPrice = 0;
			fetch(`http://localhost/HardStore/index.php/Cart/fillCart`, {})
				.then(response => response.json())
				.then(arrayData => {
					if (arrayData.length > 0) {
						for (let index = 0; index < arrayData.length; index++) {
							totalPrice += arrayData[index].amount*arrayData[index].cantidad;
							cartDropdown.innerHTML +=
								`<div class="box has-background-white-ter is-marginless productoCarrito">
									<article class="media">
										<figure class="media-left">
											<p class="image is-48x48">
												<img style="border-radius: 4px" src="https://bulma.io/images/placeholders/128x128.png">
											</p>
										</figure>
										<div class="media-content">
											<div class="content is-marginless">
												<strong>${arrayData[index].nombre}</strong>
												<p id="price"><strong>Price: $${arrayData[index].amount*arrayData[index].cantidad}</strong> ($${arrayData[index].amount} e.)</p>
											</div>
											<nav class="level is-mobile">
												<div class="level">
													<a id="substractAmountCart${index}" class="level-item" data-product="${arrayData[index].numP}">
														<span class="icon is-small" data-product="${arrayData[index].numP}"><i class="fas fa-minus" data-product="${arrayData[index].numP}"></i></span>
													</a>
													<p id="amount${arrayData[index].numP}" class="level-item">${arrayData[index].cantidad}</p>
													<a id="addAmountCart${index}" class="level-item" data-product="${arrayData[index].numP}">
														<span class="icon is-small" data-product="${arrayData[index].numP}"><i class="fas fa-plus" data-product="${arrayData[index].numP}"></i></span>
													</a>
												</div>
											</nav>
										</div>
										<div class="media-right">
											<button class="delete"></button>
										</div>
									</article>
								</div>`;
							if (index !== arrayData.length - 1) {
								cartDropdown.innerHTML += `<hr class="navbar-divider dividirCarro has-background-grey-lighter">`;
							}
							totalProducts += parseInt(arrayData[index].cantidad);
						}
						cartDropdown.innerHTML +=
							`<a href="http://localhost/HardStore/index.php/Checkout" style="margin-top: 10px !important" href="#productos" class="button is-dark is-fullwidth">
								<span>Total price: $${totalPrice}</span>
								<span class="icon">
									<i class="fas fa-shopping-basket"></i>
								</span>
							</a>`;
					} else {
						cartDropdown.innerHTML =
							`<div class="box has-text-centered">
								<h1 class="title is-5 level">No selected products yet...</h1>
								<a href="#productos" class="button is-danger is-fullwidth">
									<span>Add products</span>
									<span class="icon">
										<i class="fas fa-cart-plus"></i>
									</span>
								</a>
							</div>`;
					}
					amountProducts.innerHTML = totalProducts;
					return arrayData;
				}).then(arrayData => {
					for (let index = 0; index < arrayData.length; index++) {
						this.setSubstractAndAdd(index);
					}
				})

		}
	}

	changeAmountAndPrize(product) {
		let totalProducts = 0;
		const amountToRefresh = document.querySelector(`#amount${product}`);
		fetch(`http://localhost/HardStore/index.php/Cart/fillCart`, {})
		.then(response => response.json())
		.then(arrayData => {
			for (let index = 0; index < arrayData.length; index++) {
				if (arrayData[index].numP === product) {
					amountToRefresh.innerHTML = arrayData[index].cantidad;
				}
				totalProducts += parseInt(arrayData[index].cantidad);
			}
			amountProducts.innerHTML = totalProducts;
		})
	}

	addAmountCart(event) {
		const product = event.target.parentElement.dataset.product;
		const formData = new FormData();
		formData.append(`product`, product);
		fetch(`http://localhost/HardStore/index.php/Cart/addAmount`, {
				method: `POST`,
				body: formData
			})
			setTimeout(() => { myPage.changeAmountAndPrize(product) }, 50);	//Esta demora de 10ms es super necesaria para poder actualizar bien
			// el stock, si no existe, se realizara la query a la base de datos antes de que llegue el insert (productos +1) y no se actualizara nada! 
	}

	substractAmountCart(event) {
		const product = event.target.parentElement.dataset.product;
		const formData = new FormData();
		formData.append(`product`, product);
		fetch(`http://localhost/HardStore/index.php/Cart/substractAmount`, {
				method: `POST`,
				body: formData
			})
			setTimeout(() => { myPage.changeAmountAndPrize(product) }, 50);	//Esta demora de 10ms es super necesaria para poder actualizar bien
			// el stock, si no existe, se realizara la query a la base de datos antes de que llegue el insert (productos +1) y no se actualizara nada! 
	}

	setSubstractAndAdd(index) {
		var substractAmountCart = document.querySelector(`#substractAmountCart${index}`);
		var addAmountCart = document.querySelector(`#addAmountCart${index}`);
		if (substractAmountCart) substractAmountCart.addEventListener(`click`, this.substractAmountCart);
		if (addAmountCart) addAmountCart.addEventListener(`click`, this.addAmountCart);
	}

	cardShadow(event) {
		if (event.target.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.id}`);
			card.classList.remove(`cardNovedadesBackSombra`);
			card.classList.add(`cardNovedadesSombra`);
		} else if (event.target.parentElement.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesBackSombra`);
			card.classList.add(`cardNovedadesSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesBackSombra`);
			card.classList.add(`cardNovedadesSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesBackSombra`);
			card.classList.add(`cardNovedadesSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesBackSombra`);
			card.classList.add(`cardNovedadesSombra`);
		}
	}

	cardRemoveShadow(event) {
		if (event.target.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.id}`);
			card.classList.remove(`cardNovedadesSombra`);
			card.classList.add(`cardNovedadesBackSombra`);
		} else if (event.target.parentElement.parentElement.dataset.shadow === `yes`) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesSombra`);
			card.classList.add(`cardNovedadesBackSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.dataset.shadow) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesSombra`);
			card.classList.add(`cardNovedadesBackSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.parentElement.dataset.shadow) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesSombra`);
			card.classList.add(`cardNovedadesBackSombra`);
		} else if (event.target.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.shadow) {
			let card = document.querySelector(`#${event.target.parentElement.parentElement.parentElement.parentElement.parentElement.id}`);
			card.classList.remove(`cardNovedadesSombra`);
			card.classList.add(`cardNovedadesBackSombra`);
		}
	}

	fillMostWanted() {
		fetch(`http://localhost/HardStore/index.php/Welcome/fillMostWanted`, {})
			.then(response => response.json())
			.then(arrayData => {
				let product = 0;
				titles.forEach(index => {
					index.innerHTML = arrayData[product].nombre;
					product++;
				});
				product = 0;
				addToCart.forEach(index => {
					index.setAttribute(`value`, arrayData[product].numStock);
					product++;
				});
			})
	}

	addProductToCart(event) {
		var formData = new FormData();
		if (event.target.getAttribute(`value`)) formData.append(`idProduct`, event.target.getAttribute(`value`));
		else if (event.target.parentElement.getAttribute(`value`)) formData.append(`id`, event.target.parentElement.getAttribute(`value`));
		else if (event.target.parentElement.parentElement.getAttribute(`value`)) formData.append(`id`, event.target.parentElement.parentElement.getAttribute(`value`));
		else if (event.target.parentElement.parentElement.parentElement.getAttribute(`value`)) formData.append(`id`, event.target.parentElement.parentElement.parentElement.getAttribute(`value`));
		fetch('http://localhost/HardStore/index.php/Cart/addProductToCart', {
			method: 'POST',
			body: formData
		})
		if(cartDropdown)cartDropdown.innerHTML = ``;
		setTimeout(() => { myPage.fillCart() }, 50);	//Esta demora de 10ms es super necesaria para poder actualizar bien
		// el stock, si no existe, se realizara la query a la base de datos antes de que llegue el insert (adherir el producto al carrito) y no se actualizara nada! 
	}
}

const myPage = new myIndex();

/*var newPasswordBTN1 = document.querySelector(`#newPassword1`);
var newPasswordBTN2 = document.querySelector(`#newPassword2`);
var newPasswordBTN3 = document.querySelector(`#newPassword3`);*/

/*newPasswordBTN1.addEventListener(`click`, function(){
    
});

newPasswordBTN2.addEventListener(`click`, function(){

});

newPasswordBTN3.addEventListener(`click`, function(){

});*/
