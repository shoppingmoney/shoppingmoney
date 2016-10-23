<?php
session_start();
include_once 'includes/config.php';
$conf = new config();

if(!empty($_GET['page'])){
    $show = $_GET['page'];
    header("location:panel.php?page=$show");
    
    
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
	   if($prd->status == 1){
		$stcolor="green";
		$status = "Delivered Successfully!";
	}else{
		$stcolor="red";
		$status="Order in process";
	}
	  //getting product detail
	  $prod = $conf->fetchSingle("product_tbl WHERE product_id='$pro_id'");
	  $pimg = $conf->single("product_img WHERE product_id='$pro_id'","image");
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
                        
                        <img src="../vendor/productImg/<?=$pimg?>">
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



<div class="col-md-2">
<button class="trackbtn">Track</button>
</div>
</div> 
<div class="col-md-12" style="margin-bottom: 30px;">
<ol class="track-progress" data-steps="3">
   <li class="done">
     <span>PLACED</span>
   </li><!--
--><li class="done">
     <span>DISPATCHED</span>
   </li><!--
--><li>
     <span>DELIVERED</span>
   </li>
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
<p>BRAND EYES DISTRIBUTORS PRIVATE LIMITED.-SPARE2-VOI</p>

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

</body>
     
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
