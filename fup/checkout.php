ss<?php
error_reporting(0);
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
if(isset($_GET['delid'])){
	$dbAccess->updateData("delete from cart where id = '".$_GET['delid']."' ");
	echo "<script>alert('Item Removed Successfully');</script>";
	echo "<script>window.location='checkout.php';</script>";
	//header("location:checkout.php");
}


?>
<?php
								if(isset($_POST['btnsave'])){
									if($_POST['qty'] <= 0){
										
									  echo "<script>alert('Cart has been updated successfully');</script>";
									  echo "<script>window.location='checkout.php';</script>";
									}else{
									$newprc = $_POST['oldprc']*$_POST['qty'];
									//echo "update cart set qty = '".$_POST['qty']."',mrp='$newprc' where id = '".$_POST['oid']."' ";
									$dbAccess->updateData("update cart set qty = '".$_POST['qty']."',mrp='$newprc' where id = '".$_POST['oid']."' ");
									echo "<script>alert('Cart has been updated successfully');</script>";
									echo "<script>window.location='checkout.php';</script>";
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
#pay{
margin-top:0;
}

#cart_summary{
	background-color:#FFFFFF;
}
.cart-heading{
	padding-top:20px;
	
}
.cs-items-list{
	padding:10px;
}

#headercheck{background:#fff;padding: 11px 10px;
             -webkit-box-shadow: 0 0 8px rgba(0,0,0,0.2);
             -moz-box-shadow: 0 0 8px rgba(0,0,0,0.2);
              box-shadow: 0 0 8px rgba(0,0,0,0.2); 
              margin-bottom: 15px;
             }

.headerrightline{line-height: 48px;text-align:right;}
		</style>
    </head>
    <body style="background:#f7f7f7;">


		<!-- HEADER-AREA START -->
		<div class="col-md-12" id="headercheck">
<div class="col-md-7">
<img src="images/logo.png">
</div>
<div class="col-md-5">
                <h5 class="headerrightline">Lorem Ipsum is a dummy text</h5>
</div>
                </div>
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
							
								<div class="col-xs-10" >
									<!-- Accordion start -->
									<div class="panel-group" id="accordion">
									
									<?php
									if($_SESSION['myemail']!=null || $_SESSION['myemail'] != ''){
										$loginDiv = "style='display:none'";
									}else{
										$loginDiv = "style='display:block'";
									}
									?>
									
										<!-- Start 1 Checkout-options -->
										
										<div class="panel panel_default" <?=$loginDiv;?>>
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#checkout-options">1. Login Options  <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="checkout-options" class="collapse in">
												<div class="panel-body">
													<div class="row">
														<div class="col-md-6 col-xs-12">
															<div class="checkout-collapse">
																<h3 class="title-group-3 gfont-1">New Customer</h3>
																<p>Checkout Options</p>
																<div class="radio">
																	<label>
																		
																		<a href="#" id="reghere" class="modal-view" data-toggle="modal" data-target="#productModalRegister"><h4 style="margin-left: -18px">Register Now</h4></a> 
																	</label>
																</div>
																
																<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
																<input type="submit" class="btn btn-primary" value="Continue"/>
															</div>
														</div>
														<div class="col-md-6 col-xs-12">
															<form method="post" action="mlm/loginborker.php">
