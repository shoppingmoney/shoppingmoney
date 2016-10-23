<?php
    include_once 'includes/config.php';
    $conf = new config();
if($status==1){echo "<script>window.location='panel.php';</script>";}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	//print_r($_POST);
	$empref = $conf->single("employee WHERE emp_id='$link'",'id'); // Where link type employee or member
	if($empref > 0){
		$refid = 8;
		$conf->insertValue("employee_refrence", "emp_id,uid,date", "'$empref','$user_id',now()");
	}else{
		$refid = $conf->single("userdetails WHERE userid='$link'",'linkid');
	}
	if($refid > 0){
    include 'includes/register.php';
   $get = finalregistration($column_r,$value_r,$bcolmn, $uid, $user_id,$refid,$pin,$nameforid);//function to insert data for registration.

    //file upload
    
    if($get > 0){
		$bcolmn = "uid,accounttype,holder,bankname,other_bank_name,accountnumber,branchaddress,ifsc,status";
  $bvalue = "'$get','$account','$accholdername','$bankname','$other_bank_name','$accnumber','$branchaddress','$ifsccode','0'";
        bankdetails($bcolmn,$bvalue); //addming bank details.
		
    }
	}else{
		 echo "<script>alert('Invalid Referral Id');</script>";
	}
}
$firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
?>
<div class="row">
   <!--content-->
   <div class="col-sm-8">
      <!-- Tab panes -->
      <div class="tab-content">
        
       <!--profile-->
         <div class="tab-pane fade active in " id="profile">
            <br>
          
            <br>
            <div id="hide_profile">
               <h4>Your profile progress</h4>
               <p>Complete your profile in just two steps</p>
               <div class="col-sm-11 white-well profile-steps text-center">
                  <div class="row">
                     <div class="col-sm-6 border active-step" id="basic-details"><span class="glyphicon glyphicon-user"></span>Personal Details</div>
                      <div style="display:none;" class="col-sm-6" id="full-profile-details"><span class="glyphicon glyphicon-align-justify" ></span>Bank Details</div>
					 <div class="col-sm-6"><span class="glyphicon glyphicon-align-justify" ></span>Bank Details</div>
                  </div>
               </div>
            </div>
            <br><br><br>
            <form class="form-horizontal" id="kycfrm" name="kycfrm" action="#" role="form" enctype="multipart/form-data" method="post">
			 <div class="form-horizontal" id="profile_first" name="profile_first">
			 <script>
function validateStep1(arg)
{
	var flag=0;
  var fields = ["link","fatherhusband","mother", "nomineename", "relationwithnominee", "paddress","parea", "pstate", "pdistrict","ppin","address","pin"]
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.forms["kycfrm"][fieldname].value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  $("#"+fieldname+"_valid").css("display","block");
	  document.getElementById(fieldname).style.borderColor="red";
    }else{
		$("#"+fieldname+"_valid").css("display","none");
		document.getElementById(fieldname).style.borderColor="#ccc";
	}
  }
  if($("#dob_date").val()=="" || $("#dob_month").val()=="" || $("#dob_year").val()==""){
	  flag=1;
	  $("#dob_year_valid").css("display","block");
  }else{
	  $("#dob_year_valid").css("display","none");
  }
  var a=$('#diff').is(':checked');
  if(a){
	  if($("#hstate").val() == ""){
	  flag=1;
	  $("#state_valid").css("display","block");
  }else{
	  $("#state_valid").css("display","none");
  }
	    if($("#hdistrict").val() == ""){
	  flag=1;
	  $("#ddistrict_valid").css("display","block");
  }else{
	  $("#ddistrict_valid").css("display","none");
  }
  if($("#harea").val()==""){
	  flag=1;
	  $("#darea_valid").css("display","block");
  }else{
	  $("#darea_valid").css("display","none");
  }
  }else{
	  if($("#state").val() == ""){
	  flag=1;
	  $("#state_valid").css("display","block");
  }else{
	  $("#state_valid").css("display","none");
  }
  if($("#ddistrict").val() == ""){
	  flag=1;
	  $("#ddistrict_valid").css("display","block");
  }else{
	  $("#ddistrict_valid").css("display","none");
  }
  if($("#darea").val()==""){
	  flag=1;
	  $("#darea_valid").css("display","block");
  }else{
	  $("#darea_valid").css("display","none");
  }
}
  if(flag == 1){
	  return false;
  }else{
	  //alert("done");
 if(arg==1){
	$('#full-profile-details').trigger('click');
}else if(arg==2){
	$("#kycfrm").submit();
}
  }
  
}
</script>
			 <script>
