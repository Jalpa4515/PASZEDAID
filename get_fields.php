<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = $_POST['id'];
$results =  $wpdb->get_row("SELECT * FROM wp_fields WHERE id = '".$id."' LIMIT 1");
echo json_encode($results);
exit;