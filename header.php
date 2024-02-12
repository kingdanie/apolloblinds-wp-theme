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
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'apolloblind' ); ?></a>

	<header id="masthead" class="site-header">
		<?php 
				 $email = esc_html(get_theme_mod( 'setting_contact_email' ));
				 $number = get_theme_mod( 'setting_contact_phone' );
				 $facebook = esc_html(get_theme_mod( 'setting_social_facebook' ));
				 $pinterests= esc_html(get_theme_mod( 'setting_social_pinterest' ));
				 $instagram= esc_html(get_theme_mod( 'setting_social_linkedin' ));
				 $twitter= esc_html(get_theme_mod( 'setting_social_twitter' ));
		?>
		<div class="flex justify-end gap-10 border-b-2 border-gray-200 border-solid px-5 py-2">
			<div class="hidden md:flex">
				<a href="mailto:<?php echo $email ?>">
					E: <span class="text-cyan-700"><?php echo $email ?></span>
				</a>
			</div>

			<div class="hidden md:flex">
				<a href="tel:<?php echo $number ?>">
					T: <span class="text-primary"><?php echo $number ?></span>
				</a>
			</div>

			<div class="flex gap-2 items-center">
				<?php if ($facebook): ?>
					<a href="https://facebook.com/<?php echo $facebook ?>">
						<img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/facebook.svg' />
					</a>
				<?php endif; ?>
				<?php if ($pinterests): ?>
					<a href="https://pinterest.com/<?php echo $pinterests ?>">
						<img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/pinterest.svg' />
					</a>
				<?php endif; ?>
				<?php if ($twitter): ?>
					<a href="https://twitter.com/<?php echo $twitter ?>">
						<img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/twitter.svg' />
					</a>
				<?php endif; ?>
				<?php if ($instagram): ?>
					<a href="https://instagram.com/<?php echo $instagram ?>">
						<img width="18" height="18" src='<?php bloginfo('template_directory'); ?>/img/instagram.svg' />
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="flex items-center justify-between p-0.5">
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

		<button class="px-5 py-2 bg-primary text-white text-[10px] md:text-sm max-h-[50px]">
				BOOK AN APPOINTMENT
		</button>
		</div>
		<div class="bg-gray-500 flex justify-around p-2 text-white">
			<div class="flex gap-3 uppercase items-end text-sm"><img width="auto" height="auto" src='<?php bloginfo('template_directory'); ?>/img/MADE-TO-MEASURE.png' /> MADE-TO-MEASURE</div>
			<div class="flex gap-3 uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/Free-no-obligation-quote.png' /> Free no obligation quote & design visit</div>
			<div class="md:flex md:show gap-3 hidden uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/Motorised-options.png' /> Motorised options</div>
			<div class="md:flex md:show gap-3 hidden uppercase items-end text-sm"><img width="auto" height="auto" src = '<?php bloginfo('template_directory'); ?>/img/25-YEAR-GAURANTEE.png' /> 25 YEAR GAURANTEE</div>
		</div>

		<!-- <nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'apolloblind' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>#site-navigation -->
	</header><!-- #masthead -->
