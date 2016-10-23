<?php
error_reporting(0);
include 'vendor_session.php';
include 'lib/Connection.php';
include 'lib/DBQuery.php';
include 'lib/Fileupload.php';
include 'lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
if (isset($_POST['submit'])) {
extract($_POST);
$read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
$vendorId = $read['unique_user_id'];
$dbAccess->insertData("advertise", "vid,name,email,phone,location,budget,frequency,description,date","'$vendorId','$name','$email','$phone','$location','$budget','$frequency','$description',now()");
$_SESSION['message']="Advertisement request registered";
		 header("location:advertise.php");
		die();
}
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


    <body class="nav-md">

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
                                <h3>Request Panel</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                   <div class="x_panel">
                                   <div>
				<?php if(isset($_SESSION['message'])){ ?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <?=$_SESSION['message']?>
                </div>
				<?php 
				unset($_SESSION['message']);
				} ?>
				
                </div>
                                    <div class="x_content">


                                        <!-- Smart Wizard -->
                                        <div id="" class="form_wizard wizard_horizontal">
                                         									 

                                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" onSubmit="return validate();" >
                                                <div id="step-1">
                       
													<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="name"  name="name"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="name_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>

<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="email"  name="email"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="email_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>
													<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Phone <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" id="phone"  name="phone"  class="form-control col-md-7 col-xs-12">
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="phone_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>
													<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Location <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                           <select name="location" id="location" class="form-control">
                          <option value=''>Select Location</option>
                          <option>Home Page</option>
                          <option>Product Page</option>
                          <option>Category Page</option>
                          <option>Brand Page</option>
                        </select>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="location_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>
													<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad Budget <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                           <select name="budget" id="budget" class="form-control">
                          <option value=''>Choose Budget</option>
                          <option>Under Rs 10,000</option>
                          <option>Rs 10,000 - 30,000</option>
                          <option>Rs 30,000 - 60,000</option>
                          <option>Rs 60,000 - 1,00,000</option>
						  <option>Above 1,00,000</option>
                        </select>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="budget_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>
													<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Frequency to Spend:
<span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                           <select name="frequency" id="frequency" class="form-control">
                          <option>Choose frequency</option>
                          <option>Day</option>
                          <option>Weekly</option>
                          <option>Monthly</option>
                          <option>yearly</option>
                        </select>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="frequency_v" style="display:none; color:#FF0000;">This field is required</label>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span>
                                                        </label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <textarea name="description" id="description"  class="form-control col-md-7 col-xs-12" ></textarea>
                                                        </div>
                                                    </div>
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
               
				var name = $("#name").val();
                var email = $("#email").val();
				var phone = $("#phone").val();
				var location = $("#location").val();
				var budget = $("#budget").val();
				if (name == null || name == '') {
                    $("#name_v").fadeIn(1000);
                    status = 0;
                }
				if (email == null || email == '') {
                    $("#email_v").fadeIn(1000);
                    status = 0;
                }
				if (phone == null || phone == '') {
                    $("#phone_v").fadeIn(1000);
                    status = 0;
                }
				if (location == null || location == '') {
                    $("#location_v").fadeIn(1000);
                    status = 0;
                }
				if (budget == null || budget == '') {
                    $("#budget_v").fadeIn(1000);
                    status = 0;
                }
				if (frequency == null || frequency == '') {
                    $("#frequency_v").fadeIn(1000);
                    status = 0;
                }

                if (status == 0) {
                    return false;
                } else {
                    return true;
                }

            }


            $(document).ready(function () {
				$("#name").change(function () {
                    $("#name_v").fadeOut(1000);
                });
				$("#email").change(function () {
                    $("#email_v").fadeOut(1000);
                });
				$("#phone").change(function () {
                    $("#phone_v").fadeOut(1000);
                });
				$("#location").change(function () {
                    $("#location_v").fadeOut(1000);
                });
				$("#budget").change(function () {
                    $("#budget_v").fadeOut(1000);
                });
				$("#frequency").change(function () {
                    $("#frequency_v").fadeOut(1000);
                });
            });

        </script>



    </body>

</html>
