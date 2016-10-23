<style>
#loginpp{overflow: scroll;
    padding: 13px;
    height: 477px;}

.buybulk{width:80px;height:30px;padding;10px;background:red;}
</style>		
		
		<!-- FOOTER-AREA START -->
		<footer class="footer-area">
			<!-- Footer Start -->
			<div class="footer">
				<div class="container">
					<div class="row">
					
					
					
					
					
					         <div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Policy information</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="policy.php">Privacy Policy</a></li>
									<li><a href="#">Terms & Sales</a></li>
									<li><a href="#">Terms & Use</a></li>
									<li><a href="terms.php">Terms & Condition</a></li>
										
					         </ul>
							</nav>
						</div>
					
							<div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Shopping Money</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="aboutus.php">About Us</a></li>
									<li><a href="#">Business Plan</a></li>
									<li><a href="#">Carreers</a></li>
									<li><a href="#">Blogs</a></li>
                                     <li><a href="#">Site Maps</a></li>
                                     <li><a href="#">Affilitats</a></li>
									 <li><a href="#">Brands</a></li>
										
					         </ul>
							</nav>
						</div>
					
					
             <div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Help</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="#">Customer Care</a></li>
									<li><a href="help.php">Help</a></li>
									<li><a href="faq.php">Faq</a></li>
									</br>
									
									<li  class="hot"><div class="buybulk">Buy bulk</div><a href="hiring.php">We are hiring</a></li>
										
										
					         </ul>
							</nav>
						</div>					
					
						<div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Payment Method</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="#">Net Banking</a></li>
									<li><a href="#">Debit Card</a></li>
									<li><a href="#">Credit Card</a></li>
									<li><a href="#">Pay From Wallet</a></li>

										
					         </ul>
							</nav>
							
							<div class="#">
							<div class="footer-title">
								<h5>Stay Connected</h5>
							</div>
							
							<div class="social-media" style="padding-top: 20px;">
								<a href="#"><i class="fa fa-facebook fb"></i></a>
								<a href="#"><i class="fa fa-google-plus gp"></i></a>
								<a href="#"><i class="fa fa-twitter tt"></i></a>
								<a href="#"><i class="fa fa-youtube yt"></i></a>
								<a href="#"><i class="fa fa-linkedin li"></i></a>
								<a href="#"><i class="fa fa-rss rs"></i></a>
							</div>
						</div>
						
							
							
							
							
						</div>
						
					</div>
				</div>				
			</div>
			<!-- Footer End -->
			<!-- Copyright-area Start -->
			<div class="copyright-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="copyright">
								<p>Copyright &copy; <a href="#" target="_blank"> Shoppingmoney</a> All rights reserved.</p>
								<!--<div class="payment">
									<a href="#"><img src="img/payment.png" alt="Payment"></a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Copyright-area End -->
		</footer>
		<!-- FOOTER-AREA END -->	
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		   <!-- Modal -->
		   <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product" id="loginpp">
								<div class="product-images">
									<p>Shopping Cart <span class="tem">(Cart  Item)</span></p>
								</div><!-- .product-images -->

								<div class="product-info">
			<!--				
			<form>
								<table width="100%">
								<tr style="border-bottom:1px solid #EEE;">
								<td width="34%"><p>Item Details</p></td>
								<td width="10%"><p>price</p></td>
								<td width="10%"><p>Quantity</p></td>
								<td width="35%"><p>Check Delivery with Charges<input type="text" placeholder="Pincode" style="width:60px;margin-left:2px;height:23px;" name="" required>
								<button class="chkbtn">CHECK</button></p></td>
								<td><p>Subtotal</p></td>
								</tr>
								
					<?php
