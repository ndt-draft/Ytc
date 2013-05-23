<?php 
wp_enqueue_script('froogaloop', THEMEROOT . '/assets/js/froogaloop.js', array('jquery'), '', true);
wp_enqueue_script('fitvid');
wp_enqueue_script('flexslider');
wp_enqueue_style('flexslider_style');
?>

<div class="featured">
    <div id="main-slider" class="flexslider">
        <ul class="slides">
            
            <?php foreach($sliders as $slider) : ?>


                <?php
                    // if (trim($slider['link']) == '')
                    //     $slider['link'] = home_url();

                    if (trim($slider['image']) == '')
                        $slider['image'] = 'http://placehold.it/742x371';
                ?>

                <?php if ($slider['type'] == 'image') : ?>
                    <li>
                        <?php if (trim($slider['link']) != '') : ?><a href="<?php echo $slider['link']; ?>"><?php endif; ?>
                            <img src="<?php echo $slider['image']; ?>" alt="<?php echo substr($slider['title'], 10); ?>">
                            <div class="flex-caption">
                                <?php if (!empty($slider['title'])) : ?>
                                    <span class="slidertitle"><?php echo $slider['title']; ?></span>
                                <?php endif; ?>

                                <?php if (!empty($slider['description'])) : ?>
                                    <span class="slidertext"><?php echo $slider['description']; ?></span>
                                <?php endif; ?>
                            </div>
                        <?php if (trim($slider['link']) != '') : ?></a><?php endif; ?>
                    </li>
                <?php else : ?>
                    <li>
                        <?php echo $slider['description']; ?>
                    </li>
                <?php endif; ?>
            
            <?php endforeach; ?>
        </ul> <!-- .slides -->

        <ul class="flex-direction-nav">
            <li><a href="" class="flex-prev">Previous</a></li>
            <li><a href="" class="flex-next">Next</a></li>
        </ul> <!-- .flex-direction-nav -->
    </div> <!-- .flexslider -->
</div>  <!-- .featured -->

<script>
/* Flexslider settings */
// jQuery('document').ready(function () {
//     jQuery('.flexslider').flexslider({
//         animation: "<?php echo ot_get_option('ytc_main_slider_animation'); ?>",
//         direction: "<?php echo ot_get_option('ytc_main_slider_direction'); ?>",
//         reverse: <?php echo ot_get_option('ytc_main_slider_reverse'); ?>,
//         animationLoop: <?php echo ot_get_option('ytc_main_slider_animation_loop'); ?>,
//         smoothHeight: <?php echo ot_get_option('ytc_main_slider_smooth_height'); ?>,
//         startAt: <?php echo (ot_get_option('ytc_main_slider_start_at') - 1); ?>,
//         slideshow: <?php echo ot_get_option('ytc_main_slider_slideshow'); ?>,
//         slideshowSpeed: <?php echo ot_get_option('ytc_main_slider_slideshow_speed'); ?>,           //Integer: Set the speed of the slideshow cycling, in milliseconds
//         animationSpeed: <?php echo ot_get_option('ytc_main_slider_animation_speed'); ?>,            //Integer: Set the speed of animations, in milliseconds
//         initDelay: <?php echo ot_get_option('ytc_main_slider_init_delay'); ?>,                   //{NEW} Integer: Set an initialization delay, in milliseconds
//         randomize: <?php echo ot_get_option('ytc_main_slider_randomize'); ?>,
//         pauseOnAction: <?php echo ot_get_option('ytc_main_slider_pause_on_action'); ?>,            
//         pauseOnHover: <?php echo ot_get_option('ytc_main_slider_pause_on_hover'); ?>, 
//         controlNav: <?php echo ot_get_option('ytc_main_slider_control_nav'); ?>,               
//         directionNav: <?php echo ot_get_option('ytc_main_slider_direction_nav'); ?>
//     });
// });


// Can also be used with $(document).ready()
// original from flexslider example
// jQuery(window).load(function() {
 
//   // Vimeo API nonsense
//   var player = document.getElementById('player_1');
//   $f(player).addEvent('ready', ready);
 
//   function addEvent(element, eventName, callback) {
//     if (element.addEventListener) {
//       element.addEventListener(eventName, callback, false)
//     } else {
//       element.attachEvent(eventName, callback, false);
//     }
//   }
 
//   function ready(player_id) {
//     var froogaloop = $f(player_id);
//     froogaloop.addEvent('play', function(data) {
//       jQuery('.flexslider').flexslider("pause");
//     });
//     froogaloop.addEvent('pause', function(data) {
//       jQuery('.flexslider').flexslider("play");
//     });
//   }
 
   
//   // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
//   jQuery(".flexslider")
//     .fitVids()
//     .flexslider({
//       animation: "slide",
//       useCSS: false,
//       animationLoop: true,
//       smoothHeight: true,
//       slideshowSpeed: 3000,
//       before: function(slider){
//         $f(player).api('pause');
//       }
//   });
// });



