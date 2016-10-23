<!--<script src="js/validation.js"></script>
<link href="css/validation.css" rel="stylesheet" >
-->
<?php
    include_once 'includes/config.php';
    $conf = new config();
print_r($_POST);

//$rs = $conf->insertValue($table, $column, $value)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/register.php';
    //$get = finalregistration($column_r,$value_r,$bcolmn, $uid, $email);//function to insert data for registration.

    //file upload
    
    registerme($column,$value,$email,$linkid);//function to insert data for registration.
    
  
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
                        <h3 class="">Introduce Downliner</h3>
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
                              
                                <div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>User Id <sup>*</sup></p>
                                       <input class="form-control" type="text" disabled="" name="name" id="uid " value="<?php echo $myuserid; ?>" required="">
                                       <input class="form-control" type="hidden"  name="linkid" id="uid " value="<?php echo $mod->getid($_SESSION['myemail']) ?>" required="">
                                    </div>
                                 </div>
                              
                              
							   <div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>Name <sup>*</sup></p>
                                       <input class="form-control" disabled="" type="text" name="name" id="name " value="<?php $mod->header($_SESSION['myemail']) ?>" required="">
                                    </div>
                                 </div>
								  <div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>Mobile no<sup>*</sup></p>
                                       <input class="form-control" disabled="" value="<?php $mod->mob($_SESSION['myemail']) ?>" type="text" name="mobileno" id="mobileno " required="">
                                    </div>
                                 </div>
								  <div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>Email Id<sup>*</sup></p>
                                       <input class="form-control" disabled="" value="<?php $mod->email($_SESSION['myemail']) ?>" type="text" name="email" id="email" required="">
                                       
                                    </div>
                                 </div>
                              
                              
                                </div>
                           </div>
                           
                            
                            <div class="account-create-box">
                              <h2 class="box-info"><b>DOWNLINER'S DETAILS</b> </h2>
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
                              
                                <div class="col-sm-1 col-xs-12">
                                    <div class="single-create">
                                       <p>Title <sup>*</sup></p>
                                        <select class="form-control"  id="sponsorchannel" name="title" required="">
                                           <option>Mr.</option>
                                           <option> Miss </option>
                                          <option>MRS</option>
                                          
                                       </select>
                                    </div>
                                 </div>
                              
                              
				<div class="col-sm-3 col-xs-12">
                                    <div class="single-create">
                                       <p>First Name <sup>*</sup></p>
                                       <input class="form-control" type="text" name="name" id="firstname "  required="">
                                    </div>
                                 </div>
                              <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Last Name <sup>*</sup></p>
                                       <input class="form-control" type="text" name="lastname" id="lastname " required="">
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Mobile no<sup>*</sup></p>
                                       <input class="form-control"  type="text" name="phone" id="mobileno " required="">
                                    </div>
                                 </div>
								  <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Email Id<sup>*</sup></p>
                                       <input class="form-control"  type="email" name="email" id="email" required="">
                                       
                                    </div>
                                 </div>
                              <div class="col-sm-4 col-xs-12">
                                    <div class="single-create">
                                       <p>Password <sup>*</sup></p>
                                       <input class="form-control" type="password" name="password" id="firstname "  required="">
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