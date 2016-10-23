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
$read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
$vendorId = $read['unique_user_id'];
$getData = $dbAccess->selectSingleStmt("select * from   vendor_details where unique_user_id = '$secureId' ");
$num_of_product = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId'");
$num_of_vrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '1'");
$num_of_unvrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '0'");
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
        <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
        <link href="css/icheck/flat/green.css" rel="stylesheet" />
        <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

        <script src="js/jquery.min.js"></script>
        <script src="js/nprogress.js"></script>

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
                                <h3>Vendor  <small>panel </small></h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>New Partner Contracts Consultancy</h2>
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

                                        <div class="col-md-9 col-sm-9 col-xs-12">

                                            <ul class="stats-overview">
                                                <li>
                                                    <span class="name"> Total Product </span>
                                                    <span class="value text-success"> <?= $num_of_product; ?> </span>
                                                </li>
                                                <li>
                                                    <span class="name"> Approved Product  </span>
                                                    <span class="value text-success"> <?= $num_of_vrify; ?> </span>
                                                </li>
                                                <li class="hidden-phone">
                                                    <span class="name"> Waiting For Approval </span>
                                                    <span class="value text-success"> <?= $num_of_unvrify; ?> </span>
                                                </li>
                                            </ul>
                                            <br />

                                            <div id="mainb" style="height:350px;"></div>

                                        </div>

                                        <!-- start project-detail sidebar -->
                                        <div class="col-md-3 col-sm-3 col-xs-12">

                                            <section class="panel">

                                                <div class="x_title">
                                                    <h2>Welcome Back</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="panel-body">
                                                    <h3 class="green"><i class="fa fa-paint-brush"></i> <?= $getData['name']; ?></h3>

                                                    <br />

                                                    <div class="project_detail">

                                                        <p class="title">Client Company</p>
                                                        <p><?= $getData['comp_name']; ?></p>
                                                        <p class="title">Dealing Category</p>
                                                        <p><?= $getData['main_category']; ?></p>
                                                    </div>

                                                    <br />



                                                </div>

                                            </section>

                                        </div>
                                        <!-- end project-detail sidebar -->

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

        <!-- echart -->
        <script src="js/echart/echarts-all.js"></script>
        <script src="js/echart/green.js"></script>
        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>


        <script>
            var myChart9 = echarts.init(document.getElementById('mainb'), theme);
            myChart9.setOption({
                title: {
                    x: 'center',
                    y: 'top',
                    padding: [0, 0, 20, 0],
                    text: 'Project Perfomance :: Revenue vs Input vs Time Spent',
                    textStyle: {
                        fontSize: 15,
                        fontWeight: 'normal'
                    }
                },
                tooltip: {
                    trigger: 'axis'
                },
                toolbox: {
                    show: true,
                    feature: {
                        dataView: {
                            show: true,
                            readOnly: false
                        },
                        restore: {
                            show: true
                        },
                        saveAsImage: {
                            show: true
                        }
                    }
                },
                calculable: true,
                legend: {
                    data: ['Revenue', 'Cash Input', 'Time Spent'],
                    y: 'bottom'
                },
                xAxis: [{
                        type: 'category',
                        data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    }],
                yAxis: [{
                        type: 'value',
                        name: 'Amount',
                        axisLabel: {
                            formatter: '{value} ml'
                        }
                    }, {
                        type: 'value',
                        name: 'Hours',
                        axisLabel: {
                            formatter: '{value} °C'
                        }
                    }],
                series: [{
                        name: 'Revenue',
                        type: 'bar',
                        data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3]
                    }, {
                        name: 'Cash Input',
                        type: 'bar',
                        data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3]
                    }, {
                        name: 'Time Spent',
                        type: 'line',
                        yAxisIndex: 1,
                        data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2]
                    }]
            });
        </script>
    </body>

</html>
