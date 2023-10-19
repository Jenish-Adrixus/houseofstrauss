<?php
$prod_categories = get_terms( 'product_cat', [
    'orderby'    => 'name',
    'order'      => 'ASC',
    'hide_empty' => true
]);

$products = new WP_Query([
    'post_type'      => 'product',
    'posts_per_page' => -1
]);

?>

<section class="commonSec productSec">
        <div class="container">
            <div class="headingpart text-center pb-41">
                <div class="sectitle"><h3><?php if (!empty(get_field('our_products_title'))) { echo get_field('our_products_title'); } ?></h3></div>
                <div class="secdesc"><p><?php if (!empty(get_field('our_products_sub_title'))) { echo get_field('our_products_sub_title'); } ?></p></div>
            </div> 
			 <div class="mainTabview">
				<div class="col-md-12 text-center">
					<button class="active btn btn-default filter-button" data-filter="all">Alle</button>
					<?php foreach($prod_categories as $k => $prod_cat): ?>
						<button class="btn btn-default filter-button <?= ($k >= 5) ? 'add-cat display-none' : '' ?>" data-filter="<?= sanitize_title($prod_cat->name) ?>"><?= $prod_cat->name ?></button>
					<?php endforeach; ?>
					<button class="btn btn-default btn-more" data-filter="more">Mehr</button>
					<button class="btn btn-default btn-less display-none" data-filter="more">Weniger</button>
				</div>

				<?php 
					echo do_shortcode('[products orderby="menu_order" order="DESC" class="product-tab" visibility="visible"]');
				?>  
			</div>
			
            
            <?php $shop_button = get_field('shop_button');
                if(! empty($shop_button)) { ?>
            <div class="proBottom">
            	<a class="btn btn-shop" href="<?php echo $shop_button['url']; ?>" title="<?php echo $shop_button['title']; ?>" target="<?php echo $shop_button['target']; ?>">Weitere Produkte</a>
            </div>
        <?php } ?>
        </div>
    </section>