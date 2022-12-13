<?php
/**
 * Prelements Animated Heading
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Utils;
use Elementor\register_controls;

defined( 'ABSPATH' ) || die();

class Prelements_Elementor_Pro_Gradient_Heading_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve prelements gradient heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'prelements-gradient-heading';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve prelements gradient heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Rs Gradient Heading', 'prelements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve prelements gradient heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-files-and-folders';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the prelements gradient heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'rsaddon_category' ];
    }

	/**
	 * Register prelements gradient heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'global_content_section',
			[
				'label' => esc_html__( 'Global', 'prelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
            'align',
            [
                'label' => esc_html__( 'Alignment', 'prelements' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
						'title' => esc_html__( 'Left', 'prelements' ),
						'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
						'title' => esc_html__( 'Center', 'prelements' ),
						'icon'  => 'eicon-text-align-center',
                    ],
                    'right' => [
						'title' => esc_html__( 'Right', 'prelements' ),
						'icon'  => 'eicon-text-align-right',
                    ],
                    'justify' => [
						'title' => esc_html__( 'Justify', 'prelements' ),
						'icon'  => 'eicon-text-align-justify',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .prelements-gradient-heading' => 'text-align: {{VALUE}}'
                ]
            ]
        );
		$this->end_controls_section();


		$this->start_controls_section(
			'subtitle_section',
			[
				'label' => esc_html__( 'Sub Heading', 'prelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Sub Heading Text', 'prelements' ),
				'type'      => Controls_Manager::TEXT,				
				'default'   => esc_html__( 'Sub Heading', 'prelements' ),
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'gradient_section',
			[
				'label' => esc_html__( 'Gradient Title', 'prelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Gradient Text', 'prelements' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Gradient Heading', 'prelements' ),				
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'   => esc_html__( 'Select Heading Tag', 'prelements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [						
					'h1' => esc_html__( 'H1', 'prelements'),
					'h2' => esc_html__( 'H2', 'prelements'),
					'h3' => esc_html__( 'H3', 'prelements' ),
					'h4' => esc_html__( 'H4', 'prelements' ),
					'h5' => esc_html__( 'H5', 'prelements' ),
					'h6' => esc_html__( 'H6', 'prelements' ),				
					
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'des_section',
			[
				'label' => esc_html__( 'Intro Text', 'prelements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content',
			[
				'type' => Controls_Manager::WYSIWYG,
				'rows' => 10,				
				'placeholder' => esc_html__( 'Type your introtext here', 'prelements' ),
			]
		);
		
		$this->end_controls_section();


		$this->start_controls_section(
			'section_heading_style',
			[
				'label' => esc_html__( 'Sub Heading', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
        $this->add_group_control(
        	\Elementor\Group_Control_Background::get_type(),
        	[
        		'name' => 'subheading_color',
        		'label' => __( 'Gradient Color', 'prelements' ),
        		'types' => [  'classic','gradient'],
        		'selector' => '{{WRAPPER}} .prelements-gradient-heading .title-inner .subtitle',
        	]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subheading_typography',
				'label' => esc_html__( 'Title Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-gradient-heading .title-inner .subtitle',
			]
		);

		$this->add_responsive_control(
            'subheading_margin',
            [
                'label' => esc_html__( 'Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-gradient-heading .title-inner .subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
               
		$this->end_controls_section();


		$this->start_controls_section(
			'gradient_heading_style',
			[
				'label' => esc_html__( 'Gradient Title', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_color',
				'label' => __( 'Gradient Color', 'prelements' ),
				'types' => [  'classic','gradient'],
				'selector' => '{{WRAPPER}} .prelements-gradient-heading .title-inner .title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-gradient-heading .title-inner .title',

			]
		);

		$this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__( 'Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-gradient-heading .title-inner .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
               
		$this->end_controls_section();

			$this->start_controls_section(
			'introtext_heading_style',
			[
				'label' => esc_html__( 'Introtext', 'prelements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'introtext_color',
            [
                'label' => esc_html__( 'Color', 'prelements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .prelements-gradient-heading .description' => 'color: {{VALUE}};',
                ],                
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'introtext_typography',
				'label' => esc_html__( 'Typography', 'prelements' ),
				'selector' => '{{WRAPPER}} .prelements-gradient-heading .description',
			]
		);

		$this->add_responsive_control(
            'introtext_margin',
            [
                'label' => esc_html__( 'Margin', 'prelements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .prelements-gradient-heading .description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
               
		$this->end_controls_section();
	}

	/**
	 * Render rsgallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display(); 
		$sub_title     = ($settings['subtitle']) ? '<span class="subtitle ">'.wp_kses_post($settings['subtitle']).'</span]>' : '';
		$main_title     = ($settings['title']) ? '<'.$settings['title_tag'].' class="title">'.wp_kses_post($settings['title']).'</'.$settings['title_tag'].'>' : '';
    
      ?>
        <div class="prelements-gradient-heading  <?php echo esc_attr($settings['align']);?>">
        	<div class="title-inner">		
	            <?php 
					echo wp_kses_post($sub_title);
					echo wp_kses_post($main_title);
				?>
	        </div>
	        <?php if ($settings['content']) { ?>
            	<div class="description">
            		<?php echo wp_kses_post($settings['content']);?>
            	</div>
        	<?php } ?>
	
        </div>
     
 <?php } } ?>