<?php
session_start();
ob_start();


//auth_first print_r($_SESSION);

if (isset($_SESSION['userEmail']) != null || isset($_SESSION['userEmail']) != '') {
    header("location:index.php");
}
if ($_SESSION['auth_first'] == null || $_SESSION['auth_first'] == null) {
    header("location:../index.php");
}
include 'lib/Connection.php';
include 'lib/DBQuery.php';
include 'lib/Fileupload.php';
include 'lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();

extract($_POST);
$unique_id = null;
if (isset($_POST['name'])) {

    $business_type = implode(',', $maincat);

    if ($helper->validAte($name) == false) {
        $msg = "please Fill your name carefully";
    } else if ($helper->validAte($compname) == false) {
        $msg = "please Fill your company name";
    } else if ($helper->validAte($maincat) == false) {
        $msg = "please Fill your main category";
    } else if ($helper->validAte($city) == false) {
        $msg = "please Fill your city";
    } else if ($helper->validAte($state) == false) {
        $msg = "please Fill your state";
    } else if ($helper->validAte($address) == false) {
        $msg = "please Fill your address";
    } else if ($helper->validAte($bankname) == false) {
        $msg = "please add your bank details";
    } else if ($helper->validAte($account) == false) {
        $msg = "please add your bank account number";
    } else if ($helper->validAte($docs) == false) {
        $msg = "please add your proper doucments";
    } else {

        $unique_id = $_SESSION['auth_first'];
        $tableNmae = "vendor_details";
        $fieldName = "unique_user_id,name,comp_name,main_category,vendor_nature,pickup_pincode,pickup_city,pickup_state,pickup_district,pickup_address,billing_pincode,billing_city,billing_state,billing_district,billing_address";
        $valueName = "'" . $helper->escapeStr($unique_id) . "','" . $helper->escapeStr($name) . "','" . $helper->escapeStr($compname) . "','" . $helper->escapeStr($business_type ) . "','" . $helper->escapeStr($vendor_nature) . "','" . $helper->escapeStr($pincode) . "','" . $helper->escapeStr($city) . "','" . $helper->escapeStr($state) . "','" . $helper->escapeStr($district) . "','" . $helper->escapeStr($address) . "','" . $helper->escapeStr($billpincode) . "','" . $helper->escapeStr($billcity) . "','" . $helper->escapeStr($billstate) . "','" . $helper->escapeStr($billdistrict) . "','" . $helper->escapeStr($billaddress) . "'";
        $dbAccess->insertData($tableNmae, $fieldName, $valueName);

        $tableNmae = "vendor_business_details";
        $fieldName = "unique_user_id,vat_number,company_pan,cstnumber,beneficiary,account_number,other_bank_name,ifsc_code,status,date,holder_name";
        $valueName = "'" . $helper->escapeStr($unique_id) . "','" . $helper->escapeStr($docs) . "','" . $helper->escapeStr($comppan) . "','" . $helper->escapeStr($compcst) . "','" . $helper->escapeStr($bankname) . "','" . $helper->escapeStr($account) . "','" . $helper->escapeStr($other_bank_name) . "','" . $helper->escapeStr($ifsc) . "','1',now(),'$holder'";
        $dbAccess->insertData($tableNmae, $fieldName, $valueName);

        //image section 
        $tableNmae = "vendor_doc_upload";
        $fieldName = "unique_user_id,docs";
        $fileDir = "docs/";
        for ($round = 0; $round <= 1; $round++) {
            $result = $FileUpload->execute("files", $fileDir, $round);
            $valueName = "'$unique_id','$result'";
            $dbAccess->insertData($tableNmae, $fieldName, $valueName);
        }

        $msg = "You have successfully submit your imformation you we need some time to authenticate your docs you will be informed soon about your application status";
    }
}
$count = $dbAccess->countDtata("select * from vendor_business_details where unique_user_id = '" . $_SESSION['auth_first'] . "' ");




 $Vendor_Data = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['auth_first'] . "' ");
       
   echo "<input type='hidden' name='optDB' id='otpDB' value='".$Vendor_Data['otp']."'></input>";
       
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
        <link href="css/custom_auth.css" rel="stylesheet">
        <link href="css/icheck/flat/green.css" rel="stylesheet">
        <!-- select2 -->
        <link href="css/select/select2.min.css" rel="stylesheet">
       
