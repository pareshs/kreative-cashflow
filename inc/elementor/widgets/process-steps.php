<?php
/**
 * Elementor Process Steps Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Process_Steps extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_process_steps';
    }

    public function get_title() {
        return __( 'Process Steps', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-number-field';
    }

    public function get_categories() {
        return [ 'kreative-cashflow' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Steps', 'kreative-cashflow' ),
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Step Title', 'kreative-cashflow' ),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Step description goes here.', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'steps',
            [
                'label' => __( 'Steps', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Discovery Call', 'kreative-cashflow' ),
                        'description' => __( 'Tell us your goals and budget.', 'kreative-cashflow' ),
                    ],
                    [
                        'title' => __( 'Strategy & Finance', 'kreative-cashflow' ),
                        'description' => __( 'Get pre-approval sorted.', 'kreative-cashflow' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="kc-process-steps" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;">
            <?php foreach ( $settings['steps'] as $index => $step ) : ?>
                <div style="background:#2E3440;padding:40px 32px;border:1px solid rgba(201,168,76,0.1);">
                    <div style="font-family:var(--kc-font-serif);font-size:4rem;font-weight:300;color:rgba(201,168,76,0.15);line-height:1;margin-bottom:20px;">
                        <?php echo str_pad( $index + 1, 2, '0', STR_PAD_LEFT ); ?>
                    </div>
                    <h4 style="color:white;margin-bottom:12px;"><?php echo esc_html( $step['title'] ); ?></h4>
                    <p style="font-size:0.88rem;color:#8C98A8;margin:0;"><?php echo esc_html( $step['description'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
