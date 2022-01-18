
<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = $_POST['id'];
$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$id."'");
echo json_encode($categories);
exit;


