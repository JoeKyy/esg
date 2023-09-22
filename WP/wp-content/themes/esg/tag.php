<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="tag__content">
            <p class="h2"><?php single_term_title(); ?></p>
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