function stype(id){
	if(id==1){
		$("#sponser").show();
		$("#link").val("");
	}else{
        $("#link").val("SM310716ED922");
        $("#sponser").hide();	
	}
}
</script>
                                          
           <?php if($firstinfo->refid == 0){?>
			 <div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Sponsor Channel</label>
                  <div class="col-sm-9">
				  <select class="form-control"  id="sponsorchannel" onchange="stype(this.value)" name="sponsorchannel">
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="2">  Advertisement  </option>
                                          <option value="3"> Others </option>
						</select>
				  </div>
    </div>
	 <div class="form-group" id="sponser">
                  <label for="fullname" class="col-sm-2 control-label">Sponsor ID</label>
                  <div class="col-sm-9"><input type="text" placeholder="Sponsor ID" value="" id="link" class="form-control"  name="link" required />
				  <span class="tooltop_vald" id="link_valid" >Please enter a valid sponser id.</span></div>
				 
               </div>
		   <?php }else{
			   $sponser = $conf->single("userdetails WHERE linkid='".$firstinfo->refid."'","userid");
			   ?>
		    <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Sponsor ID<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" placeholder="Sponsor ID" disabled  value="<?php echo $sponser?>" class="form-control"></div>
				 <input type="hidden" placeholder="Sponsor ID" id="link"   value="<?php echo $sponser?>" class="form-control"  name="link" required>
               </div>
		   <?php }?>
               <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Full Name<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" placeholder="Full Name" disabled id="name" class="form-control" 
                   value="<?php echo $firstinfo->utitle." ".$firstinfo->ufirstname." ".$firstinfo->ulastname; ?>" name="name"></div>
				 <input type="hidden" value="<?=$firstinfo->id;?>" class="form-control"  name="user_id">
				 <input type="hidden" value="<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname;?>" name="nameforid" />
               </div>
			    
			   <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Mobile<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" placeholder="Mobile"  class="form-control" disabled  value="<?php echo $firstinfo->ucontact; ?>" name="phone" id="mobileno "></div>
               </div>
               <div class="form-group">
                  <label for="emailid" class="col-sm-2 control-label">Email-ID<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" placeholder="Email ID" id="email" class="form-control" disabled  value="<?php echo $firstinfo->uemail; ?>" name="email"></div>
                <input type="text" id="hidfield" value="<?php echo $firstinfo->uemail; ?>" name="email">
			   </div>
               <div class="form-group">

                  <label for="username" class="col-sm-2 control-label">Father/Husband<span class="required" style="color:red">*</span></label>
<div class="col-sm-2"> 	  <select class="form-control">
            
                         
                    <option>S/O</option>
                           <option>D/O</option>
<option>W/O</option>                         
						</select> </div>
                  <div class="col-sm-7">
					  <input type="text" class="form-control" id="fatherhusband" 
					  onkeypress='return FilterInput (event)'
					  name="fatherhusband" placeholder="Name"  >
<span id="name-format" class="help">Please enter only text</span><span class="tooltop_vald" id="fatherhusband_valid" >Please fill father/husband field.</span>
				  </div>
               </div>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Mother<span class="required" style="color:red">*</span></label>
<div class="col-sm-2"> 	  <select class="form-control">
                    <option>Ms</option>
                           <option>Mrs</option>
						</select> </div>
                  <div class="col-sm-7">
					  <input type="text" class="form-control" id="mother" 
					  onkeypress='return FilterInput (event)'
					  name="mother" placeholder="Name"  >
