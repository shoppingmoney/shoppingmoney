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
		
		
        <link rel="stylesheet" type="text/css" href="css1/demo.css" />
        <link rel="stylesheet" type="text/css" href="css1/style_common.css" />
        <link rel="stylesheet" type="text/css" href="css1/style1.css" />
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
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

.toch-review-title{margin-bottom:50px;margin-top:20px;}
.toch-review-title2{margin-bottom:50px;margin-top:90px;margin-left: 20px;}
.toch-review-title3{margin-bottom:50px;margin-top:90px;margin-left: 20px;}

.hd{color: #26acce;
    border-bottom: 1px solid;
    padding-bottom: 5px;}
	
.im{width: 80px;
    float: left;
    position: relative;
    left: 30px;}

.txxt{margin-top: 18px;
    position: relative;
    left: 57px;}	

.brandsline{text-align: center;
    
    color: #26acce;
    text-shadow: 1px 0px 2px #000;}

		</style>
		

    </head>
    <body style="background:#fff;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
			 <h1 class="brandsline">BRANDS WE DEAL WITH</h1>
		<section class="page-content">
	
			<div class="container" style="height: 456px; overflow-y: scroll;">
	                      
			    <div>
                <div class="view view-first">
                    <img src="images/Hindustan Unilever.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                   
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="images/ITC.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                    
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="images/PG.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div>  
                <div class="view view-first">
                    <img src="images/nestle.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div>  
				<div class="view view-first">
                    <img src="images/pepsi.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/agropure.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/amul.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/britania.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/cadbury.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/coca cola.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/dabur.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/delmonte.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> <div class="view view-first">
                    <img src="images/gatorade.png" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/haldirams.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/jhonson.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/1.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/1.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/1.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/1.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
                    </div>
                </div> 
				<div class="view view-first">
                    <img src="images/1.jpg" />
                    <div class="mask">
                        <h2>Hover Style #1</h2>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
                      
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
