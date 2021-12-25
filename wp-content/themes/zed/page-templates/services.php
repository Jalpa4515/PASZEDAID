<?php
/**
 * Template Name: Services
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
global $wpdb;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpoceans">
    <title>Causes | Zed</title>
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
    <style>
        .btn{
            margin-bottom: 10px;
        }
        .bod {
            position: relative;
            text-align: center;
            color: white;
        }
        .top-left {
            position: absolute;
            top: 1px;
            left: 0;
            background-color: #3D3D8A;
            padding: 10px;
            color: #fff;
            border-bottom-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        .top-right {
            position: absolute;
            top: 1px;
            right: 0;
            background-color: #3D3D8A;
            padding: 8px;
            color: #fff;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        input#vehicle1 {
            width: 15px;
            height: 15px;
        }
        .cause-top {
            background: #ffffff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: 180px; /*change by : Jalpa | Change Date : 30 june 2021*/
        }
        .page-link.active {
            background-color: #3d3d8a;
            color: white;
        }
        .viewdetails{
            margin-right: 0 !important;
        }
        .cause-text ul li a {
            margin-right: 0 !important;   
        }
        .container1 {
            margin-top: 10px !important;
        }
        .container1 img{
            margin-right: 10px !important;
        }
        .licause {
        margin-top: 9px;
        }
        @media (max-width: 991px) {
            .tp-blog-sidebar {
                margin-left: 15px;
                margin-right: 15px;
            }
        }
        .cause-text h3 {
            margin-top: 0px !important;
            padding-top: 22px !important;
        }
        .serach {
    margin-right: 20px;
    display: inline-flex;
    width: 64%;
    height: 54px;
    padding: 7px 18px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #fff;
    margin-bottom: 20px;
    margin-left: 28px;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
    border-radius: 10px;
}
        @media (max-width: 767px){
            .serach {
            width: 89% !important;
        }
        }
    </style>
