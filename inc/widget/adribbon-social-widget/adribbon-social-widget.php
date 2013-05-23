<?php
class Adribbon_Social_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'adribbon_social_widget',
            'Ytc Social Widget',
            array('description' => __('Displays Social Sidebar Widget', 'ytc'))
        );
    }


    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['gplus'] = strip_tags($new_instance['gplus']);
        $instance['youtube'] = strip_tags($new_instance['youtube']);
        $instance['pinterest'] = strip_tags($new_instance['pinterest']);
        $instance['digg'] = strip_tags($new_instance['digg']);
        $instance['dribbble'] = strip_tags($new_instance['dribbble']);
        $instance['flickr'] = strip_tags($new_instance['flickr']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['picasa'] = strip_tags($new_instance['picasa']);
        $instance['stumbleupon'] = strip_tags($new_instance['stumbleupon']);
        $instance['tumblr'] = strip_tags($new_instance['tumblr']);
        $instance['vimeo'] = strip_tags($new_instance['vimeo']);
        $instance['instagram'] = strip_tags($new_instance['instagram']);
        $instance['rss'] = strip_tags($new_instance['rss']);

        return $instance;
    }


    public function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => __('Social Network', 'ytc'),
            'facebook' => ot_get_option('facebook'),
            'twitter' => ot_get_option('twitter'),
            'gplus' => ot_get_option('google_plus'),
            'youtube' => ot_get_option('youtube'),
            'pinterest' => ot_get_option('pinterest'),
            'digg' => ot_get_option('digg'),
            'dribbble' => ot_get_option('dribbble'),
            'flickr' => ot_get_option('flickr'),
            'linkedin' => ot_get_option('linkedin'),
            'picasa' => ot_get_option('picasa'),
            'stumbleupon' => ot_get_option('stumbleupon'),
            'tumblr' => ot_get_option('tumblr'),
            'vimeo' => ot_get_option('vimeo'),
            'instagram' => ot_get_option('instagram'),
            'rss' => home_url() . '/feed'
        ));

        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $gplus = $instance['gplus'];
        $youtube = $instance['youtube'];
        $pinterest = $instance['pinterest'];
        $digg = $instance['digg'];
        $dribbble = $instance['dribbble'];
        $flickr = $instance['flickr'];
        $linkedin = $instance['linkedin'];
        $picasa = $instance['picasa'];
        $stumbleupon = $instance['stumbleupon'];
        $tumblr = $instance['tumblr'];
        $vimeo = $instance['vimeo'];
        $instagram = $instance['instagram'];
        $rss = $instance['rss'];
    ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_attr( $facebook ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_attr( $twitter ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'gplus' ); ?>"><?php _e( 'Google Plus:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" type="text" value="<?php echo esc_attr( $gplus ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'Youtube:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_attr( $youtube ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_attr( $pinterest ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'digg' ); ?>"><?php _e( 'Digg:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'digg' ); ?>" name="<?php echo $this->get_field_name( 'digg' ); ?>" type="text" value="<?php echo esc_attr( $digg ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" type="text" value="<?php echo esc_attr( $dribbble ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" type="text" value="<?php echo esc_attr( $flickr ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_attr( $linkedin ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'picasa' ); ?>"><?php _e( 'Picasa:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'picasa' ); ?>" name="<?php echo $this->get_field_name( 'picasa' ); ?>" type="text" value="<?php echo esc_attr( $picasa ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'stumbleupon' ); ?>"><?php _e( 'Stumbleupon:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'stumbleupon' ); ?>" name="<?php echo $this->get_field_name( 'stumbleupon' ); ?>" type="text" value="<?php echo esc_attr( $stumbleupon ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e( 'Tumblr:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" type="text" value="<?php echo esc_attr( $tumblr ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" type="text" value="<?php echo esc_attr( $vimeo ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_attr( $instagram ); ?>" />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e( 'Rss:', 'ytc' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" type="text" value="<?php echo esc_attr( $rss ); ?>" />
        </p>


    <?php } // end function form


    // display
    public function widget($args, $instance) { 
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);  
        $facebook = trim($instance['facebook']);
        $twitter = trim($instance['twitter']);
        $gplus = trim($instance['gplus']);
        $youtube =  trim($instance['youtube']);
        $pinterest = trim($instance['pinterest']);
        $digg = trim($instance['digg']);
        $dribbble = trim($instance['dribbble']);
        $flickr = trim($instance['flickr']);
        $linkedin = trim($instance['linkedin']);
        $picasa = trim($instance['picasa']);
        $stumbleupon = trim($instance['stumbleupon']);
        $tumblr = trim($instance['tumblr']);
        $vimeo = trim($instance['vimeo']);
        $instagram = trim($instance['instagram']);
        $rss = trim($instance['rss']);
    
        echo $before_widget;
            if (trim($title) != '')
                echo $before_title . $title . $after_title; ?>

            <div class="social-widget">

                <?php if (!empty($facebook)) : ?>
                
                    <a title="Facebook" href="<?php echo $facebook; ?>">
                        <img src="<?php print IMAGES; ?>/social/facebook-variation.png" alt="">
                    </a>

                <?php endif; ?>

                <?php if (!empty($twitter)) : ?>
                
                    <a title="Twitter" href="<?php echo $twitter; ?>">
                        <img src="<?php print IMAGES; ?>/social/twitter.png" alt="">
                    </a>

                <?php endif; ?>

                <?php if (!empty($gplus)) : ?>

                    <a title="Google+" href="<?php echo $gplus; ?>">
                        <img src="<?php print IMAGES; ?>/social/gplus-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($youtube)) : ?>

                    <a title="Youtube" href="<?php echo $youtube; ?>">
                        <img src="<?php print IMAGES; ?>/social/youtube-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($pinterest)) : ?>

                    <a title="Pinterest" href="<?php echo $pinterest; ?>">
                        <img src="<?php print IMAGES; ?>/social/pinterest.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($digg)) : ?>

                    <a title="Digg" href="<?php echo $digg; ?>">
                        <img src="<?php print IMAGES; ?>/social/digg-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($dribbble)) : ?>

                    <a title="Dribbble" href="<?php echo $dribbble; ?>">
                        <img src="<?php print IMAGES; ?>/social/dribbble-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($flickr)) : ?>

                    <a title="Flickr" href="<?php echo $flickr; ?>">
                        <img src="<?php print IMAGES; ?>/social/flickr-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($linkedin)) : ?>

                    <a title="Linkedin" href="<?php echo $linkedin; ?>">
                        <img src="<?php print IMAGES; ?>/social/linkedin-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($picasa)) : ?>

                    <a title="Picasa" href="<?php echo $picasa; ?>">
                        <img src="<?php print IMAGES; ?>/social/picasa.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($stumbleupon)) : ?>

                    <a title="Stumbleupon" href="<?php echo $stumbleupon; ?>">
                        <img src="<?php print IMAGES; ?>/social/stumbleupon-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($tumblr)) : ?>

                    <a title="Tumblr" href="<?php echo $tumblr; ?>">
                        <img src="<?php print IMAGES; ?>/social/tumblr-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($vimeo)) : ?>

                    <a title="Vimeo" href="<?php echo $vimeo; ?>">
                        <img src="<?php print IMAGES; ?>/social/vimeo-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($instagram)) : ?>

                    <a title="Instagram" href="<?php echo $instagram; ?>">
                        <img src="<?php print IMAGES; ?>/social/instagram.png" alt="">
                    </a>
                    
                <?php endif; ?>

                <?php if (!empty($rss)) : ?>

                    <a title="Rss" href="<?php echo $rss; ?>">
                        <img src="<?php print IMAGES; ?>/social/rss-variation.png" alt="">
                    </a>
                    
                <?php endif; ?>

            </div> <!-- end social-share-area -->
        
        <?php echo $after_widget; ?>

    <?php } // end function widget

} // end Adribbon_Social_Widget class


// register widget
add_action("widgets_init", 'register_my_widget');

function register_my_widget() {
    register_widget('Adribbon_Social_Widget');
}
