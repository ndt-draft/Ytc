<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
            <div class="articles span8">

                <?php if (have_posts()) : ?>
                    <article class="archive-title">
                        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

                        <?php /* If this is a category archive */ if (is_category()) { ?>
                            <h1><?php single_cat_title(); ?></h1>

                        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                            <h1><?php single_tag_title(); ?></h1>

                        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                            <h1><?php _e('Archive for', 'ytc'); ?> <?php the_time('F jS, Y'); ?></h1>

                        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                            <h1><?php _e('Archive for', 'ytc'); ?> <?php the_time('F, Y'); ?></h1>

                        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                            <h1><?php _e('Archive for', 'ytc'); ?> <?php the_time('Y'); ?></h1>

                        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                            <h1><?php _e('Author Archive', 'ytc'); ?></h1>

                        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                            <h1><?php _e('Blog Archives', 'ytc'); ?></h1>
                        
                        <?php } ?>
                    </article>

                <?php while (have_posts()) : the_post(); ?>

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
                <?php get_sidebar('blog'); ?>
            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->


<?php get_footer(); ?>