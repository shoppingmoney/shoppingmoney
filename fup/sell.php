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
        <meta http-equiv="" content="">
        <title>Shoppingmoney.in</title>
        <meta name="description" content="">
        <meta name="viewport" content="">

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

        <link rel="stylesheet" type="text/css" href="css/set1.css" />
       <script type="text/javascript" src="mlm/js/ajax.js" />
        <script src="tooltip.js"></script>
        <style>

            .tooltip {
                display: none;
                position: absolute;

                width: 150px;
                padding: 5px 10px;

                border-radius: 3px;
                box-shadow: 2px 2px 2px #999;
                background-color: #AEC6CF;
                font-size: .8em;
                color: #000;
            }

            .tooltip p {
                position: relative;
                z-index: 1;

                margin: 0;
            }

            .tooltip span {
                position: absolute;
                left: 0;
                top: 17px;

                width: 15px;
                height: 15px;
                border-right: 1px solid #AEC6CF;
                border-top: 1px solid #AEC6CF;
                margin-left: 20px;
                margin-top: -19px;

                background: inherit;
                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                transform: rotate(-45deg);
            }

            .tooltip.error {
                background: brown;
                color: #fff;
            }

            .tooltip.error span {
                border-right: 1px solid brown;
                border-top: 1px solid brown;
            }

            label {
                display:none;}

            .top-cart{width:60%;}
            .sbtbtn{width:120px;height:35px;background:#26ACCE;border:none;color:#fff;margin-left:10px;}
            .top-cart a{margin-left:12px;padding-bottom:3px;}

            .category-slider-area{
                margin-top: -23px;
                z-index: 1;
                top: -7px;
                position: relative;
            } 

            .preview-1 .nivo-controlNav {
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                z-index: -1;
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



            .parallax div{
                background-attachment: fixed;

                height: 180vh;
                text-indent : -9999px;

                background-position   : center center;
                background-size       : cover;
                &:nth-child( 2n ) {
                    box-shadow : inset 0 0 1em #111; 
                }
            }


            .foo_a {
                background-image : url(images/sso.jpg);
            }

            .foo_b {
                background-image : url(images/uploadpro.jpg);
            }

            .foo_c {
                background-image : url(images/sellpro.jpg); 
            }

            .foo_d {
                background-image :url(images/easepay.jpg); 
            }

        </style>
    </head>
    <body>


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
        <!-- Category slider area start -->
        <div class="category-slider-area">



            <div class="col-md-13">
                <!-- slider -->
                <div class="slider-area">
                    <div class="bend niceties preview-1">
                        <div id="ensign-nivoslider" class="slides">	
                            <img src="img/sliders/slider-1/se2.jpg" alt="ShoppingMoney" title="#slider-direction-1"/>
                            <img src="img/sliders/slider-1/se1.jpg" alt="ShoppingMoney" title="#slider-direction-2"/>
                            <img src="img/sliders/slider-1/se2.jpg" alt="ShoppingMoney" title="#slider-direction-3"/><!-- 
                            <img src="img/sliders/slider-1/bg4.jpg" alt="" title="#slider-direction-4"/>  -->     
                        </div>
                        <!-- direction 1 -->

                        <!-- direction 2 -->

                        <!-- direction 3 -->

<style>
.help {
    display:none;
    font-size:90%;
}
input:focus + .help {
    display:inline-block;
font-size:12px; color:#00c7f9;
}
</style>


                        <div class="smform">

<!-------- error message start-------->
<div style="background:#d96666;border:1px solid #c43c43;padding:1px 6px;color:#fff;height: 27px;display:none;">
<p style="font-size:14px;">Oops. Something went wrong ...</p>
</div>
<!-------- End of error message ------->

                            <div class="stmbanar">
                                <h1 style="color:#fff; font-size:26px;">REGISTER NOW</h1>

<script>
function regvendor(){

var a=$("#inputName").val();
var b=$("#store").val();
var c=$("#inputPhoness").val();
var d=$("#inputEmail").val();
//var e=$("#password").val();
//var f=$("#password").val();
//vp1,ve1,vp1, vs1,vn1
//alert(isNaN(a));
//alert(isNaN(c));
//alert(c);
var i=0;
if(a==null || a==''){
i=1;
$("#vn1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(isNaN(a)==false){
i=1;
$("#vn1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(b==null || b==''){
i=1;
$("#vs1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(c==null || c==''){
i=1;
$("#vp1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(isNaN(c)==true){
i=1;
$("#vp1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
}
if(d==null || d==''){
i=1;
$("#ve1").css({"display":"block","color":"red","font-size":"14px","padding":"1px","font-family":"calibri"});
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


<script>
$(document).ready(function(){
var a=$("#inputName").val();
var b=$("#store").val();
var c=$("#inputPhoness").val();
var d=$("#inputEmail").val();
var e=$("#password").val();

//vp1,ve1,vp1, vs1,vn1
$("#inputName").change(function(){
if(a!=null || a!=''){
$("#vn1").fadeOut(200);
}
});
$("#store").change(function(){
if(b!=null || b!=''){
$("#vs1").fadeOut(200);
}
});
$("#inputPhoness").change(function(){
if(c!=null || c!=''){
$("#vp1").fadeOut(200);
}
else if(isNaN(c)==true){
$("#vp1").fadeIn(200);
}

});
$("#inputEmail").change(function(){
if(d!=null || d!=''){
$("#ve1").fadeOut(200);
}
});

});
</script>

                                <form  method="post" onsubmit="return regvendor()">
									
                                    <dl>
										<select class="input_select" name="title" id="company" style="width:20%;">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
     
                                                </select>
                                                
                                                
                                        <label for="company_description_phone" class="cm-required cm-trim"> </label>
                                        <input  style="width:79%;height: 27px;" class="input_select" type="text" placeholder="Name" name="name" id="inputName" autocomplete="off" onkeypress="return FilterInput (event)"  value="">

<span id="vn1" style="display:none;">Please Enter only Text Value In This Field</span>

<script type="text/javascript">
        
         function FilterInput (event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			document.getElementById("error").style.display = ret ? "none" : "inline";
			
        }
    </script>
                                    </dl>

                                    <dl>
                                        <label for="company_description_phone" class="cm-required cm-trim"> </label>
                                        <input class="input_select" autocomplete="off" type="text" placeholder="Company Name" name="company" id="store" value="">

<span id="vs1" style="display:none;">This Fields Is Required</span>
                                   </dl>

                                    <dl>       
                                        <input class="input_select" autocomplete="off" type="text" placeholder="Phone" name="phone" id="inputPhoness" maxlength="10" onkeypress="return IsNumeric(event);">
<span id="vp1" style="display:none;">Please Enter only Numerical Value In This Field</span>
 
                                        <label for="company_description_phone" class="cm-email cm-trim cm-required"> </label>
                                    </dl>
                                    <dl>
                                        <input class="input_select" autocomplete="off" type="email" placeholder="Email" name="email" id="inputEmail" value=""  />
<span id="ve1" style="display:none;">Please Enter A valid Email Address In This Field</span>



                                    </dl>
                                    <dl>
                                        <label for="registration_password" class="cm-required"> </label>
                                        <input class="input_select" type="password" autocomplete="off" placeholder="Password" name="password" id="password" value="" />
<span id="vpp1" style="display:none;">Please Choose A Password</span>

                                    </dl>
                                    <dl>
                                        <label for="registration_password" class="cm-required"> </label>
                                        <input class="input_select" autocomplete="off" type="password" placeholder="Confirm Password" name="confirmpassword" id="password" value="" />

                                    </dl>

                                    <dl>

                                   <!--     <dl>
                                            <select class="input_select" name="store" id="company">
                                                <option value="">Business Type</option>
                                                <option value="Computers">Computers</option>
                                                <option value="Fashion">Fashion</option>
                                                <option value="Footwear">Footwear</option>
                                                <option value="Jewelry">Jewelry &amp; Watches</option>
                                                <option value="Home & Kitchen">Home &amp; Kitchen</option>
                                                <option value="Appliances">Appliances</option>
                                                <option value="Mobiles">Mobiles &amp; Tablets</option>
                                                <option value="TV, Audio">TV, Audio &amp; Large Appliances</option>
                                                <option value="Beauty">Beauty &amp; Perfumes</option>
                                                <option value="Automotive">Automotive</option>
                                                <option value="Toys">Toys, Baby &amp; Kids</option>
                                                <option value="WholeSale">WholeSale</option>
                                                <option value="Travel">Travel &amp; Luggage</option>
                                                <option value="Mobile">Mobile &amp; Laptop Accessories</option>
                                                <option value="Books">Books &amp; Daily Needs</option>
                                                <option value="Sports">Sports &amp; Health</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </dl> -->
                                        <dl>
                                            <input type="submit" value="Submit" class="stm_submit_button register_btn" name="submit" id="submit">
                                        </dl>

                                    </dl></form></div>
                        </div>



                    </div>
                </div>
                <!-- slider end-->
            </div>


        </div>
        <!-- Category slider area End -->	

        <!-- START PAGE-CONTENT -->
        <section class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="f-title text-center">
                            <h3 class="title text-uppercase">Grow your business</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-3" style="margin-left: 7%;">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img alt="Team" class="img-responsive" src="img/about/1.jpg">
                                    <div class="mask">
                                        <div class="mask-inner">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Online Payment</h4>
                            <h5>(Text here)</h5>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img alt="Team" class="img-responsive" src="img/about/2.jpg">
                                    <div class="mask">
                                        <div class="mask-inner">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>S.M Advice Doorstep</h4>
                            <h5>(Text here)</h5>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img alt="Team" class="img-responsive" src="img/about/3.jpg">
                                    <div class="mask">
                                        <div class="mask-inner">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Less Accounts</h4>
                            <h5>(Text here)</h5>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="item-team text-center">
                            <div class="team-info">
                                <div class="team-img">
                                    <img alt="Team" class="img-responsive" src="img/about/4.jpg">
                                    <div class="mask">
                                        <div class="mask-inner">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h4>Loyal Customers</h4>
                            <h5>(Text here)</h5>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <article>
                        <div class='parallax'>
                            <div class='foo_a'>Aaa</div>
                            <div class='foo_b'>Bbb</div>
                            <div class='foo_c'>Ccc</div>
                            <div class='foo_d'>Ddd</div>
                        </div>
                    </article>
                </div>
            </div>

            <!--<div class="container">
                    
            
                <div class="row">

                    <div class="col-md-12">
            <center class="sechead"><h3>Shop By Price</h3></center>
            
            <div class="pricepro">
            
                 <div class="pricebox">
        <a href="#" class="sel"><p>&nbsp;Online Payment</p></a>
            </div>
            
                 <div class="pricebox">
                      <a href="#" class="sel"><p>&nbsp;S.M Advice Doorstep</p></a>
            </div>
            
                 <div class="pricebox">
             <a href="#" class="sel"><p>Less Accounts</p></a>
            </div>
             
                  <div class="pricebox">
     <a href="#" class="sel"><p>Loyal Customer</p></a>
            </div>
            
            </div>

            
            </div>
                                    
                                    
                            </div>
                            
                            
                    
                            
                            
                            
                    </div>-->












            <!--<div class="col-lg-12" style="margin-top:70px;">
            
            <img src="img/wall.jpg">
            
            </div>-->









           <div class="smallban">

                <div class="section group">
                    <div class="col span_1_of_5">
                        <img src ="img/secure.png" style="width:40px";>
                        <p><strong>100% security</strong><br>
                           When you buy something on ShoppingMoney on a secure browser: Your payment is secured by TLS, a higher grade of security than SSL.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/trust.png" style="width:40px;">
                        <p><strong>Trust</strong><br>
                           At ShoppingMoney, We Sell without selling out. We focus more on our core principles and customer loyalty than short term commissions and profits.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/quality.png"  style="width:40px;">
                        <p><strong>Quality you will love</strong><br>
                            We at ShoppingMoney believes in the Quality.Hasselfree delivery and A+ grade quality product is our business<br> mantra.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/return.png" style="width:40px;">
                        <p><strong>Easy Return Policy</strong><br>
                            We at Shoppingmoney belives in smooth process, Client's can return their products in one click.<br>give us a shout.</p>
                    </div>
                    <div class="col span_1_of_5">
                        <img src ="img/service.png" style="width:40px;">
                        <p><strong>We care</strong><br>
                            We care what out customers think about our services, because We know, If we don't take care of our customers,Someone else will!! </p>
                    </div>
                </div>



            </div>
            <div style="clear:both;"></div>

            <div class="header-area" style="background:#dadbdb;margin-top: 30px;">
                <div class="container">
                    <div class="row">
                       
                    </div>

                    <?php include("include/tags.php"); ?>

                </div></div>



            <!-- START SUBSCRIBE-AREA -->
            <!--<div class="subscribe-area">
                    <div class="container">
                            <div class="row">
                                    <div class="col-md-8 col-sm-7 col-xs-12">
                                            <label class="hidden-sm hidden-xs">Sign Up for Our Newsletter:</label>
                                            <div class="subscribe">
                                                    <form action="#">
                                                            <input type="text" placeholder="Enter Your E-mail">
                                                            <button type="submit">Subscribe</button>
                                                    </form>
                                            </div>
                                    </div>
                                    <div class="col-md-4 col-sm-5 col-xs-12">
                                            <div class="social-media">
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
            </div>	-->
            <!-- END SUBSCRIBE-AREA -->
        </section>
        <!-- END HOME-PAGE-CONTENT -->





       <?php include("include/footer.php");
  unset($_SESSION['refid']);
  unset($_SESSION['empref']);
 ?>


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

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.montage.min.js"></script>
        <script type="text/javascript">
            $(function () {
                /* 
                 * just for this demo:
                 */
                $('#showcode').toggle(
                        function () {
                            $(this).addClass('up').removeClass('down').next().slideDown();
                        },
                        function () {
                            $(this).addClass('down').removeClass('up').next().slideUp();
                        }
                );
                $('#panel').toggle(
                        function () {
                            $(this).addClass('show').removeClass('hide');
                            $('#overlay').stop().animate({left: -$('#overlay').width() + 20 + 'px'}, 300);
                        },
                        function () {
                            $(this).addClass('hide').removeClass('show');
                            $('#overlay').stop().animate({left: '0px'}, 300);
                        }
                );

                // initialize the plugin
                var $container = $('#am-container'),
                        $imgs = $container.find('img').hide(),
                        totalImgs = $imgs.length,
                        cnt = 0;

                $imgs.each(function (i) {
                    var $img = $(this);
                    $('<img/>').load(function () {
                        ++cnt;
                        if (cnt === totalImgs) {
                            $imgs.show();
                            $container.montage({
                                minsize: true,
                                margin: 2
                            });

                            /* 
                             * just for this demo:
                             */
                            $('#overlay').fadeIn(500);
                            var imgarr = new Array();
                            for (var i = 1; i <= 73; ++i) {
                                imgarr.push(i);
                            }
                            $('#loadmore').show().bind('click', function () {
                                var len = imgarr.length;
                                for (var i = 0, newimgs = ''; i < 15; ++i) {
                                    var pos = Math.floor(Math.random() * len),
                                            src = imgarr[pos];
                                    newimgs += '<a href="#"><img src="images/' + src + '.jpg"/></a>';
                                }

                                var $newimages = $(newimgs);
                                $newimages.imagesLoaded(function () {
                                    $container.append($newimages).montage('add', $newimages);
                                });
                            });
                        }
                    }).attr('src', $img.attr('src'));
                });

            });
        </script>

			<script>
				
	
      
		 function sendMailVendor()
     {     
	var request = checkAjax();
	var email = $("#vendor-email").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim() == "" || !emailReg.test(email)){
		//alert("Pleaser enter a valid email");
		$("#errmsg1").html("Pleaser enter a valid email");
		document.getElementById("errmsg1").style.color = "red";
	}else{
    var url = "vendor/ajaxpage/forgetpassword.php?email="+email;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			document.getElementById("errmsg1").innerHTML = request.responseText;
			document.getElementById("errmsg1").style.color = "green";
			 //$("#errmsg").html("Password has sent on your email");
	         $("#vendor-email").val("");
		}else{
			document.getElementById("errmsg1").innerHTML = "<img src='img/loader.gif' />";
		}
	}
	 }
}
		 </script>
			<!------------------------------------------------------------forget password------------------------------------->
			 <div class="modal fade" id="forgetpassvendor" tabindex="-1" role="dialog" style="    margin-top: -13px;">
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
<p id="errmsg1" style="font-size: 12px;margin: 5px 0px -5px 3px;"></p>
                                                                    <div class="product-select product-type">
                                                                        <label>Email ID</label>
                                                                        <input onkeyup="$('errmsg1').html("");" type="text" class="form-control" name="email" id ="vendor-email" placeholder="Enter your Mobile or Email" required style="width: 250px;">
                                                                    </div>

                                                                   <br>


                                                                    <div class="product-select product-type">
                                                                        <button type="submit" onclick="sendMailVendor();" name="login" id="big" class="toch-button toch-add-cart"> <i class="fa fa-sign-in" aria-hidden="true"></i> Send</button><br>
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
            </div><!-- END forget password popup -->


    </body>


</html>
