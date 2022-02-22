<?php
/**
 * The template for display Frontpage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package disproal
 */

get_header();
?>

	<main id="primary" class="site-main">
 
        <section class="carousel" aria-label="carousel" Tabindex="0">
            <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
            <div class="scroll-down">
                <img src="<?php echo get_template_directory_uri().'/assets/icons/scroll-down.svg';?>" />
            </div>
        </section>
    
    <?php
    
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


