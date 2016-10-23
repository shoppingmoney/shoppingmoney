<?php
session_start();
ob_start();
include 'vendor/lib/Connection.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
?>
<!doctype html>
<html class="no-js" lang="">
    

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>ShoppingMoney.in</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- favicon
		============================================ -->		
         <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Font awesome CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- nivo slider CSS
		============================================ -->
		<link rel="stylesheet" href="lib/css/nivo-slider.css" type="text/css" />
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="css/jquery-ui.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="css/style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
		
		
		<style>


		.product-area {
    margin-top: 0px;
}
		.single-product{border: 1px solid #ddd;}
		
		.cat-left-drop-menu{
	margin-left:-17px !important;
			}
	
	.menuicon{float:left;width:80px;height:auto;margin: 10px 8px;}
	.divmenu {
    width: 32px;
    height: 3px;
    background-color: #fff;
    margin: 3px 0;
}
	
	
		.dropdown-check-list {
  display: inline-block;
    position: absolute;
    top: 7px;
}
.dropdown-check-list .anchor {
  position: relative;
  background:#fff;
  cursor: pointer;
  display: inline-block;
  padding: 5px 92px 5px 10px;
  border: 1px solid #ccc;
}
.dropdown-check-list .anchor:after {
  position: absolute;
  content: "";
  border-left: 2px solid black;
  border-top: 2px solid black;
  padding: 5px;
  right: 10px;
  top: 20%;
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  -webkit-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.dropdown-check-list .anchor:active:after {
  right: 8px;
  top: 21%;
}
.dropdown-check-list ul.items {
  padding: 8px 31px;
  background: #FFFFFF;
  display: none;
      right: -1px;
    position: absolute;
    z-index: 99999;
  margin: 0;
  border: 1px solid #ccc;
  border-top: none;
}
.dropdown-check-list ul.items li {
  list-style: none;
}
.dropdown-check-list.visible .anchor {
  color: #0094ff;
}
.dropdown-check-list.visible .items {
  display: block;
}

.ingh{
height: 250px;
width: 170px;
margin-top: 9px;
}

#otphead{margin-top: 30px;
    color: #000;
    text-align: center;
    border: 1px dotted #c5c5c5;
    font-style: italic;
    padding: 10px;
    font-size: 23px;
	margin-bottom: 22px;
	background: -webkit-linear-gradient(#fff,#eeffff);
	background: -o-linear-gradient(#fff,#eeffff);
	background: -moz-linear-gradient(#fff,#eeffff);
	background:  linear-gradient(#fff,#eeffff);
	background:  -ms-linear-gradient(#fff,#eeffff);}
	
.otptext{color:#000;}	

		</style>
    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
				<div class="row">
					
					<div class="col-md-12 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						
						
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						
						<div class="product-area">
							<div class="row">
							
								<div class="col-xs-10" style="margin:0px auto;float:none;">
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
										<!-- Start 1 Checkout-options -->
										<div class="panel panel_default">
											
											<div id="checkout-options" class="collapse in">
												<div class="panel-body">
												<div class="row">
												<div class="col-xs-12">
												<img src="img/otpban.jpg">
												</div></div>
																									    <script>
function validateOtp()
{
	var flag=0;
  var fields = ["mobile_otp","email_otp"];
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.getElementById(fieldname).value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  document.getElementById("otpresponse").style.color = "red";
	  document.getElementById(fieldname).style.borderColor="red";
	   $("#otpresponse").html("OTP field can't be empty");
	  $("#otpresponse").fadeIn(1000);
    }else{
	//$("#otpresponse").fadeOut(1000);
	}
  } 
  if(flag == 1){
	  return false;
  }else{
	  // Checking otp
	  var email = '<?=$_GET['email']?>';
	  var otpm = $("#mobile_otp").val();
	  var otpe = $("#email_otp").val();
	  var request = checkAjax();
  var url = "vendor/ajaxpage/checkotp.php?otpm="+otpm+"&email="+email+"&otpe="+otpe;
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
$("#otpresponse").html("Invalid email OTP");
document.getElementById("otpresponse").style.color = "red";
 $("#otpresponse").fadeIn(1000);
}else if(res[1] == 0){
	$("#otpresponse").html("Invalid mobile OTP");
document.getElementById("otpresponse").style.color = "red";
 $("#otpresponse").fadeIn(1000);
}else{
	$("#otpresponse").html("You have successfully verified your email/mobile");
document.getElementById("otpresponse").style.color = "green";
$("#otpresponse").fadeIn(500);
 setTimeout(function(){
	$("#otpresponse").html("Redirecting......"); 
 },2000)
 setTimeout(function() {
  window.location.href = "vendor/authentication.php";
  //alert("done");
}, 3000);
 //window.location='vendor/authentication.php';
 
}
$("#sndotp").fadeIn(1000);
			$("#getotp").fadeIn(1000);
		}else{
			$("#sndotp").fadeOut(100);
			$("#getotp").fadeOut(100);
		}
	}
 
 }
  
}

function getOtp()
{
	var email = '<?=$_GET['email']?>';
	  var request = checkAjax();
  var url = "vendor/ajaxpage/otp.php?email="+email;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
var res = request.responseText;
if(res == 0){
//document.getElementById("otpresponse").innerHTML = "This email is register already";
}else{
document.getElementById("otpresponse").innerHTML = "OTP is send to your registered mobile/email";
}
			document.getElementById("otpresponse").style.color = "green";
			$("#otpresponse").fadeIn(1000);
			$("#getotp").fadeIn(1000);
		}else{
			//$("#sndotp").fadeOut(1000);
			$("#getotp").fadeOut(100);
		}
	}

}
</script>
												
													<div class="row">
														
														<div class="col-md-6 col-xs-12" style="margin:0px auto;float:none;">
															<div class="checkout-collapse">
																<h3 class="title-group-3 gfont-1" id="otphead">OTP DETAILS REQUIRED</h3>
																<div id="otpresponse" style="text-align:center;"></div>
																<div class="form-group">
																	<label class="otptext">Enter OTP (Mobile)</label>
																	<input type="text" id="mobile_otp" class="form-control" name="mobile_otp" placeholder="Enter OTP" required/>
																</div>
																<div class="form-group">
																	<label class="otptext">Enter OTP (Email)</label>
																	<input type="text" id="email_otp" name="email_otp" class="form-control" placeholder="Enter OTP" required/>
																	
																</div>
																<a href="javascript:void(0);" id="sndotp" onclick="validateOtp();" class="btn btn-primary">Submit</a>
																<a href="javascript:void(0);" style="float:right;" id="getotp" onclick="getOtp();" class="btn btn-primary">Resend OTP</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Checkout-options -->
									</div>
									<!-- Accordion end -->
									
								</div>
							
							
						</div>
						<!-- END PRODUCT-AREA -->
						
					</div>
					
				</div>
			</div>
			
			<!-- START SUBSCRIBE-AREA -->
			
			<div style="clear:both;"></div>
			


            <!-- END SUBSCRIBE-AREA -->
        </section>
        <!-- END HOME-PAGE-CONTENT -->

<?php include("include/footer.php"); ?>


		<!-- jquery
		============================================ -->		
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
		<!-- wow JS
		============================================ -->		
        <script src="js/wow.min.js"></script>
		<!-- meanmenu JS
		============================================ -->		
        <script src="js/jquery.meanmenu.js"></script>
		<!-- owl.carousel JS
		============================================ -->		
        <script src="js/owl.carousel.min.js"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- countdon.min JS
		============================================ -->		
        <script src="js/countdon.min.js"></script>
        <!-- jquery-price-slider js
		============================================ --> 
        <script src="js/jquery-price-slider.js"></script>
        <!-- Nivo slider js
		============================================ --> 		
		<script src="lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		<!-- main JS
		============================================ -->		
        <script src="js/main.js"></script>
    </body>


</html>
