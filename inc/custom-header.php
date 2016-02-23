<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Amsterdam
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses amsterdam_header_style()
 */
function amsterdam_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'amsterdam_custom_header_args', array(
		'default-image'      => get_template_directory_uri() . '/eggs.jpg',
		'default-text-color' => 'ffffff',
		'header-text'        => true,
		'width'              => 1280,
		'height'             => 450,
		'flex-width'         => true,
		'flex-height'        => true,
		'wp-head-callback'   => 'amsterdam_header_style',
	) ) );

}
add_action( 'after_setup_theme', 'amsterdam_custom_header_setup' );

if ( ! function_exists( 'amsterdam_header_style' ) ) {

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see amsterdam_custom_header_setup().
	 */
	function amsterdam_header_style() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
		 */
		if ( HEADER_TEXTCOLOR === $header_text_color ) {

			return;

		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			.header-image {
				background-image: url(<?php header_image(); ?>);
			}
		<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
		?>
			.header-image-caption {
				position: absolute;
				clip: rect(1px 1px 1px 1px); /* IE7 */
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.header-image-caption {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php

	}

}
