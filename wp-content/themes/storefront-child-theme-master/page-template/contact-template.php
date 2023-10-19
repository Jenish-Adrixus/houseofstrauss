<?php
/**
 * Template name: Contact Us
 *
 */
$path = get_stylesheet_directory_uri();
get_header(); ?>

<!-- contactform section -->

<section class="contactformsection">
    <div class="contactform-inner">
        <div class="container">
            <div class="contactformtitle">
                <?php if (!empty(get_field('contactform_title'))) { echo get_field('contactform_title'); } ?>
            </div>
            <div class="contactformdata"><?php if (!empty(get_field('contacform_shortcode'))) { echo do_shortcode(get_field('contacform_shortcode')); } ?></div>
        </div>     
    </div>
</section>

<!-- / contactform section -->

<?php
get_footer();
