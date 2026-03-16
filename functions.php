<?php
/**
 * Kreative Cashflow Theme Functions (Bootstrap 5.3 Edition)
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

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list',
        'gallery', 'caption', 'style', 'script',
    ]);
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    // Custom logo
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Custom image sizes
    add_image_size( 'kc-hero',     1920, 1080, true );
    add_image_size( 'kc-property', 800,  600,  true );
    add_image_size( 'kc-blog',     720,  405,  true );
    add_image_size( 'kc-thumb',    400,  300,  true );
    add_image_size( 'kc-portrait', 600,  750,  true );

    // Register navigation menus
    register_nav_menus([
        'primary'   => __( 'Primary Navigation', 'kreative-cashflow' ),
        'footer-1'  => __( 'Footer — Services', 'kreative-cashflow' ),
        'footer-2'  => __( 'Footer — Company', 'kreative-cashflow' ),
        'footer-3'  => __( 'Footer — Legal', 'kreative-cashflow' ),
    ]);
}
add_action( 'after_setup_theme', 'kc_theme_setup' );

// ─────────────────────────────────────────────
// ENQUEUE SCRIPTS & STYLES
// ─────────────────────────────────────────────
function kc_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'kc-fonts',
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap',
        [],
        null
    );

    // Bootstrap 5.3 CSS from CDN
    wp_enqueue_style(
        'bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );

    // Bootstrap Icons (optional but useful)
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );

    // Theme stylesheet (loads after Bootstrap)
    wp_enqueue_style(
        'kc-style',
        get_stylesheet_uri(),
        [ 'bootstrap' ],
        KC_VERSION
    );

    // Bootstrap 5.3 JS Bundle (includes Popper)
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );

    // Theme JavaScript
    wp_enqueue_script(
        'kc-main',
        KC_URI . '/assets/js/main.js',
        [ 'bootstrap-bundle' ],
        KC_VERSION,
        true
    );

    // Pass data to JS
    wp_localize_script( 'kc-main', 'kcData', [
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'kc_nonce' ),
        'siteUrl' => get_site_url(),
    ]);

    // Comment reply script
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'kc_enqueue_assets' );

// ─────────────────────────────────────────────
// REGISTER WIDGET AREAS
// ─────────────────────────────────────────────
function kc_register_sidebars() {
    $defaults = [
        'before_widget' => '<div id="%1$s" class="widget mb-4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => '</h5>',
    ];

    register_sidebar( array_merge( $defaults, [
        'name'        => __( 'Blog Sidebar', 'kreative-cashflow' ),
        'id'          => 'sidebar-blog',
        'description' => __( 'Widgets for the blog sidebar.', 'kreative-cashflow' ),
    ]));

    register_sidebar( array_merge( $defaults, [
        'name'        => __( 'Footer — Column 1', 'kreative-cashflow' ),
        'id'          => 'footer-1',
        'description' => __( 'First footer widget column.', 'kreative-cashflow' ),
    ]));

    register_sidebar( array_merge( $defaults, [
        'name'        => __( 'Footer — Column 2', 'kreative-cashflow' ),
        'id'          => 'footer-2',
        'description' => __( 'Second footer widget column.', 'kreative-cashflow' ),
    ]));

    register_sidebar( array_merge( $defaults, [
        'name'        => __( 'Footer — Column 3', 'kreative-cashflow' ),
        'id'          => 'footer-3',
        'description' => __( 'Third footer widget column.', 'kreative-cashflow' ),
    ]));
}
add_action( 'widgets_init', 'kc_register_sidebars' );

// ─────────────────────────────────────────────
// BOOTSTRAP NAV WALKER
// ─────────────────────────────────────────────
require_once KC_DIR . '/inc/class-bootstrap-navwalker.php';

// ─────────────────────────────────────────────
// CUSTOM POST TYPES
// ─────────────────────────────────────────────
require_once KC_DIR . '/inc/custom-post-types.php';

// ─────────────────────────────────────────────
// CUSTOMIZER OPTIONS
// ─────────────────────────────────────────────
require_once KC_DIR . '/inc/customizer.php';

// ─────────────────────────────────────────────
// HELPER FUNCTIONS
// ─────────────────────────────────────────────

/**
 * Get theme option with fallback
 */
function kc_option( $key, $default = '' ) {
    return get_theme_mod( $key, $default );
}

/**
 * Render a service card icon by slug
 */
function kc_service_icon( $slug ) {
    $icons = [
        'first-home' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z"/><circle cx="24" cy="22" r="4"/></svg>',
        'investment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 38L14 30L22 36L32 22L42 32"/><circle cx="40" cy="12" r="6"/><path d="M37 12H43M40 9V15"/></svg>',
        'mortgage'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="10" width="36" height="28" rx="1"/><path d="M24 20V28M20 24H28"/><path d="M12 10V6M36 10V6"/></svg>',
        'legal'      => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 6H34V42H14Z"/><path d="M20 16H28M20 22H28M20 28H24"/><path d="M10 40H38"/></svg>',
        'inspection' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="22" cy="22" r="12"/><path d="M30 30L42 42"/><path d="M18 22H26M22 18V26"/></svg>',
        'management' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="14" r="6"/><path d="M6 38c0-6.627 5.373-12 12-12s12 5.373 12 12"/><path d="M32 22l3 3 7-7"/></svg>',
    ];
    return $icons[ $slug ] ?? $icons['first-home'];
}

/**
 * Excerpt length
 */
add_filter( 'excerpt_length', fn() => 28 );
add_filter( 'excerpt_more', fn() => '&hellip;' );

/**
 * Remove emoji scripts (performance)
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/**
 * Add body classes
 */
function kc_body_classes( $classes ) {
    if ( is_singular() ) $classes[] = 'single-view';
    if ( is_front_page() ) $classes[] = 'front-page';
    return $classes;
}
add_filter( 'body_class', 'kc_body_classes' );

/**
 * Add Bootstrap container to WordPress blocks
 */
add_filter( 'render_block', function( $block_content, $block ) {
    if ( isset( $block['blockName'] ) && 'core/group' === $block['blockName'] ) {
        if ( ! empty( $block['attrs']['align'] ) && 'full' === $block['attrs']['align'] ) {
            return $block_content;
        }
    }
    return $block_content;
}, 10, 2 );
