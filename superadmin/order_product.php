<?php
session_start();
ob_start();
if ($_SESSION['superEmail'] == null || $_SESSION['superEmail'] == '') {
    header("location:login.php");
}
include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$dbBlock = new DBQuery();
$LoadMsg = new ReturnMsg();
if(isset($_POST['setting'])){
	if(trim($_POST['menual']) > 0){
		$color = "7";
	}else{
		$color=$_POST['opt'];
	}
$dbAccess->updateData("update product_tbl set color_code='".$color."', menual='".$_POST['menual']."', billing_type='".$_POST['billtype']."' , commission_type='".$_POST['comtype']."' , commission='".$_POST['commission']."' where product_id = '".$_POST['hid']."' ");

$kamin=$dbAccess->selectSingleStmt("select * from product_tbl where product_id='".$_POST['hid']."'");
$disck = $kamin['mrp']-$kamin['landing_price'];
//commission_type
//commission

if($kamin['commission_type']=='percent'){
$commission = ($kamin['commission_type']*$kamin['landing_price'])/100;
}else{
$commission = $kamin['commission_type'];
}
$display = $commission+$kamin['landing_price'];

$amount = $kamin['mrp']-($commission+$kamin['landing_price']);

$discpercent = ($amount*100)/$kamin['mrp'];

$dbAccess->updateData("update discount set  discount='$discpercent' where product_id = '".$_POST['hid']."' ");
echo "<script>alert('Commission has been set');</script>";
}
//for ajax requestAct
if(isset($_GET['status'])){
	@extract($_GET);
	$dbAccess->updateData("UPDATE product_tbl SET verify='$status',readonly='$status' WHERE product_id='$id'");
	die();
}
$v_condition='';
$cv_condition='';
if(isset($_GET['vid'])){
	$vendorId = $_GET['vid'];
	$v_condition = "AND chko.vendor_id = '$vendorId' ";
	$cv_condition = "AND vendor_id = '$vendorId' ";
}

