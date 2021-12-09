<?php
/* plugin name: Useful Data */
/* Plugin URI: http://greencubes.co.in/ */
/* Description: this is plugin is used to add partner details.*/
/* Version: 1.1
   Author: Greencubes
   Author URI: http://greencubes.co.in/
*/

//admin menu code
add_action('admin_menu', 'usefull_data_list');
function usefull_data_list()
{
	add_menu_page('Useful Data List', 'Useful Data', 'publish_pages', 'usefull-data-view', 'usefull_data_link_view', '', 10);
	
	add_submenu_page('usefull-data-view', 'Useful Data List', 'Add Useful Link', 'publish_pages', 'usefull-data-link-add1', 'usefull_data_manage_add1');

	add_submenu_page('usefull-data-view', 'Useful Data Links', 'Useful Data Contacts', 'publish_pages', 'usefull-data-contact-view', 'usefull_data_contact_view');

	add_submenu_page('usefull-data-view', 'Useful Data List', 'Add Useful Contact', 'publish_pages', 'usefull-data-link-add2', 'usefull_data_manage_add2');
}
//back end css
//css
function usefull_style2()
{
	wp_enqueue_style('partner_list_custom', plugins_url('/css/partner_custom.css', __FILE__), false, '1.0', 'all');
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_style('bootstrap', plugins_url('/css/bootstrap.min.css', __FILE__), false, '1.0', 'all');
}
//js
function usefull_script2()
{
	wp_enqueue_script('my-script-handle', plugins_url('js/my-script.js', __FILE__), array('wp-color-picker'), false, true);
}

