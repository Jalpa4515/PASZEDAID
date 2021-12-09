<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];
$service_id = $_POST['service_id'];
$description = $_POST['description'];
$service_name = $_POST['service_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$banner_img = $_POST['banner_img'];

if(!empty($_FILES['myFile'])){
    $temp = explode(".", $_FILES["myFile"]["name"]);
    $filename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "wp-content/uploads/services/" . $filename);
}else{
    $filename = '';
}

$results =  $wpdb->get_results("SELECT * FROM wp_services WHERE id = '".$service_id."' AND userId = '".$userId."' LIMIT 1");
if (empty($results)) {
    $wpdb->insert('wp_services', array(
        'userId' => $userId,
        'service_name' => $service_name,
        'start_date' => $start_date,
        'end_date' => $end_date,
        'banner' => $filename,
        'description' => $description,
        'is_draft' => '1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ));
    $last_status_updated_id = $wpdb->insert_id;
}else{
    $last_status_updated_id = $results[0]->id;
}
echo $last_status_updated_id;
exit;