$sum = 0;
								$prog = new DBQuery();
								$IMg = new DBQuery();
								$product = new DBQuery();
								$system_id=$helper->systemId();
								if($_SESSION['myemail']==null || $_SESSION['myemail'] == ''){
								$fetch = $prog->selectData("select * from cart where system_id = '$system_id' And user_id = '' ");
								}else{
								$fetch = $prog->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");
								}
								foreach($fetch as $tr){
								$protitle=$product->selectSingleStmt("select * from product_tbl where product_id = '".$tr['product_id']."' ");
								$getimg=$IMg->selectSingleStmt("select * from product_img where product_id = '".$tr['product_id']."' ");
								?>
								<tr>
								<td>
								<div class="main-image images">
										<img alt="#" src="<?=$getimg['image'];?>" width="80"/><p style="float:right; "></p><br/>
										<h1><?=$protitle['title'];?></h1>
									</div>
								</td>
								<td><p>Rs. <?=$tr['unit_prc'];?></p>
<?php
$shipping = $product->selectSingleStmt("select * from shipping where product_id = '".$tr['product_id']."' ");
?>
<p>shipping charges include(<?=$shipping['shipping_charge'];?>)</p></td>
	</td>							<td><div class="numbers-row">
												<input type="number" disabled="disabled" id="french-hens" value="<?=$tr['qty'];?>">
											</div></td>
								<td><p>Check availability and delivery charges for your pincode</p></td>
								<td><p style="font-size:12px;">You Pay: Rs. <?=$tr['mrp']+$shipping['shipping_charge'];?></p></td>

<?php
$sum = $sum + ($tr['mrp']+$shipping['shipping_charge']);

?>
								</tr>
								
								<?php
								}
								?>
								
								</table>
								
								
									<hr / style="margin-top:120px;border: 2px solid #E6E6E6;background: #E6E6E6;">
									<div class="widget widget_socialsharing_widget">
										
										
									<p style="font-size:11px;color:#999;">Delivery and payment options can be selected later</p>
									<p> <b>100%</b> Safe and Secure Payments</p>
									<p><b>TrustPay:</b> 100% Money Back Guarantee, 7 Days Easy Return Policy</p>
									</div>
									
									<div class="widget widget_socialsharing_widget">
									</form>
									<table width="100%" height="120px;">
									<tr>
									<td>Total:</td>
									<td>Rs. <?=$sum;?></td>
									</tr>
									
									<tr>
									<td>You Pay:</td>
									<td style="font-size:15px;font-weight:600;">Rs. <?=$sum;?></td>
									</tr>
									</table></form>
									
									<div class="quick-add-to-cart">
										<form method="post" class="cart">
											<a href="checkout.php" class="single_add_to_cart_button">Continue</a>
										
										</form>
									</div>
									</div>

								
								</form>
								-->
								</br></br>
								<div>
								
								<h4><b>Your Cart(0 items)</b></h4>
									</br>
									 <div class="panel panel-default">
                                     <div class="panel-body"><h5>Your cart is empty. Start shopping now!</h5></div>
									 <p style="float:right;"><b>Total:Rs.0</b></p>
							         </div>
                                    	
                                 <div class="col-md-4" style="background-color: #eaf5ff; border: 1px solid; font-size: small;">
								 <span style="text-align:justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout</span>
								 
								 </div>
                                <div class="col-md-2"></div>
                                     
                                 <div class="col-md-4"> <button type="button" class="btn btn-info">Shop Now</button></div>
										
									</div>
									
									
																		
									<script>
										function checkout(){
											window.location="checkout.php";
										}
									</script>
									
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!-- END Modal -->
		   
		    <script>
function validateFrm()
{
	var flag=0;
  var fields = ["name","lastname","phone", "email", "password"]
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.forms["regfrm"][fieldname].value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  document.getElementById(fieldname).style.borderColor="red";
	  $('#er'+fieldname).fadeIn(1000);
    }else{
		$('#er'+fieldname).fadeOut(1000);
	var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!re.test($("#email").val())){$("#eremail").fadeIn(1000);flag=1;}
	if($("#phone").val().length != 10){$("#erphone").fadeIn(1000); flag=1;}
	document.getElementById(fieldname).style.borderColor="#ccc";
	}
  } 
  if(flag == 1){
	  return false;
  }else{
	  // Checking otp
	  var email = $("#email").val();
	  var otp = $("#otp").val();
	  var eotp=$("#eotp").val();
	  var phone=$("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/checkotp.php?otp="+otp+"&email="+email+"&eotp="+eotp+"&phone="+phone;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
{
var resp = request.responseText;
var res = resp.split("*");
if(res[0] == 0){
//alert(res);
$("#fmsg").html("Invalid email OTP");
document.getElementById("fmsg").style.color = "red";
$("#fmsg").fadeIn(1000);
}else if(res[1] == 0){
$("#fmsg").html("Invalid mobile OTP");
document.getElementById("fmsg").style.color = "red";
$("#fmsg").fadeIn(1000);
}else{
$("#fmsg").html("You have successfully verified your email/mobile");
document.getElementById("fmsg").style.color = "green";
$("#fmsg").fadeIn(500);
$('#regfrm').submit();
//alert("fai");
}

}else{

}
		
		
		
	/*	if(request.readyState == 4)
		{
			//document.getElementById("eremail").innerHTML = request.responseText;
var res = request.responseText;
var resp=res.split("*");
if(res == 1){
//alert(res);
$('#regfrm').submit();
}else{
	$("#erotp").fadeIn(1000);
}
		} */
	}
 
 }
  
}

