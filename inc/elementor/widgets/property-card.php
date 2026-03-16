<?php
/**
 * Elementor Property Card Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Property_Card extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_property_card';
    }

    public function get_title() {
        return __( 'Property Card', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'kreative-cashflow' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'kreative-cashflow' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Modern Family Home', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __( 'Price', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '$850,000', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'location',
            [
                'label' => __( 'Location', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gold Coast, QLD', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'beds',
            [
                'label' => __( 'Bedrooms', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 4,
            ]
        );

        $this->add_control(
            'baths',
            [
                'label' => __( 'Bathrooms', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );

        $this->add_control(
            'cars',
            [
                'label' => __( 'Car Spaces', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 2,
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="kc-property-card">
            <div class="kc-property-card__image">
                <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                <div class="kc-property-card__badge">For Sale</div>
            </div>
            <div class="kc-property-card__content">
                <div class="kc-property-card__price"><?php echo esc_html( $settings['price'] ); ?></div>
                <h3 class="kc-property-card__title"><?php echo esc_html( $settings['title'] ); ?></h3>
                <div class="kc-property-card__location"><?php echo esc_html( $settings['location'] ); ?></div>
                <div class="kc-property-card__specs">
                    <div class="kc-property-card__spec">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <?php echo esc_html( $settings['beds'] ); ?> Bed
                    </div>
                    <div class="kc-property-card__spec">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                        <?php echo esc_html( $settings['baths'] ); ?> Bath
                    </div>
                    <div class="kc-property-card__spec">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M14 16H9m10 0h3m-3-4h3m-3-4h3m-6 8l1.5-1.5M15 6l1.5 1.5M13 7.5L15 5"/></svg>
                        <?php echo esc_html( $settings['cars'] ); ?> Car
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
