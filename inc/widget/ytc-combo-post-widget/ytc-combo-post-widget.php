<?php

class Ytc_Combo_Post_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ytc_combo_post_widget',
            'Ytc Combo Post Widget',
            array('description' => __('Display Combo Post Widget which includes popular posts and recent posts', 'ytc'))
        );
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['popular_title'] = strip_tags($new_instance['popular_title']);
        $instance['recent_title'] = strip_tags($new_instance['recent_title']);
        $instance['category'] = $new_instance['category'];
        $instance['post_number'] = $new_instance['post_number'];

        return $instance;
    }

    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => '',
            'popular_title' => __('Popular Posts', 'ytc'),
            'recent_title' => __('Recent Posts', 'ytc'),
            'category' => '',
            'post_number' => 5,
        ));

        $title = $instance['title']; 
        $popular_title = $instance['popular_title'];
        $recent_title = $instance['recent_title'];
        $category = $instance['category'];   
        $post_number = $instance['post_number'];

        if (!is_numeric($post_number) || (int)$post_number <= 0)
            $post_number = 5;
    ?>

        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'popular_title' ); ?>"><?php _e( 'Popular Posts Title:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'popular_title' ); ?>" name="<?php echo $this->get_field_name( 'popular_title' ); ?>" type="text" value="<?php echo esc_attr( $popular_title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'recent_title' ); ?>"><?php _e( 'Recent Posts Title:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'recent_title' ); ?>" name="<?php echo $this->get_field_name( 'recent_title' ); ?>" type="text" value="<?php echo esc_attr( $recent_title ); ?>" />
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
        <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e('Number of posts to show each tab:', 'ytc'); ?></label>
        <input id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="text" value="<?php echo esc_attr( $post_number ); ?>" size="3">
        </p>

    <?php }

    public function widget($args, $instance) {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $popular_title = $instance['popular_title'] ? $instance['popular_title'] : __('Popular Posts', 'ytc');
        $recent_title = $instance['recent_title'] ? $instance['recent_title'] : __('Recent Posts', 'ytc');
        $category = $instance['category'];
        $post_number = $instance['post_number'];

        echo $before_widget; ?>
            <div class="combo-widget">

                <?php if (trim($title) != '') echo $before_title . $title . $after_title; ?>
                
                <div id="tabber">
                    <ul class="tabs">
                        <li>
                            <a href="#<?php echo $this->get_field_id( 'popular-posts' ); ?>" class="selected"><?php echo $popular_title; ?></a>
                        </li>
                        <li>
                            <a href="#<?php echo $this->get_field_id( 'recent-posts' ); ?>"><?php echo $recent_title; ?></a>
                        </li>
                    </ul> <!-- .tabs -->

                    <div class="inside">
                        <div id="<?php echo $this->get_field_id( 'popular-posts' ); ?>" class="tab-post selected">
                            <?php 
                            $loop = new WP_Query(array(
                                'cat' => $category,
                                'posts_per_page' => $post_number,
                                'orderby' => 'comment_count',
                                'ignore_sticky_posts' => 1
                            )); 
                            
                            if ($loop->have_posts()) : ?>
                                <ul> 
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <li>
                                            <div class="left">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('widget-size'); ?>
                                                </a>
                                            </div>

                                            <div class="info">
                                                <p class="entry-title">
                                                    <a href="<?php the_permalink(); ?>" 
                                                        title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                </p>
                                                <span class="tab-meta">
                                                    <span><?php the_time(get_option('date_format')); ?></span>
                                                    <span><?php 
                                                        if (comments_open() && !post_password_required()) {
                                                            comments_popup_link(__('No comments', 'ytc'), 
                                                                                __('1 comment', 'ytc'), 
                                                                                __('% comments', 'ytc') );
                                                        } ?>
                                                    </span>
                                                </span>
                                            </div> <!-- info -->
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; 
                            wp_reset_postdata();
                            ?>
                        </div> <!-- #popular-posts -->

                        <div id="<?php echo $this->get_field_id( 'recent-posts' ); ?>" class="tab-post">
                            <?php 
                            $loop = new WP_Query(array(
                                'cat' => $category,
                                'posts_per_page' => $post_number,
                                'ignore_sticky_posts' => 1
                            )); 
                            
                            if ($loop->have_posts()) : ?>
                                <ul> 
                                    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                        <li>
                                            <div class="left">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('widget-size'); ?>
                                                </a>
                                            </div>

                                            <div class="info">
                                                <p class="entry-title">
                                                    <a href="<?php the_permalink(); ?>" 
                                                        title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                                </p>
                                                <span class="tab-meta">
                                                    <span><?php the_time(get_option('date_format')); ?></span>
                                                    <span><?php 
                                                        if (comments_open() && !post_password_required()) {
                                                            comments_popup_link(__('No comments', 'ytc'), 
                                                                                __('1 comment', 'ytc'), 
                                                                                __('% comments', 'ytc') );
                                                        } ?>
                                                    </span>
                                                </span>
                                            </div> <!-- info -->
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; 
                            wp_reset_postdata();
                            ?>
                        </div> <!-- #recent-posts -->

                        
                    </div> <!-- .inside -->
                </div> <!-- #tabber -->

            </div> <!-- .sidebar-widget -->
    <?php 
        echo $after_widget;
    }
}


// register widget
add_action("widgets_init", 'ytc_register_combo_post_widget');

function ytc_register_combo_post_widget() {
    register_widget('Ytc_Combo_Post_Widget');
}