<?php
error_reporting(0);
session_start();
ob_start();
if (isset($_SESSION['userEmail']) == null || isset($_SESSION['userEmail']) == '') {
    header("location:../index.php");
}
include 'lib/Connection.php';
include 'lib/DBQuery.php';
include 'lib/Fileupload.php';
include 'lib/Helpers.php';
include 'lib/excel_reader2.php';
$connection = new Connection();
$helper     = new Helpers();
$FileUpload = new Fileupload();
$dbAccess   = new DBQuery();
extract($_POST);
if (isset($_POST['submit'])) {
    
    $read     = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
    $vendorId = $read['unique_user_id'];
    //$vendorId = 0;
	$cate='';
    if ($category == null || $category == '') {
        $msg = "Please select your product category";
    } else {
        $spetabcnt = 0;
		$specification_tbl='';
        $imagestore = array();
        //print_r($_POST);
        foreach ($_POST['category'] as $cat) {
            $cate .= $cat . ",";
			if($dbAccess->tableExists("specification_".$cat)==1){ 
				$spetabcnt++;
				$specification_tbl = "specification_".$cat;
				}
        }
        //csv file process here
		$file   = $_FILES['csv']['tmp_name'];
		$name = basename($_FILES['csv']['name']);
		$fileType = pathinfo($name,PATHINFO_EXTENSION);
		if($fileType == 'xls'){
				$upload = 1;
		}else{
			$upload = 0;
		}
		if($upload==1 && $spetabcnt<=1){
		$s_fieldarr = array();
		$s_fieldarr[0]='id';
		$s_fieldarr[1]='product_id';
		$s_valarr = array();
        //$prosize = array();
		
		$data = new Spreadsheet_Excel_Reader($file);
		//echo "Total Sheets in this xls file: ".count($data->sheets)."<br /><br />";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i]['cells'])>0) // checking sheet not empty
	{
		//echo "Sheet $i:<br /><br />Total rows in sheet $i  ".count($data->sheets[$i]['cells'])."<br />";
		for($j=1;$j<=count($data->sheets[$i]['cells']);$j++) // loop used to get each row of the sheet
		{ 
		    $num     = $data->sheets[$i]['cells'][$j][1];
            $productname = $data->sheets[$i]['cells'][$j][2];
            $brand       = $data->sheets[$i]['cells'][$j][3];
            $producttype = $data->sheets[$i]['cells'][$j][4];
            $mrp         = $data->sheets[$i]['cells'][$j][5];
			  $landing_price    = $data->sheets[$i]['cells'][$j][6];
            $vat         = $data->sheets[$i]['cells'][$j][7];
            $editor      = $data->sheets[$i]['cells'][$j][8];
            $prosize     = $data->sheets[$i]['cells'][$j][9];
            $color       = $data->sheets[$i]['cells'][$j][10];
            $qty         = $data->sheets[$i]['cells'][$j][11]." ".$data->sheets[$i]['cells'][$j][12];
			$mfgtype = $data->sheets[$i]['cells'][$j][13];
            $keyword     = $data->sheets[$i]['cells'][$j][14];
            //img hangler

            $imagestore[] = $data->sheets[$i]['cells'][$j][15];
            $imagestore[] = $data->sheets[$i]['cells'][$j][16];
            $imagestore[] = $data->sheets[$i]['cells'][$j][17];
            $imagestore[] = $data->sheets[$i]['cells'][$j][18];
            //shipping charges
            $weight        = $data->sheets[$i]['cells'][$j][19]." ".$data->sheets[$i]['cells'][$j][20];
            $shippingcharg = $data->sheets[$i]['cells'][$j][21];
			
			$discounttype = $data->sheets[$i]['cells'][$j][22];
            $disamount    = $data->sheets[$i]['cells'][$j][23];
			
			
			
				// Specification creating field.
		   if( ($data->sheets[$i]['cells'][$j][24] != "" || !empty($data->sheets[$i]['cells'][$j][24])) && $j == 4)
			{
            for($l=0;$l<180;$l++){ // setting maximum field
			//echo count($data->sheets[$i]['cells'][$j]);
			if($l+24 <= count($data->sheets[$i]['cells'][$j])){
				if($data->sheets[$i]['cells'][$j][$l+24] != null || !empty($data->sheets[$i]['cells'][$j][$l+24])){
					$s_fieldarr[$l+2] = $data->sheets[$i]['cells'][$j][$l+24];
					}
			}
			}
			$s_fieldarr[] = "date";
			}
			
			            //heading here dont insert
            if ($j <= 4 || ($num == null || $num == '')) {
unset($imagestore);
//echo "yasdufgyuaswfguyasfgyuagf";
                //skip first
            } else {
                //db Worker
                //this is file upload section
                $seo       = str_replace(" ", "_", $productname) . "_" . time();
                $tableNmae = "product_tbl";
                $fieldName = "category_id,vendor_id,product_num,title,ptoduct_type,mrp,vat,landing_price,description,product_seo,mfg_type,commited_qty,created_date,status,keywords,readonly,brand,color,size";
                $valueName = "'$cate','$vendorId','$num','" . $helper->escapeStr($productname) . "','$producttype','$mrp','$vat','$landing_price','" . $helper->escapeStr($editor) . "','$seo','$mfgtype','$qty',now(),'1','$keyword','2','$brand','$color','$prosize'";
                $dbAccess->insertData($tableNmae, $fieldName, $valueName);
                $lastId = $dbAccess->LastId();
                
                //size and color
               
               $dbAccess->insertData("product_size_color", "product_id,size_id,qty,status", "'$lastId','$prosize','$qty','1'");
                
                
                //this is file upload section
                $tableNmae = "product_img";
                $fieldName = "product_id,image,status";
                foreach ($imagestore as $yk) { 
                    $imgurl = str_replace("dl=0","raw=1",$yk);
                    $valueName = "'$lastId','$imgurl','1'";
                    $dbAccess->insertData($tableNmae, $fieldName, $valueName);

                }
                unset($imagestore);
                //shipping and section
                $tableNmae = "shipping";
                $fieldName = "product_id,product_num,weight,shipping_charge";
                $valueName = "'$lastId','$num','$weight','$shippingcharg'";
                $dbAccess->insertData($tableNmae, $fieldName, $valueName);
                
                //discount section
                $tableNmae = "discount";
                $fieldName = "product_id,discount_type,discount,status";
                $valueName = "'$lastId','$discounttype','$disamount','1'";
                $dbAccess->insertData($tableNmae, $fieldName, $valueName);
              
			  // Query for specification
			if(($data->sheets[$i]['cells'][$j][24] != null || !empty($data->sheets[$i]['cells'][$j][24]))){
			    $slen = count($s_fieldarr);
				$s_valarr[0]=$lastId;
				for($m=0;$m<$slen-3;$m++){
					$s_valarr[$m+1] = '"'.$data->sheets[$i]['cells'][$j][$m+24].'"';
				}
				$s_valarr[$slen-1]='now()';
				
				echo "<br/>field count is:". count($s_fieldarr);
				$s_field = implode(",",$s_fieldarr);
				$s_val = implode(",",$s_valarr);
			    $query = "INSERT INTO $specification_tbl VALUES('',$s_val)";
				$dbAccess->updateData($query);
				//$dbAccess->insertData($specification_tbl, $s_field, $s_val);
				
			}
                
            }
		}
	}
	
}
         $_SESSION['message']="Product Uploaded Successfully";
	}else{
		$_SESSION['message']="Invalid file or Invalid category selection";
	}
		 header("location:csvuploader.php");
		die();
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

        <title>Shopping Money! | Vendor </title>

        <!-- Bootstrap core CSS -->

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">


        <!-- Custom styling plus plugins -->
        <link href="css/custom.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">
        <!-- select2 -->
        <link href="css/select/select2.min.css" rel="stylesheet">
        <style>
            .stepContainer{
                overflow-x:inherit !important;
            }
        </style>
<script src="../mlm/js/ajax.js"></script>
        <script src="js/jquery.min.js"></script>

    </head>


    <body class="nav-sm">

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
                                <h3>Product Upload</h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                   <div>
				<?php if(isset($_SESSION['message'])){ ?>
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <?=$_SESSION['message']?>
                </div>
				<?php 
				unset($_SESSION['message']);
				} ?>
                </div>
                                    <div class="x_content">


                                        <!-- Smart Wizard -->
                                        <div id="wizard">
                                            <ul class="wizard_steps" style="list-style:none;">
                                                <li>
                                                    <a href="#step-1">

                                                        <span class="step_descr">
                                                            CSV<hr/>

                                                        </span>
                                                    </a>
                                                </li>
                                               

                                            </ul>

                                            <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" onSubmit="return validate();" >
                                                <div id="step-1">


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select category <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="select2_multiple form-control" id="category"  name="category[]" multiple="multiple" onChange="showCustomer(this.value);">
                                                                <option value="0">Root</option>
                                                                <?php
                                                                $fetchData = $dbAccess->selectData("select * from product_category where status = '1'");
                                                                foreach ($fetchData as $t) {
                                                                    echo "<option value='" . $t['id'] . "'>" . $dbAccess->categoryOption($t['parent_id'], $t['category_name']) . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <label class="control-label col-md-2 col-sm-2 col-xs-12" id="category_v" style="display:none; color:#FF0000;">This field is required</label>
                                                    </div>
													 <div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12"><a onClick="changeFile();" style="font-size:11px;color:blue;" href="javascript:void(0);">Click here to get CSV file of selected category:</a></label>
                                                       <div id="exres" class="col-md-6 col-sm-6 col-xs-12">
                                                           Category not selected
                                                        </div>                                                      
													  </div>
							
							<div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select CSV FILE <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                           <input type="file" name="csv" />
                                                        </div>
                                                        
                                                    </div>
							

                                                </div>
                                               
                                                <button type="submit" id="send" name="submit" class="btn btn-default" style="float:right;" >Finish!</button>

                                            </form>
                                        </div>
                                        <!-- End SmartWizard Content -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /page content -->
       <!--  to change file  -->
<script>
function changeFile(){
//alert(id.split(","));
var ids = $("#category").val();
//alert(ids);	
var request = checkAjax();
    var url = "changefile.php?id="+ids;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			var resp = request.responseText;
			$("#exres").html(resp);	
		}else{
			$("#exres").html("<img src='../img/loader.gif' />");	
		}
	}
}
</script>

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
        <!-- form wizard -->
        <script type="text/javascript" src="js/wizard/jquery.smartWizard.js"></script>
        <!-- pace -->
        <script src="js/pace/pace.min.js"></script>
        <script type="text/javascript">
                                                $(document).ready(function () {
                                                    // Smart Wizard
                                                    $('#wizard').smartWizard();
                                                });

                                                $(document).ready(function () {
                                                    // Smart Wizard
                                                    $('#wizard_verticle').smartWizard({
                                                        transitionEffect: 'slide'
                                                    });

                                                });
        </script>
        <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 20,
                    placeholder: "With Max Selection limit 20",
                    allowClear: true
                });
            });
        </script>
        <!-- select2 -->
        <script src="js/select/select2.full.js"></script>
        <!-- Autocomplete -->
        <script type="text/javascript" src="js/autocomplete/countries.js"></script>
        <script src="js/autocomplete/jquery.autocomplete.js"></script>
        <script type="text/javascript">
            $(function () {
                'use strict';
                var countriesArray = $.map(countries, function (value, key) {
                    return {
                        value: value,
                        data: key
                    };
                });
                // Initialize autocomplete with custom appendTo:
                $('#autocomplete-custom-append').autocomplete({
                    lookup: countriesArray,
                    appendTo: '#autocomplete-container'
                });
            });
        </script>






        <!-- tags -->
        <script src="js/tags/jquery.tagsinput.min.js"></script>
        <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a tag: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a tag: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a tag: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->



<script>
function showCustomer(str) {
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    document.getElementById("txtHint").innerHTML = xhttp.responseText;
    }
  };
  xhttp.open("GET", "server.php?H="+str, true);
  xhttp.send();
} 
</script>

        <!-- /form validation -->
        <script>

            function validate() {
                var status = null;
                var cat = $("#category").val();
                var proname = $("#productname").val();
                var autocom = $("#autocomplete-custom-append").val();
                var mrp = $("#mrp").val();
                var qty = $("#qty").val();
                var ship = $("#shippingcharg").val();
                var hand = $("#handover").val();
                var weig = $("#weight").val();
                var weig = $("#weight").val();
                var tax = $("#tax").val();
                var sp = $("#sellmrp").val();
				var brand = $("#brand").val();
                if (cat == null || cat == '') {
                    $("#category_v").fadeIn(1000);
                    status = 0;
                }
               

                if (status == 0) {
                    return false;
                } else {
                    return true;
                }

            }


            $(document).ready(function () {

                $("#category").change(function () {
                    $("#category_v").fadeOut(1000);
                });
               

            });

        </script>



    </body>

</html>
