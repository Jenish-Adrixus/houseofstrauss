<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly 
?>

<?php do_action('wpo_wcpdf_before_document', $this->get_type(), $this->order); ?>

<table class="head container">
	<tr>
		<td class="header">
			<?php
			if ($this->has_header_logo()) {
				do_action('wpo_wcpdf_before_shop_logo', $this->get_type(), $this->order);
				$this->header_logo();
				do_action('wpo_wcpdf_after_shop_logo', $this->get_type(), $this->order);
			} else {
				$this->title();
			}
			?>
		</td>
		<td class="shop-info">
			<?php do_action('wpo_wcpdf_before_shop_name', $this->get_type(), $this->order); ?>
			<div class="shop-name">
				<h3><?php $this->shop_name(); ?></h3>
			</div>
			<?php do_action('wpo_wcpdf_after_shop_name', $this->get_type(), $this->order); ?>
			<?php do_action('wpo_wcpdf_before_shop_address', $this->get_type(), $this->order); ?>
			<div class="shop-address"><?php $this->shop_address(); ?></div>
			<?php do_action('wpo_wcpdf_after_shop_address', $this->get_type(), $this->order); ?>
		</td>
	</tr>
</table>

<?php do_action('wpo_wcpdf_before_document_label', $this->get_type(), $this->order); ?>

<h1 class="document-type-label">
	<?php if ($this->has_header_logo()) $this->title(); ?>
</h1>

<?php do_action('wpo_wcpdf_after_document_label', $this->get_type(), $this->order); ?>

