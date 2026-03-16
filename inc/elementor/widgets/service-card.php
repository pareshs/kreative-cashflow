<?php
/**
 * Elementor Service Card Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Service_Card extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_service_card';
    }

    public function get_title() {
        return __( 'Service Card', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'kreative-cashflow' ];
    }

    protected function register_controls() {
        
        // Content Section
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'kreative-cashflow' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label' => __( 'Icon Type', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'first-home',
                'options' => [
                    'first-home' => __( 'First Home', 'kreative-cashflow' ),
                    'investment' => __( 'Investment', 'kreative-cashflow' ),
                    'mortgage' => __( 'Mortgage', 'kreative-cashflow' ),
                    'legal' => __( 'Legal', 'kreative-cashflow' ),
                    'inspection' => __( 'Inspection', 'kreative-cashflow' ),
                    'management' => __( 'Management', 'kreative-cashflow' ),
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'First Home Buying', 'kreative-cashflow' ),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __( 'Description', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Hand-holding from the first open home to collecting the keys.', 'kreative-cashflow' ),
                'rows' => 4,
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Style', 'kreative-cashflow' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Icon Color', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#C9A84C',
                'selectors' => [
                    '{{WRAPPER}} .kc-service-card__icon' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#2E3440',
                'selectors' => [
                    '{{WRAPPER}} .kc-service-card__title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="kc-service-card">
            <div class="kc-service-card__icon">
                <?php echo kc_service_icon( $settings['icon_type'] ); ?>
            </div>
            <h3 class="kc-service-card__title"><?php echo esc_html( $settings['title'] ); ?></h3>
            <p class="kc-service-card__description"><?php echo esc_html( $settings['description'] ); ?></p>
        </div>
        <?php
    }
}
