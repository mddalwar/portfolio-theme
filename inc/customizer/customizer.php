<?php 
	function portfolio_customizer_settings($options){

		// Customizer General Options
		$options->add_section('portfolio_options', array(
			'title'			=> __('General Options', 'portfolio'),
			'priority'		=> 10
		));

		$options->add_setting( 'header_logo', array(
			'transport'		=> 'refresh'
		));

		$options->add_control( 
			new WP_Customize_Media_Control( $options, 'header_logo', array(
				'label' 		=> __( 'Header Logo', 'portfolio' ),
				'section' 		=> 'portfolio_options',
				'mime_type' 	=> 'image'
			))
		);

		$options->add_setting( 'footer_logo', array(
			'transport'		=> 'refresh'
		));
		$options->add_control(
			new WP_Customize_Media_Control( $options, 'footer_logo', array(
			  'label' 		=> __( 'Footer Logo', 'portfolio' ),
			  'section' 	=> 'portfolio_options',
			  'mime_type' 	=> 'image',
			))
		);

		$options->add_setting( 'copyright', array(
			'default'		=> '© 2018 UI-ThemeZ. All Rights Reserved.',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'copyright', array(
			'label' 		=> __( 'Copyright Text', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'portfolio_options'
		));

		// Customizer Social Options
		$options->add_section('social_links', array(
			'title'			=> __('Social Links', 'portfolio'),
			'priority'		=> 10
		));

		$options->add_setting( 'facebook', array(
			'default'		=> '#',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'facebook', array(
			'label' 		=> __( 'Facebook URL', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'social_links'
		));
		$options->add_setting( 'twitter', array(
			'default'		=> '#',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'twitter', array(
			'label' 		=> __( 'Twitter URL', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'social_links'
		));
		$options->add_setting( 'instagram', array(
			'default'		=> '#',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'instagram', array(
			'label' 		=> __( 'Instagram URL', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'social_links'
		));
		
		$options->add_setting( 'linkedin', array(
			'default'		=> '#',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'linkedin', array(
			'label' 		=> __( 'Linkedin URL', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'social_links'
		));
		$options->add_setting( 'behance', array(
			'default'		=> '#',
			'transport'		=> 'postMessage'
		));
		$options->add_control( 'behance', array(
			'label' 		=> __( 'Behance URL', 'portfolio' ),
			'type' 			=> 'text',
			'section' 		=> 'social_links'
		));
		
	}
	add_action('customize_register', 'portfolio_customizer_settings');


	function portfolio_customizer_scripts(){
		wp_enqueue_script('portfolio_customize', THEME_DIR . '/assets/js/customizer.js', array('jquery', 'customize-preview'));
	}
	add_action('customize_preview_init', 'portfolio_customizer_scripts');
?>