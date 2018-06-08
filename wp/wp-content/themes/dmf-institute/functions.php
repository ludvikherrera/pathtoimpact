<?php
/**
 * DMF Institute
 * Version: 1.0.0
 */

require_once locate_template('/libs/dmf-post-types.php');   // Custom post-types
require_once locate_template('/libs/wp_bootstrap_navwalker.php'); // navigation

class DMF {
	var $errors;
	var $messages;

	/**
	 * DMF constructor.
	 *
	 */
	function __construct() {

		if (!session_id()) session_start();

		$this->setup_theme();

		add_action('login_head', array($this, 'custom_login_logo'), 20);
		add_filter('body_class', array($this, 'post_name_in_body_class'), 20);
		add_filter('gform_tabindex', array($this, 'gform_tabindexer'), 20);
		add_action('admin_head', array($this, 'admin_css'), 20);
		add_action('init', array($this, 'register_my_menu' ), 20);
		add_action('gform_enqueue_scripts', array($this, 'remove_gforms_jquery'), 100);
		add_filter("gform_init_scripts_footer", array($this, "init_scripts"), 20 );
		add_action( 'init', array($this, 'exclude_from_search'), 99 );

		// include ACF in search
		add_filter('posts_join', array($this, 'cf_search_join') );
		add_filter( 'posts_where', array($this, 'cf_search_where') );
		add_filter( 'posts_distinct', array($this, 'cf_search_distinct') );

		add_filter('tiny_mce_before_init', array($this, 'dmf_mce4_options') );

		// set cookies
		add_action('init', array($this, 'set_dmf_newsletter_cookie'), 20);
		add_action('init', array($this, 'set_dmf_resource_cookie'), 20);

		// set mail list cookie after submission (form ID 6)
		add_action( 'gform_after_submission_6', array($this, 'update_dmf_newsletter_cookie'), 10, 2 );

		// set resource cookie after submission (form ID 4)
		add_action( 'gform_after_submission_4', array($this, 'update_dmf_resource_cookie'), 10, 2 );

		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> 'DMF Settings',
				'menu_title'	=> 'DMF Settings',
				'menu_slug' 	=> 'dmf-custom-settings',
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}
	}

	function dmf_mce4_options($init) {
		$default_colours = '"000000", "Black",
							"993300", "Burnt orange",
							"333300", "Dark olive",
							"003300", "Dark green",
							"003366", "Dark azure",
							"000080", "Navy Blue",
							"333399", "Indigo",
							"333333", "Very dark gray",
							"800000", "Maroon",
							"FF6600", "Orange",
							"808000", "Olive",
							"008000", "Green",
							"008080", "Teal",
							"0000FF", "Blue",
							"666699", "Grayish blue",
							"808080", "Gray",
							"FF0000", "Red",
							"FF9900", "Amber",
							"99CC00", "Yellow green",
							"339966", "Sea green",
							"33CCCC", "Turquoise",
							"3366FF", "Royal blue",
							"800080", "Purple",
							"999999", "Medium gray",
							"FF00FF", "Magenta",
							"FFCC00", "Gold",
							"FFFF00", "Yellow",
							"00FF00", "Lime",
							"00FFFF", "Aqua",
							"00CCFF", "Sky blue",
							"993366", "Red violet",
							"FFFFFF", "White",
							"FF99CC", "Pink",
							"FFCC99", "Peach",
							"FFFF99", "Light yellow",
							"CCFFCC", "Pale green",
							"CCFFFF", "Pale cyan",
							"99CCFF", "Light sky blue",
							"CC99FF", "Plum"';

		$custom_colours =  '"426da9", "Impact Blue",
							"ee2737", "Impact Red",
							"41b6e6", "Light Blue",
							"274165", "Dark Blue",
							"ff585d", "Light Red"';

		// build colour grid default+custom colors
		$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';

		// enable 6th row for custom colours in grid
		$init['textcolor_rows'] = 6;

		return $init;
		}


	// include ACF in search   *******************
	function cf_search_join( $join ) {
	    global $wpdb;

	    if ( is_search() ) {
	        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	    }

	    return $join;
	}

	function cf_search_where( $where ) {
	    global $wpdb;

	    if ( is_search() ) {
	        $where = preg_replace(
	            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
	            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
	    }

	    return $where;
	}
	function cf_search_distinct( $where ) {
	    global $wpdb;

	    if ( is_search() ) {
	        return "DISTINCT";
	    }

	    return $where;
	}

	// *******************************************


	function exclude_from_search() {
		global $wp_post_types;

		if ( post_type_exists( 'staff' ) ) {
			// exclude from search results
			$wp_post_types['staff']->exclude_from_search = true;
		}
	}

	// set cookie to 0 to NOT show email header
	function update_dmf_newsletter_cookie() {
		setcookie('dmf_newsletter', 0, time()+60*60*24*365, '/', false);
	}

	// set cookie to 1 to SHOW email header
	function set_dmf_newsletter_cookie() {
		if ( !isset($_COOKIE['dmf_newsletter'])) {
			setcookie('dmf_newsletter', 1, time()+60*60*24*365, '/', false);
		}
	}

	function update_dmf_resource_cookie() {

		setcookie('dmf_resource_view', 1, time()+60*60*24*365, '/', false);

	}

	function set_dmf_resource_cookie() {
		if ( !isset($_COOKIE['dmf_resource_view'])) {
			setcookie('dmf_resource_view', 0, time()+60*60*24*365, '/', false);
		}
	}

	function init_scripts() {
		return true;
	}

	function remove_gforms_jquery() {

	    // Gravity Forms plugin.
	    wp_deregister_script('jquery');

	}

	/**
	 *
	 */
	function custom_excerpt($limit = 75, $more = true){

		// from wp_trim_excerpt() in /wp-includes/formatting.php
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);

		// wp already has a trim function
		$text = wp_trim_words($text, $limit, ''); // pass an empty string in as $more, so we can define our own

		// let's trim this back to the last sentence
		$punctuation_locations = array(
			strrpos($text, '.', -1),
			strrpos($text, '?', -1),
			strrpos($text, '!', -1),
			strrpos($text, ')', -1),
			strrpos($text, '"', -1)
		);

		$pos = max($punctuation_locations);

	    	if($pos != false) {
	        	$text = substr($text, 0, $pos+1);
	   	}

		// tack on the read more if asked to
		if( $more ){
			$text .= '<br /><br /><a href="'.get_permalink().'" class="btn" title="'.get_the_title().'">Read more</a>';
		}

		return wpautop($text);
	}

	/**
	 *
	 */
	function custom_content($limit = 75, $more = true, $content){

		// from wp_trim_excerpt() in /wp-includes/formatting.php
		$text = $content;
		$text = strip_shortcodes( $text );
		//$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);

		// wp already has a trim function
		$text = wp_trim_words($text, $limit, ''); // pass an empty string in as $more, so we can define our own

		// let's trim this back to the last sentence
		$punctuation_locations = array(
			strrpos($text, '.', -1),
			strrpos($text, '?', -1),
			strrpos($text, '!', -1),
			strrpos($text, ')', -1),
			strrpos($text, '"', -1)
		);

		$pos = max($punctuation_locations);

	    	if($pos != false) {
	        	$text = substr($text, 0, $pos+1);
	   	}

		// tack on the read more if asked to
		if( $more ){
			$text .= '<br /><br /><a href="'.get_permalink().'" title="'.get_the_title().'">Read more...</a>';
		}

		return wpautop($text);
	}

	function wp_numeric_posts_nav() {

	    if( is_singular() )
	        return;

	    global $wp_query;

	    /** Stop execution if there's only 1 page */
	    if( $wp_query->max_num_pages <= 1 )
	        return;

	    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	    $max   = intval( $wp_query->max_num_pages );

	    /** Add current page to the array */
	    if ( $paged >= 1 )
	        $links[] = $paged;

	    /** Add the pages around the current page to the array */
	    if ( $paged >= 3 ) {
	        $links[] = $paged - 1;
	        $links[] = $paged - 2;
	    }

	    if ( ( $paged + 2 ) <= $max ) {
	        $links[] = $paged + 2;
	        $links[] = $paged + 1;
	    }

	    echo '<div class="navigation"><ul>' . "\n";

	    /** Previous Post Link */
	    //if ( get_previous_posts_link() )
	        //printf( '<li>%s</li>' . "\n", get_previous_posts_link("<span class='ss-icon'>previous</span>") );

	    /** Link to first page, plus ellipses if necessary */
	    if ( ! in_array( 1, $links ) ) {
	        $class = 1 == $paged ? ' class="active"' : '';

	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	        if ( ! in_array( 2, $links ) )
	            echo '<li>…</li>';
	    }

	    /** Link to current page, plus 2 pages in either direction if necessary */
	    sort( $links );
	    foreach ( (array) $links as $link ) {
	        $class = $paged == $link ? ' class="active"' : '';
	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	    }

	    /** Link to last page, plus ellipses if necessary */
	    if ( ! in_array( $max, $links ) ) {
	        if ( ! in_array( $max - 1, $links ) )
	            echo '<li>…</li>' . "\n";

	        $class = $paged == $max ? ' class="active"' : '';
	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	    }

	    /** Next Post Link */
	    //if ( get_next_posts_link() )
	        //printf( '<li class="icon">%s</li>' . "\n", get_next_posts_link("<span class='ss-icon'>next</span>") );

	    echo '</ul></div>' . "\n";

	}



	//###############################################################################
	// Fix Gravity Form Tabindex Conflicts
	//###############################################################################

     function gform_tabindexer() {
         $starting_index = 1000; // if you need a higher tabindex, update this number
         return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
     }

	/**
	 * Custom body class
	 */
	function post_name_in_body_class( $classes ){
		if( is_singular() )
		{
			global $post;
			array_push( $classes, "{$post->post_type}-{$post->post_name}" );
		}
		return $classes;
	}


	// custom admin login logo
	function custom_login_logo() {
		echo '<style type="text/css">
			h1 a {
				background-image: url("/assets/img/logo.svg") !important;
				background-size: 100% !important;
				width: 300px !important;
				height: 150px !important;
			}
			body.login {
				background: #F0F0F5 !important;
			}
			.wp-core-ui .button-primary {
				background: #ff585d;
				outline: none;
				box-shadow: none;
				text-shadow: none;
				border: none;
			}
			.wp-core-ui .button-primary.hover,
			.wp-core-ui .button-primary:hover,
			.wp-core-ui .button-primary.focus,
			.wp-core-ui .button-primary:focus {
				background: #426da9;

			}
			.login form {
				background: #41b6e6;
			}
			.login form label {
				color: #fff;
			}
			div.updated,
			.login .message,
			.press-this #message {
				background-color: #fff;
				border-left: 4px solid #e64b4d;
			}
		</style>';
	}


	function admin_css() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/assets/admin.css">';
	}



	/**
	 * Theme setup, support, menus, image sizes, etc.
	 */
	function setup_theme() {
		add_theme_support('search-form', 'post-thumbnails', 'the_excerpt', 'widgets');
	}




	function register_my_menu() {
	  register_nav_menu('top-menu',__( 'Top Menu' ));
	  register_nav_menu('footer-menu',__( 'Footer Menu' ));
	}



}



$GLOBALS['dmf'] = new DMF();
