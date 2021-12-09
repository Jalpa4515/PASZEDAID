<?php

/**
 * Login Form with OTP
 *
 * This template can be overridden by copying it to yourtheme/templates/mobile-login-woocommerce/xoo-ml-otp-login-form.php
 *
 * HOWEVER, on occasion we will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen.
 * @see     https://docs.xootix.com/mobile-login-woocommerce/
 * @version 2.0
 */


if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

?>

<span class="xoo-ml-or"><?php _e('Or', 'mobile-login-woocommerce'); ?></span>

<button type="button" style="background: none !important;border: none;color: #08b4e4 !important;padding-left: 3px !important;text-transform: capitalize !important;font-size: 18px !important;" class="xoo-ml-open-lwo-btn button btn <?php echo implode(' ', $args['button_class']); ?> "><?php _e('Login via OTP', 'mobile-login-woocommerce'); ?></button>

<div class="xoo-ml-lwo-form-placeholder" <?php if ($args['login_first'] !== 'yes') : ?> style="display: none;" <?php endif; ?>>

	<?php echo xoo_ml_get_phone_input_field($args); ?>

	<input type="hidden" name="redirect" value="<?php echo $args['redirect']; ?>">

	<input type="hidden" name="xoo-ml-login-with-otp" value="1">

	<button type="submit" style="width: 100% !important;" class="xoo-ml-login-otp-btn <?php echo implode(' ', $args['button_class']); ?> "><?php _e('Login via OTP', 'mobile-login-woocommerce'); ?></button>

	<span class="xoo-ml-or"><?php _e('Or', 'mobile-login-woocommerce'); ?></span> 
	<br />
	<button type="button" style="background: none !important;border: none;color: #08b4e4 !important;padding-left: 3px !important;text-transform: capitalize !important;font-size: 18px !important;" class="xoo-ml-low-back <?php echo implode(' ', $args['button_class']); ?>"><?php _e('Login via Password', 'mobile-login-woocommerce'); ?></button>

</div>