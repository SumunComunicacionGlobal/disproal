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
		<div class="site-info">
			<div class="container">
				<div class="row middle-xs">
					<div class="col-xs-12 col-md-4">
						<?php printf( esc_html__( '© 2020 Disproal S.L, All rights reserved', 'disproal' ));?>
					</div>
					<div class="col-xs-12 col-md-8 end-xs legal">
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
			
			<span class="sep"> | </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
