<form role="search" method="get" id="searchform" id="main-search" action="<?php echo home_url('/'); ?>">
    <input type="text" value="" name="s" id="s" placeholder="<?php _e('Search', 'reverie'); ?>">
    <input type="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search-icon.png" id="searchsubmit" value="<?php _e('Go', 'reverie'); ?>">
</form>
