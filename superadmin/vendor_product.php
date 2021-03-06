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

if(isset($_GET['sponid'])){
if($_GET['sponserid']==0){
$doId=1;
}else{
$doId=0;
}
$dbAccess->selectData("update product_tbl set sponser='$doId' where product_id = '".$_GET['sponid']."' ");
die();
}		

$getData = $dbAccess->selectData("select * from  product_tbl where vendor_id = '".$_GET['userID']."' order by product_id desc");
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
                    Vendor's Product
                    <small>
                        List of products
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
                        <th>SKU No.</th>
                        <th>Title</th>
                        <th>SMPC No.</th>
                        <th>Mrp</th>
                        <th>Vendor Id</th>
                        <th>Verify</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php
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
 <td><?= $t['product_num']; ?></td>
                                                            <td><?= $t['title']; ?></td>
                                                            <td><?= $t['smpc']; ?></td>
                                                            <td><?= $t['mrp']; ?></td> 
															<td><?=$t['vendor_id']?></td>
															
															<td><button type="button" onClick="changeStatus(this,'<?=$t['product_id']?>');" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button>

<button type="button" onClick="changeSpon(this,'<?=$t['product_id']?>','<?=$t['sponser']?>');" class="btn btn-<?=$clsmsg?> btn-xs"><?=$spon?></button>
                                                             <a style="float:right;" href="product_approval.php?pid=<?= $t['product_id']; ?>&requestAct=<?= rand(1000, 100000); ?>"><button type="button" class="btn btn-info btn-xs">View</button></a></td>
                                                             <td>

<a href="product_setting.php?poid=<?=$t['product_id'];?>" data-featherlight="ajax" class="btn btn-info btn-sm">Configure</a>
														<?php
														$night=$dbBlock->selectSingleStmt("select * from point where status = '1' And id = '".$t['color_code']."'");
	if($t['color_code'] == 7){
$color = "purple";
}else{
$color = $night['point_color'];
}													
														?>
                                                         	<i class="fa fa-heart" style="color:<?=$color;?>;" aria-hidden="true"></i>
															<a href="sele.php?id=<?=$t['product_id']?>" target="_blank" class="btn btn-info btn-sm" target="_blank" >Pincode</a>
<a href="pincodeslist.php?poid=<?=$t['product_id'];?>" data-featherlight="ajax"  class="btn btn-info btn-sm">Pincode List</a>

                                                             </td>
<!--<td>
<a href="javascript:void(0)" onClick="hiddentruth('xx<?=$t['product_id'];?>');">Enter Point</a>
<input type="text" name="menual"  onChange="keepclose(this.value,<?=$t['product_id'];?>)" value="<?=$t['menual'];?>" id="xx<?=$t['product_id'];?>" style="width:50px; display:none;" />
</td>-->

                                                        </tr>
                                                        
                                                        <?php
                                                        $r++;
                                                    }
                                                    ?> 

                    </tbody>
                  </table>
<script>
function hiddentruth(e){
//alert(e);
document.getElementById(e).style.display='block';
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
