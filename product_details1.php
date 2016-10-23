s<?php
session_start();
ob_start();
//print_r($_SESSION);
error_reporting(0);
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
if(isset($_SESSION['myemail'])){
	$user_session_id = $_SESSION['myemail'];
}else{
	$user_session_id = '';
}
$fetch = $dbAccess->selectSingleStmt("select * from product_tbl where status = '1' And verify = '1' And product_id = '".$_GET['pid']."' ");
$system_id=$helper->systemId();
if(isset($_POST['submit'])){
$prc=$qty*$prct;
$crl=$dbAccess->countDtata("select * from cart where product_id = '".$_GET['pid']."' And system_id = '$system_id'");
if($crl <= 0){
$dbAccess->insertData("cart","product_id,unit_prc,mrp,qty,system_id,user_id","'".$_GET['pid']."','$prct','$prc','$qty','$system_id','$user_session_id'");
}else{
$dbAccess->updateData("update cart set mrp=mrp+'$prc' , qty = qty+'$qty' where product_id = '".$_GET['pid']."' And system_id = '$system_id' And user_id = '$user_session_id' ");
}
header("location:".$_POST['redirecturi']."");
}


?>

 <?php
                                    
                                             if(isset($_POST['rateus'])){

$lps = $dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$_GET['pid']."'");
											 	$dbAccess->insertData("product_rate","product_id,user_id,rating,name,email,commenti,statusi","'".$_GET['pid']."','".$lps['vendor_id']."','".$_POST['rating']."','".$_POST['name']."','".$_POST['email']."','".$_POST['comment']."','1'");

											 	echo "<script>alert('Thanks for your rating');</script>";


											 }
                                             ?>


<!doctype html>
<html class="no-js" lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Product Details | Shoppingmoney</title>
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
	   <!-- Start percentage progressbar css
         ============================================ -->

.demoright {
  max-width: 150px;
 
}

.demo > div {
  
 
}
<!-- End of percentage progressbar css
         ============================================ -->
	  
.owl-item {
    float: left;
    margin-right: 53px !important;
}	  
#stock{float: left;clear: both; display: block;}

#inner_menu{
margin-top:-2%;
}
.whishlist{
    background:none;
    border:none;

}
.rightt{    margin-top: 20px;
    background: #f7f7f7;
    height: 50px;
    width: 100%;
    color: #696969;
    padding-left: 48px;
    line-height: 50px;}

.rightt ul{width:auto;}

