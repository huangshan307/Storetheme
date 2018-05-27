<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function enter_pass_image() {
	$html = '<img class="card-img-top" src="' . get_template_directory_uri() . '/images/enter-password.svg">';
	echo $html;
}

wc_print_notices(); ?>

<form method="post" class="woocommerce-ResetPassword lost_reset_password row justify-content-md-center">
	<div class="col-12 col-md-6">
		<div class="card border-0">
			<?php enter_pass_image(); ?>
			<div class="card-body text-center">
				<h3 class="card-title">Quên mật khẩu?</h3>
				<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>
				<p class="form-group">
					<label class="d-none" for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
					<input class="woocommerce-Input woocommerce-Input--text form-control" type="text" name="user_login" id="user_login" placeholder="<?php esc_html_e( 'Username or email', 'woocommerce' ); ?>" />
				</p>

				<?php do_action( 'woocommerce_lostpassword_form' ); ?>

				<p>
					<input type="hidden" name="wc_reset_password" value="true" />
					<button type="submit" class="btn btn-add-to-cart text-light" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
				</p>
			</div>
		</div>
	</div>
	

	

	<div class="clear"></div>

	

	

	<?php wp_nonce_field( 'lost_password' ); ?>

</form>
