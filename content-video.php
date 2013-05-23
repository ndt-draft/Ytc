<article <?php post_class('span4'); ?> id="post-<?php the_ID(); ?>">

    <figure class="video-thumbnail-preview">
        <?php $video_url = get_post_meta(get_the_ID(), 'ytc_video_url', true);
        $video_width = get_post_meta(get_the_ID(), 'ytc_video_width', true);
        $video_height = get_post_meta(get_the_ID(), 'ytc_video_heigh', true); 

        $video = $video_url . '?width=' . $video_width . 
            '&amp;heigh=' . $video_height;  

        $use_lightbox = ot_get_option('ytc_use_lightbox_in_video_page');
        
        if (isset($use_lightbox[0]) && $use_lightbox[0] === 'true')
            $video_atts = 'rel="prettyPhoto" href="'.$video.'"';
        else 
            $video_atts = 'href="'.get_permalink().'#post-' . get_the_ID() . '"';
        ?>

        <a class="video-thumbnail" <?php echo $video_atts; ?>>
        <?php 
            if (has_post_thumbnail())
                the_post_thumbnail('post-thumbnail-size');
        ?></a>

    </figure> <!-- end article-preview-image -->

    <p><a class="video-title"  title="<?php the_title(); ?>" 
        href="<?php the_permalink(); ?>#post-<?php the_ID(); ?>"><?php the_title(); ?></a></p>
</article>

<?php
$current_post = $wp_query->current_post + 1; 

if ($current_post % 3 == 0) echo '</div><div class="row-fluid">';
