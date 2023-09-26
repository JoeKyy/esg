<?php
    $archive_year  = get_the_time('Y');
    $archive_month = get_the_time('m');
    $archive_day   = get_the_time('d');

    // Obter o nome do autor da metabox
    $custom_author_name = get_post_meta(get_the_ID(), '_custom_author_name', true);

    // Definir o link do autor
    $author_link = $custom_author_name ? get_category_link(get_cat_ID('artigos')) : esc_url(get_author_posts_url(get_the_author_meta('ID')));
?>

<div class="row">
    <div class="col-lg-9">
        <ul class="metadata">
            <li>
                <a href="<?php echo $author_link; ?>" title="<?php echo esc_attr($custom_author_name ? $custom_author_name : get_the_author()); ?>">
                    <?php echo $custom_author_name ? esc_html($custom_author_name) : get_the_author(); ?>
                </a>
            </li>
            <li>
                <ul>
                    <li>
                        <i class="fa fa fa-calendar-o" aria-hidden="true"></i>
                        <?php echo get_the_time('H\hi'); ?>
                    </li>
                    <li>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
                            <?php the_time(get_option('date_format')); ?>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="col-lg-3">
        <ul class="social--list">
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&summary=&source=" title="Compartilhar no LinkedIn" target="_blank">
                    <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" title="Compartilhar no Facebook" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" title="Compartilhar no Twitter" target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" title="Compartilhar no WhatsApp" target="_blank">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
