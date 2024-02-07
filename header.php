<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apolloblind
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'apolloblind' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="flex justify-end gap-10 border-b-2 border-gray-200 border-solid px-5 py-2">
			<div class="hidden md:flex"><a href="mailto:edinburgh@apollo-blinds.co.uk">E: <span class="text-cyan-700">edinburgh@apollo-blinds.co.uk</span></a></div>
			<div class="hidden md:flex"><a href="tel:01316390153">T: <span class="text-cyan-700">0131 639 0153</span></a></div>
			<div class="flex gap-2 items-center">
				 <span><img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/facebook.svg' /></span>
				 <span><img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/pinterest.svg' /></span>
				 <span><img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/twitter.svg' /></span>
				 <span><img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/instagram.svg' /></span>
			</div>
		</div>
		<div class="flex items-center justify-between p-5">
		<div class="site-branding">
			<div class="max-w-[200px]"> <?php the_custom_logo(); ?></div>
			<?php
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$apolloblind_description = get_bloginfo( 'description', 'display' );
			if ( $apolloblind_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $apolloblind_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<button class="px-5 py-2 bg-cyan-400 text-white max-h-[50px]">
				BOOK AN APPOINTMENT
		</button>
		</div>
		<div class="bg-gray-500 flex justify-around p-5 text-white">
			<div class="flex gap-3 uppercase items-end text-sm"><img width="auto" height="auto" src='<?php bloginfo('template_directory'); ?>/img/MADE-TO-MEASURE.png' /> MADE-TO-MEASURE</div>
			<div class="flex gap-3 uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/Free-no-obligation-quote.png' /> Free no obligation quote & design visit</div>
			<div class="md:flex md:show gap-3 hidden uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/Motorised-options.png' /> Motorised options</div>
			<div class="md:flex md:show gap-3 hidden uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/25-YEAR-GAURANTEE.png' /> 25 YEAR GAURANTEE</div>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'apolloblind' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