// var tag = document.createElement('script');
// tag.src = "https://www.youtube.com/iframe_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// var player;
//   function onYouTubeIframeAPIReady() {
//     player = new YT.Player('player_3', {
//         events: {
//             'onStateChange': onPlayerStateChange
//         }
//     });
//   }
  
  // function onPlayerStateChange(event) {
  //   if (event.data == YT.PlayerState.PLAYING ) {
  //       jQuery('.flexslider').flexslider("pause");
  //       console.log('playing');
  //   }
  //   if (event.data == YT.PlayerState.PAUSED ) {
  //       jQuery('.flexslider').flexslider("play");
  //       console.log('pause');
  //   }
  // }

// function playVideoAndPauseOthers(frame) {
//     jQuery('iframe').each(function(i) {
//         var func = this === frame ? 'playVideo' : 'stopVideo';
//         this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
//     });
// }

/* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
// jQuery('.flex-next, .flex-prev').click(function() {
//     playVideoAndPauseOthers(jQuery('#player_3')[0]);
// });

// multi vimeo video
// jQuery(window).load(function() { 
//     var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;        
    
//     for (var i = 0, length = vimeoPlayers.length; i < length; i++) {            
//             player = vimeoPlayers[i];           
//             $f(player).addEvent('ready', ready);        
//     }       
    
//     function addEvent(element, eventName, callback) {           
//         if (element.addEventListener) {                 
//             element.addEventListener(eventName, callback, false)            
//         } else {                
//             element.attachEvent(eventName, callback, false);            
//         }       
//     }       
    
//     function ready(player_id) {             
//         var froogaloop = $f(player_id);             
//         froogaloop.addEvent('play', function(data) {                
//             jQuery('.flexslider').flexslider("pause");  
//             // console.log('playing');        
//         });             
//         froogaloop.addEvent('pause', function(data) {               
//             jQuery('.flexslider').flexslider("play");           
//             // console.log('pause');
//         });         
//     }  
    
//     jQuery(".flexslider")
//     .fitVids()
//     .flexslider({       
//         animation: "<?php echo ot_get_option('ytc_main_slider_animation'); ?>",
//         direction: "<?php echo ot_get_option('ytc_main_slider_direction'); ?>",
//         reverse: <?php echo ot_get_option('ytc_main_slider_reverse'); ?>,
//         animationLoop: <?php echo ot_get_option('ytc_main_slider_animation_loop'); ?>,
//         smoothHeight: <?php echo ot_get_option('ytc_main_slider_smooth_height'); ?>,
//         startAt: <?php echo (ot_get_option('ytc_main_slider_start_at') - 1); ?>,
//         slideshow: <?php echo ot_get_option('ytc_main_slider_slideshow'); ?>,
//         slideshowSpeed: <?php echo ot_get_option('ytc_main_slider_slideshow_speed'); ?>,           //Integer: Set the speed of the slideshow cycling, in milliseconds
//         animationSpeed: <?php echo ot_get_option('ytc_main_slider_animation_speed'); ?>,            //Integer: Set the speed of animations, in milliseconds
//         initDelay: <?php echo ot_get_option('ytc_main_slider_init_delay'); ?>,                   //{NEW} Integer: Set an initialization delay, in milliseconds
//         randomize: <?php echo ot_get_option('ytc_main_slider_randomize'); ?>,
//         pauseOnAction: <?php echo ot_get_option('ytc_main_slider_pause_on_action'); ?>,            
//         pauseOnHover: <?php echo ot_get_option('ytc_main_slider_pause_on_hover'); ?>, 
//         controlNav: <?php echo ot_get_option('ytc_main_slider_control_nav'); ?>,               
//         directionNav: <?php echo ot_get_option('ytc_main_slider_direction_nav'); ?>,
//         before: function(slider){ 
//             // console.log(slider.currentSlide);        
//             if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
//                   $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');       
//             // playVideoAndPauseOthers(jQuery('#player_3'));
//         }   
//     });

// });



    // youtube and vimeo
    // jQuery(window).load(function () {
    //     var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;

    //     for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
    //             player = vimeoPlayers[i];
    //             $f(player).addEvent('ready', ready);
    //     }

    //     function addEvent(element, eventName, callback) {
    //         if (element.addEventListener) {
    //             element.addEventListener(eventName, callback, false)
    //         } else {
    //             element.attachEvent(eventName, callback, false);
    //         }
    //     }

    //     function ready(player_id) {
    //         var froogaloop = $f(player_id);
    //         froogaloop.addEvent('play', function(data) {
    //          jQuery('.flexslider').flexslider("pause");
    //         });

    //         froogaloop.addEvent('pause', function(data) {
    //             jQuery('.flexslider').flexslider("play");
    //         });
    //     }

    //     jQuery(".flexslider")
    //     .fitVids()
    //     .flexslider({
    //         animation: "fade",
    //         animationLoop: true,
    //         smoothHeight: true,
    //         slideshow: true,
    //         useCSS: false,
    //         before: function(slider){
    //             if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
    //                $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
    //                /* ------------------  YOUTUBE FOR AUTOSLIDER ------------------ */
    //                playVideoAndPauseOthers($('.featured .play3')[0]);
    //         }


    //     });

    //     function playVideoAndPauseOthers(frame) {
    //     $('iframe').each(function(i) {
    //     var func = this === frame ? 'playVideo' : 'stopVideo';
    //     this.contentWindow.postMessage('{"event":"command","func":"' + func + '","args":""}', '*');
    //     });
    //     }

    //     /* ------------------ PREV & NEXT BUTTON FOR FLEXSLIDER (YOUTUBE) ------------------ */
    //     $('.flex-next, .flex-prev').click(function() {
    //     playVideoAndPauseOthers($('.featured .play3')[0]);
    //     });
    // });


    // youtube only
    // var tag = document.createElement('script');
    // tag.src = "https://www.youtube.com/iframe_api";
    // var firstScriptTag = document.getElementsByTagName('script')[0];
    // firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // var player;
    //   function onYouTubeIframeAPIReady() {
    //     player = new YT.Player('player_3', {
    //         events: {
    //             'onStateChange': onPlayerStateChange
    //         }
    //     });
    //   }
      
    //   function onPlayerStateChange(event) {
    //     if (event.data == YT.PlayerState.PLAYING ) {
    //         jQuery('.flexslider').flexslider("pause");
    //         console.log('playing');
    //     }
    //     if (event.data == YT.PlayerState.PAUSED ) {
    //         jQuery('.flexslider').flexslider("play");
    //         console.log('pause');
    //     }
    //   }

    // jQuery(window).load(function() {
    //     jQuery('.flexslider').fitVids().flexslider({
    //         animation: "slide",
    //         // directionNav: false,
    //         // video: true,
    //         // pauseOnHover: true, 
    //         slideshowSpeed: 10000,
    //         smoothHeight: true,
    //         // pauseOnAction: false  
    //     });
    // });



    //multi vimeo ver 2
