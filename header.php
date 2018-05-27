<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmgp.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header-wrap">
        <div class="header-top mb-3 w-100">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-transparent p-0">
                    <a class="nav-toggler btn d-block d-md-none text-light" data-toggle="collapse" href="#collapseTopMenu" role="button" aria-expanded="false" 
                    aria-controls="collapseTopMenu" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </a>
                    <?php storetheme_logo( 'top' ); ?>
                    <ul class="navbar-nav order-md-last d-inline-block">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/tai-khoan/"><i class="fas fa-user-circle"></i> Tài khoản</a>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="collapseTopMenu">
                        <ul class="navbar-nav has-separator mr-auto show">
                            <li class="nav-item social-top"><a href="https://fb.me" class="nav-link text-light"><i class="fab fa-facebook-square"></i> Facebook</a></li>
                            <li class="nav-item contact-top"><a href="tel:01683005651" class="nav-link text-light"><i class="fas fa-phone"></i> 01683005651</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="header-main w-100 pb-2">
            <div class="container">
                <div class="row w-100">
                    <div class="col-12 col-md-3 col-lg-2 d-none d-md-block">
                        <div><?php storetheme_logo(); ?></div>
                        <p class="text-light text-truncate small p-0 m-0">
                            <?php bloginfo( 'description' ); ?>
                        </p>
                    </div>
                    <div class="col-10 col-md-7 col-lg-8">
                        <div class="form-inline my-1">
                            <?php storetheme_search(); ?>
                        </div>
                    </div>
                    <div class="col-2 text-center px-0 mx-0">
                        <?php storetheme_cart_link(); ?>
                        <div class="modal fade" id="myCart" tabindex="-1" role="dialog" aria-labelledby="myCart" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Your Cart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container-flud">
                                            <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </header>