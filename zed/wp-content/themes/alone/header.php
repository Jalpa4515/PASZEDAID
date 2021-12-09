<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

	<div id="page" class="site">
		<?php alone_header_mobile_menu(); ?> 
		<?php alone_header(); ?>
		
		<style>
		header.bt-header.header-1{
		    top: 0px !important;
		}
		.fw-title-bar .fw-heading .fw-special-title {
                                                                font-family: 'Montserrat' !important;
                                                                font-size: 32px !important;
                                                                line-height: 38px !important;
                                                                letter-spacing: -1.5px !important;
                                                                color: #fff !important;
                                                                font-style: normal !important;
                                                                font-weight: 700 !important;
                                                                margin: 0 !important;
                                                                max-width: 700px !important;
                                                                display: inline-block !important;
                                                                padding-top: 50px !important;
                                                                position: relative !important;
                                                            }
		
			.bt-section-space {
				background-color: white !important;
			}

			.loadingBar,
			.loadingBarmodal {
				position: fixed;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;
				background: rgba(0, 0, 0, 0.7);
				z-index: 999999999;
			}

			.loadingBarText img,
			.loadingBarTextmodal img {
				width: 50px;
				position: absolute;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%);
				-webkit-animation: spin 1.5s linear infinite;
				-moz-animation: spin 1.5s linear infinite;
				animation: spin 1.5s linear infinite;
			}

			.xoo-lwo-form .xoo-ml-has-cc .xoo-ml-otp-submit-btn {
				display: none !important;
			}

			.woocommerce-form-login__submit, .woocommerce-form-register__submit{
				width: 100%;
			}
		</style>

		<div class="loadingBar" style="display: none;">
			<div class="loadingBarText">
				<img src="<?php echo BASE_URL; ?>loder.png" alt="loader">
			</div>
		</div>

		<div id="main" class="site-main">