<input type="hidden" name="bringback" value="<?=$_SERVER['PHP_SELF'];?>"/>
															
															<div class="checkout-collapse">
																<h3 class="title-group-3 gfont-1">Returning Customer</h3>
																<p>I am a returning customer</p>
																<div class="form-group">
																	<label>E-mail</label>
																	<input type="email" class="form-control" name="email" />
																</div>
																<div class="form-group">
																	<label>Password</label>
																	<input type="password" name="pass" class="form-control" />
															<a href="#" data-toggle="modal" data-dismiss="modal" data-target="#productModalfp">Forgotten Password</a>
																</div>
																<input type="submit" class="btn btn-primary" value="Login"/>
															</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Checkout-options -->
										
										<!-- Start 3 shipping-Address -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(function(){
	$(window).load(function(){
 $("#did").css({"pointer-events": "none", "cursor": "default"}); 
	//$("#did").children().prop('disabled',true);
	});
});
</script>

				
										
										
										
										<!-- Start 6 Checkout-Confirm -->
										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
												<?php
									if($_SESSION['myemail']!=null || $_SESSION['myemail'] != ''){
										$cls = "";
									}else{
										$cls = "collapsed";
									}
									?>
													<a class="accordion-trigger <?=$cls?>" data-toggle="collapse" data-parent="#accordion" href="#checkout-confirm">3.Confirm Order<i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="checkout-confirm" class="collapse">
												<div class="panel-body">
													<div class="table-responsive">
														<table class="table table-bordered table-hover">
															<thead>
																<tr style="border-bottom:1px solid #EEE;">
								<td width="34%"><p>Item Details</p></td>
								<td width="10%"><p>price</p></td>
<td width="10%"><p>Vat</p></td>

								<td width="10%"><p>Quantity</p></td>
								
								<td><p>Subtotal</p></td>
								</tr>
															</thead>
															<tbody>
								<?php
								$prog = new DBQuery();
								$IMg = new DBQuery();
								$product = new DBQuery();
								$system_id=$helper->systemId();
								if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
								$fetch = $prog->selectData("select * from cart where system_id = '$system_id' And user_id = '' ");
								}else{
								$fetch = $prog->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");	
								}
								$sum = 0;
$point = 0;
								foreach($fetch as $tr){
								$protitle=$product->selectSingleStmt("select * from product_tbl where product_id = '".$tr['product_id']."' ");
								$getimg=$IMg->selectSingleStmt("select * from product_img where product_id = '".$tr['product_id']."' ");

$pot = $prog->selectSingleStmt("select * from point where id = '".$protitle['color_code']."'");
$ratio = explode(':',$pot['point_ratio']);

$realratio = $ratio[0]/$ratio[1];

if(($protitle['menual']<=0) || ($protitle['menual']==null)){
$point = $point + (($realratio * $tr['unit_prc'])*$tr['qty']);
}else{
$point = $point + ((1 * $protitle['menual'])*$tr['qty']);
}





//echo $tr['qty'];						

								?>
								<tr>
								<td>
								<div class="main-image images">
										<img alt="#" src="<?=$getimg['image'];?>" width="50" height="40"/><p style="float:right;">&nbsp;
										<a href="checkout.php?delid=<?=$tr['id'];?>"><img src="img/rem.png" height="10" width="15" title="Remove" /></a>
										</p><br/>
										<h4><?=ucfirst($protitle['title']);?></h4>
										
									</div>
								</td>
<?php
$shipping = $product->selectSingleStmt("select * from shipping where product_id = '".$tr['product_id']."' ");
?>
								<td><p>Rs. <?=$tr['unit_prc'];?></p>
<p>shipping charges include(<?=$shipping['shipping_charge'];?>)</p></td>

<td><p>
<?php
$unit1=$tr['unit_prc'];
$vat1=$protitle['vat'];

$newvat = ($vat1*$unit1)/100;
$finalvat = $newvat*$tr['qty'];
echo $finalvat;
?>

</p></td>

								<td><div class="numbers-row">
								
								
								
								<form method="post">
								<input type="text" name="qty" onchange="son(<?=$tr['id'];?>)" id="french-hens" value="<?=$tr['qty'];?>" style="display: block;
font-family: cursive;
color: black;

width: 50px;
margin-top: 1px;" />
									<input type="hidden" name="oid" value="<?=$tr['id'];?>"/>
									<input type="hidden" name="oldprc" value="<?=$tr['unit_prc'];?>"/>
									<input  type="submit" id="son<?=$tr['id'];?>" name="btnsave" value="save" style="display: none;
font-family: cursive;
color: black;
border: none;
width: 50px;
margin-top: 1px;"/>
								</form>
											<script>
												function son(id){
												
													document.getElementById("son"+id).style.display='block';
												}
											</script>	
											</div></td>


								<td><p style="font-size:12px;">You Pay: Rs. <?=($finalvat+$tr['mrp'])+($shipping['shipping_charge']*$tr['qty']);?></p></td>
																</tr>
								
								<?php
								$sum = ($sum+$tr['mrp']+$finalvat)+($shipping['shipping_charge']*$tr['qty']);
								}
								?>
															</tbody>
															<tfoot>
																<tr>
																	<td class="text-right" colspan="4">
																		<strong>Sub-Total:</strong>
																	</td>
																	<td class="text-right">Rs.<?=number_format($sum,2);?></td>
																</tr>