if(isset($_GET['sponid'])){
if($_GET['sponserid']==0){
$doId=1;
}else{
$doId=0;
}
$dbAccess->selectData("update product_tbl set sponser='$doId' where product_id = '".$_GET['sponid']."' ");
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

  <title>ShoppingMoney</title>

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
<script src="../vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
 <script src="../vendor/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
</head>


<body class="nav-sm">

  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
<?php
$menu="vendor";
include "inc/left.php";
?>
      </div>
</div>
      <!-- top navigation -->
 <?php include "inc/top.php"; ?>
      <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>
                                    Order List
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
            <a href="order_product.php?order=ALL" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats box-blue">
                <div class="icon"><i class="fa fa-sort-numeric-asc tile1" aria-hidden="true"></i>
                </div>
                <div class="count">
				<?php
													$d=$dbAccess->selectSingleStmt("select count(id) as cnt from checkout_ord where 1=1 $cv_condition ");
													?>
												    <span class="value text-success"> <?= $d['cnt']; ?> </span>
                                                  
                                                   
                                                </div> 

                <h3>Total order</h3>
              </div>
            </div></a>
            <a href="order_product.php?order=NEW" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-thumbs-o-up tile2" aria-hidden="true"></i>
                </div>
               <div class="count">
			   <?php
													$d=$dbAccess->selectSingleStmt("select count(id) as cnt from checkout_ord where 1=1 $cv_condition AND status = '0' AND status <> '9'");
													?>
													<span class="value text-success"> <?= $d['cnt']; ?> </span>
                                                    </div>

                <h3>New Order</h3>
              </div>
            </div></a>
            <a href="order_product.php?order=CAN" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-clock-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
				<?php
													$d=$dbAccess->selectSingleStmt("select count(id) as cnt from checkout_ord where 1=1 $cv_condition And status='9' ");
													?>
													 <span class="value text-success"> <?= $d['cnt']; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Cancelled Order</h3>
              </div>
            </div></a>
            <a href="order_product.php?order=DLVR" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxred">
                <div class="icon"><i class="fa fa-clock-o tile4" aria-hidden="true"></i>
                </div>
                <div class="count">
				<?php
													$d=$dbAccess->selectSingleStmt("select count(id) as cnt from checkout_ord where 1=1 $cv_condition And status='4' ");
													?>
													 <span class="value text-success"> <?= $d['cnt']; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Delivery Order</h3>
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
                                        <h2><?php
                                        if(isset($_GET['order'])){
                                         if($_GET['order']=='NEW'){ echo "NEW";} else if($_GET['order']=='DLVR'){ echo "Delivered";}else if($_GET['order']=='CAN'){echo "Canlcled";} 
                                        }
                                        else echo "All";?> order List<small></small></h2>
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
									<ul class="tabbtn0">
                                       <li class="btn btn-primary"><a href="order_product.php?order=PAC">Packaging</a></li>
									    <li class="btn btn-success"><a href="order_product.php?order=INV">Invoice</a></li>
										 <li class="btn btn-info"><a href="order_product.php?order=MANI">Manifest</a></li>
										  <li class="btn btn-warning"><a href="order_product.php?order=SHIP">Shipping</a></li>
										   <li class="btn btn-danger"><a href="order_product.php?order=DLVR">Delivery</a></li>
										   </ul>
                                        <div class="clearfix"></div>
                                   

                                                                               <table id="datatable-buttons" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>S NO</th>
													<th>Order ID</th>
													<th>Vendor ID</th>
                                                    <th>Title</th>
                                                    <th>Landing Price</th>
                                                    <th>Order By</th>
													<th>Date</th>
                                                    <th>Current Status</th>
													<th>Add Manifest</th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                <?php
												//$getData = $dbAccess->selectData("select * from  product_tbl where vendor_id = '".$_GET['userID']."' order by product_id desc");
                        if(isset($_GET['order'])){
												if($_GET['order']=='ALL'){
											$sender=$dbAccess->selectData("select chko.id,chko.date,chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid 
											where 1=1 $v_condition ORDER BY chko.id desc ");
												}
												else if($_GET['order']=='CAN'){
											$sender=$dbAccess->selectData("select chko.id,chko.vendor_id,chko.date,chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where 1=1 $v_condition And chko.status='9' ORDER BY chko.id desc");
												}
												else if($_GET['order']=='NEW'){
													$sender=$dbAccess->selectData("select chko.id,chko.vendor_id,chko.date,chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where 1=1 $v_condition And chko.status < 2 AND chko.status <> '9' ORDER BY chko.id desc");
												}else if($_GET['order']=='DLVR'){
													$sender=$dbAccess->selectData("select chko.id,chko.vendor_id,chko.date,chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where 1=1 $v_condition And chko.status='4' ORDER BY chko.id desc");
												}
                        }else{
													$sender=$dbAccess->selectData("select chko.id,chko.vendor_id,chko.date,chko.status,chko.orderid,chko.product_id,chk.fname,chk.address,chk.city,chk.state,chk.pincode
											from checkout_ord chko 
											INNER JOIN checkout chk ON chko.orderid = chk.orderid
											where 1=1 $v_condition ORDER BY chko.id desc");
												}
 $c = 1;											
											foreach($sender as $ty){
												$ordid=$ty['orderid'];
            $catch = $dbAccess->selectSingleStmt("select * from product_tbl where 1=1 $cv_condition And product_id='".$ty['product_id']."'");
			$mnfst = $dbAccess->selectSingleStmt("select count(id) as cnt from manifest where oid='".$ty['id']."'");
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
														<td><?= $ty['vendor_id']; ?></td>
                                                        <td><?= $catch['title']; ?></td>
                                                        <td><?= $catch['landing_price']; ?></td>
                                                        <td><p><?php echo $ty['fname'].", ".$ty['address'].", ".$ty['city'].", ".$ty['state']?></p></td>
                                                        <td><?= $ty['date']; ?></td>
													    <td><?=$status?></td>
														<td>
														<?php
														if($mnfst['cnt'] > 0){
														?>
														<a href="order_setting.php?vid=<?=$ty['vendor_id']; ?>&oid=<?=$ty['orderid']; ?>&cid=<?=$ty['id']; ?>" data-featherlight="ajax" class="btn btn-info btn-sm">Manifest Done</a>
														<?php }else{?>
														<a href="order_setting.php?oid=<?=$ty['orderid']; ?>&cid=<?=$ty['id']; ?>" data-featherlight="ajax" class="btn btn-info btn-sm">Manifest</a>
														<?php }?>
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
          <?php
	 include "inc/footer.php";
	 ?>
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
