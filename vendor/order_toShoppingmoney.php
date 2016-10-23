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
$vid = $dbAccess->selectSingleStmt("SELECT unique_user_id ,id,phone FROM register_vendor WHERE email='".$_SESSION['userEmail']."'");
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
<link type="text/css" rel="stylesheet" href="release/featherlight.min.css" />
<script src="release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.min.js"></script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
			  
			  <style>
			  .tabbtn0 {
    /* margin-left: 75px; */
    /* position: relative; */
    /* border: 1px solid; */
    margin-left: -49px;
    /* left: -8%; */
    z-index: 999999;
    float: left;
    display: inline-block;
    margin-top: 65px;
}

.tabbtn0 a{color:#fff;}
			 
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
                                    Orders List
                                    <small>
                                      
                                    </small>
                                </h3>
                            </div>


                        </div>
						
						
						 <div class="row">            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><?php if(isset($_GET['ptype'])){if($_GET['ptype']==1) echo "Apporoved"; else if($_GET['ptype']==2) echo "Waiting For Approval"; } else echo "";?> <small></small></h2>
                                       <ul class="tabbtn0">
                                       <li class="btn btn-primary"><a href="packaging.php?order=NEW">Packaging</a></li>
									    <li class="btn btn-success"><a href="order_invoice.php?order=NEW">Invoice</a></li>
										 <li class="btn btn-info"><a href="manifest.php?order=NEW">Manifest</a></li>
										  <li class="btn btn-warning"><a href="shipping.php?order=NEW">Shipping</a></li>
										   <li class="btn btn-danger"><a href="delivery.php?order=NEW">Delivery</a></li>
										   </ul>
                                        <div class="clearfix"></div>
										<button class="btn btn-primary"><a href="order_toShoppingmoney.php">Bill to Company</a></button>  <button class="btn btn-primary"><a href="order_toUser.php">Bill to User</a></button>
                                    </div>
                                    <div class="x_content">
									
									
                                        
                                </div>
                            </div>

                        </div>
                    </div>
                        <div class="clearfix"></div>

                        <div class="row">            

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Orders List<small>(Billing to Shoppingmoney)</small></h2>
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

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sn No</th>
                                                    <th>Purchased On</th>
                                                    <th>Customer Name </th>
                                                    <th>Price</th>
                                                    <th>OrderId</th>
													<th>Item </th>
                                                    <th>Generate Bill</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
											        $sql = "SELECT chk.orderid,chk.date,chko.bill_status,usr.ufirstname,usr.ulastname,sum(chko.mrp) as mrp, count(chko.id) as item FROM checkout chk 
													       INNER JOIN checkout_ord chko ON chk.orderid = chko.orderid LEFT JOIN firstimeregd usr ON usr.id = chk.user_id 
														   WHERE chko.billing_type='Shopping Money' AND chko.status > 2 AND chko.status <> 9 AND chko.vendor_id = '".$vid['unique_user_id']."' 
														   group by chk.orderid order by chk.id desc";
													$ord=$dbAccess->selectData($sql);
													$i=0;
													foreach ($ord as $or) {
														// getting sum and count of product in particular orderid 
														//$prd=$dbAccess->selectSingleStmt("SELECT count(id) as cnt, sum(mrp) as total,status,bill_status FROM checkout_ord WHERE orderid='".$or['orderid']."' AND vendor_id='".$vid['unique_user_id']."'");
														
															//$proid=$dbAccess->selectData("select * from checkout_ord where vendor_id='".$vid['unique_user_id']."' and orderid='".$or['orderid']."'");
													
															$i++;
														if($or['bill_status']==0){
															$bstatus="Not Generated";
															$bmsg = "Generate Bill";
															$col = "info";
															$class = "data-featherlight='ajax'";
															$url = "invoice_shop.php?phone={$vid['phone']}&oid={$or['orderid']}&vid={$vid['unique_user_id']}";
														}else{
															$bstatus="Generated";
															$bmsg = "Get Invoice";
															$col = "success";
															$class = "";
															$url="getinvoice_shop.php?phone={$vid['phone']}&oid={$or['orderid']}&vid={$vid['unique_user_id']}";
														} 
                                                    ?>
                                                    <tr>
                                                         <td><?= $i ?> </td>
															 <td><?=$helper->dateFormate($or['date']);?></td>
															 <td><?php echo $or['ufirstname']." ".$or['ulastname'];?></td>
															<td> <?= $or['mrp']; ?></td>
															<td><a href="order_product.php?viewid=<?= $or['orderid']; ?>"><?= $or['orderid']; ?></a> </td>
															<td><?=$or['item']?> Product </td>
														<td>
														
                                                            <a href="<?=$url?>" <?=$class;?> class="btn btn-<?=$col?> btn-sm"><?=$bmsg?></a>
                                                       
														</td>
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
       <script src="release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
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
<?php
$dbAccess->closeConnection();
?>
</html>
