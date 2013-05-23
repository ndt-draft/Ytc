<?php

class Ytc_Video_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'ytc_video_widget',
            'Ytc Video Widget',
            array('description' => __('Display Video Widget', 'ytc'))
        );
    }

    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['category'] = $new_instance['category'];
        $instance['post_number'] = $new_instance['post_number'];
        $instance['orderby'] = $new_instance['orderby'];
        $instance['shuffle_result'] = (bool) $new_instance['shuffle_result'];
        $instance['style'] = $new_instance['style'];
        $instance['use_lightbox'] = (bool) $new_instance['use_lightbox'];

        return $instance;
    }

    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => __('Video', 'ytc'),
            'category' => '',
            'post_number' => 5,
            'orderby' => 'date',
            'shuffle_result' => false,
            'style' => 'normal',
            'use_lightbox' => true
        ));

        $title = $instance['title']; 
        $category = $instance['category'];   
        $post_number = $instance['post_number'];
        $orderby = $instance['orderby'];
        $shuffle_result = $instance['shuffle_result'];
        $style = $instance['style'];
        $use_lightbox = $instance['use_lightbox'];

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
                
            <?php $categories = get_categories(array('taxonomy' => 'video_cat'));
            foreach ($categories as $cat) : ?>

                <option value="<?php echo $cat->slug; ?>" <?php echo $category == $cat->slug ? 'selected' : ''; ?>>
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
        <label><?php _e('Style:', 'ytc'); ?></label>
        <input id="<?php echo $this->get_field_id( 'style' ); ?>-recent" name="<?php echo $this->get_field_name( 'style' ); ?>" type="radio" value="normal" <?php echo ($style == 'normal') ? 'checked' : ''; ?>>
        <label for="<?php echo $this->get_field_id( 'style' ); ?>-recent"><?php _e( 'Normal', 'ytc' ); ?></label> 
        
        <input id="<?php echo $this->get_field_id( 'style' ); ?>-popular" name="<?php echo $this->get_field_name( 'style' ); ?>" type="radio" value="columns" <?php echo ($style == 'columns') ? 'checked' : ''; ?>>
        <label for="<?php echo $this->get_field_id( 'style' ); ?>-popular"><?php _e( 'Columns', 'ytc' ); ?></label> 
        </p>

        <p>
        <input id="<?php echo $this->get_field_id( 'use_lightbox' ); ?>" name="<?php echo $this->get_field_name( 'use_lightbox' ); ?>" type="checkbox" value="true" <?php echo ($use_lightbox ? 'checked' : ''); ?>>
        <label for="<?php echo $this->get_field_id( 'use_lightbox' ); ?>"><?php _e( 'Use lightbox for playing video (only for columns style)', 'ytc' ); ?></label> 
        
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
        $style = $instance['style'];
        $use_lightbox = (bool) $instance['use_lightbox'];

        echo $before_widget; ?>
            <div class="recent-post-widget">

                <?php if ($title != '') echo $before_title . $title . $after_title;

                $loop = new WP_Query(array(
                    'post_type' => 'video',
                    'video_cat' => $category,
                    'posts_per_page' => $post_number,
                    'orderby' => $orderby
                )); 

                // shuffle the end results
                if ($shuffle_result) shuffle($loop->posts);

                if ($loop->have_posts()) : 
                    // Normal layout
                    if ($style == 'normal') : ?>

                        <ul class="recent-posts">
                                                    
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>                                        
                            <li>
                                <a href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>"><?php the_post_thumbnail('widget-size'); ?></a>
                                <a href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>" 
                                    title="<?php the_title(); ?>" class="plink"><?php the_title(); ?></a>
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

                    <?php // Columns layout
                    elseif ($style == 'columns') : ?>

                        <div class="video-widget-wrap clearfix">
                            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                            
                                <div class="video-widget-item">
                                    <figure class="video-widget-thumbnail-preview">
                                        <?php 
                                        $video_url = get_post_meta(get_the_ID(), 'ytc_video_url', true); 
                                        $video_width = get_post_meta(get_the_ID(), 'ytc_video_width', true); 
                                        $video_heigh = get_post_meta(get_the_ID(), 'ytc_video_heigh', true);

                                        if ($use_lightbox)
                                            $video_widget_atts = 'rel="prettyPhoto" href="'.$video_url.
                                                '?width='.$video_width.'&amp;heigh='.$video_heigh.'"';
                                        else 
                                            $video_widget_atts = 'href="'.get_permalink().'#post-'.get_the_ID().'"';

                                        ?>
                                        <a class="video-thumbnail" <?php echo $video_widget_atts; ?>> 
                                            <?php the_post_thumbnail('video-widget-thumbnail-size'); ?>
                                        </a>
                                    </figure>
                                    
                                    <a class="video-title" title="<?php the_title(); ?>" 
                                        href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </div> <!-- .video-widget-item -->

                            <?php endwhile; ?>
                        </div> <!-- .video-widget-wrap .clearfix -->
                <?php    
                    endif; 
                endif; 
                wp_reset_postdata(); 
                ?>
            </div> <!-- .recent-post-widget -->
    <?php 
        echo $after_widget;
    }
}


// register widget
add_action("widgets_init", 'ytc_register_video_widget');

function ytc_register_video_widget() {
    register_widget('Ytc_Video_Widget');
}