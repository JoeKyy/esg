<footer>
    <div class="row mt-3">
        <div class="col-lg-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9">
            <ul class="metadata">
                <li>
                    <i class="fa fa fa-tags pr-2" aria-hidden="true"></i>
                    <?php
                    // Obtém as categorias e tags do post
                    $categories = get_the_category();
                    $tags = get_the_tags();

                    $all_terms = array();

                    if ($categories) {
                        foreach ($categories as $category) {
                            $all_terms[] = '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                        }
                    }

                    if ($tags) {
                        foreach ($tags as $tag) {
                            $all_terms[] = '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
                        }
                    }

                    echo implode(', ', $all_terms);
                    ?>
                </li>
            </ul>
        </div>
        <div class="col-lg-3">
            <ul class="social--list">
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
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" title="Compartilhar no LinkedIn" target="_blank">
                        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
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
</footer>
