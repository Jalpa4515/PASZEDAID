<?php
include_once get_template_directory() . '/theme-includes/init.php';
function my_custom_mime_types($mimes)
{

    // New allowed mime types.
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';

    // Optional. Remove a mime type.
    unset($mimes['exe']);

    return $mimes;
}
add_filter('upload_mimes', 'my_custom_mime_types');


add_action('wp_logout', 'ps_redirect_after_logout');
function ps_redirect_after_logout()
{
    wp_redirect(get_site_url() . '/login');
    exit();
}


// add_action('check_admin_referer', 'logout_without_confirm', 10, 2);
// function logout_without_confirm($action, $result)
// {
//     /**
//      * Allow logout without confirmation
//      */
//     if ($action == "log-out") {
//         $redirect_to = isset($_REQUEST['redirect_to']) ? $_REQUEST['redirect_to'] : 'my-account';
//         $location = str_replace('&', '&', wp_logout_url($redirect_to));
//          wp_redirect( get_site_url().'/my-account' );
//         die;
//     }
// }


// add_action( 'template_redirect', 'logout_confirmation' );

// function logout_confirmation() {

//     global $wp;

//     if ( isset( $wp->query_vars['customer-logout'] ) ) {

//         wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );

//         exit;

//     }

// }

// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu');

function my_cool_plugin_create_menu()
{
    //create new top-level menu
    add_menu_page('Manage Campaigns', 'Manage Campaigns', 'manage_options', 'manage-campaigns', 'my_cool_plugin_settings_page', 'dashicons-schedule', 5);
}

function my_cool_plugin_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Manage Campaigns</h1>

        <?php
            global $wpdb;

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $resultscount = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (admin_approved = 0 OR admin_approved = 2)", OBJECT);

            $total_rows = count($resultscount);
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE (admin_approved = 0 OR admin_approved = 2) ORDER BY id desc LIMIT $offset, $no_of_records_per_page", OBJECT);
            ?>
        <table class="form-table" border="1">
            <tr valign="top">
                <td><b>Image</b></td>
                <td><b>Title</b></td>
                <td><b>User Details</b></td>
                <td><b>Goal Amount</b></td>
                <td><b>Detail</b></td>
                <td><b>Action</b></td>
            </tr>
            <?php
                if ($results) {
                    foreach ($results as $res) {
                        $shareurl = BASE_URL . 'fundraiser-detail-admin/?id=' . $res->id;
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

                        $userId = $res->userId;
                        $resultsusers = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}users WHERE id = " . $userId, OBJECT);
                        $all_meta_for_user = get_user_meta($resultsusers[0]->ID);

                        if ($res->image) {
                            $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                        } else {
                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                        }

                        ?>
                    <tr valign="top">
                        <td><img width="100" height="100" src="<?php echo $iimage; ?>" /></td>
                        <td><?php echo $fundtitle; ?></td>
                        <td>
                            <span><b>Name: </b><?= $resultsusers[0]->display_name; ?></span><br />
                            <span><b>Email: </b><?= $resultsusers[0]->user_email; ?></span><br />
                            <span><b>Phone Number: </b><?= $all_meta_for_user['billing_phone'][0]; ?></span>
                        </td>
                        <td><?php echo $currency; ?> <?php echo $goal_amount; ?></td>
                        <td><a href="<?php echo $shareurl; ?>" target="_blank">View</a></td>
                        <?php
                                    if ($res->admin_approved == 2) {
                                        ?>
                            <td>
                                -
                            </td>
                        <?php
                                    } else {
                                        ?>
                            <td>
                                <div id="acceptdivmain<?php echo $res->id; ?>">
                                    <button type="button" class="btn btn-success align-middle" onclick="acceptcamp('<?php echo $res->id; ?>');">Accept</button>
                                    <button type="button" class="btn btn-success align-middle" onclick="verifiedcamp('<?php echo $res->id; ?>');">ZED Verified</button>
                                    <button type="button" class="btn btn-success align-middle" onclick="rejectcamp('<?php echo $res->id; ?>');">Decline</button>
                                </div>

                                <div style="display:none" id="loadingdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Loading..</button>
                                </div>

                                <div style="display:none" id="acceptdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Accepted</button>
                                </div>

                                <div style="display:none" id="verifieddiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">ZED Verified</button>
                                </div>

                                <div style="display:none" id="declinediv<?php echo $res->id; ?>">
                                    <button type="button" class="btn btn-danger align-middle">Declined</button>
                                </div>

                            </td>
                        <?php
                                    }
                                    ?>
                    </tr>
                <?php }
                    } else {
                        ?>
                <tr valign="top">
                    <td colspan="6"><b>No record found.</b></td>
                </tr>
            <?php
                }
                ?>
        </table>

        <?php
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $pagLink = "<br/><ul class='pagination'>";
            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;padding: 15px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
                }
            }

            echo $pagLink . "</ul>";
            ?>

        <script>
            function acceptcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'acceptcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#acceptdiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#acceptdiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }

            function verifiedcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'verifiedcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#declinediv' + id).css('display', 'none');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }

            function rejectcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'rejectcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#acceptdiv' + id).css('display', 'none');
                        jQuery('#declinediv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#acceptdiv' + id).css('display', 'none');
                        jQuery('#declinediv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }
        </script>
    </div>
<?php }


