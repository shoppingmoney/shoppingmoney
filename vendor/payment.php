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
$read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
$vendorId = $read['unique_user_id'];
$getData = $dbAccess->selectSingleStmt("select * from   vendor_details where unique_user_id = '$secureId'");
$payment_recieved = $dbAccess->selectSingleStmt("select sum(landing_price) as amount from transaction where vendor_id = '$vendorId' AND status = 'Paid'");
$payment_pending = $dbAccess->selectSingleStmt("select sum(landing_price) as amount from transaction where vendor_id = '$vendorId' AND status = 'Unpaid'");
$total_payment = $dbAccess->selectSingleStmt("select sum(landing_price) as amount from transaction where vendor_id = '$vendorId'");
?>

<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
        
        <!-- Meta, title, CSS, favicons, etc. -->
        
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
		<link type="text/css" rel="stylesheet" href="../vendor/release/featherlight.min.css" />
        <script src="release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
		
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
                            <div class="col-md-12">
                                <div class="x_panel">
                                   

                                    <div class="x_content">

                                        <div class="col-xs-12">

                                           

                                          <!--  <div id="mainb" style="height:350px;"></div> -->
											    <div class="row top_tiles">
            <a href="payment.php" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats box-blue">
                <div class="icon"><i class="fa fa-sort-numeric-asc tile1" aria-hidden="true"></i>
                </div>
                <div class="count">
												    <span class="value text-success"> <?=$total_payment['amount']; ?> </span>
                                                  
                                                   
                                                </div> 

                <h3>Total Payment</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="payment.php?ptype=RSVD" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-thumbs-o-up tile2" aria-hidden="true"></i>
                </div>
               <div class="count">
													<span class="value text-success"> <?=$payment_recieved['amount']; ?> </span>
                                                    </div>

                <h3>Recieved Payment</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="payment.php?ptype=PND" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-clock-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success"> <?=$payment_pending['amount'] ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Pending Payment</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            
          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">  
 				

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?php if(isset($_GET['ptype']) && ($_GET['ptype']=='RSVD')){ echo "Recieved";} else if(isset($_GET['ptype']) && ($_GET['ptype']=='PND')){ echo "Pending";}else{ echo "All";}?> payment List<small></small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                         <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sn No</th>
                                                    <th>OrderId</th>
													<th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Remark</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php
                                               if(isset($_GET['ptype'])){
                                                      if($_GET['ptype']=='RSVD'){
                                                   $ord=$dbAccess->selectData("SELECT * FROM transaction WHERE vendor_id = '$vendorId' AND status = 'Paid' ORDER BY id desc");
                                               } else if($_GET['ptype']=='PND'){
                                                   $ord=$dbAccess->selectData("SELECT * FROM transaction WHERE vendor_id = '$vendorId' AND status = 'Unpaid' ORDER BY id desc");
                                               }
                                               }
											 else{ 
												  $ord=$dbAccess->selectData("SELECT * FROM transaction WHERE vendor_id = '$vendorId' ORDER BY id desc");
											   }
													
													$i=0;
													foreach ($ord as $or) {
														$i++;
														//$prd=$dbAccess->selectSingleStmt("SELECT count(id) as cnt, sum(mrp) as total,status,bill_status FROM checkout_ord WHERE orderid='".$or['orderid']."' AND vendor_id='".$vid['unique_user_id']."'");
														
                                                    ?>
                                                    <tr>
                                                         <td><?= $i ?> </td>
															 <td><a href="order_detail_popup.php?oid=<?= $or['orderid']; ?>&vid=<?=$vid['unique_user_id']?>&btype=<?=urlencode($or['bill_type'])?>" data-featherlight="ajax" class="btn btn-info btn-sm"><?= $or['orderid']; ?></a></td>
															<td><?= $or['landing_price']; ?></td>
															<td> <?=$helper->dateFormate($or['date']);?></td>
															<td><?=$or['status'];?></td>
															<td><?=$or['remark'];?></td>
                                                    </tr>
                                                   <?php
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
		
		<script type="text/javascript">
		$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});
		</script>
    </body>
</html>