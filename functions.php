<?php
/*****************************************************************************/
/* Define Constants */
/*****************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT . '/assets/img');
define('FAVICON', THEMEROOT . '/assets/ico');

/*****************************************************************************/
/* Less -> css, php compiler */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/lessphp/lessc.inc.php');

/*****************************************************************************/
/* Translating */
/*****************************************************************************/
load_theme_textdomain('ytc', get_template_directory() . '/languages');

/*****************************************************************************/
/* Support Woocommerce */
/*****************************************************************************/
add_theme_support( 'woocommerce' );

/*****************************************************************************/
/* RSS */
/*****************************************************************************/
add_theme_support( 'automatic-feed-links' );

/*****************************************************************************/
/* Add theme support for post thumbnails */
/*****************************************************************************/
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails', array('post'));

    /*set_post_thumbnail_size(210, 210);*/
    add_image_size('post-thumbnail-size', 300, 200, true);
    add_image_size('widget-size', 90, 60, true);
    add_image_size('video-widget-thumbnail-size', 180, 120, true);
    // add_image_size('featured-size', 742, 371, true);
}
if ( ! isset( $content_width ) ) $content_width = 770;


/*****************************************************************************/
/* Load Javascript */
/*****************************************************************************/
if (!is_admin()) add_action("wp_enqueue_scripts", "ytc_jquery_enqueue", 11);

function ytc_jquery_enqueue() {
    
    wp_register_script('flexslider', THEMEROOT . '/assets/js/jquery.flexslider.js', array('jquery'), '1.1', true);
    wp_register_script('custom_flexslider', THEMEROOT . '/assets/js/scripts-flexslider.js', array('jquery', 'flexslider'), '1.0', true);
    wp_register_script('fitvid', THEMEROOT . '/assets/js/jquery.fitvids.js', array('jquery'), '1.0', true);
    wp_register_script('custom_fitvid', THEMEROOT . '/assets/js/scripts-fitvids.js', array('jquery', 'fitvid'), '1.0', true);
    wp_register_script('custom_js', THEMEROOT . '/assets/js/scripts.js', array('jquery'), '1.0', true);
    wp_register_script('backtotop', THEMEROOT . '/assets/js/backtotop.js', array('jquery'), '1.0', true);

    wp_register_style('flexslider_style', THEMEROOT . '/assets/css/flexslider-mod.css', array(), '1.0');

    if (is_singular()) {
        wp_enqueue_script('fitvid');
        wp_enqueue_script('custom_fitvid');
    }

    // Home, Blog template does not need fitvid
    // if (is_page_template('page-blog.php')) {
    //     wp_dequeue_script('fitvid');
    //     wp_dequeue_script('custom_fitvid');
    // }

    wp_enqueue_script('custom_js');
    wp_enqueue_script('backtotop');

    wp_enqueue_script('prettyPhoto', THEMEROOT . '/assets/js/jquery.prettyPhoto.js', array('jquery'), '3.1.5', true);
    wp_enqueue_style('prettyPhotoStyle', THEMEROOT . '/assets/css/prettyPhoto.css', array(), '3.1.5');
}


/*****************************************************************************/
/* Theme options */
/*****************************************************************************/
require(get_template_directory() . '/inc/theme-options/theme-options.php');

/*****************************************************************************/
/* Menus */
/*****************************************************************************/
function register_my_menus() {
    register_nav_menus(array(
        'top-menu' => __('Top Menu', 'ytc'),
        'main-menu' => __('Main Menu', 'ytc')
    ));
}

add_action('init', 'register_my_menus');

