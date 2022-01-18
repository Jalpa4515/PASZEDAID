<?php
date_default_timezone_set('Asia/Kolkata'); // your user's timezone
$created_at = date('Y-m-d H:i:s');
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];

//$category_id = $_POST['category_id'];
$service_id = $_POST['service_id'];
$statistics_on_banner = $_POST['statistics_on_banner'];
$status_label1 = $_POST['status_label1'];
$status_label2 = $_POST['status_label2'];
$status_label3 = $_POST['status_label3'];
$banner_label1 = $_POST['banner_label1'];
$banner_label2 = $_POST['banner_label2'];
$banner_label3 = $_POST['banner_label3'];
$select_drop1 = $_POST['select_drop1'];
$select_drop2 = $_POST['select_drop2'];
$select_drop3 = $_POST['select_drop3'];
$stats_check = $_POST['stats_check'];

$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");
//echo json_encode($categories);

 foreach($categories as $val1){
       
$category_id=$val1->category_id;
    
//if (empty($results)) {
    $sort_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE sort  IS NULL AND type='request' AND  category_id = '".$category_id."' ORDER BY id ASC");

//}else{
   // $sort_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE sort  IS NULL AND type='request' AND   category_id = '".$category_id."' ORDER BY id ASC");

//}
if(!empty($sort_fields)){
    $i = 1;
    foreach($sort_fields as $s){
        
        $sql = $wpdb->prepare(
            "UPDATE `wp_fields` SET `sort` = $i WHERE `id` = $s->id"
        );
        $wpdb->query($sql);
        $i++;
    } 

}




$request_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$category_id."' AND type = 'request' ORDER BY sort ASC");
$arr = array();
if(!empty($request_fields)){
    $i = 1;
    foreach($request_fields as $r){
        $d['table_field_name'] = 'custom_field_name'.$i;
        $d['display_name'] = $r->field_name;
        $d['field_type'] = $r->field_type;
        $d['options'] = $r->options;
        $arr[] = $d;
        $i++;
    }
}
$request_fields = json_encode($arr);

/* $support_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$id."' AND type = 'support'");
$results->support_fields = $support_fields; */

$wpdb->insert('wp_request_fields', array(
    'category_id' => $category_id,
    'service_id' => $service_id,
    'request_fields' => $request_fields,
    'status' => '1',
    'is_draft' => '1',
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
));

$support_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$category_id."' AND type = 'support' ORDER BY sort ASC");
$arr_support = array();
if(!empty($support_fields)){
    $i = 1;
    foreach($support_fields as $s){
        $d1['table_field_name'] = 'custom_field_name'.$i;
        $d1['display_name'] = $s->field_name;
        $d1['field_type'] = $s->field_type;
        $d1['options'] = $s->options;
        $arr_support[] = $d1;
        $i++;
    }
}
$support_fields = json_encode($arr_support);

$wpdb->insert('wp_support_fields', array(
    'category_id' => $category_id,
    'service_id' => $service_id,
    'support_fields' => $support_fields,
    'status' => '1',
    'is_draft' => '1',
    'created_at' => date("Y-m-d H:i:s"),
    'updated_at' => date("Y-m-d H:i:s"),
));






$count_fields =  $wpdb->get_results("SELECT * FROM wp_counter_fields WHERE category_id =".$category_id);

    //$i = 1;
    foreach($count_fields as $c){
        $sql = $wpdb->prepare(
            "UPDATE `wp_counter_fields` SET `service_id` = $service_id WHERE `id` = $c->id"
        );
        $wpdb->query($sql);
    //    $i++;
   } 











     } 






$resultsc = $wpdb->get_results("UPDATE wp_services SET is_draft = 0, admin_approved=0, enable_statistics = '".$statistics_on_banner."', status_label1 = '".$status_label1."', status_label2 = '".$status_label2."', status_label3 = '".$status_label3."', banner_label1 = '".$banner_label1."', banner_label2 = '".$banner_label2."', banner_label3 = '".$banner_label3."', stats_check = '".$stats_check."', count1 = '".$select_drop1."', count2 = '".$select_drop2."', count3 = '".$select_drop3."'  WHERE id =" . $service_id);


$wpdb->get_results("UPDATE wp_service_categories SET is_draft = 0 WHERE id =" . $service_id);






$users = get_user_by('id',$userId);
$user_email = $users->user_email;
$user_nicename = $users->user_nicename;

$services = $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");
$service_name = $services->service_name;
$start_date = date("d-m-Y", strtotime($services->start_date));
$end_date = date("d-m-Y", strtotime($services->end_date));
$description = $services->description;
$link = BASE_URL.'services';

/* Send to created user */
$to = $user_email; //$user_email;
$subject =  "ZedAid - New Service Created";
$from = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_created.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message2 = fread($myfile,filesize($file));
$message2 = str_replace('{{NAME}}', $user_nicename , $message2);
$message2 = str_replace('{{SERVICE_NAME}}', $service_name , $message2);
$message2 = str_replace('{{START_DATE}}', $start_date , $message2);
$message2 = str_replace('{{END_DATE}}', $end_date , $message2);
$message2 = str_replace('{{DESCRIPTION}}', $description , $message2);
$message2 = str_replace('{{LINK}}', $link , $message2);
wp_mail($to, $subject, $message2, $headers);
/* End */

$link = BASE_URL.'service-list/?slug='.$service_id;
$admin_email = get_option( 'admin_email' );

$to = $admin_email; //$user_email;
$subject =  "ZedAid - New Service Created";
$from = 'info@zedaid.org';
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$file = 'email/service_created_for_admin.html';    
$myfile = fopen($file, "r") or die("Unable to open file!");
$message = fread($myfile,filesize($file));
$message = str_replace('{{NAME}}', $user_nicename , $message);
$message = str_replace('{{SERVICE_NAME}}', $service_name , $message);
$message = str_replace('{{START_DATE}}', $start_date , $message);
$message = str_replace('{{END_DATE}}', $end_date , $message);
$message = str_replace('{{DESCRIPTION}}', $description , $message);
$message = str_replace('{{LINK}}', $link , $message);
wp_mail($to, $subject, $message, $headers);

header("Location: " . BASE_URL . "thank-you-for-registration");