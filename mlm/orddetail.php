<?php
session_start();
include_once 'includes/config.php';
$conf = new config();

if(!empty($_GET['page'])){
    $show = $_GET['page'];
    header("location:panel.php?page=$show");
   }
   
   if(isset($_POST['submit'])){
	   
	   function send_msg($number,$txt)
  { 	    $ID = 'argecom';
			$Pwd = 'argecom';
			$PhNo = $number;
			$Text = $txt;
			$url="http://sms.proactivesms.in/sendsms.jsp?user=$ID&password=$Pwd&mobiles=$PhNo&sms=$Text&senderid =sender";

$ch = curl_init();
// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_NOBODY, 1);
// grab URL and pass it to the browser
curl_exec($ch);
// close cURL resource, and free up system resources
curl_close($ch);
	  
  }
  
   function send_mail($sub,$msg,$email)
   {
	   $headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ShoppingMoney<info@shoppingmoney.com>' . "\r\n";

$subject = $sub;
$message = $msg;
$email = $email;
$body = "
         <html>
		 <body>
		 <p>$message</p>
		 </body>
		 </html>
        ";
mail($email,$subject,$body,$headers);
   }
	   //print_r($_POST);
	   @extract($_POST);
	   $updateCheckout_ord=$conf->updateValue("checkout_ord set status='9' where id=".$checkout_ord_id);
	  
		   $table="cancellation";
		   $column="checkout_ord_id,cancel_date,reason,comment,refund_status,cancel_mode";
		   $value="'$checkout_ord_id',NOW(),'".mysqli_real_escape_string($conf->link,$reason)."','".mysqli_real_escape_string($conf->link,$comment)."','0','By User'";
		   $insertCancellation=$conf->insertValue($table,$column,$value);
		   $query1=$conf->fetchSingle("firstimeregd  inner join  checkout_ord  on firstimeregd.id=checkout_ord.user_id inner join register_vendor on checkout_ord.vendor_id=register_vendor.unique_user_id where checkout_ord.checkout_id='$checkout_ord_id' group by checkout_ord.orderid","firstimeregd.uemail,firstimeregd.ucontact,firstimeregd.ufirstname,firstimeregd.ulastname,checkout_ord.orderid,register_vendor.name,register_vendor.email,register_vendor.phone");
	        
			// msg to user 
			$cust_name=$query1->ufirstname." ".$query1->ulastname;
			$cust_msg = urlencode("Dear,$cust_name your item $protitle of Order Id: $query1->orderid is cancelled, amounting Rs. $proamount");
            $cust_no =  $query1->ucontact ;
			// msg to vendor
			$vendor_name=$query1->name;
			$vendor_msg = urlencode("Dear,$vendor_name  item $protitle of Order Id: $query1->orderid is cancelled by User, amounting Rs. $proamount");
            $vendor_no =  $query1->phone ;
			send_msg($cust_no,$cust_msg); // sending msg to user
			send_msg($vendor_no,$vendor_msg); // sending msg to vendor
			$shopping_msg = urlencode("Dear, Admin  item $protitle of Order Id: $query1->orderid, Vendor Name :$vendor_name is cancelled by User, amounting Rs. $proamount");
			//mail
			send_mail('Order Cancellation',urldecode($cust_msg),$query1->uemail); // to user
			send_mail('Order Cancellation',urldecode($vendor_msg),$query1->email); // to vendor
			send_mail('Order Cancellation',urldecode($shopping_msg),'info@shoppingmoney.com'); // to shopping money
			
			//$shopping_msg = urlencode("Dear, Admin  item $protitle of Order Id: $query1->orderid, Vendor :$vendor_name is cancelled by User, amounting Rs. $proamount");
           // $shopping_no = '9554388551';
			//send_msg($shopping_no,$shopping_msg); // sending msg to shoppingmoney
			
 

	 
		  echo "<script> alert('Successfully Canceled'); window.location='orddetail.php?order=$oid';</script>";
	   
   }
//print_r($_SESSION);
?>
<html>
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
	 <link href="assets/css/style-new.css" rel="stylesheet" media="screen">
  
     <script type="text/javascript" src="js/myjs.js"></script>
	 	<link rel="stylesheet" href="assets/lib/DataTables/media/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css">
		<link rel="stylesheet" href="assets/lib/DataTables/extensions/Scroller/css/dataTables.scroller.min.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	 <style>
	 #bxbg{
