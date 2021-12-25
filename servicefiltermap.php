<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;
$id = ltrim(rtrim($_POST['id'], ','), ',');
$service_id = $_POST['service_id'];
$userId = $_POST['user_id'];
$user_email = $_POST['user_email'];
// echo "SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $id . ")";
/* if ($id) {
    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."' AND category_id IN (" . $id . ")", ARRAY_A);
} else {
    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
} */

$type = $_POST['type'];
if ($type == 'category') {
    // echo "SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $id . ")";
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."' AND category_id IN (" . $id . ")", ARRAY_A);
    } else {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
    }
}else{
    if ($id) {
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."' AND request_status IN (" . $id . ")", ARRAY_A);
    }else{
        $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
    }
}

// return $resultscc;
$alldata = array();
$i = 0;
foreach ($resultscc as $res) {
    $fundtitle = $res['name'];
    $mobile_number = $res['mobile_number'];
    $address0 = $res['address'];
    $description0 = $res['description'];
    //$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];
    $goal_amount = '0';
    $currency = 'QTY';
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
    $achieve_amount = 80000;
    $percn = 100;
    //$zed_verified = '<b class="top-left">ZED verified</b>';
    $zed_verified = '';
    $date1 = strtotime(date("Y-m-d"));
    $date2 = strtotime(date("Y-m-d", strtotime($res['end_date'])));
    
    $cstatus = "active";
    $closedc = '';

    $request_id = $res['id'];

    $category_id = $res['category_id'];

    $cats = $wpdb->get_row("SELECT * FROM wp_service_categories WHERE id = '".$category_id."'");
    $icon_id = $cats->icon_id;
    $iconpin = $wpdb->get_row("SELECT * FROM wp_service_icons WHERE id = '".$icon_id."'");
    if(!empty($iconpin)){
        $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon1;
    }else{
        $icon_name = 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/available.png';
    }

    $service_id = $res['service_id'];
    $supports = $wpdb->get_row("SELECT * FROM wp_service_support_data WHERE request_id = '".$request_id."'", ARRAY_A);

    $changeStatus = $wpdb->get_row("SELECT * FROM wp_service_change_status WHERE request_id = '".$request_id."'", ARRAY_A);
    
    $request_fields = $wpdb->get_row("SELECT * FROM wp_request_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."'");
    $request_fields_json = $request_fields->request_fields;
    $requst_arr = json_decode($request_fields_json, true);
    $req = '';
    foreach($requst_arr as $r){
        $req .= ''.$r['display_name'].':<b>'.$res[$r['table_field_name']].'</b><br/>';
    }

    $support_fields = $wpdb->get_row("SELECT * FROM wp_support_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."'");
    $support_fields_json = $support_fields->support_fields;
    $support_arr = json_decode($support_fields_json, true);
    $req1 = '';
    foreach($support_arr as $r1){
        $table_field_name = $supports[$r1['table_field_name']];
        $req1 .= ''.$r1['display_name'].':<b>'.$table_field_name.'</b><br/>';
    }

    $supp = '';

    $contact= $supports['mobile_number'] ;
    $result_contact = substr($contact, 0, 5);
    $result_contact .= "*****";

    $email= $supports['email'] ;
    $result_email = substr($email, 0, 5);
    $result_email .= "*****";

    $address= $supports['address'] ;
    $result_address = substr($address, 0, 5);
    $result_address .= "*****";


    $supportButton = '<input type="hidden" id="support-email" value="'.$email.'"><input type="hidden" id="status-title-'.$request_id.'" value="'.$title.'"><input type="hidden" id="support-phone" value="'.$contact.'"><button type="button" class="btn1 btn-next" style="margin-left:5px"  onclick="openSupportContact('.$service_id.','.$category_id.','.$request_id.','.$userId.');"><i class="fa fa-envelope" style="padding-right:5px;"></i>Request for Support</button> ';

    if(!empty($supports)){
        if(($userId != '0' && $userId == $services->userId) || ($userId == '1') ){
            if(!empty($iconpin)){
                $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon2;
            }else{
                $icon_name = BASE_URL."/wp-content/uploads/2021/08/orange_marker.png";
            }
            $supp .= '<br> Supporter Info:<br> Name: <b>'.$supports['name'] .'</b> <br> Email: <b> '.$supports['email'].'</b> <br> Mobile Number: <b>'.$supports['mobile_number'].'</b> <br> Address: <b>'.$supports['address'].'</b> <br> '.$req1.'<br>';
       
        }else{

        if(!empty($iconpin)){
            $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon2;
        }else{
            $icon_name = BASE_URL."/wp-content/uploads/2021/08/orange_marker.png";
        }
        $supp .= '<br> Supporter Info:<br> Name: <b>'.$supports['name'] .'</b> <br> Email: <b> '.$result_email.'</b> <br> Mobile Number: <b>'.$result_contact.'</b> &nbsp; '.$supportButton.' <br> Address: <b>'.$result_address.'</b> <br> '.$req1.'<br>';
        }
    }else{
        $supp .= '<br><a class="btn btn-next" style="background-color: #3d3d8a; color: white; margin-left: 0px;" onclick="openPopupSupportThem('.$service_id.','.$category_id.','.$request_id.');">Support Them</a>';
    }

    if (empty($changeStatus)) {
        $chnageStatusBtn = '<a type="button" class="btn btn-next" style="background-color: #3d3d8a; color: white; margin-left: 0px; margin-top: 10px;" onclick="openPopup('.$service_id.','.$category_id.','.$request_id.','.$userId.');">Change Status</a>';
    }else{
        if(!empty($iconpin)){
            $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon3;
        }else{
            $icon_name = BASE_URL."/wp-content/uploads/2021/07/inactive-1.png";
        }
        $chnageStatusBtn = 'Change Status Info:<br> Name: <b>'.$changeStatus['name'] .'</b> <br> Email: <b> '.$changeStatus['email'].'</b> <br> Mobile Number: <b>'.$changeStatus['mobile_number'].'</b> <br> Support Details: <b>'.$changeStatus['supportDetails'].'</b><br>';
    }

    
    $alldata[$i][] = '<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><div class="/ccc/" style="text-align: center;"></div><br><div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;margin-left: 5%;">'.$fundtitle.' <br>Mobile Number: <b>'.$mobile_number.'</b> <br> Address: <b>'.$address0.'</b><br>Description: <b>'.$description0.'</b><br> '.$req.' '.$supp.' <br> '.$chnageStatusBtn.' </div><div class="" style="margin: 10px 0 0 0;text-align:center;color: '.$closedc.';"><b style="font-weight: 500;text-align:center">'.$closed.'</b></div><div class="" style="margin: 10px 0 0 0;margin-left: 5%;text-align:center"><b >'.$zed_verified.'</b></div></div>';
    $alldata[$i][] = $res['latitude'];
    $alldata[$i][] = $res['longitude'];
    $alldata[$i][] = 1;
    $alldata[$i][] = 12;
    $alldata[$i][] = $cstatus;
    $alldata[$i][] = $icon_name;
    $i++;
}
echo json_encode($alldata);
exit;
