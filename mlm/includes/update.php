<?php
error_reporting(0);
    include_once 'includes/config.php';
    $conf = new config();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
	// Update Basic details using (~) for extraction in function.
	
	$col="ufirstname,ulastname,ucontact";
	$val="'$fname'~,'$lname'~,'$phone'";
	
$conf->updateQuery("firstimeregd",$col,$val,"WHERE id=$uid");
//update details
$dob = $dob_year. "-" . $dob_month . "-" . $dob_date;

$dob=date_format(date_create($dob),"Y-m-d");
$pan=$_FILES['pancard']['name'];
    //$imgextndd = substr(strrchr($pan,'.'), 1);
    if($pan!='') {
        $savimgpan = time().$pan;
        $action2 = move_uploaded_file($_FILES['pancard']['tmp_name'],"upload/".$savimgpan);
		unlink("upload/".$opancard);
    }
	else{
		$savimgpan=$opancard;
	}
    //adharcard
    $adhar=$_FILES['adharcard']['name'];
    //$imgextndd = substr(strrchr($adhar,'.'), 1);
    if($adhar!='') {
        $savimgadhar = time().$adhar;
        $action3 = move_uploaded_file($_FILES['adharcard']['tmp_name'],"upload/".$savimgadhar);
		unlink("upload/".$oadharcard);
    }
	else{
		$savimgadhar=$oadharcard;
	}
    //voterid
    $voter=$_FILES['votercard_img']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($voter!='') {
        $savimgvoter = time().$voter;
        $action2 = move_uploaded_file($_FILES['votercard_img']['tmp_name'],"upload/".$savimgvoter);
		unlink("upload/".$ovotercard);
    }
	else{
		$savimgvoter=$ovotercard;
	}
	 //driving license
    $dl=$_FILES['drivilinglicense_img']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($dl!='') {
        $savimgdl = time().$dl;
        $action2 = move_uploaded_file($_FILES['drivilinglicense_img']['tmp_name'],"upload/".$savimgdl);
		unlink("upload/".$odl);
    }
	else{
		$savimgdl=$odl;
	}
	 //personal image
    $personalimg=$_FILES['pimage']['name'];
    //$imgextndd = substr(strrchr($voter,'.'), 1);
    if($personalimg!='') {
        $savimgpimage = time().$personalimg;
        $action2 = move_uploaded_file($_FILES['pimage']['tmp_name'],"upload/".$savimgpimage);
		unlink("upload/".$opimg);
    }
	else{
		$savimgpimage=$opimg;
	}
   
$column_r = "dob,father_husband,mother,occupation,nomine_title,nomniee,relation_nominee,address,state,
        district,city,pin,paddress,pstate,pdistrict,pcity,ppin,pan,idproof,photo,cancel_chk,pancard,adharcard,voterid,voterid_img,status,drivinglicense,drivinglicense_img,personal_image";

$value_r = "'$dob'~,'$fatherhusband'~,'$mother'~,'$occupation'~,
        '$nomnee_title'~,'$nomineename'~,'$relationwithnominee'~,'$address'~,'$state'~,'$district'~,
        '$area'~,'$pin'~,'$paddress'~,'$pstate'~,'$pdistrict'~,'$parea'~,'$ppin'~,'$pan_card'~,'$aadhar_card'~,'$savimgphoto'~,'$savimgcheck'~,'$savimgpan'~,'$savimgadhar'~,'$votercardno'~,'$savimgvoter'~,'0'~,'$dl_no'~,'$savimgdl'~,'$savimgpimage'";

 $conf->updateQuery("userdetails",$column_r,$value_r,"WHERE linkid=$uid");
