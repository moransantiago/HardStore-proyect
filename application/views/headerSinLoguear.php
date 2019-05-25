<!DOCTYPE html>
<html id="html" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HardStore</title>
    <link rel="icon" href="<?php echo base_url("assets/img/logo-hs.png") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styles.css'); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <header>
        <nav id="navbar" class="navbar navbarPrincipal shadowNavbar is-dark has-background-grey is-fixed-top" role="navigation" aria-label="main navigation">
            <div class="navbar-brand logo">
                <a href="#" class="navbar-item navbar-items">
                    <span class="icon is-large">
                        <img class="icon is-medium" src=<?php echo base_url("assets/img/logo-hs.png") ?> width="28" height="28">
                    </span>
                </a>
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    <a href="#" class="navbar-item navbar-items">
                        Home
                    </a>
                    <a class="navbar-item navbar-items" href="#productos">
                        Products
                    </a>
                    <a class="navbar-item navbar-items">
                        About Us
                    </a>
                    <?php if ($this->session->userdata('username') != null) { ?>
                        <div id="logueado" class="navbar-item is-large has-background-dark">
                            <span style="padding: 0px" class="navbar-item has-background-dark">
                                <p class="has-text-weight-bold is-italic has-text-grey-lighter">My Account</p>
                                <i class="icon fas fa-chevron-right"></i>
                            </span>
                            <span style="margin: 0px" class="icon is-large">
                                <a id="showUserMenuBTN" class="button is-dark">
                                    <i class="icon fas fa-bars"></i>
                                </a>
                            </span>
                        </div>
                    <?php } else { ?>
                        <div id="sinLoguear" class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">
                                    <span class="button is-danger is-hoverable">Sign up</span>
                                    <span id="login" class="button has-background-grey-lighter is-hoverable">
                                        <span class="has-text-dark">Log in</span>
                                        <span style="margin-left: 8px" class="icon">
                                            <i class="icon fas fa-sign-in-alt"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <?php if ($this->session->userdata('username') != null) { ?>
            <div id="menuUsuario" style="z-index: 1000" class="column is-10-mobile is-offset-2-mobile is-5-tablet is-offset-7-tablet is-3-desktop is-offset-9-desktop darFixed is-paddingless hide">
                <!-- este es el div con el menu de usuario -->
                <nav id="navbarMenuUsuario" style="flex-direction: column" class="navbar has-background-dark sombraMenu">
                    <section class="hero">
                        <div class="columns is-mobile">
                            <div class="column is-3">
                                <a id="hideUserMenuBTN" class="redHeart">
                                    <i class="icon is-medium fas fa-angle-right"></i>
                                </a>
                            </div>
                            <div class="column is-6-mobile is-6-tablet is-5-desktop is-offset-3-mobile is-offset-3-tablet is-offset-4-desktop">
                                <figure style="margin: 15px" class="image">
                                    <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                                </figure>
                            </div>
                        </div>
                        <h1 style="margin-right: 20px" class="title is-5 has-text-white has-text-right"><?php echo $this->session->userdata('username'); ?></h1>
                        <h2 style="margin-right: 20px" class="subtitle subtitleEmail is-6 has-text-white-ter has-text-right"><?php echo $this->session->userdata('email'); ?></h2>
                        <?php if ($this->session->userdata('condicion') != "USER") { ?>
                            <h3 style="margin-right: 20px" class="subtitle transparente is-6 has-text-light has-text-right"><?php echo $this->session->userdata('condicion'); ?></h3>
                        <?php } ?>
                        <div class="column">
                            <!-- empty for spacing -->
                        </div>
                    </section>
                    <hr class="navbar-divider has-background-white">
                    <section style="overflow-Y: scroll" class="hero has-background-grey">
                        <div class="navbar-item has-dropdown is-hoverable has-text-white-ter">
                            <div class="container">
                                <a class="navbar-link has-background-grey has-text-white">
                                    <span class="icon is-large">
                                        <i class="icon is-medium fas fa-shopping-cart"></i>
                                    </span>
                                    <span>My cart</span>
                                    <div class="column">
                                        <!-- empy for spacing -->
                                    </div>
                                    <span id="amountProducts" class="tag is-danger is-rounded"></span>
                                </a>
                                <div id="cartDropdown" class="navbar-dropdown has-background-grey-light is-boxed productoCarrito">
                                </div>
                            </div>
                        </div>
                        <a class="navbar-item navbar-items has-text-white-ter">
                            <span class="icon is-large">
                                <i class="icon is-medium fas fa-heart"></i>
                            </span>
                            <span>Favourites</span>
                        </a>
                        <?php if ($this->session->userdata('condicion') == "ADMIN" || $this->session->userdata('condicion') == "GODMODE") { ?>
                            <a href="<?php echo base_url('index.php/administratorPanel') ?>" class="navbar-item navbar-items has-text-white-ter">
                                <span class="icon is-large">
                                    <i class="icon is-medium fas fa-user-shield"></i>
                                </span>
                                <span>Dashboard</span>
                            </a>
                        <?php } ?>
                        <a href="<?php echo base_url('index.php/Welcome/logout') ?>" class="navbar-item navbar-items has-text-white-ter">
                            <span class="icon is-large">
                                <i class="icon is-medium fas fa-sign-out-alt"></i>
                            </span>
                            <span>Log out</span>
                        </a>
                        <a class="navbar-item navbar-items has-text-white-ter">
                            asdasdasd
                        </a>
                        <a class="navbar-item navbar-items has-text-white-ter">
                            asdasdasd
                        </a>
                        <a class="navbar-item navbar-items has-text-white-ter">
                            asdasdasd
                        </a>
                        <a class="navbar-item navbar-items has-text-white-ter">
                            asdasdasd
                        </a>
                    </section>
                </nav>
            </div>
        <?php } ?>
        <br>
        <br>
        <section id="heroFondoPrincipal" class="hero" style="background-image: url(<?php echo base_url("assets/img/fondoPrincipal.jpg") ?>)">
            <div class="columns">
                <div class="has-text-left column is-6 is-offset-1">
                    <br>
                    <br>
                    <img style="width: 40%" src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    <div class="column is-12">
                        <span id="mainTitle" class="title is-size-4-mobile is-size-3-tablet is-size-2-desktop has-text-white">
                            Next Generation Hardware
                        </span>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="column is-5 has-text-centered">
                        <div class="columns">
                            <div class="column">
                                <a class="button is-medium is-dark shadowClose">
                                    <span class="icon is-large">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                    <span>Create an <strong>Account</strong></span>
                                </a>
                            </div>
                            <div class="column"><span style="white-space: nowrap" class="title is-3 has-text-white">or</span></div>
                            <div class="column">
                                <a href="#productos" class="button is-medium is-danger is-rounded shadowClose">
                                    <span>Start Shopping</span>
                                    <span class="icon is-large is-right">
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <br>
        </section>
        <section id="heroMarketing" class="section is-paddingless sombra flexRow">
            <div class="columns">
                <div class="column is-4-desktop is-12-mobile has-text-centered">
                    <br>
                    <div class="column is-12 transparente has-text-centered">
                        <img class="is-large" style="width: 30%" src="<?php echo base_url("assets/img/logocamion.png") ?>"></i>
                    </div>
                    <h1 class="title is-4 is-italic has-text-grey">Shipping all over the country</h1>
                </div>
                <div class="column is-4-desktop is-12-mobile has-text-centered">
                    <br>
                    <div class="column is-12 transparente has-text-centered">
                        <img class="is-large" style="width: 52%" src="<?php echo base_url("assets/img/logocatalogo.png") ?>"></i>
                    </div>
                    <h1 class="title is-4 is-italic has-text-grey" style="margin-top: 15px">Widest catalog available</h1>
                </div>
                <div class="column is-4-desktop is-12-mobile has-text-centered">
                    <br>
                    <div class="column is-12 transparente has-text-centered">
                        <img class="is-large" style="width: 29%" src="<?php echo base_url("assets/img/logogarantia.png") ?>"></i>
                    </div>
                    <h1 class="title is-4 is-italic has-text-grey">Trustful guarantee</h1>
                </div>
            </div>
            <br>
        </section>
        <br>
        <br>
        <div id="loginSCREEN" class="modal">
            <div id="modalBackground" style="opacity: 0" class="modal-background"></div>
            <div class="modal-card bordesRedondeadosDeArriba bordesRedondeadosDeAbajo shadowClose">
                <header class="modal-card-head">
                    <h1 class="title is-2 has-text-dark titulo">Log in</h1>
                </header>
                <section id="modalCardBodyLogin" class="modal-card-body">
                    <label class="label has-text-centered">Username or email</label>
                    <div class="control has-icons-left">
                        <form id="loginForm" method="POST">
                            <input id="nombreInput" class="input is-hoverable" type="text" name="usuario" placeholder="Username or email">
                            <span class="icon is-small is-left is-marginless">
                                <i class="fas fa-user"></i>
                            </span>
                            <div id="errorNombreContenedor" class="hide">
                                <label id="errorNombre" class="label has-text-danger has-text-weight-semibold has-text-centered">p</label>
                            </div>
                    </div>
                    <br>
                    <label class="label has-text-centered">Password</label>
                    <div class="control has-icons-left">
                        <input id="passwordInput" class="input is-hoverable" type="password" name="contraseña" placeholder="Password">
                        <div id="errorPasswordContenedor" class="hide">
                            <label id="errorContraseña" class="label has-text-danger has-text-weight-semibold has-text-centered">p</label>
                        </div>
                        <span class="icon is-small is-left is-marginless">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div class="columns level">
                        <div class="column is-9 level-item">
                            <label class="checkbox">
                                <input type="checkbox">
                                Remind me
                            </label>
                            <br>
                            <a href="<?php echo base_url('index.php/newPassword') ?>">Forgot you password?</a>
                        </div>
                        <div class="column is-3 level-item">
                            <a href="<?php echo base_url('index.php/Welcome') ?>">
                                <span class="tags has-addons is-right">
                                    <span class="tag is-dark">Hard</span>
                                    <span class="tag is-light">Store</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div id="errorNombreOContraseñaContenedor" class="hide">
                        <label id="errorNombreOContraseña" class="label has-text-danger has-text-weight-semibold has-text-centered">p</label>
                    </div>
                    <hr class="navbar-divider navbar-divider-login has-background-grey-lighter">
                    <input id="iniciarSesionBTN" type="submit" class="button is-fullwidth has-background-grey-lighter" value="Log in">
                    </form>
                    <br>
                    <a id="cancel" class="button is-fullwidth is-danger">Cancel</a>
                </section>
            </div>
        </div>
    </header>
</body>

</html>