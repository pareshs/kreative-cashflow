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

<a class="visually-hidden-focusable" href="#main-content"><?php esc_html_e( 'Skip to content', 'kreative-cashflow' ); ?></a>

<!-- Bootstrap Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top" id="main-navbar">
  <div class="container-fluid container-xl">
    
    <!-- Logo / Brand -->
    <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <svg width="32" height="32" viewBox="0 0 52 52" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="white" stroke-width="1" fill="rgba(201,168,76,0.1)"/>
          <circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1"/>
        </svg>
        <div class="d-flex flex-column lh-1">
          <span class="fw-semibold" style="font-family:var(--kc-font-serif);font-size:1.2rem;color:white;">Kreative</span>
          <span class="fw-light" style="font-family:var(--kc-font-serif);font-size:1.2rem;color:var(--kc-gold);">Cashflow</span>
        </div>
      <?php endif; ?>
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'kreative-cashflow' ); ?>">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <?php
      wp_nav_menu([
        'theme_location'  => 'primary',
        'container'       => false,
        'menu_class'      => 'navbar-nav ms-auto',
        'fallback_cb'     => 'Bootstrap_NavWalker::fallback',
        'walker'          => new Bootstrap_NavWalker(),
        'depth'           => 2,
      ]);
      ?>
      
      <!-- CTA Button -->
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-gold ms-lg-3 mt-3 mt-lg-0">
        <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book Now' ) ); ?> <i class="bi bi-arrow-right ms-1"></i>
      </a>
    </div>

  </div>
</nav>

<div id="main-content">
<?php