// Update bankdetails
 $bcolmn = "accounttype,holder,bankname,accountnumber,branchaddress,ifsc,status";
 $bvalue = "'$account'~,'$accholdername'~,'$bankname'~,'$accnumber'~,'$branchaddress'~,'$ifsccode'~,'0'";
 $conf->updateQuery("bankdetails",$bcolmn,$bvalue,"WHERE uid=$uid");
 echo "<script>alert('Record updated');window.location='panel.php';</script>";
}
$firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
$udetail = $conf->fetchSingle("userdetails WHERE linkid = '".$firstinfo->id."'");
$bdetail = $conf->fetchSingle("bankdetails WHERE uid = '".$firstinfo->id."'");
?>
			<script>
function validateStep1(arg)
{
	var flag=0;
  var fields = ["fatherhusband","mother", "nomineename", "relationwithnominee", "paddress","parea", "pstate", "pdistrict","ppin","address","pin","state"]
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
                     <div class="col-sm-6" id="full-profile-details"><span class="glyphicon glyphicon-align-justify" ></span>Bank Details</div>
                  </div>
               </div>
            </div>
            <br><br><br>
            <form class="form-horizontal" id="kycfrm" name="kycfrm" action="#" role="form" method="post" enctype="multipart/form-data">
			 <div class="form-horizontal" id="profile_first" name="profile_first">
			 <!--<div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Sponsor Channel</label>
                  <div class="col-sm-9">
				  <select class="form-control"  id="sponsorchannel" name="sponsorchannel">
                       <option value="">Select Sponsor Type</option>
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="2">  Advertisement  </option>
                                                                                
                                          <option value="3"> Others </option>
						</select>
				  </div>                 
               </div>-->
               <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Full Name</label>
                  <div class="col-sm-4"><input type="text" placeholder="First Name" id="fname" class="form-control"  value="<?php echo $firstinfo->ufirstname; ?>" name="fname"></div>
                   <div class="col-sm-4"><input type="text" placeholder="Last Name" id="lname" class="form-control"  value="<?php echo $firstinfo->ulastname; ?>" name="lname"></div>				  
               </div>
			    
			   <div class="form-group">
                  <label for="fullname" class="col-sm-2 control-label">Mobile</label>
                  <div class="col-sm-9"><input type="text" readonly placeholder="Mobile"  class="form-control" value="<?php echo $firstinfo->ucontact; ?>" name="phone" id="mobileno" readonly></div>
               </div>
               <div class="form-group">
                  <label for="emailid" class="col-sm-2 control-label">Email-ID</label>
                  <div class="col-sm-9"><input type="text" placeholder="Email ID" id="email" class="form-control" disabled  value="<?php echo $firstinfo->uemail; ?>" name="email"></div>
                <input type="hidden" id="hidfield" value="<?php echo $firstinfo->uemail; ?>" name="email">
				<input type="hidden" id="hidfield" value="<?php echo $firstinfo->id; ?>" name="uid">
			   </div>
               <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Father/Husband</label>
                 <div class="col-sm-2"> 	  <select class="form-control">
            
                         
                    <option>S/O</option>
                           <option>D/O</option>
<option>W/O</option>                         
						</select> </div>
				 <div class="col-sm-7"><input type="text" value="<?php echo $udetail->father_husband; ?>" class="form-control" id="fatherhusband" name="fatherhusband" placeholder="Father Husband"  >
 <span class="tooltop_vald" id="fatherhusband_valid" >Please fill father/husband field.</span>				 
				 </div>
				 
               </div>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Mother</label>
				  <div class="col-sm-2"> 	  <select class="form-control">
                    <option>Ms</option>
                           <option>Mrs</option>
						</select> </div>
                  <div class="col-sm-7"><input type="text" value="<?php echo $udetail->mother; ?>" class="form-control" id="mother" name="mother">
<span class="tooltop_vald" id="mother_valid" >Please fill mother field.</span>				 
				 </div>
				  
               </div>
              <div class="form-group">
                  <label for="birthday" class="col-sm-2 control-label">Birthday</label>
                  <div class="col-sm-3">
				  <select class="form-control"  name="dob_date" id="dob_date">
                         <option>Date</option>
                                                 <?php
												 $dob = explode("-",$udetail->dob);
                                                 $range = range(1,31);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option ";
													 if($dob[2] == $r) echo "selected";
													 echo ">".$r."</option>";
                                                 }
                                                 ?>
                                                 
						</select>
				  </div>
 <div class="col-sm-3">
				  <select class="form-control"   name="dob_month" id="dob_month">
                                          <option value='1' <?php if($dob['1'] == '1') echo "selected";?>>January</option>
                                          <option value='2' <?php if($dob['1'] == '2') echo "selected";?>> February</option>
                                          <option value='3' <?php if($dob['1'] == '3') echo "selected";?>>March</option>
                                          <option value='4' <?php if($dob['1'] == '4') echo "selected";?>>April</option>
                                          <option value='5' <?php if($dob['1'] == '5') echo "selected";?>>May</option>
                                          <option value='6' <?php if($dob['1'] == '6') echo "selected";?>>June</option>
                                          <option value='7' <?php if($dob['1'] == '7') echo "selected";?>>July</option>
                                          <option value='8' <?php if($dob['1'] == '8') echo "selected";?>>August</option>
                                          <option value='9' <?php if($dob['1'] == '9') echo "selected";?>>September</option>
                                          <option value='10' <?php if($dob['1'] == '10') echo "selected";?>>October</option>
                                          <option value='11' <?php if($dob['1'] == '11') echo "selected";?>>November</option>
                                          <option value='12' <?php if($dob['1'] == '12') echo "selected";?>>December</option>
						</select>
				  </div>
 <div class="col-sm-3">
				  <select class="form-control"  name="dob_year" id="dob_year">
                                                                        <option>year</option>
                                                 <?php
                                                 $range = range(1998,1900);
                                                 foreach($range as $r)
                                                 {
                                                     echo "<option ";
													 if($dob[0] == $r) echo "selected";
													 echo ">".$r."</option>";
                                                 }
                                                 ?>
						</select>
				  </div>
				  <span class="tooltop_vald" id="dob_year_valid" >Please select D.O.B field.</span>
               </div>
			   
			    <div class="form-group">
                  <label for="address1" class="col-sm-2 control-label">Occupation</label>
                  <div class="col-sm-9">
                     <select class="form-control"  id="occupation" name="occupation">
                        <option <?php if($udetail->occupation == "Services") echo "selected"; ?>>Services</option>
                                          <option <?php if($udetail->occupation == "Business") echo "selected"; ?>>Business</option>
                                          <option <?php if($udetail->occupation == "Professional") echo "selected"; ?>> Professional</option>
                                          <option <?php if($udetail->occupation == "Retried") echo "selected"; ?>>Retried</option>
                                          <option <?php if($udetail->occupation == "Student") echo "selected"; ?>>Student</option>
                                          <option <?php if($udetail->occupation == "Housewife") echo "selected"; ?>>Housewife</option>
                                          <option <?php if($udetail->occupation == "Others") echo "selected"; ?>>Others</option>
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
                  <label for="username" class="col-sm-2 control-label">Nominee Name</label>
				  <div class="col-sm-2"> 	  <select class="form-control">
            
                         <option>Mr.</option>
                    <option>Mrs.</option>
                           <option>Ms.</option>

                                                
                                                 
						</select> </div>
                  <div class="col-sm-7"><input type="text" onkeypress='return FilterInput (event)' value="<?php echo $udetail->nomniee; ?>" class="form-control" id="nomineename" name="nomineename" placeholder="Nominee Name"  >
				 <span id="name-format" class="help">Please enter only text</span>
