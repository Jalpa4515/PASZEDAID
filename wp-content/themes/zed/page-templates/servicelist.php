<?php
/**
 * Template Name: service list map view
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
error_reporting(0);
get_header();
global $wpdb;
$userId = get_current_user_id();
$service_id = $_GET['slug'];
$services =  $wpdb->get_row("SELECT * FROM wp_services WHERE id = '".$service_id."'");
$service_name = $services->service_name;
$description = $services->description;
$banner = BASE_URL."/wp-content/uploads/services/".$services->banner;

$user = wp_get_current_user();
$userId = $user->data->ID;
$useremail =  $user->user_email;

$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");

$showmarker = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE  email = '".$useremail."' AND service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);
if((($services->service_status)=='private'))  {                                      
if(($userId == $services->userId) || ($userId == 1)) {
    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
    $requests = (array) $requests;
}elseif(($showmarker != 0)){ 
    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE email = '".$useremail."' AND service_id = '".$service_id."'", ARRAY_A);
    $requests = (array) $requests;
}
else{
    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
    $requests = (array) $requests;
    }
}else{

    $requests = $wpdb->get_results("SELECT * FROM wp_service_request_data WHERE service_id = '".$service_id."'", ARRAY_A);
    $requests = (array) $requests;  
}

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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>
    <style>


@media screen and (min-width:768px) {
.tp-counter-grids {
        display: inline-flex;
    background: rgb(0 0 0 / 22%);
    padding: 0px 100px;
}

.grid {
    padding: 15px 20px;
}

.grid h2 {
    font-size: 70px;
    font-weight: 600;
}

.grid p {
    color: #fff;
    font-weight: 500;
    font-size: 20px;
}
}
.btn2 {
        min-width: 105px;
        height: 40px;
        margin: 0;
        padding: 0 20px;
        vertical-align: middle;
        border: 0;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 300;
        line-height: 40px;
        color: #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        text-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        -o-transition: all .3s;
        -moz-transition: all .3s;
        -webkit-transition: all .3s;
        -ms-transition: all .3s;
        transition: all .3s;
    }
    .btn1 {
      
        margin: 0;
        padding: 0 5px;
        vertical-align: middle;
        border: 0;
        font-family: 'Roboto', sans-serif;
        font-size: 12px;
        font-weight: 300;
        line-height: 18px;
        color: #fff;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        text-shadow: none;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        -o-transition: all .3s;
        -moz-transition: all .3s;
        -webkit-transition: all .3s;
        -ms-transition: all .3s;
        transition: all .3s;
    }
.btn-next {
        background: #3d3d8a;
    }
        input#vehicle1 {
            width: 15px;
            height: 15px;
        }
        .gm-style-iw-d {
            max-width: 381px !important;
            width: 380px !important;
            max-height: 385px !important;
        }
        .gm-style .gm-style-iw-c{
            max-height: 385px !important;
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
        background:rgb(0 0 0 / 8%);
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
        .pac-container {
            z-index: 10000 !important;
        }
        div.pac-container {
            z-index: 99999999999 !important;
        }
        .pac-logo::after{
            z-index: 99999999999 !important;
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
                            <?php
                                        $requestcount1 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);

                                        $requestcount2 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_support_data WHERE service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);

                                        /* $resultsdonaccxcam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND `status` = 1", ARRAY_A);
                                        $resultsdonaccx = $wpdb->get_results("SELECT sum(lives_count) as livecount FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
                                        $resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish'", ARRAY_A); */

                                        ///$resultsdonaccxcam = array();
                                        $requestcount3 = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE request_status ='3' and service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);
                                        ?>
                                        <div class="tp-counter-grids">
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($requestcount1); ?>"><?= count($requestcount1); ?></span></h2>
                                                </div>
                                                <p>Total Services</p>
                                            </div>
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($requestcount2); ?>"><?= count($requestcount2); ?></span></h2>
                                                </div>
                                                <p>Total Supports</p>
                                            </div>
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($requestcount3); ?>"><?= count($requestcount3); ?></span></h2>
                                                </div>
                                                <p>Total Close Services</p>
                                            </div>
                                            <!--<div class="grid">-->
                                            <!--    <div>-->
                                            <!--        <h2><span class="odometer" data-count="<?= count($resultsdonaccxe); ?>"><?= count($resultsdonaccxe); ?></span></h2>-->
                                            <!--    </div>-->
                                            <!--    <p>ZED EVENTS</p>-->
                                            <!--</div>-->
                                        </div>
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
                        <form>
                            <div>
                                <input type="text" class="form-control serach locationtextbox icon-input" placeholder="Enter address here"  name="location" id="location">
                                <button class="btns btn" style="outline: none; box-shadow: none;" id="searchbtn" type="submit"><i class="ti-search icons"></i></button>
                                <!--<input type="text" name="c" value="" class="form-control serach locationtextbox icon-input" placeholder="Search For Services">-->
                                <!--<a><i class='fa fa-times-circle fa-2x times-icon' aria-hidden='true'></i></a>-->
                            </div>
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
                                    <li class="bor"><a href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check" name="camp_type[]" class="cat" value="<?= $val->category_id;?>"></a><img src="<?= $icon_name ?>" width="20" height="20" style="margin-right: 2% !important; color: #777 !important;"/><?= $val->name;?>
                                    <a class="add-icon" href="javascript:void(0)" onclick="openAddCollectionsPopup('<?= $service_id; ?>','<?= $val->category_id; ?>','<?= $userId; ?>')"> <img src="<?= BASE_URL?>wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a>
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
                            <div class="widget category-widget" id="service_status">

                                <label style="font-size: 18px;"><b>Legends</b></label>

                                
                                <input type="hidden" name="service_id" id="1service_id" value="<?= $service_id; ?>">
                                <input type="hidden" name="user_email" id="1user_email" value="<?= $useremail; ?>">
                                <input type="hidden" name="user_id" id="1user_id" value="<?= $userId; ?>">

                                <div class="row">
                                    <div class="col-md-12 line_spacing_top_15">
                                        <a href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="1" class="service_status"></a>

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
                                        <a href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="2" class="service_status"></a>

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
                                    <a href="javascript:void(0)" style="display: inline;"><input type="checkbox" id="fundraiser_check_service" name="service_status[]" value="3" class="service_status"></a>

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
                        <ul class="register-now1" style="border-bottom-right-radius: 10px;background-color:#3d3d8a !important;" >
                            <li  style="margin-top:3px">
                                <a href="<?= BASE_URL ?>/service-list/?slug=<?= $service_id?>" class=" " style="color:#fff;">Map</a>
                            </li>
                        </ul>
                        <ul class="register-now1" style="background-color:#fff !important;border-top-left-radius: 10px;" >
                            <li  style="margin-top:3px;">
                                <a href="<?= BASE_URL ?>/service-grid/?slug=<?= $service_id?>" class=" " style="color:#3d3d8a">List</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <input type="hidden" value="" name="latitude" id="latitude">
                        <input type="hidden" value="" name="longitude" id="longitude">
                        <!-- <div class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen=""></iframe>
                        </div> -->
                        <div class="contact-map" id="mapholder2" style="width: 100%;  height: 500px;border-radius: 10px;"></div>
                        <p id="errorMap" class="d-none"></p>
                        <p id="errorMapCode" class="d-none"></p>
                    </div>
                    <?php
                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
                    $results = (array) $results;
                    ?>
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
                            function initMap() {
                                var existingAddLat = $("#latitude").val();
                                var existingAddLng = $("#longitude").val();
                                var mapCenter = new google.maps.LatLng(existingAddLat, existingAddLng);
                                setMap(mapCenter);
                                var geocoder = new google.maps.Geocoder();
                                var autocomplete = new google.maps.places.Autocomplete($("#location")[0], {});
                                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                    var place = autocomplete.getPlace();
                                    var address = place.formatted_address;
                                    geocoder.geocode({
                                        'address': address
                                    }, function(results, status) {
                                        if (status == google.maps.GeocoderStatus.OK) {
                                            var latitude = results[0].geometry.location.lat();
                                            var longitude = results[0].geometry.location.lng();
                                            $("#latitude").val(latitude);
                                            $("#longitude").val(longitude);
                                            console.log(latitude + "==" + longitude);
                                            var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                            setMap(mapCenter, latitude, longitude, '', 'search');
                                        }
                                    });
                                });
                            }
                            function displayLocation(position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };
                                $("#latitude").val(position.coords.latitude);
                                $("#longitude").val(position.coords.longitude);
                                var mapCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                                setMap(mapCenter);
                                var geocoder = geocoder = new google.maps.Geocoder();
                                geocoder.geocode({
                                    'latLng': mapCenter
                                }, function(results, status) {
                                    if (status == google.maps.GeocoderStatus.OK) {
                                        if (results[1]) {
                                            $("#location").val(results[1].formatted_address);
                                        }
                                    }
                                });
                            }
                            function displayError(error) {
                                $("#errorMap").removeClass("d-none");
                                var x = document.getElementById("errorMap");
                                var y = document.getElementById("errorMapCode");
                                y.innerHTML = error.code;
                                switch (error.code) {
                                    case error.PERMISSION_DENIED:
                                        x.innerHTML = "" //User denied the request for Geolocation.
                                        break;
                                    case error.POSITION_UNAVAILABLE:
                                        x.innerHTML = "Sorry, we could not detect your location. Please select a area by typing in the search box above."
                                        break;
                                    case error.TIMEOUT:
                                        x.innerHTML = "" //The request to get user location timed out.
                                        break;
                                    case error.UNKNOWN_ERROR:
                                        x.innerHTML = "" //An unknown error occurred.
                                        break;
                                }
                            }
                            function setMap(mapCenter, latitude = 0, longitude = 0, locations = '', search = '') {
                                $("#errorMap").addClass("d-none");
                                $("#mapholder2").removeClass("d-none");
                                var locationvv = $("#location").val();
                                if (search) {
                                    $("#latitude").val(latitude);
                                    $("#longitude").val(longitude);
                                    var zoomv = 10;
                                } else {
                                    $("#latitude").val('20.5937');
                                    $("#longitude").val('78.9629');
                                    var zoomv = 4;
                                }
                                var latitudec = $("#latitude").val();
                                var longitudec = $("#longitude").val();
                                var selectedTypes = [];
                                if ($('#fundraiser_check').is(':checked')) {
                                     console.log("fundraiser_check == " + $("#fundraiser_check").val());
                                   selectedTypes.push($('#fundraiser_check').val());
                                }
                                if ($('#material_check').is(':checked')) {
                                    selectedTypes.push($('#material_check').val());
                                }
                                if ($('#charity_check').is(':checked')) {
                                    selectedTypes.push($('#charity_check').val());
                                }
                                var locations = [
                                    <?php
                                    foreach ($requests as $res) {
                                        $fundtitle = $res['name'];
                                        $emailAddress = $res['email'];
                                        $mobile_number = $res['mobile_number'];
                                        $address = $res['address'];
                                        $description1 = $res['description'];
                                        $zed_verified = $res['zed_verified'];
                                      // $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];
                                        $goal_amount = '0';
                                        $currency = 'QTY';
                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                        $achieve_amount = 80000;
                                        $percn = 100;
                                        if ($zed_verified == '1') {
                                            $zed_verified = '<b class="top-left">Verified</b>';
                                        }else{
                                            $zed_verified = '';
                                        }
                                        $date1 = strtotime(date("Y-m-d"));
                                        $date2 = strtotime(date("Y-m-d", strtotime($res['end_date'])));
                                        /* if ($date1 > $date2) {
                                            $cstatus = "inactive";
                                            $btn = 'no';
                                        }else{
                                            $cstatus = "active";
                                        } */
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
                                            $icon_name = BASE_URL.'/wp-content/uploads/2021/08/request_open.png';
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

                                        $support_required = $wpdb->get_row("SELECT * FROM wp_service_category_relation WHERE service_id = '".$service_id."' AND category_id = '".$category_id."' AND is_support_required = '1'");

                                        $support_fields = $wpdb->get_row("SELECT * FROM wp_support_fields WHERE service_id = '".$service_id."' AND category_id = '".$category_id."'");
                                        $support_fields_json = $support_fields->support_fields;
                                        $support_arr = json_decode($support_fields_json, true);
                                        $req1 = '';
                                        foreach($support_arr as $r1){
                                            $table_field_name = $supports[$r1['table_field_name']];
                                            $req1 .= ''.$r1['display_name'].':<b>'.$table_field_name.'</b><br/>';
                                        }

                                        $supp = '';
                                        if(!empty($supports)){
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
                                                $supp .= '<br> Supporter Info:<br> Name: <b>'.$supports['name'] .'</b> <br> Email: <b> '.$result_email.'</b> <br> Mobile Number: <b>'.$result_contact.'</b>'.$supportButton. '<br> Address: <b>'.$result_address.'</b> <br> '.$req1.'<br>';
                                            }

                                           }else{
                                            if (empty($changeStatus)) {
                                                if (!empty($support_required)) {
                                                    $supp .= '<br><a class="btn btn-next" style="background-color: #3d3d8a; color: white; margin-left: 0px;" onclick="openPopupSupportThem('.$service_id.','.$category_id.','.$request_id.');">Support Them</a>';
                                                }
                                            }
                                        }

                                        if (empty($changeStatus)) {
                                            if ((!empty($support_required)) && (($userId == $res['userId']) && $userId != 0) || ($emailid == $emailAddress) ||($userId == '1')) {
                                                $chnageStatusBtn = '<a type="button" class="btn btn-next" style="margin-top: 10px;margin-bottom: 10px;background-color: #3d3d8a; color: white; margin-left: 0px;" onclick="openPopup('.$service_id.','.$category_id.','.$request_id.','.$userId.');">Close Request</a>';
                                        }else{
                                            $chnageStatusBtn='';
                                        }
                                        }else{
                                            if(!empty($iconpin)){
                                                $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon3;
                                            }else{
                                                $icon_name = BASE_URL."/wp-content/uploads/2021/07/inactive-1.png";
                                            }
                                            $chnageStatusBtn = 'Change Status Info:<br> Name: <b>'.$changeStatus['name'] .'</b> <br> Email: <b> '.$changeStatus['email'].'</b> <br> Mobile Number: <b>'.$changeStatus['mobile_number'].'</b> <br> Support Details: <b>'.$changeStatus['supportDetails'].'</b><br>';
                                        }

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><a style="text-decoration: none;color:#282828 !important;"><div class="/ccc/" style="text-align: center;"></div><br><div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;margin-left: 5%;"><?php echo $fundtitle; ?> <br>Mobile Number: <b><?= $mobile_number;?></b> <br> Address: <b><?= $address; ?></b><br> Description: <b><?= $description1; ?></b><br> <?= $req; ?> <?= $supp; ?> <br> <?= $chnageStatusBtn; ?> </div><div class="" style="margin: 10px 0 0 0;text-align:center;color: <?= $closedc; ?>;"><b style="font-weight: 500;text-align:center"><?= $closed; ?></b></div><div class="" style="margin: 10px 0 0 0;margin-left: 5%;text-align:center"><b ><?= $zed_verified; ?></b></div></a></div>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, 1, 12, '<?php echo $cstatus; ?>','<?= $icon_name; ?>'],
                                    <?php } ?>
                                ];
                                // console.log('latitudec');
                                // console.log(latitudec);
                                // console.log(longitudec);
                                // console.log('longitudec');
                                console.log(locations);
                                var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                    zoom: zoomv,
                                    center: new google.maps.LatLng(latitudec, longitudec),
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                });
                                var infowindow = new google.maps.InfoWindow();
                                var markers = new Array();
                                var marker, i;
                                for (i = 0; i < locations.length; i++) {
                                    var shouldInclude = false;
                                    if(selectedTypes.length > 0) {
                                        shouldInclude = selectedTypes.includes(locations[i][3].toString());        
                                    } else {
                                        shouldInclude = true;
                                    }
                                    if(shouldInclude) {
                                        if (locations[i][3] == 1) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: locations[i][6],
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/inactive-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }
                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                        markers.push(marker);

                                        <?php
                                      
                                      $showmarker = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE email = '".$useremail."' AND service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);
                                     
                                    
                                        if((($services->service_status)=='private')) {
                                        if(($userId==$services->userId) || ($userId== 1)){ ?>
                                        markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }elseif(($showmarker != 0)){ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(false);  
                                        });
                                            <?php } ?>

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }?>
                                    }
                                }
                            }
                            // initMap();
                            if ($("#locationChecked").prop('checked') == true) {
                                $(".loc-input").addClass("required");
                                // $.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {
                                //     console.log("data: " + data);
                                $("#latitude").val('20.5937');
                                $("#longitude").val('78.9629');
                                console.log("aa");
                                initMap();
                                console.log("bb");
                                $(".locationtextbox").removeClass("d-none");
                                // });
                            } else {
                                $(".loc-input").removeClass("required");
                                $(".locationtextbox").addClass("d-none");
                            }
                            $("#locationChecked").click(function() {
                                if ($(this).is(":checked")) {
                                    $(".loc-input").addClass("required");
                                    $(".locationtextbox").removeClass("d-none");
                                    var errorMapCode = $('#errorMapCode').html();
                                    if (errorMapCode <= 0) {
                                        console.log("1");
                                        initMap();
                                        console.log("2");
                                    }
                                    var location = $('#location').val();
                                    if (location != '') {
                                        $("#mapholder2").removeClass("d-none");
                                    } else {
                                        $("#location-error").removeClass("d-none");
                                    }
                                } else {
                                    $(".loc-input").removeClass("required");
                                    $("#mapholder2").addClass("d-none");
                                    $(".locationtextbox").addClass("d-none");
                                    $("#location-error").addClass("d-none");
                                }
                            });
                            //Location
                        });
                        

                        $(".cat").click(function () {
                            var type="category";
                            //console.log(rid);
                            var service_id = $('#1service_id').val();
                            var user_id = $('#1user_id').val();
                            var user_email = $('#1user_email').val();
                            var selected = new Array();
                            $("#cat input[type=checkbox]:checked").each(function () {
                                selected.push(this.value);
                            });
                                     
                            console.log(selected.join(","));            
                       
                            $.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'servicefiltermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: selected.join(","),
                                    service_id: service_id,
                                    user_id: user_id,
                                    user_email: user_email,
                                    type: type
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {
                                    $("#errorMap").addClass("d-none");
                                    $("#mapholder2").removeClass("d-none");
                                    var latitudec = $("#latitude").val();
                                    var longitudec = $("#longitude").val();
                                    var locations = data;
                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    var infowindow = new google.maps.InfoWindow();
                                    var marker, i;
                                    var markers = new Array();
                                    for (i = 0; i < locations.length; i++) {
                                        if (locations[i][3] == 1) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: locations[i][6],
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-11-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-7-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-9-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/06/marker_charity-2.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-10-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }
                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                        markers.push(marker);
                                       
                                        <?php
                                      $curr_user = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE ID = '.$userId.'",OBJECT);
                                      $curruser_email = $curr_user->user_email;
                                      $showmarker = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data WHERE email = ".$curruser_email."' AND service_id ='".$service_id."'  ORDER BY id DESC", ARRAY_A);
                                       
                                     echo $curruser_email;
                                        if((($services->service_status)=='private')) {
                                        if(($userId==$services->userId) || ($userId== 1)){ ?>
                                        
                                        markers.forEach(element => {
                                            element.setVisible(true);  
                                        });

                                        <?php } elseif (($showmarker != null)){ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(false);  
                                        });
                                            <?php } ?>

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }?>
                                        
                                    }
                                }
                            });
                        });
                      
                        //function camptypeid(rid,service_id,type) {
                        $(".service_status").click(function () {
                            var type="status";
                            //console.log(rid);
                            var service_id = $('#1service_id').val();
                            var user_id = $('#1user_id').val();
                            var user_email = $('#1user_email').val();
                            var selected = new Array();
                            $("#service_status input[type=checkbox]:checked").each(function () {
                                selected.push(this.value);
                            });
                            console.log(selected.join(","));            
                            
                            $.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'servicefiltermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: selected.join(","),
                                    service_id: service_id,
                                    user_id: user_id,
                                    user_email: user_email,
                                    type: type
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {
                                    $("#errorMap").addClass("d-none");
                                    $("#mapholder2").removeClass("d-none");
                                    var latitudec = $("#latitude").val();
                                    var longitudec = $("#longitude").val();
                                    var locations = data;
                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    var infowindow = new google.maps.InfoWindow();
                                    var marker, i;
                                    var markers = new Array();
                                    for (i = 0; i < locations.length; i++) {
                                        if (locations[i][3] == 1) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: locations[i][6],
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-11-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-7-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-9-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/06/marker_charity-2.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-10-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }
                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                        markers.push(marker);
                                        <?php if((($services->service_status)=='private')) {
                                            if(($userId==$services->userId) || ($userId== 1)){ ?>
                                        
                                        markers.forEach(element => {
                                            element.setVisible(true);  
                                        });

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(false);  
                                        });
                                            <?php } ?>

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }?>

                                    }
                                }
                            });
                        });

                        function camptypeid(rid,service_id,user_email) {
                            console.log(rid);
                            console.log(user_email);
                            var selected = new Array();
                            if ($('#fundraiser_check').is(':checked')) {
                                selected.push($('#fundraiser_check').val());
                            }
                            if ($('#material_check').is(':checked')) {
                                selected.push($('#material_check').val());
                            }
                            if ($('#charity_check').is(':checked')) {
                                selected.push($('#charity_check').val());
                            }
                            $.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'servicefiltermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: selected.join(","),
                                    service_id: service_id,
                                    user_email: user_email
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {
                                    $("#errorMap").addClass("d-none");
                                    $("#mapholder2").removeClass("d-none");
                                    var latitudec = $("#latitude").val();
                                    var longitudec = $("#longitude").val();
                                    var locations = data;
                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });
                                    var infowindow = new google.maps.InfoWindow();
                                    var marker, i;
                                    var markers = new Array();
                                    for (i = 0; i < locations.length; i++) {
                                        if (locations[i][3] == 1) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: locations[i][6],
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-11-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-7-–-1.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-9-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][5] == 'active') {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/06/marker_charity-2.png',
                                                    map: map
                                                });
                                            }else{
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: '<?= BASE_URL ?>/wp-content/uploads/2021/07/Component-10-–-1.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|ddd',
                                                map: map
                                            });
                                        }
                                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                            return function() {
                                                infowindow.setContent(locations[i][0]);
                                                infowindow.open(map, marker);
                                            }
                                        })(marker, i));
                                        markers.push(marker);
                                        <?php if((($services->service_status)=='private')) {
                                            if(($userId==$services->userId) || ($userId== 1)){ ?>
                                        
                                        markers.forEach(element => {
                                            element.setVisible(true);  
                                        });

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(false);  
                                        });
                                            <?php } ?>

                                        <?php }else{ ?>
                                            markers.forEach(element => {
                                            element.setVisible(true);  
                                        });
                                        <?php }?>


                                    }
                                }
                            });
                        }
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
                        <input type="hidden" value="<?= $service_id; ?>" name="service_id" id="service_id"/>
                        
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
                            <div class="form-group valid">
                                <label class="lbform">Description</label>
                                <input type="text" id="description1" name="description" placeholder="Enter Description" maxlength="500" class="form-control">
                                <span id="error-description1"></span>
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
                    <h4 class="modal-title text-center" id="support_them_title" style="color:white;">Support Them</h4>
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
                            <div class="form-group valid">
                                <label class="lbform">Description</label>
                                <input type="text" id="description2" value="" name="description2" placeholder="Enter Description" maxlength="500" class="form-control">
                                <span id="error-description2"></span>
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
   <!---Support COntact --->
    <div class="modal fade" id="supportContact" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" onclick="formreset()">&times;</button>
                        <h4 class="modal-title text-center" id="change_status">Contact Supporter</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmsupportContact" action="<?php echo BASE_URL ?>contactservice_supporter.php" enctype="multipart/form-data" method="post" class="f1">
                        <input type="hidden" value="" name="userId" id="userId" />
                        <input type="hidden" value="" name="request_id" id="request_id"/>
                        <input type="hidden" value="" name="service_id" id="service_id"/>
                        <br>
                            <div class="mainvalid">
                                <div class="form-group valid">
                                    <label class="lbform">Name</label>
                                    <input type="text" id="fname" value="" name="fname" placeholder="Enter Name" maxlength="50" class="form-control">
                                    <span id="error-name"></span> 
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Email</label>
                                    <input type="text" id="femail" value="" name="femail" placeholder="Enter Email" maxlength="100" class="form-control">
                                    <span id="error-email"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Phone Number</label>
                                    <input type="text" id="fphone_number" value="" name="fphone_number" placeholder="Enter Phone Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="10" maxlength="10" class="form-control">
                                    <span id="error-mobile_number"></span>
                                </div>
                                <div class="form-group valid">
                                    <label class="lbform">Reason for help</label>
                                    <textarea id="fsupportDetails" name="fsupportDetails" class="form-control"></textarea>
                                    <span id="error-supportDetails"></span>
                                </div>
                            </div>
                            <div class="f1-buttons">
                                <button type="button" id="btn-submit-supporthelp" class="btn2 btn-next">Submit</button>
                               
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