/*****************************************************************************/
/* Register Sidebar */
/*****************************************************************************/
if (function_exists('register_sidebar')) {
    
    register_sidebar(array(
        'name' => __('Homepage Column Sidebar 1', 'ytc'),
        'id' => 'column-1-sidebar',
        'description' => __('The homepage column sidebar 1 area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Homepage Column Sidebar 2', 'ytc'),
        'id' => 'column-2-sidebar',
        'description' => __('The homepage column sidebar 2 area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Homepage Main Sidebar', 'ytc'),
        'id' => 'home-sidebar',
        'description' => __('The homepage sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Column Sidebar 1', 'ytc'),
        'id' => 'footer-column-1-sidebar',
        'description' => __('The footer column sidebar 1 area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Column Sidebar 2', 'ytc'),
        'id' => 'footer-column-2-sidebar',
        'description' => __('The footer column sidebar 2 area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Footer Column Sidebar 3', 'ytc'),
        'id' => 'footer-column-3-sidebar',
        'description' => __('The footer column sidebar 3 area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Blog Main Sidebar', 'ytc'),
        'id' => 'blog-sidebar',
        'description' => __('The blog sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Single Blog Post Sidebar', 'ytc'),
        'id' => 'single-post-sidebar',
        'description' => __('The single blog post sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'ytc'),
        'id' => 'shop-sidebar',
        'description' => __('The shop sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Single Product Sidebar', 'ytc'),
        'id' => 'single-product-sidebar',
        'description' => __('The single product sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Normal Page Sidebar', 'ytc'),
        'id' => 'normal-sidebar',
        'description' => __('The normal page sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('404 Page Sidebar', 'ytc'),
        'id' => 'fourohfour-sidebar',
        'description' => __('The 404 page sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Video Page Sidebar', 'ytc'),
        'id' => 'video-sidebar',
        'description' => __('The video page sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => __('Single Video Page Sidebar', 'ytc'),
        'id' => 'single-video-sidebar',
        'description' => __('The single video page sidebar area', 'ytc'),
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    ));

}


/*****************************************************************************/
/* Widget */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/widget/widget.php');


/*****************************************************************************/
/* Utility Function */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/function-utility.php');



/*****************************************************************************/
/* Comments */
/*****************************************************************************/
function adribbon_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    $args['reply_text'] = __('Reply', 'ytc');

    if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
        
        <li class="pingback" id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class(); ?>>    
                <header>
                    <h5><?php _e('Pingback', 'ytc'); ?></h5>
                    <p><?php edit_comment_link(); ?></p>
                </header>

                <p><?php comment_author_link(); ?></p>
            </article>
        </li>

    <?php elseif (get_comment_type() == 'comment') : ?>
        <li id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class(); ?>>
                <header class="clearfix">
                    <figure class="comment-avatar">
                        <?php echo get_avatar($comment, 100); ?>
                    </figure>

                    <h5 class="comment-author">
                        <?php if ($comment->user_id == 1) : ?>
                            <span><?php _e('Admin', 'ytc'); ?></span>
                        <?php endif; ?>
                        
                        <?php comment_author_link(); ?>
                    </h5>
                    
                    <p class="comment-time"><?php _e('on', 'ytc'); ?> <?php comment_date(); ?> <?php _e('at', 'ytc'); ?> <?php comment_time(); ?>
                        <?php comment_reply_link(array_merge(
                            $args, array('depth' => $depth, 
                                         'max_depth' => $args['max_depth'])
                        )); ?>
                    </p>
                </header>

                <?php if ($comment->comment_approved == '0') : ?>

                    <p class="awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'ytc'); ?></p>
                
                <?php endif; ?>

                <?php comment_text(); ?>
            </article>
        
    <?php endif;
}

/*****************************************************************************/
/* Custom Comment Form */
/*****************************************************************************/
function adribbon_custom_comment_form($defaults) {
    $defaults['comment_notes_before'] = '';
    $defaults['comment_notes_after'] = '<p class="form-allowed-tags">' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'ytc' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>';
    $defaults['title_reply'] = __('Leave a reply', 'ytc');
    $defaults['cancel_reply_link'] = __('Cancel reply', 'ytc');
    $defaults['label_submit'] = __('Post Comment', 'ytc');
    
    $defaults['id'] = 'commentform';
    $defaults['comment_field'] = '<p><textarea name="comment" id="comment" cols="30" rows="10"></textarea></p>';
    
    return $defaults;
}

add_filter('comment_form_defaults', 'adribbon_custom_comment_form');

function adribbon_custom_comment_fields($fields) {
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : ' ');

    $fields = array(
        'author' => '<p>' .
                        '<input type="text" name="author" id="author" value="' .
                            esc_attr($commenter['comment_author']) . '"' . $aria_req . '>' .
                        '<label for="author">' . __('Name', 'ytc') . ($req ? ' *' : '') . '</label>' .
                    '</p>',
        'email'  => '<p>' .
                        '<input type="text" name="email" id="email" value="' .
                            esc_attr($commenter['comment_author_email']) . '"' . $aria_req . '>' .
                        '<label for="email">' . __('Email', 'ytc') . ($req ? ' *' : '') . '</label>' .
                    '</p>',
        'url'    => '<p>' .
                        '<input type="text" name="url" id="url" value="' .
                            esc_attr($commenter['comment_author_url']) . '"' . $aria_req . '>' .
                        '<label for="url">' . __('Website', 'ytc') . '</label>' .
                    '</p>'
    );

    return $fields;
}

add_filter('comment_form_default_fields', 'adribbon_custom_comment_fields');


/*****************************************************************************/
/* Woocommerce settings */
/*****************************************************************************/
require_once(get_template_directory() . '/woocommerce/woocommerce-config.php');

/*****************************************************************************/
/* Shortcodes */
/*****************************************************************************/
require_once(get_template_directory() . '/inc/shortcodes/ytc-shortcodes.php');

/*****************************************************************************/
/* Dynamic CSS */
/*****************************************************************************/
add_action('wp_head', 'ytc_dynamic_css');

function ytc_dynamic_css() {
    include(get_template_directory() . '/inc/custom_bg.php');
}


/*****************************************************************************/
/* Video custom post type 
   post type
     title
     excerpt
     image thumbnail: 400x100
     custom meta box
         video link: youtube or vimeo
         width
         height
   taxonomy
   video widget
   video page template*/
/*****************************************************************************/
require_once(get_template_directory() . '/inc/video-post-type/video-post-type.php');


/*****************************************************************************/
/* Customize login page */
/*****************************************************************************/
// require_once(get_template_directory() . '/inc/login/login.php');


