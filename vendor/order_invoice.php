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
$msg1 = urlencode("Your order $odonil is cancelled by the seller due to insufficient stock"); 
}
$ID = 'argecom';
$Pwd = 'argecom';
$PhNo = $phone1['phone']; 
 
$Text = $msg1;

$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";
//echo $url;
//$ret = file($url);
//echo $ret[9];
//curl url
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
//curl url
//msg



											die();
										}

 $read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
  $vendorId = $read['unique_user_id'];
  
  $num_of_product = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId'");
$num_of_vrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '1'");
$num_of_unvrify = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And verify = '0'");
$num_of_inactive = $dbAccess->countDtata("select * from product_tbl where vendor_id = '$vendorId' And status = 0");
?>
<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        
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
					
					.tabbtn0 {
    /* margin-left: 75px; */
    position: relative;
    /* border: 1px solid; */
    left: -18%;
    z-index: 999999;
    float: left;
    display: inline-block;
    margin-top: 65px;
}
					
					.dataTables_wrapper {
                      position: relative;
                      clear: both;
                      zoom: 1;
                      z-index:0;
                      margin-top: -47px;}
					  
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
                                    Product List
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
												    <span class="value text-success"> <?= $num_of_product; ?> </span>
                                                  
                                                   
                                                </div> 

                <h3>Total order</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="order_product.php?order=NEW" class="count"><div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxgreen">
                <div class="icon"><i class="fa fa-thumbs-o-up tile2" aria-hidden="true"></i>
                </div>
               <div class="count">
													<span class="value text-success"> <?= $num_of_vrify; ?> </span>
                                                    
                                                    
                                                    </div>

                <h3>New Order</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
              </div>
            </div></a>
            <a href="order_product.php?order=CAN" class="count"> <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats boxxorange">
                <div class="icon"><i class="fa fa-clock-o tile3" aria-hidden="true"></i>
                </div>
                <div class="count">
													 <span class="value text-success"> <?= $num_of_unvrify; ?> </span>
                                                   
                                                   
                                                    </div>

                <h3>Cancelled Order</h3>
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

                <h3>Delivery Order</h3>
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
                                        <h2><?php if($_GET['ptype']==1) echo "Apporoved"; else if($_GET['ptype']==2) echo "Waiting For Approval"; else echo "Invoice";?> Order List<small></small></h2>
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
