<?php
/**
 * Archive Template — Properties & Post Archives
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
      <span>/</span><?php the_archive_title(); ?>
    </div>
    <h1><?php
      if ( is_post_type_archive( 'kc_property' ) ) {
          echo 'Our <em>Properties</em>';
      } else {
          the_archive_title( '', '' );
      }
    ?></h1>
    <?php the_archive_description( '<p style="color:rgba(255,255,255,0.5);max-width:560px;margin-top:12px;">', '</p>' ); ?>
  </div>
</div>

<section class="section-pad">
  <div class="container">

    <?php if ( is_post_type_archive( 'kc_property' ) ) : ?>
      <!-- Property Filter Bar -->
      <div style="display:flex;gap:12px;flex-wrap:wrap;margin-bottom:48px;padding-bottom:32px;border-bottom:1px solid var(--rule);">
        <span style="font-family:var(--font-mono);font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--slate-lt);padding:10px 0;margin-right:8px;"><?php esc_html_e( 'Filter by:', 'kreative-cashflow' ); ?></span>
        <?php
        $terms = get_terms([ 'taxonomy' => 'property_type', 'hide_empty' => true ]);
        echo '<a href="' . esc_url( get_post_type_archive_link( 'kc_property' ) ) . '" class="btn btn-primary" style="padding:10px 20px;">' . esc_html__( 'All', 'kreative-cashflow' ) . '</a>';
        foreach ( $terms as $term ) {
            echo '<a href="' . esc_url( get_term_link( $term ) ) . '" class="btn btn-outline" style="padding:10px 20px;">' . esc_html( $term->name ) . '</a>';
        }
        ?>
      </div>

      <div class="properties-grid">
        <?php while ( have_posts() ) : the_post();
          $price   = get_post_meta( get_the_ID(), 'kc_price',     true );
          $beds    = get_post_meta( get_the_ID(), 'kc_bedrooms',  true );
          $baths   = get_post_meta( get_the_ID(), 'kc_bathrooms', true );
          $garage  = get_post_meta( get_the_ID(), 'kc_garage',    true );
          $address = get_post_meta( get_the_ID(), 'kc_address',   true );
          $types   = get_the_terms( get_the_ID(), 'property_type' );
          $badge   = $types ? $types[0]->name : 'Property';
          $badge_class = stripos( $badge, 'invest' ) !== false ? 'investment' : '';
        ?>
          <article class="property-card" data-animate>
            <a href="<?php the_permalink(); ?>">
              <div class="property-card-img">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'kc-property', [ 'alt' => get_the_title() ] ); ?>
                <?php else : ?>
                  <div style="width:100%;aspect-ratio:4/3;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;">
                    <svg width="40" height="40" viewBox="0 0 48 48" fill="none"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z" stroke="rgba(201,168,76,0.3)" stroke-width="1.5"/></svg>
                  </div>
                <?php endif; ?>
                <div class="property-badge <?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $badge ); ?></div>
              </div>
            </a>
            <div class="property-card-body">
              <?php if ( $price ) : ?><div class="property-price"><?php echo esc_html( $price ); ?></div><?php endif; ?>
              <div class="property-address"><?php echo $address ? esc_html( $address ) : esc_html( get_the_title() ); ?></div>
              <?php if ( $beds || $baths || $garage ) : ?>
                <div class="property-specs">
                  <?php if ( $beds )   echo "<div class='property-spec'><svg viewBox='0 0 14 14' fill='none' stroke='currentColor' stroke-width='1.5'><path d='M1 9V5a2 2 0 012-2h8a2 2 0 012 2v4M1 9v3M13 9v3M1 7h12'/></svg>" . esc_html( $beds ) . " bed</div>"; ?>
                  <?php if ( $baths )  echo "<div class='property-spec'><svg viewBox='0 0 14 14' fill='none' stroke='currentColor' stroke-width='1.5'><path d='M2 8h10v2a4 4 0 01-4 4H6a4 4 0 01-4-4V8zM5 8V4a2 2 0 012-2'/></svg>" . esc_html( $baths ) . " bath</div>"; ?>
                  <?php if ( $garage ) echo "<div class='property-spec'><svg viewBox='0 0 14 14' fill='none' stroke='currentColor' stroke-width='1.5'><path d='M1 10V5l5-4 5 4v5M5 10V7h4v3'/></svg>" . esc_html( $garage ) . " car</div>"; ?>
                </div>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

    <?php else : ?>
      <div class="blog-grid">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?> data-animate>
            <div class="blog-card-img">
              <?php if ( has_post_thumbnail() ) : ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'kc-blog' ); ?></a>
              <?php endif; ?>
            </div>
            <div class="blog-card-body">
              <div class="blog-cat"><?php the_category( ', ' ); ?></div>
              <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
              <p><?php the_excerpt(); ?></p>
              <div class="blog-meta"><span><?php the_date(); ?></span> &middot; <span><?php the_author(); ?></span></div>
            </div>
          </article>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <?php the_posts_pagination([ 'mid_size' => 2, 'prev_text' => '&larr;', 'next_text' => '&rarr;', 'class' => 'pagination' ]); ?>

  </div>
</section>

<?php get_footer();
