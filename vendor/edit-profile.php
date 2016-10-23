<?php
    include 'vendor_session.php';
    include 'lib/Connection.php';
    include 'lib/Fileupload.php';
    include 'lib/DBQuery.php';
    include 'lib/Helpers.php';
    include 'lib/ReturnMsg.php';
    $connection = new Connection();
    $helper = new Helpers();
    $FileUpload = new Fileupload();
    $dbAccess = new DBQuery();
    $LoadMsg = new ReturnMsg();
    $secureId = $_SESSION['userEmail'];
    $getData = $dbAccess->selectSingleStmt("select * from   vendor_details where unique_user_id = '$secureId' ");
    $getData1 = $dbAccess->selectSingleStmt("select * from   vendor_business_details where unique_user_id = '$secureId' ");
    $getData2 = $dbAccess->selectData("select * from   vendor_doc_upload where unique_user_id = '$secureId' ");
    $getData3 = $dbAccess->selectSingleStmt("select * from   register_vendor where email = '$secureId' ");

    if (isset($_POST['submit'])) {
        $dbAccess->updateData("update register_vendor set unique_user_id = '" . $_POST['verify'] . "' where email = '$secureId'");
        echo $LoadMsg->successRegister();
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

        <title>Shopping Money! | Vendor</title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">


        <script src="js/jquery.min.js"></script>

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
                                <h3>Profile</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">

                                    <div class="x_content">

                                       
                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="profile_title">
                                                <div class="col-md-6">
                                                    <h2 class="us-i">Edit Profile</h2>
                                       
                                                </div>

                                            </div>


                                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                 <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Address Information</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Business Information</a>
                                                    </li>

                                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="changepassword" data-toggle="tab" aria-expanded="false">Change Password</a>
                                                    </li>
                                                </ul>
                                                <div id="myTabContent" class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                                        <p class="lead">Address Information</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Email:</th>
                                                                        <td><input type="text" class="form-control" value="<?= $getData3['email']; ?>" name="email" id="email"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Mobile:</th>
                                                                        <td><input type="text" class="form-control" name="mobile" id="mobile" value="<?= $getData3['phone']; ?>" ></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Pickup Address:</th>
                                                                        <td><input type="" name="address" class="form-control" id="address" value="address"><?php
                                                                            echo $getData['pickup_address'] . ", " . $getData['pickup_city'] . ", " . $getData['pickup_state'] . ", " . $getData['pickup_pincode'];
                                                                            ?></td>
                                                                    </tr>

<tr>
                                                                        <th>City:</th>
                                                                        <td>
<select class="form-control" id="city">
<option>Select</option>
<option>Delhi</option>
<option>Mumbai</option>
<option>Hyderabad</option>
</select>
</td>
 </tr>

<tr>
                                                                        <th>State:</th>
                                                                        <td>
<select class="form-control" id="state">
<option>Select</option>
<option>Delhi</option>
<option>Mumbai</option>
<option>Hyderabad</option>
</select>
</td>
 </tr>

<tr>
                                                                        <th>Pincode:</th>
                                                                        <td><input type="" name="pincode" class="form-control" id="pincode" value="address"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Billing Address</th>
                                                                        <td><input type="text" name="billadd" id="billadd" class="form-control" value="Billing Address"><?php
                                                                            if ($getData['billing_address'] == null) {
                                                                                echo "Same as pickup address";
                                                                            } else {
                                                                                echo $getData['billing_address'] . ", " . $getData['billing_city'] . ", " . $getData['billing_state'] . ", " . $getData['billing_pincode'];
                                                                            }
                                                                            ?></td>
                                                                    </tr>

<tr>
                                                                        <th>City:</th>
                                                                        <td>
<select class="form-control" id="city">
<option>Select</option>
<option>Delhi</option>
<option>Mumbai</option>
<option>Hyderabad</option>
</select>
</td>
 </tr>

<tr>
                                                                        <th>State:</th>
                                                                        <td>
<select class="form-control" id="state">
<option>Select</option>
<option>Delhi</option>
<option>Mumbai</option>
<option>Hyderabad</option>
</select>
</td>
 </tr>

<tr>
                                                                        <th>Pincode:</th>
                                                                        <td><input type="" name="pincode" class="form-control" id="pincode" value="address"></td>
                                                                    </tr>
																	<tr>
                                                                        <th></th>
                                                                        <td><button class="btn btn-primary">Save</button>&nbsp; &nbsp;<button class="btn btn-primary">Next</button></td>
																		
                                                                    </tr>
																	

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                                                        <p class="lead">Business Information</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Company Name:</th>
                                                                        <td><input type="text" name="comp-name" id="comp-name" class="form-control" value="<?= $getData['comp_name']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Company PAN:</th>
                                                                        <td><input type="text" name="company-pan" id="company-pan" class="form-control" value="<?= $getData1['company_pan']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Vat Number:</th>
                                                                        <td><input type="text" name="vat-number" id="vat-number" class="form-control" value="<?= $getData1['vat_number']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>CST Number:</th>
                                                                        <td><input type="text" name="cstnumber" id="cstnumber" class="form-control" value="<?= $getData1['cstnumber']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Bank Name</th>
                                                                        <td><input type="text" name="bankname" id="bankname" class="form-control" value="<?= $getData1['beneficiary']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Account Number:</th>
                                                                        <td><input type="text" name="account-number" id="account-number" class="form-control" value="<?= $getData1['account_number']; ?>"></td>
                                                                    </tr>
																	<tr>
                                                                        <th>Holder Name:</th>
                                                                        <td><input type="text" name="holder-name" id="holder-name" class="form-control" value="<?= $getData1['holder_name']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>IFSC Code::</th>
                                                                        <td><input type="text" name="ifsc-code" id="ifsc-code" class="form-control" value="<?= $getData1['ifsc_code']; ?>"></td>
                                                                    </tr>
																	
																	<tr>
                                                                        <th></th>
                                                                        <td><button class="btn btn-primary">Save</button> <button class="btn btn-primary">Next</button></td>
                                                                    </tr>
																	
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="doc-tab">
                                                                                                                <p class="lead">Change Your Password</p>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    <tr>
                                                                        <th>Current Password:</th>
                                                                        <td><input type="text" name="Current-Password" id="Current-Password" class="form-control"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>New Password:</th>
                                                                        <td><input type="text" name="New-Password" id="New-Password" class="form-control"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Confirm Password:</th>
                                                                        <td><input type="text" name="Confirm-Password" id="Confirm-Password" class="form-control"></td>
                                                                    </tr>
                                                               
																	
																	<tr>
                                                                        <th></th>
                                                                        <td><button class="btn btn-primary">Save</button> <button class="btn btn-primary">Next</button></td>
                                                                    </tr>
																	
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

        <!-- image cropping -->
        <script src="js/cropping/cropper.min.js"></script>
        <script src="js/cropping/main.js"></script>

        <!-- daterangepicker -->
        <script type="text/javascript" src="js/moment/moment.min.js"></script>
        <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>

        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>

        <!-- moris js -->
        <script src="js/moris/raphael-min.js"></script>
        <script src="js/moris/morris.min.js"></script>

        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>

        <script>
            $(function () {
                Morris.Bar({
                    element: 'graph_bar',
                    data: [
                        {"period": "Jan", "Hours worked": 80},
                        {"period": "Feb", "Hours worked": 125},
                        {"period": "Mar", "Hours worked": 176},
                        {"period": "Apr", "Hours worked": 224},
                        {"period": "May", "Hours worked": 265},
                        {"period": "Jun", "Hours worked": 314},
                        {"period": "Jul", "Hours worked": 347},
                        {"period": "Aug", "Hours worked": 287},
                        {"period": "Sep", "Hours worked": 240},
                        {"period": "Oct", "Hours worked": 211}
                    ],
                    xkey: 'period',
                    hideHover: 'auto',
                    barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                    ykeys: ['Hours worked', 'sorned'],
                    labels: ['Hours worked', 'SORN'],
                    xLabelAngle: 60,
                    resize: true
                });

                $MENU_TOGGLE.on('click', function () {
                    $(window).resize();
                });
            });
        </script>

        <!-- datepicker -->
        <script type="text/javascript">
            $(document).ready(function () {

                var cb = function (start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
                }

                var optionSet1 = {
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment(),
                    minDate: '01/01/2012',
                    maxDate: '12/31/2015',
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM/DD/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        cancelLabel: 'Clear',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                        firstDay: 1
                    }
                };
                $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                $('#reportrange').daterangepicker(optionSet1, cb);
                $('#reportrange').on('show.daterangepicker', function () {
                    console.log("show event fired");
                });
                $('#reportrange').on('hide.daterangepicker', function () {
                    console.log("hide event fired");
                });
                $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                    console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
                });
                $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                    console.log("cancel event fired");
                });
                $('#options1').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                });
                $('#options2').click(function () {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                });
                $('#destroy').click(function () {
                    $('#reportrange').data('daterangepicker').remove();
                });
            });
        </script>
        <!-- /datepicker -->
    </body>

</html>
