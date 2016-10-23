<style>#menu1{color: #333;
    
    border-color: #8c8c8c;
    }

#menu1:hover{color: #333;
    
    border-color: #8c8c8c;
    border-bottom: none;}
</style>


<?php
error_reporting(0);
$system_id=$helper->systemId();
//myarea,shopbegainnow
if(isset($_POST["shopbegainnow"])){
$helper->cookieHelper("LOCATION",$_POST['myarea']);
$go=$_SERVER['PHP_SELF'];
header("location:".$go."");
}



?>
<!----<div style="float:left;width:50px;height:50px;z-index:99999;position: absolute;">
<img src="img/beta.png">
</div>---->
<script type="text/javascript" src="mlm/js/ajax.js"></script>
<header class="header-area" style="background:#fff;">
			<!-- HEADER-TOP START -->
			<div class="header-top hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="top-menu">
								<!-- Start Language -->
								
								<!-- End Language -->
								<!-- Start Currency -->
								
								<!-- End Currency -->
								
		
		<div id="list1" class="dropdown-check-list">We are Delivering at:
<?php
$currentloc=$helper->getcookieHelper("LOCATION");

 $pin=explode(',',$currentloc);
echo $pin[0]." ".$pin[1]." ".$pin[2]." ".$pin[3];
 $_SESSION['pin']=$pin[3];

if($currentloc==null){
?>





	  <div class="dropdown" style="margin-left: 128px; margin-top: -24px;">
      <button class=" btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="background-color: rgba(264,281,321,68.25); z-index: 1000;position: relative;">

<span >Patparganj,East Delhi,110091</span>
 <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 350px; height:136px; border-top-left-radius: 0px;position:absolute;margin-top: -1px; " >
     <div style="margin-top: 10px;">
<?php
if($_SESSION['myemail']== NULL OR !isset($_SESSION['myemail'])){
	$_SESSION['pin']=110091;
?>
	  <h6><b> &nbsp;&nbsp;PLEASE LOGIN OR REGISTER TO CHANGE YOUR LOCATION <BR>&nbsp;&nbsp;WITH SHOPPINGMONEY.</b></h6>

	  <?php } else{ ?>
	   <h6><b> CHANGE YOUR LOCATION <BR>&nbsp;&nbsp;WITH SHOPPINGMONEY.</b></h6>
<hr style="border:1px dotted #ccc;">
<center><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal3"><button type="button" class="btn btn-info" style="margin:-7px; border-radius:3px;">Change Location</button></a></center>
	  <?php } ?>
	 
	 </div>
    </ul>
  </div> 
	   
	   
	   
	
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
	   
<?php } else { ?>


	  <div class="dropdown" style="margin-left: 128px; margin-top: -24px;">
      <button class=" btn btn-default dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="background-color: rgba(264,281,321,68.25); z-index: 1000;position: relative;"><span ><?=$currentloc;?></span>
      <span class="caret"></span></button>
    <ul class="dropdown-menu" style="width: 350px; height:auto;padding: 12px 11px; border-top-left-radius: 0px;position:absolute;margin-top: -1px; " >
     <div style="margin-top: 10px;">
<?php
if($_SESSION['myemail']== NULL OR !isset($_SESSION['myemail'])){
?>
	   <h6><b>PLEASE LOGIN OR REGISTER TO CHANGE YOUR LOCATION WITH SHOPPINGMONEY.</b></h6>

	  <?php } else{ ?>
	   <h6><b> CHANGE YOUR LOCATION</b></h6>
<hr style="border:1px dotted #ccc;">
<center><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal3"><button type="button" class="btn btn-info" style="margin:-7px; border-radius:3px;">Change Location</button></a></center>
	  <?php } ?>
	 </div>
    </ul>
  </div> 
	   
	   
	   
	
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>



<!-- <span class="anchor"><?=$currentloc;?></span>
<ul class="items">
            <li><a href="#"></a> </li>
            <li><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal3">Change Location</a></li>
           
        </ul> -->
<?php } ?>
    </div>
    </div>



    <script type="text/javascript">

        var checkList = document.getElementById('list1');
        checkList.getElementsByClassName('anchor')[0].onclick = function (evt) {
            if (checkList.classList.contains('visible'))
                checkList.classList.remove('visible');
            else
                checkList.classList.add('visible');
        }

        checkList.onblur = function(evt) {
            checkList.classList.remove('visible');
        }
    </script>
							</div>
							<!-- Start Top-Link -->
							<?php if(isset($_SESSION['uname'])){?>
<div class="col-md-2" style="float:right;margin-top: 4px;width: auto;">
<div class="dropdown">
                  <button class="white-well dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="margin-top: 9px;"><i class="fa fa-user" aria-hidden="true"></i> <strong style="font-size:11px"><?php echo $_SESSION['uname'];?></strong><span class="caret"></span></button>
                  <ul class="dropdown-menu" style="right:-20px;left:initial;top:45px; z-index: 99999999;" role="menu" aria-labelledby="dropdownMenu1">
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=overview">Overview</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=wallet">Wallet</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=matrix">Matrix</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=genealogy">Genealogy</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=selfie">Selfie</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php?dash=refferal">Refer</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/panel.php">Profile</a></li>
                     <li role="presentation" class="divider"></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="mlm/logout.php">Log Out</a></li>
                  </ul>
               </div>
</div>
							<?php } ?>

							<div class="top-link">
								<ul class="link">
								<?php if(!isset($_SESSION['uname'])){?>
									<li><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2"><i class="fa fa-user"></i> My Account</a></li>
								<?php }
