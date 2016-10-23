   <!--/#support--><!--profile-->
         <div class="tab-pane" id="profile">
            <br>
            <ul class="nav nav-pills row text-center">
               <li class="col-sm-5 col-xs-12 active" id="profile-changep"><a href="javascript:void(0);" ><span class="glyphicon glyphicon-user"></span> Profile</a></li>
               <li class="col-sm-6 col-xs-12" id="changep-profile"><a href="panel.php?dash=password"><span class="glyphicon glyphicon-search"></span> Change Password</a></li>
            </ul>
            <br>
            <div id="hide_profile">
               <h4>Your profile progress</h4>
               <p>Complete your profile in just two steps</p>
               <div class="col-sm-11 white-well profile-steps text-center">
                  <div class="row">
                     <div class="col-sm-6 border active-step" id="basic-details"><span class="glyphicon glyphicon-user"></span>Personal Details</div>
                     <div class="col-sm-6" id="full-profile-details"><span class="glyphicon glyphicon-align-justify" ></span>Bank Details</div>
                  </div>
               </div>
            </div>
            <br><br><br>

<style>
.contshow{color: #939393;
    font-weight: 500;
    font-size: 14px;
    line-height: 28px;}

#profdisplay{background: aliceblue;
    border: 1px solid #DBE9F5;
    border-radius: 3px;
    height:35px;

}
</style>
            <form class="form-horizontal" action="#" role="form" method="post" id="profile_first" name="profile_first" style="background:#fff;border: 1px solid #e7e7e7;">
			 <div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Sponsor Channel</label>
                  <div class="col-sm-9" id="profdisplay">
				  <label class="contshow">Enter Sponsor Id</label>

				  </div>

                                          
               </div>
               <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Full Name</label>

                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></label></div>
				  
               </div>
			    
			   <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $firstinfo->ucontact; ?></label></div>
               </div>
               <div class="form-group">
                  <label for="emailid" class="col-sm-2 control-label">Email-ID</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $firstinfo->uemail; ?></label></div>
                  <!--<a href="javascript:void(0);" id="sendverimail" style="color:red;font-weight:bold;margin-top:">Verify Email</a>-->
               </div>
               <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Father/Husband</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo (!empty($udetail)) ?$udetail->father_husband : "Not Available"; ?></label>
				  </div>
               </div>
			    <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">mother</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo (!empty($udetail)) ? $udetail->father_husband : "Not Available"; ?></label>
				  </div>
               </div>
              <div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                  <div class="col-sm-9" id="profdisplay">
				 <label class="contshow"><?php echo (!empty($udetail)) ? $udetail->dob  : "Not Available"; ?></label>
  
				  </div>
 <div class="col-sm-3" >
				  
				  </div>
 <div class="col-sm-3">
				  
				  </div>
               </div>
			    <div class="form-group">
                  <label for="address1" class="col-sm-2 control-label">Occupation</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo  (!empty($udetail)) ? $udetail->occupation : "Not Available";?></label>
                  </div>
               </div>
			    <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Nominee Name</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow" id="nomnee_title"><?php echo  (!empty($udetail)) ? $udetail->nomniee : "Not Available"; ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Relation with Nominee</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow" id="nomnee_title"><?php  echo (!empty($udetail)) ?$udetail->nomniee : "Not Available"; ?></label></div>
               </div>
			    <h4 style="padding-left:10px;">Permanent Address</h4>
				 <!-- <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Address </label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo (!empty($udetail)) ? $udetail->paddress   : "Not Available";  ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-9" id="profdisplay">
                    <label class="contshow"><?php echo $udetail->pstate; ?></label>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $udetail->pdistrict; ?></label></div>
               </div>
			     <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">City</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $udetail->pcity; ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $udetail->ppin; ?></label></div>
               </div>-->
			    <div class="form-group">
				<label for="username" class="col-sm-2 control-label">Address </label>
				 <div class="col-sm-9" id="profdisplay"><label class="contshow">
			   <label class="contshow">
			   
			   <?php 
			   
			   if(!empty($udetail)){
				   $address = array($udetail->paddress , $udetail->pcity, $udetail->pdistrict, $udetail->pstate, $udetail->ppin );
			   }
			   else{
				   $address = "Not Available";
			   }
			   echo $address;
			   ?>

</label>
</div>
</div>
			   
			   
			   
			   
			     <h4 style="padding-left:10px;">Delivery Address</h4>
				  <!--<div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo  (!empty($udetail)) ? $udetail->address   : "Not Available"; ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo $udetail->state; ?></label>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo $udetail->district; ?></label></div>
               </div>
			     <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">City</label>
                  <div class="col-sm-9"><label class="contshow" id="dcity"><?php echo $udetail->city; ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow" id="dpin"><?php echo $udetail->pin; ?></label></div>
               </div>-->
			    <div class="form-group">
				<label for="username" class="col-sm-2 control-label">Address </label>
				 <div class="col-sm-9" id="profdisplay"><label class="contshow">
			   <label class="contshow">
			   <?php 
			   
			   if(!empty($udetail)){
				   $address = array($udetail->address , $udetail->city, $udetail->district, $udetail->state, $udetail->pin );
			   }
			   else{
				   $address = "Not Available";
			   }
			   echo $address;
			   ?>

