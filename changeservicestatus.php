<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$service_id = $_POST['service_id'];
$category_id = $_POST['cat_id'];
$request_id = $_POST['req_id'];
$supportDetails = $_POST['supportDetails'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

$wpdb->insert('wp_service_change_status', array(
    'request_id' => $request_id,
    'service_id' => $service_id,
    'category_id' => $category_id,
    'userId' => $userId,
    'name' => $name,
    'mobile_number' => $phone_number,
    'email' => $email,
    'supportDetails' => $supportDetails,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s")
));
$date = date("Y-m-d H:i:s");
$last_status_updated_id = $wpdb->insert_id;

$wpdb->get_results("UPDATE wp_service_request_data SET request_status = 3 WHERE id =" . $request_id);

/* $wpdb->query($wpdb->prepare("UPDATE wp_support_them SET supportDetails='$support_details', `status` = '1' WHERE floodCrisisId=$pid"));

$wpdb->query($wpdb->prepare("UPDATE wp_flood_crisis_data SET last_status_updated_id='$userId', `status` = '1' WHERE id=$pid"));

$results =  $wpdb->get_results("SELECT * FROM wp_flood_crisis_data WHERE id = '".$pid."' LIMIT 1");
$uid = $results[0]->userId;
$requester_email = $results[0]->email;
$login_user_name = $results[0]->name;
$categoryId = $results[0]->categoryId;

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidcategories WHERE id =" . $categoryId, OBJECT);
$res = $results[0];
$categoryName = $res->title;

$to = $requester_email;
$subject = 'iNeed! - Changes Request';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
$file = 'email/flood_closed.html';
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));

$message2 = str_replace('{{REQUEST_OWNER_NAME}}', $login_user_name , $message2);
$message2 = str_replace('{{EMAIL}}', $name , $message2);
$message2 = str_replace('{{CONTACT_NUMBER}}', $phone_number, $message2);
$message2 = str_replace('{{DESCRIPTION}}', $supportDetails, $message2);
$message2 = str_replace('{{REQUEST_TYPE}}', $categoryName, $message2);
$message2 = str_replace('{{LINK}}', "https://zedaid.org/i-need/", $message2);
wp_mail($to, $subject, $message2, $headers); */
/* End */

echo 'true';
exit;