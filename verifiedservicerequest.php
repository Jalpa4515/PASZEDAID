<?php
date_default_timezone_set('Asia/Kolkata'); // your user's timezone
$created_at = date('Y-m-d H:i:s');
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = $_POST['id'];

$wpdb->get_results("UPDATE wp_service_request_data SET zed_verified = '1' WHERE id =" . $id);
echo "1";