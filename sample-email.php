<?php
require_once('wp-config.php');
/* Email to Request Owner */
$to = 'sandesh.phadtare06@gmail.com';
$subject = 'Geo Info Facility! - Request Support';
$from = 'info@zedaid.org';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ZED Foundation <' . $from . '>'."\r\n" .
    'CC: info@zedaid.org'. "\r\n" . 
    'Reply-To: ' . $from . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    

$message2 = 'sandesh';


wp_mail($to, $subject, $message2, $headers);