.rightt li{float:left;margin-right: 31px;}

            @font-face {
                font-family:signpainter-housescript;
                src:url('../fonts/signpainter-housescript.ttf');
            }
            .rating {
                overflow: hidden;
                display: inline-block;
				position: relative;
                top: 5px;
            }
            .rating-input {
                float: right;
                width: 16px;
                height: 16px;
                padding: 0;
                margin: 0 0 0 -16px;
                opacity: 0;
            }
            .rating-star {
                display: block;
                width: 16px;

                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star:hover {
                background-position: 0 0;
            }
            .rating-star {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
            .rating-star:hover,
            .rating-star:hover ~ .rating-star {
                background-position: 0 0;
            }
            .rating-star:hover,
            .rating-star:hover ~ .rating-star,
            .rating-input:checked ~ .rating-star {
                background-position: 0 0;
            }
            .rating:hover .rating-star:hover,
            .rating:hover .rating-star:hover ~ .rating-star,
            .rating-input:checked ~ .rating-star {
                background-position: 0 0;
            }
            .rating-star,
            .rating:hover .rating-star {
                position: relative;
                float: right;
                display: block;
                width: 16px;
                height: 16px;
                background: url('starRating/star.png') 0 -16px;
            }
#iconmenu{
margin-left:57px;
}

.product-img a {
    position: relative;
    display: block;
   }

        </style>
	  
	 
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
   </head>
   <body>
      <!-- HEADER-AREA START -->
      <?php include("include/header.php"); ?>



<div class="col-md-1" style="position : absolute; top:149px; ">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat" style="position:absolute;z-index:999999;">
	                            <div class="category-heading">
	                                <a href="#" class="menuicon">
<div class="divmenu"></div>
<div class="divmenu"></div>
<div class="divmenu"></div><span style="color:#fff;">Shop</span>
</a>
									

	                            </div>
								
	                            
	                        </div>
	                    </div>
	                    <!-- END CATEGORY-MENU-LIST -->
	                </div>
<?php include("include/menu2.php"); ?>

      <!-- HEADER AREA END -->
      <!-- START PAGE-CONTENT -->
      <section class="page-content">
         <div class="container">
            <div class="row">

               <div class="col-md-12">
                  <ul class="page-menu">
<?php
$doodle=$dbAccess->selectSingleStmt("select * from product_tbl where product_id = '".$_GET['pid']."'");
?>
                     <li><a href="index.php">Home</a></li>

                     <li class="active"><a href="#"><?=ucwords($doodle['title']);?></a></li>
                  </ul>
               </div>
            </div>
            <div class="row">
              
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- Start Toch-Prond-Area -->
                  <div class="toch-prond-area" id="leftpanel">
                     <div class="row">
                        <div class="col-md-4 col-sm-5 col-xs-12">
                           <div class="clear"></div>
                           <div class="tab-content">
                             <?php
						   $k = 1;
						   $fetchimg = $dbAccess->selectData("select * from product_img where status = '1' And product_id = '".$_GET['pid']."' ");
foreach($fetchimg as $ty){
if($k==1){
$stak = "in active";
}else{
$stak = "";
}
						   ?>
                              <!-- Product = display-1-1 -->
                              <div role="tabpanel" class="tab-pane fade <?=$stak;?>" id="display-<?=$k;?>">
                                 <div class="row">
                                    <div class="col-xs-11">
                                       <div class="toch-photo">
                                          <a href="#"><img src="<?=$ty['image'];?>" data-imagezoom="true" alt="#" /></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- End Product = display-1-1 -->
							  <?php $k++; } ?>
                           </div>
                           <!-- Start Toch-prond-Menu -->
                           <div class="toch-prond-menu">
                              <ul role="tablist">
							  <?php
							    $k=1;
							    $fetchimg = $dbAccess->selectData("select * from product_img where status = '1' And product_id = '".$_GET['pid']."' ");
								foreach($fetchimg as $ty){
								if($k == 1){
								$cl = "active";
								}else{
								$cl = "";
								}
							  ?>
                                 <li role="presentation" class=" <?=$cl;?>"><a href="#display-<?=$k;?>" role="tab" data-toggle="tab"><img src="<?=$ty['image'];?>" alt="#" /></a></li>                                 
								
								 <?php $k++; } ?>
                              </ul>
                           </div>
                           <!-- End Toch-prond-Menu -->
                        </div>
                        <div class="col-md-5 col-sm-7 col-xs-12" style="background:#fff;">
                           <h2 class="title-product" style="padding-top: 10px;"> <?=ucwords($fetch['title']);?></h2>
                           <span class="hert" style="float:left !important;left:95% !important;">
																														<i class="fa fa-heart" style="color:green;"></i>
															</span>
                           <div class="about-toch-prond" id="proidd">
                              <p>
                              <p>Product ID : <?=$fetch['product_num'];?></p>
                              </p>
                           </div>
<hr/>

<style>
.descc{width:100%;height:auto;padding:10px 12px;margin-bottom:54px;margin-top: -15px;}
.descc ul li{float:left;font-size:12px;margin-right:10px;}
#proidd{background: #efad1c;
    padding: 1px 4px;
    color: #fff;
    font-size: 14px;}
	
	.pointvalue{width: 50%;
    height: 25px;
    float: right;
    padding: 3px 10px;
    color: #fff;
    background: #f0bfa0;}
</style> 
 <!--<div class="descc">
 <ul>
 <li>1 Year Manufacturer Warranty</li>
 <li>1 Year Manufacturer Warranty</li>
 <li>1 Year Manufacturer Warranty</li>
 <li>1 Year Manufacturer Warranty</li>
 <li>1 Year Manufacturer Warranty</li>
 <li><a href="#tabsection">View all details</a></li>
 </ul>
 </div>-->
 
 
                           <div class="about-toch-prond">
						   
                              <p>
                              <?php
                              	$qurey = $dbAccess->selectData("select * from product_rate where statusi = '1' And product_id = '".$_GET['pid']."' ");
                              	$total = 0;
                              	$oth = 0;
                              	foreach($qurey as $u){
									$total = $total+$u['rating'];
									$oth++;
								}
								$fin = $total/$oth;
                              ?>
                                 <span class="rating">
                                 <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $fin){
														echo "<i class='fa fa-star-o' style='color:#f9af51;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?> 
                                 
                                 
                                 </span> 
                                  <?php
									   $conpact = $dbAccess->countDtata("select * from product_rate where statusi = '1' And product_id = '".$_GET['pid']."' ");
									?>
<b style="font-size:20px; margin-left:6px;font-weight: 100;">  </b><br/>
<?php
if($conpact > 0){
?>
                              <a href="#tabsection" style="font-size: 13px;"><?=$conpact;?> Reviews</a>
<?php } else { ?>

<?php } ?>
                             
                                 <a href="#tabsection"  style="font-size: 13px;      margin-top: 0; margin-left: 29%;">Write a review</a>
								
                              </p>
                             
                             
                                 <!--<img src="img/sploffr.jpg"> <br>-->
                              
<?php
							  $ship=$dbAccess->selectSingleStmt("select * from shipping where product_id = '".$_GET['pid']."' ");
							   
							  $dsk=$dbAccess->selectSingleStmt("select * from discount where product_id = '".$_GET['pid']."' ");
															if($dsk['discount']==0 || $dsk['discount']==null){
															$amt = null;
															}else{
															$amt = $dsk['discount'];
															}
												if($dsk['discount_type']=='rupees'){
												$savers = $dsk['discount'];
												$atm = $fetch['mrp'];
												$newatm = $fetch['mrp'] - $dsk['discount'];
												$ico = "Rs";
												}else if($dsk['discount_type']=='percent'){
												$savers = ($fetch['mrp'] * $dsk['discount'])/100;
												$atm = $fetch['mrp'];
												$newatm = $fetch['mrp'] - ($fetch['mrp'] * $dsk['discount'])/100 ;
												$ico = "%";
												}else{
												$savers = "";
												$atm = "";
												$newatm = $fetch['mrp'];
												$ico = null;
												}
							  ?>
<?php
$pot = $dbAccess->selectSingleStmt("select * from point where id = '".$fetch['color_code']."'");
$ratio = explode(':',$pot['point_ratio']);
$realratio = $ratio[0]/$ratio[1];
$point = $realratio * $newatm;
?>
 <!--<p class="short-description">
<div class="sploffr">

                                 <p><b>Point Value :</b>
<?php
if(($fetch['menual']=='')||($fetch['menual'] < 0)){
 echo $point;
}else{
echo $fetch['menual'];
}
?>

<br></p>
                              </div>
                             
                              </p>-->
                           
							  
                              <div class="prcpart">
                                 <span class="current-price">
                                    <span>Deal Price :</span> Rs.<?=number_format($newatm,2);?>
                                    <br>
                                    
                                 </span> 
								 
								  <span class="item-stock" id="stock">
                                 Availability: <span class="text-stock">In Stock</span><br/>

 <span>Gained Points :</span> Rs.
<?php
if(($fetch['menual']=='')||($fetch['menual'] <= 0)){
 echo number_format($point,2);
}else{
echo number_format($fetch['menual'],2);
}
?>
<br/>
                                 <div class="svepart">
								 <?php
								 if($dsk['discount']==0 || $dsk['discount']==null){
								 
								 }else{
								 ?>
                                    <p>You Save: Rs. <?=number_format($savers,2);?><br> (<?=$dsk['discount'];?> <?=$ico;?> OFF) <br>
									
									<?php } ?>
									
									<span class="text-stock">Shipping Charge : Rs.<?=$ship['shipping_charge'];?></span></p>
                                 </div>
                              </span>
                              </div>
							  
							  <div class="pointvalue">
							  <p>Point Value : <?php
if(($fetch['menual']=='')||($fetch['menual'] <= 0)){
 echo number_format($point,2);
}else{
echo number_format($fetch['menual'],2);
}
?></p>
							  </div>

                             
                           </div>
<style>
.wishlist{
border: 1px solid rgb(231, 221, 221);
padding: 12px;
background-color: rgb(38, 172, 206);
color: white;
}
#color_style{
width: 45%;
}
</style>	
<div style="clear:both;">&nbsp;<br/></div>