function otp()
{   
	var flag=0;
  var fields = ["name","lastname","phone", "email"]
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.forms["regfrm"][fieldname].value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  document.getElementById(fieldname).style.borderColor="red";
	  $('#er'+fieldname).fadeIn(1000);
    }else{
		$('#er'+fieldname).fadeOut(1000);
	var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!re.test($("#email").val())){$("#eremail").fadeIn(1000);flag=1;}
	if($("#phone").val().length != 10){$("#erphone").fadeIn(1000); flag=1;}
	document.getElementById(fieldname).style.borderColor="#ccc";
	}
  } 
  if(flag == 1){
	  return false;
  }else{
	  var name = $("#name").val()+" "+$("#lastname").val();
	  var email = $("#email").val();
	  var phone = $("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/otp.php?email="+email+"&phone="+phone+"&name="+name;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{  
			//document.getElementById("eremail").innerHTML = request.responseText;
var res = request.responseText;
if(res == 0){
document.getElementById("eremail").innerHTML = "This email is register already";
}else{
	$("#fid").fadeOut(10);
    $("#rid").fadeIn(100);
document.getElementById("eremail").innerHTML = "OTP is send to your mobile/email";
//document.getElementById("fmsg").innerHTML = "OTP is send to your mobile/email";

}
			document.getElementById("eremail").style.color = "green";
			$("#eremail").fadeIn(1000);
			//alert("otp send"+res);
		}else{
			$("#eremail").show(100);
			document.getElementById("eremail").innerHTML = "<img src='img/loader.gif' />";
			
		}
	}
 }
  
}  

$(document).ready(function () {
	        $("#lastname").change(function () {
                    $("#erlastname").fadeOut(1000);
                }); 
                $("#password").change(function () {
                    $("#erpassword").fadeOut(1000);
                });
                $("#phone").change(function () {
                    $("#erphone").fadeOut(1000);
                });
                
            }); 
</script>
<script>
function re_otp()
{   
	
var name = $("#name").val()+" "+$("#lastname").val();
	  var email = $("#email").val();
	  var phone = $("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/otp.php?email="+email+"&phone="+phone+"&name="+name;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{  
			//document.getElementById("eremail").innerHTML = request.responseText;

document.getElementById("eremail").innerHTML = "OTP is send to your mobile/email";
//document.getElementById("fmsg").innerHTML = "OTP is send to your mobile/email";


			document.getElementById("eremail").style.color = "green";
			$("#eremail").fadeIn(1000);
			$("#reotp").fadeIn(100);
$("#reotp1").fadeOut(10);
			//alert("otp send"+res);
		}else{
                         $("#reotp").fadeOut(100);
			$("#reotp1").show(100);
			document.getElementById("reotp1").innerHTML = "<img src='img/loader1.gif' />";
			
		}
	}
 }  
