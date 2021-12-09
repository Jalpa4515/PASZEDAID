<?php

/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />

<style>
	.woocommerce-MyAccount-navigation {
		display: none !important;
	}

	.woocommerce-account .woocommerce-MyAccount-content {
		width: 100% !important;
	}

	.sideways a {
		color: #0ec4f7 !important;
	}

	.tabs-left {
		border-bottom: none;
		border-right: 1px solid #ddd;
	}

	.tabs-left>li {
		float: none;
		margin: 0px;

	}

	.tabs-left>li.active>a,
	.tabs-left>li.active>a:hover,
	.tabs-left>li.active>a:focus {
		border-bottom-color: #ddd;
		border-right-color: transparent;
		background: #0ec4f7;
		border: none;
		border-radius: 0px;
		margin: 0px;
		color: #000 !important;
	}

	.nav-tabs>li>a:hover {
		/* margin-right: 2px; */
		line-height: 1.42857143;
		border: 1px solid transparent;
		/* border-radius: 4px 4px 0 0; */
	}

	.tabs-left>li.active>a::after {
		content: "";
		position: absolute;
		top: 10px;
		right: -10px;
		border-top: 10px solid transparent;
		border-bottom: 10px solid transparent;

		border-left: 10px solid #0ec4f7;
		display: block;
		width: 0;
	}

	.maind {
		padding: 15px;
		border: 1px solid #999;
		border-radius: 15px;
		background-color: #0ec4f7;
		width: 40% !important;
	}

	.maind2 {
		padding: 25px;
		border: 1px solid #999;
		border-radius: 15px;
	}

	.bt-default-page.bt-main-row.bt-section-space {
		background-color: white;
	}

	.row {
		margin-right: 0px !important;
		margin-left: 0px !important;
		margin-top: 10px !important;
	}
</style>

<?php
global $wpdb;
$user = wp_get_current_user();
$userId = $user->ID;
$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND userId =" . $userId, OBJECT);

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
	$res = $resultsc[0];
	$idd = $_GET['id'];
} else {
	$res = $results[0];
	$idd = $res->id;
}
$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $idd;
$resultsipa = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE campaign_Id IN(" . $idd . ")", ARRAY_A);

foreach ($results as $resv) {
	$cid[] = $resv->id;
}
if ($cid) {
	$acids = implode(",", $cid);
}


$resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $idd . ")", OBJECT);
// echo '<pre>';
// print_r($resultsdona);
$ddd = date("Y-m-d");
$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND DATE_FORMAT(created_at, '%Y-%m-%d') = '" . $ddd . "' AND campaign_Id IN(" . $idd . ")", ARRAY_A);

$achieve_amountc = 0;
foreach ($resultsdonacc as $tt) {
	if ($tt['campaign_typeId'] == 3) {
		$achieve_amountcn = $tt['amount'] ? $tt['amount'] * $res->product_price : 0;
	} else {
		$achieve_amountcn = $tt['amount'] ? $tt['amount'] : 0;
	}
	$achieve_amountc += $achieve_amountcn;
}

