<?php /* Template Name: My Donations Page */ ?>

<?php get_header(); ?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />
<?php

global $wpdb;

if (is_user_logged_in()) {
    $user = wp_get_current_user();
    $loggeduserid = $user->ID;
} else {
    $loggeduserid = 0;
}
$user_email = $user->user_email;

$resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND emailId = '" . $user_email . "'", ARRAY_A);

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
                    <h1 class="fw-special-title">My Donation</h1>

                    <div class="breadcrumbs">
                        <span class="first-item">
                            <a href="<?php echo BASE_URL; ?>">Homepage</a>
                        </span>
                        <span class="separator"><span class="ion-ios-arrow-right"></span></span>
                        <span class="last-item">My Donation</span>
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

            <div class="col-md-12">

                <style>
                    .table>thead>tr>th,
                    .table>tbody>tr>th,
                    .table>tfoot>tr>th,
                    .table>thead>tr>td,
                    .table>tbody>tr>td,
                    .table>tfoot>tr>td {
                        padding: 20px !important;
                        border: 0px !important;
                    }

                    .table>tbody {
                        border-spacing: 0px !important;
                    }
                </style>

                <table class="table table-hover" style="border-collapse: separate;border-spacing:0 20px; border:0px;">
                    <tbody>
                        <?php
                        
                        if ($resultsdonacc) {

                            foreach ($resultsdonacc as $resul) {

                                $resultscc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE id = " . $resul['campaign_Id']);
                                $recs = $resultscc[0];

                                if ($recs->campaign_typeId == 2) {
                                    $fundtitle = $recs->item_name;
                                } else if ($recs->campaign_typeId == 3) {
                                    $fundtitle = $recs->product_name;
                                } else {
                                    $fundtitle = $recs->fundraiser_title;
                                }

                                if ($recs->image) {
                                    $iimage = BASE_URL . 'fundraiserimg/' . $recs->image;
                                } else {
                                    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $recs->video);
                                    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                }

                                ?>
                                <tr style="box-shadow: 0px 0px 25px 0px rgba(0, 0, 0, 0.09) !important;">

                                    <td style="width: 0px;">

                                        <img style="width: 150px;height: 150px;" src="<?= $iimage ?>" />

                                    </td>

                                    <td>

                                        <div style="margin-bottom:10px;"><?php echo $fundtitle; ?></div>

                                        <span class="subdetail" style="font-size: 15px;">
                                            <i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $resul['phonenumber']; ?><br>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $resul['emailId']; ?><br>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $resul['address']; ?><br>
                                            <div style="margin-top:10px;"> <b>INR <?php echo $resul['amount']; ?></b> </div>
                                        </span>

                                    </td>

                                </tr>
                            <?php
                                }
                            } else {
                                ?>
                            <h4 style="text-align:center">No donation found.</h4>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>


            </div>

        </div><!-- /.container -->
</section>
<?php get_footer(); ?>