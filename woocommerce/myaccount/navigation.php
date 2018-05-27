<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<div class="row">
	<div class="col-12">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a href="/tai-khoan" class="navbar-brand">Tài khoản</a>
			<button class="navbar-toggler d-block d-lg-none" type="button" data-toggle="collapse" data-target="#myaccount-navbarNav" aria-controls="myaccount-navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="myaccount-navbarNav">
				<ul class="navbar-nav">
					<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
						<li class="nav-item <?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
							<a class="nav-link" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</nav>
	</div>
</div>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