</script>
		   
			   <!-- start register popup -->
            <div class="modal fade <?php if(isset($_SESSION['ref'])) echo "in";?>" id="productModalRegister" tabindex="-1" role="dialog" <?php if(isset($_SESSION['ref'])){ echo "style='display:block;'"; } ?>>
                <div class="modal-dialog" role="document" style="width:70% !important;">
                    <div class="modal-content" id="bxbg">
                        <a <?php if(isset($_SESSION['ref'])){ echo "href='index.php'"; unset($_SESSION['ref']);}?>><div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div></a>
                        <div class="col-md-6" id="logleft">
                            <div class="product-linee">
                                <center><img src="images/wallet.png" style="width: 70px;"><br><br>
                                    <p> <span class="tem">You will love to shop with us</span></p></center>
                                <ul class="prod-lb">
                                    <li>Wide selection of products</li>
                                    <li>Quality and service you'll love</li>
                                    <li>On time delivery guarantee</li>

                                </ul>

                            </div><!-- .product-images -->
                        </div>
                        <div class="modal-body">

                            <div class="modal-product">


                                <div class="col-md-9" id="rightpart">
                                    <!-- START PRODUCT-BANNER -->

                                    <!-- END PRODUCT-BANNER -->
                                    <!-- START PRODUCT-AREA (1) -->
                                    <div class="product-area">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <!-- Start Product-Menu -->
                                                <div class="product-menu">


                                                    <ul role="tablist" style="float:left;">
                                                        <li role="presentation"><a href="#display-signup" role="tab" data-toggle="tab">Sign Up</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product-Menu -->
                                        <div class="clear"></div>
                                        <!-- Start Product -->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="product carosel-navigation">
                                                    <div class="tab-content">
                                                        
                                                        <!-- Start Product = display-1-2 -->
                                                        <div role="tabpanel" class="tab-pane fade in active" id="display-signup">

                                                            <div class="row">

                                                                <form name="regfrm" id="regfrm" action="index.php" method="post">
                                                                   <div id="fid"> 
																	 <!--<div class="product-select product-type">
                                                                       <select class="form-control" onchange="stype(this.value)" id="sponsorchannel" name="sponsorchannel" style="width:250px;" required="">
                                           <option>Select Sponsor Type</option>
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="2">  Advertisement  </option>                                        
                                          <option value="3"> Others </option>
                                       </select></div>-->
									   <?php
									   if(isset($_SESSION['refid'])){
									   ?>
									   <div class="product-select product-type" id="sponser">
                         <input id="sponserval" type="text" class="form-control" id="mobile" value="<?=$_SESSION['refid']?>" disabled placeholder="Sponser Id" style="width:250px;">
																		<input type="hidden" name="link" value="<?=$_SESSION['refid']?>" />
                                                                    </div>
									   <?php }elseif(isset($_SESSION['empref'])){ ?>
<div class="product-select product-type" id="sponser">
										  <input id="sponserval" type="text" class="form-control" id="mobile" value="<?=$_SESSION['empref']?>" disabled placeholder="Sponser Id" style="width:250px;">
																		<input type="hidden" name="link" value="<?=$_SESSION['empref']?>" />
                                                                    </div>
									   <?php }else{
										    echo "<input type='hidden' name='link' value='0' />";
									   } ?>
 <div class="product-select product-type" style="width:13%;margin-right:4px;">
     <select class="form-control"   name="title" style="padding: 2px;">
                       
                        <option >Mr.</option>
                        <option>Mrs</option>
						<option>Ms.</option>
						
                     </select>                                                                    
   </div>
	<div class="product-select product-type" style="width:72%">
		<input type="text" class="form-control" name="name" id="name" placeholder="First Name" style="width:195px;" required value="" onkeypress="return FilterInput (event)">
<span id="error" class="help">Please enter only text</span>
<script type="text/javascript">
        
        
         function FilterInput (event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			document.getElementById("error").style.display = ret ? "none" : "inline";
			
        }
    </script>
	</div>
	 
                                                                    
			<div class="product-select product-type">
				<!--<label>Mobile No</label>-->
				<input type="alphabet" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required value="" onkeypress="return FilterInput (event)" style="width:250px;">
