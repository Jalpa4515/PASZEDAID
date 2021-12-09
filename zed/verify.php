<?php

// require_once('wp-config.php');

$servername = 'localhost';
$database = 'jedaites_zed_live';
$username = 'jedaites_zed';
$password = 'jedaitestbed@@123';

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

require('config.php');

session_start();

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$payment = $api->payment->fetch($_POST['razorpay_payment_id']);

$campaign_Id = $payment->notes->merchant_order_id;
$campaign_typeId = $payment->notes->campaign_typeId;
$fullName = $payment->notes->name;
$emailId = $payment->notes->email;
$phonenumber = $payment->notes->contact;
$address = $payment->notes->address;
$amount = $payment->notes->amount / 100;
$currency = 'INR';
$anonymous = $payment->notes->anonymous;
$razorpay_payment_id =  $_POST['razorpay_payment_id'];
$paymetStatus = '1';

$success = true;

$error = "Payment Failed";

if ($success === true) {

    $html = "<p>Your payment was successful</p>";

    $results = $conn->query("SELECT * FROM wp_campaigns WHERE id =" . $campaign_Id);
    $row = mysqli_fetch_assoc($results);

    $res = (object) $row;

    if ($res->campaign_typeId == 2) {
        $fundtitle = $res->item_name;
    } else if ($res->campaign_typeId == 3) {
        $fundtitle = $res->product_name;
    } else {
        $fundtitle = $res->fundraiser_title;
    }

    $userId = $res->userId;
    $resultsuserscc = $conn->query("SELECT * FROM wp_usermeta WHERE meta_key = 'xoo_ml_phone_no' AND user_id = " . $userId);
    $rowuserscc = mysqli_fetch_assoc($resultsuserscc);
    $resultsuserscc = (object) $rowuserscc;
    $meta_valuephone = $resultsuserscc->meta_value;
    
    $resultsusers = $conn->query("SELECT * FROM wp_users WHERE id = " . $userId);

    $rowusers = mysqli_fetch_assoc($resultsusers);

    $resultsusers = (object) $rowusers;

    $user_email = $resultsusers->user_email;
    $display_name = $resultsusers->display_name;

    $phone = $phonenumber;

    $to = $user_email;
    $subject = 'Donation raised by user';
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
    $message .= '<p style="font-size:18px;">You got one donation request on campaign <b>' . $fundtitle . '</b>.</p>';
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
        CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"You got one donation request on campaign $fundtitle.\",\"to\":[\"$meta_valuephone\"]}]}",
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

    //////

    $to2 = 'hardisweb@gmail.com';
    $subject2 = 'Donation raised by user';
    $from2 = 'info@zedaid.org';

    // To send HTML mail, the Content-type header must be set
    $headers2  = 'MIME-Version: 1.0' . "\r\n";
    $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers2 .= 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $from . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Compose a simple HTML email message
    $message2 = '<html><body>';
    $message2 .= '<h3>Hello, admin</h3>';
    $message2 .= '<p style="font-size:18px;">Fundraiser got one donation request on campaign <b>' . $fundtitle . '</b>.</p>';
    $message2 .= '</body></html>';

    mail($to2, $subject2, $message2, $headers2);

    $phone2 = '9892489040';

    $curl2 = curl_init();

    curl_setopt_array($curl2, array(
        CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"sender\":\"JEDAII\",\"route\":\"4\",\"country\":\"91\",\"unicode\":\"1\",\"sms\":[{\"message\":\"Fundraiser got one donation request on campaign $fundtitle.\",\"to\":[\"$phone2\"]}]}",
        CURLOPT_HTTPHEADER => array(
            "authkey: 328268AKM9eIBEQ5eb00746P1",
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 976efc79-51b6-d3db-3727-e4173cb180f4"
        ),
    ));

    $response2 = curl_exec($curl2);
    $err2 = curl_error($curl2);

    curl_close($curl2);

    if ($err2) {
        // echo "cURL Error #:" . $err;
    } else {
        // echo $response;
    }

    /////

    $perc = ($amount * 2) / 100;
    $zedprice = $amount - $perc;

    $perc2 = ($zedprice * 2) / 100;
    $zedprice2 = $zedprice - $perc2;

    $achieve_amount =  $res->achieve_amount ? $res->achieve_amount : 0;
    $achieve_amountn = $achieve_amount + $zedprice2;

    $sqliu = "UPDATE `wp_campaigns` SET `achieve_amount` = $amount WHERE id = " . $campaign_Id;
    $conn->query($sqliu);

    $sqli = "INSERT INTO wp_campaigndonations (razorpay_payment_id,paymetStatus,campaign_Id, campaign_typeId, anonymous, fullName, emailId, phonenumber, address, campaignCreator, zed, zedFoundation, amount, status)
VALUES ('" . $razorpay_payment_id . "','1','" . $campaign_Id . "','" . $campaign_typeId . "','" . $anonymous . "','" . $fullName . "','" . $emailId . "','" . $phonenumber . "','" . $address . "','" . $zedprice2 . "','" . $perc . "','" . $perc2 . "','" . $amount . "','1')";

    $conn->query($sqli);
    $html = '';
} else {

    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
header("Location: https://jedaitestbed.in/zed/donate-thank-you/");
