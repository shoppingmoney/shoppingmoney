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
@extract($_GET);
if(isset($_GET['orderid'])){
		$dbAccess->updateData("UPDATE checkout_ord SET bill_status='1' WHERE orderid='".$orderid."' AND vendor_id='".$vid."'");
		$dbAccess->updateData("insert into transaction(vendor_id,bill_type,date,amount,landing_price,orderid,status) values('$vid','Shopping Money','".date("Y-m-d")."','$amount','$landing','$orderid','Unpaid')");
	    header("location:order_toShoppingmoney.php");
		die();
}
$ord=$dbAccess->selectSingleStmt("SELECT * FROM checkout WHERE orderid='$oid'");
$vn = $dbAccess->selectSingleStmt("SELECT * FROM vendor_details WHERE unique_user_id='{$_SESSION['userEmail']}'");
$customer = $dbAccess->selectSingleStmt("SELECT ufirstname,ulastname FROM firstimeregd WHERE id = '".$ord['user_id']."'");
?>
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
                                        <strong><?=$vn['comp_name'];?></strong>
                                        <br><?=$vn['pickup_address']?>
                                        <br><?=$vn['pickup_state']?>, <?=$vn['pickup_city']?>,<?=$vn['pickup_pincode']?>
                                        <br>Phone: <?=$phone?>
                                        <br>Email: <?=$_SESSION['userEmail']?>
                                    </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        To
                       <address>
                                        <strong>Shoppingmoney.in</strong>
                                        <br>23 Ankur apt I P extention 
                                        <br>Delhi, East Delhi ,110092
                                        <br>Phone: +91-981-110-7186
                                        <br>Email: customercare@shoppingmoney.in
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
							  <th>Landing Price</th>
							  <th>Display Price</th>
							   <th>Qty</th>
							   <th>Shipping</th>
                              <th>Description</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>
						  <?php
						  $i=0;
						  $sum = 0;
						  $lsum = 0;
						  $tship = 0;
					// getting sum and count of product in particular orderid 
					//$s_pro=$dbAccess->selectSingleStmt("SELECT count(id) as cnt, sum(mrp) as total FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."'");
						 $prd=$dbAccess->selectData("SELECT * FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."' AND billing_type='Shopping Money'  AND status > 2 AND status <> 9");
														foreach($prd as $pr){
															$pro=$dbAccess->selectSingleStmt("SELECT * FROM product_tbl WHERE product_id='".$pr['product_id']."'");
															$sh=$dbAccess->selectSingleStmt("SELECT * FROM shipping WHERE product_id='".$pr['product_id']."'");
															$i++;
															$mrp = $pr['qty']*$pr['mrp'];
															$sum += $mrp;
															$lsum += $pr['qty']*$pro['landing_price'];
															$ship = round($sh['shipping_charge']*$pr['qty'],2);
															$tship += $ship;
															$total = round($sum+$tship,2);
															$mrp = round($mrp+$ship,2);
						  ?>
                            <tr>
                              <td><?=$i;?></td>
                              <td><?=$pro['title'];?></td>
							  <td>Rs <?=$pro['landing_price'];?></td>
							  <td>Rs <?=$pr['mrp'];?></td>
							  <td><?=$pr['qty'];?></td>
							  <td>Rs <?=$ship;?></td>
                              <td><?=$pro['ptoduct_type'];?>,<?=$pro['brand'];?></td>
                              <td>Rs <?=$mrp;?></td>
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
							   <tr>
                                <th>Total Landing Price:</th>
                                <td>Rs <?=$lsum?></td>
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
                        <a href="invoice_shop.php?orderid=<?=$oid?>&vid=<?=$vid?>&amount=<?=$total?>&landing=<?=$lsum?>" onclick="return confirm('Are you sure to generate this bill');" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate Billing</a>
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