<script>
function myFunction(){
	var ts = document.getElementById("mytexy").value;
	document.getElementById("qutynow").value = ts;
    document.getElementById("undertaking").submit();
}
</script>


<form method="post" action="newtest.php" id="undertaking">
 <input type="hidden" name="prct" value="<?=$newatm;?>">
 <input type="hidden" name="pridnow" value="<?=$_GET['pid'];?>">
 <input type="hidden" id="qutynow" name="qutynow" value="">
</form>



						   <form method="post" style="margin-top:-5%;">
<input type="hidden" name="redirecturi" value="<?=$_SERVER['REQUEST_URI'];?>"/>
                        <input type="hidden" name="prct" value="<?=$newatm;?>">
                           <div class="product-quantity">

<!-------color pickkerr------>


 <!-- <div class="product-select product-color" id="color_style">
                               
   <label>Color<sup>*</sup></label>
                                 <select class="form-control">
                                    <option> --- Please Select --- </option>
                                    <option>Black  </option>
                                    <option>White </option>
                                    <option>Pink </option>
                                    <option>Green </option>
                                 </select>

  
                              </div>
-->
<!-------clor picker--------->
<!--
                              <div class="product-select product-Size" id="color_style">
                                 <label>Size<sup>*</sup></label>
                                 <select class="form-control">
                                    <option> --- Please Select --- </option>
                                    <option>Small </option>
                                    <option>Medium </option>
                                    <option>Large </option>
                                    <option>Extra Large</option>
                                 </select>
                              </div>

