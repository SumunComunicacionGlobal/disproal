<?php
/**
 * Template part for displaying page content in single.php > Products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package disproal
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part( 'template-parts/hero', get_post_type() ); ?>

    <div class="container mt-8 mb-8">
        <div class="row">
            <div class="col-xs-12 col-md-6 center-xs">
                <?php disproal_post_thumbnail(); ?>
            </div>
            <div class="col-xs-12 col-md-6">
                <?php
                    the_title( '<h2 class="entry-title">', '</h2>' );
                    the_excerpt();
                ?>
            </div>    
        </div>    
    </div>
        
    <div class="entry-content mt-4">
        
        <?php
        the_content(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'disproal' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post( get_the_title() )
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'disproal' ),
                'after'  => '</div>',
            )
        );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php disproal_entry_footer(); ?>
    </footer><!-- .entry-footer -->

    <?php get_template_part( 'template-parts/related', get_post_type() ); ?>

</article><!-- #post-<?php the_ID(); ?> -->
