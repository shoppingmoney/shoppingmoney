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

if(isset($_POST['submitNcr'])) {
	 @extract($_POST);
	 if($action==2){
		 $str1=",";
		 $getpin=$dbAccess->selectData("SELECT * FROM state_district WHERE district IN ('Faridabad','Gurgaon','Ghaziabad','Delhi','Gautam Buddha Nagar')");
		// echo "SELECT * FROM state_district WHERE district IN ('Faridabad','Gurgaon','Ghaziabad','Delhi','Gautam Buddha Nagar')";
		 foreach($getpin as $gt)
		 {
			 $str1.=$gt['pin'].",";
			 
		 }
		 $insertNcr=$dbAccess->updateData("Update product_tbl SET pincode='".$str1."' where product_id='".$id."'");
if($insertNcr)
{
  echo "<script> alert('Successfully Updated Pincode'); </script>" ;
}
		
	 }
	//print_r($_POST);
}
if(isset($_POST['submitAllindia'])) {
	 @extract($_POST);
	 if($action==1){
		 $str=",";
		 $getpin=$dbAccess->selectData("SELECT pin FROM state_district ");
		// foreach($getpin as $gt)
		// {
			// $str.=$gt['pin'].",";
                        // echo $gt['pin'];
		// }
		 echo "<script>alert('$str');</script>";
	 }
	//print_r($_POST);
}

if(isset($_POST['submit']))
{
	$pin1=$_POST['pin'];
        $pin2=implode(",",$pin1);
        $pin=','.$pin2.',';
	$id=$_POST['id'];
     // print_r($_POST);
	//$id=1;
	$insert=$dbAccess->updateData("Update product_tbl SET pincode='".$pin."' where product_id='".$id."'");
if($insert)
{
  echo "<script> alert('Successfully Updated Pincode'); </script>" ;
}
	
}
$getDataState=$dbAccess->selectData("Select * from state_district group by state");
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
  <link rel="stylesheet" href="custom/sol.css">
<!--    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->
    <script type="text/javascript" src="custom/sol.js"></script>
    <script type="text/javascript" src="../mlm/js/ajax.js"></script>
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
                    Configure
                    <small>
                        Pincode for Product
                    </small>
                </h3>
            </div>

          </div>
          <div class="clearfix"></div>

          <div class="row">
           
			<form method="post" id="allindia" > 
			  <input type="hidden" name="action" value="1">
			  <input type="hidden" name="id" value="<?=$_GET['id'];?>">
			  <input type="submit" name="submitAllindia" class="btn btn-primary" value="All India" />
			</form>
			<form method="post" id="ncr" > 
			  <input type="hidden" name="action" value="2">
			  <input type="hidden" name="id" value="<?=$_GET['id'];?>">
			  <input type="submit" name="submitNcr" class="btn btn-primary" value="NCR" />
			</form>
			
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
<input type="hidden" name="id" value="<?=$_GET['id'];?>" id="pro_id">
                  <select id="my-select" name="character" multiple="multiple">
   <?php foreach($getDataState as $getState){ ?>   
   <option value="<?=$getState['state'];?>"><?=$getState['state'];?></option>
   <?php } ?>
 
</select>

<script type="text/javascript">
    $(function() {
        // initialize sol
        $('#my-select').searchableOptionList();
    });
</script>
<button onclick='fetchDist();'> Filter State</button>
<!--  State search end -->


<div id='mydst'></div>
<div id='mypin'></div>


<script>

 function fetchDist(){
	//alert('hi');
          var state_list = $("#my-select").val();
           
//alert('statelist:'+state_list);
	 var xhttp = checkAjax();
	 xhttp.open("GET", "fetchdata.php?state="+state_list, true);
  xhttp.send();
	 xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) { //alert(xhttp.responseText);
      $("#mydst").html(xhttp.responseText);
    }
  };
	 
 }

  function fetchPin(){
	
          var dist_list = $("#myselectDist").val();
           var id=$("#pro_id").val();
//alert('statelist:'+dist_list);
	 var xhttp = checkAjax();
	 xhttp.open("GET", "fetchdata.php?dist="+dist_list+"&id="+id, true);
  xhttp.send();
	 xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) { //alert(xhttp.responseText);
      $("#mypin").html(xhttp.responseText);
    }
  };
	 
 }
 
 function submitpin()
 {
	  $('#allindia').submit();
 }

</script>
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