<span class="help" id="erlastname">Please enter Last name</span>
<script type="text/javascript">
        
        
         function FilterInput (event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			document.getElementById("erlastname").style.display = ret ? "none" : "inline";
			
        }
    </script>

			</div>


                                                                    <div class="product-select product-type">
                                                                        <!--<label>Mobile No</label>-->
         <input class="form-control" type="tel" placeholder="Phone Number" name="phone" id="phone" id="text1" onkeypress="return IsNumeric(event);" onpaste="return false;" ondrop = "return false;" maxlength="10" minlength="5" style="width:250px;">
		 <span class="help" id="erphone">Please enter valid mobile number</span>
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
                                                                    </div>
                                                                    
                                                                    <div class="product-select product-type">
                                                                        <!--<label>E-Mail ID</label>-->
                                                                        <div class="col-sm-9" style="padding:0"><input type="email" class="form-control" name="email"  id="email"  placeholder="E-Mail ID"  required  style="width:200px;">
																		
																		<span class="help" id="eremail">Please enter valid email</span></div><div class="col-sm-3" style="padding:0;margin-top: 7px;"><a id="otpbtn"  class="stm_submit_button register_btn" onclick="otp();" href="javascript:void(0);" style="    font-size: 11px;font-weight: 100;     padding: 9px 2px;">Get OTP</a></div>

                                                                    </div>
																	</div><div id="rid" style="display:none;">
																	<div id="fmsg" style="color:green;"><span  >OTP is send to your mobile/email</span> </div>
																	<div class="product-select product-type">
                                                                        <!--<label>OTP Mobile</label>-->
                                                                        <input type="text" class="form-control" name="otp"  id="otp"  placeholder="Enter Mobile OTP"  required  style="width:250px;"> 
																		<span class="help" id="erotp">Incorrect OTP, try again.</span>
																		<div class="col-sm-3" style="padding:0;margin-top: 7px;"><a id="reotp"  class="stm_submit_button register_btn" onclick="re_otp();" href="javascript:void(0);" style="    font-size: 11px;font-weight: 100; ">Resend-OTP</a>
<div id="reotp1"></div>
</div>

                                                                    </div>
																	<div class="product-select product-type">
                                                                        <!--<label>OTP EMAIL</label>-->
                                                                        <input type="text" class="form-control" name="eotp"  id="eotp"  placeholder="Enter Email OTP"  required  style="width:250px;">
																		<span class="help" id="ereotp">Incorrect OTP, try again.</span>

                                                                    </div>
                                                                    <div class="product-select product-type">
                                                                        <!--<label>Password</label>-->
                                                                        <input type="password" name="password" id ="password" class="form-control" placeholder="Enter your Password" required  style="width: 250px;">
                                                                        <span class="help" id="erpassword">Please enter password</span>
                                                                    </div>
                                                                    <div class="product-select product-type" style=" width: 125%;">
                                                                        <input type="checkbox" required name="check" id="check" value="true" >  I hereby certify that I am atleast 18 years of age.<br>
<a href="#" style="float:left;"> Terms & Condition</a>

                                                                    </div>
                                                                    <div class="product-select product-type">
                                                                        <!--<button type="submit" id="big1" class="toch-button toch-add-cart"><i class="fa fa-lock" aria-hidden="true"></i> Create your Wallet</button>-->
																		 <a id="big1" onclick='validateFrm();' class="toch-button toch-add-cart"><i class="fa fa-lock" aria-hidden="true"></i> Create your Wallet</a>
                                                                    </div>
																	</div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- End Product = display-1-2 -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product -->
                                    </div>
                                    <!-- END PRODUCT-AREA (1) -->

                                </div>
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div><!-- END Register popup -->	   
		   
		   
		   <!-- start login popup -->
            <div class="modal fade" id="productModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="width:70% !important;">
                    <div class="modal-content" id="bxbg">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="col-md-6" id="logleft">
                            <div class="product-linee">
                                <center><img src="images/wallet.png" style="width: 70px;"><br><br>
                                    <p> <span class="tem">You will love to shop with us</span></p></center>
                                <ul class="prod-lb">
                                    <li>Wide selection of products</li>
                                    <li>Quality and service you'll love</li>
                                    <li>On time delivery guarantee</li>

                                </ul>

                            </div><!-- .product-images -->
                        </div>
                        <div class="modal-body">

                            <div class="modal-product">


                                <div class="col-md-9" id="rightpart">
                                    <!-- START PRODUCT-BANNER -->

                                    <!-- END PRODUCT-BANNER -->
                                    <!-- START PRODUCT-AREA (1) -->
                                    <div class="product-area">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <!-- Start Product-Menu -->
                                                <div class="product-menu">


                                                    <ul role="tablist" style="float:left;">
                                                        <li role="presentation" class=" active"><a href="#display-login" role="tab" data-toggle="tab">Login</a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product-Menu -->
                                        <div class="clear"></div>
                                        <!-- Start Product -->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="product carosel-navigation">
                                                    <div class="tab-content">
                                                        <!-- Product = display-1-1 -->
                                                        <div role="tabpanel" class="tab-pane fade in active" id="display-login">
                                                            <div class="row">

                                                                <form action="mlm/loginborker.php" method="post">

                                                                    <div class="product-select product-type">
                                                                        <label>Email ID</label>
                                                                        <input type="text" class="form-control" name="email" id ="email" placeholder="Enter your Mobile or Email" required style="width: 250px;">
                                                                    </div>

                                                                    <div class="product-select product-type">
                                                                        <label>Password</label>
                                                                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password" required  style="width: 250px;">
                                                                              

