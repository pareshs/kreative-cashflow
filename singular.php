<?php
/**
 * Singular Template — Single Posts & Pages
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
      <span>/</span>
      <?php if ( is_single() ) : ?>
        <?php $cats = get_the_category(); if ( $cats ) : ?>
          <a href="<?php echo esc_url( get_category_link( $cats[0] ) ); ?>"><?php echo esc_html( $cats[0]->name ); ?></a>
          <span>/</span>
        <?php endif; ?>
      <?php else : ?>
        <?php if ( $parent = wp_get_post_parent_id( get_the_ID() ) ) : ?>
          <a href="<?php echo esc_url( get_permalink( $parent ) ); ?>"><?php echo esc_html( get_the_title( $parent ) ); ?></a>
          <span>/</span>
        <?php endif; ?>
      <?php endif; ?>
      <?php the_title(); ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <?php if ( is_single() ) : ?>
      <div style="display:flex;align-items:center;gap:20px;margin-top:16px;font-family:var(--font-mono);font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:rgba(255,255,255,0.35);">
        <span><?php the_date(); ?></span>
        <span>&middot;</span>
        <span><?php the_author(); ?></span>
        <span>&middot;</span>
        <span><?php echo esc_html( get_the_reading_time_text() ); ?> <?php esc_html_e( 'min read', 'kreative-cashflow' ); ?></span>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php if ( has_post_thumbnail() && is_single() ) : ?>
  <div style="max-height:560px;overflow:hidden;">
    <?php the_post_thumbnail( 'kc-hero', [ 'style' => 'width:100%;height:100%;object-fit:cover;', 'alt' => get_the_title() ] ); ?>
  </div>
<?php endif; ?>

<div class="container section-pad">
  <div style="display:grid;grid-template-columns:1fr <?php echo is_page() ? '0' : '320px'; ?>;gap:60px;align-items:start;">

    <main id="site-main" role="main">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <?php if ( is_single() ) : ?>
          <!-- Post Tags -->
          <?php the_tags( '<div style="margin-top:40px;display:flex;gap:8px;flex-wrap:wrap;">', '', '</div>' ); ?>

          <!-- Author Box -->
          <div style="margin-top:60px;padding:40px;background:var(--white);border:1px solid var(--rule);display:flex;gap:24px;align-items:flex-start;">
            <div style="flex-shrink:0;">
              <?php echo get_avatar( get_the_author_meta( 'ID' ), 72, '', '', [ 'style' => 'border-radius:0;' ] ); ?>
            </div>
            <div>
              <div style="font-family:var(--font-mono);font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:6px;"><?php esc_html_e( 'Written by', 'kreative-cashflow' ); ?></div>
              <h4 style="margin-bottom:8px;"><?php the_author(); ?></h4>
              <p style="font-size:0.9rem;margin-bottom:0;"><?php the_author_meta( 'description' ); ?></p>
            </div>
          </div>

          <!-- Post Navigation -->
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:40px;">
            <?php
            $prev = get_previous_post();
            $next = get_next_post();
            if ( $prev ) : ?>
              <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" class="btn btn-outline" style="justify-content:flex-start;">
                &larr; <?php echo esc_html( $prev->post_title ); ?>
              </a>
            <?php endif;
            if ( $next ) : ?>
              <a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="btn btn-outline" style="justify-content:flex-end;grid-column:<?php echo $prev ? 'auto' : '2'; ?>;">
                <?php echo esc_html( $next->post_title ); ?> &rarr;
              </a>
            <?php endif; ?>
          </div>

          <!-- Comments -->
          <?php if ( comments_open() || get_comments_number() ) : ?>
            <div style="margin-top:60px;">
              <?php comments_template(); ?>
            </div>
          <?php endif; ?>

        <?php endif; ?>
      </article>
    </main>

    <?php if ( is_single() ) : ?>
      <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
      </aside>
    <?php endif; ?>

  </div>
</div>

<?php endwhile; ?>

<?php get_footer();

/**
 * Simple reading time helper
 */
function get_the_reading_time_text() {
    $content = get_post_field( 'post_content', get_the_ID() );
    $word_count = str_word_count( strip_tags( $content ) );
    return max( 1, (int) ceil( $word_count / 200 ) );
}
