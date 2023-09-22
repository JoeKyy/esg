<aside class="sidebar" role="complementary">
    <!-- Artigos -->
    <?php
    $args_artigos = [
        "posts_per_page" => 3,
        "category_name" => "artigos",
    ];
    $artigos_query = new WP_Query($args_artigos);
    if ($artigos_query->have_posts()): ?>
        <div class="sidebar__articles">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Artigos</h3>
                </div>
            </div>
            <?php while ($artigos_query->have_posts()):
                $artigos_query->the_post(); ?>
                <div class="row my-3 align-items-center">
                    <?php if (has_post_thumbnail()): ?>
                        <div class="col-lg col">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail("thumbnail"); ?>
                            </a>
                        </div>
                        <div class="col-lg-8 col-8">
                        <?php else: ?>
                            <div class="col-lg-12">
                            <?php endif; ?>
                            <h6><a href="<?php the_permalink(); ?>">
                                    <?php the_author(); ?>
                                </a></h6>
                            <p><a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a></p>
                        </div>
                    </div>
                    <?php
            endwhile; ?>
            </div>
            <?php wp_reset_postdata();endif;
    ?>

        <!-- Entrevistas -->
        <?php
        $args_entrevistas = [
            "posts_per_page" => 3,
            "category_name" => "entrevistas",
        ];
        $entrevistas_query = new WP_Query($args_entrevistas);
        if ($entrevistas_query->have_posts()): ?>
            <div class="sidebar__interviews">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Entrevistas</h3>
                    </div>
                </div>
                <?php while ($entrevistas_query->have_posts()):
                    $entrevistas_query->the_post(); ?>
                    <div class="row my-4 align-items-center">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="col-lg-12">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail("medium"); ?>
                                </a>
                            </div>
                            <div class="col-lg-12">
                            <?php else: ?>
                                <div class="col-lg-12">
                                <?php endif; ?>
                                <h6><a href="<?php the_permalink(); ?>">
                                        <?php the_author(); ?>
                                    </a></h6>
                                <p><a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a></p>
                            </div>
                        </div>
                        <?php
                endwhile; ?>
                </div>
                <?php wp_reset_postdata();endif;
        ?>

            <!-- Infonews -->
            <?php
            $args_infonews = [
                "posts_per_page" => 3,
                "category_name" => "infonews",
            ];
            $infonews_query = new WP_Query($args_infonews);
            if ($infonews_query->have_posts()): ?>
                <div class="sidebar__interviews">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Infonews</h3>
                        </div>
                    </div>
                    <?php while ($infonews_query->have_posts()):
                        $infonews_query->the_post(); ?>
                        <div class="row my-4 align-items-center">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="col-lg-12">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail("medium"); ?>
                                    </a>
                                </div>
                                <div class="col-lg-12">
                                <?php else: ?>
                                    <div class="col-lg-12">
                                    <?php endif; ?>
                                    <h6><a href="<?php the_permalink(); ?>">
                                            <?php the_author(); ?>
                                        </a></h6>
                                    <p><a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a></p>
                                </div>
                            </div>
                            <?php
                    endwhile; ?>
                    </div>
                    <?php wp_reset_postdata();endif;
            ?>

                <!-- Publicidade -->
                <?php if (is_active_sidebar("widget-area")): ?>
                    <?php dynamic_sidebar("widget-area"); ?>
                <?php endif; ?>

</aside>