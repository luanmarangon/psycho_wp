<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTMega_Elementor_Widget_Tabs extends Widget_Base {

    public function get_name() {
        return 'htmega-tab-addons';
    }
    
    public function get_title() {
        return __( 'Tabs', 'htmega-addons' );
    }

    public function get_icon() {
        return 'htmega-icon eicon-tabs';
    }
    public function get_categories() {
        return [ 'htmega-addons' ];
    }

    public function get_style_depends(){
        return [
            'htmega-widgets',
        ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'tab_content',
            [
                'label' => esc_html__( 'Tabs', 'htmega-addons' ),
            ]
        );

            $this->add_control(
                'tab_style',
                [
                    'label' => esc_html__( 'Style', 'htmega-addons' ),
                    'type' => 'htmega-preset-select',
                    'default' => '1',
                    'options' => [
                        '1' => __( 'Style One', 'htmega-addons' ),
                        '2' => __( 'Style Two', 'htmega-addons' ),
                        '3' => __( 'Style Three', 'htmega-addons' ),
                        '4' => __( 'Style Four', 'htmega-addons' ),
                        '5' => __( 'Style Five', 'htmega-addons' ),
                    ],
                ]
            );


            $repeater = new Repeater();

            $repeater->start_controls_tabs('tab_content_item_area_tabs');

                $repeater->start_controls_tab(
                    'tab_content_item_area',
                    [
                        'label' => esc_html__( 'Content', 'htmega-addons' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'tab_title',
                        [
                            'label'   => esc_html__( 'Title', 'htmega-addons' ),
                            'type'    => Controls_Manager::TEXT,
                            'default' => esc_html__( 'Tab #1', 'htmega-addons' ),
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon',
                        [
                            'label'   => esc_html__( 'Icon', 'htmega-addons' ),
                            'type'    => Controls_Manager::ICONS,
                        ]
                    );

                    $repeater->add_control(
                        'content_source',
                        [
                            'label'   => esc_html__( 'Select Content Source', 'htmega-addons' ),
                            'type'    => Controls_Manager::SELECT,
                            'default' => 'custom',
                            'options' => [
                                'custom'    => esc_html__( 'Custom', 'htmega-addons' ),
                                "elementor" => esc_html__( 'Elementor Template', 'htmega-addons' ),
                            ],
                        ]
                    );

                     $repeater->add_control(
                        'template_id',
                        [
                            'label'       => __( 'Content', 'htmega-addons' ),
                            'type'        => Controls_Manager::SELECT,
                            'default'     => '0',
                            'options'     => htmega_elementor_template(),
                            'condition'   => [
                                'content_source' => "elementor"
                            ],
                        ]
                    );

                     $repeater->add_control(
                        'custom_content',
                        [
                            'label' => esc_html__( 'Content', 'htmega-addons' ),
                            'type' => Controls_Manager::WYSIWYG,
                            'title' => __( 'Content', 'htmega-addons' ),
                            'show_label' => false,
                            'condition' => [
                                'content_source' =>'custom',
                            ],
                        ]
                    );

                $repeater->end_controls_tab();// Tab Content area end

                // Style area start
                $repeater->start_controls_tab(
                    'tab_item_style_area',
                    [
                        'label' => esc_html__( 'Style', 'htmega-addons' ),
                    ]
                );
                    
                    $repeater->add_control(
                        'tab_title_color',
                        [
                            'label'     => esc_html__( 'Title Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a{{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                            ],
                        ]
                    );
                    
                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'title_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a{{CURRENT_ITEM}}',
                        ]
                    );

                    $repeater->add_control(
                        'tab_title_active_color',
                        [
                            'label'     => esc_html__( 'Title Active Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active{{CURRENT_ITEM}}' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $repeater->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'title_active_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a.htb-active{{CURRENT_ITEM}}',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon_color',
                        [
                            'label'     => esc_html__( 'Icon Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a{{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htmega-tab-nav a{{CURRENT_ITEM}} svg path' => 'fill: {{VALUE}}',
                            ],
                            'condition' => [
                                'tab_icon[value]!' => '',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $repeater->add_control(
                        'tab_icon_active_color',
                        [
                            'label'     => esc_html__( 'Active Icon Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active{{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active{{CURRENT_ITEM}} svg path' => 'fill: {{VALUE}}',
                            ],
                            'condition' => [
                                'tab_icon[value]!' => '',
                            ]
                        ]
                    );

                    

                $repeater->end_controls_tab(); // Style area end

            $repeater->end_controls_tabs();

            $this->add_control(
                'htmega_tabs_list',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'fields'  => $repeater->get_controls(),
                    'default' => [
                        [
                            'tab_title' => esc_html__( 'Title #1', 'htmega-addons' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','htmega-addons' ),
                        ],
                        [
                            'tab_title' => esc_html__( 'Title #2', 'htmega-addons' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','htmega-addons' ),
                        ],
                        [
                            'tab_title' => esc_html__( 'Title #3', 'htmega-addons' ),
                            'custom_content' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolo magna aliqua. Ut enim ad minim veniam, quis nostrud exerci ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in repre in voluptate.','htmega-addons' ),
                        ],
                    ],
                    'title_field' => '{{{ tab_title }}}',
                ]
            );
            
        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'tab_menu_style_section',
            [
                'label' => esc_html__( 'Tab Menu', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'tab_menu_style_area',
                [
                    'label' => esc_html__( 'Tab Area Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                ]
            );

            $this->add_responsive_control(
                'tab_menu_area_width',
                [
                    'label' => esc_html__( 'Tab Menu Width (%)', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'range' => [

                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 25,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-nav' => 'max-width: {{SIZE}}{{UNIT}}; flex: 0 0 {{SIZE}}{{UNIT}};',
                    ],'condition' =>[
                        'tab_style' => array( '5' ),
                    ]
                ]
            );

            $this->add_responsive_control(
                'tab_content_area_width',
                [
                    'label' => esc_html__( 'Tab Content Width (%)', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ '%' ],
                    'range' => [
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 75,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-content-area' => 'max-width: {{SIZE}}%; flex: 0 0 {{SIZE}}%;',
                    ],'condition' =>[
                        'tab_style' => array( '5' ),
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'tab_menu_area_background',
                    'label' => esc_html__( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}}  .htmega-tab-nav',
                ]
            );
            
            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'tab_menu_area_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-tab-nav',
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'tab_menu_area_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-nav' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'tab_menu_area_padding',
                [
                    'label' => esc_html__( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'tab_menu_area_margin',
                [
                    'label' => esc_html__( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'tab_menu_Separator',
                [
                    'label' => esc_html__( 'Separator Area', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                    'condition' => [
                        'tab_style' =>'5',
                    ],
                ]
            );

            $this->add_control(
                'tab_menu_area_separator',
                [
                    'label'   => __( 'Separator', 'htmega-addons' ),
                    'type'    => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'return_value' => 'yes',
                    'condition' => [
                        'tab_style' =>'5',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'tab_menu_separator_color',
                [
                    'label'     => esc_html__( 'Separator Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-content-area::before' => 'background: {{VALUE}}',
                    ],
                    'default' => '#eaeaea',
                    'condition' =>[
                        'tab_menu_area_separator' => 'yes',
                        'tab_style' =>'5',
                    ]
                ]
            );

            $this->add_control(
                'tab_menu_area_separator_height',
                [
                    'label' => esc_html__( 'Separator Height', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => '%',
                        'size' => 90,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-content-area::before' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'tab_menu_area_separator' => 'yes',
                        'tab_style' =>'5',
                    ]
                ]
            );

            $this->add_control(
                'tab_menu_area_separator_width',
                [
                    'label' => esc_html__( 'Separator Width', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 2,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-content-area::before' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'tab_menu_area_separator' => 'yes',
                        'tab_style' =>'5',
                    ]
                ]
            );


            $this->add_control(
                'tab_menu_area_separator_position',
                [
                    'label' => esc_html__( 'Separator Position', 'htmega-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => -100,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 0,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-style-5 .htmega-tab-content-area::before' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'tab_menu_area_separator' => 'yes',
                        'tab_style' =>'5',
                    ]
                ]
            );

            

            $this->add_control(
                'tab_menu_style',
                [
                    'label' => esc_html__( 'Tab Manu Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs('tab_menu_style_tabs');

                $this->start_controls_tab(
                    'tab_menu_style_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'htmega-addons' ),
                    ]
                );

                    $this->add_responsive_control(
                        'tab_menu_align',
                        [
                            'label'   => __( 'Alignment', 'htmega-addons' ),
                            'type'    => Controls_Manager::CHOOSE,
                            'options' => [
                                'start'    => [
                                    'title' => __( 'Left', 'htmega-addons' ),
                                    'icon'  => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => __( 'Center', 'htmega-addons' ),
                                    'icon'  => 'eicon-text-align-center',
                                ],
                                'end' => [
                                    'title' => __( 'Right', 'htmega-addons' ),
                                    'icon'  => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav'   => 'justify-content: {{VALUE}} !important;',
                                '{{WRAPPER}} .htmega-tab-nav a'   => 'justify-content: {{VALUE}}',
                            ],
                            'default' =>'center',
                            'separator' => 'after',
                        ]
                    );

                    $this->add_control(
                        'tab_menu_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'tab_menu_typography',
                            'label' => esc_html__( 'Typography', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a:not(i)',
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'tab_menu_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_menu_padding',
                        [
                            'label' => esc_html__( 'Padding', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_menu_margin',
                        [
                            'label' => esc_html__( 'Margin', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tab_menu_border',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_menu_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal style 

                // Active tab style
                $this->start_controls_tab(
                    'tab_menu_style_active_tab',
                    [
                        'label' => esc_html__( 'Active', 'htmega-addons' ),
                    ]
                );
                    
                    $this->add_control(
                        'tab_menu_active_color',
                        [
                            'label'     => esc_html__( 'Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htmega-tab-area .htmega-tab-menu-style-2 a::before' => 'background: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'tab_menu_active_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a.htb-active',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tab_menu_active_border',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a.htb-active',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_menu_active_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_control(
                'tab_menu_icon_box_style',
                [
                    'label' => esc_html__( 'Tab Icon Box Style', 'htmega-addons' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->start_controls_tabs('icon_style_tabs');
                // Button Normal Tab Start
                $this->start_controls_tab(
                    'tab_icon_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'htmega-addons' ),
                    ]
                );

                    $this->add_control(
                        'tab_icon_global_color',
                        [
                            'label'     => esc_html__( 'Icon Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htmega-tab-nav a svg path' => 'fill: {{VALUE}}',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_control(
                        'tab_icon_global_size',
                        [
                            'label' => esc_html__( 'Icon Size', 'htmega-addons' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => 14,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );
                
                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'tab_icon_background',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a i, {{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tab_icon_border',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a i, {{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_icon_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a i, {{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'tab_icon_width_size',
                        [
                            'label' => esc_html__( 'Icon Width', 'htmega-addons' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => 26,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a i, {{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_control(
                        'tab_icon_height_size',
                        [
                            'label' => esc_html__( 'Icon Height', 'htmega-addons' ),
                            'type'  => Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'size' => 26,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a i, {{WRAPPER}} .htmega-tab-nav a .htmega-tab-svg-icon' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal style 
            
                // Active tab style
                $this->start_controls_tab(
                    'tab_icon_Active_tab',
                    [
                        'label' => esc_html__( 'Active', 'htmega-addons' ),
                    ]
                );
                
                    $this->add_control(
                        'tab_icon_global_color_active',
                        [
                            'label'     => esc_html__( 'Icon Color', 'htmega-addons' ),
                            'type'      => Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active i' => 'color: {{VALUE}}',
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active .htmega-tab-svg-icon svg path' => 'fill: {{VALUE}}',
                            ],
                            'separator' => 'before',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'tab_icon_background_active',
                            'label' => esc_html__( 'Background', 'htmega-addons' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a.htb-active i, {{WRAPPER}} .htmega-tab-nav a.htb-active .htmega-tab-svg-icon',
                        ]
                    );


                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'tab_icon_border_active',
                            'label' => esc_html__( 'Border', 'htmega-addons' ),
                            'selector' => '{{WRAPPER}} .htmega-tab-nav a.htb-active i, {{WRAPPER}} .htmega-tab-nav a.htb-active .htmega-tab-svg-icon',
                        ]
                    );

                    $this->add_responsive_control(
                        'tab_icon_border_radius_active',
                        [
                            'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .htmega-tab-nav a.htb-active i, {{WRAPPER}} .htmega-tab-nav a.htb-active .htmega-tab-svg-icon' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab();
            
            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'tab_style_content_section',
            [
                'label' => esc_html__( 'Content', 'htmega-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'tab_content_color',
                [
                    'label'     => esc_html__( 'Color', 'htmega-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-tab-content-area .htmega-tab-content p' => 'color: {{VALUE}}',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'tab_content_typography',
                    'selector' => '{{WRAPPER}} .htmega-tab-content-area .htmega-tab-content p',
                ]
            );
            
            $this->add_group_control(
                Group_Control_Background::get_type(),
                [
                    'name' => 'tab_content_background',
                    'label' => esc_html__( 'Background', 'htmega-addons' ),
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .htmega-single-tab',
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name' => 'tab_content_border',
                    'label' => esc_html__( 'Border', 'htmega-addons' ),
                    'selector' => '{{WRAPPER}} .htmega-single-tab',
                ]
            );

            $this->add_responsive_control(
                'tab_content_border_radius',
                [
                    'label' => esc_html__( 'Border Radius', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-tab' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                    ],
                ]
            );

            $this->add_responsive_control(
                'tab_content_padding',
                [
                    'label' => esc_html__( 'Padding', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-tab' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                    'separator' => 'before',
                ]
            );

            $this->add_responsive_control(
                'tab_content_margin',
                [
                    'label' => esc_html__( 'Margin', 'htmega-addons' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .htmega-single-tab' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
    }

    protected function render( $instance = [] ) {

        $settings = $this->get_settings_for_display();;
        $this->add_render_attribute( 'htmega_tab_attr', 'class', 'htmega-tab-area' );
        $this->add_render_attribute( 'htmega_tab_attr', 'class', 'htmega-tab-style-'.$settings['tab_style'] );

        $this->add_render_attribute( 'htmega_tab_menu_attr', 'class', 'htmega-tab-nav htb-nav');
        $this->add_render_attribute( 'htmega_tab_menu_attr', 'role', 'tablist');
        $this->add_render_attribute( 'htmega_tab_menu_attr', 'class', 'htmega-tab-menu-style-'.$settings['tab_style'] );
        $id = $this->get_id();
       
        ?>
            <div <?php echo $this->get_render_attribute_string( 'htmega_tab_attr' ); ?>>

                <div <?php echo $this->get_render_attribute_string( 'htmega_tab_menu_attr' ); ?>>
                    <?php
                        $i=0;
                        foreach ( $settings['htmega_tabs_list'] as $item ) {
                            $i++;
                            $tabbuttontxt = $item['tab_title'];
                            if( $i == 1 ){ $active_tab = 'htb-active htb-show'; } else{ $active_tab = ''; }
  
                            printf( '<a class="htb-nav-link %1$s %4$s" href="#htmegatab-%2$s" data-toggle="htbtab" role="tab">%3$s</a>',
                                esc_attr( $active_tab ), 
                                esc_attr( $id.$i ), 
                                ($item['tab_icon']['library'] == "svg") ? 
                                    '<div class="htmega-tab-svg-icon">' . HTMega_Icon_manager::render_icon( $item['tab_icon'], [ 'aria-hidden' => 'true' ] ) . '</div>' .wp_kses_post( $item['tab_title']) : 
                                    HTMega_Icon_manager::render_icon( $item['tab_icon'], [ 'aria-hidden' => 'true' ] ). wp_kses_post( $item['tab_title'] ), 
                                'elementor-repeater-item-'.esc_attr( $item['_id'])
                            );
                        }
                    ?>
                </div>

                <div class="htmega-tab-content-area htb-tab-content">
                    <?php
                        $i=0;
                        foreach ( $settings['htmega_tabs_list'] as $item ) {
                            $i++;
                            if( $i == 1 ){ $active_tab = 'htb-active htb-show'; } else{ $active_tab = ''; }

                            printf('<div class="htmega-single-tab htb-tab-pane htb-fade %1$s %4$s" id="htmegatab-%2$s" role="tabpanel"><div class="htmega-tab-content">%3$s</div></div>', 
                                esc_attr( $active_tab ), 
                                esc_attr( $id.$i ), 
                                ($item['content_source'] == 'custom' && !empty( $item['custom_content'])) ? 
                                    wp_kses_post( $item['custom_content'] ) : 
                                    Plugin::instance()->frontend->get_builder_content_for_display( $item['template_id'] ),
                                'elementor-repeater-item-'.esc_attr( $item['_id']) 
                            );
                        }
                    ?>
                </div>

            </div>

        <?php
    }
}