<?php
/**
 * imobi Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package imobi_Theme
 */

if ( ! function_exists( 'imobi_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function imobi_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on imobi Theme, use a find and replace
		 * to change 'imobi' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'imobi', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Principal', 'imobi' ),
			'menu-footer' => esc_html__( 'Footer', 'imobi' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		require_once 'inc/required-plugins-mensages.php';

		// removendo barra de ferramentas
		show_admin_bar(false);

	}
endif;

add_action( 'after_setup_theme', 'imobi_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function imobi_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'imobi_content_width', 640 );
}
add_action( 'after_setup_theme', 'imobi_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

require_once '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
function imobi_scripts() {

	wp_enqueue_style( 'default', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
	
	// fila de css
	wp_enqueue_style( 'icons', get_template_directory_uri() . '/css/simple-line-icons.css' );
	wp_enqueue_style( 'font_default', 'http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700' );
	wp_enqueue_style( 'layout', get_template_directory_uri() . '/css/layout.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/css/imobi-style.css' );
	

	wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array("jquery"), '', true );
	wp_enqueue_script( 'imobi-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '2017', true );
	
	// scripts plugins
	wp_enqueue_script( 'jquery-migrate','https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/vendor/jquery.easing.js', array(), '2017', true );
	wp_enqueue_script( 'jquery-back-to-top', get_template_directory_uri() . '/js/vendor/jquery.back-to-top.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'smooth-scroll', get_template_directory_uri() . '/js/vendor/jquery.smooth-scroll.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'jquery-wow-min', get_template_directory_uri() . '/js/vendor/jquery.wow.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'jquery-parallax', get_template_directory_uri() . '/js/vendor/jquery.parallax.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'jquery-appear', get_template_directory_uri() . '/js/vendor/jquery.appear.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'jquery-masonry-pkgd-min', get_template_directory_uri() . '/js/vendor/jquery.masonry.pkgd.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'imagesloaded.pkgd.min', get_template_directory_uri() . '/js/vendor/imagesloaded.pkgd.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'masonry-min', get_template_directory_uri() . '/js/vendor/masonry.min.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'wow-min', get_template_directory_uri() . '/js/vendor/wow.min.js', array("jquery"), '2017', true );

	// Scripts page
	wp_enqueue_script( 'layout-js', get_template_directory_uri() . '/js/layout.js', array("jquery"), '2017', true );
	wp_enqueue_script( 'progress-bar', get_template_directory_uri() . '/js/progress-bar.min.js', array("jquery"), '2017', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'imobi_scripts' );




function load_custom_wp_admin_style_and_js() {
        // css
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/inc/dash_theme/css/imobi_admin_style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
		wp_enqueue_style( 'wp-color-picker' ); 

        wp_enqueue_script( 'js-custom-admin', get_template_directory_uri() . '/inc/dash_theme/js/admin_js.js', array( 'wp-color-picker', 'jquery-ui-tabs' ), false, true ); 

}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style_and_js' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


require get_template_directory() . '/inc/dash_theme/dash_theme_options.php';