<tr>
<td class="text-right" colspan="4">
																		<strong>Gained point:</strong>
																	</td>
																	<td class="text-right"><?=number_format($point,2);?></td>

</tr>
																
																<tr>
																	<td class="text-right" colspan="4">
																		<strong>Grand Total:</strong>
																	</td>
																	<td class="text-right">Rs.<?=number_format($sum,2);?></td>
																</tr>

<?php

$iiud=$dbAccess->selectsingleStmt("select * from firstimeregd where uemail = '".$_SESSION['myemail']."' ");

$tom = $dbAccess->selectsingleStmt("select sum(cr) as credit,sum(dr) as debit from account where uid = '".$iiud['id']."'");
$balan=$tom['credit']-$tom['debit'];

$ilution = $dbAccess->selectsingleStmt("select count(refrenceid) as ris from tree where refrenceid = '".$iiud['id']."'");
if($ilution['ris'] >= 5){
$icom = "Rs:";
}else{
$icom = "Points:";
}




if(!isset($_GET['reevalue'])){
$cool = "checked";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}else{
if($_GET['reevalue']=='yes'){
$cool = "checked";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}else{
$youpay=$sum;
$cool = "";
}
if($_GET['reevalue']=='no'){
$warm = "checked";
$youpay=$sum;
}else{
$warm = "";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}
}

?>	

	

<!--<tr>
																	<td class="text-right" colspan="4">
																		<strong>You Pay:</strong>
																	</td>
																	<td class="text-right">Rs.<?=number_format($youpay,2);?></td>
																</tr>-->
															</tfoot>
														</table>
										</div>
<!--<div class="buttons pull-left">
<p>Your wallet balance is&nbsp;<?=$icom;?>&nbsp;<?=number_format($balan,2);?></p>
<p>Check yes if you want to use your wallet</p>

<input type="radio" name="offer" value="1"  <?=$cool;?> onClick="pointuse(this.value)" />&nbsp;Yes &nbsp;
<input type="radio" name="offer" value="0" <?=$warm;?> onClick="pointuse(this.value)" />&nbsp;No
</div>-->

<script>
function pointuse(str){
if(str == 0){
window.location="checkout.php?reevalue=no&";
}else{
window.location="checkout.php?reevalue=yes&";
}
}
</script>
													<div class="buttons pull-right">
														<a class="accordion-trigger collapsed btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">Confirm Order</a>
													</div>
													
												</div>
											</div>
										</div>
										<!-- End Checkout-Confirm -->
										
										
										<div class="panel panel_default" >
			   <div class="panel-heading">
			<h4 class="panel-title">
		<a id="did" class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#shipping-address">2.Delivery Details <i class="fa fa-caret-down"></i> </a>
		</h4>
		</div>
		<?php
		$ftch1=$dbAccess->selectsingleStmt("select * from firstimeregd where uemail='".$_SESSION['myemail']."'");
		$ftch=$dbAccess->selectsingleStmt("select * from userdetails where linkid='".$ftch1['id']."'");
		
		?>
		
												<form method="post" action="payment.php" id="undertaking">

		<input type="hidden" name="actionon" id="actionon" value="" />
<input type="hidden" name="crood" id="condt" value="1" />

<input type="hidden" name="point" value="<?=$point;?>"/>

