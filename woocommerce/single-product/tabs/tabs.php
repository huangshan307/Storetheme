<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>
	<div id="product-detail" class="col-12 product-detail">
		<div class="card box-shadow border-0 rounded-0">
			<ul class="tabs-head nav border-bottom" role="tablist">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
						<a class="nav-link text-dark font-weight-bold" href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
					</li>
				<?php endforeach; ?>
				<li class="comment_tab" id="tab-title-comment" role="tab" aria-controls="tab-comment">
					<a class="nav-link text-dark font-weight-bold" href="#tab-comment">Đánh giá</a>
				</li>
			</ul>
			<div class="tab-content">
				<?php foreach ( $tabs as $key => $tab ) : ?>
					<div class="tab-<?php echo esc_attr( $key ); ?>" id="tab-<?php echo esc_attr( $key ); ?>" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
						<div class="card-body pt-3">
							<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
						</div>
					</div>
				<?php endforeach; ?>
				<div class="tab-comment" id="tab-comment" aria-labelledby="tab-title-comment">
					<div class="card-body pt-3">
						<h2 class="tab-title font-weight-normal d-none">Đánh giá</h2>
						<?php  storetheme_display_comments(); ?>
					</div>
				</div>
				
			</div>
		</div>
	</div>

<?php endif; ?>