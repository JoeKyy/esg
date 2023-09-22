<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="search__content">
            <p class="h2"><?php printf(esc_html__('Resultados da busca por: %s', 'blankslate'), get_search_query()); ?></p>
            <?php if ('' != get_the_archive_description()) {
            echo esc_html(get_the_archive_description());
            } ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>
                        <?php get_template_part('entry', 'summary'); ?>
                    <?php endwhile; ?>
                <?php else: ?>
                    <article id="post-0" class="article__post post no-results not-found">
                        <header>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="entry-title" itemprop="name">
                                        <?php esc_html_e('Não encontrado', 'blankslate'); ?>
                                    </h1>
                                </div>
                            </div>
                        </header>
                        <div class="article__post--content row my-4">
                            <div class="col-lg-12">
                                <p>
                                    <?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'blankslate'); ?>
                                </p>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>