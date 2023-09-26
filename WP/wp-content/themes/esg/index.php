<?php get_header(); ?>

<div class="row">
    <div class="col-lg-8">
        <?php
        // Obtenha os IDs das categorias que você deseja excluir
        $exclude_categories = array('artigos', 'entrevistas', 'infonews');
        $exclude_ids = array();

        foreach ($exclude_categories as $slug) {
            $cat = get_category_by_slug($slug);
            if ($cat) {
                $exclude_ids[] = $cat->term_id;
            }
        }

        // Modifique a query principal
        query_posts(array(
            'category__not_in' => $exclude_ids,
            'orderby' => 'date',
            'order' => 'DESC'
        ));

        if (have_posts()):
            $post_count = 0; // Inicializa um contador de posts
            while (have_posts()):
                the_post();
                $post_count++;

                if ($post_count == 1): // Se for o primeiro post, mostra como destaque
        ?>
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
        <?php
                endif;
            endwhile;
        endif;
        ?>

        <div class="row mt-4">
            <div class="col-lg-12">
                <h3>Últimas noticias</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (have_posts()):
                    $post_count = 0; // Reinicializa o contador de posts
                    while (have_posts()):
                        the_post();
                        $post_count++;

                        if ($post_count > 1): // Para os demais posts, mostra o layout padrão
                            get_template_part('entry', 'summary');
                        endif;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode('[ajax_load_more loading_style="infinite fading-circles" post_type="post" posts_per_page="5"]'); ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