<span class="tooltop_vald" id="nomineename_valid" >Please fill nominee name field.</span>
				 </div>
				  
               </div>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Relation with Nominee</label>
                  <div class="col-sm-9"><input  onkeypress=' return FilterInput (event)' type="text" value="<?php echo $udetail->relation_nominee; ?>" class="form-control" id="relationwithnominee" name="relationwithnominee" placeholder="Relation with Nominee"  >
				  <span id="name-format" class="help">Please enter only text</span>
<span class="tooltop_vald" id="relationwithnominee_valid" >Please fill relation with nominee field.</span>
				  </div>
               </div>
			    <h4>Permanent Address</h4>
				<div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code<span class="required" style="color:red">*</span></label>
                  <div class="col-sm-9">
					  
					  <input type="number" class="form-control" value="<?php echo $udetail->ppin; ?>" onkeypress="return IsNumeric(event);" id="ppin" name="ppin" placeholder="Enter your pin code." 
					   maxlength="6">
					  <a href='javascript:void(0);' onclick='fillPermanentAdr();'>Verify Pin(click here to auto fill address)</a>
					  </div>
               </div>
				  
			   <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-9">
                     <select class="form-control"   id="pstate" onchange="showcity(this.value,'p');" name="pstate" >
                       <option value="">Select State</option>
                                           <?php 
                                          $rs = $conf->fetchall("state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option ";
											  if($udetail->pstate == $r->state) echo "selected";
											  echo ">".$r->state."</option>";
                                          }
                                          ?>
                                                    
                     </select>
					 <span class="tooltop_vald" id="pstate_valid" >Please select state field.</span>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District</label>
                  <div class="col-sm-9"> <select class="form-control" id="pdistrict" name="pdistrict" onchange="showArea(this.value,'p');" required="">
                                          <option><?=$udetail->pdistrict;?></option>
                                       </select>
									   <span class="tooltop_vald" id="pdistrict_valid" >Please select district field.</span>
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
                  <label for="city" class="col-sm-2 control-label">Area</label>
                  <div class="col-sm-9">
					  
					  <select class="form-control" name="parea" id="parea" onChange="changeFunction(this.value)">
					  <option><?=$udetail->pcity;?></option>
					  <option id="aother" value="other">Other</option>
					  </select>
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
 <span class="tooltop_vald" id="parea_valid">Please select area field.</span>
					  </div>
               </div>
			    <div class="form-group">
                  <label for="other" class="col-sm-2 control-label" id="labelf"></label>
                  <div class="col-sm-9" id="other1"></div>
                
			   </div>
			   <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Address </label>
                  <div class="col-sm-9"><input type="text" value="<?php echo $udetail->paddress; ?>" class="form-control" name="paddress" id="paddress" placeholder="Address" >
				  <span class="tooltop_vald" id="paddress_valid" >Please fill address field.</span>
				  </div>
               </div>
			 <!--  <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pin Code</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="ppin" value="<?php echo $udetail->ppin; ?>" name="ppin" placeholder="Enter your pin code." ></div>
               </div> -->
			    
			   
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
				  $('#adrHdnFld').append("<input type='hidden' name='state' value='"+$('#pstate').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' name='district' value='"+$('#pdistrict').val()+"'>");
				  $('#adrHdnFld').append("<input type='hidden' name='area' value='"+$('#parea').val()+"'>");
                  
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
					  <input type="number" value="<?php echo $udetail->pin; ?>" class="form-control dkycaddress" onkeypress="return IsNumeric(event);" id="pin" name="pin" placeholder="Enter your pin code." 
					   maxlength="6" ondrop="return false;" onpaste="return false;">
					  <a href='javascript:void(0);' onclick='fillDeliveryAdr();'>Verify Pin(click here to auto fill address)</a>
					  <span class="tooltop_vald" id="pin_valid" >Please fill pincode.</span>
					  </div>
             <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
			 </div>
			 
			   <div class="form-group">
                  <label for="select-retailer" class="col-sm-2 control-label">State</label>
                  <div class="col-sm-9">
                     <select class="form-control" onchange="showcity(this.value,'d');" id="state" name="state">
                       <option value="">Select State</option>
                                          <?php 
                                          $rs = $conf->fetchall("state_district GROUP BY state");
                                          foreach($rs as $r)
                                          {
                                              echo "<option ";
											  if($udetail->state == $r->state) echo "selected";
											  echo ">".$r->state."</option>";
                                          }
                                          ?>
                     </select>
					 <span class="tooltop_vald" id="state_valid" >Please select state.</span>
                  </div>
               </div>
			   <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">District</label>
                  <div class="col-sm-9"><select class="form-control" id="ddistrict" name="district" onchange="showArea(this.value,'d');" required="">
                                          <option><?=$udetail->district;?></option>
                                       </select>
									   <span class="tooltop_vald" id="ddistrict_valid" >Please select district.</span>
									   </div>
               </div>
			    <div class="form-group">
                  <label for="city" class="col-sm-2 control-label">Area</label>
                  <div class="col-sm-9">
					   <select class="form-control dkycaddress" name="area" id="darea" onChange="dchangeFunction(this.value)">
					  <option><?=$udetail->city;?></option>
					
					</select>
					<!--  <select class="form-control" name="area" id="darea">
					  <option><?=$udetail->city;?></option>
					  </select> -->
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
                  <label for="username" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-9"><input type="text" class="form-control dkycaddress" id="address" value="<?php echo $udetail->address; ?>" name="address" placeholder="Address" >
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
                  <label for="pincode" class="col-sm-2 control-label">Account Holder Name</label>
                  <div class="col-sm-9"><input type="text" readonly value="<?php echo $bdetail->holder; ?>" class="form-control" id="ac" name="accholdername" placeholder="Account Name" ></div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Account Number</label>
                  <div class="col-sm-9"><input type="text"  maxlength="16" value="<?php echo $bdetail->accountnumber; ?>" class="form-control" id="ac" name="accnumber" placeholder="Account Name">
				  <span id="error" style="color: Red; display: none">* Input digits (0 - 9)</span>
				  <span class="tooltop_vald" id="ac_valid" >Please fill account number.</span>
				  </div>
              
			  </div>
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Account Type</label>
                  <div class="col-sm-9">
                     <select class="form-control"  id="actype" name="account">
                        <option <?php if($bdetail->accounttype == "CURRENT  ACCOUNTS") echo "selected"; ?>>CURRENT  ACCOUNTS</option>
                        <option <?php if($bdetail->accountnumber == "SAVING BANK  ACCOUNTS") echo "selected"; ?>>SAVING BANK  ACCOUNTS</option>
                     </select>
 <span class="tooltop_vald" id="actype_valid" >Please select account type.</span>                       
				 </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">IFSC Code</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="ifsc" value="<?php echo $bdetail->ifsc; ?>" name="ifsccode" placeholder="IFSC Code" >
                  <a href='javascript:void(0);' onclick='verifyIFSC();'>Verify</a>
<span class="tooltop_vald" id="ifsc_valid" >Please fill ifsc code.</span>                   
				 </div>
               </div>
              <!-- <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-9">
                     <select class="form-control"   name="bankname">
                        <option <?php if($bdetail->bankname == "Allahabad Bank") echo "selected"; ?>>Allahabad Bank</option>
                        <option <?php if($bdetail->bankname == "Andhra Bank") echo "selected"; ?>>Andhra Bank</option>
						<option <?php if($bdetail->bankname == "Bank of Baroda") echo "selected"; ?>>Bank of Baroda</option>
						<option <?php if($bdetail->bankname == "Bank of India") echo "selected"; ?>>Bank of India</option>
						<option <?php if($bdetail->bankname == "Bank of Maharashtra") echo "selected"; ?>>Bank of Maharashtra</option>
						<option <?php if($bdetail->bankname == "Canara Bank") echo "selected"; ?>>Canara Bank</option>
						<option <?php if($bdetail->bankname == "Central Bank of India") echo "selected"; ?>>Central Bank of India</option>
						<option <?php if($bdetail->bankname == "City Union Bank") echo "selected"; ?>>City Union Bank</option>
						<option <?php if($bdetail->bankname == "Dhanlaxmi Bank") echo "selected"; ?>>Dhanlaxmi Bank</option>
						<option <?php if($bdetail->bankname == "Federal Bank") echo "selected"; ?>>Federal Bank</option>
						<option <?php if($bdetail->bankname == "HDFC Bank") echo "selected"; ?>>HDFC Bank</option>
						<option <?php if($bdetail->bankname == "ICICI Bank") echo "selected"; ?>>ICICI Bank</option>
						<option <?php if($bdetail->bankname == "IDBI Bank") echo "selected"; ?>>IDBI Bank</option>
						<option <?php if($bdetail->bankname == "IndusInd Bank") echo "selected"; ?>>IndusInd Bank</option>
						<option <?php if($bdetail->bankname == "Kotak Bank") echo "selected"; ?>>Kotak Bank</option>
						<option <?php if($bdetail->bankname == "State Bank of India") echo "selected"; ?>>State Bank of India</option>
						<option <?php if($bdetail->bankname == "Syndicate Bank") echo "selected"; ?>>Syndicate Bank</option>
                     </select>
                  </div>
               </div>-->
			   <div class="form-group">
                  <label for="maritalstatus" class="col-sm-2 control-label">Bank Name</label>
                  <div class="col-sm-9">
                   <input type="text" class="form-control" id="bankname" name="bankname" value="<?php echo $bdetail->bankname; ?>">
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
					  <input type="text" class="form-control" id="branchaddress" name="branchaddress" value="<?php echo $bdetail->branchaddress; ?>"></div>
 <span class="tooltop_vald" id="branchaddress_valid" >Please fill branch address.</span>               
			  </div>
			    <div class="form-group">
                  
                  <div class="col-sm-12">
					  <h4>Document Detail</h4></div>
               </div>
		
			  
			    <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Pan Card No.<span style="color:red;">*</span></label>
                  <div class="col-sm-9"> <input maxlength="10" class="form-control" type="text" onblur="this.value=this.value.toUpperCase()" value="<?php echo $udetail->pan; ?>" name="pan_card" id="pan_card" > 
                   <span class="tooltop_vald" id="pan_card_valid" >Please fill your pan card no.</span>
				  </div>
				  
				  <div>
				  
				  </div>
               </div>
			   <p>Any one ID is required.</p>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Aadhar Card No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" value="<?php echo $udetail->idproof; ?>" name="aadhar_card" id="aadhar_card" > 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Voter-ID Card No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" value="<?php echo $udetail->voterid; ?>" name="votercardno" id="aadhar_card" > 
                  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Driving License No.</label>
                  <div class="col-sm-9"> <input class="form-control" maxlength="12" type="text" value="<?php echo $udetail->drivinglicense; ?>" name="dl_no" id="aadhar_card" > 
                   <span class="tooltop_vald" id="aadhar_card_valid" >(Please fill any one ID number)</span>
				  </div>
               </div>
			   <p>Images only in jpg format.</p>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Pan Card</label>
                  <div class="col-sm-5"> <input type="file" name="pancard" multiple="" id="pancard" data-parsley-id="5075"> 
                  </div>
				  <div class="col-sm-3" id="details-image">
				  <a download href="upload/<?php echo $udetail->pancard; ?>">Get your PANCard</a>
				  <input type="hidden" name="opancard" value="<?php echo $udetail->pancard; ?>">
				  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Aadhar Card</label>
                  <div class="col-sm-5"> <input type="file" name="adharcard" multiple="" id="adharcard" data-parsley-id="5075"> 
                  </div>
				  <div class="col-sm-3" id="details-image">
				  <a download href="upload/<?php echo $udetail->adharcard; ?>">Get your Adhar Card</a>
				  <input type="hidden" name="oadharcard" value="<?php echo $udetail->adharcard; ?>">
				  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Voter-ID Card</label>
                  <div class="col-sm-5"> <input type="file" name="votercard_img" multiple="" id="votercard" data-parsley-id="5075"> 
                  </div>
				  <div class="col-sm-3" id="details-image">
				  <a download href="upload/<?php echo $udetail->voterid_img; ?>">Get your Voter ID</a>
				   <input type="hidden" name="ovotercard" value="<?php echo $udetail->votercard_img; ?>">
				  </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Driving License</label>
                  <div class="col-sm-5"> <input type="file" name="drivilinglicense_img" multiple="" id="drivilinglicense" data-parsley-id="5075"> 
                  </div>
				  <div class="col-sm-3" id="details-image">
				  <a download href="upload/<?php echo $udetail->drivinglicense_img; ?>">Get your Driving License</a>
					 <input type="hidden" name="odl" value="<?php echo $udetail->drivinglicense_img; ?>">
				 </div>
               </div>
			   <div class="form-group">
                  <label for="pincode" class="col-sm-2 control-label">Attach Profile Image</label>
                  <div class="col-sm-5"> <input type="file" name="pimage" multiple="" id="pimage" data-parsley-id="5075"> 
                  </div>
				  <div class="col-sm-3" id="details-image">
				  <a download href="upload/<?php echo $udetail->personal_image; ?>">Get your Profile Image</a>
					 <input type="hidden" name="opimg" value="<?php echo $udetail->personal_image; ?>">
				 </div>
				  </div>
                <div class="form-group">
				 <div class="col-sm-2"></div>
				 <div class="col-sm-9">
     <input type="checkbox" id='dec' name="check" value="true">  I hereby certify that I am atleast 18 years of age.<br>
<a href="#" style="float:left;"> Terms &amp; Condition</a>
</div>
                                                                    </div>
                 <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3"><a onclick="$('#basic-details').trigger('click');" class="btn btn-primary btn-feat tab-move1">Previous</a></div> 
 <div class="col-sm-offset-3 col-sm-3">
	 <a type="submit" class="btn btn-primary btn-feat tab-move1"  
	  onclick="validateForm();">Submit</a></div>
               </div>
             
            </form>
          <script>
   function validateForm(){
	   // pan validation
	   //alert("form sun=bmit");
	   var panReg = /^[A-Z]{5}\d{4}[A-Z]{1}$/;
	   var pan = $("#pan_card").val();
	   var aadhar = $("#aadhar_card").val();
	   if(!panReg.test(pan)){
		   document.getElementById("pan_card").style.borderColor="red";
		   return false;
	   }
	    document.getElementById("pan_card").style.borderColor="#ccc";
	   if(aadhar.length < 12){
		   document.getElementById("aadhar_card").style.borderColor="red";
		   return false;
	   }
	   document.getElementById("aadhar_card").style.borderColor="#ccc";
	   var a=$('#dec').is(':checked');
	   if(a==false){alert('You must agree to the Terms & Condition  first.');return false}
	   // submiting form
	   $("#kycfrm").submit();
	   //alert("done");
   }
   </script>
            
         </div>
         <!--/#profile-->
      </div>
   </div>
   </div>
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
        //$("#district").load("district.php?id="+arg);
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
		  //document.getElementById("ifsc_check").src = "hackanm.gif";
		 
		// alert("found1");
			}
			else{
			document.getElementById("ifsc").style.border= "red solid 2px";
			 document.getElementById("bankname").value="";
		   document.getElementById("branchaddress").value="";
			
			//alert("notfound1");
			}
			//alert(resp);
	      //  $("#friends-email").val("");
		}
	}
	
}
		</script>
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