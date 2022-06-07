<?php
/**
 * disproal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package disproal
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function disproal_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on disproal, use a find and replace
		* to change 'disproal' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'disproal', get_template_directory() . '/languages' );

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

	// Default thumbnail size
	add_image_size( 'img-card', 360, 360 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'disproal' ),
			'footer-menu' => esc_html__( 'Footer legal', 'disproal' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'disproal_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'disproal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function disproal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'disproal_content_width', 640 );
}
add_action( 'after_setup_theme', 'disproal_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue-scripts.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets-areas.php';

/**
 * Gutenberg Support.
 */
require get_template_directory() . '/inc/gutenberg-support.php';

/**
 * CPT
 */
require get_template_directory() . '/inc/custom-post-type.php';


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



add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	
	// loop
	foreach( $items as &$item ) {
		
		// vars
		$icon = get_field('icon_menu', $item);
		
		
		// append icon
		if( $icon ) {
			
			$item->title .= ' <img src="'.$icon.'">';
			
		}
		
	}
	
	
	// return
	return $items;
	
}

add_shortcode( 'url_catalogo', 'get_url_catalogo' );
function get_url_catalogo() {
	return esc_url( get_theme_mod( 'url_catalogo', false ) );
}

 function update_menu_link($items){

//look through the menu for items with Label "Link Title"
    foreach($items as $item){

    	if ( isset( $item->classes ) && in_array( 'url-catalogo', $item->classes ) ) {

            $item->url = get_url_catalogo();
            $item->target = '_blank';

        }
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'update_menu_link', 10,2);

add_shortcode( 'titulo', 'get_the_title' );

function productos_pre_get_posts( $query ) {
	
	if( is_admin() && !$query->is_main_query() ) {
		return;
	}
	
	if( is_post_type_archive( 'products' ) || is_tax( 'category-products' ) ) {
		$query->set('orderby', 'menu_order' );	
		$query->set('order', 'ASC');
	}

}

add_action('pre_get_posts', 'productos_pre_get_posts');
