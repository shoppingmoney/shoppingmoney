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
	$dbAccess->updateData("UPDATE firstimeregd SET status='$status' WHERE id=$id");
	die();
}
//for ajax requestAct
if(isset($_GET['delid'])){
	@extract($_GET);
	$dbAccess->updateData("delete from firstimeregd WHERE id=$delid");
	header("location:user.php");
	die();
}
// Query for different condition
$head = "all user";
$tp="";
$query="SELECT f.id,f.uemail,f.ufirstname,f.ulastname,f.ucontact,f.status,f.ustatus,f.udate,u.city,u.userid from firstimeregd f LEFT JOIN userdetails u ON f.id=u.linkid";
if(isset($_GET['tp'])){
	$tp = $_GET['tp'];
	if($tp == 'new'){
		$query = "SELECT f.id,f.uemail,f.ufirstname,f.ulastname,f.ucontact,f.status,f.ustatus,f.udate,u.city,u.userid from firstimeregd f LEFT JOIN userdetails u ON f.id=u.linkid WHERE f.ustatus = 0";
		$head = "just registered user";
	}
	if($tp == 'kyc'){
		$query = "SELECT f.id,f.uemail,f.ufirstname,f.ulastname,f.ucontact,f.status,f.ustatus,f.udate,u.city,u.userid,t.linkid from firstimeregd f INNER JOIN userdetails u ON f.id = u.linkid LEFT JOIN tree t ON f.id = t.linkid WHERE f.ustatus = 1";
		$head = "KYC completed user";
	}
	if($tp == 'shop'){
		$query = "SELECT f.id,f.uemail,f.ufirstname,f.ulastname,f.ucontact,f.status,f.ustatus,f.udate,u.city,u.userid,t.linkid from firstimeregd f INNER JOIN tree t ON f.id=t.linkid LEFT JOIN userdetails u ON f.id=u.linkid WHERE f.ustatus=1";
		$head = "shopping completed user";
	}
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

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
<?php
$menu="employee";
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
                    Register member
                    <small>
                       List of <?=$head;?>
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
                        <th>Name</th>
						<th>Member Id</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>reference</th>
						<th>City</th>
                        <th>Status</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					 <?php
					 $getData = $dbAccess->selectData($query);
                                                    $r = 1;
                                                    foreach ($getData as $t) {
if($tp == 'kyc'){
if($t['linkid'] != '') continue;
}
														// $details = $dbAccess->selectSingleStmt("SELECT * from userdetails where linkid='".$t['id']."'");
														if($t['status']==1){
															$status="Active";
															$cls = "success";
														}else{
															$status="Inactive";
															$cls="danger";
														}
														// Counting total joining
														//echo $sql = "SELECT count(*) as cnt FROM tree WHERE refrenceid='{$t['id']}'";
														$jn = $dbAccess->selectSingleStmt("SELECT count(*) as cnt FROM tree WHERE refrenceid='".$t['id']."'");
														//$up = $dbAccess->selectData("SELECT count(*) as cnt FROM tree WHERE uplinerid='{$t['tid']}'");
                                                        ?>
                                                        <tr>
														<td><?= $r; ?></td>
                                                            <td><?php echo $t['ufirstname']." ".$t['ulastname'];?></td>
															<td><?php echo $t['userid'];?></td>
															<td><?php echo $t['uemail'];?></td>
															<td><?php echo $t['ucontact'];?></td>
															<td><?php echo $jn['cnt'];?></td>
															<td><?php echo $t['city'];?></td>
															<td><button type="button" onclick="changeStatus(this,<?= $t['id']; ?>);" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button></td>
                                                        <td>
<!-- <button type="button" onclick="deleteme('<?=$t['id']?>');" class="btn btn-danger btn-xs">Delete</button> -->
                                                             <a style="float:right;" target="_blank" href="user_detail.php?uid=<?= $t['id']; ?>&requestAct=<?= rand(1000, 100000); ?>"><button type="button" class="btn btn-warning btn-xs">Details</button></a>
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
        xmlhttp.open("GET", "user.php?id=" + id + "&status="+st, true);
        xmlhttp.send();
					  }
				  }
				  
function deleteme(id){
	var flag = confirm("Do you want to delete");
	if(flag){
		window.location='user.php?delid='+id;
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
