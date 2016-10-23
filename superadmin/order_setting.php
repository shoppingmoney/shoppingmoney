<?php
include 'class/Connection.php';
include 'class/Fileupload.php';
include 'class/DBQuery.php';
include 'class/Helpers.php';
include 'class/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();

if(isset($_POST['name'])){
	@extract($_POST);
	$date = date("Y-m-d H:i:s");
	$table = "manifest";
	$col = "orderid,oid,empid,name,email,mobile,date,status";
	$val = "'$orderid','$oid','$empid','$name','$email','$mobile','$date','Picked'";
	$dbAccess->insertData($table,$col,$val);
	echo "<script>alert('Manifest is set');window.location='order_product.php';</script>";
}
$name="";$email="";$mobile="";
if(isset($_GET['vid'])){
	$mnfst=$dbAccess->selectSingleStmt("SELECT * FROM manifest WHERE oid='".$_GET['cid']."'");
	$name = $mnfst['name'];
	$email = $mnfst['email'];
	$mobile = $mnfst['mobile'];
}
?>
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Add Manifest to order</h3>
            </div>
           
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-xs-12">
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
                  <form action='order_setting.php' id="demo-form" data-parsley-validate method="post">
				  <label for="name">Employee Name :</label>
                    <input type="text" value="<?=$name;?>" id="name" class="form-control" name="name" required />
					<label for="email">Employee Email :</label>
                    <input type="text" value="<?=$email;?>" id="email" class="form-control" name="email" required />
					<label for="mobile">Employee Mobile :</label>
                    <input type="text" value="<?=$mobile;?>" id="mobile" class="form-control" name="mobile" required />
				   
<input type='hidden' name='orderid' value='<?=$_GET['oid']?>'>
<input type='hidden' name='oid' value='<?=$_GET['cid']?>'>
<br/>
<?php if(!isset($_GET['vid'])) { ?>
						<input type="submit" class="btn btn-primary" VALUE="Add Employee" />
<?php } ?>

                  </form>
                  <!-- end form for validations -->

                </div>
              </div>


            </div>
          </div>

        </div>
      </div>

																
																
																
																