<?php
if(!isset($_GET['reevalue'])){ ?>
<input type="hidden" name="pays" value="<?=$youpay;?>" />
<input type="hidden" name="mode" value="<?="WALLET";?>" />
<?php } 
if($_GET['reevalue']=='no'){ ?>
<input type="hidden" name="pays" value="<?=$sum;?>" />
<input type="hidden" name="mode" value="<?="ONLINE";?>" />
<?php }
if($_GET['reevalue']=='yes'){ ?>
<input type="hidden" name="pays" value="<?=$youpay;?>" />
<input type="hidden" name="mode" value="<?="WALLET";?>" />
<?php } 
?>	
											<div id="shipping-address" class="collapse">
												<div class="panel-body">
													<div class="form-horizontal">
														<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Name</label>
															<div class="col-sm-10">
																<input type="text" class="form-control" placeholder="First Name" readonly  value="<?=$_SESSION['uname'];?>" name="firstname" />
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-sm-2 control-label">Email</label>
															<div class="col-sm-10">
																<input type="text" class="form-control" value="<?=$_SESSION['myemail'];?>" readonly placeholder="Email" name="email" />
															</div>
														</div>

<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Phone</label>
															<div class="col-sm-10">
																<input type="text" value="<?php echo $ftch1['ucontact'];?>" readonly  class="form-control" value="" placeholder="Phone" name="phone" />
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Address 1</label>
															<div class="col-sm-10">
																<input type="text" value="<?php echo $ftch['address'];?>" class="form-control" placeholder="Address 1" required name="address_1" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label">Address 2</label>
															<div class="col-sm-10">
																<input type="text" class="form-control" placeholder="Address 2" name="address_2" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Land Mark</label>
															<div class="col-sm-10">
																<input type="text" class="form-control" placeholder="Land Mark" required  name="mark" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Post Code</label>
															<div class="col-sm-10">
																<input type="text" value="<?php echo $ftch['pin'];?>" readonly  class="form-control" placeholder="Post Code" required  name="postcode" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label"><sup>*</sup>Country</label>
															<div class="col-sm-10">
																<select class="form-control" readonly  name="country" required >

																	<option value="IND" SELECTED> India</option>
																	
																	
																</select>
															</div>
														</div>
														<?php
														$ft1=$dbAccess->selectData("select * from state_district group by state");
														?>
														<div class="form-group"  required >
															<label class="col-sm-2 control-label"><sup>*</sup>Region / State</label>
															<div class="col-sm-10">
																<select class="form-control" name="city" >
																	<option value="<?php echo $ftch['city'];?>"> <?php echo $ftch['city'];?> </option>
															<?php foreach($ft1 as $fts1){?>
																	<option value="<?php echo $fts1['state'];?>" <?php if($fts1['state']== $ftch['state']) {echo "SELECTED";}?> > <?php echo $fts1['state'];?></option> 
															<?php }?>     

																</select>
															</div> 
															
														</div>
														<div class="buttons pull-right" >
							<!--<a href="#" class="modal-view" data-toggle="modal" data-target="#checkout12"><input type="submit" name="submit" class="btn btn-primary" value="Place Order"/></a>-->
<a aria-expanded="false" class="accordion-trigger collapsed btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#make-payment">Place Order  </a>
													</div>
													</div>
												</div>
											</div>
											
											</form>
											
										</div>
										<!-- End shipping-Address -->
										
										
										
										
										
									



										<div class="panel panel_default">
											<div class="panel-heading">
												<h4 class="panel-title">
													<a class="accordion-trigger collapsed" data-toggle="collapse" data-parent="#accordion" href="#make-payment">4. Make Payment <i class="fa fa-caret-down"></i> </a>
												</h4>
											</div>
											<div id="make-payment" class="collapse">
												<div class="panel-body">
													
													
													
													
													
													
													
<div class="tabordion">

<section id="section1">
    <input type="radio" name="sections" id="option1" checked>
    <label for="option1" style="margin-top:-4%;" class="btn btn-primary">My Account</label>
    <article>
    <h4> Redeem from my account</h4>
