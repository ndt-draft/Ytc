<?php

class Ytc_Recent_Post_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ytc_recent_post_widget',
            'Ytc Recent Post Widget',
            array('description' => __('Display Recent Post Widget, each post has its thumbnail', 'ytc'))
        );
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['category'] = $new_instance['category'];
        $instance['post_number'] = $new_instance['post_number'];
        $instance['orderby'] = $new_instance['orderby'];
        $instance['shuffle_result'] = (bool) $new_instance['shuffle_result'];

        return $instance;
    }

    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => __('Recent Post', 'ytc'),
            'category' => '',
            'post_number' => 5,
            'orderby' => 'date',
            'shuffle_result' => false
        ));

        $title = $instance['title']; 
        $category = $instance['category'];   
        $post_number = $instance['post_number'];
        $orderby = $instance['orderby'];
        $shuffle_result = $instance['shuffle_result'];

        if (!is_numeric($post_number) || (int)$post_number <= 0)
            $post_number = 5;
    ?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'ytc' ); ?></label> 
        <select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
            <option value=""><?php _e('Select a category', 'ytc'); ?></option>
                
            <?php $categories = get_categories();
            foreach ($categories as $cat) : ?>

                <option value="<?php echo $cat->cat_ID; ?>" <?php echo $category == $cat->cat_ID ? 'selected' : ''; ?>>
                    <?php echo $cat->name; ?>
                </option>

            <?php endforeach; ?>

        </select>
        </p>

        <p>
        <input id="<?php echo $this->get_field_id( 'orderby' ); ?>-recent" name="<?php echo $this->get_field_name( 'orderby' ); ?>" type="radio" value="date" <?php echo ($orderby == 'date') ? 'checked' : ''; ?>>
        <label for="<?php echo $this->get_field_id( 'orderby' ); ?>-recent"><?php _e( 'Recent', 'ytc' ); ?></label> 
        
        <input id="<?php echo $this->get_field_id( 'orderby' ); ?>-popular" name="<?php echo $this->get_field_name( 'orderby' ); ?>" type="radio" value="comment_count" <?php echo ($orderby == 'comment_count') ? 'checked' : ''; ?>>
        <label for="<?php echo $this->get_field_id( 'orderby' ); ?>-popular"><?php _e( 'Popular', 'ytc' ); ?></label> 
        
        <input id="<?php echo $this->get_field_id( 'orderby' ); ?>-random" name="<?php echo $this->get_field_name( 'orderby' ); ?>" type="radio" value="rand" <?php echo ($orderby == 'rand') ? 'checked' : ''; ?>>
        <label for="<?php echo $this->get_field_id( 'orderby' ); ?>-random"><?php _e( 'Random', 'ytc' ); ?></label> 
        
        </p>

        <p>
        <input id="<?php echo $this->get_field_id( 'shuffle_result' ); ?>" name="<?php echo $this->get_field_name( 'shuffle_result' ); ?>" type="checkbox" value="true" <?php echo ($shuffle_result ? 'checked' : ''); ?>>
        <label for="<?php echo $this->get_field_id( 'shuffle_result' ); ?>"><?php _e( 'Shuffle the result', 'ytc' ); ?></label> 
        
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e('Number of posts to show:', 'ytc'); ?></label>
        <input id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="text" value="<?php echo esc_attr( $post_number ); ?>" size="3">
        </p>

    <?php }

    public function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $category = $instance['category'];
        $post_number = $instance['post_number'];
        $orderby = $instance['orderby'];
        $shuffle_result = (bool) $instance['shuffle_result'];

        echo $before_widget; ?>
            <div class="recent-post-widget">

                <?php if ($title != '') echo $before_title . $title . $after_title;

                $loop = new WP_Query(array(
                    'cat' => $category,
                    'posts_per_page' => $post_number,
                    'orderby' => $orderby,
                    'ignore_sticky_posts' => 1
                )); 

                // shuffle the end results
                if ($shuffle_result) shuffle($loop->posts);

                if ($loop->have_posts()) : ?>

                    <ul class="recent-posts">
                                                
                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>                                        
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('widget-size'); ?></a>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="plink"><?php the_title(); ?></a>
                            <time><?php the_time(get_option('date_format')); ?></time>
                            <span><?php 
                                if (comments_open() && !post_password_required()) {
                                    comments_popup_link(__('No comments', 'ytc'), 
                                                        __('1 comment', 'ytc'), 
                                                        __('% comments', 'ytc') );
                                } ?>
                            </span>
                        </li>

                        <?php endwhile; ?>
                
                    </ul>

                <?php endif; 
                wp_reset_postdata(); 
                ?>
            </div> <!-- .sidebar-widget -->
    <?php 
        echo $after_widget;
    }
}


// register widget
add_action("widgets_init", 'ytc_register_recent_post_widget');

function ytc_register_recent_post_widget() {
    register_widget('Ytc_Recent_Post_Widget');
}