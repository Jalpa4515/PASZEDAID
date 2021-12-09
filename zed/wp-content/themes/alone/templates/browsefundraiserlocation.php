<?php /* Template Name: Browse Fundraiser Location Page */ ?>

<?php
get_header();
?>
<link rel='stylesheet' id='js_composer_front-css'  href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />
<style>
    .bt-section-space {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    .d-none {
        display: none;
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
                        <span class="last-item">Browse Campaign By Map</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bt-main-row bt-section-space sidebar-right" role="main" itemprop="mainEntity" itemscope="itemscope" itemtype="http://schema.org/Give">
    <div class="container">
        <div class="row">

            <div class="col-md-4">

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places&callback=initMap">
                </script>

                <div>
                    <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
                </div>

                <div>
                    <input type="text" class="locationtextbox d-none required-input form-control" value="" name="location" id="location" placeholder="Enter address here" style="cursor: auto;padding: 10px !important;">
                </div>

                <div style="margin-top:10px;">
                    <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Type:</p>
                    <input type="checkbox" value="1" class="custom-control-input camptypeid" id="camptypeid1" name="camptypeid" /> &nbsp;<label class="custom-control-label " for="camptypeid1">Fundraiser</label>
                </div>

                <div>
                    <input type="checkbox" value="2" class="custom-control-input camptypeid" id="camptypeid2" name="camptypeid" /> &nbsp;<label class="custom-control-label " for="camptypeid2">Material donation</label>
                </div>

                <div>
                    <input type="checkbox" value="3" class="custom-control-input camptypeid" id="camptypeid3" name="camptypeid" /> &nbsp;<label class="custom-control-label " for="camptypeid3">Marketplace for charity products</label>
                </div>

                <input type="hidden" value="" name="latitude" id="latitude">
                <input type="hidden" value="" name="longitude" id="longitude">

            </div>

            <div class="col-md-8">

                <div id="mapholder2" class="d-none" style="width: 100%; height: 500px; position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"></div>
                </div>

                <p id="errorMap" class="d-none"></p>
                <p id="errorMapCode" class="d-none"></p>


            </div>

            <?php
            global $wpdb;
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
                jQuery(document).ready(function() {

                    //Location
                    var map;

                    function initMap() {

                        var existingAddLat = jQuery("#latitude").val();
                        var existingAddLng = jQuery("#longitude").val();

                        var mapCenter = new google.maps.LatLng(existingAddLat, existingAddLng);
                        setMap(mapCenter);

                        var geocoder = new google.maps.Geocoder();

                        var autocomplete = new google.maps.places.Autocomplete(jQuery("#location")[0], {});
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
                        jQuery("#latitude").val(position.coords.latitude);
                        jQuery("#longitude").val(position.coords.longitude);

                        var mapCenter = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                        setMap(mapCenter);

                        var geocoder = geocoder = new google.maps.Geocoder();
                        geocoder.geocode({
                            'latLng': mapCenter
                        }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[1]) {
                                    jQuery("#location").val(results[1].formatted_address);
                                }
                            }
                        });
                    }

                    function displayError(error) {

                        jQuery("#errorMap").removeClass("d-none");

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
                        jQuery("#errorMap").addClass("d-none");
                        jQuery("#mapholder2").removeClass("d-none");

                        var locationvv = jQuery("#location").val();

                        if (search) {
                            jQuery("#latitude").val(latitude);
                            jQuery("#longitude").val(longitude);
                            var zoomv = 10;
                        } else {
                            jQuery("#latitude").val('20.5937');
                            jQuery("#longitude").val('78.9629');
                            var zoomv = 4;
                        }

                        var latitudec = jQuery("#latitude").val();
                        var longitudec = jQuery("#longitude").val();

                        var locations = [
                            <?php
                            foreach ($results as $res) {

                                if ($res['campaign_typeId'] == 2) {
                                    $fundtitle = $res['item_name'];
                                } else if ($res['campaign_typeId'] == 3) {
                                    $fundtitle = $res['product_name'];
                                } else {
                                    $fundtitle = $res['fundraiser_title'];
                                }

                                $shareurl = BASE_URL . 'fundraiser-detail/?id=' . $res['id'];

                                if ($res['campaign_typeId'] == 2) {
                                    $goal_amount = $res['item_qty'];
                                    $currency = 'QTY';
                                } else if ($res['campaign_typeId'] == 3) {
                                    $goal_amount = $res['product_price'];
                                    $currency = $res['currency'];
                                } else {
                                    $goal_amount = $res['goal_amount'];
                                    $currency = $res['currency'];
                                }

                                if ($res['image']) {
                                    $iimage = BASE_URL . 'fundraiserimg/' . $res['image'];
                                } else {
                                    $iimagei = str_replace("https://www.youtube.com/watch?v=", "", $res['video']);
                                    $iimage = "https://img.youtube.com/vi/" . $iimagei . "/maxresdefault.jpg";
                                }

                                $resultsdonacc = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigndonations WHERE status = 1 AND campaign_Id IN(" . $res['id'] . ")", ARRAY_A);
                                $achieve_amount = 0;
                                foreach ($resultsdonacc as $tt) {
                                    if ($tt['campaign_typeId'] == 3) {
                                        $achieve_amountn = $tt['amount'] ? $tt['amount'] * ($res['product_price'] ? $res['product_price'] : 0) : 0;
                                    } else {
                                        $achieve_amountn = $tt['amount'] ? $tt['amount'] : 0;
                                    }
                                    $achieve_amount += $achieve_amountn;
                                }
                                if ($achieve_amount >= $goal_amount) {
                                    $btn = 'no';
                                } else {
                                    $btn = 'yes';
                                }
                                ?>['<a href="<?php echo $shareurl; ?>" style="text-decoration: none;color:#282828 !important;"><div class="/ccc/" style="text-align: center;"><img src="<?php echo $iimage; ?>" height="50" width="100" /></div><div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $fundtitle; ?></div><div class="" style="margin: 10px 0 0 0;"><b>Goal:</b> <?php echo $currency . ' ' . $goal_amount; ?></div><div class="" style="margin: 10px 0 0 0;color: <?= $btn == 'no' ? 'red' : 'green'; ?>;"><b><?= $btn == 'no' ? 'Closed' : 'Active'; ?></b></div></a>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['campaign_typeId']; ?>, 12],
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

                        var marker, i;


                        for (i = 0; i < locations.length; i++) {

                            if (locations[i][3] == 1) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FF0000',
                                    map: map
                                });
                            } else if (locations[i][3] == 2) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|00FF00',
                                    map: map
                                });
                            } else if (locations[i][3] == 3) {
                                marker = new google.maps.Marker({
                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                    icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|0000FF',
                                    map: map
                                });
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
                        }

                    }

                    // initMap();

                    if (jQuery("#locationChecked").prop('checked') == true) {

                        jQuery(".loc-input").addClass("required");

                        // jQuery.getJSON('https://ipapi.co/<?= $ipaddress; ?>/json', function(data) {

                        //     console.log("data: " + data);

                        jQuery("#latitude").val('20.5937');
                        jQuery("#longitude").val('78.9629');
                        console.log("aa");
                        initMap();
                        console.log("bb");
                        jQuery(".locationtextbox").removeClass("d-none");

                        // });

                    } else {
                        jQuery(".loc-input").removeClass("required");
                        jQuery(".locationtextbox").addClass("d-none");
                    }

                    jQuery("#locationChecked").click(function() {
                        if (jQuery(this).is(":checked")) {

                            jQuery(".loc-input").addClass("required");

                            jQuery(".locationtextbox").removeClass("d-none");

                            var errorMapCode = jQuery('#errorMapCode').html();
                            if (errorMapCode <= 0) {
                                console.log("1");
                                initMap();
                                console.log("2");
                            }

                            var location = jQuery('#location').val();
                            if (location != '') {
                                jQuery("#mapholder2").removeClass("d-none");
                            } else {
                                jQuery("#location-error").removeClass("d-none");
                            }
                        } else {
                            jQuery(".loc-input").removeClass("required");
                            jQuery("#mapholder2").addClass("d-none");
                            jQuery(".locationtextbox").addClass("d-none");
                            jQuery("#location-error").addClass("d-none");
                        }
                    });

                    //Location

                    jQuery('.camptypeid').click(function() {
                        showLoadingBar();
                        var rid = '';
                        if (jQuery(this).val() == 1) {
                            if (jQuery("#camptypeid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#camptypeid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                        }

                        if (jQuery(this).val() == 2) {
                            if (jQuery("#camptypeid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#camptypeid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                        }

                        if (jQuery(this).val() == 3) {
                            if (jQuery("#camptypeid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#camptypeid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                        }

                        // console.log(rid);
                        // return false;
                        if (this.checked) {

                            if (jQuery(this).val() == 1) {
                                rid = rid + ',1';
                            }

                            if (jQuery(this).val() == 2) {
                                rid = rid + ',2';
                            }

                            if (jQuery(this).val() == 3) {
                                rid = rid + ',3';
                            }
                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {

                                    jQuery("#errorMap").addClass("d-none");
                                    jQuery("#mapholder2").removeClass("d-none");

                                    var latitudec = jQuery("#latitude").val();
                                    var longitudec = jQuery("#longitude").val();

                                    var locations = data;

                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var marker, i;

                                    for (i = 0; i < locations.length; i++) {
                                        // marker = new google.maps.Marker({
                                        //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        //     map: map
                                        // });

                                        if (locations[i][3] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FF0000',
                                                map: map
                                            });
                                        } else if (locations[i][3] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|00FF00',
                                                map: map
                                            });
                                        } else if (locations[i][3] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|0000FF',
                                                map: map
                                            });
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
                                    }

                                    hideLoadingBar();
                                }
                            });

                        } else {

                            if (jQuery(this).val() == 1) {
                                rid = rid;
                            }

                            if (jQuery(this).val() == 2) {
                                rid = rid;
                            }

                            if (jQuery(this).val() == 3) {
                                rid = rid;
                            }
                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermap.php' ?>',
                                dataType: 'json',
                                data: {
                                    id: rid
                                }, //--> send id of checked checkbox on other page
                                success: function(data) {

                                    jQuery("#errorMap").addClass("d-none");
                                    jQuery("#mapholder2").removeClass("d-none");

                                    var latitudec = jQuery("#latitude").val();
                                    var longitudec = jQuery("#longitude").val();

                                    var locations = data;

                                    var map = new google.maps.Map(document.getElementById('mapholder2'), {
                                        zoom: 4,
                                        center: new google.maps.LatLng(latitudec, longitudec),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                    });

                                    var infowindow = new google.maps.InfoWindow();

                                    var marker, i;

                                    for (i = 0; i < locations.length; i++) {
                                        // marker = new google.maps.Marker({
                                        //     position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        //     map: map
                                        // });

                                        if (locations[i][3] == 1) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|FF0000',
                                                map: map
                                            });
                                        } else if (locations[i][3] == 2) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|00FF00',
                                                map: map
                                            });
                                        } else if (locations[i][3] == 3) {
                                            marker = new google.maps.Marker({
                                                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|0000FF',
                                                map: map
                                            });
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
                                    }

                                    hideLoadingBar();
                                }
                            });
                        }
                    });
                });
            </script>
        </div>
    </div>
</section>
<?php
get_footer();
?>