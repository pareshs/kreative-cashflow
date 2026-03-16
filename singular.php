<?php
/**
 * Template for single posts and pages
 *
 * @package KreativeCashflow
 */
get_header(); ?>

<!-- Page Hero -->
<div class="page-hero">
  <div class="page-hero-inner">
    <?php if ( is_page() ) : ?>
      <div class="breadcrumb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kreative-cashflow' ); ?></a>
        <span>/</span>
        <?php the_title(); ?>
      </div>
    <?php endif; ?>
    <h1><?php the_title(); ?></h1>
    <?php if ( is_single() ) : ?>
      <div class="blog-meta">
        <span><?php echo get_the_date(); ?></span>
        <span>/</span>
        <span><?php the_author(); ?></span>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="container section-pad">
  <div style="display:grid;grid-template-columns:<?php echo is_page() ? '1fr' : '1fr 320px'; ?>;gap:60px;align-items:start;">

    <main id="site-main" role="main">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
          <?php if ( is_page() ) : ?>
            <div class="entry-content" style="max-width:900px;margin:0 auto;">
              <?php the_content(); ?>
            </div>
          <?php else : ?>
            <div class="entry-content">
              <?php the_content(); ?>
            </div>

            <?php the_tags( '<div style="margin-top:40px;display:flex;gap:8px;flex-wrap:wrap;">', '', '</div>' ); ?>

            <div style="margin-top:60px;padding:40px;background:var(--white);border:1px solid var(--rule);display:flex;gap:24px;align-items:flex-start;">
              <div style="flex-shrink:0;">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 72 ); ?>
              </div>
              <div>
                <div style="font-family:var(--font-mono);font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:var(--gold);margin-bottom:6px;">
                  <?php esc_html_e( 'Written by', 'kreative-cashflow' ); ?>
                </div>
                <h4 style="margin-bottom:8px;"><?php the_author(); ?></h4>
                <p style="font-size:0.9rem;margin-bottom:0;"><?php the_author_meta( 'description' ); ?></p>
              </div>
            </div>

            <?php if ( comments_open() || get_comments_number() ) : ?>
              <div style="margin-top:60px;">
                <?php comments_template(); ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>

        </article>
      <?php endwhile; ?>
    </main>

    <?php if ( is_single() ) : ?>
      <aside class="sidebar" role="complementary">
        <?php get_sidebar(); ?>
      </aside>
    <?php endif; ?>

  </div>
</div>

<?php get_footer();