<script type="text/javascript" src="../mlm/js/ajax.js"></script>
        <script src="js/jquery.min.js"></script>

        <!--[if lt IE 9]>
              <script src="../assets/js/ie8-responsive-file-warning.js"></script>
              <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
 <style>
            .stepContainer{
                overflow-x:inherit !important;
            }
			.container .box {
  display: block;
    width: 100%;
    content: "+";
    padding: 10px 10px;
    content: "+";
    border: 1px solid #dedede;
    margin: 3px;
    background: #eeeeee;
}

.container .box .top:before {
      padding: 6px 25px;
    /* border: 1px solid #26acce; */
    color: #2797cc;
    content: "+";
    font-size: 22px;
    position: absolute;
    margin-top: -11px;
    z-index: 9999999;
    margin-left: -55px;
    /* background: #26acce; */
    cursor: pointer;
}






.container .box .bottom {
  padding: 12px 10px;
    background-color: #f7f7f7;
    color: #4c4c4c;
    margin-top: 11px;
  display: none;
}
        </style>
    </head>


    <body class="nav-sm">

        <div class="container body">


            <div class="main_container">


                <?php include("include/menu-nav-auth.php"); ?>

                <!-- top navigation -->
                <?php include("include/top-nav-auth.php"); ?>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="col-md-12">



                    <div class="">
					 <div class="row x_title">
                                 <div class="col-md-12">
								 
