<?php

error_reporting(0);
?>
<!doctype html>
<html class="no-js" lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="" content="">
      <title>Shopping Money.in</title>
      <meta name="description" content="">
      <meta name="viewport" content="">
      <!-- favicon
         ============================================ -->		
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
      <!-- Google Fonts
         ============================================ -->		
    
      <!-- Bootstrap CSS
         ============================================ -->		
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Font awesome CSS
         ============================================ -->
     
	 
	    <script src="js/bootstrap-select.js"></script>
      <!-- owl.carousel CSS
         ============================================ -->
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/owl.theme.css">
      <link rel="stylesheet" href="css/owl.transitions.css">
	   <link href="assets/css/style-new.css" rel="stylesheet" media="screen">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
      <!-- nivo slider CSS
         ============================================ -->
     
      <!-- main CSS
         ============================================ -->
      <link rel="stylesheet" href="css/main.css">
 <link rel="stylesheet" href="css/style.css">
      <!-- style CSS
         ============================================ -->
      <link rel="stylesheet" href="css/styl.css">
      <!-- responsive CSS
         ============================================ -->
      <link rel="stylesheet" href="css/responsive.css">
   </head>
   <body style="background-color:#fff;">
      <!-- HEADER-AREA START -->
    <?php include 'includes/header.php';?>
      <!-- HEADER AREA END -->
      <!-- START PAGE-CONTENT -->
      <section class="page-content">
         <!-- Start Account-Create-Area -->
         <div class="account-create-area">
          
             
             <!--<script src="js/validation.js"></script>
<link href="css/validation.css" rel="stylesheet" >
-->
<?php
extract($_POST);
    include_once 'includes/config.php';
    $conf = new config();
//print_r($_POST);

//$rs = $conf->insertValue($table, $column, $value)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/register.php';
    
    //checking for the database to available it or not.
    //$link;
    //$myvar = substr($link, -2, 2);
    
    
    //$conf->checkAvailablity();
    //$testing = $conf->single(" firstimeregd where id='$myvar'", "linkid");
	$testing = $conf->single(" userdetails where userid='$link'", "linkid");
    if($testing>0)
    {
  
    
    
    //first time registration.
    $column_m = "uemail,upassword,ufirstname,ulastname,udate,ucontact,utitle,ustatus";
    $value_m = "'$email','" . sha1($password) . "','" . ucfirst($name) . "','" . ucfirst($lastname) . "','','$phone','$title','0'";

    $show=registerme($column_m,$value_m,$email);//function to insert data for registration.
    
    
    //final registration.
   $get = finalregistration($column_r,$value_r,$bcolmn, $uid, $email,$name);//function to insert data for registration.
   
$conf->updateValue("firstimeregd set refid='$testing' where id='$show'");
    //file upload
    
    
    
    if($get>0){
        bankdetails($bcolmn,$bvalue); //addming bank details.
    }
    }else{
        echo "<script>alert('Sorry, User id is not available');</script>";
    }
    
}

