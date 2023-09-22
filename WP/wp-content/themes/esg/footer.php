
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 text-center my-2">
                    <div class="logo">
                        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h6>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h6>'; } ?>
                    </div>
                </div>
                <div class="col-lg-7 my-2">
                    <nav>
                        <?php
                            wp_nav_menu(
                                array(
                                'theme_location' => 'footer-1',
                                'container' => 'ul',
                                )
                            );
                        ?>
                    </nav>
                </div>
                <div class="col-lg-3 my-2">
                    <ul class="social--list">
                        <li>
                            <a href="#" title="instagram">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="linkedin">
                                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="youtube">
                                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="twitter">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-primary-dark">Apoie</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 text-center my-2">
                    <p class="copyright">
                        <strong>Todos os direitos reservados à ESG por Lana Pinheiro</strong>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <!--build:js assets/js/main.min.js -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/modernizr.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/fontsmoothie.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.functions.js"></script>
    <!-- endbuild -->
    <script src="https://use.fontawesome.com/e5f5aeb998.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" data-autoinit="true"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdn.jsdelivr.net/g/html5shiv@3.7.3(html5shiv.min.js+html5shiv-printshiv.min.js),respond@1.4.2"></script>
    <![endif]-->
    <!-- Meta Pixel Code -->
    <!-- End Meta Pixel Code -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
</body>
</html>