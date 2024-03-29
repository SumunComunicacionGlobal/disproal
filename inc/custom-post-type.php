<?php

// let's create the function for the custom type - Productos
function custom_post_product() { 
    // creating (registering) the custom type 
    register_post_type( 'products', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array('labels' => array(
            'name' => __('Productos', 'disproal'), /* This is the Title of the Group */
            'singular_name' => __('Producto', 'disproal'), /* This is the individual type */
            'all_items' => __('Todos los productos', 'disproal'), /* the all items menu item */
            'add_new' => __('Añadir nuevo', 'disproal'), /* The add new menu item */
            'add_new_item' => __('Añadir nuevo producto', 'disproal'), /* Add New Display Title */
            'edit' => __( 'Editar', 'disproal' ), /* Edit Dialog */
            'edit_item' => __('Editar producto', 'disproal'), /* Edit Display Title */
            'new_item' => __('Nueva producto', 'disproal'), /* New Display Title */
            'view_item' => __('Ver producto', 'disproal'), /* View Display Title */
            'search_items' => __('Buscar producto', 'disproal'), /* Search Custom Type Title */ 
            'not_found' =>  __('Nada encontrado en base de datos.', 'disproal'), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __('Nada econtrado en papelera', 'disproal'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'show_in_rest' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => 'dashicons-buddicons-community', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
            'has_archive' => false, /* you can rename the slug here */
            'rewrite'   => array( 'slug' => __('producto', 'disproal') , 'with_front' => false ), /* you can specify its url slug */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes')
        ) /* end of options */
    ); /* end of register post type */
    
} 

// adding the function to the Wordpress init
add_action( 'init', 'custom_post_product');

function wptp_register_taxonomy() {
// now let's add custom Product categories 
register_taxonomy( 'category-products', 
array('products'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
array('hierarchical' => true,     /* if this is true, it acts like categories */             
    'labels' => array(
        'name' => __( 'Categorías productos', 'disproal' ), /* name of the custom taxonomy */
        'singular_name' => __( 'Categoría Producto', 'disproal' ), /* single taxonomy name */
        'search_items' =>  __( 'Buscar Categoria', 'disproal' ), /* search title for taxomony */
        'all_items' => __( 'Todas las Categorias', 'disproal' ), /* all title for taxonomies */
        'parent_item' => __( 'Categoria Superior', 'disproal' ), /* parent title for taxonomy */
        'parent_item_colon' => __( 'Categoria Superior:', 'disproal' ), /* parent taxonomy title */
        'edit_item' => __( 'Editar Categoría', 'disproal' ), /* edit custom taxonomy title */
        'update_item' => __( 'Actualizar Categoría', 'disproal' ), /* update title for taxonomy */
        'add_new_item' => __( 'Añadir Nueva Categoría', 'disproal' ), /* add new title for taxonomy */
        'new_item_name' => __( 'Nueva Categoría', 'disproal' ) /* name title for taxonomy */
    ),
    'show_admin_column' => true,
    'show_in_rest' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite'   => array( 'slug' => 'productos', 'disproal' , 'with_front' => false ), /* you can specify its url slug */
    'has_archive' => true, /* you can rename the slug here */
    )
);
}
add_action( 'init', 'wptp_register_taxonomy' );