<img src="images/faqhead.jpg" width="100%">
                                </div>
                                
                            </div>
					
                        <div class="page-title">
						
                            <div class="title_left">

                                <h3>Vendor Verification</h3>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <!--/msg start-->
                        <?php
                        if (isset($msg) != null) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong>Information(???????)! </strong> <?= $msg; ?>.
                            </div>
                        <?php } ?>
                        <!--/msg end-->

                        <?php if ($count > 0) { ?>
                            <div class="alert alert-success">Please wait for a while, 
                                Your account is under verification process</div>
                            <?php
                        } else {
                            ?>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    
									<div class="x_panel">
                                        <div class="x_title">
                                           
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
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

<img src="images/vendorbox.jpg" class="vdr">
                                            <!-- Smart Wizard -->
											<div class="col-md-8 col-sm-8 col-xs-12">
                                            <div id="wizard" class="form_wizard wizard_horizontal">
                                                <ul class="wizard_steps">
                                                    <li>
                                                        <a href="#step-1">
                                                            <span class="step_no">1</span>
                                                            <span class="step_descr">
                                                                Step 1<br />
                                                                <small>Step 1 Seller Detils</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-2">
                                                            <span class="step_no" id="circle2">2</span>
                                                            <span class="step_descr">
                                                                Step 2<br />
                                                                <small>Step 2 Company Address Information</small>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#step-3">
                                                            <span class="step_no" id="circle3">3</span>
                                                            <span class="step_descr">
                                                                Step 3<br />
                                                                <small>Step 3 Business Detils</small>
                                                            </span>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="#step-4">
                                                            <span class="step_no" id="circle4">4</span>
                                                            <span class="step_descr">
                                                                Step 4<br />
                                                                <small>Step 4 Bank Detils</small>
                                                            </span>
                                                        </a>
                                                    </li>


                                                </ul>
                                                <form method="post" id='vndrfrm' enctype="multipart/form-data"  class="form-horizontal form-label-left"  >
                                                    <div id="step-1">




                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
           <input type="text" id="name" readonly name="name"  value="<?php echo $Vendor_Data['title'].' '.$Vendor_Data['name'];?>" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <!--<div class="col-md-2 col-sm-2 col-xs-12">
                                                                <input type="text" id="otp"  name="otp" placeholder="OTP"  onSubmit="return validate();" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="otp_v" style="display:none;  onSubmit="return validate();"    color:#FF0000;">Incorrect OTP</label>
-->
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <input type="text" id="compname" readonly  name="compname" value="<?php echo $Vendor_Data['comp_name'];?>"  class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="compname_v" style="display:none; color:#FF0000;">This field is required</label>

                                                        </div>
														<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vendor Nature <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">


<select name="state" id="statess" class="form-control col-md-7 col-xs-12" onchange="showcity(this.value,'p');"> 
<option value="">Select Nature</option>
<option>Manufacturer</option>
<option>Importer</option>
<option>Distributor</option>
<option>Wholeseller</option>
<option>Authorised Dealer</option>
<option>Trader</option>
<option>Retailer</option>
</select>


</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="state_v" style="display:none; color:#FF0000;">This field is required</label>
</div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Primary Category <span class="required">*</span></label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                                <select class="select2_multiple form-control" id="maincat"  name="maincat[]" multiple="multiple">
                                                                    <option value="<?php echo $Vendor_Data['store'];?>" selected><?php echo $Vendor_Data['store'];?></option>
                                                                    <?php
                            $fetchData = $dbAccess->selectData("select * from product_category where status = '1'");
                             foreach ($fetchData as $t) {
								echo "<option value='".$t['id']."'>". $dbAccess->categoryOption($t['parent_id'],$t['category_name'])."</option>";
						   
							 }
						   ?>
                                                                </select>
                                                            </div>

                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="maincat_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>



                                                    </div>

                                                    <div id="step-2" >


                                                        <div class="form-group" >
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Shipping Address 
                                                            </label>

                                                            <hr/>


                                                        </div>



<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">


<select name="state" id="state" class="form-control col-md-7 col-xs-12" onchange="showcity(this.value,'p');"> 
<option value="">Select State</option>
<?php 
                                          $rs = $dbAccess->selectData("SELECT * FROM state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r['state']."</option>";
                                          }
                                          ?>
</select>


</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="state_v" style="display:none; color:#FF0000;">This field is required</label>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<select name="district" id='pdistrict' onchange="showArea(this.value,'p');" class="form-control col-md-7 col-xs-12" >
<option value="">-Select District-</option>
</select>	

</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="district_v" style="display:none; color:#FF0000;">This field is required</label>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Area <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">
	
<select name="city" id="pcity" value="" class="form-control col-md-7 col-xs-12" >
<option value="">-Select Area-</option>
</select>	

</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="city_v" style="display:none; color:#FF0000;">This field is required</label>

</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Pickup Address <span class="required">*</span></label>
<div class="col-md-9 col-sm-9 col-xs-12">
<textarea name="address" id="address" class="form-control"></textarea>
</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="address_v" style="display:none; color:#FF0000;">This field is required</label>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pincode <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input type="number" id="pincode"  maxlength="6"  name="pincode" 
onkeypress="return IsNumeric(event);"
placeholder="pincode" class="form-control col-md-7 col-xs-12">
</div>

<label class="control-label col-md-2 col-sm-2 col-xs-12" id="pincode_v" style="display:none; color:#FF0000;">This field is required</label>

</div>


<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Same Billing Address <span class="required">*</span></label>
<div class="col-md-9 col-sm-9 col-xs-12">
<input class="" id="diff" name="diff" type="checkbox" value="1" onclick="copy()">
</div>
</div>

                                                        <div id="copyaddress">
<div id='adrHdnFld'></div>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Billing Address 
		</label>

		<hr/>

	</div>



<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">


<select name="billstate" id="dstate" class="form-control col-md-7 col-xs-12 billingAddress" onchange="showcity(this.value,'d');"> 
<option value="">Select State</option>
<?php 
                                          $rs = $dbAccess->selectData("SELECT * FROM state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r['state']."</option>";
                                          }
                                          ?>
</select>


</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="billstate_v" style="display:none; color:#FF0000;">This field is required</label>
</div>

<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">District <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">
<select name="billdistrict" id='ddistrict' value="" class="form-control col-md-7 col-xs-12 billingAddress" onchange="showArea(this.value,'d');">
<option value=''>-Select District-</option>
</select>	

</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="billdistrict_v" style="display:none; color:#FF0000;">This field is required</label>
</div>
<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12 " for="first-name">Area <span class="required">*</span>
</label>
<div class="col-md-9 col-sm-9 col-xs-12">
	
<select name="billcity" id='dcity' value="" class="form-control col-md-7 col-xs-12 billingAddress" >
<option value=''>-Select Area-</option>
</select>	

</div>
<label class="control-label col-md-2 col-sm-2 col-xs-12" id="billcity_v" style="display:none; color:#FF0000;">This field is required</label>

</div>
<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Pickup Address <span class="required">*</span></label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<textarea name="billaddress" id="billaddress" class="form-control billingAddress"></textarea>
		</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-12" id="billaddress_v" style="display:none; color:#FF0000;">This field is required</label>
	</div>


<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Pincode <span class="required">*</span>
		</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<input type="number" id="billpincode"  maxlength="6"  
			onkeypress="return IsNumeric(event);"
			 name="billpincode" placeholder="pincode" class="form-control col-md-7 col-xs-12 billingAddress">
		</div>

		<label class="control-label col-md-2 col-sm-2 col-xs-12" id="billpincode_v" style="display:none; color:#FF0000;">This field is required</label>

	</div>




	
</div>
                 </div>

                                                    <div id="step-3">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vat Number 
                                                            <span class="required">*</span></label>
                                                            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" id="docs"  name="docs"  class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="docs_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Pan Number<span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <input type="text" onblur="this.value=this.value.toUpperCase();" name="comppan" id="comppan"  class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                                <label>Upload Scanned PAN</label>
                                                                <input type="file" name="files[]" class="upload" />
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="comppan_v" style="display:none; color:#FF0000;">Please enter valid pan number</label>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company CST Number  <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                                <input type="text"  id="compcst" name="compcst" class="form-control col-md-7 col-xs-12">
                                                            </div>
                                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                                <label>Upload Scanned CST</label>
                                                                <input type="file" name="files[]" class="upload" />
                                                            </div>
															<label class="control-label col-md-2 col-sm-2 col-xs-12" id="compcst_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>



                                                    </div>

                                                    <div id="step-4">

                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account Number <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
     <input type="text" id="account"  name="account" maxlength="30"  class="form-control col-md-7 col-xs-12"
     onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
<span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
                                                            </div>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="account_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Account Holder Name 
					<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="holder"   value="<?php echo $Vendor_Data['comp_name'];?>" name="holder"  class="form-control col-md-7 col-xs-12">
					</div>
					<label class="control-label col-md-2 col-sm-2 col-xs-12" id="holder_v" style="display:none; color:#FF0000;">This field is required</label>
				</div>
				<div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">IFSC Code  
                                                           <span class="required">*</span> </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                <input type="text"  id="ifsc" onblur="this.value=this.value.toUpperCase();"  name="ifsc" class="form-control col-md-7 col-xs-12">
                                                            </div>
															 <a href='javascript:void(0);' onclick='verifyIFSC();'>Verify</a>
                                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" id="ifsc_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Name 
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="bankname"   name="bankname"  class="form-control col-md-7 col-xs-12">
					</div>
					<label class="control-label col-md-2 col-sm-2 col-xs-12" id="bank_v" style="display:none; color:#FF0000;">This field is required</label>
				</div>
                                                       <!-- <div class="form-group">
                                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Name
                                                           <span class="required">*</span> </label>
                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                 <select class="form-control" id=""   name="">
                        <option value="" selected="" >-- Select Bank --</option>
                        <option >Allahabad Bank</option>
                        <option>Andhra Bank</option>
						<option>Bank of Baroda</option>
						<option>Bank of India</option>
						<option>Bank of Maharashtra</option>
						<option>Canara Bank</option>
						<option>Central Bank of India</option>
						<option>City Union Bank</option>
						<option>Dhanlaxmi Bank</option>
						<option>Federal Bank</option>
						<option>HDFC Bank</option>
						<option>ICICI Bank</option>
						<option>IDBI Bank</option>
						<option>IndusInd Bank</option>
						<option>Kotak Bank</option>
						<option>Kotak Bank</option>
						<option>State Bank of India</option>
						<option>Syndicate Bank</option>
                                             <option value="Other Bank">Other Bank</option>
                     </select>
                                                          




  </div>
                                        
					  <label class="control-label col-md-2 col-sm-2 col-xs-12" id="bank_v" style="display:none; color:#FF0000;">This field is required</label>
                                                        </div>-->


					
					<div class="form-group" style="display:none;"  id="other_bank_name">  
					<label class="control-label col-md-3 col-sm-3 col-xs-12" >Other Bank Name<span class="required">*</span></label>
					<div class="col-md-6 col-sm-6 col-xs-12" >
					<input type="text"   name="other_bank_name"  class="form-control col-md-7 col-xs-12" >
					</div>
</div>
<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Bank Address
	<span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input type="text"  id="bankaddress" name="bankaddress"  class="form-control col-md-7 col-xs-12">
	</div>
		<label class="control-label col-md-2 col-sm-2 col-xs-12" id="bankaddress_v" style="display:none; color:#FF0000;">
			Enter Bank Address </label>
		
</div>
                                      </div>


                                               <!--  <button type="submit" id="send" name="submit" class="btn btn-default" style="display:none;" ></button> -->

                                                </form>
                                            </div></div>
											<div class="col-md-4 col-sm-4 col-xs-12">
											<div id="wizard2">
											
											<h3 class="fqline">Most Popular FAQs</h3>
											<div class="col-md-12" id="category">
												
                                                   
                                                   <div class="container">
  <div class="box">
    <div class="top">
      What is pickup address ?
    </div>
    <div class="bottom" style="display: none;">
       #1 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  <div class="box">
    <div class="top">
      Can I sell on shoppingmoney without CST?
    </div>
    <div class="bottom" style="">
      #2 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  <div class="box">
    <div class="top">
      Can I Provide a different pickup address from that stated in VAT document? 
    </div>
    <div class="bottom" style="">
      #3 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  
  <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom" style="">
     #4 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  
  <div class="box">
    <div class="top">
      Click me
    </div>
    <div class="bottom" style="">
      #5 Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
    </div>
  </div>
  
  
  <a href="#" class="cstcare">Customer Care</a>
  
  
</div>
     
                                                  
                                                </div>
											</div>
                                            <!-- End SmartWizard Content -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?> 

                    </div>
                </div>
                <!-- /page content -->


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
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
        <script src="js/bootstrap.min.js"></script>

        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>

        <script src="js/custom.js"></script>
        <!-- form wizard -->
        <script type="text/javascript" src="js/wizard/vendorWizard.js"></script>
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

        <!-- /form validation -->
        <script>

            function validate() {
                var status = null;
              //  var name = $("#name").val();
                
                var bank = $("#bankname").val();
                var account = $("#account").val();
                var bankaddress = $("#bankaddress").val();
                var ifsc = $("#ifsc").val();
                var holder = $("#holder").val();
               
            

                
                 if (bankaddress == null || bankaddress == '') {
                    $("#bankaddress_v").fadeIn(1000);
                    status = 0;
                }
                
                if (bank == null || bank == '') {
                    $("#bank_v").fadeIn(1000);
                    status = 0;
                }
                if (account == null || account == '') {
                    $("#account_v").fadeIn(1000);
                    status = 0;
                }
                if (holder == null || holder == '') {
                    $("#holder_v").fadeIn(1000);
                    status = 0;
                }
                if (status == 0) {
                    return false;
                } else {
                    return true;
                }
            }
            
                
                
                $("#address").change(function () {
                    $("#address_v").fadeOut(1000);
                });
                
                $("#pcity").change(function () {
                    $("#city_v").fadeOut(1000);
                });
				 $("#pdistrict").change(function () {
                    $("#district_v").fadeOut(1000);
                });
                
                $("#docs").change(function () {
                    $("#docs_v").fadeOut(1000);
                });
                
                
                $("#bankname").change(function () {
                    $("#bank_v").fadeOut(1000);
                });
                
                $("#bankaddress").change(function () {
                    $("#bankaddress_v").fadeOut(1000);
                });
                
                
                $("#compname").change(function () {
                    $("#compname_v").fadeOut(1000);
                });
                $("#maincat").change(function () {
                    $("#maincat_v").fadeOut(1000);
                });
                $("#pincode").change(function () {
                    $("#pincode_v").fadeOut(1000);
                });
                $("#city").change(function () {
                    $("#city_v").fadeOut(1000);
                });
                $("#state").change(function () {
                    $("#state_v").fadeOut(1000);
                });
                $("#comppan").change(function () {
                    $("#comppan_v").fadeOut(1000);
                });
                $("#bank").change(function () {
                    $("#bank_v").fadeOut(1000);
                });
                
                $("#account").change(function () {
                    $("#account_v").fadeOut(1000);
                });
                $("#ifsc").change(function () {
                    $("#ifsc_v").fadeOut(1000);
                });
                $("#holder").change(function () {
                    $("#holder_v").fadeOut(1000);
                });

    $("#bankname").change(function () {
                   var a=$(this).val();
                   
                   if(a=="Other Bank")
                    document.getElementById("other_bank_name").style.display = 'block';
                    else
                    document.getElementById("other_bank_name").style.display = 'none';
                    
                });



            });
			
        </script>
		
		

        <script>
            function copy() {

var a=$('#diff').is(':checked');
				
				if(a) {
  
              $('#billaddress').val($('#address').val());
			  $('#dstate').append($('<option>', {value:$('#state').val(), text:$('#state').val()}));
              $('#dstate').val($('#state').val());
              $('#ddistrict').append($('<option>', {value:$('#pdistrict').val(), text:$('#pdistrict').val()}));
              $('#ddistrict').val($('#pdistrict').val());
			  $('#dcity').append($('<option>', {value:$('#pcity').val(), text:$('#pcity').val()}));
              $('#dcity').val($('#pcity').val());
              $('#billpincode').val($('#pincode').val());
              
                   $('.billingAddress').attr('readonly',true);
				  $('#dstate').attr('disabled',true);
				  $('#ddistrict').attr('disabled',true);
				  $('#dcity').attr('disabled',true);
				  $('#adrHdnFld').append("<input type='hidden' name='billstate' value='"+$('#state').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' name='billdistrict' value='"+$('#pdistrict').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' name='billcity' value='"+$('#pcity').val()+"'>");
                  
} else {
				  $('.billingAddress').attr('disabled',false);
                  $('#adrHdnFld').html('');
				  $('.billingAddress').attr('readonly',false);
}

                

                
                
            }
        </script>
		
		<script>
