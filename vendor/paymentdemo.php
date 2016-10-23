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
                            <div class="col-md-12">
                                <div class="x_panel">
                                   

                                    <div class="x_content">

                                        <div class="col-xs-12">

                                           

                                          <!---  <div id="mainb" style="height:350px;"></div>----->
										    <div class="row top_tiles">
            <a href="product_list.php" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats box-blue">
                <div class="icon"><i class="fa fa-sort-numeric-asc tile1" aria-hidden="true"></i>
                </div>
                <div class="count">
												    <span class="value text-success"> <?= $num_of_product; ?> </span>
                                                  
                                                   
                                                </div> 

                <h3>Total Product</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="product_list.php?ptype=1" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-thumbs-o-up tile2" aria-hidden="true"></i>
                </div>
               <div class="count">
													<span class="value text-success"> <?= $num_of_vrify; ?> </span>
                                                    
                                                    
                                                    </div>

                <h3>Approved Product</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="product_list.php?ptype=2" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-clock-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Rejected Product</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="product_list.php?ptype=3" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxred">
                <div class="icon"><i class="fa fa-clock-o tile4" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success"> <?= $num_of_inactive; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Inactive Product</h3>
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
                                        <h2><?php if($_GET['ptype']==1){ echo "Apporoved";} else if($_GET['ptype']==2){ echo "Waiting For Approval";}elseif($_GET['ptype']==3){echo "Inactive";} else echo "All";?> Product List<small></small></h2>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="19">S NO</th>
													<th width="29"><label><input type="checkbox" class="check" id="checkAll"></label><label>ALL</label></th>
													<th>Image</th>
                                                    <th>Title</th>
													<th>SKU No.</th>
													<th>Product ID</th>
													<th>Description</th>
                                                    <th>Price</th>
                                                    <th>Current Status</th>
                                                    <th>Action</th>
													<th>Remark</th>
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
														<td><label>
      <input type="checkbox" class="check"> 
    </label></td>
														
														 <?php
                                                        $tp = $dbAccess->selectSingleStmt("select * from product_img where product_id = '" . $t['product_id'] . "' ");
                                                        ?>
                                                        <td><img src="<?= $tp['image']; ?>" height="50" width="80" /></td>
                                                        <td><?= $t['title']; ?></td>
														<td><?= $t['title']; ?></td>
														<td><?= $t['title']; ?></td>
														<td><?php
                                                            if ($t['status'] == '1') {
                                                                echo "text";
                                                            } else {
                                                                echo "Inactive";
                                                            }
                                                            ?> </td>
														
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
                                                        <td>
                                                            <a onclick="return confirm('Do you want to Edit this Product')" href="edit_product.php?pid=<?= $t['product_id']; ?>&session/<?= rand(1000, 1000); ?>"><i class="fa fa-edit"></i></a>
                                                            &nbsp;
                                                            <a onclick="return confirm('Do you want to Delete this Product')" href="product_list.php?pid=<?= $t['product_id']; ?>&session/<?= rand(1000, 1000); ?>"><i class="fa fa-times"></i></a>
                                                       <br> <button class="btn btn-success btn btn-link"><a href="viewpro.php">view</a></button>
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
		
		<script type="text/javascript">
		$("#checkAll").click(function () {
    $(".check").prop('checked', $(this).prop('checked'));
});
		</script>
    </body>
</html>