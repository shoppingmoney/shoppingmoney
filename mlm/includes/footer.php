<style>
#bxbg {
    background: -webkit-linear-gradient(#EAEAEA,#fff,#E8E8E8) !important;
background: -moz-linear-gradient(#EAEAEA,#fff,#E8E8E8) !important;
background: -o-linear-gradient(#EAEAEA,#fff,#E8E8E8) !important;
}

.product-select label {
    font-size: 14px;
    font-weight: normal;
}
#bankcol{    background: #fdfdfd;
    padding: 15px;
    border: 1px solid #f1f0f0;}



#loginpp{overflow: scroll;
    padding: 13px;
    height: 477px;}

.buybulk{width:80px;padding: 0px 13px;
    background: #26acce;
    font-weight: 600;color:#fff;}
	.topquery li a{color:#26ACCE;}


.buybulk:hover{width:80px;padding: 0px 13px;
    background: #fff;
    font-weight: 600;color:#26acce;}
	.topquery li a{color:#26ACCE;}
#bxbg{
background: -webkit-linear-gradient(#EAEAEA,#fff,#E8E8E8) !important;
height:40px;
}

	
	#cc-slider02 label, a{color:#3e3e3e;
    cursor: pointer;
    text-decoration: none;}
	</style>	
		
		<!-- FOOTER-AREA START -->
		<footer class="footer-area">
			<!-- Footer Start -->
			<div class="footer">
				<div class="container">
					<div class="row">
					
					
					
					
					
					         <div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Policy information</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="../policy.php">Privacy Policy</a></li>
									<li><a href="../terms -sales.php">Terms & Sales</a></li>
									<li><a href="../use.php">Terms & Use</a></li>
									<li><a href="../terms.php">Terms & Condition</a></li>
										
					         </ul>
							</nav>
						</div>
					
							<div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Shopping Money</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="../aboutus.php">About Us</a></li>
									<li><a href="#">Carreers</a></li>
									<li><a href="#">Blogs</a></li>
                                     <li><a href="#">Site Maps</a></li>
                                     <li><a href="#">Affiliate</a></li>
									 <li><a href="../brands.php">Brands</a></li>
										
					         </ul>
							</nav>
						</div>
					
					
             <div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Help</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="#">Customer Care</a></li>
									<li><a href="../help.php">Help</a></li>
									<li><a href="../faq.php">FAQ</a></li>
									</br>
									
									<li  class="hot"><div class="buybulk"><a href="#" class="modal-view" data-toggle="modal" data-target="#buybulk">Buy bulk</a></div><a href="../hiring.php">We are hiring</a></li>
										
										
					         </ul>
							</nav>
						</div>					
					
						<div class="col-xs-12 col-sm-4 col-sm-3">
							<div class="footer-title">
								<h5>Payment Method</h5>
							</div>
							<nav>
								<ul class="footer-content box-information">
									
									<li><a href="#">Net Banking</a></li>
									<li><a href="#">Debit Card</a></li>
									<li><a href="#">Credit Card</a></li>
									<li><a href="#">Pay From Wallet</a></li>

										
					         </ul>
							</nav>
							
							<div class="#">
							<div class="footer-title">
								<h5>Stay Connected</h5>
							</div>
							
							<div class="social-media" style="padding-top: 20px;">
								<a href="https://www.facebook.com/InShoppingmoney" target="_blank"><i class="fa fa-facebook fb"></i></a>
								<a href="https://plus.google.com/u/0/114078189960010475706" target="_blank"><i class="fa fa-google-plus gp"></i></a>
								<a href="https://twitter.com/InShoppingmoney" target="_blank"><i class="fa fa-twitter tt"></i></a>
								<a href="https://www.youtube.com/watch?v=yEuQZi2kbCo" TARGERT="_BLANK"><i class="fa fa-youtube yt"></i></a>
								<a href="https://www.linkedin.com/in/shoppingmoney-in-a126aa124?trk=hp-identity-name" target="_blank"><i class="fa fa-linkedin li"></i></a>
								<a href="https://www.instagram.com/shoppingmoney.in/
" target="_blank"><i class="fa fa-instagram is"></i></a>
							</div>
						</div>
						
							
							
							
							
						</div>
						
					</div>
				</div>				
			</div>
			<!-- Footer End -->
			<!-- Copyright-area Start -->
			<div class="copyright-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="copyright">
								<p>Copyright &copy; <a href="#" target="_blank"> Shoppingmoney</a> All rights reserved.</p>
								<!--<div class="payment">
									<a href="#"><img src="img/payment.png" alt="Payment"></a>-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Copyright-area End -->
		</footer>
		<!-- FOOTER-AREA END -->	
		<!-- QUICKVIEW PRODUCT -->


<!---------cart model------>

		   <!-- Modal -->
		   <div class="modal fade" id="productModal" tabindex="-1" role="dialog" style="overflow:hidden !important;">
			    <div class="modal-dialog" role="document" id="mortar">
					<div class="modal-content" style="padding-bottom:240px;height: 554px;">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body" style="overflow:hidden !important;">
<?php
if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
//echo "select count(id) as cnt from cart where system_id = '$system_id'";
$fetch = $dbAccess->selectSingleStmt("select count(id) as cnt from cart where system_id = '$system_id' And user_id = ''");
}else{
//echo "select count(id) as cnt from cart where user_id = '".$_SESSION['myemail']."'";
$fetch = $dbAccess->selectSingleStmt("select count(id) as cnt from cart where user_id = '".$_SESSION['myemail']."'");
}
$commonvip=$fetch['cnt'];
?>
<?php
if($commonvip > 0){
?>
							<div class="modal-product" id="loginpp" style="overflow-y:hidden">
								<div class="product-images">
									<p>Shopping Cart <span class="tem">(Cart  Item)</span></p>
								</div><!-- .product-images -->

								<div class="product-info">



			<!-- if elif def con -->			
			<form><div class"col-md-12" style="overflow-y:scroll; height:270px;">
								<table width="100%">
								<tr style="border-bottom:1px solid #EEE;">
								<td width="34%"><p>Item Details</p></td>
								<td width="20%"><p>Price</p></td>
                                                                <td width="10%"><p>Points</p></td>
								<td width="10%"><p>Quantity</p></td>
								<td width="10%"><p>Heart</p></td>
								<td><p>Subtotal</p></td>
								</tr>
								
					<?php
$sum = 0;
								$prog = new DBQuery();
								$IMg = new DBQuery();
								$product = new DBQuery();
								$system_id=$helper->systemId();
								if($_SESSION['myemail']==null || $_SESSION['myemail'] == ''){
//echo "select * from cart where system_id = '$system_id' And user_id = '' ";
								$fetch = $prog->selectData("select * from cart where system_id = '$system_id' And user_id = '' ");
								}else{
//echo "select * from cart where user_id = '".$_SESSION['myemail']."'";
								$fetch = $prog->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");
								}
$ccs=1;
								foreach($fetch as $tr){
								$protitle=$product->selectSingleStmt("select * from product_tbl where product_id = '".$tr['product_id']."' ");
								$getimg=$IMg->selectSingleStmt("select * from product_img where product_id = '".$tr['product_id']."' ");


$pot = $prog->selectSingleStmt("select * from point where id = '".$protitle['color_code']."'");
$ratio = explode(':',$pot['point_ratio']);

$realratio = $ratio[0]/$ratio[1];

if(($protitle['menual']<=0) || ($protitle['menual']==null)){
$pincolor = $pot['point_color'];
$point = $point + (($realratio * $tr['unit_prc'])*$tr['qty']);
}else{
$pincolor="purple";
$point = $point + ((1 * $protitle['menual'])*$tr['qty']);
}




								?>
								<tr id="ff<?=$ccs;?>">
								<td>

								<div class="main-image images">
										<img alt="#" src="<?=$getimg['image'];?>" width="80" style="float:left;"/><p style="float:right; "></p><br/>
										<h5 style="text-align:center;"><?=$protitle['title'];?></h5><br>
									</div>
								</td>
								<td><p>Rs. <?=$tr['unit_prc'];?></p>
<?php
$shipping = $product->selectSingleStmt("select * from shipping where product_id = '".$tr['product_id']."' ");
?>
<p>shipping charges include(<?=$shipping['shipping_charge'];?>)</p></td>

<td><p style="margin-left:20%"><?=$point;?><p></td>
<?php $point=0; ?>
								<td><div class="numbers-row">
												<input type="number" disabled="disabled" id="french-hens" value="<?=$tr['qty'];?>">
											</div></td>
								<td><span class="hert" style="position:relative !important;left:9% !important; top:2% important;"><i class="fa fa-heart" style="color:<?=$pincolor;?>"></i></span></td>
								<td><p style="font-size:12px;">You Pay: Rs. <?=$tr['mrp']+($shipping['shipping_charge']*$tr['qty']);?></p>
<a href="javascript:void(0)" onclick="showdelmy('<?=$tr['id'];?>','<?=$ccs;?>')" style="color:red !important">REMOVE</a>
</td>

<?php
$sum = $sum + ($tr['mrp']+($shipping['shipping_charge']*$tr['qty']));
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
function showdelmy(str,i) {
$(document).ready(function(){   
//$('#phoolrefresh').fadeOut();             
//$('#loginpp').load(document.URL + ' #loginpp');
for(var i=0; i<2; i++){
$('#mortar').load(document.URL + ' #mortar');
$('.top-cart').load(document.URL + ' .top-cart');
}


});
document.getElementById("ff"+i).style.display = 'none';
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                document.getElementById("ff"+i).style.display = 'none';

            }
        };
        xmlhttp.open("GET", "../delcrt.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>



								</tr>
								
								<?php
$ccs++;
								}
								?>
								
								</table></div>
								
								
									<hr / style="margin-top:120px;border: 2px solid #E6E6E6;background: #E6E6E6;">
									<div class="widget widget_socialsharing_widget">
										
										
									<p style="font-size:11px;color:#999;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
									<p> <b>100%</b> Safe and Secure Payments</p>
									<p><b>TrustPay:</b> 100% Money Back Guarantee, 7 Days Easy Return Policy</p>
									</div>
									
									<div class="widget widget_socialsharing_widget" id="phoolrefresh">
									
									<table width="100%" height="120px;">
									<tr>
									<td>Total:</td>
									<td>Rs. <?=$sum;?></td>
									</tr>
									
									<tr>
									<td>You Pay:</td>
									<td style="font-size:15px;font-weight:600;">Rs. <?=$sum;?></td>
									</tr>
									</table></form>
									
									<div class="quick-add-to-cart">
										<form method="post" class="cart">
											<a href="../checkout.php" class="single_add_to_cart_button">Continue</a>
										
										</form>
									</div>
									</div>

							<?php } else { ?>	
								
								<!-- if elif def con -->	

								</br></br>
								
								<div>
								
								<h4><b style="color:#26acce;font-size:22px">Your cart is empty !</b></h4>
									
									 
									 
									 </div>
								     </div>
									 <center style="font-size:18px;color:#26acce;">Browse Categories</center>
<div class="col-md-12" style="margin-top:20px;padding:14px 0;overflow-y:scroll;height:217px;border:1px solid GAINSBORO;margin-right:5%;">
									 <div class"col-md-3">
									 <ul style="float:left;margin-right:45px;width: 150px;margin-left: 11%;">
									 <li><a href="http://shoppingmoney.in/shop.php?product=1&catid=1&session=8912" style="color:#26acce;">Mobile</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=7&catid=1&session=8278">Mobile Accessories</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=88&catid=1&session=9193">Popular Smartphones</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=85&catid=1&session=1940">Mobile Phones</a></li>
									 
									 <li><a href="http://shoppingmoney.in/shop.php?product=2&catid=1&session=7588" style="color:#26acce;">Electronics</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=16&catid=1&session=6102">Telivisons</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=17&catid=1&session=8368">All Appliances</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=18&catid=1&session=8300">Grooming Appliances</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=80&catid=1&session=5093">Laptops</a></li>
                                                                                                                               
									   
									 
									 
									 </ul></div>
<div class="col-md-3">
									 <ul style="float:left;margin-right:45px;width: 150px;">
									<li><a href="http://shoppingmoney.in/shop.php?product=3&catid=1&session="2401" style="color:#26acce;">Women's Fashions</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=26&catid=1&session=9143">Western Wear</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=27&catid=1&session=8256">Ethnic Wear</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=28&catid=1&session=5028">Watches</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=34&catid=1&session=9794">Cosmetics</a></li>
									 
									 <li><a href="http://shoppingmoney.in/shop.php?product=4&catid=1&session=8311" style="color:#26acce;">Men's Fashion</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=40&catid=1&session=3482">Footwear</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=41&catid=1&session=6459">Clothing</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=42&catid=1&session=8117">Men's Watches</a></li>

									   
									 
									 
									 </ul></div>

<div class="col-md-3">
									 <ul style="float:left;margin-right:45px;width: 150px;">
									<li><a href="http://shoppingmoney.in/shop.php?product=5&catid=1&session=9975" style="color:#26acce;">Kid's Toys & Fashion</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=52&catid=1&session=5224">Toys</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=55&catid=1&session=2134">Kid's Clothing</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=56&catid=1&session=6885">Watches</a></li>
									
									 
									 <li><a href="http://shoppingmoney.in/shop.php?product=31&catid=1&session=4848" style="color:#26acce;">Home & Kitchen</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=65&catid=1&session=7782">Kitchen Appliances</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=66&catid=1&session=7442">Home Furnishing</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=67&catid=1&session=3820">Home Improvement</a></li>
									   
									 
									 
									 </ul></div>
<div class="col-md-3">
									 <ul style="float:left;margin-right:45px;width: 150px;">
									<li><a href="http://shoppingmoney.in/shop.php?product=32&catid=1&session=7240" style="color:#26acce;">Daily Needs</a></li>
									 
									
									 
									 <li><a href="http://shoppingmoney.in/shop.php?product=36&catid=1&session=8170" style="color:#26acce;">Grocery</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=81&catid=1&session=4178">Personal</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=82&catid=1&session=5041" >Grains</a></li>
									 <li><a href="http://shoppingmoney.in/shop.php?product=83&catid=1&session=7538">Beverages</a></li>
									   
									 
									 
									 </ul></div></div>
									 
									 
									 
									 
									 
								      
                                 
                                  <div class="col-md-3"></div>
                                     
                                 <div class="col-md-5">
                                <a href="../index.php"> <button type="button" class="btn btn-info" style="width:200px; height: 46px;float:none;margin:46px auto;float:right;">Shop Now</button></a></div>
										
							     </div>
<div class="col-md-12" style="margin-top:-13%;padding:31px 0;background:#eee">
    <div class="col-md-3" style="margin-left:8%;">
      <img src="../img/new1.png" style="width:60px" ; style="float:left;">
      <strong>Latest Products</strong>
    </div>
    <div class="col-md-3">
      <img src="../img/new2.png" style="width:60px"  style="float:left;">
       <strong>Special Discounts</strong>

    </div>

    <div class="col-md-3">
      <img src="../img/new3.png" style="width:60px"  style="float:left;">
       <strong>Top Categories</strong>

    </div>
    <div class="col-md-3">
      <img src="../img/new4.png" style="width:60px"  style="float:left;">
      <strong>Top Brands</strong>

    </div>
    
</div>
									
								<?php } ?>	
																		
									<script>
										function checkout(){
											window.location="checkout.php";
										}
									</script>
									
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!-- END Modal -->
		   <!-- Modal -->

<!-- start rechage popup -->
					<script>
					function topup(rdm){
						var rdm = parseInt(rdm);
						var rd = $("#rdamount").val();
						var amt = parseInt(rd);
						if(amt < 1000){
							alert("Minimum amount should be 1000");
						}else if(amt > rdm){
							alert("You enter wrong amount");
						}else{
							$("#rdmfrmm").submit();
						}
					}
					</script>
					<div class="modal fade" id="redeemModalq" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document" style="width:62% !important;">
							<div class="modal-content" id="bxbg">
								<div class="modal-header" style="min-height: 34.5px;">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
											<div class="modal-body" style="padding: 0px;">

												<div class="modal-product">
												<div class="row">
												<div class="col-md-6" style=" float: none;margin-left: 31%;">
												
												<img src="../img/logo.png">
												<h3 style="margin-left:36px;">A Unit of ARG Ecom Pvt Ltd.</h3>
												</div>
												</div>
<div class="col-md-7" >
<div class="product-area" id="bankcol">
															<div class="row">
																<div class="col-xs-12 col-md-12">
																	<!-- Start Product-Menu -->
																	<div class="product-menu">
																	
														<p><b>Bank No. 1</b></p>
																	</div></div></div>
																	<div class="col-xs-12 col-md-12">
																	<div class="product carosel-navigation">
																		<div class="tab-content">
																				<div class="row">

<label><b>Account type </b>: Current</label><br>																				
																				<label><b>Account Name </b>: <b>(ARG Ecom Pvt. Ltd.)</b></label><br>
																				<label><b>Bank Name </b>: Kotak Mahindra Bank</label><br>
																				<label><b>Account Number </b>: 7911133162</label><br>
																				<label><b>IFSC Code </b>: KKBK0000183</label><br>
																				<label><b>Bank Address </b>: Preet Vihar, New Delhi-110092</label>
																				
																				</div></div></div><hr></div>
																				
																				<div class="row">
																<div class="col-xs-12 col-md-12">
																	<!-- Start Product-Menu -->
																	<div class="product-menu">
										<p><b>Bank No. 2</b></p>

																	</div>
<label><b>Account Type <b>: Current </label></br>
																	<label><b></b>Account Name </b>: <b>(ARG Ecom Pvt. Ltd.)</b></label><br>
																				<label><b>Bank Name</b> : State bank of India</label><br>
																				<label><b>Account Number</b> :</label><br>
																				<label><b>IFSC Code </b>:</label><br>
																				<label><b>Bank Address</b> :</label>
																	</div>
																	</div>
																	</div>
</div>

													<div class="col-md-5" id="rightpart">
														<!-- START PRODUCT-BANNER -->

														<!-- END PRODUCT-BANNER -->
														<!-- START PRODUCT-AREA (1) -->
														<div class="product-area">
															<div class="row">
																<div class="col-xs-12 col-md-12">
																	<!-- Start Product-Menu -->
																	<div class="product-menu">


																		<ul role="tablist" style="float:left;">
																			<li role="presentation" class=" active">
																				<a href="#display-login" role="tab" data-toggle="tab">Recharge wallet</a>
																			</li>

																		</ul>
																	</div>
																</div>
															</div>
															<!-- End Product-Menu -->
															 <div class="clear"/>
																<div class="col-xs-12 col-md-12">
																	<div class="product carosel-navigation">
																		<div class="tab-content">
																				<div class="row">

	<form id="rdmfrmm" action="#" method="post" enctype="multipart/form-data">

	<div class="product-select product-type">
	<label>Bank Name</label>
<select name="bank" class="form-control"  id ="rdamount"  required style="width: 250px;"> 

<option value="kotak Mahindra Bank"> KOTAK MAHINDRA BANK</option> 
 <option value="State Bank"> STATE BANK OF INDIA</option> 
</select>
	
	<label>Branch</label>
	<input type="text" class="form-control" name="branch" id ="rdamount" placeholder="Enter Branch Nmae" required style="width: 250px;">
	<label>Date</label>
	<input type="text" class="form-control" name="date" id ="rdamount" placeholder="DD/YY/MM" required style="width: 250px;">

	<label>Amount</label>
	<input onkeypress="return IsNumeric(event);" type="text" class="form-control" name="amount" id ="rdamount" placeholder="Enter rechage Amount" required style="width: 250px;">
		<label>Trans_id</label>
	<input type="text" class="form-control" name="trans_id" id ="rdamount" placeholder="Trans_id" required style="width: 250px;"><br/>

<label>Transaction Slip</label>
<input type="file" name="file" />
	<input type="hidden" class="form-control" name="status" id ="rdamount" placeholder="Trans_id" required style="width: 250px;"><br>
	<input type="submit" name="submit1" value="submit" class="form-control" style="background: #26acce;font-size: 16px;color:#fff;">
																							</div>
																							

   </form>										</div>
																				</div>
																			</div>
																</div>
																		<!-- End Product -->
																	</div>
																	<!-- END PRODUCT-AREA (1) -->

																</div>
															</div>
															<!-- .modal-product -->
														</div>
														<!-- .modal-body -->
													</div>
													<!-- .modal-content -->
												</div>
												<!-- .modal-dialog -->
											</div>
											<!-- END topup popup -->
		   
		   <!-- END Modal -->
		   <!-- END Modal -->
<div id="quickview-wrapper">		   
		    <script>
function validateFrm()
{
	var flag=0;
  var fields = ["name","lastname","phone", "email", "password"]
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.forms["regfrm"][fieldname].value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  document.getElementById(fieldname).style.borderColor="red";
	  $('#er'+fieldname).fadeIn(1000);
    }else{
		$('#er'+fieldname).fadeOut(1000);
	var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!re.test($("#email").val())){$("#eremail").fadeIn(1000);flag=1;}
	if($("#phone").val().length != 10){$("#erphone").fadeIn(1000); flag=1;}
	document.getElementById(fieldname).style.borderColor="#ccc";
	}
  } 
  if(flag == 1){
	  return false;
  }else{
	  // Checking otp
	  var email = $("#email").val();
	  var otp = $("#otp").val();
	  var eotp=$("#eotp").val();
	  var phone=$("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/checkotp.php?otp="+otp+"&email="+email+"&eotp="+eotp+"&phone="+phone;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
{
var resp = request.responseText;
var res = resp.split("*");
if(res[0] == 0){
//alert(res);
$("#fmsg").html("Invalid email OTP");
document.getElementById("fmsg").style.color = "red";
$("#fmsg").fadeIn(1000);
}else if(res[1] == 0){
$("#fmsg").html("Invalid mobile OTP");
document.getElementById("fmsg").style.color = "red";
$("#fmsg").fadeIn(1000);
}else{
$("#fmsg").html("You have successfully verified your email/mobile");
document.getElementById("fmsg").style.color = "green";
$("#fmsg").fadeIn(500);
$('#regfrm').submit();
//alert("fai");
}

}else{

}
		
		
		
	/*	if(request.readyState == 4)
		{
			//document.getElementById("eremail").innerHTML = request.responseText;
var res = request.responseText;
var resp=res.split("*");
if(res == 1){
//alert(res);
$('#regfrm').submit();
}else{
	$("#erotp").fadeIn(1000);
}
		} */
	}
 
 }
  
}

