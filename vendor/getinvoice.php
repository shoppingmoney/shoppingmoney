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
@extract($_GET);
$ord=$dbAccess->selectSingleStmt("SELECT * FROM checkout WHERE orderid='$oid'");
$vn = $dbAccess->selectSingleStmt("SELECT * FROM vendor_details WHERE unique_user_id='{$_SESSION['userEmail']}'");
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

  <title>Shoppingmoney</title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">


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
                    Invoice
                    <small>
                        Complete detail of order
                    </small>
                </h3>
            </div>

           
          </div>
          <div class="clearfix"></div>

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
						  $lsum = 0;
						  $tship = 0;
														// getting sum and count of product in particular orderid 
														//$s_pro=$dbAccess->selectSingleStmt("SELECT count(id) as cnt, sum(mrp) as total FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."'");
														$prd=$dbAccess->selectData("SELECT * FROM checkout_ord WHERE orderid='".$oid."' AND vendor_id='".$vid."' AND status > 2 AND status <> 9");
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
      <footer>
        <div class="pull-right">
          <a target="_blank" href="http://shoppingmoney.in/">Shoppingmoney - Vendor</a>
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

  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
</body>

</html>
