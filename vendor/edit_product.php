<?php
include 'vendor_session.php';
error_reporting(0);
include 'lib/Connection.php';
include 'lib/DBQuery.php';
include 'lib/Fileupload.php';
include 'lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
extract($_POST);
if (isset($_POST['submit'])) {

    if ($productname == null || $productname == '') {
        $msg = "please select your product title";
    } else if ($mrp == null || $mrp == '') {
        $msg = "please select your product mrp";
    } else if ($producttype == null || $producttype == '') {
        $msg = "please select your product type";
    } else if ($weight == null || $weight == '') {
        $msg = "please select your product weight";
    } else if ($editor == null || $editor == '') {
        $msg = "please enter your product details";
    } else if ($qty == null || $qty == '') {
        $msg = "please enter your product quantity";
    } else {

        //product_tbl update here
        $dbAccess->updateData("update product_tbl set product_num='$num',ptoduct_type='$producttype', title='" . $helper->escapeStr($productname) . "',mrp='$mrp',description='" . $helper->escapeStr($editor) . "',keywords='$keyword',mfg_type='$type',commited_qty='$qty',modify_date='now()',status='$status',sp='$sellmrp',tax='$tax',readonly='2' where product_id = '" . $_GET['pid'] . "' ");

        //image update

        $getid = $dbAccess->selectData("select * from product_img where product_id = '" . $_GET['pid'] . "' ");
        $imgidarray = array();
        foreach ($getid as $r) {
            $imgidarray[] = $r['img_id'];
        }

        $fileDir = "productImg/";
        for ($round = 0; $round <= 1; $round++) {
            $result = $FileUpload->execute("files", $fileDir, $round);
            if ($result == false || $result == null) {
                //skip this section
            } else {

                $dbAccess->updateData("update product_img set image = '$result' where product_id = '" . $_GET['pid'] . "' AND img_id = '" . $imgidarray[$round] . "' ");
            }
        }

        //shipping and section

        $dbAccess->updateData("update shipping set weight='$weight',shipping_charge='$shippingcharg',estimated_time='$handover' where product_id = '" . $_GET['pid'] . "'");

        //discount section

        $dbAccess->updateData("update discount set discount_type='$discounttype',discount='$disamount',start_date='$disto',end_date='$disfrom' where product_id = '" . $_GET['editid'] . "'");


        $msg = "Product updated successfully";
    }
}