<a href="#" data-toggle="modal" data-dismiss="modal" data-target="#productModalfp">Forgot Password?</a>




<a href="#" style="float:right;"> Terms & Condition</a>



                                                                    </div><br>


                                                                    <div class="product-select product-type">
                                                                        <button type="submit" name="login" id="big" class="toch-button toch-add-cart"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</button><br>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- End Product = display-1-1 -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product -->
                                    </div>
                                    <!-- END PRODUCT-AREA (1) -->







                                </div>
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div><!-- END login popup -->
			
			
			<script>
				
	
      
		 function sendMail()
     {     
	var request = checkAjax();
	var email = $("#friends-email").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim() == "" || !emailReg.test(email)){
		//alert("Pleaser enter a valid email");
		$("#errmsg").html("Pleaser enter a valid email");
		document.getElementById("errmsg").style.color = "red";
	}else{
    var url = "mlm/ajaxpage/forgetpassword.php?email="+email;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			document.getElementById("errmsg").innerHTML = request.responseText;
			document.getElementById("errmsg").style.color = "green";
			 //$("#errmsg").html("Password has sent on your email");
	         $("#friends-email").val("");
		}else{
			document.getElementById("errmsg").innerHTML = "<img src='img/loader.gif' />";
		}
	}
	 }
}
		 </script>
			<!------------------------------------------------------------forget password------------------------------------->
			 <div class="modal fade" id="productModalfp" tabindex="-1" role="dialog" style="    margin-top: -13px;">
                <div class="modal-dialog" role="document" style="width:70% !important;">
                    <div class="modal-content" id="bxbg">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="col-md-6" id="logleft">
                            <div class="product-linee">
                                <center><img src="images/wallet.png" style="width: 70px;"><br><br>
                                    <p> <span class="tem">You will love to shop with us</span></p></center>
                                <ul class="prod-lb">
                                    <li>Wide selection of products</li>
                                    <li>Quality and service you'll love</li>
                                    <li>On time delivery guarantee</li>

                                </ul>

                            </div><!-- .product-images -->
                        </div>
                        <div class="modal-body" style="    height: 350px;">

                            <div class="modal-product">


                                <div class="col-md-9" id="rightpart">
                                    <!-- START PRODUCT-BANNER -->

                                    <!-- END PRODUCT-BANNER -->
                                    <!-- START PRODUCT-AREA (1) -->
                                    <div class="product-area">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <!-- Start Product-Menu -->
                                                <div class="product-menu">


                                                    <ul role="tablist" style="float:left;">
                                                        <li role="presentation" class=" active"><a href="#display-login" role="tab" data-toggle="tab">Please Enter your Email Id</a></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product-Menu -->
                                        <div class="clear"></div>
                                        <!-- Start Product -->
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <div class="product carosel-navigation">
                                                    <div class="tab-content">
                                                        <!-- Product = display-1-1 -->
                                                        <div role="tabpanel" class="tab-pane fade in active" id="display-login">
                                                            <div class="row">
