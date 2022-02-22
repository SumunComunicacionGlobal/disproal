<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package disproal
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?>
					<?php endif; ?>
		</div>
		<div class="site-info has-blue-background-color">
			<div class="container">
				<div class="row middle-xs center-xs start-md">
					<div class="col-xs-12 col-md-4">
						<?php printf( esc_html__( '© 2020 Disproal S.L, All rights reserved', 'disproal' ));?>
					</div>
					<div class="col-xs-12 col-md-8 center-xs end-md legal">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_id'        => 'footer-legal',
								)
							);
						?>
					</div>
				</div>
			</div>
	
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
