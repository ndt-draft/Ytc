<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
            <div class="articles span8">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content'); ?>

                <?php endwhile; else: ?>

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
                <?php get_sidebar(); ?>
            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->


<?php get_footer(); ?>