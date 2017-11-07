<?php
/**
 * serenitysun functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package serenitysun
 */


if ( ! function_exists( 'serenitysun_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function serenitysun_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on serenitysun, use a find and replace
		 * to change 'serenitysun' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'serenitysun', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'serenitysun' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'serenitysun_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		$defaults = array(
			'default-image'          => get_template_directory_uri() . '/images/home-hero.jpg',
			'flex-height'            => true,
			'flex-width'             => true,
			'uploads'                => true,
			'random-default'         => false,
		);
		add_theme_support( 'custom-header', $defaults );

	}
endif;
add_action( 'after_setup_theme', 'serenitysun_setup' );


/**
 * Excerpt ending
 */
function serenitysun_excerpt_more( $more ) {
    return '&#46;&#46;&#46;';
}
add_filter( 'excerpt_more', 'serenitysun_excerpt_more' );


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function serenitysun_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'serenitysun_excerpt_length', 999 );


/**
 * Generate custom search form
 */
function serenitysun_my_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '">
		    <label>
		        <span class="screen-reader-text">' . __( 'Search for:' ) . '</span>
		        <input type="search" class="form-control search-field"
		            placeholder="Search..."
		            value="' . get_search_query() . '" name="s" />
		    </label>
		    <div>
		    	<button type="submit" class="btn btn-default search-submit"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
		    </div>
		</form>';
 
    return $form;
}
add_filter( 'get_search_form', 'serenitysun_my_search_form' );


/**
 * Register custom fonts.
 */
function serenitysun_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Roboto and Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$oswald = _x( 'on', 'Oswald font: on or off', 'serenitysun' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'serenitysun' );

	$font_families = array();

	if ( 'off' !== $oswald ) {
		$font_families[] = 'Oswald:400,500,600'; 
	}

	if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open Sans:400,700';
	}

	if ( in_array( 'on', array($oswald, $open_sans) ) ) {

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}



/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function serenitysun_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'serenitysun-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'serenitysun_resource_hints', 10, 2 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function serenitysun_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'serenitysun_content_width', 640 );
}
add_action( 'after_setup_theme', 'serenitysun_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function serenitysun_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'serenitysun' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'serenitysun' ),
		'before_widget' => '<section id="%1$s" class="col-sm-12 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'serenitysun' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add footer widgets here.', 'serenitysun' ),
		'before_widget' => '<section id="%1$s" class="col-sm-3 widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'serenitysun_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function serenitysun_scripts() {
	wp_enqueue_style( 'serenitysun-style', get_stylesheet_uri() );

	wp_enqueue_script( 'serenitysun-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'serenitysun-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'serenitysun-google-map-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAaesxW8w8mruYqE4HkQdf12vI-hH0m824');

	wp_enqueue_style( 'load-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );

	wp_enqueue_style( 'serenitysun-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,500,600' );

	wp_register_script( 'serenitysun-scripts', get_template_directory_uri() . '/js/scripts.js' );

	// Localize the script with new data
	$translation_array = array( 
		'templateUrl' => get_stylesheet_directory_uri() 
	);
	wp_localize_script( 'serenitysun-scripts', 'scriptsObj', $translation_array );

	// Enqueued script with localized data.
	wp_enqueue_script( 'serenitysun-scripts', get_template_directory_uri() . '/js/scripts.js');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'serenitysun_scripts' );




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}
