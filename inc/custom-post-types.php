<?php
/**
 * Custom Post Types & Taxonomies
 *
 * @package KreativeCashflow
 */

// Properties CPT
function kc_register_cpt_properties() {
    register_post_type( 'kc_property', [
        'labels' => [
            'name'          => __( 'Properties', 'kreative-cashflow' ),
            'singular_name' => __( 'Property',   'kreative-cashflow' ),
            'add_new_item'  => __( 'Add New Property', 'kreative-cashflow' ),
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'properties' ],
        'menu_icon'     => 'dashicons-building',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_properties' );

// Team Members CPT
function kc_register_cpt_team() {
    register_post_type( 'kc_team', [
        'labels' => [
            'name'          => __( 'Team Members', 'kreative-cashflow' ),
            'singular_name' => __( 'Team Member',  'kreative-cashflow' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_team' );

// Testimonials CPT
function kc_register_cpt_testimonials() {
    register_post_type( 'kc_testimonial', [
        'labels' => [
            'name'          => __( 'Testimonials', 'kreative-cashflow' ),
            'singular_name' => __( 'Testimonial',  'kreative-cashflow' ),
        ],
        'public'        => false,
        'show_ui'       => true,
        'menu_icon'     => 'dashicons-format-quote',
        'supports'      => [ 'title', 'editor', 'thumbnail', 'custom-fields' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'kc_register_cpt_testimonials' );

// Property Taxonomies
function kc_register_taxonomies() {
    register_taxonomy( 'property_type', 'kc_property', [
        'labels'       => [ 'name' => __( 'Property Types', 'kreative-cashflow' ) ],
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);
    
    register_taxonomy( 'property_status', 'kc_property', [
        'labels'       => [ 'name' => __( 'Property Status', 'kreative-cashflow' ) ],
        'hierarchical' => false,
        'show_in_rest' => true,
    ]);
}
add_action( 'init', 'kc_register_taxonomies' );
