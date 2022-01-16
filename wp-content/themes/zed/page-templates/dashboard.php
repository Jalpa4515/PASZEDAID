<?php
error_reporting(0);
/**
 * Template Name: DashboardFinal
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();

global $wpdb, $user_ID;

if (!$user_ID) {
    header("Location: " . BASE_URL . 'login');
}
$userId = $user_ID;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Dashboard | Zed</title>
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->

    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet">

    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    
    <style>

        /*******************************
    * MODAL AS LEFT/RIGHT SIDEBAR
    * Add "left" or "right" in modal parent div, after class="modal".
    * Get free snippets on bootpen.com
    *******************************/
    .modal{z-index: 999999 !important;}
    .modal.left .modal-dialog,
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 55%;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    .modal.left .modal-content,
    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }

    .modal.left .modal-body,
    .modal.right .modal-body {
        padding: 15px 15px 80px;
    }

    /*Right*/
    .modal.right.fade .modal-dialog {
        right: -320px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }
    .modal.right.fade.in .modal-dialog {
        right: 0;
    }


    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
    }
    .modal-header {
        border-bottom-color: #EEEEEE;
        background-color: #FAFAFA;
    }

    /* Style the tab */
    .tab {
    float: left;
    /* border: 1px solid #ccc; */
    background-color: #f1f1f1;
    width: 30%;
    height: 300px;
    }

    /* Style the buttons inside the tab */
    .tab button {
    display: block;
    background-color: inherit;
    color: black;
    padding: 22px 16px;
    width: 100%;
    border: none;
    outline: none;
    text-align: left;
    cursor: pointer;
    transition: 0.3s;
    font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        float: left;
        padding: 0px 16px;
        /* border: 1px solid #ccc; */
        /* width: 70%; */
        border-left: none;
        height: 300px;
        padding-top: 25px;
        width: 100%;
    }
    .tabcontent1{
        float: left;
        padding: 0px 16px;
        /* border: 1px solid #ccc; */
        /* width: 70%; */
        border-left: none;
        height: 300px;
        padding-top: 25px;
        width: 100%;
    }
    .modal-body {
        padding: 0px !important;
    }
 .sidenav {
        display: block;
    }
        
    /* sidebar */
    /* Fixed sidenav, full height */
    .sidenav {
    height: 100%;
    width: 100%;
    position: absolute;
    margin-top: -10px;
    /* z-index: 1; */
    top: 57;
    left: 0;
    background-color: #FAFAFA;
    overflow-x: hidden;
    padding-top: 20px;
    min-height: 600px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 17px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover {
    color: white;
    }

    .sidenav a:active {
    color: white !important;
    }

    .sidenav #nav-icon{
        display:none;
    }
    .col-md-2 {
    width: 20%;
}
    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        
    }
        * {
            box-sizing: border-box
        }

        body {
            font-family: "Lato", sans-serif;
            padding-right: 0px !important;
        }

        /* Style the tab */
        .tab {
            float: left;
            width: 10%;
            margin: 20px 50px 0px 50px;
            position: fixed;
        }

        /* .tp-blog-sidebar .category-widget ul a:hover {
            display: block;
            color: #fff;
        } */

        .ff {
            font-style: unset;
            margin-right: 10px;
            font-size: 25px;
        }

        .section-head{
            text-align: center;
    font-size: 40px;
    margin-bottom: 20px;
    padding: 30px 40px;
    color: #2c2c2c;
  background-color: #d5d5d5;
  letter-spacing: .05em;
  text-shadow: 4px 4px 0px #d5d5d5, 7px 7px 0px rgba(0, 0, 0, 0.2);
        }

        .section-pad {
            padding: 100px 0 0 0;
            min-height: 400px;
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
            padding: 50px 10px 10px 10px;
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

        /* .tp-blog-sidebar .category-widget ul a {
            display: block;
            color: #fff;
        } */
        .pagination > .active > a{
            color: #fff !important;
        }

        .licause a {
            color: #fff !important;
        }

        .enquire-btn {
        text-transform: uppercase;
        transform: rotate(-90deg);
        transform-origin: center;
        height: 45px;
        top: 63%;
        right: -56px;
        margin: auto 0;
        width: 150px;
        position: fixed;
        z-index: 99999;
    }

        @media (min-width: 1200px){
            .container {
                width: 100%;
            }
        }
        @media (min-width: 992px){
            .tp-blog-sidebar{
                padding-right: 0px;
            }
           
            .tp-blog-sidebar .category-widget ul>li+li {
   
   margin: 0 5px; 
}
            .col-md-8 {
                width: 59.666667%;
            }
            
            
            .widget3{
                width:40%;
            }


           .count1-sidebar{

            display: inline-flex;
            align-items: flex-end;
            margin-top: -10%;
            }
        }
        @media (max-width: 768px){

            .col-md-2 {
    width: 100%;
}
            .font1{
                font-size: 20px;
                padding-top: 15px;
            }
            button.tablinks.bod {
    width: 80px !important;
}
            .tp-blog-sidebar.col-md-12.count1-sidebar {
    padding: 0px;
}
           
            .enquire-btn {
            text-transform: uppercase;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            top: 94% !important;
            text-align: center;
            padding: 10px;
            transform: rotate(0deg) !important;
            width: 45%;
        }

      
            input#submit {
    max-width: 100% !important;
}
            .tp-blog-sidebar>.widget+.widget {
    margin-top: 20px;
}

            .cause-text ul li a {
        
            width: 250px;
        }
        a.dbtn {
    width: 250px !important;
}
        .copy-link{
            width: 60px !important;
        }


        .tab {
        width: 120%;
        margin: 20px 50px 0px 50px;
        position: unset;
        display: flex;
        align-items: baseline;
            
        }
        .tab p {
            width: 73%;
        }
        p.cols {
            display: none;
        }
        .dashdropdown {
            margin-bottom: 15px;
            padding-left: 5px;
            height: 50px;
            border: 1px solid #eee !important;
            border-radius: 10px;
            border: none;
            background: #fff;
            box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
            width:100% !important;
        }
        
        .tp-blog-sidebar .widget {
            margin: 0px 0px;
            width: 100%;
        }
        .tab button{
            margin:20px;
        }
        .tabcontent {
            float: left;
            padding: 0;
            border: none;
            width: 145%;
            border-left: none;
        }

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
        a#accept_btn {
    background: #3eba64;
    color: #fff !important;
    padding: 4px;
    border-radius: 5px;
}
a#decline_btn {
    background: #D62C5B;
    color: #fff !important;
    padding: 4px;
    border-radius: 5px;
}
.dbtnss{
    background: #3D3D8A;
    color: #fff !important;
    padding: 4px;
    border-radius: 5px;
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
            text-align: center;
        }
        .preloader1 {
          background-color: rgba(255,255,255,0.7);
          width: 100%;
          height: 100%;
          position: fixed;
          z-index: 1000;
        }
    
        .dashdropdown {
        width: 100% ;
        }

          /* Piyush */

        /* .preloader1 {
            background-color: rgba(255, 255, 255, 0.7);
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 1000;
        }

        .preloader1::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: #3d3d8a;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        } */
        #loading-image {
            position: absolute;
            top: 50%;
            left: 48%;
            z-index: 100;
        }
    </style>
