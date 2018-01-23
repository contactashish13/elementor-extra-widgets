<?php
/**
 * Pricing Table widget for Elementor builder
 *
 * @link       https://themeisle.com
 * @since      1.0.0
 *
 * @package    ThemeIsle\ElementorExtraWidgets
 */
namespace ThemeIsle\ElementorExtraWidgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // End if().

/**
 * Class Pricing_Table
 *
 * @package ThemeIsle\ElementorExtraWidgets
 */
class Pricing_Table extends \Elementor\Widget_Base {

	/**
	 * Widget title.
	 *
	 * @return string
	 */
	public function get_title() {
		return __( 'Pricing Table', 'textdomain' );
	}

	/**
	 * Widget icon.
	 *
	 * @return string
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Widget name.
	 *
	 * @return string
	 */
	public function get_name() {
		return 'obfx-pricing-table';
	}

	/**
	 * Widget Category
	 *
	 * @return array
	 */
	public function get_categories() {
		return [ 'obfx-elementor-widgets' ];
	}

	/**
	 * Register Elementor Controls
	 */
	protected function _register_controls() {
		$this->plan_title_section();

		$this->plan_price_tag_section();

		$this->features_section();

		$this->button_section();

		$this->header_style_section();

		$this->price_tag_style_section();

		$this->features_style_section();

		$this->button_style_section();
	}

	/**
	 * Content > Title section.
	 */
	private function plan_title_section() {
		$this->start_controls_section(
			'section_title',
			[
				'label' => __( 'Plan Title', 'textdomain' ),
			]
		);

		$this->add_control(
			'title',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Title', 'textdomain' ),
				'placeholder' => __( 'Title', 'textdomain' ),
				'default'     => __( 'Pricing Plan', 'textdomain' ),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => __( 'Title HTML tag', 'textdomain' ),
				'default' => 'h3',
				'options' => [
					'h1' => __( 'h1', 'textdomain' ),
					'h2' => __( 'h2', 'textdomain' ),
					'h3' => __( 'h3', 'textdomain' ),
					'h4' => __( 'h4', 'textdomain' ),
					'h5' => __( 'h5', 'textdomain' ),
					'h6' => __( 'h6', 'textdomain' ),
					'p'  => __( 'p', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Subtitle', 'textdomain' ),
				'placeholder' => __( 'Subtitle', 'textdomain' ),
				'default'     => __( 'Description', 'textdomain' ),
			]
		);

		$this->add_control(
			'subtitle_tag',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => __( 'Subtitle HTML Tag', 'textdomain' ),
				'default' => 'p',
				'options' => [
					'h1' => __( 'h1', 'textdomain' ),
					'h2' => __( 'h2', 'textdomain' ),
					'h3' => __( 'h3', 'textdomain' ),
					'h4' => __( 'h4', 'textdomain' ),
					'h5' => __( 'h5', 'textdomain' ),
					'h6' => __( 'h6', 'textdomain' ),
					'p'  => __( 'p', 'textdomain' ),
				],
			]
		);
		$this->end_controls_section(); // end section-title
	}

	/**
	 * Content > Price Tag section.
	 */
	private function plan_price_tag_section() {
		$this->start_controls_section(
			'section_price_tag',
			[
				'label' => __( 'Price Tag', 'textdomain' ),
			]
		);

		$this->add_control(
			'price_tag_text',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Price', 'textdomain' ),
				'placeholder' => __( 'Price', 'textdomain' ),
				'default'     => __( '50', 'textdomain' ),
				'separator'   => 'after',
			]
		);

