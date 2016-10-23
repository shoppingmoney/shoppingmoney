<?php
session_start();
ob_start();
error_reporting(0);
if ($_SESSION['userEmail'] != NULL) {
    header("location:vendor/index.php");
}
include 'vendor/lib/Connection.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
//$val = array_map("mysql_real_escape_string", $_REQUEST);
extract($_POST);
if (isset($_POST['submit'])) {
    $count = $dbAccess->countDtata("select * from register_vendor where email = '" . $email . "'");
    if ($count > 0) {
        echo $LoadMsg->dublicateSkip();
    } else {
        if ($name == '') {
            echo $msg = "Name is required";
        } else if ($email == '') {
            echo $msg = "Name is required";
        } else if ($phone == '' || !is_numeric($phone)) {
            echo $msg = "Phone is required and must be nemeric";
        } else if ($password == '' || $password != $confirmpassword) {
            echo $msg = "Password error";
        }else {
            $newname = strtoupper(substr(str_replace(" ", "", $name),0,3));
            $otp = $newname . rand(100, 1000);
			$otp1 = $newname . rand(100, 1000);
            //$msg1 = $name."+,+".$otp."+is+your+one+time+password,+for+registration+of+your+account+on+Shoppingmoney.in.";
			$msg1 = urlencode("$otp is your one time password, for registration of your account on Shoppingmoney.in"); // otp sending code put here
$ID = 'argecom';
$Pwd = 'argecom';
$PhNo = $phone; 
 
$Text = $msg1;

$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";
//echo $url;
//$ret = file($url);
//echo $ret[9];
//curl url
$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
//curl url
// Sending mail here
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Shoppingmoney<info@shoppingmoney.com>' . "\r\n";
$subject = "Your OTP $otp1";
	$message = "Dear $name,<br/><br/>$otp1 is your one time password, for registration of your account on Shoppingmoney.in";
	$dbAccess->insertData("otp","email,otp,date","'$email','$otp1',now()");

	$body = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
	mail($email,$subject,$body,$headers);


             // rempve this code from here
             
            $tableNmae = "register_vendor";
            $fieldName = "title,name,email,phone,password,zipcode,store,comp_name,status,date,otp";
            $valueName = "'" . $helper->escapeStr($title) . "','" . $helper->escapeStr($name) . "','" . $helper->escapeStr($email) . "','" . $helper->escapeStr($phone) . "','" . $helper->escapeStr($password) . "','0000','" . $helper->escapeStr($store) . "','" . $helper->escapeStr($company) . "','0',now(),'" . $helper->escapeStr($otp) . "'";
            $dbAccess->insertData($tableNmae, $fieldName, $valueName);
            $last_id = $dbAccess->LastId();
            $new_name = str_replace(" ", "_", $name);
            $dbAccess->updateData("update register_vendor set unique_user_id = '$new_name.$last_id' where id = '$last_id' ");
            echo $msg = "Success: You have successfully registered with us please login to complete your further registration";
//die();
			if($last_id>0){
				header("location:otp.php?email=$email");
			}
        }
    }
}
//logIn method put here username,password
if (isset($_POST['LogIn'])) {
    if ($username == null || $password == null) {
        $msglog = "Please enter correct values";
    } else {
        $count = $dbAccess->countDtata("select * from register_vendor where email = '" . $helper->escapeStr($username) . "' And password = '" . $helper->escapeStr($password) . "' ");
        if ($count > 0) {
            $IFetcH = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $helper->escapeStr($username) . "' And password = '" . $helper->escapeStr($password) . "' ");
            if ($IFetcH['otpstatus'] == 0) {
                $_SESSION['auth_first'] = $username;
				header("location:otp.php?email=$username");
            }
			if ($IFetcH['status'] == 0) {
                $_SESSION['auth_first'] = $username;
                header("location:vendor/authentication.php");
				//header("location:otp.php?email=$username");
            } else {
                $_SESSION['userEmail'] = $username;
                header("location:vendor/index.php");
            }
        } else {
            $msglog = "Incorrect email or password";
        }
    }
}
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
.sbtbtn {
    width: 120px;
    height: 35px;
    background: #26ACCE;
    border: none;
    color: #fff;
    margin-left: 10px;
}

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
.rightpanel ul li{
line-height:3em;
color: grey;
}
.rightpanel ul li a{
color:grey;
}

.rightpanel span{
padding:30px;
color: red;
}

#category{

margin-left: 2%;
    box-shadow: grey 1px 2px 1px 2px;
	height:auto;
	margin-bottom:5%;}
	
#category2{
	    margin-left: 5%;
    margin: 0 5% 5%;
    box-shadow: rgba(0, 0, 0, 0.25) 1px 1px 1px 1px;
	padding: 40px 0 20px 0;
}

.rightpanel{
font-size:15px;
box-shadow:0 5px 8px 2px rgba(0, 0, 0, 0.1), 0 10px 16px 0 rgba(0, 0, 0, 0.19);

}