function otp()
{   
	var flag=0;
  var fields = ["name","lastname","phone", "email"]
  var i, l = fields.length;
  var fieldname;
  for (i = 0; i < l; i++) {
    fieldname = fields[i];
    if (document.forms["regfrm"][fieldname].value === "") {
      //alert(fieldname + " can not be empty");
	  flag=1;
	  document.getElementById(fieldname).style.borderColor="red";
	  $('#er'+fieldname).fadeIn(1000);
    }else{
		$('#er'+fieldname).fadeOut(1000);
	var re = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!re.test($("#email").val())){$("#eremail").fadeIn(1000);flag=1;}
	if($("#phone").val().length != 10){$("#erphone").fadeIn(1000); flag=1;}
	document.getElementById(fieldname).style.borderColor="#ccc";
	}
  } 
  if(flag == 1){
	  return false;
  }else{
	  var name = $("#name").val()+" "+$("#lastname").val();
	  var email = $("#email").val();
	  var phone = $("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/otp.php?email="+email+"&phone="+phone+"&name="+name;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{  
			//document.getElementById("eremail").innerHTML = request.responseText;
var res = request.responseText;
if(res == 0){
document.getElementById("eremail").innerHTML = "This email is register already";
}else{
	$("#fid").fadeOut(10);
    $("#rid").fadeIn(100);
document.getElementById("eremail").innerHTML = "OTP is send to your mobile/email";
//document.getElementById("fmsg").innerHTML = "OTP is send to your mobile/email";

}
			document.getElementById("eremail").style.color = "green";
			$("#eremail").fadeIn(1000);
			//alert("otp send"+res);
		}else{
			$("#eremail").show(100);
			document.getElementById("eremail").innerHTML = "<img src='img/loader.gif' />";
			
		}
	}
 }
  
}  

