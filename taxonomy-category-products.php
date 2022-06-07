<?php
/**
 * The template for displaying taxonomies Prodcutos
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package disproal
 */

get_header();

// get the current taxonomy term
$tax = get_queried_object();

$color = get_field('color_tax', $tax);
$color_text = 'style="color:'.$color.';"';
$link = get_field('link_tax', $tax);

?>

	<main id="primary" class="site-main">
		
		<?php get_template_part( 'template-parts/hero', get_post_type() ); ?>
	
		<div id="entry-tax" class="mt-8 mb-8">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-4">
						<h2 <?php echo $color_text ;?>><?php the_field('title_tax', get_queried_object());?></h2>
					</div>
					<div class="col-xs-12 col-md-8">    
						<?php the_archive_description( '<div class="archive-description big">', '</div>' ); ?>
						<?php
						if( $link ) : 
						
							$link_url = $link ['url'];
							$link_title = $link ['title'];
							$link_target = $link ['target'] ? $link['target'] : '_self';
						
						elseif( get_url_catalogo() ) :
						
							$link_url = get_url_catalogo();
							$link_title = __( 'Catálogo', 'disproal' );
							$link_target = '_blank';
						
						endif;

						if ( isset( $link_url ) && $link_url ) { ?>

							<div class="wp-block-buttons mt-4">
								<div class="wp-block-button">
									<a class="wp-block-button__link has-blue-background-color has-background has-white-color" style="background-color:<?php echo $color ;?>;"  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								</div>    
							</div>    

						<?php } ?>
					</div>
				</div>    
			</div>
		</div><!-- #entry-tax -->

		<?php
		
		if ( have_posts() ) :

			echo '<div class="grid-columns-4 container">';

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				
				get_template_part( 'template-parts/card', get_post_type() );

			endwhile;

			echo '</div> ';
			
			the_posts_pagination();

			
			get_template_part( 'template-parts/taxonomies-list' );
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
