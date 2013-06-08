<?php 
include_once(ABSPATH . 'wp-admin/includes/plugin.php');
$woocommerceExists = is_plugin_active('woocommerce/woocommerce.php'); 
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="<?php 
        echo ot_get_option('ytc_site_description', get_bloginfo('description')); ?>">
    
    <meta name="author" content="<?php 
        echo ot_get_option('ytc_site_author', get_bloginfo('name')); ?>">
    
    <meta name="keywords" content="<?php 
        echo ot_get_option('ytc_site_keywords', get_bloginfo('name')); ?>">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php print ot_get_option('favicon'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print ot_get_option('favicon'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print ot_get_option('favicon'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php print ot_get_option('favicon'); ?>">
    <link rel="shortcut icon" href="<?php print ot_get_option('favicon'); ?>">
    
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    
    <?php wp_head(); ?>

</head>

<body <?php body_class('woocommerce woocommerce-page'); ?>>

    <header class="main-header" id="top">
        <div class="top-menu-wrap">
            <div class="container"> 
                <nav class="top-menu-navigation">
                    <?php 
                        wp_nav_menu(array(
                            'theme_location' => 'top-menu',
                            'container' => ''
                        ));
                    ?>
                </nav> <!-- .top-menu-navigation -->

                <select class="top-menu-selection">
                    <option><?php _e('Select a page', 'ytc'); ?></option>
                </select> <!-- .top-menu-selection -->
            </div> <!-- .container -->
        </div> <!-- .top-menu-wrap -->

        <div class="logo-wrap">
            <div class="container">
                <div class="row">
                    <div class="logo span3">

                        <?php 
                        $logo = ot_get_option('logo'); 
                        if (trim($logo) != '') {
                        ?>
                            <a href="<?php bloginfo('url'); ?>" title="">
                                <img src="<?php echo $logo; ?>" alt="Logo">
                            </a>
                        <?php } else { ?>
                            <h1 class="site-name"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                        <?php } 

                        if (get_bloginfo('description') != '') { ?>

                            <h6 class="site-description"><?php bloginfo('description'); ?></h6>
                    
                        <?php } ?>
                    </div> <!-- .logo -->

                    <div class="banner span5">

                        <?php $banner_list = ot_get_option('ytc_banner_list', array()); 
                        // if not empty
                        if (!empty($banner_list)) :

                            $rand_num = rand(0, count($banner_list) - 1);
                            $banner_link = $banner_list[$rand_num]['ytc_banner_link'];
                            $banner = $banner_list[$rand_num]['ytc_banner'];
                            $banner_title = $banner_list[$rand_num]['title'];

                            $banner_link = trim($banner_link);
                            $banner = trim($banner);
                            $banner_title = trim($banner_title);
                            
                            if ($banner != '') :
                                if ($banner_link != '') : ?>
                                    <a href="<?php echo $banner_link; ?>">
                                <?php endif; ?>

                                    <img src="<?php echo $banner; ?>" alt="<?php echo $banner_title; ?>">
                                
                                <?php if ($banner_link != '') : ?>
                                    </a> 
                                <?php endif; 
                            endif; 
                        endif ?>
                    </div> <!-- .banner -->

                    <div class="search-form span4">
                        <form action="<?php echo home_url(); ?>" method="get">
                            <input name="s" type="text" placeholder="<?php _e('Search...', 'ytc'); ?>"
                                value="<?php echo get_search_query(); ?>">
                            <input name="submit" type="submit" value="<?php _e('Search', 'ytc'); ?>">
                            
                            <div class="post_type">
    
                                <input id="post_type_all" type="radio" name="post_type" value="all"
                                    <?php if (!isset($_GET['post_type']) || 
                                        isset($_GET['post_type']) && $_GET['post_type'] == 'all') 
                                        echo 'checked'; ?>>
                                    <label for="post_type_all"><?php _e('All', 'ytc'); ?></label>    
                                
                                <input id="post_type_post" type="radio" 
                                    name="post_type" value="post" 
                                    <?php if (isset($_GET['post_type']) && $_GET['post_type'] == 'post')
                                        echo 'checked'; ?>>
                                    <label for="post_type_post"><?php _e('Post', 'ytc'); ?></label>

                                <?php if ($woocommerceExists) : ?>
                                    
                                <input id="post_type_product" type="radio" 
                                    name="post_type" value="product"
                                    <?php if (isset($_GET['post_type']) && $_GET['post_type'] == 'product')
                                        echo 'checked';  ?>>
                                    <label for="post_type_product"><?php _e('Product', 'ytc'); ?></label>
                                
                                <?php endif; ?>

                                <input id="post_type_video" type="radio" 
                                    name="post_type" value="video"
                                    <?php if (isset($_GET['post_type']) && $_GET['post_type'] == 'video')
                                        echo 'checked';  ?>>
                                    <label for="post_type_video"><?php _e('Video', 'ytc'); ?></label>

                            </div> <!-- .post-type -->
                        </form>
                    </div> <!-- .search-form -->
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .logo-wrap -->

        <div class="main-menu-wrap">
            <div class="container">
                <nav class="main-menu-navigation">
                    <?php 
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => ''
                        ));
                    ?>
                </nav> <!-- .main-menu-navigation -->

                <select class="main-menu-selection">
                    <option><?php _e('Select a page', 'ytc'); ?></option>
                </select> <!-- .main-menu-selection -->
            </div> <!-- .container -->
        </div> <!-- .main-menu-wrap -->
    </header><!-- .main-header #top -->