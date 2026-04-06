</div><!-- #main-content -->

<footer id="site-footer" role="contentinfo">
<?php if ( $sections['footer-main'] ) : ?>
  <div class="footer-main">
    <?php $footer_hide = true; ?>
    <?php if($footer_hide): ?>
    <!-- Brand Column -->
    <div class="footer-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" rel="home">
        <svg width="32" height="32" viewBox="0 0 52 52" fill="none" aria-hidden="true">
          <path d="M26 4L6 20V48H20V32H32V48H46V20L26 4Z" stroke="white" stroke-width="1" fill="rgba(201,168,76,0.1)"/>
          <circle cx="32" cy="20" r="8" fill="none" stroke="#C9A84C" stroke-width="1"/>
        </svg>
        <div>
          <span class="part1">Kreative</span>
          <span class="part2">Cashflow</span>
        </div>
      </a>
      <p><?php echo wp_kses_post( kc_option( 'kc_footer_tagline', 'Your complete property partner — connecting Australians with every expert they need, from first home to investment portfolio.' ) ); ?></p>

      <!-- Social Links -->
      <div class="footer-socials">
        <?php if ( $fb = kc_option( 'kc_facebook' ) ) : ?>
          <a href="<?php echo esc_url( $fb ); ?>" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
          </a>
        <?php endif; ?>
        <?php if ( $ig = kc_option( 'kc_instagram' ) ) : ?>
          <a href="<?php echo esc_url( $ig ); ?>" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
          </a>
        <?php endif; ?>
        <?php if ( $li = kc_option( 'kc_linkedin' ) ) : ?>
          <a href="<?php echo esc_url( $li ); ?>" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
          </a>
        <?php endif; ?>
        <?php if ( $yt = kc_option( 'kc_youtube' ) ) : ?>
          <a href="<?php echo esc_url( $yt ); ?>" class="footer-social-link" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46A2.78 2.78 0 001.46 6.42 29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.96C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 001.95-1.96A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="currentColor"/></svg>
          </a>
        <?php endif; ?>
      </div>
    </div>
    <?php endif; ?>

    <!-- Footer Widget Columns -->
    <?php for ( $i = 1; $i <= 3; $i++ ) : ?>
      <div class="footer-col">
        <?php if ( is_active_sidebar( "footer-{$i}" ) ) : ?>
          <?php dynamic_sidebar( "footer-{$i}" ); ?>
        <?php else : ?>
          <?php kc_default_footer_col( $i ); ?>
        <?php endif; ?>
      </div>
    <?php endfor; ?>

  </div><!-- .footer-main -->
  <?php endif; ?>

  <!-- Footer Bottom Bar -->
  <div class="footer-bottom">
    <p>
      &copy; <?php echo date( 'Y' ); ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Kreative Cashflow</a>.
      <?php esc_html_e( 'All rights reserved.', 'kreative-cashflow' ); ?>
      <?php if ( $abn = kc_option( 'kc_abn' ) ) echo ' &nbsp;&middot;&nbsp; ' . esc_html( $abn ); ?>
    </p>
    <p>
      <?php
      $legal = [
        //__( 'Privacy Policy',     'kreative-cashflow' ) => '/privacy-policy',
        //__( 'Terms of Service',   'kreative-cashflow' ) => '/terms',
        __( 'Disclaimer',         'kreative-cashflow' ) => '/disclaimer',
        //__( 'Credit Guide',       'kreative-cashflow' ) => '/credit-guide',
      ];
      $links = [];
      foreach ( $legal as $label => $url ) {
        $links[] = '<a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a>';
      }
      echo implode( ' &nbsp;&middot;&nbsp; ', $links );
      ?>
    </p>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>

<?php
/**
 * Default footer column content (shown when no widgets are assigned)
 */
function kc_default_footer_col( $col ) {
    $cols = [
        1 => [
            'title' => 'Our Services',
            'links' => [
                'First Home Buying'  => '/first-home',
                'Investment Property' => '/investment',
                'Mortgage Broking'   => '/mortgage',
                'Conveyancing'       => '/legal',
                'Property Inspection' => '/inspection',
                'Property Management' => '/management',
            ],
        ],
        2 => [
            'title' => 'Company',
            'links' => [
                'About Us'     => '/about',
                'Our Team'     => '/team',
                'Testimonials' => '/testimonials',
                'Blog'         => '/blog',
                'Contact'      => '/contact',
                'Careers'      => '/careers',
            ],
        ],
        3 => [
            'title' => 'Get in Touch',
            'links' => [],
            'contact' => true,
        ],
    ];

    $data = $cols[ $col ] ?? null;
    if ( ! $data ) return;

    echo '<h5>' . esc_html( $data['title'] ) . '</h5>';

    if ( ! empty( $data['links'] ) ) {
        echo '<ul>';
        foreach ( $data['links'] as $label => $url ) {
            echo '<li><a href="' . esc_url( $url ) . '">' . esc_html( $label ) . '</a></li>';
        }
        echo '</ul>';
    }

    if ( ! empty( $data['contact'] ) ) {
        $phone   = kc_option( 'kc_phone',   '1300 000 000' );
        $email   = kc_option( 'kc_email',   'hello@kreativecashflow.com.au' );
        $address = kc_option( 'kc_address', 'Gold Coast QLD 4217' );
        echo '<ul>';
        echo '<li><a href="tel:' . esc_attr( preg_replace('/\s/', '', $phone) ) . '">' . esc_html( $phone ) . '</a></li>';
        echo '<li><a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a></li>';
        echo '<li><span style="color:rgba(255,255,255,0.4);font-size:0.88rem;">' . esc_html( $address ) . '</span></li>';
        echo '</ul>';
    }
}