<p id="errmsg" style="font-size: 12px;margin: 5px 0px -5px 3px;"></p>
                                                                    <div class="product-select product-type">
                                                                        <label>Email ID</label>
                                                                        <input onkeyup="$('errmsg').html("");" type="text" class="form-control" name="email" id ="friends-email" placeholder="Enter your Mobile or Email" required style="width: 250px;">
                                                                    </div>

                                                                   <br>


                                                                    <div class="product-select product-type">
                                                                        <button type="submit" onclick="sendMail();" name="login" id="big" class="toch-button toch-add-cart"> <i class="fa fa-sign-in" aria-hidden="true"></i> Send</button><br>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Product = display-1-1 -->
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product -->
                                    </div>
                                    <!-- END PRODUCT-AREA (1) -->







                                </div>
                            </div><!-- .modal-product -->
                        </div><!-- .modal-body -->
                    </div><!-- .modal-content -->
                </div><!-- .modal-dialog -->
            </div><!-- END login popup -->
			
			
			
			<!-----------------------------------------------------End------------------------------------------------------------->
		   
		   
		   
		   
		   
		   
		   
		    <!---------------------------------------------------popup kashif productModal3------------------------------------------------------->
  
		     <style>
         
 

.suggestionsBox9 {
	position: absolute;
	left: -2px;
	top:10px;
        height:312px;
        overflow-y:scroll;
	margin: 34px 0px 0px 0px;
	width: 447px;
	padding:0px;
	background-color: #fff;
	border-top: 3px solid #ccc;
	color: #353535;
	z-index:99999;
}

.suggestionList9 ul li {
	list-style:none;
        color:#7B7B7B;
	margin: 0px;
	padding: 6px;
        text-align:left;
        font-size:12px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList9 ul li:hover {
	text-decoration:underline;
	color:#7B7B7B;
font-size:12px;
}


</style>
		   
		    <div class="modal fade" id="productModal3" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<img src="img/logo.png">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product" >
								

								<div class="product-info1" id="chng_loc">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-4" >
									<br><br><h5><b>LOREM IPSUM DOLAR</b></h5><hr>
									<h6><b>LOREM IPSUM</b></h6>
									<h6><b>LOREM IPSUME</b></h6>
									<h6><b>LOREM IPSUM</b></h6>
								</div>
								<div class="col-sm-8" style="border-left: 1px solid;">
								<form method="post">
								 <div class="col-sm-8 col-xs-12">
                                    <div class="single-create">
                                       <p style="text-align:left;">State </p>
									   <?php
									     $dbAccess = new DBQuery();
										$qurey = $dbAccess->selectData("select * from state_district group by state");
										
									   ?>
                                       <select class="form-control" id="district" name="district" required  style="height: 45px;">
                                      <?php	foreach($qurey as $nth){  ?><option value= "<?php echo $nth['state'];?>" >
									<?php echo $nth['state'];?>
										
										
										</option>
									<?php	}  ?>

                                       </select>
                                    </div>
                                 </div>
								 <div class="col-sm-8" >
								<p style="text-align:left;">Where do you want us to deliver your basket?</p>
								</div>
								 <div class="quick-access1">
								  
		                    	<div class="search-by-category1">
		                    		
		                    		<div class="header-search1">
									
		                    			
										
			                    			<input type="text" name="myarea" id="area_code" onkeyup="suggest_f();" placeholder="Search by area or Apartment or PIN Code">
			                    			<i class="fa fa-search" id="fa"></i>
											<div class="suggestionsBox9" id="suggestions9" style="display: none;"> 
												<div class="suggestionList9" id="suggestionsList9"> &nbsp; </div>
											</div>
											
		                    		
		                    		</div>
		                    	</div>
		                    	
		                    </div>
							 <div class="col-sm-8 col-xs-12" style="margin-top: 33px;">
                                    <div class="single-create">
							<button type="submit" id="suggest_form" name="shopbegainnow" class="btn btn-primary floatleft">Start Shopping</button>
						
											</div>
											</div>
								</form>
								</div>
								
							</div>
								</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
								<script>
								function suggest_f() {

var inputString= document.getElementById("area_code").value;
var dist=document.getElementById("district").value;
//alert("suggest_location.php?queryString="+inputString+"&qd="+dist);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
$(document).ready(function(){
  $('#area_code').addClass('load');
});

    if (xhttp.readyState == 4 && xhttp.status == 200) {

                  //var h="500px";
                 document.getElementById("chng_loc").style.height="500px";
$(document).ready(function(){
 // $('#suggestions9').fadeIn();
		  // $('#suggestionsList9').html(xhttp.responseText);
		   $('#area_code').removeClass('load');
});
                    document.getElementById("suggestions9").style.display='block';
                    document.getElementById("suggestionsList9").innerHTML = xhttp.responseText;

    }
  };
  xhttp.open("GET", "suggest_location.php?queryString="+inputString+"&qd="+dist, true);
  xhttp.send();
} 

