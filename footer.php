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

	<footer id="colophon" class="site-footer bg-black text-white flex flex-col gap-10 p-2 items-center">
		<div class="text-center gap-1 flex flex-col pt-2">
			<div>374 reviews</div>
			<div><img src='<?php bloginfo('template_directory'); ?>/assets/img/trustpilot.png' /></div>
			<!-- <div class="flex gap-1 text-white">
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
				<span class="bg-cyan-600 p-3">x</span>
			</div> -->
			<!-- <div>
				<span class="text-cyan-600">X</span> Trustpilot
			</div> -->
		</div>
		<nav id="site-navigation menu-toggle flex items-center gap-3" class=" mt-3">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2',
					'menu_id'        => 'footer-menu',
					'menu_class'        => 'grid grid-cols-2 sm:grid-col-3 gap-x-2 gap-3 items-center lg:grid-cols-7 text-center',
				)
			);
			?>
		</nav>
		<div class="grid gap-3 md:flex items-center">
				 <span class="col-span-3 "><img width="auto" height="auto" src='<?php bloginfo('template_directory'); ?>/assets/img/hunterdouglas.png' /></span>
				 <span class=" "><img width="auto" height="auto" src='<?php bloginfo('template_directory'); ?>/assets/img/bbsa.png' /></span>
				 <span class=" "><img width="auto" height="auto" src='<?php bloginfo('template_directory'); ?>/assets/img/makeitsafe.png' /></span>
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
