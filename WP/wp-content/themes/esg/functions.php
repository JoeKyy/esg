<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    add_theme_support('woocommerce');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}
add_action('admin_notices', 'blankslate_notice');
function blankslate_notice()
{
    $user_id = get_current_user_id();
    $admin_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $param = (count($_GET)) ? '&' : '?';
    if (!get_user_meta($user_id, 'blankslate_notice_dismissed_8') && current_user_can('manage_options'))
        echo '<div class="notice notice-info"><p><a href="' . esc_url($admin_url), esc_html($param) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__('Ⓧ', 'blankslate') . '</big></a>' . wp_kses_post(__('<big><strong>📝 Thank you for using BlankSlate!</strong></big>', 'blankslate')) . '<br /><br /><a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__('Review', 'blankslate') . '</a> <a href="https://github.com/tidythemes/blankslate/issues" class="button-primary" target="_blank">' . esc_html__('Feature Requests & Support', 'blankslate') . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__('Donate', 'blankslate') . '</a></p></div>';
}
add_action('admin_init', 'blankslate_notice_dismissed');
function blankslate_notice_dismissed()
{
    $user_id = get_current_user_id();
    if (isset($_GET['dismiss']))
        add_user_meta($user_id, 'blankslate_notice_dismissed_8', 'true', true);
}
add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
}
add_action('wp_footer', 'blankslate_footer');
function blankslate_footer()
{
    ?>
    <script>
            jQuery(document) .ready        (function ($) {
                var deviceAgent = navigat        or.userAgent.toLowerCase();
                if (dev            iceAgent.match(/(iphone|ipo            d|ipad)/)) {
                    $        ("        html").addClass("ios");
                                $("html").addClass("mobile");
                }
                if         (d        eviceAgent.match(/(Android)/)) {
                                $("html").addClass("andr        oi        d");
                    $("html").addClass("mobile");
                            }
                if (nav        ig        ator.userAgent.search("MSIE") >= 0) {
                    $            ("html").addClass("ie");
                                }
                else if (navigator.userAgent.search("Chrome") >= 0) {
                    $("html").            addClass("chrome");
                                }
                else if (navigator.userAgent.search("Fi            refox") >= 0) {
                                $("html").addClass("firefox");
                }
                else if (navigator.userAgent.search("Safari") >= 0&& navigator.userAgent.search("Chrome") < 0) {
                    $("html").addClass("safari");
                }
                else if (navigator.userAgent.search("Opera") >= 0) {
                    $("html").addClass("opera");
                }
            });
    </script>
    <?php
}
add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
    $sep = esc_html('|');
    return $sep;
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return esc_html('...');
    } else {
        return wp_kses_post($title);
    }
}
function blankslate_schema_type()
{
    $schema = 'https://schema.org/';
    if (is_single()) {
        $type = "Article";
    } elseif (is_author()) {
        $type = 'ProfilePage';
    } elseif (is_search()) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}
add_filter('nav_menu_link_attributes', 'blankslate_schema_url', 10);
function blankslate_schema_url($atts)
{
    $atts['itemprop'] = 'url';
    return $atts;
}
if (!function_exists('blankslate_wp_body_open')) {
    function blankslate_wp_body_open()
    {
        do_action('wp_body_open');
    }
}
add_action('wp_body_open', 'blankslate_skip_link', 5);
function blankslate_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'blankslate') . '</a>';
}
add_filter('the_content_more_link', 'blankslate_read_more_link');
function blankslate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
function blankslate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
            'id' => 'primary-widget-area',
            'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}
add_action('wp_head', 'blankslate_pingback_header');
function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function blankslate_custom_pings($comment)
{
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <?php echo esc_url(comment_author_link()); ?>
    </li>
    <?php
}
add_filter('get_comments_number', 'blankslate_comment_count', 0);
function blankslate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

function post_navigation()
{
    echo '<div class="navigation">';
    echo '  <div class="next-posts">' .
        get_next_posts_link("&laquo; Older Entries") .
        "</div>";
    echo '  <div class="prev-posts">' .
        get_previous_posts_link("Newer Entries &raquo;") .
        "</div>";
    echo "</div>";
}

function register_my_menus()
{
    register_nav_menus([
        "footer-1" => __("Footer 1"),
    ]);
}
add_action("init", "register_my_menus");

add_theme_support("post-thumbnails");

function get_excerpt($limit = "", $after = "")
{
    if ($limit) {
        $l = $limit;
    } else {
        $l = "140";
    }

    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])", "", $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $l);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace("/\s+/", " ", $excerpt));

    if ($after) {
        $a = $after;
    } else {
        $a = "...";
    }

    $excerpt = $excerpt . $a;
    return $excerpt;
}

//To keep the count accurate, lets get rid of prefetching
remove_action("wp_head", "adjacent_posts_rel_link_wp_head", 10, 0);

