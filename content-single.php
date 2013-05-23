<article <?php post_class('single-post clearfix'); ?> id="post-<?php the_ID(); ?>">

    <figure class="article-preview-image">
        <?php 
            if (has_post_thumbnail())
                the_post_thumbnail('post-thumbnail-size'); 
        ?>
    </figure> <!-- end article-preview-image -->

    <div class="article-preview-content">    
        <header>

            <h2><?php the_title(); ?></h2>
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

        <div class="home-meta-comment-social">
            <div class="thecomment">
                <?php 
                if (comments_open() && !post_password_required()) {
                    comments_popup_link(__('No comments', 'ytc'), 
                                        __('1 comment', 'ytc'), 
                                        __('% comments', 'ytc') );
                }  
                ?>
            </div> <!-- .thecomment -->

            <?php include(get_template_directory() . '/inc/social/social.php'); ?>
        </div> <!-- .home-meta-comment-social -->

    </div> <!-- end article-preview-content -->

</article>


<div class="post-content clearfix">
    <?php the_content(); ?>

    <?php 
        $args = array(
            'before' => '<p class="post-navigation">',
            'after' => '</p>',
            'pagelink' => __('Page %', 'ytc')
        );
    ?>

    <?php wp_link_pages($args); ?>

    <?php if (has_tag()): ?>
        <p class="tag-container"><?php the_tags(__('Tags: ', 'ytc'), ''); ?></p>
    <?php endif; ?>

</div> <!-- end post-content -->

<div class="article-author clearfix">
    <figure class="author-avatar">
        <a href="">
            <?php echo get_avatar(get_the_author_meta('ID'), 100, '', 'author avatar'); ?>
        </a>
    </figure>
        
    <p class="author-name"><?php _e('Article by', 'ytc'); ?> <?php the_author_posts_link(); ?></p>
    <p class="author-des"><?php the_author_meta('description'); ?></p>

</div> <!-- .article-author -->