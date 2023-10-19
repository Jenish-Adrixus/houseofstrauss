<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */
$path = get_stylesheet_directory_uri();

do_action('storefront_before_footer'); ?>
<!-- footer Section -->
<footer class="footer-main">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="footer-box">
                    <h6 class="footer-box-hed">Casino Zögernitz</h6>
                    <p class="footer-box-text">Döblinger Hauptstraße 76<br>1190 Wien</p>
                    <div class="footer-social-icons">
                        <ul class="footer-list">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-main-link">
                    <ul class="footer-list">
                        <?php
						wp_nav_menu(
							array(
								'menu'    => 'footer-menu',
								'container'       => 'nav',
                                'menu_class'           => 'footer-list',
							)
						)
						?>
                    </ul>
                </div>
                <div class="footer-main-link">
                    <ul class="footer-list">
                        <li>
                            <address class="footer-main-info">
                                Das Casino<br>Zögernitz<br>beherbergt<br>seit 2022 das
                            </address>
                        </li>
                        <li>
                            <img src="assets/images/houseofstrauss-white-logo.png" alt="">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row alterin-responsive">
                <div class="footer-box">
                    <p class="footer-list">
                        <a class="footer-main-info" href="javascript:void(0)">© Casino Zögernitz</a>
                    </p>
                </div>
                <div class="footer-main-link">
                     <ul class="footer-list">
                        <?php
						wp_nav_menu(
							array(
								'menu'    => 'footer-menu-2',
								'container'       => 'nav',
                                'menu_class'           => 'footer-list',
							)
						)
						?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- / footer Section end -->

</div><!-- / wrapper end -->
<a href="javascript:;" class="trans scrollTop" title="Scroll Top"><span></span></a>
<?php do_action('storefront_after_footer'); ?>


<?php wp_footer(); ?>
</body>

</html>