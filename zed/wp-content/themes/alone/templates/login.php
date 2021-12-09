<?php /* Template Name: Login page */ ?>

<?php get_header(); ?>
<style>
    .bt-sidebar {
        display: none;
    }
</style>
<section class="fw-title-bar fw-main-row-custom fw-main-row-top fw-content-vertical-align-middle fw-section-image fw-section-default-page page  parallax-section" data-stellar-background-ratio="0.5" style="background-color: rgb(234, 234, 235); background-position-x: 50%, 0%; background-position-y: -25px; background-repeat: no-repeat, repeat; background-attachment: scroll, scroll; background-image: url(&quot;//bearsthemes.com/themes/alone-foundation/wp-content/uploads/2018/04/Untitled-8.jpg&quot;), none; background-size: cover, auto; background-origin: padding-box, padding-box; background-clip: border-box, border-box;">

    <div class="container" style="padding-top: 200px;padding-bottom: 120px;">
        <div class="row">
            <div class="col-sm-12">
                <div class="fw-heading fw-content-align-center">
                    <h1 class="fw-special-title">Dashboard</h1>
                    <div class="breadcrumbs">
                        <span class="first-item">
                            <a href="https://jedaitestbed.in/zed/">Homepage</a></span>
                        <span class="separator"><span class="ion-ios-arrow-right"></span></span>
                        <span class="last-item">Dashboard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
