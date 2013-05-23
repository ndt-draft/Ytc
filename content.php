<article <?php post_class('clearfix'); ?> id="post-<?php the_ID(); ?>">

    <figure class="article-preview-image">
        <a href="<?php the_permalink(); ?>"><?php 
            if (has_post_thumbnail())
                the_post_thumbnail('post-thumbnail-size');
        ?></a>
    </figure> <!-- end article-preview-image -->
    

    <div class="article-preview-content">
        
        <header>
            
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-info">
                <span class="theauthor">
                    <?php the_author_posts_link(); ?>
                </span>
                <span class="thecategory">
                    <?php the_category(', '); ?>
                </span>
                <span class="thetime"><?php the_time(get_option('date_format')); ?></span> 
            </div>

        </header>

        <?php the_excerpt(); ?>

        <!-- <div class="home-meta-comment-social"> -->
            <!-- <div class="thecomment"> -->
                <?php 
                // if (comments_open() && !post_password_required()) {
                //     comments_popup_link(__('No comments', 'ytc'), 
                //                         __('1 comment', 'ytc'), 
                //                         __('% comments', 'ytc') );
                // }  
                ?>
            <!-- </div> .thecomment -->

            <?php // require(get_template_directory() . '/inc/social/social.php'); ?>
        <!-- </div> .home-meta-comment-social -->

    </div> <!-- end article-preview-content -->
</article>