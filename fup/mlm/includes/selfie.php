<?php
date_default_timezone_set('Asia/Calcutta'); 
 include_once 'includes/config.php';
         $conf = new config();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']))
{
	// print_r($_REQUEST);
 $qw=$_SESSION['myemail'];
@extract($_POST);
  $image=$_FILES['image']['name'];
    
    if($image!='') {
        $savimgimage = time().$image;
        $action3 = move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$savimgimage);
    }
 $conf->insertValue("selfie", "user_email,image,description,size,date,status", "'$qw','$savimgimage','$description','$imgsize',NOW(),'0'");	
 
  echo"<script>alert('image uploaded!');</script>";
header('Location:panel.php?dash=selfie');
}
?>
<style>
.title-group-3 {
    font-size: 27px;
    margin: 30px 0 5px;
}

.sz{font-size:14px;margin-top: 45px;}
.sz2{font-size:13px;font-weight:500;position: relative;top: -3px;left: 5px;}

.sbtbtn {
    float: right;
    width: 98%;
    
    margin-top: 49px;
}

.title14 {
    padding: 12px 6px;
    text-align: center;
    background: #26acce;
    color: #fff;
    font-weight: 600;
}
</style>


 <!--support-->


<script type="text/javascript" src="js/dropzone.js"></script>
         <div class="tab-pane fade active in" id="selfie">
<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, selfie wall helps you share your views on every product . You can represent your purchase on smarter

way and help your friend to choose a right product.


		</p>
           <div class="panel-group" id="accordion">
										<!-- Start 1 Checkout-options -->
								<form role="form" method="post" name="form" enctype="multipart/form-data">
										<div class="panel panel_default" style="margin-top:20px;">
											<div>
												<h4 class="title14">
													<span>Selfie Wall Upload Your Image </span>
												</h4>
											</div>
											<div id="checkout-options" class="collapse in">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-12">
															<div class="checkout-collapse">
															
																<div class="col-md-12">
																
																
 
 
 <h3 class="title-group-3 gfont-1">Description</h3>
																<textarea rows="4" name="description" maxlength="150" cols="105" style="border: 1px solid #26acce;font-size:12px;color: #232323;font-weight: 500;padding:5px;" placeholder=""required/></textarea>

																</div>
																<div class="col-md-12">
																
																
 <div class="col-md-6">
 

				<input type="file" name="image" class="sz" required/><br>
				
 
  <input type="radio" name="imgsize" value="bigimg" checked><span class="sz">Image Size (410px x 214px)</span><br>
  <input type="radio" name="imgsize" value="smallimg"><span class="sz">Image Size (214px x 214px)</span><br>
				</div>
				
				<div class="col-md-6">
				 <div class="sbtbtn">
																	<label>
		<input type="submit" class="btn btn-primary" name="submit" value="Submit">
																	</label>
																</div>
</div>
																</div>
																

																
															</div>
														</div>
														
													</div>
												</div>
											</div>
										</div>
										</form>
										</div>
										<!-- End Checkout-options -->
										
										
										
										
										
										
										
									</div>
        
         <!--/#support-->
         <!--/#support-->