$(document).ready(function () {
	        $("#lastname").change(function () {
                    $("#erlastname").fadeOut(1000);
                }); 
                $("#password").change(function () {
                    $("#erpassword").fadeOut(1000);
                });
                $("#phone").change(function () {
                    $("#erphone").fadeOut(1000);
                });
                
            }); 
</script>
<script>
function re_otp()
{   
	
var name = $("#name").val()+" "+$("#lastname").val();
	  var email = $("#email").val();
	  var phone = $("#phone").val();
	  var request = checkAjax();
  var url = "mlm/ajaxpage/otp.php?email="+email+"&phone="+phone+"&name="+name;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{  
			//document.getElementById("eremail").innerHTML = request.responseText;

document.getElementById("eremail").innerHTML = "OTP is send to your mobile/email";
//document.getElementById("fmsg").innerHTML = "OTP is send to your mobile/email";


			document.getElementById("eremail").style.color = "green";
			$("#eremail").fadeIn(1000);
			$("#reotp").fadeIn(100);
$("#reotp1").fadeOut(10);
			//alert("otp send"+res);
		}else{
                         $("#reotp").fadeOut(100);
			$("#reotp1").show(100);
			document.getElementById("reotp1").innerHTML = "<img src='img/loader1.gif' />";
			
		}
	}
 }  