$redirect_url = BASE_URL.'my-account/edit-account/';
/* if ( isset($_SESSION['referer_url']) ):
    $redirect_url = $_SESSION['referer_url'];
    unset( $_SESSION['referer_url'] );
endif; */
?>
<section class="bt-default-page bt-main-row bt-section-space " role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="container ">
        <div class="row">
            <div class="bt-content-area col-md-12">
                <div class="bt-inner">
                    <article id="page-57" class="post post-details" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
                        <div class="inner">
                            <div class="entry-content" itemprop="text">
                                <div class="woocommerce">
                                    <div class="woocommerce-notices-wrapper"></div>

                                    <div class="u-columns col2-set" id="customer_login">

                                        <div class="u-column1 col-1">


                                            <h2>Login</h2>

                                            <form class="otpform" style="border: 1px solid #d3ced2; padding: 20px; margin: 2em 0; margin-bottom: 2em; text-align: left; border-radius: 5px;">
                                                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label class=""> Phone&nbsp;<span class="required">*</span></label>

                                                    <div class="">

                                                        <select class="" id="countrycode" name="reg-phone-cc" tabindex="-1" aria-hidden="true" style="height: 42px; line-height: 42px;">
                                                            <option disabled="">Select Country Code</option>


                                                            <option value="+880">BD +880</option>


                                                            <option value="+32">BE +32</option>


                                                            <option value="+226">BF +226</option>


                                                            <option value="+359">BG +359</option>


                                                            <option value="+387">BA +387</option>


                                                            <option value="+1246">BB +1246</option>


                                                            <option value="+681">WF +681</option>


                                                            <option value="+590">BL +590</option>


                                                            <option value="+1441">BM +1441</option>


                                                            <option value="+673">BN +673</option>


                                                            <option value="+591">BO +591</option>


                                                            <option value="+973">BH +973</option>


                                                            <option value="+257">BI +257</option>


                                                            <option value="+229">BJ +229</option>


                                                            <option value="+975">BT +975</option>


                                                            <option value="+1876">JM +1876</option>


                                                            <option value="+267">BW +267</option>


                                                            <option value="+685">WS +685</option>


                                                            <option value="+599">BQ +599</option>


                                                            <option value="+55">BR +55</option>


                                                            <option value="+1242">BS +1242</option>


                                                            <option value="+441534">JE +441534</option>


                                                            <option value="+375">BY +375</option>


                                                            <option value="+501">BZ +501</option>


                                                            <option value="+7">RU +7</option>


                                                            <option value="+250">RW +250</option>


                                                            <option value="+381">RS +381</option>


                                                            <option value="+670">TL +670</option>


                                                            <option value="+262">RE +262</option>


                                                            <option value="+993">TM +993</option>


                                                            <option value="+992">TJ +992</option>


                                                            <option value="+40">RO +40</option>


                                                            <option value="+690">TK +690</option>


                                                            <option value="+245">GW +245</option>


                                                            <option value="+1671">GU +1671</option>


                                                            <option value="+502">GT +502</option>


                                                            <option value="+30">GR +30</option>


                                                            <option value="+240">GQ +240</option>


                                                            <option value="+590">GP +590</option>


                                                            <option value="+81">JP +81</option>


                                                            <option value="+592">GY +592</option>


                                                            <option value="+441481">GG +441481</option>


                                                            <option value="+594">GF +594</option>


                                                            <option value="+995">GE +995</option>


                                                            <option value="+1473">GD +1473</option>


                                                            <option value="+44">GB +44</option>


                                                            <option value="+241">GA +241</option>


                                                            <option value="+503">SV +503</option>


                                                            <option value="+224">GN +224</option>


                                                            <option value="+220">GM +220</option>


                                                            <option value="+299">GL +299</option>


                                                            <option value="+350">GI +350</option>


                                                            <option value="+233">GH +233</option>


                                                            <option value="+968">OM +968</option>


                                                            <option value="+216">TN +216</option>


                                                            <option value="+962">JO +962</option>


                                                            <option value="+385">HR +385</option>


                                                            <option value="+509">HT +509</option>


                                                            <option value="+36">HU +36</option>


                                                            <option value="+852">HK +852</option>


                                                            <option value="+504">HN +504</option>


                                                            <option value="+58">VE +58</option>


                                                            <option value="+1787">PR +1787</option>


                                                            <option value="+970">PS +970</option>


                                                            <option value="+680">PW +680</option>


                                                            <option value="+351">PT +351</option>


                                                            <option value="+47">SJ +47</option>


                                                            <option value="+595">PY +595</option>


                                                            <option value="+964">IQ +964</option>


                                                            <option value="+507">PA +507</option>


                                                            <option value="+689">PF +689</option>


                                                            <option value="+675">PG +675</option>


                                                            <option value="+51">PE +51</option>


                                                            <option value="+92">PK +92</option>


                                                            <option value="+63">PH +63</option>


                                                            <option value="+870">PN +870</option>


                                                            <option value="+48">PL +48</option>


                                                            <option value="+508">PM +508</option>


                                                            <option value="+260">ZM +260</option>


                                                            <option value="+212">EH +212</option>


                                                            <option value="+372">EE +372</option>


                                                            <option value="+20">EG +20</option>


                                                            <option value="+27">ZA +27</option>


                                                            <option value="+593">EC +593</option>


                                                            <option value="+39">IT +39</option>


                                                            <option value="+84">VN +84</option>


                                                            <option value="+677">SB +677</option>


                                                            <option value="+251">ET +251</option>


                                                            <option value="+252">SO +252</option>


                                                            <option value="+263">ZW +263</option>


                                                            <option value="+966">SA +966</option>


                                                            <option value="+34">ES +34</option>


                                                            <option value="+291">ER +291</option>


                                                            <option value="+382">ME +382</option>


                                                            <option value="+373">MD +373</option>


                                                            <option value="+261">MG +261</option>


                                                            <option value="+590">MF +590</option>


                                                            <option value="+212">MA +212</option>


                                                            <option value="+377">MC +377</option>


                                                            <option value="+998">UZ +998</option>


                                                            <option value="+95">MM +95</option>


                                                            <option value="+223">ML +223</option>


                                                            <option value="+853">MO +853</option>


                                                            <option value="+976">MN +976</option>


                                                            <option value="+692">MH +692</option>


                                                            <option value="+389">MK +389</option>


                                                            <option value="+230">MU +230</option>


                                                            <option value="+356">MT +356</option>


                                                            <option value="+265">MW +265</option>


                                                            <option value="+960">MV +960</option>


                                                            <option value="+596">MQ +596</option>


                                                            <option value="+1670">MP +1670</option>


                                                            <option value="+1664">MS +1664</option>


                                                            <option value="+222">MR +222</option>


                                                            <option value="+441624">IM +441624</option>


                                                            <option value="+256">UG +256</option>


                                                            <option value="+255">TZ +255</option>


                                                            <option value="+60">MY +60</option>


                                                            <option value="+52">MX +52</option>


                                                            <option value="+972">IL +972</option>


                                                            <option value="+33">FR +33</option>


                                                            <option value="+246">IO +246</option>


                                                            <option value="+290">SH +290</option>


                                                            <option value="+358">FI +358</option>


                                                            <option value="+679">FJ +679</option>


                                                            <option value="+500">FK +500</option>


                                                            <option value="+691">FM +691</option>


                                                            <option value="+298">FO +298</option>


                                                            <option value="+505">NI +505</option>


                                                            <option value="+31">NL +31</option>


                                                            <option value="+47">NO +47</option>


                                                            <option value="+264">NA +264</option>


                                                            <option value="+678">VU +678</option>


                                                            <option value="+687">NC +687</option>


                                                            <option value="+227">NE +227</option>


                                                            <option value="+672">NF +672</option>


                                                            <option value="+234">NG +234</option>


                                                            <option value="+64">NZ +64</option>


                                                            <option value="+977">NP +977</option>


                                                            <option value="+674">NR +674</option>


                                                            <option value="+683">NU +683</option>


                                                            <option value="+682">CK +682</option>


                                                            <option value="+225">CI +225</option>


                                                            <option value="+41">CH +41</option>


                                                            <option value="+57">CO +57</option>


                                                            <option value="+86">CN +86</option>


                                                            <option value="+237">CM +237</option>


                                                            <option value="+56">CL +56</option>


                                                            <option value="+61">CC +61</option>


                                                            <option value="+1">CA +1</option>


                                                            <option value="+242">CG +242</option>


                                                            <option value="+236">CF +236</option>


                                                            <option value="+243">CD +243</option>


                                                            <option value="+420">CZ +420</option>


                                                            <option value="+357">CY +357</option>


                                                            <option value="+61">CX +61</option>


                                                            <option value="+506">CR +506</option>


                                                            <option value="+599">CW +599</option>


                                                            <option value="+238">CV +238</option>


                                                            <option value="+53">CU +53</option>


                                                            <option value="+268">SZ +268</option>


                                                            <option value="+963">SY +963</option>


                                                            <option value="+599">SX +599</option>


                                                            <option value="+996">KG +996</option>


                                                            <option value="+254">KE +254</option>


                                                            <option value="+211">SS +211</option>


                                                            <option value="+597">SR +597</option>


                                                            <option value="+686">KI +686</option>


                                                            <option value="+855">KH +855</option>


                                                            <option value="+1869">KN +1869</option>


                                                            <option value="+269">KM +269</option>


                                                            <option value="+239">ST +239</option>


                                                            <option value="+421">SK +421</option>


                                                            <option value="+82">KR +82</option>


                                                            <option value="+386">SI +386</option>


                                                            <option value="+850">KP +850</option>


                                                            <option value="+965">KW +965</option>


                                                            <option value="+221">SN +221</option>


                                                            <option value="+378">SM +378</option>


                                                            <option value="+232">SL +232</option>


                                                            <option value="+248">SC +248</option>


                                                            <option value="+7">KZ +7</option>


                                                            <option value="+1345">KY +1345</option>


                                                            <option value="+65">SG +65</option>


                                                            <option value="+46">SE +46</option>


                                                            <option value="+249">SD +249</option>


                                                            <option value="+1809">DO +1809</option>


                                                            <option value="+1767">DM +1767</option>


                                                            <option value="+253">DJ +253</option>


                                                            <option value="+45">DK +45</option>


                                                            <option value="+1284">VG +1284</option>


                                                            <option value="+49">DE +49</option>


                                                            <option value="+967">YE +967</option>


                                                            <option value="+213">DZ +213</option>


                                                            <option value="+1">US +1</option>


                                                            <option value="+598">UY +598</option>


                                                            <option value="+262">YT +262</option>


                                                            <option value="+961">LB +961</option>


                                                            <option value="+1758">LC +1758</option>


                                                            <option value="+856">LA +856</option>


                                                            <option value="+688">TV +688</option>


                                                            <option value="+886">TW +886</option>


                                                            <option value="+1868">TT +1868</option>


                                                            <option value="+90">TR +90</option>


                                                            <option value="+94">LK +94</option>


                                                            <option value="+423">LI +423</option>


                                                            <option value="+371">LV +371</option>


                                                            <option value="+676">TO +676</option>


                                                            <option value="+370">LT +370</option>


                                                            <option value="+352">LU +352</option>


                                                            <option value="+231">LR +231</option>


                                                            <option value="+266">LS +266</option>


                                                            <option value="+66">TH +66</option>


                                                            <option value="+228">TG +228</option>


                                                            <option value="+235">TD +235</option>


                                                            <option value="+1649">TC +1649</option>


                                                            <option value="+218">LY +218</option>


                                                            <option value="+379">VA +379</option>


                                                            <option value="+1784">VC +1784</option>


                                                            <option value="+971">AE +971</option>


                                                            <option value="+376">AD +376</option>


                                                            <option value="+1268">AG +1268</option>


                                                            <option value="+93">AF +93</option>


                                                            <option value="+1264">AI +1264</option>


                                                            <option value="+1340">VI +1340</option>


                                                            <option value="+354">IS +354</option>


                                                            <option value="+98">IR +98</option>


                                                            <option value="+374">AM +374</option>


                                                            <option value="+355">AL +355</option>


                                                            <option value="+244">AO +244</option>


                                                            <option value="+1684">AS +1684</option>


                                                            <option value="+54">AR +54</option>


                                                            <option value="+61">AU +61</option>


                                                            <option value="+43">AT +43</option>


                                                            <option value="+297">AW +297</option>


                                                            <option value="+91" selected="" data-select2-id="select2-data-3-eg1y">IN +91</option>


                                                            <option value="+35818">AX +35818</option>


                                                            <option value="+994">AZ +994</option>


                                                            <option value="+353">IE +353</option>


                                                            <option value="+62">ID +62</option>


                                                            <option value="+380">UA +380</option>


                                                            <option value="+974">QA +974</option>


                                                            <option value="+258">MZ +258</option>


                                                        </select>

                                                        <div class="" style="position: relative;margin-top:10px;">

                                                            <input type="text" id="mobilenumber" class="woocommerce-Input input-text woocommerce-Input--text" name="reg-phone" autocomplete="tel" value="" required="">

                                                            <div class="">

                                                                <div class="otpscreen" style="display:none;">

                                                                    <input type="text" style="margin-top: 10px;" id="enterotp" name="xoo-ml-otp-input" placeholder="Enter OTP" class="woocommerce-Input input-text woocommerce-Input--text">

                                                                    <div class="xoo-ml-otp-resend">
                                                                        <a id="loginvotpresend" class="xoo-ml-otp-resend-link">Not received your code? Resend code</a>
                                                                        <span class="xoo-ml-otp-resend-timer"></span>
                                                                    </div>

                                                                </div>

                                                                <span class="xoo-ml-otp-no-txt"></span>
                                                            </div>

                                                            <div class="xoo-ml-notice"></div>


                                                        </div>

                                                    </div>


                                                    <input type="hidden" id="otpsend" name="otpsend" value="0">

                                                </div>


                                                <button type="button" id="loginvotp" style="width: 100% !important;background: #0ec4f7;color: #fff !important;" class="xoo-ml-login-otp-btn button btn ">Login via OTP</button>

                                                <br>

                                                <p class="norecord" style="text-align: center;margin-top: 5px;color: red; display:none;">No record exist.</p>
                                                <p class="blankmob" style="text-align: center;margin-top: 5px;color: red; display:none;">Please enter mobile number.</p>
                                                <p class="wrongotp" style="text-align: center;margin-top: 5px;color: red; display:none;">Wrong OTP.</p>
                                                <br>
                                                <a class="emailformclick" style="background: none !important;margin-top: 10px;border: none;color: #08b4e4 !important;padding-left: 3px !important;text-transform: capitalize !important;font-size: 18px !important;cursor:pointer;" class="xoo-ml-low-back button btn">Login via Password</a>


                                            </form>

                                            <form class="emailform" style="border: 1px solid #d3ced2; padding: 20px; margin: 2em 0; margin-bottom: 2em; text-align: left; border-radius: 5px; display: none;">

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

                                                    <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>

                                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value=""> </p>


                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

                                                    <label for="reg_password">Password&nbsp;<span class="required">*</span></label>

                                                    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password">

                                                </p>
                                                <p class="woocommerce-form-row form-row">

                                                    <button type="button" id="loginvemail" style="width: 100% !important;background: #0ec4f7;color: #fff !important;" class="xoo-ml-login-otp-btn button btn ">Login</button>

                                                    <br>

                                                    <p class="blankemail" style="text-align: center;margin-top: 5px;color: red; display:none;">Email and password are required.</p>
                                                    <p class="norecordemail" style="text-align: center;margin-top: 5px;color: red; display:none;">No record exist.</p>
                                                    <br>
                                                    <a class="otpformclick" style="background: none !important;margin-top: 10px;border: none;color: #08b4e4 !important;padding-left: 3px !important;text-transform: capitalize !important;font-size: 18px !important;cursor:pointer;" class="xoo-ml-low-back button btn">Login via OTP</a>

                                                </p>

                                            </form>

                                        </div>

                                        <script>
                                            jQuery(".otpformclick").click(function() {
                                                jQuery(".otpform").css("display", "");
                                                jQuery(".emailform").css("display", "none");
                                            });

                                            jQuery(".emailformclick").click(function() {
                                                jQuery(".otpform").css("display", "none");
                                                jQuery(".emailform").css("display", "");
                                            });

                                            jQuery("#loginvemail").click(function() {

                                                showLoadingBar();

                                                var reg_email = jQuery("#reg_email").val();
                                                var reg_password = jQuery("#reg_password").val();
                                                if (reg_email && reg_password) {
                                                    jQuery(".blankemail").css("display", "none");
                                                    jQuery.ajax({
                                                        url: '<?php echo BASE_URL . 'checkemaillogin.php' ?>',
                                                        type: "POST",
                                                        data: {
                                                            reg_email: reg_email,
                                                            reg_password: reg_password,
                                                        },
                                                        success: function(response) {
                                                            console.log(response);
                                                            if (response == 1) {
                                                                jQuery(".norecordemail").css("display", "none");
                                                            window.location.href = "<?= $redirect_url ?>";
                                                            } else if (response == 'norecord') {
                                                                jQuery(".norecordemail").css("display", "");
                                                            } else {
                                                                jQuery(".norecordemail").css("display", "");
                                                            }
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        },
                                                        error: function(jqXHR, exception) {
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        }
                                                    });
                                                } else {
                                                    jQuery(".blankemail").css("display", "");
                                                    hideLoadingBar();
                                                }


                                            });

                                            jQuery("#loginvotpresend").click(function() {
                                                showLoadingBar();

                                                jQuery(".otpscreen").css("display", "none");
                                                var countrycode = jQuery("#countrycode").val();
                                                var mobilenumber = jQuery("#mobilenumber").val();
                                                if (mobilenumber) {
                                                    jQuery(".blankmob").css("display", "none");
                                                    jQuery.ajax({
                                                        url: '<?php echo BASE_URL . 'checkotp.php' ?>',
                                                        type: "POST",
                                                        data: {
                                                            mobilenumber: countrycode + mobilenumber,
                                                        },
                                                        success: function(response) {
                                                            console.log(response);
                                                            if (response == 1) {
                                                                jQuery(".otpscreen").css("display", "");
                                                                jQuery("#otpsend").val("1");
                                                                jQuery(".norecord").css("display", "none");
                                                            } else if (response == 'norecord') {
                                                                jQuery(".norecord").css("display", "");
                                                                jQuery("#otpsend").val("0");
                                                            } else {
                                                                jQuery(".norecord").css("display", "");
                                                                jQuery("#otpsend").val("0");
                                                            }
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        },
                                                        error: function(jqXHR, exception) {
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        }
                                                    });
                                                } else {
                                                    jQuery(".blankmob").css("display", "");
                                                    hideLoadingBar();
                                                }


                                            });

                                            jQuery("#loginvotp").click(function() {
                                                showLoadingBar();
                                                var otpsend = jQuery("#otpsend").val();
                                                if (otpsend == 0) {
                                                    jQuery(".otpscreen").css("display", "none");
                                                    var countrycode = jQuery("#countrycode").val();
                                                    var mobilenumber = jQuery("#mobilenumber").val();
                                                    if (mobilenumber) {
                                                        jQuery(".blankmob").css("display", "none");
                                                        jQuery.ajax({
                                                            url: '<?php echo BASE_URL . 'checkotp.php' ?>',
                                                            type: "POST",
                                                            data: {
                                                                mobilenumber: countrycode + mobilenumber,
                                                            },
                                                            success: function(response) {
                                                                console.log(response);
                                                                if (response == 1) {
                                                                    jQuery(".otpscreen").css("display", "");
                                                                    jQuery("#otpsend").val("1");
                                                                    jQuery(".norecord").css("display", "none");
                                                                } else if (response == 'norecord') {
                                                                    jQuery(".norecord").css("display", "");
                                                                    jQuery("#otpsend").val("0");
                                                                } else {
                                                                    jQuery(".norecord").css("display", "");
                                                                    jQuery("#otpsend").val("0");
                                                                }
                                                                hideLoadingBar();
                                                                event.preventDefault();
                                                            },
                                                            error: function(jqXHR, exception) {
                                                                hideLoadingBar();
                                                                event.preventDefault();
                                                            }
                                                        });
                                                    } else {
                                                        jQuery(".blankmob").css("display", "");
                                                        hideLoadingBar();
                                                    }

                                                } else {
                                                    var countrycode = jQuery("#countrycode").val();
                                                    var mobilenumber = jQuery("#mobilenumber").val();
                                                    var enterotp = jQuery("#enterotp").val();
                                                    jQuery.ajax({
                                                        url: '<?php echo BASE_URL . 'checkotp2.php' ?>',
                                                        type: "POST",
                                                        data: {
                                                            enterotp: enterotp,
                                                            mobilenumber: countrycode + mobilenumber,
                                                        },
                                                        success: function(response) {
                                                            console.log(response);
                                                            if (response == 1) {
                                                                window.location.href = "<?= $redirect_url ?>";
                                                            } else if (response == 'norecord') {
                                                                jQuery(".norecord").css("display", "");
                                                            } else if (response == 'wrongotp') {
                                                                jQuery(".wrongotp").css("display", "");
                                                            } else {
                                                                jQuery(".norecord").css("display", "");
                                                            }
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        },
                                                        error: function(jqXHR, exception) {
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        }
                                                    });
                                                }
                                            });

                                            function showLoadingBar() {
                                                jQuery('.loadingBar').show();
                                            }

                                            function hideLoadingBar() {
                                                jQuery('.loadingBar').hide();
                                            }
                                            window.onbeforeunload = function() {
                                                showLoadingBar();
                                            }
                                            jQuery(window).on('load', function() {
                                                hideLoadingBar();
                                            });
                                        </script>


                                        <div class="u-column2 col-2">

                                            <h2>Register</h2>

                                            <form method="post" class="" style="border: 1px solid #d3ced2; padding: 20px; margin: 2em 0; margin-bottom: 2em; text-align: left; border-radius: 5px;">

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="reg_firstname">First Name&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_firstname" id="reg_firstname" autocomplete="firstname" value=""> </p>
                                                <p style="color:red;display:none;" class="errorfname">First name is required.</p>

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="reg_lastname">Last Name&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value=""> </p>
                                                <p style="color:red;display:none;" class="errorlname">Last name is required.</p>

                                                <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label class=""> Phone&nbsp;<span class="required">*</span></label>

                                                    <div class="">
                                                        <select id="countrycoder" class="" name="reg-phone-cc" tabindex="-1" aria-hidden="true" style="height: 42px; line-height: 42px;">
                                                            <option disabled="">Select Country Code</option>


                                                            <option value="+880">BD +880</option>


                                                            <option value="+32">BE +32</option>


                                                            <option value="+226">BF +226</option>


                                                            <option value="+359">BG +359</option>


                                                            <option value="+387">BA +387</option>


                                                            <option value="+1246">BB +1246</option>


                                                            <option value="+681">WF +681</option>


                                                            <option value="+590">BL +590</option>


                                                            <option value="+1441">BM +1441</option>


                                                            <option value="+673">BN +673</option>


                                                            <option value="+591">BO +591</option>


                                                            <option value="+973">BH +973</option>


                                                            <option value="+257">BI +257</option>


                                                            <option value="+229">BJ +229</option>


                                                            <option value="+975">BT +975</option>


                                                            <option value="+1876">JM +1876</option>


                                                            <option value="+267">BW +267</option>


                                                            <option value="+685">WS +685</option>


                                                            <option value="+599">BQ +599</option>


                                                            <option value="+55">BR +55</option>


                                                            <option value="+1242">BS +1242</option>


                                                            <option value="+441534">JE +441534</option>


                                                            <option value="+375">BY +375</option>


                                                            <option value="+501">BZ +501</option>


                                                            <option value="+7">RU +7</option>


                                                            <option value="+250">RW +250</option>


                                                            <option value="+381">RS +381</option>


                                                            <option value="+670">TL +670</option>


                                                            <option value="+262">RE +262</option>


                                                            <option value="+993">TM +993</option>


                                                            <option value="+992">TJ +992</option>


                                                            <option value="+40">RO +40</option>


                                                            <option value="+690">TK +690</option>


                                                            <option value="+245">GW +245</option>


                                                            <option value="+1671">GU +1671</option>


                                                            <option value="+502">GT +502</option>


                                                            <option value="+30">GR +30</option>


                                                            <option value="+240">GQ +240</option>


                                                            <option value="+590">GP +590</option>


                                                            <option value="+81">JP +81</option>


                                                            <option value="+592">GY +592</option>


                                                            <option value="+441481">GG +441481</option>


                                                            <option value="+594">GF +594</option>


                                                            <option value="+995">GE +995</option>


                                                            <option value="+1473">GD +1473</option>


                                                            <option value="+44">GB +44</option>


                                                            <option value="+241">GA +241</option>


                                                            <option value="+503">SV +503</option>


                                                            <option value="+224">GN +224</option>


                                                            <option value="+220">GM +220</option>


                                                            <option value="+299">GL +299</option>


                                                            <option value="+350">GI +350</option>


                                                            <option value="+233">GH +233</option>


                                                            <option value="+968">OM +968</option>


                                                            <option value="+216">TN +216</option>


                                                            <option value="+962">JO +962</option>


                                                            <option value="+385">HR +385</option>


                                                            <option value="+509">HT +509</option>


                                                            <option value="+36">HU +36</option>


                                                            <option value="+852">HK +852</option>


                                                            <option value="+504">HN +504</option>


                                                            <option value="+58">VE +58</option>


                                                            <option value="+1787">PR +1787</option>


                                                            <option value="+970">PS +970</option>


                                                            <option value="+680">PW +680</option>


                                                            <option value="+351">PT +351</option>


                                                            <option value="+47">SJ +47</option>


                                                            <option value="+595">PY +595</option>


                                                            <option value="+964">IQ +964</option>


                                                            <option value="+507">PA +507</option>


                                                            <option value="+689">PF +689</option>


                                                            <option value="+675">PG +675</option>


                                                            <option value="+51">PE +51</option>


                                                            <option value="+92">PK +92</option>


                                                            <option value="+63">PH +63</option>


                                                            <option value="+870">PN +870</option>


                                                            <option value="+48">PL +48</option>


                                                            <option value="+508">PM +508</option>


                                                            <option value="+260">ZM +260</option>


                                                            <option value="+212">EH +212</option>


                                                            <option value="+372">EE +372</option>


                                                            <option value="+20">EG +20</option>


                                                            <option value="+27">ZA +27</option>


                                                            <option value="+593">EC +593</option>


                                                            <option value="+39">IT +39</option>


                                                            <option value="+84">VN +84</option>


                                                            <option value="+677">SB +677</option>


                                                            <option value="+251">ET +251</option>


                                                            <option value="+252">SO +252</option>


                                                            <option value="+263">ZW +263</option>


                                                            <option value="+966">SA +966</option>


                                                            <option value="+34">ES +34</option>


                                                            <option value="+291">ER +291</option>


                                                            <option value="+382">ME +382</option>


                                                            <option value="+373">MD +373</option>


                                                            <option value="+261">MG +261</option>


                                                            <option value="+590">MF +590</option>


                                                            <option value="+212">MA +212</option>


                                                            <option value="+377">MC +377</option>


                                                            <option value="+998">UZ +998</option>


                                                            <option value="+95">MM +95</option>


                                                            <option value="+223">ML +223</option>


                                                            <option value="+853">MO +853</option>


                                                            <option value="+976">MN +976</option>


                                                            <option value="+692">MH +692</option>


                                                            <option value="+389">MK +389</option>


                                                            <option value="+230">MU +230</option>


                                                            <option value="+356">MT +356</option>


                                                            <option value="+265">MW +265</option>


                                                            <option value="+960">MV +960</option>


                                                            <option value="+596">MQ +596</option>


                                                            <option value="+1670">MP +1670</option>


                                                            <option value="+1664">MS +1664</option>


                                                            <option value="+222">MR +222</option>


                                                            <option value="+441624">IM +441624</option>


                                                            <option value="+256">UG +256</option>


                                                            <option value="+255">TZ +255</option>


                                                            <option value="+60">MY +60</option>


                                                            <option value="+52">MX +52</option>


                                                            <option value="+972">IL +972</option>


                                                            <option value="+33">FR +33</option>


                                                            <option value="+246">IO +246</option>


                                                            <option value="+290">SH +290</option>


                                                            <option value="+358">FI +358</option>


                                                            <option value="+679">FJ +679</option>


                                                            <option value="+500">FK +500</option>


                                                            <option value="+691">FM +691</option>


                                                            <option value="+298">FO +298</option>


                                                            <option value="+505">NI +505</option>


                                                            <option value="+31">NL +31</option>


                                                            <option value="+47">NO +47</option>


                                                            <option value="+264">NA +264</option>


                                                            <option value="+678">VU +678</option>


                                                            <option value="+687">NC +687</option>


                                                            <option value="+227">NE +227</option>


                                                            <option value="+672">NF +672</option>


                                                            <option value="+234">NG +234</option>


                                                            <option value="+64">NZ +64</option>


                                                            <option value="+977">NP +977</option>


                                                            <option value="+674">NR +674</option>


                                                            <option value="+683">NU +683</option>


                                                            <option value="+682">CK +682</option>


                                                            <option value="+225">CI +225</option>


                                                            <option value="+41">CH +41</option>


                                                            <option value="+57">CO +57</option>


                                                            <option value="+86">CN +86</option>


                                                            <option value="+237">CM +237</option>


                                                            <option value="+56">CL +56</option>


                                                            <option value="+61">CC +61</option>


                                                            <option value="+1">CA +1</option>


                                                            <option value="+242">CG +242</option>


                                                            <option value="+236">CF +236</option>


                                                            <option value="+243">CD +243</option>


                                                            <option value="+420">CZ +420</option>


                                                            <option value="+357">CY +357</option>


                                                            <option value="+61">CX +61</option>


                                                            <option value="+506">CR +506</option>


                                                            <option value="+599">CW +599</option>


                                                            <option value="+238">CV +238</option>


                                                            <option value="+53">CU +53</option>


                                                            <option value="+268">SZ +268</option>


                                                            <option value="+963">SY +963</option>


                                                            <option value="+599">SX +599</option>


                                                            <option value="+996">KG +996</option>


                                                            <option value="+254">KE +254</option>


                                                            <option value="+211">SS +211</option>


                                                            <option value="+597">SR +597</option>


                                                            <option value="+686">KI +686</option>


                                                            <option value="+855">KH +855</option>


                                                            <option value="+1869">KN +1869</option>


                                                            <option value="+269">KM +269</option>


                                                            <option value="+239">ST +239</option>


                                                            <option value="+421">SK +421</option>


                                                            <option value="+82">KR +82</option>


                                                            <option value="+386">SI +386</option>


                                                            <option value="+850">KP +850</option>


                                                            <option value="+965">KW +965</option>


                                                            <option value="+221">SN +221</option>


                                                            <option value="+378">SM +378</option>


                                                            <option value="+232">SL +232</option>


                                                            <option value="+248">SC +248</option>


                                                            <option value="+7">KZ +7</option>


                                                            <option value="+1345">KY +1345</option>


                                                            <option value="+65">SG +65</option>


                                                            <option value="+46">SE +46</option>


                                                            <option value="+249">SD +249</option>


                                                            <option value="+1809">DO +1809</option>


                                                            <option value="+1767">DM +1767</option>


                                                            <option value="+253">DJ +253</option>


                                                            <option value="+45">DK +45</option>


                                                            <option value="+1284">VG +1284</option>


                                                            <option value="+49">DE +49</option>


                                                            <option value="+967">YE +967</option>


                                                            <option value="+213">DZ +213</option>


                                                            <option value="+1">US +1</option>


                                                            <option value="+598">UY +598</option>


                                                            <option value="+262">YT +262</option>


                                                            <option value="+961">LB +961</option>


                                                            <option value="+1758">LC +1758</option>


                                                            <option value="+856">LA +856</option>


                                                            <option value="+688">TV +688</option>


                                                            <option value="+886">TW +886</option>


                                                            <option value="+1868">TT +1868</option>


                                                            <option value="+90">TR +90</option>


                                                            <option value="+94">LK +94</option>


                                                            <option value="+423">LI +423</option>


                                                            <option value="+371">LV +371</option>


                                                            <option value="+676">TO +676</option>


                                                            <option value="+370">LT +370</option>


                                                            <option value="+352">LU +352</option>


                                                            <option value="+231">LR +231</option>


                                                            <option value="+266">LS +266</option>


                                                            <option value="+66">TH +66</option>


                                                            <option value="+228">TG +228</option>


                                                            <option value="+235">TD +235</option>


                                                            <option value="+1649">TC +1649</option>


                                                            <option value="+218">LY +218</option>


                                                            <option value="+379">VA +379</option>


                                                            <option value="+1784">VC +1784</option>


                                                            <option value="+971">AE +971</option>


                                                            <option value="+376">AD +376</option>


                                                            <option value="+1268">AG +1268</option>


                                                            <option value="+93">AF +93</option>


                                                            <option value="+1264">AI +1264</option>


                                                            <option value="+1340">VI +1340</option>


                                                            <option value="+354">IS +354</option>


                                                            <option value="+98">IR +98</option>


                                                            <option value="+374">AM +374</option>


                                                            <option value="+355">AL +355</option>


                                                            <option value="+244">AO +244</option>


                                                            <option value="+1684">AS +1684</option>


                                                            <option value="+54">AR +54</option>


                                                            <option value="+61">AU +61</option>


                                                            <option value="+43">AT +43</option>


                                                            <option value="+297">AW +297</option>


                                                            <option value="+91" selected="" data-select2-id="select2-data-3-eg1y">IN +91</option>


                                                            <option value="+35818">AX +35818</option>


                                                            <option value="+994">AZ +994</option>


                                                            <option value="+353">IE +353</option>


                                                            <option value="+62">ID +62</option>


                                                            <option value="+380">UA +380</option>


                                                            <option value="+974">QA +974</option>


                                                            <option value="+258">MZ +258</option>


                                                        </select>
                                                        <div class="" style="position: relative;;margin-top:10px;">

                                                            <input type="text" class="woocommerce-Input input-text woocommerce-Input--text" name="reg-phone" id="reg_phone" autocomplete="tel" value="" required="">

                                                            <p style="color:red;display:none;" class="errorphone">Phone number is required.</p>


                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="otpsend" value="0">

                                                </div>

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

                                                    <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>

                                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_emailr" autocomplete="email" value="">

                                                </p>
                                                <p style="color:red;display:none;" class="erroremail">Email is required.</p>

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">

                                                    <label for="reg_passwordr">Password&nbsp;<span class="required">*</span></label>

                                                    <span class="password-input">
                                                        <input type="password" class="woocommerce-Input--text input-text" name="password" id="reg_passwordr" autocomplete="new-password">
                                                    </span>

                                                </p>
                                                <p style="color:red;display:none;" class="errorpwd">Password is required.</p>

                                                <div class="woocommerce-privacy-policy-text"></div>
                                                <p class="woocommerce-form-row form-row">
                                                    <button type="button" id="userregister" style="width: 100% !important;background: #0ec4f7;color: #fff !important;" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>

                                                    <br>

                                                    <p class="validemail" style="text-align: center;margin-top: 5px;color: red; display:none;">Please enter a valid email.</p>

                                                    <p class="emailexist" style="text-align: center;margin-top: 5px;color: red; display:none;">This email address is already in use.</p>


                                                    <p class="phoneexist" style="text-align: center;margin-top: 5px;color: red; display:none;">This phone number is already in use.</p>

                                                </p>

                                            </form>

                                        </div>

                                        <script>
                                            jQuery("#userregister").click(function() {

                                                showLoadingBar();

                                                var reg_firstname = jQuery("#reg_firstname").val();
                                                var reg_lastname = jQuery("#reg_lastname").val();
                                                var countrycode = jQuery("#countrycoder").val();
                                                var reg_phone = jQuery("#reg_phone").val();
                                                var reg_email = jQuery("#reg_emailr").val();
                                                var reg_password = jQuery("#reg_passwordr").val();

                                                if (reg_firstname == '') {
                                                    ferror = 0;
                                                    jQuery(".errorfname").css("display", "");
                                                } else {
                                                    jQuery(".errorfname").css("display", "none");
                                                    ferror = 1;
                                                }

                                                if (reg_lastname == '') {
                                                    lerror = 0;
                                                    jQuery(".errorlname").css("display", "");
                                                } else {
                                                    lerror = 1;
                                                    jQuery(".errorlname").css("display", "none");
                                                }

                                                if (reg_phone == '') {
                                                    perror = 0;
                                                    jQuery(".errorphone").css("display", "");
                                                } else {
                                                    perror = 1;
                                                    jQuery(".errorphone").css("display", "none");
                                                }

                                                if (reg_email == '') {
                                                    eerror = 0;
                                                    jQuery(".erroremail").css("display", "");
                                                } else {
                                                    eerror = 1;
                                                    jQuery(".erroremail").css("display", "none");
                                                }

                                                if (reg_password == '') {
                                                    pwerror = 0;
                                                    jQuery(".errorpwd").css("display", "");
                                                } else {
                                                    pwerror = 1;
                                                    jQuery(".errorpwd").css("display", "none");
                                                }

                                                if (ferror == 1 && lerror == 1 && perror == 1 && eerror == 1 && pwerror == 1) {

                                                    jQuery(".blankemail").css("display", "none");
                                                    jQuery.ajax({
                                                        url: '<?php echo BASE_URL . 'checkreg.php' ?>',
                                                        type: "POST",
                                                        data: {
                                                            reg_firstname: reg_firstname,
                                                            reg_lastname: reg_lastname,
                                                            countrycode: countrycode,
                                                            mobilenumber: reg_phone,
                                                            reg_phone: countrycode + reg_phone,
                                                            reg_email: reg_email,
                                                            reg_password: reg_password,
                                                        },
                                                        success: function(response) {
                                                            console.log(response);
                                                            if (response == 1) {
                                                                // jQuery(".norecordemail").css("display", "none");
                                                                window.location.href = "<?= BASE_URL ?>my-account/edit-account/";
                                                            } else if (response == 'validemail') {
                                                                jQuery(".validemail").css("display", "");
                                                                jQuery(".emailexist").css("display", "none");
                                                                jQuery(".phoneexist").css("display", "none");
                                                            } else if (response == 'emailexist') {
                                                                jQuery(".emailexist").css("display", "");
                                                                jQuery(".phoneexist").css("display", "none");
                                                                jQuery(".validemail").css("display", "none");
                                                            } else if (response == 'phoneexist') {
                                                                jQuery(".phoneexist").css("display", "");
                                                                jQuery(".emailexist").css("display", "none");
                                                                jQuery(".validemail").css("display", "none");
                                                            } else {
                                                                // jQuery(".norecordemail").css("display", "");
                                                            }
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        },
                                                        error: function(jqXHR, exception) {
                                                            hideLoadingBar();
                                                            event.preventDefault();
                                                        }
                                                    });

                                                } else {
                                                    hideLoadingBar();
                                                }


                                            });
                                        </script>

                                    </div>

                                </div>
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