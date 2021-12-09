<?php

/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 */
?>
<?php
require_once(ABSPATH . 'wp-config.php');
$dbhost = "localhost";
$dbuser = DB_USER;
$dbpass = DB_PASSWORD;
$db = DB_NAME;
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

$sql = "SELECT * FROM wp_campaigntypes";
$result = $conn->query($sql);
?>
</div><!-- /.site-main -->

<!-- Footer -->
<footer id="colophon" class="site-footer bt-footer <?php alone_get_footer_class(); ?>">
	<?php alone_footer(); ?>
</footer>
</div><!-- /#page -->

<div class="wsp-chat desktop_show">
	<a href="http://api.whatsapp.com/send?phone=+917208701981&text=Hi,%20I%20contacted%20you%20Through%20your%20website" target="_blank"><img src="<?php echo BASE_URL; ?>/wp-content/uploads/2020/11/whatsapp_icon.png" /></a>
</div>
<div class="wsp-chat mobile_show">
	<a href="https://wa.me/+917208701981?text=Hi,%20I%20contacted%20you%20Through%20your%20website" target="_blank"><img src="<?php echo BASE_URL; ?>/wp-content/uploads/2020/11/whatsapp_icon.png" /></a>
</div>

<?php wp_footer(); ?>

<?php
if (is_user_logged_in()) {
	$user = wp_get_current_user();
	// echo 'testtt<pre>'; 
	// print_r($user);
	// print_r($user->ID);
	// print_r($user->display_name);
	// echo '</pre>';
	$logouturl = str_replace("amp;", "", wp_logout_url());
	?>
	<style>
		.beforesignin {
			display: none !important;
		}
	</style>
	<script>
		jQuery('.aftersignin a span').first().html('Hi, ' + '<?php echo $user->display_name; ?>');
		jQuery('.aftersignin a span').css('cursor', 'pointer');

		jQuery('.aftersignin2 a span').first().html('Hi, ' + '<?php echo $user->display_name; ?>');
		jQuery('.aftersignin2 a span').css('cursor', 'pointer');

		jQuery('.logout a').attr('href', '<?php echo $logouturl; ?>'); //wp_logout_url(); <?php echo BASE_URL; ?>wp-login.php?action=logout&_wpnonce=95e441bc38

		// A $( document ).ready() block.
		jQuery(document).ready(function() {
			jQuery('.startfundclassmenu a').attr('data-toggle', 'modal');
			jQuery('.startfundclassmenu a').attr('data-target', '#startfunrmodal');

			jQuery('.startfundclassmenu2 a').attr('data-toggle', 'modal');
			jQuery('.startfundclassmenu2 a').attr('data-target', '#startfunrmodal');
		});
	</script>
<?php
} else {
	?>
	<style>
		.aftersignin {
			display: none !important;
		}

		.aftersignin2 {
			display: none !important;
		}
	</style>
	<script>
		// A $( document ).ready() block.
		jQuery(document).ready(function() {
			jQuery('.startfundclassmenu a').attr('href', '<?php echo BASE_URL; ?>login/');
			jQuery('.startfundclassmenu2 a').attr('href', '<?php echo BASE_URL; ?>login/');
		});
	</script>
<?php
}
?>
<!-- CSS -->
<link rel="stylesheet" href="<?php echo BASE_URL; ?>wp-content/themes/alone/assets/css/form-elements.css">
<style>
	.tox-notification.tox-notification--in.tox-notification--warning {
		display: none !important;
	}

	.f1 {
		padding: 0px 25px;
		background: #fff;
		-moz-border-radius: 4px;
		-webkit-border-radius: 4px;
		border-radius: 4px;
	}

	.f1 h3 {
		margin-top: 0;
		margin-bottom: 5px;
		text-transform: uppercase;
	}

	.f1-steps {
		overflow: hidden;
		position: relative;
		margin-top: 20px;
	}

	.f1-progress {
		position: absolute;
		top: 24px;
		left: 0;
		width: 100%;
		height: 1px;
		background: #ddd;
	}

	.f1-progress-line {
		position: absolute;
		top: 0;
		left: 0;
		height: 1px;
		background: #0ec4f7;
	}

	.f1-step {
		position: relative;
		float: left;
		width: 25%;
		padding: 0 45px;
	}

	.f1-step-icon {
		display: inline-block;
		width: 40px;
		height: 40px;
		margin-top: 4px;
		background: #ddd;
		font-size: 16px;
		color: #fff;
		line-height: 40px;
		-moz-border-radius: 50%;
		-webkit-border-radius: 50%;
		border-radius: 50%;
	}

	.f1-step.activated .f1-step-icon {
		background: #fff;
		border: 1px solid #0ec4f7;
		color: #0ec4f7;
		line-height: 38px;
	}

	.f1-step.active .f1-step-icon {
		width: 48px;
		height: 48px;
		margin-top: 0;
		background: #0ec4f7;
		font-size: 22px;
		line-height: 48px;
	}

	.f1-step p {
		color: #ccc;
	}

	.f1-step.activated p {
		color: #0ec4f7;
	}

	.f1-step.active p {
		color: #0ec4f7;
	}

	.f1 fieldset {
		display: none;
		text-align: left;
	}

	.f1-buttons {
		text-align: right;
	}

	.f1 .input-error {
		border-color: #f35b3f;
	}

	#startfunrmodal {
		z-index: 999999 !important;
	}

	#startfunrmodal .modal-body {
		padding: 0 0 15px 0 !important;
	}

	#blah {
		max-width: 180px;
	}

	input[type=file] {
		padding: 10px;
		padding-bottom: 35px;
	}

	.form-group {
		margin-top: 25px !important;
	}

	.lbform {
		font-size: 15px !important;
		padding-left: 2px;
	}

	.f1-steps {
		display: none;
	}

	@media screen and (min-width: 768px) {
		.f1-steps {
			display: block;
		}
	}
