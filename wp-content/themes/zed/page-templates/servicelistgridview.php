<?php

/**
 * Template Name: service list grid view
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
global $wpdb;
$userId = get_current_user_id();
$service_id = $_GET['slug'];
$address = '';

$services =  $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");

$service_name = $services->service_name;
$description = $services->description;
$banner = BASE_URL."/wp-content/uploads/services/".$services->banner;

$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");

//$request_fields = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE service_id = '".$service_id."'");
if (empty($_GET['location'])) {
    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
}else{
    $address = $_GET['location'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE latitude = '".$latitude."' AND longitude = '".$longitude."' AND service_id = '".$service_id."'", ARRAY_A);
}

$results = (array) $requests;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Map | Zed</title>
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script> -->
    <style>
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
            background: rgb(0 0 0 / 8%);
            padding: 20px;
            border-radius: 10px;
        }
        .tp-bg {
            background: linear-gradient(0deg, rgb(0 0 0 / 31%), rgb(0 0 0 / 42%)), url(<?= $banner; ?>);
            height: 400px;
			background-repeat: no-repeat;
    		background-size: cover;
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
        .tp-blog-sidebar .category-widget ul li {
            font-size: 16px;
            position: relative;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }
        a.add-icon {
            margin-left: 6%;
        }

        .pac-container {
            z-index: 10000 !important;
        }
        div.pac-container {
            z-index: 99999999999 !important;
        }
        .pac-logo::after{
           
            z-index: 99999999999 !important;
        }
        .gridview p {
            margin: 2px;
        }
        hr {
            margin-top: 10px;
            margin-bottom: 10px;
            
        }
    </style>

</head>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap"></script>
<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader1" style="display: none;">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>
        <!-- end preloader -->
        <!-- .tp-breadcumb-area start -->
        <div class="tp-breadcumb-area tp-bg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcumb-wrap">
                            <h2><?= $service_name; ?></h2>
                            <p class="para"><?= $description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- .tp-breadcumb-area end -->
        <!-- start contact-pg-contact-section -->
        <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <div class="container">
                <div class="row">
                    <div class="widget search-widget ">
                        <form id="searchfrm">
                            <input type="hidden" value="<?= $service_id; ?>" name="slug" id="slug">
                            <div>
                                <input type="text" class="form-control serach locationtextbox icon-input" placeholder="Enter address here" value="<?= $address; ?>" name="location" id="location">
                                <button class="btns btn" style="outline: none; box-shadow: none;" id="searchbtn" type="submit"><i class="ti-search icons"></i></button>
                                <!--<a><i class='fa fa-times-circle fa-2x times-icon' aria-hidden='true'></i></a>-->
                            </div>
                            <input type="hidden" value="23.726688" name="latitude" id="latitude">
                            <input type="hidden" value="72.458866" name="longitude" id="longitude">
                        </form>
                         
                    </div>
                    
                    <div>
                        <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
                    </div>

                    <!-- <div>
                        <input type="text" class="locationtextbox d-none required-input form-control" value="" name="location" id="location" placeholder="Enter address here" style="cursor: auto;padding: 10px !important;">
                    </div> -->

                    <div class="col-md-4" style="margin-top: 5%;">
                        <div class="tp-blog-sidebar">
                            <div class="widget category-widget">
                                <label style="font-size: 18px;    margin-bottom: 23px;"><b>Categories</b></label>
                                
                                <ul>
                                    <?php foreach($categories as $val) {
                                        $icon_id = $val->icon_id;
                                        $iconpin = $wpdb->get_row("SELECT * FROM wp_service_icons WHERE id = '".$icon_id."'");
                                        if(!empty($iconpin)){
                                            $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon;
                                        }else{
                                            $icon_name = BASE_URL."/wp-content/uploads/services/".$val->icon;
                                        }
                                    ?>
                                    <li class="bor"><a onclick="camptypeid('<?= $val->category_id;?>')" href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check" name="camp_type[]" value="<?= $val->category_id;?>"></a><img src="<?= $icon_name ?>" width="20" height="20" style="margin-right: 2% !important; color: #777 !important;"/><?= $val->name;?>
                                    <a class="add-icon" href="javascript:void(0)" onclick="openAddCollectionsPopup('<?= $val->service_id; ?>','<?= $val->category_id; ?>','<?= $userId; ?>')"> <img src="https://zedaid.org/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- <div class="tp-blog-sidebar legendstextdesktop">
                            <div class="widget category-widget">
        
                                <label style="font-size: 18px;"><b>Legends</b></label>
        
                                <div class="row">
                                    <div class="col-md-5 line_spacing_top_15">
                                       <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/available.png" />
                                       <label style="font-size: 15px;display: inline;">Active</label>
                                    </div>
                                    <div class="col-md-7 line_spacing_top_15">
                                        <img src="<?= BASE_URL ?>/wp-content/uploads/2021/07/inactive-1.png" />
                                        <label style="font-size: 15px;display: inline;">Inactive</label>
                                    </div>
                                 </div>
                            </div>
                        </div> -->
                        <div class="tp-blog-sidebar legendstextdesktop">
                            <div class="widget category-widget">

                                <label style="font-size: 18px;"><b>Legends</b></label>

                                <div class="row">
                                    <div class="col-md-12 line_spacing_top_15">
                                        <img src="<?= BASE_URL ?>wp-content/uploads/2021/08/request_open.png" />
                                        <label style="font-size: 15px;display: inline;">
                                        <?php if(!empty($services->status_label1)){ ?>
                                            <?= $services->status_label1; ?>
                                        <?php } else { ?>
                                            Request is open
                                        <?php } ?>
                                        </label>
                                    </div>
                                    <div class="col-md-12 line_spacing_top_15">
                                        <img src="<?= BASE_URL ?>wp-content/uploads/2021/08/orange_marker.png" />
                                        <label style="font-size: 15px;display: inline;">
                                        <?php if(!empty($services->status_label2)){ ?>
                                            <?= $services->status_label2; ?>
                                        <?php } else { ?>
                                            Supporter has responded on Request.
                                        <?php } ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="line_spacing_top_15">
                                    <img src="<?= BASE_URL ?>wp-content/uploads/2021/07/inactive-1.png" />
                                    <label style="font-size: 15px;display: inline;">
                                    <?php if(!empty($services->status_label3)){ ?>
                                        <?= $services->status_label3; ?>
                                    <?php } else { ?>
                                        Request is Closed
                                    <?php } ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8"  style="margin-bottom: 2%;">
                        <ul class="register-now1" style="border-bottom-right-radius: 10px;background-color:#fff !important;" >
                            <li  style="margin-top:3px">
                                <a href="<?= BASE_URL ?>/service-list/?slug=<?= $service_id?>" class=" " style="color:#3d3d8a">Map</a>
                            </li>
                        </ul>
                        <ul class="register-now1" style="background-color:#3d3d8a !important;border-top-left-radius: 10px;" >
                            <li  style="margin-top:3px;">
                                <a href="<?= BASE_URL ?>/service-grid/?slug=<?= $service_id?>" class=" " style="color:#fff">List</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                    <?php if(!empty($requests)){?>
                    <?php foreach ($requests as $val) {
                        $request_id = $val['id'];
                    
                        $category_id = $val['category_id'];
                        $service_id = $val['service_id'];
                        $supports = $wpdb->get_row("SELECT * FROM wp_service_support_data WHERE request_id = '".$request_id."'", ARRAY_A);

                        $request_fields = $wpdb->get_row("SELECT * FROM wp_request_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."'");
                        $request_fields_json = $request_fields->request_fields;
                        $requst_arr = json_decode($request_fields_json, true);

                        $support_fields = $wpdb->get_row("SELECT * FROM wp_support_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."'");
                        $support_fields_json = $support_fields->support_fields;
                        $support_arr = json_decode($support_fields_json, true);

                        $changeStatus = $wpdb->get_row("SELECT * FROM wp_service_change_status WHERE request_id = '".$request_id."'", ARRAY_A);
                    ?>
                        
                            <div class="col-md-8">
                                <div class="gridview">
                                <p><b style="font-weight:600">Name:</b> <?= $val['name'];?></p>
                                <p><b style="font-weight:600">Email:</b> <?= $val['email'];?></p>
                                <p><b style="font-weight:600">Phone No:</b> <?= $val['mobile_number'];?></p>
                                <p><b style="font-weight:600">Address:</b> <?= $val['address'];?></p>
                                <?php foreach($requst_arr as $r){?>
                                <p><b style="font-weight:600"><?= $r['display_name']?>:</b> <?= $val[$r['table_field_name']];?></p>
                                <?php } ?>
                                <?php if(empty($supports)){?>
                                    <ul class="register-now">
                                        <li class="licause1">
                                            <a href="javascript:void(0)" class=" " style="color:#fff" onclick="openPopupSupportThem('<?= $val['service_id'];?>','<?= $val['category_id'];?>','<?= $val['id'];?>');">Support</a>
                                        </li>
                                    </ul>
                                <?php }else{ ?>
                                    <hr>
                                    <p><b style="font-weight:600">Supporter Info:</b></p>
                                    <p><b style="font-weight:600">Name:</b> <?= $supports['name'];?></p>
                                    <p><b style="font-weight:600">Email:</b> <?= $supports['email'];?></p>
                                    <p><b style="font-weight:600">Phone No:</b> <?= $supports['mobile_number'];?></p>
                                    <p><b style="font-weight:600">Address:</b> <?= $supports['address'];?></p>
                                    <?php foreach($support_arr as $r){?>
                                    <p><b style="font-weight:600"><?= $r['display_name']?>:</b> <?= $supports[$r['table_field_name']];?></p>
                                    <?php } ?>
                                <?php } if (empty($changeStatus)) {?>
                                
                                <ul class="register-now">
                                    <li class="licause1">
                                        <a href="javascript:void(0)" class=" " style="color:#fff" onclick="openPopup('<?= $val['service_id'];?>','<?= $val['category_id'];?>','<?= $val['id'];?>');">Close Request</a>
                                    </li>
                                </ul>
                                <?php } else { ?>
                                    <hr>
                                    <p><b style="font-weight:600">Change Status Info:</b></p>
                                    <p><b style="font-weight:600">Name:</b> <?= $changeStatus['name'];?></p>
                                    <p><b style="font-weight:600">Email:</b> <?= $changeStatus['email'];?></p>
                                    <p><b style="font-weight:600">Phone No:</b> <?= $changeStatus['mobile_number'];?></p>
                                    <p><b style="font-weight:600">Support Details:</b> <?= $changeStatus['supportDetails'];?></p>
                                <?php } ?>
                                
                            </div>
                            <p id="errorMapCode" class="d-none"></p>
                        </div>
                    <?php } }else{?>
                        <div class="col-md-8 text-center">
                            <br/><br/>
                            No Data available!
                        </div>
                    <?php } ?>
                    </div>
                    <!-- </div> -->

                    
                    <?php
                    $ipaddress = '';
                    if (getenv('HTTP_CLIENT_IP'))
                        $ipaddress = getenv('HTTP_CLIENT_IP');
                    else if (getenv('HTTP_X_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                    else if (getenv('HTTP_X_FORWARDED'))
                        $ipaddress = getenv('HTTP_X_FORWARDED');
                    else if (getenv('HTTP_FORWARDED_FOR'))
                        $ipaddress = getenv('HTTP_FORWARDED_FOR');
                    else if (getenv('HTTP_FORWARDED'))
                        $ipaddress = getenv('HTTP_FORWARDED');
                    else if (getenv('REMOTE_ADDR'))
                        $ipaddress = getenv('REMOTE_ADDR');
                    else
                        $ipaddress = 1;
                    ?>
                    <script>
                        $(document).ready(function() {
                            //$( ".times-icon" ).css("display","none");
                            $( ".times-icon" ).click(function() {
                                $( ".serach" ).val("");
                                initMap();
                            });
                            //Location
                            var map;
                            initMap();
                            function initMap() {

                                var geocoder = new google.maps.Geocoder();

                                var input = document.getElementById('location');
                                var autocomplete = new google.maps.places.Autocomplete(input);

                                google.maps.event.addListener(autocomplete, 'place_changed', function() {

                                    var place = autocomplete.getPlace();
                                    var address = place.formatted_address;
                                    geocoder.geocode({
                                        'address': address
                                    }, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            var latitude = results[0].geometry.location.lat();
                                            var longitude = results[0].geometry.location.lng();

                                            jQuery("#latitude").val(latitude);
                                            jQuery("#longitude").val(longitude);
                                            $('#searchfrm').submit();

                                            console.log(latitude + "==" + longitude);
                                        }
                                    });
                                });
                            }

                            //Location

                        });

                    </script>

                </div>
            </div> <!-- end container -->
        </section>
        <!-- end contact-pg-contact-section -->
    </div>

    <!-- end of page-wrapper -->
    <div id="magic-cursor">
        <div id="ball">
            <div id="ball-drag-x"></div>
            <div id="ball-drag-y"></div>
            <div id="ball-loader"></div>
        </div>
    </div>

    <!-- Toggle the addCollections: -->
    <div class="modal fade" id="addCollections" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="collectionformreset()">&times;</button>
                    <h4 class="modal-title text-center" id="categoryNameTitle">Add Collections</h4>
                </div>
                <div class="modal-body">
                    <form id="frm1" action="<?php echo BASE_URL ?>changestatus.php" enctype="multipart/form-data" method="post" class="f1">
                        <input type="hidden" value="<?= $userId; ?>" name="userId" id="userId" />
                        <input type="hidden" value="" name="hidcategoryId" id="hidcategoryId"/>
                        <input type="hidden" value="" name="service_id" id="service_id"/>
                        
                        <!-- <br> -->
                        <!-- <h4></h4> -->
                        <div class="mainvalid">
                            <div class="form-group valid">
                                <label class="lbform">Name</label>
                                <input type="text" id="name1" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                <span id="error-name1"></span> 
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Email</label>
                                <input type="text" id="email1" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                <span id="error-email1"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Phone Number</label>
                                <input type="text" id="phone_number1" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                <span id="error-mobile_number1"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Address</label>
                                <input type="text" id="address1" name="address" placeholder="Enter Address" class="form-control">
                                <span id="error-address1"></span>
                            </div>

                            <input type="hidden" name="lat" id="lat" value="19.076011">
                            <input type="hidden" name="lng" id="lng" value="72.877600">

                            <div id="dynamic"></div>
                            <!-- <div class="form-group valid">
                                <label class="lbform">Description</label>
                                <textarea id="desc1" name="desc" class="form-control" maxlength="100"></textarea>
                                <span id="error-desc1"></span>
                            </div> -->

                        </div>
                        <div class="f1-buttons">
                            <button type="button" id="btn-submit-food" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Save</button>
                            <button type="button" id="btn-submit-loader-food" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Loading...</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Toggle the support them: -->
    <div class="modal fade" id="supportThem" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header btn-next">
                    <button type="button" class="close"  style="" data-dismiss="modal" onclick="supportThemformreset()">&times;</button>
                    <h4 class="modal-title text-center" id="support_them_title">Support Them</h4>
                </div>
                <div class="modal-body">
                    <form id="frm2" action="<?php echo BASE_URL ?>support_them.php" enctype="multipart/form-data" method="post" class="f1">
                        <input type="hidden" value="<?= $userId; ?>" name="userId" id="userId" />
                        <input type="hidden" value="0" name="request_id" id="request_id"/>
                        <input type="hidden" value="" name="hidcategoryId" id="hidcategoryId1"/>
                        <input type="hidden" value="" name="service_id" id="service_id1"/>

                        <!-- <br> -->
                        <!-- <h4></h4> -->
                        <div class="mainvalid">
                            <div class="form-group valid">
                                <label class="lbform">Name</label>
                                <input type="text" id="name2" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                <span id="error-name2"></span> 
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Email</label>
                                <input type="text" id="email2" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                <span id="error-email2"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Phone Number</label>
                                <input type="text" id="phone_number2" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                <span id="error-mobile_number2"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Address</label>
                                <input type="text" id="address2" value="" name="address2" placeholder="Enter Address" class="form-control">
                                <span id="error-address2"></span>
                            </div>
                            
                            <input type="hidden" name="lat" id="lat2" value="19.076011">
                            <input type="hidden" name="lng" id="lng2" value="72.877600">
                            
                            <div id="dynamic_support_fields"></div>
                        </div>
                        <div class="f1-buttons">
                            <button type="button" id="btn-submit-support" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Save</button>
                            <button type="button" id="btn-submit-loader-support" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Loading...</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Toggle the status: -->
    <div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onclick="formreset()">&times;</button>
                    <h4 class="modal-title text-center" id="change_status">Change Status</h4>
                </div>
                <div class="modal-body">
                    <form id="frmChangeStatus" action="" enctype="multipart/form-data" method="post" class="f1">
                        <input type="hidden" value="<?= $userId; ?>" name="userId" />
                        <input type="hidden" value="" name="service_id" id="service_id3"/>
                        <input type="hidden" value="" name="cat_id" id="cat_id"/>
                        <input type="hidden" value="" name="req_id" id="req_id"/>

                        <br>
                        <div class="mainvalid">
                            <div class="form-group valid">
                                <label class="lbform">Name</label>
                                <input type="text" id="name" value="" name="name" placeholder="Enter Name" maxlength="50" class="form-control">
                                <span id="error-name"></span> 
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Email</label>
                                <input type="text" id="email" value="" name="email" placeholder="Enter Email" maxlength="100" class="form-control">
                                <span id="error-email"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Phone Number</label>
                                <input type="text" id="phone_number" value="" name="phone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                <span id="error-mobile_number"></span>
                            </div>
                            <div class="form-group valid">
                                <label class="lbform">Support Details</label>
                                <textarea id="supportDetails" name="supportDetails" class="form-control"></textarea>
                                <span id="error-supportDetails"></span>
                            </div>

                            <input type="hidden" name="latitude" id="lat2" value="19.076011">
                            <input type="hidden" name="longitude" id="lng2" value="72.877600">

                        </div>
                        <div class="f1-buttons">
                            <button type="button" id="btn-submit" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Save</button>
                            <button type="button" id="btn-submit-loader" class="btn btn-next" style="margin-left: 0%; background: #3D3D8A; color: #fff;">Loading...</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <!-- Plugins for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    <script>
        function collectionformreset(){
            jQuery("#name1").val("");
            jQuery("#email1").val("");
            jQuery("#phone_number1").val("");
            jQuery("#address1").val("");
            jQuery("#desc1").val("");
            jQuery("#desc1").text("");
            jQuery("#addCollections").trigger("reset");
            jQuery("#error-name1").html("<span id='error-name1' style=''></span>");
            jQuery("#error-email1").html("<span id='error-email' style=''></span>");
            jQuery("#error-address1").html("<span id='error-address1' style=''></span>");
            jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''></span>");
            jQuery("#error-desc1").html("<span id='error-desc1' style=''></span>");
        }

        function supportThemformreset(){
            jQuery("#name2").val("");
            jQuery("#email2").val("");
            jQuery("#phone_number2").val("");
            jQuery("#desc2").val("");
            jQuery("#desc2").text("");        
            jQuery("#supportThem").trigger("reset");
            jQuery("#error-name2").html("<span id='error-name2' style=''></span>");
            jQuery("#error-email2").html("<span id='error-email2' style=''></span>");
            jQuery("#error-address2").html("<span id='error-address2' style=''></span>");
            jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''></span>");
        }

        function formreset(){
            jQuery("#name").val("");
            jQuery("#email").val("");
            jQuery("#phone_number").val("");
            jQuery("#supportDetails").val("");
            jQuery("#frmChangeStatus").trigger("reset");

            jQuery("#error-name").html("<span id='error-name' style=''></span>");
            jQuery("#error-email").html("<span id='error-email' style=''></span>");
            jQuery("#error-status").html("<span id='error-status' style=''></span>");
            jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''></span>");
        }

        jQuery('#btn-submit-loader-food').css('display', 'none');
        jQuery('#btn-submit-loader-support').css('display', 'none');
        function openAddCollectionsPopup(service_id,category_id,userId){

            var geocoder = new google.maps.Geocoder();

            var input = document.getElementById('address1');
            var autocomplete = new google.maps.places.Autocomplete(input);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {

                var place = autocomplete.getPlace();
                var address = place.formatted_address;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        jQuery("#lat").val(latitude);
                        jQuery("#lng").val(longitude);

                        console.log(latitude + "==" + longitude);
                    }
                });
            });

            /* jQuery('#categoryNameTitle').text(categoryName); */
            jQuery('#hidcategoryId').val(category_id);
            jQuery('#service_id').val(service_id);
            jQuery('#addCollections').modal('show');
            //google.maps.event.addDomListener(window, 'load', initialize);
            //initialize();

            jQuery.ajax({
                type: "POST",
                url: '../get_request_fields.php',
                data: 'service_id='+service_id+'&category_id='+category_id,
                success: function(response)
                {
                    /* var category = JSON.parse(response); */
                    /* var array = category.request_fields; */
                    console.log( response );
                    $('#dynamic').html(response);
                    /* $.each(array,function(key,val){
                        console.log( "Key: " + key + ", Value: " + val.id );
                        var tr = '<tr class="collection_data_tr" id="collection_data_tr_'+val.id+'"><td>'+val.field_name+'</td><td>'+val.field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+val.id+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+val.id+')></i></td></tr>';
                        $('#data_collection').append(tr);
                    }); */
                }
            });
        }

        function openPopupSupportThem(service_id,category_id,request_id){

            var geocoder = new google.maps.Geocoder();

            var input = document.getElementById('address2');
            var autocomplete = new google.maps.places.Autocomplete(input);

            google.maps.event.addListener(autocomplete, 'place_changed', function() {

                var place = autocomplete.getPlace();
                var address = place.formatted_address;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var latitude = results[0].geometry.location.lat();
                        var longitude = results[0].geometry.location.lng();

                        jQuery("#lat2").val(latitude);
                        jQuery("#lng2").val(longitude);

                        console.log(latitude + "==" + longitude);
                    }
                });
            });

            jQuery('#supportThem').modal('show');
            jQuery('#request_id').val(request_id);
            jQuery('#hidcategoryId1').val(category_id);
            jQuery('#service_id1').val(service_id);

            jQuery.ajax({
                type: "POST",
                url: '../get_support_fields.php',
                data: 'service_id='+service_id+'&category_id='+category_id,
                success: function(response)
                {
                    /* var category = JSON.parse(response); */
                    /* var array = category.request_fields; */
                    console.log( response );
                    $('#dynamic_support_fields').html(response);
                    /* $.each(array,function(key,val){
                        console.log( "Key: " + key + ", Value: " + val.id );
                        var tr = '<tr class="collection_data_tr" id="collection_data_tr_'+val.id+'"><td>'+val.field_name+'</td><td>'+val.field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+val.id+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+val.id+')></i></td></tr>';
                        $('#data_collection').append(tr);
                    }); */
                }
            });

        }

        jQuery('#btn-submit-food').on('click', function() {
            jQuery('#btn-submit-food').css('display', 'none');
            jQuery('#btn-submit-loader-food').css('display', '');
            var validation_flag = '1';
            
            var name = document.getElementById("name1").value;
            if (name === '') {
                jQuery("#error-name1").html("<span id='error-name1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-name1").html("<span id='error-name1' style=''>" + "</span>");
            }

            var email = document.getElementById("email1").value;
            if (email == '') {
                jQuery("#error-email1").html("<span id='error-email1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email1").html("<span id='error-email1' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email1").html("<span id='error-email1' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email1").html("<span id='error-email1' style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }

            var mobile_number = document.getElementById("phone_number1").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }

            /* var address1 = document.getElementById("address1").value;
            if (address1 === '') {
                jQuery("#error-address1").html("<span id='error-address1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-address1").html("<span id='error-address1' style=''>" + "</span>");
            }

            var desc1 = document.getElementById("desc1").value;
            if (desc1 === '') {
                jQuery("#error-desc1").html("<span id='error-desc1' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-desc1").html("<span id='error-desc1' style=''>" + "</span>");
            } */

            jQuery("#name1").keyup(function() {
                var name = document.getElementById("name1").value;
                if (name != '') {
                    jQuery("#error-name1").html("<span id='error-name1' style=''>" + "</span>");
                } else {
                    var validation_flag = '0';
                }
            });

            jQuery("#email1").keyup(function() {
                var email = document.getElementById("email1").value;
                if (email == '') {
                    jQuery("#error-email").html("<span id='error-email1' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-email").html("<span id='error-email1' style=''>" + "</span>");
                }

                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (email.match(mailformat)) {
                    jQuery("#error-email1").html("<span id='error-email' style=''>" + "</span>");
                } else {
                    if (email != '') {
                        jQuery("#error-email1").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            jQuery("#phone_number1").keyup(function() {
                var mobile_number = document.getElementById("phone_number1").value;
                if (mobile_number == '') {
                    jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
                }

                var phoneformat = /^\d{10}$/;
                if (mobile_number.match(phoneformat)) {
                    jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style=''>" + "</span>");
                } else {
                    if (mobile_number != '') {
                        jQuery("#error-mobile_number1").html("<span id='error-mobile_number1' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            /* jQuery("#desc1").keyup(function() {
                var desc1 = document.getElementById("desc1").value;
                if (desc1 != '') {
                    jQuery("#error-desc1").html("<span id='error-desc1' style=''>" + "</span>");
                } else {
                    var validation_flag = '0';
                }
            }); */

            if (validation_flag == '1') {

                //jQuery( "#frmChangeStatus" ).submit();
                /* var categoryId = jQuery('#hidcategoryId').val();
                var name = jQuery('#name1').val();
                var email = jQuery('#email1').val();
                var phone_number = jQuery('#phone_number1').val();
                var address = jQuery('#address1').val();
                var desc = jQuery('#desc1').val();
                var latitude = jQuery('#lat').val();
                var longitude = jQuery('#lng').val();
                var userId = jQuery('#userId').val(); */
                var form = $("#frm1").closest("form");
                var formData = new FormData(form[0]);

                jQuery.ajax({
                    type: "POST",
                    url: '../submit_service_request.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        jQuery('#btn-submit-food').css('display', '');
                        jQuery('#btn-submit-loader-food').css('display', 'none');
                        jQuery('#addCollections').modal('hide');
                        bootbox.alert("Record added successfully.", function(){ 
                            jQuery("#frm1")[0].reset();
                            window.location.reload(true);
                        });
                    }
                });
            }else{
                jQuery('#btn-submit-food').css('display', '');
                jQuery('#btn-submit-loader-food').css('display', 'none');
            }
        });

        jQuery('#btn-submit-support').on('click', function() {
        
            jQuery('#btn-submit-support').css('display', 'none');
            jQuery('#btn-submit-loader-support').css('display', '');
            var validation_flag = '1';
            
            var name = document.getElementById("name2").value;
            if (name === '') {
                jQuery("#error-name2").html("<span id='error-name2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-name2").html("<span id='error-name2' style=''>" + "</span>");
            }

            var email = document.getElementById("email2").value;
            if (email == '') {
                jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }

            var mobile_number = document.getElementById("phone_number2").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }

            var address2 = document.getElementById("address2").value;
            if (address2 == '') {
                jQuery("#error-address2").html("<span id='error-address2' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-address2").html("<span id='error-address2' style=''>" + "</span>");
            }

            jQuery("#name2").keyup(function() {
                var name = document.getElementById("name2").value;
                if (name != '') {
                    jQuery("#error-name2").html("<span id='error-name2' style=''>" + "</span>");
                } else {
                    var validation_flag = '0';
                }
            });

            jQuery("#email2").keyup(function() {
                var email = document.getElementById("email2").value;
                if (email == '') {
                    jQuery("#error-email2").html("<span id='error-email2' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
                }

                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (email.match(mailformat)) {
                    jQuery("#error-email2").html("<span id='error-email2' style=''>" + "</span>");
                } else {
                    if (email != '') {
                        jQuery("#error-email2").html("<span id='error-email2 style='color: red;'>" + "You have entered an invalid email address!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            jQuery("#phone_number2").keyup(function() {
                var mobile_number = document.getElementById("phone_number2").value;
                if (mobile_number == '') {
                    jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
                }

                var phoneformat = /^\d{10}$/;
                if (mobile_number.match(phoneformat)) {
                    jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style=''>" + "</span>");
                } else {
                    if (mobile_number != '') {
                        jQuery("#error-mobile_number2").html("<span id='error-mobile_number2' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            jQuery("#address2address2").keyup(function() {
                var address2 = document.getElementById("address2").value;
                if (address2 == '') {
                    jQuery("#error-address2").html("<span id='error-address2' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-address2").html("<span id='error-address2' style=''>" + "</span>");
                }
            });

            if (validation_flag == '1') {

                //jQuery( "#frmChangeStatus" ).submit();
                /* var userId = jQuery('#userId').val();
                var id = jQuery('#id').val();
                var name = jQuery('#name2').val();
                var email = jQuery('#email2').val();
                var phone_number = jQuery('#phone_number2').val();
                var desc = jQuery('#desc2').val();
                var organization_name = jQuery('#organization_name').val(); */
                var form = $("#frm2").closest("form");
                var formData = new FormData(form[0]);
                
                jQuery.ajax({
                    type: "POST",
                    url: '../submit_service_support.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        jQuery('#btn-submit-support').css('display', '');
                        jQuery('#btn-submit-loader-support').css('display', 'none');
                        jQuery('#supportThem').modal('hide');
                        bootbox.alert("Interest for Support registered, you will be notified shortly!", function(){ 
                            jQuery("#frm2")[0].reset();
                            window.location.reload(true);
                        });
                    }
                });
            }else{
                jQuery('#btn-submit-support').css('display', '');
                jQuery('#btn-submit-loader-support').css('display', 'none');
            }
        });

        function openPopup(service_id,category_id,request_id, userId){
            jQuery('#changeStatus').modal('show');
            jQuery('#service_id3').val(service_id);
            jQuery('#cat_id').val(category_id);
            jQuery('#req_id').val(request_id);
        }

        jQuery('#btn-submit-loader').css('display', 'none');
        jQuery('#btn-submit').on('click', function() {
            jQuery('#btn-submit').css('display', 'none');
            jQuery('#btn-submit-loader').css('display', '');
            var validation_flag = '1';

            var name = document.getElementById("name").value;
            if (name === '') {
                jQuery("#error-name").html("<span id='error-name' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-name").html("<span id='error-name' style=''>" + "</span>");
            }

            var email = document.getElementById("email").value;
            if (email == '') {
                jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
            }

            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (email.match(mailformat)) {
                jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
            } else {
                if (email != '') {
                    jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                    var validation_flag = '0';
                }
            }

            var supportDetails = document.getElementById("supportDetails").value;
            if (supportDetails === '') {
                jQuery("#error-supportDetails").html("<span id='error-supportDetails' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-supportDetails").html("<span id='error-supportDetails' style=''>" + "</span>");
            }

            var mobile_number = document.getElementById("phone_number").value;
            if (mobile_number == '') {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "This field is required.</span>");
                var validation_flag = '0';
            } else {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
            }

            var phoneformat = /^\d{10}$/;
            if (mobile_number.match(phoneformat)) {
                jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
            } else {
                if (mobile_number != '') {
                    jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                    var validation_flag = '0';
                }
            }

            jQuery("#name").keyup(function() {
                var name = document.getElementById("name").value;
                if (name != '') {
                    jQuery("#error-name").html("<span id='error-name' style=''>" + "</span>");
                } else {
                    var validation_flag = '0';
                }
            });

            jQuery("#email").keyup(function() {
                var email = document.getElementById("email").value;
                if (email == '') {
                    jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
                }

                var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                if (email.match(mailformat)) {
                    jQuery("#error-email").html("<span id='error-email' style=''>" + "</span>");
                } else {
                    if (email != '') {
                        jQuery("#error-email").html("<span id='error-email' style='color: red;'>" + "You have entered an invalid email address!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            jQuery("#phone_number").keyup(function() {
                var mobile_number = document.getElementById("phone_number").value;
                if (mobile_number == '') {
                    jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
                }

                var phoneformat = /^\d{10}$/;
                if (mobile_number.match(phoneformat)) {
                    jQuery("#error-mobile_number").html("<span id='error-mobile_number' style=''>" + "</span>");
                } else {
                    if (mobile_number != '') {
                        jQuery("#error-mobile_number").html("<span id='error-mobile_number' style='color: red;'>" + "You have entered an invalid mobile number!</span>");
                        var validation_flag = '0';
                    }
                }
            });

            jQuery("#supportDetails").keyup(function() {
                var supportDetails = document.getElementById("supportDetails").value;
                if (supportDetails === '') {
                    jQuery("#error-supportDetails").html("<span id='error-supportDetails' style='color: red;'>" + "This field is required.</span>");
                    var validation_flag = '0';
                } else {
                    jQuery("#error-supportDetails").html("<span id='error-supportDetails' style=''>" + "</span>");
                }
            });

            if (validation_flag == '1') {

                //jQuery( "#frmChangeStatus" ).submit();
                /* var service_id = jQuery('#service_id3').val();
                var category_id = jQuery('#cat_id').val();
                var request_id = jQuery('#req_id').val();
                var userId = jQuery('#userId').val();
                var name = jQuery('#name').val();
                var email = jQuery('#email').val();
                var phone_number = jQuery('#phone_number').val();
                var supportDetails = jQuery('#supportDetails').val(); */

                var form = $("#frmChangeStatus").closest("form");
                var formData = new FormData(form[0]);

                jQuery.ajax({
                    type: "POST",
                    url: '../changeservicestatus.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response)
                    {
                        jQuery('#btn-submit').css('display', '');
                        jQuery('#btn-submit-loader').css('display', 'none');
                        jQuery('#changeStatus').modal('hide');
                        bootbox.alert("Status change successfully.", function(){ 
                            window.location.reload(true);
                        });
                    }
                });
            }else{
                jQuery('#btn-submit').css('display', '');
                jQuery('#btn-submit-loader').css('display', 'none');
            }
        });
    </script>
</body>

</html>

<?php
get_footer();
