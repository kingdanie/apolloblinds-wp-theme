<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apolloblind
 */

get_header();
?>

	<main id="primary" class="site-main">
       
        <?php 
        get_template_part('template-parts/partials/slides', 'section');
        get_template_part('template-parts/partials/about-us', 'section'); 
        get_template_part('template-parts/partials/video', 'section'); 
        get_template_part('template-parts/partials/gallery', 'section'); 
        get_template_part('template-parts/partials/our-processes', 'section'); 
        get_template_part('template-parts/partials/why-chooses', 'section'); 
        get_template_part('template-parts/partials/shutter-colors', 'section'); 
        get_template_part('template-parts/partials/inspiration', 'section'); 
        get_template_part('template-parts/partials/faqs', 'section'); 
        get_template_part('template-parts/partials/location', 'section'); 
        ?>

	</main><!-- #main -->

<?php
get_footer();
