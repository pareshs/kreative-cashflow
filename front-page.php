<?php
/**
 * Front Page Template - Homepage
 *
 * @package KreativeCashflow
 */
get_header(); 
$sections = [
	'hero' => true,
	'service' => true,
	'about' => true,
	'clients' => true,
	'process' => true,
	'properties' => false,
	'testimonials' => false,
	'ctaband' => true,
	'form' => true,
];
?>

<!-- ═══════════════════════════════════════════════
		 HERO SECTION
═══════════════════════════════════════════════ -->
<?php if ( $sections['hero'] ) : ?>
<section class="hero-section" id="hero">
	<video class="hero-vdo" role="presentation" autoplay="" muted="" playsinline="" loop="" src="/wp-content/uploads/2026/03/hp-hero-vdo.mp4"></video>
	<div class="hero-vdo-overlay" aria-hidden="true"></div>
	<div class="hero-orb" aria-hidden="true"></div>
	<div class="container" style="position:relative;z-index:2;">
		<div class="hero-tag"><?php echo wp_kses_post( kc_option( 'kc_hero_tag', 'Your Complete Property Partner' ) ); ?></div>
		<h1 class="hero-title"><?php echo wp_kses_post( kc_option( 'kc_hero_title', 'Prosperity Through Property' ) ); ?></h1>
		<p class="hero-desc"><?php echo wp_kses_post( kc_option( 'kc_hero_desc', 'Kreative Cashflow is your <strong>boutique, one-stop solution for property investment</strong>. From your first home to your next investment, we create strategies that grow your wealth, manage your assets, and secure your financial future.' ) ); ?></p>
		
		<div class="hero-ctas">
			<a href="<?php echo esc_url( kc_option( 'kc_hero_cta1_url', '#form' ) ); ?>" class="btn btn-primary">
				<?php echo esc_html( kc_option( 'kc_hero_cta1', 'Book Your Strategy Session Today' ) ); ?> &rarr;
			</a>
			<?php if(!empty(kc_option('kc_hero_cta2_url'))): ?>
			<a href="<?php echo esc_url( kc_option( 'kc_hero_cta2_url', '/properties' ) ); ?>" class="btn btn-outline">
				<?php echo esc_html( kc_option( 'kc_hero_cta2', 'View Properties' ) ); ?>
			</a>
			<?php endif; ?>
		</div>
		<?php if ( kc_option( 'kc_herostats_enable', '1' ) ) : ?>
		<div class="hero-stats">
			<?php for ( $i = 1; $i <= 3; $i++ ) :
				$num = kc_option( "kc_stat_{$i}_num", [ 'End-to-End', 'Stress-Free', 'High-Quality' ][ $i - 1 ] );
				$label = kc_option( "kc_stat_{$i}_label", [ 'Property Support', 'Buying Experience', 'Property Strategies' ][ $i - 1 ] );
			?>
				<div class="hero-stat" role="listitem" data-animate data-animate-delay="<?php echo $i; ?>">
					<div class="hero-stat-num"><?php echo esc_html( $num ); ?></div>
					<div class="hero-stat-label"><?php echo esc_html( $label ); ?></div>
				</div>
			<?php endfor; ?>
		</div>
		<?php endif; ?>
	</div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
		 SERVICES SECTION
