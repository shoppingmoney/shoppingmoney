<style>
<!-----  notification css start ------->
[class*="entypo-"]:before {font-family: 'entypo', sans-serif;font-size:0px;color:#555;}
.notification{position:relative;-webkit-perspective: 1000;-webkit-backface-visibility: hidden;}
.badge-num {
  box-sizing:border-box;
  font-family: 'Trebuchet MS', sans-serif;
  background: #ff0000;
  cursor:default;
  border-radius: 50%;
  color: #fff;
  font-weight:bold;
  font-size: 10px;
  height: 17px;
  letter-spacing:1px;
  line-height:1.55em;
  top:3px;
  font-weight:600;
  right:-2px;
  border:1px solid #fff;
  position: absolute;
  text-align: center;
  width: 17px;
 z-index:1 !important;
  box-shadow: 1px 1px 5px rgba(0,0,0, .2);
  animation: pulse 1.5s 1;
}
.badge-num:after {
  content: '';
  position: absolute;
  top:2px;
  left:2px;
  border:2px solid rgba(255,0,0,.6);
  opacity:0;
  border-radius: 50%;
  width:100%;
  height:100%;
  animation: sonar 1.5s 1;
}
@keyframes sonar { 
  0% {transform: scale(.9); opacity:1;}
  100% {transform: scale(2);opacity: 0;}
}
@keyframes pulse {
  0% {transform: scale(1);}
  20% {transform: scale(1.4); } 
  50% {transform: scale(.9);} 
  80% {transform: scale(1.2);} 
  100% {transform: scale(1);}
}

<!-----  notification css end ------->


#menu1 {
    color: #333;
    border-color: #8c8c8c;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
}

