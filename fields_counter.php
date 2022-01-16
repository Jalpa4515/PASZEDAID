<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = $_POST['category_id'];
$results =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$id."' ORDER BY id ASC",ARRAY_A);
echo json_encode($results);
exit;