</script>
		   
			   <!-- start register popup -->
            <div class="modal fade <?php if(isset($_SESSION['ref'])) echo "in";?>" id="productModalRegister" tabindex="-1" role="dialog" <?php if(isset($_SESSION['ref'])){ echo "style='display:block;'"; } ?>>
                <div class="modal-dialog" role="document" style="width:70% !important;">
                    <div class="modal-content" id="bxbg">
                        <a <?php if(isset($_SESSION['ref'])){ echo "href='index.php'"; unset($_SESSION['ref']);}?>><div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div></a>
                        <div class="col-md-6" id="logleft">
                            <div class="product-linee">
                                <center><img src="images/wallet.png" style="width: 70px;"><br><br>
                                    <p> <span class="tem">You will love to shop with us</span></p></center>
                                <ul class="prod-lb">
                                    <li>Quality Products to Shop.</li>
                                    <li>Lifetime Association with us.</li>
                                    <li>Loyalty & Rewards on Purchase.</li>

                                </ul>

                            </div><!-- .product-images -->
                        </div>
                        <div class="modal-body">

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
                                                        <li role="presentation"><a href="#display-signup" role="tab" data-toggle="tab">Sign Up</a></li>

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
                                                        
                                                        <!-- Start Product = display-1-2 -->
                                                        <div role="tabpanel" class="tab-pane fade in active" id="display-signup">

                                                            <div class="row">

                                                                <form name="regfrm" id="regfrm" action="index.php" method="post">
                                                                   <div id="fid"> 
																	 <!--<div class="product-select product-type">
                                                                       <select class="form-control" onchange="stype(this.value)" id="sponsorchannel" name="sponsorchannel" style="width:250px;" required="">
                                           <option>Select Sponsor Type</option>
                                           <option value="1"> Enter Sponsor ID </option>
                                          <option value="2">  Advertisement  </option>                                        
                                          <option value="3"> Others </option>
                                       </select></div>-->
									   <?php
									   if(isset($_SESSION['refid'])){
									   ?>
									   <div class="product-select product-type" id="sponser">
                         <input id="sponserval" type="text" class="form-control" id="mobile" value="<?=$_SESSION['refid']?>" disabled placeholder="Sponser Id" style="width:250px;">
																		<input type="hidden" name="link" value="<?=$_SESSION['refid']?>" />
                                                                    </div>
									   <?php }elseif(isset($_SESSION['empref'])){ ?>
<div class="product-select product-type" id="sponser">
										  <input id="sponserval" type="text" class="form-control" id="mobile" value="<?=$_SESSION['empref']?>" disabled placeholder="Sponser Id" style="width:250px;">
																		<input type="hidden" name="link" value="<?=$_SESSION['empref']?>" />
                                                                    </div>
									   <?php }else{
										    echo "<input type='hidden' name='link' value='0' />";
									   } ?>
 <div class="product-select product-type" style="width:13%;margin-right:4px;">
     <select class="form-control"   name="title" style="padding: 2px;">
                       
                        <option >Mr.</option>
                        <option>Mrs</option>
						<option>Ms.</option>
						
                     </select>                                                                    
   </div>
	<div class="product-select product-type" style="width:72%">
		<input type="text" class="form-control" name="name" id="name" placeholder="First Name" style="width:195px;" required value="" onkeypress="return FilterInput (event)">
