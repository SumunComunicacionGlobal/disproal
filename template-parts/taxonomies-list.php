<?php

// Get the taxonomy's terms
$terms = get_terms(
    array(
        'taxonomy'   => 'category-products',
        'hide_empty' => true,
    )
); ?>


<div id="tax-buttons" class="wp-block-buttons mt-4 mb-8 center-xs">
    <?php // Run a loop and print them all
        foreach ( $terms as $term ) { ?>
            <div class="wp-block-button">
                <a class="wp-block-button__link <?php echo $term->name; ?>" style="background-color:<?php echo the_field ('color_tax', $term ) ;?>;" href="<?php echo esc_url( get_term_link( $term ) ) ?>" title="<?php echo $term->name; ?>">
                    <?php echo $term->name; ?>
                </a>
            </div>
    <?php } ;?>
</div>