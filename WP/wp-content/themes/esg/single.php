<?php get_header(); ?>
<div class="row">
    <div class="col-lg-8">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <?php get_template_part('entry', 'breadcrumb'); ?>
                <?php get_template_part('entry'); ?>
            <?php endwhile;
        endif; ?>
        <?php get_template_part('entry', 'related'); ?>
    </div>
    <div class="col-lg-4">
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>