<table class="order-data-addresses">
	<tr>
		<td class="address billing-address">
			<!-- <h3><?php _e('Billing Address:', 'woocommerce-pdf-invoices-packing-slips'); ?></h3> -->
			<?php do_action('wpo_wcpdf_before_billing_address', $this->get_type(), $this->order); ?>
			<?php $this->billing_address(); ?>
			<?php do_action('wpo_wcpdf_after_billing_address', $this->get_type(), $this->order); ?>
			<?php if (isset($this->settings['display_email'])) : ?>
				<div class="billing-email"><?php $this->billing_email(); ?></div>
			<?php endif; ?>
			<?php if (isset($this->settings['display_phone'])) : ?>
				<div class="billing-phone"><?php $this->billing_phone(); ?></div>
			<?php endif; ?>
		</td>
		<td class="address shipping-address">
			<?php if ($this->show_shipping_address()) : ?>
				<h3><?php _e('Ship To:', 'woocommerce-pdf-invoices-packing-slips'); ?></h3>
				<?php do_action('wpo_wcpdf_before_shipping_address', $this->get_type(), $this->order); ?>
				<?php $this->shipping_address(); ?>
				<?php do_action('wpo_wcpdf_after_shipping_address', $this->get_type(), $this->order); ?>
				<?php if (isset($this->settings['display_phone'])) : ?>
					<div class="shipping-phone"><?php $this->shipping_phone(); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</td>
		<td class="order-data">
			<table>
				<?php do_action('wpo_wcpdf_before_order_data', $this->get_type(), $this->order); ?>
				<?php if (isset($this->settings['display_number'])) : ?>
					<tr class="invoice-number">
						<th><?php echo $this->get_number_title(); ?></th>
						<td><?php $this->invoice_number(); ?></td>
					</tr>
				<?php endif; ?>
				<?php if (isset($this->settings['display_date'])) : ?>
					<tr class="invoice-date">
						<th><?php echo $this->get_date_title(); ?></th>
						<td><?php $this->invoice_date(); ?></td>
					</tr>
				<?php endif; ?>
				<tr class="order-number">
					<th><?php _e('Bestellnummer:', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
					<td><?php $this->order_number(); ?></td>
				</tr>
				<tr class="order-date">
					<th><?php _e('Bestelldatum:', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
					<td><?php $this->order_date(); ?></td>
				</tr>
				<?php if ($payment_method = $this->get_payment_method()) : ?>
					<tr class="payment-method">
						<th><?php _e('Zahlungsmethode:', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
						<td><?php echo $payment_method; ?></td>
					</tr>
				<?php endif; ?>
				<?php do_action('wpo_wcpdf_after_order_data', $this->get_type(), $this->order); ?>
			</table>
		</td>
	</tr>
</table>

<?php do_action('wpo_wcpdf_before_order_details', $this->get_type(), $this->order); ?>

<table class="order-details">
	<thead>
		<tr>
			<th class="product"><?php _e('Produkt', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
			<th class="quantity"><?php _e('Menge', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
			<th class="price"><?php _e('Preis', 'woocommerce-pdf-invoices-packing-slips'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->get_order_items() as $item_id => $item) : ?>
			<tr class="<?php echo apply_filters('wpo_wcpdf_item_row_class', 'item-' . $item_id, esc_attr($this->get_type()), $this->order, $item_id); ?>">
				<td class="product">
					<?php $description_label = __('Description', 'woocommerce-pdf-invoices-packing-slips'); // registering alternate label translation 
					?>
					<span class="item-name"><?php echo $item['name']; ?></span>
					<?php do_action('wpo_wcpdf_before_item_meta', $this->get_type(), $item, $this->order); ?>
					<span class="item-meta"><?php echo $item['meta']; ?></span>
					<dl class="meta">
						<?php $description_label = __('SKU', 'woocommerce-pdf-invoices-packing-slips'); // registering alternate label translation 
						?>
						<?php if (!empty($item['sku'])) : ?><dt class="sku"><?php _e('SKU:', 'woocommerce-pdf-invoices-packing-slips'); ?></dt>
							<dd class="sku"><?php echo esc_attr($item['sku']); ?></dd><?php endif; ?>
						<?php if (!empty($item['weight'])) : ?><dt class="weight"><?php _e('Weight:', 'woocommerce-pdf-invoices-packing-slips'); ?></dt>
							<dd class="weight"><?php echo esc_attr($item['weight']); ?><?php echo esc_attr(get_option('woocommerce_weight_unit')); ?></dd><?php endif; ?>
					</dl>
					<?php do_action('wpo_wcpdf_after_item_meta', $this->get_type(), $item, $this->order); ?>
				</td>
				<td class="quantity"><?php echo $item['quantity']; ?></td>
				<td class="tax"><?php echo $item['order_price']; ?></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr class="no-borders">
			<td class="no-borders">
				<div class="document-notes">
					<?php do_action('wpo_wcpdf_before_document_notes', $this->get_type(), $this->order); ?>
					<?php if ($this->get_document_notes()) : ?>
						<h3><?php _e('Notes', 'woocommerce-pdf-invoices-packing-slips'); ?></h3>
						<?php $this->document_notes(); ?>
					<?php endif; ?>
					<?php do_action('wpo_wcpdf_after_document_notes', $this->get_type(), $this->order); ?>
				</div>
				<div class="customer-notes">
					<?php do_action('wpo_wcpdf_before_customer_notes', $this->get_type(), $this->order); ?>
					<?php if ($this->get_shipping_notes()) : ?>
						<h3><?php _e('Anmerkungen für Kunden', 'woocommerce-pdf-invoices-packing-slips'); ?></h3>
						<?php $this->shipping_notes(); ?>
					<?php endif; ?>
					<?php do_action('wpo_wcpdf_after_customer_notes', $this->get_type(), $this->order); ?>
				</div>
			</td>
			<td class="no-borders" colspan="2">
				<table class="totals">
					<tfoot>
						<?php foreach ($this->get_woocommerce_totals() as $key => $total) :  ?>
							<tr class="<?php echo esc_attr($key); ?>">
								<th class="description"><?php echo $total['label']; ?></th>
								<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
							</tr>
						<?php endforeach; ?>
					</tfoot>
				</table>
			</td>
		</tr>
	</tfoot>
</table>

<div class="bottom-spacer"></div>

<?php
// echo  $this->order->data['total'];
// echo "<pre>";
// print_r($this->order);
// var_dump($this->order)
// echo "20% = >>>>>>>>>> " . $this->order->data['total']*20/100;

?>

<!-- custom-division start -->
<!-- <div class="custom-division">
	<div class="custom-table-section">
		<table class="custom-table"> -->
			<!-- <tr>
				<th class="main-heading" colspan="2"> Preise MwSt </th>
				<th class="sub-heading"> Insgesamter Preis </th>
				<th> - </th>
				<th class="sub-heading"> Kunstlergarge </th>
				<th> = </th>
				<th class="sub-heading"> Preis Saalmiete </th>
			</tr>
			<tr>
				<td colspan="2"> &nbsp; </td>
				<td> 6350,00 € </td>
				<td> - </td>
				<td> 2200,00 € </td>
				<td> = </td>
				<td> 4150,00 € </td>
			</tr>
			<tr>
				<th class="main-heading" colspan="2"> Netto austerechnen </th>
				<th class="sub-heading"> Kunstlergarge </th>
				<th> - </th>
				<th class="sub-heading"> 13% </th>
				<th> = </th>
				<th class="sub-heading"> Netto Preis </th>
			</tr>
			<tr>
				<td colspan="2"> &nbsp; </td>
				<td> 2200,00 € </td>
				<td> - </td>
				<td> 286,00 € </td>
				<td> = </td>
				<td> 1914,00 € </td>
			</tr> -->
			<!-- <tr>
				<td colspan="7"> &nbsp; </td>
			</tr> -->
			<!-- <tr>
				<th colspan="2"> &nbsp; </th>
				<th class="sub-heading"> Preis Saalmiete </th>
				<th> - </th>
				<th class="sub-heading"> 20% </th>
				<th> = </th>
				<th class="sub-heading"> Netto Preis </th>
			</tr>
			<tr>
				<td colspan="2"> &nbsp; </td>
				<td> 4150,00 € </td>
				<td> - </td>
				<td> 830,00 € </td>
				<td> = </td>
				<td> 3320,00 € </td>
			</tr> -->
			<!-- <tr>
				<td colspan="7"> &nbsp; </td>
			</tr> -->
			<!-- <tr>
				<th colspan="6"> &nbsp; </th>
				<th class="sub-heading"> Insgesamter Netto Preis </th>
			</tr>
			<tr>
				<td colspan="6"> &nbsp; </td>
				<td> € <?php //echo ($this->order->data['total'] - ($this->order->data['total']*13/100)); ?> </td>
			</tr> -->
			<!-- <tr>
				<td colspan="4"> &nbsp; </td>
				<td colspan="2"> MwSt (Kunstler) </td>
				<td> 286,00 €</td>
			</tr> -->
			<!-- <tr>
				<td colspan="6"> Insgesamter Netto Preis </td>
				<td>  € <?php //echo ($this->order->data['total'] - ($this->order->data['total']*13/100)); ?> </td>
			</tr>
			<tr>
				<td colspan="6"> MwSt </td>
				<td> € <?php //echo $this->order->data['total']*13/100; ?> </td>
			</tr>
			<tr>
				<td colspan="6"> Gesamt (Brutto) </td>
				<td> € <?php //echo $this->order->data['total']; ?> </td>
			</tr> -->
		<!-- </table>
	</div>
</div> -->
<!-- custom-division end -->

<?php do_action('wpo_wcpdf_after_order_details', $this->get_type(), $this->order); ?>

<?php if ($this->get_footer()) : ?>
	<div id="footer">
		<!-- hook available: wpo_wcpdf_before_footer -->
		<?php $this->footer(); ?>
		<!-- hook available: wpo_wcpdf_after_footer -->
	</div><!-- #letter-footer -->
<?php endif; ?>

<?php do_action('wpo_wcpdf_after_document', $this->get_type(), $this->order); ?>

