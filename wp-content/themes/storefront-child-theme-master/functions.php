<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
//add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

if ( ! function_exists( 'add_script_style' ) ) {
    function add_script_style() {
        /* Register & Enqueue Styles. */
        
        wp_register_style( 'shop-theme-icon', get_stylesheet_directory_uri().'/assets/css/shop-theme-icon.css' );
        wp_enqueue_style( 'shop-theme-icon' );
        wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'bootstrap' );
        wp_register_style( 'slick-theme', get_stylesheet_directory_uri().'/assets/css/slick-theme.css' );
        wp_enqueue_style( 'slick-theme' );
        wp_register_style( 'slick', get_stylesheet_directory_uri().'/assets/css/slick.css' );
        wp_enqueue_style( 'slick' );
        wp_register_style( 'style', get_stylesheet_directory_uri().'/assets/css/style.css' );
        wp_enqueue_style( 'style' );
        wp_register_style( 'responsive', get_stylesheet_directory_uri().'/assets/css/responsive.css' );
        wp_enqueue_style( 'responsive' );

        /* Register & Enqueue scripts. */

        wp_register_script( 'custom-script', get_stylesheet_directory_uri().'/assets/js/bootstrap.min.js' );
        wp_enqueue_script( 'custom-script');
        wp_register_script( 'custom-script-2', get_stylesheet_directory_uri().'/assets/js/slick.min.js', array('jquery') );
        wp_enqueue_script( 'custom-script-2');
        wp_register_script( 'custom', get_stylesheet_directory_uri().'/assets/js/custom.js', array('jquery'));
        wp_enqueue_script( 'custom');

    }
}
add_action( 'wp_enqueue_scripts', 'add_script_style', 10 );
/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

/* New Custome Functions Start*/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

/* New Custome Functions end*/

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>	
	<span class="itemCount carCounts"><?php  echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.carCounts'] = ob_get_clean();
	return $fragments;
} 

// Utility function, to display BACS accounts detail
function get_bacs_account_details_html( $echo = true, $type = 'list' ) {

    ob_start();

    $gateway    = new WC_Gateway_BACS();
    $country    = WC()->countries->get_base_country();
    $locale     = $gateway->get_country_locale();
    $bacs_info  = get_option( 'woocommerce_bacs_accounts');

    // Get sortcode label in the $locale array and use appropriate one
    $sort_code_label = isset( $locale[ $country ]['sortcode']['label'] ) ? $locale[ $country ]['sortcode']['label'] : __( 'Sort code', 'woocommerce' );

    if( $type = 'list' ) :
    ?>
    <div class="woocommerce-bacs-bank-details">
    <h2 class="wc-bacs-bank-details-heading"><?php _e('Unsere Bankverbindung'); ?></h2>
    <?php
    $i = -1;
    if ( $bacs_info ) : foreach ( $bacs_info as $account ) :
    $i++;

    $account_name   = esc_attr( wp_unslash( $account['account_name'] ) );
    $bank_name      = esc_attr( wp_unslash( $account['bank_name'] ) );
    $account_number = esc_attr( $account['account_number'] );
    $sort_code      = esc_attr( $account['sort_code'] );
    $iban_code      = esc_attr( $account['iban'] );
    $bic_code       = esc_attr( $account['bic'] );
    ?>
    <h3 class="wc-bacs-bank-details-account-name"><?php echo $account_name; ?></h3>
    <ul class="wc-bacs-bank-details order_details bacs_details">
        <li class="iban"><?php _e('ACCOUNT'); ?>: <strong><?php echo $account_number; ?></strong></li>
        <li class="iban"><?php _e('BANKNAME'); ?>: <strong><?php echo $bank_name; ?></strong></li>
        <li class="bic"><?php _e('BIC'); ?>: <strong><?php echo $bic_code; ?></strong></li>
        <!-- <li class="bic"><?php _e('CODE'); ?>: <strong><?php echo $sort_code; ?></strong></li> -->
        <!-- <li class="iban"><?php _e('IBAN'); ?>: <strong><?php echo $iban_code; ?></strong></li> -->
        <!-- <li class="country"><?php //_e('LAND'); ?>: <strong>Deutschland</strong></li> -->
    </ul>
    <?php endforeach; endif; ?>
    </div>
    <?php
	endif;
    $output = ob_get_clean();
    return $output;
	// var_dump($output);
    // if ( $echo )
	// 	// echo '123';
    //     // echo $output;
    // else
    //     return $output;
}

// checkout field

//show attributes after summary in product single view
add_action('woocommerce_single_product_summary', function() {
	//template for this is in storefront-child/woocommerce/single-product/product-attributes.php
	global $product;
	echo $product->list_attributes();
}, 25);

//home page add to cart issue start

// function custom_add_to_cart_redirect() {
//     global $wp_query;
//     $queried_data  = $wp_query->get_queried_object();
//     $current_page_url = get_page_link( $queried_data->ID );
//     return $current_page_url;
// }
// add_filter( 'woocommerce_add_to_cart_redirect', 'custom_add_to_cart_redirect' );

//home page add to cart issue end

add_filter( 'woocommerce_order_button_text', 'new_custom_button_text' );
 
function new_custom_button_text( $button_text ) {
	return 'Zahlungspflichtig Buchen'; // new text is here 
}

