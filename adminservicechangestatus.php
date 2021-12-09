<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];

$data =array(
    'zed_verified' => 1,
    'admin_approved' => 1
);
$wherecondition=array(
    'id'=>$id
);
$wpdb->update('wp_services', $data, $wherecondition);

$services = $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");
$service_name = $services->service_name;
$start_date = date("d-m-Y", strtotime($services->start_date));
$end_date = date("d-m-Y", strtotime($services->end_date));
$description = $services->description;
$link = BASE_URL.'service-list/?slug='.$service_id;

$user_id = $services->userId;
$users = get_user_by('id',$user_id);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$to1 = $user_email;
$subject1 =  "ZedAid - Service Approved";
$from1 = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers1  = 'MIME-Version: 1.0' . "\r\n";
$headers1 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers1 .= 'From: ZED Foundation <' . $from1 . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from1 . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_approved.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message = fread($myfile,filesize($file));
$message = str_replace('{{NAME}}', $user_nicename , $message);
$message = str_replace('{{SERVICE_NAME}}', $service_name , $message);
$message = str_replace('{{START_DATE}}', $start_date , $message);
$message = str_replace('{{END_DATE}}', $end_date , $message);
$message = str_replace('{{DESCRIPTION}}', $description , $message);
$message = str_replace('{{LINK}}', $link , $message);
wp_mail($to1, $subject1, $message, $headers1);

echo 'true';
exit;