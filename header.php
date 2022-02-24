<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package disproal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/favicon.png">
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Ir al contenido', 'disproal' ); ?></a>

	<header id="masthead" class="site-header container">
		<div class="site-branding">
			<?php the_custom_logo();?>
		</div><!-- .site-branding -->
		
		<div class="site-btns-nav">
			<a href="#contacto" class="contact-nav-btn">
				<span class="screen-reader-text"><?php esc_html_e( 'Contacto', 'disproal' ); ?></span>
				<img src="<?php echo get_template_directory_uri().'/assets/icons/mail.svg';?>" />
			</a>
			<span class="open-nav-btn" onclick="openNav()">
				<span class="screen-reader-text"><?php esc_html_e( 'Menú', 'disproal' ); ?></span>
				<img src="<?php echo get_template_directory_uri().'/assets/icons/menu.svg';?>" />
			</span>
		</div>	
		
		<nav id="site-navigation" class="main-navigation">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

<script>
	function openNav() {
		document.getElementById("site-navigation").classList.add("open-navigation");
	}

	function closeNav() {
		document.getElementById("site-navigation").classList.remove("open-navigation");
	}
</script>
