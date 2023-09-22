<article class="article__list my-4">
    <div class="row">
        <?php if (has_post_thumbnail() && !is_search()): ?>
        <div class="col-lg-5">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
            </a>
        </div>
        <?php endif; ?>
        <div class="article__list--content <?php echo (has_post_thumbnail() && !is_search()) ? 'col-lg-7' : 'col-lg-12'; ?>">
            <?php if (!is_search()): ?>
            <span class="tag">
                <?php $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                } ?>
            </span>
            <?php endif; ?>
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
                            <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>">
                                <?php echo get_the_date(); ?>
                            </a>
                        </li>
                        <li>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <?php echo get_the_time('H\hi'); ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</article>