</style>

<div class="modal fade" id="startfunrmodal" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title text-center" id="exampleModalLongTitle">Tell us about your Campaign</h4>
			</div>
			<div class="modal-body">

				<form action="<?php echo BASE_URL ?>submitfundrais.php" enctype="multipart/form-data" method="post" class="f1">

					<input type="hidden" value="<?php echo $user->data->ID; ?>" name="userId" />

					<h3></h3>

					<div class="f1-steps">
						<div class="f1-progress">
							<div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
						</div>
						<div class="f1-step active">
							<div class="f1-step-icon text-center">1</div>
						</div>
						<div class="f1-step">
							<div class="f1-step-icon text-center">2</div>
						</div>
						<div class="f1-step">
							<div class="f1-step-icon text-center">3</div>
						</div>
						<div class="f1-step">
							<div class="f1-step-icon text-center">4</div>
						</div>
					</div>

					<fieldset>
						<h4></h4>
						<div class="mainvalid">
							<div class="form-group valid">
								<label class="lbform">Purpose of raising funds</label>

								<select class="form-control" name="campaign_typeId" id="campaign_typeId">
									<option value="">Purpose of raising funds</option>
									<option value="1">Fundraiser</option>
									<option value="2">Material donation</option>
									<option value="3">Marketplace for charity products</option>
								</select>
							</div>

							<div class="form-group valid">

								<label class="lbform">Campaign’s Target (How many lives will get the benefits of the campaign)</label>
								<input type="text" id="lives_count" value="1" name="lives_count" placeholder="Enter Campaign’s Target" class="form-control">

							</div>

							<div class="form-group valid">
								<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>

								<style>
									.pac-container {
										z-index: 99999999 !important;
									}
								</style>
								<?php
								$ipaddress = '';
								if (getenv('HTTP_CLIENT_IP'))
									$ipaddress = getenv('HTTP_CLIENT_IP');
								else if (getenv('HTTP_X_FORWARDED_FOR'))
									$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
								else if (getenv('HTTP_X_FORWARDED'))
									$ipaddress = getenv('HTTP_X_FORWARDED');
								else if (getenv('HTTP_FORWARDED_FOR'))
									$ipaddress = getenv('HTTP_FORWARDED_FOR');
								else if (getenv('HTTP_FORWARDED'))
									$ipaddress = getenv('HTTP_FORWARDED');
								else if (getenv('REMOTE_ADDR'))
									$ipaddress = getenv('REMOTE_ADDR');
								else
									$ipaddress = 1;
								?>
								<label class="lbform">Enter Address</label>
								<input type="text" id="searchTextField" name="address" placeholder="Enter Address" class="form-control">

								<div id="mapholder" style="margin-top:5px;display:none;width: 100%; height: 200px; position: relative; overflow: hidden;">
									<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"></div>
								</div>

								<?php
								global $wpdb;
								$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
								$results = (array) $results;
								?>
								<script>
									function initialize() {

										jQuery.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

											// jQuery("#latitude").val(data.latitude);
											// jQuery("#longitude").val(data.longitude);

											var mapCenter = new google.maps.LatLng(data.latitude, data.longitude);
											setMap(mapCenter, data.latitude, data.longitude, '');

										});

										var geocoder = new google.maps.Geocoder();

										var autocomplete = new google.maps.places.Autocomplete(jQuery("#searchTextField")[0], {});
										google.maps.event.addListener(autocomplete, 'place_changed', function() {
											var place = autocomplete.getPlace();
											var address = place.formatted_address;
											geocoder.geocode({
												'address': address
											}, function(results, status) {
												if (status == google.maps.GeocoderStatus.OK) {
													var latitude = results[0].geometry.location.lat();
													var longitude = results[0].geometry.location.lng();

													var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
													setMap(mapCenter, latitude, longitude, '');
												}
											});
										});

									}
									google.maps.event.addDomListener(window, 'load', initialize);

									function setMap(mapCenter, latitude = 0, longitude = 0, locations = '') {

										jQuery("#mapholder").css("display", "block");
										// map = new google.maps.Map(jQuery("#mapholder")[0], {
										// 	center: mapCenter,
										// 	zoom: 15
										// });
										// var marker = new google.maps.Marker({
										// 	position: mapCenter,
										// 	map: map
										// });

										var locations = [
											<?php
											foreach ($results as $res) {

												if ($res['campaign_typeId'] == 2) {
													$fundtitle = $res['item_name'];
												} else if ($res['campaign_typeId'] == 3) {
													$fundtitle = $res['product_name'];
												} else {
													$fundtitle = $res['fundraiser_title'];
												}

												$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

												if ($res['campaign_typeId'] == 2) {
													$goal_amount = $res['item_qty'];
													$currency = 'QTY';
												} else if ($res['campaign_typeId'] == 3) {
													$goal_amount = $res['product_price'];
													$currency = $res['currency'];
												} else {
													$goal_amount = $res['goal_amount'];
													$currency = $res['currency'];
												}

												if ($res['image']) {
													$iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
												} else {
													$iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
													$iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
												}

												$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
												$achieve_amount = 0;
												foreach ($resultsdonacc as $tt) {
													if ($tt['campaign_typeId'] == 3) {
														$achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
													} else {
														$achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
													}
													$achieve_amount += $achieve_amountn;
												}
												if ($achieve_amount >= $goal_amount) {
													$btn = 'no';
												} else {
													$btn = 'yes';
												}

												?>['<a href="<?php echo $shareurl; ?>"><div class=""><img src="<?php echo $iimage; ?>" height="50" width="50" /></div><div class=""><?php echo $fundtitle; ?></div><div class="">Goal: <?php echo $currency . ' ' . $goal_amount; ?></div><div class=""><?= $btn == 'no' ? 'Closed' : 'Active'; ?></div></a>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, 12],
											<?php } ?>
										];

										var map = new google.maps.Map(document.getElementById('mapholder'), {
											zoom: 10,
											center: new google.maps.LatLng(latitude, longitude),
											mapTypeId: google.maps.MapTypeId.ROADMAP
										});

										var infowindow = new google.maps.InfoWindow();

										var marker, i;

										for (i = 0; i < locations.length; i++) {
											marker = new google.maps.Marker({
												position: new google.maps.LatLng(locations[i][1], locations[i][2]),
												map: map
											});

											google.maps.event.addListener(marker, 'click', (function(marker, i) {
												return function() {
													infowindow.setContent(locations[i][0]);
													infowindow.open(map, marker);
												}
											})(marker, i));
										}

									}
								</script>
							</div>
						</div>
						<div class="f1-buttons">
							<button type="button" class="btn btn-next">Next</button>
						</div>
					</fieldset>

					<fieldset>

						<h4></h4>

						<div class="campaign_typeId mainvalid" id="campaign_typeId1">

							<div class="form-group valid">
								<label class="lbform">How much do you want to raise?</label>
								<div class="row">
									<div class="col-sm-3">
										<select class="form-control" name="currency">
											<!-- <option value="USD">USD</option> -->
											<option value="INR">INR</option>
											<!-- <option value="AED">AED</option> -->
											<!-- <option value="Pound">Pound</option> -->
										</select>
									</div>
									<div class="col-sm-9">
										<input type="text" name="goal_amount" placeholder="How much do you want to raise?" class="form-control">
									</div>
								</div>

							</div>

							<div class="form-group valid">
								<label class="lbform">Campaign Title</label>
								<input type="text" maxlength="20" name="fundraiser_title" placeholder="Campaign Title" class="form-control">
							</div>

							<div class="form-group valid">
								<label class="lbform">User Type</label>
								<select class="form-control" name="user_type" id="user_type">
									<option value="ngo">NGO</option>
									<option value="individual_person">Individual Person</option>
								</select>
							</div>

							<div class="form-group ngodiv valid">
								<label class="lbform">NGO Name</label>
								<input type="text" name="ngo_name" placeholder="NGO Name" class="form-control">
							</div>

							<div class="individual_persondiv valid" style="display:none">
								<div class="form-group">
									<label class="lbform">Whom are you raising funds for?</label>
									<select class="form-control" name="individual_person">
										<option value="">Whom are you raising funds for?</option>
										<option value="Myself">Myself</option>
										<option value="Family Member">Family Member</option>
										<option value="Friend">Friend</option>
										<option value="Pet or Animal">Pet or Animal</option>
									</select>
								</div>

								<div class="form-group valid">
									<label class="lbform">Beneficiary Name</label>
									<input type="text" name="beneficiary_name" placeholder="Beneficiary Name" class="form-control">
								</div>

								<div class="form-group valid">
									<label class="lbform">Please choose a cause?</label>
									<select class="form-control" name="cause">
										<option value="">Please choose a cause?</option>
										<option value="Medical help">Medical help</option>
										<option value="Educational help">Educational help</option>
										<option value="Empowerment help">Empowerment help</option>
										<option value="Shelter Homes">Shelter Homes</option>
										<option value="Rural Development">Rural Development</option>
										<option value="Sports Enablement">Sports Enablement</option>
										<option value="Natural Calamities">Natural Calamities</option>
										<option value="Rehabilitation">Rehabilitation</option>
									</select>
								</div>
							</div>

						</div>

						<div class="campaign_typeId mainvalid" id="campaign_typeId2" style="display:none">

							<div class="form-group valid">
								<label class="lbform">Item Name</label>
								<input type="text" maxlength="20" name="item_name" placeholder="Item Name" class="form-control">
							</div>

							<div class="form-group valid">
								<label class="lbform">Item Quantity</label>
								<input type="number" value="1" min="1" name="item_qty" placeholder="Item Quantity" class="form-control">
							</div>

							<div class="form-group valid">
								<label class="lbform">Location of the need</label>
								<input type="text" id="location_of_need" name="location_of_need" placeholder="Location of the need" class="form-control">
							</div>

							<script>
								function initialize2() {

									jQuery.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

										// jQuery("#latitude").val(data.latitude);
										// jQuery("#longitude").val(data.longitude);

										var mapCenter = new google.maps.LatLng(data.latitude, data.longitude);
										setMap(mapCenter, data.latitude, data.longitude, '');

									});

									var geocoder = new google.maps.Geocoder();

									var autocomplete = new google.maps.places.Autocomplete(jQuery("#location_of_need")[0], {});
									google.maps.event.addListener(autocomplete, 'place_changed', function() {
										var place = autocomplete.getPlace();
										var address = place.formatted_address;
										geocoder.geocode({
											'address': address
										}, function(results, status) {
											if (status == google.maps.GeocoderStatus.OK) {
												var latitude = results[0].geometry.location.lat();
												var longitude = results[0].geometry.location.lng();

												var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
												setMap(mapCenter, latitude, longitude, '');
											}
										});
									});

								}
								google.maps.event.addDomListener(window, 'load', initialize2);

								function setMap(mapCenter, latitude = 0, longitude = 0, locations = '') {

									jQuery("#mapholder").css("display", "block");
									// map = new google.maps.Map(jQuery("#mapholder")[0], {
									// 	center: mapCenter,
									// 	zoom: 15
									// });
									// var marker = new google.maps.Marker({
									// 	position: mapCenter,
									// 	map: map
									// });

									var locations = [
										<?php
										foreach ($results as $res) {

											if ($res['campaign_typeId'] == 2) {
												$fundtitle = $res['item_name'];
											} else if ($res['campaign_typeId'] == 3) {
												$fundtitle = $res['product_name'];
											} else {
												$fundtitle = $res['fundraiser_title'];
											}

											$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

											if ($res['campaign_typeId'] == 2) {
												$goal_amount = $res['item_qty'];
												$currency = 'QTY';
											} else if ($res['campaign_typeId'] == 3) {
												$goal_amount = $res['product_price'];
												$currency = $res['currency'];
											} else {
												$goal_amount = $res['goal_amount'];
												$currency = $res['currency'];
											}

											if ($res['image']) {
												$iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
											} else {
												$iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
												$iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
											}

											$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
											$achieve_amount = 0;
											foreach ($resultsdonacc as $tt) {
												if ($tt['campaign_typeId'] == 3) {
													$achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
												} else {
													$achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
												}
												$achieve_amount += $achieve_amountn;
											}
											if ($achieve_amount >= $goal_amount) {
												$btn = 'no';
											} else {
												$btn = 'yes';
											}

											?>['<a href="<?php echo $shareurl; ?>"><div class=""><img src="<?php echo $iimage; ?>" height="50" width="50" /></div><div class=""><?php echo $fundtitle; ?></div><div class="">Goal: <?php echo $currency . ' ' . $goal_amount; ?></div><div class=""><?= $btn == 'no' ? 'Closed' : 'Active'; ?></div></a>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, 12],
										<?php } ?>
									];

									var map = new google.maps.Map(document.getElementById('mapholder'), {
										zoom: 10,
										center: new google.maps.LatLng(latitude, longitude),
										mapTypeId: google.maps.MapTypeId.ROADMAP
									});

									var infowindow = new google.maps.InfoWindow();

									var marker, i;

									for (i = 0; i < locations.length; i++) {
										marker = new google.maps.Marker({
											position: new google.maps.LatLng(locations[i][1], locations[i][2]),
											map: map
										});

										google.maps.event.addListener(marker, 'click', (function(marker, i) {
											return function() {
												infowindow.setContent(locations[i][0]);
												infowindow.open(map, marker);
											}
										})(marker, i));
									}

								}
							</script>

						</div>

						<div class="campaign_typeId mainvalid" id="campaign_typeId3" style="display:none">

							<div class="form-group valid">
								<label class="lbform">Product Name</label>
								<input type="text" maxlength="20" name="product_name" placeholder="Product Name" class="form-control">
							</div>

							<div class="form-group valid">
								<label class="lbform">Product Quantity</label>
								<input type="number" value="1" name="product_qty" placeholder="Product Quantity" class="form-control">
							</div>

							<div class="form-group valid">

								<label class="lbform">Product Price</label>
								<div class="row">
									<div class="col-sm-3">
										<select class="form-control" name="currency">
											<!-- <option value="USD">USD</option> -->
											<option value="INR">INR</option>
											<!-- <option value="AED">AED</option> -->
											<!-- <option value="Pound">Pound</option> -->
										</select>
									</div>
									<div class="col-sm-9">
										<input type="text" name="product_price" placeholder="Product Price" class="form-control">
									</div>
								</div>

							</div>

							<div class="form-group valid">
								<label class="lbform">Location of the need</label>
								<input type="text" id="product_location_of_need" name="product_location_of_need" placeholder="Location of the need" class="form-control">
							</div>

							<script>
								function initialize22() {

									jQuery.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

										// jQuery("#latitude").val(data.latitude);
										// jQuery("#longitude").val(data.longitude);

										var mapCenter = new google.maps.LatLng(data.latitude, data.longitude);
										setMap(mapCenter, data.latitude, data.longitude, '');

									});

									var geocoder = new google.maps.Geocoder();

									var autocomplete = new google.maps.places.Autocomplete(jQuery("#product_location_of_need")[0], {});
									google.maps.event.addListener(autocomplete, 'place_changed', function() {
										var place = autocomplete.getPlace();
										var address = place.formatted_address;
										geocoder.geocode({
											'address': address
										}, function(results, status) {
											if (status == google.maps.GeocoderStatus.OK) {
												var latitude = results[0].geometry.location.lat();
												var longitude = results[0].geometry.location.lng();

												var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
												setMap(mapCenter, latitude, longitude, '');
											}
										});
									});

								}
								google.maps.event.addDomListener(window, 'load', initialize22);

								function setMap(mapCenter, latitude = 0, longitude = 0, locations = '') {

									jQuery("#mapholder").css("display", "block");
									// map = new google.maps.Map(jQuery("#mapholder")[0], {
									// 	center: mapCenter,
									// 	zoom: 15
									// });
									// var marker = new google.maps.Marker({
									// 	position: mapCenter,
									// 	map: map
									// });

									var locations = [
										<?php
										foreach ($results as $res) {

											if ($res['campaign_typeId'] == 2) {
												$fundtitle = $res['item_name'];
											} else if ($res['campaign_typeId'] == 3) {
												$fundtitle = $res['product_name'];
											} else {
												$fundtitle = $res['fundraiser_title'];
											}

											$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

											if ($res['campaign_typeId'] == 2) {
												$goal_amount = $res['item_qty'];
												$currency = 'QTY';
											} else if ($res['campaign_typeId'] == 3) {
												$goal_amount = $res['product_price'];
												$currency = $res['currency'];
											} else {
												$goal_amount = $res['goal_amount'];
												$currency = $res['currency'];
											}

											if ($res['image']) {
												$iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
											} else {
												$iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
												$iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
											}

											$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
											$achieve_amount = 0;
											foreach ($resultsdonacc as $tt) {
												if ($tt['campaign_typeId'] == 3) {
													$achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
												} else {
													$achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
												}
												$achieve_amount += $achieve_amountn;
											}
											if ($achieve_amount >= $goal_amount) {
												$btn = 'no';
											} else {
												$btn = 'yes';
											}

											?>['<a href="<?php echo $shareurl; ?>"><div class=""><img src="<?php echo $iimage; ?>" height="50" width="50" /></div><div class=""><?php echo $fundtitle; ?></div><div class="">Goal: <?php echo $currency . ' ' . $goal_amount; ?></div><div class=""><?= $btn == 'no' ? 'Closed' : 'Active'; ?></div></a>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, 12],
										<?php } ?>
									];

									var map = new google.maps.Map(document.getElementById('mapholder'), {
										zoom: 10,
										center: new google.maps.LatLng(latitude, longitude),
										mapTypeId: google.maps.MapTypeId.ROADMAP
									});

									var infowindow = new google.maps.InfoWindow();

									var marker, i;

									for (i = 0; i < locations.length; i++) {
										marker = new google.maps.Marker({
											position: new google.maps.LatLng(locations[i][1], locations[i][2]),
											map: map
										});

										google.maps.event.addListener(marker, 'click', (function(marker, i) {
											return function() {
												infowindow.setContent(locations[i][0]);
												infowindow.open(map, marker);
											}
										})(marker, i));
									}

								}

								jQuery(function() {
									var dtToday = new Date();

									var month = dtToday.getMonth() + 1;
									var day = dtToday.getDate();
									var year = dtToday.getFullYear();
									if (month < 10)
										month = '0' + month.toString();
									if (day < 10)
										day = '0' + day.toString();

									var maxDate = year + '-' + month + '-' + day;
									jQuery('#txtDate').attr('min', maxDate);
								});
							</script>

						</div>

						<div class="form-group valid">
							<label class="lbform">Campaign End Date</label>
							<input type="date" id="txtDate" name="end_date" placeholder="Campaign End Date" class="form-control" required>
						</div>

						<div class="f1-buttons">
							<button type="button" class="btn btn-previous">Previous</button>
							<button type="button" class="btn btn-next">Next</button>
						</div>

					</fieldset>

					<fieldset>
						<h4></h4>
						<div class="mainvalid">
							<div class="form-group valid">
								<label class="lbform">Upload Type</label>
								<select class="form-control" name="img_type" id="img_type">
									<option value="image">Image</option>
									<option value="video">Video</option>
								</select>
							</div>

							<div class="imagediv valid">
								<div class="form-group">
									<label class="lbform">Select Image</label>
									<input type="file" name="image" class="form-control" onchange="readURL(this);">
								</div>

								<img id="blah" src="<?php echo BASE_URL ?>fundraiserimg/sampleimg.png" alt="your image" />
							</div>

							<div class="videodiv valid" style="display:none;">
								<div class="form-group">
									<label class="lbform">Youtube video URL</label>
									<input type="text" id="youtubevideo" name="video" placeholder="Youtube video URL" class="form-control">
								</div>
							</div>
						</div>
						<div class="f1-buttons">
							<button type="button" class="btn btn-previous">Previous</button>
							<button type="button" class="btn btn-next">Next</button>
						</div>

					</fieldset>

					<fieldset>
						<h4></h4>
						<div class="mainvalid">
							<div class="form-group valid">
								<label class="lbform">Short Descriptions</label>
								<!--<textarea name="short_description" class="form-control" rows="5"></textarea>-->
								<style>
									.tox-statusbar__text-container,
									.tox-menubar {
										display: none !important;
									}
								</style>
								<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

								<!--<script src="https://cdn.tiny.cloud/1/ygg9s0sotz3d2fvwm5npjzn0zi4hxgqazbrjwtgobge6w99p/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>-->
								<textarea name="short_description" class="form-control"></textarea>
								<script>
									tinymce.init({
										selector: 'textarea',
										plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
										toolbar_mode: 'floating',
									});
								</script>

							</div>
						</div>
						<div class="f1-buttons">
							<button type="button" class="btn btn-previous">Previous</button>
							<button type="submit" class="btn btn-submit">Submit</button>
						</div>
					</fieldset>

				</form>

			</div>
		</div>
	</div>
</div>

<!-- Javascript -->
<script src="<?php echo BASE_URL; ?>wp-content/themes/alone/assets/js/jquery.backstretch.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				jQuery('#blah')
					.attr('src', e.target.result);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
	jQuery('body #user_type').change(function() {
		console.log("data3: " + jQuery(this).val());
		if (jQuery(this).val() == 'ngo') {
			jQuery(".ngodiv").css("display", "block");
			jQuery(".individual_persondiv").css("display", "none");
			jQuery(".individual_persondiv").removeClass("valid");
			jQuery(".ngodiv").addClass("valid");
		} else {
			jQuery(".individual_persondiv").css("display", "block");
			jQuery(".ngodiv").css("display", "none");
			jQuery(".ngodiv").removeClass("valid");
			jQuery(".individual_persondiv").addClass("valid");
		}
	});

	jQuery('body #img_type').change(function() {
		if (jQuery(this).val() == 'image') {
			jQuery(".imagediv").css("display", "block");
			jQuery(".videodiv").css("display", "none");
			jQuery(".videodiv").removeClass("valid");
			jQuery(".ngodiv").addClass("valid");
		} else {
			jQuery(".videodiv").css("display", "block");
			jQuery(".imagediv").css("display", "none");
			jQuery(".imagediv").removeClass("valid");
			jQuery(".videodiv").addClass("valid");
		}
	});

	jQuery('body #campaign_typeId').change(function() {
		if (jQuery(this).val() == '1') {
			jQuery("#campaign_typeId1").css("display", "block");
			jQuery("#campaign_typeId2").css("display", "none");
			jQuery("#campaign_typeId3").css("display", "none");
			jQuery("#campaign_typeId3").removeClass("mainvalid");
			jQuery("#campaign_typeId2").removeClass("mainvalid");
			jQuery("#campaign_typeId1").addClass("mainvalid");
		} else if (jQuery(this).val() == '2') {
			jQuery("#campaign_typeId2").css("display", "block");
			jQuery("#campaign_typeId1").css("display", "none");
			jQuery("#campaign_typeId3").css("display", "none");
			jQuery("#campaign_typeId3").removeClass("mainvalid");
			jQuery("#campaign_typeId1").removeClass("mainvalid");
			jQuery("#campaign_typeId2").addClass("mainvalid");
		} else if (jQuery(this).val() == '3') {
			jQuery("#campaign_typeId3").css("display", "block");
			jQuery("#campaign_typeId1").css("display", "none");
			jQuery("#campaign_typeId2").css("display", "none");
			jQuery("#campaign_typeId2").removeClass("mainvalid");
			jQuery("#campaign_typeId1").removeClass("mainvalid");
			jQuery("#campaign_typeId3").addClass("mainvalid");
		}
	});

	function scroll_to_class(element_class, removed_height) {
		var scroll_to = jQuery(element_class).offset().top - removed_height;
		if (jQuery(window).scrollTop() != scroll_to) {
			jQuery('html, body').stop().animate({
				scrollTop: scroll_to
			}, 0);
		}
	}

	function bar_progress(progress_line_object, direction) {
		var number_of_steps = progress_line_object.data('number-of-steps');
		var now_value = progress_line_object.data('now-value');
		var new_value = 0;
		if (direction == 'right') {
			new_value = now_value + (100 / number_of_steps);
		} else if (direction == 'left') {
			new_value = now_value - (100 / number_of_steps);
		}
		progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
	}

	jQuery(document).ready(function() {


		/*
		    Form
		*/
		jQuery('.f1 fieldset:first').fadeIn('slow');

		jQuery('.f1 input[type="text"],.f1 input[type="date"], .f1 input[type="password"], .f1 textarea, .f1 select, .f1 input[type="file"]').on('focus', function() {
			jQuery(this).removeClass('input-error');
		});

		// next step
		jQuery('.f1 .btn-next').on('click', function() {
			var parent_fieldset = jQuery(this).parents('fieldset');
			var next_step = true;
			// navigation steps / progress steps
			var current_active_step = jQuery(this).parents('.f1').find('.f1-step.active');
			var progress_line = jQuery(this).parents('.f1').find('.f1-progress-line');

			// console.log(parent_fieldset);

			// fields validation
			parent_fieldset.find('input[type="text"],input[type="date"], input[type="password"], textarea, select, input[type="file"]').each(function() {
				if (!jQuery(this).closest('.mainvalid').is(':visible')) {} else {
					if (!jQuery(this).closest('.valid').is(':visible')) {} else {

						isyouTubeUrl = true;
						var youtubevideo = jQuery("#youtubevideo").val(); //get the url from the input by the id url
						if (youtubevideo) {
							var _videoUrl = youtubevideo;
							var isyouTubeUrl = /((http|https):\/\/)?(www\.)?(youtube\.com)(\/)?([a-zA-Z0-9\-\.]+)\/?/.test(_videoUrl);
						}

						if (isyouTubeUrl == false) {
							jQuery(this).addClass('input-error');
							next_step = false;
						} else {
							if (jQuery(this).val() == "") {
								jQuery(this).addClass('input-error');
								next_step = false;
							} else {
								jQuery(this).removeClass('input-error');
							}
						}

					}
				}
			});
			// fields validation

			if (next_step) {
				parent_fieldset.fadeOut(400, function() {
					// change icons
					current_active_step.removeClass('active').addClass('activated').next().addClass('active');
					// progress bar
					bar_progress(progress_line, 'right');
					// show next step
					jQuery(this).next().fadeIn();
					// scroll window to beginning of the form
					scroll_to_class(jQuery('.f1'), 20);
				});
			}

		});

		// previous step
		jQuery('.f1 .btn-previous').on('click', function() {
			// navigation steps / progress steps
			var current_active_step = jQuery(this).parents('.f1').find('.f1-step.active');
			var progress_line = jQuery(this).parents('.f1').find('.f1-progress-line');

			jQuery(this).parents('fieldset').fadeOut(400, function() {
				// change icons
				current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
				// progress bar
				bar_progress(progress_line, 'left');
				// show previous step
				jQuery(this).prev().fadeIn();
				// scroll window to beginning of the form
				scroll_to_class(jQuery('.f1'), 20);
			});
		});

		// submit
		// jQuery('.f1').on('submit', function(e) {
		// 	showLoadingBar();
		// 	// fields validation
		// 	jQuery(this).find('input[type="text"], input[type="password"], textarea, select, input[type="file"]').each(function() {
		// 		// if (jQuery(this).val() == "") {
		// 		// 	e.preventDefault();
		// 		// 	jQuery(this).addClass('input-error');
		// 		// } else {
		// 		// 	jQuery(this).removeClass('input-error');
		// 		// }

		// 		if (!jQuery(this).closest('.mainvalid').is(':visible')) {} else {
		// 			if (!jQuery(this).closest('.valid').is(':visible')) {} else {
		// 				if (jQuery(this).val() == "") {
		// 					e.preventDefault();
		// 					jQuery(this).addClass('input-error');
		// 					hideLoadingBar();
		// 				} else {
		// 					jQuery(this).removeClass('input-error');
		// 					hideLoadingBar();
		// 				}
		// 			}
		// 		}
		// 	});
		// 	// fields validation

		// });


	});

	function showLoadingBar() {
		jQuery('.loadingBar').show();
	}

	function hideLoadingBar() {
		jQuery('.loadingBar').hide();
	}


	window.onbeforeunload = function() {
		showLoadingBar();
	}
	jQuery(window).on('load', function() {
		hideLoadingBar();
	});
</script>

<div class="svg_bleeding_stock_wrap">
	<!-- SVG Filters -->
	<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
		<defs>
			<!--   This is where the magic happens   -->
			<filter id="svg_bleeding_stock">

				<!--    Apply 10px blur    -->
				<feGaussianBlur in="SourceGraphic" stdDeviation="12" result="blured" />
				<!--   Increase the contrast of the alpha channel
	              Read this https://goo.gl/P152Jd     -->
				<feColorMatrix in="blured" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="weirdNumbers" />
				<!--    Adding the two effects,
	              Fix some bugs with "atop" -->
				<feComposite in="SourceGraphic" in2="weirdNumbers" operator="atop" />
			</filter>
		</defs>
	</svg>
</div>



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G07S511HVY"></script>
<script>
	window.dataLayer = window.dataLayer || [];

	function gtag() {
		dataLayer.push(arguments);
	}
	gtag('js', new Date());
	gtag('config', 'G-G07S511HVY');

	jQuery(document).ready(function() {
		jQuery(window).keydown(function(event) {
			if (event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});
</script>

<!-- Google Analytics -->
<script>
	(function(i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function() {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-XXXXX-Y', 'auto');
	ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

</body>

</html>