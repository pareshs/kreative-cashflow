<?php
/**
 * Kreative Cashflow (Elementor) - Theme Functions
 *
 * @package KreativeCashflow
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'KC_VERSION', '3.0.0' );
define( 'KC_DIR', get_template_directory() );
define( 'KC_URI', get_template_directory_uri() );

// ─────────────────────────────────────────────
// THEME SETUP
// ─────────────────────────────────────────────
function kc_theme_setup() {
    load_theme_textdomain( 'kreative-cashflow', KC_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ));
    
    // Elementor support
    add_theme_support( 'elementor' );
    
    // Custom logo
    add_theme_support( 'custom-logo', array(
        'height' => 80,
        'width' => 240,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Image sizes
    add_image_size( 'kc-hero', 1920, 1080, true );
    add_image_size( 'kc-property', 800, 600, true );
    add_image_size( 'kc-portrait', 600, 750, true );

    // Navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'kreative-cashflow' ),
        'footer' => __( 'Footer Menu', 'kreative-cashflow' ),
    ));
}
add_action( 'after_setup_theme', 'kc_theme_setup' );

// ─────────────────────────────────────────────
// ENQUEUE SCRIPTS & STYLES
// ─────────────────────────────────────────────
function kc_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style( 'kc-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap',
        array(), null
    );

    // Theme stylesheet
    wp_enqueue_style( 'kc-style', get_stylesheet_uri(), array(), KC_VERSION );

    // Theme JavaScript
    wp_enqueue_script( 'kc-main', KC_URI . '/assets/js/main.js', array(), KC_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'kc_enqueue_assets' );

// ─────────────────────────────────────────────
// ELEMENTOR INTEGRATION
// ─────────────────────────────────────────────

// Register Elementor custom widgets
function kc_register_elementor_widgets() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Include widget files
    require_once KC_DIR . '/inc/elementor/widgets/service-card.php';
    require_once KC_DIR . '/inc/elementor/widgets/property-card.php';
    require_once KC_DIR . '/inc/elementor/widgets/testimonial.php';
    require_once KC_DIR . '/inc/elementor/widgets/team-member.php';
    require_once KC_DIR . '/inc/elementor/widgets/hero-section.php';
    require_once KC_DIR . '/inc/elementor/widgets/process-steps.php';

    // Register widgets
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Service_Card() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Property_Card() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Testimonial() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Team_Member() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Hero() );
    \Elementor\Plugin::instance()->widgets_manager->register( new \KC_Elementor_Process_Steps() );
}
add_action( 'elementor/widgets/register', 'kc_register_elementor_widgets' );

// Add Elementor widget categories
function kc_add_elementor_category( $elements_manager ) {
    $elements_manager->add_category(
        'kreative-cashflow',
        array(
            'title' => __( 'Kreative Cashflow', 'kreative-cashflow' ),
            'icon' => 'fa fa-home',
        )
    );
}
add_action( 'elementor/elements/categories_registered', 'kc_add_elementor_category' );

// Add Elementor color scheme
function kc_add_elementor_colors() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        return;
    }

    // Add custom color palette
    \Elementor\Plugin::$instance->kits_manager->add_custom_colors( array(
        array(
            '_id' => 'kc_gold',
            'title' => __( 'Gold', 'kreative-cashflow' ),
            'color' => '#C9A84C',
        ),
        array(
            '_id' => 'kc_gold_light',
            'title' => __( 'Gold Light', 'kreative-cashflow' ),
            'color' => '#E8D49A',
        ),
        array(
            '_id' => 'kc_gold_dark',
            'title' => __( 'Gold Dark', 'kreative-cashflow' ),
            'color' => '#8B6914',
        ),
        array(
            '_id' => 'kc_slate',
            'title' => __( 'Slate', 'kreative-cashflow' ),
            'color' => '#2E3440',
        ),
        array(
            '_id' => 'kc_cream',
            'title' => __( 'Cream', 'kreative-cashflow' ),
            'color' => '#F7F4EE',
        ),
    ));
}
add_action( 'init', 'kc_add_elementor_colors' );

// Elementor canvas template support
add_filter( 'template_include', function( $template ) {
    if ( is_singular() && get_post_meta( get_the_ID(), '_wp_page_template', true ) === 'elementor_canvas' ) {
        return KC_DIR . '/templates/elementor-canvas.php';
    }
    return $template;
});

// ─────────────────────────────────────────────
// CUSTOM POST TYPES
// ─────────────────────────────────────────────
require_once KC_DIR . '/inc/custom-post-types.php';

// ─────────────────────────────────────────────
// HELPER FUNCTIONS
// ─────────────────────────────────────────────
function kc_option( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

// Service icon helper
function kc_service_icon( $slug ) {
    $icons = array(
        'first-home' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z"/></svg>',
        'investment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 38L14 30L22 36L32 22L42 32"/><circle cx="40" cy="12" r="6"/></svg>',
        'mortgage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="10" width="36" height="28" rx="2"/><path d="M24 20V28M20 24H28"/></svg>',
        'legal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 6H34V42H14Z"/><path d="M20 16H28M20 22H28"/></svg>',
        'inspection' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="22" cy="22" r="12"/><path d="M30 30L42 42"/></svg>',
        'management' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="14" r="6"/><path d="M6 38c0-6.627 5.373-12 12-12s12 5.373 12 12"/></svg>',
    );
    return isset( $icons[ $slug ] ) ? $icons[ $slug ] : $icons['first-home'];
}

// Check if Elementor is active
function kc_is_elementor_active() {
    return did_action( 'elementor/loaded' );
}

// Get Elementor edit link
function kc_elementor_edit_link( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }
    
    if ( ! kc_is_elementor_active() ) {
        return get_edit_post_link( $post_id );
    }
    
    return \Elementor\Plugin::$instance->documents->get( $post_id )->get_edit_url();
}

// ─────────────────────────────────────────────
// ADMIN NOTICE - ELEMENTOR REQUIRED
// ─────────────────────────────────────────────
function kc_elementor_notice() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>Kreative Cashflow Theme:</strong> This theme works best with <a href="<?php echo admin_url( 'plugin-install.php?s=elementor&tab=search&type=term' ); ?>">Elementor</a> installed and activated.</p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'kc_elementor_notice' );

// ─────────────────────────────────────────────
// WIDGET AREAS
// ─────────────────────────────────────────────
function kc_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Footer Widgets', 'kreative-cashflow' ),
        'id' => 'footer-widgets',
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="footer-widget-title">',
        'after_title' => '</h5>',
    ));
}
add_action( 'widgets_init', 'kc_widgets_init' );

// ─────────────────────────────────────────────
// REMOVE EMOJI SCRIPTS (PERFORMANCE)
// ─────────────────────────────────────────────
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