<span id="name-format" class="help">Please enter only text</span>
<span class="tooltop_vald" id="mother_valid" >Please fill mother field.</span>
				  </div>
               </div>
              <div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Birthday<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-3">
				  <select class="form-control"  name="dob_date" id="dob_date" required>
                         <option value=''>Date</option>
                                                 <?php
                                                 $range = range(1,31);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>
						</select>
				  </div>
 <div class="col-sm-3">
				  <select class="form-control"   name="dob_month" id="dob_month" required>
                        <option value=''>Month</option>
                                          <option value='1'>January</option>
                                          <option value='2'> February</option>
                                          <option value='3'>March</option>
                                          <option value='4'>April</option>
                                          <option value='5'>May</option>
                                          <option value='6'>June</option>
                                          <option value='7'>July</option>
                                          <option value='8'> August</option>
                                          <option value='9'>September</option>
                                          <option value='10'>October</option>
                                          <option value='11'>November</option>
                                          <option value='12'>December</option>
                                                 <!--<?php
                                                 $range = range(1,12);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>-->
                                                
						</select>
				  </div>
 <div class="col-sm-3">
				  <select class="form-control"  name="dob_year" id="dob_year" required>
                                                                        <option value="">year</option>
                                                 <?php
                                                 $range = range(1998,1900);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option>".$r."</option>";
                                                 }
                                                 ?>
						</select>
<span class="tooltop_vald" id="dob_year_valid" >Please select D.O.B field.</span>
				  </div>
               </div>
			    <div class="form-group">
                  <label for="address1" class="col-sm-2 control-label">Occupation<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
                     <select class="form-control"  id="occupation" name="occupation">
                        <option>Services</option>
                                          <option>Business</option>
                                          <option> Professional</option>
                                          <option>Retried</option>
                                          <option>Student</option>
                                          <option>Housewife</option>
                                          <option>Others</option>
                     </select>
<span class="tooltop_vald" id="occupation_valid" >Please select occupation field.</span>
                  </div>
               </div>
			   <script type="text/javascript">
        
        
         function FilterInput(event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			//document.getElementById("error").style.display = ret ? "none" : "inline";
			
        }
    </script>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Nominee Name<span class="required" style="color:red">*</span></label>
<div class="col-sm-2"> 	  <select class="form-control">
            
                         <option>Mr.</option>
                    <option>Mrs.</option>
                           <option>Ms.</option>

                                                
                                                 
						</select> </div>
                  <div class="col-sm-7"><input type="text" class="form-control" id="nomineename"  
                  onkeypress='return FilterInput (event)'
                   name="nomineename" placeholder="Nominee Name"  >
<span id="name-format" class="help">Please enter only text</span>
<span class="tooltop_vald" id="nomineename_valid" >Please fill nominee name field.</span>
				  </div>
               </div>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Relation with Nominee<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  <input type="text" class="form-control"
					  onkeypress=' return FilterInput (event)'
					   id="relationwithnominee" name="relationwithnominee" placeholder="Relation with Nominee"  >
<span id="name-format" class="help">Please enter only text</span>
<span class="tooltop_vald" id="relationwithnominee_valid" >Please fill relation with nominee field.</span>
				  </div>
               </div>
			    <h4>Permanent Address</h4>
   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  
					  <input type="number" class="form-control" onkeypress="return IsNumeric(event);" id="ppin" name="ppin" placeholder="Enter your pin code." 
					   maxlength="6">
					  <a href='javascript:void(0);' onclick='fillPermanentAdr();'>Verify Pin(click here to auto fill address)</a><span class="tooltop_vald" id="ppin_valid" >Please fill pin code field.</span>
					  </div>
               </div>
			   
			    <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
                     <select class="form-control"   id="pstate" onchange="showcity(this.value,'p');" name="pstate" >
                       <option value="">Select State</option>
                                           <?php 
                                          $rs = $conf->fetchall("state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r->state."</option>";
                                          }
                                          ?>
                                                    
                     </select>
