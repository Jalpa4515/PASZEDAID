<?php /* Template Name: Browse Fundraiser Detail Page */ ?>

<?php get_header(); ?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />

<?php
global $wpdb;

$result = explode('/', $_GET['id']);
$id = $result[0];

$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 AND id =" . $id, OBJECT);
$res = $results[0];

if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $loggeduserid = $user->ID;
} else {
    $loggeduserid = 0;
}
$userId = $res->userId;

$campaign_typeId = $res->campaign_typeId;
$resultsc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes WHERE id =" . $campaign_typeId, OBJECT);
$res = $results[0];
if ($res->image) {
    $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
} else {
    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
}
$shareurl = BASE_URL . 'fundraiser-detail/?id=' . $id;

if ($res->campaign_typeId == 2) {
    $fundtitle = $res->item_name;
} else if ($res->campaign_typeId == 3) {
    $fundtitle = $res->product_name;
} else {
    $fundtitle = $res->fundraiser_title;
}

if ($res->campaign_typeId == 2) {
    $goal_amount = $res->item_qty;
    $currency = 'QTY';
} else if ($res->campaign_typeId == 3) {
    $goal_amount = $res->product_price * $res->product_qty;
    $currency = $res->currency;
} else {
    $goal_amount = $res->goal_amount;
    $currency = $res->currency;
}

$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $id . ")", ARRAY_A);
$achieve_amount = 0;
foreach ($resultsdonacc as $tt) {
    if ($tt['campaign_typeId'] == 3) {
        $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
    } else {
        $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
    }
    $achieve_amount += $achieve_amountn;
}
// if ($achieve_amount >= $goal_amount) {
//     $btn = 'no';
// } else {
//     $btn = 'yes';
// }
// if ($res->campaign_typeId == 2) {
//     $achieve_amount = $achieve_amount;
// } else if ($res->campaign_typeId == 3) {
//     $achieve_amount = $achieve_amount;
// } else {
//     $achieve_amount = $res->achieve_amount;
// }
// echo $achieve_amount;
// echo '-';
// echo $goal_amount;
if (str_replace(',', '', $achieve_amount) >= str_replace(',', '', $goal_amount)) {
    $btn = 'no';
} else {
    $btn = 'yes';
}
// echo $btn;
// $achieve_amount = $res->achieve_amount;

$localIP = getHostByName(getHostName());
$resultsip = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigncount WHERE ipAddress = '" . $localIP . "' AND campaign_Id =" . $id, ARRAY_A);
if ($resultsip) { } else {
    $sql2 = $wpdb->prepare(
        "INSERT INTO `wp_campaigncount`
           (ipAddress, campaign_Id)
     values ('" . $localIP . "','" . $id . "')"
    );
    $wpdb->query($sql2);
}
?>
<style>
    .give-single-layout-style-2 .give_forms .entry-container .give-social-share-post .share-post-wrap .share-post-item {
        width: 50px !important;
        height: 50px !important;
    }

    .give-single-layout-style-2 .give_forms .give-single-heading .heading-background::after {
        background: transparent !important;
    }
</style>
<section class="fw-title-bar fw-main-row-custom fw-main-row-top fw-content-vertical-align-middle fw-section-image fw-section-default-page give_forms  parallax-section" data-stellar-background-ratio="0.5" style="background-color: rgb(234, 234, 235); background-position-x: 50%, 0%; background-position-y: 34.5px; background-repeat: no-repeat, repeat; background-attachment: scroll, scroll; background-image: url(&quot;//bearsthemes.com/themes/alone-foundation/wp-content/uploads/2018/04/Untitled-8.jpg&quot;), none; background-size: cover, auto; background-origin: padding-box, padding-box; background-clip: border-box, border-box;">
    <div class="container" style="padding-top: 200px;padding-bottom: 120px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="fw-heading fw-content-align-center">
                    <h1 class="fw-special-title"><?php echo $fundtitle; ?></h1>

                    <div class="breadcrumbs">
                        <span class="first-item">
                            <a href="<?php echo BASE_URL; ?>">Homepage</a>
                        </span>
                        <span class="separator"><span class="ion-ios-arrow-right"></span></span>
                        <span class="last-item"><?php echo $fundtitle; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .give-goal-progress {
        margin-bottom: 0px !important;
    }
