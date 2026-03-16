<?php
/**
 * Elementor Testimonial Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Testimonial extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_testimonial';
    }

    public function get_title() {
        return __( 'Testimonial', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-testimonial';
    }

    public function get_categories() {
        return [ 'kreative-cashflow' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'testimonial_text',
            [
                'label' => __( 'Testimonial', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Kreative Cashflow made buying our first home effortless. Highly recommended!', 'kreative-cashflow' ),
                'rows' => 4,
            ]
        );

        $this->add_control(
            'author_name',
            [
                'label' => __( 'Author Name', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sarah Johnson', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'author_role',
            [
                'label' => __( 'Author Role', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'First Home Buyer', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'rating',
            [
                'label' => __( 'Rating', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 5,
                'min' => 0,
                'max' => 5,
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $stars = str_repeat( '★', $settings['rating'] );
        ?>
        <div class="kc-testimonial">
            <div class="kc-testimonial__stars"><?php echo $stars; ?></div>
            <div class="kc-testimonial__text"><?php echo esc_html( $settings['testimonial_text'] ); ?></div>
            <div class="kc-testimonial__author"><?php echo esc_html( $settings['author_name'] ); ?></div>
            <div class="kc-testimonial__role"><?php echo esc_html( $settings['author_role'] ); ?></div>
        </div>
        <?php
    }
}
