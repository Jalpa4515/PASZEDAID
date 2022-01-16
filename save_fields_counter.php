<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$category_id = $_POST['category_id'];
//$service_id = $_POST['service_id'];
$category_name = $_POST['cat_name'];
$banner_label1 = $_POST['banner_label1'];
$banner_label2 = $_POST['banner_label2'];
$banner_label3 = $_POST['banner_label3'];
$select_drop1 = $_POST['select_drop1'];
$select_drop2 = $_POST['select_drop2'];
$select_drop3 = $_POST['select_drop3'];
$opt_name1 = $_POST['opt_name1'];
$opt_name2 = $_POST['opt_name2'];
$opt_name3 = $_POST['opt_name3'];

$wpdb->insert('wp_counter_fields', array(
    
    'category_id' => $category_id,
   // 'service_id' => $service_id,
   'category_name' => $category_name,
    'banner1' =>  $banner_label1,
    'banner2' =>  $banner_label2,
    'banner3' =>  $banner_label3,
    'counter1' =>  $select_drop1,
    'counter2' =>  $select_drop2,
    'counter3' =>  $select_drop3,
    'counter1_label' =>  $opt_name1,
    'counter2_label' =>  $opt_name2,
    'counter3_label' =>  $opt_name3,
    'created_at' => date("Y-m-d H:i:s"),

));
$last_status_updated_id = $wpdb->insert_id;

$results =  $wpdb->get_results("SELECT * FROM wp_counter_fields WHERE id = '".$last_status_updated_id."' ORDER BY id ASC",ARRAY_A);
echo json_encode($results);

exit;