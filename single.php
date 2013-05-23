<?php get_header(); ?>

<div class="content-wrap">
    <div class="content-inside container">

        <div class="row-fluid">
                
            <div class="articles span8">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                <?php endwhile; else :?>

                    <?php get_template_part('content', 'notfound'); ?>

                <?php endif; ?>

                <?php 
                // related post
                require_once(get_template_directory() . '/inc/related-post.php'); ?>

                <div class="comments-area" id="comments">
                
                    <?php comments_template('', true); ?>

                </div> <!-- end comments -->

            </div> <!-- .articles -->

            <aside class="main-sidebar span4">
                
                <?php get_sidebar('single'); ?>

            </aside> <!-- .main-sidebar -->
        </div> <!-- end row -->
    </div> <!-- .container -->
</div> <!-- content-wrap -->

<?php get_footer(); ?>