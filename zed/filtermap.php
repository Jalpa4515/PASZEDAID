<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = ltrim(rtrim($_POST['id'], ','), ',');

// echo "SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $id . ")";
if ($id) {
    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND campaign_typeId IN (" . $id . ")", ARRAY_A);
} else {
    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
}

// return $resultscc;
$alldata = array();
$i = 0;
foreach ($resultscc as $res) {

    if ($res['campaign_typeId'] == 2) {
        $fundtitle = $res['item_name'];
    } else if ($res['campaign_typeId'] == 3) {
        $fundtitle = $res['product_name'];
    } else {
        $fundtitle = $res['fundraiser_title'];
    }

    $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

    if ($res['campaign_typeId'] == 2) {
        $goal_amount = $res['item_qty'];
        $currency = 'QTY';
    } else if ($res['campaign_typeId'] == 3) {
        $goal_amount = $res['product_price'];
        $currency = $res['currency'];
    } else {
        $goal_amount = $res['goal_amount'];
        $currency = $res['currency'];
    }

    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
    $achieve_amount = 0;
    foreach ($resultsdonacc as $tt) {
        if ($tt['campaign_typeId'] == 3) {
            $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
        } else {
            $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
        }
        $achieve_amount += $achieve_amountn;
    }
    if ($achieve_amount >= $goal_amount) {
        $btn = 'no';
        $closed = 'Closed';
        $closedc = 'red';
    } else {
        $btn = 'yes';
        $closed = 'Active';
        $closedc = 'green';
    }

    if ($res['image']) {
        $iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
    } else {
        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
    }

    $alldata[$i][] = '<a href="' . $shareurl . '" style="text-decoration: none;color:#282828 !important;"><div class="" style="text-align: center;"><img src="' . $iimage . '" height="50" width="100" /></div><div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;">' . $fundtitle . '</div><div class="" style="margin: 10px 0 0 0;"><b>Goal:</b> ' . $currency . ' ' . $goal_amount . '</div><div class="" style="margin: 10px 0 0 0;color:' . $closedc . ' !important;"><b>' . $closed . '</b></div></a>';
    $alldata[$i][] = $res['latitude'];
    $alldata[$i][] = $res['longitude'];
    $alldata[$i][] = $res['campaign_typeId'];
    $alldata[$i][] = '12';
    $i++;
}

echo json_encode($alldata);
exit;
