<?php 

$args = array(
    'post_type' => 'product',
    'meta_key' => 'total_sales',
    'limit' => 1,
    'orderby' => 'date',
    'posts_per_page' => -1
);
$products = new WP_Query( $args );

?>
<!-- recentproduct section -->
<section class="recentproduct">
    <div class="container">
        <div class="headingpart text-center pb-41">
            <div class="sectitle"><h3><?php if (!empty(get_field('new_arrival_title'))) { echo get_field('new_arrival_title'); } ?></h3></div>
            <div class="secdesc"><p><?php if (!empty(get_field('new_arrival_sub_title'))) { echo get_field('new_arrival_sub_title'); } ?></p></div>
        </div> 
        <div class="productsliderbox row">
            <div class="productslidermain">
                <ul class="recentproductslider">  
                <?php 
                while ( $products->have_posts() ) : $products->the_post(); 
                global $product; 
                ?>          
                    <li>
                    <div class="productbox text-center">
                            <div class="productname text-center"><a href="<?php the_permalink(); ?>" class=""><?php the_title(); ?></a></div>
                            <?php if ( $price_html = $product->get_price_html() ) : ?>
                                <div class="productprice text-center"><span class="saleprice"><?php echo $product->get_price_html(); ?></span></div>
                            <?php endif; ?>
                            <div class="productimage">
                            <?php if (has_post_thumbnail( $products->post->ID )) 
                            echo get_the_post_thumbnail($products->post->ID, 'shop_catalog'); 
                            else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="product placeholder Image" />'; ?>
                            </div>
                            <div class="productmoreinfo">
                                <div class="productoffer">New</div>
                                <div class="addtocartbtn">
                                    <div class="addtocarttext">
                                        <a href="<?php $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]'); echo $add_to_cart;?>" class="">Buy now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php  endwhile?>
                <?php wp_reset_query(); ?>
                </ul>
            </div>
        </div>

    </div>
</section>
<!-- / special offer section end -->