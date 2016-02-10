<?php
/**
 * Carolyne Whelan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Carolyne_Whelan
 */

if ( ! function_exists( 'carolynepress_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carolynepress_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Carolyne Whelan, use a find and replace
	 * to change 'carolynepress' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'carolynepress', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'carolynepress' ),
	) );

	/* Add theme options page(s) */
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page('Theme Settings');
	//	acf_add_options_page('More Theme Settings');
	}

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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'carolynepress_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/* Customize archive titles. */
	add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
      $title = single_cat_title( '', false );
    }
    return $title;
	});

	// add_filter( 'wp_trim_excerpt', 'get_first_paragraph', 10, 2 );

	/* Custom excerpts! */
	function get_first_paragraph($id){
		$content_post = get_post($id);
		$content = $content_post->post_content;
		$content = apply_filters('the_content', $content);
		$str = str_replace(']]>', ']]&gt;', $content);
		$str = wpautop($str);
		$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
		// Strips all tags out except links, strong, and emphasis. It will remove header tags but leave the content. Beware!
		$str = strip_tags($str, '<a><strong><em>');
		return '<p>' . $str . '</p>';
	}

}
endif;
add_action( 'after_setup_theme', 'carolynepress_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carolynepress_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carolynepress_content_width', 640 );
}
add_action( 'after_setup_theme', 'carolynepress_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carolynepress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'carolynepress' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'carolynepress_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function carolynepress_scripts() {
	wp_enqueue_style( 'carolynepress-style', get_stylesheet_uri() );

	wp_enqueue_script( 'carolynepress-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'carolynepress-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carolynepress_scripts' );

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

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Category featured images.
 */
require get_template_directory() . '/inc/category-featured-images.php';
