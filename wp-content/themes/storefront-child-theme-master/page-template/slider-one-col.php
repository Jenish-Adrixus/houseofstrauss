<section class="bannerSec homeSlider pt-23">
    <?php while( have_rows('home-page-single-banner') ): the_row(); 
        $bannertitle = get_sub_field('banner-title');
    ?>  
    <div class="bannerInner homebannerinner">
        <div class="container-fluid">
            <div class="row align-items-center flex-row-reverse mobileslider">
                <?php $banner_image =  get_sub_field('images');?>
                <div class="col-md-12 col-12">
                    <div class="banner-image">
                    <?php if(! empty($banner_image)){ ?><img src="<?php echo $banner_image; ?>" alt="bannerimg"/> <?php } ?>
                    </div>
                </div>
            </div>                
        </div>            
    </div>
    <?php endwhile; ?>
</section>