-->


                              <span>Quantity</span></br>
                              <input type="number" id="mytexy" value="1" min="1" max="10" name="qty" /></br></br></br>
                             <button type="submit" name="submit" class="toch-button toch-add-cart">Add to Cart</button>
							 <a href="javascript:void(0)" class="toch-button toch-add-cart" onclick="myFunction()" style="padding:11px;">Buy Now</a>
							 <button type="submit" class="toch-button toch-add-cart">Compare</button>
                              	<?php
									if(isset($_SESSION['myemail'])){
										
										$root = $dbAccess->countDtata("select * from wishlist where user_id = '".$_SESSION['myemail']."' And product_id = '".$_GET['pid']."'");
										if($root>0){ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$_GET['pid'];?>)" data-toggle="tooltip" title="Wishlist">
<i class="fa fa-heart-o wishlist" style="color: red !important;" id="hard<?=$_GET['pid'];?>"></i></a>
									<?php	}else{ ?>
											<a href="javascript:void(0)" onclick="wishlist(<?=$_GET['pid'];?>)" data-toggle="tooltip" title="Wishlist">
<i class="fa fa-heart-o wishlist" id="hard<?=$_GET['pid'];?>"></i></a>
									<?php	}
										 ?>
									
							
									<?php
									}else{ ?>

									<a href="#" class="modal-view toch-button toch-add-cart" data-toggle="modal" data-target="#productModal2"  style="padding: 10px 1px;"
><i class="fa fa-heart-o wishlist" style="background:none;border:none;"></i></a>
									
									
									<?php
									}
									?>
									<?php
									if(isset($_GET['q'])){
										
										$sum=$dbAccess->countDtata("select * from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."' ");
										if($sum > 0){
											$dbAccess->updateData("delete from wishlist where user_id ='".$_SESSION['myemail']."' And product_id = '".$_GET['q']."'");
										}else{
$dbAccess->insertData("wishlist","user_id,product_id,status","'".$_SESSION['myemail']."','".$_GET['q']."','1'");
										}
										
										die();										
									}
									?><br><br>

<hr/>


<!-----<ul class="rightt">
<li><img src="images/right.png">&nbsp;Payment Options </li>
<li><img src="images/right.png">&nbsp;Easy Returns</li>
<li><img src="images/right.png">&nbsp;100% Guarantee</li>

</ul>----->
									
									<script>
										function wishlist(str) {
											var c = "hard"+str;
											
  var xhttp;
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
    document.getElementById(c).style.color='red';	
    document.getElementById("txtHint").innerHTML = xhttp.responseText;
		
    }
  };
  xhttp.open("GET", "product-details.php?q="+str, true);
  xhttp.send();
} 
									</script>
                           
                              <!--<button type="submit" class="toch-button toch-compare">Compare</button>-->
                              
                              <!--<a href="#"><img src="img/icon/social.png" alt="#" /></a>-->
                           </div>
						   </form>
                        </div>
                        <div class="col-lg-3 col-sm-7 col-xs-12">
                           <div class="rightpanel">
						   <?php
						  
						   $vendor = $dbAccess->selectSingleStmt("select * from register_vendor where status = '1' And unique_user_id = '".$fetch['vendor_id']."' ");


						   
						   ?>
                            <center> <h4><b>Seller information</b></h4></center><hr style="border-top: 3px solid #E6E6E6;">
							<h6><b>Sold By:</b> <a href="#"><b><?=ucwords($vendor['name']);?></b> </a></h6>



<?php

$vendor2 = $dbAccess->selectSingleStmt("select * from vendor_details where  unique_user_id = '".$vendor ['email']."' ");
?>
							<!----<h6><b>Location:</b> <a href="#"><b><?=ucwords($vendor2['pickup_address']);?></b> </a></h6>---->



							<h1>


							
							<?php
							
							    $newcount = $dbAccess->countDtata("select * from vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' ");
								//echo "select sum(rate) as rat,count(id) as did from vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' And rate >= 3  ";
								$positive = $dbAccess->selectSingleStmt("select sum(rate) as rat,count(id) as did from vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' And rate >= 3  ");
