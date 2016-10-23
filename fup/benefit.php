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
        } else if ($store == '') {
            echo $msg = "Store is required";
        } else {
            $newname = str_replace(" ", "", $name);
            $otp = $newname . rand(100, 1000);
            $msg1 = "Mr.+".$helper->xtreamTrim($name)."+,+".$otp."+is+your+one+time+password,+for+registration+of+your+vendor+account+on+Shoppingmoney.in.";
            // otp sending code put here
$ID = 'infodemo';
$Pwd = 'infodemo';
$PhNo = $phone; 
 
$Text = $msg1;

$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";
//echo $url;
$ret = file($url);
echo $ret[9];
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
             // rempve this code from here
             
            $tableNmae = "register_vendor";
            $fieldName = "title,name,email,phone,password,zipcode,store,comp_name,status,date,otp";
            $valueName = "'" . $helper->escapeStr($title) . "','" . $helper->escapeStr($name) . "','" . $helper->escapeStr($email) . "','" . $helper->escapeStr($phone) . "','" . $helper->escapeStr($password) . "','0000','" . $helper->escapeStr($store) . "','" . $helper->escapeStr($company) . "','0',now(),'" . $helper->escapeStr($otp) . "'";
            $dbAccess->insertData($tableNmae, $fieldName, $valueName);
            $last_id = $dbAccess->LastId();
            $new_name = str_replace(" ", "_", $name);
            $dbAccess->updateData("update register_vendor set unique_user_id = '$new_name.$last_id' where id = '$last_id' ");
            echo $msg = "Success: You have successfully registered with us please login to complete your further registration";
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
            if ($IFetcH['status'] == 0) {
                $_SESSION['auth_first'] = $username;
                header("location:vendor/authentication.php");
            } else {
                $_SESSION['userEmail'] = $username;
                header("location:vendor/index.php");
            }
        } else {
            $msglog = "Incorrecr email or password";
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

        <script src="tooltip.js"></script>


<!---- slide div----->


<!------end slide div------>







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
                background-image : url(img/ab.jpg);
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
			.col-centered{
				float: none;
				margin: 0 auto;
			}
			#about-container{
				padding:10px;
			}
			.about_heading{
				color:#666666;
				font-size: 14px;
				font-weight: 100;
				line-height: 22px;
				text-align: center;
				width: 90%;
				margin: 15px auto;
				letter-spacing: .2px;
			}
			.about_heading{
				text-align:centre !important;
			}



#contain_slide DIV
{ 
     
    padding:10px 0; 
   
}

.hideme
{
    opacity:0;
    padding: 25px 20px 25px 20px;
    height: 360px;
    background: rgba(255, 255, 255, 0.41);
    border-radius: 3px;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.16), 0px 2px 5px 0px rgba(0,0,0,0.23);
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.16), 0px 2px 5px 0px rgba(0,0,0,0.23);
    -webkit-transition: all .8s ease-out;
    transition: all .8s ease-out;
    /* padding: 50px 0; */

}
#benefit-image{
	background:none !important;
	 box-shadow:none !important;
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
                                    <form  method="post">
                                        <tr>
                                            <td style="padding-right: 10px;">Email<br><input type="text" name="username" id="username" placeholder="Email Id" class="form-control"></td><td>Password<br><input type="password" class="form-control" id="password" name="password" placeholder="Password"></td>
                                            <td width="30%"><a href="#" data-toggle="modal" data-dismiss="modal" data-target="#productModalfp">Forgot Password?</a><br><input type="submit" name="LogIn" id="LogIn" value="Log In" class="sbtbtn" /></td>
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

                                            <li><a href="#">Pricing</a></li>

                                            <li><a href="#">Benefit</a></li>
                                           
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
                


        </div>
        <!-- Category slider area End -->	

        <!-- START PAGE-CONTENT -->
        <section class="page-content">
            <div class="container">
                
                

                <div class="row">
                    
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











			
            <div style="clear:both;"></div>
<!------start animate box----->




