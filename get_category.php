<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = $_POST['id'];
$results =  $wpdb->get_row("SELECT * FROM wp_service_categories WHERE id = '".$id."' LIMIT 1");
$request_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$id."' AND type = 'request'");
$results->request_fields = $request_fields;

$support_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$id."' AND type = 'support'");
$results->support_fields = $support_fields;
echo json_encode($results);
exit;