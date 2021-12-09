<?php
/**
 * Template Name: service detail admin
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
error_reporting(0);
get_header();
global $wpdb;
$service_id = $_GET['slug'];
$services = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}services WHERE status != 2 AND is_draft = 0 AND id = '" . $service_id . "' ORDER BY id DESC");

$categories = $wpdb->get_results("SELECT * FROM wp_service_category_relation as scr LEFT JOIN wp_service_categories as sc ON scr.category_id = sc.id WHERE scr.service_id = '".$service_id."'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="wpoceans">
  <title>Map | Zed</title>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDps_MnqrPbo_tQ1ZqJ60czXZjFaS421co&libraries=places"></script>
  <style>
  .bootbox-body {
    text-align: center;
}
  button.bootbox-close-button.close {
    margin-top: -1px;
}
  
    input#vehicle1 {
      width: 15px;
      height: 15px;
    }
    .gm-style-iw-d {
      max-width: 307px !important;
      width: 261px !important;
    }
    .\/ccc\/ img {
      width: 100%;
    }
    .gm-style .gm-style-iw-d {
      box-sizing: border-box;
      overflow: auto !important;
      width:200px;
      max-width:310px;
    }
    .gm-style .gm-style-iw-c {
      position: absolute;
      box-sizing: border-box;
      overflow: hidden;
      top: 0;
      left: 0;
      transform: translate(-50%,-100%);
      background-color: white;
      border-radius: 8px;
      padding: 0px;
      box-shadow: 0 2px 7px 1px rgb(0 0 0 / 30%);
    }
    .top-left {
      padding-top: 5px !important;
      padding-bottom: 5px !important;
      top:0 !important;
    }
    .grn{
      background: #00BF00;
      color: #fff;
      font-weight: 400;
      padding: 6px;
      border-radius: 5px;
    }
    .red{
      background: #FF184A;
      color: #fff;
      font-weight: 400;
      padding: 6px;
      border-radius: 5px;
    }
    .para {
      color: #fff;
      margin: 0% 10%;
      background: #9e9e9ea1;
      padding: 20px;
      border-radius: 10px;
    }
    .tp-bg {
      background: url(https://zedaid.org/wp-content/uploads/2021/08/Customer_Attention.jpg);
      background-position: bottom;
      height: 400px;
    }
    .serach {
      display: inline-flex;
      width: 97%;
    }
    .gridview{
      box-shadow: 0px 1px 40px 0px rgb(40 63 116 / 10%);
      padding: 10px 20px;
      background: #fff;
      border-radius: 10px;
      width: 155% !important;
    }
    ul.register-now {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 10px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      margin-right: 29px;
      float: right;
      margin-top: -11%;
    }
    ul.register-now1 {
      background: #3D3D8A !important;
      height: 34px;
      border-radius: 0px;
      width: 20%;
      text-align: center;
      font-size: 18px;
      float: right;
      border-top-left-radius: 0px;
      border-bottom-right-radius: 0px;
    }
    .licause1 {
      margin-top: 3px !important;
      margin-bottom: 0 !important;
    }
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
       a.btn.btn-default.btn-rounded.mb-4 {
           padding:10px;
       }
       
       
       .licause {
           margin-right:6%;
       }
       .enddate {
    padding: 0px;
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
    ul.register-now1 {
      width: 40%;
    }
    .bb{
        margin-bottom:18% !important;
        margin-left:-20%;
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
        border-radius: 10px;
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
      .regform
      {
        background-color: #ffffff;
        font-family: "Hind Vadodara", sans-serif;
        padding: 40px;
        width: 90%;
        margin-top: 0px !important;
        margin: 5%;
        box-shadow: 0px 14px 60px rgb(0 0 0 / 6%);
        border-radius: 10px;
        min-width: 300px;
        background-image: url(https://mk0exceedaii9r51xsxh.kinstacdn.com/wp-content/uploads/2021/01/bg-image.png) !important;
        background-repeat: round;
      }
      .licause {
          margin-top: 10px;
          margin-bottom: 10px;
      }
      .new {
          display: inline-flex;
          width: 100%;
          justify-content: center;
      }
      .bb{
          margin-bottom:2%;
      }
      .modal {
        overflow-y:auto;
      }
</style>
</head>
<body>
  <!-- start page-wrapper -->
  <div class="page-wrapper">
    <!-- start preloader -->
    <div class="preloader1" style="display: none;">
      <img id="loading-image" src="<?php echo bloginfo('template_directory'); ?>/images/loader.gif" alt="Loading..." />
    </div>
    <!-- end preloader -->
    <!-- start contact-pg-contact-section -->
    <section class="tp-blog-single-section section-pad" style="background: #eee;">
      <div class="container">
        <div class="row">
          <div class="widget search-widget ">
            <form>
              <div>
                <input type="text" class="form-control serach locationtextbox icon-input" placeholder="Enter address here"  name="location" id="location">
                <a><i class='fa fa-times-circle fa-2x times-icon' aria-hidden='true'></i></a>
              </div>
            </form>
          </div>
          <div>
            <input type="checkbox" class="custom-control-input" checked style="display:none" id="locationChecked" name="locationChecked" />
          </div>
        </div>
        <div class="col-md-8 bb"  style="margin-top: 2%;">
          <ul class="register-now1" style="border-bottom-right-radius: 10px;background-color:#fff !important;color:#000" >
            <li  style="margin-top:3px">
              <a href="<?= BASE_URL ?>service-request-admin/?slug=<?= $service_id; ?>" class=" " style="color:#000">Request</a>
            </li>
          </ul>
          <ul class="register-now1" style="background-color:#3D3D8A !important;border-top-left-radius: 10px;" >
            <li  style="margin-top:3px;">
              <a href="<?= BASE_URL ?>service-detail-admin/" class=" " style="color:#fff">Service Info</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-12 regform">
          <form id="regform" method="post" class="tp-accountWrapper" action="<?=BASE_URL?>editservicedata.php" novalidate="novalidate" enctype="multipart/form-data">
          <input type="hidden" id="service_id" name="service_id" value="<?= $service_id;?>" >
            <div class="col-lg-12 col-md-12 col-12 valid" style="padding:0px;">
              <p>Service Name</p>
              <input placeholder="Service Name" 
              id="service_name" name="service_name" value="<?= $services->service_name;?>" >
            </div>                                  
            <div class="col-lg-6 col-md-6 col-12 valid" style="padding:0px;">
              <p>Start Date</p> 
              <input type="date" value="<?=$services->start_date; ?>" placeholder="Service End Date" id="txtDate" name="start_date">
            </div>
            <div class="col-lg-6 col-md-6 col-12 valid enddate">
              <p>End Date</p> 
              <input type="date" value="<?=$services->end_date; ?>" placeholder="Service End Date" id="txtDate" name="end_date">
            </div>
            <div class="col-lg-12 col-md-12 col-12" style="padding:0px">
              <p>Description</p>
              <textarea placeholder="Details about service" rows="4" cols="50" name="description" id="searchTe xtField"><?=$services->description; ?></textarea>
            </div>
            <div class="imagediv valid">
              <p>Banner Image</p>
              <div class="drop-zone">
                <span class="drop-zone__prompt"> <img src="<?= BASE_URL?>/wp-content/uploads/services/<?= $services->banner; ?>" width="150"></span>
                <input type="file" name="myFile" id="myFile1" class="drop-zone__input" style="opacity: 0;"> <!-- style="display: none;" -->
                <!-- <input type="hidden" name="banner_img" id="banner_img" value=""> -->
              </div>
            </p>
          </div>

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

        </form>

        <input type="hidden" id="category_image" name="category_image">
        <form id="catForm" method="post" class="tp-accountWrapper" action="" novalidate="novalidate">
        <input type="hidden" id="service_id" name="service_id" value="<?= $service_id;?>" >
        <div id="campaign_typeId1" class="mainvalid">
        <div class="valid" style="display:inline-flex;width: 100%;">          
         <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog larges" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">ADD CATEGORY</h4>
                <button type="button" class="close modalSubscriptionForm-cat" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <input type="hidden" id="category_id" class="" name="category_id">
              <input type="hidden" id="is_category_edit" class="" name="is_category_edit">

              <div class="modal-body mx-3">
                <!-- <div class="imagediv valid" style="display: inline-flex; align-items: center;">
                  <p>Icon</p>
                  <input onchange="readURL(this);" type="file" id="myFile" name="image" style="width: 70%;margin: 0px 20px;">
                  <p class="image-error" style="display:none;">Please use jpg/png images only</p>
                  <img style="object-fit: contain;" width="20%" height="81px" id="blah" src="https://jedaidevbed.in/zedaid/wp-content/uploads/2021/08/cloud-upload-a30f385a928e44e199a62210d578375a.jpg" alt="your image">       
                </div> -->
                <?php 
                $icons = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}service_icons WHERE status = 1", ARRAY_A); 
                ?>
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
                  <input type="text" id="category_name" class="" name="category_name">
                </div>
                <div class="md-form mb-5">
                  <div class="licause" style="display: inline-flex;align-items: baseline;">
                    <p>Data Collection Fields</p>
                    <a href="" class="btn btn-default btn-rounded mb-4 add" id="add_collection_fields" data-toggle="modal" data-target="#modalSubscriptionForms" onclick="submitCat();">ADD</a>
                  </div>
                </div>
                <table id="data_collection">
                  <tbody><tr id="data_collection_tr">
                    <th>Field Name</th>
                    <th>Type</th>
                    <th>ACTION</th>
                  </tr>
                  <tr class="collection_tr">
                    <td colspan="3">No collection fields Added</td>
                  </tr>
                </tbody></table>
                <div class="md-form mb-5" style="display: inline-flex;margin-top: 10px;">
                  <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"> <p>Should support required on request?</p>                                
                </div>
                <div class="md-form mb-5">
                  <div class="licause" style="display: inline-flex;align-items: baseline;">
                    <p>Supporter Fields</p>
                    <a href="#modalSubscriptionForms1" class="btn btn-default btn-rounded mb-4 add" data-toggle="modal" onclick="submitCat();">ADD</a>
                  </div>
                </div>
                <table id="request_frm">
                  <tbody><tr>
                    <th>Field Name</th>
                    <th>Type</th>
                    <th>ACTION</th>
                  </tr>
                  <tr class="supporter_tr">
                    <td colspan="3">No supporter fields Added</td>
                  </tr>
                </tbody></table>        
              </div>      
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" type="button" onclick="showcategorytbl();" data-dismiss="modal" aria-label="Close">Submit</button>
              </div>
            </div>
          </div>
        </div> 
        </form>
        <div class="licause">
          <!--<a href="#modalSubscriptionForm" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal">Add Category</a>-->
          <div class="licause" style="display: inline-flex;align-items: baseline;">
                    <p>Categories</p>
                    <a href="#modalSubscriptionForm" class="btn btn-default btn-rounded mb-4 add" id="add_collection_fields" data-toggle="modal" >ADD</a>
                  </div>
          <!--data-toggle="modal" data-target="#modalSubscriptionForm"-->
        </div>
      </div>
      <table id="category_table">
        <tbody><tr>
          <th>Icon</th>
          <th>Category Name</th>
          <th>ACTION</th>
        </tr>
        <?php foreach($categories as $val){
        $icon_id = $val->icon_id;

        $iconpin = $wpdb->get_row("SELECT * FROM wp_service_icons WHERE id = '".$icon_id."'");
        if(!empty($iconpin)){
            $icon_name = BASE_URL."/icon-mappin/".$iconpin->icon;
        }else{
            $icon_name = BASE_URL."/wp-content/uploads/services/".$val->icon;
        }
        ?>
        <tr class="<?= $val->category_id;?>">
          <td><img src="<?= $icon_name ?>" width="50" height="50" style="margin-right: 1% !important; color: #777 !important;"/></td>
          <td><?= $val->name;?></td>
          <td><i class="fas fa-edit" onclick="editcat('<?= $val->category_id;?>')" data-toggle="modal" data-target="#modalSubscriptionForm" style="cursor: pointer;"></i></td>
        </tr>
        <?php } ?>
      </tbody></table>
         <div class="licause " style="text-align: center;">
            <a href="javascript:void(0)" class="btn btn-default btn-rounded mb-4 openBtn" onclick="editService()">Update Service</a>
        </div>
        <div class="new">
          <div class="licause " style="text-align: center;margin-right: 3%;">
              <?php if($services->status == 1) {?> 
              <a href="#stopService" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FCCE15;">Stop Service</a>
              <?php } else { ?>
              <a href="#resumeService" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FCCE15;">Resume Service</a>
              <?php } ?>
          </div>
          <div class="licause " style="text-align: center;">
              <a href="#deleteService" class="btn btn-default btn-rounded mb-4 openBtn" data-toggle="modal" style="background: #FB360E;">Delete Service</a>
          </div>
        </div> 
    </div>
      </div>   
  </div> <!-- end container -->

  <div class="modal fade" id="modalSubscriptionForms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <input type="number" id="ordering" name="ordering" value="1" maxlength="50" placeholder="Display Order" style="margin-bottom: 0;width: 29.7%;">
              </div>

              <p style="margin-top: 5%;" class="option-fields">Options</p>
              <p id="optionname"></p>
              
              <input type="text" name="option_name" id="option_name" maxlength="50" class="option-fields" style="margin: 10px 20px 0px 0px;padding: 23px;">
              <div class="licause option-fields">
                  <a href="javascript::void()" class="btn btn-default btn-rounded mb-4 add" onclick="addoptions();">ADD</a>
              </div>
          </div>

          <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-indigo" id="collection-btn" type="button" onclick="submitFields();" data-dismiss="modal" aria-label="Close">Submit</button>
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
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="submitFields1()">Submit</button>
            </div>

          </div>
      </div>
    </div>         
  </div>

  <div class="modal fade" id="stopService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Stop Service</h4>
                <button type="button" class="close stopService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to stop this service?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close stopService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="stopService('<?= $service_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>

  <div class="modal fade" id="resumeService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Resume Service</h4>
                <button type="button" class="close resumeService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to resume this service?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close resumeService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="resumeService('<?= $service_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>

  <div class="modal fade" id="deleteService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Delete Service</h4>
                <button type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" name="s_id" id="s_id">
            <div class="modal-body mx-3 text-center">
                <p>Are you sure want to delete this service?</p>
            </div>

            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-indigo" id="supporter-btn" style="background: #ccc;" type="button" class="close deleteService-close" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-indigo" id="supporter-btn" type="button" onclick="deleteService('<?= $service_id; ?>')">Confirm</button>
            </div>
          </div>
      </div>
    </div>         
  </div>
  
</section>
<!-- end contact-pg-contact-section -->
</div>
<!-- end of page-wrapper -->
<div id="magic-cursor">
  <div id="ball">
    <div id="ball-drag-x"></div>
    <div id="ball-drag-y"></div>
    <div id="ball-loader"></div>
  </div>
</div>
    <!-- All JavaScript files
  ================================================== -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
  <!-- Plugins for this template -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-plugin-collection.js"></script>
  <script src="<?php echo bloginfo('template_directory'); ?>/js/gsap.min.js"></script>
  <!-- Custom script for this template -->
  <script src="<?php echo bloginfo('template_directory'); ?>/js/script.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
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

    $("#field_type").change(function () {
        var val = $(this).val();
        if(val == 'Single Check'){
          $(".option-fields").css('display', 'block');
        }else if(val == 'Checkbox'){
          $(".option-fields").css('display', 'block');
        }else{
          $(".option-fields").css('display', 'none');
        }
    });

    $("#field_type1").change(function () {
        var val = $(this).val();
        if(val == 'Single Check'){
          $(".s-option").css('display', 'block');
        }else if(val == 'Checkbox'){
          $(".s-option").css('display', 'block');
        }else{
          $(".s-option").css('display', 'none');
        }
    });

    function showhidefields(type,val){
      if(type=='collection'){
        if(val == 'Single Check'){
          $(".option-fields").css('display', 'block');
        }else if(val == 'Checkbox'){
          $(".option-fields").css('display', 'block');
        }else{
          $(".option-fields").css('display', 'none');
          $("#optionname").html('');
        }
      }

      if(type=='supporter'){
        if(val == 'Single Check'){
          $(".s-option").css('display', 'block');
        }else if(val == 'Checkbox'){
          $(".s-option").css('display', 'block');
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
    //showTab(currentTab); // Display the current tab
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
        var first_step = $("#regform").serializeArray();

        var form = $("#regform").closest("form");
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
        document.getElementById("regform").submit();
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
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
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
      
      $('#edit_collection_id').val('');
      /* var category_image = $("#category_image").val();
      var category_name = $("#category_name").val();
      var userId = $("#userId").val();
      var service_id = $("#service_id").val(); */
      var form = $("#catForm").closest("form");
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
              /* jQuery('#btn-submit').css('display', '');
              jQuery('#btn-submit-loader').css('display', 'none');
              jQuery('#changeStatus').modal('hide'); */
              /* bootbox.alert("Status change successfully.", function(){ 
                  //window.location.reload(true);
              }); */
          }
      });
    }

    function addoptions(){
      var option_name = $('#option_name').val();
      $('#option_name').val('');
      $('#optionname').append('<span class="'+option_name+'">&#8226; '+option_name+'</span> <span class="'+option_name+'" onclick=removeFields("'+option_name+'") style="color:red; cursor: pointer;">x <br></span> <input type="hidden" class="options '+option_name+'" name="options[]" value="'+option_name+'">');
    }

    function addoptions1(){
      var option_name1 = $('#option_name1').val();
      $('#option_name1').val('');
      //$('#optionname1').append('<span class="'+option_name1+'">&#8226; '+option_name1+'</span> <input type="hidden" class="options '+option_name1+'" name="options1[]" value="'+option_name1+'"> <br>');
      $('#option_name1').append('<span class="'+option_name1+'">&#8226; '+option_name1+'</span> <span class="'+option_name1+'" onclick=removeFields("'+option_name1+'") style="color:red; cursor: pointer;">x <br></span> <input type="hidden" class="options '+option_name1+'" name="options[]" value="'+option_name1+'">');
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
      if ($('#is_mandatory').is(":checked"))
      {
        var is_mandatory = '1';
      }else{
        var is_mandatory = '1';
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
              $('.option-fields').css('display', 'none');
              $('select[name^="field_type"] option:selected').attr("selected",null);
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
              jQuery('.supporter_tr').css('display', 'none');
              if(edit_supporter_id == ''){
                var tr = '<tr class="supporter_data_tr" id="supporter_data_tr_'+response+'"><td>'+field_name+'</td><td>'+field_type+'</td><td><i class="fas fa-edit" onclick="editsupporter('+response+')" data-toggle="modal" data-target="#modalSubscriptionForms1"></i><i class="fas fa-trash" onclick="deletecollection('+response+')></i></td></tr>';
                $('#request_frm').append(tr);
              }else{
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
      /* jQuery('.cat_tr').css('display', 'none');
      jQuery('.cat_tr').css('display', 'none'); */
      //jQuery(".modal-backdrop").removeClass('modal-backdrop fade in');
      //jQuery("#modalSubscriptionForm .modalSubscriptionForm-cat").click();
      //jQuery('#modalSubscriptionForm').modal('hide');
      console.log("cccccc");

      var category_image = $("#category_image").val();
      var category_name = $("#category_name").val();
      var category_id = $("#category_id").val();
      var is_category_edit = $("#is_category_edit").val();

      var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');

      console.log(category_id);

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
      $("#blah").attr('src','<?= BASE_URL ?>wp-content/uploads/2021/08/cloud-upload-a30f385a928e44e199a62210d578375a.jpg');
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
              $("#icon_id").val(category.icon_id);

              var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');
              $('#icon-pin-src').attr('src',icon_img);

              //$("#blah").attr('src','<?php echo home_url();?>/wp-content/uploads/services/'+category.icon);
              //$('#modalSubscriptionForm').modal('show'); 
              jQuery('.collection_tr').css('display', 'none');
              jQuery('.supporter_tr').css('display', 'none');
              
              var array = category.request_fields;
              var array1 = category.support_fields;
              console.log( array );

              $.each(array,function(key,val){
                console.log( "Key: " + key + ", Value: " + val.id );
                var tr = '<tr class="collection_data_tr" id="collection_data_tr_'+val.id+'"><td>'+val.field_name+'</td><td>'+val.field_type+'</td><td><i class="fas fa-edit" onclick="editcollection('+val.id+')" data-toggle="modal" data-target="#modalSubscriptionForms"></i><i class="fas fa-trash" onclick="deletecollection('+val.id+')></i></td></tr>';
                $('#data_collection').append(tr);
              });

              $.each(array1,function(key1,val1){
                console.log( "Key: " + key1 + ", Value: " + val1.id );
                var tr1 = '<tr class="supporter_tr" id="supporter_tr_'+val1.id+'"><td>'+val1.field_name+'</td><td>'+val1.field_type+'</td><td><i class="fas fa-edit" onclick="editsupporter('+val1.id+')" data-toggle="modal" data-target="#modalSubscriptionForms1"></i><i class="fas fa-trash" onclick="deletecollection('+val1.id+')></i></td></tr>';
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

    function editService(){
      $('form#regform').submit();
    }

    function stopService(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../stop_service.php',
          data: 'service_id='+s_id,
          success: function(response)
          {
              jQuery('#stopService').modal('hide');
              bootbox.alert("Service stop successfully.", function(){ 
                  window.location.reload(true);
              });
          }
      });
    }

    function resumeService(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../resume_service.php',
          data: 'service_id='+s_id,
          success: function(response)
          {
              jQuery('#resumeService').modal('hide');
              bootbox.alert("Service resume successfully.", function(){ 
                  window.location.reload(true);
              });
          }
      });
    }

    function deleteService(s_id){
      jQuery.ajax({
          type: "POST",
          url: '../delete_service.php',
          data: 'service_id='+s_id,
          success: function(response)
          {
              jQuery('#deleteService').modal('hide');
              bootbox.alert("Service deleted successfully.", function(){ 
                window.location.href='../my-services';
              });
          }
      });
    }

    function getImg(){
      var icon_img = $('#icon_id').find('option:selected').attr('data-thumbnail');
      $('#icon-pin-src').attr('src',icon_img);
    }
  </script>
</body>
</html>
<?php
get_footer();
