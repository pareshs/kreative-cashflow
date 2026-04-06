<?php
/**
 * Template Name: Full-Width Clean
 * Template Post Type: page
 * 
 * Description: Clean full-width layout with centered content. No sidebar, no blog styling.
 * Perfect for service pages, landing pages, and content-focused pages.
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- Page Hero -->
<div class="page-hero" style="padding-bottom:60px;">
  <div class="page-hero-inner" style="max-width:900px;">
    <?php if ( $parent = wp_get_post_parent_id( get_the_ID() ) ) : ?>
      <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
        <span>/</span>
        <a href="<?php echo esc_url( get_permalink( $parent ) ); ?>"><?php echo esc_html( get_the_title( $parent ) ); ?></a>
        <span>/</span>
        <?php the_title(); ?>
      </div>
    <?php else : ?>
      <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
        <span>/</span>
        <?php the_title(); ?>
      </div>
    <?php endif; ?>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<!-- Featured Image (optional, full-bleed) -->
<?php if ( has_post_thumbnail() ) : ?>
  <div style="max-height:500px;overflow:hidden;margin-bottom:60px;">
    <?php the_post_thumbnail( 'kc-hero', [ 'style' => 'width:100%;height:100%;object-fit:cover;', 'alt' => get_the_title() ] ); ?>
  </div>
<?php endif; ?>

<!-- Full-Width Content -->
<div style="background:var(--white);padding:80px 0;">
  <div class="container" style="max-width:900px;">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="entry-content" style="max-width:none;">
        <?php the_content(); ?>
      </div>
    </article>

    <?php
    // Page meta / last updated (optional)
    $modified = get_the_modified_date();
    $published = get_the_date();
    if ( $modified !== $published ) : ?>
      <div style="margin-top:60px;padding-top:32px;border-top:1px solid var(--rule);font-family:var(--font-mono);font-size:0.7rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--secondary-lt);">
        <?php esc_html_e( 'Last updated:', 'kreative-cashflow' ); ?> <?php echo esc_html( $modified ); ?>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- Optional: CTA Section at bottom -->
<?php if ( get_post_meta( get_the_ID(), 'kc_show_cta', true ) !== 'no' ) : ?>
<div class="cta-band" style="padding:60px var(--gap);">
  <div class="cta-band-inner" style="text-align:center;">
    <h2><?php echo wp_kses_post( kc_option( 'kc_cta_title', 'Ready to Start Your Property <em>Journey?</em>' ) ); ?></h2>
    <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;margin-top:32px;">
      <a href="<?php echo esc_url( kc_option( 'kc_cta_url1', '/contact' ) ); ?>" class="btn btn-primary">
        <?php echo esc_html( kc_option( 'kc_cta_btn1', 'Book a Free Consultation' ) ); ?> &rarr;
      </a>
      <a href="/properties" class="btn btn-outline" style="color:rgba(255,255,255,0.7);border-color:rgba(255,255,255,0.2);">
        <?php esc_html_e( 'View Properties', 'kreative-cashflow' ); ?>
      </a>
    </div>
  </div>
</div>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer();