.textbtm{padding-top: 30px;color:#fff;}
            .bottombx{width:100%;height:96px;LINE-HEIGHT: 46PX;color:#26acce;margin-top:3px;border:1px solid #ccc;margin-left:0px;text-align:center;background-image:url('images/bottomban.jpg');}

            .contsmall {
                position:relative;
                float: left;margin-left: 3px;
            }
            .textbox:hover {
                opacity:1;
            }
            .text {
                padding-top: 60px;
                color:#26ACCE;
                padding-left:10px;
                padding-right:10px;
                cursor:pointer;
            }
            .textbox {
                width:214px;
                height:214px;
                position:absolute;
                top:0;
                left:0;
                opacity:0;

                background-color: rgba(0,0,0,0.8);
                text-align:center;
                color:#fff;
                -webkit-transition: all 0.7s ease;
                transition: all 0.7s ease;
            }

            .textbox1:hover {
                opacity:1;
            }

            .textbox1 {
                width:410px;
                height:214px;
                position:absolute;
                top:0;
                left:0;
                opacity:0;

                background-color: rgba(0,0,0,0.5);
                text-align:center;
                color:#fff;
                -webkit-transition: all 0.7s ease;
                transition: all 0.7s ease;
            }

.dropdown-check-list {
                display: inline-block;
                position: absolute;
                top: 11px;
               left: 29px;
            }
            .dropdown-check-list .anchor {
                position: relative;
                                                
                background:#fff;
                cursor: pointer;
                display: inline-block;
                   padding: 4px 44px 4px 9px;
                border: 1px solid #ccc;
            }
            .dropdown-check-list .anchor:after {
                position: absolute;
                content: "";
                border-left: 1px solid black;
                border-top: 1px solid black;
                padding: 3px;
                right: 22px;
                top: 34%;
                -moz-transform: rotate(-135deg);
                -ms-transform: rotate(-135deg);
                -o-transform: rotate(-135deg);
                -webkit-transform: rotate(-135deg);
                transform: rotate(-135deg);
            }
            .dropdown-check-list .anchor:active:after {
                right: 22px;
                top: 34%;
            }
            .dropdown-check-list ul.items {
                padding: 8px 31px;
                background: #FFFFFF;
                display: none;
                right: -1px;
                position: absolute;
                z-index:1;
                margin: 0;
                border: 1px solid #ccc;
                border-top: none;
            }
            .dropdown-check-list ul.items li {
                list-style: none;
            }
            .dropdown-check-list.visible .anchor {
                color: #474747;
                      display: inline;
            }
            .dropdown-check-list.visible .items {
                display: block;
margin-top:5px;
            }

</style>


<?php 
include '../vendor/lib/Connection.php';
include '../vendor/lib/DBQuery.php';
include '../vendor/lib/Helpers.php';
$connection = new Connection();
$helper = new Helpers();
$dbAccess = new DBQuery();
//session_start();
if(!isset($_SESSION['myemail']) || $_SESSION['myemail'] == null){
	//header("location: ../index.php");
echo"<script>window.location='../index.php';</script>";
}
$system_id=$helper->systemId();
//myarea,shopbegainnow
if(isset($_POST["shopbegainnow"])){
$helper->cookieHelper("LOCATION",$_POST['myarea']);
$go=$_SERVER['PHP_SELF'];
header("location:".$go."");
}
date_default_timezone_set('Asia/Kolkata');
include_once 'includes/headerfooterModel.php';
$mod = new headerfooterModel();
$myuserid = $mod->getuserid($_SESSION['myemail']);
$status=$mod->header($_SESSION['myemail']);
?>

<header>
 <link rel="shortcut icon" type="image/x-icon" href="../../img/favicon.png">
<header class="header-area" style="background:#fff;">
			<!-- HEADER-TOP START -->
			<div class="header-top hidden-xs">
				<div class="container" id="count">
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
if($currentloc==null){
?>
	  <div class="dropdown" style="margin-left: 128px; margin-top: -24px;">
      <button class=" btn btn-default dropdown-toggle" id="menu1" type="button" style="background-color: rgba(264,281,321,68.25); z-index: 1000;position: relative;">
	  <span style="color: black;" >Patparganj,East Delhi,110091</span>
      <span class="caret"></span></button>
    <!--<ul class="dropdown-menu" style="width: 350px; height:136px; border-top-left-radius: 0px;position:absolute;margin-top: -1px; " >
     <div style="margin-top: 10px;">
	  <h6><b> &nbsp;&nbsp;PLEASE LOGIN OR REGISTER TO CHANGE YOUR LOCATION <BR>&nbsp;&nbsp;WITH SHOPPINGMONEY.</b></h6>
	  
	 <hr style="border:1px dotted #ccc;">
	 
<center><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal3"><button type="button" class="btn btn-info" style="margin:-7px; border-radius:3px;">Change Location</button></a></center>
	 </div>
    </ul>-->
  </div> 
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>

<?php } else { ?>
 	  <div class="dropdown" style="margin-left: 128px; margin-top: -24px;">
      <button class=" btn btn-default dropdown-toggle" id="menu1" type="button" style="background-color: rgba(264,281,321,68.25); z-index: 1000;position: relative;">
	  <span style="color: black;"><?=$currentloc?></span>
      <span class="caret"></span></button>
    <!--<ul class="dropdown-menu" style="width: 350px; height:136px; border-top-left-radius: 0px;position:absolute;margin-top: -1px; " >
     <div style="margin-top: 10px;">
	  <h6><b> &nbsp;&nbsp;PLEASE LOGIN OR REGISTER TO CHANGE YOUR LOCATION <BR>&nbsp;&nbsp;WITH SHOPPINGMONEY.</b></h6>
	  
	 <hr style="border:1px dotted #ccc;">
	 
<center><a href="#" class="modal-view" data-toggle="modal" data-target="#productModal3"><button type="button" class="btn btn-info" style="margin:-7px; border-radius:3px;">Change Location</button></a></center>
	 </div>
    </ul>-->
  </div> 
<script>
$(document).ready(function(){
    $(".dropdown-toggle").dropdown();
});
</script>
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
<div class="col-md-2" style="float:right;margin-top: 4px;width: 181px;">
<div class="dropdown">
                  <button class="white-well dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> <strong style="font-size:11px"><?php echo $_SESSION['uname'];?></strong><span class="caret"></span></button>
                  <ul class="dropdown-menu" style="right:0;left:initial; z-index: 99999999;" role="menu" aria-labelledby="dropdownMenu1">
 <li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=matrix">Matrix</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=overview">Overview</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=wallet">Wallet</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=refferal">Refer</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=genealogy">Genealogy</a></li>
<li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php?dash=selfie">Selfie Wall</a></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="panel.php">Profile</a></li>


                     <li role="presentation" class="divider"></li>
                     <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
                  </ul>
               </div>
</div>
							<div class="top-link">
								<ul class="link">
								<li><a href="panel.php?dash=order"><i class="fa fa-map-marker"></i> Track My Order</a></li>
								<?php

$cz=$dbAccess->selectsingleStmt("SELECT count(*) as cnt from wishlist where user_id = '".$_SESSION['myemail']."'");
?>
									<li><a href="panel.php?dash=wishlist"><i class="fa fa-heart"></i> Wish List (<?=$cz['cnt'];?>)</a></li>
								
								</ul>
							</div>
							<!-- End Top-Link -->
						</div>
					</div>
				</div>
			</div>
			<!-- HEADER-TOP END -->
			<!-- HEADER-MIDDLE START -->
			<div class="header-middle" style="margin:16px 0;">
				<div class="container" id="count">
					<!-- Start Support-Client -->
					
						
					
					<!-- End Support-Client -->
					<!-- Start logo & Search Box -->
										<!-- Start logo & Search Box -->
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="logo">
								<a href="../index.php" title="Shoppingmoney"><img src="img/logo.png" alt="" style="max-width: 116%;margin-left: 10px;"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
		                    <div class="quick-access">
		                  
		                    	<div class="search-by-category">
		                    	<form action="../shop.php" method="get">
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
	left: -27px;
	top:17px;
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
width: 442px;
overflow-x: inherit;
}

.suggestionList10 ul li {
	list-style:none;
        color:#7B7B7B;
	margin: 0px;
	padding: 6px 20px;
        text-align:left;
        font-size:12px;
	cursor: pointer;
float:none;
}
.suggestionList10 ul li:hover {
	text-decoration:none;
	color:#7B7B7B;
font-size:12px;
background:#26acce;
color:#fff;
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
  xhttp.open("GET", "../searchlocal.php?queryString="+inputString+"&qd="+dist, true);
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
if($_SESSION['myemail']==null || $_SESSION['myemail']==''){
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
					<!-- End logo & Search Box -->
					
				</div> 
			</div>
			<!-- HEADER-MIDDLE END -->
			<!-- START MAINMENU-AREA -->
			<nav class="navbar navbar-default" role="navigation" id="topnabbar" style="max-height: 54px;">
         <div class="container" style="width:99%;">
            <div class="col-xs-3 visible-xs">
               <!-- Brand and toggle get grouped for better mobile display --><button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-head"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <!--Search Bar-->
            
            <!--/.search-bar--><!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse-head">

               <ul class="nav navbar-nav">

                  <li><a href="index.php"> Home</a></li>
                 <!-- <li><a href="deals.php"> Deals</a></li>-->
                 <!-- <li><a href="https://www.shoppingmoney.in.com/all-stores">All Stores</a></li>-->
                  <li><a href="howitworkk.php"> How it works</a></li>
                  
                <!--  <li>
                      <ul class="nav navbar-nav">
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <span class="glyphicon glyphicon-plus"></span> 
                                  Categories
                                  <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                  
                                  <li class="dropdown-submenu">
                                      <a href="#">Genealogy <b class="caret caret-right"></b></a>
                                      <ul class="dropdown-menu">
                                          <li>
                                              <a href="?page=redg">My Downliner</a>
                                          </li>
                                          <li>
                                              <a href="?page=tree">Tree View</a>
                                          </li>                                          
                                      </ul>
                                  </li>
                                 
                                  <li><a href="panel.php?page=transaction">Account Summery</a></li>
                                  <?php if($status==0){?>
                                 
                                  <li><a href="panel.php?page=kyc">Complete your KYC</a></li>
                                  <?php } ?>
                              </ul>
                          </li>
                      </ul>
                  </li>-->
<li><a href="business.php">Business Plan</a></li>
				  
				  <li><a href="panel.php?dash=support">Support</a></li>
				   <li>
<div class="notification" id="badge" style="z-index:1;">
     <a class="entypo-bell"></a>
</div>

 <ul class="nav navbar-nav">
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 
                                  Notification
                                  <b class="caret"></b>
                              </a>
 <?php if($status==0){?>
                              <ul class="dropdown-menu">
                                 
                                   <li class="divider"></li>
                                  <li><a href="?page=kyc">Complete your KYC</a></li>
                                  
                              </ul>
<?php } ?>
                          </li>
                      </ul>

</li>
                  
               </ul>
            </div>
<a href="panel.php?dash=wallet" class="wallet"><img src="img/wallet.png">Shoppingmoney Wallet</a>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
			<!-- END MAIN-MENU-AREA -->
			<!-- Start Mobile-menu -->
			
			<!-- End Mobile-menu -->
		</header>

      <!--/.Container--><!-- for deals --> 

   </header>

<style>
#filterboxt{position: absolute;display:none;width:250px;height:auto;padding:5px 10px;background:#fff;box-shadow: 0 4px 10px -4px rgba(0,0,0,0.75);border: 1px solid rgba(0,0,0,.15);border-bottom-right-radius: 4px;border-bottom-left-radius: 4px;}
</style>

<script type="text/javascript">
function toggle_div_fun(id){

 var divelement = document.getElementById(id);

if (divelement.style.display == 'none')
    divelement.style.display = 'block';
	
	else
	divelement.style.display = 'none';
}

</script>


<script type="text/javascript">
(function(d){
  var i = '<?php if($status==0){echo 1;}else{echo '';}?>';
  var badge = document.getElementById('badge');  
  var int = window.setInterval(function(){
    updateBadge(i);
  }, 3000); //Update the badge ever 5 seconds
  var badgeNum;    
  function updateBadge(alertNum){//To rerun the animation the element must be re-added back to the DOM
    	var badgeChild = badge.children[0];
			if(badgeChild.className==='badge-num')
        		badge.removeChild(badge.children[0]);
    	
    	badgeNum = document.createElement('div'); 
      badgeNum.setAttribute('class','badge-num');
	   	badgeNum.innerText = alertNum;
    	var insertedElement = badge.insertBefore(badgeNum,badge.firstChild); 
  }
})(document);
</script>






<!---------------------------------------------------popup kashif productModal3------------------------------------------------------->
  
		     <style>
         
 

.suggestionsBox9 {
	position: absolute;
	left: -2px;
	top:10px;
        height:312px;
        overflow-y:scroll;
	margin: 34px 0px 0px 0px;
	width: 447px;
	padding:0px;
	background-color: #fff;
	border-top: 3px solid #ccc;
	color: #353535;
	z-index:99999;
}

.suggestionList9 ul li {
	list-style:none;
        color:#7B7B7B;
	margin: 0px;
	padding: 6px;
        text-align:left;
        font-size:12px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList9 ul li:hover {
	text-decoration:underline;
	color:#7B7B7B;
font-size:12px;
}


/*---------------------------------------kashif--------------------*/
#productModal3 .modal-dialog {
    margin: 0% auto;
    max-width: 96%;
    min-height: 300px;
    padding: 20px;
    -webkit-transition: all 0.5s ease 0s;
    transition: all 0.5s ease 0s;
    width: 1020px;
}
.product-info1{
	
	float: left;
    padding-left: 0px;
    width: 100%;
    clear: both;
	border: 1px solid #E1E1E1;
	border-radius:2px;
	padding: 15px;
	    text-align: center;
		background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0, rgba(255, 255, 255, 0.44) 67%, rgba(153, 153, 153, 0.65) 100%);
}
#fa{
	
	background: #26acce none repeat scroll 0 0;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    height: 47px;
    line-height: 50px;
    position: absolute;
    right: -2px;
    top: -2px;
    transition: all 0.3s ease 0s;
    width: 55px;
}

.quick-access1 .search-by-category1 {
    border: 2px solid #bebebe;
    float: left;
    left: 15px;
    height: 48px;
    top: 10px;
    margin-right: 10px;
    position: relative;
}
.search-by-category1 .header-search1 input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: 0 none;
    color: #444;
    font-weight: 500;
    height: 44px;
    line-height: 26px;
    padding: 10px 65px 10px 15px;
    width: 497px;
  
    position: relative;
}

/*---------------------------------------------------------------------*/

</style>
		   
		    <div class="modal fade" id="productModal3" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<img src="img/logo.png">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="modal-product" >
								

								<div class="product-info1" id="chng_loc">
								
								<div class=" col-sm-12">
								<div class="row">
								<div class="col-sm-4" >
									<br><br><h5><b>LOREM IPSUM DOLAR</b></h5><hr>
									<h6><b>LOREM IPSUM</b></h6>
									<h6><b>LOREM IPSUME</b></h6>
									<h6><b>LOREM IPSUM</b></h6>
								</div>
								<div class="col-sm-8" style="border-left: 1px solid;">
		                    			<?php
if($_SESSION['myemail']==null){
$compu = "disabled";
}else{
$fafa=$dbAccess->selectSingleStmt("select * from firstimeregd where uemail = '".$_SESSION['myemail']."' ");
//echo "select * from firstimeregd where uemail = '".$_SESSION['myemail']."' ";
$fefe=$dbAccess->selectSingleStmt("select * from userdetails where linkid = '".$fafa['id']."' ");
//echo "select * from userdetails where linkid = '".$fafa['id']."' ";
$lover = $fefe['paddress'].",".$fefe['pstate'].",".$fefe['pin'];
$compu = "";
}
?>
								<form method="post">
								 <div class="col-sm-8 col-xs-12">
 <p style="text-align:left;">Please login to change your location</p>
                                    <div class="single-create">
                                       <p style="text-align:left;">State </p>
									   <?php
									     $dbAccess = new DBQuery();
										$qurey = $dbAccess->selectData("select * from state_district group by state");
										
									   ?>
                                       <select class="form-control" id="district" <?=$compu;?> name="district" required  style="height: 45px;">
                                      <?php	foreach($qurey as $nth){  ?><option value= "<?php echo $nth['state'];?>" >
									<?php echo $nth['state'];?>
										
										
										</option>
									<?php	}  ?>

                                       </select>
                                    </div>
                                 </div>
								 <div class="col-sm-8" >
								<p style="text-align:left;">Where do you want us to deliver your basket?</p>
								</div>
								 <div class="quick-access1">
								  
		                    	<div class="search-by-category1">
		                    		
		                    		<div class="header-search1">
									

										
			                    			<input type="text" name="myarea" id="area_code" onkeyup="suggest_f();" <?=$compu;?> value="<?=$lover;?>" placeholder="Search by area or Apartment or PIN Code">
			                    			<i class="fa fa-search" id="fa"></i>
											<div class="suggestionsBox9" id="suggestions9" style="display: none;"> 
												<div class="suggestionList9" id="suggestionsList9"> &nbsp; </div>
											</div>
											
		                    		
		                    		</div>
		                    	</div>
		                    	
		                    </div>
							 <div class="col-sm-8 col-xs-12" style="margin-top: 33px;">
                                    <div class="single-create">
							<button type="submit" id="suggest_form" name="shopbegainnow" class="btn btn-primary floatleft">Start Shopping</button>
						
											</div>
											</div>
								</form>
								</div>
								
							</div>
								</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
								<script>
								function suggest_f() {

var inputString= document.getElementById("area_code").value;
var dist=document.getElementById("district").value;
//alert("suggest_location.php?queryString="+inputString+"&qd="+dist);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
$(document).ready(function(){
  $('#area_code').addClass('load');
});

    if (xhttp.readyState == 4 && xhttp.status == 200) {

                  //var h="500px";
                 document.getElementById("chng_loc").style.height="500px";
$(document).ready(function(){
 // $('#suggestions9').fadeIn();
		  // $('#suggestionsList9').html(xhttp.responseText);
		   $('#area_code').removeClass('load');
});
                    document.getElementById("suggestions9").style.display='block';
                    document.getElementById("suggestionsList9").innerHTML = xhttp.responseText;

    }
  };
  xhttp.open("GET", "suggest_location.php?queryString="+inputString+"&qd="+dist, true);
  xhttp.send();
} 

function fill_f(thisArea,thisPin,thisState) {
              document.getElementById("area_code").value = thisArea+","+thisPin;
        
        $('#suggest_form').submit();
        setTimeout("$('#suggestions9').fadeOut();", 100);
       
       document.getElementById("chng_loc").style.height="275px";

    }

		
								</script>
								
									
								</div><!-- .product-info -->
							</div><!-- .modal-product -->
						</div><!-- .modal-body -->
					</div><!-- .modal-content -->
			    </div><!-- .modal-dialog -->
		   </div>
		   <!----------------------------------------------------------End--------------------------------------------------->

   