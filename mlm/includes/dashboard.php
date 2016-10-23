<style>
.profimag{float: right;}
.mrq{padding: 11px 0px;
    background: #fff;}
</style>

<?php
include_once 'includes/config.php';
$conf = new config();

 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
 
if(isset($_POST['oldp'])){
	
	@extract($_POST);
	if(sha1($oldp) == $firstinfo->upassword){
		$sql = "firstimeregd SET upassword ='".sha1($newp)."' WHERE uemail='{$_SESSION['myemail']}'";
		
		$conf->updateValue($sql);
		
		echo "<script>alert('password changed ');</script>";
	}else{
		echo "<script>alert('Incorrect Old Password');window.location='panel.php?dash=password';</script>";
	}
}
//echo $firstinfo->id;
$udetail = $conf->fetchSingle("userdetails WHERE linkid = '".$firstinfo->id."'");
$bdetail = $conf->fetchSingle("bankdetails WHERE uid = '".$firstinfo->id."'");

?>
<div class="container-fluid strip-content">
   <div class="container" id="count">
      <div class="row">
         <div class="col-sm-12">
            <div class="profimag" style="width:16%;">
			<?php
			if(!empty($udetail)){
				if($udetail->personal_image == ""){
				$img = "img/propic.png";
				
			}else{
				$img = "upload/".$udetail->personal_image;
			}
			}
			
			?>
               <img src="img/propic.png" style="width:140px;float:right;    margin-right: 16%;">
            <div class="col-sm-12">
			
               <strong>My Id : <?php echo (!empty($udetail)) ?$udetail->userid : "Fill KYC to get Your ID";?></strong>
            </div>
            </div>
            <div class="media">
               <div class="media-body">
                  <h2>Welcome to your dashboard</h2>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs hidden-sm hidden-xs" id="acTab">
                      <?php if(isset($_GET['dash'])){$dash = $_GET['dash'];}else{$dash="overview";}?>
                     <li <?php  if($dash=="overview")echo "class='active'"?>><a href="panel.php?dash=overview">Overview</a></li>
                     <li <?php if($dash=="matrix")echo "class='active'"?>><a href="panel.php?dash=matrix">Matrix</a></li>
                     <li <?php if($dash=="profile")echo "class='active'"?>><a href="panel.php?dash=profile">My Profile</a></li>
                     <!--<li ><a href="#deals" data-toggle="tab">Business Performance</a></li>-->
                     <li <?php if($dash=="refferal")echo "class='active'"?>><a href="panel.php?dash=refferal" >Refer and Earn</a></li>
                     <li <?php if($dash=="wallet")echo "class='active'"?>><a href="panel.php?dash=wallet">My Wallet</a></li>
                     <li <?php if($dash=="genealogy")echo "class='active'"?>><a href="panel.php?dash=genealogy">Genealogy</a></li>
                     <li <?php if($dash=="order")echo "class='active'"?>><a href="panel.php?dash=order">My order</a></li>
                     
                     <li <?php if($dash=="selfie")echo "class='active'"?>><a href="panel.php?dash=selfie">Selfie Wall</a></li>
                   
                  </ul>
                  <select class="nav-sm visible-sm visible-xs" id="pacTab">
                     <option value="overview" selected>Overview</option>
                     <option value="activity" >Activity</option>
                     <option value="wallet" >My Wallet</option>
                     <option value="refer" >Refer and Earn</option>
                     <option value="support" >Support</option>
                     <option value="profile" >Profile</option>
                     <option value="deals" >Deals Inputer</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
      <!--/.row-->
   </div>
   <!--/.container-->
</div>
<div class="row">
   <!--content-->
   <div class="col-sm-8">
<p class="mrq">
               <marquee scrolldelay="100"> Thank you for showing interest with shopping.in . Please complete your shopping timely.</marquee>
            </p>
      <!-- Tab panes -->
      <?php 
	  
switch ($dash)
{
case "wishlist" :
    include 'includes/wishlist.php';
    break;
case "selfie" :
    include 'includes/selfie.php';
    break;
case "order" :
    include 'includes/order.php';
    break;
case "support" :
    include 'includes/support.php';
    break;
case "genealogy" :
    include 'includes/genealogy.php';
    break;
case "profile" :
    include 'includes/profile.php';
    break;
case "refferal" :
    include 'includes/refferal.php';
	break;
case "wallet" :
    include 'includes/wallet.php';
	break;
case "overview" :
    include 'includes/overview.php';
	break;
case "matrix" :
    include 'includes/matrix.php';
	break;
case "password" :
    include 'includes/updatePassword.php';
	break;	
default :
    include 'includes/overview.php';
}

	  ?>
   </div>
   <!--/.content--><!--sidebar-->
   <!--<div class="col-sm-4 hidden-xs">
      <div class="row">
         <div class="col-sm-12">
            <h3 class="headline hl-lblue">Important Notice</h3>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
           
            <div id="sliderw">
               <ul>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
                  <li>
                     <div class="sliderw-containerw">
                        <h4>Heading</h4>
                        <p>Cashback can be redeemed through Bank Transfer along with Mobile Bill Payments, DTH Recharges, Paytm Cash, MobiKwik Cash & Shopping Vouchers.
                        </p>
                     </div>
                  </li>
               </ul>
            </div>
           
         </div>
      </div>
   </div>-->
   <!--/.sidebar-->
</div>
<script>
function getData()
{  
    var request = checkAjax();
    var url = "ajaxpage.php?did="+1;
	request.onreadystatechange = callFun;    //function that u wanna create...
	request.open('GET',url,true);
	request.send(null);	
	
	function callFun()
	{
		if(request.readyState == 4)
		{
			document.getElementById("ajax_content").innerHTML = request.responseText;
		}
		else
		{
			document.getElementById("ajax_content").innerHTML = "<img src='img/loader.gif'>";
		}
	}
	
}

</script>
<style>
   /**** slider ****/
   #sliderw, ul
   {
   }
   #sliderw
   {
   margin: auto;
   overflow: hidden;
   padding: 20px;
   border: 1px solid rgba(0, 0, 0, 0.15);
   
   position: relative;
   width: 412px;
    height: 356px;
   background:#fff;
   }
   #sliderw li
   {
   float: left;
   position: relative;
   width: 578px;
   margin-left:-37px;
   display: inline-block;
   }
   #sliderw ul
   {
   list-style: none;
   position: absolute;
   left: 0px;
   top: 0px;
   width: 9000px;
   transition: left .3s linear;
   -moz-transition: left .3s linear;
   -o-transition: left .3s linear;
   -webkit-transition: left .3s linear;
   margin-left: -25px;
   font-family: century gothic;
   color: #666;
   }
   /*** Content ***/
   .sliderw-containerw
   {
   margin: 66px 111px;
   padding: 0;
   width:325px;
   border-bottom: 1px solid #ccc;
   }
   .sliderw-containerw h4
   {
   color: #0A7FAD;
   text-shadow: -1px 0px 0px rgba(0, 0, 0, 0.50);
   }
   .sliderw-containerw  p
   {
   margin: 10px 25px;
   font-weight: semi-bold;
   text-align: justify;
   }
   /*** target hooks ****/
   @-webkit-keyframes slide-animation {
   0% {left:0px; opacity:0;}
   2% {left:0px; opacity:1;}
   20% {left:0px; opacity:1;}
   22.5% {opacity:0.6;}
   25% {left:-550px; opacity:1;}
   45% {left:-550px; opacity:1;}
   47.5% {opacity:0.6;}
   50% {left:-1100px; opacity:1;}
   70% {left:-1100px; opacity:1;}
   100% {left:0px; opacity:0;}
   75% {left:-1650px; opacity:1;}
   95% {opacity:1;}
   98% {left:-1650px; opacity:0;} 
   100% {left:0px; opacity:0;}
   }
   #sliderw ul
   {
   -webkit-animation: slide-animation 25s infinite;
   }
   /* use to paused the content on mouse over */
   #sliderw ul:hover
   {
   -moz-animation-play-state: paused;
   -webkit-animation-play-state: paused;
   }
</style>