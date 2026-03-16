<?php
/**
 * Kreative Cashflow Theme Functions
 *
 * @package KreativeCashflow
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'KC_VERSION', '2.5.0' );
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
        [ 'name' => __( 'Gold',      'kreative-cashflow' ), 'slug' => 'gold',      'color' => '#C9A84C' ],
        [ 'name' => __( 'Gold Dark', 'kreative-cashflow' ), 'slug' => 'gold-dark', 'color' => '#8B6914' ],
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
        'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap',
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
    $wp_customize->add_section( 'kc_stats', [
        'title' => __( 'Hero Stats', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    for ( $i = 1; $i <= 3; $i++ ) {
        kc_add_setting( $wp_customize, "kc_stat_{$i}_num",   [ '500+', '98%', '$2.4B' ][ $i-1 ], 'kc_stats', "Stat $i — Number" );
        kc_add_setting( $wp_customize, "kc_stat_{$i}_label", [ 'Clients Helped', 'Satisfaction Rate', 'Properties Settled' ][ $i-1 ], 'kc_stats', "Stat $i — Label" );
    }

    // ═══════════════════════════════════════════
    // SERVICES SECTION
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_services', [
        'title' => __( 'Services Section', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_services_enable', '1', 'kc_services', 'Enable Services Section', 'checkbox' );
    kc_add_setting( $wp_customize, 'kc_services_tag',    'What We Do', 'kc_services', 'Overline Tag' );
    kc_add_setting( $wp_customize, 'kc_services_title',  'Every Step of <em>Your Journey</em>', 'kc_services', 'Section Headline (HTML)' );
    kc_add_setting( $wp_customize, 'kc_services_desc',   'From finding your first property to building an investment portfolio — we cover every aspect of the property process so you never have to do it alone.', 'kc_services', 'Section Description', 'textarea' );

    // Individual services (12 cards)
    for ( $i = 1; $i <= 12; $i++ ) {
        $defaults = [
            1 => [ 'title' => 'First Home Buying',     'desc' => 'Hand-holding from the first open home to collecting the keys. We demystify grants, deposits, and the settlement process.' ],
            2 => [ 'title' => 'Investment Property',   'desc' => 'Sourcing high-yield opportunities, analysing rental returns, and building portfolios that generate consistent cashflow.' ],
            3 => [ 'title' => 'Mortgage Broking',      'desc' => 'Comparing hundreds of loan products across Australia\'s lenders to find the best rate, structure, and terms for you.' ],
            4 => [ 'title' => 'Conveyancing & Legal',  'desc' => 'Connecting you with trusted solicitors and conveyancers who handle contracts, title searches, and every legal step.' ],
            5 => [ 'title' => 'Property Inspection',   'desc' => 'Booking qualified building and pest inspectors so you know exactly what you\'re buying before you sign.' ],
            6 => [ 'title' => 'Property Management',   'desc' => 'Managing tenancies, maintenance, and compliance — maximising returns while eliminating the day-to-day hassle.' ],
            7 => [ 'title' => 'First Home Buying',     'desc' => 'Hand-holding from the first open home to collecting the keys. We demystify grants, deposits, and the settlement process.' ],
            8 => [ 'title' => 'Investment Property',   'desc' => 'Sourcing high-yield opportunities, analysing rental returns, and building portfolios that generate consistent cashflow.' ],
            9 => [ 'title' => 'Mortgage Broking',      'desc' => 'Comparing hundreds of loan products across Australia\'s lenders to find the best rate, structure, and terms for you.' ],
            10 => [ 'title' => 'Conveyancing & Legal',  'desc' => 'Connecting you with trusted solicitors and conveyancers who handle contracts, title searches, and every legal step.' ],
            11 => [ 'title' => 'Property Inspection',   'desc' => 'Booking qualified building and pest inspectors so you know exactly what you\'re buying before you sign.' ],
            12 => [ 'title' => 'Property Management',   'desc' => 'Managing tenancies, maintenance, and compliance — maximising returns while eliminating the day-to-day hassle.' ],
        ];
        kc_add_setting( $wp_customize, "kc_service_{$i}_title", $defaults[$i]['title'], 'kc_services', "Service $i — Title" );
        kc_add_setting( $wp_customize, "kc_service_{$i}_desc",  $defaults[$i]['desc'],  'kc_services', "Service $i — Description", 'textarea' );
    }

    // ═══════════════════════════════════════════
    // ABOUT SECTION
    // ═══════════════════════════════════════════
    $wp_customize->add_section( 'kc_about', [
        'title' => __( 'About Section', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    kc_add_setting( $wp_customize, 'kc_about_enable', '1', 'kc_about', 'Enable About Section', 'checkbox' );
    kc_add_setting( $wp_customize, 'kc_about_tag',   'Who We Are', 'kc_about', 'Overline Tag' );
    kc_add_setting( $wp_customize, 'kc_about_title', 'Property Made <em>Simple</em>', 'kc_about', 'Section Headline (HTML)' );
    kc_add_setting( $wp_customize, 'kc_about_text',  'Kreative Cashflow was born out of a simple frustration: buying property in Australia is harder than it should be. Fragmented advice, disconnected professionals, and a maze of paperwork leaves most buyers overwhelmed.', 'kc_about', 'First Paragraph', 'textarea' );
    kc_add_setting( $wp_customize, 'kc_about_text2', 'We built a better way. One team that connects you with every specialist you need — mortgage brokers, solicitors, inspectors, property managers — and guides you through every step with clarity and confidence.', 'kc_about', 'Second Paragraph', 'textarea' );
    kc_add_setting( $wp_customize, 'kc_about_cta',   'Our Story', 'kc_about', 'CTA Button Label' );
    kc_add_setting( $wp_customize, 'kc_about_url',   '/about', 'kc_about', 'CTA Button URL' );

    // About stats
    for ( $i = 1; $i <= 5; $i++ ) {
        $defaults = [ '10+' => 'Years Experience', '500+' => 'Clients Helped', '50+' => 'Trusted Partners', '$2.4B' => 'Properties Settled', '$2.4B' => 'Properties Settled' ];
        $pairs = array_chunk( array_keys( $defaults ), 1, true );
        $num   = array_keys( $defaults )[ $i - 1 ];
        $label = $defaults[ $num ];
        kc_add_setting( $wp_customize, "kc_about_stat_{$i}_num",   $num,   'kc_about', "Stat $i — Number" );
        kc_add_setting( $wp_customize, "kc_about_stat_{$i}_label", $label, 'kc_about', "Stat $i — Label" );
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
    kc_add_setting( $wp_customize, 'kc_phone',   '1300 000 000',                     'kc_contact_info', 'Phone Number' );
    kc_add_setting( $wp_customize, 'kc_email',   'hello@kreativecashflow.com.au',    'kc_contact_info', 'Email Address' );
    kc_add_setting( $wp_customize, 'kc_address', 'Gold Coast QLD 4217, Australia',   'kc_contact_info', 'Office Address' );
    kc_add_setting( $wp_customize, 'kc_abn',     'ABN 00 000 000 000',               'kc_contact_info', 'ABN' );

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
