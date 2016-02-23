<?php
/**
 * Amsterdam Theme Customizer.
 *
 * @package Amsterdam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function amsterdam_customize_register( $wp_customize ) {

	$wp_customize->add_setting( 'link_color', array(
		'default'           => '#c4962d',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
		'label'    => __( 'Link Color', 'amsterdam' ),
		'section'  => 'colors',
		'settings' => 'link_color',
	) ) );

	$wp_customize->add_setting( 'text_color', array(
		'default'           => '#333333',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'    => __( 'Text Color', 'amsterdam' ),
		'section'  => 'colors',
		'settings' => 'text_color',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

}
add_action( 'customize_register', 'amsterdam_customize_register' );

function amsterdam_customizer_head_styles() {

	$link_color = get_theme_mod( 'link_color' );
	$text_color = get_theme_mod( 'text_color' );

	if ( '#c4962d' === $link_color && '#333333' === $text_color ) {

		return;

	}

	?>
	<style type="text/css">
		body, button, input, select, textarea, .main-navigation ul li a, a:hover, a:focus, a:active, a:visited:hover, a:visited:focus, a:visited:active {
			color: <?php echo esc_attr( $text_color ); ?>;
		}
		a, a:visited, .main-navigation ul li a:hover {
			color: <?php echo esc_attr( $link_color ); ?>;
		}
		button, input[type="button"], input[type="reset"], input[type="submit"] {
			background: <?php echo esc_attr( $link_color ); ?>;
		}
		:-moz-selection {
			background: <?php echo esc_attr( $link_color ); ?>;
		}
		::selection {
			background: <?php echo esc_attr( $link_color ); ?>;
		}
	</style>
	<?php

}
add_action( 'wp_head', 'amsterdam_customizer_head_styles' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function amsterdam_customize_preview_js() {

	wp_enqueue_script( 'amsterdam_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );

}
add_action( 'customize_preview_init', 'amsterdam_customize_preview_js' );