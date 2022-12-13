<?php
/**
 * Elementor Timeline Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Group_Control_Css_Filter;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\register_controls;

defined( 'ABSPATH' ) || die();

class Rsaddon_pro_Timeline_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'rs-timeline';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'RS Timeline', 'rsaddon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-error';
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_categories() {
        return [ 'rsaddon_category' ];
    }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Timeline' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {




		$this->start_controls_section(
			'section_cta',
			[
				'label' => esc_html__( 'RS Timeline', 'rsaddon' ),
			]
		);	



		$repeater = new Repeater();
        $repeater->add_control(
            'text',
            [
                'label' => esc_html__( 'Title', 'rsaddon' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Title Here', 'rsaddon' ),
            ]
        );
        $repeater->add_control(
            'title_link',
            [
                'label' => esc_html__( 'Title Link', 'rsaddon' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( '#', 'rsaddon' ),
            ]
        );
        $repeater->add_control(
            'desc',
            [
                'label' => esc_html__( 'Description', 'rsaddon' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Description Here', 'rsaddon' ),
            ]
        );
        $repeater->add_control(
            'date',
            [
                'label' => esc_html__( 'Date', 'rsaddon' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Date Here', 'rsaddon' ),
            ]
        );
        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'show_label' => false,
                'default' => [
                    [
                        'text' => esc_html__( 'Lorem Ipsum is simply', 'rsaddon' ),
                        'desc' => esc_html__( 'Lorem ipsum dolor sit amet elit sed. consectetur sedo adipi amet lio.', 'rsaddon' ),
                        'date' => esc_html__( 'January 2020', 'rsaddon' ),
                        
                    ],
                    [
                        'text' => esc_html__( 'Lorem Ipsum is simply', 'rsaddon' ),
                        'desc' => esc_html__( 'Lorem ipsum dolor sit amet elit sed. consectetur sedo adipi amet lio.', 'rsaddon' ),
                        'date' => esc_html__( 'January 2019', 'rsaddon' ),
                        
                    ],
                    [
                        'text' => esc_html__( 'Lorem Ipsum is simply', 'rsaddon' ),
                        'desc' => esc_html__( 'Lorem ipsum dolor sit amet elit sed. consectetur sedo adipi amet lio.', 'rsaddon' ),
                        'date' => esc_html__( 'January 2018', 'rsaddon' ),
                        
                    ],
                    [
                        'text' => esc_html__( 'Lorem Ipsum is simply', 'rsaddon' ),
                        'desc' => esc_html__( 'Lorem ipsum dolor sit amet elit sed. consectetur sedo adipi amet lio.', 'rsaddon' ),
                        'date' => esc_html__( 'January 2017', 'rsaddon' ),
                        
                    ],
                ],
                'title_field' => '{{{ text }}}',
            ]
        );


		$this->end_controls_section();

		$this->start_controls_section(
		    '_section_style_content',
		    [
		        'label' => esc_html__( 'Content', 'rsaddon' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);
        $this->add_responsive_control(
            'content_align',
            [
                'label' => esc_html__( 'Alignment', 'rsaddon' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'rsaddon' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'rsaddon' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'rsaddon' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justify', 'rsaddon' ),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .rs-timeline ul li' => 'text-align: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'title_style',
            [
                'label' => esc_html__( 'Title Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
		    'title_color',
		    [
		        'label' => esc_html__( 'Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .content h3 a' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'title_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .content h3' => 'background: {{VALUE}};',
		        ],
		    ]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs-timeline ul li .content h3',
            ]
        );

        $this->add_responsive_control(
		    'title_padding',
		    [
		        'label' => esc_html__( 'Title Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .content h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
            'desc_style',
            [
                'label' => esc_html__( 'Description Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_typography',
                'label' => esc_html__( 'Typography', 'rsaddon' ),
                'selector' => '{{WRAPPER}}  .rs-timeline ul li .content p',
            ]
        );

        $this->add_control(
		    'desc_color',
		    [
		        'label' => esc_html__( 'Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .content p' => 'color: {{VALUE}};',
		        ],
		    ]
		);

        $this->add_responsive_control(
		    'desc_gap',
		    [
		        'label' => esc_html__( 'Description Padding', 'rsaddon' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_control(
            'date_style',
            [
                'label' => esc_html__( 'Date Style', 'rsaddon' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

		$this->add_control(
		    'date_color',
		    [
		        'label' => esc_html__( 'Date Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .date h4' => 'color: {{VALUE}};',
		        ],
		    ]
		);
		$this->add_control(
		    'date_bg_color',
		    [
		        'label' => esc_html__( 'Date Color', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline ul li .date h4' => 'background: {{VALUE}};',
		        ],
		    ]
		);
		$this->add_responsive_control(
            'date_padding',
            [
                'label' => esc_html__( 'Padding', 'rsaddon' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .rs-timeline ul li .date h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
		    'line_bg',
		    [
		        'label' => esc_html__( 'Line Background', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline:before, {{WRAPPER}} .rs-timeline .point' => 'border-color: {{VALUE}};',
		        ],
		    ]
		);
        $this->add_control(
		    'dots_color',
		    [
		        'label' => esc_html__( 'Dots Background', 'rsaddon' ),
		        'type' => Controls_Manager::COLOR,		      
		        'selectors' => [
		            '{{WRAPPER}} .rs-timeline .point' => 'background: {{VALUE}};',
		        ],
		    ]
		);
		$this->end_controls_section();
	}

	/**
	 * Render counter widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {	
	
		$settings = $this->get_settings_for_display();

            $this->add_inline_editing_attributes( 'cta_title', 'basic' );
            $this->add_render_attribute( 'cta_title', 'class', 'title' );

            $this->add_inline_editing_attributes( 'cta_desc', 'basic' );
            $this->add_render_attribute( 'cta_desc', 'class', 'desc' ); 

            $this->add_inline_editing_attributes( 'btn_text', 'basic' );
            $this->add_render_attribute( 'btn_text', 'class', 'btn_text' ); 
        ?>
		<div class="rs-timeline">
            <ul>
            	<?php foreach ( $settings['features_list'] as $index => $feature ) :?>
            	<li>
            	    <div class="content">
            	       <h3><a href="<?php echo wp_kses_post( $feature['title_link'] ); ?>"><?php echo wp_kses_post( $feature['text'] ); ?></a></h3>
            	        <p><?php echo wp_kses_post( $feature['desc'] ); ?></p>
            	    </div>
            	    <div class="point"></div>
            	    <div class="date">
            	        <h4><?php echo wp_kses_post( $feature['date'] ); ?></h4>
            	    </div>
            	</li>
            	<?php endforeach; ?>
            </ul>
        </div> 
	<?php 
	}
}