<span class="tooltop_vald" id="pstate_valid" >Please select state field.</span>
                  </div>
               </div>
			    <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"> <select class="form-control" id="pdistrict" name="pdistrict" onchange="showArea(this.value,'p');" required="">
                                          
                                       </select><span class="tooltop_vald" id="pdistrict_valid" >Please select district field.</span>
</div>
               </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#button").click(function(){
        $("p").toggle();
    });
});
</script>

			   <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">Area<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">



                             <select class="form-control" name="parea" id="parea" onChange="changeFunction(this.value)"><option value="" selected="" >
                                                   Select Area

                                                </option>
<option id="aother" value="other">Other</option></select>
  <span class="tooltop_vald" id="parea_valid">Please select area field.</span>
<script>
 function changeFunction(inputValue){
	 //var oth= document.getElementById("parea").value;
	// var oth= inputValue;
	 if (inputValue == "other"){
		  document.getElementById("labelf").innerHTML="Specify";
		 document.getElementById("other1").innerHTML="<input onchange='changeFunction(1)' type='text' placeholder='Specify..' id='other' class='form-control' 'name='other'>";
		 //document.getElementById("parea").setAttribute("name", "parea1");
	 }
	 if(inputValue==1){
		 var val = $("#other").val();
		 $('#parea').append($('<option>', {value:val, text:val}));
           $('#parea').val(val);
	 }
	 
 }
</script>




					  </div>

               </div>
			    <div class="form-group">
                  <label for="other" class="col-sm-2 control-label" id="labelf"></label>
                  <div class="col-sm-9" id="other1"></div>
                
			   </div>
			  
			     <div class="form-group">
                  
<label for="username" class="col-sm-2 control-label">Address<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  <input type="text" class="form-control" name="paddress" id="paddress" placeholder="Address" >
 <span class="tooltop_vald" id="paddress_valid" >Please fill address field.</span></div>
               </div>
			
			   <div class="form-group">
<label class="control-label col-md-6 col-sm-6 col-xs-12">Delivery Address Same As Permanent Address <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input class="" id="diff" name="diff" type="checkbox" value="1" onclick="copy()">
</div>
</div>
			
			
			       <script>
				
				            $(document).ready(function () {

	   
					      $("#paddress").change(function () {
							  if($('#diff').is(':checked'))
                    $('#ad2').val($('#paddress').val());
                });
                
                  $("#pcity").change(function () {
					   if($('#diff').is(':checked'))
                    $('#city').val($('#pcity').val());
                });
                
                  $("#pstate").change(function () {
					   if($('#diff').is(':checked'))
                    $('#state').val($('#pstate').val());
                });
                
                  $("#pdistrict").change(function () {
                    if($('#diff').is(':checked'))
                    {
                   $('#ddistrict').append($('<option>', {value:$('#pdistrict').val(), text:$('#pdistrict').val()}));
              
              $('#ddistrict').val($('#pdistrict').val());
		  }
		  
                });
                
                  $("#ppin").change(function () {
           if($('#diff').is(':checked'))
                    $('#pin').val($('#ppin').val());
                });
                
                
                
                
    $("#bankname").change(function () {
                   var a=$(this).val();
                   
                   if(a=="Other Bank")
                    document.getElementById("other_bank_name").style.display = 'block';
                    else
                    document.getElementById("other_bank_name").style.display = 'none';
                    
                });
                
                
});
                
                
            function copy() {
				
				var a=$('#diff').is(':checked');
				
				if(a) {
  
              $('#address').val($('#paddress').val());
              $('#state').val($('#pstate').val());
              $('#ddistrict').append($('<option>', {value:$('#pdistrict').val(), text:$('#pdistrict').val()}));
              $('#ddistrict').val($('#pdistrict').val());
			  $('#darea').append($('<option>', {value:$('#parea').val(), text:$('#parea').val()}));
              $('#darea').val($('#parea').val());
		
			  
              $('#pin').val($('#ppin').val());
              
                  $('.dkycaddress').attr('readonly',true);
				  $('#state').attr('disabled',true);
				  $('#ddistrict').attr('disabled',true);
				  $('#darea').attr('disabled',true);
				  $('#adrHdnFld').append("<input type='hidden' id='hstate' name='state' value='"+$('#pstate').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' id='hdistrict' name='district' value='"+$('#pdistrict').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' id='darea' name='area' value='"+$('#parea').val()+"'>");
                  
} else {
                  $('.dkycaddress').attr('readonly',false);
				  $('.dkycaddress').attr('disabled',false);
                  $('#adrHdnFld').html('');
}

                
                
            }
        </script>
        
           
			   
			     <h4>Delivery Address</h4>
				  <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("erphone").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
			   
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  <input type="number" class="form-control dkycaddress" onkeypress="return IsNumeric(event);" id="pin" name="pin" placeholder="Enter your pin code." 
					   maxlength="6" ondrop="return false;" onpaste="return false;">
					  <a href='javascript:void(0);' onclick='fillDeliveryAdr();'>Verify Pin(click here to auto fill address)</a> <span class="tooltop_vald" id="pin_valid" >Please fill pincode.</span>
					  </div>
             <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
			 </div>
			      <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
                     <select class="form-control dkycaddress" onchange="showcity(this.value,'d');" id="state" name="state">
                       <option value="">Select State</option>
                                           <?php 
                                          $rs = $conf->fetchall("state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option>".$r->state."</option>";
                                          }
                                          ?>
                     </select>