add_filter("the_content", "remove_empty_p", 20, 1);

function remove_empty_p($content)
{
    $content = force_balance_tags($content);
    return preg_replace("#<p>\s*+(<br\s*/*>)?\s*</p>#i", "", $content);
}

add_filter("the_excerpt", "remove_empty_p2", 20, 1);

function remove_empty_p2($excerpt)
{
    $excerpt = force_balance_tags($excerpt);
    return preg_replace("#<p>\s*+(<br\s*/*>)?\s*</p>#i", "", $excerpt);
}

function remove_empty_tags_recursive($str, $repto = null)
{
    $str = force_balance_tags($str);
    //** Return if string not given or empty.
    if (!is_string($str) || trim($str) == "" || trim($str) == "&nbsp;") {
        return $str;
    }

    //** Recursive empty HTML tags.
    return preg_replace(
        //** Pattern written by Junaid Atari.
        '/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU',

        //** Replace with nothing if string empty.
        !is_string($repto) ? "" : $repto,

        //** Source string
        $str
    );
}

function remove_thumbnail_dimensions_for_single($html) {
    if (is_single()) {
        $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
    }
    return $html;
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions_for_single', 10);

function custom_breadcrumb() {
    echo '<div class="breadcrumb"><strong>';

    // Página inicial
    echo '<a href="' . home_url() . '">Home</a>';

    if (is_category()) {
        $category = get_queried_object();
        echo ' » ' . $category->name;
    } elseif (is_tag()) {
        $tag = get_queried_object();
        echo ' » Tag: ' . $tag->name;
    } elseif (is_page()) {
        echo ' » ' . get_the_title();
    } elseif (is_single()) {
        $categories = get_the_category();
        if (!empty($categories)) {
            echo ' » <a href="' . get_category_link($categories[0]->term_id) . '">' . $categories[0]->name . '</a>';
        }
    } elseif (is_search()) {
        echo ' » Resultados de pesquisa para: ' . get_search_query();
    } elseif (is_404()) {
        echo ' » Página não encontrada';
    }

    echo '</strong></div>';
}

function redirect_attachment_to_home() {
    if (is_attachment()) {
        global $post;
        if ($post && $post->post_parent) {
            wp_redirect(esc_url(get_permalink($post->post_parent)), 301);
            exit;
        } else {
            wp_redirect(esc_url(home_url('/')), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'redirect_attachment_to_home');

function exclude_categories_from_main_query($query) {
    if ($query->is_home() && $query->is_main_query()) {
        $exclude_categories = array('artigos', 'entrevistas', 'infonews');
        $exclude_ids = array();

        foreach ($exclude_categories as $slug) {
            $cat = get_category_by_slug($slug);
            if ($cat) {
                $exclude_ids[] = $cat->term_id;
            }
        }

        $query->set('category__not_in', $exclude_ids);
    }
}
add_action('pre_get_posts', 'exclude_categories_from_main_query');

function custom_author_meta_box() {
    add_meta_box('custom_author_meta_box', 'Informações do Autor', 'display_custom_author_meta_box', 'post', 'side', 'high');
}
add_action('add_meta_boxes', 'custom_author_meta_box');

function display_custom_author_meta_box($post) {
    $custom_author_name = get_post_meta($post->ID, '_custom_author_name', true);
    $custom_author_image = get_post_meta($post->ID, '_custom_author_image', true);
    ?>
    <p>
        <label>Nome do Autor:</label><br />
        <input type="text" name="_custom_author_name" value="<?php echo esc_attr($custom_author_name); ?>" style="width:100%;" />
    </p>
    <p>
        <label>Imagem do Autor:</label><br />
        <input type="text" name="_custom_author_image" id="custom_author_image" value="<?php echo esc_url($custom_author_image); ?>" style="width:75%;" />
        <input type="button" id="custom_author_image_button" class="button" value="Upload" />
    </p>
    <script>
        jQuery(document).ready(function($) {
            $('#custom_author_image_button').click(function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: 'Upload Image',
                    multiple: false
                }).open().on('select', function(e){
                    var uploaded_image = image.state().get('selection').first();
                    var image_url = uploaded_image.toJSON().url;
                    $('#custom_author_image').val(image_url);
                });
            });
        });
    </script>
    <?php
}

function save_custom_author_meta_box_data($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (isset($_POST['_custom_author_name'])) {
        update_post_meta($post_id, '_custom_author_name', sanitize_text_field($_POST['_custom_author_name']));
    }

    if (isset($_POST['_custom_author_image'])) {
        update_post_meta($post_id, '_custom_author_image', esc_url_raw($_POST['_custom_author_image']));
    }
}
add_action('save_post', 'save_custom_author_meta_box_data');

function enqueue_admin_scripts() {
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'enqueue_admin_scripts');
