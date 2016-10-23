<?php
session_start();
ob_start();
//@extract($_POST);
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
 if(isset($_GET['submit']))
 {
	 @extract($_GET);
	 //$query=$dbAccess->selectData("select * from product_tbl WHERE product_id = '' order by rand() LIMIT 0,4 ");
	  $query1=$dbAccess->selectSingleStmt("select * from product_tbl WHERE product_id = '".$product1."'");
	  $img1=$dbAccess->selectSingleStmt("select * from product_img WHERE product_id = '".$product1."'");
	  if(isset($_GET['product2'])){
	  $query2=$dbAccess->selectSingleStmt("select * from product_tbl WHERE product_id = '".$product2."'");
	  $img2=$dbAccess->selectSingleStmt("select * from product_img WHERE product_id = '".$product2."'");
	  }
	  if(isset($_GET['product3'])){
	  $query3=$dbAccess->selectSingleStmt("select * from product_tbl WHERE product_id = '".$product3."'");
		$img3=$dbAccess->selectSingleStmt("select * from product_img WHERE product_id = '".$product3."'");	  }
	  if(isset($_GET['product4'])){
	  $query4=$dbAccess->selectSingleStmt("select * from product_tbl WHERE product_id = '".$product4."'");
		$img4=$dbAccess->selectSingleStmt("select * from product_img WHERE product_id = '".$product4."'");
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








.rating{float:left}
.comparetxt{font-size: 13px;
           font-weight: 600;
           text-align: center;}
		   
.compareprice2{font-size: 13px;
           font-weight: 600;
           text-align: center;
		   color: #0082a2;}		   

		   #comparebox1 img{width:100%;height:auto;}
.compareimg{width: 200px;float: left;height: auto;margin-right:3px;margin-bottom:10px;margin-top: 15px;margin-bottom: 10px;}
.compareimgbox{    margin-top: 10px;
    width: 185px;
    float: left;
    padding: 6px;
    height: 146px;
	z-index: 9999;
    position: relative;
    border: 1px solid #f3f3f3;}

#comparebox1{border: 1px solid #d0d0d0;padding: 15px 12px; background:#fff;height: auto;}
#comparebox2{border: 1px solid #d0d0d0;padding: 15px 12px; background:#fff;height: auto;}
#comparebox3{border: 1px solid #d0d0d0;padding: 15px 12px; background:#fff;height: auto;}
#comparebox4{border: 1px solid #d0d0d0;padding: 15px 12px; background:#fff;height: auto;}

#pricehead{border: 1px solid#ccc;
    padding: 15px 17px;}
	
.priceheadleft{color:#000;font-weight:600;}	
#pricebb{margin-top: -1px;}
.ssb2{padding: 23px 0px;}

		</style>
		<script>
		function hideprod(id){
			//alert("hi i am hideprod "+id);
//document.getElementByClass("n"+id).style.display="none";
//var x = document.getElementsByClassName("n1");
  //  x[0].style.display= "none";
  //document.getElementByID("divn").style.display="none";
   $('.n'+id).hide();
 // document.getElementByID("divP"+id).style.display="none";
  //document.getElementByID("divB"+id).style.display="none";
  //document.getElementByID("divD"+id).style.display="none";
			
		}
		</script>
		
    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		<!-- HEADER AREA END -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content">
			<div class="container">
	           
				<div class="row">
				<div class="col-md-1 col-xs-1"></div>
			        <div class="col-md-10 col-xs-10">
				<li style="display: -webkit-box;"><a href="#"><h5>Home</h5></a>&nbsp;&nbsp;>&nbsp;&nbsp;<a href="#"><h5>All Bands</h5>                               </a>&nbsp;&nbsp;
                                
                          
				</li>
				</div>
					
					<div class="col-md-12 col-xs-12">
						
						<div class="product-area">
							<div class="row">
							
								<div class="col-xs-10" style="margin:0px auto;float:none;"> 
									
									<div class="panel-group" id="accordion">
										
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a  href="#">Compare</a>
												</h4>
											</div>
											<div id="checkout-options" class="collapse in">
												<div class="panel-body">
													<div class="row">
														<div class="col-sm-12">
														
														
														<table class="table table-bordered">
                                                  <thead>
     
                                                 </thead>
                                                     <tbody>
                                                <tr>
											<td ><span class="priceheadleft">Name</span></td>
                                                   <td class="n1">
                                                        <div>
													<a href="javascript:void(0);" onClick="hideprod(1);">	<span style="float:right;"  class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span> </a>
															<span class="comparetxt"><a href="#"><?=$query1['title']?></a></span></br></br>
															<span class="rating">
                                                            <i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i>                                 
                                                            </span>
															<span><img src="<?=$img1['image']?>" class="compareimg"></span>
															
															</div>
															</td>
                                                      <td class="n2">
															<div>
															<a href="javascript:void(0);" onClick="hideprod(2);">	<span style="float:right;"  class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span> </a>
															<span class="comparetxt"><a href="#"><?=$query2['title']?></a></span></br></br>
															<span class="rating">
                                                            <i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i>                                 
                                                            </span>
															<span ><img src="<?=$img2['image']?>" class="compareimg"></span>
															
															</div>
															</td>
															<?php if($_GET['product3']!= 0 ) {?>
		                                                <td class="n3">	
															<div>
															<a href="javascript:void(0);" onClick="hideprod(3);">	<span style="float:right;"  class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span> </a>
															<span class="comparetxt"><a href="#"><?=$query3['title']?></a></span></br></br>
															<span class="rating">
                                                            <i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i>                                 
                                                            </span>
															<span><img src="<?=$img3['image']?>" class="compareimg"></span>
															
															</div>
															</td>
															<?php } ?>
															<?php if($_GET['product4']!= 0) {?>
		                                                 <td class="n4">
															<div>
															<a href="javascript:void(0);" onClick="hideprod(4);">	<span style="float:right;"  class="closediv"><i class="fa fa-times" aria-hidden="true"></i></span> </a>
															<span class="comparetxt"><a href="#"><?=$query4['title']?></a></span></br></br>
															<span class="rating">
                                                            <i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i><i class="fa fa-star" style="color:gray;font-size:10px;"></i>                                 
                                                            </span>
															<span><img src="<?=$img4['image']?>" class="compareimg"></span>
															
															</div>
															</td>
															<?php } ?>
		                                                 
                                                       </tr>
                                                     <tr>
													 <td><span class="priceheadleft">Price</span></td>
													 
													    <td class="n1"><span class="compareprice2">Rs.<?=$query1['mrp']?></span></td>
													    <td class="n2"><span class="compareprice2">Rs. <?=$query2['mrp']?></span></td>
												<?php if($_GET['product3']!= 0) {?>	    <td class="n3"><span class="compareprice2">Rs. <?=$query3['mrp']?></span></td> <?php }?>
												<?php if($_GET['product4']!= 0) {?>			<td iclass="n4"><span class="compareprice2">Rs. <?=$query4['mrp']?></span></td> <?php }?>
													 
                                                        </tr>
														<tr>
														
														<td><span class="priceheadleft">Brand</span></td>
														<td class="n1"><p><?=$query1['brand']?></p></td>
														<td class="n2"><p><?=$query2['brand']?></p></td>
													<?php if($_GET['product3']!= 0) {?>		<td class="n3"><p><?=$query3['brand']?></p></td> <?php }?>
													<?php if($_GET['product4']!= 0) {?>	<td class="n4"><p><?=$query4['brand']?></p></td> <?php }?>
														
														</tr>
														<tr>
														<td><span class="priceheadleft">Description</span></td>
														<td class="n1"><p ><?=$query1['description']?></p></td>
														<td class="n2"><p><?=$query2['description']?></p></td>
													<?php if($_GET['product3']!= 0) {?>	<td class="n3"><p><?=$query3['description']?></p></td> <?php }?>
													<?php if($_GET['product4']!= 0) {?>	<td class="n4"><p><?=$query4['description']?></p></td> <?php }?>
														
														
														</tr>
														
														
                                                        </tbody>
                                                         </table>
														
														
                                                    </div> 

										              <div class="col-sm-12" style="margin-top:-11px; margin-bottom: -21px;">
	                                                  <table class="table table-bordered">
                                                     <tr>
                                                      <th style="background-color: #eee;">Convenience features</th>
                                                       </tr>
                                                       </table>
	                                                    </div>
	
	<div class="col-sm-12">
	<table class="table table-bordered">
    <thead>
     
    </thead>
    <tbody>
      <tr>
        <td>Sleep Mode</td>
        <td>Auto Restart</td>
		<td>Timer</td>
		<td>Timer</td>
		<td>Timer</td>
      </tr>
     
     
    </tbody>
  </table>
	
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
			

</div>
        	
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