</head>

<body>
    
    <!-- start preloader style="display: none;"-->
    <div class="preloader1">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
    </div>
    <!-- end preloader -->
    
    <?php
    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND status = 1 AND userId =" . $userId, OBJECT);
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
        $res = $resultsc[0];
        $idd = $_GET['id'];
    } else {
        $res = $results[0];
        $idd = $res->id;
    }
    $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $idd;
    $resultsipa = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE campaign_Id IN (" . $idd . ")", ARRAY_A);

    foreach ($results as $resv) {
        $cid[] = $resv->id;
    }
    if ($cid) {
        $acids = implode(",", $cid);
    }

    $resultsdonars = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ")", OBJECT);

    $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ")", OBJECT);

    $ddd = date("Y-m-d");
    $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND DATE_FORMAT(created_at, '%Y-%m-%d') = '" . $ddd . "' AND campaign_Id IN(" . $idd . ")", ARRAY_A);

    if ($res->campaign_typeId == 2) {
        $goal_amount = $res->item_qty;
        $currency = 'QTY';
    } else if ($res->campaign_typeId == 3) {
        $goal_amount = $res->product_qty;
        $currency = 'QTY';
    } else {
        $goal_amount = $res->goal_amount;
        $currency = $res->currency;
    }

    $achieve_amountc = 0;
    foreach ($resultsdonacc as $tt) {
        if ($tt['campaign_typeId'] == 3) {
            $achieve_amountcn = $tt['amount'] ? $tt['amount'] : 0;
        } else {
            $achieve_amountcn = $tt['amount'] ? $tt['amount'] : 0;
        }
        $achieve_amountc += $achieve_amountcn;
    }

    if ($res->id == 24) {
        $achieve_amount = 80000;
        $percn = 100;
    } else if ($res->id == 25) {
        $achieve_amount = 16000;
        $percn = 100;
    } else {
        $achieve_amount = 0;
        foreach ($resultsdonacc as $tt) {
            if ($tt['campaign_typeId'] == 3) {
                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
            } else {
                $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
            }
            $achieve_amount += $achieve_amountn;
        }
        // $percn = $achieve_amount / $goal_amount * 100;
        $totalRaiedAmount = 0;
        foreach ($resultsdona as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalRaiedAmountn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalRaiedAmountn = $tt->amount ? $tt->amount : 0;
            }
            $totalRaiedAmount += $totalRaiedAmountn;
        }
        $percn = $totalRaiedAmount / $goal_amount * 100;   

        if($percn>100) {
            $percn = 100;
        }
        $totalRaiedAmounts = 0;
        foreach ($resultsdona as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalRaiedAmountsn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalRaiedAmountsn = $tt->amount ? $tt->amount : 0;
            }
            $totalRaiedAmounts += $totalRaiedAmountsn;
        }
        
    }
    ?>
    <?php
    if ($results) {
        ?>
        
       
            <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <h2 class="section-head">DASHBOARD</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-4 col-8 ">
                           
                                <select name="individual_person" id="individual_person" class="dashdropdown drp fundlist">

                                    <?php
                                        foreach ($results as $resc) {
                                            if ($res->id == $resc->id) {
                                                $sel = "selected";
                                            } else {
                                                $sel = "";
                                            }
                                            if ($resc->campaign_typeId == 2) {
                                                $fundtitle = $resc->item_name;
                                            } else if ($resc->campaign_typeId == 3) {
                                                $fundtitle = $resc->product_name;
                                            } else {
                                                $fundtitle = $resc->fundraiser_title;
                                            }
                                            ?>
                                        <option <?php echo $sel; ?> value="<?php echo $resc->id; ?>"><?php echo $fundtitle; ?></option>
                                    <?php
                                        }
                                        ?>
                                </select>

                                <script>
                                    $(".fundlist").change(function() {
                                        var newurl = "<?php echo BASE_URL . 'my-account/?id=' ?>" + this.value;
                                        location.href = newurl;
                                    });
                                </script>
                                <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div class="progress-section pbar">
                                        <div class="process">
                                            <div class="progress pbars">
                                                <div class="progress-bar pbars" style="width: <?= $percn; ?>% !important;">
                                                    <div class="progress-value">
                                                        <span><?= $percn; ?></span>%
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pbar2">
                                        <div style="text-align:center;"> <?php echo $currency." ".$totalRaiedAmount; ?><div>Raised</div></div>
                                        <!--<div><span>Raised:</span> <?php echo $currency.$achieve_amount; ?></div>-->
                                        <div style="text-align:center;"> <?php echo $currency." ".$goal_amount; ?><div>Goal</div></div>
                                        <!--<div><span>Goal:</span> <?php echo $currency.$goal_amount; ?></div>-->
                                        <!--
                                        <div class="rai"><span>Raised:</span>
                                            <p class="rai3">
                                            <?php echo $currency; ?> <?php echo $achieve_amount; ?>
                                            </p>
                                        </div>
                                        <div class="rai2"><span>Goal:</span> <?php echo $currency; ?> <?php echo $goal_amount; ?></div>-->
                                    </div>
                                    <div class="cause-text">
                                        <ul>
                                            <li class="licause"><a href="<?= $shareurl; ?>" class="dbtn">Go To Fundraiser</a></li>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                            
                            <div class="tp-blog-sidebar col-md-12 count1-sidebar" >
                                <div class="widget category-widget col-md-4" style="display:inline-flex;margin-right: 10px;">
                                    <div style="float:left">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/view.png" alt="">
                                        </button>
                                    </div>
                                    <div class="font1" style="float:right;text-align: center;col-md-4"> <?= count($resultsipa); ?> views Today </div>
                                </div>
                                <div class="widget category-widget" style="display:inline-flex;margin-right: 10px;">
                                    <div style="float:left;">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/zero.png" alt="">
                                        </button>
                                    </div>
                                    <div class="font1" style="float:right;text-align: center !important;col-md-4"> <?php echo $currency; ?> <?= $achieve_amountc; ?> Raised today </div>
                                </div>
                                <div class="widget category-widget widget3" style="display:inline-flex;">
                                    <div style="float:left">
                                        <button style="width:50px" class="tablinks bod"><img src="<?php echo bloginfo('template_directory'); ?>/images/users.png" alt="">
                                        </button>
                                    </div>
                                    <?php
                                        if ($res->id == 24) {
                                            $donn = 5;
                                        } else if ($res->id == 25) {
                                            $donn = 2;
                                        } else {
                                            $donn = count($resultsdona);
                                        }                                   ?>
                                    <div  class="font1" style="float:right;text-align: center;"> <?php echo $donn; ?> <br>Total Donors </div>
                                </div>
                            </div> 



                        </div>

                        <div class="col-lg-5 col-md-6 col-4  ">
                      
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center">TOTAL RAISED</p>
                                        <p style="color:#000;font-weight:600;text-align:center">RS. 0</p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">See the Funds breakup in the
                                            <br><span style="color:#3D3D8A;font-weight:600;">Funds Summary</span>
                                        </p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">To withdraw please add bank details of
                                            <br>the beneficiary.</p>
                                    </div>
                                    <div class="comment-respond" style="margin-top:30px">
                                        <p style="color:#3D3D8A;font-weight:600;text-align:center">Please enter your Account Number
                                        </p>
                                        <form method="post" id="commentform" class="comment-form">
                                            <div class="form-inputs" style="text-align:center">
                                                <input placeholder="Account Number" type="text" style="float:none;text-align:center">
                                            </div>
                                            <div class="form-submit" style="text-align:center">
                                                <input id="submit" value="Add Beneficiary Documents" type="submit" style="max-width: 50%;float:none;text-align:center">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>

            <div class="text-center">
            <button type="button" id="links" class="btn enquire-btn" data-toggle="modal" data-target="#myModal2" style="background: #3d3d8a; color: white;">
                Social Share
            </button>
        </div>

        <!-- Usefull Links Modal -->
        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2"><b>Social Share</b></h4>
                    </div>

                    <div class="modal-body">
                        
                        <!-- <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                        </div> -->

                        <button class="tablinks" style="display:none;" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
                        
                        <div class="sidenav">
                            
                        <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:600">SHARE</p>
                                    </div>
                                    <div style="border:1px solid #ccc;border-radius:10px; padding:10px;">
                                        <p style="color:#3D3D8A;font-weight:600"> Fundraising Tip:</p>
                                        <p style="color:#000;">You are more likely to raise funds by sharing on Socialmedia</p>
                                    </div>
                                    <div class="cause-text" style="padding:0px">
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#25d366;width: 100%; color:#ffffff;" href="<?php echo 'https://web.whatsapp.com/send?text='. $shareurl?>" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Whatsapp</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#3b5998;width: 100%; color:#ffffff;" href="<?php echo 'https://www.facebook.com/sharer.php?u=' . $shareurl ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                        </ul>
                                        <!-- <ul style="margin-top: 0px;">
                                            <li class=""><a style="background-color:#0078ff" href="#"><i class="fab fa-facebook-messenger ff"></i>Share On Messenger</a></li>
                                        </ul> -->
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#1da1f2;width: 100%; color:#ffffff;" href="<?php echo 'https://twitter.com/share?url=' . $shareurl ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <li style="width: 100%;"><a style="background-color:#be362b;width: 100%; color:#ffffff;" href="<?php echo 'mailto:?subject='. $fundtitle .'&amp;body=Check out this fundraiser ' . $shareurl?>" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> E-mail</a></li>
                                        </ul>
                                        <ul style="margin-top: 0px;">
                                            <input type="text" style="display:none;" id="myInput" value="<?php echo $shareurl?>">
                                            <p id="p1" style="display:none;"><?php echo $shareurl?></p>
                                            <li style="width: 100%;" class=""><a style="color: #000;background: #fff;border: 2px solid #444;width: 100%;" href="javascript:void(0)" onclick="copyToClipboard('#p1')"><i class="fa fa-link" aria-hidden="true"></i> Copy Link</a></li>
                                        </ul>
                                        <div class="modal fade" id="copiedtext" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        Copied on clipboard
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <script>
                                            function copyToClipboard(element) {

                                                var $temp = $("<input>");
                                                $("body").append($temp);
                                                $temp.val($(element).text()).select();
                                                document.execCommand("copy");
                                                $temp.remove();

                                                $("#copiedtext").modal('show');
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                        </div>

                        
                       

                    </div>
                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div>
        <!-- modal -->
        
            <!--<section class="tp-blog-single-section section-pad" style="background: #eee;">
           
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-12 section2-left">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget">
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center">TOTAL RAISED</p>
                                        <p style="color:#000;font-weight:600;text-align:center">RS. 0</p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">See the Funds breakup in the
                                            <br><span style="color:#3D3D8A;font-weight:600;">Funds Summary</span>
                                        </p>
                                    </div>
                                    <div>
                                        <p style="color:#000;font-weight:400;text-align:center;margin-top:30px">To withdraw please add bank details of
                                            <br>the beneficiary.</p>
                                    </div>
                                    <div class="comment-respond" style="margin-top:30px">
                                        <p style="color:#3D3D8A;font-weight:600;text-align:center">Please enter your Account Number
                                        </p>
                                        <form method="post" id="commentform" class="comment-form">
                                            <div class="form-inputs" style="text-align:center">
                                                <input placeholder="Account Number" type="text" style="float:none;text-align:center">
                                            </div>
                                            <div class="form-submit" style="text-align:center">
                                                <input id="submit" value="Add Beneficiary Documents" type="submit" style="max-width: 50%;float:none;text-align:center">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>-->
       
        <?php 
        $camp = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id = $idd LIMIT 1", OBJECT);
        $campaign_typeId = $camp[0]->campaign_typeId;

        $resultsdonars_pending = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ") AND status = 0", OBJECT);
        $resultsdonars_accepted = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ") AND status = 1", OBJECT);
        $resultsdonars_totals = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ")", OBJECT);

        $totalAmount = 0;
        foreach ($resultsdonars_totals as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalAmountn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalAmountn = $tt->amount ? $tt->amount : 0;
            }
            $totalAmount += $totalAmountn;
        }
        $totalpendingAmount = 0;
        foreach ($resultsdonars_pending as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalAmountn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalAmountn = $tt->amount ? $tt->amount : 0;
            }
            $totalpendingAmount += $totalAmountn;
        }

        $resultsdonars_dispatched = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ") AND dispatched = 1", OBJECT);

        $totalDispatched = 0;
        foreach ($resultsdonars_dispatched as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalDispatchedn = $tt->amount ? $tt->amount : 0;
            } else {
                $totalDispatchedn = $tt->amount ? $tt->amount : 0;
            }
            $totalDispatched += $totalDispatchedn;
        }

        $resultsdonars_declined = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE ((paymetStatus = 1 AND campaign_typeId = 1) OR campaign_typeId != 1) AND campaign_Id IN(" . $idd . ") AND status = 2", OBJECT);
        $totaldeclined = 0;
        foreach ($resultsdonars_declined as $tt) {
            if ($tt->campaign_typeId == 3) {
                $totalDispatchedns = $tt->amount ? $tt->amount : 0;
            } else {
                $totalDispatchedns = $tt->amount ? $tt->amount : 0;
            }
            $totaldeclined += $totalDispatchedns;
        }
        ?>
        
            <section class="tp-blog-single-section section-pad" style="background: #eee;padding: 60px 0 0 0;">
            <h2 class="section-head">DONATIONS</h2>
            
                <div class="container" style="width: 100%;">
                    <?php if($campaign_typeId == 3 || $campaign_typeId == 2){?>
                    <div class="row text-center">
                        <div class="col-md-2 col-sm-4 col-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="font-weight: 600;color:#000"><span style="font-size: 22px;">QTY <?= $totalAmount;?></span><br> <b>Total Requests</b> </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="font-weight: 600;color:#44BC69"><span style="font-size: 22px;">QTY <?= $totalRaiedAmount;?></span><br> <b>Accepted Requests</b> </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="font-weight: 600;color:#FD5002"><span style="font-size: 22px;">QTY <?= $totalpendingAmount;?></span> <br><b>Pending Requests</b></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="font-weight: 600;color:#3D3D8A"><span style="font-size: 22px;">QTY <?= $totalDispatched;?></span> <br><b>Dispatched</b></div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-4 col-12">
                            <div class="panel panel-default">
                                <div class="panel-body" style="font-weight: 600;color:#D62C5B"><span style="font-size: 22px;">QTY <?= $totaldeclined;?></span> <br><b>Rejected</b></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-6 col-12">
                            <div class="tp-blog-sidebar">
                                <div class="widget category-widget table-responsive">  <!-- dt-responsive -->
                                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone No. </th>
                                                <th>Date|Time</th>
                                                <th>QTY</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($resultsdonars) {
                                                foreach ($resultsdonars as $resul) {

                                                    $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $resul->campaign_Id, OBJECT);
                                                    $recs = $resultscc[0];
                                                    $campaign_typeId = $recs->campaign_typeId;
                                                    $campaign_Id = $recs->id;

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
                                                        $goal_amount = $recs->product_qty;
                                                        $currency = 'QTY';
                                                    } else {
                                                        $goal_amount = $recs->goal_amount;
                                                        $currency = $recs->currency;
                                                    }

                                                    if ($recs->image) {
                                                        $iimage = BASE_URL . 'fundraiserimg/' . $recs->image;
                                                    } else {
                                                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $recs->video);
                                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/0.jpg";
                                                    }
                                                    $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $recs->id;

                                                    ?>
                                            <tr>
                                                <td><?php echo $resul->fullName; ?></td>
                                                <td><?php echo $resul->phonenumber; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($resul->created_at)); ?> | <?php echo date("H:i:s", strtotime($resul->created_at)); ?></td>
                                                <?php if ($recs->campaign_typeId == 3) { ?>
                                                    <td><?php echo $currency; ?> <?php echo $resul->amount ?></td>
                                                <?php } else { ?>
                                                    <td><?php echo $currency; ?> <?php echo $resul->amount; ?></td>
                                                <?php  } ?>
                                                <td><?php echo $resul->emailId; ?></td>
                                                <td><?php echo $resul->address; ?></td>

                                                <?php if ($resul->status == 1) { ?>
                                                    <td>
                                                        <?php if ($resul->dispatched == 1) { ?>
                                                            <span style="color:#3D3D8A;" id="dispatched<?php echo $resul->id; ?>">Dispatched</span>
                                                        <?php } else { ?>
                                                            <span style="color:#3EBA64" id="accepteddiv<?php echo $resul->id; ?>">Accepted |</span>
                                                            <a href="javascript:void(0)" class="dbtnss" id="dispatch<?php echo $resul->id; ?>" onclick="dispatch('<?php echo $resul->id; ?>')" style="width:200px; color:#3EBA64"> Dispatch</a>
                                                            <span style="color:#3D3D8A; display:none;" id="dispatched<?php echo $resul->id; ?>">Dispatched</span>
                                                        <?php } ?>
                                                    </td>
                                                <?php } else if ($resul->status == 2) { ?>
                                                    <td><span style="color:#D62C5B">Declined</span></td>
                                                <?php } else { ?>
                                                    <td>
                                                    <a href="javascript:void(0)" onclick="acceptdonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="acceptdiv<?php echo $resul->id; ?>" id="accept_btn" style="width:200px; color:#3EBA64">Accept</a>
                                                    
                                                    <a href="javascript:void(0)" onclick="declinedonation('<?php echo $resul->id; ?>', '<?php echo $resul->amount; ?>', '<?php echo $campaign_Id; ?>');" class="declinediv<?php echo $resul->id; ?>" id="decline_btn" style="width:200px; color:#D62C5B">Decline</a>

                                                    <span style="color:#3EBA64; display:none;" id="acceptdiv<?php echo $resul->id; ?>">Accepted</span>
                                                    <span style="color:#D62C5B; display:none;" id="declinediv<?php echo $resul->id; ?>">Declined</span>

                                                    </td>
                                                <?php } ?>
                                            </tr>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        
    <?php
    } else {
        ?>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12" style="text-align:center;">
                <h3 style="text-align:center;">No campaigns created.</h3>
                <br />
                <a href="<?= BASE_URL; ?>start-campaign/" class="button1thanks">Create Campaign</a>
            </div>
        </div>
    <?php
    }
    ?>
    <script>
        jQuery(document).ready(function() {
            jQuery('#example').DataTable({
                /* "scrollY": 200, */
                "scrollX": true
            });
        });

        

        jQuery(document).ready(function () {
            // Get the element with id="defaultOpen" and click on it
            <?php if ($results) { ?>
            document.getElementById("defaultOpen").click();
            <?php } ?>

            window.onbeforeunload = function (e) {
                jQuery('.preloader1').css('display','block');
            }
            jQuery(window).load(function () {
                jQuery('.preloader1').css('display','none');
            });
        });
    </script>


