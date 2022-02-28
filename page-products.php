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
			
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.


			// Get the taxonomy's terms
			$terms = get_terms(
				array(
					'taxonomy'   => 'category-products',
					'hide_empty' => true,
				)
			); ?>

			<div class="grid-columns-3 container">
				
				<?php // Run a loop and print them all
					foreach ( $terms as $term ) { ?>
						<div class="wp-block-query">
							
							<img src="<?php echo the_field ('image_tax', $term ) ;?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php echo $term->name; ?>" loading="lazy">
							
							<h2 class="wp-block-post-title">
								<a style="color:<?php echo the_field ('color_tax', $term ) ;?>" href="<?php echo esc_url( get_term_link( $term ) ) ?>">
									<?php echo $term->name; ?>
								</a>
							</h2>

							<div class="wp-block-post-excerpt">
								<p><?php echo $term->description; ?></p>
								<p class="wp-block-post-excerpt__more-text">
									<a class="wp-block-post-excerpt__more-link" href="<?php echo esc_url( get_term_link( $term ) ) ?>">Saber más</a>
								</p>
							</div>
							
						</div>
				<?php } ;?>
			</div>

	</main><!-- #main -->

<?php
get_footer();
