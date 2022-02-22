<div class="wp-block-query">
    <?php the_post_thumbnail('img-card'); ?>
    <h2 class="wp-block-post-title">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h2>
    <div class="wp-block-post-excerpt">
        <?php the_excerpt() ?>
        <p class="wp-block-post-excerpt__more-text">
            <a class="wp-block-post-excerpt__more-link" href="<?php the_permalink() ?>">Saber más</a>
        </p>
    </div>
</div>