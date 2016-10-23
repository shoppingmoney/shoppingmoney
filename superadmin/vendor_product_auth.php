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
//for ajax requestAct
$vendi=$dbAccess->selectData("select * from checkout_ord where vendor_id='".$_GET['userID']."'");
$co=null;
foreach($vendi as $yti){
	$co .= $yti['product_id'].",";
}
?>
<?php
				  if(isset($_GET['q'])){
											$dbAccess->updateData("update checkout_ord set status = '".$_GET['q']."',deliver_date='".date('Y-m-d')."' where product_id = '".$_GET['r']."' And vendor_id = '".$_GET['s']."'");

$pappu=$dbAccess->selectSingleStmt("select * from checkout_ord where product_id = '".$_GET['r']."' And vendor_id = '".$_GET['s']."'");
$pappudad=$dbAccess->selectSingleStmt("select * from checkout where orderid = '".$pappu['orderid']."'");

//msg
$odonil = $pappudad['orderid'];

$msg1 = urlencode("Your order $odonil is successfully delivered to you, thank you for shopping with us"); 

$ID = 'argecom';
$Pwd = 'argecom';
$PhNo = $pappudad['phone']; 
 
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
                    Vendor
                    <small>
                        Total sold products
                    </small>
                </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>S No.</th>
                        <th>Title</th>
                        <th>Ptoduct Type</th>
                        <th>Mrp</th>
                        <th>Vendor Id</th>
                        <th>Verify</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php
					// echo "select * from product_tbl where product_id IN(".$co."0) ";
					 $getData = $dbAccess->selectData("select * from product_tbl where product_id IN(".$co."0) ");
                                                    $r = 1;
                                                    foreach ($getData as $t) {
														if($t['verify']==1){
															$status="Active";
															$cls = "success";
														}else{
															$status="Inactive";
															$cls="danger";
														}

if($t['sponser']==1){														$spon="Sponsored";
$clsmsg="success";
}else{
$spon="Unsponsored";
$clsmsg="danger";
}
                                                        ?>
                                                       
                                                        <tr>
														<td><?= $r; ?></td>
                                                            <td><?= $t['title']; ?></td>
                                                            <td><?= $t['ptoduct_type']; ?></td>
                                                            <td><?= $t['mrp']; ?></td> 
															<td><?=$t['vendor_id']?></td>
															
															<td><button type="button" onClick="changeStatus(this,'<?=$t['product_id']?>');" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button>

<button type="button" onClick="changeSpon(this,'<?=$t['product_id']?>','<?=$t['sponser']?>');" class="btn btn-<?=$clsmsg?> btn-xs"><?=$spon?></button>
                                                             <a style="float:right;" href="product_approval.php?pid=<?= $t['product_id']; ?>&requestAct=<?= rand(1000, 100000); ?>"><button type="button" class="btn btn-info btn-xs">View</button></a></td>
                                                             <td>
															 															<select name="ordstate" class="form-control" onChange="edx(this.value,'<?=$t['product_id'];?>')">

															 <?php
															$ko=$dbAccess->selectSingleStmt("select * from checkout_ord where product_id = '".$t['product_id']."' ");
															if($ko['status']==0){ ?>
															<option>Select Option</option>
															<option value="1">Order Recieved</option>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<option value="9">Cancel Order</option>
															<?php } else if($ko['status']==9){ ?>
															<option value="9">Cancel Order</option>
											  <?php } else if($ko['status']==1){ ?>
															<option value="1">Order Recieved</option>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<?php }else if($ko['status']==2){ ?>
															<option value="2">Processing</option>
															<option value="3">Dispatched</option>
															<?php }else if($ko['status']==3){ ?>
															<option value="3">Dispatched</option>
															<option value="4">Deliver</option>
															<?php }else{ ?>
															<option value="4">Deliver</option>
															<?php } ?>
															</select>
</td>


                                                        </tr>
                                                        
                                                        <?php
                                                        $r++;
                                                    }
                                                    ?> 

                    </tbody>
                  </table>
				  
<script>
										function edx(str,rush) {
											//alert("order_product.php?q="+str+"&r="+rush+"&s=<?=$_GET['viewid'];?>");
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("demo").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "vendor_product_auth.php?q="+str+"&r="+rush+"&s=<?=$_GET['userID'];?>", true);
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
					  if(status=='Active'){
						  $(btn).removeClass("btn-success");
						  $(btn).addClass("btn-danger");
						  $(btn).html("Inactive");
						  var st=0;
					  }else{
						  $(btn).removeClass("btn-danger");
						  $(btn).addClass("btn-success");
						  $(btn).html("Active");
						  var st=1;
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
        xmlhttp.open("GET", "vendor_product.php?id=" + id + "&status="+st, true);
        xmlhttp.send();
					  }
				  }
				  </script>


<script>
				  function changeSpon(btn,id,srt){

					  //alert("vendor_product.php?sponid=" + id + "&sponserid="+srt);
					  var flag = confirm("Do you want to change status.")
					  if(flag){
					  var status = $(btn).html();
					  if(status=='Sponsored'){
						  $(btn).removeClass("btn-success");
						  $(btn).addClass("btn-danger");
						  $(btn).html("Unsponsored");
						  var st=0;
					  }else{
						  $(btn).removeClass("btn-danger");
						  $(btn).addClass("btn-success");
						  $(btn).html("Sponsored");
						  var st=1;
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
        xmlhttp.open("GET", "vendor_product.php?sponid=" + id + "&sponserid="+srt, true);
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
