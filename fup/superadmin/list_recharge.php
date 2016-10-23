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
	$dbAccess->updateData("UPDATE redeem SET status='$status' WHERE id=$id");
	if($status == 1){
		$dbAccess->insertData("account","uid,cr,mode,date,status","'$uid','$amount','Top Up',now(),1");
	}else{
		$dbAccess->insertData("account","uid,dr,mode,date,status","'$uid','$amount','Top Up',now(),1");
	}
	die();
}
//for ajax requestAct
if(isset($_GET['delid'])){
	@extract($_GET);
	$dbAccess->updateData("delete from redeem WHERE id=$delid");
	header("location:list_recharge.php");
	die();
}
$getData = $dbAccess->selectData("select * from  redeem WHERE action=1");
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

</head>
<body class="nav-sm">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
<?php
$menu="userRedeem";
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
                    Redeem
                    <small>
                        List of redeem request
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
                        <th>User</th>
						<th>Amount</th>
						<th>Bank</th>
						<th>Branch</th>
						<th>Trans_id</th>
						<th>Date</th>
                        <th>Status</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php
                                                    $r = 1;
                                                    foreach ($getData as $t) {
														if($t['status']==1){
															$status="Approved";
															$cls = "success";
														}else{
															$status="pending";
															$cls="danger";
														}
														$date = $helper->dateFormate($t['date']);
														$nm = $dbAccess->selectSingleStmt("SELECT * FROM firstimeregd WHERE id='{$t['uid']}'");
														$name = $nm['ufirstname']." ".$nm['ulastname'];
													//$user = $dbAccess->selectSingleStmt("SELECT ");
                                                        ?>
                                                        <tr>
														<td><?= $r; ?></td>
                                                            <td><?php echo $name;?></td>
															 <td><?php echo "Rs". number_format($t['amount']);?></td>
															 <td><?= $t['bank'];?></td>
															 <td><?= $t['branch'];?></td>
															 <td><?= $t['trans_id'];?></td>
															  <td><?php echo $date;?></td>
															<td><button type="button" onclick="changeStatus(this,'<?=$t['id']?>','<?=$t['uid']?>','<?php echo $t['amount'];?>');" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button></td>
                                                        <td>
<button type="button" onclick="deleteme('<?=$t['id']?>');" class="btn btn-danger btn-xs">Delete</button>
                                                             <!--<a style="float:right;" href="update_category.php?cid=<?= $t['id']; ?>&requestAct=<?=rand(1000, 100000); ?>"><button type="button" class="btn btn-warning btn-xs">Edit</button></a>-->
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
				  function changeStatus(btn,id,uid,amt){
					  //alert(id);
					  var flag = confirm("Are you sure to make this change.");
					  if(flag){
					  var status = $(btn).html();
					  if(status=='Approved'){
						  $(btn).removeClass("btn-success");
						  $(btn).addClass("btn-danger");
						  $(btn).html("Pending");
						  var st=0;
					  }else{
						  $(btn).removeClass("btn-danger");
						  $(btn).addClass("btn-success");
						  $(btn).html("Approved");
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
        xmlhttp.open("GET", "list_recharge.php?id="+id+"&uid=" + uid + "&status="+st+"&amount="+amt, true);
        xmlhttp.send();
					  }
				  }
				  
function deleteme(id){
	var flag = confirm("Do you want to delete");
	if(flag){
		window.location='list_recharge.php?delid='+id;
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
