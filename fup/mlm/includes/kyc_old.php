<!--<script src="js/validation.js"></script>
<link href="css/validation.css" rel="stylesheet" >
-->
<?php
    include_once 'includes/config.php';
    $conf = new config();
//print_r($_POST);

//$rs = $conf->insertValue($table, $column, $value)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/register.php';
    $get = finalregistration($column_r,$value_r,$bcolmn, $uid, $email,$name);//function to insert data for registration.

    //file upload
    
    
    
    if($get>0){
        bankdetails($bcolmn,$bvalue); //addming bank details.
    }
}

?>
<div class="container">
            <!--
               <div class="row">
                  <div class="col-md-12">
                     <ul class="page-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="account.html">Account</a></li>
                     </ul>
                  </div>
               </div>
            -->
                <form action="#" method="post" class="register" enctype="multipart/form-data" >
               <div class="row">
			   
                  <div class="col-md-12">
				  <div class="col-sm-4 col-xs-12 title-group gfont-1">
                     <div class="area-title" style="margin-top: 30px;">
                        <h3 class="">Complete Your Registration</h3>
                     </div>
					 </div>
					 <div class="col-sm-4 col-xs-12 " style="float: right;">
                                             <!--
                                    <div class="single-create ">
                                       <p>Sponsor Type <sup>*</sup></p>
                                       <select class="form-control" onchange="disp(this.value)" id="sponsorchannel" name="sponsorchannel" required="">
                                           <option>Select Sponsor Type</option>
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="0">  Advertisement  </option>
                                          <option value="1"> Enter Sponsor Link</option>
                                          
                                          <option value="0"> Others </option>
                                       </select>
                                    </div>-->
                                 </div>
                              </div>
				  
               </div><hr style="border-top: 3px solid #26ACCE;">
			   
               <div class="account-create">
                 
                     <div class="row">
                        <div class="col-md-12">
                           <div class="account-create-box">
                              <h2 class="box-info"><b>PERSONAL DETAILS</b> </h2>
                              <div class="row">
                                 <!--
                                 <div class="col-sm-4 col-xs-12">
                                     <div class="single-create" id="hidshow" style="display: none;">
                                     <div class="single-create" id="hidshow">
                                       <p>Enter Sponsir ID</p>
                                      <input class="form-control" type="text" name="link" id="" required="">
                                    </div>
                                 </div>
                              -->
							   <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Name <sup>*</sup></p>
                                       <input class="form-control" disabled="" type="text" name="" id="name " value="<?php $mod->header($_SESSION['myemail']) ?>" required="">
                                       <input class="form-control" type="hidden" name="name" id="name " value="<?php $mod->header($_SESSION['myemail']) ?>" required="">
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Mobile no<sup>*</sup></p>
                                       <input class="form-control" value="<?php $mod->mob($_SESSION['myemail']) ?>" type="text" name="" disabled="" id="mobileno " required="">
                                       <input class="form-control" value="<?php $mod->mob($_SESSION['myemail']) ?>" type="hidden" name="mobileno" id="mobileno " required="">
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Email Id<sup>*</sup></p>
                                       <input class="form-control" value="<?php $mod->email($_SESSION['myemail']) ?>" type="text" name="" disabled="" id="email" required="">
                                       <input class="form-control" value="<?php $mod->email($_SESSION['myemail']) ?>" type="hidden" name="email" id="email" required="">
                                       
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
                                             <select class="form-control" name="dob_date" id="date" required="">
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
                                             <select class="form-control" name="dob_month" id="month" required="">
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
                                             <select class="form-control" name="dob_year" id="year" required="">
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
                                             <select class="form-control" name="nomnee_title" id="date" required="">
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Miss</option>
                                               
                                             </select>
                                          </div>
                                          <div class="col-sm-8 col-xs-12">
                                              <input class="form-control" type="text" name="nomineename" id="nomineename " required="">
                                          </div>
                                         
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Relation with Nominee  <sup>*</sup></p>
                                       <input class="form-control" type="text" name="relationwithnominee" id="relationwithnominee  " required="">
                                    </div>
                                 </div>
                                 <div class="col-xs-4">
                                    <div class="single-create">
                                       <p>Address  <sup>*</sup></p>
                                       <input class="form-control" type="text" name="address" id="address " required="">
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
                              <a href="#" class="float-left"><span><i class="fa fa-angle-double-left"></i></span> Back</a>
                           </div>
                        </div>
                     </div>
                  
               </div></form>
            </div>

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
        //alert(arg);
        if(arg == 1){
            $('#hidshow').show();
        }else{
            $('#hidshow').hide();
        }
    }
    
</script>