function usefull_data_link_view()
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	global $wpdb;
	$url = plugins_url();
	usefull_style2();
	$tabel_name3 = 'wp_usefull_links';

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 10;
	$offset = ($pageno - 1) * $no_of_records_per_page;

	if (isset($_GET['orderby'])) {
		$orderby = $_GET['orderby'];
		$order = $_GET['order'];
	} else {
		$orderby = 'Id';
		$order = 'desc';
	}

	$s = '';
	$categoryId = 0;
	$bloodGroup = 0;
	$bloodGroup = !empty($_GET['bloodGroup']) ? $_GET['bloodGroup'] : 0;

	$sbloodGroup = 0;
	
    if (!empty($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];
        $allcoupons = $wpdb->get_results("select * from $tabel_name3 where category IN ($categoryId) order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

        $resultscount =  $wpdb->get_results("select * from $tabel_name3 where category IN ($categoryId) order by id desc");
    }else if (!empty($_GET['s'])) {
			$s = $_GET['s'];
			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where link LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");
			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where link LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by id desc");
	} else {
		$allcoupons = $wpdb->get_results("select * from $tabel_name3 order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");
		$resultscount =  $wpdb->get_results("select * from $tabel_name3 order by id desc");
	}

	$total_rows = count($resultscount);
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	?>
	<br /><br />
	<div class="refresh_data">
		<?php
			if (isset($_GET) && $_GET['file'] == 'no') {
				?>
			<div class="container">

				<h5 style="display:inline; float:right;color: red;margin-right: 10px;"><b>Please select file for import.</b></h5><br>

			</div>
		<?php
			}
			?>
		<div class="container">

			<h4 style="display:inline; float:left;"><b>Useful Data Links</b></h4>

			<!-- <h4 style="display:inline; float:right;">


				<form enctype='multipart/form-data' style="display: inline;float: left;" action="admin.php?page=covid-partner-import" method="post">

					<input type="file" name="importexcel" style="display: inline;float: left;margin-left: 10px;width: 250px;margin-top: -3px;" />

					<input type="submit" class='btn btn-success btn-xs' value="Import" style="padding: 6px 12px;display: inline;float: left;margin-left: 10px">

					<a class='' style="padding: 6px 12px;display: inline;float: left;" href="https://jedaitestbed.in/zed/sampleexportdata.php"> Sample import file</a>

				</form>

			</h4> -->

			<br /><br /><br />

			<!-- <table class="table table-striped custab"> -->

			<form style="display: inline;float: left;width: 51%;" enctype='multipart/form-data' action="admin.php?page=usefull-data-view" method="get">

				<input value="usefull-data-view" name="page" type="hidden">

				<select style="display: inline;float: left;" class="form-control" id="ddcategoryId" name="categoryId">
					<option value="0" <?= $categoryId == 0 ? 'selected' : ''; ?>>Select Category</option>
					<option value="1" <?= $categoryId == 1 ? 'selected' : ''; ?>>Covid Hospital</option>
					<option value="2" <?= $categoryId == 2 ? 'selected' : ''; ?>>Remdesivir Injection</option>
					<option value="3" <?= $categoryId == 3 ? 'selected' : ''; ?>>Plasma</option>
					<option value="4" <?= $categoryId == 4 ? 'selected' : ''; ?>>Oxygen Cylinder</option>
				</select>

				<input style="width:25%;display: inline;float: left;margin-left: 10px;" class="form-control" value="<?php echo $s; ?>" name="s" type="hidden">

				<input style="display: inline;float: left;margin-left: 10px;" type="submit" value="Filter" class="btn btn-success" />

			</form>

			<form style="margin-left: 10px;display: inline;float: right;width: 35%;" enctype='multipart/form-data' action="admin.php?page=usefull-data-view" method="get">

				<input value="usefull-data-view" name="page" type="hidden">

				<input value="<?= $categoryId ?>" name="categoryId" type="hidden">

				<input value="<?= $bloodGroup ?>" name="bloodGroup" type="hidden">

				<input style="width:77%;display: inline;float: left;" class="form-control" value="<?php echo $s; ?>" name="s" type="text">

				<input style="margin-left: 10px;" type="submit" value="Search" class="btn btn-success" />

			</form>

			<!-- </table> -->

			<br /><br />

			<table class="table table-striped custab">
				<tr>
					<th>Category</a></th>
					<th>Link</th>
					<th>Location</th>
					<th>Comments</th>
					<th>Action</th>
				</tr>
				<?php
					if ($allcoupons) {
						foreach ($allcoupons as $data) {
							$category = $data->category;
							
							$cat =  $wpdb->get_results("select * from wp_covidcategories where id = '$category' limit 1");
							$categoryName = $cat[0]->title;

							$link = $data->link;
							$location = $data->location;
							$comments = $data->comments;

							$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>Bed: ' . $data->bed . '<br>Bed with oxygen: ' . $data->oxygen . '<br>Bed with ventilator: ' . $data->ventilator . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

							$editurl = "admin.php?page=usefull-data-link-add1&id=" . $data->id . "&action=edit";
							
							?>
						<tr>
							<td><?php echo $categoryName; ?></td>
							<td><?php echo $link; ?></td>
							<td><?php echo $location; ?></td>
							<td><?php echo $comments; ?></td>
							<td><a class='btn btn-info btn-xs' style="padding: 6px 12px;" href="<?php echo $editurl; ?>"> Edit</a>&nbsp;&nbsp;
								<a class="btn btn-danger btn-xs delete" style="padding: 6px 12px;" data-id="<?php echo $data->id; ?>"> Delete</a></td>
						</tr>
					<?php }
						} else {
							?>
					<tr>
						<td colspan="6" style="text-align:center">No record found.</td>
					</tr>
				<?php
					}
					?>
			</table>

			<?php
				$pagLink = "<br/><ul class='pagination'>";
				if ($total_pages > 1) {
					for ($i = 1; $i <= $total_pages; $i++) {
						if ($pageno == $i) {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						} else {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: #999;margin-left: 10px;background-color: white;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						}
					}
				}
				echo $pagLink . "</ul>";
				?>

		</div>
	</div>
<?php
}

function usefull_data_contact_view()
{
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	global $wpdb;
	$url = plugins_url();
	usefull_style2();
	$tabel_name3 = 'wp_usefull_contacts';

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 10;
	$offset = ($pageno - 1) * $no_of_records_per_page;

	if (isset($_GET['orderby'])) {
		$orderby = $_GET['orderby'];
		$order = $_GET['order'];
	} else {
		$orderby = 'Id';
		$order = 'desc';
	}

	$s = '';
	$categoryId = 0;
	$bloodGroup = 0;
	$bloodGroup = !empty($_GET['bloodGroup']) ? $_GET['bloodGroup'] : 0;

	$sbloodGroup = 0;
	

	if (!empty($_GET['categoryId'])) {
        $categoryId = $_GET['categoryId'];
        $allcoupons = $wpdb->get_results("select * from $tabel_name3 where category IN ($categoryId) order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");

        $resultscount =  $wpdb->get_results("select * from $tabel_name3 where category IN ($categoryId) order by id desc");
    }else if (!empty($_GET['s'])) {
			$s = $_GET['s'];
			$allcoupons = $wpdb->get_results("select * from $tabel_name3 where contactName LIKE '%" . $s . "%' OR contactNumber LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");
			$resultscount =  $wpdb->get_results("select * from $tabel_name3 where contactName LIKE '%" . $s . "%' OR contactNumber LIKE '%" . $s . "%' OR location LIKE '%" . $s . "%' order by id desc");
	} else {
		$allcoupons = $wpdb->get_results("select * from $tabel_name3 order by " . $orderby . " " . $order . " LIMIT $offset, $no_of_records_per_page");
		$resultscount =  $wpdb->get_results("select * from $tabel_name3 order by id desc");
	}

	$total_rows = count($resultscount);
	$total_pages = ceil($total_rows / $no_of_records_per_page);

	?>
	<br /><br />
	<div class="refresh_data">
		<?php
			if (isset($_GET) && $_GET['file'] == 'no') {
				?>
			<div class="container">

				<h5 style="display:inline; float:right;color: red;margin-right: 10px;"><b>Please select file for import.</b></h5><br>

			</div>
		<?php
			}
			?>
		<div class="container">

			<h4 style="display:inline; float:left;"><b>Useful Data Contacts</b></h4>

			<!-- <h4 style="display:inline; float:right;">


				<form enctype='multipart/form-data' style="display: inline;float: left;" action="admin.php?page=covid-partner-import" method="post">

					<input type="file" name="importexcel" style="display: inline;float: left;margin-left: 10px;width: 250px;margin-top: -3px;" />

					<input type="submit" class='btn btn-success btn-xs' value="Import" style="padding: 6px 12px;display: inline;float: left;margin-left: 10px">

					<a class='' style="padding: 6px 12px;display: inline;float: left;" href="https://jedaitestbed.in/zed/sampleexportdata.php"> Sample import file</a>

				</form>

			</h4> -->

			<br /><br /><br />

			<!-- <table class="table table-striped custab"> -->

			<form style="display: inline;float: left;width: 51%;" enctype='multipart/form-data' action="admin.php?page=usefull-data-contact-view" method="get">

				<input value="usefull-data-contact-view" name="page" type="hidden">

				<select style="display: inline;float: left;" class="form-control" id="ddcategoryId" name="categoryId">
					<option value="0" <?= $categoryId == 0 ? 'selected' : ''; ?>>Select Category</option>
					<option value="1" <?= $categoryId == 1 ? 'selected' : ''; ?>>Covid Hospital</option>
					<option value="2" <?= $categoryId == 2 ? 'selected' : ''; ?>>Remdesivir Injection</option>
					<option value="3" <?= $categoryId == 3 ? 'selected' : ''; ?>>Plasma</option>
					<option value="4" <?= $categoryId == 4 ? 'selected' : ''; ?>>Oxygen Cylinder</option>
				</select>

				<?php
				if ($categoryId == 3) {
					$style = "display: inline;float: left;margin-left: 10px;";
				} else {
					$style = "display: none;float: left;margin-left: 10px;";
				}
				?>

				<input style="width:25%;display: inline;float: left;margin-left: 10px;" class="form-control" value="<?php echo $s; ?>" name="s" type="hidden">

				<input style="display: inline;float: left;margin-left: 10px;" type="submit" value="Filter" class="btn btn-success" />

			</form>

			<form style="margin-left: 10px;display: inline;float: right;width: 35%;" enctype='multipart/form-data' action="admin.php?page=usefull-data-contact-view" method="get">

				<input value="usefull-data-contact-view" name="page" type="hidden">

				<input value="<?= $categoryId ?>" name="categoryId" type="hidden">

				<input value="<?= $bloodGroup ?>" name="bloodGroup" type="hidden">

				<input style="width:77%;display: inline;float: left;" class="form-control" value="<?php echo $s; ?>" name="s" type="text">

				<input style="margin-left: 10px;" type="submit" value="Search" class="btn btn-success" />

			</form>

			<!-- </table> -->

			<br /><br />

			<table class="table table-striped custab">
				<tr>
					<th>Category</a></th>
					<th>Name</th>
					<th>Mobile Number</th>
					<th>Location</th>
					<th>Action</th>
				</tr>
				<?php
					if ($allcoupons) {
						foreach ($allcoupons as $data) {
							$category = $data->category;
							
							$cat =  $wpdb->get_results("select * from wp_covidcategories where id = '$category' limit 1");
							$categoryName = $cat[0]->title;

							$location = $data->location;
							$contactName = $data->contactName;
							$contactNumber = $data->contactNumber;
							
							$dhtml = '<div class="" style="font-size: 15px;font-weight: 500;">' . $title . '<br><br>Bed: ' . $data->bed . '<br>Bed with oxygen: ' . $data->oxygen . '<br>Bed with ventilator: ' . $data->ventilator . '<br><br>Location: ' . $data->location . '<br><br>Contact: ' . $data->contactName . ' - ' . $data->contactNumber1 . '</div>';

							$editurl = "admin.php?page=usefull-data-link-add2&id=" . $data->id . "&action=edit";
							
							?>
						<tr>
							<td><?php echo $categoryName; ?></td>
							<td><?php echo $contactName; ?></td>
							<td><?php echo $contactNumber; ?></td>
							<td><?php echo $location; ?></td>
							<td><a class='btn btn-info btn-xs' style="padding: 6px 12px;" href="<?php echo $editurl; ?>"> Edit</a>&nbsp;&nbsp;
								<a class="btn btn-danger btn-xs delete" style="padding: 6px 12px;" data-id="<?php echo $data->id; ?>"> Delete</a></td>
						</tr>
					<?php }
						} else {
							?>
					<tr>
						<td colspan="6" style="text-align:center">No record found.</td>
					</tr>
				<?php
					}
					?>
			</table>

			<?php
				$pagLink = "<br/><ul class='pagination'>";
				if ($total_pages > 1) {
					for ($i = 1; $i <= $total_pages; $i++) {
						if ($pageno == $i) {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						} else {
							$pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: #999;margin-left: 10px;background-color: white;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
						}
					}
				}
				echo $pagLink . "</ul>";
				?>

		</div>
	</div>
<?php
}

function usefull_data_manage_add1()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	usefull_style2();
	//url get
	$url = plugins_url();
	//js call function
	usefull_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$link = $_POST['link'];
		$category = $_POST['category'];
		$location = $_POST['location'];
		$comments = $_POST['comments'];
		$status  = 1;
		$address = str_replace(" ", "+", $location);

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		// exit;
		$details = file_get_contents($url);

		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng'];

		$table_name = "wp_usefull_links";

		$arg = array(
			'category' => $category,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'comments' => $comments,
			'link' => $link,
			'status' => $status,
			'createdAt' => date('Y-m-d H:i:s'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_usefull_links";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	$cities = $wpdb->get_results("select * from cities order by city_name ASC");
	?>	
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Useful link Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Useful link Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Add Useful Link</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
						<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
						<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
							.select2-container .select2-selection--single {
								cursor: pointer;
								min-height: 35px !important;
							}
							.select2-container--default .select2-selection--single .select2-selection__rendered {
								line-height: 33px !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="col-md-12">
									<div class="col-md-3">
										<div class="form-group">
											<label>Category</label>
											<select class="form-control" name="category" id="cstatus">
												<option <?= $result_edit->status == '4' ? 'selected = "selected"' : ''; ?> value="4">Oxygen Cylinder</option>
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Covid Hospital</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">Remdesivir Injection</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Plasma</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Location</label>
											<br>
											<select class="js-example-basic-single form-control" name="location">
												<option value="Pan India" <?= $result_edit->location == "Pan India" ? 'selected = "selected"' : ''; ?>>Pan India</option>
												<?php foreach($cities as $val){?>
													<option value="<?= $val->city_name; ?>" <?= $result_edit->location == $val->city_name ? 'selected = "selected"' : ''; ?>><?= $val->city_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Link</label>
											<input class="form-control" value="<?php echo $result_edit->link; ?>" name="link" id="link" type="text">
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label>Comments</label>
											<textarea class="form-control" name="comments" id="comments"><?php echo $result_edit->comments; ?></textarea>
										</div>
									</div>
								</div>

								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery('.js-example-basic-single').select2();
								jQuery("#validform").validate({
									rules: {
										link: {
											required: true,
											url: true
										},
										location: 'required',
										category: 'required'
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phonenumber", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length > 9 &&
										phone_number.match(/^[0-9-+]+$/);
								}, "Please specify a valid phone number");
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
	add_thickbox(); 
	?>

<?php
}

function usefull_data_manage_add2()
{
	// if (!current_user_can('manage_options')) {
	// 	wp_die(__('You do not have sufficient permissions to access this page.'));
	// }
	//css call function
	usefull_style2();
	//url get
	$url = plugins_url();
	//js call function
	usefull_script2();
	global $wpdb;

	if (isset($_POST['submit'])) {

		extract($_POST);
		//print_r($_POST);

		$contactName = $_POST['contactName'];
		$contactNumber = $_POST['contactNumber'];
		$category = $_POST['category'];
		$location = $_POST['location'];
		
		$status  = 1;
		$address = str_replace(" ", "+", $location);

		/* $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
		$details = file_get_contents($url);
		$resultx = json_decode($details, true);
		$latitude = $resultx['results'][0]['geometry']['location']['lat'];
		$longitude = $resultx['results'][0]['geometry']['location']['lng']; */

		$latitude = "0.00";
		$longitude = "0.00";

		$table_name = "wp_usefull_contacts";

		$arg = array(
			'category' => $category,
			'location' => $location,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'contactName' => $contactName,
			'contactNumber' => $contactNumber,
			'status' => $status,
			'createdAt' => date('Y-m-d H:i:s'),
			'updatedAt' => date('Y-m-d H:i:s'),
		);

		if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
			$id = array('id' => $_REQUEST['id']);
			$resultupdate = $wpdb->update($table_name, $arg, $id);
		} else {
			$result = $wpdb->insert($table_name, $arg);
		}
	}

	if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
		global $wpdb;
		$table_name = "wp_usefull_contacts";
		$result_edit = $wpdb->get_row("select * from $table_name where Id='" . $_REQUEST['id'] . "'");
	}

	$cities = $wpdb->get_results("select * from cities order by city_name ASC");
	?>	
	<br /><br />
	<div class="container">
		<?php if (isset($result) && $result == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Useful contact Successfully Added.</p></div><br/>';
			} ?>
		<?php if (isset($resultupdate) && $resultupdate == 1) {
				echo '<div class="updated notice" style="background:#dff0d8"><p>Useful contact Updated Successfully.</p></div><br/>';
			} ?>
		<div class="row">

			<div class="col-md-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Add Useful Contact</h3>
					</div>
					<div class="panel-body">

						<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
						<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
						<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

						<style>
							.error {
								color: red !important;
							}
							.select2-container .select2-selection--single {
								cursor: pointer;
								min-height: 35px !important;
							}
							.select2-container--default .select2-selection--single .select2-selection__rendered {
								line-height: 33px !important;
							}
						</style>

						<form id="validform" accept-charset="UTF-8" role="form" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="col-md-12">
									<div class="col-md-3">
										<div class="form-group">
											<label>Category</label>
											<select class="form-control" name="category" id="cstatus">
												<option <?= $result_edit->status == '4' ? 'selected = "selected"' : ''; ?> value="4">Oxygen Cylinder</option>
												<option <?= $result_edit->status == '1' ? 'selected = "selected"' : ''; ?> value="1">Covid Hospital</option>
												<option <?= $result_edit->status == '2' ? 'selected = "selected"' : ''; ?> value="2">Remdesivir Injection</option>
												<option <?= $result_edit->status == '3' ? 'selected = "selected"' : ''; ?> value="3">Plasma</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Location</label>
											<br>
											<select class="js-example-basic-single form-control" name="location">
												<option value="Pan India" <?= $result_edit->location == "Pan India" ? 'selected = "selected"' : ''; ?>>Pan India</option>
												<?php foreach($cities as $val){?>
													<option value="<?= $val->city_name; ?>" <?= $result_edit->location == $val->city_name ? 'selected = "selected"' : ''; ?>><?= $val->city_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Name</label>
											<input class="form-control" value="<?php echo $result_edit->contactName; ?>" name="contactName" id="contactName" type="text">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label>Mobile Number</label>
											<input class="form-control" value="<?php echo $result_edit->contactNumber; ?>" name="contactNumber" id="contactNumber" type="text">
										</div>
									</div>
									
								</div>

								<div class="col-md-12" align="center">
									<br />
									<input class="btn btn-lg btn-success" name="submit" type="submit" value="Submit">
								</div>

							</fieldset>
						</form>

						<script>
							jQuery(document).ready(function() {
								jQuery('.js-example-basic-single').select2();
								jQuery("#validform").validate({
									rules: {
										contactNumber: {
											required: true,
											phonenumber: true
										},
										location: 'required',
										contactName: 'required',
										category: 'required'
									},
									submitHandler: function(form) {
										form.submit();
									}
								});
								jQuery.validator.addMethod("phonenumber", function(phone_number, element) {
									phone_number = phone_number.replace(/\s+/g, "");
									return this.optional(element) || phone_number.length == 10 &&
										phone_number.match(/^[0-9-+]+$/);
								}, "Please specify a valid phone number");
							});
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php // popup link
	add_thickbox(); 
	?>

<?php
}

function usefull_data_manage_import()
{
	global $wpdb;
	// echo '<pre>';
	// print_r($_POST);
	// echo 'bb';
	// print_r($_FILES);
	$file = $_FILES['importexcel']['tmp_name'];
	if ($file) {

		$handle = fopen($file, "r");
		// print_r($handle);
		$c = 0;
		$row = 1;
		while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {

			// $num = count($filesop);
			// echo "<p> $num fields in line $row: <br /></p>\n";

			// echo 'aa<pre>';
			// print_r($filesop);

			if ($row > 1) {
				$categoryName = $filesop[0];
				if ($categoryName == 'Covid Hospital') {
					$categoryId = 1;
				} else if ($categoryName == 'Remdesivir Injection') {
					$categoryId = 2;
				} else if ($categoryName == 'Plasma') {
					$categoryId = 3;
				} else if ($categoryName == 'Oxygen Cylinder') {
					$categoryId = 4;
				}

				$title  = $filesop[1];
				$bed = $filesop[2];
				$oxygen = $filesop[3];
				$ventilator = $filesop[4];
				$quantity = $filesop[5];
				$gender = $filesop[6];
				$bloodGroup = $filesop[7];
				$coronaRecoverDate = $filesop[8];
				$coronaEligibleDate = $filesop[9];
				$location = $filesop[10];
				$contactName = $filesop[11];
				$contactNumber1 = $filesop[12];
				$informationBy = $filesop[13];
				$status = $filesop[14];
				if ($status == 'Available') {
					$cstatus = 1;
				} else if ($status == 'To be available') {
					$cstatus = 2;
				} else if ($status == 'Not available') {
					$cstatus = 3;
				}

				$availableDate = $filesop[15];

				$address = str_replace(" ", "+", $location);

				$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false&key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co";
				$details = file_get_contents($url);

				$resultx = json_decode($details, true);
				$latitude = $resultx['results'][0]['geometry']['location']['lat'];
				$longitude = $resultx['results'][0]['geometry']['location']['lng'];

				$arg = array(
					'categoryName' => $categoryName,
					'title' => $title,
					'categoryId' => $categoryId,
					'bed' => $bed,
					'oxygen' => $oxygen,
					'ventilator' => $ventilator,
					'quantity' => $quantity,
					'gender' => $gender,
					'bloodGroup' => $bloodGroup,
					'coronaRecoverDate' => $coronaRecoverDate,
					'coronaEligibleDate' => $coronaEligibleDate,

					'location' => $location,
					'latitude' => $latitude,
					'longitude' => $longitude,
					'contactName' => $contactName,
					'contactNumber1' => $contactNumber1,
					'informationBy' => $informationBy,
					'status' => $cstatus,
					'availableDate' => $availableDate,
					'updatedAt' => date('Y-m-d H:i:s'),
				);

				$table_name = "wp_covidlistdetails";

				$result = $wpdb->insert($table_name, $arg);
			}

			$c = $c + 1;

			$row++;
		}
		wp_redirect('https://jedaitestbed.in/zed/wp-admin/admin.php?page=usefull-data-view');
		exit;
	} else {
		wp_redirect('https://jedaitestbed.in/zed/wp-admin/admin.php?page=usefull-data-view&file=no');
		exit;
	}
}


add_action('admin_footer', 'usefull_data_action_javascript21');
function usefull_data_action_javascript21()
{ ?>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap">
	</script>

	<script>
		var autocomplete;

		function initMap() {
			autocomplete = new google.maps.places.Autocomplete(
				/** @type {HTMLInputElement} */
				(document.getElementById('location')), {
					types: ['geocode']
				});
			google.maps.event.addListener(autocomplete, 'place_changed', function() {});
		}
	</script>

	<script type="text/javascript">
		// get your select element and listen for a change event on it
		jQuery('#adddataadd').change(function() {
			// set the window's location property to the value of the option the user has selected
			// if(jQuery(this).val() == 1){
			window.location = jQuery(this).val();
			// }
		});

		jQuery('#cstatus').change(function() {
			// set the window's location property to the value of the option the user has selected
			if (jQuery(this).val() == 2) {
				jQuery('#avaialbledatediv').css('display', '');
			} else {
				jQuery('#avaialbledatediv').css('display', 'none');
			}
		});


		jQuery(document).on('click', '.delete', function() {

			var id = jQuery(this).attr('data-id');
			jQuery('body').css('opacity', '0.5');
			jQuery.ajax({
				type: "POST",
				url: "<?php echo plugin_dir_url(__FILE__); ?>deletecovidpartner.php",
				data: {
					fileid: id
				}
			}).done(function(msg) {
				jQuery('.refresh_data').load(document.URL + ' .refresh_data');
				jQuery('body').css('opacity', '1');

			});

		});

		jQuery(document).on('click', '.onoffswitch4-checkbox-new', function() {

			jQuery('body').css('opacity', '0.5');
			var deals_status = jQuery(this).val();
			var deals_code = jQuery(this).attr('data-id');
			jQuery.ajax({
				type: "POST",
				url: "<?php echo plugin_dir_url(__FILE__); ?>status_covid_change.php",
				data: "deals_status=" + deals_status + "&deals_code=" + deals_code,
			}).done(function(msg) {

				jQuery('.refresh_data').load(document.URL + ' .refresh_data');
				jQuery('body').css('opacity', '1');

			});


		});
	</script>
<?php
}