<?php
// Template Name: Fullwidth Template
?>

<?php get_header(); ?>

    <div class="content-wrap">
        <div class="content-inside container">

            <div class="row-fluid">
                <div class="articles span12">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

                    <?php endwhile; // end of the loop.

                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() ) : ?>
                        
                        <div class="comments-area" id="comments">
                            <?php comments_template(); ?>
                        </div> <!-- end comments -->
                    
                    <?php endif; ?>
                </div> <!-- .articles -->
            </div> <!-- end row -->
        </div> <!-- .container -->
    </div> <!-- content-wrap -->


<?php get_footer(); ?>