<div class="col-md-12" style="margin-top:3%;background-image:url(img/shopvector1.jpg);">
    <div class="col-md-11" style="margin-left:8%;">
        <div class="col-md-5" style="margin-top: 4%;">	
           <div id="contain_slide">
                 <!------<img src="img/tra2.png" height:"30" width="20" style="float: right;margin-right: -4%;">------>
              <div class="hideme">
                <!----<div class="col-md-5">
                     <img src="img/face.png" style="margin-left:24px;box-shadow: 1px 1px 4px 0px; border-radius:100px;">
                </div>--->
                <div class="col-md-12" style="    padding: 30px;"> 
                    <h2>Reliable Customer Base</h2>
                    <p>Our customers are our business partners and taking our business to new heights and growing with us.  Every customer has own shopping wallet with minimum deposit of 5000 for first time shopping. These Customers always choose their wallet to shop at Shoppingmoney.in . </p>
					<p>We help you attract customers through loyalty benefit programmes. Our sales on weekends, holidays and festivals sales are attracting a lot of new customers and building customer loyalty among existing customers. Our attractive rewards on every product purchase have grabbed customers’ attention since beginning. Our customers are associated with us on RBMS (Referral Based marketing System) model and invites lots of user every day to shop.</p>
					
                              
                </div>
              </div>
           </div>
		   
		   
		  
		   
		   
        </div>

        <div class="col-md-1" style="height:470px;">
              <div class="prev-year" style="background:#da7777; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px; margin-left: 11%;"  >1</div>

<div class="line" style="border-left:1px dotted grey; width:2px; height: 370px;margin-left: 41%;"></div>

<div class="this-year" style="background:#26acce; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px;     margin-top: 0px; margin-left: 11%;"  >2</div>
        </div>
        <div class="col-md-5" style="margin-top: 4%;">	
            <div id="contain_slide">
                 <!------<img src="img/tra.png" height:"30" width="20" style="float: left;margin-left: -4%;">----->
                <div class="hideme" id="benefit-image">
                <div class="col-md-12">
                     <img src="img/ben.png" style="margin-left:16%;width:290px;">
                </div>
                <!----<div class="col-md-7"> 
                    <h2>Our values</h2>
                    <p>Manage client and firms resources cost effectively.</p>
                </div>--->
                </div>
            </div>
        </div>
    </div>
	<!------------------social media and promotions------->
	
	 <div class="col-md-11" style="margin-left:8%;">
        <div class="col-md-5" style="margin-top: 4%;">	
           
		  <div id="contain_slide">
                 <!------<img src="img/tra.png" height:"30" width="20" style="float: left;margin-left: -4%;">----->
                <div class="hideme" id="benefit-image">
                <div class="col-md-12">
                     <img src="img/ben.png" style="margin-left:16%;width:290px;">
                </div>
                <!----<div class="col-md-7"> 
                    <h2>Our values</h2>
                    <p>Manage client and firms resources cost effectively.</p>
                </div>--->
                </div>
            </div> 
		   
		  
		   
		   
        </div>

        <div class="col-md-1" style="height:470px;">
              <div class="prev-year" style="background:#da7777; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px; margin-left: 11%;"  >3</div>

<div class="line" style="border-left:1px dotted grey; width:2px; height: 370px;margin-left: 41%;"></div>

<div class="this-year" style="background:#26acce; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px;     margin-top: 0px; margin-left: 11%;"  >4</div>
        </div>
        <div class="col-md-5" style="margin-top: 4%;">	
            
			<div id="contain_slide">
                 <!------<img src="img/tra2.png" height:"30" width="20" style="float: right;margin-right: -4%;">------>
              <div class="hideme">
                <!----<div class="col-md-5">
                     <img src="img/face.png" style="margin-left:24px;box-shadow: 1px 1px 4px 0px; border-radius:100px;">
                </div>--->
                <div class="col-md-12" style="    padding: 30px;"> 
                    <h2> Social media and  Promotions</h2>
                    <p>We will take your business to your new highest and help built substantial brand image. Our team of promotion experts will give you insights and recommendations on the latest trends to expand your business. Our listed users across India do complete SMO for product promotion .It helps them generate income and it benefits our sellers to grow without any expense.</p>
					<p>We run Promotion campaign in various segments on our website, so that your product is highlighted and reach target consumers.</p>
					
                              
                </div>
              </div>
           </div>
			
			
			
        </div>
    </div>
	
	<!-------third portion---------->
	
	 <div class="col-md-11" style="margin-left:8%;">
        <div class="col-md-5" style="margin-top: 4%;">	
           <div id="contain_slide">
                 <!------<img src="img/tra2.png" height:"30" width="20" style="float: right;margin-right: -4%;">------>
              <div class="hideme">
                <!----<div class="col-md-5">
                     <img src="img/face.png" style="margin-left:24px;box-shadow: 1px 1px 4px 0px; border-radius:100px;">
                </div>--->
                <div class="col-md-12" style="    padding: 30px;"> 
                    <h2> Training and support</h2>
                    <p>We will help you skill the art of selling   online. Through our specially designed training program, our trainers will train you in listing, packing and cataloging of your product. The training program covers all aspects of e-tailing industry.</p>
					<p>We support our sellers in online merchandising and category management. At Shoppingmoney.in   seller become aware about online trends and how consumers shop online.</p>
					
                              
                </div>
              </div>
           </div>
		   
		   
		  
		   
		   
        </div>

        <div class="col-md-1" style="height:470px;">
              <div class="prev-year" style="background:#da7777; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px; margin-left: 11%;"  >5</div>

