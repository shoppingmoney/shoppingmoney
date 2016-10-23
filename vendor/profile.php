<?php
    session_start();
    ob_start();
    if (isset($_SESSION['userEmail']) == null || isset($_SESSION['userEmail']) == '') {
        header("location:../index.php");
    }
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

                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

                                            <div class="profile_img">

                                                <!-- end of image cropping -->
                                                <div id="crop-avatar">
                                                    <!-- Current avatar -->
                                                    <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Avatar">
                                                    <!-- Loading state -->
                                                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                                                </div>
                                                <!-- end of image cropping -->

                                            </div>
                                             
                                            <h3><?= $getData['name']; ?></h3>
<h5> <strong>Vendor Id :</strong><span>000000000</span> </h5>
                                            <!--<ul class="list-unstyled user_data">
                                                <li><i class="fa fa-map-marker user-profile-icon"></i> <?php
                                                    echo $getData['pickup_address'] . ", " . $getData['pickup_city'] . ", " . $getData['pickup_state'];
                                                    ?>
                                                </li>

                                                <li>
                                                    <i class="fa fa-briefcase user-profile-icon"></i> <?= $getData['comp_name']; ?> (<?= $getData['main_category']; ?>)
                                                </li>

                                                <li class="m-top-xs">
                                                    <i class="fa fa-external-link user-profile-icon"></i>
                                                    <a href="#" target="_blank"><?= $getData3['email']; ?></a>
                                                </li>
                                            </ul>-->


                                            <br />



                                        </div>
                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                            <div class="profile_title">
                                                <div class="col-md-6">
                                                    <h2 class="us-i">User Information</h2>
                                                <a href="edit-profile.php" class="btn btn-link">Edit</a>
                                                </div>

                                            </div>


                                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Address Information</a>
                                                    </li>
                                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> Business Information</a>
                                                    </li>

                                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="doc-tab" data-toggle="tab" aria-expanded="false">Docs</a>
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
                                                                        <td><?= $getData3['email']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Mobile:</th>
                                                                        <td><?= $getData3['phone']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Pickup Address:</th>
                                                                        <td><?php
                                                                            echo $getData['pickup_address'] . ", " . $getData['pickup_city'] . ", " . $getData['pickup_state'] . ", " . $getData['pickup_pincode'];
                                                                            ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Billing Address</th>
                                                                        <td><?php
                                                                            if ($getData['billing_address'] == null) {
                                                                                echo "Same as pickup address";
                                                                            } else {
                                                                                echo $getData['billing_address'] . ", " . $getData['billing_city'] . ", " . $getData['billing_state'] . ", " . $getData['billing_pincode'];
                                                                            }
                                                                            ?></td>
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
                                                                        <td><?= $getData['comp_name']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Company PAN:</th>
                                                                        <td><?= $getData1['company_pan']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Vat Number:</th>
                                                                        <td><?= $getData1['vat_number']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>CST Number:</th>
                                                                        <td><?= $getData1['cstnumber']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Bank Name</th>
                                                                        <td><?= $getData1['beneficiary']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>Account Number:</th>
                                                                        <td><?= $getData1['account_number']; ?></td>
                                                                    </tr>
																	<tr>
                                                                        <th>Holder Name:</th>
                                                                        <td><?= $getData1['holder_name']; ?></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>IFSC Code::</th>
                                                                        <td><?= $getData1['ifsc_code']; ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="doc-tab">
                                                        <ul style="list-style: none;">
                                                            <?php foreach ($getData2 as $t) { ?>
                                                                <li style=" float: left; position: relative; margin: 2px;">
                                                                    <a href="http://localhost/onlineshop/vendor/docs/<?= $t['docs']; ?>" class="atch-thumb" download>
                                                                        <img src="images/1.png" alt="img" style="width:150px; height: 100px;">
                                                                    </a>
                                                                </li>
                                                                <?php
                                                            }
                                                            ?>



                                                        </ul>
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