<span id="error" class="help">Please enter only text</span>
<script type="text/javascript">
        
        
         function FilterInput (event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			document.getElementById("error").style.display = ret ? "none" : "inline";
			
        }
    </script>
	</div>
	 
                                                                    
			<div class="product-select product-type">
				<!--<label>Mobile No</label>-->
				<input type="alphabet" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required value="" onkeypress="return FilterInput (event)" style="width:250px;">
<span class="help" id="erlastname">Please enter Last name</span>
<script type="text/javascript">
        
        
         function FilterInput (event) {
            var chCode = ('charCode' in event) ? event.charCode : event.keyCode;

                // returns false if a numeric character has been entered
				
            return (chCode < 48 /* '0' */ || chCode > 57 /* '9' */);
			document.getElementById("erlastname").style.display = ret ? "none" : "inline";
			
        }
    </script>

			</div>


                                                                    <div class="product-select product-type">
                                                                        <!--<label>Mobile No</label>-->
         <input class="form-control" type="tel" placeholder="Phone Number" name="phone" id="phone" id="text1" onkeypress="return IsNumeric(event);" onpaste="return false;" ondrop = "return false;" maxlength="10" minlength="5" style="width:250px;">
		 <span class="help" id="erphone">Please enter valid mobile number</span>
<script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        function IsNumeric(e) {
            var keyCode = e.which ? e.which : e.keyCode
            var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
            document.getElementById("erphone").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
                                                                    </div>
                                                                    
                                                                    <div class="product-select product-type">
                                                                        <!--<label>E-Mail ID</label>-->
                                                                        <div class="col-sm-9" style="padding:0"><input type="email" class="form-control" name="email"  id="email"  placeholder="E-Mail ID"  required  style="width:200px;">
																		
																		<span class="help" id="eremail">Please enter valid email</span></div><div class="col-sm-3" style="padding:0;margin-top: 7px;"><a id="otpbtn"  class="stm_submit_button register_btn" onclick="otp();" href="javascript:void(0);" style="font-size: 11px;font-weight: 100;padding: 9px 2px;">Get OTP</a></div></br></br></br></br></br></br>

                                                                    </div>
																	</div><div id="rid" style="display:none;">
																	<div id="fmsg" style="color:green;"><span  >OTP is send to your mobile/email</span> </div>
																	<div class="product-select product-type">
                                                                        <!--<label>OTP Mobile</label>-->
                                                                        <input type="text" class="form-control" name="otp"  id="otp"  placeholder="Enter Mobile OTP"  required  style="width:250px;"> 
																		<span class="help" id="erotp">Incorrect OTP, try again.</span>
																		<div class="col-sm-3" style="padding:0;margin-top: 7px;"><a id="reotp"  class="stm_submit_button register_btn" onclick="re_otp();" href="javascript:void(0);" style="    font-size: 11px;font-weight: 100; ">Resend-OTP</a>
<div id="reotp1"></div>
</div>

                                                                    </div>
																	<div class="product-select product-type">
                                                                        <!--<label>OTP EMAIL</label>-->
                                                                        <input type="text" class="form-control" name="eotp"  id="eotp"  placeholder="Enter Email OTP"  required  style="width:250px;">
																		<span class="help" id="ereotp">Incorrect OTP, try again.</span>

                                                                    </div>
                                                                    <div class="product-select product-type">
                                                                        <!--<label>Password</label>-->
                                                                        <input type="password" name="password" id ="password" class="form-control" placeholder="Enter your Password" required  style="width: 250px;">
                                                                        <span class="help" id="erpassword">Please enter password</span>
                                                                    </div>
                                                                    <div class="product-select product-type" style=" width: 125%;">
                                                                        <input type="checkbox" required name="check" id="check" value="true" >  I hereby certify that I am atleast 18 years of age.<br>
<a href="#" style="float:left;"> Terms & Condition</a>

                                                                    </div>
                                                                    <div class="product-select product-type">
                                                                        <!--<button type="submit" id="big1" class="toch-button toch-add-cart"><i class="fa fa-lock" aria-hidden="true"></i> Create your Wallet</button>-->
																		 <a id="big1" onclick='validateFrm();' class="toch-button toch-add-cart"><i class="fa fa-lock" aria-hidden="true"></i> Create your Wallet</a>
                                                                    </div>
																	</div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!-- End Product = display-1-2 -->
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
            </div><!-- END Register popup -->	   
		   
		   
			<script>
				
	
      
		 function sendMail()
     {     
	var request = checkAjax();
	var email = $("#friends-email").val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(email.trim() == "" || !emailReg.test(email)){
		//alert("Pleaser enter a valid email");
		$("#errmsg").html("Pleaser enter a valid email");
		document.getElementById("errmsg").style.color = "red";
	}else{
    var url = "mlm/ajaxpage/forgetpassword.php?email="+email;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			document.getElementById("errmsg").innerHTML = request.responseText;
			document.getElementById("errmsg").style.color = "green";
			 //$("#errmsg").html("Password has sent on your email");
	         $("#friends-email").val("");
		}else{
			document.getElementById("errmsg").innerHTML = "<img src='img/loader.gif' />";
		}
	}
	 }
}
		 </script>
			<!------------------------------------------------------------forget password------------------------------------->
			 <div class="modal fade" id="productModalfp" tabindex="-1" role="dialog" style="    margin-top: -13px;">
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
<p id="errmsg" style="font-size: 12px;margin: 5px 0px -5px 3px;"></p>
                                                                    <div class="product-select product-type">
                                                                        <label>Email ID</label>
                                                                        <input onkeyup="$('errmsg').html("");" type="text" class="form-control" name="email" id ="friends-email" placeholder="Enter your Mobile or Email" required style="width: 250px;clear:both;">
                                                                    </div>

                                                                   <br>
 

                                                                    <div class="product-select product-type">
                                                                        <button type="submit" onclick="sendMail();" name="login" id="big" class="toch-button toch-add-cart"> <i class="fa fa-sign-in" aria-hidden="true"></i> Send</button><br>
                                                                    </div>
																	<span style="float:left;font-size:12px;width: 290px;margin-top: 7px;">We can help you with Verification code on your mobile no. or email ID to reset it.</span>
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
            </div><!-- END login popup -->
			
			
			
			<!-----------------------------------------------------End------------------------------------------------------------->
		   
		   
		<!-- start Redeem popup -->
					<script>
					function redeemForm(rdm){
						var rdm = parseInt(rdm);
						var rd = $("#rdamount").val();
						var amt = parseInt(rd);
						if(amt < 1000){
							alert("Minimum amount should be 1000");
						}else if(amt > rdm){
							alert("You enter wrong amount");
						}else{
							$("#rdmfrm").submit();
						}
					}
					</script>