<span class="tooltop_vald" id="state_valid" >Please select state.</span>
                  </div>
               </div>
			     <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><select class="form-control dkycaddress" id="ddistrict" onchange="showArea(this.value,'d');" name="district" required="">
                                          <option value="">Select District</option>
                                       </select>
<span class="tooltop_vald" id="ddistrict_valid" >Please select district.</span>
</div>
               </div>
			
			 <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">Area<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  
					  <select class="form-control dkycaddress" name="area" id="darea" onChange="dchangeFunction(this.value)"><option value="" selected="">
                                                   Select Area

                                                </option>
					
					</select>
<span class="tooltop_vald" id="darea_valid" >Please select area.</span>

					  </div>
               </div>
			   <div class="form-group">
                  <label for="other" class="col-sm-2 control-label" id="dlabelf"></label>
                  <div class="col-sm-9" id="dother1"></div>
                
			   </div>
			   <script>
 function dchangeFunction(inputValue){
	 if (inputValue == "other"){
		  document.getElementById("dlabelf").innerHTML="Specify";
		 document.getElementById("dother1").innerHTML="<input onchange='dchangeFunction(1)' type='text' placeholder='Specify..' id='dother' class='form-control' 'name='other1'>";
		 //document.getElementById("darea").setAttribute("name", "darea1");
	 }
	 if(inputValue==1){
		 var val = $("#dother").val();
		 $('#darea').append($('<option>', {value:val, text:val}));
           $('#darea').val(val);
	 }
	 
 }
</script>
			     <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Address<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" class="form-control dkycaddress" id="address" name="address" placeholder="Address" required>
<span class="tooltop_vald" id="address_valid" >Please fill address field.</span>
</div>
               </div>
			   
			  
			    <div class="form-group">
  <div class="col-sm-offset-8 col-sm-3"><a onclick="validateStep1(2);"  class="btn btn-primary btn-feat tab-move1">Save</a>
               </div>
            </div>
			   <div class="form-group">
  <div class="col-sm-offset-8 col-sm-3"><a onclick="validateStep1(1);"  class="btn btn-primary btn-feat tab-move1">Next</a>
               </div>
            </div>
			</div>
			<div id='adrHdnFld'></div>
			
			
			<!----------------------------2nd----------------------------------------------------------------------->
            <div class="form-horizontal" id="profile_third" style="display:none;">
			<div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Account Holder Name<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  <input type="text" class="form-control" readonly   value="<?php echo $firstinfo->utitle." ".$firstinfo->ufirstname." ".$firstinfo->ulastname; ?>" name="accholdername" placeholder="Account Name" ></div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Account Number<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  <input type="text" class="form-control" id="ac" name="accnumber"
					   onkeypress="return IsNumeric(event);" maxlength="16"  placeholder="Account Number" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
  <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
  <span class="tooltop_vald" id="ac_valid" >Please fill account number.</span>
