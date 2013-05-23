<?php

class Ytc_Category_Post_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ytc_category_post_widget',
            'Ytc Category Post Widget',
            array('description' => __('Display Category Post Widget', 'ytc'))
        );
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['bg_color'] = $new_instance['bg_color'];
        $instance['custom_bg_color'] = $new_instance['custom_bg_color'];
        $instance['custom_text_color'] = $new_instance['custom_text_color'];
        $instance['category'] = $new_instance['category'];
        $instance['post_number'] = $new_instance['post_number'];

        return $instance;
    }

    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => __('Category', 'ytc'),
            'bg_color' => 'red-set',
            'custom_bg_color' => '',
            'custom_text_color' => '',
            'category' => '',
            'post_number' => 5
        ));

        $title = $instance['title']; 
        $bg_color = $instance['bg_color'];
        $custom_bg_color = $instance['custom_bg_color'];
        $custom_text_color = $instance['custom_text_color'];
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
        <label for="<?php echo $this->get_field_id( 'bg_color' ); ?>"><?php _e( 'Background color:', 'ytc' ); ?></label> 
        <select name="<?php echo $this->get_field_name('bg_color'); ?>" id="<?php echo $this->get_field_id('bg_color'); ?>">
            <option value="red-set"><?php _e('Select a background color', 'ytc'); ?></option>
            <option value="red-set" <?php if ($bg_color == 'red-set') echo 'selected'; ?>><?php _e('Red', 'ytc'); ?></option>
            <option value="yellow-set" <?php if ($bg_color == 'yellow-set') echo 'selected'; ?>><?php _e('Yellow', 'ytc'); ?></option>
            <option value="green-set" <?php if ($bg_color == 'green-set') echo 'selected'; ?>><?php _e('Green', 'ytc'); ?></option>
            <option value="orange-set" <?php if ($bg_color == 'orange-set') echo 'selected'; ?>><?php _e('Orange', 'ytc'); ?></option>
            <option value="blue-set" <?php if ($bg_color == 'blue-set') echo 'selected'; ?>><?php _e('Blue', 'ytc'); ?></option>

        </select>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'custom_bg_color' ); ?>"><?php _e( 'Custom background color (enter hex color code here)', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'custom_bg_color' ); ?>" name="<?php echo $this->get_field_name( 'custom_bg_color' ); ?>" type="text" value="<?php echo esc_attr( $custom_bg_color ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'custom_text_color' ); ?>"><?php _e( 'Custom text color (enter hex color code here)', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'custom_text_color' ); ?>" name="<?php echo $this->get_field_name( 'custom_text_color' ); ?>" type="text" value="<?php echo esc_attr( $custom_text_color ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Category:', 'ytc' ); ?></label> 
        <select name="<?php echo $this->get_field_name('category'); ?>" id="<?php echo $this->get_field_id('category'); ?>">
                
            <?php $categories = get_categories();
            foreach ($categories as $cat) : ?>

                <option value="<?php echo $cat->cat_ID; ?>" <?php echo $category == $cat->cat_ID ? 'selected' : ''; ?>>
                    <?php echo $cat->name; ?>
                </option>

            <?php endforeach; ?>

        </select>
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'post_number' ); ?>"><?php _e('Number of posts to show:', 'ytc'); ?></label>
        <input id="<?php echo $this->get_field_id( 'post_number' ); ?>" name="<?php echo $this->get_field_name( 'post_number' ); ?>" type="text" value="<?php echo esc_attr( $post_number ); ?>" size="3">
        </p>

    <?php }

    public function widget($args, $instance) {
        extract($args);

        $title = $instance['title'];
        $bg_color = $instance['bg_color'];
        $custom_bg_color = $instance['custom_bg_color'];
        $custom_text_color = $instance['custom_text_color'];
        $category = $instance['category'];
        $post_number = $instance['post_number'];

        if ($custom_bg_color != '' && preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $custom_bg_color) &&
            $custom_text_color != '' && preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $custom_text_color))
            $custom_styles = 'style="'.
                                   'background-color:'.$custom_bg_color.';'.
                                   'color:'.$custom_text_color.
                             '"';
        else 
            $custom_styles = '';

        echo $before_widget; ?>
            <div class="category-post-widget">
                <a title="<?php echo $title; ?>" class="category-post-title <?php echo $bg_color; ?>" 
                    href="<?php echo get_category_link($category);?>" <?php echo $custom_styles; ?>>
                    <?php echo $title; ?>
                </a>
                
                <div class="category-post-container">
                    
                    <?php 
                    $loop = new WP_Query(array(
                        'cat' => $category,
                        'posts_per_page' => 1,
                        'ignore_sticky_posts' => 1
                    )); 
                    
                    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                        $first_post_id = get_the_ID();
                    ?>
                        
                        <div class="category-newest-post">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('widget-size'); ?></a>
                            <a title="<?php the_title(); ?>" class="newest-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="newest-post-excerpt"><?php the_excerpt(); ?></div>
                        </div> <!-- .newest-post -->

                    <?php endwhile; endif; 

                    wp_reset_postdata(); 

                    $loop = new WP_Query(array(
                        'cat' => $category,
                        'posts_per_page' => $post_number - 1,
                        'post__not_in' => array($first_post_id),
                        'ignore_sticky_posts' => 1
                    ));

                    if ($loop->have_posts()) : ?>

                        <ul class="recent-category-post">

                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>

                            <li class="more-post"><a href="<?php echo get_category_link($category);?>"><?php _e('More post...', 'ytc'); ?></a></li>
                        </ul> <!-- .recent-category-post -->

                    <?php endif; 
                    wp_reset_postdata(); 
                    ?>
                </div> <!-- category-post-container -->
            </div> <!-- .category-post-widget -->
    <?php 
        echo $after_widget;
    }
}


// register widget
add_action("widgets_init", 'ytc_register_category_post_widget');

function ytc_register_category_post_widget() {
    register_widget('Ytc_Category_Post_Widget');
}