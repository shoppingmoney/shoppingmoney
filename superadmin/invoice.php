<?php
session_start();
ob_start();
if (isset($_SESSION['superEmail']) == null || isset($_SESSION['superEmail']) == '') {
    header("location:../index.php");
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
@extract($_GET);
if(isset($_GET['orderid'])){
		$dbAccess->updateData("UPDATE transaction SET bill_status='1' WHERE orderid='".$orderid."' AND vendor_id='".$vid."' AND product_id IN ($pid 0) ");
	    header("location:moneyhistory_unit.php");
		die();
}
$ord=$dbAccess->selectSingleStmt("SELECT * FROM checkout WHERE orderid='$oid'");
$vn = $dbAccess->selectSingleStmt("SELECT * FROM vendor_details WHERE unique_user_id='{$_SESSION['userEmail']}'");
$customer = $dbAccess->selectSingleStmt("SELECT ufirstname,ulastname FROM firstimeregd WHERE id = '".$ord['user_id']."'");
?>
<body class="nav-sm">
  <div class="container body">
    <div class="main_container">
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12">
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
                      <div class="col-sm-4 invoice-col">
                        From
                       <address>
                                        <strong>Shopping Money</strong>
                                        <br>23 ankur apt i p extention, 
                                        <br>New Delhi,Delhi,110092
                                        <br>Phone: 9811107186
                                        <br>Email: info@shoppingmoney.in
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
														$prd=$dbAccess->selectData("SELECT * FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."' AND billing_type='Shopping Money' AND status='3' AND bill_status=1");
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
															  $subtotal=$price*$pr['qty'];
															 	$sum=$sum+$subtotal;
																	$total=$sum;
															$i++;
														
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
															  }
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
                          <!--    <tr>
                                <th>Tax (9.3%)</th>
                                <td>Rs 0.00</td>
                              </tr> -->
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
                       <!-- <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                        <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button> -->
                        <a href="invoice.php?orderid=<?=$oid?>&vid=<?=$vid?>&pid=<?=$pid?>" onclick="return confirm('Are you sure to generate this bill');" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate Billing</a>
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

     
    </div>
  </div>
  </body>
