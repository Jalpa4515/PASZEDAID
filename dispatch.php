<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];

$sql2 = $wpdb->prepare(
    "UPDATE `wp_campaigndonations` SET `dispatched` = '1' WHERE id = " . $id
);
$wpdb->query($sql2);
echo '1';
exit;
