<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
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
                                <?php esc_html_e('"Desculpe, nada correspondeu à sua pesquisa. Por favor, tente novamente.', 'blankslate'); ?>
                            </p>
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>