</head>
<body>
    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader1" style="display: none;">
        <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
        </div>
        <!-- end preloader -->
        <!-- .tp-breadcumb-area start -->
        <div class="tp-breadcumb-area tp-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcumb-wrap">
                            <h2>Browse Services</h2>
                        </div>
                        <!-- .tp-counter-area start -->
                        <div class="tp-counter-area causeslistcounter">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php
                                        $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}services WHERE status = 1 AND admin_approved = 1 AND is_draft = 0 ORDER BY id DESC", ARRAY_A);

                                        $resultsdonaccxcam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_request_data as rd LEFT JOIN wp_services as s ON rd.service_id = s.id WHERE s.status != 2", ARRAY_A);

                                        /* $resultsdonaccxcam = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND `status` = 1", ARRAY_A);
                                        $resultsdonaccx = $wpdb->get_results("SELECT sum(lives_count) as livecount FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
                                        $resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'tribe_events' AND post_status = 'publish'", ARRAY_A); */

                                        ///$resultsdonaccxcam = array();
                                        $resultsdonaccxe = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_change_status as rd LEFT JOIN wp_services as s ON rd.service_id = s.id WHERE s.status != 2", ARRAY_A);
                                        ?>
                                        <div class="tp-counter-grids">
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($resultsdonacc); ?>"><?= count($resultsdonacc); ?></span></h2>
                                                </div>
                                                <p>Total Services</p>
                                            </div>
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($resultsdonaccxcam); ?>"><?= count($resultsdonaccxcam); ?></span></h2>
                                                </div>
                                                <p>Total Request</p>
                                            </div>
                                            <div class="grid">
                                                <div>
                                                    <h2><span class="odometer" data-count="<?= count($resultsdonaccxe); ?>"><?= count($resultsdonaccxe); ?></span></h2>
                                                </div>
                                                <p>Total Close Request</p>
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
                        <!-- .tp-counter-area end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- .tp-breadcumb-area end -->
        <!-- start tp-blog-single-section -->
        <section class="tp-blog-single-section section-pad" style="background: #eee;">
            <div class="container">
                <div class="row">
                    <?php
                    if (isset($_GET) && isset($_GET['c'])) {
                        $c = $_GET['c'];
                    } else {
                        $c = '';
                    }
                    if (isset($_GET) && isset($_GET['type'])) {
                        $type = $_GET['type'];
                    } else {
                        $type = '';
                    }
                    ?>
                    <div class="row">
                        <div class="widget search-widget ">
                            <form class="mapbyname" id="mapbyname" action="">
                                <div class="flexclass">
                                    <input type="hidden" name="type" value="<?= $type; ?>">
                                    <input type="text" name="c" value="<?= $c; ?>" class="form-control serach" placeholder="Search For Services"/>
                                    <button class="btns btn" style="outline: none;
    box-shadow: none;" id="searchbtn" type="submit"><i class="ti-search icons"></i></button>
                                    <ul class="register-now">
                                        <li class="licause">
                                            <a href="<?= BASE_URL?>register-for-service/" class="dbtn " style="color:#fff;font-size: 18px;">Register Service
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div class="col col-md-12 col-sm-6 col-12">
                            <?php
                            $limit = 9;  
                            if (isset($_GET["pg"])) {
                                $page  = $_GET["pg"]; 
                            } 
                            else{ 
                                $page=1;
                            };  
                            $start_from = ($page-1) * $limit;
                            if (!empty($c)) {
                                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}services WHERE service_name LIKE '%" . $c . "%' AND admin_approved = 1 AND is_draft = 0 AND status = 1 order by id DESC LIMIT $start_from, $limit", OBJECT);
                                $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}services WHERE service_name LIKE '%" . $c . "%' AND admin_approved = 1 AND is_draft = 0 order by id DESC", OBJECT);
                            } else {
                                $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}services WHERE admin_approved = 1 AND is_draft = 0 AND status = 1 order by id DESC LIMIT $start_from, $limit", OBJECT);
                                $campaigns = $wpdb->get_results("SELECT id FROM {$wpdb->prefix}services WHERE admin_approved = 1 AND is_draft = 0 order by id DESC", OBJECT); 
                            }
                            $total_records = count($campaigns);  
                            $total_pages = ceil($total_records / $limit); 
                            if ($results) {
                                foreach ($results as $res) {
                                    //$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res->id;
                                    $shareurl = "javascript:void(0)";
                                    //$donationurl = BASE_URL . 'donation/?id=' . $res->id;
                                    $donationurl = BASE_URL . "service-list/?slug=" . $res->id;
                                    $btntext = 'View Details';
                                    
                                    $date1 = strtotime(date("Y-m-d"));
                                    $date2 = strtotime(date("Y-m-d", strtotime($res->end_date)));
                                    // Use comparison operator to 
                                    // compare dates
                                    if ($date1 > $date2) {
                                        $btn = 1;
                                        $btntext = 'Closed';
                                        $donationurl = $shareurl;
                                        $viewclass = 'viewdetails';
                                    } else {
                                        $btn = 1;
                                        $btntext = $btntext;
                                        $donationurl = $donationurl;
                                        $viewclass = '';
                                    }
                                    $fundtitle = $res->service_name;
                                    
                                    $goal_amount = '1000';
                                    $currency = 'Qty';
                                    
                                    $iimage = BASE_URL . 'wp-content/uploads/services/' . $res->banner;
                                    
                                    $userId = $res->userId;
                                    $user_name = '';
                                    $user = get_user_by('ID', $userId);
                                    if ( ! empty( $user ) ) {
                                        $user_name = $user->display_name;
                                    }
                                    
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="cause-item">
                                            <div class="cause-top">
                                                <div class="bod" onclick="window.location.href='<?= $shareurl; ?>'">
                                                    <img src="<?php echo $iimage; ?>" alt="" width="100%">
                                                    <?php
                                                            $zed_verified = '';
                                                            if ($res->zed_verified) {
                                                                ?>
                                                        <div class="top-left">ZED Verified</div>
                                                    <?php
                                                            }
                                                            ?>
                                                         <?php
                                                          
                                                          if (($res->service_status)== 'private') {
                                                              ?>  
                                                                <div class="top-right">Private</div>
                                                        <?php
                                                            }?>
                                                </div>
                                            </div>
                                            <div class="cause-text">
                                                <h3 class="cp-name"><a href="<?php echo $shareurl; ?>"><?php echo $fundtitle; ?></a>
                                                
                                            
                                            </h3>
                                               
                                                <div class="container1" style="    overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                    <img src="<?php echo bloginfo('template_directory'); ?>/images/user.png" width="30">
                                                    <?php if($user_name == 'admin'){?>
                                                        <span>by ZedAid</span>
                                                    <?php } else {?>
                                                        <span>by <?= $user_name; ?></span>
                                                    <?php } ?> 
                                                </div>
                                                <?php
                                                        if ($btn == 1) {
                                                            ?>
                                                    <ul>
                                                        <li class="licause"><a href="<?= $donationurl; ?>" class="dbtn <?= $viewclass; ?>"><?= $btntext; ?></a></li>
                                                    </ul>
                                                <?php
                                                }
                                                $now = strtotime(date("Y-m-d")); //time(); // or your date as well
                                                $your_date = strtotime($res->end_date);
                                                $datediff = $your_date - $now;
                                                $daysleft = round($datediff / (60 * 60 * 24)+1);
                                                if ($res->end_date != '0000-00-00') {
                                                    if ($daysleft > 0) {
                                                        $daysleft = $daysleft;
                                                    } else {
                                                        $daysleft = 0;
                                                    }
                                                } else {
                                                    $daysleft = 0;
                                                }
                                                ?>                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php } 
                                    $pagLink = "<div class='col-lg-12 col-md-12 col-sm-12 col-12'><ul class='pagination'>";  
                                    for ($i=1; $i<=$total_pages; $i++) {
                                        $active = '';
                                        if($i == $page){
                                            $active = "active";
                                        }
                                        if ($type) {
                                            $pagLink .= "<li class='page-item'><a class='page-link $active' href='".BASE_URL."services/?pg=".$i."&type=".$type."'>".$i."</a></li>";	
                                        }else{
                                            $pagLink .= "<li class='page-item'><a class='page-link $active' href='".BASE_URL."services/?pg=".$i."'>".$i."</a></li>";
                                        }
                                    }
                                    echo $pagLink . "</ul></div>"; 
                                 } else {
                                    ?>
                                <p class="text-center" style="color:black;margin:10%">No service found.</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </div> <!-- end container -->
    </section>
    <!-- end tp-blog-single-section -->
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
    <!-- All JavaScript files
    ================================================== -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
    <!-- Plugins for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
    <script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
    <!-- Custom script for this template -->
    <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
    <script>
    $(document).ready(function() {
        $('input').keyup(function(event) {
            if (event.which === 13)
            {
                event.preventDefault();
                $('#mapbyname').submit();
            }
        });
        $('.cat_type').click(function(){
            var arr = [];
            $.each($("input[name='cattype']:checked"), function(){
                arr.push($(this).val());
            });
            var id = arr.join(",");
            var url = '<?= BASE_URL . 'services/?type=' ?>'+id;
            window.location.href=url;
        });
    });
    </script>
</body>
</html>
<?php
get_footer();
?>