jQuery(window).load(function() {
 
    var vimeoPlayers = jQuery('.flexslider').find('iframe'), player;
 
    for (var i = 0, length = vimeoPlayers.length; i < length; i++) {
            player = vimeoPlayers[i];
            $f(player).addEvent('ready', ready);
    }
 
    function addEvent(element, eventName, callback) {
        if (element.addEventListener) {
            element.addEventListener(eventName, callback, false)
        } else {
            element.attachEvent(eventName, callback, false);
        }
    }
 
    function ready(player_id) {
        var froogaloop = $f(player_id);
        froogaloop.addEvent('play', function(data) {
            jQuery('.flexslider').flexslider("pause");
            console.log('playing');
        });
        froogaloop.addEvent('pause', function(data) {
            jQuery('.flexslider').flexslider("play");
            console.log('pause');
        });
    }
 
    jQuery(".flexslider")
    .fitVids()
    .flexslider({
        animation: "<?php echo ot_get_option('ytc_main_slider_animation'); ?>",
        direction: "<?php echo ot_get_option('ytc_main_slider_direction'); ?>",
        reverse: <?php echo ot_get_option('ytc_main_slider_reverse'); ?>,
        animationLoop: <?php echo ot_get_option('ytc_main_slider_animation_loop'); ?>,
        smoothHeight: <?php echo ot_get_option('ytc_main_slider_smooth_height'); ?>,
        startAt: <?php echo (ot_get_option('ytc_main_slider_start_at') - 1); ?>,
        slideshow: <?php echo ot_get_option('ytc_main_slider_slideshow'); ?>,
        slideshowSpeed: <?php echo ot_get_option('ytc_main_slider_slideshow_speed'); ?>,           //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationSpeed: <?php echo ot_get_option('ytc_main_slider_animation_speed'); ?>,            //Integer: Set the speed of animations, in milliseconds
        initDelay: <?php echo ot_get_option('ytc_main_slider_init_delay'); ?>,                   //{NEW} Integer: Set an initialization delay, in milliseconds
        randomize: <?php echo ot_get_option('ytc_main_slider_randomize'); ?>,
        pauseOnAction: <?php echo ot_get_option('ytc_main_slider_pause_on_action'); ?>,            
        pauseOnHover: <?php echo ot_get_option('ytc_main_slider_pause_on_hover'); ?>, 
        controlNav: <?php echo ot_get_option('ytc_main_slider_control_nav'); ?>,               
        directionNav: <?php echo ot_get_option('ytc_main_slider_direction_nav'); ?>,
        before: function(slider){
            if (slider.slides.eq(slider.currentSlide).find('iframe').length !== 0)
                  $f( slider.slides.eq(slider.currentSlide).find('iframe').attr('id') ).api('pause');
        }
    });
 
});
</script>