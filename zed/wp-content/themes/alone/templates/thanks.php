<?php /* Template Name: Thanku page */ ?>

<?php get_header(); ?>
<style>
    .bt-sidebar {
        display: none;
    }

    .bt-section-space {
        padding: 30px 0 !important;
    }

    h2 {
        text-align: left;
        font-weight: 300;
        font-style: normal;
        letter-spacing: -1px;
        font-size: 50px;
        line-height: 55px;
    }

    .button {
        background: #0ec4f7 !important;
        color: #fff !important;
        font-weight: normal !important;
        -webkit-transition: 0.3s !important;
        transition: 0.3s !important;
        font-size: 13px !important;
        padding: 12px 28px !important;
        line-height: normal !important;
        text-transform: uppercase !important;
    }
</style>
<section class="fw-title-bar fw-main-row-custom fw-main-row-top fw-content-vertical-align-middle fw-section-image fw-section-default-page page  parallax-section" data-stellar-background-ratio="0.5" style="background-color: rgb(234, 234, 235); background-position-x: 50%, 0%; background-position-y: 203px; background-repeat: no-repeat, repeat; background-attachment: scroll, scroll; background-image: url(&quot;//bearsthemes.com/themes/alone-foundation/wp-content/uploads/2018/04/Untitled-8.jpg&quot;), none; background-size: cover, auto; background-origin: padding-box, padding-box; background-clip: border-box, border-box;">
    <div class="container" style="padding-top: 200px;padding-bottom: 120px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="fw-heading fw-content-align-center">
                    <h1 class="fw-special-title">Thank You</h1>

                    <div class="breadcrumbs">
                        <span class="first-item">
                            <a href="<?= BASE_URL ?>">Homepage</a></span>
                        <span class="separator"><span class="ion-ios-arrow-right"></span></span>
                        <span class="last-item">Thank You</span>
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
                    <article id="page-1817" class="post post-details" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                        <div class="inner">
                            <div class="entry-content" itemprop="text">
                                <section class="vc_section">
                                    <div class="vc_row wpb_row vc_row-fluid">
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">

                                                    <?php
                                                    global $wpdb;
                                                    $id = $_GET['id'];
                                                    $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id =" . $id, OBJECT);
                                                    $res = $results[0];

                                                    if ($res->campaign_typeId == 2) {
                                                        $fundtitle = $res->item_name;
                                                    } else if ($res->campaign_typeId == 3) {
                                                        $fundtitle = $res->product_name;
                                                    } else {
                                                        $fundtitle = $res->fundraiser_title;
                                                    }

                                                    if ($res->image) {
                                                        $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                                                    } else {
                                                        $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                                                        $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                                    }
                                                    ?>

                                                    <p style="text-align: center"><b>Title:</b> <?= $fundtitle; ?> </p>
                                                    <p style="text-align: center"><b>Image</b><br/> <img src="<?= $iimage; ?>" height="200" width="200" /> </p>
                                                    <h3 style="text-align: center" class="vc_custom_heading">Your Campaign Is Under Review</h3>
                                                    <div class="vc_btn3-container vc_btn3-center vc_custom_1607185508495" style="text-align: center;">
                                                        <a class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-primary button" href="<?= BASE_URL ?>my-account/" title="My account">Go to Dashboard</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div><!-- /.entry-content -->
                        </div><!-- /.inner -->
                    </article><!-- /#page-## -->
                </div><!-- /.inner -->
            </div><!-- /.content-area -->

            <div class="col-md-4 col-sm-12 bt-sidebar" role="complementary" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <div class="bt-col-inner">
                </div><!-- /.inner -->
            </div><!-- /.sidebar -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section>
<?php get_footer(); ?>