</style>
<section class="bt-main-row bt-section-space sidebar-right" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Give">
    <div class="container">
        <div class="row">

            <div class="bt-content-area col-md-8 col-sm-8">
                <div class="bt-col-inner give-single-layout-style-2">

                    <div id="give-form-626-content" class="post-626 give_forms type-give_forms status-publish has-post-thumbnail give_forms_category-charity">

                        <?php
                        if ($res->image) { } else {
                            $style = "padding: 0 !important;";
                        }
                        ?>
                        <div class="give-single-heading" style="<?= $style; ?>">
                            <?php
                            if ($res->image) {
                                ?>
                                <div class="heading-background" style="background: url(<?php echo $iimage; ?>) center center;background-size: cover;"></div>
                            <?php
                            } else {
                                ?>
                                <iframe width="750" height="300" src="https://www.youtube.com/embed/<?= str_replace("https://www.youtube.com/watch?v=", "", $res->video); ?>">
                                </iframe>
                            <?php
                            }
                            ?>

                            <div class="give-progress-bar-wrap">
                                <?php
                                if ($id == 25) {
                                    ?>

                                    <div class="raised"><span class="income">16000</span> of <span class="goal-text">16000</span> raised</div>
                                <?php
                                } else if ($id == 24) {
                                    ?>

                                    <div class="raised"><span class="income">80000</span> of <span class="goal-text">80000</span> raised</div>
                                <?php
                                } else {
                                    ?>

                                    <div class="raised"><span class="income"><?php echo $achieve_amount ? $achieve_amount : 0; ?></span> of <span class="goal-text"><?php echo $goal_amount; ?></span> raised</div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="entry-container">
                            <div class="give-social-share-post">
                                <div class="share-post-wrap"><a class="share-post-item s-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $shareurl; ?>/" target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on Facebook"><span class="fa fa-facebook"></span></a><a class="share-post-item s-twitter" href="https://twitter.com/share?url=<?php echo $shareurl; ?>/&amp;text=<?php echo $fundtitle; ?>" target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on Twitter"><span class="fa fa-twitter"></span></a><a class="share-post-item s-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $shareurl; ?>/" target="_blank" data-toggle="tooltip" title="" data-share-post="" data-original-title="Share on LinkedIn"><span class="fa fa-linkedin"></span></a></div>
                            </div>
                            <div class="give-content-wrap">
                                <div class="title-heading">
                                    <div class="extra-meta">
                                        <div class="meta-item post-date"><span class="ion-ios-calendar-outline"></span> <?php echo date("d M Y", strtotime($res->created_at)); ?></div>
                                        <div class="meta-item form-category">Project In: <a style="color:{color}" href="javascript:void(0)"><?php echo $resultsc[0]->title; ?></a></div>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <div id="give-form-626-wrap" class="give-form-wrap give-display-reveal">
                                        <h2 class="give-form-title"><?php echo $fundtitle; ?></h2>
                                        <?php
                                        if ($res->zed_verified) {
                                            ?>
                                            <span style="font-size: 15px;color: #3E3E8D !important;"><b>ZED Verified</b></span>
                                        <?php } ?>
                                        <?php
                                        if ($id == 25) {
                                            $btn = 'no';
                                            ?>
                                            <div class="give-goal-progress">
                                                <div class="raised">
                                                    <span class="income" data-amounts="{&quot;USD&quot;: &quot;0&quot;}">16,000</span> of <span class="goal-text" data-amounts="{&quot;USD&quot;: <?php echo $goal_amount; ?>}">16,000</span> raised
                                                </div>
                                            </div>
                                        <?php
                                        } else if ($id == 24) {
                                            $btn = 'no';
                                            ?>
                                            <div class="give-goal-progress">
                                                <div class="raised">
                                                    <span class="income" data-amounts="{&quot;USD&quot;: &quot;0&quot;}">80,000</span> of <span class="goal-text" data-amounts="{&quot;USD&quot;: <?php echo $goal_amount; ?>}">80,000</span> raised
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                            ?>
                                            <div class="give-goal-progress">
                                                <div class="raised">
                                                    <span class="income" data-amounts="{&quot;USD&quot;: &quot;0&quot;}"><?php echo $achieve_amount; ?></span> of <span class="goal-text" data-amounts="{&quot;USD&quot;: <?php echo $goal_amount; ?>}"><?php echo $goal_amount; ?></span> raised
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <p><a target="_blank" href="https://maps.google.com/?q=<?= $res->address; ?>"><?= $res->address; ?></a></p>

                                        <div id="give-form-content-626" class="give-form-content-wrap give_pre_form-content">
                                            <?php
                                            echo html_entity_decode($res->short_description);
                                            ?>
                                        </div>
                                        <div id="give-form-626-2" class="give-form give-form-626 give-form-type-multi" action="<?php echo BASE_URL; ?>donations/playground-construction-funds-for-poor-children/?payment-mode=manual" data-id="626-2" data-currency_symbol="$" data-currency_code="USD" data-currency_position="before" data-thousands_separator="," data-decimal_separator="." data-number_decimals="0" method="post">
                                            <!-- The following field is for robots only, invisible to humans: -->
                                            <style>
                                                .tox-notification.tox-notification--in.tox-notification--warning {
                                                    display: none !important;
                                                }

                                                .f1 {
                                                    padding: 0px 25px;
                                                    background: #fff;
                                                    -moz-border-radius: 4px;
                                                    -webkit-border-radius: 4px;
                                                    border-radius: 4px;
                                                }

                                                .f1 h3 {
                                                    margin-top: 0;
                                                    margin-bottom: 5px;
                                                    text-transform: uppercase;
                                                }

                                                .f1-steps {
                                                    overflow: hidden;
                                                    position: relative;
                                                    margin-top: 20px;
                                                }

                                                .f1-progress {
                                                    position: absolute;
                                                    top: 24px;
                                                    left: 0;
                                                    width: 100%;
                                                    height: 1px;
                                                    background: #ddd;
                                                }

                                                .f1-progress-line {
                                                    position: absolute;
                                                    top: 0;
                                                    left: 0;
                                                    height: 1px;
                                                    background: #0ec4f7;
                                                }

                                                .f1-step {
                                                    position: relative;
                                                    float: left;
                                                    width: 25%;
                                                    padding: 0 45px;
                                                }

                                                .f1-step-icon {
                                                    display: inline-block;
                                                    width: 40px;
                                                    height: 40px;
                                                    margin-top: 4px;
                                                    background: #ddd;
                                                    font-size: 16px;
                                                    color: #fff;
                                                    line-height: 40px;
                                                    -moz-border-radius: 50%;
                                                    -webkit-border-radius: 50%;
                                                    border-radius: 50%;
                                                }

                                                .f1-step.activated .f1-step-icon {
                                                    background: #fff;
                                                    border: 1px solid #0ec4f7;
                                                    color: #0ec4f7;
                                                    line-height: 38px;
                                                }

                                                .f1-step.active .f1-step-icon {
                                                    width: 48px;
                                                    height: 48px;
                                                    margin-top: 0;
                                                    background: #0ec4f7;
                                                    font-size: 22px;
                                                    line-height: 48px;
                                                }

                                                .f1-step p {
                                                    color: #ccc;
                                                }

                                                .f1-step.activated p {
                                                    color: #0ec4f7;
                                                }

                                                .f1-step.active p {
                                                    color: #0ec4f7;
                                                }

                                                .f1 fieldset {
                                                    display: none;
                                                    text-align: left;
                                                }

                                                .f1-buttons {
                                                    text-align: right;
                                                }

                                                .f1 .input-error {
                                                    border-color: #f35b3f !important;
                                                }

                                                #startfunrmodal .modal-body {
                                                    padding: 0 0 15px 0 !important;
                                                }

                                                #blah {
                                                    max-width: 180px;
                                                }

                                                input[type=file] {
                                                    padding: 10px;
                                                    padding-bottom: 35px;
                                                }

                                                .form-group {
                                                    margin-top: 25px !important;
                                                }

                                                .lbform {
                                                    font-size: 15px !important;
                                                    padding-left: 2px;
                                                }
                                            </style>
                                            <?php
                                            // echo $loggeduserid;
                                            // echo '-';
                                            // echo $userId;
                                            // echo '$btn' . $btn;
                                            if ($loggeduserid != $userId) {
                                                // echo $campaign_typeId . 'vvvbtn' . $btn;
                                                if ($campaign_typeId == 1) {
                                                    if ($btn == 'yes' && $res->status == 1) {
                                                        ?>
                                                        <button type="button" style="height: 53px;display: block;width: 100%; background: #0ec4f7;color:#fff;border: none;font-size: 14px;letter-spacing: 2px;text-transform: uppercase;-webkit-transition: 0.3s ease;transition: 0.3s ease;" class="give-btn" data-toggle="modal" data-target="#submitdonate2">Donate Now</button>
                                                    <?php
                                                            }
                                                            ?>

                                                    <div class="modal fade" id="submitdonate2" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-center" id="exampleModalLongTitle">Donate Now</h4>
                                                                </div>
                                                                <div class="modal-body">


                                                                    <form action="<?php echo BASE_URL; ?>submitdonate2.php" enctype="multipart/form-data" method="post" id="form1" class="f1">

                                                                        <input type="hidden" id="campaign_Id" value="<?php echo $id; ?>" name="campaign_Id" />
                                                                        <input type="hidden" id="campaign_typeId" value="<?php echo $campaign_typeId; ?>" name="campaign_typeId" />

                                                                        <h3></h3>

                                                                        <fieldset style="display:block !important;">

                                                                            <div class="mainvalid">
                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Full Name</label>

                                                                                    <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" class="form-control">

                                                                                </div>

                                                                                <div class="form-group valid">

                                                                                    <input type="checkbox" id="anonymous" name="anonymous" value="1">
                                                                                    <label for="anonymous">Anonymous</label>

                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Email</label>
                                                                                    <input type="text" id="emailId" name="emailId" placeholder="Enter Email" class="form-control">
                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Phone Number</label>
                                                                                    <input type="text" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" class="form-control">
                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-3">
                                                                                            <select class="form-control" name="currency">
                                                                                                <!-- <option value="USD">USD</option> -->
                                                                                                <option value="INR">INR</option>
                                                                                                <!-- <option value="AED">AED</option> -->
                                                                                                <!-- <option value="Pound">Pound</option> -->
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-sm-9">
                                                                                            <input type="text" id="amount" name="amount" placeholder="How much do you want to donate?" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Address</label>
                                                                                    <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control">
                                                                                </div>

                                                                                <script>
                                                                                    function initialize31() {

                                                                                        var geocoder = new google.maps.Geocoder();

                                                                                        var autocomplete = new google.maps.places.Autocomplete(jQuery("#address")[0], {});
                                                                                        google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                                                                            var place = autocomplete.getPlace();
                                                                                            var address = place.formatted_address;
                                                                                            geocoder.geocode({
                                                                                                'address': address
                                                                                            }, function(results, status) {
                                                                                                if (status == google.maps.GeocoderStatus.OK) {
                                                                                                    var latitude = results[0].geometry.location.lat();
                                                                                                    var longitude = results[0].geometry.location.lng();

                                                                                                    var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                                                                                    setMap(mapCenter, latitude, longitude, '');
                                                                                                }
                                                                                            });
                                                                                        });

                                                                                    }
                                                                                    google.maps.event.addDomListener(window, 'load', initialize31);
                                                                                </script>

                                                                            </div>
                                                                            <div class="f1-buttons">
                                                                                <button type="submit" style="background: #0ec4f7 !important;" class="btn">Submit</button>
                                                                            </div>
                                                                        </fieldset>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } else {
                                                            if ($btn == 'yes' && $res->status == 1) {
                                                                ?>

                                                        <button type="button" style="height: 53px;display: block;width: 100%; background: #0ec4f7;color:#fff;border: none;font-size: 14px;letter-spacing: 2px;text-transform: uppercase;-webkit-transition: 0.3s ease;transition: 0.3s ease;" class="give-btn" data-toggle="modal" data-target="#submitdonate">Show Interest</button>
                                                    <?php
                                                            }
                                                            ?>

                                                    <div class="modal fade" id="submitdonate" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $fundtitle; ?></h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <form enctype="multipart/form-data" method="post" id="form1" class="f1">

                                                                        <input type="hidden" id="campaign_Id" value="<?php echo $id; ?>" name="campaign_Id" />
                                                                        <input type="hidden" id="campaign_typeId" value="<?php echo $campaign_typeId; ?>" name="campaign_typeId" />

                                                                        <h3></h3>

                                                                        <fieldset>

                                                                            <div class="mainvalid">
                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Full Name</label>

                                                                                    <input type="text" id="fullName" name="fullName" placeholder="Enter Full Name" class="form-control">

                                                                                </div>

                                                                                <div class="form-group valid">

                                                                                    <input type="checkbox" id="anonymous" name="anonymous" value="1">
                                                                                    <label for="anonymous">Anonymous</label>

                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Email</label>
                                                                                    <input type="text" id="emailId" name="emailId" placeholder="Enter Email" class="form-control">
                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Phone Number</label>
                                                                                    <input type="text" id="phonenumber" name="phonenumber" placeholder="Enter Phone Number" class="form-control">
                                                                                </div>

                                                                                <div class="form-group valid">
                                                                                    <label class="lbform">Enter Address</label>
                                                                                    <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control">
                                                                                </div>

                                                                                <script>
                                                                                    function initialize311() {

                                                                                        var geocoder = new google.maps.Geocoder();

                                                                                        var autocomplete = new google.maps.places.Autocomplete(jQuery("#address")[0], {});
                                                                                        google.maps.event.addListener(autocomplete, 'place_changed', function() {
                                                                                            var place = autocomplete.getPlace();
                                                                                            var address = place.formatted_address;
                                                                                            geocoder.geocode({
                                                                                                'address': address
                                                                                            }, function(results, status) {
                                                                                                if (status == google.maps.GeocoderStatus.OK) {
                                                                                                    var latitude = results[0].geometry.location.lat();
                                                                                                    var longitude = results[0].geometry.location.lng();

                                                                                                    var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                                                                                    setMap(mapCenter, latitude, longitude, '');
                                                                                                }
                                                                                            });
                                                                                        });

                                                                                    }
                                                                                    google.maps.event.addDomListener(window, 'load', initialize311);
                                                                                </script>

                                                                                <div class="form-group valid">
                                                                                    <?php
                                                                                            if ($campaign_typeId == 2) {
                                                                                                ?>
                                                                                        <label class="lbform">Enter Qty</label>
                                                                                        <input type="text" id="amount" name="amount" placeholder="Enter Qty" class="form-control">
                                                                                    <?php
                                                                                            } else if ($campaign_typeId == 3) {
                                                                                                ?>
                                                                                        <label class="lbform">Enter Qty <span id="demo"></span></label>
                                                                                        <input type="number" style="height: 44px !important;" oninput="myFunction()" id="amount" name="amount" placeholder="Enter Qty" class="form-control">

                                                                                        <script>
                                                                                            function myFunction() {
                                                                                                var x = document.getElementById("amount").value;
                                                                                                document.getElementById("demo").innerHTML = '(' + <?= $res->product_price; ?> * x + ' ' + '<?php echo $currency; ?>' + ')';
                                                                                            }
                                                                                        </script>
                                                                                    <?php
                                                                                            } else {
                                                                                                ?>
                                                                                        <label class="lbform">Enter Amount (In <?php echo $currency; ?>)</label>
                                                                                        <input type="text" id="amount" name="amount" placeholder="Enter Amount" class="form-control">
                                                                                    <?php
                                                                                            }
                                                                                            ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="f1-buttons">
                                                                                <button type="button" id="target" style="background: #0ec4f7 !important;" class="btn">Submit</button>
                                                                            </div>
                                                                        </fieldset>

                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        jQuery(document).ready(function() {
                                                            jQuery("#target").click(function(event) {

                                                                // alert("Handler for .submit() called.");
                                                                var fullName = jQuery("#fullName").val();
                                                                var emailId = jQuery("#emailId").val();
                                                                var phonenumber = jQuery("#phonenumber").val();
                                                                var address = jQuery("#address").val();
                                                                var amount = jQuery("#amount").val();
                                                                var campaign_Id = jQuery("#campaign_Id").val();
                                                                var campaign_typeId = jQuery("#campaign_typeId").val();
                                                                if (jQuery("#anonymous").prop("checked") == true) {
                                                                    var anonymous = 1;
                                                                } else {
                                                                    var anonymous = 0;
                                                                }

                                                                var fullNamev = 0;
                                                                var emailIdv = 0;
                                                                var phonenumberv = 0;
                                                                var addressv = 0;
                                                                var amountv = 0;

                                                                if (fullName == '') {
                                                                    jQuery("#fullName").addClass('input-error');
                                                                } else {
                                                                    jQuery("#fullName").removeClass('input-error');
                                                                    fullNamev = 1;
                                                                }

                                                                if (emailId == '') {
                                                                    jQuery("#emailId").addClass('input-error');
                                                                } else {
                                                                    jQuery("#emailId").removeClass('input-error');
                                                                    emailIdv = 1;
                                                                }

                                                                if (phonenumber == '') {
                                                                    jQuery("#phonenumber").addClass('input-error');
                                                                } else {
                                                                    jQuery("#phonenumber").removeClass('input-error');
                                                                    phonenumberv = 1;
                                                                }

                                                                if (address == '') {
                                                                    jQuery("#address").addClass('input-error');
                                                                } else {
                                                                    jQuery("#address").removeClass('input-error');
                                                                    addressv = 1;
                                                                }

                                                                if (amount == '') {
                                                                    jQuery("#amount").addClass('input-error');
                                                                } else {
                                                                    jQuery("#amount").removeClass('input-error');
                                                                    amountv = 1;
                                                                }

                                                                if ((fullNamev == '1') && (emailIdv == '1') && (phonenumberv == '1') && (addressv == '1') && (amountv == '1')) {
                                                                    showLoadingBar();
                                                                    jQuery.ajax({
                                                                        url: '<?php echo BASE_URL . 'submitdonate.php' ?>',
                                                                        type: "POST",
                                                                        data: {
                                                                            fullName: fullName,
                                                                            emailId: emailId,
                                                                            phonenumber: phonenumber,
                                                                            address: address,
                                                                            amount: amount,
                                                                            campaign_Id: campaign_Id,
                                                                            campaign_typeId: campaign_typeId,
                                                                            anonymous: anonymous
                                                                        },
                                                                        success: function(response) {
                                                                            console.log(response);
                                                                            hideLoadingBar();
                                                                            jQuery('#submitdonate').modal('hide');
                                                                            jQuery('#donateint').modal('show');
                                                                            event.preventDefault();
                                                                        },
                                                                        error: function(jqXHR, exception) {
                                                                            getErrorMessage(jqXHR, exception);
                                                                        }

                                                                    });
                                                                }

                                                                event.preventDefault();
                                                            });
                                                        });
                                                    </script>
                                            <?php
                                                }
                                            }
                                            ?>

                                            <div class="modal fade" id="donateint" tabindex="-1" role="dialog" aria-labelledby="startfunrmodalTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-center" id="exampleModalLongTitle"><?php echo $fundtitle; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 class="modal-title text-center">Thank you for interest.</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>


                                    </div>
                                    <!--end #give-form-626-->
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade donors-modal-626" tabindex="-1" role="dialog" aria-labelledby="donors-modal">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        <div class="modal-title">List Donors</div>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="give-form-donor-listing">
                                            <li class="item"><img class="ava" src="http://0.gravatar.com/avatar/9439fa99cf3250da0134d86d85ed2d4a?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">sdsds sds</div>
                                                    <div class="value">$20</div>
                                                </div>
                                            </li>
                                            <li class="item"><img class="ava" src="http://1.gravatar.com/avatar/a86a8fabc023d88b7bd44581de173ce2?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">Ifit Fitriah</div>
                                                    <div class="value">$0</div>
                                                </div>
                                            </li>
                                            <li class="item"><img class="ava" src="http://1.gravatar.com/avatar/a86a8fabc023d88b7bd44581de173ce2?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">Ifit Fitriah</div>
                                                    <div class="value">$0</div>
                                                </div>
                                            </li>
                                            <li class="item"><img class="ava" src="http://1.gravatar.com/avatar/a86a8fabc023d88b7bd44581de173ce2?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">Ifit Fitriah</div>
                                                    <div class="value">$0</div>
                                                </div>
                                            </li>
                                            <li class="item"><img class="ava" src="http://1.gravatar.com/avatar/4d73f801d9ad05175d917dccdf6c2cc1?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">asdasd adsadssd</div>
                                                    <div class="value">$20</div>
                                                </div>
                                            </li>
                                            <li class="item"><img class="ava" src="http://0.gravatar.com/avatar/c6c5dab635a7eae31dc44d4dc09f2905?s=120&amp;d=wavatar&amp;r=g" alt="#">
                                                <div class="donor-entry-wrap">
                                                    <div class="name">Din GFX</div>
                                                    <div class="value">$30</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- #give-form-626 -->
                </div><!-- /.bt-col-inner -->
            </div><!-- /.bt-content-area -->

            <div class="col-md-4 col-sm-12 bt-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <div class="bt-col-inner">

                    <aside id="fw_posts-3" class="widget fw-widget-posts widget_fw_posts">
                        <h2 class="widget-title" style="margin-bottom: 0px !important;"><span>
                                <?php
                                if ($id == 25) {
                                    ?>

                                    <?php echo $currency . ' ' . '16,000'; ?>
                                <?php
                                } else if ($id == 24) {
                                    ?>

                                    <?php echo $currency . ' ' . '80,000'; ?>
                                <?php
                                } else {
                                    ?>

                                    <?php echo $currency . ' ' . $achieve_amount ? $achieve_amount : 0; ?>
                                <?php
                                }
                                ?>

                            </span></h2>
                        <p> raised of <?php echo $currency . ' ' . $goal_amount; ?> goal </p>

                        <?php
                        $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE campaign_Id IN(" . $id . ")", ARRAY_A);
                        $perc = ($achieve_amount * 100) / $goal_amount;
                        ?>
                        <div class="progress" style="border-radius: 100px !important;">
                            <?php
                            if ($id == 25) {
                                ?>
                                <div class="progress-bar" role="progressbar" style="width: 100%;background-color:#08b4e4 !important;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php
                            } else if ($id == 24) {
                                ?>
                                <div class="progress-bar" role="progressbar" style="width: 100%;background-color:#08b4e4 !important;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php
                            } else {
                                ?>
                                <div class="progress-bar" role="progressbar" style="width: <?php echo $perc; ?>%;background-color:#08b4e4 !important;" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            <?php
                            }
                            ?>

                        </div>
                        <?php
                        if ($id == 25) {
                            ?>
                            <p>2 supporters</p>
                        <?php
                        } else if ($id == 24) {
                            ?>
                            <p>10 supporters</p>
                        <?php
                        } else {
                            ?>
                            <p><?php echo count($resultsdona); ?> supporters</p>
                        <?php
                        }
                        ?>

                    </aside>

                    <aside id="fw_posts-3" class="widget fw-widget-posts widget_fw_posts">

                        <?php

                        $resultsdona = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = '1' AND campaign_Id IN(" . $id . ")", OBJECT);
                        ?>
                        <style>
                            .fw-side-posts-list li .fw-widget-post-image:before {
                                opacity: 0 !important;
                                z-index: 0 !important;
                            }

                            .fw-side-posts-list li:hover .fw-widget-post-image:after {
                                opacity: 0 !important;
                                z-index: 0 !important;
                            }
                        </style>
                        <ul class="fw-side-posts-list">
                            <?php

                            if ($id == 25) {
                                ?>
                                <h2 class="widget-title" style="margin-bottom: 10px !important;"><span>Top Donors</span></h2>
                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">A</div>

                                    </div>

                                    <div class="posts-content">
                                        Avinash
                                        <span class="post-date">INR 9000</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">ZF</div>

                                    </div>

                                    <div class="posts-content">
                                        Zed Foundation
                                        <span class="post-date">INR 7000</span>
                                    </div>
                                </li>
                            <?php
                            } else if ($id == 24) {
                                ?>
                                <h2 class="widget-title" style="margin-bottom: 10px !important;"><span>Top Donors</span></h2>
                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">PM</div>

                                    </div>

                                    <div class="posts-content">
                                        Pettick Mouse
                                        <span class="post-date">INR 10000</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">HM</div>

                                    </div>

                                    <div class="posts-content">
                                        Hettick Mouse
                                        <span class="post-date">INR 10000</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">M</div>

                                    </div>

                                    <div class="posts-content">
                                        Milon
                                        <span class="post-date">INR 10000</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">CB</div>

                                    </div>

                                    <div class="posts-content">
                                        Christ Boss
                                        <span class="post-date">INR 10000</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                        <div class="post-image-bg" style="text-align: center;padding-top: 10px;">VB</div>

                                    </div>

                                    <div class="posts-content">
                                        Vibha Boss
                                        <span class="post-date">INR 10000</span>
                                    </div>
                                </li>
                                <?php
                                } else {
                                    if ($resultsdona) {
                                        ?>
                                    <h2 class="widget-title" style="margin-bottom: 10px !important;"><span>Top Donors</span></h2>
                                    <?php
                                            foreach ($resultsdona as $resul) {
                                                $fullName = explode(" ", $resul->fullName);

                                                if ($res->campaign_typeId == 2) {
                                                    $goal_amount = $res->item_qty;
                                                    $currency = 'QTY';
                                                } else if ($res->campaign_typeId == 3) {
                                                    $goal_amount = $res->product_price;
                                                    $currency = $res->currency;
                                                } else {
                                                    $goal_amount = $res->goal_amount;
                                                    $currency = $res->currency;
                                                }

                                                if ($res->campaign_typeId == 3) {
                                                    $amount = $resul->amount * $res->product_price;
                                                } else {
                                                    $amount = $resul->amount;
                                                }
                                                ?>
                                        <li>
                                            <div class="fw-widget-post-image fw-block-image-parent fw-overlay-1 fw-image-frame">

                                                <div class="post-image-bg" style="text-align: center;padding-top: 10px;"><?php echo $fullName[0][0] . $fullName[1][0]; ?></div>

                                            </div>

                                            <div class="posts-content">
                                                <?php echo $resul->fullName; ?>
                                                <span class="post-date"><?php echo $currency . ' ' . $amount; ?></span>
                                            </div>
                                        </li>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </aside>

                </div>
            </div><!-- /.row -->

        </div><!-- /.container -->
</section>
<?php get_footer(); ?>