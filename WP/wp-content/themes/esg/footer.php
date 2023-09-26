
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
                                <svg style="fill:#000000" xmlns="http://www.w3.org/2000/svg" height="0.875em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/></svg>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#" class="btn btn-primary-light">Apoie</a>
                        </li> -->
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