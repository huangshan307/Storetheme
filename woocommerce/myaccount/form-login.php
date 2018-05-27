<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
	exit; // Exit if accessed directly.
}

?>



<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div id="customer_login">
	<?php //Login Begin  ?>
	
<?php endif; ?>

		<div class="modal login-ui" id="loginUI" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="<?php esc_html_e( 'Login', 'woocommerce' ); ?>" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content border-0">
				<div class="modal-header">
					<h2 class="modal-title w-100 text-center text-light" id="loginUITitle"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
					<a href="/" class="close" title="Trở về trang chủ"><span aria-hidden="true">&times;</span></a>
				</div>
				<div class="modal-body">

					<?php wc_print_notices(); ?>

					<form class="woocommerce-form woocommerce-form-login login border-0 m-3 p-0" method="post">

						<?php do_action( 'woocommerce_login_form_start' ); ?>

						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text border-0" id="basic-addon1"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control border-0" name="username" id="username" placeholder="<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
						</div>

						<div class="input-group mb-4">
							<div class="input-group-prepend">
								<span class="input-group-text border-0" id="basic-addon1"><i class="fas fa-unlock"></i></span>
							</div>
							<input class="form-control border-0" type="password" name="password" id="password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" />
						</div>

						<?php do_action( 'woocommerce_login_form' ); ?>

						<div class="login-button">
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							<div class="login-lostpass clearfix">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline float-left">
									<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
								</label>
								<p class="woocommerce-LostPassword lost_password float-right">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>
							</div>

							<button type="submit" class="d-block w-100 btn btn-add-to-cart text-light" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
						</div>

						<?php do_action( 'woocommerce_login_form_end' ); ?>

					</form>
				</div>

				</div>
			</div>
		</div>
		<script>
			$(document).ready( function () {
				$('#loginUI').modal('show');
			} );
		</script>
		<style>
			.modal-backdrop.show {
				opacity: 1 !important;
				background-color: #efefef !important;
			}
		</style>

		

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	<?php // Login End ?>

	<div class="u-column2 col-2">

		<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-FormRow form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
