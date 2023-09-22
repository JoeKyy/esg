<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <?php get_template_part('entry', 'breadcrumb'); ?>
        <?php
            // Argumentos para WP_Query
            $args = array(
                'posts_per_page' => 1, // Pega apenas o post mais recente
                'post_status' => 'publish',
                'orderby' => 'date',
                'order' => 'DESC'
            );

            $latest_post = new WP_Query($args);

            if ($latest_post->have_posts()) :
                while ($latest_post->have_posts()) : $latest_post->the_post(); ?>

                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="highlight__slider">
                                <figure>
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                                        </a>
                                    <?php else : ?>
                                        <img src="https://placehold.co/600x350" alt="">
                                    <?php endif; ?>
                                    <figcaption>
                                        <span>
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo esc_html($categories[0]->name);
                                            } ?>
                                        </span>
                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                <?php endwhile;
                // Restaura a variável global $post para o post original
                wp_reset_postdata();
            endif;
        ?>
        <div class="row">
            <div class="col-lg-12">
                <h3>Últimas noticias</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <?php get_template_part('entry', 'summary'); ?>
                    <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>