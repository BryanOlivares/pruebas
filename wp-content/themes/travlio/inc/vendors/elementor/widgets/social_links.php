<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Travlio_Elementor_Social_Links extends Widget_Base {

    public function get_name() {
        return 'apus_element_social_links';
    }

    public function get_title() {
        return esc_html__( 'Apus Social Links', 'travlio' );
    }

    public function get_icon() {
        return 'fa fa-share-square-o';
    }

    public function get_categories() {
        return [ 'travlio-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'travlio' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'travlio' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title', [
                'label' => esc_html__( 'Social Title', 'travlio' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Social Title' , 'travlio' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'social_icon',
            [
                'label' => esc_html__( 'Icon', 'travlio' ),
                'type' => Controls_Manager::ICONS,
                'fa4compatibility' => 'social',
                'label_block' => true,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-brands',
                ],
                'recommended' => [
                    'fa-brands' => [
                        'android',
                        'apple',
                        'behance',
                        'bitbucket',
                        'codepen',
                        'delicious',
                        'deviantart',
                        'digg',
                        'dribbble',
                        'elementor',
                        'facebook',
                        'flickr',
                        'foursquare',
                        'free-code-camp',
                        'github',
                        'gitlab',
                        'globe',
                        'google-plus',
                        'houzz',
                        'instagram',
                        'jsfiddle',
                        'linkedin',
                        'medium',
                        'meetup',
                        'mixcloud',
                        'odnoklassniki',
                        'pinterest',
                        'product-hunt',
                        'reddit',
                        'shopping-cart',
                        'skype',
                        'slideshare',
                        'snapchat',
                        'soundcloud',
                        'spotify',
                        'stack-overflow',
                        'steam',
                        'stumbleupon',
                        'telegram',
                        'thumb-tack',
                        'tripadvisor',
                        'tumblr',
                        'twitch',
                        'twitter',
                        'viber',
                        'vimeo',
                        'vk',
                        'weibo',
                        'weixin',
                        'whatsapp',
                        'wordpress',
                        'xing',
                        'yelp',
                        'youtube',
                        '500px',
                    ],
                    'fa-solid' => [
                        'envelope',
                        'link',
                        'rss',
                    ],
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'travlio' ),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => [
                    'is_external' => 'true',
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'travlio' ),
            ]
        );

        $this->add_control(
            'social_icon_list',
            [
                'label' => esc_html__( 'Social Icons', 'travlio' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'social_icon' => [
                            'value' => 'fab fa-facebook',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-twitter',
                            'library' => 'fa-brands',
                        ],
                    ],
                    [
                        'social_icon' => [
                            'value' => 'fab fa-google-plus',
                            'library' => 'fa-brands',
                        ],
                    ],
                ],
                'title_field' => '<# var migrated = "undefined" !== typeof __fa4_migrated, social = ( "undefined" === typeof social ) ? false : social; #>{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, social, true, migrated, true ) }}}',
            ]
        );
        
        $this->add_control(
            'style',
            [
                'label' => esc_html__( 'Style', 'travlio' ),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '' => esc_html__('Normal', 'travlio'),
                ),
                'default' => ''
            ]
        );

        $this->add_control(
            'el_class',
            [
                'label'         => esc_html__( 'Extra class name', 'travlio' ),
                'type'          => Controls_Manager::TEXT,
                'placeholder'   => esc_html__( 'If you wish to style particular content element differently, please add a class name to this field and refer to it in your custom CSS file.', 'travlio' ),
            ]
        );

        $this->add_responsive_control(
            'alignment',
            [
                'label' => esc_html__( 'Alignment', 'travlio' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'travlio' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'travlio' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'travlio' ),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__( 'Justified', 'travlio' ),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .social' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__( 'Title', 'travlio' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'travlio' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    // Stronger selector to avoid section style from overwriting
                    '{{WRAPPER}} .widget-title ' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label' => esc_html__( 'Title Typography', 'travlio' ),
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .widget-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__( 'Social', 'travlio' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'style_tabs'
        );

            $this->start_controls_tab(
                'style_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'travlio' ),
                ]
            );

                $this->add_control(
                    'social_color',
                    [
                        'label' => esc_html__( 'Color', 'travlio' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            // Stronger selector to avoid section style from overwriting
                            '{{WRAPPER}} .social a' => 'color: {{VALUE}};',
                        ],
                    ]
                );
                $this->add_control(
                    'social_bg_color',
                    [
                        'label' => esc_html__( 'Background Color', 'travlio' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            // Stronger selector to avoid section style from overwriting
                            '{{WRAPPER}} .social a' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab(
                'style_hover_tab',
                [
                    'label' => esc_html__( 'Hover', 'travlio' ),
                ]
            );

                $this->add_control(
                    'hover_color',
                    [
                        'label' => esc_html__( 'Hover Color', 'travlio' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            // Stronger selector to avoid section style from overwriting
                            '{{WRAPPER}} .social a:hover' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .social a:focus' => 'color: {{VALUE}};',
                        ],
                    ]
                );

                $this->add_control(
                    'hover_bg_color',
                    [
                        'label' => esc_html__( 'Hover Background Color', 'travlio' ),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            // Stronger selector to avoid section style from overwriting
                            '{{WRAPPER}} .social a:hover' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}} .social a:focus' => 'background-color: {{VALUE}};',
                        ],
                    ]
                );


            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__( 'Icon Width', 'travlio' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-socials a' => 'width: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__( 'Icon Height', 'travlio' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-socials a' => 'height: {{SIZE}}{{UNIT}}; max-height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        
        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings();

        extract( $settings ); 
        $migration_allowed = Icons_Manager::is_migration_allowed();
        
        ?>

        <div class="widget-socials <?php echo esc_attr($el_class.' '.$style); ?>">
            <?php if ( !empty($title) ) { ?>
                <h2 class="title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php } ?>
            <ul class="social list-inline">
                <?php
                foreach ( $settings['social_icon_list'] as $index => $item ) {
                    $migrated = isset( $item['__fa4_migrated']['social_icon'] );
                    $is_new = empty( $item['social'] ) && $migration_allowed;
                    $social = '';

                    // add old default
                    if ( empty( $item['social'] ) && ! $migration_allowed ) {
                        $item['social'] = isset( $fallback_defaults[ $index ] ) ? $fallback_defaults[ $index ] : 'fa fa-wordpress';
                    }

                    if ( ! empty( $item['social'] ) ) {
                        $social = str_replace( 'fa fa-', '', $item['social'] );
                    }

                    if ( ( $is_new || $migrated ) && 'svg' !== $item['social_icon']['library'] ) {
                        $social = explode( ' ', $item['social_icon']['value'], 2 );
                        if ( empty( $social[1] ) ) {
                            $social = '';
                        } else {
                            $social = str_replace( 'fa-', '', $social[1] );
                        }
                    }
                    if ( 'svg' === $item['social_icon']['library'] ) {
                        $social = '';
                    }

                    $link_key = 'link_' . $index;

                    $this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

                    if ( $item['link']['is_external'] ) {
                        $this->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $item['link']['nofollow'] ) {
                        $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                    ?>
                    <li>
                        <a <?php echo trim($this->get_render_attribute_string( $link_key )); ?>>
                            <?php
                            if ( $is_new || $migrated ) {
                                Icons_Manager::render_icon( $item['social_icon'] );
                            } else { ?>
                                <i class="<?php echo esc_attr( $item['social'] ); ?>"></i>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div> 
        <?php 
    }
    
    protected function _content_template() {
        ?>
        <# var iconsHTML = {}; #>
        <div class="widget-socials">
            <ul class="social list-inline">
                <# _.each( settings.social_icon_list, function( item, index ) {
                    var link = item.link ? item.link.url : '',
                        migrated = elementor.helpers.isIconMigrated( item, 'social_icon' );
                        social = elementor.helpers.getSocialNetworkNameFromIcon( item.social_icon, item.social, false, migrated );
                    #>
                    <li>
                        <a href="{{ link }}">
                            <span class="elementor-screen-only">{{{ social }}}</span>
                            <#
                                iconsHTML[ index ] = elementor.helpers.renderIcon( view, item.social_icon, {}, 'i', 'object' );
                                if ( ( ! item.social || migrated ) && iconsHTML[ index ] && iconsHTML[ index ].rendered ) { #>
                                    {{{ iconsHTML[ index ].value }}}
                                <# } else { #>
                                    <i class="{{ item.social }}"></i>
                                <# }
                            #>
                        </a>
                    </li>
                <# } ); #>
            </ul>
        </div>
        <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Travlio_Elementor_Social_Links );