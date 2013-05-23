<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
            <div class="articles span8">

                <?php if (have_posts()) : ?>

                    <article class="archive-title">
                        <h1><?php _e('Search Results for: ', 'ytc'); ?><?php echo get_search_query(); ?></h1>
                    </article> <!-- .archive-title -->

                <?php 
                echo '<div class="row-fluid">';
                while (have_posts()) : the_post();
                
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
                ?>

            </div> <!-- .articles -->

            <aside class="main-sidebar span4">
                <?php get_sidebar('video'); ?>
            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->

<?php get_footer(); 