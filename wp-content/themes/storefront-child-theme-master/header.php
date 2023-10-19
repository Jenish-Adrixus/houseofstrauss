<?php

/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<body <?php body_class(); ?>>

		<?php do_action('storefront_before_site'); ?>

		<!-- wrapper start -->
		<div class="wrapper">
			<!-- Header Start -->
			<!-- <header class="header-main header"> -->
				<!-- Header Start -->
				<header class="header">
					<div class="header-inner">
						<div class="header-social-wrap">
							<div class="header-social-icons">
								<a class="social-icon-link" href="https://www.facebook.com/houseofstraussvienna">
									<i class="fa-brands fa-facebook"></i>
								</a>
								<a class="social-icon-link" href="javascript:void(0)">
									<i class="fa-brands fa-youtube"></i>
								</a>
								<a class="social-icon-link" href="https://www.instagram.com/houseofstrauss_vienna">
									<i class="fa-brands fa-instagram"></i>
								</a>
							</div>
						</div>
						<button type="button" class="header-menu-wrap" aria-label="Toggle Menu">
							<i class="fa-solid fa-bars" id="menu-btn"></i>
						</button>
						<?php
						$logo = get_header_image();
						?>
						<div class="header-logo">
						<a class="logo" href="<?php echo site_url(); ?>" title="<?php echo bloginfo('name'); ?>">
						<?php storefront_site_title_or_logo(); ?>
						</a>
							<!-- <a href="<?php echo site_url(); ?>">
								<img src="<?php echo $logo; ?>" alt="site logo">
							</a> -->
						</div>
						<nav class="nav">
							<ul class="nav-menu-list">
								<li class="nav-menu-list-item">
									<a href="javascript:void(0)">Besuchen</a>
									<div class="tippy">
										<div class="tippy-box">
											<div class="tippy-content" data-state="visible">
												<?php
												wp_nav_menu(
													array(
														'menu'    => 'visit-menu',
														'container'       => 'nav',
														'container_class' => 'navbar',
													)
												)
												?>
											</div>
											<div class="tippy-arrow"></div>
										</div>
									</div>
								</li>
								<li class="nav-menu-list-item">
									<a href="javascript:void(0)">Mehr</a>
									<div class="tippy">
										<div class="tippy-box">
											<div class="tippy-content" data-state="visible">
												<?php
												wp_nav_menu(
													array(
														'menu'    => 'more-menu',
														'container'       => 'nav',
														'container_class' => 'navbar',
													)
												)
												?>
											</div>
											<div class="tippy-arrow"></div>
										</div>
									</div>
								</li>
								<li class="nav-menu-list-item nav-menu-item-active">
								
<?php
if (is_user_logged_in()) { ?>
	<a href="https://houseofstrauss.rankskipper.com/my-account/">
	Mein Konto
	</a>
<?php } else { ?>
	<a href="https://houseofstrauss.rankskipper.com/my-account/">
	Einloggen
	</a>
<?php } ?>
								</li>
							</ul>
						</nav>
						<!-- <div class="header-lang-wrap">
							<div class="region-root">
								<span class="region-lang">en</span>&nbsp;
								<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 4" width="8">
									<path fill="currentColor" d="M6 0H0l3 4 3-4z"></path>
								</svg>
							</div>
						</div> -->
					</div>
				</header>

				<div class="mobile-menu" id="mobileNavbar">
					<li class="mobile-menu-list-item nav-menu-item-active">
						<a href="/my-account/">Tickets</a>
					</li>
					<div class="mobile-menu-content">
						<?php
						wp_nav_menu(
							array(
								'menu'    => 'visit-menu',
								'container'       => 'nav',
								'container_class' => 'navbar',
							)
						)
						?>

						<?php
						wp_nav_menu(
							array(
								'menu'    => 'more-menu',
								'container'       => 'nav',
								'container_class' => 'navbar',
							)
						)
						?>
					</div>

					<div class="mobile-menu-social-wrap">
						<div class="mobile-menu-social-icons">
							<a class="social-icon-link" href="https://www.facebook.com/houseofstraussvienna">
								<i class="fa-brands fa-facebook"></i>
							</a>
							<a class="social-icon-link" href="javascript:void(0)">
								<i class="fa-brands fa-youtube"></i>
							</a>
							<a class="social-icon-link" href="https://www.instagram.com/houseofstrauss_vienna">
								<i class="fa-brands fa-instagram"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- Header End -->
			<!-- </header> -->
			<!-- Header end -->

			<?php
			// $headeroption = get_field('header-center-logo','option');
			// if (!$headeroption == "yes") 
			// { 
			// 	require_once('header-logo-nav-cart.php');
			// }
			// else{ require_once('header-center-logo.php'); }

			/**
			 * Functions hooked in to storefront_before_content
			 *
			 * @hooked storefront_header_widget_region - 10
			 * @hooked woocommerce_breadcrumb - 10
			 */
			//do_action( 'storefront_before_content' );
			?>
			<?php
			do_action('storefront_content_top');
