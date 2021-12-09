<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$service_id = $_POST['service_id'];
$category_id = $_POST['category_id'];
$results =  $wpdb->get_row("SELECT * FROM wp_support_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."' LIMIT 1");
$request_fields = $results->support_fields;

$arr = json_decode($request_fields, true);

$html = '';
foreach($arr as $r){
    $html .= '<div class="form-group valid"><label class="lbform">'.$r['display_name'].'</label>';
    if($r['field_type'] == 'Single Line Text'){
        $html .= '<input type="text" id="'.$r['table_field_name'].'" value="" name="'.$r['table_field_name'].'" placeholder="Enter '.$r['display_name'].'" maxlength="50" class="form-control">';
    }else if($r['field_type'] == 'Multiline Text'){
        $html .= '<textarea id="'.$r['table_field_name'].'" name="'.$r['table_field_name'].'" class="form-control" maxlength="100"></textarea>';
    }else if($r['field_type'] == 'Single Check'){
        $html .= '<br>';
        $options = $r['options'];
        $option_arr = explode(",", $options);
        foreach ($option_arr as $rec) {
            $html .= '<input type="radio" id="vehicle1" name="'.$r['table_field_name'].'" value="'.$rec.'"><label for="vehicle1"> '.$rec.'</label><br>';
        }
    }else if($r['field_type'] == 'Checkbox'){
        $html .= '<br>';
        $options = $r['options'];
        $option_arr = explode(",", $options);
        foreach ($option_arr as $rec) {
            $html .= '<input type="checkbox" id="vehicle1" name="'.$r['table_field_name'].'" value="'.$rec.'"><label for="vehicle1"> '.$rec.'</label><br>';
        }
    }else if($r['field_type'] == 'Date & Time'){
        $html .= '<input type="text" id="'.$r['table_field_name'].'" value="" name="'.$r['table_field_name'].'" placeholder="Enter Name" maxlength="50" class="form-control">';
    }
    $html .= '<span id="error-name1"></span></div>';
}

echo $html;
exit;