<!DOCTYPE html>
<html class="has-background-grey-lighter unscrollable" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HardStore</title>
    <link rel="icon" href="<?php echo base_url("assets/img/logo-hs.png") ?>">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styles.css'); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <header>
        <nav id="navbar" class="navbar is-fixed-top columns level" role="navigation" aria-label="main navigation">
            <div class="navbar-item logo column is-4 has-text-right level-item">
                <img src=<?php echo base_url("assets/img/logo-hs.png") ?> width="28" height="28">
            </div>
            <div class="navbar-item column is-5 has-text-left level-item">
                <span class="subtitle">Restaurar contraseña</span>
            </div>
            <a href="<?php echo base_url("index.php/Welcome") ?>" class="navbar-item column is-2 has-text-centered">Volver a la pagina principal</a>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="content columns">
                    <!--Inicio paso 1-->
                    <div class="column is-4 has-background-grey-lighter">
                        <h1 class="title has-text-dark">Paso 1:</h1>
                        <h2 class="subtitle has-text-grey is-4">Ingrese la dirección de correo electrónico vinculada a su cuenta.</h2>
                        <br>
                        <div class="control has-icons-right">
                            <input class="input is-active" type="email" name="email" placeholder=" E-Mail">
                            <span class="icon is-small is-right">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <br>
                        <input id="newPassword1" type="submit" class="button is-fullwidth is-primary" value="Siguiente">
                    </div>
                    <!--Inicio paso 2-->
                    <div class="column is-4">
                        <h1 class="title has-text-grey-lighter">Paso 2:</h1>
                        <h2 class="subtitle has-text-grey-lighter is-4">Ingrese el código que le hemos enviado a su dirección de correo electrónico.</h2>
                        <br>
                        <div class="control has-icons-right">
                            <input class="input has-text-centered is-hoverable" type="text" name="codigo" disabled>
                            <span class="icon is-small is-right">
                                <i class="fas fa-key"></i>
                            </span>
                        </div>
                        <br>
                        <input id="newPassword2" type="submit" class="button is-fullwidth is-primary" value="Siguiente" disabled>
                    </div>
                    <!--Inicio paso 3-->
                    <div class="column is-4">
                        <h1 class="title has-text-grey-lighter">Paso 3:</h1>
                        <h2 class="subtitle has-text-grey-lighter is-4">Ingrese la dirección de correo electrónico vinculada a su cuenta.</h2>
                        <br>
                        <div class="control has-icons-right">
                            <input class="input is-hoverable" type="email" name="email" placeholder=" E-Mail" disabled>
                            <span class="icon is-small is-right">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                        <br>
                        <input id="newPassword3" type="submit" class="button is-fullwidth is-primary" value="Confirmar" disabled>
                    </div>
                </div>
            </div>
            <div class="columns card-footer">
                <div class="container column is-11">
                    <progress class="progress is-medium is-primary" value="33" max="100"></progress>
                </div>
            </div>
        </div>
    </div>
</body>

</html>