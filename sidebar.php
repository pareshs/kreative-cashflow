<?php
/**
 * Sidebar Template
 *
 * @package KreativeCashflow
 */

if ( is_active_sidebar( 'sidebar-blog' ) ) {
    dynamic_sidebar( 'sidebar-blog' );
} else {
    // Default sidebar content
    ?>

    <!-- Search Widget -->
    <div class="widget">
      <h5 class="widget-title"><?php esc_html_e( 'Search', 'kreative-cashflow' ); ?></h5>
      <?php get_search_form(); ?>
    </div>

    <!-- Book Consultation Widget -->
    <div class="widget" style="background:var(--slate);border-color:transparent;">
      <div style="font-family:var(--font-mono);font-size:0.62rem;letter-spacing:0.25em;text-transform:uppercase;color:var(--gold);margin-bottom:12px;"><?php esc_html_e( 'Free Consultation', 'kreative-cashflow' ); ?></div>
      <h5 class="widget-title" style="color:var(--white);border-color:rgba(201,168,76,0.3);"><?php esc_html_e( 'Ready to Start?', 'kreative-cashflow' ); ?></h5>
      <p style="color:rgba(255,255,255,0.5);font-size:0.88rem;margin-bottom:20px;"><?php esc_html_e( 'Book a free consultation with one of our property advisors today.', 'kreative-cashflow' ); ?></p>
      <a href="/contact" class="btn btn-gold" style="width:100%;justify-content:center;"><?php esc_html_e( 'Book Now', 'kreative-cashflow' ); ?> &rarr;</a>
    </div>

    <!-- Recent Posts -->
    <div class="widget">
      <h5 class="widget-title"><?php esc_html_e( 'Recent Articles', 'kreative-cashflow' ); ?></h5>
      <ul>
        <?php
        $recent = get_posts([ 'numberposts' => 5, 'post_status' => 'publish' ]);
        foreach ( $recent as $post ) {
            echo '<li><a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . esc_html( $post->post_title ) . '</a></li>';
        }
        ?>
      </ul>
    </div>

    <!-- Categories -->
    <div class="widget">
      <h5 class="widget-title"><?php esc_html_e( 'Categories', 'kreative-cashflow' ); ?></h5>
      <ul>
        <?php wp_list_categories([ 'title_li' => '', 'show_count' => true ]); ?>
      </ul>
    </div>

    <!-- Contact Info -->
    <div class="widget">
      <h5 class="widget-title"><?php esc_html_e( 'Get in Touch', 'kreative-cashflow' ); ?></h5>
      <ul>
        <?php if ( $phone = kc_option( 'kc_phone', '1300 000 000' ) ) : ?>
          <li><a href="tel:<?php echo esc_attr( preg_replace('/\s/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></li>
        <?php endif; ?>
        <?php if ( $email = kc_option( 'kc_email', 'hello@kreativecashflow.com.au' ) ) : ?>
          <li><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></li>
        <?php endif; ?>
      </ul>
    </div>

<?php } ?>
