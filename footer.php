<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package imobi_Theme
 */

?>

	<!-- </div>#content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="col-sm-6">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'imobi' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'imobi' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'imobi' ), 'Imobi', '<a href="https://automattic.com/" rel="designer">Louback</a>' ); ?>
				</div><!-- .site-info -->
			</div>

			<div class="col-sm-6"></div>
		</div>
	</footer><!-- #colophon -->
<!-- </div>#page -->

<?php wp_footer(); ?>


</body>
</html>
