<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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

do_action( 'woocommerce_before_edit_account_form' ); ?>

<div class="col-12">
	<div class="row justify-content-md-center">
		<form class="woocommerce-EditAccountForm edit-account col-12 col-md-6" action="" method="post">

			<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

			<div class="profile-info">
				<h3 class="title">Thông tin cá nhân</h3>

				<div class="form-group">
					<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?> <small>(Bắt buộc)</small></label>
					<input type="text" class="form-control" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				</div>

				<div class="form-group">
					<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?> <small>(Bắt buộc)</small></label>
					<input type="text" class="form-control" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
				</div>

				<div class="clear border-top mb-2"></div>

				<div class="form-group">
					<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <small>(Bắt buộc)</small></label>
					<input type="email" class="form-control" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
				</div>
			</div>

			<div class="change-password mt-5">
				<h3 class="title">
					<?php esc_html_e( 'Password change', 'woocommerce' ); ?>
				</h3>
				<div class="form-group">
					<label for="password_current">Mật khẩu hiện tại <small>(Bỏ trống nếu không đổi)</small></label>
					<input type="password" class="form-control" name="password_current" id="password_current" />
				</div>
				<div class="form-group">
					<label for="password_1">Mật khẩu mới <small>(Bỏ trống nếu không đổi)</small></label>
					<input type="password" class="form-control" name="password_1" id="password_1" />
				</div>
				<div class="form-group">
					<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
					<input type="password" class="form-control" name="password_2" id="password_2" />
				</div>
			</div>
			<div class="clear border-top mt-5"></div>

			<?php do_action( 'woocommerce_edit_account_form' ); ?>

			<div>
				<?php wp_nonce_field( 'save_account_details' ); ?>
				<button type="submit" class="btn text-light btn-add-to-cart w-100" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
				<input type="hidden" name="action" value="save_account_details" />
			</div>

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
		</form>
	</div>
	
</div>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
