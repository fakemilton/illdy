<?php
/**
 *  Customizer
 */

require_once get_template_directory() . '/inc/customizer/class-epsilon-color-scheme.php';

if ( ! function_exists( 'illdy_customize_register' ) ) {
	function illdy_customize_register( $wp_customize ) {

		// Get Settings
		$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
		$wp_customize->get_setting( 'header_image' )->transport      = 'postMessage';
		$wp_customize->get_setting( 'header_image_data' )->transport = 'postMessage';

		$wp_customize->get_control( 'custom_logo' )->section = 'illdy_general_section';


		/**********************************************/
		/*************** INIT ************************/
		/**********************************************/

		// Custom Controls
		require_once get_template_directory() . '/inc/customizer/custom-controls.php';
		require_once get_template_directory() . '/inc/customizer/custom-section.php';
		require_once get_template_directory() . '/inc/customizer/custom-recommend-action-section.php';
		require_once get_template_directory() . '/inc/customizer/control-epsilon-color-scheme.php';
		
		$wp_customize->register_control_type( 'Epsilon_Control_Tab' );
		$wp_customize->register_control_type( 'Epsilon_Control_Button' );
		$wp_customize->register_section_type( 'Illdy_Customize_Section_Pro' );
		$wp_customize->register_section_type( 'Illdy_Customize_Section_Recommend' );

		// Recomended Actions
		$wp_customize->add_section(
			new Illdy_Customize_Section_Recommend(
				$wp_customize,
				'illdy-recomended-section',
				array(
					'title'    => esc_html__( 'Recomended Actions', 'illdy' ),
					'priority' => 0
				)
			)
		);
		// Pro Section
		$wp_customize->add_section(
			new Illdy_Customize_Section_Pro(
				$wp_customize,
				'illdy-pro-section',
				array(
					'title'    => esc_html__( 'Illdy', 'illdy' ),
					'pro_text' => esc_html__( 'Documentation',         'illdy' ),
					'pro_url'  => 'https://colorlib.com/wp/support/illdy/',
					'priority' => 0
				)
			)
		);

		// Front Page sections panel
		$wp_customize->add_panel( 'illdy_frontpage_panel', array(
		    'priority'       => 100,
		    'title'          => 'Front Page Sections',
		) );

		// Color Scheme
		$wp_customize->add_setting( 'illdy_color_scheme',
	                    array(
	                        'sanitize_callback' => 'esc_html',
	                        'default'           => 'default',
	                        'transport'         => 'postMessage',
	                    ) );
		$wp_customize->add_control( new Epsilon_Control_Color_Scheme(
                        $wp_customize,
                        'illdy_color_scheme',
                        array(
                            'label'       => esc_html__( 'Color scheme', 'newsmag-pro' ),
                            'description' => esc_html__( 'Select a color scheme', 'newsmag-pro' ),
                            'choices'     => array(
	                            array(
		                            'id'     => 'Illdy',
		                            'name'   => 'Default',
		                            'colors' => array(
			                            'accent'        		=> '#f1d204',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#6a4d8a',
		                            ),
	                            ),
	                            array(
		                            'id'     => 'palette-1',
		                            'name'   => 'Palette 1',
		                            'colors' => array(
			                            'accent'        		=> '#ff004f',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#482c54',
		                            ),
	                            ),
	                            array(
		                            'id'     => 'palette-2',
		                            'name'   => 'Palette 2',
		                            'colors' => array(
			                            'accent'        		=> '#f66f6d',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#195962',
		                            ),
	                            ),
	                            array(
		                            'id'     => 'palette-3',
		                            'name'   => 'Palette 3',
		                            'colors' => array(
			                            'accent'        		=> '#f79e27',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#e95e4e',
		                            ),
	                            ),
	                            array(
		                            'id'     => 'palette-4',
		                            'name'   => 'Palette 4',
		                            'colors' => array(
			                            'accent'        		=> '#6ebbdc',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#2e3d51',
		                            ),
	                            ),
	                            array(
		                            'id'     => 'palette-5',
		                            'name'   => 'Palette 5',
		                            'colors' => array(
			                            'accent'        		=> '#507fe2',
			                            'secondary_accent'		=> '#f18b6d',
			                            'text' 					=> '#545454',
			                            'contrast'            	=> '#8c9597',
			                            'hover'  				=> '#1acdcb',
		                            ),
	                            ),
                            ),
                            'priority'    => 0,
                            'default'     => 'red',
                            'section'     => 'colors',
                        )
                    )
		);

		// General Options
		require_once get_template_directory() . '/inc/customizer/panels/general-options.php';

		// Blog Options
		require_once get_template_directory() . '/inc/customizer/panels/blog-options.php';

		// Jumbotron
		require_once get_template_directory() . '/inc/customizer/panels/jumbotron.php';

		// Sections Order
		require_once get_template_directory() . '/inc/customizer/panels/sections-order.php';

		// About
		require_once get_template_directory() . '/inc/customizer/panels/about.php';

		// Testimonials
		require_once get_template_directory() . '/inc/customizer/panels/testimonials.php';

		// Projects
		require_once get_template_directory() . '/inc/customizer/panels/projects.php';

		// Services
		require_once get_template_directory() . '/inc/customizer/panels/services.php';

		// Latest News
		require_once get_template_directory() . '/inc/customizer/panels/latest-news.php';

		// Counter
		require_once get_template_directory() . '/inc/customizer/panels/counter.php';

		// Team
		require_once get_template_directory() . '/inc/customizer/panels/team.php';

		// Contact Us
		require_once get_template_directory() . '/inc/customizer/panels/contact-us.php';
	}

	add_action( 'customize_register', 'illdy_customize_register' );
}

