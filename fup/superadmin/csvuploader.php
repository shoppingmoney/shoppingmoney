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
include 'class/excel_reader2.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$FileUpload = new Fileupload();
@extract($_POST);
if (isset($_POST['submit'])) {
    
    //$read     = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
    //$vendorId = $read['unique_user_id'];
    $vendorId = 0;
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

  <title>Shoppingmoney </title>

  <!-- Bootstrap core CSS -->

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/icheck/flat/green.css" rel="stylesheet">
  <!-- editor -->
  <link href="css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="css/editor/index.css" rel="stylesheet">
  <!-- select2 -->
  <link href="css/select/select2.min.css" rel="stylesheet">
  <!-- switchery -->
  <link rel="stylesheet" href="css/switchery/switchery.min.css" />
<script src="../mlm/js/ajax.js"></script>
  <script src="js/jquery.min.js"></script>
</head>


<body class="nav-sm">

  <div class="container body">
    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <?php
		  $menu="category";
		  include "inc/left.php";
		  ?>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
     <?php
	 include "inc/top.php";
	 //error_reporting(E_ALL);
	 ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Upload Product</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
         

          <div class="row">
            <div class="col-md-12 col-xs-12">
             <!--- for validation -->
			  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
</form>
			 <!-- form end -->
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

                  <!-- start form for validation -->
                 <form method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" onSubmit="return validate();" >
                                                <div id="step-1">


                                                    <div class="form-group">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select category(multiple subcategory only) <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="select2_multiple form-control" id="category"  name="category[]" multiple="multiple">
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
                  <!-- end form for validations -->

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
  <!-- tags -->
  <script src="js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="js/moment/moment.min.js"></script>
  <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="js/editor/bootstrap-wysiwyg.js"></script>
  <script src="js/editor/external/jquery.hotkeys.js"></script>
  <script src="js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="js/autocomplete/countries.js"></script>
  <script src="js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="js/pace/pace.min.js"></script>
  <script type="text/javascript">
    $(function() {
      'use strict';
      var countriesArray = $.map(countries, function(value, key) {
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
  <script src="js/custom.js"></script>


  <!-- select2 -->
  <script>
    $(document).ready(function() {
      $(".select2_single").select2({
        placeholder: "Select a state",
        allowClear: true
      });
      $(".select2_group").select2({});
      $(".select2_multiple").select2({
        maximumSelectionLength: 4,
        placeholder: "With Max Selection limit 4",
        allowClear: true
      });
    });
  </script>
  <!-- /select2 -->
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

    $(function() {
      $('#tags_1').tagsInput({
        width: 'auto'
      });
    });
  </script>
  <!-- /input tags -->
  <!-- form validation -->
  <script type="text/javascript">
    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form .btn').on('click', function() {
        $('#demo-form').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });

    $(document).ready(function() {
      $.listen('parsley:field:validate', function() {
        validateFront();
      });
      $('#demo-form2 .btn').on('click', function() {
        $('#demo-form2').parsley().validate();
        validateFront();
      });
      var validateFront = function() {
        if (true === $('#demo-form2').parsley().isValid()) {
          $('.bs-callout-info').removeClass('hidden');
          $('.bs-callout-warning').addClass('hidden');
        } else {
          $('.bs-callout-info').addClass('hidden');
          $('.bs-callout-warning').removeClass('hidden');
        }
      };
    });
    try {
      hljs.initHighlightingOnLoad();
    } catch (err) {}
  </script>
  <!-- /form validation -->
 
  </script>
  <!-- /editor -->
</body>

</html>
