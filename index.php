<?php
/**
 * Main Index Template — Blog / Archive fallback
 *
 * @package KreativeCashflow
 */

$sections = [
  'footer-main' => false,
];

get_header(); ?>

<div class="page-hero">
  <div class="page-hero-inner">
    <div class="breadcrumb">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
      <span>/</span>
      <?php
      if ( is_category() ) {
        echo esc_html( single_cat_title( '', false ) );
      } elseif ( is_tag() ) {
        echo esc_html( single_tag_title( '', false ) );
      } elseif ( is_search() ) {
        printf( esc_html__( 'Search: %s', 'kreative-cashflow' ), '<em>' . get_search_query() . '</em>' );
      } else {
        esc_html_e( 'Blog', 'kreative-cashflow' );
      }
      ?>
    </div>
    <h1>
      <?php
      if ( is_category() ) {
        single_cat_title();
      } elseif ( is_tag() ) {
        single_tag_title();
      } elseif ( is_search() ) {
        printf( esc_html__( 'Results for: <em>%s</em>', 'kreative-cashflow' ), get_search_query() );
      } elseif ( is_home() ) {
        esc_html_e( 'Property <em>Insights</em>', 'kreative-cashflow' );
      } else {
        the_archive_title();
      }
      ?>
    </h1>
  </div>
</div>

<div class="container section-pad">
  <div style="display:grid;grid-template-columns:1fr 320px;gap:60px;align-items:start;">

    <!-- Main Content -->
    <main id="site-main" role="main">
      <?php if ( have_posts() ) : ?>
        <div class="blog-grid" style="grid-template-columns:1fr 1fr;">
          <?php while ( have_posts() ) : the_post();
            $cats = get_the_category();
            $cat_name = $cats ? $cats[0]->name : 'Property';
          ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-card' ); ?>>
              <div class="blog-card-img">
                <?php if ( has_post_thumbnail() ) : ?>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'kc-blog', [ 'alt' => get_the_title() ] ); ?></a>
                <?php else : ?>
                  <div style="width:100%;background:linear-gradient(135deg,#2E3440,#4C566A);min-height:200px;display:flex;align-items:center;justify-content:center;">
                    <svg width="32" height="32" viewBox="0 0 48 48" fill="none"><path d="M4 20L24 4L44 20V44H30V30H18V44H4V20Z" stroke="rgba(201,168,76,0.3)" stroke-width="1.5"/></svg>
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
                  <span><?php the_author(); ?></span>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <?php the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
          'class'     => 'pagination',
        ]); ?>

      <?php else : ?>
        <p><?php esc_html_e( 'No posts found.', 'kreative-cashflow' ); ?></p>
      <?php endif; ?>
    </main>

    <!-- Sidebar -->
    <aside class="sidebar" role="complementary">
      <?php get_sidebar(); ?>
    </aside>

  </div>
</div>

<?php get_footer();
