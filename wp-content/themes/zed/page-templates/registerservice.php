<?php
ob_start();
/**
 * Template Name: Register Service
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
get_header();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register For Service | Zed</title>
  <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.0/js/bootstrap.min.js"></script>
<style>
  * {
    box-sizing: border-box;
  }
  body {
    background: #f2f2f2;
  }
  .licause {
      margin-top: 13px;
      margin-bottom: 20px;
  }
  a.btn.btn-default.btn-rounded.mb-4 {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
  }
  a.btn.btn-default.btn-rounded.mb-4.add {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 4px 19px;
      font-size: 14px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-left: 10px;
      border-radius: 0;
      margin-top: 0px;
  }
  .radiobtn{
    width: 8%;
        font-size: 15px;
        margin: 0px !important;
        padding-left: 20px;
        height: 25px;
        border-radius: 10px;
        border: none;
        background: none;
        box-shadow:none;
    }
    ul.register-now {
        background: #3D3D8A !important;
        height: 45px;
        border-radius: 10px;
        width: 30%;
        text-align: center;
        font-size: 16px;
        margin-left: 13px;
        margin-bottom: 21px;
    }
    #regForm {
      background-color: #ffffff;
      margin: 100px auto;
      font-family: "Hind Vadodara", sans-serif;
      padding: 40px;
      width: 70%;
      box-shadow:0px 14px 60px rgb(0 0 0 / 6%);
      margin-top: 12%;
      border-radius:10px;
      min-width: 300px;
      background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
    }
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
      border-color: var(--ck-color-base-border);
      height: 200px;
    }
    h1 {
      text-align: center;
      font-weight: 500;
      margin-bottom: 30px !important;
    }
    input {
      padding: 10px;
      width: 100%;
      font-size: 15px;
      font-family: "Hind Vadodara", sans-serif;
      margin-bottom: 15px;
      padding-left: 20px;
      height: 50px;
      border-radius: 10px;
      border: none;
      background: #fff;
      box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
      outline: none;
    }
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    textarea.invalid {
      background-color: #ffdddd;
    }
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    button {
      background-color: #3D3D8A;
      color: #ffffff;
      border: none;
      padding: 10px 60px;
      font-size: 17px;
      font-family: "Hind Vadodara", sans-serif;
      cursor: pointer;
      margin-top: 20px;
      border-radius: 10px;
    }
    .modal-footer.d-flex.justify-content-center button {
      margin-top: 0px;
    }
    button.btn.btn-indigo:hover {
        color: #fff;
    }
    button:hover {
      opacity: 0.8;
    }
    #prevBtn {
      background-color: #bbbbbb;
    }
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    .step.active {
      opacity: 1;
    }
    a.tp-accountBtn {
      height: 40px;
      background: #fff;
      padding: 0px 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      text-transform: capitalize;
      font-size: 14px;
      color: #000;
      border: 2px solid #3d3d8a;
      transition: all 0.4s ease-in-out 0s;
      border-radius: 10px;
      float: left;
      margin-top: 20px;
      text-decoration: none;
    }
    .back-home :hover {
      background: #3D3D8A;
      color: #fff;
    }
  .drp {
    padding: 10px;
    width: 100%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    padding-left: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
    outline: none;
  }
  .drp1 {
    padding: 10px;
    width: 15%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    margin-right: 12px;
    padding-left: 20px;
    height: 50px;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
    outline: none;
  }
  .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
  .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
    border-radius: var(--ck-border-radius);
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    height: 200px !important;
  }
  /* Mark the steps that are finished and valid: */
  .step.finish {
    background-color: #04AA6D;
  }
  .ck.ck-editor {
    position: relative;
    border-radius: 10px !important;
    margin: 50px 0px 50px 0px;
  }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
  }
  th {
      background: #9e9e9e6e;
  }
  tr {
      background: #ddd;
  }
  tr:nth-child(even) {
    background-color: #fff;
  }
  .btn {
      margin-left: 0%;
  }
 .larges{
         width:75%;
     }
  @media (max-width: 767px) {
      
      .enddate {
    padding: 0px;
  }
      
      
      select#icon_id {
        width: 81% !important;
    }
      .drop-zone {
    max-width: 100%;
    height: 50%;
    padding: 4% 4% !important;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-family: "Quicksand", sans-serif;
    font-weight: 500;
    font-size: 20px;
    cursor: pointer;
    color: #cccccc;
    border: 4px dashed #3D3D8A;
    border-radius: 10px;
    
    
  }
     .drp1 {
          width: 30%;  
          padding-left: 10px;
     }
     .larges{
         width:100%;
     }
     .btn {
    margin-left: 5%;
    background: none;
    border: none;
    }
    button {
        width:100%;
      }
    ul.register-now {
    background: #3D3D8A !important;
    height: 54px;
    border-radius: 10px;
    width: 100%;
    text-align: center;
    font-size: 19px;
    margin-left: 0px;
    }
  }
  /* Piyush */
  .preloader1 {
      background-color: rgba(255,255,255,0.7);
      width: 100%;
      height: 100%;
      position: fixed;
      z-index: 1000;
  }
  #loading-image {
      position: absolute;
      top: 50%;
      left: 48%;
      z-index: 100;
  }
  .image-error{
    color: red;
  }
  .editor-error{
    color: red;
  }
  .col-lg-12.col-md-12.col-12.valid.space {
    margin: 15px;
  }
  textarea{
  padding: 10px;
    width: 100%;
    font-size: 15px;
    font-family: "Hind Vadodara", sans-serif;
    margin-bottom: 15px;
    padding-left: 20px;
    outline:none;
    border-radius: 10px;
    border: none;
    background: #fff;
    box-shadow: 0 5px 10px 0 rgb(0 0 0 / 10%);
  }
  button.btn.btn-indigo {
    background: #3D3D8A;
        padding: 10px 45px;
    font-size: 17px;
  }
  .fa-send-o:before, .fa-paper-plane-o:before {
      content: "\f1d9";
      font-family: 'FontAwesome';
  }
  .fa-edit:before, .fa-pencil-square-o:before {
      content: "\f044";
      font-family: 'FontAwesome';
      font-size: 25px;
      font-style: normal;
      color: #3D3D8A;
  }
  .fa-trash:before {
      content: "\f1f8";
      font-family: 'FontAwesome';
      font-style: normal;
      font-size: 25px;
      margin-left: 17%;
      color: #f44336d6;
  }
  .modal-body {
      position: relative;
      padding: 15px;
      background: #cccccc4f;
      background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
  }
  .drop-zone {
    max-width: 100%;
    height: 50%;
    padding: 4% 4%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-family: "Quicksand", sans-serif;
    font-weight: 500;
    font-size: 20px;
    cursor: pointer;
    color: #cccccc;
    border: 4px dashed #3D3D8A;
    border-radius: 10px;
    
    
  }
  .modal-header .close {
    margin-top: -21px;
  }
  .drop-zone--over {
    border-style: solid;
  }
  .drop-zone__input {
    display: none !important;
  }
  .drop-zone__thumb {
      width: 100%;
      height: 200px;
      border-radius: 0px;
      overflow: hidden;
      background-size: contain;
      position: relative;
      background-repeat: no-repeat;
      background-position : center;
  }
  .drop-zone__thumb::after {
   display:none;
  }
  .fa-cloud-upload:before {
    content: "\f0ee";
    font-family: 'FontAwesome';
    font-style: normal;
    font-size: larger;
    color: #3D3D8A;
    margin-left: 20px;
  }
  .md-form.mb-5 img {
      border-radius: 9px;
      width: 45px;
      height:45px;
      box-shadow:0 5px 10px 0 rgb(0 0 0 / 10%);
  }
  .modal {
    overflow-y:auto;
  }
  input#is_support_request {
      width: 15px;
      height: 15px;
  }