function fill_f(thisArea,thisPin,thisState) {
              document.getElementById("area_code").value = thisArea+","+thisPin;
        
        $('#suggest_form').submit();
        setTimeout("$('#suggestions9').fadeOut();", 100);
       
       document.getElementById("chng_loc").style.height="275px";

    }

		
								</script>
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!----------------------------------------------------------End--------------------------------------------------->
		   



<!---------------------------------------------------popup Help productModalhelp------------------------------------------------------->
		   
		    <div class="modal fade" id="productModalhelp" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<img src="img/logo.png">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<p>SEARCH</p>
<div id="suggest">
      <input type="text" name="country"  value="" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="county" placeholder="From" required/>
     
      <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>
   </div>
</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!----------------------------------------------------------End--------------------------------------------------->




<!-----popup checkout------->
 <div class="modal fade" id="checkout12" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<br><br><h3><b>PAID VIA</b></h3><hr>
<table width="70%" height="200" style="margin:0px auto;float:none;">
<tr>
<td>									
<select class="form-control">
<option selected disabled>Choose option</option>
<option>Cheque</option>
<option>NEFT</option>
<option>RTW</option>
<option>DYD</option>
<option>D/D</option>
</select>
</td>

</tr>

<tr>
<td><input type="text" class="form-control" placeholder="Type Your Number"><td>

</tr>

<tr>
<td><button class="btn btn-primary">Upload</button><td>
</tr>

</table>								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->





<!-----Upload Resume Popup------->
 <div class="modal fade" id="checkoutresume" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<br><br><h3><b>Upload Your Resume</b></h3><hr>
<p>Attach Resume:<input type="file" style="float: right;">
<br><span style="font-size:10px;color:#ccc;color: #343434;float: right;">Supported Formats: doc, docx, rtf, pdf. Max file size: 300Kb</span></p>

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->



<!-----Upload Resume Popup------->
 <div class="modal fade" id="checkoutresume1" tabindex="-1" role="dialog" style="z-index:99999;">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<img src="vendor/productImg/sample.jpg">

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->




<!-----OTP success Popup------->
 <div class="modal fade" id="otp" tabindex="-1" role="dialog" style="z-index:99999;">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<h3>Successfull OTP</h3>

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end of otp popup----------------->











								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->






		   
		</div>
		<!-- END QUICKVIEW PRODUCT -->




<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		
		$('#country').val(thisValue);
		//$('.county').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}
	
	
	function suggest1(inputString){
		if(inputString.length == 0) {
			$('#suggestions1').fadeOut();
		} else {
		$('#country1').addClass('load');
			$.post("autosuggest1.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions1').fadeIn();
					$('#suggestionsList1').html(data);
					$('#country1').removeClass('load');
				}
			});
		}
	}

	function fill1(thisValue) { 
	    $('#country1').val(thisValue);
		setTimeout("$('#suggestions1').fadeOut();", 600);
	}

</script>





<!----------------------------------------------------------auto pop start--------------------------------------------------->

<div id="boxes">
  <div style="top: 171.5px; left: 293.5px; display: none;" id="dialog" class="window"> <img src="img/logo.png" alt="" style="max-width: 116%;margin-left: -5px;margin-top: 21px;">
    <div id="lorem">
<h5 style="
    margin-top: 56px;text-transform: uppercase;
">Welcome to ShoppingMoney.in Beta Version</h5>
      <p>We're working hard to come up with our best and we'll be ready very soon
</p>
    </div>
    <div id="popupfoot">  </div>
  </div>
  <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.6;" id="mask"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
