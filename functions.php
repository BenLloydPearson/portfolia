<?php
/**
 * portfolia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolia
 */

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
# Customization_Settings
 ## Colors
--------------------------------------------------------------*/

if ( ! function_exists( 'portfolia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function portfolia_setup() {
        
        /**
        * Theme Color Customizer
        */
        function portfolia_register_theme_customizer( $wp_customize ) {
            /*--------------------------------------------------------------
            # Customization_Settings
            --------------------------------------------------------------*/
            /*--------------------------------------------------------------
            ## Colors
            --------------------------------------------------------------*/
            
            /*---------------
            // Primary Text Color
            ---------------*/
            $wp_customize->add_setting(
                'portfolia_primary_text_color',
                array(
                    'default'     => '#303030',
                    'transport' => 'postMessage'
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'portfolia_primary_text_color',
                    array(
                        'label'      => __( 'Primary Text Color', 'portfolia' ),
                        'section'    => 'colors',
                        'settings'   => 'portfolia_primary_text_color'
                    )
                )
            );
            
            /*---------------
            // Secondary Text Color
            ---------------*/
            $wp_customize->add_setting(
                'portfolia_secondary_text_color',
                array(
                    'default'     => '#73aca7',
                    'transport' => 'postMessage' 
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'portfolia_secondary_text_color',
                    array(
                        'label'      => __( 'Secondary Text Color', 'portfolia' ),
                        'section'    => 'colors',
                        'settings'   => 'portfolia_secondary_text_color'
                    )
                )
            );
            
            /*---------------
            // Navigation Background Color
            ---------------*/
            $wp_customize->add_setting(
                'portfolia_nav_background_color',
                array(
                    'default'     => '#136572',
                    'transport' => 'postMessage'
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'portfolia_nav_background_color',
                    array(
                        'label'      => __( 'Navigation Background Color', 'portfolia' ),
                        'section'    => 'colors',
                        'settings'   => 'portfolia_nav_background_color'
                    )
                )
            );
            
            /*---------------
            // Navigation Button Background Color
            ---------------*/
            $wp_customize->add_setting(
                'portfolia_nav_button_color',
                array(
                    'default'     => '#063c53',
                    'transport' => 'postMessage'
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'portfolia_nav_button_color',
                    array(
                        'label'      => __( 'Navigation Button Color', 'portfolia' ),
                        'section'    => 'colors',
                        'settings'   => 'portfolia_nav_button_color'
                    )
                )
            );
        }
        function portfolia_customizer_css() {
            ?>
            <style type="text/css">
                .site-content a{ color: <?php echo get_theme_mod( 'portfolia_secondary_text_color' ); ?>; }
            </style>
            <style type="text/css">
                .site-left { background-color: <?php echo get_theme_mod( 'portfolia_nav_background_color' ); ?>; }
            </style>
            <style type="text/css">
                #primary-menu li{ background-color: <?php echo get_theme_mod( 'portfolia_nav_button_color' ); ?>; }
            </style>
            <style type="text/css">
                p, h1, h2, h3, h4, h5, h6{ color: <?php echo get_theme_mod( 'portfolia_primary_text_color' ); ?>; }
            </style>
            <?php
        }
        add_action( 'wp_head', 'portfolia_customizer_css' );
        add_action( 'customize_register', 'portfolia_register_theme_customizer' );
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on portfolia, use a find and replace
		 * to change 'portfolia' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'portfolia', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'portfolia' ),
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
		add_theme_support( 'custom-background', apply_filters( 'portfolia_custom_background_args', array(
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
	}
endif;
add_action( 'after_setup_theme', 'portfolia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portfolia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portfolia_content_width', 640 );
}
add_action( 'after_setup_theme', 'portfolia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function portfolia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'portfolia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'portfolia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'portfolia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portfolia_scripts() {
	wp_enqueue_style( 'portfolia-style', get_stylesheet_uri() );

	wp_enqueue_script( 'portfolia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'portfolia-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portfolia_scripts' );

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