/**
 * @snippet       Automatically Cancel Pending Orders After 1h
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 7
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
//  add_action( 'woocommerce_order_status_pending', 'bbloomer_cancel_failed_pending_order_event' );
  
//  function bbloomer_cancel_failed_pending_order_event( $order_id ) {
//     if ( ! wp_next_scheduled( 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) ) ) {
//        wp_schedule_single_event( time() + 3600, 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) );
//     }
//  }
  
//  add_action( 'bbloomer_cancel_failed_pending_order_after_one_hour', 'bbloomer_cancel_order' );
  
//  function bbloomer_cancel_order( $order_id ) {
//     $order = wc_get_order( $order_id );
//     wp_clear_scheduled_hook( 'bbloomer_cancel_failed_pending_order_after_one_hour', array( $order_id ) );
//     if ( $order->has_status( array( 'pending' ) ) ) { 
//        $order->update_status( 'cancelled', 'Pending order cancelled after 1 hour' );
//     }
//  }


/**
 * Change the wording of the password hint.
 *
 * @param string $hint
 * @return string
 */
add_filter( 'password_hint', 'change_password_hint_message' );
function change_password_hint_message( $hint ) {
    $hint = __( 'Tipp: Verwenden Sie Groß- und Kleinbuchstaben, Zahlen und Symbole, um die Aussagekraft zu erhöhen. ! " ? $ % ^ & ).', 'text-domain' );

    return $hint;
}

// for change password hint text to strong, weak text
add_action( 'wp_enqueue_scripts', 'my_strength_meter_localize_script' );
function my_strength_meter_localize_script() {
    wp_localize_script( 'password-strength-meter', 'pwsL10n', array(
        'empty'    => __( 'Passwortstärke unbekannt', 'theme-domain' ),
        'short'    => __( 'Sehr schwach', 'theme-domain' ),
        'bad'      => __( 'Schwach', 'theme-domain' ),
        'good'     => __( 'Mittel', 'theme-domain' ),
        'strong'   => __( 'Stark', 'theme-domain' ),
        'mismatch' => __( 'Fehlanpassung', 'theme-domain' )
    ) );
}

// for password change text
add_filter( 
    'password_change_email', 
    'wpse207879_change_password_mail_message', 
    10, 
    3 
  );
  function wpse207879_change_password_mail_message( 
    $pass_change_mail, 
    $user, 
    $userdata 
  ) {
    $subject = __('[%s] Geändertes Passwort');
    $new_message_txt = __( '
    
    Hallo ###USERNAME### 

    Diese Mitteilung bestätigt, dass Ihr Passwort auf ###SITENAME### geändert wurde.
    
    Wenn Sie Ihr Passwort nicht geändert haben, wenden Sie sich bitte an den Site-Administrator unter
    ###ADMIN_EMAIL###

    Diese E-Mail wurde an ###EMAIL### gesendet.

    Mit freundlichen Grüßen,
    Alle bei ###SITENAME###
    ###SITEURL###' );
    $pass_change_mail[ 'message' ] = $new_message_txt;
    $pass_change_mail[ 'subject' ] = $subject;
    return $pass_change_mail;
  }

  // Replace the default password change email
// add_filter('password_change_email', 'change_password_mail_message', 10, 3);
// function change_password_mail_message( $change_mail, $user, $userdata ) {
//     // Call Change Email to HTML function
//     add_filter( 'wp_mail_content_type', 'set_email_html_content_type' );
//     $message = "Hallo ###USERNAME### 

//     Diese Mitteilung bestätigt, dass Ihr Passwort auf ###SITENAME### geändert wurde.
    
//     Wenn Sie Ihr Passwort nicht geändert haben, wenden Sie sich bitte an den Site-Administrator unter
//     ###ADMIN_EMAIL###

//     Diese E-Mail wurde an ###EMAIL### gesendet.

//     Mit freundlichen Grüßen,
//     Alle bei ###SITENAME###
//     ###SITEURL###";

//     $change_mail[ 'message' ] = $message;
//     $change_mail[ 'subject' ] = '[%s] Password Changed';

//     return $change_mail;
// }


// // hook for login page 
// remove_filter( 'authenticate', 'wp_authenticate_username_password' );
// add_filter( 'authenticate', 'custom_authenticate_username_password', 30, 3 );
// /**
//  * Remove Wordpress filer and write our own with changed error text.
//  */
// function custom_authenticate_username_password( $user, $username, $password ) {
//     if (is_a($user, 'WP_User')){
//         return $user;
//     }
    
//     if (empty($username) || empty($password)) {
//         $error = new WP_Error();
//         if (empty($username )){
//             $error->add('empty_email', __('test The username or email field is empty.'));
//         }

//         if (empty($password)){
//             $error->add('empty_password', __( 'test The password field is empty' ));
//         }
//         return $error;
//     }

//     $user = get_user_by( 'login', $username );
//     if (!$user){
//         return new WP_Error( 'invalid_username', sprintf( __( 'test  Invalid username or email address.' ), wp_lostpassword_url()));
//     }
//     $user = apply_filters( 'wp_authenticate_user', $user, $password );
//     if (is_wp_error($user)){
//         return $user;
//     }
//     if (!wp_check_password( $password, $user->user_pass, $user->ID )){
//         return new WP_Error( 'incorrect_password', sprintf( __( 'tes tThe password you\'ve entered is incorrect.' ),
//         $username, wp_lostpassword_url() ) );
//     }
//     return $user;
// }

// add_filter('login_errors','login_error_message');

// function login_error_message($error){
//     //check if that's the error you are looking for
//     $pos = strpos($error, 'incorrect');
//     if (is_int($pos)) {
//         //its the right error so you can overwrite it
//         $error = "Wrong information";
//     }
//     return $error;
// }