		$this->add_control(
			'price_tag_currency',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Currency', 'textdomain' ),
				'placeholder' => __( 'Currency', 'textdomain' ),
				'default'     => __( '$', 'textdomain' ),
			]
		);

		$this->add_control(
			'price_tag_currency_position',
			[
				'type'    => \Elementor\Controls_Manager::SELECT,
				'label'   => __( 'Currency Position', 'textdomain' ),
				'default' => 'left',
				'options' => [
					'left'  => __( 'Before', 'textdomain' ),
					'right' => __( 'After', 'textdomain' ),
				],
			]
		);

		$this->add_control(
			'price_tag_period',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Period', 'textdomain' ),
				'placeholder' => __( '/month', 'textdomain' ),
				'default'     => __( '/month', 'textdomain' ),
				'separator'   => 'before',
			]
		);
		$this->end_controls_section(); // end section-price-tag
	}

	/**
	 * Content > Features section.
	 */
	private function features_section() {
		$this->start_controls_section(
			'section_features',
			[
				'label' => __( 'Features', 'textdomain' ),
			]
		);

		$this->add_control(
			'feature_list',
			[
				'label'       => __( 'Plan Features', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'default'     => [
					[
						'accent' => __( 'First', 'textdomain' ),
						'text'   => __( 'Feature', 'textdomain' ),
					],
					[
						'accent' => __( 'Second', 'textdomain' ),
						'text'   => __( 'Feature', 'textdomain' ),
					],
					[
						'accent' => __( 'Third', 'textdomain' ),
						'text'   => __( 'Feature', 'textdomain' ),
					],
				],
				'fields'      => [
					[
						'type'        => \Elementor\Controls_Manager::TEXT,
						'name'        => 'accent',
						'label'       => __( 'Accented Text', 'textdomain' ),
						'description' => __( 'Appears before feature text', 'textdomain' ),
						'label_block' => true,
						'default'     => __( 'Accent', 'textdomain' ),
					],
					[
						'type'        => \Elementor\Controls_Manager::TEXT,
						'name'        => 'text',
						'label'       => __( 'Text', 'textdomain' ),
						'label_block' => true,
						'placeholder' => __( 'Plan Features', 'textdomain' ),
						'default'     => __( 'Feature', 'textdomain' ),
					],
					[
						'type'        => \Elementor\Controls_Manager::ICON,
						'name'        => 'feature_icon',
						'label'       => __( 'Icon', 'textdomain' ),
						'label_block' => true,
						'default'     => 'fa fa-star',
					],
				],
				'title_field' => '{{ accent + " " + text }}',
			]
		);

		$this->add_responsive_control(
			'features_align',
			[
				'label'     => __( 'Alignment', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'    => [
						'title' => __( 'Left', 'textdomain' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'  => [
						'title' => __( 'Center', 'textdomain' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'   => [
						'title' => __( 'Right', 'textdomain' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'textdomain' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'default'   => 'center',
				'selectors' => [
					'{{WRAPPER}} .obfx-feature-list' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section(); // end section-features
	}

	/**
	 * Content > Button section.
	 */
	private function button_section() {
		$this->start_controls_section(
			'section_button',
			[
				'label' => __( 'Button', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_text',
			[
				'type'        => \Elementor\Controls_Manager::TEXT,
				'label'       => __( 'Text', 'textdomain' ),
				'placeholder' => __( 'Buy Now', 'textdomain' ),
				'default'     => __( 'Buy Now', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_link',
			[
				'type'        => \Elementor\Controls_Manager::URL,
				'label'       => __( 'Link', 'textdomain' ),
				'placeholder' => __( 'https://example.com', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_icon',
			[
				'type'        => \Elementor\Controls_Manager::ICON,
				'label'       => __( 'Icon', 'textdomain' ),
				'label_block' => true,
				'default'     => '',
			]
		);

		$this->add_control(
			'button_icon_align',
			[
				'type'      => \Elementor\Controls_Manager::SELECT,
				'label'     => __( 'Icon Position', 'textdomain' ),
				'default'   => 'left',
				'options'   => [
					'left'  => __( 'Before', 'textdomain' ),
					'right' => __( 'After', 'textdomain' ),
				],
				'condition' => [
					'button_icon!' => '',
				],
			]
		);

		$this->add_control(
			'button_icon_indent',
			[
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'label'     => __( 'Icon Spacing', 'textdomain' ),
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'condition' => [
					'button_icon!' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .obfx-button-icon-align-right i' => 'margin-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .obfx-button-icon-align-left i'  => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // end section_button
	}

	/**
	 * Style > Header section.
	 */
	private function header_style_section() {
		$this->start_controls_section(
			'section_header_style',
			[
				'label' => __( 'Header', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'header_padding',
			[
				'label'      => __( 'Header Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .obfx-title-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'plan_title_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Title Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#464959',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'plan_title_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-pricing-table-title',
			]
		);

		$this->add_control(
			'plan_subtitle_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Subtitle Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#60647d',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'plan_subtitle_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-pricing-table-subtitle',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'heading_section_bg',
				'label'    => __( 'Section Background', 'textdomain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .obfx-title-wrapper',
			]
		);
		$this->end_controls_section(); // end section_header_style
	}

	/**
	 * Style > Price Tag section.
	 */
	private function price_tag_style_section() {
		$this->start_controls_section(
			'section_price_box',
			[
				'label' => __( 'Price Tag', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'price_box_padding',
			[
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Price Box Padding', 'textdomain' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .obfx-price-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'pricing_section_bg',
				'label'    => __( 'Section Background', 'textdomain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .obfx-price-wrapper',
			]
		);

		$this->add_control(
			'price_tag_heading_currency',
			[
				'label'     => __( 'Currency', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'currency_color',
			[
				'label'     => __( 'Currency Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#60647d',
				'selectors' => [
					'{{WRAPPER}} .obfx-price-currency' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'currency_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-price-currency',
			]
		);

		$this->add_control(
			'price_tag_heading_price',
			[
				'label'     => __( 'Price', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'price_text_color',
			[
				'label'     => __( 'Price Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#60647d',
				'selectors' => [
					'{{WRAPPER}} .obfx-price' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'price_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-price',
			]
		);

		$this->add_control(
			'price_tag_heading_period',
			[
				'label'     => __( 'Period', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'period_color',
			[
				'label'     => __( 'Period Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#60647d',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-period' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'price_sub_text_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-pricing-period',
			]
		);
		$this->end_controls_section(); // end pricing-section
	}

	/**
	 * Style > Features section.
	 */
	private function features_style_section() {
		$this->start_controls_section(
			'section_features_style',
			[
				'label' => __( 'Features', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'features_section_bg',
				'label'    => __( 'Section Background', 'textdomain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .obfx-feature-list',
			]
		);

		$this->add_responsive_control(
			'features_box_padding',
			[
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'label'      => __( 'Features List Padding', 'textdomain' ),
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .obfx-feature-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'features_accented_heading',
			[
				'label'     => __( 'Accented', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'features_accented_text_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Accented Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#60647d',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-accented' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'features_accented_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-pricing-table-accented',
			]
		);

		$this->add_control(
			'features_features_heading',
			[
				'label'     => __( 'Features', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'features_text_color',
			[
				'label'     => __( 'Features Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#b1b3c0',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-feature' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'features_features_typography',
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .obfx-pricing-table-feature',
			]
		);

		$this->add_control(
			'features_icons_heading',
			[
				'label'     => __( 'Icons', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'features_icon_color',
			[
				'label'     => __( 'Icon Color', 'textdomain' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#b1b3c0',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-feature-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'features_icon_indent',
			[
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'label'     => __( 'Icon Spacing', 'textdomain' ),
				'default'   => [
					'size' => 5,
				],
				'range'     => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} i.obfx-pricing-table-feature-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // end section_features_style
	}

	/**
	 * Style > Button section.
	 */
	private function button_style_section() {
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'Button', 'textdomain' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(), [
				'name'     => 'button_section_bg',
				'label'    => __( 'Section Background', 'textdomain' ),
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .obfx-pricing-table-button-wrapper',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'typography',
				'label'    => __( 'Typography', 'textdomain' ),
				'scheme'   => \Elementor\Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .obfx-pricing-table-button-wrapper',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => __( 'Border Radius', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .obfx-pricing-table-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label'      => __( 'Padding', 'textdomain' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .obfx-pricing-table-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Add the tabbed control.
		$this->tabbed_button_controls();

		$this->end_controls_section(); // end section_button_style
	}

	/**
	 * Tabs for the Style > Button section.
	 */
	private function tabbed_button_controls() {
		$this->start_controls_tabs( 'tabs_background' );

		$this->start_controls_tab(
			'tab_background_normal',
			[
				'label' => __( 'Normal', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-button' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_bg_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#93c64f',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'button_box_shadow',
				'selector'  => '{{WRAPPER}} .obfx-pricing-table-button',
				'separator' => '',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_background_hover',
			[
				'label' => __( 'Hover', 'textdomain' ),
			]
		);

		$this->add_control(
			'button_hover_text_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Text Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-button:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'button_hover_bg_color',
			[
				'type'      => \Elementor\Controls_Manager::COLOR,
				'label'     => __( 'Background Color', 'textdomain' ),
				'scheme'    => [
					'type'  => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'default'   => '#74c600',
				'selectors' => [
					'{{WRAPPER}} .obfx-pricing-table-button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'button_hover_box_shadow',
				'selector'  => '{{WRAPPER}} .obfx-pricing-table-button:hover',
				'separator' => '',
			]
		);

		$this->add_control(
			'background_hover_transition',
			[
				'label'       => __( 'Transition Duration', 'textdomain' ),
				'type'        => \Elementor\Controls_Manager::SLIDER,
				'default'     => [
					'size' => 0.3,
				],
				'range'       => [
					'px' => [
						'max'  => 3,
						'step' => 0.1,
					],
				],
				'render_type' => 'ui',
				'selectors'   => [
					'{{WRAPPER}} .obfx-pricing-table-button' => 'transition: all {{SIZE}}s ease;',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
	}

	/**
	 * Render function to output the pricing table.
	 */
	protected function render() {
		$settings = $this->get_settings();

		$this->maybe_load_widget_style();

		$this->add_render_attribute( 'title', 'class', 'obfx-pricing-table-title' );
		$this->add_render_attribute( 'subtitle', 'class', 'obfx-pricing-table-subtitle' );
		$this->add_render_attribute( 'button', 'class', 'obfx-pricing-table-button' );
		$this->add_render_attribute( 'button_icon', 'class', $settings['button_icon'] );
		$this->add_render_attribute( 'button_icon_align', 'class', 'obfx-button-icon-align-' . $settings['button_icon_align'] );
		if ( ! empty( $settings['button_link']['url'] ) ) {
			$this->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

			if ( ! empty( $settings['button_link']['is_external'] ) ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}
			if ( ! empty( $settings['button_link']['nofollow'] ) ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}
		}

		$output = '';

		$output .= '<div class="obfx-pricing-table-wrapper">';

		if ( ! empty( $settings['title'] ) || ! empty( $settings['subtitle'] ) ) {
			$output .= '<div class="obfx-title-wrapper">';
			if ( ! empty( $settings['title'] ) ) {
				// Start of title tag.
				$output .= '<' . esc_html( $settings['title_tag'] ) . ' ' . $this->get_render_attribute_string( 'title' ) . '>';

				// Title string.
				$output .= esc_html( $settings['title'] );

				// End of title tag.
				$output .= '</' . esc_html( $settings['title_tag'] ) . '>';
			}
			if ( ! empty( $settings['subtitle'] ) ) {
				// Start of subtitle tag.
				$output .= '<' . esc_html( $settings['subtitle_tag'] ) . ' ' . $this->get_render_attribute_string( 'subtitle' ) . '>';

				// Subtitle string.
				$output .= esc_html( $settings['subtitle'] );

				// End of subtitle tag.
				$output .= '</' . esc_html( $settings['subtitle_tag'] ) . '>';

			}

			$output .= '</div> <!-- /.obfx-title-wrapper -->';
		}

		if ( ! empty( $settings['price_tag_text'] ) || ! empty( $settings['price_tag_currency'] ) || ! empty( $settings['price_tag_period'] ) ) {
			$output .= '<div class="obfx-price-wrapper">';

			if ( ! empty( $settings['price_tag_currency'] ) && ( $settings['price_tag_currency_position'] == 'left' ) ) {
				$output .= '<span class="obfx-price-currency">' . esc_html( $settings['price_tag_currency'] ) . '</span>';
			}

			if ( ( isset( $settings['price_tag_text'] ) && $settings['price_tag_text'] === '0' ) || ! empty( $settings['price_tag_text'] ) ) {
				$output .= '<span class="obfx-price">' . esc_html( $settings['price_tag_text'] ) . '</span>';
			}

			if ( ! empty( $settings['price_tag_currency'] ) && ( $settings['price_tag_currency_position'] == 'right' ) ) {
				$output .= '<span class="obfx-price-currency">' . esc_html( $settings['price_tag_currency'] ) . '</span>';
			}

			if ( ! empty( $settings['price_tag_period'] ) ) {
				$output .= '<span class="obfx-pricing-period">' . esc_html( $settings['price_tag_period'] ) . '</span>';
			}

			$output .= '</div> <!-- /.obfx-price-wrapper -->';
		}

		if ( count( $settings['feature_list'] ) ) {
			$output .= '<ul class="obfx-feature-list">';
			foreach ( $settings['feature_list'] as $feature ) {
				$output .= '<li>';
				if ( ! empty( $feature['feature_icon'] ) ) {
					$output .= '<i class="obfx-pricing-table-feature-icon ' . esc_attr( $feature['feature_icon'] ) . '"></i>';
				}
				if ( ! empty( $feature['accent'] ) ) {
					$output .= '<span class="obfx-pricing-table-accented">' . esc_html( $feature['accent'] ) . '</span>';
					$output .= ' ';
				}
				if ( ! empty( $feature['text'] ) ) {
					$output .= '<span class="obfx-pricing-table-feature">' . esc_html( $feature['text'] ) . '</span>';
				}
				$output .= '</li>';
			}
			$output .= '</ul>';
		}

		if ( ! empty( $settings['button_text'] ) ) {
			$output .= '<div class="obfx-pricing-table-button-wrapper">';

			$output .= '<a ' . $this->get_render_attribute_string( 'button' ) . '>';

			if ( ! empty( $settings['button_icon'] ) && ( $settings['button_icon_align'] == 'left' ) ) {
				$output .= '<span ' . $this->get_render_attribute_string( 'button_icon_align' ) . ' >';
				$output .= '<i ' . $this->get_render_attribute_string( 'button_icon' ) . '></i>';
			}

			$output .= '<span class="elementor-button-text">' . esc_html( $settings['button_text'] ) . '</span>';

			if ( ! empty( $settings['button_icon'] ) && ( $settings['button_icon_align'] == 'right' ) ) {
				$output .= '<span ' . $this->get_render_attribute_string( 'button_icon_align' ) . ' >';
				$output .= '<i ' . $this->get_render_attribute_string( 'button_icon' ) . '></i>';
			}

			$output .= '</a>';
			$output .= '</div> <!-- /.obfx-pricing-table-button-wrapper -->';

		}
		$output .= '</div> <!-- /.obfx-pricing-table-wrapper -->';

		echo $output;
	}

	/**
	 * Load the widget style dynamically if it is a widget preview
	 * or enqueue style and scripts if not
	 *
	 * This way we are sure that the assets files are loaded only when this block is present in page.
	 */
	protected function maybe_load_widget_style() {
		if ( \Elementor\Plugin::$instance->editor->is_edit_mode() === true && apply_filters( 'themeisle_content_forms_register_default_style', true ) ) { ?>
			<style>
				<?php echo file_get_contents( plugin_dir_path( dirname( dirname(__FILE__ ) ) ) . 'css/public.css' ) ?>
			</style>
			<?php
		} else {
			wp_enqueue_style('eaw-elementor');
		}
	}
}

