<div class="headertop">
		<div class="container">
			<div class="row justify-content-between align-items-center headertopsec">
				<div class="headerwelcometext"><?php echo the_field('left_headertop', 'option'); ?></div>
				<div class="headertop-righttext">
					<a href="<?php echo get_field('right_sec_1_link', 'option'); ?>"><?php echo the_field('right_sec_1_text', 'option'); ?></a>
					<a href="<?php echo get_field('right_sec_2_link', 'option'); ?>"><?php echo the_field('right_sec_2_text', 'option'); ?></a>
				</div>
			</div>
		</div>	
	</div>
	<header class="headerMain">
		<div class="headerlogosection">
			<div class="container">
				<div class="row justify-content-between align-items-center headerbottomsec">
					
					<div class="col-auto mainlogo">
						<a class="logo" href="<?php echo site_url(); ?>" title="<?php echo bloginfo('name'); ?>">
						<?php storefront_site_title_or_logo(); ?>
						</a>
                    </div>
                    <!-- <div class="col-auto headleft-links">
						<a href="<?php //echo get_field('headerbottom_sec_link', 'option'); ?>"><?php echo the_field('headerbottom_sec_text', 'option'); ?></a>
					</div> -->
					<div class="col-auto headcartdiv d-flex">
                        <div class="menuMain">
                            <?php wp_nav_menu(
                                array(
                                    'menu'    => 'main-menu-head',
                                    'container'       => 'nav',
                                    'container_class' => 'nevbar',
                                    'menu_id' => '',
                                    'menu_class'=>'topMenu'
                                )
                            ); ?>
                        </div>
						<?php global $woocommerce;
							$cart_url = $woocommerce->cart->get_cart_url(); ?>
						<div class="mini-cartMain">
							<a href="<?php echo $cart_url; ?>" class="cartIcon"><i class="icon icon-cart"></i><span class="itemCount carCounts"><?php  echo WC()->cart->get_cart_contents_count(); ?></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- / Header End --> 