.fqhead{margin-top: -30px;}
#color-head{
	color: #26acce !important;
	font-weight:700;
}
#querylisit li{
	line-height:1.5em;
	font-size:13px;
}
#ques{
	font-weight: 700;
    padding: 0;
    font-size: 14px;
}

		</style>
		

    </head>
    <body style="background:#f7f7f7;">


		 <!-- HEADER-AREA START -->
        <header  class="header-area" style="background:#fff;margin-top: -22px;margin-top: -22px;padding-top: 15px;">

            <!-- HEADER-MIDDLE START -->
            <div  class="header-middle">
                <div class="container">
                    <!-- Start Support-Client -->



                    <!-- End Support-Client -->
                    <!-- Start logo & Search Box -->
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-3 ">
                            <div class="logo">
                                <a href="index.php" title="ShoppingMoney"><img src="img/logo.png" alt="" style="max-width: 116%;margin-left: 10px;"></a>
                            </div>
                        </div>
                        <div class="col-lg-9">


                            <div class="top-cart">

                                <table width="100%">

<script>
function logInvendor(){


var a=$("#username").val();
var b=$("#password").val();
var i=0;
if(a==null || a==''){
i=1;
$("#msgu").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(b==null || b==''){
i=1;
$("#msgp").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}

if(i == 1){
//alert(i);
return false;
}
else{
return true;
}
}


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
var a=$("#username").val();
var b=$("#password").val();
$("#username").change(function(){
if(a!=null || a!=''){
$("#msgu").fadeOut(200);
}
});
$("#password").change(function(){
if(b!=null || b!=''){
$("#msgp").fadeOut(200);
}
});
});
</script>
                                    <form  method="post" onsubmit="return logInvendor()">
                                        <tr>
                                            <td style="padding-right: 10px;">Email<br><input type="text" name="username" id="username" placeholder="Email Id" class="form-control">
<span style="display:none;" id="msgu">Please Enter Your Username</span>
</td>

<td>Password<br><input type="password" class="form-control" id="password" name="password" placeholder="Password">
<span style="display:none;" id="msgp">Please Enter Your Password</span>
</td>

                                            <td width="30%"><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#forgetpassvendor">Forgot Password?</a><br><input type="submit" name="LogIn" id="LogIn" value="Log In" class="sbtbtn" /></td>
                                        </tr>

                                    </form>
                                </table>
                                <style>
                                    .alertmsg{
                                        color:red;font-size:14.5px;width: 100%;top: 0px;left: 0px;
                                    }
                                </style>
                                <div class="alertmsg">
                                    <p><?= $msglog; ?></p>
                                </div>





                            </div>
                        </div>
                        <!-- End logo & Search Box -->
                    </div> 
                </div>
                <!-- HEADER-MIDDLE END -->
                <!-- START MAINMENU-AREA -->
                <div class="mainmenu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mainmenu hidden-sm hidden-xs">

                                    <nav>
                                        <ul>

                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="#">How it Works</a></li>

                                            <li><a href="price.php">Pricing</a></li>

                                            <li><a href="benefit.php">Benefit</a></li>
                                           
                                            <li><a href="faq.php">FAQ</a></li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN-MENU-AREA -->
                <!-- Start Mobile-menu -->
                <div class="mobile-menu-area hidden-md hidden-lg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <nav id="mobile-menu">
                                    <ul>
                                        <li><a href="#">Home</a>
                                            <ul>
                                                <li><a href="#">Home Page 1</a></li>
                                                <li><a href="#">Home Page 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Bestseller Products</a></li>
                                        <li><a href="#">New Products</a></li>
                                        <li><a href="#">Pages</a>
                                            <ul>
                                                <li><a href="#">Cart</a></li>
                                                <li><a href="#">Checkout</a></li>
                                                <li><a href="#">Create Account</a></li>
                                                <li><a href="#">Login</a></li>
                                                <li><a href="#">My Account</a></li>
                                                <li><a href="#">Product details</a></li>
                                                <li><a href="#">Shop Grid View</a></li>
                                                <li><a href="#">Shop List View</a></li>
                                                <li><a href="#">Wish List</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Mobile-menu -->
        </header>
        <!-- HEADER AREA END -->
         <div class="fqhead">
          <img src="img/faqhead.jpg" >
        </div>
   

		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="padding: 51px 0px;">
			<div class="container">
	            
				<div class="row">
				<div class="col-md-8" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
				           
												
					<img src="images/price-banner-1.jpg">						
  </div>
                        <div class="col-md-3">
						<div class="rightpanel">
                                                    <h4><b>NEW QUESTIONS</b></h4><hr style="border-top: 3px solid #E6E6E6;">
													
<ul id="querylisit">
<li><span id="ques">Q.How can I check my order status?</span></li>
<li>A. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum</li><hr>
<li><span id="ques">Q.How can I check my order status?</span></li>
<li>A. Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum</li><hr>

</ul>

<!-- <span><h6><a href="#"><b>View more</b> </a></h6></span> -->
					          
                                
                            
							
								
                                         </div>                
				</div>	
					
			</div>
			
			
		</section>
		<!-- END PAGE-CONTENT -->

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
