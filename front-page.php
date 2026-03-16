<?php
/**
 * Front Page Template - Homepage
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<!-- ═══════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════ -->
<section class="hero-section" id="hero">
  <div class="hero-orb" aria-hidden="true"></div>
  <div class="container" style="position:relative;z-index:2;">
    <div class="hero-tag"><?php echo wp_kses_post( kc_option( 'kc_hero_tag', 'Your Complete Property Partner' ) ); ?></div>
    <h1 class="hero-title"><?php echo wp_kses_post( kc_option( 'kc_hero_title', 'Find. Finance. <em>Own.</em>' ) ); ?></h1>
    <p class="hero-desc"><?php echo wp_kses_post( kc_option( 'kc_hero_desc', 'Expert guidance for every stage of your property journey — from first home to investment portfolio.' ) ); ?></p>
    
    <div class="hero-ctas">
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-gold">
        <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book a Free Consultation' ) ); ?> &rarr;
      </a>
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta2_url', '/properties' ) ); ?>" class="btn btn-outline">
        <?php echo esc_html( kc_option( 'kc_hero_cta2', 'View Properties' ) ); ?>
      </a>
    </div>

    <div class="hero-stats">
      <?php for ( $i = 1; $i <= 3; $i++ ) :
        $num = kc_option( "kc_stat_{$i}_num", [ '500+', '98%', '$2.4B' ][ $i - 1 ] );
        $label = kc_option( "kc_stat_{$i}_label", [ 'Clients Helped', 'Satisfaction Rate', 'Properties Settled' ][ $i - 1 ] );
      ?>
        <div class="hero-stat" role="listitem" data-animate data-animate-delay="<?php echo $i; ?>">
          <div class="hero-stat-num"><?php echo esc_html( $num ); ?></div>
          <div class="hero-stat-label"><?php echo esc_html( $label ); ?></div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     SERVICES SECTION
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_services_enable', '1' ) ) : ?>
<section class="services-section section-pad" id="service">
  <div class="container">
    <div class="overline"><?php echo wp_kses_post( kc_option( 'kc_services_tag', 'What We Do' ) ); ?></div>
    <h2 data-animate data-animate-delay="1"><?php echo wp_kses_post( kc_option( 'kc_services_title', 'Every Step of <em>Your Journey</em>' ) ); ?></h2>
    <p class="intro-p" data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_services_desc', 'From finding your first property to building an investment portfolio — we cover every aspect of the property process.' ) ); ?></p>

    <div class="services-grid" data-animate>
      <?php
      $icons = [ 'first-home', 'investment', 'mortgage', 'legal', 'inspection', 'first-home', 'investment', 'management', 'mortgage', 'legal', 'inspection', 'management' ];
      for ( $i = 1; $i <= 12; $i++ ) :
        $title = kc_option( "kc_service_{$i}_title", '' );
        $desc = kc_option( "kc_service_{$i}_desc", '' );
        if ( ! $title ) continue;
      ?>
        <article class="service-card">
          <div class="service-card-icon" aria-hidden="true"><?php echo kc_service_icon( $icons[ $i - 1 ] ); ?></div>
          <h3><?php echo esc_html( $title ); ?></h3>
          <p><?php echo esc_html( $desc ); ?></p>
        </article>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
     ABOUT SECTION
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_about_enable', '1' ) ) : ?>
<section class="about-section section-pad" id="about">
  <div class="container">
    <div class="about-inner">
      <div class="about-image-wrap" data-animate>
        <?php if ( $img_id = get_theme_mod( 'kc_about_image' ) ) : ?>
          <?php echo wp_get_attachment_image( $img_id, 'kc-portrait', false, [ 'alt' => 'Kreative Cashflow team' ] ); ?>
        <?php else : ?>
          <div style="width:100%;aspect-ratio:4/5;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;">
            <svg width="80" height="80" viewBox="0 0 52 52" fill="none">
              <path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="rgba(201,168,76,0.4)" stroke-width="1" fill="rgba(201,168,76,0.06)"/>
              <circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1"/>
            </svg>
          </div>
        <?php endif; ?>
      </div>

      <div class="about-content">
        <div class="overline data-animate"><?php echo wp_kses_post( kc_option( 'kc_about_tag', 'Who We Are' ) ); ?></div>
        <h2 data-animate data-animate-delay="1"><?php echo wp_kses_post( kc_option( 'kc_about_title', 'Property Made <em>Simple</em>' ) ); ?></h2>
        <p data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_about_text', 'Kreative Cashflow was born out of a simple frustration: buying property in Australia is harder than it should be.' ) ); ?></p>
        <p data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_about_text2', 'We built a better way. One team that connects you with every specialist you need.' ) ); ?></p>
        <div class="gold-rule data-animate"></div>
        <a href="<?php echo esc_url( kc_option( 'kc_about_url', '/about' ) ); ?>" class="btn btn-primary" data-animate data-animate-delay="3">
          <?php echo esc_html( kc_option( 'kc_about_cta', 'Our Story' ) ); ?> &rarr;
        </a>

        <div class="about-stat-row" data-animate>
          <?php for ( $i = 1; $i <= 5; $i++ ) :
            $num = kc_option( "kc_about_stat_{$i}_num", '' );
            $label = kc_option( "kc_about_stat_{$i}_label", '' );
            if ( ! $num ) continue;
          ?>
            <div class="about-stat">
              <div class="stat-num"><?php echo esc_html( $num ); ?></div>
              <div class="stat-label"><?php echo esc_html( $label ); ?></div>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
     PROCESS STEPS
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_process_enable', '1' ) ) : ?>
<section class="process-section section-pad" id="how-it-works">
  <div class="container">
    <div class="overline" data-animate><?php echo wp_kses_post( kc_option( 'kc_process_tag', 'How It Works' ) ); ?></div>
    <h2 data-animate data-animate-delay="1"><?php echo wp_kses_post( kc_option( 'kc_process_title', 'Your Journey, <em>Simplified</em>' ) ); ?></h2>
    <p style="color:rgba(255,255,255,0.5);" data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_process_desc', 'From the first conversation to holding the keys.' ) ); ?></p>

    <div class="steps-grid" data-animate>
      <?php for ( $i = 1; $i <= 4; $i++ ) :
        $title = kc_option( "kc_process_{$i}_title", '' );
        $desc = kc_option( "kc_process_{$i}_desc", '' );
        if ( ! $title ) continue;
      ?>
        <div class="step-card" data-animate data-animate-delay="<?php echo $i + 1; ?>">
          <div class="step-num"><?php echo str_pad( $i, 2, '0', STR_PAD_LEFT ); ?></div>
          <h4><?php echo esc_html( $title ); ?></h4>
          <p><?php echo esc_html( $desc ); ?></p>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
     FEATURED PROPERTIES
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_properties_enable', '1' ) ) : ?>
<?php
$properties = new WP_Query([
  'post_type'      => 'kc_property',
  'posts_per_page' => 3,
  'meta_key'       => 'kc_featured',
  'meta_value'     => '1',
]);
if ( ! $properties->have_posts() ) {
  $properties = new WP_Query([
    'post_type'      => 'kc_property',
    'posts_per_page' => 3,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);
}
if ( $properties->have_posts() ) : ?>
<section class="properties-section section-pad" id="properties">
  <div class="container">
    <div class="overline" data-animate><?php esc_html_e( 'Featured Properties', 'kreative-cashflow' ); ?></div>
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:20px;">
      <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'Current ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Listings', 'kreative-cashflow' ); ?></em></h2>
      <a href="<?php echo esc_url( get_post_type_archive_link( 'kc_property' ) ); ?>" class="btn btn-outline" data-animate><?php esc_html_e( 'View All Properties', 'kreative-cashflow' ); ?></a>
    </div>

    <div class="properties-grid" data-animate>
      <?php while ( $properties->have_posts() ) : $properties->the_post();
        $price   = get_post_meta( get_the_ID(), 'kc_price',     true );
        $beds    = get_post_meta( get_the_ID(), 'kc_bedrooms',  true );
        $baths   = get_post_meta( get_the_ID(), 'kc_bathrooms', true );
        $garage  = get_post_meta( get_the_ID(), 'kc_garage',    true );
        $address = get_post_meta( get_the_ID(), 'kc_address',   true );
        $types   = get_the_terms( get_the_ID(), 'property_type' );
        $badge   = $types ? $types[0]->name : 'Property';
        $badge_class = ( stripos( $badge, 'invest' ) !== false ) ? 'investment' : '';
      ?>
        <article class="property-card">
          <div class="property-card-img">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'kc-property', [ 'alt' => get_the_title() ] ); ?>
            <?php else : ?>
              <div style="width:100%;height:100%;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;">
                <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z" stroke="rgba(201,168,76,0.4)" stroke-width="1.5"/></svg>
              </div>
            <?php endif; ?>
            <div class="property-badge <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $badge ); ?></div>
          </div>
          <div class="property-card-body">
            <?php if ( $price ) : ?>
              <div class="property-price"><?php echo esc_html( $price ); ?></div>
            <?php endif; ?>
            <div class="property-address"><?php echo $address ? esc_html( $address ) : esc_html( get_the_title() ); ?></div>
            <?php if ( $beds || $baths || $garage ) : ?>
              <div class="property-specs">
                <?php if ( $beds ) : ?>
                  <div class="property-spec">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 9V5a2 2 0 012-2h8a2 2 0 012 2v4M1 9v3M13 9v3M1 7h12"/></svg>
                    <?php echo esc_html( $beds ); ?> bed
                  </div>
                <?php endif; ?>
                <?php if ( $baths ) : ?>
                  <div class="property-spec">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M2 8h10v2a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM5 8V4a2 2 0 012-2v0"/></svg>
                    <?php echo esc_html( $baths ); ?> bath
                  </div>
                <?php endif; ?>
                <?php if ( $garage ) : ?>
                  <div class="property-spec">
                    <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 10V5l5-4 5 4v5M5 10V7h4v3"/></svg>
                    <?php echo esc_html( $garage ); ?> car
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_testimonials_enable', '1' ) ) : ?>
<?php
$testimonials = new WP_Query([
  'post_type'      => 'kc_testimonial',
  'posts_per_page' => 3,
  'orderby'        => 'rand',
]);
?>
<section class="testimonials-section section-pad" id="testimonials">
  <div class="container">
    <div class="overline" data-animate><?php esc_html_e( 'Client Stories', 'kreative-cashflow' ); ?></div>
    <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'What Our Clients ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Say', 'kreative-cashflow' ); ?></em></h2>

    <div class="testimonials-grid" data-animate>
      <?php if ( $testimonials->have_posts() ) :
        while ( $testimonials->have_posts() ) : $testimonials->the_post();
          $rating = get_post_meta( get_the_ID(), 'kc_rating',      true ) ?: 5;
          $type   = get_post_meta( get_the_ID(), 'kc_client_type', true ) ?: 'Home Buyer';
      ?>
        <div class="testimonial-card">
          <div class="testimonial-stars" aria-label="<?php echo esc_attr( $rating ); ?> out of 5 stars">
            <?php for ( $s = 0; $s < 5; $s++ ) echo '<span>&#9733;</span>'; ?>
          </div>
          <p class="testimonial-text"><?php the_excerpt(); ?></p>
          <div class="testimonial-author">
            <div class="testimonial-avatar">
              <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'thumbnail', [ 'alt' => get_the_title() ] ); ?>
            </div>
            <div class="testimonial-meta">
              <div class="author-name"><?php the_title(); ?></div>
              <div class="author-type"><?php echo esc_html( $type ); ?></div>
            </div>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata();
      else :
        // Placeholder testimonials
        $placeholders = [
          [ 'name' => 'Sarah & Michael T.', 'type' => 'First Home Buyers', 'text' => 'We had no idea where to start. Kreative Cashflow held our hand through every single step — from finding the property to collecting the keys. Absolutely exceptional service.' ],
          [ 'name' => 'James R.',           'type' => 'Property Investor', 'text' => 'I\'ve built a portfolio of four properties in two years with their guidance. The financial analysis they provide is second to none. True professionals who genuinely care about outcomes.' ],
          [ 'name' => 'Priya D.',           'type' => 'First Home Buyer',  'text' => 'As a single buyer, I was nervous about making the wrong decision. My advisor was honest, patient, and found me a property under budget with better yield than I expected.' ],
        ];
        foreach ( $placeholders as $t ) : ?>
          <div class="testimonial-card">
            <div class="testimonial-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
            <p class="testimonial-text">"<?php echo esc_html( $t['text'] ); ?>"</p>
            <div class="testimonial-author">
              <div class="testimonial-avatar" style="background:var(--gold-lt);"></div>
              <div class="testimonial-meta">
                <div class="author-name"><?php echo esc_html( $t['name'] ); ?></div>
                <div class="author-type"><?php echo esc_html( $t['type'] ); ?></div>
              </div>
            </div>
          </div>
      <?php endforeach; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
     CTA BAND
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_cta_enable', '1' ) ) : ?>
<div class="cta-band">
  <div class="cta-band-inner">
    <h2 data-animate><?php echo wp_kses_post( kc_option( 'kc_cta_title', 'Ready to Start Your Property <em>Journey?</em>' ) ); ?></h2>
    <div style="display:flex;gap:16px;flex-wrap:wrap;" data-animate data-animate-delay="2">
      <a href="<?php echo esc_url( kc_option( 'kc_cta_url1', '/contact' ) ); ?>" class="btn btn-gold">
        <?php echo esc_html( kc_option( 'kc_cta_btn1', 'Book a Free Consultation' ) ); ?> &rarr;
      </a>
      <a href="tel:<?php echo esc_attr( preg_replace( '/\s/', '', kc_option( 'kc_phone', '1300000000' ) ) ); ?>" class="btn btn-outline" style="color:rgba(255,255,255,0.7);border-color:rgba(255,255,255,0.2);">
        <?php echo esc_html( kc_option( 'kc_phone', '1300 000 000' ) ); ?>
      </a>
    </div>
  </div>
</div>
<?php endif; ?>

<?php get_footer();
