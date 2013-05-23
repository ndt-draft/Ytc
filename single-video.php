<?php get_header(); ?>

    <div class="content-wrap">
        <div class="content-inside container">

            <div class="row-fluid">
                <div class="articles span8">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'single-video' ); ?>

                    <?php endwhile; // end of the loop. ?>

                    <div class="comments-area" id="comments">
                
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>

                    </div> <!-- end comments -->
                </div> <!-- .articles -->

                <aside class="main-sidebar span4">

                    <?php get_sidebar('single-video'); ?>

                </aside> <!-- .main-sidebar -->
            </div> <!-- end row -->
        </div> <!-- .container -->
    </div> <!-- content-wrap -->

<?php get_footer(); ?>