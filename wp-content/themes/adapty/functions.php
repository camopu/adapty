<?php
/**
 * Adapty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adapty
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
function adapty_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Adapty, use a find and replace
		* to change 'adapty' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adapty', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'adapty' ),
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
			'adapty_custom_background_args',
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
add_action( 'after_setup_theme', 'adapty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adapty_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adapty_content_width', 640 );
}
add_action( 'after_setup_theme', 'adapty_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adapty_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'adapty' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'adapty' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'adapty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adapty_scripts() {
	wp_enqueue_style( 'adapty-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'adapty-style', 'rtl', 'replace' );

	wp_enqueue_script( 'adapty-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adapty_scripts' );

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

// Register a Slids Carousel ACF Block
if( function_exists('acf_register_block') ) {
     
	$result = acf_register_block(array(
			'name'              => 'image_slider', // Name of our block
			'title'             => __('Image Slider'), // Title of our block
			'description'       => __('A custom NT-Next Image Slider block.'), // Description of our block
			'render_callback'   => 'image_slider_block_html',// Callback function ( the once that contain the template of our block )
			'category'          => 'layout',// The category in which the block will be inserted 
			'icon'              => 'format-gallery', // The icon associated with the block ( choose from wordpress dashicons )
			//'keywords'        => array(),
	));
}


wp_enqueue_style( 'slick-css',  get_template_directory_uri() .'/css/slick/slick.css' ); 
wp_register_script( 'slick_JS', get_template_directory_uri() .'/js/slick/slick.min.js');



// Callback to render the testimonial ACF Block
function image_slider_block_html() {
	// Check for needed files for Image Carousel Block
	// Check if " slick.min.js " is "enqueued", if so next step, else, register it
	$handle = 'slick_JS';
	$list = 'enqueued';
	if (!wp_script_is( $handle, $list )) {
			wp_register_script( 'slick_JS', get_template_directory_uri() . '/js/slick/slick.min.js');
			wp_enqueue_script( 'slick_JS' );
	}
// Check if " slick.css " is "enqueued", if so next step, else, register it 
	$handle_css = 'slick-css'; 
	$list_css = 'enqueued'; 
	if(!wp_style_is($handle_css, $list_css)){
			wp_enqueue_style( 'slick-css',  get_template_directory_uri() .'/css/slick/slick.css' ); 
	}
// Include the partials files with the template.
	include( STYLESHEETPATH . "/custom/blocks/block-image_slider.php" );
}

function webp_is_displayable($result, $path) {
	if ($result === false) { $displayable_image_types = array( IMAGETYPE_WEBP ); 
		$info = @getimagesize( $path ); 
	if (empty($info)) { $result = false; } elseif (!in_array($info[2], $displayable_image_types)) { $result = false; } else { $result = true; } } return $result;}add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


function bmwp_admin_add_svg_to_upload_mimes( $upload_mimes ) {

    $file_types = array();
    $file_types['svg'] = 'image/svg+xml';
    $upload_mimes = array_merge( $file_types, $upload_mimes );
    return $upload_mimes;

}

add_filter('upload_mimes', 'bmwp_admin_add_svg_to_upload_mimes');