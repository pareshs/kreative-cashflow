<?php get_header(); ?>

<!-- Hero Section with Bootstrap -->
<section class="hero-section">
  <div class="hero-orb" aria-hidden="true"></div>
  <div class="container position-relative" style="z-index:2;">
    <div class="row">
      <div class="col-lg-8">
        <div class="hero-tag"><?php echo esc_html( kc_option( 'kc_hero_tag', 'Your Complete Property Partner' ) ); ?></div>
        <h1 class="mb-4"><?php echo wp_kses_post( kc_option( 'kc_hero_title', 'Find. Finance. <em>Own.</em>' ) ); ?></h1>
        <p class="hero-desc mb-4"><?php echo wp_kses_post( kc_option( 'kc_hero_desc', 'Expert guidance for every stage of your property journey.' ) ); ?></p>
        
        <div class="d-flex gap-3 mb-5 flex-wrap">
          <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-gold btn-lg">
            <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book Consultation' ) ); ?> <i class="bi bi-arrow-right ms-2"></i>
          </a>
          <a href="<?php echo esc_url( kc_option( 'kc_hero_cta2_url', '/properties' ) ); ?>" class="btn btn-outline-light btn-lg">
            <?php echo esc_html( kc_option( 'kc_hero_cta2', 'View Properties' ) ); ?>
          </a>
        </div>

        <div class="d-flex gap-4 pt-4 border-top flex-wrap" style="border-color:rgba(201,168,76,0.2)!important;">
          <div class="hero-stat">
            <div class="hero-stat-num">500+</div>
            <div class="hero-stat-label">Clients Helped</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-num">98%</div>
            <div class="hero-stat-label">Satisfaction</div>
          </div>
          <div class="hero-stat">
            <div class="hero-stat-num">$2.4B</div>
            <div class="hero-stat-label">Properties Settled</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="section-pad bg-white">
  <div class="container">
    <div class="overline" data-animate>What We Do</div>
    <h2 class="mb-5" data-animate>Every Step of <em>Your Journey</em></h2>
    
    <div class="row g-0 border" data-animate>
      <?php
      $services = [
        [ 'icon' => 'first-home', 'title' => 'First Home Buying', 'desc' => 'Hand-holding from the first open home to collecting the keys.' ],
        [ 'icon' => 'investment', 'title' => 'Investment Property', 'desc' => 'Sourcing high-yield opportunities that generate cashflow.' ],
        [ 'icon' => 'mortgage', 'title' => 'Mortgage Broking', 'desc' => 'Comparing hundreds of loan products to find the best rate.' ],
        [ 'icon' => 'legal', 'title' => 'Conveyancing', 'desc' => 'Trusted solicitors who handle every legal step.' ],
        [ 'icon' => 'inspection', 'title' => 'Property Inspection', 'desc' => 'Qualified inspectors so you know what you're buying.' ],
        [ 'icon' => 'management', 'title' => 'Property Management', 'desc' => 'Managing tenancies and maximising returns.' ],
      ];
      foreach ( $services as $svc ) : ?>
        <div class="col-lg-4 col-md-6">
          <div class="service-card">
            <div class="service-card-icon"><?php echo kc_service_icon( $svc['icon'] ); ?></div>
            <h3 class="h5 mb-3"><?php echo esc_html( $svc['title'] ); ?></h3>
            <p class="small text-muted mb-0"><?php echo esc_html( $svc['desc'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Band -->
<section class="bg-secondary text-white py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="text-white mb-3 mb-lg-0">Ready to Start Your Property <em class="text-gold">Journey?</em></h2>
      </div>
      <div class="col-lg-4 text-lg-end">
        <a href="/contact" class="btn btn-gold btn-lg">Book a Free Consultation <i class="bi bi-arrow-right ms-2"></i></a>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
