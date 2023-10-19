<?php
/**
 * Lost password confirmation text.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/lost-password-confirmation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notice( __( 'Die E-Mail zum Zurücksetzen des Passworts wurde gesendet.', 'woocommerce' ) );
?>

<p><?php echo esc_html( apply_filters( 'woocommerce_lost_password_confirmation_message', __( 'Eine E-Mail zum Zurücksetzen des Kennworts wurde an die für Ihr Konto hinterlegte E-Mail-Adresse gesendet, es kann jedoch einige Minuten dauern, bis sie in Ihrem Posteingang erscheint. Bitte warten Sie mindestens 10 Minuten, bevor Sie erneut versuchen, Ihr Passwort zurückzusetzen.', 'woocommerce' ) ) ); ?></p>
