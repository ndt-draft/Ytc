<?php

// register post type
// code goes here...

// register taxonomy
// code goes here...

function ytc_register_video_posttype() {
    register_post_type('video', 
        array(  
            'label' => 'Videos',
            'description' => 'Video Custom Post Type',
            'public' => true,
            'show_ui' => true,
            // 'publicly_queryable' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'has_archive' => false,
            'hierarchical' => true,
            'rewrite' => array(
                'slug' => 'video',
                'with_front' => false
            ),
            'query_var' => true,
            // 'exclude_from_search' => false,
            'menu_position' => 5,
            'menu_icon' => get_template_directory_uri() . '/inc/video-post-type/img/video_icon.png',
            'taxonomies' => array(),
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'comments'
            ),
            'labels' => array ( 
                'name' => 'Videos',
                'singular_name' => 'Video',
                'menu_name' => 'Videos',
                'add_new' => 'Add Video',
                'add_new_item' => 'Add New Video',
                'edit' => 'Edit',
                'edit_item' => 'Edit Video',
                'new_item' => 'New Video',
                'view' => 'View Video',
                'view_item' => 'View Video',
                'search_items' => 'Search Videos',
                'not_found' => 'No Videos Found',
                'not_found_in_trash' => 'No Videos found in Trash',
                'parent' => 'Parent Video',
            )
        ) 
    );

    // flush_rewrite_rules();

    register_taxonomy('video_cat', 'video',
        array( 
            'label' => 'Video Categories',
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'video-category', 'with_front' => false),
            'singular_label' => 'Video Category',
            'hierarchical' => true
        ) 
    );
}

add_action('init', 'ytc_register_video_posttype', 0);


// meta box for video
$video_2_metabox = array(
    'id'       => 'ytc_video_embed',
    'title'    => __('Video Embed', 'ytc'),
    'page'     => array('video'),
    'context'  => 'normal',
    'priority' => 'default',
    'fields'   => array(
        array(
            'name'        => __('Video Embed Url', 'ytc'),
            'desc'        => __('Ex', 'ytc') .': http://www.youtube.com/watch?v=PT2qvaLP4uU <br>http://vimeo.com/22894905',
            'id'          => 'ytc_video_url',
            'class'       => 'ytc_video_url',
            'type'        => 'text',
            'rich_editor' => 0,
            'max'         => 0,
            'std'         => ''
        ),
        array(
            'name'        => __('Video Width', 'ytc'),
            'desc'        => '',
            'id'          => 'ytc_video_width',
            'class'       => 'ytc_video_width',
            'type'        => 'number',
            'rich_editor' => 0,
            'max'         => 0,
            'std'         => '640'
        ),
        array(
            'name'        => __('Video Heigh', 'ytc'),
            'desc'        => '',
            'id'          => 'ytc_video_heigh',
            'class'       => 'ytc_video_heigh',
            'type'        => 'number',
            'rich_editor' => 0,
            'max'         => 0,
            'std'         => '360'
        )
    )
); 

add_action('admin_menu', 'ytc_add_video_2_meta_box');

function ytc_add_video_2_meta_box() {
    global $video_2_metabox;

    foreach ($video_2_metabox['page'] as $page) {
        add_meta_box($video_2_metabox['id'], $video_2_metabox['title'],
            'ytc_show_video_2_box', $page, 'normal', 'default', $video_2_metabox);
    }
}

// function to show metaboxes
function ytc_show_video_2_box() {
    global $post;
    global $video_2_metabox;

    // use nonce for verification
    wp_nonce_field(basename(__FILE__), 'ytc_video_2_metabox_nonce');

    echo '<table class="form-table">';
 
    foreach ($video_2_metabox['fields'] as $field) {
        // get current post meta data
 
        $meta = get_post_meta($post->ID, $field['id'], true);
         
        echo '<tr>',
                '<th style="width:20%"><label for="', $field['id'], '">', stripslashes($field['name']), '</label></th>',
                '<td class="wptuts_field_type_' . str_replace(' ', '_', $field['type']) . '">';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" /><br/>', '', stripslashes($field['desc']);
                break;
            case 'number':
                echo '<input type="number" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:10%"/><br/>', '', stripslashes($field['desc']);
                break;
        }
        echo    '<td>',
            '</tr>';
    }
     
    echo '</table>';
}

// save data from meta box
add_action('save_post', 'ytc_video_2_save');
function ytc_video_2_save($post_id) {
    global $post;
    global $video_2_metabox;
     
    // verify nonce
    if (isset($_POST['ytc_video_2_metabox_nonce']) &&
        !wp_verify_nonce($_POST['ytc_video_2_metabox_nonce'], basename(__FILE__))) {
        return $post_id;
    }

    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
 
    // check permissions
    if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    foreach ($video_2_metabox['fields'] as $field) {
        
        if (isset($_POST[$field['id']])) { 

            $old = get_post_meta($post_id, $field['id'], true);
            $new = $_POST[$field['id']];
             
            if ($new && $new != $old) {
                if($field['type'] == 'date') {
                    $new = wptuts_format_date($new);
                    update_post_meta($post_id, $field['id'], $new);
                } else {
                    if(is_string($new)) {
                        $new = $new;
                    } 
                    update_post_meta($post_id, $field['id'], $new);   
                }
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        }
    }
}

/* 
 * style for admin panel
 */
add_filter('manage_edit-video_columns', 'ytc_manager_edit_columns');

function ytc_manager_edit_columns($columns) {
    $columns = array(
        "cb" => "<input type=\"checkbox\" />",
        "title" => __('Video Name', 'ytc'),
        'cat' => __('Category', 'ytc')
    );

    return $columns;
}

add_action('manage_video_posts_custom_column', 'ytc_manager_custom_columns');

function ytc_manager_custom_columns($column) {
    global $post;

    $custom = get_post_custom();

    switch ($column) {
        case 'cat':
            echo get_the_term_list($post->ID, 'video_cat', '', ', ');
    }
}


// styling for the video custom post type
add_action('admin_head', 'ytc_video_icon');

function ytc_video_icon() {
    ?>
    <style>
        #icon-edit.icon32-posts-video {
            background: url(<?php echo get_template_directory_uri() . 
                '/inc/video-post-type/img/video_icon_32.png'; ?>) no-repeat;
        }
    </style>
<?php }

// set default video category
function mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status ) {
        $defaults = array(
            'video_cat' => array( 'Uncategorized Video' ),
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'mfields_set_default_object_terms', 100, 2 );