function openSupportContact(request_id, userId , service_id){
       
       jQuery('#supportContact').modal('show');
       jQuery('#request_id').val(request_id);
       jQuery('#service_id').val(service_id);
   }
   
   jQuery('#btn-submit-supporthelp').on('click', function() {
		
        var name = $("#fname").val();
    
        var email = $("#femail").val();
    
        var supportDetails = $("#fsupportDetails").val();
       
        var mobile_number = $("#fphone_number").val();
       
        var request_id = $("#request_id").val();
        var service_id = $("#service_id").val();

        var userId = $("#userId").val();
        
       


            jQuery.ajax({
                type: "POST",
                url: '../contactservice_supporter.php',
                data: 'service_id='+service_id+'request_id='+request_id+'&supportDetails='+supportDetails+'&name='+name+'&email='+email+'&mobile_number='+mobile_number+'&userId='+userId,
                success: function(response)
                {
                    console.log(name);
                    console.log(email);
                    console.log(supportDetails);
                    console.log(mobile_number);
                    console.log(service_id);
                    console.log(request_id);
                    console.log(userId);

                // window.location.href='../contactservice_supporter.php';

                    jQuery('#btn-submit-supporthelp').css('display', '');
                    jQuery('#btn-submit-loader-supporthelp').css('display', 'none');
                    jQuery('#changeStatus').modal('hide');
                   bootbox.alert("Details send successfully.", function(){ 
                  window.location.reload(true);
                    // window.location.href='../contactsupporter.php';
                   });
                }
            });
        
    });




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
            //jQuery('#service_id').val(service_id);
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

        jQuery('#btn-submit-loader-support').css('display', 'none');
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