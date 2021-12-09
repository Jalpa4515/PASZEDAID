<?php /* Template Name: Donate Thanku page */ ?>

<?php get_header(); ?>

<style>
    h2 {
        text-align: left;
        font-weight: 300;
        font-style: normal;
        letter-spacing: -1px;
        font-size: 50px;
        line-height: 55px;
    }

    .bt-section-space2 {
        padding-top: 150px !important;
    }
</style>
<section class="bt-section-space2">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>


            <input id="searchTextField" type="text" size="50" placeholder="Enter a location" autocomplete="on" runat="server" />

            <div class="form-group">
                <div id="mapholder" style="display:none;width: 100%; height: 200px; position: relative; overflow: hidden;">
                    <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"></div>
                </div>
            </div>
            <script>
                function initialize() {

                    var geocoder = new google.maps.Geocoder();

                    var autocomplete = new google.maps.places.Autocomplete(jQuery("#searchTextField")[0], {});
                    google.maps.event.addListener(autocomplete, 'place_changed', function() {
                        console.log(autocomplete);
                        var place = autocomplete.getPlace();
                        var address = place.formatted_address;
                        geocoder.geocode({
                            'address': address
                        }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                var latitude = results[0].geometry.location.lat();
                                var longitude = results[0].geometry.location.lng();

                                var mapCenter = new google.maps.LatLng(latitude, longitude); //Google map Coordinates
                                setMap(mapCenter);
                            }
                        });
                    });

                }
                google.maps.event.addDomListener(window, 'load', initialize);

                function setMap(mapCenter) {
                    jQuery("#mapholder").css("display", "");
                    map = new google.maps.Map(jQuery("#mapholder")[0], {
                        center: mapCenter,
                        zoom: 15
                    });
                    var marker = new google.maps.Marker({
                        position: mapCenter,
                        map: map
                    });
                }
            </script>


        </div>
    </div>
    <div class="col-md-2"></div>
    </div>
</section>
<?php get_footer(); ?>