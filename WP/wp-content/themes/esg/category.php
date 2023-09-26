<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <?php get_template_part('entry', 'breadcrumb'); ?>

        <div class="row">
            <div class="col-lg-12">
                <?php
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
                        else: // Para os demais posts, mostra o layout padrão
                            get_template_part('entry', 'summary');
                        endif;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
