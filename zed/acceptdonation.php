<?php
require_once('wp-config.php');
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
global $wpdb;

$id = $_POST['id'];
$amt = $_POST['amt'];
$cid = $_POST['cid'];

$resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $cid, OBJECT);
$recs = $resultscc[0];
$achieve_amount = $recs->achieve_amount ? $recs->achieve_amount : 0;
$achieve_amountn = $achieve_amount + $amt;

if ($recs->campaign_typeId == 2) {
    $fundtitle = $recs->item_name;
} else if ($recs->campaign_typeId == 3) {
    $fundtitle = $recs->product_name;
} else {
    $fundtitle = $recs->fundraiser_title;
}

if ($recs->campaign_typeId == 2) {
    $goal_amount = $recs->item_qty;
    $currency = 'QTY';
} else if ($recs->campaign_typeId == 3) {
    $goal_amount = $recs->product_price * $recs->product_qty;
    $currency = $recs->currency;
} else {
    $goal_amount = $recs->goal_amount;
    $currency = $recs->currency;
}

if ($recs->image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $recs->image;
} else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $recs->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
}

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE id =" . $id, OBJECT);
$res = $results[0];
$user_email = $res->emailId;
$phone = $res->phonenumber;



$to = $user_email;
$subject = 'Fundraiser approved your donation';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ' . $from . "\r\n" .
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h3>Hello, ' . $display_name . '</h3>';
$message .= '<p style="font-size:18px;">Your donation on <b>' . $fundtitle . '</b> has beed approved by fundraiser.</p>';
$message .= '<h4>Campaign Details:</h4>';
$message .= '<p><b>Campaign Title:</b>' . $fundtitle . '</p>';
$message .= '<div style="background: url(' . $iimage . ') center center;background-size: cover;"></div>';
$message .= html_entity_decode($recs->short_description);
$message .= '<p><b>Goal Amount:</b>' . $currency . ' ' . $goal_amount.'</p>';
$message .= '<p><b>Achived Amount:</b>' . $currency . ' ' . $achieve_amountn.'</p>';
$message .= '</body></html>';

mail($to, $subject, $message, $headers);

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"Your donation on $fundtitle has beed approved by fundraiser.\",\"to\":[\"$phone\"]}]}",
    CURLOPT_HTTPHEADER => array(
        "authkey: 328268AKM9eIBEQ5eb00746P1",
        "cache-control: no-cache",
        "content-type: application/json",
        "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    // echo "cURL Error #:" . $err;
} else {
    // echo $response;
}

$sql2 = $wpdb->prepare(
    "UPDATE `wp_campaigndonations` SET `status` = '1' WHERE id = " . $id
);
$wpdb->query($sql2);

$sql21 = $wpdb->prepare(
    "UPDATE `wp_campaigns` SET `achieve_amount` = $achieve_amountn WHERE id = " . $cid
);
$wpdb->query($sql21);

// header("Location: " . BASE_URL . "donate-thank-you/");

echo '1';
exit;