<div class="line" style="border-left:1px dotted grey; width:2px; height: 370px;margin-left: 41%;"></div>

<div class="this-year" style="background:#26acce; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px;     margin-top: 0px; margin-left: 11%;"  >6</div>
        </div>
        <div class="col-md-5" style="margin-top: 4%;">	
            <div id="contain_slide">
                 <!------<img src="img/tra.png" height:"30" width="20" style="float: left;margin-left: -4%;">----->
                <div class="hideme" id="benefit-image">
                <div class="col-md-12">
                     <img src="img/ben.png" style="margin-left:16%;width:290px;">
                </div>
                <!----<div class="col-md-7"> 
                    <h2>Our values</h2>
                    <p>Manage client and firms resources cost effectively.</p>
                </div>--->
                </div>
            </div>
        </div>
    </div>
	
<!------- fourth-------->

<div class="col-md-11" style="margin-left:8%;">
        <div class="col-md-5" style="margin-top: 4%;">	
           <div id="contain_slide">
                 <!------<img src="img/tra2.png" height:"30" width="20" style="float: right;margin-right: -4%;">------>
              <div class="hideme" id="benefit-image">
                <!----<div class="col-md-5">
                     <img src="img/face.png" style="margin-left:24px;box-shadow: 1px 1px 4px 0px; border-radius:100px;">
                </div>--->
                <div class="col-md-12">
                     <img src="img/ben.png" style="margin-left:16%;width:290px;">
                </div>
              </div>
           </div>
		   
		   
		  
		   
		   
        </div>

        <div class="col-md-1" style="height:470px;">
              <div class="prev-year" style="background:#da7777; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px; margin-left: 11%;"  >7</div>

<div class="line" style="border-left:1px dotted grey; width:2px; height: 370px;margin-left: 41%;"></div>

<div class="this-year" style="background:#26acce; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px;     margin-top: 0px; margin-left: 11%;"  >8</div>
        </div>
        <div class="col-md-5" style="margin-top: 4%;">	
            <div id="contain_slide">
                 <!------<img src="img/tra.png" height:"30" width="20" style="float: left;margin-left: -4%;">----->
                <div class="hideme">
				
				<div class="col-md-12" style="    padding: 30px;"> 
                    <h2>Seller friendly costing</h2>
                    <p>We don’t charge any fee from our vendors.  We promise you maximum returns with minimum investment. That’s why our seller platform is most appreciated in seller’s community. Products which we will purchase from our vendors will be own net price. We will not charge anything extra from them.</p>
					<p>We manage your inventory free of cost for bulk orders. Our inventory team takes utmost care of your product. It helps in fulfilling orders on time and grows your business fast. We give complete detail of your product and manufacturing.</p>
					
                              
                </div>
                
                <!----<div class="col-md-7"> 
                    <h2>Our values</h2>
                    <p>Manage client and firms resources cost effectively.</p>
                </div>--->
                </div>
            </div>
        </div>
    </div>

<!-----------fifth--------------->
 
		<div class="col-md-11" style="margin-left:8%;">
        <div class="col-md-5" style="margin-top: 4%;">	
           <div id="contain_slide">
                 <!------<img src="img/tra2.png" height:"30" width="20" style="float: right;margin-right: -4%;">------>
              <div class="hideme">
                <!----<div class="col-md-5">
                     <img src="img/face.png" style="margin-left:24px;box-shadow: 1px 1px 4px 0px; border-radius:100px;">
                </div>--->
                <div class="col-md-12" style="    padding: 30px;"> 
                    <h2> Easy pick up and Delivery  </h2>
                    <p>Our logistics Partner ensures faster delivery of your products across India. We ensure timely pick-up and delivery of your products. It gives superior experience for your customers.</p>
					<p>Our pick center in every serviceable city helps in effortless order fulfillment. Delivery personnel are hired after complete background verification.  </p>
					
                              
                </div>
              </div>
           </div>
		   
		   
		  
		   
		   
        </div>

        <div class="col-md-1" style="height:470px;">
              <div class="prev-year" style="background:#da7777; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 17px; margin-left: 11%;"  >9</div>