$cz=$dbAccess->selectsingleStmt("SELECT count(*) as cnt from wishlist where user_id = '".$_SESSION['myemail']."'");
if(isset($_SESSION['uname'])){?>
									<li><a href="mlm/panel.php?dash=wishlist"><i class="fa fa-heart"></i> Wish List (<?=$cz['cnt'];?>)</a></li>
								<?php }else{ ?>
								   <li><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2"><i class="fa fa-heart"></i> Wish List (<?=$cz['cnt'];?>)</a></li>
								<?php }?>
									
									<!--<li><a href="#"><i class="fa fa-share"></i> Checkout</a></li>
									<!--<li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>-->
<?php

if(isset($_SESSION['myemail']))
{
$link="mlm/panel.php?dash=order";
}
else
{
$link="http://shoppingmoney.in/beta/trackorder.php";
}

?>
									<li><a href="<?php echo $link;?>"><i class="fa fa-map-marker"></i> Track My Order</a></li>
								</ul>
							</div>
							<!-- End Top-Link -->
						</div>
					</div>
				</div>
			</div>
			<!-- HEADER-TOP END -->
			<!-- HEADER-MIDDLE START -->
			<div class="header-middle">
				<div class="container">
					<!-- Start Support-Client -->
					
						
					
					<!-- End Support-Client -->
					<!-- Start logo & Search Box -->
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="logo">
								<a href="index.php" title="Shoppingmoney"><img src="img/logo.png" alt="" style="max-width: 116%;margin-left: 10px;"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
		                    <div class="quick-access">
		                  
		                    	<div class="search-by-category">
		                    	<form action="shop.php" method="get">
		                    		<div class="search-container">
									<div class="arrv"><img src="img/arr.jpg"></div>
			                    		<select name="catid" id="mylovelycat">
			                    			<option class="all-cate">Select Categories</option>
<?php
$main=$dbAccess->selectData("select * from product_category where parent_id = '0' And status = '1'");
foreach($main as $t){
?>
											<optgroup  class="cate-item-head" label="<?=$t['category_name'];?>">
<?php
$main=$dbAccess->selectData("select * from product_category where parent_id = '".$t['id']."' And status = '1'");
foreach($main as $y){
?>
												<option class="cate-item-title" value="<?=$y['id'];?>"><?=$y['category_name'];?></option>
<?php } ?>
											</optgroup>
											<?php } ?>
											
			                    		</select>
		                    		</div>
		                    		<div class="header-search">
		                    			
			                    			<input type="text" name="search" id="search_code" placeholder="Your Money Your Shop" onkeyup="suggest_k();" autocomplete="off">

			                    			<button type="submit"><i class="fa fa-search"></i></button>


<input type="hidden" value="DELHI" id="menku"/>
<!--script-->

		     <style>
         


.suggestionsBox10 {
	position: absolute;
	left: 15px;
	top:10px;
        height:312px;
        overflow-y:scroll;
	margin: 26px 0px 0px 0px;
	width: 226px;
	padding:0px;
	background-color: #fff;
	border-top: 3px solid #ccc;
	color: #353535;
	z-index:99999;
margin: 46px 115px 31px 234px;
width: 443px;
overflow-x: inherit;
    box-shadow: 0px 1px 1px 1px #999;
}

.suggestionList10 ul li {
	    list-style: none;
    color: #7B7B7B;
    margin: 0px;
    padding: 6px 20px;
    text-align: left;
    font-size: 12px;
    
    cursor: pointer;
    width: 100%;
    text-decoration: none;
}
.suggestionList10 ul li:hover {
	text-decoration:none;
	color:#fff;
background:#26acce;
font-size:12px;
}

#suggestions10::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}

#suggestions10::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}

