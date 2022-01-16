<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];
$service_id = $_POST['service_id'];
$category_name = $_POST['category_name'];
$category_image = 'no.png';
$icon_id = $_POST['icon_id'];
$category_id = $_POST['category_id'];
if(isset($_POST['is_support_request'])){
    $is_support_required = $_POST['is_support_request'];
}else{
    $is_support_required = 0;
}

$results =  $wpdb->get_results("SELECT * FROM wp_service_categories WHERE id = '".$category_id."' LIMIT 1");
if (empty($results)) {
    
    if(!empty($_FILES['image'])){
        $temp = explode(".", $_FILES["image"]["name"]);
        $filename = round(microtime(true)) . '.' . end($temp);
        move_uploaded_file($_FILES["image"]["tmp_name"], "wp-content/uploads/services/" . $filename);
    }else{
        $filename = '';
    }

    $wpdb->insert('wp_service_categories', array(
        'name' => $category_name,
        'icon' => $filename,
        'icon_id' => $icon_id,
        'is_draft' => '1',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ));
    $last_status_updated_id = $wpdb->insert_id;

    $wpdb->insert('wp_service_category_relation', array(
        'service_id' => $service_id,
        'category_id' => $last_status_updated_id,
        'is_support_required' => $is_support_required,
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ));
    
    echo $last_status_updated_id;
}else{
    $dbData['name'] = $category_name;
    $dbData['icon_id'] = $icon_id;
    $dbData['updated_at'] = date("Y-m-d H:i:s");
    $wpdb->update('wp_service_categories', $dbData, array('id' => $results[0]->id));

    $dbData1['is_support_required'] = $is_support_required;
    $dbData1['updated_at'] = date("Y-m-d H:i:s");
    $wpdb->update('wp_service_category_relation', $dbData1, array('service_id' => $service_id, 'category_id'=>$category_id));
    
    echo $uid = $results[0]->id;
}
  
$i = 1;

foreach ($_POST['collection_data_tr'] as $value) {
    // Execute statement:
   
$sql = $wpdb->prepare(
    "UPDATE `wp_fields` SET `sort` = $i WHERE `id` = $value"
);
$wpdb->query($sql);
$i++;
}




foreach ($_POST['supporter_data_tr'] as $value) {
    // Execute statement:
   
$sql = $wpdb->prepare(
    "UPDATE `wp_fields` SET `sort` = $i WHERE `id` = $value"
);
$wpdb->query($sql);
$i++;
}

exit;