</div>
               </div>
			   
			   
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Account Type<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
                     <select class="form-control2"  id="actype" name="account">
                        <option value="CURRENT  ACCOUNTS" style="color:#555">CURRENT  ACCOUNTS</option>
						<option value="SAVING BANK  ACCOUNTS" style="color:#555">SAVING BANK  ACCOUNTS</option>
                     </select>

                         <span class="tooltop_vald" id="actype_valid" >Please select account type.</span>      

                  </div>
               </div>
			   
               	   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">IFSC Code<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="ifsc" name="ifsccode" placeholder="IFSC Code" >
                  <a href='javascript:void(0);' onclick='verifyIFSC();'>Verify(please fill your auto bank name )</a>
				  <span class="tooltop_vald" id="ifsc_valid" >Please fill ifsc code.</span>  
                  </div>
               </div>
               <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Bank Name<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="bankname"  name="bankname" placeholder="Branch Name" >
				   <span class="tooltop_vald" id="bankname_valid" >Please fill bank name.</span> 
                  </div>
               </div>
               
               <div class="form-group" style="display:none;"  id="other_bank_name">  
					<label class="control-label col-md-2 col-sm-2 col-xs-12" >Other Bank Name</label>
					<div class="col-md-9 col-sm-9 col-xs-12" >
					<input type="text"   name="other_bank_name"  class="form-control" >
					</div>
					</div>
			    <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Branch Address</label>
                  <div class="col-sm-9">
					  <input type="text" class="form-control" id="branchaddress"  name="branchaddress" placeholder="Branch Address">
					  <span class="tooltop_vald" id="branchaddress_valid" >Please fill branch address.</span> 
					  </div>
               </div>
			     <div class="form-group">
                  
                  <div class="col-sm-12">
					  <h4>Document Detail</h4><p></p></div>
               </div>
		
			  
			    <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pan Card No.<span style="color:red;">*</span></label>
                  <div class="col-sm-9"> <input maxlength="10" class="form-control" type="text" onblur="this.value=this.value.toUpperCase()" name="pan_card" id="pan_card" > 
                   <span class="tooltop_vald" id="pan_card_valid" >Please fill your pan card no.</span> </div>
               </div>
			   <p>Any one ID is required.</p>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Aadhar Card No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" name="aadhar_card" id="aadhar_card" > 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Voter-ID Card No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" name="votercardno" id="votercardno" > 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Driving License No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" name="dl_no" id="dl_no" > 
                  <span class="tooltop_vald" id="aadhar_card_valid" >(Please fill any one ID number)</span> </div>
               </div>
			   <p>Images only in jpg format.</p>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Pan Card</label>
                  <div class="col-sm-9"> <input type="file" name="pancard" multiple="" id="pancard" data-parsley-id="5075"> 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Aadhar Card</label>
                  <div class="col-sm-9"> <input type="file" name="adharcard" multiple="" id="adharcard" data-parsley-id="5075"> 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Voter-ID Card</label>
                  <div class="col-sm-9"> <input type="file" name="votercard_img" multiple="" id="votercard" data-parsley-id="5075"> 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Driving License</label>
                  <div class="col-sm-9"> <input type="file" name="drivilinglicense_img" multiple="" id="drivilinglicense" data-parsley-id="5075"> 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Personal Image</label>
                  <div class="col-sm-9"> <input type="file" name="pimage" multiple="" id="pimage" data-parsley-id="5075"> 
                  </div>
               </div>
             <div class="form-group">
				 <div class="col-sm-2"></div>
				 <div class="col-sm-9">
     <input type="checkbox" id='dec' name="check" value="true">  I hereby certify that I am atleast 18 years of age.<br>