═══════════════════════════════════════════════ -->
<?php if ( $sections['service'] ) : ?>
<section class="services-section section-pad" id="service">
	<div class="container">
		<div class="overline">What We Do</div>
		<h2 data-animate data-animate-delay="1">Full Acquisition Concierge</h2>
		<p class="intro-p" data-animate data-animate-delay="2">Our flagship service provides a <strong>complete, end-to-end property investment solution</strong>. Designed for investors or first-time buyers seeking a hands-off, strategic approach, this package ensures every property acquisition contributes to your long-term wealth goals.</p>
		<a href="#form" class="btn btn-primary" data-animate data-animate-delay="3">
			Book Your Full Acquisition Concierge Session  &rarr;
		</a>

		<div class="services-grid" data-animate>
			<?php
			$counter = 0;
			$services = [
				[ 'icon' => 'strategy',		'title' => 'Strategy Session (30-60 min)',		'desc' => 'Align acquisitions with your financial goals.'],
				[ 'icon' => 'analytics',	'title' => 'Suburb Selection Analysis',		 	'desc' => 'Identify high-potential areas for growth and rental yield.'],
				[ 'icon' => 'checklist',	'title' => 'Property Shortlist',		  		'desc' => 'Curated properties based on your financial blueprint.'],
				[ 'icon' => 'management',	'title' => 'Comparable Sales Analysis',		 	'desc' => 'Data-driven insights to secure fair market value.'],
				[ 'icon' => 'auction',		'title' => 'Negotiation & Auction Bidding',		'desc' => 'Expert guidance to get the best price.'],
				[ 'icon' => 'inspection',	'title' => 'Building & Pest Coordination',		'desc' => 'Organize inspections with trusted professionals.'],
				[ 'icon' => 'conveyancing',	'title' => 'Conveyancing Coordination',			'desc' => 'Full support through legal processes.'],
				[ 'icon' => 'management',	'title' => 'Rental Manager Placement',		  	'desc' => 'Ensure your investment is managed efficiently.'],
				[ 'icon' => 'management',	'title' => 'Depreciation Advice',		 		'desc' => 'Optimize tax benefits and returns.'],
				[ 'icon' => 'management',	'title' => '3-Month Post-Settlement Review',  	'desc' => 'Monitor your property and ensure your strategy is on track.'],
				[ 'icon' => 'first-home',	'title' => 'First Home Buyer Guidance',		 	'desc' => 'Step-by-step education, suburb analysis, and auction support.'],
				[ 'icon' => 'support',		'title' => 'Due Diligence Support',		  		'desc' => 'For properties you\'ve found'],
			];
			
			foreach ( $services as $svc ) : 
			$counter++;
			?>
				<article class="service-card" data-animate data-animate-delay="<?php echo $counter + 1 ?>">
					<div class="service-card-icon" aria-hidden="true"><?php echo kc_icon( $svc['icon'] ); ?></div>
					<h3><?php echo esc_html( $svc['title'] ); ?></h3>
					<p><?php echo esc_html( $svc['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		
	</div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
		 ABOUT SECTION
═══════════════════════════════════════════════ -->
<?php if ( $sections['about'] ) : ?>
<section class="about-section section-pad" id="about">
	<div class="container">
		<div class="about-inner">
			<div class="about-image-wrap" data-animate>
				<img src="/wp-content/uploads/2026/03/about-1-scaled.jpg" alt="Kreative Cashflow About">
			</div>

			<div class="about-content">
				<div class="overline data-animate">Why Kreative Cashflow</div>
				<h2 data-animate data-animate-delay="1">Property Made Simple</h2>
				<p data-animate data-animate-delay="2">Every property has a purpose. At Kreative Cashflow, we don’t just facilitate purchases — we design financial architecture around property</p>
				<p data-animate data-animate-delay="2">Our comprehensive approach ensures each acquisition, management decision, and portfolio move fits seamlessly into a larger plan for long-term prosperity.</p>
				<div class="primary-rule data-animate"></div>
				<a href="#" class="btn btn-primary" data-animate data-animate-delay="3">
					Book Your Strategy Session Today &rarr;
				</a>

				<div class="about-stat-row" data-animate>
					<?php
						$counter = 0;
						$about = [
							['icon'=> "management", 'title' => 'Comprehensive, One-Stop Solution', 	'desc' => 'From strategy to acquisition, management, and portfolio growth.'],
							['icon'=> "management", 'title' => 'Strategic Wealth Design', 			'desc' => 'Every property fits into a larger financial blueprint.'],
							['icon'=> "management", 'title' => 'Tailored Approach', 				'desc' => 'Customized for first-time buyers and seasoned investors alike.'],
							['icon'=> "shield", 	'title' => 'Hands-On Support', 					'desc' => 'Coordinated inspections, conveyancing, rental management, and post-settlement reviews.'],
							['icon'=> "shield", 	'title' => 'Trusted Advice', 					'desc' => 'Depreciation']
						];
						foreach ( $about as $aitem ) :
							$counter++;
					?>
						<div class="about-stat" data-animate data-animate-delay="<?php echo $counter + 1 ?>">
							<div class="about-card-icon" aria-hidden="true"><?php echo kc_icon( $aitem['icon'] ); ?></div>
							<div class="about-stat-des">
								<h3><?php echo esc_html( $aitem['title'] ); ?></h3>
								<p><?php echo esc_html( $aitem['desc'] ); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
		 IMAGE SEPARATOR SECTION
═══════════════════════════════════════════════ -->
<section class="img-separator-section" id="img-separator">
	<div class="img-separator-inner">
		<img src="/wp-content/uploads/2026/03/banner-exterior-1-scaled.jpg" alt="Kreative Cashflow About">
		<img src="/wp-content/uploads/2026/03/banner-exterior-2-scaled.jpg" alt="Kreative Cashflow About">
	</div>
</section>

<!-- ═══════════════════════════════════════════════
		Clients SECTION
═══════════════════════════════════════════════ -->
<?php if ( $sections['clients'] ) : ?>
<section class="clients-section section-pad" id="clients">
	<div class="container">
		<div class="overline">Who we serve</div>
		<p>Kreative Cashflow is your boutique, one-stop solution for property investment. Our flagship service provides a complete, end-to-end property investment solution. </p>
		<a href="#form" class="btn btn-primary" data-animate data-animate-delay="3">
			Book Your Strategy Session Today  &rarr;
		</a>

		<div class="clients-grid" data-animate>
			<?php
			$counter = 0;
			$clients = [
				[ 'icon' => 'strategy',		'title' => 'First Home Buyers',					'desc' => 'Education, strategy, and confidence for a smooth property journey.'],
				[ 'icon' => 'analytics',	'title' => 'Investors & Portfolio Builders',	'desc' => 'Data-driven, strategic acquisition and management to
grow wealth'],
				[ 'icon' => 'checklist',	'title' => 'Professional & Busy Clients',		'desc' => 'We handle the complex details so you can focus on your
life.
'],
			];
			
			foreach ( $clients as $client ) : 
			$counter++;
			?>
				<article class="clients-card" data-animate data-animate-delay="<?php echo $counter + 1 ?>">
					<div class="clients-card-icon" aria-hidden="true"><?php echo kc_icon( $client['icon'] ); ?></div>
					<h3><?php echo esc_html( $client['title'] ); ?></h3>
					<p><?php echo esc_html( $client['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
		
	</div>
</section>
<?php endif; ?>


<!-- ═══════════════════════════════════════════════
		 CTA BAND
═══════════════════════════════════════════════ -->
<?php if ( $sections['ctaband'] ) : ?>

<div class="cta-band">
	<div class="cta-band-inner">
		<h2 data-animate><?php echo wp_kses_post( kc_option( 'kc_cta_title', 'Start Designing Your Property Portfolio Today' ) ); ?></h2>
		<div style="display:flex;gap:16px;flex-wrap:wrap;" data-animate data-animate-delay="2">
			<a href="<?php echo esc_url( kc_option( 'kc_cta_url1', '/contact' ) ); ?>" class="btn btn-primary">
				<?php echo esc_html( kc_option( 'kc_cta_btn1', 'Book Your Strategy Session Today' ) ); ?> &rarr;
			</a>
		</div>
	</div>
</div>
<div class="cta-band-vdo-wrap">
	<video class="cta-band-vdo" role="presentation" autoplay="" muted="" playsinline="" loop="" src="/wp-content/uploads/2026/03/about.mp4"></video>
</div>

<?php endif; ?>


<!-- ═══════════════════════════════════════════════
		 PROCESS STEPS
═══════════════════════════════════════════════ -->
<?php if ( $sections['process'] ) : ?>
<section class="process-section section-pad" id="how-it-works">
	<div class="container">
		<div class="overline" data-animate>How It Works</div>
		<h2 data-animate data-animate-delay="1">Your Journey, Simplified</h2>
		<p style="color:rgba(255,255,255,0.5);" data-animate data-animate-delay="2">From the first conversation to holding the keys — here is how we guide you through every step.</p>

		<div class="steps-grid" data-animate>
			<?php
			$counter = 0;
			$processes = [
				[ 'title' => 'Strategy Session (30–60 min)',	'desc' => 'Align acquisitions with your financial goals.'],
            	[ 'title' => 'Discovery Call',      			'desc' => 'Tell us your goals, budget, and timeline. We\'ll map out your ideal property journey and introduce you to the right specialists.' ],
            	[ 'title' => 'Strategy & Finance',  			'desc' => 'Our mortgage brokers get your pre-approval sorted so you can move fast when the right property comes along.' ],
            	[ 'title' => 'Find & Secure',       			'desc' => 'We help you identify properties, negotiate terms, book inspections, and review contracts before you commit.' ],
            	[ 'title' => 'Settlement & Beyond', 			'desc' => 'Our solicitors manage settlement and our property managers keep your investment performing for years to come.' ],
			];
			
			foreach ( $processes as $process ) : 
			$counter++;
			?>
				<div class="step-card" data-animate data-animate-delay="<?php echo $counter + 1; ?>">
					<div class="step-num"><?php echo str_pad( $counter, 2, '0', STR_PAD_LEFT ); ?></div>
					<h4><?php echo esc_html( $process['title'] ); ?></h4>
					<p><?php echo esc_html( $process['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
		 FEATURED PROPERTIES
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_properties_enable', '1' ) && $sections['properties'] ) : ?>
<?php
$properties = new WP_Query([
	'post_type'		   => 'kc_property',
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
<?php endif; ?>

<!-- ═══════════════════════════════════════════════
		 TESTIMONIALS
═══════════════════════════════════════════════ -->
<?php if ( kc_option( 'kc_testimonials_enable', '1' ) && $sections['testimonials'] ) : ?>
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
							<div class="testimonial-avatar" style="background:var(--primary-lt);"></div>
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
<?php endif; ?>


<!-- ═══════════════════════════════════════════════
		Form
═══════════════════════════════════════════════ -->
<?php if ( $sections['form'] ) : ?>
<div class="form" id="form">
	<div class="container" data-animate>
		<div class="overline in-view" data-animate>Get Started</div>
		<h2 data-animate>Start Designing Your Property Portfolio Today</h2>
		<p data-animate>We'd love to hear from you! Please fill out the form and we'll get back to you as soon as possible.</p>
		<script src="https://js-ap1.hsforms.net/forms/embed/442945694.js" defer></script>
		<div class="hs-form-frame" data-region="ap1" data-form-id="7b61df4e-d9fc-46dd-8349-b8234964a78d" data-portal-id="442945694"></div>
	</div>
</div>
<?php endif; ?>

<?php get_footer();
