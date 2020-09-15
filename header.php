<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
<head>
    	<!-- Metas -->
        <meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="keywords" content="mddalwar" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<meta name="author" content="" />

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" />

		<?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>

    	<!-- =====================================
    	==== Start Loading -->

    	<div class="loading">
    		<div class="text-center middle">
    			<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    		</div>
    	</div>
        
    	<!-- End Loading ====
    	======================================= -->

		<!-- =====================================
    	==== Start Navbar -->

		<nav class="navbar navbar-expand-lg blog-nav">
			<div class="container">

            <!-- Logo -->
            <a class="logo header-logo" href="<?php echo home_url(); ?>">
                <img src="<?php $header_logo = wp_get_attachment_image_src(get_theme_mod('header_logo', get_template_directory_uri() . '/assets/img/logo-dark.png')); echo $header_logo[0]; ?>" alt="<?php bloginfo('name'); ?>">
            </a>

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="icon-bar"><i class="fas fa-bars"></i></span>
			  </button>

			  <?php 
			  	$menu_args = array(
			  		'menu_class'		=> 'navbar-nav ml-auto',
			  		'container_class'	=> 'collapse navbar-collapse',
			  		'container_id'		=> 'navbarSupportedContent',
			  		'theme_location'	=> 'primary',
			  		'walker'			=> new Portfolio_Nav_Walker(),
			  		'fallback_cb'		=> 'portfolio_primary_menu_fallback'
			  	);
			  	wp_nav_menu($menu_args);
			  ?>
		</nav>

    	<!-- End Navbar ====
    	======================================= -->