</style>
<?php
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$cookie_name = "actual_link";
$cookie_value = $actual_link;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

?>
<body>
  <!-- start preloader -->
  <div class="preloader1" style="display: none;">
  <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
  </div>
  <!-- end preloader -->
  <?php
global $wpdb;
$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigntypes", ARRAY_A);
$user = wp_get_current_user();
if (empty($user->data->ID)) {
    // They're already logged in, so we bounce them back to the homepage.
    header("Location: " . home_url() . '/login');
}
$icons = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_icons WHERE status = 1", ARRAY_A);
?>
<input type="hidden" id="category_image" name="category_image">
  <form method="post" id="regForm" enctype="multipart/form-data" action="<?=BASE_URL?>submitservicedata.php">
    <input type="hidden" value="<?php echo $user->data->ID; ?>" name="userId" id="userId" />
    <h1 class="section_between_space">Tell us about your Service</h1>
    <!-- One "tab" for each step in the form: -->
    <div class="tab mainvalid">
      <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
        <p class="valid">
            <p>Service Name</p>
        <input placeholder="Service Name" id="service_name" name="service_name" maxlength="50">
      </p>  
    </div>
    <div class="col-lg-6 col-md-6 col-12 valid" style="padding:0px;">
    <p class="valid">
        <p>Start Date</p> 
        <input type="date" value="<?=$start_date; ?>" placeholder="Campaign End Date" id="txtDate" name="start_date">
      </p>
     </div>
      <div class="col-lg-6 col-md-6 col-12 valid enddate">
      <p class="valid">
        <p>End Date</p> 
        <input type="date" value="<?=$start_date; ?>" placeholder="Campaign End Date" id="txtDate" name="end_date">
      </p>
     </div>
      <div class="imagediv valid">
          <p>Banner Image</p>
          <div class="drop-zone">
          <span class="drop-zone__prompt"> Drop file here or click to upload<i class="fas fa-cloud-upload"></i></span>
          <input type="file" name="myFile" id="myFile1" class="drop-zone__input" style="opacity: 0; width: 10px;"> <!-- style="display: none;" -->
          <!-- <input type="hidden" name="banner_img" id="banner_img" value=""> -->
      </div>
      
      <!-- <script src="./src/main.js"></script> -->
      <script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");
        dropZoneElement.addEventListener("click", (e) => {
          inputElement.click();
        });
        inputElement.addEventListener("change", (e) => {
          if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
          }
        });
        dropZoneElement.addEventListener("dragover", (e) => {
          e.preventDefault();
          dropZoneElement.classList.add("drop-zone--over");
        });
        ["dragleave", "dragend"].forEach((type) => {
          dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
          });
        });
        dropZoneElement.addEventListener("drop", (e) => {
          e.preventDefault();
          if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
          }
          dropZoneElement.classList.remove("drop-zone--over");
        });
        });
        /**
        * Updates the thumbnail on a drop zone element.
        *
        * @param {HTMLElement} dropZoneElement
        * @param {File} file
        */
        function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
          dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }
        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
          thumbnailElement = document.createElement("div");
          thumbnailElement.classList.add("drop-zone__thumb");
          dropZoneElement.appendChild(thumbnailElement);
        }
        thumbnailElement.dataset.label = file.name;
        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
          const reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            //$('#banner_img').val(reader.result);
          };
        } else {
          thumbnailElement.style.backgroundImage = null;
        }
      }
      </script>
      </div>
      <p class="valid" style="margin-top:2%">
      <p>Description</p>
      <textarea placeholder="Details about service" rows="4" cols="50" name="description" id="searchTextField"></textarea>
      </p>
      <input type="hidden" name="service_id" id="service_id" value="">
      <?php
      /* $results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}campaigns WHERE admin_approved = 1", ARRAY_A);
      $results = (array)$results; */
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP')) $ipaddress = getenv('HTTP_CLIENT_IP');
      else if (getenv('HTTP_X_FORWARDED_FOR')) $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if (getenv('HTTP_X_FORWARDED')) $ipaddress = getenv('HTTP_X_FORWARDED');
      else if (getenv('HTTP_FORWARDED_FOR')) $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if (getenv('HTTP_FORWARDED')) $ipaddress = getenv('HTTP_FORWARDED');
      else if (getenv('REMOTE_ADDR')) $ipaddress = getenv('REMOTE_ADDR');
      else $ipaddress = 1;
      ?>
      
    </div>
    <script>
        $(document).on({
          'show.bs.modal': function () {
              var zIndex = 1040 + (10 * $('.modal:visible').length);
              $(this).css('z-index', zIndex);
              setTimeout(function() {
                  $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
              }, 0);
          },
          'hidden.bs.modal': function() {
              if ($('.modal:visible').length > 0) {
                  setTimeout(function() {
                      $(document.body).addClass('modal-open');
                  }, 0);
              }
          }
        }, '.modal');
    </script>
    <div class="tab">
      <div id="campaign_typeId1" class="mainvalid">
        <div class="valid" style="display:inline-flex;width: 100%;">          
           <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog larges" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">ADD CATEGORY</h4>
                            <button type="button" class="close modalSubscriptionForm-cat" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" id="category_id" class="" name="category_id">
                        <input type="hidden" id="is_category_edit" class="" name="is_category_edit">

                        <!-- <div class="modal-body mx-3">
                            <div class="imagediv valid" style="display: inline-flex; align-items: center;">
                            <p>Icon</p>
                            <input onchange="readURL(this);" type="file" id="myFile" name="image" style="width: 70%;margin: 0px 20px;">
                            <p class="image-error" style="display:none;">Please use jpg/png images only</p>
                            <img style="    object-fit: contain;" width="20%" height="81px" id="blah" src="https://jedaidevbed.in/zedaid/wp-content/uploads/2021/08/cloud-upload-a30f385a928e44e199a62210d578375a.jpg" alt="your image" /> 
                        </div> -->
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                              <p>Icon</p>
                            </div>
                            <div class="md-form mb-5">
                              <select name="icon_id" id="icon_id" class="phonedropdown drp" style="margin-bottom: 10px; width: 40%;" onchange="getImg()">
                                  <?php foreach($icons as $v){?>
                                  <option data-thumbnail="<?= BASE_URL ?>icon-mappin/<?= $v['icon'];?>" value="<?= $v['id'];?>"><?= $v['icon_name']?></option>
                                  <?php } ?>
                              </select>
                              <img src="<?= BASE_URL ?>icon-mappin/<?= $icons[0]['icon'];?>" id="icon-pin-src">
                            </div>

                        
                        <div class="md-form mb-5">
                            <p>Category Name</p>
                            <input type="text" id="category_name" class="" name="category_name" maxlength="50">
                        </div>

                        <div class="md-form mb-5">
                            <div class="licause" style="display: inline-flex;align-items: baseline;">
                                <p>Data Collection Fields</p>
                                <a href="javascript:void(0)" class="btn btn-default btn-rounded mb-4 add" id="add_collection_fields" onclick="submitCat();">ADD</a>
                                <!-- data-toggle="modal" data-target="#modalSubscriptionForms" -->
                            </div>
                        </div>
                        
                        <table id="data_collection">
                            <tr id="data_collection_tr">
                                <th>Field Name</th>
                                <th>Type</th>
                                <th>ACTION</th>
                            </tr>
                            <tr>
                              <td>Name</td>
                              <td>Single Line Text</td>
                              <td> - </td>
                            </tr>
                            <tr>
                              <td>Mobile Number</td>
                              <td>Single Line Text</td>
                              <td> - </td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>Single Line Text</td>
                              <td> - </td>
                            </tr>
                            <tr>
                              <td>Address</td>
                              <td>Multiple Line Text</td>
                              <td> - </td>
                            </tr>
                        </table>
                        <div class="md-form mb-5" style="display: inline-flex;margin-top: 10px;">
                            <input type="checkbox" id="is_support_request" name="is_support_request" value="1" onclick="showSupportRequest()"> <p>Should response required on request?</p>
                        </div>
                        <div class="md-form mb-5 support-fields" style="display: none; ">
                            <div class="licause" style="display: inline-flex;align-items: baseline;">
                            <p>Response Fields</p>
                            <a href="javascript:void(0)" id="add_response_fields" class="btn btn-default btn-rounded mb-4 add" onclick="submitCat();">ADD</a>
                            <!-- #modalSubscriptionForms1 -->
                            </div>
                        </div>
                        <table id="request_frm" class="support-fields" style="display: none; ">
                        <tr>
                            <th>Field Name</th>
                            <th>Type</th>
                            <th>ACTION</th>
                        </tr>
                        <tr>
                          <td>Name</td>
                          <td>Single Line Text</td>
                          <td> - </td>
                        </tr>
                        <tr>
                          <td>Mobile Number</td>
                          <td>Single Line Text</td>
                          <td> - </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>Single Line Text</td>
                          <td> - </td>
                        </tr>
                        <tr>
                          <td>Address</td>
                          <td>Multiple Line Text</td>
                          <td> - </td>
                        </tr>
                       
                        </table>        
                    </div>      
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-indigo" type="button" onclick="showcategorytbl();">Submit</button>
                    </div> <!-- data-dismiss="modal" aria-label="Close" -->
                </div>
            </div>
        </div> 

        <div class="licause">
            <a href="#modalSubscriptionForm" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" onclick="addCat()">Add Category</a>
            <!--data-toggle="modal" href="#modalSubscriptionForm"-->
        </div>
        
                   
        </div>

        <table id="category_table">
            <tr>
                <th>Icon</th>
                <th>Category Name</th>
                <th>ACTION</th>
            </tr>
            <tr class="cat_tr">
              <td colspan="3">
              No Categories Added
              </td>
            </tr>
        </table>

      </div>
    </div>

    <div class="tab mainvalid">
        
        
        <div class="md-form mb-5">
            <p>Request Label</p>
            <input type="text" id="status_label1" class="" name="status_label1" placeholder="Request is open" maxlength="100">
        </div>
        <div class="md-form mb-5">
            <p>Response Label</p>
            <input type="text" id="status_label2" class="" name="status_label2" placeholder="Responder has responded on Request." maxlength="100">
        </div>
        <div class="md-form mb-5">
            <p>Request Close Label</p>
            <input type="text" id="status_label3" class="" name="status_label3" placeholder="Request is Closed" maxlength="100">
        </div>

    </div>
    <div class="tab mainvalid">
        <h3 style="color: #3D3D8A;">Configuration Information</h3>
        <div style="display:flex;margin: 15px 0px;">
        <div style="width:50%">Enable Map :
        </div>
        <div style="width:50%;display: flex;">
            <input type="radio" id="bbb" name="enable_map" value="1" class="radiobtn" checked>Yes
            <input type="radio" id="aaa" name="enable_map" value="0" class="radiobtn" disabled style="margin-left: 10% !important;">No
        </div>
        </div>
        <div style="display:flex;margin: 15px 0px;">
        <div style="width:50%">Enable Category Filter :
        </div>
        <div style="width:50%;display: flex;">
            <input type="radio" id="bbb" name="enable_category_filter" value="1" class="radiobtn" checked>Yes
            <input type="radio" id="aaa" name="enable_category_filter" value="0" class="radiobtn" disabled style="margin-left: 10% !important;">No
        </div>
        </div>
        <div style="display:flex;margin: 15px 0px;">
        <div style="width:50%">Enable Searchbar :
        </div>
        <div style="width:50%;display: flex;">
            <input type="radio" id="bbb" name="enable_searchbar" value="1" class="radiobtn" checked>Yes
            <input type="radio" id="aaa" name="enable_searchbar" value="0" class="radiobtn" disabled style="margin-left: 10% !important;">No
        </div>
        </div>
        <div style="display:flex;margin: 15px 0px;">
        <div style="width:50%">Would you like to show<br> statistics on banner?
        </div>
        <div style="width:50%;display: flex;">
            <input type="radio" id="bbb" name="statistics_on_banner" value="1" class="radiobtn" checked>Yes
            <input type="radio" id="aaa" name="statistics_on_banner" value="0" class="radiobtn" disabled style="margin-left: 10% !important;">No
        </div>
        </div>
    </div>
    
    <!-- <div class="tab mainvalid">
      <div class="">
        <textarea name="short_description" id="editor" oninput="this.className = ''" placeholder="Short description for your fundraiser"></textarea>
      </div>
      <p class="editor-error" style="display:none;">Please enter description!</p>
    </div> -->

    <div style="overflow:auto;">
      <div style="text-align:right;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
      <span class="step"></span>
    </div>
  </form>

  <div class="modal fade" id="modalSubscriptionForms" tabindex="-1" role="dialog" aria-labelledby="modalSubscriptionForms" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Add Fields</h4>
              <button type="button" class="close modalSubscriptionForms-close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <input type="hidden" name="edit_collection_id" id="edit_collection_id">
          <div class="modal-body mx-3">
              <p>Label</p>
              
              <div class="md-form mb-5" style="display: flex;align-items: center; margin-top:10px;">
                <input type="text" id="field_name" name="field_name" class="" maxlength="50" style="margin: 0px 20px 0px 0px;padding: 23px;">
                <select name="field_type" id="field_type" class="phonedropdown drp" style="margin-bottom: 0;width: 43%;" onchange="showhidefields('collection',this.val)">
                    <option value="Single Line Text">Single Line Text</option>
                    <option value="Multiline Text">Multiline Text</option>
                    <option value="Single Check">Single Check</option>
                    <option value="Checkbox">Checkbox</option>
                    <option value="Date & Time">Date & Time</option>
                </select>
              </div>
              <div class="md-form mb-5" style="display: flex;align-items: center; margin-top:10px; ">
                <input type="checkbox" id="vehicle1" name="is_mandatory"> <p style="padding-top: 13px;padding-right: 46%;">is it mandatory?</p>
                <input type="number" id="ordering" name="ordering" value="" maxlength="50" placeholder="Display Order" style="margin-bottom: 0;width: 29.7%;">
              </div>

              <p style="margin-top: 5%;" class="option-fields">Options</p>
              <p id="optionname"></p>
              
              <input type="text" name="option_name" id="option_name" maxlength="50" class="option-fields" style="margin: 10px 20px 0px 0px;padding: 23px;">
              <div class="licause option-fields">
                  <a href="javascript::void()" class="btn btn-default btn-rounded mb-4 add" onclick="addoptions();">ADD</a>
              </div>
          </div>

          <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-indigo" id="collection-btn" type="button"  data-dismiss="modal" aria-label="Close" onclick="submitFields();">Submit</button>
          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalSubscriptionForms1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Fields</h4>
                <button type="button" class="close modalSubscriptionForms1-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="edit_supporter_id" id="edit_supporter_id">
            <div class="modal-body mx-3">
                <p>Label</p>
                <div class="md-form mb-5" style="display: flex;align-items: center;">
                  <input type="text" id="field_name1" name="field_name1" class="" style="margin: 0px 20px 0px 0px;padding: 23px;">
                  <select name="field_type1" id="field_type1" class="phonedropdown drp" style="margin-bottom: 0;width: 43%;" onchange="showhidefields('supporter',this.val)">
                      <option value="Single Line Text">Single Line Text</option>
                      <option value="Multiline Text">Multiline Text</option>
                      <option value="Single Check">Single Check</option>
                      <option value="Checkbox">Checkbox</option>
                      <option value="Date & Time">Date & Time</option>
                  </select>
                </div>
                <div class="md-form mb-5" style="display: flex;align-items: center; margin-top:10px; ">
                  <input type="checkbox" id="vehicle1" name="is_mandatory"> <p style="padding-top: 13px;padding-right: 46%;">is it mandatory?</p>
                  <input type="number" id="ordering1" name="ordering1" value="1" placeholder="Display Order" style="margin-bottom: 0;width: 29.7%;">
                </div>

                <p style="margin-top: 5%;" class="s-option">Options</p>
                <p id="optionname1"></p>
                
                <input type="text" name="option_name1" id="option_name1" class="s-option" style="margin: 10px 20px 0px 0px;padding: 23px;">
                <div class="licause s-option">
                    <a href="javascript::void()" class="btn btn-default btn-rounded mb-4 add" onclick="addoptions1();">ADD</a>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" type="button"  data-dismiss="modal" aria-label="Close" onclick="submitFields1()">Submit</button>
            </div>

          </div>
      </div>
    </div>         
  </div>

  <script>
    // document.querySelector(".numberic_class").addEventListener("keypress", function (evt) {
    //     if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which > 57)
    //     {
    //         evt.preventDefault();
    //     }
    // });

    $(document).ready(function() {
      
      $(".option-fields").css('display', 'none');
      $(".s-option").css('display', 'none');

      $("#editor1").css('display', 'none');
      $(window).keydown(function(event) {
        if (event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
    });

    $("#category_name").keyup(function(){

      var category_name = $('#category_name').val();
      if(category_name != ''){
          $("#add_collection_fields").attr('data-toggle', 'modal');
          $("#add_collection_fields").attr('data-target', '#modalSubscriptionForms');

          $("#add_response_fields").attr('data-toggle', 'modal');
          $("#add_response_fields").attr('data-target', '#modalSubscriptionForms1');
      }else{
          $("#add_collection_fields").removeAttr('data-toggle');
          $("#add_collection_fields").removeAttr('data-target');

          $("#add_response_fields").removeAttr('data-toggle');
          $("#add_response_fields").removeAttr('data-target');
      }
    });

    $("#field_type").change(function () {
        var val = $(this).val();
        if(val == 'Single Check'){
          $(".option-fields").css('display', '');
        }else if(val == 'Checkbox'){
          $(".option-fields").css('display', '');
        }else{
          $(".option-fields").css('display', 'none');
        }
    });

    $("#field_type1").change(function () {
        var val = $(this).val();
        if(val == 'Single Check'){
          $(".s-option").css('display', '');
        }else if(val == 'Checkbox'){
          $(".s-option").css('display', '');
        }else{
          $(".s-option").css('display', 'none');
        }
    });

    function showhidefields(type,val){
      if(type=='collection'){
        if(val == 'Single Check'){
          $(".option-fields").css('display', '');
        }else if(val == 'Checkbox'){
          $(".option-fields").css('display', '');
        }else{
          $(".option-fields").css('display', 'none');
          $("#optionname").html('');
        }
      }

      if(type=='supporter'){
        if(val == 'Single Check'){
          $(".s-option").css('display', '');
        }else if(val == 'Checkbox'){
          $(".s-option").css('display', '');
        }else{
          $(".s-option").css('display', 'none');
          $("#optionname1").html('');
        }
      }
    }

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(input.files[0].type);
        if(input.files[0].type == 'image/jpeg' || input.files[0].type == 'image/jpg' || input.files[0].type == 'image/png' || input.files[0].type == 'image/PNG' || input.files[0].type == 'image/JPG'){
          $("#myFile").removeClass("invalid");
          $("#image_type").val("1");
          $(".image-error").css("display","none");
          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $('#category_image').val(e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
          
        }else{
          /* invalid */
          $("#myFile").addClass("invalid");
          $("#image_type").val("0");
          valid = false;
          return false;
        }
      }
    }

    $('body #img_type').change(function() {
      if ($(this).val() == 'image') {
        $(".imagediv").css("display", "block");
        $(".videodiv").css("display", "none");
        $(".videodiv").removeClass("valid");
        $(".ngodiv").addClass("valid");
      } else {
        $(".videodiv").css("display", "block");
        $(".imagediv").css("display", "none");
        $(".imagediv").removeClass("valid");
        $(".videodiv").addClass("valid");
      }
    });
    $('body #user_type').change(function() {
      if ($(this).val() == 'ngo') {
        $(".ngodiv").css("display", "block");
        $(".individual_persondiv").css("display", "none");
        $(".individual_persondiv").removeClass("valid");
        $(".ngodiv").addClass("valid");
      } else {
        $(".individual_persondiv").css("display", "block");
        $(".ngodiv").css("display", "none");
        $(".ngodiv").removeClass("valid");
        $(".individual_persondiv").addClass("valid");
      }
    });
    $('body #campaign_typeId').change(function() {
      if ($(this).val() == '1') {
        $("#campaign_typeId1").css("display", "block");
        $("#campaign_typeId2").css("display", "none");
        $("#campaign_typeId3").css("display", "none");
        $("#campaign_typeId3").removeClass("mainvalid");
        $("#campaign_typeId2").removeClass("mainvalid");
        $("#campaign_typeId1").addClass("mainvalid");
      } else if ($(this).val() == '2') {
        $("#campaign_typeId2").css("display", "block");
        $("#campaign_typeId1").css("display", "none");
        $("#campaign_typeId3").css("display", "none");
        $("#campaign_typeId3").removeClass("mainvalid");
        $("#campaign_typeId1").removeClass("mainvalid");
        $("#campaign_typeId2").addClass("mainvalid");
      } else if ($(this).val() == '3') {
        $("#campaign_typeId3").css("display", "block");
        $("#campaign_typeId1").css("display", "none");
        $("#campaign_typeId2").css("display", "none");
        $("#campaign_typeId2").removeClass("mainvalid");
        $("#campaign_typeId1").removeClass("mainvalid");
        $("#campaign_typeId3").addClass("mainvalid");
      }
    });
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    function nextPrev(n) {
      
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      /* console.log("currentTab:" + currentTab); */

      if(currentTab == 0){
        var first_step = $("#regForm").serializeArray();

        var form = $("#regForm").closest("form");
        var formData = new FormData(form[0]);

        jQuery.ajax({
            type: "POST",
            url: '../add_service.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response)
            {
                jQuery('#service_id').val(response);
                jQuery('#btn-submit').css('display', '');
                jQuery('#btn-submit-loader').css('display', 'none');
                jQuery('#changeStatus').modal('hide');
                /* bootbox.alert("Status change successfully.", function(){ 
                    //window.location.reload(true);
                }); */
            }
        });
      }

      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        console.log(currentTab);
        if(currentTab == 4){
          showTab(3);
        }
        // ... the form gets submitted:
        $("#nextBtn").prop('disabled', true);
        $("#editor1").css('display', 'block');
        $(".editor1").css('display', 'block');
        $(".preloader1").css('display', 'block');
        //document.getElementById("nextBtn").innerHTML = "<i class='fa fa-spinner fa-spin '></i> Processing";
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      console.log("Valid: "+currentTab);
      // This function deals with validation of the form fields
      var x, y, z, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      z = x[currentTab].getElementsByTagName("textarea");
      
      if($('#searchTextField').val() == ""){
        $('#searchTextField').addClass("invalid");
        // and set the current valid status to false
        valid = false;
        valid1 = false;
      }else{
        $('#searchTextField').removeClass("invalid");
        valid = true;
        valid1 = true;
      }

      /* if(currentTab == 3){
        var z = $('.ck-content').text();
        console.log("Valid: "+z);
        // If a field is empty...
        if (z == "") {
          var v = document.getElementById("editor");
          v.className += "invalid ";
          $(".editor-error").css("display","");
          valid = false;
        } else {
          var v = document.getElementById("editor");
          v.className += "";
          $(".editor-error").css("display","none");
          valid = true;
        }
      } */
      /* z = x[3].getElementsByTagName("textarea"); */
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        if (!$(y[i]).closest('.mainvalid').is(':visible')) {} else {
          if (!$(y[i]).closest('.valid').is(':visible')) {} else {
            isyouTubeUrl = true;
            /* var youtubevideo = $("#youtubevideo").val(); //get the url from the input by the id url
            if (youtubevideo) {
              var _videoUrl = youtubevideo;
              var isyouTubeUrl = /((http|https):\/\/)?(www\.)?(youtube\.com)(\/)?([a-zA-Z0-9\-\.]+)\/?/.test(_videoUrl);
            } */
            if (isyouTubeUrl == false) {
              // add an "invalid" class to the field:
              y[i].className += " invalid";
              // and set the current valid status to false
              valid = false;
            } else {
              // If a field is empty...
              if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
              } else {
                valid = true;
              }
            }
          }
        }
      }

      if(currentTab == 2){
        var image_type = $("#image_type").val();
        if(image_type == 0){
          $("#myFile").addClass("invalid");
          $(".image-error").css("display","");
          valid = false;
        } else {
          valid = true;
          $(".image-error").css("display","none");
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid == true && valid1 == true ) {
        valid = true;
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }else{
        valid = false;
      }
      return valid; // return the valid status
    }
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }

    function submitCat(){
      
        if($('#category_name').val() == ""){
          $('#category_name').addClass("invalid");
          jQuery('#modalSubscriptionForms').modal('hide');
        }else{
          $('#category_name').removeClass("invalid");

          $('#edit_collection_id').val('');
          $('#edit_supporter_id').val('');
          var category_image = $("#category_image").val();
          
          var form = $("#regForm").closest("form");
          var formData = new FormData(form[0]);

          jQuery.ajax({
              type: "POST",
              url: '../add_category.php',
              data: formData,
              processData: false,
              contentType: false,
              success: function(response)
              {
                  jQuery('#category_id').val(response);
                  jQuery('#vehicle1').prop('checked', this.value==1);
                  jQuery('#ordering').val('1');
              }
          }); 
        }               
    }

    function addoptions(){
      var option_name = $('#option_name').val();
      if(option_name == ''){
          $("#option_name").addClass("invalid");
          return false;
      }else{
          $("#option_name").removeClass("invalid");
      }

      $('#option_name').val('');
      $('#optionname').append('<span class="'+option_name+'">&#8226; '+option_name+'</span> <span class="'+option_name+'" onclick=removeFields("'+option_name+'") style="color:red; cursor: pointer;">x <br></span> <input type="hidden" class="options '+option_name+'" name="options[]" value="'+option_name+'">');
    }

    function addoptions1(){
      var option_name1 = $('#option_name1').val();
      $('#option_name1').val('');
      //$('#optionname1').append('<span class="'+option_name1+'">&#8226; '+option_name1+'</span> <input type="hidden" class="options '+option_name1+'" name="options1[]" value="'+option_name1+'"> <br>');
      $('#optionname1').append('<span class="'+option_name1+'">&#8226; '+option_name1+'</span> <span class="'+option_name1+'" onclick=removeFields("'+option_name1+'") style="color:red; cursor: pointer;">x <br></span> <input type="hidden" class="options '+option_name1+'" name="options1[]" value="'+option_name1+'">');
    }

    function addCat(){
      jQuery('#category_id').val('');
      jQuery('.support-fields').css('display','none');
      jQuery('#is_support_request').prop('checked', false);
      jQuery('#category_name').val('');
      jQuery('.collection_data_tr').css('display', 'none');
      jQuery('.supporter_data_tr').css('display', 'none');
    }

    function showSupportRequest(){
      if(jQuery("#is_support_request").prop('checked') == true){
        jQuery('.support-fields').css('display','');
      }else{
        jQuery('.support-fields').css('display','none');
      }
    }

    function removeFields(val){
      $('.'+val).remove();
    }

    function submitFields(){
      var edit_collection_id = $("#edit_collection_id").val();
      /* var custom_field_name1 = $("#custom_field_name1").val();
      var custom_field_name2 = $("#custom_field_name2").val();
      var custom_field_name3 = $("#custom_field_name3").val();
      var custom_field_name4 = $("#custom_field_name4").val();

      var custom_field_type1 = $("#custom_field_type1").val();
      var custom_field_type2 = $("#custom_field_type2").val();
      var custom_field_type3 = $("#custom_field_type3").val();
      var custom_field_type4 = $("#custom_field_type4").val();

      var custom_order_num1 = $("#custom_order_num1").val();
      var custom_order_num2 = $("#custom_order_num2").val();
      var custom_order_num3 = $("#custom_order_num3").val();
      var custom_order_num4 = $("#custom_order_num4").val(); */

      var field_name = $("#field_name").val();
      var category_id = $("#category_id").val();
      var userId = $("#userId").val();
      var field_type = $("#field_type").val();
      var ordering = $("#ordering").val();
      if ($('#is_support_request').is(":checked"))
      {
        var is_mandatory = '1';
      }else{
        var is_mandatory = '0';
      }
      
      var options = $("input[name='options[]']").map(function(){return $(this).val();}).get();

      if(field_name == '' || ordering == ''){
          $("#field_name").addClass("invalid");
          return false;
      }

      /*  data: 'field_name='+field_name+'&category_id='+category_id+'&userId='+userId+'&field_type='+field_type+'&is_mandatory='+is_mandatory+'&ordering='+ordering+'&options='+options+'&edit_collection_id='+edit_collection_id+'&custom_field_name1='+custom_field_name1+'&custom_field_name2='+custom_field_name2+'&custom_field_name3='+custom_field_name3+'&custom_field_name4='+custom_field_name4+'&custom_field_type1='+custom_field_type1+'&custom_field_type2='+custom_field_type2+'&custom_field_type3='+custom_field_type3+'&custom_field_type4='+custom_field_type4+'&custom_order_num1='+custom_order_num1+'&custom_order_num2='+custom_order_num2+'&custom_order_num3='+custom_order_num3+'&custom_order_num4='+custom_order_num4, */

      jQuery.ajax({
          type: "POST",
          url: '../add_fields.php',
          data: 'field_name='+field_name+'&category_id='+category_id+'&userId='+userId+'&field_type='+field_type+'&is_mandatory='+is_mandatory+'&ordering='+ordering+'&options='+options+'&edit_collection_id='+edit_collection_id,
          success: function(response)
          {
              jQuery('.collection_tr').css('display', 'none');
              
              if(edit_collection_id == ''){
                  var tr = '<tr class="collection_data_tr" id="collection_data_tr_'+response+'"><td>'+field_name+'</td><td>'+field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+response+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+response+')></i></td></tr>';
                  $('#data_collection').append(tr);
              }else{
                var tr = '<td>'+field_name+'</td><td>'+field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+response+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+response+')></i></td>';
                $('#collection_data_tr_'+response).html(tr);
              }
              $("#field_name").val('');
              $('#optionname').html('');              
              $("#ordering").val('');
              $('.option-fields').css('display', 'none');
              $('select[name^="field_type"] option:selected').attr("selected",null);
              
              $('#vehicle1').prop('checked', this.value==1);
              //jQuery(".modal-backdrop").removeClass('modal-backdrop fade in');
              //jQuery("#modalSubscriptionForms .modalSubscriptionForms-close").click();
              //jQuery('#modalSubscriptionForms').modal('hide');
              //jQuery('#category_id').val(response);
              /* jQuery('#btn-submit').css('display', '');
              jQuery('#btn-submit-loader').css('display', 'none');
              jQuery('#modalSubscriptionForms').modal('hide'); */
              /* bootbox.alert("Status change successfully.", function(){ 
                  //window.location.reload(true);
              }); */
          }
      });
    }

    function editcollection(id){
      jQuery.ajax({
          type: "POST",
          url: '../get_fields.php',
          data: 'id='+id+'&type=collection',
          success: function(response)
          {
              var data = JSON.parse(response);
              console.log(data.field_name);
              
              //$('#modalSubscriptionForms').modal('show'); 
              
              if(data.options != ''){
                var array = data.options.split(",");
                $.each(array,function(i){
                  //$('#optionname').append('<span>&#8226; '+array[i]+'</span> <input type="hidden" class="options" name="options[]" value="'+array[i]+'"> <br>');
                  $('#optionname').append('<span class="'+array[i]+'">&#8226; '+array[i]+'</span> <span class="'+array[i]+'" onclick=removeFields("'+array[i]+'") style="color:red; cursor: pointer;">x <br></span> <input type="hidden" class="options '+array[i]+'" name="options[]" value="'+array[i]+'">');
                });
              }
              $("#edit_collection_id").val(data.id);
              $("#field_name").val(data.field_name);
              $("#field_type").val(data.field_type);
              $("#ordering").val(data.ordering);
          }
      });
    }

    function submitFields1(){
      var edit_supporter_id = $("#edit_supporter_id").val();
      var field_name = $("#field_name1").val();
      var category_id = $("#category_id").val();
      var userId = $("#userId").val();
      var field_type = $("#field_type1").val();
      var ordering = $("#ordering1").val();
      if ($('#is_mandatory1').is(":checked"))
      {
        var is_mandatory = '1';
      }else{
        var is_mandatory = '1';
      }
      
      if(field_name == '' || ordering == ''){
          $("#field_name1").addClass("invalid");
          return false;
      }

      var options = $("input[name='options1[]']").map(function(){return $(this).val();}).get();

      jQuery.ajax({
          type: "POST",
          url: '../add_field_for_supporter.php',
          data: 'field_name='+field_name+'&category_id='+category_id+'&userId='+userId+'&field_type='+field_type+'&is_mandatory='+is_mandatory+'&ordering='+ordering+'&options='+options+'&edit_collection_id='+edit_supporter_id,
          success: function(response)
          {
              if(edit_supporter_id == ''){
                jQuery('.supporter_tr').css('display', 'none');
                var tr = '<tr class="supporter_data_tr" id="supporter_data_tr_'+response+'"><td>'+field_name+'</td><td>'+field_type+'</td><td><i class="fas fa-edit" onclick="editsupporter('+response+')" data-toggle="modal" data-target="#modalSubscriptionForms1"></i><i class="fas fa-trash" onclick="deletecollection('+response+')></i></td></tr>';
                $('#request_frm').append(tr);
              }else{
                jQuery('.supporter_tr').css('display', 'none');
                var tr = '<td>'+field_name+'</td><td>'+field_type+'</td><td><i class="fas fa-edit" onclick="editsupporter('+response+')" data-toggle="modal" data-target="#modalSubscriptionForms1"></i><i class="fas fa-trash" onclick="deletecollection('+response+')></i></td>';
                $('#supporter_data_tr_'+response).html(tr);
              }

              $("#field_name1").val('');
              $('#optionname1').html('');
          }
      });
    }

    function editsupporter(id){
      jQuery.ajax({
          type: "POST",
          url: '../get_fields.php',
          data: 'id='+id+'&type=supporter',
          success: function(response)
          {
              var data = JSON.parse(response);
              console.log(data.field_name);
              
              //$('#modalSubscriptionForms1').modal('show'); 
              if(data.options != ''){
                var array = data.options.split(",");
                $.each(array,function(i){
                  $('#optionname1').append('<span>&#8226;</span> '+array[i]+' <input type="hidden" class="options" name="options[]" value="'+array[i]+'"> <br>');
                });
              }

              $("#edit_supporter_id").val(id);
              $("#field_name1").val(data.field_name);
              $("#field_type1").val(data.field_type);
              $("#ordering1").val(data.ordering);
          }
      });
    }

    function showcategorytbl(){
      if($('#category_name').val() == ""){
        $('#category_name').addClass("invalid");
        // and set the current valid status to false
        return false;
      }else{
        $('#category_name').removeClass("invalid");
        jQuery('#modalSubscriptionForm').modal('hide');
        jQuery(".modal-backdrop").remove();
      }
      
      jQuery('.cat_tr').css('display', 'none');
      jQuery('.cat_tr').css('display', 'none');


      $('#edit_collection_id').val('');
      var form = $("#regForm").closest("form");
      var formData = new FormData(form[0]);

      jQuery.ajax({
          type: "POST",
          url: '../add_category.php',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response)
          {
              jQuery('#category_id').val(response);
          }
      });

      //jQuery(".modal-backdrop").removeClass('modal-backdrop fade in');
      //jQuery("#modalSubscriptionForm .modalSubscriptionForm-cat").click();
      
      var category_image = $("#category_image").val();
      var category_name = $("#category_name").val();
      var category_id = $("#category_id").val();
      var is_category_edit = $("#is_category_edit").val();
      var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');

      if(is_category_edit == ''){
        var tr = '<tr class="'+category_id+'"><td><img src="'+icon_img+'" width="50" height="50"></td><td>'+category_name+'</td><td><i class="fas fa-edit" onclick="editcat('+category_id+')" data-toggle="modal" href="#modalSubscriptionForm"></i><i class="fas fa-trash" onclick="deletecat('+category_id+')></i></td></tr>';
        $('#category_table').append(tr);
      }else{
        var tr = '<td><img src="'+icon_img+'" width="50" height="50"></td><td>'+category_name+'</td><td><i class="fas fa-edit" onclick="editcat('+category_id+')" data-toggle="modal" href="#modalSubscriptionForm"></i><i class="fas fa-trash" onclick="deletecat('+category_id+')></i></td>';
        $('.'+category_id).html(tr);
      }

      jQuery('.supporter_tr').css('display', '');
      jQuery('.collection_tr').css('display', '');
      
      jQuery(".supporter_data_tr").remove();
      jQuery(".collection_data_tr").remove();

      $("#category_name").val('');
      $("#category_name").val('');
      $("#myFile").val('');
      $("#blah").attr('src','<?= BASE_URL?>wp-content/uploads/2021/08/cloud-upload-a30f385a928e44e199a62210d578375a.jpg');
    }

    function editcat(id){
      jQuery.ajax({
          type: "POST",
          url: '../get_category.php',
          data: 'id='+id,
          success: function(response)
          {
              var category = JSON.parse(response);
              
              $("#is_category_edit").val(id);
              $("#category_id").val(id);
              $("#category_name").val(category.name);
              $("#blah").attr('src','<?php echo home_url();?>/wp-content/uploads/services/'+category.icon);
              //$('#modalSubscriptionForm').modal('show'); 
              jQuery('.collection_tr').css('display', 'none');
              
              $("#icon_id").val(category.icon_id);
              var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');
              $('#icon-pin-src').attr('src',icon_img);

              var array = category.request_fields;
              var array1 = category.support_fields;
              console.log( array );

              $.each(array,function(key,val){
                console.log( "Key: " + key + ", Value: " + val.id );

                jQuery('#collection_data_tr_'+val.id).css('display', 'none');

                var tr = '<tr class="collection_data_tr" id="collection_data_tr_'+val.id+'"><td>'+val.field_name+'</td><td>'+val.field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+val.id+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+val.id+')></i></td></tr>';
                $('#data_collection').append(tr);
              });

              $.each(array1,function(key1,val1){

                jQuery('#is_support_request').prop('checked', true);

                console.log( "Key: " + key1 + ", Value: " + val1.id );
                
                jQuery('#supporter_data_tr_'+val1.id).css('display', 'none');

                var tr1 = '<tr class="supporter_data_tr" id="supporter_data_tr_'+val1.id+'"><td>'+val1.field_name+'</td><td>'+val1.field_type+'</td><td><i class="fas fa-edit" onclick="editsupporter('+val1.id+')" data-toggle="modal" data-target="#modalSubscriptionForms1"></i><i class="fas fa-trash" onclick="deletecollection('+val1.id+')></i></td></tr>';
                $('#request_frm').append(tr1);
              });

              /* var array = data.options.split(",");
              $.each(array,function(i){
                $('#optionname1').append('<span>&#8226;</span> '+array[i]+' <input type="hidden" class="options" name="options[]" value="'+array[i]+'"> <br>');
              });

              $("#edit_supporter_id").val(id);
              $("#field_name1").val(data.field_name);
              $("#field_type1").val(data.field_type);
              $("#ordering1").val(data.ordering); */
          }
      });
    }

    $(document).ready(function(){
      $("#field_name").keydown(function(){
        var field_name = $("#field_name").val();
        var ordering = $("#ordering").val();
        if(field_name != '' && ordering != ''){
          $("#collection-btn").attr("data-dismiss", "modal");
          $("#collection-btn").attr("aria-label", "Close");

          $("#field_name").removeClass("invalid");
          $("#ordering").removeClass("invalid");

        }else{
          $("#collection-btn").attr("data-dismiss", "");
          $("#collection-btn").attr("aria-label", "");
        }
      });

      $("#field_name1").keydown(function(){
        var field_name = $("#field_name1").val();
        var ordering = $("#ordering1").val();
        if(field_name != '' && ordering != ''){
          $("#supporter-btn").attr("data-dismiss", "modal");
          $("#supporter-btn").attr("aria-label", "Close");

          $("#field_name1").removeClass("invalid");
          $("#ordering1").removeClass("invalid");

        }else{
          $("#supporter-btn").attr("data-dismiss", "");
          $("#supporter-btn").attr("aria-label", "");
        }
      });

      //$("#ordering").keydown(function(){
      /* $("#ordering").on("keydown",function(event){
        var field_name = $("#field_name").val();
        var ordering = $("#ordering").val();
        if(field_name != '' && ordering != ''){
          $("#collection-btn").attr("data-dismiss", "modal");
          $("#collection-btn").attr("aria-label", "Close");

          $("#field_name").removeClass("invalid");
          $("#ordering").removeClass("invalid");
        }else{
          $("#collection-btn").attr("data-dismiss", "");
          $("#collection-btn").attr("aria-label", "");
        }
      }); */
    });


    function getImg(){
      var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');
      $('#icon-pin-src').attr('src',icon_img);
    }
    

  </script>
  <?php
ob_flush();
?>
</body>
</html>
<?php
get_footer();