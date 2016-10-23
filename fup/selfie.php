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
		
		 <link href="css/selfieCSS/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="css/selfieCSS/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="css/selfieCSS/simple-line-icons.css" rel="stylesheet" type="text/css" />
    <link href="css/selfieCSS/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="css/selfieCSS/styles.css" rel="stylesheet" type="text/css" />
		
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/latae.js" type="text/javascript"></script>
		
		<style>




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
    background: #262626;
	TEXT-TRANSFORM: uppercase;
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
							 <!-- CONTENT -->

   <div class="wrap-gallery-slider marg-lg-t30" style="background:#26acce;">
        <div class="swiper-wrap-gallery">
            <div class="swiper-container wpc-gallery-slider" data-autoplay="" data-touch="1" data-mouse="0" data-slides-per-view="responsive" data-loop="1" data-speed="1000" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4"  id="slider-1" data-add-slides="4">
                <div class="swiper-wrapper popup-gallery">
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                    
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div> 
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">

                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                    </div>
                    <!-- .swiper slide -->
                   <div class="swiper-slide">
                        <!-- swiper slide -->
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div> 
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                  
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                    </div>
                    <!-- .swiper slide -->
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div> 
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                  
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>   
                    </div>
                    <div class="swiper-slide">
                        <!-- swiper slide -->
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                   
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div> 
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                    
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                       <div class="s-back-switch slide-wrap wpc-h gallery">
                           <div class="hover-wrap">
                               <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                               <div class="wpc-top-info">
                                  
                                    <a href="gallery-detail.html">
                                        <div class="wrap-text">
                                            <p class="text">Mount Maunganui, Tauranga, New Zealand</p>
                                            <p class="text">NIKON D3200</p>
                                            <p class="text">1/1600 s f/1.8</p>
                                        </div>
                                    </a>
                                </div>  
                                <div class="wpc-soc-icons classic">
                                    <span class="icon"><i class="fa icon-share"></i>
                                        <span class="soc-group">
                                            <a href="#" class="icon"><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="icon"><i class="fa fa-facebook"></i></a>
                                        </span>
                                    </span>                                 
                                </div> 
                                <a href="images/resource/portfolio-ver1.jpg" class="magnific-popup-link wpc-icon-fullscren" data-effect="zoomIn">
                                    <i class="icon-size-fullscreen"></i>                                
                                    <img src="images/resource/portfolio-ver1.jpg" alt="slide" class="s-img-switch"> 
                                </a>
                           </div>                            
                       </div>  
                    </div>
                    <!-- .swiper slide -->
                </div>
                <div class="pagination"></div>          
            </div>
        </div>
        <div class="btn-toggle-slider classic dark">
          <span class="slide-prev slide swiper-arr-left"><i class="fa fa-angle-left"></i></span>
          <span class="slide-next slide swiper-arr-right"><i class="fa fa-angle-right"></i></span>
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
		
		<script src="js/selfieJS/jquery-2.2.3.min.js"></script>
		 <script src="js/selfieJS/idangerous.swiper.min.js"></script>
    <script src="js/selfieJS/isotope.pkgd.min.js"></script>
    <script src="js/selfieJS/jquery.magnific-popup.min.js"></script>
	 <script src="js/selfieJS/main1.js"></script>
		
		
		
		
    </body>


</html>

