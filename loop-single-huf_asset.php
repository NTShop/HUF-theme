<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <header>
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <time datetime="<?php the_time('c'); ?>">
                Added on: <?php the_time('F jS, Y'); ?>
            </time>
        </header>


        <!--Check for Video Field -->
        <?php if ( get_post_meta($post->ID, 'video', true) ) : ?>

        
            <video 
                id="<?php the_ID(); ?>" 
                class="video-js vjs-default-skin" 
                controls
                preload="auto" 
                width="638" 
                height="359"
                poster="
                    <?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'video-poster'); $image_url = $image_url[0]; ?>
                    <?php 
                    //This must be in one loop
                    if(has_post_thumbnail()) {
                        echo $image_url;
                    } else {
                        echo '.get_stylesheet_directory_uri().'/images/video-poster.png;
                    }
                    ?>"
                data-setup="{}">
              <source src="<?php echo get_post_meta($post->ID, 'video', true) ?>" type='video/mp4'>
              <!--source src="my_video.webm" type='video/webm'-->
            </video>
        


        <?php endif; ?>


        <!--Check for Audio Field -->
        <?php if ( get_post_meta($post->ID, 'audio', true) ) : ?>
            <audio src="<?php echo get_post_meta($post->ID, 'audio', true) ?>" type="audio/mp3" preload="auto"></audio>
        <?php endif; ?>

        <!--Check for Text Field -->
        <?php if ( get_post_meta($post->ID, 'text', true) ) : ?>
            <img src="<?php echo get_post_meta($post->ID, 'text', true) ?>"/>
        <?php endif; ?>


        <!-- get the levels and topics -->
        <p class="asset-meta"><?php ucc_get_terms_list(); ?> <?php if (function_exists('wpfp_link')) { wpfp_link(); } ?></p>


        <div class="post-box">
            <div class="entry-content">
                <?php the_content(); ?>
                <?php if ( get_post_meta($post->ID, 'questions', true) ) : ?>
                <a class="white nice button" href="<?php echo get_post_meta($post->ID, 'audio', true) ?>">Download Comprehesion Questions</a>
                <?php endif; ?>
            </div>
            <footer>
                <?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
                <p><?php the_tags(); ?></p>
            </footer>
            <?php /*comments_template(); */?>
        </div>
    </article>
<?php endwhile; // End the loop ?>