<div class="modal fade" id="redeemModal_1" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document" style="width:40% !important;">
							<div class="modal-content" id="bxbg">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
											<div class="modal-body">

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
																			<li role="presentation" class=" active">
																				<a href="#display-login" role="tab" data-toggle="tab">Recharge wallet</a>
																			</li>

																		</ul>
																	</div>
																</div>
															</div>
															<!-- End Product-Menu -->
															 <div class="clear"/>
																<div class="col-xs-12 col-md-12">
																	<div class="product carosel-navigation">
																		<div class="tab-content">
																				<div class="row">

	<form id="rdmfrm" action="panel.php" method="post">

																						<div class="product-select product-type">
																							<label>Enter Amount</label>
																							<input type="text" class="form-control" name="redeem" id ="rdamount" placeholder="Enter Redeem Amount" required style="width: 250px;">
																							<input type="hidden" name="totalRedeem" value="<?=$bal;?>">
																							</div>
																							<div class="product-select product-type">
																									<a onclick="redeemForm('<?=$bal;?>');" id="big" class="toch-button toch-add-cart">
																									 Redeem</a>
																									</div>

																								</form>								</div>
																				</div>
																			</div>
																</div>
																		<!-- End Product -->
																	</div>
																	<!-- END PRODUCT-AREA (1) -->

																</div>
															</div>
															<!-- .modal-product -->
														</div>
														<!-- .modal-body -->
													</div>
													<!-- .modal-content -->
												</div>
												<!-- .modal-dialog -->
											</div>
											<!-- END Redeem popup -->

		   
		   
			   
		   
		   
		    
		   