<div class="buttons pull-left">
<p>Your wallet balance is&nbsp;<?=$icom;?>&nbsp;<?=number_format($balan,2);?></p>
<p>Check yes if you want to use your wallet</p>
<script>
function myFunction(){
document.getElementById("actionon").value = "Wallet";
$('#undertaking').attr('action', 'payment.php');
document.getElementById("undertaking").submit();
}
</script>
<?php
//echo $sum;
if($balan >= $sum){
?>

<input type="submit" class="btn" onclick="myFunction()" name="useit" value="Use Wallet"/><br/>
<!--<input type="radio" name="offer" value="1"  <?=$cool;?> onClick="pointuse(this.value)" />&nbsp;Yes &nbsp;
<input type="radio" name="offer" value="0" <?=$warm;?> onClick="pointuse(this.value)" />&nbsp;No-->
<?php } else { ?>
<!--<input type="radio" name="offer" value="1"  <?=$cool;?> onClick="pointuse(this.value)" />&nbsp;Yes &nbsp;
<input type="radio" name="offer" value="0" <?=$warm;?> onClick="pointuse(this.value)" />&nbsp;No-->
<input type="submit" class="btn" name="useit" disabled value="Use Wallet"/><br/>
The amount of your wallet is less then the price of your purchase please recharge your account first <?php } ?>
<br/><br/><br/><br/>
</div>
      
    </article>
  </section>
<script>
function myFunctionpayu(){
document.getElementById("actionon").value = "ONLINE";
$('#undertaking').attr('action', 'payument.php');
//document.getElementsByTagName("undertaking").setAttribute("action", "payument.php");
document.getElementById("undertaking").submit();
}
</script>
    <section id="section3">
    <input type="radio" name="sections" id="option3" >
    <label for="option3" style="margin-top:-4%;" class="btn btn-primary" >Online Banking</label>
    <article>
<p>Pay online via payumoney</p>
<input type="submit" class="btn" onclick="myFunctionpayu()" name="useit" value="Pay Online"/><br/>

<!--<div class="col-md-12" style="padding:10px;">
    <input type="radio" name="gender" value="male" checked>&nbsp NEFT &nbsp&nbsp&nbsp
    <input type="radio" name="gender" value="female"> &nbspRTGS &nbsp&nbsp&nbsp
    <input type="radio" name="gender" value="female"> &nbspIMPS</div>
      <div class="col-md-5"><input type="text" class="form-control" name="lastname" id="userid" placeholder="Amount" required="" style="width:250px;"> <br>
      <input type="text" class="form-control" name="lastname" id="userid" placeholder="Date" required="" style="width:250px;"></div><br>
      <div class="col-md-5" id="pay"><input type="text" class="form-control" name="lastname" id="userid" placeholder="Bank Name" required="" style="width:250px;"><br>
      <input type="text" class="form-control" name="lastname" id="userid" placeholder="Branch" required="" style="width:250px;"></div>-->
    </article>
  </section>


  <section id="section2">
    <input type="radio" name="sections" id="option2">
    <label for="option2" style="margin-top:-4%;" class="btn btn-primary">Cash on bank</label>
    <article>
      <div class="col-md-12" style="padding:10px;">
    <input type="radio" name="gender" value="male" checked>&nbsp KOTAK &nbsp&nbsp&nbsp
    <input type="radio" name="gender" value="female"> &nbspSBI &nbsp&nbsp&nbsp
    </div>
      <div class="col-md-5"><input type="text" class="form-control" name="lastname" id="userid" placeholder="Amount" required="" style="width:250px;"> <br>
      <input type="text" class="form-control" name="lastname" id="userid" placeholder="Date" required="" style="width:250px;"></div><br>
      <div class="col-md-5" id="pay"><input type="text" class="form-control" name="lastname" id="userid" placeholder="Branch Name" required="" style="width:250px;"><br>
      </div>
    </article>
  </section>


  


  <section id="section4">
    <input type="radio" name="sections" id="option4">
    <label for="option4" style="margin-top:-4%;" class="btn btn-primary">Debit Card</label>
    <article>
      <h4>Extra charges apply</h4>
      
    </article>
  </section>

<section id="section5">
    <input type="radio" name="sections" id="option5">
    <label for="option4" style="margin-top:-4%;" class="btn btn-primary">Credit Card</label>
    <article>
      <h4>Extra charges apply</h4>      
    </article>
  </section>
