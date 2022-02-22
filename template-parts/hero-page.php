<?php if ( has_post_thumbnail() ) : 
    $get_image_url = wp_get_attachment_url( get_post_thumbnail_id() );
    $image_background = 'background-image: url('.$get_image_url.')';
endif; ?>

<header id="hero" class="entry-header" style="<?php echo $image_background ;?>">
    <div class="container">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>    
</header><!-- #hero -->

<div id="breadcrumbs" class="mt-1">
    <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
    </div>
</div><!-- #breadcrumbs -->