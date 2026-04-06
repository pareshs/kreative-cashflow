<?php
/**
 * 404 Error Page
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb"><a href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e('Home','kreative-cashflow'); ?></a><span>/</span>404</div>
    <h1><?php esc_html_e('Page Not ', 'kreative-cashflow'); ?><em><?php esc_html_e('Found', 'kreative-cashflow'); ?></em></h1>
  </div>
</div>

<div class="container section-pad" style="text-align:center;">
  <div style="font-family:var(--font-header);font-size:clamp(80px,15vw,160px);font-weight:300;color:var(--primary-lt);line-height:1;">404</div>
  <p style="font-size:1.1rem;max-width:480px;margin:0 auto 40px;"><?php esc_html_e('The page you are looking for may have moved, been renamed, or no longer exists.', 'kreative-cashflow'); ?></p>
  <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary"><?php esc_html_e('Back to Home', 'kreative-cashflow'); ?> &rarr;</a>
    <a href="/contact" class="btn btn-outline"><?php esc_html_e('Contact Us', 'kreative-cashflow'); ?></a>
  </div>
</div>

<?php get_footer();