</div>										
												</div>
											</div>
										</div>
<style>



			h1 {
  color: #333;
  font-family: arial, sans-serif;
  margin: 1em auto;
  width: 80%;
}

.tabordion {
  color: #333;
  display: block;
  font-family: arial, sans-serif;
  margin: auto;
  position: relative;
  width: 80%;
}

.tabordion input[name="sections"] {



}

.tabordion section {
  display: block;
}

.tabordion section label {
  background: #26acce;
  border:1px solid #fff;
  cursor: pointer;
  display: block;
  font-size: 1.2em;
  font-weight: bold;
  padding: 15px 20px;
  position: relative;
  width: 180px;
  z-index:100;
  border: 1px solid gainsboro;
}

.tabordion section article {
  display: none;
  left: 230px;
  min-width: 90%;
  padding: 0 0 0 21px;
  position: absolute;  
  top: 0;
}

.tabordion section article:after {
  background-color: #none;
  bottom: 0;
  content: "";
  display: block;
  left:-229px;
  position: absolute;
  top: 0;
  width: 220px;
  z-index:1;
}

.tabordion input[name="sections"]:checked + label { 
  background: #whitesmoke;
  color: #fff;
}

.tabordion input[name="sections"]:checked ~ article {
  display: block;
}


@media (max-width: 533px) {
  
  h1 {
    width: 100%;
  }

  .tabordion {
    width: 100%;
  }
  
  .tabordion section label {
    font-size: 1em;
    width: 160px;
  }  

 .tabordion section article {
    left: 200px;
    min-width: 270px;
  } 
  
  .tabordion section article:after {
    background-color: none;
    bottom: 0;
    content: "";
    display: block;
    left:-199px;
    position: absolute;
    top: 0;
    width: 200px;

  }  
  
}


@media (max-width: 768px) {
  h1 {
    width: 96%;
  }

  .tabordion {
    width: 96%;
  }
}


@media (min-width: 1366px) {
  h1 {
    width: 70%;
  }

  .tabordion {
    width: 70%;
  }
}


			</style>							
										
										
										<!-- End shipping-Address -->
										
								
										
										
										
										
									</div>
									<!-- Accordion end -->
									
								</div>
								<?php
									if($_SESSION['myemail']!=null || $_SESSION['myemail'] != ''){
										$cart_div = "display:block";
									}else{
										$cart_div = "display:none";
									}
									?>
								
							<div class="col-xs-2" id="cart_summary" Style="background-color:#FFFFFF; padding:5px;<?=$cart_div;?>">
							<?php
							$itme=0;
							if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
								$fetch = $prog->selectData("select * from cart where system_id = '$system_id' And user_id = '' ");
								}else{
								$fetch = $prog->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");	
								}
								foreach($fetch as $tr1){
									$item++;
								}
							?>
							<h4>SUMMARY (<?php echo $item;?> Item)</h4>
							<table style=" width:100%;">
								<?php
								if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
								$fetch = $prog->selectData("select * from cart where system_id = '$system_id' And user_id = '' ");
								}else{
								$fetch = $prog->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");	
								}
								$sum = 0;
$point = 0;

$s=0;
								foreach($fetch as $tr){
									
								$protitle=$product->selectSingleStmt("select * from product_tbl where product_id = '".$tr['product_id']."' ");
								$getimg=$IMg->selectSingleStmt("select * from product_img where product_id = '".$tr['product_id']."' ");

$pot = $prog->selectSingleStmt("select * from point where id = '".$protitle['color_code']."'");
$ratio = explode(':',$pot['point_ratio']);

$realratio = $ratio[0]/$ratio[1];

if(($protitle['menual']<=0) || ($protitle['menual']==null)){
$point = $point + (($realratio * $tr['unit_prc'])*$tr['qty']);
}else{
$point = $point + ((1 * $protitle['menual'])*$tr['qty']);
}

$vatamt = ($tr['unit_prc']*$protitle['vat'])/100;

$shipping = $product->selectSingleStmt("select * from shipping where product_id = '".$tr['product_id']."' ");



//echo $tr['qty'];						

								?>
								<table style="height:35px; width:100%;">
							<tr><?=ucfirst($protitle['title']);?>)</tr>
							<tr style="border-bottom: 1px solid black; padding-bottom:10px;" ><td>Quantity:<?=$tr['qty'];?></td>
		   <td>Rs.<?=($tr['mrp']+$vatamt)+($shipping['shipping_charge']*$tr['qty']);?></td>
							   

							</tr>
							</table>
							
							<?php
								$sum = ($sum+$vatamt+$tr['mrp'])+($shipping['shipping_charge']*$tr['qty']);
								$s=$s+($shipping['shipping_charge']*$tr['qty']);
								}
								?>
							
							<?php

