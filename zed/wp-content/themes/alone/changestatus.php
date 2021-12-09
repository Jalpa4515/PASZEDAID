<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$userId = $_POST['userId'];
$pid = $_POST['pid'];
$statusid = $_POST['statusid'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];

/* $results = $wpdb->get_results("SELECT * FROM wp_status_update_users WHERE phone_number = '$phone_number'");
if (!empty($results)) {
    $id = $results[0]->id;
}else{

} */

$wpdb->insert('wp_status_update_users', array(
    'covid_id' => $pid,
    'name' => $name,
    'phone_number' => $phone_number,
    'email' => $email,
    'status' => $statusid,
    'created_on' => date("Y-m-d H:i:s"),
));
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO wp_status_update_users SET covid_id = '$pid', `name` = '$name', phone_number = '$phone_number', email = '$email', covid_id = '$pid', `status` = '$statusid', created_on = '$date'";
$wpdb->query( $wpdb->prepare($query) );
echo $last_status_updated_id = $wpdb->insert_id;
exit;
/* $data =array(
    'status' => $statusid,
    'last_status_updated_id' => $last_status_updated_id
);
$wherecondition=array(
    'id'=>$pid
);
$wpdb->update('wp_covidlistdetails', $data, $wherecondition); */
    
$wpdb->query($wpdb->prepare("UPDATE 'wp_covidlistdetails' SET last_status_updated_id='$last_status_updated_id', `status` = '$statusid' WHERE id=$id"));

echo 'failed';
exit;