<!---------------------------------------------------popup Help productModalhelp------------------------------------------------------->
		   
		    <div class="modal fade" id="productModalhelp" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<img src="img/logo.png">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<h4 style="color: #232;">How may we assist you?</h4>
<div id="suggest">
     <!-- <input type="text" name="country"  value="" id="country" onkeyup="suggest(this.value);" onblur="fill();" class="county" placeholder="From" required/>-->
     
<div class="form-group">
 <label class="control-label"></label>
  <div class="input-group">
  
    <input type="text" class="form-control">
    <span class="input-group-btn">
      <button class="btn btn-default" type="button">Search</button>
    </span>
  </div>
</div>
</br>

<h3 style="float:left;color: #26ACCE;">Top Queries</h3>
</br></br></br>

 <div div class="col-md-10" style="text-align:-webkit-left;" > 

<li class="topquery"><a href="faq.php">How can I check my order status?</a></li>
</br>
<li class="topquery"><a href="faq.php">How can I cancel my order?</a></li>
</br>
<li class="topquery"><a href="faq.php">How can I return/replace an item?</a></li>
</br>
<li class="topquery"><a href="faq.php">When can I expect refund for my returned item?</a></li>
</br>
<li class="topquery"><a href="faq.php">What are the different modes of payment available?</a></li></br></br>


</div>



 <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
      </div>

	  
   </div>
</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!----------------------------------------------------------End--------------------------------------------------->




<!-----popup checkout------->
 <div class="modal fade" id="checkout12" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<br><br><h3><b>PAID VIA</b></h3><hr>
<table width="70%" height="200" style="margin:0px auto;float:none;">
<tr>
<td>									
<select class="form-control">
<option selected disabled>Choose option</option>
<option>Cheque</option>
<option>NEFT</option>
<option>RTW</option>
<option>DYD</option>
<option>D/D</option>
</select>
</td>

</tr>

<tr>
<td><input type="text" class="form-control" placeholder="Type Your Number"><td>

</tr>

<tr>
<td><button class="btn btn-primary">Upload</button><td>
</tr>

</table>								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->





<!-----Upload Resume Popup------->
 <div class="modal fade" id="checkoutresume" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<br><br><h3><b>Upload Your Resume</b></h3><hr>
<p>Attach Resume:<input type="file" style="float: right;">
<br><span style="font-size:10px;color:#ccc;color: #343434;float: right;">Supported Formats: doc, docx, rtf, pdf. Max file size: 300Kb</span></p>

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->



