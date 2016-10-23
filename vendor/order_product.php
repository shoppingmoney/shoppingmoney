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

										if(isset($_GET['q'])){
											//echo "q=".$_GET['q']."p=".$_GET['r']."v=".$_GET['s'];
											$dbAccess->updateData("update checkout_ord set status = '".$_GET['q']."' where product_id = '".$_GET['r']."' And orderid = '".$_GET['o']."' AND vendor_id='".$_GET['s']."'");
//msg
$odonil = $_GET['o'];

$phone1 = $dbAccess->selectSingleStmt("select * from checkout where orderid = '".$_GET['o']."'");

if($_GET['q']=='1'){
$msg1 = urlencode("Your order $odonil has been recieved successfully and ready to dispatch"); 
}
if($_GET['q']=='2'){
$msg1 = urlencode("Your order $odonil is packed and waiting for the courier pickup"); 

}
if($_GET['q']=='3'){
$msg1 = urlencode("Your order $odonil is dispatched by the seller and will reached to you on the time"); 
}
if($_GET['q']=='9'){
	$getchkOrd_id=$dbAccess->selectSingleStmt("select * from checkout_ord where product_id = '".$_GET['r']."' And orderid = '".$_GET['o']."' AND vendor_id='".$_GET['s']."'");
	 $getUser_VendorData=$dbAccess->selectSingleStmt("select firstimeregd.uemail,firstimeregd.ufirstname,firstimeregd.ulastname,register_vendor.name,register_vendor.unique_user_id,register_vendor.email,register_vendor.phone,product_tbl.title from firstimeregd inner join checkout_ord on firstimeregd.id=".$getchkOrd_id['user_id'] ." inner join register_vendor on checkout_ord.vendor_id=register_vendor.unique_user_id inner join product_tbl on checkout_ord.product_id=product_tbl.product_id where checkout_ord.checkout_id='".$getchkOrd_id['checkout_id']."' group by checkout_ord.orderid");
	 $table="cancellation";
	 $checkoutOrd_id=$getchkOrd_id['id'];
	 $reason="Out of Stock";
		   $column="checkout_ord_id,cancel_date,reason,refund_status,cancel_mode";
		   $value="'$checkoutOrd_id',NOW(),'$reason','0','By Vendor'";
		   
		   $insertCancellation=$dbAccess->insertData($table,$column,$value);
$msg1 = urlencode("Dear ".$getUser_VendorData['ufirstname']." your Item ".$getUser_VendorData['title']." of Order $odonil is cancelled by the seller due to insufficient stock"); 
$vendor_mail=$getUser_VendorData['title']." of Order: $odonil successfully cancelled";
$superadmin_mail="Dear Admin ".$getUser_VendorData['title']." of Order: $odonil  Vendor Id:".$getUser_VendorData['unique_user_id']." is cancelled by the seller due to insufficient stock";
 //$helper->send_mail('Order Cancellation',$msg1,$getUser_VendorData->uemail); // to user
			$helper->send_mail('Order Cancellation',$vendor_mail,$getUser_VendorData->email); // to vendor
			$helper->send_mail('Order Cancellation',$superadmin_mail,'info@shoppingmoney.com'); // to shopping money
}

$helper->send_msg($phone1['phone'],$msg1); // msg to user
           
											die();
										}

 $read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
  $vendorId = $read['unique_user_id'];
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
                                    Product List
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
                                        <h2><?php if($_GET['ptype']==1) echo "Apporoved"; else if($_GET['ptype']==2) echo "Waiting For Approval"; else echo "All";?> Product List<small></small></h2>
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S NO</th>
													<th>Order ID</th>
                                                    <th>Title</th>
                                                    <th>Landing Price</th>
                                                    <th>Order By</th>
                                                    <th>Current Status</th>
													<th>Status</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
												if($_GET['order']=='ALL'){
											$sender=$dbAccess->selectData("select chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid 
											where chko.vendor_id = '$vendorId' ORDER BY chko.id desc ");
												}
												else if($_GET['order']=='CAN'){
											$sender=$dbAccess->selectData("select chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where chko.vendor_id = '$vendorId' And chko.status='9' ORDER BY chko.id desc");
												}
												else if($_GET['order']=='NEW'){
													$sender=$dbAccess->selectData("select chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where chko.vendor_id = '$vendorId' And chko.status='0' AND chko.status <> '9' ORDER BY chko.id desc");
												}else{
													$sender=$dbAccess->selectData("select * from checkout_ord select chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where chko.orderid='".$_GET['viewid']."' And chko.vendor_id = '$vendorId' ORDER BY chko.id desc");
												}
 $c = 1;											
											foreach($sender as $ty){
												$ordid=$ty['orderid'];
            $catch = $dbAccess->selectSingleStmt("select * from product_tbl where vendor_id = '$vendorId' And product_id='".$ty['product_id']."'");
            $status = "";
			if($ty['status'] == 1){
				$status = "Order Recieved";
			}else if($ty['status'] == 2){
				$status = "Processing";
			}else if($ty['status'] == 3){
				$status = "Dispatched";
			}else if($ty['status'] == 4){
				$status = "Delivered";
			}elseif($ty['status']==9){
				$status = "Canceled";
			}else{
				$status = "Not Initialize";
			}
                                                    ?>
                                                    <tr>
                                                        <td><?= $c; ?></td>
														<td><?= $ty['orderid']; ?></td>
                                                        <td><?= $catch['title']; ?></td>
                                                        <td><?= $catch['landing_price']; ?></td>
                                                       <td><p><?php echo $ty['fname'].", ".$ty['address'].", ".$ty['city'].", ".$ty['state']?></p></td>
                                                        <td><?=$status?></td>
                           
														<td>
															<select name="ordstate" class="form-control" onChange="edx(this.value,'<?=$ty['product_id'];?>','<?=$ty['orderid'];?>')">
															<?php
														//	$ko=$dbAccess->selectSingleStmt("select * from checkout_ord where product_id = '".$ty['product_id']."' ");
															if($ty['status']==4){ ?>
															<option value="4" SELECTED>Delivered</option>
															<?php
															}
															else {
															if($ty['status']==0){ ?>
															<option>Select Option</option>
															<option value="1">Order Recieved</option>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<option value="9">Cancel Order</option>
															<?php } else if($ty['status']==9){ ?>
															<option value="9">Cancel Order</option>
											  <?php } else if($ty['status']==1){ ?>
															<option value="1">Order Recieved</option>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<?php }else if($ty['status']==2){ ?>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<?php }else{ ?>
															<option value="3">Dispatched</option>
															<?php } } ?>
															</select>
															</td>
                                                    </tr>
                                                    <?php
                                                    $c++;
                                                
											}
                                                ?>
                                            </tbody>
                                        </table>
										
										
										<script>
										function edx(str,rush,o) {
											//alert("order_product.php?q="+str+"&r="+rush+"&s=<?=$vendorId;?>"+"&o=<?=$ordid;?>");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("demo").innerHTML = xhttp.responseText; 
    }
  };
  xhttp.open("GET", "order_product.php?q="+str+"&r="+rush+"&s=<?=$vendorId;?>"+"&o="+o, true);
  xhttp.send();
} 
										</script>
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
