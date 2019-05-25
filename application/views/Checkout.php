<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HardStore</title>
    <link rel="icon" href="<?php echo base_url("assets/img/logo-hs.png") ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/CheckoutStyles.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/bulma-switch.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>

    <head>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-item is-marginless" href="https://bulma.io">
                <span class="icon is-large">
                    <a id="showUserMenuBTN" class="button is-dark">
                        <i class="icon fas fa-bars"></i>
                    </a>
                </span>
            </div>
            <div class="navbar-start">
                <a class="navbar-item">
                    Checkout
                </a>
            </div>
            <div class="navbar-end">
                <a href="<?php echo base_url('index.php/Welcome') ?>" class="navbar-item">
                    <p class="smallFont">Back</p>
                </a>
            </div>
        </nav>
    </head>

    <body>
        <div class="columns">
            <div class="column is-7 products">
                <br>
                <br>
                <div id="pageTitle" class="field">
                    <p class="control title is-2">
                        HardStore
                    </p>
                </div>
                <br>
                <br>
                <br>
                <br>
                <div class="field is-grouped is-grouped-left">
                    <p class="control">
                        <span class="icon is-medium">
                            <i class="icon is-medium fas fa-shopping-cart"></i>
                        </span>
                    </p>
                    <p class="control title is-4">
                        My cart
                    </p>
                </div>
                <br>
                <table class="table is-stripped is-narrow is-hoverable is-fullwidth">
                    <thead>
                        <tr>
                            <th class="subtitle is-4 has-text-weight-bold">Products</th>
                            <th class="has-text-right">Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th id="total" class="subtitle is-2 has-text-right is-paddingless"></th>
                        </tr>
                    </tfoot>
                    <tbody id="products">
                    </tbody>
                </table>
            </div>
            <div style="padding-right: 2%" class="column is-5">
                <br>
                <br>
                <div id="pageTitle" class="field">
                    <p class="control title is-3 has-text-right">
                        Payment information
                    </p>
                </div>
                <br>
                <div class="field is-grouped is-grouped-centered">
                    <p class="control subtitle is-4 is-marginless">
                        Cash
                    </p>
                    <p class="control">
                        <div class="field level">
                            <input id="switchRtlExample" type="checkbox" name="switchRtlExample" class="switch is-rounded is-dark" checked="checked">
                            <label for="switchRtlExample"></label>
                        </div>
                    </p>
                    <p class="control subtitle is-4">
                        Credit card
                    </p>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <p class="control subtitle is-4 is-marginless">
                        Cash
                    </p>
                    <p class="control">
                        <div class="field level">
                            <input id="switchRtlExample" type="checkbox" name="switchRtlExample" class="switch is-rounded is-dark" checked="checked">
                            <label for="switchRtlExample"></label>
                        </div>
                    </p>
                    <p class="control subtitle is-4">
                        Credit card
                    </p>
                </div>
                <div class="field is-grouped is-grouped-centered">
                    <p class="control subtitle is-4 is-marginless">
                        Cash
                    </p>
                    <p class="control">
                        <div class="field level">
                            <input id="switchRtlExample" type="checkbox" name="switchRtlExample" class="switch is-rounded is-dark" checked="checked">
                            <label for="switchRtlExample"></label>
                        </div>
                    </p>
                    <p class="control subtitle is-4">
                        Credit card
                    </p>
                </div>
                <br>
                <form id="buyForm" method="POST">
                    <div class="box shadowBox has-text-centered has-background-white">
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-rounded is-static">Cardhold full name</a>
                            </p>
                            <p class="control is-expanded">
                                <input type="text" name="cardName" class="input is-rounded is-shadowless">
                            </p>
                        </div>
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-rounded is-static">Credit card number</p></a>
                            </p>
                            <p class="control is-expanded">
                                <input type="text" name="cardNumber" class="input is-rounded is-shadowless">
                            </p>
                        </div>
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-rounded is-static">Expiration day</a>
                            </p>
                            <p class="control is-expanded">
                                <input type="date" name="cardExpDay" class="input is-rounded is-shadowless">
                            </p>
                        </div>
                        <div class="field has-addons">
                            <p class="control">
                                <a class="button is-rounded is-static">CCV number</a>
                            </p>
                            <p class="control is-expanded">
                                <input type="password" name="cardCCV" class="input is-rounded is-shadowless">
                            </p>
                        </div>
                    </div>
                    <div class="column is-5 is-offset-7">
                        <a id="buy" class="button is-rounded is-dark is-outlined is-fullwidth">Buy</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</body>

</html>