background: -webkit-linear-gradient(#EAEAEA,#fff,#E8E8E8) !important;
}
	 </style>

</head>
<body>
<?php include 'includes/header.php';?>
<!--<div class="tree" style="width: 5074px !important;">-->
    <div class="container" style="width: 82%;">
      <!--content*sidebar-->
   <div class="tab-pane fade active in" id="order">
           
            
            <br>
            <div class="row" style="background:#fff;">  
       <div class="col-md-12" style="background:#fff;">
 <h3 class="headline hl-orange">Order Details</h3>
 <?php
    $oid = $_GET['order'];
	$checkout = $conf->fetchSingle("checkout WHERE id='$oid'");
	$date = $checkout->date;
	$name = $checkout->fname." ".$checkout->lname;
	$address = $checkout->address.", ".$checkout->city.", ".$checkout->state.", ".$checkout->pincode;
	$mobile = $checkout->phone;
	$orderid = $checkout->orderid;
	
	$prc = $conf->fetchSingle("checkout_ord WHERE checkout_id='$oid'","sum(mrp) as price, sum(qty) as cnt, checkout_id, date");
	$price = number_format($prc->price);
	$num = $prc->cnt;
	
?>
 <div class="col-md-12" id="updtl">
<div class="col-md-12"><span>Order ID: <?=$orderid;?> (<?=$num;?> Item),&nbsp;</span>
<span class="dti">Placed on <?=$date;?></span></div>

</div>
                  <div class="list-group">
			
                   <div class="col-md-12" id="cendtl" style="background: #f9f9f9;">	  
                     <div class="col-md-5">
                        
                        Customer Information
                     <br>
                      Email: <?=$_SESSION['myemail'];?>
                     </div>
			
<div class="col-md-5">
<span class="prd">
<table width="100%" height="100" style="font-size: 13px;color:#232323;">
<tr>
<td>Total</td> <td>Rs <?=$price;?></td>
</tr>

<tr>
<td>Delivery Charges</td> <td>Free</td>
</tr>

<tr style="border-top:1px solid #ccc;width:95%;">
<td>You Pay</td> <td>Rs <?=$price;?></td>
</tr>
</table>
 </span>
</div>	

<div class="col-md-2" id="ird">
<span class="badge1"><span class="ordrt">Payment Method</span> &nbsp; </span>
</div>	