if ($results) {
	?>


	<div class="col-sm-12">
		<div class="col-xs-3" style="width: 15% !important;">
			<!-- required for floating -->
			<!-- Nav tabs -->
			<?php
				$overv = 'active';
				$withd = '';
				if (isset($_GET['i']) && $_GET['i'] == 'withdraw') {
					$withd = 'active';
					$overv = '';
				}
				?>
			<ul class="nav nav-tabs tabs-left sideways">
				<li class="<?= $overv ?>"><a href="#home-v" data-toggle="tab">Overview</a></li>
				<li><a href="#profile-v" data-toggle="tab">Promote</a></li>
				<!-- <li><a href="#bank-v" data-toggle="tab">Bank Beneficiary</a></li> -->
				<li class="<?= $withd ?>"><a href="#messages-v" data-toggle="tab">Withdraw</a></li>
				<li><a href="#settings-v" data-toggle="tab">Donations</a></li>
			</ul>
		</div>

		<div class="col-xs-9" style="width: 85% !important;">
			<!-- Tab panes -->
			<div class="tab-content">

				<div class="tab-pane <?= $overv ?>" id="home-v">

					<select style="background: none;width: 40%;" class="maleft fundlist ">
						<?php
							foreach ($results as $resc) {
								if ($res->id == $resc->id) {
									$sel = "selected";
								} else {
									$sel = "";
								}
								if ($resc->campaign_typeId == 2) {
									$fundtitle = $resc->item_name;
								} else if ($resc->campaign_typeId == 3) {
									$fundtitle = $resc->product_name;
								} else {
									$fundtitle = $resc->fundraiser_title;
								}
								?>
							<option <?php echo $sel; ?> value="<?php echo $resc->id; ?>"><?php echo $fundtitle; ?></option>
						<?php
							}
							?>
					</select>
					<div class="row">

						<div class="maind col-xs-6">

							<script>
								jQuery(".fundlist").change(function() {
									var newurl = "<?php echo BASE_URL . 'my-account/?id=' ?>" + this.value;
									location.href = newurl;
								});
							</script>

							<div class="card maleft matop2">
								<div class="card-body">

									<?php
										if ($res->zed_verified) {
											?>
										<span style="font-size: 15px;color: #3E3E8D !important;"><b>ZED Verified</b></span><br>
									<?php
										}
										?>

									<span>
										Goal:
										<?php

											if ($res->campaign_typeId == 2) {
												$goal_amount = $res->item_qty;
												$currency = 'QTY';
											} else if ($res->campaign_typeId == 3) {
												$goal_amount = $res->product_price * $res->product_qty;
												$currency = $res->currency;
											} else {
												$goal_amount = $res->goal_amount;
												$currency = $res->currency;
											}
											?>
										<?php echo $currency; ?>
										<?php echo $goal_amount; ?>
									</span>
									<br>
									<span>

										<?php
											if ($res->campaign_typeId == 3) {
												echo $res->achieve_amount ? $res->achieve_amount * $res->product_price : 0; ?> raised
										<?php } else {
												?>
											<?php
													echo $res->achieve_amount ? $res->achieve_amount : 0; ?> raised
										<?php
											}
											?>

									</span>
								</div>
							</div>
						</div>
						<div class="col-xs-1"></div>
						<div class="col-xs-5 " style="width: 60% !important;">
							<div _ngcontent-roe-c147="" class="d-flex maleft matop2">

								<div _ngcontent-roe-c147="" class="card-default ml-0" style="display: inline;float: left;float: left;padding: 15px;border: 1px solid #999;border-radius: 15px;min-width: 120px;">
									<div _ngcontent-roe-c147="" class="icon" style="display: inline;float: left;margin-top: 6px;"><span _ngcontent-roe-c147="" class="material-icons">remove_red_eye</span></div>
									<div _ngcontent-roe-c147="" class="amount" style="display: inline;float: left;margin-left: 10px;line-height: 20px;"><span _ngcontent-roe-c147="" class="amnt"><?= count($resultsipa); ?></span><span _ngcontent-roe-c147="" class="subtext"> <br>Views</span></div>
								</div>

								<div _ngcontent-roe-c147="" class="card-default maleft mr-0" style="display: inline;float: left;float: left;padding: 15px;border: 1px solid #999;border-radius: 15px;min-width: 120px;margin-left: 10px;">
									<div _ngcontent-roe-c147="" class="icon" style="display: inline;float: left;margin-top: 6px;"><span _ngcontent-roe-c147="" class="material-icons">favorite</span></div>

									<div _ngcontent-roe-c147="" class="amount" style="display: inline;float: left;margin-left: 10px;line-height: 20px;"><span _ngcontent-roe-c147="" class="amnt"><?php echo $currency; ?> <?= $achieve_amountc; ?></span><span _ngcontent-roe-c147="" class="subtext"> <br>Raised Today</span></div>

									<!-- <div _ngcontent-roe-c147="" class="amount" style="display: inline;float: left;margin-left: 10px;line-height: 20px;"><span _ngcontent-roe-c147="" class="amnt">
										<app-currency _ngcontent-roe-c147="" _nghost-roe-c142=""><span _ngcontent-roe-c142=""><?php echo $currency; ?></span></app-currency> <?= $achieve_amountc; ?>
									</span><span _ngcontent-roe-c147="" class="subtext"> <br>Raised Today</span></div> -->
								</div>

								<div _ngcontent-roe-c147="" class="card-default maleft mr-0" style="display: inline;float: left;float: left;padding: 15px;border: 1px solid #999;border-radius: 15px;min-width: 120px;margin-left: 10px;">
									<div _ngcontent-roe-c147="" class="icon" style="display: inline;float: left;margin-top: 6px;"><span _ngcontent-roe-c147="" class="material-icons">groups</span></div>
									<div _ngcontent-roe-c147="" class="amount" style="display: inline;float: left;margin-left: 10px;line-height: 20px;"><span _ngcontent-roe-c147="" class="amnt"><?php echo count($resultsdona); ?></span><span _ngcontent-roe-c147="" class="subtext"> <br>Total Donors</span></div>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="profile-v">

					<div class="row">

						<!-- <div class="maind col-xs-6">

						<script>
							jQuery(".fundlist").change(function() {
								var newurl = "<?php echo BASE_URL . 'my-account/?id=' ?>" + this.value;
								location.href = newurl;
							});
						</script>

						<div class="card maleft matop2">
							<div class="card-body">

								<span>
									Goal:
									<?php

										if ($res->campaign_typeId == 2) {
											$goal_amount = $res->item_qty;
											$currency = 'QTY';
										} else if ($res->campaign_typeId == 3) {
											$goal_amount = $res->product_price * $res->product_qty;
											$currency = $res->currency;
										} else {
											$goal_amount = $res->goal_amount;
											$currency = $res->currency;
										}
										?>
									<?php echo $currency; ?>
									<?php echo $goal_amount; ?>
								</span>
								<br>
								<span>

									<?php
										if ($res->campaign_typeId == 3) {
											echo $res->achieve_amount ? $res->achieve_amount * $res->product_price : 0; ?> raised
									<?php } else {
											?>
										<?php
												echo $res->achieve_amount ? $res->achieve_amount : 0; ?> raised
									<?php
										}
										?>

								</span>
							</div>
						</div>
					</div>
					<div class="col-xs-1"></div> -->
						<div class="col-xs-5 " style="padding: 10px;width: 51% !important;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;background-color: #fff;">
							<style>
								.share-post-item {
									color: #fff !important;
									text-decoration: none !important;
								}
							</style>
							<h5 style="font-family: inherit !important;">Share</h5>
							<div style="background-color: #25d366;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;"><a class="share-post-item s-facebook" href="https://web.whatsapp.com/send?text=<?php echo $shareurl; ?>" data-action="share/whatsapp/share" target="_blank" data-original-title="Share on Whatsapp"><i class="fa fa-whatsapp" aria-hidden="true" style="font-weight: bold;font-size:20px;"></i>&nbsp;&nbsp;Share On Whatsapp</a></div>

							<div style="background-color: #3b5998;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;margin-top:10px;"><a class="share-post-item s-facebook" href="https://www.facebook.com/sharer.php?u=<?php echo $shareurl; ?>/" target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on Facebook"><i class="fa fa-facebook-square" aria-hidden="true" style="font-weight: bold;font-size:20px;"></i>&nbsp;&nbsp;Share On Facebook</a></div>

							<!-- <div style="background-color: #0078ff;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;margin-top:10px;">Share On Messenger</div> -->

							<div style="background-color: #1da1f2;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;margin-top:10px;"><a class="share-post-item s-twitter" href="https://twitter.com/share?url=<?php echo $shareurl; ?>/&amp;text=<?php echo $fundtitle; ?>" target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on Twitter"><i class="fa fa-twitter" aria-hidden="true" style="font-weight: bold;font-size:20px;"></i>&nbsp;&nbsp;Share On Twitter</a></div>

							<div style="background-color: #be362b;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;margin-top:10px;"><a class="share-post-item s-email" href="mailto:?subject=Your Subject&amp;body=Check out this fundraiser <?php echo $shareurl; ?>." target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on Email"><i class="fa fa-envelope" aria-hidden="true" style="font-weight: bold;font-size:20px;"></i>&nbsp;&nbsp;Share Via Email</a></div>

							<input type="text" style="display:none;" id="myInput" value="<?php echo $shareurl; ?>">
							<p id="p1" style="display:none;"><?php echo $shareurl; ?></p>
							<div style="background-color: #fff;border: black 1px solid;padding: 10px;color: white;font-weight: bold;text-align: center;box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;margin-top:10px;"><a class="share-post-item s-twitter" href="javascript:void(0)" onclick="copyToClipboard('#p1')" data-toggle="tooltip" title="" data-share-post="" data-original-title="Copy Share Link" style="color:black !important;"><i class="fa fa-link" aria-hidden="true" style="font-weight: bold;font-size:20px;"></i>&nbsp;&nbsp;Copy Share Link</a></div>

							<script>
								function copyToClipboard(element) {

									var $temp = jQuery("<input>");
									jQuery("body").append($temp);
									$temp.val(jQuery(element).text()).select();
									document.execCommand("copy");
									$temp.remove();

									jQuery("#copiedtext").modal('show');
								}
							</script>

							<div class="modal fade" id="copiedtext" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">

										<div class="modal-body">

											Copied on clipboard

										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>

				<div class="tab-pane <?= $withd ?>" id="messages-v">

					<?php

						if (isset($_GET['i']) && $_GET['i'] == 'withdraw') {
							?>
						<p id="successMessage">Beneficiary submitted successfully.</p>
						<script>
							setTimeout(function() {
								jQuery('#successMessage').fadeOut('fast');
							}, 5000);

							// jQuery(function() {
							// 	alert("!");
							// 	// setTimeout() function will be fired after page is loaded
							// 	// it will wait for 5 sec. and then will fire
							// 	// $("#successMessage").hide() function
							// 	setTimeout(function() {
							// 		alert("1");
							// 		jQuery("#successMessage").hide('blind', {}, 500)
							// 	}, 5000);
							// });
						</script>
					<?php
						}

						$resultsbank = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}beneficiary WHERE status = 1 AND userId = '" . $userId . "'", ARRAY_A);


						if ($resultsbank) {
							?>
						<b>Account Number:</b> <?= substr_replace($resultsbank[0]['account_number'], 'XXXX', 4, 8); ?><br />
						<b>Account Holder Name:</b> <?= $resultsbank[0]['fullName']; ?>

						<?php

								foreach ($results as $res) {
									$cids[] = $res->id;
								}

								$acids = implode(",", $cids);

								// echo "SELECT achieve_amount, withdrawal_amount, id FROM {$wpdb->prefix}campaigns WHERE `id` IN (" . $acids . ") AND achieve_amount != '' GROUP by id";

								$resultsbankcam = $wpdb->get_results("SELECT achieve_amount, withdrawal_amount, id FROM {$wpdb->prefix}campaigns WHERE campaign_typeId = 1 AND `id` IN (" . $idd . ") AND achieve_amount != '' GROUP by id", ARRAY_A);
								?>

						<style>
							.table>thead>tr>th,
							.table>tbody>tr>th,
							.table>tfoot>tr>th,
							.table>thead>tr>td,
							.table>tbody>tr>td,
							.table>tfoot>tr>td {
								padding: 20px !important;
								border: 0px !important;
							}

							.table>tbody {
								border-spacing: 0px !important;
							}
						</style>

						<table class="table table-hover" style="border-collapse: separate;border-spacing:0 20px; border:0px;">
							<tbody>
								<?php
										if ($resultsbankcam) {
											foreach ($resultsbankcam as $resul) {

												$totamt = $resul['achieve_amount'] - $resul['withdrawal_amount'];

												$resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $resul['id'], OBJECT);

												$recs = $resultscc[0];
												$campaign_typeId = $recs->campaign_typeId;
												$campaign_Id = $recs->id;

												if ($recs->campaign_typeId == 2) {
													$fundtitle = $recs->item_name;
												} else if ($recs->campaign_typeId == 3) {
													$fundtitle = $recs->product_name;
												} else {
													$fundtitle = $recs->fundraiser_title;
												}

												if ($recs->campaign_typeId == 2) {
													$goal_amount = $recs->item_qty;
													$currency = 'QTY';
												} else if ($recs->campaign_typeId == 3) {
													$goal_amount = $recs->product_price;
													$currency = $recs->currency;
												} else {
													$goal_amount = $recs->goal_amount;
													$currency = $recs->currency;
												}

												?>
										<tr id="withdrawdiv<?php echo $resul['id']; ?>" style="box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;">

											<td>

												<div style="margin-bottom:10px;"><?php echo $fundtitle; ?></div>

												<span class="subdetail" style="font-size: 15px;">

													<div style="margin-top:10px;"> <b>Available Balance: <?php echo $currency; ?> <?php echo $totamt; ?></b> </div>

												</span>

											</td>


											<td width="50%" class="align-middle text-right">

												<?php
																// $totamtaa = ($totamt * 2) / 100;

																$perc = ($totamt * 2) / 100;
																$zedprice = $totamt - $perc;

																$perc2 = ($zedprice * 2) / 100;
																$totamtaa = $zedprice - $perc2;

																?>

												<input style="width: 50%;margin-left: 50%;" type="number" max="<?= $totamt ?>" id="withdrawamt" value="<?= $totamt ?>" name="withdrawamt" class="form-control">

												<p class="validclass" style="display:none;">Please enter valid amount.</p>

												<button type="button" style="margin-top: 15px !important;" class="btn btn-success align-middle" onclick="withdraw(<?php echo $resul['id']; ?>, <?php echo $userId; ?>, '<?php echo $totamt ?>');">Withdraw</button>

											</td>
										</tr>
									<?php
												}
											} else {
												?>
									<h4>No donation found.</h4>
								<?php
										}
										?>

								<script>
									function withdraw(cid, userId, totamt) {

										var withdrawamt = jQuery("#withdrawamt").val();

										console.log(totamt);
										console.log(withdrawamt);

										if (parseFloat(withdrawamt) > parseFloat(totamt)) {
											jQuery(".validclass").css("display", "");
											return false;
										} else {
											jQuery(".validclass").css("display", "none");

											var amtrep = (withdrawamt * 2) / 100;
											var amtrec = withdrawamt - amtrep;

											var amtrep = parseFloat(amtrep) + parseFloat(0.0);
											var amtrec = parseFloat(amtrec) + parseFloat(0.0);
											var withdrawamt = parseFloat(withdrawamt) + parseFloat(0.0);
											console.log(withdrawamt);
											// return false;

											jQuery('.amtrec').text(amtrec.toFixed(2));
											jQuery('.amtrep').text(amtrep.toFixed(2));
											jQuery('.amtretot').text(withdrawamt.toFixed(2));
											jQuery('.cid').val(cid);
											jQuery('.userId').val(userId);
											jQuery('.withdrawamt').val(withdrawamt);

											jQuery('#withdrawalmodal').modal('show');

											return false;


										}

									}

									function withdraw2() {

										var cid = jQuery(".cid").val();
										var userId = jQuery(".userId").val();
										var withdrawamt = jQuery(".withdrawamt").val();

										showLoadingBar();

										jQuery.ajax({
											url: '<?php echo BASE_URL . 'withdraw.php' ?>',
											type: "POST",
											data: {
												cid: cid,
												userId: userId,
												withdrawamt: withdrawamt
											},
											success: function(response) {
												console.log(response);
												if (response) {
													console.log('#withdrawdiv' + cid);
													window.location.href = "https://jedaitestbed.in/zed/my-account/?i=withdraw";
												}

												hideLoadingBar();
												event.preventDefault();
											},
											error: function(jqXHR, exception) {
												hideLoadingBar();
												event.preventDefault();
											}

										});

									}
								</script>

							</tbody>
						</table>

						<div class="modal fade" id="withdrawalmodal" tabindex="-1" role="dialog" aria-labelledby="withdrawalmodal" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<input type="hidden" class="cid" value="" />
										<input type="hidden" class="userId" value="" />
										<input type="hidden" class="withdrawamt" value="" />
										<p>
											<b>Amount Received : <span class="amtrec"></span></b><br />
											<b>Platform Charges (2%) : <span class="amtrep"></span></b><br />
											<b>Services Charges (2%) : 0.0</b><br />
											<b>Total Amount : <span class="amtretot"></span></b><br />
										</p>

										<button type="button" onclick="withdraw2()" class="btn btn-success align-middle" id="confirmwithdraw">Confirm</button>
									</div>
								</div>
							</div>
						</div>

					<?php
						} else {

							?>
						<form method="post" id="bankform1" class="f1">

							<h3></h3>

							<fieldset style="display:block !important;">

								<input type="hidden" id="userId" name="userId" value="<?= $userId ?>" class="form-control">

								<div class="mainvalid">
									<div class="form-group valid">
										<label class="lbform">Full Name</label>

										<input type="text" id="fullName" value="<?= $resultsbank[0]['fullName'] ?>" name="fullName" placeholder="Enter Full Name" class="form-control">

									</div>

									<div class="form-group valid">
										<label class="lbform">Enter Email</label>
										<input type="text" id="emailId" value="<?= $resultsbank[0]['emailId'] ?>" name="emailId" placeholder="Enter Email" class="form-control">
									</div>

									<div class="form-group valid">
										<label class="lbform">Enter Phone Number</label>
										<input type="text" id="phonenumber" value="<?= $resultsbank[0]['phonenumber'] ?>" name="phonenumber" placeholder="Enter Phone Number" class="form-control">
									</div>

									<div class="form-group valid">
										<label class="lbform">Account Number</label>
										<input type="text" id="account_number" value="<?= $resultsbank[0]['account_number'] ?>" name="account_number" placeholder="Account Number" class="form-control">
									</div>

									<div class="form-group valid">
										<label class="lbform">IFSC Code</label>
										<input type="text" id="ifsc" name="ifsc" value="<?= $resultsbank[0]['ifsc'] ?>" placeholder="IFSC Code" class="form-control">
									</div>

								</div>
								<?php
										if ($resultsbank) { } else {
											?>
									<div class="f1-buttons" id="submitbankdiv">
										<button type="button" id="submitbank" style="background: #0ec4f7 !important;" class="btn">Submit</button>
									</div>
								<?php
										}
										?>

							</fieldset>

						</form>

						<div class="modal fade" id="donateint2" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<h5 class="modal-title text-center" id="bantext">Beneficiary submitted successfully.</h5>
									</div>
								</div>
							</div>
						</div>

						<script>
							jQuery(document).ready(function() {
								jQuery("#submitbank").click(function(event) {

									var userId = jQuery("#userId").val();
									var fullName = jQuery("#fullName").val();
									var emailId = jQuery("#emailId").val();
									var phonenumber = jQuery("#phonenumber").val();
									var account_number = jQuery("#account_number").val();
									var ifsc = jQuery("#ifsc").val();

									var fullNamev = 0;
									var emailIdv = 0;
									var phonenumberv = 0;
									var account_numberv = 0;
									var ifscv = 0;

									if (fullName == '') {
										jQuery("#fullName").addClass('input-error');
									} else {
										jQuery("#fullName").removeClass('input-error');
										fullNamev = 1;
									}

									if (emailId == '') {
										jQuery("#emailId").addClass('input-error');
									} else {
										jQuery("#emailId").removeClass('input-error');
										emailIdv = 1;
									}

									if (phonenumber == '') {
										jQuery("#phonenumber").addClass('input-error');
									} else {
										jQuery("#phonenumber").removeClass('input-error');
										phonenumberv = 1;
									}

									if (account_number == '') {
										jQuery("#account_number").addClass('input-error');
									} else {
										jQuery("#account_number").removeClass('input-error');
										account_numberv = 1;
									}

									if (ifsc == '') {
										jQuery("#ifsc").addClass('input-error');
									} else {
										jQuery("#ifsc").removeClass('input-error');
										ifscv = 1;
									}

									if ((fullNamev == '1') && (emailIdv == '1') && (phonenumberv == '1') && (account_numberv == '1') && (ifscv == '1')) {
										showLoadingBar();
										jQuery.ajax({
											url: '<?php echo BASE_URL . 'submitbank.php' ?>',
											type: "POST",
											data: {
												userId: userId,
												fullName: fullName,
												emailId: emailId,
												phonenumber: phonenumber,
												account_number: account_number,
												ifsc: ifsc
											},
											success: function(response) {
												console.log(response);
												hideLoadingBar();
												if (response == 1) {
													// jQuery('#submitbankdiv').hide();
													// jQuery('#bantext').html('Beneficiary submitted successfully.');
													// jQuery('#donateint2').modal('show');
													// location.reload();
													window.location.href = window.location.href + "?i=withdraw";
												} else {
													jQuery('#bantext').html(response);
													jQuery('#donateint2').modal('show');
												}
												event.preventDefault();
											},
											error: function(jqXHR, exception) {
												getErrorMessage(jqXHR, exception);
											}

										});
									}

									event.preventDefault();
								});
							});


							function showLoadingBar() {
								jQuery('.loadingBar').show();
							}

							function hideLoadingBar() {
								jQuery('.loadingBar').hide();
							}
						</script>
					<?php
						}

						?>



				</div>

				<div class="tab-pane" id="settings-v">

					<style>
						.table>thead>tr>th,
						.table>tbody>tr>th,
						.table>tfoot>tr>th,
						.table>thead>tr>td,
						.table>tbody>tr>td,
						.table>tfoot>tr>td {
							padding: 20px !important;
							border: 0px !important;
						}

						.table>tbody {
							border-spacing: 0px !important;
						}
					</style>

					<table class="table table-hover" style="border-collapse: separate;border-spacing:0 20px; border:0px;">
						<tbody>
							<?php
								if ($resultsdona) {
									foreach ($resultsdona as $resul) {

										$resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $resul->campaign_Id, OBJECT);
										$recs = $resultscc[0];
										$campaign_typeId = $recs->campaign_typeId;
										$campaign_Id = $recs->id;

										if ($recs->campaign_typeId == 2) {
											$fundtitle = $recs->item_name;
										} else if ($recs->campaign_typeId == 3) {
											$fundtitle = $recs->product_name;
										} else {
											$fundtitle = $recs->fundraiser_title;
										}

										if ($recs->campaign_typeId == 2) {
											$goal_amount = $recs->item_qty;
											$currency = 'QTY';
										} else if ($recs->campaign_typeId == 3) {
											$goal_amount = $recs->product_price;
											$currency = $recs->currency;
										} else {
											$goal_amount = $recs->goal_amount;
											$currency = $recs->currency;
										}

										?>
									<tr style="box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;">
										<?php
													if ($resul->anonymous) {
														?>
											<td>

												<div style="margin-bottom:10px;margin-top:15px;">Anonymous</div>

												<span class="subdetail" style="font-size: 15px;">

													<?php
																	if ($recs->campaign_typeId == 3) {

																		?>
														<div style="margin-top:10px;"> <b><?php echo $currency; ?> <?php echo $resul->amount * $recs->product_price; ?></b> </div>
													<?php } else {
																		?>
														<div style="margin-top:10px;"> <b><?php echo $currency; ?> <?php echo $resul->amount; ?></b> </div>
													<?php
																	}							?>


												</span>

											</td>
										<?php
													} else {
														?>
											<td>

												<div style="margin-bottom:10px;"><?php echo $resul->fullName; ?></div>

												<span class="subdetail" style="font-size: 15px;">
													<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $resul->phonenumber; ?><br>
													<i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $resul->emailId; ?><br>
													<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $resul->address; ?><br>
													<?php
																	if ($recs->campaign_typeId == 3) {

																		?>
														<div style="margin-top:10px;"> <b><?php echo $currency; ?> <?php echo $resul->amount * $recs->product_price; ?></b> </div>
													<?php } else {
																		?>
														<div style="margin-top:10px;"> <b><?php echo $currency; ?> <?php echo $resul->amount; ?></b> </div>
													<?php
																	}							?>


												</span>

											</td>
										<?php
													}
													?>

										<td width="50%" class="align-middle text-right"><br />
											<?php
														if ($resul->status == 1) {
															?><br>
												<button type="button disabled" class="btn btn-success align-middle">Accepted</button>
											<?php
														} else if ($resul->status == 2) {
															?><br>
												<button type="button" class="btn btn-danger align-middle">Declined</button>
											<?php
														} else {
															?>
												<div id="acceptdivmain<?php echo $resul->id; ?>">
													<button type="button" class="btn btn-success align-middle" onclick="acceptdonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');">Accept</button><br>
													<button type="button" class="btn btn-danger align-middle" style="margin-top: 15px;" onclick="declinedonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');">Decline</button>
												</div>

												<div style="display:none" id="acceptdiv<?php echo $resul->id; ?>">
													<br>
													<button type="button disabled" class="btn btn-success align-middle">Accepted</button>
												</div>

												<div style="display:none" id="declinediv<?php echo $resul->id; ?>">
													<br>
													<button type="button" class="btn btn-danger align-middle">Declined</button>
												</div>
											<?php
														}
														?>


										</td>
									</tr>
								<?php
										}
									} else {
										?>
								<h4>No donation found.</h4>
							<?php
								}
								?>

							<script>
								function acceptdonation(id, amt, cid) {
									showLoadingBar();
									jQuery.ajax({
										url: '<?php echo BASE_URL . 'acceptdonation.php' ?>',
										type: "POST",
										data: {
											id: id,
											amt: amt,
											cid: cid
										},
										success: function(response) {
											console.log(response);
											jQuery('#acceptdiv' + id).css('display', '');
											jQuery('#declinediv' + id).css('display', 'none');
											jQuery('#acceptdivmain' + id).css('display', 'none');
											hideLoadingBar();
											event.preventDefault();
										},
										error: function(jqXHR, exception) {
											jQuery('#acceptdiv' + id).css('display', '');
											jQuery('#declinediv' + id).css('display', 'none');
											jQuery('#acceptdivmain' + id).css('display', 'none');
											hideLoadingBar();
											event.preventDefault();
										}

									});
								}

								function declinedonation(id, amt, cid) {
									showLoadingBar();
									jQuery.ajax({
										url: '<?php echo BASE_URL . 'declinedonation.php' ?>',
										type: "POST",
										data: {
											id: id,
											amt: amt,
											cid: cid
										},
										success: function(response) {
											console.log(response);
											jQuery('#acceptdiv' + id).css('display', 'none');
											jQuery('#declinediv' + id).css('display', '');
											jQuery('#acceptdivmain' + id).css('display', 'none');
											hideLoadingBar();
											event.preventDefault();
										},
										error: function(jqXHR, exception) {
											jQuery('#acceptdiv' + id).css('display', 'none');
											jQuery('#declinediv' + id).css('display', '');
											jQuery('#acceptdivmain' + id).css('display', 'none');
											hideLoadingBar();
											event.preventDefault();
										}

									});
								}
							</script>

						</tbody>
					</table>

				</div>

			</div>
		</div>

		<div class="clearfix"></div>

	</div>
<?php
} else {
	?>
	<div class="col-sm-12">
		<h3 style="text-align:center;">No campaigns created.</h3>
	</div>
<?php
}
?>



<?php

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
