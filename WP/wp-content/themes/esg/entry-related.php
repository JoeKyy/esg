<?php
// Obtém as categorias e tags do post atual
$current_categories = wp_get_post_categories(get_the_ID());
$current_tags = wp_get_post_tags(get_the_ID(), array('fields' => 'ids'));

// Combina os IDs das categorias e tags
$all_term_ids = array_merge($current_categories, $current_tags);

if ($all_term_ids) {
    // Argumentos para WP_Query
    $args = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $current_categories,
            ),
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'term_id',
                'terms'    => $current_tags,
            ),
            'relation' => 'OR', // Isso significa que o post pode ter qualquer uma das categorias/tags para ser incluído
        ),
        'post__not_in' => array(get_the_ID()), // Exclui o post atual
        'posts_per_page' => 3, // Altere este número conforme necessário
    );

    $related_posts = new WP_Query($args);

    if ($related_posts->have_posts()) : ?>

        <div class="row">
            <div class="col-lg-12">
                <h3>Leia mais</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>

                    <article class="article__list my-4">
                        <div class="row">
                            <?php if (has_post_thumbnail()): ?>
                            <div class="col-lg-5">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                </a>
                            </div>
                            <?php endif; ?>
                            <div class="article__list--content col-lg-7">
                                <span class="tag">
                                    <?php $categories = get_the_category();
                                    if (!empty($categories)) {
                                        echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                                    } ?>
                                </span>
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h4>
                                <p>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo get_the_excerpt(); ?>
                                    </a>
                                </p>
                                <ul class="metadata">
                                    <li>
                                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <ul>
                                            <li>
                                                <i class="fa fa fa-calendar-o" aria-hidden="true"></i>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo get_the_date(); ?>
                                                </a>
                                            </li>
                                            <li>
                                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php echo get_the_time('H\hi'); ?>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                <?php endwhile; ?>

            </div>
        </div>

        <?php
        // Restaura a variável global $post para o post original
        wp_reset_postdata();
    endif;
}