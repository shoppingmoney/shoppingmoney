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
//for ajax requestAct
if(isset($_GET['status'])){
	@extract($_GET);
	$dbAccess->updateData("UPDATE transaction SET status='$status' WHERE id=$id");
	die();
}
@extract($_GET);
$getData = $dbAccess->selectData("select * from  transaction where vendor_id='".$vendor."'");
$getVname=$dbAccess->selectSingleStmt("select name from register_vendor where unique_user_id='".$vendor."'");
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
                    Transaction
                    <small>
                        List of all Transaction of MR.<?=$getVname['name'];?>
                    </small>
                </h3>
            </div>
		

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
				<?php $paid=0;
				$unpaid=0;
				$getData2 = $dbAccess->selectData("select * from  transaction where vendor_id='".$vendor."' and status='Paid'");
			foreach ($getData2 as $t2) { $paid=$paid+$t2['amount']; }
		$getData3 = $dbAccess->selectData("select * from  transaction where vendor_id='".$vendor."' and status='Unpaid'");
			foreach ($getData3 as $t3) { $unpaid=$unpaid+$t3['amount']; }
			?>
			<div id="total">
			<h4>Total Paid:Rs.<?=$paid;?></h4>
			</div>
			<div>
			<h4>Total UnPaid:Rs.<?=$unpaid;?></h4>
			</div>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>S No.</th>
                        <th>Vendor Id</th>
                        <th>Order Id</th>
                        <th>Bill Type</th>
                        <th>Date</th>
						<th>Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php
                                                    $r = 1;
                                                    foreach ($getData as $t) {
														if($t['status']=='Paid'){
															$status="Paid";
															$cls = "success";
														}else{
															$status="Unpaid";
															$cls="danger";
														}
														if($t['bill_type']=='Shopping Money')
														{
															$bstatus="Generate Bill";
															$col = "info";
															$class = "data-featherlight='ajax'";
															$url = "invoice.php?oid={$t['orderid']}&vid={$t['vendor_id']}&status=$status";
														}
														else{
															$bstatus="View Invoice";
															$col = "success";
															$class = "";
															$url="getinvoice.php?oid={$t['orderid']}&vid={$t['vendor_id']}&status=$status";
														}
                                                        ?>
                                                        <tr>
														<td><?= $r; ?></td>
                                                            <td><?= $t['vendor_id']; ?></td>
                                                            <td><?= $t['orderid']; ?></td>
                                                            <td><?= $t['bill_type']; ?></td> 
															<td><?=$t['date']?></td>
															<td><?=$t['amount']?></td>
															<td><button type="button" onClick="changeStatus(this,'<?=$t['id']?>');" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button>
															 
															</td>
                                                        </tr>
                                                        <?php
                                                        $r++;
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
