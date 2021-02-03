<?php
/**
 * Water Sports Club: Customizer
 *
 * @subpackage Water Sports Club
 * @since 1.0
 */

use WPTRT\Customize\Section\Water_Sports_Club_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Water_Sports_Club_Button::class );

	$manager->add_section(
		new Water_Sports_Club_Button( $manager, 'water_sports_club_pro', [
			'title'      => __( 'Water Sports Club Pro', 'water-sports-club' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'water-sports-club' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/product/water-sports-wordpress-theme/', 'water-sports-club')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'water-sports-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'water-sports-club-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function water_sports_club_customize_register( $wp_customize ) {

	$wp_customize->add_setting('water_sports_club_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control('water_sports_club_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','water-sports-club'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('water_sports_club_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
    ));
    $wp_customize->add_control('water_sports_club_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','water-sports-club'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'water_sports_club_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'water-sports-club' ),
	    'description' => __( 'Description of what this panel does.', 'water-sports-club' ),
	) );

	$wp_customize->add_section( 'water_sports_club_theme_options_section', array(
    	'title'      => __( 'General Settings', 'water-sports-club' ),
		'priority'   => 30,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'water_sports_club_sanitize_choices'
	));
	$wp_customize->add_control('water_sports_club_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','water-sports-club'),
        'section' => 'water_sports_club_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','water-sports-club'),
            'Right Sidebar' => __('Right Sidebar','water-sports-club'),
            'One Column' => __('One Column','water-sports-club'),
            'Three Columns' => __('Three Columns','water-sports-club'),
            'Four Columns' => __('Four Columns','water-sports-club'),
            'Grid Layout' => __('Grid Layout','water-sports-club')
        ),
	));

	//Header section
	$wp_customize->add_section( 'water_sports_club_topbar_section' , array(
    	'title' => __( 'Topbar Section', 'water-sports-club' ),
		'priority' => null,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_mail',array(
       	'default' => '',
       	'sanitize_callback'	=> 'water_sports_club_sanitize_email'
	));
	$wp_customize->add_control('water_sports_club_mail',array(
	   	'type' => 'text',
	   	'label' => __('Add Email Address','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_call',array(
       	'default' => '',
       	'sanitize_callback'	=> 'water_sports_club_sanitize_phone_number'
	));
	$wp_customize->add_control('water_sports_club_call',array(
	   	'type' => 'text',
	   	'label' => __('Add Phone Number','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_facebook_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_facebook_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Facebook URL','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_twitter_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_twitter_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Twitter URL','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_linkedin_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_linkedin_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Linkedin URL','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_rss_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_rss_url',array(
	   	'type' => 'url',
	   	'label' => __('Add RSS URL','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	$wp_customize->add_setting('water_sports_club_youtube_url',array(
       	'default' => '',
       	'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('water_sports_club_youtube_url',array(
	   	'type' => 'url',
	   	'label' => __('Add Youtube URL','water-sports-club'),
	   	'section' => 'water_sports_club_topbar_section',
	));

	//home page slider
	$wp_customize->add_section( 'water_sports_club_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'water-sports-club' ),
		'priority'   => null,
		'panel' => 'water_sports_club_panel_id'
	) );

	$wp_customize->add_setting('water_sports_club_slider_hide_show',array(
       	'default' => false,
       	'sanitize_callback'	=> 'water_sports_club_sanitize_checkbox'
	));
	$wp_customize->add_control('water_sports_club_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','water-sports-club'),
	   	'section' => 'water_sports_club_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'water_sports_club_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'water_sports_club_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'water_sports_club_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'water-sports-club' ),
	   		'description' => __('Image Size (1400px x 650px)','water-sports-club'),
			'section' => 'water_sports_club_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	//Our Courses Section
	$wp_customize->add_section('water_sports_club_our_courses',array(
		'title'	=> __('Our Courses','water-sports-club'),
		'description'=> __('This section will appear below the slider.','water-sports-club'),
		'panel' => 'water_sports_club_panel_id',
	));

	$wp_customize->add_setting('water_sports_club_course_heading',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('water_sports_club_course_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Heading','water-sports-club'),
	   	'section' => 'water_sports_club_our_courses',
	));

	$wp_customize->add_setting('water_sports_club_courses_subheading_text',array(
       	'default' => '',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('water_sports_club_courses_subheading_text',array(
	   	'type' => 'text',
	   	'label' => __('Add Section text','water-sports-club'),
	   	'section' => 'water_sports_club_our_courses',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('water_sports_club_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'water_sports_club_sanitize_choices',
	));
	$wp_customize->add_control('water_sports_club_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','water-sports-club'),
		'section' => 'water_sports_club_our_courses',
	));

	//Footer
    $wp_customize->add_section( 'water_sports_club_footer', array(
    	'title'  => __( 'Footer Text', 'water-sports-club' ),
		'priority' => null,
		'panel' => 'water_sports_club_panel_id'
	) );

    $wp_customize->add_setting('water_sports_club_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('water_sports_club_footer_copy',array(
		'label'	=> __('Footer Text','water-sports-club'),
		'section' => 'water_sports_club_footer',
		'setting' => 'water_sports_club_footer_copy',
		'type' => 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'water_sports_club_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'water_sports_club_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'water_sports_club_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'water_sports_club_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'water-sports-club' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'water-sports-club' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'water_sports_club_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'water_sports_club_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'water_sports_club_customize_register' );

function water_sports_club_customize_partial_blogname() {
	bloginfo( 'name' );
}

function water_sports_club_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function water_sports_club_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function water_sports_club_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}