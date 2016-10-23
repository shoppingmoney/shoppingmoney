Editing:  
/home/httpshoppingmone/public_html/beta/selfie.php
 Encoding:    Re-open Use Code Editor     Close  Save Changes

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
		
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/latae.js" type="text/javascript"></script>
		
		<style>
/*=============== Portfolio ===================*/
#portfolio{
    -webkit-transition:all 0.4s linear;
    -moz-transition:all 0.4s linear;
    -ms-transition:all 0.4s linear;
    -o-transition:all 0.4s linear;
    transition:all 0.4s linear;
}
#portfolio-mas {
    float: left;
    width: 100%;

    -webkit-transition:all 0.4s linear;
    -moz-transition:all 0.4s linear;
    -ms-transition:all 0.4s linear;
    -o-transition:all 0.4s linear;
    transition:all 0.4s linear;
}
.portfolio-sec {
    float: left;
    width: 100%;
}
.portfolio-nav {
    display: table;
    float: none;
    margin: 0 auto 40px;
    width: auto;
}
.portfolio-nav > li > a span {
    border: 1px solid #d3d3d3;
    color: #3e3e3e;
    float: left;
    font-family:sans-serif;
    font-size: 12px;
    letter-spacing: 0.3px;
    margin: 0 1px;
    padding: 8px 35px;
    position: relative;
    text-transform: uppercase;

    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    
    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.portfolio-nav > li > a.selected  > span{
    color:#fff;
}
.portfolio-nav > li > a span i {
    position: absolute;
    left: 12px;
    top: 14px;
    color: #FFF;
    opacity: 0;

    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.portfolio-nav > li > a.selected span i{
    opacity: 1;
    left: 15px;
}
.portfolio-nav > li > a.selected {
    color: transparent;
    position: relative;
    z-index: 9;

    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.portfolio-nav > li {
    float: left;
    margin: 0 2px;
}
#portfolio {
    float: left;
    width: 100%;
}
.portfolio {
    float: left;
    margin-bottom: 30px;
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-left: 78px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    -ms-border-radius:3px;
    -o-border-radius:3px;
    border-radius:3px;
}
.portfolio:before{
    background: #000;
    opacity: 0;
    content: "";
    z-index: 1;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;

    -webkit-transition:all 0.2s linear;
    -moz-transition:all 0.2s linear;
    -ms-transition:all 0.2s linear;
    -o-transition:all 0.2s linear;
    transition:all 0.2s linear;

    -webkit-transform:scale(0.8);
    -moz-transform:scale(0.8);
    -ms-transform:scale(0.8);
    -o-transform:scale(0.8);
    transform:scale(0.8);
}
.portfolio:hover:before{
    opacity: 0.77;
    
    -webkit-transform:scale(1);
    -moz-transform:scale(1);
    -ms-transform:scale(1);
    -o-transform:scale(1);
    transform:scale(1);
}
.portfolio > img {
    float: left;
    width: 100%;

    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;

    -webkit-transition: all 0.4s ease 0s;
    -moz-transition: all 0.4s ease 0s;
    -ms-transition: all 0.4s ease 0s;
    -o-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
.portfolio:hover > img{
    -webkit-transform:scale(1.2);
    -moz-transform:scale(1.2);
    -ms-transform:scale(1.2);
    -o-transform:scale(1.2);
    transform:scale(1.2);
}
.portfolio-hover {
    text-align: center;
    padding: 50px 20px;
    position: absolute;
    left: 0;
    top: 50%;
    z-index: 1;
    width: 100%;
}
.portfolio-hover > h3 {
    float: left;
    width: 100%;
    margin-bottom: 50px;
    margin-top:-30px;
    opacity: 0;

    -webkit-transition:all 0.2s ease 0.1s;
    -moz-transition:all 0.2s ease 0.1s;
    -ms-transition:all 0.2s ease 0.1s;
    -o-transition:all 0.2s ease 0.1s;
    transition:all 0.2s ease 0.1s;
}
.portfolio:hover .portfolio-hover > h3 {
    opacity: 1;
    margin-top: 0;
    margin-bottom: 20px;
}
.portfolio-hover > h3 a {
    color: #ffffff;
    float: left;
    font-size: 20px;
    letter-spacing: 0.4px;
    width: 100%;
}
.portfolio-hover > ul {
    opacity: 0;
    text-align: center;
    display: table;
    margin: 0 auto;
    width: auto;
    float: none;

    -webkit-transition:all 0.2s ease 0.2s;
    -moz-transition:all 0.2s ease 0.2s;
    -ms-transition:all 0.2s ease 0.2s;
    -o-transition:all 0.2s ease 0.2s;
    transition:all 0.2s ease 0.2s;
}
.portfolio:hover .portfolio-hover > ul{
    opacity: 1;
}
.portfolio-hover > ul li {
    float: left;
    margin: 0 10px;
    position: relative;
}
.portfolio-hover li:before {
    color: #ffffff;
    content: "/";
    line-height: 13px;
    position: absolute;
    right: -10px;
    top: 0;
}
.portfolio-hover li:last-child:before {
    display: none;
}
.portfolio-hover > ul li a {
    float: left;
    font-family: arimo;
    font-size: 12px;
    letter-spacing: 1.5px;
    line-height: 14px;
    width: 100%;
    text-transform: uppercase;
}
.view-all {
    float: left;
    width: 100%;
    margin-top: 50px;
    text-align: center;
}
.view-all > a {
    background: none repeat scroll 0 0 #bfbaba;
    color: #ffffff;
    display: inline-block;
    padding: 10px 30px;
    text-transform: uppercase;
    font-size: 12px;
    letter-spacing: 0.5px;

    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;

    -webkit-transition:all 0.3s linear;
    -moz-transition:all 0.3s linear;
    -ms-transition:all 0.3s linear;
    -o-transition:all 0.3s linear;
    transition:all 0.3s linear;
}
.project-title {
    left: 0;
    position: absolute;
    top: 50%;
    width: 100%;
}

.style2 .portfolio{
    margin-bottom: 6px;
}
.style2 .portfolio img,.style2 .portfolio{
    width: auto;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    -o-border-radius: 0;
    border-radius: 0;
}
.portfolio-sec.style2 {
    float: none;
    margin: 0 -6px;
    width: auto;
}
.portfolio-sec.style2 > div > div {
    padding: 0 3px;
}

		
		
		
		
		
		



@media only screen and (max-width: 480px) {
.container { 
	position: relative; 
	-webkit-transition: all 1s ease;
  -moz-transition: all 1s ease;
  -o-transition: all 1s ease;
  transition: all 1s ease;	
}

.portfolio {
    float: left;
    margin-bottom: 30px;
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-left: 0px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    -ms-border-radius:3px;
    -o-border-radius:3px;
    border-radius:3px;
}
}

@media only screen and (max-width: 767px) {
	.container { 
		width: 95%; 
	}
	#ads {
		display:none;
	}
.portfolio {
    float: left;
    margin-bottom: 30px;
    position: relative;
    width: 100%;
    overflow: hidden;
    margin-left: 0px;
    -webkit-border-radius:3px;
    -moz-border-radius:3px;
    -ms-border-radius:3px;
    -o-border-radius:3px;
    border-radius:3px;
}
}
/* #Mobile (Landscape) - Note: Design for a width of 480px */
@media only screen and (min-width: 480px) and (max-width: 767px) {
	.container {
		width: 70%;
	}
	}
		
		
		
		
		
		
		
		
		
		.sbtbtn{float:right;margin-top:30px;}
		
		.title14{padding: 12px 6px;
    text-align: center;
    background: #26acce;
    color: #fff;
    font-weight: 600;}


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
				<div class="col-md-3" style="position: absolute;
    z-index: 9999;">
		<div class="category-menu-list" style="display: none;">
	                                <ul>
	                                    <!-- Single menu start -->
										
										
										
	                                    <li class="arrow-plus">
	                                        <a href="#"><i class="fa fa-mobile" style="font-size: 23px;padding: 0px 8px;"></i>Mobile &amp; Accessories</a>
	                                        <!--  MEGA MENU START -->
	                                        <div class="cat-left-drop-menu">
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Handbags</a>
	                                                <ul>
	                                                    <li><a href="#">Blouses And Shirts</a></li>
	                                                    <li><a href="#">Clutches</a></li>
	                                                    <li><a href="#">Cross Body</a></li>
	                                                    <li><a href="#">Satchels</a></li>
	                                                    <li><a href="#">Sholuder</a></li>
	                                                    <li><a href="#">Toter</a></li>
	                                                </ul>
	                                            </div>
												
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Tops</a>
	                                                <ul>
	                                                    <li><a href="#">Evening</a></li>
	                                                    <li><a href="#">Long Sleeved</a></li>
	                                                    <li><a href="#">Short Sleeved</a></li>
	                                                    <li><a href="#">Sleeveless</a></li>
	                                                    <li><a href="#">T-Shirts</a></li>
	                                                    <li><a href="#">Tanks And Camis</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Dresses</a>
	                                                <ul>
	                                                    <li><a href="#">Belts</a></li>
	                                                    <li><a href="#">Cocktail</a></li>
	                                                    <li><a href="#">Day</a></li>
	                                                    <li><a href="#">Evening</a></li>
	                                                    <li><a href="#">Sundresses</a></li>
	                                                    <li><a href="#">Sweater</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Accessories</a>
	                                                <ul>
	                                                    <li><a href="#">Bras</a></li>
	                                                    <li><a href="#">Hair Accessories</a></li>
	                                                    <li><a href="#">Hats And Gloves</a></li>
	                                                    <li><a href="#">Lifestyle</a></li>
	                                                    <li><a href="#">Scarves</a></li>
	                                                    <li><a href="#">Small Leathers</a></li>
	                                                </ul>
	                                            </div>
	                                        </div>
	                                        <!-- MEGA MENU END -->
	                                    </li>
	                                    <!-- Single menu end -->
										<!-- Single menu start -->
	                                    <li class="arrow-plus">
	                                        <a href="#"><i class="fa fa-television" style="font-size: 17px;padding: 0px 3px;"></i>Electronic Appliances</a>
	                                        <!--  MEGA MENU START -->
	                                        <div class="cat-left-drop-menu">
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">BAGS</a>
	                                                <ul>
	                                                    <li><a href="#">Blazers</a></li>
	                                                    <li><a href="#">Bootees Bags</a></li>
	                                                    <li><a href="#">Jackets</a></li>
	                                                    <li><a href="#">Shoes</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">CLOTHING</a>
	                                                <ul>
	                                                    <li><a href="#">Blazers</a></li>
	                                                    <li><a href="#">Bootees Bags</a></li>
	                                                    <li><a href="#">Jackets</a></li>
	                                                    <li><a href="#">Shoes</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">LINGERIE</a>
	                                                <ul>
	                                                    <li><a href="#">Blazers</a></li>
	                                                    <li><a href="#">Bootees Bags</a></li>
	                                                    <li><a href="#">Jackets</a></li>
	                                                    <li><a href="#">Shoes</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Shoes</a>
	                                                <ul>
	                                                    <li><a href="#">Blazers</a></li>
	                                                    <li><a href="#">Bootees Bags</a></li>
	                                                    <li><a href="#">Jackets</a></li>
	                                                    <li><a href="#">Shoes</a></li>
	                                                </ul>
	                                            </div>
	                                        </div>
	                                        <!-- MEGA MENU END -->
	                                    </li>
	                                    <!-- Single menu end -->
	                                    <!-- Single menu start -->
	                                    <li class="arrow-plus">
	                                        <a href="#"><i class="fa fa-female" style="font-size: 16px;padding: 0px 7px;"></i>Women's Fashion</a>
	                                        <!--  MEGA MENU START -->
	                                        <div class="cat-left-drop-menu">
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">Women</a>
	                                                <ul>
	                                                    <li><a href="#">Belts</a></li>
	                                                    <li><a href="#">Jewelry</a></li>
	                                                    <li><a href="#">Socks</a></li>
	                                                    <li><a href="#">Sunglasses</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="#">CLOTHING</a>
	                                                <ul>
	                                                    <li><a href="#">Boots</a></li>
	                                                    <li><a href="#">Brands We Love</a></li>
	                                                    <li><a href="#">Casuals</a></li>
	                                                    <li><a href="#">Gifts And Tech</a></li>
	                                                    <li><a href="#">Gifts And Tech</a></li>
	                                                    <li><a href="#">Slippers</a></li>
	                                                    <li><a href="#">Speakers</a></li>
	                                                </ul>
	                                            </div>
	                                            <div class="cat-left-drop-menu-left cat-left-drop-menu-photo">
	                                            	<a href="#"><img src="img/megamenu/vmega_blog1.jpg" alt="Product"></a>
	                                            </div>
	                                        </div>
	                                        <!-- MEGA MENU END -->
	                                    </li>
	                                    <!-- Single menu end -->
	                                    <!-- Single menu start -->
	                                    <li>
	                                        <a href="#"><i class="fa fa-male" style="font-size: 16px;padding: 0px 7px;"></i>Men's Fashion</a>
	                                    </li>
	                                    <!-- Single menu end -->
	                                    <!-- Single menu start -->
	                                    <li><a href="#"><i class="fa fa-beer" style="font-size: 15px;padding: 0px 5px;"></i>Grocery</a></li>
	                                    <!-- Single menu end -->
	                                    <!-- Single menu start -->
	                                    <li><a href="#"><i class="fa fa-user" style="font-size: 13px;padding: 0px 7px;"></i>Kid's Fashion</a></li>
	                                    <!-- Single menu end -->
	                                    <!-- Single menu start -->
	                                    <li><a href="#"><i class="fa fa-tablet" style="font-size: 15px;padding: 0px 7px;"></i>Pay Bill/Recharge Services</a></li>
										
									   <li><a href="#"><i class="fa fa-tablet" style="font-size: 15px;padding: 0px 7px;"></i>Pay Bill/Recharge Services</a></li>
									   
									   	 <li><a href="#"><i class="fa fa-tablet" style="font-size: 15px;padding: 0px 7px;"></i>Pay Bill/Recharge Services</a></li>
	                                    <!-- Single menu end -->

	                                    <!-- MENU ACCORDION START -->
	                                    <li class=" rx-child">
	                                        <a href="#">Books</a>
	                                    </li>
										<li class=" rx-child">
	                                        <a href="#">Books</a>
	                                    </li>
										<li class=" rx-child">
	                                        <a href="#">Books</a>
	                                    </li>
										<li class=" rx-child">
	                                        <a href="#">Books</a>
	                                    </li>
	                                    <li class=" rx-parent">
	                                        <a class="rx-default" style="margin-left:23px;">
	                                            More 
	                                        </a>
	                                        <a class="rx-show">
	                                            close menu <span class="cat-thumb  fa fa-minus"></span>
	                                        </a>
	                                    </li>
	                                    <!-- MENU ACCORDION END -->
	                                </ul>
	                            </div>
		</div>
					
				</div>
				<div class="row">
					
					<div class="col-md-12 col-xs-12">
						<!-- START PRODUCT-BANNER -->
						
						
						<!-- END PRODUCT-BANNER -->
						<!-- START PRODUCT-AREA -->
						
						<div class="product-area">
							<div class="row">
							
								<div class="col-xs-12" style="margin:0px auto;float:none;">
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
										<!-- Start 1 Checkout-options -->
										<div class="panel panel_default">
											<div>
												<h4 class="title14">
													<span>Selfie Wall </span>
												</h4>
											</div>
<style>
#gall{width:44%;}

@media screen and (max-width: 480px) {
#gall{width:100%;}
}

@media only screen and (max-width: 767px) {

#gall{width:100%;}
}
</style>
											<section>
	<div class="block extra-gap">
		<div class="container">
			<div class="row">
				<div class="col-md-12 column">
					<div class="heading2">
						
					
					</div>

					<div class="row">
						<div class="remove-ext">
							<div class="portfolio-sec">
								<div id="portfolio-mas"> 
								<div class="col-md-6" id="gall">
									<div class="portfolio">
										<img src="images/resource/portfolio-wide1.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio1" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								 
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver1.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio2" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								 
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver2.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio3" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver3.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio4" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver4.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio5" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver5.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio6" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="portfolio">
										<img src="images/resource/portfolio-ver6.jpg" alt="">
										<div class="portfolio-hover">
											<h3><a data-id="portfolio7" href="#" title="">Lorem Ipsum is simply dummy text</a></h3>
											<!--<ul>
												<li><a href="#" title=""></a></li>	
												<li><a href="#" title=""></a></li>
											</ul>-->
										</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Portfolio Popup -->


				</div>
			</div>
		</div>
	</div>
</section>
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

