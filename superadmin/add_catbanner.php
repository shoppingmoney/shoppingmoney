<?php
session_start();
ob_start();
error_reporting(0);
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
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
$FileUpload = new Fileupload();

//main category insert here
if (isset($_GET['eid'])) {
	@extract($_GET);
	//$fileDir = "images/";
 //   $result = $FileUpload->execute("files", $fileDir, 0);
	//icon end	
	//$flag = $dbAccess->insertData("cat_banner","catid,title,link,image,status","'$pcategory','$title','$link','$result','$status'"); 
   // $_SESSION['message']="Banner Inserted Successfully";
   $getData = $dbAccess->selectSingleStmt("select * from  cat_banner where id='".$_GET['eid']."'");
}
if(isset($_POST['submit']))
{ @extract($_POST);
 //$fileDir = "images/";
 $img1=$_FILES['img1']['name'];
   
    if($img1!='') {
        $savimg1 = time().$img1;
        $action2 = move_uploaded_file($_FILES['img1']['tmp_name'],"images/".$savimg1);
		unlink("images/".$oimg1);
    }
	else{
		$savimg1=$oimg1;
	}
	$img2=$_FILES['img2']['name'];
   
    if($img2!='') {
        $savimg2 = time().$img2;
        $action2 = move_uploaded_file($_FILES['img2']['tmp_name'],"images/".$savimg2);
		unlink("images/".$oimg2);
    }
	else{
		$savimg2=$oimg2;
	}
	$img3=$_FILES['img3']['name'];
   
    if($img3!='') {
        $savimg3 = time().$img3;
        $action2 = move_uploaded_file($_FILES['img3']['tmp_name'],"images/".$savimg3);
		unlink("images/".$oimg3);
    }
	else{
		$savimg3=$oimg3;
	}
	
	$sub=$sub_cat;
	//echo "UPDATE cat_banner set catid='".$pcategory."', subcat_1='".$sub[0]."', subcat_2='".$sub[1]."',subcat_3='".$sub[2]."', link='".$link."',image1='".$savimg1."',image2='".$savimg2."',image3='".$savimg3."' where position='".$position."'";
	$getData = $dbAccess->updateData("UPDATE cat_banner set catid='".$pcategory."', subcat_1='".$sub[0]."', subcat_2='".$sub[1]."',subcat_3='".$sub[2]."', link='".$link."',image1='".$savimg1."',image2='".$savimg2."',image3='".$savimg3."' where position='".$position."'");
 if($getData){
   echo "<script>alert('Updated Successfully'); window.location='list_catbanner.php'; </script>";
}
	
}

?>
<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
  
  <!-- Meta, title, CSS, favicons, etc. -->
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Shopping Money </title>

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
		  $menu="category";
		  include "inc/left.php";
		  ?>
          <!-- /sidebar menu -->

        </div>
      </div>

      <!-- top navigation -->
     <?php
	 include "inc/top.php";
	 ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Add Category Index</h3>
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
				
                  <!--<h2>Registration Form <small>Click to validate</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>-->
                </div>
                <div class="x_content">

                  <!-- start form for validation -->
                  <form id="demo-form" data-parsley-validate method="post" enctype="multipart/form-data">
				   <label for="parent">Position:<?=$getData['position']?></label>
<input type="hidden" name="position" value="<?=$getData['position']?>" class="form-control"  />
				   <label for="parent">Parent Category *:</label>
                        <select id="parent" class="select2_group form-control" onchange="fetch_sub(this.value);" name="pcategory" required>
						  <option value="0">Root</option>
						 <?php
                            $fetchData = $dbAccess->selectData("select * from product_category where status = '1' And parent_id = '0'");
                             foreach ($fetchData as $t) {
								echo "<option ";
								if($getData['catid'] == $t['id']) echo "selected";
								echo " value='".$t['id']."'>". $dbAccess->categoryOption($t['parent_id'],$t['category_name'])."</option>";
						   
							 }
						   ?>
						  
                        </select>
						<p>Old Sub-Category:
						<?php $fetchData1 = $dbAccess->selectData("select * from product_category where status = '1' And parent_id = '".$getData['catid']."'");
								
							foreach ($fetchData1 as $t) {
								if($t['id']==$sid1) {echo $t['category_name'].",";}
								if($t['id']==$sid2) {echo $t['category_name'].",";}
								if($t['id']==$sid3) {echo $t['category_name'];}
								
							}
						?>
						
						</p>
						<label for="parent">Sub-Category (Please Select only 3 sub-categories) *:</label>
						
                        <select id="sub" class="select2_group form-control" name="sub_cat[]" multiple="multiple" required>
						  <option value="0">Select Sub-Category</option>
						 
                        </select>
						

 <label for="parent">LINK *:</label>
<input type="text" name="link" class="form-control"  value="<?=$getData['link']?>" required />

 
<!--
 <label for="parent">Location:</label>

<select name="area" class="form-control">
<option value="">Select One</option>
<option value="HOME TOP">HOME TOP</option>
<option value="BANNER">BANNER</option>
</select> -->
<table>
<tbody>
<tr>
 <td><img src="images/<?=$getData['image1'];?>" height="40" width="100" ></td>
 <?php if($getData['image2']!=''){?>
  <td><img src="images/<?=$getData['image2'];?>" height="40" width="100" ></td>
 <?php } ?>
  <?php if($getData['image3']!=''){?>
   <td><img src="images/<?=$getData['image3'];?>" height="40" width="100" ></td>
    <?php } ?>
</tr>
</tbody>
</table>
  <input type="hidden" name="oimg1" value="<?=$getData['image1']?>"/>
    <input type="hidden" name="oimg2" value="<?=$getData['image2']?>"/>
	  <input type="hidden" name="oimg3" value="<?=$getData['image3']?>"/>
					
					 <label for="order">Image1(604 x 419) * :</label>
                    <input type="file" name="img1" />
					<label for="order">Image2(604 x 419):</label>
                    <input type="file" name="img2" />
					<label for="order">Image3(604 x 419):</label>
                    <input type="file" name="img3" />
					
               <!--     <p>
                      Active:
                      <input type="radio" class="flat" checked name="status" id="genderM" value="1" required /> Deactive:
                      <input type="radio"  class="flat" name="status" id="genderF" value="0" />
                    </p> -->
					 <input type="hidden"  class="flat" name="status" id="genderF" value="1" />
                        <br/>
						<input type="hidden" name="id" value="<?=$cat['id']?>">
						<input type="submit" name="submit" class="btn btn-primary" VALUE="Update Index Category" />

                  </form>
                  <!-- end form for validations -->

                </div>
              </div>


            </div>
          </div>

        </div>
      </div>
	  
	  <script>
	  function fetch_sub(m){
		  
		  var ids=m;
		  var s1="<?=$sid1?>";
		   var s2="<?=$sid2?>";
		    var s3="<?=$sid3?>";
		  
		  var request = checkAjax();
    var url = "fetchsub_cat.php?id="+ids+"&s1="+s1+"&s2="+s2+"&s3="+s3;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			var resp = request.responseText;
			$("#sub").html(resp);	
		}else{
			$("#sub").html("<img src='../img/loader.gif' />");	
		}
	}
}
		  
	  
	  </script>
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
