<?php
/**
 * Front Page Template — Kreative Cashflow Homepage
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<!-- ═══════════════════════════════════════════════
     HERO SECTION
═══════════════════════════════════════════════ -->
<section class="hero-section" aria-label="<?php esc_attr_e( 'Hero', 'kreative-cashflow' ); ?>">
  <div class="hero-grid-bg" aria-hidden="true"></div>
  <div class="hero-orb" aria-hidden="true"></div>

  <div class="hero-content">
    <div class="hero-tag"><?php echo esc_html( kc_option( 'kc_hero_tag', 'Your Complete Property Partner' ) ); ?></div>

    <h1><?php echo wp_kses_post( kc_option( 'kc_hero_title', 'Find. Finance. <em>Own.</em>' ) ); ?></h1>

    <p class="hero-desc"><?php echo wp_kses_post( kc_option( 'kc_hero_desc', 'Expert guidance for every stage of your property journey — from first home to investment portfolio, mortgage to settlement.' ) ); ?></p>

    <div class="hero-cta-group">
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-gold">
        <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book a Free Consultation' ) ); ?> &rarr;
      </a>
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta2_url', '/properties' ) ); ?>" class="btn btn-outline" style="color:#fff;border-color:rgba(255,255,255,0.3);">
        <?php echo esc_html( kc_option( 'kc_hero_cta2', 'View Properties' ) ); ?>
      </a>
    </div>

    <div class="hero-stats" role="list" aria-label="Key statistics">
      <?php for ( $i = 1; $i <= 3; $i++ ) :
        $num   = kc_option( "kc_stat_{$i}_num",   [ '500+', '98%', '$2.4B' ][ $i - 1 ] );
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
<section class="services-section section-pad" id="services">
  <div class="container">
    <div class="overline" data-animate><?php esc_html_e( 'What We Do', 'kreative-cashflow' ); ?></div>
    <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'Every Step of ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Your Journey', 'kreative-cashflow' ); ?></em></h2>
    <p class="intro-p" data-animate data-animate-delay="2"><?php esc_html_e( 'From finding your first property to building an investment portfolio — we cover every aspect of the property process so you never have to do it alone.', 'kreative-cashflow' ); ?></p>

    <div class="services-grid" data-animate>
      <?php
      $services = [
        [ 'icon' => 'first-home', 'title' => 'First Home Buying',     'desc' => 'Hand-holding from the first open home to collecting the keys. We demystify grants, deposits, and the settlement process.' ],
        [ 'icon' => 'investment', 'title' => 'Investment Property',    'desc' => 'Sourcing high-yield opportunities, analysing rental returns, and building portfolios that generate consistent cashflow.' ],
        [ 'icon' => 'mortgage',   'title' => 'Mortgage Broking',       'desc' => 'Comparing hundreds of loan products across Australia\'s lenders to find the best rate, structure, and terms for you.' ],
        [ 'icon' => 'legal',      'title' => 'Conveyancing & Legal',   'desc' => 'Connecting you with trusted solicitors and conveyancers who handle contracts, title searches, and every legal step.' ],
        [ 'icon' => 'inspection', 'title' => 'Property Inspection',    'desc' => 'Booking qualified building and pest inspectors so you know exactly what you\'re buying before you sign.' ],
        [ 'icon' => 'management', 'title' => 'Property Management',    'desc' => 'Managing tenancies, maintenance, and compliance — maximising returns while eliminating the day-to-day hassle.' ],
      ];
      foreach ( $services as $svc ) : ?>
        <article class="service-card">
          <div class="service-card-icon" aria-hidden="true"><?php echo kc_service_icon( $svc['icon'] ); ?></div>
          <h3><?php echo esc_html( $svc['title'] ); ?></h3>
          <p><?php echo esc_html( $svc['desc'] ); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     ABOUT / WHY US SECTION
═══════════════════════════════════════════════ -->
<section class="about-section section-pad" id="about">
  <div class="container">
    <div class="about-inner">
      <div class="about-image-wrap" data-animate>
        <?php
        $about_img_id = get_theme_mod( 'kc_about_image' );
        if ( $about_img_id ) {
          echo wp_get_attachment_image( $about_img_id, 'kc-portrait', false, [ 'alt' => 'Kreative Cashflow team' ] );
        } else { ?>
          <div style="width:100%;aspect-ratio:4/5;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;">
            <svg width="80" height="80" viewBox="0 0 52 52" fill="none"><path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="rgba(201,168,76,0.4)" stroke-width="1" fill="rgba(201,168,76,0.06)"/><circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1"/></svg>
          </div>
        <?php } ?>
      </div>

      <div class="about-content">
        <div class="overline" data-animate><?php esc_html_e( 'Who We Are', 'kreative-cashflow' ); ?></div>
        <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'Property Made ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Simple', 'kreative-cashflow' ); ?></em></h2>
        <p data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_about_text', 'Kreative Cashflow was born out of a simple frustration: buying property in Australia is harder than it should be. Fragmented advice, disconnected professionals, and a maze of paperwork leaves most buyers overwhelmed.' ) ); ?></p>
        <p data-animate data-animate-delay="2"><?php echo wp_kses_post( kc_option( 'kc_about_text2', 'We built a better way. One team that connects you with every specialist you need — mortgage brokers, solicitors, inspectors, property managers — and guides you through every step with clarity and confidence.' ) ); ?></p>
        <div class="gold-rule" data-animate></div>
        <a href="<?php echo esc_url( kc_option( 'kc_about_url', '/about' ) ); ?>" class="btn btn-primary" data-animate data-animate-delay="3">
          <?php esc_html_e( 'Our Story', 'kreative-cashflow' ); ?> &rarr;
        </a>

        <div class="about-stat-row" data-animate>
          <?php
          $stats = [
            [ 'num' => '10+', 'label' => 'Years Experience' ],
            [ 'num' => '500+', 'label' => 'Clients Helped' ],
            [ 'num' => '50+', 'label' => 'Trusted Partners' ],
            [ 'num' => '$2.4B', 'label' => 'Properties Settled' ],
          ];
          foreach ( $stats as $stat ) : ?>
            <div class="about-stat">
              <div class="stat-num"><?php echo esc_html( $stat['num'] ); ?></div>
              <div class="stat-label"><?php echo esc_html( $stat['label'] ); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     PROCESS STEPS
═══════════════════════════════════════════════ -->
<section class="process-section section-pad" id="how-it-works">
  <div class="container">
    <div class="overline" data-animate><?php esc_html_e( 'How It Works', 'kreative-cashflow' ); ?></div>
    <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'Your Journey, ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Simplified', 'kreative-cashflow' ); ?></em></h2>
    <p style="color:rgba(255,255,255,0.5);" data-animate data-animate-delay="2"><?php esc_html_e( 'From the first conversation to holding the keys — here is how we guide you through every step.', 'kreative-cashflow' ); ?></p>

    <div class="steps-grid" data-animate>
      <?php
      $steps = [
        [ 'title' => 'Discovery Call',        'desc' => 'Tell us your goals, budget, and timeline. We\'ll map out your ideal property journey and introduce you to the right specialists.' ],
        [ 'title' => 'Strategy & Finance',    'desc' => 'Our mortgage brokers get your pre-approval sorted so you can move fast when the right property comes along.' ],
        [ 'title' => 'Find & Secure',         'desc' => 'We help you identify properties, negotiate terms, book inspections, and review contracts before you commit.' ],
        [ 'title' => 'Settlement & Beyond',   'desc' => 'Our solicitors manage settlement and our property managers keep your investment performing for years to come.' ],
      ];
      foreach ( $steps as $i => $step ) : ?>
        <div class="step-card" data-animate data-animate-delay="<?php echo $i + 1; ?>">
          <div class="step-num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></div>
          <h4><?php echo esc_html( $step['title'] ); ?></h4>
          <p><?php echo esc_html( $step['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     FEATURED PROPERTIES
═══════════════════════════════════════════════ -->
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

<!-- ═══════════════════════════════════════════════
     TESTIMONIALS
═══════════════════════════════════════════════ -->
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

<!-- ═══════════════════════════════════════════════
     CTA BAND
═══════════════════════════════════════════════ -->
<div class="cta-band">
  <div class="cta-band-inner">
    <h2 data-animate><?php esc_html_e( 'Ready to Start Your Property ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Journey?', 'kreative-cashflow' ); ?></em></h2>
    <div style="display:flex;gap:16px;flex-wrap:wrap;" data-animate data-animate-delay="2">
      <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-gold">
        <?php esc_html_e( 'Book a Free Consultation', 'kreative-cashflow' ); ?> &rarr;
      </a>
      <a href="tel:<?php echo esc_attr( preg_replace( '/\s/', '', kc_option( 'kc_phone', '1300000000' ) ) ); ?>" class="btn btn-outline" style="color:rgba(255,255,255,0.7);border-color:rgba(255,255,255,0.2);">
        <?php echo esc_html( kc_option( 'kc_phone', '1300 000 000' ) ); ?>
      </a>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════
     LATEST BLOG / RESOURCES
═══════════════════════════════════════════════ -->
<?php
$blog_posts = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'orderby'        => 'date',
  'order'          => 'DESC',
]);
if ( $blog_posts->have_posts() ) : ?>
<section class="blog-section section-pad" id="insights">
  <div class="container">
    <div class="overline" data-animate><?php esc_html_e( 'Property Insights', 'kreative-cashflow' ); ?></div>
    <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:20px;">
      <h2 data-animate data-animate-delay="1"><?php esc_html_e( 'Latest ', 'kreative-cashflow' ); ?><em><?php esc_html_e( 'Resources', 'kreative-cashflow' ); ?></em></h2>
      <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>" class="btn btn-outline" data-animate><?php esc_html_e( 'All Articles', 'kreative-cashflow' ); ?></a>
    </div>

    <div class="blog-grid" data-animate>
      <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
        $cats = get_the_category();
        $cat_name = $cats ? $cats[0]->name : 'Property';
      ?>
        <article class="blog-card">
          <div class="blog-card-img">
            <?php if ( has_post_thumbnail() ) : ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'kc-blog', [ 'alt' => get_the_title() ] ); ?></a>
            <?php else : ?>
              <div style="width:100%;height:100%;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;min-height:200px;">
                <svg width="32" height="32" viewBox="0 0 48 48" fill="none"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z" stroke="rgba(201,168,76,0.4)" stroke-width="1.5"/></svg>
              </div>
            <?php endif; ?>
          </div>
          <div class="blog-card-body">
            <div class="blog-cat"><?php echo esc_html( $cat_name ); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <div class="blog-meta">
              <span><?php the_date(); ?></span>
              <span>&middot;</span>
              <span><?php echo esc_html( get_the_author() ); ?></span>
            </div>
          </div>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer();
