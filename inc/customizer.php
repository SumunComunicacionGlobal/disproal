<?php
/**
 * disproal Theme Customizer
 *
 * @package disproal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function disproal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'disproal_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'disproal_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'disproal_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function disproal_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function disproal_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function disproal_customize_preview_js() {
	wp_enqueue_script( 'disproal-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'disproal_customize_preview_js' );


/**
* Crear panel de opciones en el customizador
*/
function sumun_new_customizer_settings($wp_customize) {
    $web_title = get_bloginfo( 'name' );
    // create settings section
    $wp_customize->add_panel('sumun_opciones', array(
        'title'         => $web_title . ': ' . __( 'Opciones de configuración', 'sumun-admin' ),
        'description'   => __( 'Opciones para este sitio web', 'sumun-admin' ),
        'priority'      => 1,
    ));
    // $wp_customize->add_section('sumun_redes_sociales', array(
    //     'title'         => __( 'Redes sociales', 'sumun-admin' ),
    //     'priority'      => 20,
    //     'panel'         => 'sumun_opciones',
    // ));
    $wp_customize->add_section('sumun_ajustes', array(
        'title'         => __( 'Otros ajustes', 'sumun-admin' ),
        'priority'      => 20,
        'panel'         => 'sumun_opciones',
    ));



    // $redes_sociales = array(
    //     'email',
    //     'whatsapp',
    //     'linkedin',
    //     'twitter',
    //     'facebook',
    //     'instagram',
    //     'youtube',
    //     'skype',
    //     'pinterest',
    //     'flickr',
    //     'blog',
    // );
    // foreach ($redes_sociales as $red) {
    //     // add a setting
    //     $wp_customize->add_setting($red);
        
    //     // Add a control
    //     $wp_customize->add_control( $red,   array(
    //         'type'      => 'text',
    //         'label'     => 'URL ' . $red,
    //         'section'   => 'sumun_redes_sociales',
    //     ) );
    // }

    // add a setting
    $wp_customize->add_setting( 'url_catalogo', array(
    	'capability'		=> 'edit_theme_options',
    	'sanitize_callback'	=> 'disproal_sanitize_url',
    ) );
    
    // Add a control
    $wp_customize->add_control( 'url_catalogo',   array(
        'type'      => 'url',
        'label'     => 'Enlace al catálogo',
        'section'   => 'sumun_ajustes',
    ) );


    // $paginas = array(
    //     'contacto',
    // );
    // foreach ($paginas as $pagina) {

    //     $wp_customize->add_setting( $pagina . '_id', array(
    //       'capability' => 'edit_theme_options',
    //       'sanitize_callback' => 'sumun_sanitize_dropdown_pages',
    //     ) );

    //     $wp_customize->add_control( $pagina . '_id', array(
    //       'type' => 'dropdown-pages',
    //       'section' => 'sumun_ajustes', // Add a default or your own section
    //       'label' => __( 'Página de ' . $pagina ),
    //     ) );

    // }

}
add_action('customize_register', 'sumun_new_customizer_settings');

function disproal_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
