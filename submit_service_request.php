<?php
require_once('wp-config.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);
global $wpdb;
$userId = $_POST['userId'];
$category_id = $_POST['hidcategoryId'];
$service_id = $_POST['service_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_number = $_POST['phone_number'];
$address = $_POST['address'];
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
$wpdb->insert('wp_service_request_data', array(
    'userId' => $userId,
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

$users = get_user_by('id',$userId);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$services = $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");
$service_name = $services->service_name;
$start_date = date("d-m-Y", strtotime($services->start_date));
$end_date = date("d-m-Y", strtotime($services->end_date));
$description = $services->description;
$link = BASE_URL.'service-list/?slug='.$service_id;

$admin_email = get_option( 'admin_email' );

$to = $user_email;
$subject =  "ZedAid - New Service Request Created";
$from = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_request_user.html';    
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
//wp_mail($to, $subject, $message2, $headers);

/* Owner */
$user_id = $services->userId;
$users = get_user_by('id',$user_id);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$to1 = $user_email;
$subject1 =  "ZedAid - New Service Request Received";
$from1 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers1 .= 'From: ZED Foundation <' . $from1 . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from1 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_request_owner.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message1 = fread($myfile,filesize($file));
$message1 = str_replace('{{NAME}}', $user_nicename , $message1);
$message1 = str_replace('{{SERVICE_NAME}}', $service_name , $message1);
$message1 = str_replace('{{EMAIL}}', $email , $message1);
$message1 = str_replace('{{MOBILE_NUMBER}}', $mobile_number , $message1);
$message1 = str_replace('{{ADDRESS}}', $address , $message1);
$message1 = str_replace('{{DESCRIPTION}}', $description , $message1);
$message1 = str_replace('{{LINK}}', $link , $message1);
$message1 = str_replace('{{DF}}', "", $message1);
//wp_mail($to1, $subject1, $message1, $headers1);

/* Admin */
$admin_email = get_option( 'admin_email' );
$user_id = $services->userId;
$users = get_user_by('id',$user_id);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$to0 = $admin_email;
$subject0 =  "ZedAid - New Service Request Received";
$from0 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers0  = 'MIME-Version: 1.0' . "\r\n";
$headers0 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers0 .= 'From: ZED Foundation <' . $from0 . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from0 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_request_admin.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message0 = fread($myfile,filesize($file));
$message0 = str_replace('{{NAME}}', $user_nicename , $message0);
$message0 = str_replace('{{SERVICE_NAME}}', $service_name , $message0);
$message0 = str_replace('{{EMAIL}}', $email , $message0);
$message0 = str_replace('{{MOBILE_NUMBER}}', $mobile_number , $message0);
$message0 = str_replace('{{ADDRESS}}', $address , $message0);
$message0 = str_replace('{{DESCRIPTION}}', $description , $message0);
$message0 = str_replace('{{LINK}}', $link , $message0);
$message0 = str_replace('{{DF}}', "", $message0);
//wp_mail($to0, $subject0, $message0, $headers0);

echo $last_status_updated_id;
exit;