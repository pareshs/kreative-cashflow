<?php
/**
 * Kreative Cashflow Theme Functions
 *
 * @package KreativeCashflow
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'KC_VERSION', '2.5.5' );
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
    add_theme_support( 'custom-spacing' );
    add_theme_support( 'custom-units', [ 'rem', 'em', 'px', '%', 'vw', 'vh' ] );
    add_theme_support( 'custom-line-height' );
    add_theme_support( 'appearance-tools' );
    add_theme_support( 'core-block-patterns' );
    add_editor_style( 'assets/css/editor-styles.css' );

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

    // Editor colour palette
    add_theme_support( 'editor-color-palette', [
        [ 'name' => __( 'Ink',       'kreative-cashflow' ), 'slug' => 'ink',       'color' => '#0F0E0A' ],
        [ 'name' => __( 'Slate',     'kreative-cashflow' ), 'slug' => 'slate',     'color' => '#2E3440' ],
        [ 'name' => __( 'Slate Mid', 'kreative-cashflow' ), 'slug' => 'slate-mid', 'color' => '#4C566A' ],
        [ 'name' => __( 'Gold',      'kreative-cashflow' ), 'slug' => 'primary',      'color' => '#C9A84C' ],
        [ 'name' => __( 'Gold Dark', 'kreative-cashflow' ), 'slug' => 'primary-dark', 'color' => '#8B6914' ],
        [ 'name' => __( 'Cream',     'kreative-cashflow' ), 'slug' => 'cream',     'color' => '#F7F4EE' ],
        [ 'name' => __( 'White',     'kreative-cashflow' ), 'slug' => 'white',     'color' => '#FFFFFF' ],
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
        //'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap',
        //'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100..900;1,100..900&family=DM+Mono:wght@400;500&display=swap',
        'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Spectral:wght@400;500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'kc-style',
        get_stylesheet_uri(),
        [ 'kc-fonts' ],
        KC_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'kc-main',
        KC_URI . '/assets/js/main.js',
        [ 'jquery' ],
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
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
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
// CUSTOM POST TYPE: PROPERTIES
// ─────────────────────────────────────────────
function kc_register_cpt_properties() {
    $labels = [
        'name'               => __( 'Properties',           'kreative-cashflow' ),
        'singular_name'      => __( 'Property',             'kreative-cashflow' ),
        'menu_name'          => __( 'Properties',           'kreative-cashflow' ),
        'add_new'            => __( 'Add Property',         'kreative-cashflow' ),
        'add_new_item'       => __( 'Add New Property',     'kreative-cashflow' ),
        'edit_item'          => __( 'Edit Property',        'kreative-cashflow' ),
        'new_item'           => __( 'New Property',         'kreative-cashflow' ),
        'view_item'          => __( 'View Property',        'kreative-cashflow' ),
        'search_items'       => __( 'Search Properties',    'kreative-cashflow' ),
        'not_found'          => __( 'No properties found',  'kreative-cashflow' ),
        'not_found_in_trash' => __( 'No properties in trash', 'kreative-cashflow' ),
    ];

    register_post_type( 'kc_property', [
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => [ 'slug' => 'properties' ],
        'menu_icon'          => 'dashicons-building',
        'menu_position'      => 5,
        'supports'           => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'       => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_properties' );

// ─────────────────────────────────────────────
// CUSTOM POST TYPE: TEAM MEMBERS
// ─────────────────────────────────────────────
function kc_register_cpt_team() {
    register_post_type( 'kc_team', [
        'labels'        => [
            'name'          => __( 'Team Members',     'kreative-cashflow' ),
            'singular_name' => __( 'Team Member',      'kreative-cashflow' ),
            'menu_name'     => __( 'Team',             'kreative-cashflow' ),
            'add_new_item'  => __( 'Add Team Member',  'kreative-cashflow' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-groups',
        'menu_position' => 6,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_team' );

// ─────────────────────────────────────────────
// CUSTOM POST TYPE: TESTIMONIALS
// ─────────────────────────────────────────────
function kc_register_cpt_testimonials() {
    register_post_type( 'kc_testimonial', [
        'labels'        => [
            'name'          => __( 'Testimonials',        'kreative-cashflow' ),
            'singular_name' => __( 'Testimonial',         'kreative-cashflow' ),
            'menu_name'     => __( 'Testimonials',        'kreative-cashflow' ),
            'add_new_item'  => __( 'Add New Testimonial', 'kreative-cashflow' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-format-quote',
        'menu_position' => 7,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_testimonials' );

// ─────────────────────────────────────────────
// TAXONOMIES
// ─────────────────────────────────────────────
function kc_register_taxonomies() {
    // Property Type
    register_taxonomy( 'property_type', 'kc_property', [
        'labels'       => [
            'name'          => __( 'Property Types', 'kreative-cashflow' ),
            'singular_name' => __( 'Property Type',  'kreative-cashflow' ),
        ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'property-type' ],
    ]);

    // Property Status
    register_taxonomy( 'property_status', 'kc_property', [
        'labels'       => [
            'name'          => __( 'Property Status', 'kreative-cashflow' ),
            'singular_name' => __( 'Status',          'kreative-cashflow' ),
        ],
        'hierarchical' => false,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'property-status' ],
    ]);

    // Suburb / Location
    register_taxonomy( 'property_location', 'kc_property', [
        'labels'       => [
            'name'          => __( 'Locations', 'kreative-cashflow' ),
            'singular_name' => __( 'Location',  'kreative-cashflow' ),
        ],
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => [ 'slug' => 'location' ],
    ]);
}
add_action( 'init', 'kc_register_taxonomies' );

// ─────────────────────────────────────────────
// CUSTOM META BOXES — PROPERTY DETAILS
// ─────────────────────────────────────────────
function kc_add_property_meta_boxes() {
    add_meta_box(
        'kc_property_details',
        __( 'Property Details', 'kreative-cashflow' ),
        'kc_render_property_meta_box',
        'kc_property',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'kc_add_property_meta_boxes' );

function kc_render_property_meta_box( $post ) {
    wp_nonce_field( 'kc_property_meta', 'kc_property_nonce' );
    $fields = [
        'kc_price'        => [ 'label' => 'Price',         'type' => 'text',   'placeholder' => '$750,000' ],
        'kc_bedrooms'     => [ 'label' => 'Bedrooms',      'type' => 'number', 'placeholder' => '3' ],
        'kc_bathrooms'    => [ 'label' => 'Bathrooms',     'type' => 'number', 'placeholder' => '2' ],
        'kc_garage'       => [ 'label' => 'Garage Spaces', 'type' => 'number', 'placeholder' => '1' ],
        'kc_land_size'    => [ 'label' => 'Land Size (m²)', 'type' => 'text',  'placeholder' => '600' ],
        'kc_house_size'   => [ 'label' => 'House Size (m²)', 'type' => 'text', 'placeholder' => '240' ],
        'kc_address'      => [ 'label' => 'Full Address',  'type' => 'text',   'placeholder' => '12 Example St, Suburb QLD 4000' ],
        'kc_yield'        => [ 'label' => 'Rental Yield',  'type' => 'text',   'placeholder' => '4.8%' ],
        'kc_rental_pw'    => [ 'label' => 'Rent Per Week', 'type' => 'text',   'placeholder' => '$550 pw' ],
        'kc_agent_name'   => [ 'label' => 'Agent Name',    'type' => 'text',   'placeholder' => '' ],
        'kc_agent_phone'  => [ 'label' => 'Agent Phone',   'type' => 'text',   'placeholder' => '' ],
    ];
    echo '<div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;padding:16px 0;">';
    foreach ( $fields as $key => $field ) {
        $val = esc_attr( get_post_meta( $post->ID, $key, true ) );
        echo "<div><label style='display:block;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:0.1em;color:#666;margin-bottom:4px;'>{$field['label']}</label>";
        echo "<input type='{$field['type']}' name='{$key}' value='{$val}' placeholder='{$field['placeholder']}' style='width:100%;padding:8px 12px;border:1px solid #ddd;font-size:14px;'></div>";
    }
    echo '</div>';
}

function kc_save_property_meta( $post_id ) {
    if ( ! isset( $_POST['kc_property_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['kc_property_nonce'], 'kc_property_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [ 'kc_price', 'kc_bedrooms', 'kc_bathrooms', 'kc_garage', 'kc_land_size', 'kc_house_size', 'kc_address', 'kc_yield', 'kc_rental_pw', 'kc_agent_name', 'kc_agent_phone' ];
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_kc_property', 'kc_save_property_meta' );

// ─────────────────────────────────────────────
// CUSTOMIZER OPTIONS
// ─────────────────────────────────────────────
function kc_customizer( WP_Customize_Manager $wp_customize ) {

    // ── Panel: Kreative Cashflow
    $wp_customize->add_panel( 'kc_panel', [
        'title'    => __( 'Kreative Cashflow', 'kreative-cashflow' ),
        'priority' => 30,
    ]);

    // ═══════════════════════════════════════════
    // HERO SECTION
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_hero', [
        'title'  => __( 'Hero Section', 'kreative-cashflow' ),
        'panel'  => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_hero_tag',    'Your Complete Property Partner',  'kc_hero', 'Hero Overline Tag' );
    kc_add_setting( $wp_customize, 'kc_hero_title',  'Find. Finance. <em>Own.</em>',   'kc_hero', 'Hero Headline (HTML allowed)' );
    kc_add_setting( $wp_customize, 'kc_hero_desc',   'Expert guidance for every stage of your property journey — from first home to investment portfolio.',  'kc_hero', 'Hero Description', 'textarea' );
    kc_add_setting( $wp_customize, 'kc_hero_cta1',   'Book a Free Consultation',       'kc_hero', 'Primary CTA Label' );
    kc_add_setting( $wp_customize, 'kc_hero_cta1_url', '/contact',                     'kc_hero', 'Primary CTA URL' );
    kc_add_setting( $wp_customize, 'kc_hero_cta2',   'View Properties',                'kc_hero', 'Secondary CTA Label' );
    kc_add_setting( $wp_customize, 'kc_hero_cta2_url', '/properties',                  'kc_hero', 'Secondary CTA URL' );

    // Stats
    kc_add_setting( $wp_customize, 'kc_herostats_enable', '1', 'kc_herostats', 'Enable Hero Stats Section', 'checkbox' );
    $wp_customize->add_section( 'kc_stats', [
        'title' => __( 'Hero Stats', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    for ( $i = 1; $i <= 3; $i++ ) {
        kc_add_setting( $wp_customize, "kc_stat_{$i}_num",   [ 'End-to-End', 'Stress-Free', 'High-Quality' ][ $i-1 ], 'kc_stats', "Stat $i — Number" );
        kc_add_setting( $wp_customize, "kc_stat_{$i}_label", [ 'Property Support', 'Buying Experience', 'Property Strategies' ][ $i-1 ], 'kc_stats', "Stat $i — Label" );
    }

    // ═══════════════════════════════════════════
    // PROCESS SECTION
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_process', [
        'title' => __( 'Process Section', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_process_enable', '1', 'kc_process', 'Enable Process Section', 'checkbox' );
    kc_add_setting( $wp_customize, 'kc_process_tag',   'How It Works', 'kc_process', 'Overline Tag' );
    kc_add_setting( $wp_customize, 'kc_process_title', 'Your Journey, <em>Simplified</em>', 'kc_process', 'Section Headline (HTML)' );
    kc_add_setting( $wp_customize, 'kc_process_desc',  'From the first conversation to holding the keys — here is how we guide you through every step.', 'kc_process', 'Description', 'textarea' );

    // Process steps (4)
    for ( $i = 1; $i <= 4; $i++ ) {
        $defaults = [
            1 => [ 'title' => 'Discovery Call',      'desc' => 'Tell us your goals, budget, and timeline. We\'ll map out your ideal property journey and introduce you to the right specialists.' ],
            2 => [ 'title' => 'Strategy & Finance',  'desc' => 'Our mortgage brokers get your pre-approval sorted so you can move fast when the right property comes along.' ],
            3 => [ 'title' => 'Find & Secure',       'desc' => 'We help you identify properties, negotiate terms, book inspections, and review contracts before you commit.' ],
            4 => [ 'title' => 'Settlement & Beyond', 'desc' => 'Our solicitors manage settlement and our property managers keep your investment performing for years to come.' ],
        ];
        kc_add_setting( $wp_customize, "kc_process_{$i}_title", $defaults[$i]['title'], 'kc_process', "Step $i — Title" );
        kc_add_setting( $wp_customize, "kc_process_{$i}_desc",  $defaults[$i]['desc'],  'kc_process', "Step $i — Description", 'textarea' );
    }

    // ═══════════════════════════════════════════
    // CTA BAND
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_cta', [
        'title' => __( 'CTA Band', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_cta_enable', '1', 'kc_cta', 'Enable CTA Band', 'checkbox' );
    kc_add_setting( $wp_customize, 'kc_cta_title',  'Ready to Start Your Property <em>Journey?</em>', 'kc_cta', 'CTA Headline (HTML)' );
    kc_add_setting( $wp_customize, 'kc_cta_btn1',   'Book a Free Consultation', 'kc_cta', 'Primary Button Label' );
    kc_add_setting( $wp_customize, 'kc_cta_url1',   '/contact', 'kc_cta', 'Primary Button URL' );

    // ═══════════════════════════════════════════
    // Properties
    // ═══════════════════════════════════════════
    kc_add_setting( $wp_customize, 'kc_properties_enable', '1', 'kc_properties', 'Enable Properties Section', 'checkbox' );

    // ═══════════════════════════════════════════
    // Testimonials
    // ═══════════════════════════════════════════
    kc_add_setting( $wp_customize, 'kc_testimonials_enable', '1', 'kc_testimonials', 'Enable Testimonials Section', 'checkbox' );

    // ═══════════════════════════════════════════
    // CONTACT INFO
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_contact_info', [
        'title' => __( 'Contact Information', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    //kc_add_setting( $wp_customize, 'kc_phone',   '1300 000 000',                     'kc_contact_info', 'Phone Number' );
    kc_add_setting( $wp_customize, 'kc_email',   'info@kreativecashflow.com.au',    'kc_contact_info', 'Email Address' );
    kc_add_setting( $wp_customize, 'kc_address', 'Brisbane QLD 4000, Australia',   'kc_contact_info', 'Office Address' );
    kc_add_setting( $wp_customize, 'kc_abn',     'ACN 687 504 301',               'kc_contact_info', 'ABN' );

    // ═══════════════════════════════════════════
    // SOCIAL LINKS
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_social', [
        'title' => __( 'Social Media Links', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_facebook',  '', 'kc_social', 'Facebook URL' );
    kc_add_setting( $wp_customize, 'kc_instagram', '', 'kc_social', 'Instagram URL' );
    kc_add_setting( $wp_customize, 'kc_linkedin',  '', 'kc_social', 'LinkedIn URL' );
    kc_add_setting( $wp_customize, 'kc_youtube',   '', 'kc_social', 'YouTube URL' );
}

function kc_add_setting( $wpc, $id, $default, $section, $label, $type = 'text' ) {
    $wpc->add_setting( $id, [ 'default' => $default, 'sanitize_callback' => 'wp_kses_post', 'transport' => 'refresh' ] );
    $wpc->add_control( $id, [ 'label' => $label, 'section' => $section, 'type' => $type ] );
}
add_action( 'customize_register', 'kc_customizer' );

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
 * Render a icon by slug
 */
