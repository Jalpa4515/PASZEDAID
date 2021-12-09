<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$userId = $_POST['userId'];
$category_id = $_POST['category_id'];
$field_name = $_POST['field_name'];
$field_type = $_POST['field_type'];
$is_mandatory = $_POST['is_mandatory'];
$ordering = $_POST['ordering'];
$options = $_POST['options'];
$edit_collection_id = $_POST['edit_collection_id'];

/* $results =  $wpdb->get_results("SELECT * FROM wp_service_categories WHERE name = '".$category_name."' LIMIT 1");
if (empty($results)) { */
if (empty($edit_collection_id)) {
    $wpdb->insert('wp_fields', array(
        'category_id' => $category_id,
        'field_name' => $field_name,
        'field_type' => $field_type,
        'is_mandatory' => $is_mandatory,
        'ordering' => $ordering,
        'options' => $options,
        'type' => 'support',
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    ));
    $last_status_updated_id = $wpdb->insert_id;
}else{
    $dbData['field_name'] = $field_name;
    $dbData['field_type'] = $field_type;
    $dbData['is_mandatory'] = $is_mandatory;
    $dbData['ordering'] = $ordering;
    $dbData['options'] = $options;
    $dbData['updated_at'] = date("Y-m-d H:i:s");
    $wpdb->update('wp_fields', $dbData, array('id' => $edit_collection_id));
    
    $last_status_updated_id = $edit_collection_id;
}
echo $last_status_updated_id;
/* }else{
    echo $uid = $results[0]->id;
} */
exit;