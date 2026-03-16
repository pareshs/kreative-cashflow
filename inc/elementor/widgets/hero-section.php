<?php
/**
 * Elementor Hero Section Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Hero extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_hero';
    }

    public function get_title() {
        return __( 'Hero Section', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-banner';
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
            'tag',
            [
                'label' => __( 'Tag Line', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Your Complete Property Partner', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Find. Finance. Own.', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Expert guidance for every stage of your property journey.', 'kreative-cashflow' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div style="background:#2E3440;color:white;padding:100px 40px;min-height:70vh;display:flex;align-items:center;">
            <div style="max-width:800px;">
                <div style="color:#C9A84C;text-transform:uppercase;font-size:0.75rem;letter-spacing:0.2em;margin-bottom:16px;">
                    <?php echo esc_html( $settings['tag'] ); ?>
                </div>
                <h1 style="color:white;font-size:clamp(3rem,6vw,5.5rem);margin-bottom:24px;">
                    <?php echo esc_html( $settings['title'] ); ?>
                </h1>
                <p style="font-size:1.1rem;color:rgba(255,255,255,0.7);margin-bottom:32px;">
                    <?php echo esc_html( $settings['description'] ); ?>
                </p>
            </div>
        </div>
        <?php
    }
}