function kc_icon( $slug ) {
    $icons = [
        //'first-home' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z"/><circle cx="24" cy="22" r="4"/></svg>',
        //'investment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M6 38L14 30L22 36L32 22L42 32"/><circle cx="40" cy="12" r="6"/><path d="M37 12H43M40 9V15"/></svg>',
        //'mortgage'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="6" y="10" width="36" height="28" rx="1"/><path d="M24 20V28M20 24H28"/><path d="M12 10V6M36 10V6"/></svg>',
        //'legal'      => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 6H34V42H14Z"/><path d="M20 16H28M20 22H28M20 28H24"/><path d="M10 40H38"/></svg>',
        //'inspection' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="22" cy="22" r="12"/><path d="M30 30L42 42"/><path d="M18 22H26M22 18V26"/></svg>',
        //'management' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="18" cy="14" r="6"/><path d="M6 38c0-6.627 5.373-12 12-12s12 5.373 12 12"/><path d="M32 22l3 3 7-7"/></svg>',
        //PROPERTY (10)
            'first-home' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20L24 4L42 20V42H30V30H18V42H6V20Z"/><circle cx="24" cy="20" r="3"/></svg>',
            'investment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38L14 30L22 36L32 22L42 32"/><circle cx="40" cy="12" r="6"/><path d="M36 12H44V20"/></svg>',
            'mortgage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="36" height="28" rx="2"/><path d="M24 20V28M20 24H28"/><path d="M6 18H42"/></svg>',
            'legal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 6H28L36 14V42H12V6H14Z"/><path d="M28 6V14H36M18 22H30M18 30H30"/></svg>',
            'inspection' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="20" r="12"/><path d="M28 28L40 40"/><path d="M20 14V20L24 22"/></svg>',
            'management' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="14" r="6"/><path d="M6 38C6 31.4 10.5 26 18 26C25.5 26 30 31.4 30 38"/><path d="M32 14H44M32 20H40M32 26H44"/></svg>',
            'conveyancing' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M18 14H30M18 22H30M18 30H26"/><circle cx="32" cy="36" r="2"/></svg>',
            'valuation' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L24 8L40 24V40H8V24Z"/><path d="M18 32H30M24 26V38"/><path d="M18 18H20M28 18H30"/></svg>',
            'auction' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 38L22 26L18 22L6 34L10 38Z"/><path d="M26 18L38 6L42 10L30 22L26 18Z"/><path d="M18 22L26 30"/></svg>',
            'settlement' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L18 34L40 12"/><circle cx="24" cy="24" r="18"/></svg>',

        // REAL ESTATE (15)
            'house' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20L24 6L42 20V42H6V20Z"/><rect x="18" y="28" width="12" height="14"/><path d="M14 16L18 13M30 13L34 16"/></svg>',
            'apartment' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36"/><path d="M16 12H20M28 12H32M16 20H20M28 20H32M16 28H20M28 28H32M16 36H20M28 36H32"/></svg>',
            'commercial' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="30"/><path d="M6 18H42M14 18V42M34 18V42M22 24H26M22 32H26"/></svg>',
            'townhouse' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18L14 8L24 18V42H4V18Z"/><path d="M24 18L34 8L44 18V42H24V18Z"/><rect x="8" y="30" width="6" height="12"/><rect x="34" y="30" width="6" height="12"/></svg>',
            'land' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 28C8 24 12 20 16 24C20 28 24 20 28 24C32 28 36 24 44 28V42H4V28Z"/></svg>',
            'villa' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22L18 10L30 22V40H6V22Z"/><path d="M30 28H42V40H30V28Z"/><path d="M38 28V24L42 22"/></svg>',
            'studio' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="12" width="32" height="28" rx="2"/><path d="M8 24H40M20 12V40M28 24V40"/></svg>',
            'penthouse' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="16" width="24" height="24"/><path d="M8 16L24 4L40 16"/><path d="M20 24H28M20 32H28"/></svg>',
            'garage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18L24 6L42 18V42H6V18Z"/><rect x="14" y="26" width="20" height="16"/><path d="M14 32H34"/></svg>',
            'garden' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 42V30"/><path d="M18 30C18 24 12 20 8 20C8 26 12 30 18 30Z"/><path d="M30 30C30 24 36 20 40 20C40 26 36 30 30 30Z"/><circle cx="24" cy="18" r="8"/></svg>',
            'pool' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="16" width="36" height="22" rx="3"/><path d="M12 28C14 26 16 26 18 28C20 30 22 30 24 28C26 26 28 26 30 28C32 30 34 30 36 28"/><path d="M10 20L16 26M38 20L32 26"/></svg>',
            'balcony' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="28"/><path d="M6 28H42"/><path d="M14 28V40M22 28V40M30 28V40M38 28V40"/></svg>',
            'furnished' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="20" width="32" height="18"/><path d="M12 20V14H20V20M28 20V14H36V20"/><path d="M8 26H40M6 38H42"/></svg>',
            'parking' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M16 14H26C29 14 32 17 32 20C32 23 29 26 26 26H16V14ZM16 26V34"/></svg>',
            'elevator' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="6" width="24" height="36" rx="2"/><path d="M20 18L24 14L28 18M20 30L24 34L28 30"/><path d="M24 14V34"/></svg>',

        // FINANCE & MONEY (18)
            'dollar' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V44M18 12H28C30 12 32 14 32 16C32 18 30 20 28 20H20C18 20 16 22 16 24C16 26 18 28 20 28H30"/></svg>',
            'calculator' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="4" width="32" height="40" rx="2"/><rect x="12" y="8" width="24" height="8"/><path d="M16 24V24.02M24 24V24.02M32 24V24.02M16 32V32.02M24 32V32.02M32 32V32.02"/></svg>',
            'chart-up' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38L16 28L24 34L32 20L42 28M42 28V20M42 28H34"/></svg>',
            'wallet' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="26" rx="2"/><path d="M6 20H42"/><circle cx="34" cy="26" r="3"/></svg>',
            'coins' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="24" r="14"/><path d="M30 14C36 16 40 20 40 24C40 32 34 38 26 40"/></svg>',
            'piggybank' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="28" cy="24" rx="16" ry="12"/><circle cx="34" cy="20" r="2"/><path d="M44 20H40M12 24H8M28 36V42"/><path d="M20 18H22"/></svg>',
            'bank' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16L24 4L44 16V20H4V16Z"/><path d="M8 20V40M18 20V40M28 20V40M38 20V40M4 40H44"/></svg>',
            'credit-card' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="40" height="24" rx="3"/><path d="M4 20H44M12 32H20M28 32H32"/></svg>',
            'invoice' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36"/><path d="M16 14H32M16 22H32M16 30H26M24 6V2M10 42L14 38L18 42"/></svg>',
            'receipt' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 4H38V44L34 40L30 44L26 40L22 44L18 40L14 44L10 40V4Z"/><path d="M16 12H32M16 20H32M16 28H26"/></svg>',
            'tax' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="32" height="32" rx="2"/><path d="M18 18V30M24 14V34M30 20V28"/></svg>',
            'interest' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 12V24L32 28"/></svg>',
            'savings' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 8V18M24 30V40M16 24H8M40 24H32"/><circle cx="24" cy="24" r="6"/><circle cx="24" cy="24" r="12"/></svg>',
            'budget' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M24 14V34M14 24H34"/></svg>',
            'loan' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 28L8 24L12 20M36 20L40 24L36 28"/><path d="M14 24H34"/><rect x="16" y="10" width="16" height="8" rx="2"/><rect x="16" y="30" width="16" height="8" rx="2"/></svg>',
            'deposit' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 30V4M16 12L24 4L32 12"/><rect x="8" y="30" width="32" height="12" rx="2"/></svg>',
            'withdraw' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V30M16 22L24 30L32 22"/><rect x="8" y="36" width="32" height="6" rx="1"/></svg>',
            'profit' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="28" width="6" height="16"/><rect x="18" y="22" width="6" height="22"/><rect x="28" y="14" width="6" height="30"/><rect x="38" y="8" width="6" height="36"/></svg>',

        // BUSINESS (20)
            'briefcase' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="16" width="40" height="24" rx="2"/><path d="M16 16V12C16 10 18 8 20 8H28C30 8 32 10 32 12V16M4 24H44"/></svg>',
            'handshake' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 28L8 24L12 20L24 32L36 20L40 24L36 28L24 40L12 28Z"/></svg>',
            'target' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><circle cx="24" cy="24" r="12"/><circle cx="24" cy="24" r="6"/><circle cx="24" cy="24" r="2"/></svg>',
            'award' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="20" r="12"/><path d="M18 28L16 44L24 40L32 44L30 28"/></svg>',
            'shield' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L6 12V24C6 34 14 42 24 44C34 42 42 34 42 24V12L24 4Z"/><path d="M18 24L22 28L30 18"/></svg>',
            'team' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="16" cy="14" r="6"/><circle cx="32" cy="14" r="6"/><path d="M4 38C4 32 8 28 16 28C24 28 28 32 28 38M20 38C20 32 24 28 32 28C40 28 44 32 44 38"/></svg>',
            'presentation' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="26"/><path d="M24 32V42M18 42H30M12 14H36M18 20L30 24"/></svg>',
            'strategy' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 36L24 24L36 36M12 24L24 12L36 24"/><circle cx="24" cy="12" r="3"/><circle cx="24" cy="24" r="3"/><circle cx="12" cy="24" r="3"/><circle cx="36" cy="24" r="3"/></svg>',
            'idea' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C18 4 14 8 14 14C14 18 16 20 16 24H32C32 20 34 18 34 14C34 8 30 4 24 4Z"/><path d="M18 30H30M20 36H28M24 36V42"/></svg>',
            'document' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4H28L36 12V44H12V4H14Z"/><path d="M28 4V12H36M18 20H30M18 28H30M18 36H26"/></svg>',
            'folder' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 12H20L24 16H42V38H6V12Z"/></svg>',
            'analytics' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 38L16 30L24 36L32 22L40 28M4 6H44M4 42H44"/></svg>',
            'checklist' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M16 16L20 20L28 12M16 26L20 30L28 22M16 36L20 40L28 32"/></svg>',
            'calendar' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="10" width="36" height="32" rx="2"/><path d="M6 18H42M16 6V14M32 6V14"/></svg>',
            'clock' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 12V24L32 28"/></svg>',
            'chart-pie' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="16"/><path d="M24 8V24L38 30"/><path d="M24 24L38 18"/></svg>',
            'growth' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 40L18 30L26 36L38 20M38 20H30M38 20V28"/></svg>',
            'deal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 24H12L8 28L12 32H20M28 24H36L40 28L36 32H28"/><circle cx="20" cy="28" r="8"/><circle cx="28" cy="28" r="8"/></svg>',
            'contract-sign' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="2"/><path d="M16 14H32M16 22H32M16 30H24"/><path d="M28 36C30 34 32 34 34 36"/></svg>',
            'meeting-room' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="24" rx="2"/><circle cx="18" cy="24" r="4"/><circle cx="30" cy="24" r="4"/><path d="M24 12V36"/></svg>',
        
        // FEATURES & UI (22)
            'star' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L28 18H42L30 26L34 40L24 32L14 40L18 26L6 18H20L24 4Z"/></svg>',
            'check' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24L18 34L40 12"/></svg>',
            'phone' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4H34C36 4 38 6 38 8V40C38 42 36 44 34 44H14C12 44 10 42 10 40V8C10 6 12 4 14 4Z"/><circle cx="24" cy="38" r="2"/></svg>',
            'email' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="10" width="40" height="28" rx="2"/><path d="M4 14L24 28L44 14"/></svg>',
            'support' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 18V24M24 30H24.02"/></svg>',
            'heart' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 40L8 24C2 18 2 8 12 8C18 8 22 12 24 16C26 12 30 8 36 8C46 8 46 18 40 24L24 40Z"/></svg>',
            'thumbs-up' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24H14V44H8V24ZM18 20L22 4H30L28 20H42V28L36 44H18V20Z"/></svg>',
            'download' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4V32M16 24L24 32L32 24M8 36V40C8 42 10 44 12 44H36C38 44 40 42 40 40V36"/></svg>',
            'search' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="20" r="14"/><path d="M30 30L42 42"/></svg>',
            'bell' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 38C20 40 22 42 24 42C26 42 28 40 28 38M10 34H38C38 34 36 32 36 24C36 16 30 10 24 10C18 10 12 16 12 24C12 32 10 34 10 34Z"/></svg>',
            'settings' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="4"/><path d="M24 14V10M24 38V34M34 24H38M10 24H14M31 31L34 34M14 14L17 17M17 31L14 34M34 14L31 17"/></svg>',
            'lock' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="20" width="28" height="20" rx="2"/><path d="M16 20V14C16 10 18 6 24 6C30 6 32 10 32 14V20"/></svg>',
            'user' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="16" r="8"/><path d="M8 40C8 32 14 26 24 26C34 26 40 32 40 40"/></svg>',
            'location-pin' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C16 4 8 10 8 18C8 28 24 44 24 44C24 44 40 28 40 18C40 10 32 4 24 4Z"/><circle cx="24" cy="18" r="4"/></svg>',
            'gift' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="36" height="24"/><path d="M24 20V44M6 28H42M20 20C18 18 16 14 20 10C24 6 26 10 24 12M28 20C30 18 32 14 28 10C24 6 22 10 24 12"/></svg>',
            'wifi' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18C8 14 16 10 24 10C32 10 40 14 44 18M10 26C13 23 18 20 24 20C30 20 35 23 38 26M16 34C18 32 21 30 24 30C27 30 30 32 32 34"/><circle cx="24" cy="40" r="2"/></svg>',
            'camera' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="14" width="40" height="26" rx="2"/><circle cx="24" cy="27" r="7"/><path d="M16 8L18 14M32 8L30 14"/></svg>',
            'video' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="28" height="24" rx="2"/><path d="M32 20L44 14V34L32 28"/></svg>',
            'microphone' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="18" y="4" width="12" height="20" rx="6"/><path d="M12 22C12 28 17 33 24 34M24 34C31 33 36 28 36 22M24 34V44M18 44H30"/></svg>',
            'map' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 8L16 4L32 12L44 8V40L32 44L16 36L4 40V8Z"/><path d="M16 4V36M32 12V44"/></svg>',
            'bookmark' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 6H36V44L24 36L12 44V6Z"/></svg>',
            'share' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="36" cy="12" r="6"/><circle cx="12" cy="24" r="6"/><circle cx="36" cy="36" r="6"/><path d="M17 27L31 34M17 21L31 14"/></svg>',
        
        // SOCIAL MEDIA (15)
            'facebook' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm5 14h-3c-1 0-1 .5-1 1v2h4l-.5 4H25v12h-4V25h-3v-4h3v-3c0-2.5 1.5-5 5-5h3v4z"/></svg>',
            'instagram' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="32" height="32" rx="8"/><circle cx="24" cy="24" r="7"/><circle cx="35" cy="13" r="1.5" fill="currentColor"/></svg>',
            'linkedin' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M40 4H8C5.8 4 4 5.8 4 8v32c0 2.2 1.8 4 4 4h32c2.2 0 4-1.8 4-4V8c0-2.2-1.8-4-4-4zM16 38h-4V20h4v18zm-2-20.5c-1.4 0-2.5-1.1-2.5-2.5s1.1-2.5 2.5-2.5 2.5 1.1 2.5 2.5-1.1 2.5-2.5 2.5zM38 38h-4v-9c0-2.2-1.8-4-4-4s-4 1.8-4 4v9h-4V20h4v2c1.2-1.5 3-2.5 5-2.5 3.9 0 7 3.1 7 7v11.5z"/></svg>',
            'youtube' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M40 14c-.7-2.8-2.8-5-5.6-5.6C30.4 8 24 8 24 8s-6.4 0-10.4.4C11 8.9 8.9 11.1 8.2 14 7.8 18 7.8 24 7.8 24s0 6 .4 10c.7 2.9 2.8 5.1 5.6 5.6 4 .4 10.4.4 10.4.4s6.4 0 10.4-.4c2.8-.5 4.9-2.7 5.6-5.6.4-4 .4-10 .4-10s0-6-.4-10zM20 30V18l9 6-9 6z"/></svg>',
            'twitter' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M42 12.5c-1.5.7-3.1 1.1-4.8 1.3 1.7-1 3-2.7 3.6-4.6-1.6.9-3.4 1.6-5.3 2-1.5-1.6-3.7-2.7-6.1-2.7-4.6 0-8.3 3.7-8.3 8.3 0 .7.1 1.3.2 1.9-6.9-.3-13-3.7-17.1-8.7-.7 1.2-1.1 2.7-1.1 4.2 0 2.9 1.5 5.4 3.7 6.9-1.4 0-2.6-.4-3.8-1v.1c0 4 2.9 7.4 6.7 8.2-.7.2-1.4.3-2.2.3-.5 0-1.1-.1-1.6-.1 1.1 3.3 4.2 5.7 7.8 5.8-2.9 2.2-6.5 3.6-10.4 3.6-.7 0-1.3 0-2-.1 3.7 2.4 8.1 3.8 12.8 3.8 15.4 0 23.8-12.7 23.8-23.8v-1.1c1.6-1.2 3-2.6 4.1-4.2z"/></svg>',
            'whatsapp' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24c0 3.5.9 6.8 2.5 9.6L4 44l10.7-2.4C17.4 43.1 20.6 44 24 44c11.05 0 20-8.95 20-20S35.05 4 24 4zm9.8 26.9c-.4 1.2-2.4 2.3-3.3 2.4-.9.1-1.7.4-5.8-1.2-4.9-1.9-8-6.9-8.3-7.2-.3-.3-2.3-3-2.3-5.8s1.5-4.1 2-4.7c.6-.6 1.2-.7 1.6-.7h1.2c.4 0 .9-.1 1.4 1.1.5 1.2 1.7 4.2 1.8 4.5.2.3.3.6.1 1-.2.4-.3.5-.6.8-.3.3-.6.7-.9 1-.3.3-.6.6-.3 1.2s1.6 2.7 3.5 4.4c2.4 2.2 4.4 2.9 5 3.2s1 .2 1.4-.2c.4-.4 1.7-2 2.2-2.7.5-.7 1-.6 1.6-.4.6.3 3.8 1.8 4.4 2.1.6.3 1 .5 1.2.8.2.4.2 2-.2 3.2z"/></svg>',
            'telegram' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24s8.95 20 20 20 20-8.95 20-20S35.05 4 24 4zm10.2 14.2l-3.4 16c-.3 1.2-1 1.5-2 .9l-5.5-4-2.7 2.6c-.3.3-.5.5-1 .5l.4-5.4 9.4-8.5c.4-.4-.1-.6-.6-.2l-11.6 7.3-5-1.6c-1.1-.3-1.1-1.1.2-1.6l19.5-7.5c.9-.3 1.7.2 1.4 1.5z"/></svg>',
            'tiktok' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M34 12c-2 0-3.5-1.5-3.5-3.5V4h-6v24c0 3-2.5 5.5-5.5 5.5S13.5 31 13.5 28s2.5-5.5 5.5-5.5c.5 0 1 .1 1.5.2V16c-4.4 0-8 3.6-8 8s3.6 8 8 8 8-3.6 8-8v-8.5c2 1.5 4.5 2.5 7 2.5V12z"/></svg>',
            'pinterest' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4C12.95 4 4 12.95 4 24c0 8.4 5.2 15.6 12.5 18.5-.2-1.4-.3-3.5.1-5 .3-1.4 2.1-8.8 2.1-8.8s-.5-1.1-.5-2.7c0-2.5 1.5-4.4 3.3-4.4 1.5 0 2.3 1.2 2.3 2.5 0 1.5-1 3.9-1.5 6-.4 1.8.9 3.3 2.7 3.3 3.2 0 5.7-3.4 5.7-8.3 0-4.3-3.1-7.4-7.5-7.4-5.1 0-8.1 3.8-8.1 7.7 0 1.5.6 3.1 1.3 4 .2.2.2.3.1.6l-.5 1.9c-.1.4-.3.5-.7.3-2.5-1.2-4.1-4.8-4.1-7.7 0-5.7 4.1-10.9 11.9-10.9 6.3 0 11.1 4.5 11.1 10.4 0 6.2-3.9 11.2-9.4 11.2-1.8 0-3.5-.9-4.1-2 0 0-.9 3.4-1.1 4.2-.4 1.5-1.5 3.4-2.2 4.5 1.7.5 3.4.8 5.2.8 11.05 0 20-8.95 20-20S35.05 4 24 4z"/></svg>',
            'snapchat' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M24 4c-5.5 0-10 4.5-10 10v8c0 1.1-.9 2-2 2s-2 .9-2 2c0 2.2 2.2 4 4 4 .6 0 1.1.5 1.1 1.1 0 1.1 1.1 1.9 2.2 1.9h13.4c1.1 0 2.2-.8 2.2-1.9 0-.6.5-1.1 1.1-1.1 1.8 0 4-1.8 4-4 0-1.1-.9-2-2-2s-2-.9-2-2v-8c0-5.5-4.5-10-10-10z"/></svg>',
            'reddit' => '<svg viewBox="0 0 48 48" fill="currentColor"><circle cx="24" cy="24" r="20"/><path d="M34 24c0-1.7-1.3-3-3-3-.8 0-1.5.3-2 .8-2-1.4-4.7-2.3-7.7-2.4l1.3-6 4.3.9c0 1.4 1.1 2.5 2.5 2.5s2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5c-1 0-1.9.6-2.3 1.4l-4.8-1c-.3-.1-.6.1-.7.4l-1.5 6.7c-3 .1-5.7 1-7.7 2.4-.5-.5-1.2-.8-2-.8-1.7 0-3 1.3-3 3 0 1.2.7 2.2 1.7 2.7-.1.4-.1.8-.1 1.2 0 4.4 4.5 8 10 8s10-3.6 10-8c0-.4 0-.8-.1-1.2 1-.5 1.7-1.5 1.7-2.7zm-16 2c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm11.5 5.5c-1.4 1.4-4.1 1.5-5.5 1.5s-4.1-.1-5.5-1.5c-.2-.2-.2-.5 0-.7s.5-.2.7 0c1 1 3.2 1.2 4.8 1.2s3.8-.2 4.8-1.2c.2-.2.5-.2.7 0s.2.5 0 .7zM28 28c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z" fill="white"/></svg>',
            'discord' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M38 10c-2.5-1.2-5.3-2-8.2-2.5-.4.7-.8 1.5-1.1 2.3-3.1-.5-6.1-.5-9.1 0-.3-.8-.7-1.6-1.1-2.3-2.9.5-5.7 1.3-8.2 2.5-5.8 8.7-7.4 17.2-6.6 25.5 3.5 2.6 6.9 4.2 10.2 5.2.8-1.1 1.5-2.3 2.1-3.5-1.2-.4-2.3-1-3.3-1.6.3-.2.6-.4.8-.6 6.4 3 13.7 3 19.9 0 .3.2.6.4.8.6-1 .6-2.1 1.2-3.3 1.6.6 1.2 1.3 2.4 2.1 3.5 3.3-1 6.7-2.6 10.2-5.2.9-9.5-1.5-17.7-6.6-25.5zM18.5 30.5c-2.2 0-4-2-4-4.5s1.8-4.5 4-4.5 4 2 4 4.5-1.8 4.5-4 4.5zm11 0c-2.2 0-4-2-4-4.5s1.8-4.5 4-4.5 4 2 4 4.5-1.8 4.5-4 4.5z"/></svg>',
            'twitch' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M10 4L6 12V40H14V44H18L22 40H30L42 28V4H10ZM38 26L32 32H26L21 37V32H14V8H38V26ZM32 14V24H28V14H32ZM22 14V24H18V14H22Z"/></svg>',
            'spotify' => '<svg viewBox="0 0 48 48" fill="currentColor"><circle cx="24" cy="24" r="20"/><path d="M32 28c-5-3-12-3-16-2-.6.2-1.2-.2-1.4-.8-.2-.6.2-1.2.8-1.4 5-1 12-1 18 2 .5.3.7 1 .4 1.5-.3.5-1 .7-1.5.4-.1-.1-.2-.1-.3-.2zm-1.5-5c-5-3-12-4-17-2-.7.2-1.4-.2-1.6-.9-.2-.7.2-1.4.9-1.6 6-2 13-1 19 2 .6.3.8 1.1.5 1.7-.3.6-1.1.8-1.7.5-.1 0-.1 0-.1-.1zm-1.5-5c-5-3-14-3-19-2-.8.2-1.6-.3-1.8-1.1-.2-.8.3-1.6 1.1-1.8 6-1 15-1 21 2 .7.4 1 1.3.6 2-.4.7-1.3 1-2 .6 0 0 0 0 0 0z" fill="white"/></svg>',
            'slack' => '<svg viewBox="0 0 48 48" fill="currentColor"><path d="M18 10c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4h4v-4zm0 8c0-2.2-1.8-4-4-4s-4 1.8-4 4v10c0 2.2 1.8 4 4 4s4-1.8 4-4V18zm8-8c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4 4-1.8 4-4zm0 24v-10c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4v6c0 2.2 1.8 4 4 4s4-1.8 4-4zm8-20c0-2.2-1.8-4-4-4s-4 1.8-4 4 1.8 4 4 4 4-1.8 4-4zm-4 8c-2.2 0-4 1.8-4 4s1.8 4 4 4h10c2.2 0 4-1.8 4-4s-1.8-4-4-4h-10z"/></svg>',

    // CONSTRUCTION & TOOLS (15 icons)
    'hammer' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M10 38L22 26L18 22L6 34L10 38Z"/><path d="M26 18L38 6L42 10L30 22L26 18Z"/><rect x="34" y="20" width="8" height="8" transform="rotate(45 38 24)"/></svg>',
    'wrench' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M38 10C38 10 34 6 28 6C22 6 18 10 18 16C18 18 18.5 19.5 19.5 21L6 34L14 42L27 28.5C28.5 29.5 30 30 32 30C38 30 42 26 42 20C42 14 38 10 38 10Z"/><path d="M38 10L30 18"/></svg>',
    'drill' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="16" width="24" height="8" rx="2"/><path d="M32 16V24L40 20V16L32 16Z"/><rect x="14" y="24" width="4" height="12"/></svg>',
    'saw' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="30" cy="24" r="14"/><path d="M16 24L8 32M16 24L10 18M16 24L12 28"/><path d="M30 10V38"/></svg>',
    'paint-roller' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="12" y="4" width="24" height="12" rx="2"/><path d="M24 16V24M20 24H28V44H20V24Z"/></svg>',
    'toolbox' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="20" width="40" height="20" rx="2"/><path d="M16 20V16C16 14 18 12 20 12H28C30 12 32 14 32 16V20M4 28H16M32 28H44M16 28V24M32 28V24"/></svg>',
    'ladder' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4L12 44M32 4L28 44M16 12H32M16 20H32M16 28H32M16 36H32"/></svg>',
    'tape-measure' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="12" width="36" height="24" rx="3"/><path d="M14 20V28M20 20V28M26 20V28M32 20V28M38 20V28"/></svg>',
    'level' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="18" width="40" height="12" rx="2"/><circle cx="24" cy="24" r="4"/><path d="M24 20V28M12 20V28M36 20V28"/></svg>',
    'blueprint' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="2"/><path d="M14 14H34M14 22H34M14 30H26M14 38H22"/></svg>',
    'crane' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 44V4H16V44M16 8H44M44 8V12M32 12V20L28 24V32"/><rect x="26" y="32" width="4" height="4"/></svg>',
    'hardhat' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 28C8 18 14 10 24 10C34 10 40 18 40 28H8Z"/><path d="M6 28H42V32H6V28Z"/></svg>',
    'cement-mixer' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 12L20 8H28L32 12V24L28 32H20L16 24V12Z"/><circle cx="18" cy="38" r="4"/><circle cx="30" cy="38" r="4"/><path d="M24 8V4"/></svg>',
    'brick' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="40" height="24"/><path d="M4 20H44M4 28H44M16 12V36M32 12V36M24 20V28"/></svg>',
    'pipe' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="18" width="32" height="12" rx="6"/><path d="M8 24H4M44 24H40"/></svg>',

    // TRANSPORTATION & VEHICLES (12 icons)
    'car' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 28L10 14H38L42 28V38H38V36H10V38H6V28Z"/><circle cx="14" cy="32" r="3"/><circle cx="34" cy="32" r="3"/><path d="M14 14L16 20M34 14L32 20"/></svg>',
    'truck' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="18" width="24" height="16"/><path d="M28 22H38L42 28V34H28V22Z"/><circle cx="12" cy="34" r="4"/><circle cx="34" cy="34" r="4"/></svg>',
    'van' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 14H38V34H6V14Z"/><path d="M38 22H44V34H38"/><circle cx="14" cy="34" r="4"/><circle cx="34" cy="34" r="4"/><path d="M14 14V10H34V14"/></svg>',
    'motorcycle' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="32" r="8"/><circle cx="36" cy="32" r="8"/><path d="M20 32L28 16H34M28 16L24 24L30 32"/></svg>',
    'bicycle' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="32" r="8"/><circle cx="36" cy="32" r="8"/><path d="M24 12L28 20L36 32M28 20L20 32L12 32M24 12H20"/></svg>',
    'bus' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="10" width="32" height="28" rx="3"/><path d="M8 22H40M16 10V22M32 10V22"/><circle cx="16" cy="34" r="2"/><circle cx="32" cy="34" r="2"/></svg>',
    'train' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="8" width="28" height="28" rx="4"/><path d="M10 20H38M16 8V20M32 8V20"/><circle cx="18" cy="30" r="2"/><circle cx="30" cy="30" r="2"/><path d="M14 36L10 42M34 36L38 42"/></svg>',
    'plane' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L44 24L24 28L12 44L8 40L14 24L4 24L6 16L24 4Z"/></svg>',
    'ship' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 28L8 24H40L44 28L40 36L32 32L24 36L16 32L8 36L4 28Z"/><path d="M24 24V8M16 16L24 8L32 16"/></svg>',
    'helicopter' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 14H40M16 14V24H32V14M24 24V32M16 32L24 32L32 32M12 36H36"/></svg>',
    'scooter' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="36" r="6"/><circle cx="36" cy="36" r="6"/><path d="M18 36H30M30 20H38L36 36M30 20L24 12H20L18 20L12 36"/></svg>',
    'rocket' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C24 4 14 8 14 20V32L18 40L24 36L30 40L34 32V20C34 8 24 4 24 4Z"/><circle cx="24" cy="18" r="3"/><path d="M14 32L8 36V44M34 32L40 36V44"/></svg>',

    // FOOD & DINING (15 icons)
    'coffee' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 14H32V28C32 32 28 36 24 36H16C12 36 8 32 8 28V14Z"/><path d="M32 20H36C38 20 40 22 40 24C40 26 38 28 36 28H32"/><path d="M6 44H34"/></svg>',
    'restaurant' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4V20C14 22 16 24 18 24V44M22 4V20C22 22 24 24 26 24M26 4V44"/></svg>',
    'pizza' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L4 40L24 44L44 40L24 4Z"/><circle cx="24" cy="20" r="2"/><circle cx="18" cy="28" r="2"/><circle cx="30" cy="28" r="2"/></svg>',
    'burger' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 20C8 14 14 10 24 10C34 10 40 14 40 20"/><path d="M6 20H42V26H6V20Z"/><rect x="8" y="26" width="32" height="8"/><path d="M6 34H42V38C42 40 40 42 38 42H10C8 42 6 40 6 38V34Z"/></svg>',
    'wine' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4H32V16C32 22 28 26 24 28C20 26 16 22 16 16V4Z"/><path d="M24 28V44M18 44H30M16 12H32"/></svg>',
    'ice-cream' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 16C16 10 18 6 24 6C30 6 32 10 32 16C32 18 31 20 30 22V24H18V22C17 20 16 18 16 16Z"/><path d="M18 24L24 44L30 24"/></svg>',
    'cake' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="20" width="32" height="20"/><path d="M16 12V20M24 8V20M32 12V20M8 28H40"/></svg>',
    'apple' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 10C16 10 10 16 10 24C10 34 16 42 24 42C32 42 38 34 38 24C38 16 32 10 24 10Z"/><path d="M24 10C24 10 28 4 32 6M26 10L30 4"/></svg>',
    'utensils' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 4V20M14 20C14 22 16 24 18 24V44M10 4V14M18 4V14M22 4V44M26 4V20C26 22 28 24 30 24V44"/></svg>',
    'chef-hat' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20C12 14 16 10 24 10C32 10 36 14 36 20V28H12V20Z"/><path d="M10 28H38V34C38 36 36 38 34 38H14C12 38 10 36 10 34V28Z"/></svg>',
    'grocery-bag' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="14" width="28" height="28"/><path d="M16 14V12C16 8 18 6 24 6C30 6 32 8 32 12V14"/></svg>',
    'cocktail' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 8H40L24 28V44M18 44H30M28 8L32 16"/></svg>',
    'bottle' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="16" y="4" width="16" height="6"/><path d="M18 10H30V18L34 22V42C34 43 33 44 32 44H16C15 44 14 43 14 42V22L18 18V10Z"/></svg>',
    'bread' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 20C8 14 12 10 18 10H30C36 10 40 14 40 20V34C40 36 38 38 36 38H12C10 38 8 36 8 34V20Z"/><path d="M16 18V30M24 18V30M32 18V30"/></svg>',
    'hot-dog' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="24" cy="24" rx="20" ry="10"/><path d="M8 20L10 28L6 28M40 20L38 28L42 28M18 22C18 20 20 18 24 18C28 18 30 20 30 22"/></svg>',

    // WEATHER & NATURE (12 icons)
    'sun' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="10"/><path d="M24 4V8M24 40V44M44 24H40M8 24H4M38 38L35 35M13 13L10 10M38 10L35 13M13 35L10 38"/></svg>',
    'moon' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M28 6C18 8 12 16 12 24C12 32 18 40 28 42C22 42 16 36 16 28C16 20 22 14 28 6Z"/></svg>',
    'cloud' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M36 28C40 28 44 24 44 20C44 16 40 12 36 12C36 8 32 4 28 4C24 4 20 8 20 12C16 12 12 16 12 20C12 24 16 28 20 28H36Z"/></svg>',
    'rain' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M36 24C40 24 44 20 44 16C44 12 40 8 36 8C36 6 33 4 30 4C27 4 24 6 24 8C20 8 16 12 16 16C16 20 20 24 24 24H36Z"/><path d="M18 30V38M24 30V38M30 30V38M36 30V38"/></svg>',
    'snow' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 8V40M16 16L32 32M32 16L16 32M12 24H36M18 12L24 8L30 12M18 36L24 40L30 36"/></svg>',
    'lightning' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M28 4L12 24H24L20 44L36 24H24L28 4Z"/></svg>',
    'wind' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 16H28C30 16 32 14 32 12C32 10 30 8 28 8C26 8 24 10 24 12M4 24H36C38 24 40 22 40 20C40 18 38 16 36 16M4 32H32C34 32 36 34 36 36C36 38 34 40 32 40"/></svg>',
    'thermometer' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6C22 6 20 8 20 10V26C18 28 16 30 16 34C16 38 20 42 24 42C28 42 32 38 32 34C32 30 30 28 28 26V10C28 8 26 6 24 6Z"/><circle cx="24" cy="34" r="4"/></svg>',
    'umbrella' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 24C8 14 14 6 24 6C34 6 40 14 40 24"/><path d="M24 24V38C24 40 26 42 28 42C30 42 32 40 32 38"/></svg>',
    'rainbow' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 40C6 24 14 12 24 12C34 12 42 24 42 40M10 40C10 26 16 16 24 16C32 16 38 26 38 40M14 40C14 28 18 20 24 20C30 20 34 28 34 40"/></svg>',
    'tornado' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 8H40M12 14H36M14 20H34M16 26H32M18 32H30M20 38H28M22 44H26"/></svg>',
    'fog' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 20H40M6 26H42M8 32H40M10 38H38"/></svg>',

    // MEDICAL & HEALTH (15 icons)
    'heart-health' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 40L8 24C2 18 2 8 12 8C18 8 22 12 24 16C26 12 30 8 36 8C46 8 46 18 40 24L24 40Z"/><path d="M16 20L20 24L28 16"/></svg>',
    'first-aid' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="6" width="36" height="36" rx="3"/><path d="M24 16V32M16 24H32"/></svg>',
    'pill' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 34C8 28 8 18 14 12L26 24L14 34Z"/><path d="M34 14C40 20 40 30 34 36L22 24L34 14Z"/><path d="M14 12L36 34"/></svg>',
    'syringe' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M38 10L34 14M34 14L28 8L24 12L30 18L34 14ZM10 38L30 18L34 22L14 42L8 36L12 32M14 42L18 38"/></svg>',
    'stethoscope' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 10V16C14 22 18 26 24 26C30 26 34 22 34 16V10M14 10C14 6 10 6 10 6M34 10C34 6 38 6 38 6M24 26V32C24 36 20 40 16 40C12 40 8 36 8 32"/><circle cx="38" cy="32" r="4"/></svg>',
    'bandage' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="18" width="32" height="12" rx="2"/><circle cx="20" cy="24" r="1.5"/><circle cx="28" cy="24" r="1.5"/><path d="M8 24H4M44 24H40"/></svg>',
    'thermometer-medical' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6C22 6 20 8 20 10V26C18 28 16 30 16 34C16 38 20 42 24 42C28 42 32 38 32 34C32 30 30 28 28 26V10C28 8 26 6 24 6Z"/><circle cx="24" cy="34" r="4"/><path d="M24 10V30"/></svg>',
    'hospital' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="8" width="32" height="36"/><path d="M24 16V28M18 22H30M16 36H20M28 36H32M16 30H20M28 30H32"/></svg>',
    'ambulance' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="18" width="24" height="16"/><path d="M28 22H38L42 28V34H28V22Z"/><circle cx="12" cy="34" r="4"/><circle cx="34" cy="34" r="4"/><path d="M16 10H24V18M20 6V14M12 10H28"/></svg>',
    'wheelchair' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="20" cy="12" r="4"/><path d="M20 18V28M20 24H28L32 34H36"/><circle cx="20" cy="34" r="8"/></svg>',
    'dental' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8C14 8 12 10 12 12V24C12 28 14 32 16 36L18 44L22 40V28M32 8C34 8 36 10 36 12V24C36 28 34 32 32 36L30 44L26 40V28M22 24H26V12H22V24Z"/></svg>',
    'dna' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 6C16 6 24 12 24 24C24 36 16 42 16 42M32 6C32 6 24 12 24 24C24 36 32 42 32 42M16 14H32M16 34H32M20 24H28"/></svg>',
    'microscope' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 8L22 16M22 16L18 20L10 12L14 8L22 16ZM18 20L24 26M8 40H36M24 26C20 30 20 34 20 36M24 26C30 26 34 30 34 36"/></svg>',
    'blood-drop' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4C24 4 12 18 12 28C12 34 16 40 24 40C32 40 36 34 36 28C36 18 24 4 24 4Z"/></svg>',
    'pulse' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 24H14L18 12L24 36L30 18L34 24H44"/></svg>',

    // EDUCATION & LEARNING (12 icons)
    'book-open' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 8C6 8 12 6 18 6C24 6 24 10 24 10C24 10 24 6 30 6C36 6 42 8 42 8V38C42 38 36 36 30 36C24 36 24 40 24 40C24 40 24 36 18 36C12 36 6 38 6 38V8Z"/><path d="M24 10V40"/></svg>',
    'graduation-cap' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 18L24 8L44 18L24 28L4 18Z"/><path d="M12 22V32L24 38L36 32V22"/></svg>',
    'school' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 20L24 8L42 20V42H6V20Z"/><path d="M16 28H32V42H16V28ZM24 28V20M18 20H30"/></svg>',
    'pencil' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M8 40L14 38L38 14L34 10L10 34L8 40Z"/><path d="M30 14L34 18"/></svg>',
    'ruler' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="18" width="40" height="12" rx="2"/><path d="M12 24V30M20 24V30M28 24V30M36 24V30M16 24V27M24 24V27M32 24V27M40 24V27"/></svg>',
    'backpack' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M14 14C14 10 18 6 24 6C30 6 34 10 34 14V16H14V14Z"/><rect x="12" y="16" width="24" height="26" rx="2"/><path d="M18 24H30V28H18V24Z"/></svg>',
    'globe' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M6 24H42M24 6C20 10 18 17 18 24C18 31 20 38 24 42M24 6C28 10 30 17 30 24C30 31 28 38 24 42"/></svg>',
    'atom' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="3"/><ellipse cx="24" cy="24" rx="18" ry="8" transform="rotate(0 24 24)"/><ellipse cx="24" cy="24" rx="18" ry="8" transform="rotate(60 24 24)"/><ellipse cx="24" cy="24" rx="18" ry="8" transform="rotate(120 24 24)"/></svg>',
    'flask' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 4V16L8 36C6 40 8 44 12 44H36C40 44 42 40 40 36L30 16V4M18 4H30M16 28H32"/></svg>',
    'test-tube' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M28 4L20 4L14 36C12 40 14 44 18 44H30C34 44 36 40 34 36L28 4Z"/><path d="M16 20H32"/></svg>',
    'telescope' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M6 18L16 14L24 22L14 26L6 18Z"/><path d="M24 22L32 26L40 14L32 10L24 22Z"/><path d="M24 22V34M20 34H28M22 34L18 44M26 34L30 44"/></svg>',
    'trophy' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M16 4H32V16C32 22 28 26 24 26C20 26 16 22 16 16V4Z"/><path d="M16 8H8V12C8 16 10 18 14 18M32 8H40V12C40 16 38 18 34 18M24 26V34M18 34H30V38H18V34Z"/></svg>',

    // SPORTS & FITNESS (12 icons)
    'dumbbell' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="18" width="6" height="12"/><rect x="38" y="18" width="6" height="12"/><path d="M10 22H38M10 26H38M10 20V28M38 20V28"/></svg>',
    'soccer' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 6L20 16H28L24 6ZM16 18L8 22L14 30M32 18L40 22L34 30M14 36L20 32H28L34 36M24 42L20 32M24 42L28 32"/></svg>',
    'basketball' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 6C24 6 30 12 30 24C30 36 24 42 24 42M24 6C24 6 18 12 18 24C18 36 24 42 24 42M42 24C42 24 36 18 24 18C12 18 6 24 6 24M42 24C42 24 36 30 24 30C12 30 6 24 6 24"/></svg>',
    'tennis' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="18" r="12"/><path d="M26 26L40 40M12 12L24 24M24 12L12 24"/></svg>',
    'baseball' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M14 12L18 16M12 20L16 24M12 28L16 32M14 36L18 32M34 12L30 16M36 20L32 24M36 28L32 32M34 36L30 32"/></svg>',
    'volleyball' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="24" r="18"/><path d="M24 6V42M6 24C6 24 12 20 18 20C24 20 30 24 30 24M42 24C42 24 36 28 30 28C24 28 18 24 18 24"/></svg>',
    'swimming' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="34" cy="12" r="4"/><path d="M26 18L18 26L12 32M26 18L32 24L38 18M6 36C8 34 10 34 12 36C14 38 16 38 18 36C20 34 22 34 24 36C26 38 28 38 30 36C32 34 34 34 36 36C38 38 40 38 42 36"/></svg>',
    'running' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="32" cy="10" r="4"/><path d="M24 16L28 20L36 18L40 28M24 16L20 24L24 32L20 44M28 32L32 44"/></svg>',
    'cycling' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="32" r="8"/><circle cx="36" cy="32" r="8"/><path d="M24 12L28 20L36 32M28 20L20 32L12 32M24 12H20"/></svg>',
    'yoga' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="10" r="4"/><path d="M24 14V26M16 20L24 26L32 20M16 32L24 26L32 32M24 26V44"/></svg>',
    'medal' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="30" r="12"/><path d="M18 4L16 18L24 18M30 4L32 18L24 18M24 24L20 30L24 36L28 30L24 24Z"/></svg>',
    'whistle' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="28" cy="24" r="12"/><path d="M16 24H8M16 18L10 12M16 30L10 36"/><circle cx="28" cy="24" r="4"/></svg>',
                                                                                      
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

// Enhanced Icon Library
/*
if ( file_exists( KC_DIR . '/inc/icon-library.php' ) ) {
    require KC_DIR . '/inc/icon-library.php';
}
*/
