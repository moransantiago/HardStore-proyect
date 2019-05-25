<!DOCTYPE html>
<html id="html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HardStore</title>
    <link rel="icon" href="<?php echo base_url("assets/img/logo-hs.png") ?>">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/styles.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/fonts.css'); ?>" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body class="has-background-white-ter">
    <div class="column is-12 has-text-centered">
        <h1 id="mostWantedTitle" class="subtitle is-2">Most wanted</h1>
    </div>
    <section id="heroNovedades" class="section hero level heroNovedades is-white-ter">
        <!-- <a id="sliderBTN1" onmouseover="hacerGris1()" onmouseout="deshacerGris1()" class="level-item bordesRedondeadosDeArriba bordesRedondeadosDeAbajo">
                    <span class="icon is-large">
                        <i class="icon is-medium fas fa-angle-left"></i>
                    </span>
                </a> -->
        <!--Inicio productos-->
        <div class="column is-one-fifth-desktop is-10-mobile is-offset-1-mobile is-4-tablet darFlex">
            <div id="card1" class="card cardNovedades darFlex" data-shadow="yes">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    </figure>
                </div>
                <header class="card-header has-text-centered">
                    <a id="title1" href="https://compragamer.com/" class="card-header-title"></a>
                </header>
                <div class="card-content bodyCard">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer style="padding-bottom: 8%; padding-left: 8%">
                    <a style="border: 0rem" class="redHeart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                    </a>
                    <a style="border: 0rem" id="addToCart1" class="greyCart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                    </a>
                </footer>
            </div>
        </div>
        <!--Fin prod 1-->
        <div class="column is-one-fifth-desktop is-10-mobile is-offset-1-mobile is-4-tablet darFlex">
            <div id="card2" class="card cardNovedades darFlex" data-shadow="yes">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    </figure>
                </div>
                <header class="card-header has-text-centered">
                    <a id="title2" href="https://compragamer.com/" class="card-header-title"></a>
                </header>
                <div class="card-content bodyCard">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer style="padding-bottom: 8%; padding-left: 8%">
                    <a style="border: 0rem" class="redHeart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                    </a>
                    <a style="border: 0rem" id="addToCart2" class="greyCart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                    </a>
                </footer>
            </div>
        </div>
        <!--Fin prod 2-->
        <div class="column is-one-fifth-desktop is-10-mobile is-offset-1-mobile is-4-tablet darFlex">
            <div id="card3" class="card cardNovedades darFlex" data-shadow="yes">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    </figure>
                </div>
                <header class="card-header has-text-centered">
                    <a id="title3" href="https://compragamer.com/" class="card-header-title"></a>
                </header>
                <div class="card-content bodyCard">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer style="padding-bottom: 8%; padding-left: 8%">
                    <a style="border: 0rem" class="redHeart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                    </a>
                    <a style="border: 0rem" id="addToCart3" class="greyCart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                    </a>
                </footer>
            </div>
        </div>
        <!--Fin prod 3-->
        <div class="column is-one-fifth-desktop is-10-mobile is-offset-1-mobile is-4-tablet darFlex">
            <div id="card4" class="card cardNovedades darFlex" data-shadow="yes">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    </figure>
                </div>
                <header class="card-header has-text-centered">
                    <a id="title4" href="https://compragamer.com/" class="card-header-title"></a>
                </header>
                <div class="card-content bodyCard">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer style="padding-bottom: 8%; padding-left: 8%">
                    <a style="border: 0rem" class="redHeart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                    </a>
                    <a style="border: 0rem" id="addToCart4" class="greyCart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                    </a>
                </footer>
            </div>
        </div>
        <!--Fin prod 4-->
        <div class="column is-one-fifth-desktop is-10-mobile is-offset-1-mobile is-4-tablet darFlex">
            <div id="card5" class="card cardNovedades darFlex" data-shadow="yes">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                    </figure>
                </div>
                <header class="card-header has-text-centered">
                    <a id="title5" href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                </header>
                <div class="card-content bodyCard">
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                        <br>
                        <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                    </div>
                </div>
                <footer style="padding-bottom: 8%; padding-left: 8%">
                    <a style="border: 0rem" class="redHeart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                    </a>
                    <a style="border: 0rem" id="addToCart5" class="greyCart fixBottom button" <?php if (!$this->session->userdata('username')) { ?> title="You must log in in oredr to fav something" disabled <?php } ?>>
                        <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                    </a>
                </footer>
            </div>
        </div>
        <!--Fin prod 5-->
        <!-- <a id="sliderBTN2" onmouseover="hacerGris2()" onmouseout="deshacerGris2()" class="level-item bordesRedondeadosDeArriba bordesRedondeadosDeAbajo">
                    <span class="icon is-large">
                        <i class="icon is-medium fas fa-angle-right"></i>
                    </span>
                </a> -->
    </section>
    <br>
    <br>
    <section id="productos" class="hero sombra is-large has-background-white">
        <div class="hero-head">
            <br>
            <div class="container">
                <div class="navbar-brand">
                    <div class="tabs is-fullwidth">
                        <div class="container">
                            <ul>
                                <li id="tab0">
                                    <a>
                                        <span class="icon is-medium"><img src=<?php echo base_url("assets/img/motherlogo.png") ?>></span>
                                        <span>Motherboards</span>
                                    </a>
                                </li>
                                <li id="tab1" class="is-active">
                                    <a>
                                        <span class="icon is-medium"><img src=<?php echo base_url("assets/img/micrologo.png") ?>></span>
                                        <span>Microprocesadores</span>
                                    </a>
                                </li>
                                <li id="tab2">
                                    <a>
                                        <span class="icon is-medium"><img src=<?php echo base_url("assets/img/ramlogo.png") ?>></span>
                                        <span>Memorias RAM</span>
                                    </a>
                                </li>
                                <li id="tab3">
                                    <a>
                                        <span class="icon is-medium"><img src=<?php echo base_url("assets/img/gpulogo.png") ?>></span>
                                        <span>GPU'S</span>
                                    </a>
                                </li>
                                <li id="tab4">
                                    <a>
                                        <span class="icon is-medium"><img src=<?php echo base_url("assets/img/hddlogo.png") ?>></span>
                                        <span>Discos Rigidos</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="notification has-background-white">
                <div class="columns is-mobile">
                    <div class="column is-12-mobile is-12-tablet is-12-desktop">
                        <div class="columns">
                            <div class="column">
                                <div class="field is-grouped is-grouped-centered level">
                                    <p class="control"><strong>Sort by</strong></p>
                                    <p class="control">
                                        <div class="control has-icons-left">
                                            <div class="select">
                                                <select>
                                                    <option>Name</option>
                                                    <option>Lower price</option>
                                                    <option>Higher price</option>
                                                    <option selected>Newest</option>
                                                </select>
                                            </div>
                                            <div class="icon is-left is-marginless is-small">
                                                <i class="fas fa-sort-alpha-down"></i>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                            <div class="column has-text-centered">
                                <div class="field is-grouped is-grouped-centered">
                                    <div class="field has-addons">
                                        <p class="control has-icons-right">
                                            <input id="searchBarStock" class="input has-background-light" type="text">
                                            <span class="icon is-right is-marginless">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </p>
                                        <p class="control">
                                            <a class="button">Search</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="field is-grouped is-grouped-centered level">
                                    <p class="control"><strong>Show</strong></p>
                                    <p class="control">
                                        <div class="control has-icons-left">
                                            <div class="select">
                                                <select>
                                                    <option>8 items</option>
                                                    <option selected>12 items</option>
                                                    <option>16 items</option>
                                                    <option>20 items</option>
                                                </select>
                                                <div class="icon is-left is-marginless is-small">
                                                    <i class="fas fa-list"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="productsDivider" class="columns level productsDivider">
            <div class="column is-5-desktop is-5-tablet is-paddingless">
                <hr class="navbar-divider">
            </div>
            <div class="column is-2-desktop is-2-tablet has-text-centered is-paddingless">
                <p class="subtitle is-3">Products</p>
            </div>
            <div class="column is-5-desktop is-5-tablet is-paddingless">
                <hr class="navbar-divider">
            </div>
        </div>
        <div class="columns is-multiline is-variable is-8-desktop is-6-tablet columnsProducts darFlex">
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile darFlex">
                <div class="card shadowProducts darFlex flexColumn">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/1080g1.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GTX 1080 GIGABYTE G1 GAMING</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile darFlex">
                <div class="card shadowProducts darFlex flexColumn">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/asusrogstrix.jpg") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GTX 1080TI ASUS ROG STRIX</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
            <div class="column is-3-desktop is-4-tablet is-8-mobile is-offset-2-mobile">
                <div class="card shadowProducts">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=<?php echo base_url("assets/img/logo-hs.png") ?>>
                        </figure>
                    </div>
                    <header class="card-header has-text-centered">
                        <a href="https://compragamer.com/" class="card-header-title">GIGABYTE RGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXGABYTE RTXTX 2060</a>
                    </header>
                    <div class="card-content bodyCard">
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec iaculis mauris. @bulmaio #css #responsive
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div>
                    <footer style="padding-bottom: 8%; padding-left: 8%">
                        <a class="redHeart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-heart"></i></span>
                        </a>
                        <a class="greyCart fixBottom">
                            <span class="icon is-small"><i class="icon is-small fas fa-cart-arrow-down"></i></span>
                        </a>
                    </footer>
                </div>
            </div>
        </div>
        <div class="column container">
            <nav class="pagination is-centered" role="navigation" aria-label="pagination">
                <a class="pagination-previous">Previous</a>
                <a class="pagination-next">Next page</a>
                <ul class="pagination-list">
                    <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                    <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                    <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                    <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                    <li><span class="pagination-ellipsis">&hellip;</span></li>
                    <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                </ul>
            </nav>
        </div>
    </section>
</body>

</html>