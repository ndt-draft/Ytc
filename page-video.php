<?php
// Template Name: Video Template
?>

<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
            <div class="articles span8">
                <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
                    
                    <article class="archive-title">
                        <h1><?php the_title(); ?></h1>
                    </article>

                <?php endwhile; endif;

                $temp = $wp_query; // keep global $wp_query value
                $wp_query = null;

                $videos_per_page = ot_get_option('ytc_videos_per_page');

                if (!is_numeric($videos_per_page) || (int) $videos_per_page <= 0)
                    $videos_per_page = 9;
                else
                    $videos_per_page = (int) $videos_per_page;

                $args = array(
                    'post_type' => 'video',
                    'paged' => $paged,
                    'posts_per_page' => $videos_per_page
                );

                $wp_query = new WP_Query( $args );

                if ($wp_query->have_posts()) : ?>

                <?php 
                    echo '<div class="row-fluid">';
                    
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        
                        get_template_part('content', 'video');
                    
                    endwhile; 
                    
                    echo '</div> <!-- .row-fluid -->';
                
                else: ?>

                    <?php get_template_part('content', 'notfound'); ?>
                
                <?php endif; ?>

                <?php // paginate
                if (function_exists('wp_pagenavi')) :

                    wp_pagenavi();

                else :

                    show_posts_nav();

                endif;

                $wp_query = null;
                $wp_query = $temp;
                wp_reset_query();
                ?>

            </div> <!-- .articles -->

            <aside class="main-sidebar span4">
                <?php get_sidebar('video'); ?>
            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->

<?php get_footer(); ?>