<!-----Upload Resume Popup------->
 <div class="modal fade" id="checkoutresume1" tabindex="-1" role="dialog" style="z-index:99999;">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<img src="vendor/productImg/sample.jpg">

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->




<!-----OTP success Popup------->
 <div class="modal fade" id="otp" tabindex="-1" role="dialog" style="z-index:99999;">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product">
								

								<div class="product-info1">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-12" >
									<h3>Successfull OTP</h3>

								</div>
								
								
							</div>
								</div>
								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end of otp popup----------------->











								
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>

<!----end----------------->




<!----------------buy bulk popup----->
		 
		 <div class="modal fade" id="buybulk" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="width:44% !important;">
                    <div class="modal-content" id="bxbg">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="col-md-12" style="    background: -webkit-linear-gradient(#EAEAEA,#fff,#E8E8E8);background: -moz-linear-gradient(#EAEAEA,#fff,#E8E8E8);padding:36px;">
                            <div class="product-linee">
                                <center><img src="img/logo.png" alt="" style="max-width: 116%;margin-left: 10px;"><br><br>
								<h4> Buy Bulk</h4>
                                   

                            </div><!-- .product-images -->
							
							<div role="tabpanel" class="tab-pane fade in active" id="display-login" style="margin-bottom:2%;">
                                                            <div class="row">

                                                                <form action="mlm/loginborker.php" method="post">
																   <div class="col-xs-6">
																	 <div class="product-select product-type">
                                                                        <label>Name</label>
                                                                        <input type="text" class="form-control" name="name" id ="name" placeholder="Enter your full name" required style="width: 250px;">
                                                                    </div>
																	
																	 <div class="product-select product-type">
                                                                        <label>Mobile</label>
                                                                        <input type="text" class="form-control" name="mobile" id ="mobile" placeholder="Enter your Mobile" required style="width: 250px;">
                                                                    </div>

                                                                   
																	
																	<div class="product-select product-type">
                                                                        <label>Categories</label>
                                                                        <select type="text" class="form-control" name="category" id ="category" placeholder="Select your category" required style="width: 250px;">
																		<option>Category</option>
																		<option>Category</option>
																		<option>Category</option>
																		<option>Category</option>
																		</select>
                                                                    </div>
																	
																	
																</div>
																<div class="col-xs-6">
                                                                    
																	 <div class="product-select product-type">
                                                                        <label>Quantity</label>
                                                                        <input type="text" class="form-control" name="Quantity" id ="Quantity" placeholder="Select your Quantity" required style="width: 250px;">
                                                                    </div>
																	
																	 <div class="product-select product-type">
                                                                        <label>Email ID</label>
                                                                        <input type="text" class="form-control" name="email" id ="email" placeholder="Enter your Mobile or Email" required style="width: 250px;">
                                                                    </div>
																	
																	 <div class="product-select product-type">
                                                                        <label>Price</label>
                                                                        <input type="text" class="form-control" name="Price" id ="Price" placeholder="Select your Price" required style="width: 250px;">
                                                                    </div>
																	
																</div>
																<div class="product-select product-type" style="margin-left:2%;width:96%">
                                                                        <label>Descriptions</label>
																		<textarea class="form-control" name="discription" id ="description" placeholder="Enter your description" style="width:250px;width: 100%;height: 100px;" required></textarea>
                                                                        
                                                                </div>


                                                                    <div class="product-select product-type" style="width:96%;">
                                                                        <button type="submit" name="login" id="big" class="toch-button toch-add-cart" style="    float: right;"> <i class="fa fa-sign-in" aria-hidden="true"></i> Submit</button><br>
                                                                    </div>
																</div>

                                                                </form>
                                                            </div>
                                                        </div>
							
                        </div>
                        <div class="modal-body">

                            <div class="modal-product">


                                <div class="col-md-12">
                                    <!-- START PRODUCT-BANNER -->

                                    <!-- END PRODUCT-BANNER -->
                                    <!-- START PRODUCT-AREA (1) -->
                                    <div class="product-area">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12">
                                                <!-- Start Product-Menu -->
                                                <div class="product-menu">


                                                    <ul role="tablist" style="float:left;">
                                                        <li role="presentation" class=" active"><a href="#display-login" role="tab" data-toggle="tab">Buy Bulk</a></li>
                                                       
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








		   
		</div>
		<!-- END QUICKVIEW PRODUCT -->




<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggest.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		
		$('#country').val(thisValue);
		//$('.county').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}
	
	
	function suggest1(inputString){
		if(inputString.length == 0) {
			$('#suggestions1').fadeOut();
		} else {
		$('#country1').addClass('load');
			$.post("autosuggest1.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions1').fadeIn();
					$('#suggestionsList1').html(data);
					$('#country1').removeClass('load');
				}
			});
		}
	}

	function fill1(thisValue) { 
	    $('#country1').val(thisValue);
		setTimeout("$('#suggestions1').fadeOut();", 600);
	}

</script>


<!----------------------------------------------------------auto pop start--------------------------------------------------->

<!--<div id="boxes">
  <div style="top: 171.5px; left: 293.5px; display: none;" id="dialog" class="window"> <img src="img/logo.png" alt="" style="max-width: 116%;margin-left: -5px;margin-top: 21px;">
    <div id="lorem">
<h5 style="
    margin-top: 56px;text-transform: uppercase;
">Welcome to ShoppingMoney.in Beta Version</h5>
      <p>We're working hard to come up with our best and we'll be ready very soon
</p>
    </div>
    <div id="popupfoot">  </div>
  </div>
  <div style="width: 1478px; font-size: 32pt; color:white; height: 602px; display: none; opacity: 0.6;" id="mask"></div>
</div>-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
