<?php
session_start();
ob_start();
@extract($_POST);
include 'vendor/lib/Connection.php';
include 'vendor/lib/Fileupload.php';
include 'vendor/lib/DBQuery.php';
include 'vendor/lib/Helpers.php';
include 'vendor/lib/ReturnMsg.php';
$connection = new Connection();
$helper = new Helpers();
$FileUpload = new Fileupload();
$dbAccess = new DBQuery();
$LoadMsg = new ReturnMsg();
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
padding: 40px 0 20px 0;
}

.rightpanel{
font-size:15px;
box-shadow:0 5px 8px 2px rgba(0, 0, 0, 0.1), 0 10px 16px 0 rgba(0, 0, 0, 0.19);

}

.prd{font-size: 14px;
    color: #232323;
    font-weight: 600;}

.ordrt{font-size:12px;color:#989898;font-weight:600}

.trackbtn{background: none;
    border: 1px solid #137eb2;
    color: #137eb2;
    border-radius: 2px;
    padding: 5px;
    text-align: center;
    width: 90px;
    margin-left: 20px;
    cursor: pointer;
    font-size: 15px;
    margin-bottom: 20px;}

.detl{background:#349acc;
     padding:5px 12px;
     color:#fff;
     text-transform: uppercase;
     border-radius:3px;
    margin-top: 5px;
    width: 116px;
}

#updtl{border:1px solid #f3f3f3;padding:5px 2px;background: whitesmoke;margin-top: 30px;}

#cendtl{border:1px solid #f3f3f3;padding-top: 12px;}
.dti{font-size:11px;}
#ird{border:none;border-left: 1px solid #f1f1f1;height:93px;}





.track-progress li.done + li > span:before {
  border-left-color: #349acc;
}

.track-progress li.done + li > #tracklist:before{
   border-left-color:#60cc34 !important;
}



.track-progress li:first-child > span:after,
.track-progress li:first-child > span:before {
  display: none;
}

.track-progress li > span:after,
.track-progress li > span:before {
  content: "";
  display: block;
  width: 0px;
  height: 0px;

  position: absolute;
  top: 0;
  left: -1%;

  border: solid transparent;
  border-left-color: #f0f0f0;
  border-width: 15px;
}


.track-progress li > span:after {
  top: -5px;
  z-index: 1;
  border-left-color: white;
  border-width: 20px;
}

.track-progress li > span:before {
  z-index: 2;
 
}


.track-progress li > span {
  display: block;

  color: #fff;
  font-weight: bold;
  text-transform: uppercase;
}

.track-progress li.done > span {
  color: #fff;
  background-color: #349acc;
}

.track-progress {
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.track-progress li {
  list-style-type: none;
  display: inline-block;

  position: relative;
  margin: 0;
  padding: 0;

  text-align: center;
  line-height: 30px;
  height: 30px;

  background-color: #349acc;
}


.track-progress[data-steps="3"] li { width: 33%; }
.track-progress[data-steps="4"] li { width: 25%; }
.track-progress[data-steps="5"] li { width: 20%; }

#tracklist {
background:#60cc34;
}

		</style>
		

    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="padding: 51px 0px;">
			<div class="container">
	            
				<div class="row">
				<div class="col-md-11" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
				     <div class="toch-review-title">
                                            <h2 style="padding:6px;background: aliceblue; font-size:20px;">Track Order</h2>
                                    </div>
                                    <div class="col-md-12" id="updtl">
					<div class="col-md-10"><span>Order ID: SHOP7217</span><br>
					<span class="dti">Placed on 2016-07-10</span>
				    </div>				

                                </div>
				
					<div class="col-md-2"></div>






<div class="col-md-11" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:3%; background: #fff">
	<div class="track-order-form">
	     <div class="col-md-12" id="cendtl">	  
                     <div class="col-md-2">
                        
                        <img src="../vendor/productImg/l.jpg">
                     </div>
			
		<div class="col-md-7">
		<span class="prd"><p>Blue Heaven ASTRINGENT LOTION</p></p> </span>
	</div>	

    <div class="col-md-3" id="ird">
		<span class="badge1"><span class="ordrt">Order Total:</span> &nbsp; <span style="font-size: 15px;font-weight:600;">Rs 200</span></span>
	</div>

	<div class="col-md-12" style="background:#fff;">
		<div class="col-md-10" style="color:<?=$stcolor;?>">
			Status: <?=$status;?>
		</div>
		<div class="col-md-2">
			<button class="trackbtn">Track</button>
		</div>
	</div>
	<div class="col-md-12" style="margin-bottom: 30px;">
		<ol class="track-progress" data-steps="3">
			<li class="done" >
				<span id="tracklist">PLACED</span>
			</li><!--
-->			<li class="done">
				<span id="tracklist">DISPATCHED</span>
			</li><!--
-->			<li>
				<span>DELIVERED</span>
			</li>
		</ol>
	</div>
	
	
			<div class="col-md-12" style="margin:0px auto; float:none;">
				<div class="col-md-5" style="background: #f7f7f7;margin-right: 15px; padding: 20px; margin-bottom: 20px;">
					<h5>Shipping Information</h5>
					<p>Nikhil Kumar</p>
					<p>Zakir Nagar , address_2, DEL, , 110025</p><br>
					<p>Mobile No: +91-9876543210</p>
				</div>
				<div class="col-md-2"></div>
					<div class="col-md-5" style="background: #f7f7f7;margin-right: 15px; padding: 20px; margin-bottom: 20px;">
						<h5>Seller Information</h5>
						<p>BRAND EYES DISTRIBUTORS PRIVATE LIMITED.-SPARE2-VOI</p>
					</div>
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