$iiud=$dbAccess->selectsingleStmt("select * from firstimeregd where uemail = '".$_SESSION['myemail']."' ");

$tom = $dbAccess->selectsingleStmt("select sum(cr) as credit,sum(dr) as debit from account where uid = '".$iiud['id']."'");
$balan=$tom['credit']-$tom['debit'];

$ilution = $dbAccess->selectsingleStmt("select count(refrenceid) as ris from tree where refrenceid = '".$iiud['id']."'");
if($ilution['ris'] >= 5){
$icom = "Rs:";
}else{
$icom = "Points:";
}




if(!isset($_GET['reevalue'])){
$cool = "checked";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}else{
if($_GET['reevalue']=='yes'){
$cool = "checked";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}else{
$youpay=$sum;
$cool = "";
}
if($_GET['reevalue']=='no'){
$warm = "checked";
$youpay=$sum;
}else{
$warm = "";
//logic
if($sum > $balan){
$youpay=$sum-$balan;
}else if($sum < $balan){
$youpay=0;
}
//logic
}
}

?>
<table style="height:35px; width:100%;">
<tr style="border-bottom: 1px solid black; padding-bottom:10px;"><td>Delivery Charges:</td>
							   <td ><?php if($s>0){ echo "Rs.".$s;} else{ echo "Free"; }?></td>
							   
							</tr>
							<tr><td>Total:</td>
							   <td>Rs.<?=number_format($sum,2);?></td>
							</tr>
							
							
							
							
							
							<!--<tr style="border-bottom: 1px solid black; padding-bottom:10px;" ><td>You Pay:</td>
							   <td>Rs.<?=number_format($youpay,2);?></td>
							   
							</tr>-->
							</table>
							
							</table>
						<!--	<div id="cartSummary" class="" style="max-height: 563px; position: relative;">
							<div id="cart-summary"><div class=""><div class="cart-heading">SUMMARY (1 Item)</div>
							<div class="" style="max-height: 82px;"><div class="cs-items-list">
							<ul><li class="">
							<div class=" col-xs-24">
							<div class="" title="Samsung Galaxy J3 (8GB)">Samsung Galaxy J3 (8GB)</div>
							<div class=" clearfix">
							</br>
							<span style="float:left;" >Quantity: </span>
							<span class="cs-quantity">1</span>
							
							<div class="" style="float:right;">Rs. 8,490</div>
							</div></div></li></ul></div></div>
							<hr>
							<div class="" style="padding:10px;"><div class=""> 
							<span style="float:left;">Total:</span> 
							<span style="float:right;">Rs. 8,490</span></div> 
							</br>
							<div style="float:left;"> <span>Delivery Charges:</span> 
							<span ><p style="float:right;">Free</p></span> </div>    
							</div>
							<hr>
							<div style="padding:10px;"> 
							
							<span style="float:left;">You Pay:</span>
							<span style="float:right;">Rs. 8,490</span></div>
							<hr>
							<div class=""></div></div></div>
							<div class="">  
							<div class=" clearfix ">
							<div class="row row-icons"> 
							<div class=""> <i class=""> </i> 
							<span class=""> Easy Cancellations </span> </div> <div class=""> <i class=" "> </i>      
							<span class=""> Easy Returns </span> </div> <div class=""> <i class=""> </i>               
							<span class="">100% Payment Protection </span> </div> </div> </div> </div>  -->
							</div>
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