</div>	</div>	

       </div>
	   <?php
	   $prdinfo = $conf->fetchall("checkout_ord WHERE checkout_id='$oid'");
	   foreach($prdinfo as $prd){
	   $pro_id = $prd->product_id;
	   
			if($prd->status==0){
				$stcolor="green";
				$status = "Waiting For Approval";
			}else if($prd->status==1){
					$stcolor="green";
				$status = "Order Has Been Recieved";
			}else if($prd->status==2){
					$stcolor="green";
				$status = "Order Has Been Packed And Ready To Dispatched";
			}else if($prd->status==3){
					$stcolor="green";
				$status = "Order Has Been Dispatched";
			}else if($prd->status==4){
					$stcolor="green";
				$status = "Order Has Been Successfully Delivered";
			}else if($prd->status==9){
					$stcolor="red";
				$status = "Your Order Has Been Cancelled";
			}
			
	 /*  if($prd->status == 1){
		$stcolor="green";
		$status = "Delivered Successfully!";
	}else{
		$stcolor="red";
		$status="Order in process";
	} */
	  //getting product detail
	  $prod = $conf->fetchSingle("product_tbl WHERE product_id='$pro_id'");
	  $pimg = $conf->single("product_img WHERE product_id='$pro_id'","image");
	  //vendor detail
$vendordetail=$conf ->fetchSingle("register_vendor rv INNER JOIN vendor_details vd ON rv.email=vd.unique_user_id WHERE rv.unique_user_id='".$prd->vendor_id."'","rv.name,rv.phone,vd.comp_name,vd.pickup_pincode,vd.pickup_city,vd.pickup_state,vd.pickup_address");
	   ?>
	 
	    <!-- Start product detail -->
               <div class="col-md-12" style="background:#fff;">
<div class="main">
                  </div>
				  <div class="main">
<div class="col-md-12" id="updtl">
<div class="col-md-10"><span>Order ID: <?=$orderid;?> (<?=$prd->qty;?> Item)</span><br>
<span class="dti">Placed on <?=$date;?></span></div>
<div class="col-md-2"></div>
</div>
                  <div class="list-group">
			
                   <div class="col-md-12" id="cendtl">	  
                     <div class="col-md-2">
                        
                        <img src="<?=$pimg?>">
                     </div>
			
<div class="col-md-7">
<span class="prd"><p><?=$prod->title?></p></p> </span>
</div>	

<div class="col-md-3" id="ird">
<span class="badge1"><span class="ordrt">Order Total:</span> &nbsp; <span style="font-size: 15px;font-weight:600;">Rs <?php echo number_format($prd->mrp);?></span></span>
</div>	

<div class="col-md-12" style="background:#fff;">
<div class="col-md-10" style="color:<?=$stcolor;?>">
Status: <?=$status;?>
</div>

<?php
if($prd->status<3){ ?>
<div class="col-md-2">
<a href="#" onclick="checkout_ord(<?php echo $prd->id; ?>,'<?php echo $prod->title; ?>','<?php echo number_format($prd->mrp);?>');" data-target="#cancel_item" data-toggle="modal" class="trackbtn">Cancellation</a>
	   </div> <?php } else if($prd->status==9) {?> 
	   <button class="trackbtn">Cancelled</button>
	   <?php } else if($prd->status==4) {?>
	   <a href="#" onclick="return_ord(<?php echo $prd->id; ?>);" data-target="#return_item" data-toggle="modal" class="trackbtn">Return</a>
	   <?php } else if($prd->status==3){?>
	   <button class="trackbtn">In Transit</button>
	   <?php } ?>
</div> 
<div class="col-md-12" style="margin-bottom: 30px;">
<ol class="track-progress" data-steps="3">
   <?php if($prd->status==1 || $prd->status==2){ ?>
   <li class="done">
     <span>PLACED</span>
   </li>
   <?php } ?>
   <?php if($prd->status==3){ ?>
   <li class="done">
     <span>PLACED</span>
   </li>
    <li class="done">
     <span>DISPATCHED</span>
   </li>
   <?php } ?>
  <?php if($prd->status==4){ ?>
   <li class="done">
     <span>PLACED</span>
   </li>
    <li class="done">
     <span>DISPATCHED</span>
   </li>
   <li>
     <span>DELIVERED</span>
   </li>
   <?php } ?>
   
 </ol>
</div>

<div class="container">
<div class="row">
<div class="col-md-12" style="margin:0px auto; float:none;">
<div class="col-md-5" style="background: #f7f7f7;margin-right: 15px; padding-bottom: 5px; margin-bottom: 20px;">
<h5>Shipping Information</h5>
<p><?=$name;?></p>
<p><?=$address;?></p><br>
<p>Mobile No: <?=$mobile;?></p>
</div>
<div class="col-md-2"></div>

<div class="col-md-5" style="background: #f7f7f7;margin-right: 15px; padding-bottom: 5px; margin-bottom: 20px;">
<h5>Seller Information</h5>

<p><?php  echo $vendordetail->name." <br> ".$vendordetail->comp_name."<br>".$vendordetail->pickup_address."<br>".$vendordetail-> pickup_city ."<br>".$vendordetail->pickup_state ."<br>".$vendordetail->pickup_pincode ?></p>

</div>

</div></div></div>	</div>					 
                    
					 
                  </div>
               </div>
              

            </div>
	   <?php } ?>
			 <!-- End product detail -->
         </div>
         <!--/#overview-->
<style>
.prd{font-size: 14px;
    color: #232323;
    font-weight: 600;}

