<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
//counter 1
$id = ltrim(rtrim($_POST['id'], ','), ',');
$service_id = $_POST['service_id'];

$results = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}counter_fields WHERE category_id = '".$id."' ");


 $id11 = $results->counter1;
                                         
 $count1 = $wpdb->get_row("SELECT * FROM wp_fields WHERE id = '".$id11."'");
$custom1 = 'custom_field_name';
$custom11 = $custom1.$count1->sort ;

if($count1->field_type == "Number"){
$requestcount11 = $wpdb->get_row("SELECT SUM(`$custom11`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}else{
 $requestcount11 = $wpdb->get_row("SELECT COUNT(`$custom11`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}
                                       


                                        //counter 2
$id22 = $results->counter2;
                                         
$count2 = $wpdb->get_row("SELECT * FROM wp_fields WHERE id = '".$id22."'");
$custom2 = 'custom_field_name';
$custom22 = $custom2.$count2->sort ;

if($count2->field_type == "Number"){
$requestcount22 = $wpdb->get_row("SELECT SUM(`$custom22`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}else{
$requestcount22 = $wpdb->get_row("SELECT COUNT(`$custom22`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}




                                        //counter 3
$id33 = $results->counter3;
                                         
$count3 = $wpdb->get_row("SELECT * FROM wp_fields WHERE id = '".$id33."'");
$custom3 = 'custom_field_name';
$custom33 = $custom3.$count3->sort ;


if($count3->field_type == "Number"){
$requestcount33 = $wpdb->get_row("SELECT SUM(`$custom33`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}else{
$requestcount33 = $wpdb->get_row("SELECT COUNT(`$custom33`)as cost FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."' ");
}

$banner1 = $results->banner1;
$banner2 = $results->banner2;
$banner3 = $results->banner3;
$counter1 = $requestcount11->cost;
$counter2 = $requestcount22->cost;
$counter3 = $requestcount33->cost;

$results1 =  $wpdb->get_results("SELECT * FROM wp_display_counter WHERE category_id =" .$id);
//echo json_encode($results1);

if(!empty($results1)){

    $resultsc = $wpdb->get_results("UPDATE wp_display_counter SET  counter1 = '".$counter1."', counter2 = '".$counter2."', counter3 = '".$counter3."'  WHERE category_id =" .$id);
    
}else{

    $wpdb->insert('wp_display_counter', array(
    
        'category_id' => $id,
       // 'service_id' => $service_id,
       'service_id' => $service_id,
        'banner1' =>  $banner1,
        'banner2' =>  $banner2,
        'banner3' =>  $banner3,
        'counter1' =>  $counter1,
        'counter2' =>  $counter2,
        'counter3' =>  $counter3,
        'created_at' => date("Y-m-d H:i:s"),
    
    ));
    $last_status_updated_id = $wpdb->insert_id;
}

    
$results00 =  $wpdb->get_results("SELECT * FROM wp_display_counter WHERE category_id =" .$id);
echo json_encode($results00);



exit;
                                        
                                        