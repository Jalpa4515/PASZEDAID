<?php
require_once('wp-config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$request_id = $_POST['request_id'];
$category_id = $_POST['hidcategoryId'];
$service_id = $_POST['service_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_number = $_POST['phone_number'];
$address = $_POST['address2'];
$latitude = $_POST['lat'];
$longitude = $_POST['lng'];

if(isset($_POST['custom_field_name1'])){
    $custom_field_name1 = $_POST['custom_field_name1'];
}else{
    $custom_field_name1 = "";
}

if(isset($_POST['custom_field_name2'])){
    $custom_field_name2 = $_POST['custom_field_name2'];
}else{
    $custom_field_name2 = "";
}

if(isset($_POST['custom_field_name3'])){
    $custom_field_name3 = $_POST['custom_field_name3'];
}else{
    $custom_field_name3 = "";
}

if(isset($_POST['custom_field_name4'])){
    $custom_field_name4 = $_POST['custom_field_name4'];
}else{
    $custom_field_name4 = "";
}

if(isset($_POST['custom_field_name5'])){
    $custom_field_name5 = $_POST['custom_field_name5'];
}else{
    $custom_field_name5 = "";
}

$wpdb->insert('wp_service_support_data', array(
    'userId' => $userId,
    'request_id' => $request_id,
    'category_id' => $category_id,
    'service_id' => $service_id,
    'name' => $name,
    'email' => $email,
    'mobile_number' => $mobile_number,
    'address' => $address,
    'latitude' => $latitude,
    'longitude' => $longitude,
    'status' => '1',
    'custom_field_name1' => $custom_field_name1,
    'custom_field_name2' => $custom_field_name2,
    'custom_field_name3' => $custom_field_name3,
    'custom_field_name4' => $custom_field_name4,
    'custom_field_name5' => $custom_field_name5,
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
));
$last_status_updated_id = $wpdb->insert_id;

$wpdb->get_results("UPDATE wp_service_request_data SET request_status = '2' WHERE id =" . $request_id);

$users = get_user_by('id',$userId);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$services = $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");
$service_name = $services->service_name;
$start_date = date("d-m-Y", strtotime($services->start_date));
$end_date = date("d-m-Y", strtotime($services->end_date));
$description = $services->description;
$link = BASE_URL.'service-list/?slug='.$service_id;

$to = $user_email;
$subject =  "ZedAid - Supporter Info";
$from = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_response_user.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));
$message2 = str_replace('{{NAME}}', $user_nicename , $message2);
$message2 = str_replace('{{SERVICE_NAME}}', $service_name , $message2);
$message2 = str_replace('{{EMAIL}}', $email , $message2);
$message2 = str_replace('{{MOBILE_NUMBER}}', $mobile_number , $message2);
$message2 = str_replace('{{ADDRESS}}', $address , $message2);
$message2 = str_replace('{{DESCRIPTION}}', $description , $message2);
$message2 = str_replace('{{LINK}}', $link , $message2);
$message2 = str_replace('{{DF}}', "", $message2);
wp_mail($to, $subject, $message2, $headers);

$admin_email = get_option( 'admin_email' );

$to1 = $admin_email;
$subject1 =  "ZedAid - Supporter Info";
$from1 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers1 .= 'From: ZED Foundation <' . $from1 . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from1 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_response_admin.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message3 = fread($myfile,filesize($file));
$message3 = str_replace('{{NAME}}', $user_nicename , $message3);
$message3 = str_replace('{{SERVICE_NAME}}', $service_name , $message3);
$message3 = str_replace('{{EMAIL}}', $email , $message3);
$message3 = str_replace('{{MOBILE_NUMBER}}', $mobile_number , $message3);
$message3 = str_replace('{{ADDRESS}}', $address , $message3);
$message3 = str_replace('{{DESCRIPTION}}', $description , $message3);
$message3 = str_replace('{{LINK}}', $link , $message3);
$message3 = str_replace('{{DF}}', "", $message3);
wp_mail($to1, $subject1, $message3, $headers1);
echo $last_status_updated_id;
exit;