function showcity(arg,tp)
    {
       // alert(tp);
		var target="#"+tp+"district";
        //$("#district").load("district.php?id="+arg);
        $.ajax({
        type: "GET",
        url: '../mlm/district.php',
        data: "id=" + arg,
        dataType: "html",
        success: function(html){ $(target).html(html);
        }

        });
    }
	function showArea(arg,tp)
    {
       // alert(tp);
		var target="#"+tp+"city";
        //$("#district").load("district.php?id="+arg);
        $.ajax({
        type: "GET",
        url: '../mlm/area.php',
        data: "id=" + arg,
        dataType: "html",
        success: function(html){ $(target).html(html);
        }

        });
    }
</script>
<!--  to verify ifsc code  -->
 <script>
		function verifyIFSC()
     {     
	var request = checkAjax();
    var ifsc = $("#ifsc").val();
    var url = "../mlm/ajaxpage/verifyifsc.php?ifsc="+ifsc;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			var resp = request.responseText;
					
			var res = resp.split("*");
			if(res[0] == "found")			
		 { document.getElementById("ifsc").style.border= "green solid 2px";
		  document.getElementById("bankname").value=res[1];
		   document.getElementById("bankaddress").value=res[2];
		  //document.getElementById("ifsc_check").src = "hackanm.gif";
		 
		// alert("found1");
			}
			else{
			document.getElementById("ifsc").style.border= "red solid 2px";
			 document.getElementById("bankname").value="";
		   document.getElementById("bankaddress").value="";
			
			//alert("notfound1");
			}
			//alert(resp);
	      //  $("#friends-email").val("");
		}
	}
	
}
		</script>

		
		
		<script type="text/javascript">
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(500, 'swing');
});
</script>


    </body>

</html>
