<?php get_header(); ?>
<div class="row">
    <div class="col-lg-12">
        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('article__post'); ?>>
                    <header>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (is_singular()) {
                                    echo '<h1>';
                                } else {
                                    echo '<h2>';
                                } ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                                    <?php the_title(); ?>
                                </a>
                                <?php if (is_singular()) {
                                    echo '</h1>';
                                } else {
                                    echo '</h2>';
                                } ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <?php
                            if (has_post_thumbnail()):
                                $thumbnail_id = get_post_thumbnail_id();
                                $thumbnail_image = get_post($thumbnail_id);
                                $thumbnail_caption = $thumbnail_image->post_excerpt;
                        ?>
                            <div class="row my-4">
                                <div class="col-lg-12">
                                    <figure>
                                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>

                                        <?php if ($thumbnail_caption): ?>
                                            <figcaption class="my-2">
                                                <p>
                                                    <?php echo $thumbnail_caption; ?>
                                                </p>
                                            </figcaption>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                            </div>
                        <?php endif; ?>
                    </header>
                    <?php get_template_part('entry', 'content'); ?>
                    <footer>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                    </footer>
                    <?php edit_post_link(); ?>
                </article>
            <?php endwhile; endif; ?>
    </div>
</div>
<?php get_footer(); ?>