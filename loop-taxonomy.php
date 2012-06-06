<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
    <div class="notice">
        <p class="bottom"><?php _e('Sorry, no results were found.', 'reverie'); ?></p>
    </div>
    <?php get_search_form(); ?> 
<?php endif; ?>

<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="asset-preview">
        <a href="<?php the_permalink(); ?>">
      <?php
            if ( has_post_format( 'video' )) {
              echo post_thumb_noheight(get_the_post_thumbnail(get_the_ID(),'asset-thumb'));
            }

            elseif ( has_post_format( 'audio' )) {
              echo '<img src="'.get_stylesheet_directory_uri() .'/images/preview-poster-audio.gif"/>';
            }

            elseif ( has_post_format( 'image' )) {
              echo '<img src="'.get_stylesheet_directory_uri() .'/images/preview-poster-text.gif"/>';
            }

            else {
              echo 'Please select Post Format';
            }
          ?>
        </a>
        <h4><?php the_title(); ?></h4>
        <time datetime="<?php the_time('c'); ?>"><?php the_time('F jS, Y'); ?></time>
      </div>
<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
    <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'reverie' ) ); ?></div>
        <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'reverie' ) ); ?></div>
    </nav>
<?php endif; ?>