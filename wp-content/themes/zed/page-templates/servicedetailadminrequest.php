<?php
error_reporting(0);
/**
 * Template Name: Service Request Admin
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

 
get_header();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>My Donation | Zed</title>
    <link href="<?php echo bloginfo('template_directory'); ?>/css/themify-icons.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/flaticon.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/owl.transitions.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/odometer-theme-default.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/nice-select.css" rel="stylesheet">
    <link href="<?php echo bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/searchpanes/1.4.0/css/searchPanes.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <style>
      .dt-button-collection {
    margin-top: -10px !important;
}
      .dtsp-titleRow {
    display: none;
}
        b, strong {
            font-weight: 600;
        }
            span.licause {
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            padding: 6px 18px;
            color: #fff;
        }
        th.sorting {
            text-align: center;
        }
        td {
            vertical-align: middle !important;
                text-align: center;
        }
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
        }

        /* Style the tab */
        .tab {
            float: left;
            width: 10%;
            margin: 20px 50px 0px 50px;
            position: fixed;
        }

        /*.tp-blog-sidebar {*/
        /*    margin-top: 4%;*/
        /*}*/
        .tp-blog-sidebar .category-widget ul a:hover {
            display: block;
            /* color: #fff; */
        }
        .paginate_button.active a{
            color: white !important;
        }

        .ff {
            font-style: unset;
            margin-right: 10px;
            font-size: 25px;
        }

        .section-pad {
            padding: 20px 0;
            min-height: 800px;
        }

        /* Style the buttons inside the tab */
        .tab button {
            display: block;
            background-color: #3d3d8a30;
            color: #000;
            padding: 10px;
            width: 40%;
            border: none;
            outline: none;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
            border-radius: 10px;
            margin: 20px 0px 20px 0px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #3D3D8A;
            color: #fff;
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #3D3D8A;
            border-radius: 10px;
            color: #fff;
            box-shadow: 0 5px 10px 0 rgb(63 81 181 / 44%);
        }

        .pbars {
            width: 100% !important;
        }

        .progress .progress-bar {
            border-radius: 15px;
            box-shadow: none;
            position: relative;
            animation: animate-positive 4s;
            width: 5% !important;
            background: #8bc34a;
            height: 5px;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 10px 12px 10px 160px;
            border: none;
            width: 100%;
            border-left: none;
        }

        .rai {
            margin-left: 16% !important;
            display: inline-flex;
        }

        .tp-blog-sidebar .category-widget ul>li+li {
            /* float: right; */
            margin-top: 0px;
        }

        .tp-blog-sidebar .category-widget ul a {
            display: block;
            /* color: #fff; */
        }

        .licause a {
            color: #fff !important;
        }

        .tp-blog-sidebar .category-widget ul li {
            font-size: 18px;
            position: relative;
            padding-bottom: 0px;
        }

        .dbtn {
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        li.rai2 span {
            margin-right: 110%;
        }

        li.licause {
            width: 400px;
        }

        .rai3 {
            margin-left: 140% !important;
            color: #000;
        }

        .cause-text {
            padding: 20px;
            padding-top: 0;
            text-align: center;
            background: #fff;
            border-top: none;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .licause {
            margin-top: 20px;
            margin-bottom: 0px;
        }

        .bod {
            background: none;
            border: none;
            width: 50%;
            margin-right: 20px;
        }

        .cause-text ul li a {
            padding: 10px 20px;
            background: #3d3d8a;
            margin-top: 10px;
            border-radius: 10px;
            color: #fff;
            font-weight: 500;
            box-shadow: 0 0 7px #ffffff;
            width: 400px;
        }
        
    .ti-youtube:before {
    content: "\e728";
    color: #EA1E15;
}
        @media (max-width: 767px){
            
        
        .abc{
            float:none;color:#fff !important
        }
    }
    @media (min-width: 768px){
        .abc{
            float:left !important;color:#fff !important
        }
    }
       input#vehicle1 {
      width: 15px;
      height: 15px;
    }
    .gm-style-iw-d {
      max-width: 307px !important;
      width: 261px !important;
    }
    .\/ccc\/ img {
      width: 100%;
    }
    .gm-style .gm-style-iw-d {
      box-sizing: border-box;
      overflow: auto !important;
      width:200px;
      max-width:310px;
    }
    .gm-style .gm-style-iw-c {
      position: absolute;
      box-sizing: border-box;
      overflow: hidden;
      top: 0;
      left: 0;
      transform: translate(-50%,-100%);
      background-color: white;
      border-radius: 8px;
      padding: 0px;
      box-shadow: 0 2px 7px 1px rgb(0 0 0 / 30%);
    }
    .top-left {
      padding-top: 5px !important;
      padding-bottom: 5px !important;
      top:0 !important;
    }
    .grn{
      background: #00BF00;
      color: #fff;
      font-weight: 400;
      padding: 6px;
      border-radius: 5px;
    }
    .red{
      background: #FF184A;
      color: #fff;
      font-weight: 400;
      padding: 6px;
      border-radius: 5px;
    }
    .para {
      color: #fff;
      margin: 0% 10%;
      background: #9e9e9ea1;
      padding: 20px;
      border-radius: 10px;
    }
    .tp-bg {
      background: url(https://zedaid.org/wp-content/uploads/2021/08/Customer_Attention.jpg);
      background-position: bottom;
      height: 400px;
    }
    .serach {
      display: inline-flex;
      width: 97%;
    }
    .gridview{
      box-shadow: 0px 1px 40px 0px rgb(40 63 116 / 10%);
      padding: 10px 20px;
      background: #fff;
      border-radius: 10px;
      width: 155% !important;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 10px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      margin-right: 29px;
      float: right;
      margin-top: -11%;
    }
    ul.register-now1 {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 0px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      float: right;
      border-top-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }


    
    .licause1 {
      margin-top: 3px !important;
      margin-bottom: 0 !important;
    }
    * {
      box-sizing: border-box;
    }
    body {
      background: #f2f2f2;
    }
    .licause {
      margin-top: 13px;
      margin-bottom: 20px;
    }
    a.btn.btn-default.btn-rounded.mb-4 {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
    }
    a.btn.btn-default.btn-rounded.mb-4.add {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 4px 19px;
      font-size: 14px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-left: 10px;
      border-radius: 0;
      margin-top: 0px;
    }
    .radiobtn{
      width: 8%;
      font-size: 15px;
      margin: 0px !important;
      padding-left: 20px;
      height: 25px;
      border-radius: 10px;
      border: none;
      background: none;
      box-shadow:none;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 45px;
      border-radius: 10px;
      width: 30%;
      text-align: center;
      font-size: 16px;
      margin-left: 13px;
      margin-bottom: 21px;
    }
    #regForm {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: "Hind Vadodara", sans-serif;
      padding: 40px;
      width: 70%;
      box-shadow:0px 14px 60px rgb(0 0 0 / 6%);
      margin-top: 12%;
      border-radius:10px;
      min-width: 300px;
      background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
      border-color: var(--ck-color-base-border);
      height: 200px;
    }
    h1 {
      text-align: center;
      font-weight: 500;
      margin-bottom: 30px !important;
    }
    input {
      padding: 10px;
      width: 100%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    textarea.invalid {
      background-color: #ffdddd;
    }
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    button {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
    }
    .modal-footer.d-flex.justify-content-center button {
      margin-top: 0px;
    }
    button.btn.btn-indigo:hover {
      color: #fff;
    }
    button:hover {
      opacity: 0.8;
    }
    #prevBtn {
      background-color: #bbbbbb;
    }
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    .step.active {
      opacity: 1;
    }
    a.tp-accountBtn {
      height: 40px;
      background: #fff;
      padding: 0px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-transform: capitalize;
      font-size: 14px;
      color: #000;
      border: 2px solid #3d3d8a;
      transition: all 0.4s ease-in-out 0s;
      border-radius: 10px;
      float: left;
      margin-top: 20px;
      text-decoration: none;
    }
    .back-home :hover {
      background: #3D3D8A;
      color: #fff;
    }
    .drp {
      padding: 10px;
      width: 100%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    .drp1 {
      padding: 10px;
      width: 15%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      margin-right: 12px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
    .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
      border-radius: var(--ck-border-radius);
      border-top-left-radius: 0;
      border-top-right-radius: 0;
      height: 200px !important;
    }
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    .ck.ck-editor {
      position: relative;
      border-radius: 10px !important;
      margin: 50px 0px 50px 0px;
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;
    }
    th {
      background: #9e9e9e6e;
    }
    tr {
      background: #ddd;
    }
    tr:nth-child(even) {
      background-color: #fff;
    }
    .btn {
      margin-left: 0%;
    }
    .larges{
     width:75%;
   }
   @media (max-width: 767px) {
     .drp1 {
      width: 30%;  
      padding-left: 10px;
    }
    .larges{
     width:100%;
   }
   .btn {
    margin-left: 5%;
    background: none;
    border: none;
  }
  button {
    width:100%;
  }
  ul.register-now1 {
    width: 37%;
}


.bb{
    margin-bottom:18% !important;
}
  ul.register-now {
    background: #3D3D8A !important;
    height: 54px;
    border-radius: 10px;
    width: 100%;
    text-align: center;
    font-size: 19px;
    margin-left: 0px;
  }
}
/* Piyush */
.preloader1 {
  background-color: rgba(255,255,255,0.7);
  width: 100%;
  height: 100%;
  position: fixed;
  z-index: 1000;
}
#loading-image {
  position: absolute;
  top: 50%;
  left: 48%;
  z-index: 100;
}
.image-error{
  color: red;
}
.editor-error{
  color: red;
}
.col-lg-12.col-md-12.col-12.valid.space {
  margin: 15px;
}
textarea{
  padding: 10px;
  width: 100%;
  font-size: 15px;
  font-family: "Hind Vadodara", sans-serif;
  margin-bottom: 15px;
  padding-left: 20px;
  outline:none;
  border-radius: 10px;
  border: none;
  background: #fff;
  box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
}
button.btn.btn-indigo {
  background: #3D3D8A;
  padding: 10px 45px;
  font-size: 17px;
}
.fa-send-o:before, .fa-paper-plane-o:before {
  content: "\f1d9";
  font-family: 'FontAwesome';
}
.fa-edit:before, .fa-pencil-square-o:before {
  content: "\f044";
  font-family: 'FontAwesome';
  font-size: 25px;
  font-style: normal;
  color: #3D3D8A;
}
.fa-trash:before {
  content: "\f1f8";
  font-family: 'FontAwesome';
  font-style: normal;
  font-size: 25px;
  margin-left: 17%;
  color: #f44336d6;
}
.modal-body {
  position: relative;
  padding: 15px;
  background: #cccccc4f;
  background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
}
.drop-zone {
  max-width: 100%;
  height: 50%;
  padding: 4% 28%;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
  font-family: "Quicksand", sans-serif;
  font-weight: 500;
  font-size: 20px;
  cursor: pointer;
  color: #cccccc;
  border: 4px dashed #3D3D8A;
  border-radius: 10px;


}
.modal-header .close {
  margin-top: -21px;
}
.drop-zone--over {
  border-style: solid;
}
.drop-zone__input {
  display: none;
}
.drop-zone__thumb {
  width: 100%;
  height: 100px;
  border-radius: 10px;
  overflow: hidden;

  background-size: contain;
  position: relative;
  background-repeat: no-repeat;
}
.drop-zone__thumb::after {
 display:none;
}
.fa-cloud-upload:before {
  content: "\f0ee";
  font-family: 'FontAwesome';
  font-style: normal;
  font-size: larger;
  color: #3D3D8A;
  margin-left: 20px;
}
.regform
{
  background-color: #ffffff;
  font-family: "Hind Vadodara", sans-serif;
  padding: 40px;
  width: 90%;
  margin-top: 0px !important;
  margin: 5%;
  box-shadow: 0px 14px 60px rgb(0 0 0 / 6%);
  border-radius: 10px;
  min-width: 300px;
  background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
  background-repeat: round;
}
.licause {
    margin-top: 10px;
    margin-bottom: 10px;
}
.new {
    display: inline-flex;
    width: 100%;
    justify-content: center;
}


.bb{
    margin-bottom:2%;
}
td {
    border-bottom: 1px solid #ddd !important;
}
li.paginate_button.active a {
    background: #3D3D8A;
}

div.dtsp-topRow button.dtsp-collapseButton span.dtsp-caret {
   
    color: black !important;
    font-weight: 900 !important;
}


    </style>
</head>
<?php 
global $wpdb, $user_ID;

$service_id = 0;
if (isset($_GET['slug'])) {
    $service_id = $_GET['slug'];
}
if (!$user_ID) {
    header("Location: " . BASE_URL . 'login');
}
$userId = $user_ID;
$user = wp_get_current_user();
$user_email = $user->user_email;

$resultsdonacc = $wpdb->get_results("SELECT srd.*, srd.id, sc.name as category_name, s.service_name, ssd.name as supporter_name, ssd.mobile_number as supporter_mobile_number, ssd.address as supporter_address FROM {$wpdb->prefix}service_request_data as srd LEFT JOIN wp_service_categories as sc ON srd.category_id = sc.id LEFT JOIN wp_services as s ON srd.service_id = s.id LEFT JOIN wp_service_support_data as ssd ON srd.id = ssd.request_id WHERE srd.service_id = '" . $service_id . "' ORDER BY srd.id DESC", ARRAY_A);

?>
<body>
    <div class="page-wrapper">
        <div class="preloader1" style="display: none;">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>

        <!-- tp-event-details-area start -->
        <div class="tp-case-details-area section-padding sec-detail">
            <div class="container causeslist">
                <div class="row">
                    <div class="col-md-8 bb"  style="margin-top: 2%;">
                      <ul class="register-now1" style="border-bottom-right-radius: 10px;background-color:#3D3D8A !important;color:#000" >
                        <li  style="margin-top:3px">
                          <a href="<?= BASE_URL ?>service-request-admin/?slug=<?= $service_id?>" class=" " style="color:#fff">Request</a>
                        </li>
                      </ul>
                      <ul class="register-now1" style="background-color:#fff !important;border-top-left-radius: 10px;" >
                        <li  style="margin-top:3px;">
                          <a href="<?= BASE_URL ?>service-detail-admin/?slug=<?= $service_id?>" class=" " style="color:#000"> Service Info</a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-12 col-sm-6 col-12 sec-detail">
                        
                        <div class="tp-blog-sidebar">
                            <div class="widget category-widget">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="15%">Category</th>
                                            <th width="15%">Name</th>
                                            <th width="15%">Email</th>
                                            <th width="15%">Request Information</th>
                                            <th width="20%">Response Information</th>
                                            <th width="10%" style="text-align:left !important">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($resultsdonacc as $rec){?>
                                        <tr>
                                            <td>
                                              <?= $rec['category_name'];?>
                                            </td>
                                            <td>
                                            <?= $rec['name'];?>
                                            </td>
                                            <td>
                                            <?= $rec['email'];?>
                                            </td>
                                            <td>
                                            <?= $rec['service_name'];?>
                                            </td>
                                            <td style="text-align:left !important">
								                                <b>Name:</b> <?= $rec['supporter_name'];?><br><b>Mobile Number:</b> <?= $rec['supporter_mobile_number']?><br><b>Address:</b> <?= $rec['supporter_address'];?>
                                            </td>
                                            <td style="text-align:left !important">
                                            <?php if($rec['zed_verified'] == '0' && $rec['status'] != '2' ){?>                                            
                                            <span class="licause" id="verifieddiv<?php echo $rec['id']; ?>" onclick="verifiedcamp('<?php echo $rec['id']; ?>');" style="background: #3D3D8A !important; cursor: pointer;">Verified</span>
                                            <span class="licause" id="declinediv<?php echo $rec['id']; ?>" onclick="rejectcamp('<?php echo $rec['id']; ?>');" style="background: #AC2925 !important; cursor: pointer;">Reject</span>
                                            <span class="licause" id="loadingdiv<?php echo $rec['id']; ?>" style="cursor: pointer;">Loading...</span>
                                            <?php }else if($rec['zed_verified'] == '1'){ ?>
                                              <span class="licause" style="background: #4BB543 !important; cursor: pointer;">Verified</span>
                                            <?php }else {?>
                                              <span class="licause" style="background: #CCC !important; cursor: pointer;">Rejected</span>
                                            <?php }?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div> 

    <div class="tp-ne-footer">
        <!-- start tp-site-footer -->
        <footer class="tp-site-footer">
            <div class="tp-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/zed.png" width="50" alt="blog">
                                </div>
                                <p>Creating more helping hands by bridging the gap between donors and the people lacking the necessities of life </p>
                                <ul>
                                <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://m.facebook.com/ZED-Foundation-102464085193955/?ref=bookmarks" target="_blank">
                                                    <i class="ti-facebook"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="#">
                                                    <i class="ti-twitter-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li> -->
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://www.instagram.com/zedfoundation/" target="_blank">
                                                    <i class="ti-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="parallax-wrap">
                                            <div class="parallax-element">
                                                <a href="https://www.youtube.com/channel/UCIJGrVCT23zxHX0SMwOgjYw" target="_blank">
                                                    <i class="ti-youtube"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- /*change by : Jalpa | Change Date : 30 june 2021*/ -->
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-md-4 col-sm-6">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Useful Links</h3>
                                </div>
                                <ul>
                                    <!--<li><a href="javascript:void(0)">How It Works</a></li>-->
                                    <li><a href="<?= BASE_URL ?>covid-detail/">Covid Support</a></li>
                                    <li><a href="<?= BASE_URL ?>privacy-policy/">Privacy Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>aml-policy/">AML Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>term-of-use/">Terms of Use</a></li>
                                    <li><a href="<?= BASE_URL ?>refund-policy/">Refund Policy</a></li>
                                    <li><a href="<?= BASE_URL ?>cancellation-policy/">Cancellation Policy</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-4 col-lg-offset-1 col-md-4 col-sm-6">
                            <div class="widget market-widget tp-service-link-widget">
                                <div class="widget-title">
                                    <h3>Contact </h3>
                                </div>                            
                                <div class="contact-ft">
                                    <ul>
                                        <!-- <li><i class="fi flaticon-pin"></i>28 Street, New York City, USA</li> -->
                                        <li><i class="fi flaticon-call"></i><a href="tel:+91 7208701981">+91 7208701981</a></li>
                                        <li><i class="fi flaticon-envelope"></i><a href="mailto:info@zedaid.org">info@zedaid.org</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget instagram">
                                <div class="widget-title">
                                    <h3>Instagram</h3>
                                </div>
                                <ul class="d-flex">
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                    <li><a href="#"><img width="85" height="85" src="<?php echo bloginfo('template_directory'); ?>/images/insta.jpg" alt=""></a></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="tp-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <span class="abc">Designed with
                                <i class="fa fa-heart text-primary"></i> by
                                <a href="https://innovuratech.com/" target="_blank" style="color:#fff !important">Innovura Technologies</a>
                            </span>
                            <span style="float:right;color:#fff !important">
                                Copyright © 2021 ZED Platforms - All Rights Reserved. </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end tp-site-footer -->
    </div>
</div>
<!-- end of page-wrapper -->
<div id="magic-cursor">
    <div id="ball">
        <div id="ball-drag-x"></div>
        <div id="ball-drag-y"></div>
        <div id="ball-loader"></div>
    </div>
</div>

</body>
<!-- All JavaScript files
    ================================================== -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<!-- Plugins for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
<!-- Custom script for this template -->
<script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>

<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/searchpanes/1.4.0/js/dataTables.searchPanes.min.js"></script>

<script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>


<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>


<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
<script>
    function startcamp() {
        $.cookie("actual_link", null, { path: '/' });
        <?php
        $cUrl = BASE_URL . "start-campaign/";
        $cUrll = BASE_URL . "login/";
        ?>
        $.cookie("actual_link", "<?= $cUrl; ?>", {
            path: '/'
        });
        window.location.replace("<?= $cUrll; ?>");
    }

    jQuery(document).ready(function () {
        window.onbeforeunload = function (e) {
            jQuery('.preloader1').css('display','block');
        }
        jQuery(window).load(function () {
            jQuery('.preloader1').css('display','none');
        });
    });
</script>
</html>
<?php
//get_footer();
?>
<script>
jQuery(document).ready(function() {
    jQuery('#example').DataTable({
      searchPanes: {
          "viewTotal": true
    },
    columnDefs: [{
        searchPanes: {
            show: true,
            searching: false
        },
        targets: [0]
    }],
        scrollX: true,
        dom: 'BPlfrtip',
        colReorder: true,
        buttons: [
            
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'excel',
                    'pdf',
                    'print'
                ]
            }
        ],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
       /* initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }*/
        
        
    });
});

