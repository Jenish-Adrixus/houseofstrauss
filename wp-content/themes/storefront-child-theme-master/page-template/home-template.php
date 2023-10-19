<?php

/**
 * Template name: Home page
 *
 */
$path = get_stylesheet_directory_uri();

get_header(); ?>

<section class="main-section">
    <div class="container">
        <div class="main-section-inner">
            <div class="common-section">
                <div class="main-sec-img">
                    <img src="<?php echo get_field('left_section_image'); ?>" alt="house of strauss">
                </div>
                <div class="main-sec-content">
                    <h3 class="main-sec-hed"><?php echo get_field('left_section_title'); ?></h3>
                    <p class="main-sec-text"><?php echo get_field('left_section_description'); ?></p>
                </div>
            </div>
            <div class="common-section">
                <div class="main-sec-img">
                    <img src="<?php echo get_field('right_section_image'); ?>" alt="house of strauss">
                </div>
                <div class="main-sec-content">
                    <h3 class="main-sec-hed"><?php echo get_field('right_section_title'); ?></h3>
                    <p class="main-sec-text"><?php echo get_field('right_section_description'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="login-info">
    <div class="container">
        <?php
        if ( !is_user_logged_in() ) {
        ?>
        <div class="info-box">
            <a class="reg-btn" href="<?php echo site_url(); ?>/register/">Registrierung</a>
            <a class="reg-btn" href="<?php echo site_url(); ?>/my-account/">Anmeldung</a>
        </div>
        <?php } else { ?>
            <div class="info-box">
            <a class="reg-btn" href="<?php echo site_url(); ?>/event-list/">Liste der Veranstaltungen</a>
        </div>

        <?php } ?>
    </div>
</section>

<?php
get_footer();