<a href="../terms.php" style="float:left;"> Terms &amp; Condition</a>
</div>
                                                                    </div>
                 <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
					  <a onclick="$('#basic-details').trigger('click');" class="btn btn-primary btn-feat tab-move1">Previous</a></div> 
 <div class="col-sm-offset-3 col-sm-3">
	 
	 <a type="submit" class="btn btn-primary btn-feat tab-move1"  
	  onclick="validateForm();">Submit</a></div>
	 
	         </div>
              </div>
            </form>
               
             
            
         </div>
         <!--/#profile-->
      </div>
   </div>
   <script>
   function validateForm(){
	   // pan validation
	   //alert("form sun=bmit");
	   var panReg = /^[A-Z]{5}\d{4}[A-Z]{1}$/;
	   var pan = $("#pan_card").val();
	   var aadhar = $("#aadhar_card").val().trim();
	   var voter = $("#votercardno").val().trim();
	   var dl = $("#dl_no").val().trim();
	   var account = $("#ac").val();
	   var ifsc = $("#ifsc").val();
	   var bank = $("#bankname").val();
	   
	   if(account.trim() == ""){
		   document.getElementById("ac").style.borderColor="red";
		   $("#ac_valid").css("display","block");
		   return false;
	   }
	   $("#ac_valid").css("display","none");
	   document.getElementById("ac").style.borderColor="#ccc";
	    if(ifsc.trim() == ""){
		   document.getElementById("ifsc").style.borderColor="red";
		   $("#ifsc_valid").css("display","block");
		   return false;
	   }
	   $("#ifsc_valid").css("display","none");
	   document.getElementById("ifsc").style.borderColor="#ccc";
	   if(bank.trim() == ""){
		   document.getElementById("bankname").style.borderColor="red";
		   $("#bankname_valid").css("display","block");
		   return false;
	   }
	   document.getElementById("ac").style.borderColor="#ccc";
	   $("#bankname_valid").css("display","none");
	   if(!panReg.test(pan)){
		   document.getElementById("pan_card").style.borderColor="red";
		   $("#pan_card_valid").css("display","block");
		   return false;
	   }
	   $("#pan_card_valid").css("display","none");
	    document.getElementById("pan_card").style.borderColor="#ccc";
	   if(aadhar=="" && voter == "" && dl == ""){
		   $("#aadhar_card_valid").css("display","block");
		   return false;
	   }
	   $("#aadhar_card_valid").css("display","none");
	   var a=$('#dec').is(':checked');
	   if(a==false){alert('You must agree to the Terms & Condition  first.');return false}
	   // submiting form
	   $("#kycfrm").submit();
	   //alert("done");
   }
   </script>
   <!--/.content--><!--sidebar-->
   <div class="col-sm-4 hidden-xs">
      <div class="row">
         <div class="col-sm-12">
            <h3 class="headline hl-lblue">Important Notice</h3>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <p>
               <marquee scrolldelay="100"> Cashback is NOT guaranteed. Using a Coupon, Gift Voucher, Gift Card, Gift Certificate or Store Credit may void your cashback.</marquee>
            </p>
            <div id="sliderw">
               <ul>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
               </ul>
            </div>
            <a href="/terms-conditions">Read all terms and conditions</a>
         </div>
      </div>
   </div>
   <!--/.sidebar-->
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
<script>
function showcity(arg,tp)
    {
       // alert(tp);
		var target="#"+tp+"district";
        //$("#district").load("district.php?id="+arg);
        $.ajax({
        type: "GET",
        url: 'district.php',
        data: "id=" + arg,
        dataType: "html",
        success: function(html){ $(target).html(html);
        }

        });
    }
	function showArea(arg,tp)
    {
       // alert(tp);
		var target="#"+tp+"area";
        $.ajax({
        type: "GET",
        url: 'area.php',
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
	
	
    var url = "ajaxpage/verifyifsc.php?ifsc="+ifsc;
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
		   document.getElementById("branchaddress").value=res[2];
			}
			else{
			document.getElementById("ifsc").style.border= "red solid 2px";
			 document.getElementById("bankname").value="";
		   document.getElementById("branchaddress").value="";
			}
		}
	}
	
}
		</script>
