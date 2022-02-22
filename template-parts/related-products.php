<?php
$custom_taxterms = wp_get_object_terms( $post->ID, 'category-products', array('fields' => 'ids') );

    $related = get_posts(
        array(
            'post_type' => 'products',
            'post_status' => 'publish',
            'posts_per_page' => 2, // you may edit this number
            'orderby' => 'rand',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category-products',
                    'field' => 'id',
                    'terms' => $custom_taxterms
                )
            ),
            'post__not_in' => array ($post->ID),
        )
    ); 

if( $related ): ?>
    
    <div id="related-products" class="container mb-5 mt-5">
        
        <p class="text-h2 has-blue-color center-xs"><?php esc_html_e( 'Otros productos', 'disproal' ); ?></p>
        
        <div class="grid-columns-4 mt-6">	
            <?php
                if( $related ) foreach( $related as $post ) {
                    
                    setup_postdata($post);
                    
                    get_template_part( 'template-parts/card', get_post_type() );  
                    
                }
                
                wp_reset_postdata();
            ?>
        </div>
        
    </div>
<?php endif; ?>