$Prod_tbl = $dbAccess->selectSingleStmt("select * from product_tbl where product_id = '" . $_GET['pid'] . "' ");
$Img = array();
$Prod_img = $dbAccess->selectData("select * from product_img where product_id = '" . $_GET['pid'] . "' ");
foreach ($Prod_img as $t) {
    $Img[] = $t['image'];
}
$ship_tbl = $dbAccess->selectSingleStmt("select * from  shipping where product_id = '" . $_GET['pid'] . "'");
$disc_tbl = $dbAccess->selectSingleStmt("select * from  discount where product_id = '" . $_GET['pid'] . "'");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shopping Money! | Vendor </title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">


        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">
        <!-- select2 -->
        <link href="css/select/select2.min.css" rel="stylesheet">
        <style>
            .stepContainer{
                overflow-x:inherit !important;
            }
        </style>

        <script src="js/jquery.min.js"></script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->

    </head>


    <body class="nav-sm">

        <div class="container body">


            <div class="main_container">


                <?php include("include/menu-nav.php"); ?>

                <!-- top navigation -->
                <?php include("include/top-nav.php"); ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">



                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>Product Edit</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <!--/msg start-->
                        <?php
                        if (isset($msg) != null) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Information(जानकारी)! </strong> <?= $msg; ?>.
                            </div>
                        <?php } ?>
                        <!--/msg end-->
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Form Wizards <small>Sessions</small></h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Settings 1</a>
                                                    </li>
                                                    <li><a href="#">Settings 2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">


                                        <!-- Smart Wizard -->
                                        <div id="wizard" class="form_wizard wizard_horizontal">
                                            <ul class="wizard_steps">
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                                            Step 1<br />
                                                            <small>Step 1 Description</small>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                                            Step 2<br />
                                                            <small>Step 2 Discount</small>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="step_no">3</span>
                                                        <span class="step_descr">
                                                            Step 3<br />
                                                            <small>Step 3 Shipping </small>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-4">
                                                        <span class="step_no">4</span>
                                                        <span class="step_descr">
                                                            Step 4<br />
                                                            <small>Step 4 Extra</small>
                                                        </span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" onSubmit="return validate();" >
                                                <div id="step-1">


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="productname"  name="productname" value="<?= $Prod_tbl['title']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="productname_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product ID Number 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="num"  name="num" value="<?= $Prod_tbl['product_num']; ?>" class="form-control col-md-7 col-xs-12">
                                                        </div>

                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Type <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" name="producttype" value="<?= $Prod_tbl['ptoduct_type']; ?>"  id="autocomplete-custom-append" class="form-control col-md-10" style="float: left;" />
                                                            <div id="autocomplete-container" style="position: relative; float: left; width: 400px; margin: 10px;"></div>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="autocomplete_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Mrp <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="mrp" name="mrp" value="<?= $Prod_tbl['mrp']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="mrp_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>

                                                    <!--<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Selling Price  <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="sellmrp" name="sellmrp" value="<?= $Prod_tbl['sp']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="sellmrp_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Tax <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="tax" name="tax" value="<?= $Prod_tbl['tax']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="tax_v"  style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>-->

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Type
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <select name="type" class="form-control col-md-7 col-xs-12">
                                                                <option value="<?= $Prod_tbl['mfg_type']; ?>"><?= $Prod_tbl['mfg_type']; ?></option>
                                                                <option value="UPC">UPC</option>
                                                                <option value="ISBN">ISBN</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Quantity <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                                            <input type="text" id="qty" name="qty" value="<?= $Prod_tbl['commited_qty']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="qty_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Status</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="radio"  value="1" class="flat" name="status" checked="checked"> Activate &nbsp;
                                                                    <input type="radio" class="flat" value="0"  name="status" > Deactivate
                                                                </label>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Description <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <textarea name="editor" id="editor"  class="form-control col-md-7 col-xs-12" ><?= $Prod_tbl['description']; ?></textarea>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image 
                                                        </label>
                                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                                            <input type="file" name="files[]"  class="btn btn-success">&nbsp; 
                                                            <input type="file" name="files[]"  class="btn btn-success">&nbsp; 
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-12">
                                                            <span><img src="<?= $Img[0]; ?>" height="120" width="150" /></span><br/><br/>
                                                            <span><img src="<?= $Img[1]; ?>" height="120" width="150" /></span>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Keywords & Tags</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input id="tags_1" name="keyword" value="<?= $Prod_tbl['keywords']; ?>" type="text" class="tags form-control" value="" />
                                                            <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                                                        </div>
                                                    </div>




                                                </div>
                                                <div id="step-2">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Discount type 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control" name="discounttype">
                                                                <option value="<?= $disc_tbl['discount_type']; ?>"><?= $disc_tbl['discount_type']; ?></option>
                                                                <option value="percent" >1. Percent(%) </option>
                                                                <option value="rupees">2. Rs </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="first-name" name="disamount" value="<?= $disc_tbl['discount']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Start Date 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="first-name" value="<?= $disc_tbl['start_date']; ?>"  name="disto" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">End Date 
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="first-name" name="disfrom" value="<?= $disc_tbl['end_date']; ?>" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="step-3">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Weight <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="weight"  name="weight" value="<?= $ship_tbl['weight']; ?>"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="weight_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Handover Estimated Time: <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="handover"  name="handover" value="<?= $ship_tbl['estimated_time']; ?>" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="handover_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shipping Charges<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="date" id="shippingcharg"  name="shippingcharg" value="<?= $ship_tbl['shipping_charge']; ?>" class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="shippingcharg_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>


                                                </div>

                                                <div id="step-4">
                                                    <h2 class="StepTitle">Step 4 Content</h2>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <button type="submit" id="send" name="submit" class="btn btn-default" style="float:right;" >Finish!</button>

                                            </form>
                                        </div>
                                        <!-- End SmartWizard Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->


                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Shopping Money <a href="#">vendor</a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>
        <!-- form wizard -->
        <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script type="text/javascript">
                                                $(document).ready(function () {
                                                    // Smart Wizard
                                                    $('#wizard').smartWizard();
                                                });

                                                $(document).ready(function () {
                                                    // Smart Wizard
                                                    $('#wizard_verticle').smartWizard({
                                                        transitionEffect: 'slide'
                                                    });

                                                });
        </script>
        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 20,
                    placeholder: "With Max Selection limit 20",
                    allowClear: true
                });
            });
        </script>
        <!-- select2 -->
        <script src="js/select/select2.full.js"></script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="js/autocomplete/countries.js"></script>
        <script src="js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>



        <!-- tags -->
        <script src="js/tags/jquery.tagsinput.min.js"></script>
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->

        <!-- /form validation -->
        <script>

            function validate() {
                var status = null;
                var proname = $("#productname").val();
                var autocom = $("#autocomplete-custom-append").val();
                var mrp = $("#mrp").val();
                var qty = $("#qty").val();
                var ship = $("#shippingcharg").val();
                var hand = $("#handover").val();
                var weig = $("#weight").val();
                var tax = $("#tax").val();
                var sp = $("#sellmrp").val();

                if (proname == null || proname == '') {
                    $("#productname_v").fadeIn(1000);
                    status = 0;
                }
                if (autocom == null || autocom == '') {
                    $("#autocomplete_v").fadeIn(1000);
                    status = 0;
                }
                if (mrp == null || mrp == '') {
                    $("#mrp_v").fadeIn(1000);
                    status = 0;
                }
                if (qty == null || qty == '') {
                    $("#qty_v").fadeIn(1000);
                    status = 0;
                }
                if (weig == null || weig == '') {
                    $("#weight_v").fadeIn(1000);
                    status = 0;
                }
                if (ship == null || ship == '') {
                    $("#shippingcharg_v").fadeIn(1000);
                    status = 0;
                }
                if (hand == null || hand == '') {
                    $("#handover_v").fadeIn(1000);
                    status = 0;
                }
                if (sp == null || sp == '') {
                    $("#sellmrp_v").fadeIn(1000);
                    status = 0;
                }
                if (tax == null || tax == '') {
                    $("#tax_v").fadeIn(1000);
                    status = 0;
                }

                if (status == 0) {
                    return false;
                } else {
                    return true;
                }

            }


            $(document).ready(function () {


                $("#productname").change(function () {
                    $("#productname_v").fadeOut(1000);
                });
                $("#autocomplete-custom-append").change(function () {
                    $("#autocomplete_v").fadeOut(1000);
                });
                $("#mrp").change(function () {
                    $("#mrp_v").fadeOut(1000);
                });
                $("#qty").change(function () {
                    $("#qty_v").fadeOut(1000);
                });
                $("#shippingcharg").change(function () {
                    $("#shippingcharg_v").fadeOut(1000);
                });
                $("#handover").change(function () {
                    $("#handover_v").fadeOut(1000);
                });
                $("#weight").change(function () {
                    $("#weight_v").fadeOut(1000);
                });
                $("#tax").change(function () {
                    $("#tax_v").fadeOut(1000);
                });
                $("#sellmrp").change(function () {
                    $("#sellmrp_v").fadeOut(1000);
                });

            });

        </script>



    </body>

</html>
