<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apolloblind
 */

?>

	<footer id="colophon" class="site-footer bg-gray-900 text-white flex flex-col p-2 items-center">
		<div class="text-center gap-2 flex flex-col">
			<div>374 reviews</div>
			<div class="flex gap-1 text-white">
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
			</div>
			<div>
				<span class="text-cyan-600">x</span> Trustpilot
			</div>
		</div>
		<nav id="site-navigation" class=" items-center mt-12 content-center p-5">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'apolloblind' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
		<div>

		</div>
		<div class="site-info text-gray-600">
			<a class="text-gray-600" href="<?php echo esc_url( __( 'https://wordpress.org/', 'apolloblind' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '&copy; Apolo Blinds  %s', 'apolloblind' ), '2024' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Designed by %1$s.', 'apolloblind' ), 'Pure Agency' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
