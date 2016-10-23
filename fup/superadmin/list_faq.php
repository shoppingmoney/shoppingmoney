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
	$dbAccess->updateData("UPDATE faq SET status='$status' WHERE id=$id");
	die();
}
// for ajax request top list
if(isset($_GET['Tid'])){
	@extract($_GET);
	$dbAccess->updateData("UPDATE faq SET top_query='$Tstatus' WHERE id=$Tid");
	die();
}
//for checkbox request

//for ajax requestAct
if(isset($_GET['delid'])){
	@extract($_GET);
	$dbAccess->updateData("delete from faq WHERE id=$delid");
	header("location:faq.php");
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
                    FAQ's
                    <small>
                        List 
                    </small>
                </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
				
				<form id="warn_form" action="warn.php" method="post">
			
                  <table id="datatable" class="table table-striped table-bordered  checkboxs ">
                    <thead>
                      <tr>
					
					<!--	<th class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                             <!--   <i class="fa fa-fw fa-square-o"></i> -->
                                             <!--   <input type="checkbox" onClick="mycheck()"> -->
											<!--	 <input type="checkbox" id="selectall" onClick="mycheck(this)">
                                            </label>
                                        </div>
                                    </th> -->
                        <th>S No. </th>
                        <th>Category</th>
						<th>Query</th>
						<th>Result</th>
						<th>Date</th>
					<!--	<th>Reference</th> -->
					<!--	<th>City</th> -->
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					
					
					<?php
					// $getwarn= $dbAccess->selectData("");
					$getData = $dbAccess->selectData("SELECT * FROM faq ");
                                                    $r = 1;
													//	$a1=1;
                                                    foreach ($getData as $t) {
													if($t['status']==1){
															$status="Active";
															$cls = "success";
														}else{
															$status="Inactive";
															$cls="danger";
														}
														if($t['top_query']==1){
															$top="Active Top";
															$cls1 = "success";
														}else{
															$top="Inactive Top";
															$cls1="danger";
														}
														// Counting total joining
														
														?>
                                                        <tr id="tr<?=$t['id']?>">
												
									<!--  <td class="text-center">
                                        <div class="checkbox checkbox-single margin-none">
                                            <label class="checkbox-custom">
                                             <!--   <i class="fa fa-fw fa-square-o"></i> -->
                                            <!--    <input id="chk<?=$a1?>" name="a[]" type="checkbox" value="<?=$t['id'];?>">
                                            </label>
                                        </div>
                                    </td> -->
														<td><?= $r; ?></td>
                                                            <td><?php echo $t['category'];?></td>
															<td><?php echo $t['query'];?></td>
															<td><?php echo $t['result'];?></td>
															<td><?php echo $t['date'];?></td>
															
															<td><button title="Status" type="button" onclick="changeStatus(this,'<?=$t['id']?>');" class="btn btn-<?=$cls?> btn-xs"><?=$status?></button>
<button title="Delete" type="button" onclick="deleteme('<?=$t['id']?>');" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                            <button title="Top List" type="button" onclick="changeTop(this,'<?=$t['id']?>');" class="btn btn-<?=$cls1?> btn-xs"><?=$top?></button>
															</td>
														</tr>
                                                        <?php
                                                        $r++;
                                                   }
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
        xmlhttp.open("GET", "list_faq.php?id=" + id + "&status="+st, true);
        xmlhttp.send();
					  }
				  }
				 
				 // function for change top
function changeTop(btn,id){
					  //alert(id);
					  var flag = confirm("Do you want to change Top List.")
					  if(flag){
					  var status = $(btn).html();
					  if(status=='Active'){
						  $(btn).removeClass("btn-success");
						  $(btn).addClass("btn-danger");
						  $(btn).html("Inactive Top");
						  var st=0;
					  }else{
						  $(btn).removeClass("btn-danger");
						  $(btn).addClass("btn-success");
						  $(btn).html("Active Top");
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
        xmlhttp.open("GET", "list_faq.php?Tid=" + id + "&Tstatus="+st, true);
        xmlhttp.send();
					  }
				  }
				 
function deleteme(id){
	var flag = confirm("Do you want to Delete this Query");
	if(flag){
		window.location='list_faq.php?delid='+id;
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