// create custom plugin settings menu
add_action('admin_menu', 'my_cool_plugin_create_menu2');

function my_cool_plugin_create_menu2()
{
    //create new top-level menu
    add_menu_page('Approved Campaigns', 'Approved Campaigns', 'manage_options', 'admin-analytics', 'my_cool_plugin_settings_page2', 'dashicons-schedule', '5');
}

function my_cool_plugin_settings_page2()
{
    ?>
    <div class="wrap">
        <h1>Approved Campaigns</h1>

        <?php
            global $wpdb;

            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno - 1) * $no_of_records_per_page;

            $resultscount = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", OBJECT);

            $total_rows = count($resultscount);
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1 ORDER BY id desc LIMIT $offset, $no_of_records_per_page", OBJECT);
            ?>
        <table class="form-table" border="1">
            <tr valign="top">
                <td><b>Image</b></td>
                <td><b>Title</b></td>
                <td><b>User Details</b></td>
                <td><b>Goal Amount</b></td>
                <td><b>Achieve Amount</b></td>
                <td><b>Detail</b></td>
                <td><b>Action</b></td>
            </tr>
            <?php
                if ($results) {
                    foreach ($results as $res) {
                        $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res->id;
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
                        $all_meta_for_user = get_user_meta($resultsusers[0]->ID);

                        if ($res->image) {
                            $iimage = BASE_URL . 'fundraiserimg/' . $res->image;
                        } else {
                            $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res->video);
                            $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                        }

                        ?>
                    <tr valign="top">
                        <td><img width="100" height="100" src="<?php echo $iimage; ?>" /></td>
                        <td><?php echo $fundtitle; ?></td>
                        <td>
                            <span><b>Name: </b><?= $resultsusers[0]->display_name; ?></span><br />
                            <span><b>Email: </b><?= $resultsusers[0]->user_email; ?></span><br />
                            <span><b>Phone Number: </b><?= $all_meta_for_user['billing_phone'][0]; ?></span>
                        </td>
                        <td><?php echo $currency; ?> <?php echo $goal_amount; ?></td>
                        <td><?php echo $currency; ?> <?= $achieve_amount; ?></td>
                        <td><a href="<?php echo $shareurl; ?>" target="_blank">View</a></td>
                        <?php
                                    if ($res->zed_verified) {
                                        ?>
                            <td>
                                <div>
                                    <b>ZED Verified</b>
                                </div>
                            </td>
                        <?php
                                    } else {
                                        ?>
                            <td>
                                <div id="acceptdivmain<?php echo $res->id; ?>">

                                    <button type="button" class="btn btn-success align-middle" onclick="verifiedcamp('<?php echo $res->id; ?>');">ZED Verified</button>

                                </div>

                                <div style="display:none" id="loadingdiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">Loading..</button>
                                </div>

                                <div style="display:none" id="verifieddiv<?php echo $res->id; ?>">
                                    <button type="button disabled" class="btn btn-success align-middle">ZED Verified</button>
                                </div>

                            </td>
                        <?php
                                    }
                                    ?>

                    </tr>
                <?php }
                    } else {
                        ?>
                <tr valign="top">
                    <td colspan="7"><b>No record found.</b></td>
                </tr>
            <?php
                } ?>
        </table>
        <?php
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $pagLink = "<br/><ul class='pagination'>";
            if ($total_pages > 1) {
                for ($i = 1; $i <= $total_pages; $i++) {
                    $pagLink .= "<li style='display: inline;float: left' class='page-item'><a style='text-decoration: none;color: white;margin-left: 10px;padding: 15px;background-color: #999;' class='page-link' href='" . $actual_link . "&pageno=" . $i . "'>" . $i . "</a></li>";
                }
            }

            echo $pagLink . "</ul>";
            ?>
        <script>
            function verifiedcamp(id) {
                // showLoadingBar();
                jQuery('#loadingdiv' + id).css('display', '');
                jQuery('#acceptdivmain' + id).css('display', 'none');
                jQuery.ajax({
                    url: '<?php echo BASE_URL . 'verifiedcamp.php' ?>',
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        console.log(response);
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    },
                    error: function(jqXHR, exception) {
                        jQuery('#verifieddiv' + id).css('display', '');
                        jQuery('#acceptdivmain' + id).css('display', 'none');
                        jQuery('#loadingdiv' + id).css('display', 'none');
                        // hideLoadingBar();
                        event.preventDefault();
                    }

                });
            }
        </script>
    </div>
<?php }

/* add_action( 'wp', 'sc_capture_before_login_page_url' );
function sc_capture_before_login_page_url(){
    if( !is_user_logged_in() ):
    $prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
    $_SESSION['referer_url'] = $prev_url;
    endif;
} */

function aasort($array, $key) 
{
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    $array=array_values($ret);
    return $array;
}