<?php
/**
 * Customer Reset Password email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-reset-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $user_login ) ); ?>
<?php /* translators: %s: Store name */ ?>
<p><?php printf( esc_html__( 'Jemand hat ein neues Passwort für das folgende Konto auf %s:', 'woocommerce' ), esc_html( wp_specialchars_decode( get_option( 'blogname' ), ENT_QUOTES ) ) ); ?></p>
<?php /* translators: %s Customer username */ ?>
<p><?php printf( esc_html__( 'Benutzername: %s', 'woocommerce' ), esc_html( $user_login ) ); ?></p>
<p><?php esc_html_e( 'Wenn Sie diesen Antrag nicht gestellt haben, ignorieren Sie diese E-Mail einfach. Wenn Sie fortfahren möchten:', 'woocommerce' ); ?></p>
<p>
	<a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'id' => $user_id ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>"><?php // phpcs:ignore ?>
		<?php esc_html_e( 'Klicken Sie hier, um Ihr Passwort zurückzusetzen', 'woocommerce' ); ?>
	</a>
</p>
<p><?php esc_html_e( 'Danke fürs Lesen.', 'woocommerce' ); ?></p>

<?php //do_action( 'woocommerce_email_footer', $email ); ?>