<?php 
function show_posts_nav() {
    global $wp_query;
    $show_nav = ($wp_query->max_num_pages > 1);

    if ($show_nav) { ?>
        <div class="article-nav clearfix">
                    
            <p class="article-nav-pre left">
                <?php next_posts_link(__('&laquo; Previous Posts', 'ytc'), $wp_query->max_num_pages); ?>
            </p>
            <p class="article-nav-next right">
                <?php previous_posts_link(__('Next Posts &raquo;', 'ytc'), $wp_query->max_num_pages); ?>
            </p>
        
        </div> 
    <?php }
}

/*****************************************************************************/
/* Make the "read more" link to the post */
/*****************************************************************************/
function new_excerpt_more($more) {
    global $post;
    
    return ' <a class= "more-link" href="'. get_permalink($post->ID) . '">' .
                __('Read more...', 'ytc') . 
           '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



function enable_threaded_comments(){
    if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
       wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');
