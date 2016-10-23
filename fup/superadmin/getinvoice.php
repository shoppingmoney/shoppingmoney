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
$LoadMsg = new ReturnMsg();
@extract($_GET);
$ord=$dbAccess->selectSingleStmt("SELECT * FROM checkout WHERE orderid='$oid'");
$vn1 = $dbAccess->selectSingleStmt("SELECT * FROM register_vendor WHERE unique_user_id='$vid'");
$vn = $dbAccess->selectSingleStmt("SELECT * FROM vendor_details WHERE unique_user_id='".$vn1['email']."'");
$customer = $dbAccess->selectSingleStmt("SELECT ufirstname,ulastname FROM firstimeregd WHERE id = '".$ord['user_id']."'");
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
                    Invoice
                    <small>
                       Complete detail of order
                    </small>
                </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1>
                                        <i class="fa fa-globe"></i> Invoice.
                                        <small class="pull-right">Date: <?=$helper->dateFormate($ord['date']);?></small>
                                    </h1>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
					<?if($btype=='Shopping Money'){?>
                      <div class="col-sm-4 invoice-col">
                        From
                        <address>
                                        <strong><?=$vn['comp_name'];?></strong>
                                        <br><?=$vn['pickup_address']?>
                                        <br><?=$vn['pickup_state']?>, <?=$vn['pickup_city']?>,<?=$vn['pickup_pincode']?>
                                        <br>Phone: <?=$vn1['phone']?>
                                        <br>Email: <?=$vn1['email']?>
                                    </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                                        <strong>Shopping Money</strong>
                                        <br>23 ankur apt i p extention, 
                                        <br>New Delhi,Delhi,110092
                                        <br>Phone: 9811107186
                                        <br>Email: info@shoppingmoney.in
                                    </address>
					</div> <?php } ?>
					<?php if($btype=='Customer Name') {?>
					<div class="col-sm-4 invoice-col">
                        From
                        <address>
                                        <strong><?=$vn['comp_name'];?></strong>
                                        <br><?=$vn['pickup_address']?>
                                        <br><?=$vn['pickup_state']?>, <?=$vn['pickup_city']?>,<?=$vn['pickup_pincode']?>
                                        <br>Phone: <?=$vn1['phone']?>
                                        <br>Email: <?=$vn1['email']?>
                                    </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        To
                        <address>
                                        <strong><?=$ord['fname'];?></strong>
                                        <br><?=$ord['fname'];?>
                                        <br><?=$ord['city'];?>,<?=$ord['state'];?>, <?=$ord['pincode'];?>
                                        <br>Phone: <?=$ord['phone'];?>
                                        <br>Email: <?=$ord['user_email'];?>
                                    </address>
                      </div>
					<?php } ?>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Invoice</b>
                        <br>
                        <br>
                        <b>Order ID:</b> <?=$oid;?>
                        <br>
                        <b>Payment Due:</b> <?=$helper->dateFormate($ord['date']);?>
                        <br>
                        <!--<b>Account:</b> 968-34567 -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-xs-12 table">
                        <table class="table table-striped">
                          <thead>
                            <tr>
							  <th>S No</th>
                              <th>Product</th>
							  <th>Price</th>
							   <th>Qty</th>
							   <th>Shipping</th>
                              <th style="width: 59%">Description</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
						  <?php
						   $i=0;
						  $sum = 0;
						  $tship = 0;
							$pid='';							// getting sum and count of product in particular orderid 
														//$s_pro=$dbAccess->selectSingleStmt("SELECT count(id) as cnt, sum(mrp) as total FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."'");
														
														
															if($_GET['btype']=='Shopping Money')
															{  $prd=$dbAccess->selectData("SELECT * FROM checkout_ord,transaction WHERE checkout_ord.orderid='".$oid."' AND checkout_ord.vendor_id='".$vid."' AND checkout_ord.billing_type='Shopping Money' AND checkout_ord.status='3' AND transaction.bill_status='1'");
														      foreach($prd as $pr){
																$pro=$dbAccess->selectSingleStmt("SELECT * FROM product_tbl WHERE product_id='".$pr['product_id']."'");
															    $pid.=$pr['product_id'].',';
															 	 $title=$pro['title'];
																 $price=$pro['landing_price'];
																 $qty=$pr['qty'];
																
																	   $shipping='N/A';
																  
																
															  $desc= $pro['ptoduct_type']." ". $pro['brand'];
															  $subtotal=$price*$pr['qty'];
															 	$sum=$sum+$subtotal;
																	$total=$sum;
															$i++;
														/*	$mrp = $pr['qty']*$pr['mrp'];
															$sum += $mrp;
															$ship = round($sh['shipping_charge']*$pr['qty'],2);
															$tship += $ship;
															$total = round($sum+$tship,2);
															$mrp = round($mrp+$ship,2);
															*/
						  ?>
						 
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$title;?></td>
							 <!-- <td><?=$pro['billing_type'];?></td> -->
							 
							  <td>Rs <?=$price;?></td>
							  
							  <td><?=$qty;?></td>
							  <td><?=$shipping;?></td>
                              <td><?=$desc;?></td>
                              <td>Rs <?=$subtotal;?></td>
                            </tr>
							<?php
															  }		}
							if($_GET['btype']=='Customer Name')
															{  $prd=$dbAccess->selectData("SELECT * FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."' AND billing_type='Customer Name' AND status='3' AND bill_status=1 ");
														      foreach($prd as $pr){
																$pro=$dbAccess->selectSingleStmt("SELECT * FROM product_tbl WHERE product_id='".$pr['product_id']."'");
															 $pid.=$pr['product_id'].',';
															 	 $title=$pro['title'];
																 $price=$pr['mrp'];
																 $qty=$pr['qty'];
																  if($pr['shipping']==0 || $pr['shipping']== null|| $pr['shipping']== ''){
																	   $shipping='Free';
																  }
																  else
																  { $shipping="Rs ".$pr['shipping'];$tship=$tship+$pr['shipping']; }
															  $desc= $pro['ptoduct_type']." ". $pro['brand'];
															  $subtotal=$pr['mrp_total'];
															 	$sum=$sum+$subtotal;
																	$total=$sum+$tship;												
															$i++;
														/*	$mrp = $pr['qty']*$pr['mrp'];
															$sum += $mrp;
															$ship = round($sh['shipping_charge']*$pr['qty'],2);
															$tship += $ship;
															$total = round($sum+$tship,2);
															$mrp = round($mrp+$ship,2);
															*/
						  ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$title;?></td>
							 <!-- <td><?=$pro['billing_type'];?></td> -->
							 
							  <td>Rs <?=$price;?></td>
							  
							  <td><?=$qty;?></td>
							  <td><?=$shipping;?></td>
                              <td><?=$desc;?></td>
                              <td>Rs <?=$subtotal;?></td>
                            </tr>
							
							<?php
															  }		}
							?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                     <div class="col-xs-6">
                       <!-- <p class="lead">Payment Methods:</p>
                        <img src="images/visa.png" alt="Visa">
                        <img src="images/mastercard.png" alt="Mastercard">
                        <img src="images/american-express.png" alt="American Express">
                        <img src="images/paypal2.png" alt="Paypal">-->
                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                        <p class="lead">Amount Due <?=$helper->dateFormate($ord['date']);?></p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>Rs <?=$sum?></td>
                              </tr>
                              <tr>
                                <th>Tax (9.3%)</th>
                                <td>Rs 0.00</td>
                              </tr>
                              <tr>
                                <th>Shipping:</th>
                                <td>Rs <?=$tship?></td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>Rs <?=$total?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-xs-12">
                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> 
                        <a href="invoice.php?orderid=<?=$oid?>&vid=<?=$vid?>" onclick="return confirm('Are you sure to generate this bill');" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate Billing</a>-->
                      </div>
                    </div>
                  </section>
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

<script>
				  function changeStatus(btn,id){
					  //alert(id);
					  var flag = confirm("Do you want to change status.")
					  if(flag){
					  var status = $(btn).html();
					  if(status=='Paid'){
						  $(btn).removeClass("btn-success");
						  $(btn).addClass("btn-danger");
						  $(btn).html("Unpaid");
						  var st='Unpaid';
					  }else{
						  $(btn).removeClass("btn-danger");
						  $(btn).addClass("btn-success");
						  $(btn).html("Paid");
						  var st='Paid';
					  }
					  //Call Ajax
					  if (window.XMLHttpRequest) {
                      xmlhttp = new XMLHttpRequest();
                      } else {
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange = function () {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                     //$("#suggestion-box").load(document.URL + " #suggestion-box");
                     } else {

                         }
                     }
        xmlhttp.open("GET", "moneyhistory_unit.php?id=" + id + "&status="+st, true);
        xmlhttp.send();
					  }
				  }
				  </script>
       
        <script type="text/javascript">
          $(document).ready(function() {
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