function verifiedcamp(id) {
  // showLoadingBar();
  jQuery('#loadingdiv' + id).css('display', '');
  jQuery.ajax({
      url: '<?php echo BASE_URL . 'verifiedservicerequest.php' ?>',
      type: "POST",
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          jQuery('#verifieddiv' + id).css('display', '');
          jQuery('#verifieddiv' + id).css('background', '#4BB543');
          jQuery('#verifieddiv' + id).text('ZED Verified');
          jQuery('#declinediv' + id).css('display', 'none');
          jQuery('#loadingdiv' + id).css('display', 'none');
          event.preventDefault();
      },
      error: function(jqXHR, exception) {
          jQuery('#verifieddiv' + id).css('display', '');
          jQuery('#declinediv' + id).css('display', 'none');
          jQuery('#loadingdiv' + id).css('display', 'none');
          event.preventDefault();
      }

  });
}

function rejectcamp(id) {
  // showLoadingBar();
  jQuery('#loadingdiv' + id).css('display', '');
  jQuery.ajax({
      url: '<?php echo BASE_URL . 'rejectservicerequest.php' ?>',
      type: "POST",
      data: {
          id: id
      },
      success: function(response) {
          console.log(response);
          jQuery('#verifieddiv' + id).css('display', 'none');
          jQuery('#declinediv' + id).css('display', '');
          jQuery('#declinediv' + id).css('background', '#CCC');
          jQuery('#declinediv' + id).text('Rejected');
          jQuery('#loadingdiv' + id).css('display', 'none');
          event.preventDefault();
      },
      error: function(jqXHR, exception) {
          jQuery('#verifieddiv' + id).css('display', 'none');
          jQuery('#declinediv' + id).css('display', '');
          jQuery('#loadingdiv' + id).css('display', 'none');
          event.preventDefault();
      }

  });
}
</script>