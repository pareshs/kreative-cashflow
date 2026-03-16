<?php
/**
 * Elementor Team Member Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class KC_Elementor_Team_Member extends \Elementor\Widget_Base {

    public function get_name() {
        return 'kc_team_member';
    }

    public function get_title() {
        return __( 'Team Member', 'kreative-cashflow' );
    }

    public function get_icon() {
        return 'eicon-person';
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
            'image',
            [
                'label' => __( 'Image', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __( 'Name', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'John Smith', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'role',
            [
                'label' => __( 'Role', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Senior Property Advisor', 'kreative-cashflow' ),
            ]
        );

        $this->add_control(
            'bio',
            [
                'label' => __( 'Bio', 'kreative-cashflow' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '10+ years helping Australians find their dream homes.', 'kreative-cashflow' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="kc-team-member">
            <div class="kc-team-member__image">
                <img src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">
            </div>
            <h3 class="kc-team-member__name"><?php echo esc_html( $settings['name'] ); ?></h3>
            <div class="kc-team-member__role"><?php echo esc_html( $settings['role'] ); ?></div>
            <p class="kc-team-member__bio"><?php echo esc_html( $settings['bio'] ); ?></p>
        </div>
        <?php
    }
}
