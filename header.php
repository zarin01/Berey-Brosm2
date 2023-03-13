		<?php
		/**
		 * The Header for our theme.
		 *
		 * Displays all of the <head> section and everything up till <div id="content">
		 *
		 * @package Genesis Block Theme
		 */

		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?> class="no-js">
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Taviraj:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&family=Work+Sans:ital,wght@0,400;1,300;1,400&display=swap" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;1,300;1,400&display=swap" rel="stylesheet">
			
			<?php wp_head(); ?>
		</head>
		<div class="side-bar-left">
		<body <?php body_class(); ?>>
		
		
		

		<header id="masthead" class="site-header">
			<div class="header-number">
				<span class="nav-header">
					<h1>
					  Call  
					<button class="phone-btn"><a href="tel:+18889492668" class="phone-number">1-888-949-BOOT (2668)</a></button> 
					  OR  
					<button class="phone-btn"><a href="tel:2198445400" class="phone-number">(219) 844-5400</a></button>
					</h1>
				</span>
			</div>
			<div class="top-navigation">
				<!-- Mobile menu -->
				<?php get_template_part( 'template-parts/content-menu-drawer' ); ?>
							<!-- Main navigation -->
							<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Main', 'genesis-block-theme' ); ?>">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary',
										'fallback_cb'    => 'genesis_block_theme_fallback_menu',
									)
								);
								?>
							</nav><!-- .main-navigation -->
			</div><!-- .top-navigation -->
			<div alt="Truck with Berey Bros Logo" class="hero-image">
				<a href="/">
					<img src="https://bereybrosstg.wpengine.com/wp-content/uploads/2021/02/berey-bros-industrial-footwear-hammond-IL-300px-e1613147027659.jpg" class="logo-img" alt="Berey Bros. Industrial Footwear in Hammond, IN">
				</a>
				
			</div>
			<!-- Get the archive page titles -->
			<?php if ( is_archive() || is_search() || is_404() ) { ?>
				<div class="container text-container">
					<!-- <div class="header-text"> -->
						<?php genesis_block_theme_page_titles(); ?>
					<!-- </div>.header-text -->
				</div><!-- .text-container -->
			<?php } ?>
		</header><!-- .site-header -->
			

			
			