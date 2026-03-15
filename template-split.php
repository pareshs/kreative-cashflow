<?php
/**
 * Template Name: Split Layout
 * Template Post Type: page
 * 
 * Description: Image on one side, content on the other. Modern, visual layout for services.
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<!-- Page Hero (compact) -->
<div class="page-hero" style="padding:140px var(--gap) 60px;">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
      <span>/</span>
      <?php the_title(); ?>
    </div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<!-- Split Content -->
<div style="background:var(--white);padding:0 0 80px;">
  <div class="container" style="max-width:1200px;">
    
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:start;">
      
      <!-- Image Side (sticky) -->
      <div style="position:sticky;top:120px;">
        <?php if ( has_post_thumbnail() ) : ?>
          <div style="position:relative;">
            <?php the_post_thumbnail( 'kc-portrait', [ 'style' => 'width:100%;aspect-ratio:4/5;object-fit:cover;', 'alt' => get_the_title() ] ); ?>
            <div style="position:absolute;top:24px;right:24px;bottom:-24px;left:-24px;border:1px solid rgba(201,168,76,0.3);z-index:-1;"></div>
          </div>
        <?php else : ?>
          <div style="width:100%;aspect-ratio:4/5;background:linear-gradient(135deg,#2E3440,#4C566A);display:flex;align-items:center;justify-content:center;position:relative;">
            <svg width="80" height="80" viewBox="0 0 52 52" fill="none"><path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="rgba(201,168,76,0.4)" stroke-width="1" fill="rgba(201,168,76,0.06)"/><circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1"/></svg>
            <div style="position:absolute;top:24px;right:24px;bottom:-24px;left:-24px;border:1px solid rgba(201,168,76,0.3);z-index:-1;"></div>
          </div>
        <?php endif; ?>

        <!-- Stats / Quick Info (optional) -->
        <?php
        $stat1_num   = get_post_meta( get_the_ID(), 'kc_stat_1_num',   true );
        $stat1_label = get_post_meta( get_the_ID(), 'kc_stat_1_label', true );
        $stat2_num   = get_post_meta( get_the_ID(), 'kc_stat_2_num',   true );
        $stat2_label = get_post_meta( get_the_ID(), 'kc_stat_2_label', true );
        if ( $stat1_num || $stat2_num ) : ?>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:32px;">
            <?php if ( $stat1_num ) : ?>
              <div style="padding:24px;background:var(--cream);border-left:3px solid var(--gold);">
                <div style="font-family:var(--font-serif);font-size:2rem;font-weight:300;color:var(--slate);line-height:1;letter-spacing:-0.02em;"><?php echo esc_html( $stat1_num ); ?></div>
                <div style="font-family:var(--font-mono);font-size:0.62rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--slate-lt);margin-top:6px;"><?php echo esc_html( $stat1_label ); ?></div>
              </div>
            <?php endif; ?>
            <?php if ( $stat2_num ) : ?>
              <div style="padding:24px;background:var(--cream);border-left:3px solid var(--gold);">
                <div style="font-family:var(--font-serif);font-size:2rem;font-weight:300;color:var(--slate);line-height:1;letter-spacing:-0.02em;"><?php echo esc_html( $stat2_num ); ?></div>
                <div style="font-family:var(--font-mono);font-size:0.62rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--slate-lt);margin-top:6px;"><?php echo esc_html( $stat2_label ); ?></div>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <!-- Content Side -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content" style="max-width:none;">
          <?php the_content(); ?>
        </div>

        <!-- CTA at bottom of content -->
        <div style="margin-top:48px;padding-top:32px;border-top:1px solid var(--rule);display:flex;gap:16px;flex-wrap:wrap;">
          <a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '/contact' ) ); ?>" class="btn btn-primary">
            <?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book Consultation' ) ); ?> &rarr;
          </a>
          <a href="tel:<?php echo esc_attr( preg_replace( '/\s/', '', kc_option( 'kc_phone', '1300000000' ) ) ); ?>" class="btn btn-outline">
            <?php echo esc_html( kc_option( 'kc_phone', '1300 000 000' ) ); ?>
          </a>
        </div>
      </article>

    </div>

  </div>
</div>

<!-- Mobile: Stack on small screens -->
<style>
@media (max-width: 960px) {
  .container > div[style*="grid-template-columns"] { 
    grid-template-columns: 1fr !important; 
    gap: 40px !important;
  }
  .container > div > div[style*="sticky"] {
    position: relative !important;
    top: 0 !important;
  }
}
</style>

<?php endwhile; ?>

<?php get_footer();
