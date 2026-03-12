<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'kreative-cashflow' ); ?></a>

<header id="site-header" role="banner">
  <div class="header-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-branding" rel="home" aria-label="<?php bloginfo( 'name' ); ?>">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <svg class="logo-icon" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="white" stroke-width="1.5" fill="rgba(201,168,76,0.1)"/>
          <circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1.5"/>
          <text x="29" y="24" font-family="serif" font-size="9" fill="#C9A84C">$</text>
        </svg>
        <div class="logo-wordmark">
          <span class="part1"><?php echo esc_html( kc_option( 'kc_logo_part1', 'Kreative' ) ); ?></span>
          <span class="part2"><?php echo esc_html( kc_option( 'kc_logo_part2', 'Cashflow' ) ); ?></span>
        </div>
      <?php endif; ?>
    </a>

    <!-- Navigation -->
    <nav id="primary-nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'kreative-cashflow' ); ?>">
      <?php
      wp_nav_menu([
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'menu_class'     => 'nav-menu',
        'container'      => false,
        'fallback_cb'    => 'kc_fallback_nav',
      ]);
      ?>
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="nav-cta">
        <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book Consultation' ) ); ?> &rarr;
      </a>
    </nav>

    <!-- Hamburger -->
    <button class="menu-toggle" id="menu-toggle" aria-expanded="false" aria-controls="primary-nav" aria-label="<?php esc_attr_e( 'Toggle menu', 'kreative-cashflow' ); ?>">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</header>

<div id="main-content">
<?php

function kc_fallback_nav() {
    echo '<ul class="nav-menu">';
    $pages = get_pages([ 'sort_column' => 'menu_order', 'number' => 8 ]);
    foreach ( $pages as $page ) {
        $active = is_page( $page->ID ) ? ' class="current-menu-item"' : '';
        printf(
            '<li%s><a href="%s">%s</a></li>',
            $active,
            esc_url( get_permalink( $page->ID ) ),
            esc_html( $page->post_title )
        );
    }
    echo '</ul>';
}