<!--  to auto fill address  -->
 <script>
		function fillPermanentAdr()
     {     
	var request = checkAjax();
    var pin = $("#ppin").val();
	
	
    var url = "ajaxpage/filladdress.php?pin="+pin;
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
		 { document.getElementById("ppin").style.border= "green solid 2px";
              $('#pstate').val(res[1]);
              $('#pdistrict').append($('<option>', {value:res[2], text:res[2]}));
              $('#pdistrict').val(res[2]);
			  // splitting area
			  $('#parea').empty();
			  var ar = res[3].split("~");
			  var ln = ar.length;
			  var i = 0;
			  for(i=0;i<ln;i++){
			  $('#parea').append($('<option>', {value:ar[i], text:ar[i]}));
			  }
			  $('#parea').append($('<option>', {value:'other', text:'Other'}));
              //$('#parea').val(res[3]);
			}
			else{
			document.getElementById("ppin").style.border= "red solid 2px";
			}
		}
	}
	
}
function fillDeliveryAdr()
     {     
	var request = checkAjax();
    var pin = $("#pin").val();
	
	
    var url = "ajaxpage/filladdress.php?pin="+pin;
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
		 { document.getElementById("pin").style.border= "green solid 2px";
              $('#state').val(res[1]);
              $('#ddistrict').append($('<option>', {value:res[2], text:res[2]}));
              $('#ddistrict').val(res[2]);
			  // splitting area
			  $('#darea').empty();
			  var ar = res[3].split("~");
			  var ln = ar.length;
			  var i = 0;
			  for(i=0;i<ln;i++){
			  $('#darea').append($('<option>', {value:ar[i], text:ar[i]}));
			  }
			  $('#darea').append($('<option>', {value:'other', text:'Other'}));
              //$('#parea').val(res[3]);
			}
			else{
			document.getElementById("pin").style.border= "red solid 2px";
			}
		}
	}
	
}
		</script>

<style>
   /**** slider ****/
   #sliderw, ul
   {
   }
   #sliderw
   {
   margin: auto;
   overflow: hidden;
   padding: 20px;
   border: 1px solid rgba(0, 0, 0, 0.15);
   margin-top: 50px;
   border-radius: 10px;
   position: relative;
   width: 380px;
   height: 300px;
   background:#fff;
   }
   #sliderw li
   {
   float: left;
   position: relative;
   width: 578px;
   margin-left:-37px;
   display: inline-block;
   }
   #sliderw ul
   {
   list-style: none;
   position: absolute;
   left: 0px;
   top: 0px;
   width: 9000px;
   transition: left .3s linear;
   -moz-transition: left .3s linear;
   -o-transition: left .3s linear;
   -webkit-transition: left .3s linear;
   margin-left: -25px;
   font-family: century gothic;
   color: #666;
   }
   /*** Content ***/
   .sliderw-containerw
   {
   margin: 66px auto;
   padding: 0;
   width: 297px;
   border-bottom: 1px solid #ccc;
   }
   .sliderw-containerw h4
   {
   color: #0A7FAD;
   text-shadow: -1px 0px 0px rgba(0, 0, 0, 0.50);
   }
   .sliderw-containerw  p
   {
   margin: 10px 25px;
   font-weight: semi-bold;
   text-align: justify;
   }
   /*** target hooks ****/
   @-webkit-keyframes slide-animation {
   0% {left:0px; opacity:0;}
   2% {left:0px; opacity:1;}
   20% {left:0px; opacity:1;}
   22.5% {opacity:0.6;}
   25% {left:-550px; opacity:1;}
   45% {left:-550px; opacity:1;}
   47.5% {opacity:0.6;}
   50% {left:-1100px; opacity:1;}
   70% {left:-1100px; opacity:1;}
   100% {left:0px; opacity:0;}
   75% {left:-1650px; opacity:1;}
   95% {opacity:1;}
   98% {left:-1650px; opacity:0;} 
   100% {left:0px; opacity:0;}
   }
   #sliderw ul
   {
   -webkit-animation: slide-animation 25s infinite;
   }
   /* use to paused the content on mouse over */
   #sliderw ul:hover
   {
   -moz-animation-play-state: paused;
   -webkit-animation-play-state: paused;
   }
   
   #hidfield{
	   display:none;
   }
</style>