?>
<div class="container">
           
    <form action="#" method="post" class="register" onsubmit="return(validate())" enctype="multipart/form-data" >
               <div class="row">
			   
                  <div class="col-md-12">
				  <div class="col-sm-4 col-xs-12 title-group gfont-1">
                     <div class="area-title" style="margin-top: 30px;">
                        <h3 class="">Introduce Downliner</h3>
                     </div>
					 </div>
					 <div class="col-sm-4 col-xs-12 " style="float: right;">
                                             
                                    <div class="single-create ">
                                       <p>Sponsor Type <sup>*</sup></p>
                                       <select class="form-control" onchange="disp(this.value)" id="sponsorchannel" name="sponsorchannel" required="">
                                           <option value="">Select Sponsor Type</option>
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="2">  Advertisement  </option>
                                          <!--<option value="1"> Enter Sponsor Link</option>-->                                          
                                          <option value="3"> Others </option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
				  
               </div><hr style="border-top: 3px solid #26ACCE;">
			   
               <div class="account-create">
                 
                     <div class="row">
                        <div class="col-md-12">
                           <div class="account-create-box">
                              <h2 class="box-info"><b>PERSONAL DETAILS</b> </h2>
                              <div class="row">
                                 
                                 <div class="col-sm-4 col-xs-12">
                                     <div class="single-create" >
                                     
                                       <p>Enter Sponsor ID</p>
                                      <input class="form-control" type="text" name="link"    id="hidshow" style="display: none;">
                                      <input class="form-control" type="text" name="link1" value="Advertisement" id="hidshow1" style="display: none;" >
                                    <input class="form-control" type="text" name="link2" value="Others" id="hidshow2" style="display: none;" >
                                     
                                      </div>
                                 </div>
                                  
                                  <div class="col-sm-1 col-xs-12">
                                    <div class="single-create">
                                       <p>Title <sup>*</sup></p>
                                       <select class="form-control" name="title" id="title" required="">
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Miss</option>                                               
                                       </select>                                       
                                    </div>
                                 </div>
                              
				<div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>Name <sup>*</sup></p>                                       
                                       <input class="form-control" type="text" name="name" id="name" value="" required="">
                                    </div>
                                 </div>
                                  
                                  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Last Name<sup>*</sup></p>
                                       <input class="form-control" value="" type="text" name="lastname" id="lastname" required="">
                                    </div>
                                 </div>
                                  
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Mobile no<sup>*</sup></p>
                                       <input class="form-control" value="" type="text" name="phone" id="mobileno " required="">
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Email Id<sup>*</sup></p>
                                       <input class="form-control" value="" type="text" name="email" id="email" required="">
                                       
                                    </div>
                                 </div>
                                  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Password <sup>*</sup></p>
                                       <input class="form-control" type="password" name="password" id="password" required="">
                                    </div>
                                 </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Father/Husband Name <sup>*</sup></p>
                                       <input class="form-control" type="text" name="fatherhusband" id="fatherhusband" required="">
                                    </div>
                                 </div>
								 
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>DOB <sup>*</sup></p>
                                       <div class="row">
                                          <div class="col-xs-4">
                                             <select class="form-control" name="dob_date" id="dob_date" required="">
                                                 <option>Date</option>
                                                 <?php
                                                 $range = range(1,31);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>
                                                 
                                                
                                             </select>
                                          </div>
                                          <div class="col-sm-4 col-xs-12">
                                             <select class="form-control" name="dob_month" id="dob_month" required="">
                                                 <option>Month</option>
                                                 <?php
                                                 $range = range(1,12);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>
                                                
                                             </select>
                                          </div>
                                          <div class="col-sm-4 col-xs-12">
                                             <select class="form-control" name="dob_year" id="dob_year" required="">
                                                 <option>year</option>
                                                 <?php
                                                 $range = range(1950,2020);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>
                                                
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Occupation <sup>*</sup></p>
                                       <select class="form-control" id="occupation" name="occupation" required="">
                                          <option>Services</option>
                                          <option>Business</option>
                                          <option> Professional</option>
                                          <option>Retried</option>
                                          <option>Student</option>
                                          <option>Housewife</option>
                                          <option>Others</option>
                                       </select>
                                    </div>
                                 </div>
                               <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p> Nominee Name <sup>*</sup></p>
                                       <div class="row">
                                          <div class="col-xs-4">
                                             <select class="form-control" name="nomnee_title" id="nomnee_title" required="">
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Miss</option>
                                               
                                             </select>
                                          </div>
                                          <div class="col-sm-8 col-xs-12">
                                              <input class="form-control" type="text" name="nomineename" id="nomineename" required="">
                                          </div>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Relation with Nominee  <sup>*</sup></p>
                                       <input class="form-control" type="text" name="relationwithnominee" id="relationwithnominee" required="">
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="single-create">
                                       <p>Address  <sup>*</sup></p>
                                       <input class="form-control" type="text" name="address" id="address" required="">
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>State <sup>*</sup></p>
                                       <select class="form-control" id="state" onchange="showcity(this.value);" name="state" required="">
                                           <option value="">Select State</option>
                                           <?php 
                                          $rs = $conf->fetchall("state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r->state."</option>";
                                          }
                                          ?>
                                                                                     
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>District <sup>*</sup></p>
                                       <select class="form-control" id="district" name="district" required="">
                                          
                                       </select>
                                    </div>
                                 </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>City <sup>*</sup></p>
                                       <input class="form-control" type="text" name="city" id="city" required="">
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>PIN Code <sup>*</sup></p>
                                       <input class="form-control" type="text" name="pincode" id="pincode" required="">
                                    </div>
                                 </div>
								      <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>PAN Card <sup>*</sup></p>
                                       <input class="form-control" type="text" name="pan_card" id="pancard" required="">
                                    </div>
                                 </div>
								
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>ID Proof No <span style="font-size:11px;">(Adhar card,voter card,passport)</span> <sup>*</sup></p>
                                       <input class="form-control" type="text" name="idproof" id="idproof" required="">
                                    </div>
                                 </div>
								 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Upload Photo <sup>*</sup></p>
                                  <span class="btn btn-success fileinput-button">
                                       <i class="glyphicon glyphicon-plus"></i>
                                       <span>Attach File</span>
                                       <input type="file" name="photo" multiple="" id="photo" data-parsley-id="5075">
                                       </span>
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Cancel Check<sup>*</sup></p>
                                  <span class="btn btn-success fileinput-button">
                                       <i class="glyphicon glyphicon-plus"></i>
                                       <span>Attach File</span>
                                       <input type="file" name="cancelchk" multiple="" id="cancelcheck" data-parsley-id="5075">
                                       </span>
                                    </div>
									
                                 </div>
								  
									 <div class="col-sm-4 col-xs-12">
									 <div class="single-create">
                                       <p>PAN Card<sup>*</sup></p>
                                  <span class="btn btn-success fileinput-button">
                                       <i class="glyphicon glyphicon-plus"></i>
                                       <span>Attach File</span>
                                       <input type="file" name="pancard" multiple="" id="pancard" data-parsley-id="5075">
                                       </span>
                                    </div>
									</div>
									 <div class="col-sm-4 col-xs-12">
									 <div class="single-create">
                                       <p>Adhar Card<sup>*</sup></p>
                                  <span class="btn btn-success fileinput-button">
                                       <i class="glyphicon glyphicon-plus"></i>
                                       <span>Attach File</span>
                                       <input type="file" name="adharcard" multiple="" id="adharcard" data-parsley-id="5075">
                                       </span>
                                    </div>
									</div>
									 <div class="col-sm-4 col-xs-12">
									 <div class="single-create">
                                       <p>Voter Id<sup>*</sup></p>
                                  <span class="btn btn-success fileinput-button">
                                       <i class="glyphicon glyphicon-plus"></i>
                                       <span>Attach File</span>
                                       <input type="file" name="voterid" multiple="" id="voterid" data-parsley-id="5075">
                                       </span>
                                    </div>
									</div>
                              </div>
                           </div>
                           <div class="account-create-box">
                              <h1 class="box-info"><b>BANK DETAIL</b></h1>
                              <div class="row">
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Account Type <sup>*</sup></p>
                                      <select class="form-control" id="occupation" name="account" required="">
                                          <option>Select A/C Type</option>
                                          <option>Saving Account</option>
                                          <option>Current Account</option>
                                        
                                         
                                       </select>
                                    </div>
                                 </div>
								    <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Account Holder Name <sup>*</sup></p>
                                       <input class="form-control" type="text" name="accholdername" id="accounttypes" required="">
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Bank name <sup>*</sup></p>
                                       <input class="form-control" type="text" name="bankname" id="bankname" required="">
                                    </div>
                                 </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Branch Address <sup>*</sup></p>
                                       <input class="form-control" type="text" name="branchaddress" id="branchaddress" required="">
                                    </div>
                                 </div>
                              
                                <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>IFSC code <sup>*</sup></p>
                                       <input class="form-control" type="text" name="ifsecode" id="ifsecode" required="">
                                    </div>
                                 </div>
                           
								 
                              </div>
                           </div>
                           <div class="submit-area">
                              <p class="required text-right">* Required Fields</p>
                              <button type="submit" class="btn btn-primary floatright">submit</button>
                              <!--<a href="#" class="float-left"><span><i class="fa fa-angle-double-left"></i></span> Back</a>-->
                           </div>
                        </div>
                     </div>
                  
               </div></form>
            </div>