/**
 *  Customizer Live Preview
 */
if ( ! function_exists( 'illdy_customizer_live_preview' ) ) {
	add_action( 'customize_preview_init', 'illdy_customizer_live_preview' );

	function illdy_customizer_live_preview() {
		wp_enqueue_script( 'illdy-customizer-live-preview', get_template_directory_uri() . '/inc/customizer/assets/js/illdy-customizer-live-preview.js', array( 'customize-preview' ), '1.0', true );

		wp_localize_script( 'illdy-customizer-live-preview', 'WPUrls', array(
			'siteurl' => get_option( 'siteurl' ),
			'theme'   => get_template_directory_uri(),
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		) );

	}

}

if ( ! function_exists( 'illdy_customizer_css_load' ) ) {
	function illdy_customizer_css_load() {
		wp_enqueue_style( 'illdy-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/illdy-customizer.css' );
	}

	add_action( 'customize_controls_print_styles', 'illdy_customizer_css_load' );
}

if ( ! function_exists( 'illdy_customizer_js_load' ) ) {
	function illdy_customizer_js_load() {
		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_enqueue_script( 'updates' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );
		wp_enqueue_script( 'illdy-customizer', get_template_directory_uri() . '/inc/customizer/assets/js/illdy-customizer.js', array( 'customize-controls' ), '1.0', true );
	}

	add_action( 'customize_controls_enqueue_scripts', 'illdy_customizer_js_load' );
}

/**
 *  Sanitize Radio Buttons
 */
