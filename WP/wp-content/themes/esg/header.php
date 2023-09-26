<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />

    <meta property="og:title" content="<?php bloginfo('name') ?>" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:image" content="assets/images/img-social.png" />
    <meta name="twitter:card" content="assets/images/img-social.png" />

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="apple-touch-icon" sizes="57x57"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="60x60"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-60x60.png" />
    <link rel="apple-touch-icon" sizes="72x72"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-180x180.png" />
    <link rel="icon" type="image/png" sizes="192x192"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/android-icon-192x192.png" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="96x96"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-96x96.png" />
    <link rel="icon" type="image/png" sizes="16x16"
        href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png" />
    <meta name="msapplication-TileImage"
        content="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-icon-144x144.png" />
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/manifest.json" />
    <meta name="theme-color" content="#ffffff" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/hamburgers@1.1.3/dist/hamburgers.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-10 col-10 col-md-10 text-center order-1 order-xl-0">
                    <div class="logo">
                        <?php if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '<h1>';
                        } ?><a href="<?php echo esc_url(home_url('/')); ?>"
                            title="<?php echo esc_html(get_bloginfo('name')); ?>" rel="home">
                            <?php echo esc_html(get_bloginfo('name')); ?>
                        </a>
                        <?php if (is_front_page() || is_home() || is_front_page() && is_home()) {
                            echo '</h1>';
                        } ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center col-2 col-md-2 col-lg-2 col-xl-7 order-0 order-xl-1">
                    <div class="menu">
                        <button class="nav-button hamburger hamburger--squeeze" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                        <nav>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' =>
                                        'main-menu',
                                    'container' => 'ul',
                                    'depth' => 2
                                )
                            ); ?>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 d-xl-block d-lg-none d-md-none d-sm-none d-md-none d-none order-0 order-xl-1">
                    <ul class="social--list">
                        <li>
                            <a target="_blank" href="https://instagram.com/esgporlanapinheiro?igshid=MzMyNGUyNmU2YQ==" title="instagram">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.linkedin.com/in/lanapinheiro" title="linkedin">
                                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://youtube.com/@esgporlanapinheiro?si=KOq74gLK9By89J0W" title="youtube">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://www.tiktok.com/@esgporlanapinheiro?_t=8ftv1OFLZMT&_r=1" title="tiktok">
                                <svg style="fill:#ffffff" xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" class="btn btn-primary-light">Apoie</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">