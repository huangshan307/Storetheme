<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="item-card">
	<div <?php post_class('item-wrapper position-relative mb-0'); ?>>
		<div class="link">
			<div class="card full shadow border-0">
				
				<?php
					/**
					 * woocommerce_before_shop_loop_item hook.
					 *
					 * @hooked woocommerce_template_loop_product_link_open - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item' );

					/**
					 * woocommerce_before_shop_loop_item_title hook.
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - remove
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 * @hooked storetheme_product_thumbnail_url - 10
					 */
					remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
					remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

					add_action( 'woocommerce_before_shop_loop_item_title', 'storetheme_product_thumbnail_url', 10 );

					do_action( 'woocommerce_before_shop_loop_item_title' );

					/**
					 * woocommerce_shop_loop_item_title hook.
					 *
					 * @hooked storetheme_content_product_detail_start - 10
					 * @hooked woocommerce_template_loop_product_title - 20
					 * @hooked storetheme_product_title - 20
					 */
					remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

					add_action( 'woocommerce_shop_loop_item_title', 'storetheme_content_product_detail_start', 10 );
					
					add_action( 'woocommerce_shop_loop_item_title', 'storetheme_product_title', 20 );

					do_action( 'woocommerce_shop_loop_item_title' );

					/**
					 * woocommerce_after_shop_loop_item_title hook.
					 *
					 * @hooked storetheme_content_product_reason_start - 1
					 * @hooked woocommerce_template_loop_rating - 5 - remove
					 * hooked storetheme_product_rating - 10
					 * @hooked woocommerce_template_loop_price - 10 - remove
					 * @hooked storetheme_product_price - 10
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked storetheme_content_product_reason_end - 15
					 * @hooked woocommerce_template_loop_add_to_cart - 20
					 * @hooked storetheme_content_product_detail_end - 20
					 */

					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

					remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'storetheme_content_product_reason_start', 1 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'storetheme_product_price', 10 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'storetheme_product_rating', 10 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'storetheme_content_product_reason_end', 15 );

					// add_action( 'woocommerce_after_shop_loop_item_title' ,'woocommerce_template_loop_add_to_cart', 20 );

					add_action( 'woocommerce_after_shop_loop_item_title', 'storetheme_content_product_detail_end', 20 );

					do_action( 'woocommerce_after_shop_loop_item_title' );


					/**
					 * woocommerce_after_shop_loop_item hook.
					 *
					 * @hooked woocommerce_template_loop_product_link_close - 5
					 * @hooked woocommerce_template_loop_add_to_cart - remove
					 */

					// remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

					do_action( 'woocommerce_after_shop_loop_item' );
					?>

			</div>
		</div>
		
	</div>
</div>
