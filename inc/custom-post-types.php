<?php
// Properties CPT
function kc_register_properties() {
    register_post_type('kc_property', array(
        'labels' => array('name'=>'Properties','singular_name'=>'Property'),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title','editor','thumbnail','elementor'),
        'show_in_rest' => true,
    ));
}
add_action('init','kc_register_properties');

// Team Members CPT
function kc_register_team() {
    register_post_type('kc_team', array(
        'labels' => array('name'=>'Team','singular_name'=>'Team Member'),
        'public' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title','editor','thumbnail','elementor'),
        'show_in_rest' => true,
    ));
}
add_action('init','kc_register_team');
