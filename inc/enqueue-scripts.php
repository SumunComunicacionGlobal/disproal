<?php 

function disproal_scripts() {
	wp_enqueue_style( 'disproal-style', get_stylesheet_uri(), array(), _S_VERSION );

	//wp_enqueue_script( 'disproal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'disproal_scripts' );