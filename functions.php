<?php
/**
 * apolloblind functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package apolloblind
 */

if ( ! defined( 'APOLLOBLIND_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'APOLLOBLIND_VERSION', '1.0.0' );
}

include_once(dirname(__FILE__) . '/theme-settings.php');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function apolloblind_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on apolloblind, use a find and replace
		* to change 'apolloblind' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'apolloblind', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'apolloblind' ),
			'menu-2' => esc_html__( 'Footer', 'apolloblind' ),
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
			'apolloblind_custom_background_args',
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
			'height'      => 50,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'apolloblind_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function apolloblind_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'apolloblind_content_width', 640 );
}
add_action( 'after_setup_theme', 'apolloblind_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function apolloblind_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'apolloblind' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'apolloblind' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'apolloblind_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function apolloblind_scripts() {
	wp_enqueue_style( 'apolloblind-style', get_stylesheet_uri(), array(), APOLLOBLIND_VERSION );
	wp_style_add_data( 'apolloblind-style', 'rtl', 'replace' );
	wp_enqueue_style( 'apolloblind-theme-style', get_template_directory_uri() . '/dist/style.css' , array(), APOLLOBLIND_VERSION );

	wp_enqueue_script( 'apolloblind-navigation', get_template_directory_uri() . '/js/navigation.js', array(), APOLLOBLIND_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'apolloblind_scripts' );

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

function theme_customizer_settings($wp_customize) {
    // Font Color
    $wp_customize->add_setting('font_color', array(
        'default' => '#676767', // Default font color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Header Color
    $wp_customize->add_setting('header_color', array(
        'default' => '#676767', // Default header color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#87c7c8', // Default primary color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#676767', // Default accent color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Horizontal Rule Color
    $wp_customize->add_setting('hr_color', array(
        'default' => '#707070', // Default primary color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Accordion Color
    $wp_customize->add_setting('accordion_grey', array(
        'default' => '#938d8c', // Default accent color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Accordion Color
    $wp_customize->add_setting('apollo_grey', array(
        'default' => '#efefef', // Default accent color
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for each color setting
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_color', array(
        'label' => __('Font Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', array(
        'label' => __('Header Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Primary Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Accent Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hr_color', array(
        'label' => __('Horizontal Rule Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accordion_grey', array(
        'label' => __('Accordion Color', 'theme_text_domain'),
        'section' => 'colors',
    )));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'apollo_grey', array(
        'label' => __('Accordion Color', 'theme_text_domain'),
        'section' => 'colors',
    )));
}
add_action('customize_register', 'theme_customizer_settings');


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Hide ACF Menu so has to make users unable to manage the ACF field types and options
 */
add_filter('acf/settings/show_admin', '__return_false');

/**
 * Check if ACF Pro is active
 */
function check_acf_pro() {
    // Check if ACF Pro plugin is active
    if ( ! function_exists( 'acf_pro_is_active' ) ) {
        add_action( 'admin_notices', 'acf_pro_missing_notice' );
    }
}
add_action( 'admin_init', 'check_acf_pro' );

/**
 * Display notice if ACF Pro is missing
 */
function acf_pro_missing_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php esc_html_e( 'This theme requires Advanced Custom Fields (ACF) Pro to be installed and activated. Please install and activate ACF Pro to unlock all features.', 'your-theme-textdomain' ); ?></p>
    </div>
    <?php
}



/**
 * ACF Load More Repeater
*/

// add action for logged in users
add_action('wp_ajax_my_repeater_show_more', 'my_repeater_show_more');
// add action for non logged in users
add_action('wp_ajax_nopriv_my_repeater_show_more', 'my_repeater_show_more');

function my_repeater_show_more() {
	// validate the nonce
	if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'my_repeater_field_nonce')) {
		exit;
	}
	// make sure we have the other values
	if (!isset($_POST['post_id']) || !isset($_POST['offset'])) {
		return;
	}
	$show = 9; // how many more to show
	$start = $_POST['offset'];
	$end = $start+$show;
	$post_id = $_POST['post_id'];
	// use an object buffer to capture the html output
	// alternately you could create a varaible like $html
	// and add the content to this string, but I find
	// object buffers make the code easier to work with
	ob_start();
	if (have_rows('faq', $post_id)) {

		while( have_rows('faq', $post_id) ) { 
			the_row(); 

		if( have_rows('faq_questions', $post_id) ) {
			 $total_faqs = count( have_rows('faq_questions') );
                            //$faqs_count = 1;
                            //$initial_number = 3;	
		//$total = count(get_field('faq', $post_id));
		$count = 0;
		while (have_rows('faq_questions', $post_id)) {
			the_row();
			       $faq_heading = get_sub_field( 'title' );
                        $faq_desc = get_sub_field( 'description' );
			if ($count < $start) {
				// we have not gotten to where
				// we need to start showing
				// increment count and continue
				$count++;
				continue;
			}
			?>
                                <button class="group border-t border-r border-l border-accent focus:outline-none">
                                    <div class="flex items-center justify-between h-12 px-3 font-semibold bg-[#938D8C] hover:bg-gray-700">
                                        <span class="text-white truncate"><?php echo esc_html( $faq_heading )?></span>
                                        <svg class="h-5 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#fff">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="max-h-0 overflow-hidden duration-300 group-focus:max-h-40">
                                        <div class="flex items-center h-8 p-10 text-sm hover:bg-gray-200"><?php echo esc_textarea( $faq_desc ); ?></div>
                                    </div>
                                </button>
			<?php 
			$count++;
			if ($count == $end) {
				// we have shown the number, break out of loop
				break;
			}
		} // end while have rows
		}
	}
	
	} // end if have rows
	$content = ob_get_clean();
	// check to see if we have shown the last item
	$more = false;
	if ($total_faqs > $count) {
		$more = true;
	}
	// output our 3 values as a json encoded array
	echo json_encode(array('content' => $content, 'more' => $more, 'offset' => $end));
	exit;
} // end function my_repeater_show_more
