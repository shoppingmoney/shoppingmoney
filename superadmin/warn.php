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
	$dbAccess->updateData("UPDATE shopwarn SET status='3' WHERE id='$id'");
	die();
}
//for checkbox request
if(isset($_POST['action'])){
	@extract($_POST);
	print_r($_POST);
	echo $id = implode(',',$table_records);
	//$dbAccess->updateData("UPDATE shopwarn SET status='3' WHERE id IN($id)");
	//header("location:warn.php");
	//die();
}
//for ajax requestAct
if(isset($_GET['delid'])){
	@extract($_GET);
	$dbAccess->updateData("UPDATE shopwarn SET status='2' WHERE id='$delid'");
	//header("location:warn.php");
	//die();
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
 <script src="js/icheck/icheck.min.js"></script>
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
                    Warned member
                    <small>
                        List of all Warned members
                    </small>
                </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
				<script>
                        function warnForm(val){
                            $("#warn_action").val(val);
							if(val == 2){
								var flag = confirm("Do you want remove this user");
							}
							if(val == 3){
								var flag = confirm("Do you want keep this user");
							}
							if(flag){
								$("#warn_form").submit();
							}
                        }
                      
                        </script>
				<form id="warn_form" action="warn.php" method="post">
				<div Style="">
                         <!--   <button onclick="partyForm(1);" class="btn btn-success btn-stroke">Activate</button> -->
							<button type="button" onclick="warnForm('2');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
			<!--	<button onclick="partyForm(0);" class="btn btn-danger btn-stroke">Deactivate</button> -->
				<td><button type="button" onclick="warnForm('3');" class="btn btn-success btn-xs"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                           
                                <input type="hidden" id="warn_action" name="action" value="">
                                
			</div>
                  <table id="datatable" class="table table-striped table-bordered  checkboxs ">
                    <thead>
                      <tr>
					
						<th class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                             <!--   <i class="fa fa-fw fa-square-o"></i> -->
                                             <!--   <input type="checkbox" onClick="mycheck()"> -->
												 <input type="checkbox" id="selectall" onClick="mycheck(this)">
                                            </label>
                                        </div>
                                    </th>
                        <th>S No. </th>
                        <th>Name</th>
						<th>Member Id</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Reference</th>
						<th>City</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					
					
					<?php
					// $getwarn= $dbAccess->selectData("");
					$getData = $dbAccess->selectData("SELECT shopwarn.id, firstimeregd.ufirstname, firstimeregd.ulastname, firstimeregd.uemail, firstimeregd.ucontact, firstimeregd.ustatus, userdetails.userid, userdetails.city
FROM firstimeregd, shopwarn, userdetails
WHERE (firstimeregd.id = shopwarn.uid) AND (userdetails.linkid = shopwarn.uid)
AND shopwarn.status =1");
                                                    $r = 1;
														$a1=1;
                                                    foreach ($getData as $t) {
													
														// Counting total joining
														$jn = $dbAccess->selectSingleStmt("SELECT count(*) as cnt FROM tree WHERE refrenceid='{$t['id']}'");
														?>
                                                        <tr id="tr<?=$t['id']?>">
												
									  <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                             <!--   <i class="fa fa-fw fa-square-o"></i> -->
                                                <input id="chk<?=$a1?>" name="a[]" type="checkbox" value="<?=$t['id'];?>">
                                            </label>
                                        </div>
                                    </td>
														<td><?= $r; ?></td>
                                                            <td><?php echo $t['ufirstname']." ".$t['ulastname'];?></td>
															<td><?php echo $t['userid'];?></td>
															<td><?php echo $t['uemail'];?></td>
															<td><?php echo $t['ucontact'];?></td>
															<td><?php echo $jn['cnt'];?></td>
															<td><?php echo $t['city'];?></td>
															<td><button type="button" onclick="changeStatus('<?=$t['id']?>');" class="btn btn-success btn-xs"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
<button type="button" onclick="deleteme('<?=$t['id']?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                             <a style="float:right;" href="user_detail.php?uid=<?= $t['id']; ?>&requestAct=<?= rand(1000, 100000); ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-info-circle" aria-hidden="true"></i></button></a>
															</td>
														</tr>
                                                        <?php
                                                        $r++;
                                                  $a1++;  }
                                                    ?> 
                    </tbody>
                  </table>
				 </form>
				</div>
              </div>
            </div>

                </div>
              </div>
            </div>
            <!-- /page content -->
			<script>
		/*	function mycheck() {
var i; 
for(i=1;i<11;i++){
 
    document.getElementById("chk"+i).click();
}} */

function mycheck(source){
  checkboxes = document.getElementsByName('a[]');
  for(var i in checkboxes)
   checkboxes[i].checked = source.checked;
}
</script>
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
<script src="js/emp/fuelux-checkbox.init.js"></script>

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
				 function changeStatus(id){
					 //alert(id);
					 var flag = confirm("Do you want to keep user.");
					 if(flag){
					 //Call Ajax
					 if (window.XMLHttpRequest) {
                      xmlhttp = new XMLHttpRequest();
                      } else {
                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                      }
                      xmlhttp.onreadystatechange = function () {
                     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						$("#tr"+id).hide();
                     //$("#suggestion-box").load(document.URL + " #suggestion-box");
					 
                     } else {

                         }
                     }
        xmlhttp.open("GET", "warn.php?id=" + id, true);
        xmlhttp.send();
					 }
				 }
				 
function deleteme(id){
	var flag = confirm("Do you want to remove user permanetly from portal");
	if(flag){
		window.location='warn.php?delid='+id;
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