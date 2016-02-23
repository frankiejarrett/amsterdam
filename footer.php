<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Amsterdam
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'amsterdam' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'amsterdam' ), 'WordPress' ); ?></a>
			<span class="sep"><span class="dashicons dashicons-wordpress-alt"></span></span>
			<?php printf( esc_html__( 'Theme by %s', 'amsterdam' ), '<a href="https://frankiejarrett.com/" rel="designer">Frankie Jarrett</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
