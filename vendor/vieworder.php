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
 $read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
                                                 $vendorId = $read['unique_user_id'];
if (isset($_GET['pid'])) {
    $dbAccess->updateData("delete from product_tbl where product_id = '" . $_GET['pid'] . "' ");
    $dbAccess->updateData("delete from shipping where product_id = '" . $_GET['pid'] . "' ");
    $dbAccess->updateData("delete from discount where product_id = '" . $_GET['pid'] . "' ");
    $dbAccess->updateData("delete from product_img where product_id = '" . $_GET['pid'] . "' ");
    $dbAccess->updateData("delete from features where product_id = '" . $_GET['pid'] . "' ");
    echo "<script>alert('Product has removed from database');</script>";
    header("location:product_list.php");
	die();
}
$num_of_product = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId'");
$num_of_vrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '1'");
$num_of_unvrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '0'");
$num_of_inactive = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And status = 0");
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

        <link href="js/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="js/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="js/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="js/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="js/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css" />

        <script src="js/jquery.min.js"></script>
			  <style>
			  .text-success {color: #ffffff;}

              .tile-stats h3 {color: #ffffff;}
			  
			  table img{width:50px; height:80px !important;}
			  
			  .tile1{
						color:#0d99b1;
					}
					.tile2{
						color:#0f8e5a;
					}
					.tile3{
						color:#b57e1b;
					}
					.tile4{
						color:#710e0e;
					}
			  </style>

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
                                <h3>
                                   
                                    <small>
                                       
                                    </small>
                                </h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
<div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><small></small></h2>
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
                                           <!-- <ul class="wizard_steps">
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

                                            </ul>-->
                                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" onSubmit="return validate();" >
                                                <div id="step-1">


                                                    <ul class="wizard_steps">
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="step_no">1</span>
                                                        <span class="step_descr">
                                                            Packaging<br />
                                                            
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="step_no">2</span>
                                                        <span class="step_descr">
                                                            Invoice<br />
                                                            
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="step_no">3</span>
                                                        <span class="step_descr">
                                                            Manifest<br />
                                                            
                                                        </span>
                                                    </a>
                                                </li>
												 <li>
                                                    <a href="#step-4">
                                                        <span class="step_no">4</span>
                                                        <span class="step_descr">
                                                            Shipping<br />
                                                            
                                                        </span>
                                                    </a>
                                                </li>
												 <li>
                                                    <a href="#step-5">
                                                        <span class="step_no">5</span>
                                                        <span class="step_descr">
                                                            Delivery<br />
                                                           
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
											
											
											

                                                </div>
                                           
                                            </form>
                                        </div>
                                        <!-- End SmartWizard Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
 				

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?php if($_GET['ptype']==1){ echo "Apporoved";} else if($_GET['ptype']==2){ echo "Waiting For Approval";}elseif($_GET['ptype']==3){echo "Inactive";} else echo "All";?> Order List<small></small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="19">S NO</th>
													
													<th>Image</th>
                                                    <th>Title</th>
													
													<th>Order ID</th>
													<th>Location</th>
													<th>Date</th>
                                                    <th>Price</th>
													<th>Landing Price</th>
                                                    <th>Current Status</th>
                                                    
													<th>Remarks</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php 
                                            if($_GET['ptype']==1) $verify=1; //For Approved Product
                                            
                                            if($_GET['ptype']==2) $verify=0; //For waiting for approval product
                                            
             if($_GET['ptype']==1 || $_GET['ptype']==2){     //For apporved and waiting for approval product                              
            $catch = $dbAccess->selectData("select * from product_tbl where vendor_id = '$vendorId' and verify='$verify'");
			 }else if($_GET['ptype']==3){
			 $catch = $dbAccess->selectData("select * from product_tbl where vendor_id = '$vendorId' AND status=0");	 
			 }else{
            $catch = $dbAccess->selectData("select * from product_tbl where vendor_id = '$vendorId' ");
			 }
                                                $c = 1;
                                               foreach ($catch as $t) 
                                              {
                                                    ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
														
														
														 <?php
                                                        $tp = $dbAccess->selectSingleStmt("select * from product_img where product_id = '" . $t['product_id'] . "' ");
                                                        ?>
                                                        <td><img src="<?= $tp['image']; ?>" height="50" width="80" /></td>
                                                        <td><?= $t['title']; ?></td>
														
														<td><?= $t['title']; ?></td>
														<td><?php
                                                            if ($t['status'] == '1') {
                                                                echo "text";
                                                            } else {
                                                                echo "Inactive";
                                                            }
                                                            ?> </td>
															
														 <td>Rs.<?= $t['title']; ?></td>
                                                        <td>Rs.<?= $t['mrp']; ?></td>
                                                        <td>Rs.<?= $t['mrp']; ?></td>

                                                       
                                                        <td>
                                                            <?php
                                                            if ($t['verify'] == '1') {
                                                                echo "Approved";
                                                            } else {
                                                                echo "Waiting For Approval";
                                                            }
                                                            ?> 
                                                        </td>
                                                       
														
														 <td><?php
                                                            if ($t['status'] == '1') {
                                                                echo "text";
                                                            } else {
                                                                echo "Inactive";
                                                            }
                                                            ?></td>
                                                    </tr>
                                                    <?php
                                                    $c++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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


        <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
  <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

        <!-- Datatables-->
        <script src="js/datatables/jquery.dataTables.min.js"></script>
        <script src="js/datatables/dataTables.bootstrap.js"></script>
        <script src="js/datatables/dataTables.buttons.min.js"></script>
        <script src="js/datatables/buttons.bootstrap.min.js"></script>
        <script src="js/datatables/jszip.min.js"></script>
        <script src="js/datatables/pdfmake.min.js"></script>
        <script src="js/datatables/vfs_fonts.js"></script>
        <script src="js/datatables/buttons.html5.min.js"></script>
        <script src="js/datatables/buttons.print.min.js"></script>
        <script src="js/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="js/datatables/dataTables.keyTable.min.js"></script>
        <script src="js/datatables/dataTables.responsive.min.js"></script>
        <script src="js/datatables/responsive.bootstrap.min.js"></script>
        <script src="js/datatables/dataTables.scroller.min.js"></script>


        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script>
            var handleDataTableButtons = function () {
                "use strict";
                0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [{
                            extend: "copy",
                            className: "btn-sm"
                        }, {
                            extend: "print",
                            className: "btn-sm"
                        }],
                    responsive: !0
                })
            },
                    TableManageButtons = function () {
                        "use strict";
                        return {
                            init: function () {
                                handleDataTableButtons()
                            }
                        }
                    }();
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({
                    keys: true
                });
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable({
                    ajax: "js/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({
                    fixedHeader: true
                });
            });
            TableManageButtons.init();
        </script>
		
		
    </body>
</html>