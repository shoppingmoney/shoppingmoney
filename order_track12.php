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

.fqhead{margin-top: -30px;}

.bs-wizard {margin-top:0;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background:#4cd41f; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #27a507; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background:#4cd41f;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }


/*END Form Wizard*/

		</style>
		

    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<?php include("include/header.php"); ?>
		
		<!-- HEADER AREA END -->
         
   

		<!-- START PAGE-CONTENT -->
		<!-- START PAGE-CONTENT -->
		<section class="page-content" style="padding-bottom:52px;">
			<div class="container">
	            
				<div class="row">
				<div class="col-md-10" style="margin-left:8%; padding:0">
					<h2 style="padding:6px;background: #26acce; font-size:20px;">My Order</h2>
				</div>
				<div class="col-md-10" style=" padding-top:13px; padding-left: 0px;padding-right: 0px; margin-left:8%; background: #fff">
				            <div class="toch-review-title">
                                               <?php
									$bts=$dbAccess->selectData("select * from checkout_ord where orderid='".$_GET['orderid']."' ");
									foreach( $bts as $t){
									?> 
								<div class="col-md-12" id="category" style="border solid 1px;">
									<div class="col-md-12" style="padding-bottom:1%; margin-bottom: 5%; border-bottom: 1px solid grey;">
										<div class="col-md-6">
											<div class="svepart">
								 				<span class="text-stock">Order Id : <?=$t['orderid']?></span><br>
												<p>Placed on <?=$t['date']?></p>
											</div>
										</div>
									<!--	<div class="col-md-6">
											<button type="submit" name="submit" class="toch-button toch-add-cart" style="float:right;">Details</button>
										</div> -->
									</div>
									<hr>
									<div class="col-md-12">
										<div class="col-md-3">
										<?php $product=$dbAccess->selectSingleStmt("select * from product_tbl where product_id='".$t['product_id']."' ");
												$product_img=$dbAccess->selectSingleStmt("select * from product_img where product_id='".$t['product_id']."' ");
										?>
											<img class="faq_image" src="<?=$product_img['image']?>">
										</div>
										<div class="col-md-6">
                                            <div class="col-sm-12">
												<a href="faqdetails.php?cid=3">   <h4><?=$product['title']?> </h4> </a>
												<p><?=$product['description']?></p>
												<div class="col-md-12">
													<button type="submit" name="submit" class="toch-button toch-add-cart" style="float:right;padding:0 27px;">Return</button>
													<button type="submit" name="submit" class="toch-button toch-add-cart" style="float:right;padding:0 27px;">Invoice</button>
												</div>
                                            </div>
                                        </div>
										<?php $product_address=$dbAccess->selectSingleStmt("select * from checkout where user_id='".$t['user_id']."' ");?>
										<div class="col-sm-3" style="border-left:1px solid grey">
											<p><?=$product_address['address']?>,</p>
											<p><?=$product_address['city']?>,</p>
											<p><?=$product_address['state']?>-<?=$product_address['pincode']?></p>
                                        </div>
									</div>
									<?php	$stat="";
											$completep="disabled";
											$completedi="disabled";
											$completed="disabled";
									if($t['status']==0){
				$stat= "Waiting For Approval";
				
			}else if($t['status']==1){
				$stat= "Order Has Been Recieved";
				$completep="complete";
			}else if($t['status']==2){
				$stat= "Order Has Been Packed And Ready To Dispatched";
			//	$complete="complete";
			}else if($t['status']==3){
				$stat= "Order Has Been Dispatched";
				$completep="complete";
				$completedi="complete";
			}else if($t['status']==4){
				$stat= "Order Has Been Successfully Delivered";
				$completed="complete";
				$completep="complete";
				$completedi="complete";
			}else{
				$stat= "Your Order Has Been Cancelled";
			}
                ?>
									<div class="col-md-12" style="border-bottom:1px dotted grey; margin-bottom:2%;">
										<div class="col-md-6"><p>Status : <span> <?=$stat;?></span></p></div>
										<?php $shipping=$dbAccess->selectSingleStmt("select * from shipping where product_id='".$t['product_id']."' ");?>
										<div class="col-md-6" style="text-align:right;"><p>Estimate time of Delivery: <span> <?=$shipping['estimated_time']?></span></p></div>
									</div>
									<div class="col-md-12">
										<div class="row bs-wizard" style="border-bottom:0;">
									
                <div class="col-xs-4 bs-wizard-step <?=$completep;?>">
                  <div class="text-center bs-wizard-stepnum">Placed</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a class="bs-wizard-dot"></a>
                 
                </div>
                
                <div class="col-xs-4 bs-wizard-step <?=$completedi;?>"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Dispatched</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a class="bs-wizard-dot"></a>
                  
                </div>
                
              
                
                <div class="col-xs-4 bs-wizard-step <?=$completed;?>"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Delivered</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a class="bs-wizard-dot"></a>
                 
                </div>
            </div>
									</div>
										
									
								</div>
									<?}?>
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
