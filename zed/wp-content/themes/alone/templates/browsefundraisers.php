<?php /* Template Name: Browse Fundraisers Page */ ?>

<?php
get_header();
?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />

<section class="fw-title-bar fw-main-row-custom fw-main-row-top fw-content-vertical-align-middle fw-section-image fw-section-default-page page  parallax-section" data-stellar-background-ratio="0.5" style="background-color: rgb(234, 234, 235); background-position-x: 50%, 0%; background-position-y: -25px; background-repeat: no-repeat, repeat; background-attachment: scroll, scroll; background-image: url(&quot;//bearsthemes.com/themes/alone-foundation/wp-content/uploads/2018/04/Untitled-8.jpg&quot;), none; background-size: cover, auto; background-origin: padding-box, padding-box; background-clip: border-box, border-box;">
    <div class="container" style="padding-top: 200px;padding-bottom: 120px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="fw-heading fw-content-align-center">
                    <h1 class="fw-special-title">Browse Fundraisers</h1>

                    <div class="breadcrumbs">
                        <span class="first-item">
                            <a href="<?php echo BASE_URL; ?>">Homepage</a></span>
                        <span class="separator"><span class="ion-ios-arrow-right"></span></span>
                        <span class="last-item">Browse Campaign By Map</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bt-default-page bt-main-row bt-section-space " role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="container ">
        <div class="row">
            <div class="bt-content-area col-md-12">
                <div class="bt-inner">
                    <article id="page-17" class="post post-details" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                        <div class="inner">
                            <div class="entry-content" itemprop="text">
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <?php
                                    if (isset($_GET) && isset($_GET['c'])) {
                                        $c = $_GET['c'];
                                    } else {
                                        $c = '';
                                    }
                                    ?>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_theme_custom_element wpb_events_grid">
                                                    <form action="">
                                                        <input type="text" placeholder="Search here.." name="c" value="<?= $c; ?>" style="width: 65%;" />
                                                        <input type="submit" value="Search" style="height: 44px;width: 29%;margin-left:4%;" />
                                                    </form><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div class="wpb_theme_custom_element wpb_events_grid">
                                                    <div class="vc-custom-inner-wrap masonry_hybrid-pcbqzds" data-bears-masonryhybrid="{&quot;col&quot;: 3, &quot;space&quot;: 40}" style="position: relative; height: 1216px;">

                                                        <style>
                                                            .event-featured-image-wrap {
                                                                box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;
                                                            }

                                                            #page .wpb_theme_custom_element.wpb_events_grid .item-inner.layout-default .content-entry {
                                                                border: none !important;
                                                                box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;
                                                                background-color: #fff;
                                                            }

                                                            .masonry_hybrid-pcbqzds {
                                                                margin-left: -40px;
                                                                width: calc(100% + 40px);
                                                                transition-property: height, width;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item,
                                                            .masonry_hybrid-pcbqzds .grid-sizer {
                                                                width: calc(100% / 3);
                                                            }

                                                            .masonry_hybrid-pcbqzds .gutter-sizer {
                                                                width: 0;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item {
                                                                float: left;
                                                                box-sizing: border-box;
                                                                padding-left: 40px;
                                                                padding-bottom: 40px;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item.ui-resizable-resizing {
                                                                z-index: 999
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item .screen-size {
                                                                visibility: hidden;
                                                                transition: .5s;
                                                                -webkit-transition: .5s;
                                                                opacity: 0;
                                                                position: absolute;
                                                                bottom: calc(40px + 8px);
                                                                right: 9px;
                                                                padding: 2px 4px;
                                                                border-radius: 2px;
                                                                font-size: 11px;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item.ui-resizable-resizing .screen-size {
                                                                visibility: visible;
                                                                opacity: 1;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item .ui-resizable-se {
                                                                right: 0;
                                                                bottom: 40px;
                                                                opacity: 0;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item:hover .ui-resizable-se {
                                                                opacity: 1;
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item--width1 {
                                                                width: 33.333333333333336%
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item--width2 {
                                                                width: 66.66666666666667%
                                                            }

                                                            .masonry_hybrid-pcbqzds .grid-item--width3 {
                                                                width: 100%
                                                            }

                                                            @media (max-width: 860px) {

                                                                .masonry_hybrid-pcbqzds .grid-item,
                                                                .masonry_hybrid-pcbqzds .grid-sizer {
                                                                    width: calc(100% / 2);
                                                                }
                                                            }

                                                            @media (max-width: 577px) {

                                                                .masonry_hybrid-pcbqzds .grid-item,
                                                                .masonry_hybrid-pcbqzds .grid-sizer {
                                                                    width: calc(100% / 1);
                                                                }
                                                            }
                                                        </style>

                                                        <div class="grid-sizer"></div>
                                                        <div class="gutter-sizer"></div>

                                                        <?php
                                                        global $wpdb;

                                                        if ($c) {
                                                            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (fundraiser_title LIKE '%" . $c . "%' OR item_name LIKE '%" . $c . "%' OR product_name LIKE '%" . $c . "%') AND admin_approved = 1", OBJECT);
                                                        } else {
                                                            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", OBJECT);
                                                        }

                                                        // echo '<pre>';
                                                        // print_r($results);
                                                        // echo '</pre>';
                                                        if ($results) {

                                                            foreach ($results as $res) {
                                                                $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res->id;
                                                                // echo '<pre>';
                                                                // print_r($res);
                                                                // echo '</pre>';
                                                                // exit;

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

                                                                $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res->id . ")", ARRAY_A);
                                                                $achieve_amount = 0;
                                                                foreach ($resultsdonacc as $tt) {
                                                                    if ($tt['campaign_typeId'] == 3) {
                                                                        $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res->product_price ? $res->product_price : 0) : 0;
                                                                    } else {
                                                                        $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                                                                    }
                                                                    $achieve_amount += $achieve_amountn;
                                                                }

                                                                $userId = $res->userId;
                                                                $resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
                                                                ?>
                                                                <a href="<?php echo $shareurl; ?>" class="title-link" title="<?php echo $fundtitle; ?>">
                                                                    <div class="item-inner grid-item layout-default" style="position: absolute; left: 0px; top: 0px;">
                                                                        <?php
                                                                                if ($res->image) {
                                                                                    $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                                                                                } else {
                                                                                    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                                                                                    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                                                                }

                                                                                ?>
                                                                        <div class="event-featured-image-wrap">
                                                                            <div class="event-thumbnail" style="background: url(<?php echo $iimage; ?>) center center / cover, #9E9E9E;"></div>
                                                                            <div class="alone-event-date">
                                                                                <div class="alone-event-day"><?php echo date("d M Y", strtotime($res->created_at)); ?></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="content-entry">
                                                                            <?php
                                                                                    $zed_verified = '';
                                                                                    if ($res->zed_verified) {
                                                                                        $zed_verified = "ZED Verified";
                                                                                    }
                                                                                    ?>
                                                                            <a href="<?php echo $shareurl; ?>" class="title-link" title="<?php echo $fundtitle; ?>">
                                                                                <div class="title"><?php echo substr($fundtitle, 0, 20); ?></div>
                                                                            </a>
                                                                            <?php
                                                                                    if ($res->zed_verified) {
                                                                                        ?>
                                                                                <span style="font-size: 15px;color: #3E3E8D !important;"><b>ZED Verified</b></span>
                                                                                <br>
                                                                            <?php } ?>
                                                                            <div class="alone-event-time"><i class="fa fa-clock-o" aria-hidden="true"> </i> <?php echo date("H:i", strtotime($res->created_at)); ?> <span> By <?php echo $resultsusers[0]->display_name; ?></span></div>
                                                                            <div class="venue-empty">
                                                                                <i class="fa fa-map-marker" aria-hidden="true"> </i>
                                                                                <span class="tribe-address">
                                                                                    <span class="tribe-street-address"><?php echo substr($res->address, 0, 20); ?></span>
                                                                                </span>
                                                                            </div>
                                                                            <?php

                                                                                    $perc = 0;
                                                                                    //echo $goal_amount;
                                                                                    if ($goal_amount != 0 && $achieve_amount != 0) {
                                                                                        $perc = ($achieve_amount * 100) / $goal_amount;
                                                                                    }

                                                                                    if ($res->id == 25) {
                                                                                        ?>

                                                                                <div class="alone-event-time" style="padding-bottom: 0px;"><span><?php echo $currency; ?> <?php echo $goal_amount; ?> Raised of <?php echo $currency; ?> <?php echo $goal_amount; ?></span></div>
                                                                                <div class="progress" style="border-radius: 100px !important;">
                                                                                    <div class="progress-bar" role="progressbar" style="width: 100%;background-color:#08b4e4 !important;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>
                                                                            <?php
                                                                                    } else if ($res->id == 24) {
                                                                                        ?>

                                                                                <div class="alone-event-time" style="padding-bottom: 0px;"><span><?php echo $currency; ?> <?php echo $goal_amount; ?> Raised of <?php echo $currency; ?> <?php echo $goal_amount; ?></span></div>
                                                                                <div class="progress" style="border-radius: 100px !important;">
                                                                                    <div class="progress-bar" role="progressbar" style="width: 100%;background-color:#08b4e4 !important;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>

                                                                            <?php
                                                                                    } else {
                                                                                        ?>

                                                                                <div class="alone-event-time" style="padding-bottom: 0px;"><span> <?php echo $currency; ?> <?php echo $achieve_amount; ?> Raised of <?php echo $currency; ?> <?php echo $goal_amount; ?></span></div>
                                                                                <div class="progress" style="border-radius: 100px !important;">
                                                                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $perc; ?>%;background-color:#08b4e4 !important;" aria-valuenow="<?php echo $perc; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                                                </div>

                                                                            <?php
                                                                                    }
                                                                                    ?>

                                                                            <?php if ($res->status == "1") {
                                                                                        if ($res->id == 24) {
                                                                                            ?>
                                                                                    <a href="<?php echo $shareurl; ?>"><input type="submit" value="View Details" style="width: 100%"></a>
                                                                                <?php
                                                                                            } else  if ($res->id == 25) {
                                                                                                ?>
                                                                                    <a href="<?php echo $shareurl; ?>"><input type="submit" value="View Details" style="width: 100%"></a>
                                                                                <?php
                                                                                            } else {
                                                                                                ?>
                                                                                    <a href="<?php echo $shareurl; ?>"><input type="submit" value="Show Interest" style="width: 100%"></a>
                                                                                <?php
                                                                                            }
                                                                                        } else { ?>
                                                                                <a href="<?php echo $shareurl; ?>"><input type="button" value="View Details" style="width: 100%"></a>
                                                                            <?php } ?>
                                                                        </div>

                                                                    </div>
                                                                </a>
                                                            <?php
                                                                }
                                                            } else {
                                                                ?>

                                                            <div class="item-inner grid-item layout-default" style="position: absolute; left: 0px; top: 0px;">

                                                                <div class="title">No result found.</div>

                                                            </div>
                                                            </a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.entry-content -->
                        </div><!-- /.inner -->
                    </article><!-- /#page-## -->
                </div><!-- /.inner -->
            </div>
        </div>
</section>
<?php get_footer(); ?>