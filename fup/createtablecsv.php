<?php
session_start();
ob_start();
include 'superadmin/class/Connection.php';
include 'superadmin/class/Fileupload.php';
include 'superadmin/class/DBQuery.php';
include 'superadmin/class/Helpers.php';
include 'superadmin/class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$FileUpload = new Fileupload();
if (isset($_POST['submit'])) {
    @extract($_POST);
    //$read     = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
    //$vendorId = $read['unique_user_id'];
    $upload = 0;
    if ($category == null || $category == '') {
        $_SESSION['message']="Please select your product category";
    } else {
        //csv file process here
		$dir = "superadmin/excel_upload/".$category."_".basename($_FILES['csv']['name']);
		$file   = $_FILES['csv']['tmp_name'];
		$fileType = pathinfo($dir,PATHINFO_EXTENSION);
		if($fileType == 'csv'){
			if(move_uploaded_file($file,$dir)){
				$upload = 1;
			}
		}else{
			$upload = 0;
		}
		if($upload == 1){
        $handle = fopen($dir, "r");
        $c = 0;
		$s_fieldarr = array();
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
			
            //Create table
			if(($filesop[17] != null || !empty($filesop[17])) && $c == 2)
			{
				//echo "sfgdyuedfyudfgyyuskadfgysadgf".count($filesop);
			$table = "specification_$category";
			$query = "CREATE TABLE $table (
            id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	        product_id INT(100),";
            for($i=0;$i<180;$i++){ // setting maximum field
			if($i+17 < count($filesop)){
				if($filesop[$i+17] != null || !empty($filesop[$i+17])){
					$s_fieldarr[$i] = $filesop[$i+17];
					//$query .= strtolower(preg_replace("^[\\\\/:\*\?\"<>!~#.,'&$\-\ \()\|]^", "_", trim($filesop[$i+17])))." VARCHAR(150) NOT NULL, ";
					$query .= strtolower(preg_replace("~[^a-zA-Z0-9]+~", "_", trim($filesop[$i+17])))." VARCHAR(150) NOT NULL, ";
				}
			}
			}
			$query .= "date TIMESTAMP)";
			}
			$c = $c + 1;
            }
			$res = $dbAccess->updateData($query);
		//echo $query;
		if($res !== 0){ // created table
			$_SESSION['message']="Table already exist";
		}else{
			$_SESSION['message']="Table Created Successfully";
			
		}
		}else{
			$_SESSION['message']="File is not uploaded,Please check your file format";
			
		}
        }
		 
		header("location:createtablecsv.php");
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

  <title>Shoppingmoney </title>

  <!-- Bootstrap core CSS -->

  <link href="superadmin/css/bootstrap.min.css" rel="stylesheet">

  <link href="fonts/superadmin/css/font-awesome.min.css" rel="stylesheet">
  <link href="superadmin/css/animate.min.css" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="superadmin/css/custom.css" rel="stylesheet">
  <link href="superadmin/css/icheck/flat/green.css" rel="stylesheet">
  <!-- editor -->
  <link href="superadmin/css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="superadmin/css/editor/index.css" rel="stylesheet">
  <!-- select2 -->
  <link href="superadmin/css/select/select2.min.css" rel="stylesheet">
  <!-- switchery -->
  <link rel="stylesheet" href="superadmin/css/switchery/switchery.min.css" />

  <script src="js/jquery.min.js"></script>
</head>


<body class="nav-sm">

  <div class="container body">
    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <?php
		  $menu="category";
		  include "superadmin/inc/left.php";
		  ?>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
     <?php
	 include "superadmin/inc/top.php";
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
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select category <span class="required">*</span></label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="select2_single form-control" id="category"  name="category" required onChange="showCustomer(this.value);">
                                                          <option value="">Select Category</option>
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

      <!-- footer content -->
     <?php
	 include "superadmin/inc/footer.php";
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

  <script src="superadmin/js/bootstrap.min.js"></script>

  <!-- bootstrap progress js -->
  <script src="superadmin/js/progressbar/bootstrap-progressbar.min.js"></script>
  
  <!-- icheck -->
  <script src="superadmin/js/icheck/icheck.min.js"></script>
  <!-- tags -->
  <script src="superadmin/js/tags/jquery.tagsinput.min.js"></script>
  <!-- switchery -->
  <script src="superadmin/js/switchery/switchery.min.js"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="superadmin/js/moment/moment.min.js"></script>
  <script type="text/javascript" src="superadmin/js/datepicker/daterangepicker.js"></script>
  <!-- richtext editor -->
  <script src="superadmin/js/editor/bootstrap-wysiwyg.js"></script>
  <script src="superadmin/js/editor/external/jquery.hotkeys.js"></script>
  <script src="superadmin/js/editor/external/google-code-prettify/prettify.js"></script>
  <!-- select2 -->
  <script src="superadmin/js/select/select2.full.js"></script>
  <!-- form validation -->
  <script type="text/javascript" src="superadmin/js/parsley/parsley.min.js"></script>
  <!-- textarea resize -->
  <script src="superadmin/js/textarea/autosize.min.js"></script>
  <script>
    autosize($('.resizable_textarea'));
  </script>
  <!-- Autocomplete -->
  <script type="text/javascript" src="superadmin/js/autocomplete/countries.js"></script>
  <script src="superadmin/js/autocomplete/jquery.autocomplete.js"></script>
  <!-- pace -->
  <script src="superadmin/js/pace/pace.min.js"></script>
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
  <script src="superadmin/js/custom.js"></script>


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
  <!-- editor -->
  <script>
    $(document).ready(function() {
      $('.xcxc').click(function() {
        $('#descr').val($('#editor').html());
      });
    });

    $(function() {
      function initToolbarBootstrapBindings() {
        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'
          ],
          fontTarget = $('[title=Font]').siblings('.dropdown-menu');
        $.each(fonts, function(idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
        });
        $('a[title]').tooltip({
          container: 'body'
        });
        $('.dropdown-menu input').click(function() {
            return false;
          })
          .change(function() {
            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
          })
          .keydown('esc', function() {
            this.value = '';
            $(this).change();
          });

        $('[data-role=magic-overlay]').each(function() {
          var overlay = $(this),
            target = $(overlay.data('target'));
          overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
        });
        if ("onwebkitspeechchange" in document.createElement("input")) {
          var editorOffset = $('#editor').offset();
          $('#voiceBtn').css('position', 'absolute').offset({
            top: editorOffset.top,
            left: editorOffset.left + $('#editor').innerWidth() - 35
          });
        } else {
          $('#voiceBtn').hide();
        }
      };

      function showErrorAlert(reason, detail) {
        var msg = '';
        if (reason === 'unsupported-file-type') {
          msg = "Unsupported format " + detail;
        } else {
          console.log("error uploading file", reason, detail);
        }
        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
          '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
      };
      initToolbarBootstrapBindings();
      $('#editor').wysiwyg({
        fileUploadError: showErrorAlert
      });
      window.prettyPrint && prettyPrint();
    });
  </script>
  <!-- /editor -->
</body>

</html>