#suggestions10::-webkit-scrollbar-thumb
{
	background-color: #26acce;
}
::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
}
::-webkit-scrollbar
{
	width: 6px;
	background-color: #F5F5F5;
}
::-webkit-scrollbar-thumb
{
	background-color: #26acce;
}

</style>

<script>
								function suggest_k() {

var inputString= document.getElementById("search_code").value;
var dist=document.getElementById("mylovelycat").value;
//alert(dist);
//alert("searchlocal.php?queryString="+inputString+"&qd="+dist);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
$(document).ready(function(){
  $('#search_code').addClass('load');
});
document.getElementById("suggestions10").style.display='none';
    if (xhttp.readyState == 4 && xhttp.status == 200) {
//alert('yes');
                 
$(document).ready(function(){
 // $('#suggestions10').fadeIn();
		  // $('#suggestionsList10').html(xhttp.responseText);
		   $('#area_code').removeClass('load');
});
                    document.getElementById("suggestions10").style.display='block';
                    document.getElementById("suggestionsList10").innerHTML = xhttp.responseText;
                 

    }
 //else{
//alert('no');
		//document.getElementById("suggestions10").style.display='none';
	//}
  };
  xhttp.open("GET", "searchlocal.php?queryString="+inputString+"&qd="+dist, true);
  xhttp.send();
} 

function fill_r(thisArea) {
              document.getElementById("search_code").value = thisArea;
        
        $('#suggest_form').submit();
        setTimeout("$('#suggestions10').fadeOut();", 600);
    }

		
								</script>

<!--script-->
<!-- close suggest list start-->




		                    			
		                    		</div>
		                    		</form>
		                    	</div>
		                    	<div class="top-cart">
		                    		<ul>
		                    			<li>
<?php
if($_SESSION['myemail']==null || !isset($_SESSION['myemail'])){
	$crl=$dbAccess->countDtata("select * from cart where  system_id = '$system_id' And user_id = ''");
}else{
$crl=$dbAccess->countDtata("select * from cart where  user_id = '".$_SESSION['myemail']."'");
}
													if($crl > 0){
													?>
			                    			<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal">
<?php }else{ ?>
<a href="#" class="modal-view" data-toggle="modal" data-target="#productModal">
<?php } ?>
			                    				<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
			                    				<span class="cart-total">
			                    					<span class="cart-title">shopping cart</span>
													<?php
													if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
													$crl=$dbAccess->countDtata("select * from cart where  system_id = '$system_id' And user_id = ''");
													}else{
													$crl=$dbAccess->countDtata("select * from cart where  user_id = '".$_SESSION['myemail']."'");	
														
													}
													?>
				                    				
													<?php
													$sum = 0;
													if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
													$cnt=$dbAccess->selectData("select * from cart where system_id = '$system_id' And user_id = ''");
													}else{
													$cnt=$dbAccess->selectData("select * from cart where user_id = '".$_SESSION['myemail']."'");	
													}
													foreach($cnt as $t){
													$sum=$sum+$t['mrp'];
													}
													?>
													<?php
													if($sum > 0){
													?>
<span class="cart-item"><?=$crl;?>(Item)</span>
				                    				<!--<span class="top-cart-price">Rs.<?=$sum;?></span>-->
													<?php }else{ ?>
<span class="cart-item"><?=$sum;?></span>
													<span class="top-cart-price">(Item)</span>
													<?php } ?>
													
													
			                    				</span>
			                    			</a>
											
		                    			</li>
		                    		</ul>
<div class="suggestionsBox10" id="suggestions10" style="display: none;"> 

												<div class="suggestionList10" id="suggestionsList10"> &nbsp; </div>

		                    	</div>
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

							<a class="wallet" <?php if(isset($_SESSION['myemail'])){echo "href='mlm/panel.php?dash=wallet'";}else {echo "href='#' data-toggle='modal' data-target='#productModalwallet'";}?>>
							<img src="img/wallet.png" >Shoppingmoney Wallet</a>
								<nav>
									<ul id="iconmenu">

										<li  class=""><a href="sell.php">Sell on Shoppingmoney</a></li>
										<li class=""><a href="howitworkk.php">How it Works</a></li>
									
										
											
										</li>
										
										<li><a href="#" id="reghere" class="modal-view" data-toggle="modal" data-target="#productModalRegister">Register Now</a>
											
										</li>
										
										
										 <?php if(!isset($_SESSION['uname'])){?>
										<li><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal2">Login</a></li>
										 <?php } ?>
										 <li><a href="#" class="modal-view" data-toggle="modal" data-target="#productModalhelp">Help</a></li>
									
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

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?44qq0mfNJUoCcodvT6QntPDTHUc3mBQz";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->