<style>
	.error{
		border:1px solid Red !important;
	}
</style>
<script>
    function showcity(arg)
    {
        //alert(arg);
        //$("#district").load("district.php?id="+arg);
        $.ajax({
        type: "GET",
        url: 'district.php',
        data: "id=" + arg,
        //alert(q);
        dataType: "html",
        success: function(html){ $("#district").html(html);
        }

        });
    }
    
    function disp(arg)
    {
        
        if(arg == '1'){
            $('#hidshow').show();
            $('#hidshow1').hide();
            $('#hidshow2').hide();
            //alert(arg);
        }if(arg == '2'){
            $('#hidshow1').show();
            $('#hidshow').hide();
            $('#hidshow2').hide();
        }if(arg == '3'){
            $('#hidshow2').show();
            $('#hidshow1').hide();
            $('#hidshow').hide();
        }
        
    }
    
    
    function validate()
    {
        var sponsorchannel = ("#sponsorchannel").val();
        var title = ("#title").val();
       var name = ("#name").val();
       var lastname = ("#lastname").val();
       var mobileno = ("#mobileno").val();
       var email = ("#email").val();
       var password = ("#password").val();
       var fatherhusband = ("#fatherhusband").val();
       var dob_date = ("#dob_date").val();
       var dob_month = ("#dob_month").val();
       var dob_year = ("#dob_year").val();
       var occupation = ("#occupation").val();
       var nomnee_title = ("#nomnee_title").val();
       var nomineename = ("#nomineename").val();
       var relationwithnominee = ("#relationwithnominee").val();
       var address = ("#address").val();
       var state = ("#state").val();
       var district = ("#district").val();
       var city = ("#city").val();
       var pincode = ("#pincode").val();
       var pancard = ("#pancard").val();
       var idproof = ("#idproof").val();
       
       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var phoneReg = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
        var pinReg = /\(?([0-9]{6})\)/;
       
       if(sponsorchannel == ""){
           $("#sponsorchannel").focus().addClass("error");
            return false;
       }
       if(title == ""){
           $("#title").focus().addClass("error");
            return false;
       }
       if(name == ""){
           $("#name").focus().addClass("error");
            return false;
       }
       if(lastname == ""){
           $("#lastname").focus().addClass("error");
            return false;
       }
       if(mobileno == ""){
           $("#mobileno").focus().addClass("error");
            return false;
       }
       if(!phoneReg.test(mobileno)){
		$("#mobileno").focus().addClass("error");
		return false;
	}
        if(email == ""){
           $("#email").focus().addClass("error");
            return false;
       }
       if(!emailReg.test(email)){
		$("#email").focus().addClass("error");
		return false;
	}
       if(password == ""){
           $("#password").focus().addClass("error");
            return false;
       }
       if(fatherhusband == ""){
           $("#fatherhusband").focus().addClass("error");
            return false;
       }
       if(dob_date == ""){
           $("#dob_date").focus().addClass("error");
            return false;
       }
       if(dob_month == ""){
           $("#dob_month").focus().addClass("error");
            return false;
       }
       if(dob_year == ""){
           $("#dob_year").focus().addClass("error");
            return false;
       }
       if(occupation == ""){
           $("#occupation").focus().addClass("error");
            return false;
       }
       if(nomnee_title == ""){
           $("#nomnee_title").focus().addClass("error");
            return false;
       }
       if(nomineename == ""){
           $("#nomineename").focus().addClass("error");
            return false;
       }
       if(relationwithnominee == ""){
           $("#relationwithnominee").focus().addClass("error");
            return false;
       }
       if(address == ""){
           $("#address").focus().addClass("error");
            return false;
       }
        
        if(district == ""){
           $("#district").focus().addClass("error");
            return false;
       }
        if(city == ""){
           $("#city").focus().addClass("error");
            return false;
       }
        if(pincode == ""){
           $("#pincode").focus().addClass("error");
            return false;
       }
        if(!pinReg.test(pincode)){
		$("#pincode").focus().addClass("error");
		return false;
	}
       if(pancard == ""){
           $("#pancard").focus().addClass("error");
            return false;
       }
       if(idproof == ""){
           $("#idproof").focus().addClass("error");
            return false;
       }
      
       
    }
    
</script>
         
         </div>
        
      </section>
      <!-- END PAGE-CONTENT -->
      <!-- FOOTER-AREA START -->
     <br><?php include 'includes/footer.php';?>
      <!-- FOOTER-AREA END -->
      <!-- jquery
         ============================================ -->		
      <script src="js/vendor/jquery-1.11.3.min.js"></script>
      <!-- bootstrap JS
         ============================================ -->		
      <script src="js/bootstrap.min.js"></script>
      <!-- wow JS
         ============================================ -->		
      
   </body>
</html>