if ( ! function_exists( 'illdy_sanitize_radio_buttons' ) ) {
	function illdy_sanitize_radio_buttons( $input, $setting ) {
		global $wp_customize;

		$control = $wp_customize->get_control( $setting->id );

		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}

/**
 *  Customizer CSS
 */
if ( ! function_exists( 'illdy_customizer_css' ) ) {
	add_action( 'wp_head', 'illdy_customizer_css' );
	function illdy_customizer_css() {
		$preloader_primary_color    = esc_attr( get_theme_mod( 'illdy_preloader_primary_color', '#f1d204' ) );
		$preloader_secondly_color   = esc_attr( get_theme_mod( 'illdy_preloader_secondly_color', '#ffffff' ) );
		$preloader_background_color = esc_attr( get_theme_mod( 'illdy_preloader_background_color', '#ffffff' ) );

		$output = '';

		$output .= '<style type="text/css">';
		$output .= ( $preloader_primary_color ? '.pace .pace-progress {background-color: ' . $preloader_primary_color . '; color: ' . $preloader_primary_color . ';}' : '' );
		$output .= ( $preloader_primary_color || $preloader_secondly_color ? '.pace .pace-activity {box-shadow: inset 0 0 0 2px ' . $preloader_primary_color . ', inset 0 0 0 7px ' . $preloader_secondly_color . ';}' : '' );
		$output .= ( $preloader_background_color ? '.pace-overlay {background-color: ' . $preloader_background_color . ';}' : '' );
		$output .= '</style>';

		echo $output;
	}
}

if ( ! function_exists( 'illdy_sanitize_checkbox' ) ) {
	/**
	 * Function to sanitize checkboxes
	 *
	 * @param $value
	 *
	 * @return int
	 */
	function illdy_sanitize_checkbox( $value ) {
		if ( $value == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 *  Active Callback: Is active JetPack Testimonials
 */
if ( ! function_exists( 'illdy_is_active_jetpack_testimonials' ) ) {
	function illdy_is_active_jetpack_testimonials() {
		if ( post_type_exists( 'jetpack-testimonial' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 *  Active Callback: Is not active JetPack Testimonials
 */
if ( ! function_exists( 'illdy_is_not_active_jetpack_testimonials' ) ) {
	function illdy_is_not_active_jetpack_testimonials() {
		if ( ! post_type_exists( 'jetpack-testimonial' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 *  Active Callback: Is active JetPack Projects
 */
if ( ! function_exists( 'illdy_is_active_jetpack_projects' ) ) {
	function illdy_is_active_jetpack_projects() {
		if ( post_type_exists( 'jetpack-portfolio' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 *  Active Callback: Is not active JetPack Projects
 */
if ( ! function_exists( 'illdy_is_not_active_jetpack_projects' ) ) {
	function illdy_is_not_active_jetpack_projects() {
		if ( ! post_type_exists( 'jetpack-portfolio' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 *  Active Callback: Is not active Contact Form 7
 */
if ( ! function_exists( 'illdy_is_not_active_contact_form_7' ) ) {
	function illdy_is_not_active_contact_form_7() {
		if ( ! class_exists( 'WPCF7' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

/**
 *  Sanitize HTML
 */
if ( ! function_exists( 'illdy_sanitize_html' ) ) {
	function illdy_sanitize_html( $input ) {
		$input = force_balance_tags( $input );

		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);
		$output       = wp_kses( $input, $allowed_html );

		return $output;
	}
}

/**
 *  Sanitize Select
 */
if ( ! function_exists( 'illdy_sanitize_select' ) ) {
	function illdy_sanitize_select( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		}
	}
}

if ( ! function_exists( 'illdy_about_general_title' ) ) {
	function illdy_about_general_title() {
		return get_theme_mode( 'illdy_about_general_title' );
	}
}

if ( ! function_exists( 'illdy_about_general_entry' ) ) {
	function illdy_about_general_entry() {
		return get_theme_mode( 'illdy_about_general_entry' );
	}
}

if ( ! function_exists( 'illdy_contact_us_general_title' ) ) {
	function illdy_contact_us_general_title() {
		return get_theme_mode( 'illdy_contact_us_general_title' );
	}
}

if ( ! function_exists( 'illdy_contact_us_general_text' ) ) {
	function illdy_contact_us_general_text() {
		return get_theme_mode( 'illdy_contact_us_general_text' );
	}
}

if ( ! function_exists( 'illdy_contact_us_general_address_title' ) ) {
	function illdy_contact_us_general_address_title() {
		return get_theme_mode( 'illdy_contact_us_general_address_title' );
	}
}

if ( ! function_exists( 'illdy_contact_us_general_customer_support_title' ) ) {
	function illdy_contact_us_general_customer_support_title() {
		return get_theme_mode( 'illdy_contact_us_general_customer_support_title' );
	}
}

if ( ! function_exists( 'illdy_address2' ) ) {
	function illdy_address2() {
		return get_theme_mode( 'illdy_address2' );
	}
}

if ( ! function_exists( 'illdy_address1' ) ) {
	function illdy_address1() {
		return get_theme_mode( 'illdy_address1' );
	}
}

if ( ! function_exists( 'illdy_phone' ) ) {
	function illdy_phone() {
		return get_theme_mode( 'illdy_phone' );
	}
}

if ( ! function_exists( 'illdy_email' ) ) {
	function illdy_email() {
		return get_theme_mode( 'illdy_email' );
	}
}

if ( ! function_exists( 'illdy_footer_copyright' ) ) {
	function illdy_footer_copyright() {
		return get_theme_mode( 'illdy_footer_copyright' );
	}
}

if ( ! function_exists( 'illdy_jumbotron_general_first_row_from_title' ) ) {
	function illdy_jumbotron_general_first_row_from_title() {
		return get_theme_mode( 'illdy_jumbotron_general_first_row_from_title' );
	}
}

if ( ! function_exists( 'illdy_jumbotron_general_second_row_from_title' ) ) {
	function illdy_jumbotron_general_second_row_from_title() {
		return get_theme_mode( 'illdy_jumbotron_general_second_row_from_title' );
	}
}

// New
if ( ! function_exists( 'illdy_img_footer_logo' ) ) {
	function illdy_img_footer_logo() {
		$img_footer_logo   = get_theme_mod( 'illdy_img_footer_logo' );
		if ( $img_footer_logo ) {
			$html = '<img src="'.esc_url( $img_footer_logo ).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'" title="'.esc_attr( get_bloginfo( 'name' ) ).'" />';
		}else{
			$html = '';
		}
		
		return $html;
	}
}

if ( ! function_exists( 'illdy_custom_logo' ) ) {
	function illdy_custom_logo() {
		$logo_id                   = get_theme_mod( 'custom_logo' );
		$logo_image                = wp_get_attachment_image_src( $logo_id, 'full' );
		
		return '<img src="' . esc_url( $logo_image[0] ) . '" />';
	}
}
if ( ! function_exists( 'illdy_contact_us_social' ) ) {
	function illdy_contact_us_social() {

		$contact_bar_facebook_url  = get_theme_mod( 'illdy_contact_bar_facebook_url' );
		$contact_bar_twitter_url   = get_theme_mod( 'illdy_contact_bar_twitter_url' );
		$contact_bar_linkedin_url  = get_theme_mod( 'illdy_contact_bar_linkedin_url' );
		$contact_bar_googlep_url   = get_theme_mod( 'illdy_contact_bar_googlep_url' );
		$contact_bar_youtube_url   = get_theme_mod( 'illdy_contact_bar_youtube_url' );
		$contact_bar_vimeo_url     = get_theme_mod( 'illdy_contact_bar_vimeo_url' );
		$contact_bar_pinterest_url = get_theme_mod( 'illdy_contact_bar_pinterest_url' );
		$contact_bar_instagram_url = get_theme_mod( 'illdy_contact_bar_instagram_url' );

		$html = '';
		if ( $contact_bar_twitter_url ):
			$html .= '<a href="'.esc_url( $contact_bar_twitter_url ).'" title="'.__( 'Twitter', 'illdy' ).'" target="_blank"><i class="fa fa-twitter"></i></a>';
		endif;
		if ( $contact_bar_facebook_url ):
			$html .= '<a href="'.esc_url( $contact_bar_facebook_url ).'" title="'.__( 'Facebook', 'illdy' ).'" target="_blank"><i class="fa fa-facebook"></i></a>';
		endif;
		if ( $contact_bar_linkedin_url ):
			$html .= '<a href="'.esc_url( $contact_bar_linkedin_url ).'" title="'.__( 'LinkedIn', 'illdy' ).'" target="_blank"><i class="fa fa-linkedin"></i></a>';
		endif;
		if ( $contact_bar_googlep_url ):
			$html .= '<a href="'.esc_url( $contact_bar_googlep_url ).'" title="'.__( 'Google+', 'illdy' ).'" target="_blank"><i class="fa fa-google-plus"></i></a>';
		endif;
		if ( $contact_bar_pinterest_url ):
			$html .= '<a href="'.esc_url( $contact_bar_pinterest_url ).'" title="'.__( 'Pinterest', 'illdy' ).'" target="_blank"><i class="fa fa-pinterest"></i></a>';
		endif;
		if ( $contact_bar_instagram_url ):
			$html .= '<a href="'.esc_url( $contact_bar_instagram_url ).'" title="'.__( 'Instagram', 'illdy' ).'" target="_blank"><i class="fa fa-instagram"></i></a>';
		endif;
		if ( $contact_bar_youtube_url ):
			$html .= '<a href="'.esc_url( $contact_bar_youtube_url ).'" title="'.__( 'YouTube', 'illdy' ).'" target="_blank"><i class="fa fa-youtube"></i></a>';
		endif;
		if ( $contact_bar_vimeo_url ):
			$html .= '<a href="'.esc_url( $contact_bar_vimeo_url ).'" title="'.__( 'Vimeo', 'illdy' ).'" target="_blank"><i class="fa fa-vimeo"></i></a>';
		endif;

		return $html;
	}
}