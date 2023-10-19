<!-- testimonial section -->
<section class="testimonials pt-55 pb-41">
        <div class="testimonials-inner container">
            <div class="headingpart pb-41">
                <div class="text-center">
                    <div class="sectitle"><h3><?php if (!empty(get_field('testimonial_title'))) { echo get_field('testimonial_title'); } ?></h3></div>
                    <div class="secdesc"><p><?php if (!empty(get_field('testimonial_sub_title'))) { echo get_field('testimonial_sub_title'); } ?></p></div>
                </div>
            </div>     
            <div class="testimonialsliderbox">
                <div class="row">
                    <div class="productslidermain testimonialsslider">
                        <?php if( have_rows('testimonial_data') ): ?>
                        <ul class="testimonialslider">  
                            <?php while( have_rows('testimonial_data') ): the_row(); 
                                $clientmsg = get_sub_field('client_review');
                                $clientimg = get_sub_field('testimonial_image');
                                $clientname = get_sub_field('client_name');
                                $clientfrom = get_sub_field('client_sub_text');
                            ?>
                            <li>
                                <div class="testimonialbox">
                                    <div class="testimonial-data"><?php echo $clientmsg; ?></div>
                                    <div class="client-data">
                                        <div class="clientimg"><?php if (!empty($clientimg)) { ?><img src="<?php echo $clientimg; ?>" alt="author"><?php } ?></div>
                                        <div class="clientotherdata">
                                            <div class="client-name"><?php echo $clientname; ?></div>
                                            <div class="client-status"><?php echo $clientfrom; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php endwhile;?>   
                        </ul>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php wp_reset_query(); ?>
<!-- / testimonial end -->