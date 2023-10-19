<?php
$args1 = array(
    'post_type' => 'product',
    'orderby' =>'rand',
    'limit' => 1,
    'posts_per_page' => 6
);
$loop1 = new WP_Query( $args1 );
?>

<section class="ourproducts pt-55">
        <div class="ourproducts-inner">
            <div class="container">
                <div class="headingpart text-center pb-41">
                    <div class="sectitle"><h3><?php if (!empty(get_field('our_products_title'))) { echo get_field('our_products_title'); } ?></h3></div>
                    <div class="secdesc"><p><?php if (!empty(get_field('our_products_sub_title'))) { echo get_field('our_products_sub_title'); } ?></p></div>
                </div>    
                <div class="homeproducts">
                    <div class="row">
                        <div class="productsgrid">
                        <ul class="productsgrid-outer">            
                        <?php
                            while ( $loop1->have_posts() ) : $loop1->the_post(); 
                            global $product; ?>    
                                    
                            <li class="productsgrid-list">
                                <div class="productbox text-center">
                                    <div class="productname"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></div>
                                    <?php if ( $price_html = $product->get_price_html() ) : ?>
                                        <div class="productprice"><span class="saleprice"><?php echo $product->get_price_html(); ?></span></div>
                                    <?php endif; ?>
                                    <div class="productimage">
                                    <?php if (has_post_thumbnail( $loop1->post->ID )) 
                                    echo get_the_post_thumbnail($loop1->post->ID, 'shop_catalog'); 
                                    else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" />'; ?>
                                    </div>
                                    <div class="productmoreinfo">
                                        <div class="productoffer">New</div>
                                        <div class="addtocartbtn">
                                            <div class="addtocarttext">
                                                <a href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" class="">Buy now</a>
                                            </div>
                                            <div class="addtocarticon"><a href="javascript:void(0)"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" id="prefix__Group_7561" width="8.729" height="8.729" data-name="Group 7561" viewBox="0 0 8.729 8.729">
                                                <defs>
                                                    <style>
                                                        .prefix__cls-1{fill:none;stroke:#ff8744;stroke-width:2px}
                                                    </style>
                                                </defs>
                                                <path id="prefix__Line_130" d="M0 0L0 8.729" class="prefix__cls-1" data-name="Line 130" transform="translate(4.364)"/>
                                                <path id="prefix__Line_131" d="M0 0L8.729 0" class="prefix__cls-1" data-name="Line 131" transform="translate(0 4.364)"/>
                                                </svg> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile; ?> 
                        </ul>
                        </div>
                    </div>
                </div>
                <div class="viewallproduct">
                    <div class="viewallbtnbox text-center">
                        <div class="viewalltext"><a href="http://corona-store.appsandmore24.com/unsere-produkte/"> View All Products </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_query(); ?>