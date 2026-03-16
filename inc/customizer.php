<?php
/**
 * Customizer Options (Simplified)
 *
 * @package KreativeCashflow
 */

function kc_customizer( WP_Customize_Manager $wp_customize ) {
    $wp_customize->add_panel( 'kc_panel', [
        'title' => __( 'Kreative Cashflow', 'kreative-cashflow' ),
        'priority' => 30,
    ]);

    // Hero Section
    $wp_customize->add_section( 'kc_hero', [
        'title' => __( 'Hero Section', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    
    $hero_fields = [
        'kc_hero_tag'     => 'Your Complete Property Partner',
        'kc_hero_title'   => 'Find. Finance. <em>Own.</em>',
        'kc_hero_desc'    => 'Expert guidance for every stage of your property journey.',
        'kc_hero_cta1'    => 'Book a Free Consultation',
        'kc_hero_cta1_url'=> '/contact',
        'kc_hero_cta2'    => 'View Properties',
        'kc_hero_cta2_url'=> '/properties',
    ];
    
    foreach ( $hero_fields as $id => $default ) {
        $wp_customize->add_setting( $id, [ 'default' => $default ] );
        $wp_customize->add_control( $id, [
            'label'   => ucwords( str_replace( [ 'kc_hero_', '_' ], [ '', ' ' ], $id ) ),
            'section' => 'kc_hero',
            'type'    => 'text',
        ]);
    }

    // Contact Info
    $wp_customize->add_section( 'kc_contact', [
        'title' => __( 'Contact Information', 'kreative-cashflow' ),
        'panel' => 'kc_panel',
    ]);
    
    $contact_fields = [
        'kc_phone'   => '1300 000 000',
        'kc_email'   => 'hello@kreativecashflow.com.au',
        'kc_address' => 'Gold Coast QLD 4217',
    ];
    
    foreach ( $contact_fields as $id => $default ) {
        $wp_customize->add_setting( $id, [ 'default' => $default ] );
        $wp_customize->add_control( $id, [
            'label'   => ucwords( str_replace( [ 'kc_', '_' ], [ '', ' ' ], $id ) ),
            'section' => 'kc_contact',
            'type'    => 'text',
        ]);
    }
}
add_action( 'customize_register', 'kc_customizer' );
