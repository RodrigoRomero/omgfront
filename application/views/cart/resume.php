<table class="table cart">
	<tbody>
		<tr class="cart_item">
			<td class="cart-product-name">
				<strong>Cart Subtotal</strong>
			</td>
			<td class="cart-product-name">
				<span class="amount">$ <?php echo number_format($this->cart->total_items(), 2,",",".") ?></span>
			</td>
		</tr>
		<tr class="cart_item">
			<td class="cart-product-name">
				<strong>Shipping</strong>
			</td>

			<td class="cart-product-name">
				<span class="amount">Free Delivery</span>
			</td>
		</tr>
		<tr class="cart_item">
			<td class="cart-product-name">
				<strong>Total</strong>
			</td>
			<td class="cart-product-name">
				<span class="amount color lead"><strong>$ <?php echo number_format($this->cart->total(), 2,",",".") ?></strong></span>
			</td>
		</tr>
	</tbody>
</table>
