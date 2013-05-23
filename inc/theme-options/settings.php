<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => 'Site Author'
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'homepage',
        'title'       => 'Homepage'
      ),
      array(
        'id'          => 'blog',
        'title'       => 'Blog'
      ),
      array(
        'id'          => 'shop',
        'title'       => 'Shop'
      ),
      array(
        'id'          => 'video',
        'title'       => 'Video'
      ),
      array(
        'id'          => 'social_network',
        'title'       => 'Social Network'
      ),
      array(
        'id'          => 'ytc_slider_settings',
        'title'       => 'Slider'
      ),
      array(
        'id'          => 'header',
        'title'       => 'Header'
      ),
      array(
        'id'          => 'background',
        'title'       => 'Background'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'logo',
        'label'       => 'Logo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_site_description',
        'label'       => 'Site Description',
        'desc'        => 'Ex: YTC - Young Talent Development Center - The Best of The Best',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_site_author',
        'label'       => 'Site Author',
        'desc'        => 'Ex: Ytc or Ytc.vn',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_site_keywords',
        'label'       => 'Site Keywords',
        'desc'        => 'Ex: music,instrument,ytc,young,talent,development,center',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_banner_list',
        'label'       => 'Banner List',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'ytc_banner_link',
            'label'       => 'Banner Link',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'ytc_banner',
            'label'       => 'Banner',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),
      array(
        'id'          => 'google_analytics_code',
        'label'       => 'Google Analytics Code',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Quick CSS',
        'desc'        => '',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_left_text',
        'label'       => 'Footer Left Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_right_text',
        'label'       => 'Footer Right Text',
        'desc'        => '',
        'std'         => '',
        'type'        => 'textarea',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_home_slider',
        'label'       => 'Main slider',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'settings'    => array( 
          array(
            'id'          => 'type',
            'label'       => 'Type',
            'desc'        => '',
            'std'         => 'image',
            'type'        => 'radio',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
            'choices'     => array( 
              array(
                'value'       => 'image',
                'label'       => 'Image',
                'src'         => ''
              ),
              array(
                'value'       => 'video',
                'label'       => 'Video',
                'src'         => ''
              )
            ),
          ),
          array(
            'id'          => 'image',
            'label'       => 'Image',
            'desc'        => '',
            'std'         => '',
            'type'        => 'upload',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'link',
            'label'       => 'Link',
            'desc'        => '',
            'std'         => '',
            'type'        => 'text',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          ),
          array(
            'id'          => 'description',
            'label'       => 'Description or Embed code',
            'desc'        => '',
            'std'         => '',
            'type'        => 'textarea-simple',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => ''
          )
        )
      ),
      array(
        'id'          => 'display_home_slider',
        'label'       => 'Display Slider',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'homepage',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Display',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Not Display',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_posts_per_page',
        'label'       => 'Number of posts per page',
        'desc'        => '',
        'std'         => '10',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_num_related_posts',
        'label'       => 'Number of related posts',
        'desc'        => '',
        'std'         => '3',
        'type'        => 'text',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_randomize_related_posts',
        'label'       => 'Randomize related posts',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'blog',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'rand',
            'label'       => 'Randomize',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_shop_number_products_per_page',
        'label'       => 'Number of product in one page',
        'desc'        => '',
        'std'         => '24',
        'type'        => 'text',
        'section'     => 'shop',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_videos_per_page',
        'label'       => 'Number of videos per page in video template',
        'desc'        => '',
        'std'         => '9',
        'type'        => 'text',
        'section'     => 'video',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_use_lightbox_in_video_page',
        'label'       => 'Use Lightbox in video page',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'checkbox',
        'section'     => 'video',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Use lightbox',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_autoplay_single_video',
        'label'       => 'Autoplay video in single video page',
        'desc'        => '',
        'std'         => 'false',
        'type'        => 'checkbox',
        'section'     => 'video',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Autoplay',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_num_related_videos',
        'label'       => 'Number of related videos in single video page',
        'desc'        => '',
        'std'         => '3',
        'type'        => 'text',
        'section'     => 'video',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_randomize_related_videos',
        'label'       => 'Randomize related videos',
        'desc'        => '',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'video',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'rand',
            'label'       => 'Randomize',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Facebook',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_plus',
        'label'       => 'Google+',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => 'Youtube',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'pinterest',
        'label'       => 'Pinterest',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg',
        'label'       => 'Digg',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribbble',
        'label'       => 'Dribbble',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => 'Flickr',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin',
        'label'       => 'Linkedin',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'picasa',
        'label'       => 'Picasa',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stumbleupon',
        'label'       => 'Stumbleupon',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumblr',
        'label'       => 'Tumblr',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo',
        'label'       => 'Vimeo',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'instagram',
        'label'       => 'Instagram',
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_network',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_main_slider_animation',
        'label'       => 'Hiệu ứng',
        'desc'        => '',
        'std'         => 'fade',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'fade',
            'label'       => 'Fade',
            'src'         => ''
          ),
          array(
            'value'       => 'slide',
            'label'       => 'Slide',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_direction',
        'label'       => 'Hướng dịch chuyển',
        'desc'        => '',
        'std'         => 'horizontal',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'horizontal',
            'label'       => 'Ngang',
            'src'         => ''
          ),
          array(
            'value'       => 'vertical',
            'label'       => 'Dọc',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_reverse',
        'label'       => 'Di chuyển ngược chiều',
        'desc'        => 'Chuyển slide theo hướng ngược chiều',
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_animation_loop',
        'label'       => 'Lặp lại slide',
        'desc'        => 'Có lặp lại slide hay không? Nếu "không" sẽ dừng lại ở slide cuối cùng. Không nên dùng khi có video.',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_smooth_height',
        'label'       => 'Thay đổi chiều cao slide mượt và mịn',
        'desc'        => 'Không dùng khi hiệu ứng là Fade',
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_start_at',
        'label'       => 'Bắt đầu từ slide số',
        'desc'        => '',
        'std'         => '1',
        'type'        => 'text',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_main_slider_slideshow',
        'label'       => 'Slideshow',
        'desc'        => 'Slider hoạt động tự động',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_slideshow_speed',
        'label'       => 'Tốc độ slideshow (milli giây)',
        'desc'        => '',
        'std'         => '7000',
        'type'        => 'text',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_main_slider_animation_speed',
        'label'       => 'Tốc độ chuyển hiệu ứng (milli giây)',
        'desc'        => '',
        'std'         => '600',
        'type'        => 'text',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_main_slider_init_delay',
        'label'       => 'Trễ ở slide đầu (milli giây)',
        'desc'        => '',
        'std'         => '1',
        'type'        => 'text',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_main_slider_randomize',
        'label'       => 'Chuyển slide ngẫu nhiên',
        'desc'        => '',
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_pause_on_action',
        'label'       => 'Dừng slide khi có tác động',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_pause_on_hover',
        'label'       => 'Dừng slide khi chuột di qua',
        'desc'        => 'Không nên dùng khi có video.',
        'std'         => 'false',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_control_nav',
        'label'       => 'Sử dụng thanh điều hướng phân trang slide',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_main_slider_direction_nav',
        'label'       => 'Sử dụng thanh điều hướng để chuyển slide trước và sau',
        'desc'        => '',
        'std'         => 'true',
        'type'        => 'radio',
        'section'     => 'ytc_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'true',
            'label'       => 'Có',
            'src'         => ''
          ),
          array(
            'value'       => 'false',
            'label'       => 'Không',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_header_bg_type',
        'label'       => 'Header Background Type',
        'desc'        => '',
        'std'         => 'gradient',
        'type'        => 'radio',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'normal',
            'label'       => 'Normal',
            'src'         => ''
          ),
          array(
            'value'       => 'gradient',
            'label'       => 'Gradient',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_header_bg',
        'label'       => 'Header Background',
        'desc'        => 'Only for normal header background type',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_header_gradient_bg_from',
        'label'       => 'Header Gradient Background From',
        'desc'        => 'Only for gradient header background type',
        'std'         => '#f8f8f8',
        'type'        => 'colorpicker',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_header_gradient_bg_to',
        'label'       => 'Header Gradient Background To',
        'desc'        => 'Only for gradient header background type',
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'header',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_layout',
        'label'       => 'Layout',
        'desc'        => '',
        'std'         => 'stretch',
        'type'        => 'radio',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'stretch',
            'label'       => 'Stretch',
            'src'         => ''
          ),
          array(
            'value'       => 'box',
            'label'       => 'Box',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'ytc_body_bg',
        'label'       => 'Body Background',
        'desc'        => 'Only for box layout',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ytc_content_bg',
        'label'       => 'Content Background',
        'desc'        => 'Only for box layout.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'background',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}