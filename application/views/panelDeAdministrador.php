<!DOCTYPE html>
<html class="has-background-white" lang="en">

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
        <nav id="navbar" class="navbar is-fixed-top is-dark has-background-grey" role="navigation" aria-label="main navigation">
            <div class="navbar-item logo">
                <img src=<?php echo base_url("assets/img/logo-hs.png") ?> width="28" height="28">
                <span class="subtitle has-text-white-ter">Dashboard</span>
            </div>
            <div class="navbar-end">
                <a href="<?php echo base_url("index.php/Welcome") ?>" class="navbar-item has-text-centered has-text-white-ter navbar-items">Volver a la pagina principal</a>
            </div>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <div class="tabs is-fullwidth">
        <ul>
            <li id="tabStock" class="is-active">
                <a>
                    <span class="icon is-small"><i class="fas fa-store-alt" aria-hidden="true"></i></span>
                    <span>Stock</span>
                </a>
            </li>
            <li id="tabAccounts" class="transparente">
                <a>
                    <span class="icon is-small"><i class="fas fa-user-circle" aria-hidden="true"></i></span>
                    <span>Accounts</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div id="containerTableStock" class="container">
            <div class="field is-grouped is-grouped-centered">
                <p class="control">
                    <a onclick="toggleAddStockModal()" class="button is-link is-rounded is-hoverable is-outlined">
                        <span>add<strong>Product</strong></span>
                        <span class="icon is-large is-right">
                            <i class="fas fa-plus"></i>
                        </span>
                    </a>
                </p>
                <p class="control">
                    <div class="field has-addons">
                        <p class="control">
                            <input id="searchBarStock" class="input" type="text">
                        </p>
                        <p class="control">
                            <a class="button is-static">
                                Filter
                            </a>
                        </p>
                    </div>
                </p>
            </div>
            <div id="tableStock">
                <table class="table is-striped is-hoverable is-narrow is-fullwidth">
                    <thead>
                        <tr>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Amount</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Product</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Type</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Guarantee(Months)</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Store</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Telephone</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Available</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Amount</th>
                            <th>Product</th>
                            <th>Type</th>
                            <th>Guarantee(Months)</th>
                            <th>Store</th>
                            <th>Telephone</th>
                            <th>Available</th>
                        </tr>
                    </tfoot>
                    <tbody id="bodyTableStock">
                    </tbody>
                </table>
            </div>
            <br>
            <div id="editStockModal" class="modal">
                <div onclick="toggleEditStockModal(event)" class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Edit</p>
                        <button onclick="toggleEditStockModal(event)" class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="box">
                            <div class="field is-grouped">
                                <div class="control">
                                    <h1 class="title is-4">Amount</h1>
                                </div>
                                <div class="control">
                                    <h1 class="subtitle is-6">To add / substract</h1>
                                </div>
                            </div>
                            <br>
                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <a class="button is-large has-background-grey-lighter rounded">
                                        <span class="icon is-large is-right">
                                            <i class="fas fa-minus"></i>
                                        </span>
                                    </a>
                                </div>
                                <div class="control is-expanded">
                                    <input id="amountToModifyStock" class="input is-large has-text-centered is-active" value=1>
                                </div>
                                <div class="control">
                                    <a class="button is-large has-background-grey-lighter rounded">
                                        <span class="icon is-large is-right">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <p class="help has-text-right">New product total amount: </p>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <button id="modifyAmountBtn" class="button is-link">Save changes</button>
                        <button onclick="toggleEditStockModal(event)" class="button">Cancel</button>
                    </footer>
                </div>
            </div>
            <div id="addStockModal" class="modal">
                <div onclick="toggleAddStockModal()" class="modal-background"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">Add</p>
                        <button onclick="toggleAddStockModal()" class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="box">
                            <form id="formAddProduct" method="POST">
                                <h1 class="title is-4">New product</h1>
                                <br>
                                <div class="columns is-marginless">
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Brand</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <span class="select is-fullwidth">
                                                            <select name="brand">
                                                                <option value="ASUS">ASUS</option>
                                                                <option value="GIGABYTE">GIGABYTE</option>
                                                                <option value="NZXT">NZXT</option>
                                                                <option value="CORSAIR">CORSAIR</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Model</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <span class="select is-fullwidth">
                                                            <select name="model">
                                                                <option value="RX 580">RX 580</option>
                                                                <option value="RX VEGA 64">RX VEGA 64</option>
                                                                <option value="RTX 2080">RTX 2080</option>
                                                                <option value="RX 570">RX 570</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns is-marginless">
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Line</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <span class="select is-fullwidth">
                                                            <select name="line">
                                                                <option value="WINDFORCE">WINDFORCE</option>
                                                                <option value="ROG">ROG</option>
                                                                <option value="MM">MM</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Type</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <span class="select is-fullwidth">
                                                            <select name="type">
                                                                <option value="CPU">CPU</option>
                                                                <option value="GPU">GPU</option>
                                                                <option value="RAM">RAM</option>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="columns is-marginless">
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Amount</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <input id="inputAmount" class="input" value=1 name="amount" type="number">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="amountErrorContainer" class="field is-right">
                                            <label id="amountError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered">You must specify the amount<label>
                                        </div>
                                    </div>
                                    <div class="column is-6">
                                        <div class="field is-horizontal">
                                            <div class="field-body">
                                                <div class="field has-addons">
                                                    <p class="control">
                                                        <a class="button is-static">Guarantee (months)</a>
                                                    </p>
                                                    <p class="control is-expanded">
                                                        <input id="inputGuarantee" class="input" name="guarantee" type="number">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="guaranteeErrorContainer">
                                            <label id="guaranteeError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered">You must specify the guarantee<label>
                                        </div>
                                    </div>
                                </div>
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field has-addons">
                                            <p class="control">
                                                <a class="button is-static">Store</a>
                                            </p>
                                            <p class="control is-expanded">
                                                <span class="select is-fullwidth">
                                                    <select name="street">
                                                        <option value="MOSCONI">Mosconi 4953, Villa Pueyrredon</option>
                                                        <option value="OLAZABAL">Olazabal 3064, Villa Urquiza</option>
                                                    </select>
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </section>
                    <footer class="modal-card-foot">
                        <input type="submit" value="Save changes" class="button is-link">
                    </footer>
                    </form>
                </div>
            </div>
        </div>
        <!-- comienza tabla de cuentas -->
        <div id="containerTableAccounts" class="container darAbsolute hide is-overlay">
            <div class="field is-grouped is-grouped-centered">
                <p class="control">
                    <a onclick="toggleAddAccountsModal()" class="button is-link is-rounded is-hoverable is-outlined">
                        <span>add<strong>Account</strong></span>
                        <span class="icon is-large is-right">
                            <i class="fas fa-user-plus"></i>
                        </span>
                    </a>
                </p>
                <p class="control">
                    <div class="field has-addons">
                        <p class="control">
                            <input id="searchBarAccounts" class="input" type="text">
                        </p>
                        <p class="control">
                            <a class="button is-static">
                                Filter
                            </a>
                        </p>
                    </div>
                </p>
            </div>
            <div id="tableAccounts">
                <table class="table is-striped is-hoverable is-narrow is-fullwidth">
                    <thead>
                        <tr>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Condition</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Username</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Name</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>LastName</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Email</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Password</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                            <th>
                                <div class="field is-grouped">
                                    <p class="control">
                                        <span>Active</span>
                                    </p>
                                    <p class="control is-expanded">
                                        <a>
                                            <i class="icon fas fa-arrow-down"></i>
                                        </a>
                                    </p>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Condition</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Active</th>
                        </tr>
                    </tfoot>
                    <tbody id="bodyTableAccounts">
                    </tbody>
                </table>
                <br>
            </div>
        </div>
        <div id="editAccountsModal" class="modal">
            <div onclick="toggleEditAccountsModal(event)" class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Edit</p>
                    <button onclick="toggleEditAccountsModal(event)" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="box">
                        <form id="formEditAccount" method="POST">
                            <h1 class="title is-4">Account</h1>
                            <br>
                            <div class="columns is-marginless">
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Name</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input id="inputName" class="input" name="newName" type="text">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="nameErrorContainer">
                                        <label id="nameError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered"><label>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Last Name</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input id="inputLastName" class="input" name="newLastName" type="text">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="lastNameErrorContainer">
                                        <label id="lastNameError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered"><label>
                                    </div>
                                </div>
                            </div>
                            <div class="columns is-marginless">
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Username</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input id="inputUsername" class="input" name="newUsername" type="text">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="usernameErrorContainer">
                                        <label id="usernameError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered"><label>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Password</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input id="inputPassword" class="input" name="newPassword" type="password">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="passwordErrorContainer">
                                        <label id="passwordError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered"><label>
                                    </div>
                                </div>
                            </div>
                            <div class="columns is-marginless">
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Email</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <input id="inputEmail" class="input" name="newEmail" type="email">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="emailErrorContainer">
                                        <label id="emailError" class="label subtitle is-7 has-text-danger has-text-weight-semibold has-text-centered"><label>
                                    </div>
                                </div>
                                <div class="column is-6">
                                    <div class="field is-horizontal">
                                        <div class="field-body">
                                            <div class="field has-addons">
                                                <p class="control">
                                                    <a class="button is-static">Rol</a>
                                                </p>
                                                <p class="control is-expanded">
                                                    <span class="select is-fullwidth">
                                                        <select name="rol">
                                                            <option value="USER">USER</option>
                                                            <option value="ADMIN">ADMIN</option>
                                                        </select>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button id="modifyAmountBtn" class="button is-link">Save changes</button>
                    </form>
                    <button onclick="toggleEditAccountsModal(event)" class="button">Cancel</button>
                </footer>
            </div>
        </div>
        <div id="addAccountsModal" class="modal">
            <div onclick="toggleAddAccountsModal()" class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Add</p>
                    <button onclick="toggleAddAccountsModal()" class="delete" aria-label="close"></button>
                </header>
                <section class="modal-card-body">
                    <div class="box">
                        <form id="formAddAccount" method="POST">
                            <div class="columns">
                                <div class="column is-4 has-text-left">
                                    <h1 class="title is-4">New account</h1>
                                </div>
                                <div class="column is-4 is-offset-4">
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="label">Rol</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="select is-fullwidth">
                                                <select id="rolSelectionAdd">
                                                    <option>USER</option>
                                                    <option>ADMIN</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="navbar-divider has-background-light">
                            <br>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label">Name</label>
                                </div>
                                <div class="field-body">
                                    <input id="inputNameAdd" class="input column is-10 is-offset-1 is-fullwidth" name="name" type="text">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="nameErrorContainerAdd">
                                <label id="nameErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label">Last Name</label>
                                </div>
                                <div class="field-body">
                                    <input id="inputLastNameAdd" class="input column is-10 is-offset-1 is-fullwidth" name="LastName" type="text">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="lastNameErrorContainerAdd">
                                <label id="lastNameErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label">Username</label>
                                </div>
                                <div class="field-body">
                                    <input id="inputUsernameAdd" class="input column is-10 is-offset-1 is-fullwidth" name="username" type="text">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="usernameErrorContainerAdd">
                                <label id="usernameErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label">Email</label>
                                </div>
                                <div class="field-body">
                                    <input id="inputEmailAdd" class="input column is-10 is-offset-1 is-fullwidth" name="email" type="email">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="emailErrorContainerAdd">
                                <label id="emailErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label">Password</label>
                                </div>
                                <div class="field-body">
                                    <input id="inputPasswordAdd" class="input column is-10 is-offset-1 is-fullwidth" name="password" type="password">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="passwordErrorContainerAdd">
                                <label id="passwordErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                            <div class="field is-horizontal is-marginless">
                                <div class="field-label is-normal">
                                    <label class="label is-marginless">Password</label>
                                    <p class="help is-marginless">(Confirm)</p>
                                </div>
                                <div class="field-body">
                                    <input id="inputConfirmPasswordAdd" class="input column is-10 is-offset-1 is-fullwidth" type="password">
                                </div>
                            </div>
                            <div class="column is-9 is-offset-3 is-paddingless has-text-centered hide" id="confirmPasswordErrorContainerAdd">
                                <label id="confirmPasswordErrorAdd" class="label subtitle is-7 has-text-danger has-text-weight-semi-bold">p<label>
                            </div>
                            <div class="field is-horizontal">
                                <div class="field-label">
                                    <!-- Left empty for spacing -->
                                </div>
                            </div>
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <input type="submit" value="Save changes" class="button is-link">
                </footer>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>