<script>
    function dispatch(id) {

        $(".preloader1").css('display', 'block');
        $.ajax({
            url: '<?php echo BASE_URL . 'dispatch.php' ?>',
            type: "POST",
            data: {
                id: id
            },
            success: function(response) {
                console.log(id);
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $('#dispatched' + id).css('display', '');
                $(".preloader1").css('display', 'none');
                $('#dispatch' + id).css('display', 'none');
                $('#acceptdiv' + id).css('display', 'none');
                $('#accepteddiv' + id).css('display', 'none');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            },
            error: function(jqXHR, exception) {
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $(".preloader1").css('display', 'none');
                $('#acceptdiv' + id).css('display', 'block');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            }

        });
    }

    function acceptdonation(id, amt, cid) {
        // $("#accept_btn").html('Loading...');
        // $('#accept_btn').prop('disabled', true);
        $(".preloader1").css('display', 'block');
        $.ajax({
            url: '<?php echo BASE_URL . 'acceptdonation.php' ?>',
            type: "POST",
            data: {
                id: id,
                amt: amt,
                cid: cid
            },
            success: function(response) {
                console.log(id);
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $(".preloader1").css('display', 'none');
                $('#acceptdiv' + id).css('display', 'block');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            },
            error: function(jqXHR, exception) {
                // $("#accept_btn").html('Accept');
                // $('#accept_btn').prop('disabled', false);
                $(".preloader1").css('display', 'none');
                $('#acceptdiv' + id).css('display', 'block');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            }

        });
    }

    function declinedonation(id, amt, cid) {
        $.ajax({
            url: '<?php echo BASE_URL . 'declinedonation.php' ?>',
            type: "POST",
            data: {
                id: id,
                amt: amt,
                cid: cid
            },
            success: function(response) {
                $('#acceptdiv' + id).css('display', 'none');
                $('#declinediv' + id).css('display', 'block');
                $('#acceptdivmain' + id).css('display', 'none');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            },
            error: function(jqXHR, exception) {
                $('#acceptdiv' + id).css('display', 'none');
                $('#declinediv' + id).css('display', 'block');
                $('#acceptdivmain' + id).css('display', 'none');
                $('.declinediv' + id).css('display', 'none');
                $('.acceptdiv' + id).css('display', 'none');
                //event.preventDefault();
            }

        });
    }
    </script>

</body>

</html>
<?php
get_footer();