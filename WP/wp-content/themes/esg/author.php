<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="author__content">
            <?php the_post(); ?>
            <p class=""></p></p><?php the_author_link(); ?></p>
            <?php if ('' != get_the_author_meta('user_description')) {
                echo esc_html(get_the_author_meta('user_description'));
            } ?>
            <?php rewind_posts(); ?>
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