<?php
date_default_timezone_set('Asia/Kolkata'); // your user's timezone
$created_at = date('Y-m-d H:i:s');
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];
//$category_id = $_POST['category_id'];
$service_id = $_POST['service_id'];
$service_name = $_POST['service_name'];
$description = $_POST['description'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

//$statistics_on_banner = $_POST['statistics_on_banner'];

if(!empty($_FILES['myFile']['name'])){
    $temp = explode(".", $_FILES["myFile"]["name"]);
    $filename = round(microtime(true)) . '.' . end($temp);
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "wp-content/uploads/services/" . $filename);
}



$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");

foreach($categories as $val1){
    $category_id=$val1->category_id;


    $sort_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE sort  IS NULL AND type='request' AND  category_id = '".$category_id."' ORDER BY id ASC");

    //}else{
       // $sort_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE sort  IS NULL AND type='request' AND   category_id = '".$category_id."' ORDER BY id ASC");
    
    //}
    if(!empty($sort_fields)){
        $i = 1;
        foreach($sort_fields as $s){
            
            $sql = $wpdb->prepare(
                "UPDATE `wp_fields` SET `sort` = $i WHERE `id` = $s->id"
            );
            $wpdb->query($sql);
            $i++;
        } 
    
    }






$request_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$category_id."' AND type = 'request'");
$arr = array();
if(!empty($request_fields)){
    $i = 1;
    foreach($request_fields as $r){
        $d['table_field_name'] = 'custom_field_name'.$i;
        $d['display_name'] = $r->field_name;
        $d['field_type'] = $r->field_type;
        $d['options'] = $r->options;
        $arr[] = $d;
        $i++;
    }
}
$request_fields = json_encode($arr);
$wpdb->get_results("UPDATE wp_request_fields SET request_fields = '".$request_fields."' WHERE service_id ='".$service_id."' AND category_id='".$category_id."'");



$support_fields =  $wpdb->get_results("SELECT * FROM wp_fields WHERE category_id = '".$category_id."' AND type = 'support'");
$arr_support = array();
if(!empty($support_fields)){
    $i = 1;
    foreach($support_fields as $s){
        $d1['table_field_name'] = 'custom_field_name'.$i;
        $d1['display_name'] = $s->field_name;
        $d1['field_type'] = $s->field_type;
        $d1['options'] = $s->options;
        $arr_support[] = $d1;
        $i++;
    }
}
$support_fields = json_encode($arr_support);
$wpdb->get_results("UPDATE wp_support_fields SET support_fields = '".$support_fields."' WHERE service_id ='".$service_id."' AND category_id='".$category_id."'");



/*
$count_fields =  $wpdb->get_results("SELECT * FROM wp_counter_fields WHERE category_id =".$category_id);

    //$i = 1;
    foreach($count_fields as $c){
        $sql = $wpdb->prepare(
            "UPDATE `wp_counter_fields` SET `service_id` = $service_id WHERE `id` = $c->id"
        );
        $wpdb->query($sql);
    //    $i++;
   } 
*/









}


if (!empty($_FILES['myFile']['name'])) {
    $wpdb->get_results("UPDATE wp_services SET service_name = '".$service_name."', description = '".$description."', start_date = '".$start_date."', end_date = '".$end_date."', banner = '".$filename."'  WHERE id =" . $service_id);
}else{
    $wpdb->get_results("UPDATE wp_services SET service_name = '".$service_name."', description = '".$description."', start_date = '".$start_date."', end_date = '".$end_date."'  WHERE id =" . $service_id);
}
//$wpdb->get_results("UPDATE wp_service_categories SET is_draft = 0 WHERE id =" . $service_id);
header("Location: " . BASE_URL . "service-detail-admin/?slug=".$service_id);