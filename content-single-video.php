<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header><!-- .entry-header -->

    <div class="home-meta-comment-social single-video-social clearfix">
        <?php include(get_template_directory() . '/inc/social/social.php'); ?>
    </div> <!-- .home-meta-comment-social -->
        
    <div class="entry-content post-content video-content">

        <?php 
            $video_url = get_post_meta(get_the_id(), 'ytc_video_url', true); 

            $youtube_pattern = '/youtube.com/';
            $vimeo_pattern = '/vimeo.com/';

            $autoplay = ot_get_option('ytc_autoplay_single_video');

            if (isset($autoplay[0]) && $autoplay[0] == 'true')
                $video_url .= '?autoplay=1';

            if (preg_match($youtube_pattern, $video_url)) {
                echo do_shortcode('[ytc_youtube_embed src="'.$video_url.'"]');
            } else if (preg_match($vimeo_pattern, $video_url)) {
                echo do_shortcode('[ytc_vimeo_embed src="'.$video_url.'"]');
            } 

            ?>
        
        <div class="video-description">
            <?php the_content(); ?>
        </div> <!-- .video-description -->

    </div><!-- .entry-content -->

    <?php 
    // related videos
    require_once(get_template_directory() . '/inc/related-video.php'); ?>
</article><!-- #post-## -->