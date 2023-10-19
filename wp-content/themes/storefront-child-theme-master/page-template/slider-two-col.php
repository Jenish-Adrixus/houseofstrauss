<section class="bannerSec homeSlider pt-23">
    <?php while( have_rows('homebanner') ): the_row(); 
        $bannertitle = get_sub_field('banner-title');
    ?>  
    <div class="bannerInner homebannerinner" style="background-image: url('<?php echo $bannerBgImg; ?>');">
        <div class="container">
            <div class="row align-items-center flex-row-reverse mobileslider">
                <?php $banner_image =  get_sub_field('bannerimage');?>
                <div class="col-md-6 col-12">
                    <div class="banner-image">
                    <?php if(! empty($banner_image)){ ?><img src="<?php echo $banner_image; ?>" alt="bannerimg"/> <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="banner-text-section text-left bannerCon">
                        <h1 class="bannerTitle"><?php echo $bannertitle; ?></h1>
                        <ul class="homepageSubtext">
                            <?php while( have_rows('banner-item-list') ): the_row(); 
                            $itemname =  get_sub_field('itemname'); ?>
                            <li class="listicon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.28" height="11.28" viewBox="0 0 11.28 11.28">
                                    <g id="prefix__Ellipse_34" data-name="Ellipse 34" style="stroke:#232323;fill:none">
                                        <circle cx="5.64" cy="5.64" r="5.64" style="stroke:none"/>
                                        <circle cx="5.64" cy="5.64" r="5.14" style="fill:none"/>
                                    </g>
                                </svg><?php echo $itemname; ?>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>                
        </div>            
    </div>
    <?php endwhile; ?>
</section>