<div class="line" style="border-left:1px dotted grey; width:2px; height: 370px;margin-left: 41%;"></div>

<div class="this-year" style="background:#26acce; color:#fff; border-radius:550px; width:44px; height:44px; font-size:15px;    padding: 11px 12px;     margin-top: 0px; margin-left: 11%;"  >10</div>
        </div>
        <div class="col-md-5" style="margin-top: 4%;">	
            <div id="contain_slide">
                 <!------<img src="img/tra.png" height:"30" width="20" style="float: left;margin-left: -4%;">----->
                <div class="hideme" id="benefit-image">
                <div class="col-md-12">
                     <img src="img/ben.png" style="margin-left:16%;width:290px;">
                </div>
                <!----<div class="col-md-7"> 
                    <h2>Our values</h2>
                    <p>Manage client and firms resources cost effectively.</p>
                </div>--->
                </div>
            </div>
        </div>
    </div>
	
 </div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
$(function(){  // $(document).ready shorthand
  $('.monster').fadeIn('slow');
});

$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.hideme').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},2000);
                    
            }
            
        }); 
    
    });
    
});
</script>

<!------end animate box----->
 <div style="clear:both;"></div>
            <div class="header-area" style="background:#dadbdb;margin-top: 30px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="color:#000;margin-top:30px;">
                            <div class="brandContainerFooter">
                                <span class="brandLabelFooter">
                                    <a href="#" class="colr1">Mobiles:</a> 
                                </span>
                                <span class="brandValueFooter">
                                    <ul class="footerSubCategoriesUl">
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">HTC Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Apple Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Lava Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Sony Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Nokia Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">LG Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Karbonn Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Spice Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Intex Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Micromax Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Asus Mobiles</a>
                                        </li>
                                    </ul>
                                </span>

                            </div>
                        </div>
                        <div class="col-lg-12" style="color:#000;">
                            <div class="brandContainerFooter">
                                <span class="brandLabelFooter">
                                    <a href="#" class="colr1">Tablets:</a> 
                                </span>
                                <span class="brandValueFooter">
                                    <ul class="footerSubCategoriesUl">
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">ipads</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Samsung Tablets</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Lava Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Sony Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Nokia Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">LG Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Karbonn Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Spice Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Intex Mobiles</a>
                                            <span class="slash">/</span></li>

                                    </ul>
                                </span>

                            </div>
                        </div>


                        <div class="col-lg-12" style="color:#000;">
                            <div class="brandContainerFooter">
                                <span class="brandLabelFooter">
                                    <a href="#" class="colr1">Computers:</a> 
                                </span>
                                <span class="brandValueFooter">
                                    <ul class="footerSubCategoriesUl">
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Lenovo Laptops</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Acer Laptops</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Lava Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Sony Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Nokia Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">LG Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Karbonn Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Spice Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Intex Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Micromax Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Asus Mobiles</a>
                                        </li>
                                    </ul>
                                </span>

                            </div>
                        </div>


                        <div class="col-lg-12" style="color:#000;">
                            <div class="brandContainerFooter">
                                <span class="brandLabelFooter">
                                    <a href="#" class="colr1">Camera:</a> 
                                </span>
                                <span class="brandValueFooter">
                                    <ul class="footerSubCategoriesUl">
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">DSLR Cameras</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Canon Cameras</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Lava Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Sony Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Nokia Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">LG Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Karbonn Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Spice Mobiles</a>
                                            <span class="slash">/</span></li>
                                        <li class="footerSubCategory">
                                            <a href="#" class="colr">Intex Mobiles</a>
                                            <span class="slash">/</span></li>

                                    </ul>
                                </span>

                            </div>
                        </div>






                    </div>

                    <div class="row" style="margin-top:50px;margin-bottom:40px;">
                        <div class="col-lg-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>

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





        <!-- FOOTER-AREA START -->
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




    </body>


</html>
