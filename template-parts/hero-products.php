<?php if (is_tax()) { 
    
    // get the current taxonomy term
    $tax = get_queried_object();
    
    // vars
    $get_image_url = get_field('image_tax', $tax);
    $image_background = 'background-image: url('.$get_image_url.')';
    $color = get_field('color_tax', $tax);
    $color_text = 'style="color:'.$color.';"';
    
    ?>

    <header id="hero" class="entry-header-archive" style="<?php echo $image_background ;?>">
        <div class="container">
            <?php
                echo '<h1 class="entry-title end-xs" '.$color_text.'>', single_cat_title(),'</h1>';
			?>
        </div>    
    </header><!-- #hero -->

    <div id="breadcrumbs" class="mt-1">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </div><!-- #breadcrumbs -->

<?php }; ?>

<?php if (is_single()) {
    
    $terms = get_the_terms( $post->ID , 'category-products' ); 
        
    if  ($terms) {
            
            foreach ( $terms as $term ) { ?>
            
            <header id="hero" class="entry-header-single" style="background-image:url('<?php echo the_field ('image_tax', $term ) ;?>')">
                <div class="container">
                    <h1 class="entry-title end-xs" style="color:<?php echo the_field ('color_tax', $term ) ;?>"><?php echo $term->name ;?></h1> 
                </div>    
            </header><!-- #hero -->
                
           <?php }
    }?>
        
    <div id="breadcrumbs" class="mt-1">
        <div class="container">
            <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
        </div>
    </div><!-- #breadcrumbs -->
    
<?php }; ?>