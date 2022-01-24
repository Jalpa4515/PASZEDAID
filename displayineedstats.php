<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
//counter 1
$id = ltrim(rtrim($_POST['id'], ','), ',');


$resultscount2 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}flood_crisis_data  WHERE categoryId IN ($id) ORDER BY id DESC", ARRAY_A);
echo json_encode($resultscount2);