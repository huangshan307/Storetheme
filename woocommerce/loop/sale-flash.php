<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;


?>
<?php if ( $product->is_on_sale() ) : ?>

	<?php
		/**
		 * Storetheme
		 */

		$price = get_post_meta( get_the_ID(), '_regular_price', true);
		$sale = get_post_meta( get_the_ID(), '_sale_price', true);
		$average = 0;

		if ( $sale && $price ) {
			$average = ( $sale / $price ) * 100;
			$average = round($average);
		}

	?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="badge-wrapper"><div class="badge fixed-width promotion"><div class="label-wrapper"><span class="percent">' . $average . '%</span><span class="off-label">' . esc_html__( 'Giảm', 'woocommerce' ) . '</span></div></div></div>', $post, $product ); ?>

<?php endif;

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
											

											