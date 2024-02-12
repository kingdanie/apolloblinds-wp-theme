<?php

// =========================================================================
// REGISTER CUSTOMIZER - PANEL, SECTION, SETTINGS AND CONTROL
// =========================================================================
//function apolloblind_register_theme_social_customizer( $wp_customize ) {
    // Add panel
    $wp_customize->add_panel( 'panel_contact_info', array(
        'priority'       => 30,
        'theme_supports' => '',
        'title'          => __( 'Contact Info', 'apolloblind' ),
        'description'    => __( 'Set editable text for certain content.', 'apolloblind' ),
    ) );
    // Add section.
    $wp_customize->add_section( 'section_social_links' , array(
        'title'    => __('Social','apolloblind'),
        'panel'    => 'panel_contact_info',
        'priority' => 30
    ) );

    // Add section. 
    $wp_customize->add_section( 'section_email' , array(
        'title'    => __('Email','apolloblind'),
        'panel'    => 'panel_contact_info',
        'priority' => 30
    ) );

    // Add section.
    $wp_customize->add_section( 'section_phone' , array(
        'title'    => __('Company Contact','apolloblind'),
        'panel'    => 'panel_contact_info',
        'priority' => 30
    ) );

    // Add section.
    $wp_customize->add_section( 'section_address' , array(
        'title'    => __('Address','apolloblind'),
        'panel'    => 'panel_contact_info',
        'priority' => 30
    ) );

    // Add setting facebook
    $wp_customize->add_setting( 'setting_social_facebook', array(
        'default'           => __( '#', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
   ) );

   // Add setting twitter
   $wp_customize->add_setting( 'setting_social_twitter', array(
        'default'           => __( '#', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    // Add setting linkedin
    $wp_customize->add_setting( 'setting_social_linkedin', array(
        'default'           => __( '#', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add setting pinterest
    $wp_customize->add_setting( 'setting_social_pinterest', array(
        'default'           => __( '#', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    // Add setting
    $wp_customize->add_setting( 'setting_contact_email', array(
        'default'           => __( 'edinburgh@apollo-blinds.co.uk', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
   ) );

   // Add setting
   $wp_customize->add_setting( 'setting_contact_phone', array(
        'default'           => __( '0131 639 0153', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
  
    // Add setting
   $wp_customize->add_setting( 'setting_contact_fax', array(
        'default'           => __( '0131 639 0153', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    // Add setting
   $wp_customize->add_setting( 'setting_contact_address', array(
        'default'           => __( 'Edinburg UK', 'apolloblind' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_social_facebook',
            array(
                'label'    => __( 'Facebook Username', 'apolloblind' ),
                'section'  => 'section_social_links',
                'settings' => 'setting_social_facebook',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_social_twitter',
            array(
                'label'    => __( 'Twitter Username', 'apolloblind' ),
                'section'  => 'section_social_links',
                'settings' => 'setting_social_twitter',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_social_linkedin',
            array(
                'label'    => __( 'LinkedIn Username', 'apolloblind' ),
                'section'  => 'section_social_links',
                'settings' => 'setting_social_linkedin',
                'type'     => 'text'
            )
        )
    );

      // Add control
      $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_social_pinterest',
            array(
                'label'    => __( 'Pinterest Username', 'apolloblind' ),
                'section'  => 'section_social_links',
                'settings' => 'setting_social_pinterest',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_email',
            array(
                'label'    => __( 'Email', 'apolloblind' ),
                'section'  => 'section_email',
                'settings' => 'setting_contact_email',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_phone',
            array(
                'label'    => __( 'Phone', 'apolloblind' ),
                'section'  => 'section_phone',
                'settings' => 'setting_contact_phone',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_fax',
            array(
                'label'    => __( 'Fax', 'apolloblind' ),
                'section'  => 'section_phone',
                'settings' => 'setting_contact_fax',
                'type'     => 'text'
            )
        )
    );

    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'control_address',
            array(
                'label'    => __( 'Address', 'apolloblind' ),
                'section'  => 'section_phone',
                'settings' => 'setting_contact_address',
                'type'     => 'textarea'
            )
        )
    );
  
    // Sanitize text
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
//}
//add_action( 'customize_register', 'apolloblind_register_theme_social_customizer' );