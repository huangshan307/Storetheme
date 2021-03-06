<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();


function cart_empty_image() {
	$html = '<img class="card-img-top" src="' . get_template_directory_uri() . '/images/Cart.svg">';
	echo $html;
}

/**
 * @hooked wc_empty_cart_message - 10
 */

?>

<div class="row justify-content-md-center">
	<div class="col-12 col-md-6">
		<div class="card border-0">
			<?php cart_empty_image(); ?>
			<div class="card-body text-center">
				<h3 class="card-title">Giỏ hàng trống</h3>
				<?php do_action( 'woocommerce_cart_is_empty' ); ?>
				<?php
				if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
					<p class="return-to-shop">
						<a class="btn btn-add-to-cart text-light wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<i class="fas fa-angle-left"></i> <?php _e( 'Return to shop', 'woocommerce' ) ?>
						</a>
					</p>
				<?php endif; ?>

			</div>
		</div>
	</div>
</div>


