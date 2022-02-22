<?php
/**
 * The template for displaying all category products
 *
 * Template Name: Productos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package disproal
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		
		get_template_part( 'template-parts/hero', get_post_type() );

		get_template_part( 'template-parts/taxonomies-list' );
		
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		
		?>


	</main><!-- #main -->

<?php
get_footer();
