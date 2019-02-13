<?php ob_start();?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        <?php
            wp_title('|', true, 'right');
            bloginfo('name');
        ?>
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo ASSET_URL;?>images/favicon-awb.png">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>

   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_head();?>

</head>
<body>
<header>
    <nav>
        <div class="box-menu-top bg-blue-black">
            <div class="container">
                <div class="row">
                    <div class="col-12 toolbar-top">
                        <ul class="menu-contact nav text-right justify-content-end float-lg-none float-right">
                            <li class="nav-item justify-content-center align-items-center">
                                <div class="nav-link">
                                    <ul class="nav list-social">
                                        <li class="nav-item"><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li class="nav-item"><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li class="nav-item"><a href="#"><i class="icon-instagram"></i></a></li>
                                        <li class="nav-item"><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="nav-link" href="#">
                                    <input class="input-search" type="text" placeholder="search">
                                    <a href="#" class="btn-search-mb"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-orange btn-support-us" href="#">
                                    SUPPORT US
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row box-main-menu">
                <div class="col-lg-12 navbar navbar-expand-lg ">
                    <div class="site-logo">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo ASSET_URL;?>images/logo-awb.png" class="img-fluid">
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarBanVien" aria-controls="navbarBanVien" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarBanVien">
                        <ul class="navbar-nav main-menu">
                            <li class="nav-item active">
                                <a href="#" class="nav-link waves-effect waves-light">
                                    ABOUT US
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link waves-effect waves-light">
                                    HOW WE WORK
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo home_url()."/project";?>" class="nav-link waves-effect waves-light">
                                    PROJECTS
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo home_url()."/awb-global";?>" class="nav-link waves-effect waves-light">
                                    AWB GLOBAL
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a href="<?php echo home_url()."/post";?>" class="nav-link waves-effect waves-light ">
                                    POST
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link waves-effect waves-light ">
                                    JOIN US
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link waves-effect waves-light ">
                                    CONTACT US
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div id="sticky-menu-anchor"></div>
</header>