.ordrt{font-size:12px;color:#989898;font-weight:600}

.trackbtn{background: none;
    border: 1px solid #137eb2;
    color: #137eb2;
    border-radius: 2px;
    padding: 5px;
    text-align: center;
    width: 90px;
    margin-left: 20px;
    cursor: pointer;
    font-size: 15px;
    margin-bottom: 20px;}

.detl{background:#349acc;
     padding:5px 12px;
     color:#fff;
     text-transform: uppercase;
     border-radius:3px;
    margin-top: 5px;
    width: 116px;
}

#updtl{border:1px solid #f3f3f3;padding:5px 2px;background: whitesmoke;margin-top: 30px;}

#cendtl{border:1px solid #f3f3f3;padding-top: 12px;}
.dti{font-size:11px;}
#ird{border:none;border-left: 1px solid #f1f1f1;height:93px;}





.track-progress li.done + li > span:before {
  border-left-color: #349acc;
}

.track-progress li:first-child > span:after,
.track-progress li:first-child > span:before {
  display: none;
}

.track-progress li > span:after,
.track-progress li > span:before {
  content: "";
  display: block;
  width: 0px;
  height: 0px;

  position: absolute;
  top: 0;
  left: 0;

  border: solid transparent;
  border-left-color: #f0f0f0;
  border-width: 15px;
}

.track-progress li > span:after {
  top: -5px;
  z-index: 1;
  border-left-color: white;
  border-width: 20px;
}

.track-progress li > span:before {
  z-index: 2;
}


.track-progress li > span {
  display: block;

  color: #fff;
  font-weight: bold;
  text-transform: uppercase;
}

.track-progress li.done > span {
  color: #fff;
  background-color: #349acc;
}

.track-progress {
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.track-progress li {
  list-style-type: none;
  display: inline-block;

  position: relative;
  margin: 0;
  padding: 0;

  text-align: center;
  line-height: 30px;
  height: 30px;

  background-color: #349acc;
}


.track-progress[data-steps="3"] li { width: 33%; }
.track-progress[data-steps="4"] li { width: 25%; }
.track-progress[data-steps="5"] li { width: 20%; }
</style>
         <!--content-->
        
<div id="main_wrapper">
			<div class="page_content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							
								

							
						</div>
					</div>
				</div>
			</div>		
		</div>

</div>
</div>

 <?php include 'includes/footer.php';?>
 <div class="modal fade" id="cancel_item" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document" style="width:70% !important;">
                    <div class="modal-content" id="bxbg">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="col-md-6" id="logleft">
                            <div class="product-linee">
                                <center><img src="images/wallet.png" style="width: 70px;"><br><br>
                                    <p> <span class="tem">Shop to Earn </span></p></center>
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
                                                        <li role="presentation" class=" active"><a href="#display-login" role="tab" data-toggle="tab">Cancelation</a></li>
														 
                                                       
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



                                                                <form action="orddetail.php?order=<?=$oid;?>" method="post">
<input type="hidden" name="oid" id="oid" value="<?=$oid;?>"/>
<input type="hidden" name="checkout_ord_id" id="checkout_ord_id" value=""/>
<input type="hidden" name="protitle" id="protitle" value=""/> 
<input type="hidden" name="proamount" id="proamount" value=""/> 

                                                                    <div class="product-select product-type">
                                                                        <label>Why you want to cancel?</label>
                                                                       
																		<select name="reason" autocomplete="off" required style="width: 250px;" >
																		<option>I'm getting better price elsewhere </option>
																		<option>I'm getting better price in Snapdeal </option>
																		<option>I'll not be available to take delivery </option>
																		<option>I'll buy later </option>
																		<option>I'm getting a better product offline</option>
																		<option>Any other reason</option>
																		</select>
                                                                    </div>

                                                                    <div class="product-select product-type">
                                                                        <label>Comment</label>
                                                                        
                                                                          <textarea name="comment"  class="form-control"  placeholder="Comment.." rows="4" autocomplete="off" cols="50" style="width: 250px;" ></textarea>    

<br><br>




                                                                    </div><br>


                                                                    <div class="product-select product-type">
                                                                        <button type="submit" name="submit" id="big" class="toch-button toch-add-cart"> <i class="fa fa-sign-in" aria-hidden="true"></i> Submit</button><br>
                                                                    </div>

                                                                </form>
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
            </div>

</body>
<script>
function checkout_ord(id,title,amount){
	document.getElementById("checkout_ord_id").value=id;
	document.getElementById("protitle").value=title;
document.getElementById("proamount").value=amount;	
}
</script>
     
  <script src="js/vendor/jquery-1.11.3.min.js"></script>
      <!-- bootstrap JS
         ============================================ -->		
      <script src="js/bootstrap.min.js"></script>    	
    
  <script src="assets/lib/DataTables/media/js/jquery.dataTables.min.js"></script>
		<script src="assets/lib/DataTables/media/js/dataTables.bootstrap.js"></script>
		<script src="assets/lib/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="assets/lib/DataTables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
		
		<!-- datatables functions -->
		<script src="assets/js/apps/tisa_datatables.js"></script>
		

</html>