</label>
</div>
</div>
			  
			   <div class="form-group">
  <div class="col-sm-offset-8 col-sm-3"><a onclick="$('#full-profile-details').trigger('click');"  class="btn btn-primary btn-feat tab-move1">Next</a>
               </div>
            </div>
            </form>
          
			
			
			
			<!----------------------------2nd----------------------------------------------------------------------->
            <form class="form-horizontal" role="form" method="post" id="profile_third" style="display:none;background: rgb(255, 255, 255);border: 1px solid rgb(231, 231, 231);">
			<div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Account Name</label>
                  <div class="col-sm-9"  id="profdisplay"><label class="contshow"><?php echo(!empty($udetail)) ? $bdetail->holder : "Account Name Not Available"; ?></label></div>
               </div>
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Account Number</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo (!empty($udetail)) ? $bdetail->accountnumber : "Account Number Not Available"; ?></label>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Account Type</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo  (!empty($udetail)) ? $bdetail->accounttype : "Account Type Not Available"; ?></label>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">IFSC Code</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow"><?php echo  (!empty($udetail)) ? $bdetail->ifsc  : "IFSC Code Not Available"; ?></label></div>
               </div>
               <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo   (!empty($udetail)) ? $bdetail->bankname : "Bank Name Not Available"; ?></label>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Branch Address</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo  (!empty($udetail)) ? $bdetail->branchaddress : "Branch Address Not Available";  ?></label>
                  </div>
               </div>
               <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Pan Card No.</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo (!empty($udetail)) ? $udetail->pan  : "Pan Card No Not Available";  ?></label>
                  </div>
               </div>
			   
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Aadhar Card No.</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo  (!empty($udetail)) ? $udetail->idproof  : "Aadhar Card No. Not Available";?></label>
                  </div>
               </div>
			   
				
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Voter-ID Card No.</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo (!empty($udetail)) ? $udetail->voterid    : "Voter-ID Card No. Not Available"; ?></label>
                  </div>
               </div>
			    
					
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Driving License No.</label>
                  <div class="col-sm-9" id="profdisplay">
                     <label class="contshow"><?php echo (!empty($udetail)) ? $udetail->drivinglicense    : "Driving License No Not Available"; ?></label>
                  </div>
               </div>
			    
				
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Pan Card</label>
                  <div class="col-sm-9" id="profdisplay">
				 
                     <label class="contshow"><img src="upload/<?php echo (!empty($udetail)) ? $udetail->pancard   : "Pan Card Not Available"; ?>" width="120"></label>
				 
				  
                  </div>
               </div>
			  
			   
			    <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Aadhar Card</label>
                  <div class="col-sm-9" id="profdisplay">
				  
                     <label class="contshow"><img src="upload/<?php echo (!empty($udetail)) ? $udetail->adharcard   : "Aadhar Card Not Available"; ?>" width="120"></label>
					 
                  </div>
               </div>
			  
			   
			    <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Voter-ID Card</label>
                  <div class="col-sm-9" id="profdisplay">
				  
                     <label class="contshow"><img src="upload/<?php echo (!empty($udetail)) ? $udetail->voterid_img   : "Voter-ID Card Not Available";?>" width="120"></label>
					  
                  </div>
               </div>
			   
			    
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Driving License</label>
                  <div class="col-sm-9" id="profdisplay">
				  
                     <label class="contshow"><img src="upload/<?php echo  (!empty($udetail)) ? $udetail->drivinglicense_img   : "Driving License Not Available"; ?>" width="120"></label>
					 
                  </div>
               </div>
			    
				 
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Personal Image</label>
                  <div class="col-sm-9" id="profdisplay">
				  
                     <label class="contshow"><img src="upload/<?php echo  (!empty($udetail)) ? $udetail->personal_image  : "Personal Image Not Available";  ?>" width="120"></label>
				
                  </div>
               </div>
			   	 
			   
			   
			   
             
             
              <!-- <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">PAN Card</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow">00000000</label></div>
               </div>
			    <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">Id Proof</label>
                  <div class="col-sm-9" id="profdisplay"><label class="contshow">Id Proof</label></div>
               </div> -->
			   
			   
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3"><a onclick="$('#basic-details').trigger('click');" class="btn btn-primary btn-feat tab-move1">Previous</a></div> 
 <div class="col-sm-offset-3 col-sm-3"><a href="panel.php?page=update" class="btn btn-primary btn-feat tab-move1">Update</a></div>
               </div>
              
            </form>
               
            
         </div>
         <!--/#profile--><!--deals-->