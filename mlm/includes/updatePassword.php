   <!--/#support--><!--profile-->
         <div class="tab-pane" id="profile">
            <br>
            <ul class="nav nav-pills row text-center">
               <li class="col-sm-5 col-xs-12" id="profile-changep"><a href="panel.php?dash=profile" ><span class="glyphicon glyphicon-user"></span> Profile</a></li>
               <li class="col-sm-6 col-xs-12 active" id="changep-profile"><a href="javascript:void(0);"><span class="glyphicon glyphicon-search"></span> Change Password</a></li>
            </ul>
            <br>
            <div id="hide_profile">
               <h4>Change Your Password</h4>
              
            </div>
            <br>
      
               
              <script>
			  function chngpass(){
				  //alert("working..");
				  var old,pass,cpass;
				  old=$('#oldp').val();
				  pass=$('#newp').val();
				  cpass=$('#cnewp').val();
				  if(old == "" || pass == "" || cpass == ""){
					  alert("Please fill all field");
				  }else if(pass == cpass){
					  $("#chngpass").submit();
					  return true;
				  }
				  else{
					  alert("Password mismatch");
					  return false;
				  }
				  
			  }
			  </script>

            <div class="form-horizontal" role="form">
<form action="panel.php" id="chngpass"  method="post">              
			  <div class="form-group">
                  <label for="maritalstatus" class="col-sm-4 control-label">Current Password</label>
                  <div class="col-sm-7"><input type="password" class="form-control" id="oldp" name="oldp" required></div>
               </div>
               <div class="form-group">
                  <label for="address1" class="col-sm-4 control-label">New Password</label>
                  <div class="col-sm-7"><input type="password" class="form-control" id="newp" name="newp" required></div>
               </div>
               <div class="form-group">
                  <label for="username" class="col-sm-4 control-label">Confirm Password</label>
                  <div class="col-sm-7"><input type="password" class="form-control" id="cnewp" name="cnewp" required></div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-3"><a onclick="chngpass()" href="javascript:void(0);" class="btn btn-primary btn-feat">Change Password</a></div>
               </div>
            </form>
			</div>
         </div>
         <!--/#profile--><!--deals-->