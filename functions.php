<?php
	//do custom stuff here. 
	
	
	//Remove Unnecessary Menus
	function remove_menus () {
	global $menu;
	    $restricted = array( __('Posts'), __('Links'), __('Comments'));
	    end ($menu);
	    while (prev($menu)){
	        $value = explode(' ',$menu[key($menu)][0]);
	        if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	    }
	}
	add_action('admin_menu', 'remove_menus');

	function fb_show_admin_bar() {
	 if ( current_user_can( 'manage_options' ) )
	 return TRUE;
	 else
	 return FALSE;
	 }
	 add_filter( 'show_admin_bar', 'fb_show_admin_bar' );

	//Let's bump the upload size
	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );

	//tweak the excerpt length
	function custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



	//Custom Image Sizes and removing height and width for Mobile
	if ( function_exists( 'add_image_size' ) ) { 
	  add_image_size( 'asset-thumb', 186, 105, true );
	  add_image_size( 'video-poster', 638, 359, true );
	}
	//now lets get rid of that height and width thing
	function post_thumb_noheight($string){
	  return preg_replace('/\<(.*?)(width="(.*?)")(.*?)(height="(.*?)")(.*?)\>/i', '<$1$4$7>',$string);
	}



	//Register Sidebars and Other Widget Areas
	if (function_exists('register_sidebar')) {
		register_sidebar(array(
			'name'=> 'Bottom Boxes',
			'id' => 'bottom_boxes',
			'before_widget' => '<div id="%1$s" class="four columns contentbox %2$s"><div>',
			'after_widget' => '</div></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name'=> 'Single Asset',
			'id' => 'single_asset',
			'before_widget' => '<div id="%1$s" class="%2$s"><div>',
			'after_widget' => '</div></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name'=> 'Levels Page',
			'id' => 'levels-page',
			'before_widget' => '<div id="%1$s" class="%2$s"><div>',
			'after_widget' => '</div></div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name'=> 'Homepage Sample Videos',
			'id' => 'home-sample',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		));
	}
	add_theme_support('menus');
	register_nav_menus(array(
		'footer_navigation' => __('Footer Navigation', 'reverie-child'),
		'user_navigation' => __('Logged-In User Navigation', 'reverie-child'),
	));




	//Add Login Logout To Top Nav
	function wps_add_loginlogout_link($items, $args)
	{
		//defaults; change this as you see fit
		$defaults = array(
			'loginlout_position' => 999, //enter 0 for front, 999 for end
			'menu_id' => 'user-login', //custom CSS
			'menu_class' => 'menu-item black-button', //custom CSS
			'menu_location' =>'utility_navigation', //enter primary, secondary, or topnav for News
			'loginredirect' => false //enter true for redirect to wp-admin dashboard
		);

		//do nothing if not proper menu location
		if( $args->theme_location != $defaults['menu_location'] )
			return $items;

		//set redirect URL
		if( $defaults['loginredirect'] )
			$wpurl = 'wp-admin/index.php';
		else
			$wpurl = 'index.php';

		// split the menu items into an array using the ending <li> tag
		if ( $defaults['loginlout_position'] != 0 && $defaults['loginlout_position'] != 1 && $defaults['loginlout_position'] != 999 ) {
			$items = explode('</li>',$items);
		}

		if(is_user_logged_in())
		{
			$newitem = '<li id="'.$defaults['menu_id'].'" class="'.$defaults['menu_class'].'"><a title="Logout" href="'. wp_logout_url($wpurl) .'">Logout</a></li>';
			if ( $defaults['loginlout_position'] == 0 || $defaults['loginlout_position'] == 1 )
				$newitems = $newitem.$items;
			elseif ( $defaults['loginlout_position'] == 999 )
				$newitems = $items.$newitem;
			else
				$newitem = '<li id="'.$defaults['menu_id'].'" class="'.$defaults['menu_class'].'">' . $args->before . '<a title="Logout" href="'. wp_logout_url('index.php') .'">' . $args->link_before . 'Logout' . $args->link_after . '</a>' . $args->after; // no </li> needed this is added later
		}
		else
		{
			$newitem = '<li id="'.$defaults['menu_id'].'" class="'.$defaults['menu_class'].'"><a title="Login" href="'. wp_login_url($wpurl) .'">Login</a></li>';
			if ( $defaults['loginlout_position'] == 0 || $defaults['loginlout_position'] == 1 )
				$newitems = $newitem.$items;
			elseif ( $defaults['loginlout_position'] == 999 )
				$newitems = $items.$newitem;
			else
				$newitem = '<li id="'.$defaults['menu_id'].'" class="'.$defaults['menu_class'].'">' . $args->before . '<a title="Login" href="'. wp_login_url('index.php') .'">' . $args->link_before . 'Login' . $args->link_after . '</a>' . $args->after; // no </li> needed this is added later
		}

		if ( $defaults['loginlout_position'] != 0 && $defaults['loginlout_position'] != 1 && $defaults['loginlout_position'] != 999 ) {
			$newitems = array();

			// loop through the menu items, and add the new link at the right position
			foreach($items as $index => $item)
			{
			// array indexes are always one less than the position (1st item is index 0)
				if($index == $defaults['loginlout_position']-1)
				{
					$newitems[] = $newitem;
				}
				$newitems[] = $item;
			}

			// finally put all the menu items back together into a string using the ending <li> tag and return
			$newitems = implode('</li>',$newitems);
		}

		return $newitems;
	}
	add_filter('wp_nav_menu_items', 'wps_add_loginlogout_link', 10, 2);









	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('image', 'video', 'audio'));






	// Register Custom Post Type

	// Full and Comprehensive
	add_action( 'init', 'register_cpt_huf_asset' );
	function register_cpt_huf_asset() {
	$labels = array(
		'name' => _x( 'Asset', 'huf_asset' ),
		'singular_name' => _x( 'Asset', 'huf_asset' ),
		'add_new' => _x( 'Add New', 'huf_asset' ),
		'add_new_item' => _x( 'Add New Asset', 'huf_asset' ),
		'edit_item' => _x( 'Edit Asset', 'huf_asset' ),
		'new_item' => _x( 'New Asset', 'huf_asset' ),
		'view_item' => _x( 'View Asset', 'huf_asset' ),
		'search_items' => _x( 'Search Assets', 'huf_asset' ),
		'not_found' => _x( 'No Assets found', 'huf_asset' ),
		'not_found_in_trash' => _x( 'No Assets found in Trash', 'huf_asset' ),
		'parent_item_colon' => _x( 'Parent Asset:', 'huf_asset' ),
		'menu_name' => _x( 'Assets', 'huf_asset' ),
		'menu_icon' => get_stylesheet_directory_uri() . '/images/films.png',
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => false,
		'description' => 'Video Audio Image Assets.',
		'supports' => array( 'title', 'editor', 'custom-fields', 'post-formats', 'thumbnail' ),
		'taxonomies' => array( 'level' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'menu_position' => 5,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array( 'slug' => 'asset' ),
		'capability_type' => 'post'
	);
	register_post_type( 'huf_asset', $args );
	}
	// end Register Custom Post Type


	// Let's do some Categories (terms) and Tags. 
	//hook into the init action and call create_huf_asset_taxonomies when it fires
	add_action( 'init', 'create_huf_asset_taxonomies', 0 );

	//create two taxonomies, genres and writers for the post type "book"
	function create_huf_asset_taxonomies() 
	{
	  // Add new taxonomy, make it hierarchical (like categories)
	  $labels = array(
	    'name' => _x( 'Levels', 'taxonomy general name' ),
	    'singular_name' => _x( 'Level', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Levels' ),
	    'all_items' => __( 'All Levels' ),
	    'parent_item' => __( 'Parent Level' ),
	    'parent_item_colon' => __( 'Parent Level:' ),
	    'edit_item' => __( 'Edit Level' ), 
	    'update_item' => __( 'Update Level' ),
	    'add_new_item' => __( 'Add New Level' ),
	    'new_item_name' => __( 'New Level Name' ),
	    'menu_name' => __( 'Levels' ),
	  ); 	

	  register_taxonomy('level',array('huf_asset'), array(
	    'hierarchical' => true,
	    'labels' => $labels,
	    'show_ui' => true,
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'level' ),
	  ));

	  // Add new taxonomy, NOT hierarchical (like tags)
	  $labels = array(
	    'name' => _x( 'Topics', 'taxonomy general name' ),
	    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Topics' ),
	    'popular_items' => __( 'Popular Topics' ),
	    'all_items' => __( 'All Topics' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Topic' ), 
	    'update_item' => __( 'Update Topic' ),
	    'add_new_item' => __( 'Add New Topic' ),
	    'new_item_name' => __( 'New Topic Name' ),
	    'separate_items_with_commas' => __( 'Separate Topics with commas' ),
	    'add_or_remove_items' => __( 'Add or remove Topics' ),
	    'choose_from_most_used' => __( 'Choose from the most used Topics' ),
	    'menu_name' => __( 'Topics' ),
	  ); 

	  register_taxonomy('topic','huf_asset',array(
	    'hierarchical' => false,
	    'labels' => $labels,
	    'show_ui' => true,
	    'update_count_callback' => '_update_post_term_count',
	    'query_var' => true,
	    'rewrite' => array( 'slug' => 'topic' ),
	  ));
	}
	// End Categories (terms) and Tags.





//list out taxonomies on single post
	function ucc_get_terms( $id = '' ) {
	  global $post;
	 
	  if ( empty( $id ) )
	    $id = $post->ID;
	 
	  if ( !empty( $id ) ) {
	    $post_taxonomies = array();
	    $post_type = get_post_type( $id );
	    $taxonomies = get_object_taxonomies( $post_type , 'names' );
	 
	    foreach ( $taxonomies as $taxonomy ) {
	      $term_links = array();
	      $terms = get_the_terms( $id, $taxonomy );
	 
	      if ( is_wp_error( $terms ) )
	        return $terms;
	 
	      if ( $terms ) {
	        foreach ( $terms as $term ) {
	          $link = get_term_link( $term, $taxonomy );
	          if ( is_wp_error( $link ) )
	            return $link;
	          $term_links[] = '<a href="' . $link . '" class="' . $term->slug . '" rel="' . $taxonomy . '">' . $term->name . '</a>';
	        }
	      }
	 
	      $term_links = apply_filters( "term_links-$taxonomy" , $term_links );
	      $post_terms[$taxonomy] = $term_links;
	    }
	    return $post_terms;
	  } else {
	    return false;
	  }
	}
	 
	function ucc_get_terms_list( $id = '' , $echo = true ) {
	  global $post;
	 
	  if ( empty( $id ) )
	    $id = $post->ID;
	 
	  if ( !empty( $id ) ) {
	    $my_terms = ucc_get_terms( $id );
	    if ( $my_terms ) {
	      $my_taxonomies = array();
	      foreach ( $my_terms as $taxonomy => $terms ) {
	        $my_taxonomy = get_taxonomy( $taxonomy );
	        if ( !empty( $terms ) )  $my_taxonomies[] = '<span class="' . $my_taxonomy->name . '-links">' . '<span class="entry-utility-prep entry-utility-prep-' . $my_taxonomy->name . '-links">' . $my_taxonomy->labels->name . ': ' . implode( $terms , ', ' ) . '</span></span>';
	      }
	 
	      if ( !empty( $my_taxonomies ) ) {
	        //$output = '<span>' . "\n";
	        foreach ( $my_taxonomies as $my_taxonomy ) {
	          $output .= '<span>' . $my_taxonomy . '</span>' . "\n";
	        }
	        //$output .= '</span>' . "\n";
	      }
	 
	      if ( $echo )
	        echo $output;
	      else
	        return $output;
	    } else {
	      return;
	    }
	  } else {
	    return false;
	  } 
	} 












?>