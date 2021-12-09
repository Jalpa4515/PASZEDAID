<?php /* Template Name: Covid detail Browse Fundraiser Location Page */ ?>

<?php
get_header();
?>
<link rel='stylesheet' id='js_composer_front-css' href='<?= BASE_URL ?>wp-content/themes/alone/assets/css/jsc.css' type='text/css' media='all' />
<style>
    .bt-section-space {
        padding-top: 50px !important;
        padding-bottom: 50px !important;
    }

    .d-none {
        display: none;
    }

    .legendstextmobile {
        display: none;
    }

    .legendstextdesktop {
        display: block;
    }

    @media (max-width:767px) {
        .legendstextmobile {
            display: block;
        }

        .legendstextdesktop {
            display: none;
        }
    }
</style>

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
                    <input type="checkbox" value="1" class="custom-control-input covidid" id="covidid1" name="covidid" /> &nbsp;<label class="custom-control-label " for="covidid1"><img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital.png" width="20" height="20" /> Covid Hospital <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSfR0ZsMu09XUge0pGt9aVvZWtSozgu8clMkxJPgsJ8tO_xIZQ/viewform?usp=sf_link" target="_blank"> <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label>
                </div>

                <div style="margin-top:10px;">
                    <input type="checkbox" value="2" class="custom-control-input covidid" id="covidid2" name="covidid" /> &nbsp;<label class="custom-control-label " for="covidid2"><img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection.png" width="20" height="20" /> Remdesivir Injection <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdJLHyM_ABs6TGDKq4YlPY4Xt8RKek2HaLK-7EpZZOlNVfICg/viewform?usp=sf_link" target="_blank"> <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label>
                </div>

                <div style="margin-top:10px;">
                    <input type="checkbox" value="3" class="custom-control-input covidid" id="covidid3" name="covidid" /> &nbsp;<label class="custom-control-label " for="covidid3"><img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma.png" width="20" height="20" /> Plasma <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSesttYE86RQjK9TpCJDi-TtDWtNlZAydxex2C2hqylWhzFJvQ/viewform?usp=sf_link" target="_blank"> <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label>
                </div>

                <div style="margin-top:10px;">
                    <input type="checkbox" value="4" class="custom-control-input covidid" id="covidid4" name="covidid" /> &nbsp;<label class="custom-control-label " for="covidid4"><img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen-tank.png" width="20" height="20" /> Oxygen Cylinder <a class="add-icon" href="https://docs.google.com/forms/d/e/1FAIpQLSdDS0SZ_XOLkK8dG-9ACOPRQCXZv2sjKAXa3my7n0rht0g_yA/viewform?usp=sf_link" target="_blank"> <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/add-1.png" width="20" height="20"></a></label>
                </div>

                <div class="legendstextdesktop">

                    <hr>

                    <p style="font-size: 18px;"><b>Legends:</b></p>

                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/available.png" />
                    <p style="font-size: 15px;display: inline;">Available</p>
                    
                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/to_be_available.png" />
                    <p style="font-size: 15px;display: inline;">To be Available</p>
                   
                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/not_available.png" />
                    <p style="font-size: 15px;display: inline;">Not Available</p>

                </div>

                <div class="legendstextdesktop">

                    <hr>

                    <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Be the #ZEDAvengers! You can contribute your feedback/ information on availability of the facilities on our WhatsApp number. We will update the validated information on the map. Let’s save more #ZEDLives!!!</b></p>
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

            <div class="col-md-4 legendstextmobile">
                <br>
                <div class="">
                    <p style="font-size: 18px;"><b>Legends:</b></p>

                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/available.png" />
                    <p style="font-size: 15px;display: inline;">Available</p>
                    <br /><br />
                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/to_be_available.png" />
                    <p style="font-size: 15px;display: inline;">To be Available</p>
                    <br /><br />
                    <img src="https://jedaitestbed.in/zed/wp-content/uploads/2021/04/not_available.png" />
                    <p style="font-size: 15px;display: inline;">Not Available</p>

                </div>

                <hr>

                <div class="">
                    <p style="font-family: 'Open Sans';font-size: 18px;font-weight: 400;font-style: normal;letter-spacing: -0.6px;color: #282828;">Be the #ZEDAvengers! You can contribute your feedback/ information on availability of the facilities on our WhatsApp number. We will update the validated information on the map. Let’s save more #ZEDLives!!!</b></p>
                </div>

            </div>


            <?php
            global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}covidlistdetails", ARRAY_A);
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

                                $categoryName = '<span style="color:#2EC4F7 !important;">' . $res['categoryName'] . '</span>';
                                $title = $res['title'];

                                if ($res['categoryId'] == 1) {

                                    $mstatus = $res['status'];

                                    ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Bed: <?php echo $res['bed']; ?><br>Bed with oxygen: <?php echo $res['oxygen']; ?><br>Bed with ventilator: <?php echo $res['ventilator']; ?><br><br>Location: <?php echo $res['location']; ?><br><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?><?php $mstatus != 3 ? '</a>' : ''; ?></div>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 2) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Qty: <?php echo $res['quantity']; ?><br><br>Location: <?php echo $res['location']; ?><br><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?><?php $mstatus != 3 ? '</a>' : ''; ?></div>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 3) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Gender: <?php echo $res['gender']; ?><br>Blood Group: <?php echo $res['bloodGroup']; ?><br>Eligible date: <?php echo date("d F Y", strtotime($res['coronaEligibleDate'])); ?><br><br>Location: <?php echo $res['location']; ?><br><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?><?php $mstatus != 3 ? '</a>' : ''; ?></div>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                                <?php } else if ($res['categoryId'] == 4) {

                                        $mstatus = $res['status'];

                                        ?>['<div class="" style="margin: 10px 0 0 0;font-size: 15px;font-weight: 500;"><?php echo $categoryName; ?><br><br><?php echo $title; ?><br><br>Qty: <?php echo $res['quantity']; ?><br><br>Location: <?php echo $res['location']; ?><br><br>Contact: <?php echo $res['contactName']; ?> - <?php echo $mstatus != 3 ? '<a href="tel:' . $res['contactNumber1'] . '">' : ''; ?><?php echo $res['contactNumber1']; ?><?php $mstatus != 3 ? '</a>' : ''; ?></div>', <?php echo $res['latitude']; ?>, <?php echo $res['longitude']; ?>, <?php echo $res['categoryId']; ?>, <?php echo $mstatus; ?>, 12],

                            <?php }
                            } ?>
                        ];

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
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_not_available.png',
                                        map: map
                                    });
                                }
                            } else if (locations[i][3] == 2) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection_to_be_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection_not_available.png',
                                        map: map
                                    });
                                }

                            } else if (locations[i][3] == 3) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_not_available.png',
                                        map: map
                                    });
                                }
                            } else if (locations[i][3] == 4) {
                                if (locations[i][4] == 1) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_available.png',
                                        map: map
                                    });
                                } else if (locations[i][4] == 2) {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                        map: map
                                    });
                                } else {
                                    marker = new google.maps.Marker({
                                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                        icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_not_available.png',
                                        map: map
                                    });
                                }
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

                    jQuery('.covidid').click(function() {
                        showLoadingBar();
                        var rid = '';
                        if (jQuery(this).val() == 1) {
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                        }

                        if (jQuery(this).val() == 2) {
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                        }

                        if (jQuery(this).val() == 3) {
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid4").prop('checked') == true) {
                                rid = rid + ',4';
                            }
                        }

                        if (jQuery(this).val() == 4) {
                            if (jQuery("#covidid1").prop('checked') == true) {
                                rid = rid + ',1';
                            }
                            if (jQuery("#covidid2").prop('checked') == true) {
                                rid = rid + ',2';
                            }
                            if (jQuery("#covidid3").prop('checked') == true) {
                                rid = rid + ',3';
                            }
                        }

                        console.log(rid);
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

                            if (jQuery(this).val() == 4) {
                                rid = rid + ',4';
                            }

                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
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

                                    console.log(locations);

                                    for (i = 0; i < locations.length; i++) {

                                        console.log(locations[i][3]);
                                        console.log(locations[i][4]);

                                        if (locations[i][3] == 1) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_not_available.png',
                                                    map: map
                                                });
                                            }
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

                            if (jQuery(this).val() == 4) {
                                rid = rid;
                            }
                            console.log(rid);
                            jQuery.ajax({
                                type: "POST",
                                url: '<?php echo BASE_URL . 'filtermapcovid.php' ?>',
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

                                        if (locations[i][3] == 1) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/hospital_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 2) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/injection_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/Component-38-–-1.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/Component-39-–-1.png',
                                                    map: map
                                                });
                                            }

                                        } else if (locations[i][3] == 3) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/plasma_not_available.png',
                                                    map: map
                                                });
                                            }
                                        } else if (locations[i][3] == 4) {
                                            if (locations[i][4] == 1) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_available.png',
                                                    map: map
                                                });
                                            } else if (locations[i][4] == 2) {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_tobe_available.png',
                                                    map: map
                                                });
                                            } else {
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                                                    icon: 'https://jedaitestbed.in/zed/wp-content/uploads/2021/04/oxygen_not_available.png',
                                                    map: map
                                                });
                                            }
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