$positive1=$positive['rat'];
$positive2=$positive['did'];

                              	
								$poison = ($positive1*100)/($newcount*5);
								
                              	$qurey = $dbAccess->selectData("select * from  	vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' ");
                              	
                              	$total = 0;
                              	$oth = 0;
                              	foreach($qurey as $u){
									$total = $total+$u['rate'];
									$oth++;
								}
								$fin = $total/$oth;
								
								$posttive = ($total*100)/($oth*5);
                              ?>
                                 <span class="rating">
                                 <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $fin){
														echo "<i class='fa fa-star-o' style='color:#f9af51;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                 </span>
                                
                              </h1>
							 <div class=""style="width:100%;">
                             <!--<div>
							  <h1><?php if($posttive==0){ echo 0; } else { echo $posttive;  } ?>%</h1>
							  <p>Positive Reviews</p>
							  </div>-->
							  
							  <!--<div style="float:right; margin-top: -30%;">
							  <h1><?=$newcount;?></h1>
							  <p>Total Rating</p>
							</div>-->
							  
							  <div class="demo" style="max-width: 128px;display: inline-block;">

      <div class="demo-4" data-percent="<?php if($poison==0){ echo 0; } else { echo number_format($poison,2);  } ?>"></div>
<p style="text-align:left;">Positive Reviews</p>
    </div>
	
	<div class="demoright" style="float: right;">

        <div class="demo-2" data-percent="<?php if($posttive==0){ echo 0; } else { echo number_format($posttive,2);  } ?>"></div>
<p style="text-align: center;">Total Rating</p>
    </div>

	
							


							  </div>
									

  <?php
								 
$overall = $dbAccess->selectSingleStmt("select sum(valuemoney) as mvalue,sum(productqulality)as proquality,sum(rate) as ccv,count(id) as mycnt from vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' ");


$overallsection = $overall['ccv'];

$value_money=$overall['mvalue'];

$productquai=$overall['proquality'];

$vh0=($overallsection*100)/($newcount*5)/10;
$vh1=($productquai*100)/($newcount*5)/10;
$vh2=($value_money*100)/($newcount*5)/10;

$valuestar=ceil($value_money/5);
$qualitystar=ceil($productquai/5);

								 ?>

						  
							<br/><hr>
							 <h5>Detailed Merchant Rating</h5>
                                 <h6><b>Overall Rating :</b> <?=$vh0;?></h6>	
                                 <?php
								 
/*/
$overall = $dbAccess->selectSingleStmt("select sum(valuemoney) as mvalue,sum(productqulality)as proquality,count(id) as mycnt from vendor_rate where status = '1' And vendor_id = '".$vendor['id']."' ");



$value_money=$overall['mvalue'];

$productquai=$overall['proquality'];

$vh1=($productquai*100)/($newcount*5)/10;
$vh2=($value_money*100)/($newcount*5)/10;
/*/
								 ?>
                                <p>Product Quality:
								    &nbsp; <span class="rating">
 <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $qualitystar){
														echo "<i class='fa fa-star-o' style='color:#f9af51;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                
                                 </span>
								  <?php echo number_format($vh1,2);  ?> </p>
                                  <p>Value For Money:
								     <span class="rating">
 <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $valuestar){
														echo "<i class='fa fa-star-o' style='color:#f9af51;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                
                                 </span>
								  <?php echo number_format($vh2,2);  ?> </p>								  
							<br><hr>
							<h5><B>Give Rating To Merchant ? </B></h5>
						<?php
									if(isset($_SESSION['myemail'])){ ?>
									<p><a href="rating.php?merchantid=<?=$vendor['id'];?>"<b>Rate Now</b></a></p>
									<?php
									}else{ ?>
									<p><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2">Rate Now</a></p>
									
									<?php
									}
									?>
							
                           </div>
						  
                        </div>
                     </div>
                     <!-- Start Toch-Box -->
<div style="clear:both;">&nbsp;<br/></div>
                     <div class="toch-box">
                        <div class="row">
                           <div class="col-xs-12" id="tabsection">
                              <!-- Start Toch-Menu -->
                              <div class="toch-menu">
                                 <ul role="tablist">
								 <!--<li role="presentation" ><a href="#highlights" role="tab" data-toggle="tab" >HighLights</a></li>-->
								<!-- <li role="presentation"><a href="#highlights" role="tab" data-toggle="tab">Features</a></li>-->
                                    <li role="presentation"><a href="#description" class="active" role="tab" data-toggle="tab">Description</a></li>
									
                                    <?php
									   $conpact = $dbAccess->countDtata("select * from product_rate where statusi = '1' And product_id = '".$_GET['pid']."' ");
									?>
                                    <li role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Reviews(<?=$conpact;?>)</a></li>
									<?php
									if(isset($_SESSION['myemail'])){ ?>
									<li role="presentation"><a href="#feature" role="tab" data-toggle="tab">Rating</a></li>
									<?php
									}else{ ?>
									<li role="presentation"><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2">Rating</a></li>
									
									<?php
									}
									?>
									
                                 </ul>
                              </div>
                              <!-- End Toch-Menu -->
                              <div class="tab-content toch-description-review">
                                 <!-- Start display-description -->
                                 <div role="tabpanel" class="tab-pane fade in active" id="description">
                                    <div class="row">
                                       <div class="col-xs-12">
                                          <div class="toch-description">
                                            <?=$fetch['description'];?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                    <?php
                                    
                                             if(isset($_POST['rateus'])){
											 	$dbAccess->insertData("product_rate","product_id,rating,name,email,commenti,statusi","'".$_GET['pid']."','".$_POST['rating']."','".$_POST['name']."','".$_POST['email']."','".$_POST['comment']."','1'");
											 	echo "<script>alert('Thanks for your rating');</script>";
											 }
                                             ?>
                                 <!-- End display-description -->
								 
								 
								 
								 <!-- start display Highlights -->
								<!-- <div role="tabpanel" class="tab-pane fade in active" id="highlights">
                                    <div class="row">
                                       <div class="col-xs-12">
                                          <div class="toch-reviews">
                                             <div class="toch-table">
											 <h5>PRODUCT FEATURES</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Brand:</strong></td>
                                                         <td>Reach</td>
                                                      </tr>
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											   <div class="toch-table">
											 <h5>DISPLAY MOBILE</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Display Size (Cms):</strong></td>
                                                         <td>12.7CM(5 INCH)</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Resolution Type:</strong></td>
                                                         <td>720*1280 Pixels</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Display Type:</strong></td>
                                                         <td>IPS</td>
                                                      </tr>
													    <tr>
                                                         <td><strong>Display Size (Inches):</strong></td>
                                                         <td>5 Inch</td>
                                                      </tr>
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											  <div class="toch-table">
											 <h5>GENERAL FEATURES</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Talk Time:</strong></td>
                                                         <td>upto 7 Hours</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Form:</strong></td>
                                                         <td>Bar</td>
                                                      </tr>
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											 <div class="toch-table">
											 <h5>PLATFORM DETAILS</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Operating System:</strong></td>
                                                         <td>Android</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Operating System Version Name:</strong></td>
                                                         <td>Android v5.1 (Lollipop)</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Processor:</strong></td>
                                                         <td>Quad Core</td>
                                                      </tr>
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											  <div class="toch-table">
											 <h5>DIMENSIONS</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Dimensions:</strong></td>
                                                         <td>144*73.1*9.1 mm</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Weight:</strong></td>
                                                         <td>162.6 g</td>
                                                      </tr>
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											   <div class="toch-table">
											 <h5>MEMORY AND STORAGE</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Internal Storage:</strong></td>
                                                         <td>8GB</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>RAM:</strong></td>
                                                         <td>1 GB</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>User Memory:</strong></td>
                                                         <td>Approx 5.5GB</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Expandable Storage:</strong></td>
                                                         <td>Yes, Upto 32GB</td>
                                                      </tr>
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											  <div class="toch-table">
											 <h5>INTERNET & CONNECTIVITY</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Bluetooth:</strong></td>
                                                         <td>BT v2.1</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Audio Jack:</strong></td>
                                                         <td>3.5 mm</td>
                                                      </tr>
													  
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											  <div class="toch-table">
											 <h5>CAMERA</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Primary Camera (Megapixel):</strong></td>
                                                         <td> 5 mp</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Primary Camera Range:</strong></td>
                                                         <td>5 - 7.9 MP</td>
                                                      </tr>
													  <tr>
                                                         <td><strong>Flash:</strong></td>
                                                         <td>Yes</td>
                                                      </tr>
													  <tr>
                                                         <td><strong>Front Facing Camera:</strong></td>
                                                         <td>2.0 Mega Pixels</td>
                                                      </tr>
													  
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 <div class="toch-table">
											 <h5>BATTERY</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Battery Capacity (mAh):</strong></td>
                                                         <td>2500 mAh</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Talktime:</strong></td>
                                                         <td> 7 Hours</td>
                                                      </tr>
													  <tr>
                                                         <td><strong>Standby Time:</strong></td>
                                                         <td >200 hrs</td>
                                                      </tr>
													
													  
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											  <div class="toch-table">
											 <h5>MULTIMEDIA</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>FM</strong></td>
                                                         <td>yes</td>
                                                      </tr>
													  
													
													  
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
											 
											  <div class="toch-table">
											 <h5>MOBILE & TABLETS WARRANTY</h5>
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Warranty Available:</strong></td>
                                                         <td>Manufacturer Warranty</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Warranty Summary:</strong></td>
                                                         <td>1 Year for Handset, 6 months for Battery,Charger and 1 month for Handsfree.</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Device Warranty:</strong></td>
                                                         <td> 1 Year</td>
                                                      </tr>
													   <tr>
                                                         <td><strong>Box Accessories Warranty:</strong></td>
                                                         <td>6 Months</td>
                                                      </tr>
													   
													  
													
													  
													  
													  
													  
													   
                                                        </tbody>
														</table>
                                                     
                                                  
                                                
                                             </div>
                                             
                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                -->
								 <!-- End display Hightlights -->
								 
								 
                                 <!-- Start display-reviews -->
                              
                               <div role="tabpanel" class="tab-pane fade" id="feature">
                                    <div class="row">
                                    
                                       <div class="col-xs-12">
                                         <form method="post">
                                          <div class="toch-reviews">
                                             <div class="toch-table">
                                                <table class="table table-striped table-bordered">
                                                   <tbody>
                                                      <tr>
                                                         <td><strong>Ratings</strong></td>
                                                         <td class="text-right"></td>
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                            
                                                            <span class="rating">
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-5" name="rating" value="5">
                                                    <label for="rating-input-1-5" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-4" name="rating" value="4">
                                                    <label for="rating-input-1-4" class="rating-star"></label>

                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-3" name="rating" value="3">
                                                    <label for="rating-input-1-3" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-2" name="rating" value="2">
                                                    <label for="rating-input-1-2" class="rating-star"></label>
                                                    <input type="radio" class="rating-input"
                                                           id="rating-input-1-1" name="rating" value="1">
                                                    <label for="rating-input-1-1" class="rating-star"></label>
                                                
                                                </span>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                             <div class="toch-review-title">
                                                <h2>Write a review</h2>
                                             </div>
                                          
                                             
                                             <div class="review-message">
                                                <div class="col-xs-12">
                                                   <p><sup>*</sup>Your Name <br>
                                                      <input type="text" required="" readonly="" value="<?php echo $_SESSION['uname'];?>" name="name" class="form-control" />
                                                   </p>
                                                   <p><sup>*</sup>Your Email <br>
                                                      <input type="email" required="" readonly="" value="<?php echo $_SESSION['myemail'];?>" name="email" class="form-control" />
                                                   </p>
                                                   <p><sup>*</sup>Comments <br>
                                                      <textarea name="comment" required="" class="form-control"></textarea>
                                                   </p>
                                                </div>
                                               
                                               
                                                <div class="buttons clearfix">
                                                   <button type="submit" name="rateus" class="btn btn-primary pull-right">Rate Now</button>
                                                </div>
                                             </div>
                                             
                                          </div>
</form>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div role="tabpanel" class="tab-pane fade" id="reviews">
                                    <div class="row">
                                       <div class="col-xs-12">
                                          <div class="toch-reviews">
                                             <div class="toch-table">
											 <h3>PRODUCT RATINGS</h3>
                                                  <?php
                                                
                                                  	$qurey = $dbAccess->selectData("select * from product_rate where statusi = '1' And product_id = '".$_GET['pid']."' ");
                                                  	foreach($qurey as $y){
																									
                                                  ?>
                                                  <?php
                                                  for($i=1;$i<=5;$i++){
                                                  	if($i > $y['rating']){
														echo "<i class='fa fa-star' style='color:gray;'></i>";	
													}else{
														echo "<i class='fa fa-star' style='color:#f9af51;'></i>";													
													}                                               								  	
												  }
												  
                                                  ?>
                                                  
                                                  <p>
                                                  	<b>Name:</b> <?=$y['name'];?>
                                                  </p> 
                                                  <p><b>Email:</b> <?=$y['email'];?></p>
                                                
                                                  <b>Comment:</b> <?=$y['commenti'];?>
                                                  <hr/>
                                                  <?php } 
                                                  ?>                                                 
                                                  
                                                
                                             </div>
											 
                                            
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- End Product = display-reviews -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Toch-Box -->
                     <!-- START PRODUCT-AREA -->
                     <div class="product-area">
                        <div class="row">
                           <div class="col-xs-12 col-md-12">
                              <!-- Start Product-Menu -->
                              <div class="product-menu">
                                 <div class="product-title">
                                    <h3 class="title-group-2 gfont-1">Related Products</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- End Product-Menu -->
                        <div class="clear"></div>
                        <!-- Start Product -->
                        <div class="product carosel-navigation" style="overflow: hidden;">
                            <!-- Start Product -->
							<div class="row">
								<div class="col-xs-12 col-md-12">
									<div class="" style="background:#fff;">

										<div class="tab-content">
											<!-- Product = display-1-1 -->
											<div role="tabpanel" class="tab-pane fade in active" id="display-1-1">
												<div class="row">
													<div class="active-product-carosel">
													<?php
												$imgs = array();
												$getid = $_GET['product'];
												$img = new DBQuery();
												$disc = new DBQuery();
												$qurey = $dbAccess->selectData("select * from product_tbl where status = '1' And verify = '1' order by RAND() LIMIT 0,7");
												foreach($qurey as $nth){
																$ngh = $img->selectData("select * from product_img where product_id = '".$nth['product_id']."' ");
																foreach($ngh as $ftch){
															    $imgs[] = $ftch['image'];
												                }
															$dsk=$disc->selectSingleStmt("select * from discount where product_id = '".$nth['product_id']."' ");
															if($dsk['discount']==0 || $dsk['discount']==null){
															$amt = null;
															}else{
															$amt = $dsk['discount'];
															}
												if($dsk['discount_type']=='rupees'){
												$atm = $nth['mrp'];
												$newatm = $nth['mrp'] - $dsk['discount'];
												$ico = "Rs";
												}else if($dsk['discount_type']=='percent'){
												$atm = $nth['mrp'];
												$newatm = $nth['mrp'] - ($nth['mrp'] * $dsk['discount'])/100 ;
												$ico = "%";
												}else{
												$atm = "";
												$newatm = $nth['mrp'];
												$ico = null;
												}
												//price												
												?>
														<!-- Start Single-Product -->
														<div class="recompro" style="margin-left: 15px;">
															<div class="single-product">
																<!--<div class="label_new">
																	<span class="new">new</span>
																</div>-->
<?php
if($amt!=null){
?>
																<div class="sale-off">
																	<span class="sale-percent"><?=$amt;?> <?= $ico; ?></span>
																</div>
<?php } else{ } ?>
																<div class="product-img">
																	<a href="product-details.php?pid=<?=$nth['product_id'];?>">
																		<img class="primary-img" src="<?=$imgs[0];?>" alt="Product">
																		<img class="secondary-img" src="<?=$imgs[1];?>" alt="Product">
																	</a>
																</div>
																<div class="product-description">
																	<center>
																	<h5><a href="product-details.php?pid=<?=$nth['product_id'];?>"><?=$nth['title'];?></a></h5>
																	<div class="price-box">
																		<span class="price"><?=number_format($newatm,2);?></span>
																		<span class="old-price"><?=number_format($atm,2);?></span>
																	</div>
																	</center>
																	
																	
																</div>
																											
															</div>
														</div>
														<!-- End Single-Product -->
														<?php
													unset($imgs);
													 } 
													 ?>
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
                        <!-- End Product -->
                     </div>
                     <!-- END PRODUCT-AREA -->
                  </div>
                  <!-- End Toch-Prond-Area -->
               </div>
            </div>
         </div>
         <!-- START BRAND-LOGO-AREA -->
         <div style="clear:both;"></div>
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
         <?php include("include/tags.php"); ?>
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
      <!-- Image zoom js
         ============================================ --> 		
      <script src="js/imagezoom.js"></script>
      <!-- plugins JS
         ============================================ -->	

	
      <script src="js/plugins.js"></script>
      <!-- main JS
         ============================================ -->		
      <script src="js/main.js"></script>
	  
	  
	  
	<!-- percentage progressbar JS
         ============================================ -->
	  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/jquery.circlechart.js"></script>  
	  
 <script>
$('.demo-1').percentcircle();

$('.demo-2').percentcircle({
animate : false,
diameter : 100,
guage: 3,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#E95546',
percentSize: '15px',
percentWeight: 'normal'
});

$('.demo-3').percentcircle({
animate : false,
diameter : 100,
guage: 3,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#DA4453',
percentSize: '18px',
percentWeight: 'normal'
});
$('.demo-4').percentcircle({
animate : true,
diameter : 100,
guage: 3,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#46CFB0',
percentSize: '18px',
percentWeight: 'normal'
});		
$('.demo-5').percentcircle({
animate : true,
diameter : 100,
guage: 3,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#8BC163',
percentSize: '18px',
percentWeight: '20px'
});	
$('.demo-6').percentcircle({
animate : true,
diameter : 100,
guage: 10,
coverBg: '#fff',
bgColor: '#efefef',
fillColor: '#D870A9',
percentSize: '18px',
percentWeight: 'normal'
});		
			
	</script>	  
	 
   </body>
</html>