         <?php
		 include_once 'includes/config.php';
         $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		 ?>
<!--overview-->
<div class="tab-pane fade active in" id="order">
	<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, This section describes information associated with your shopping, order tracking and

cancellation.
		</p>
		<br>
			<div class="row" style="background:#fff;">        
				<div class="col-md-12" style="background:#fff;">
					<h3 class="headline hl-orange">My Order</h3>
					<?php
$order = $conf->fetchall("checkout WHERE user_email='{$_SESSION['myemail']}'");
foreach($order as $ord){
	$orderid = $ord->orderid;
	$oid = $ord->id;
	if($ord->status == 1){
		$stcolor="green";
		$status = "Delivered Successfully!";
	}else{
		$stcolor="red";
		$status="Order in process";
	}
	$prc = $conf->fetchSingle("checkout_ord WHERE checkout_id='$oid'","sum(mrp) as price, sum(qty) as cnt");
	$price = $prc->price;
	$num = $prc->cnt;
	$prod = $conf->fetchSingle("checkout_ord WHERE checkout_id='$oid'");
	$pro_id = $prod->product_id;
	//$status = $prod->status;
	//getting product detail
	$prod = $conf->fetchSingle("product_tbl WHERE product_id='$pro_id'");
	$pimg = $conf->single("product_img WHERE product_id='$pro_id'","image");
?>
					<div class="main">
						<div class="col-md-12" id="updtl">
							<div class="col-md-10">
								<span>Order ID: <?=$orderid?> (<?=$num?> Item)</span>
								<br>
									<span class="dti">Placed on <?=$ord->date?></span>
								</div>
								<div class="col-md-2">
									<a href="orddetail.php?order=<?=$oid;?>">
										<button class="detl">Detail</button>
									</a>
								</div>
							</div>
							<div class="list-group">

								<div class="col-md-12" id="cendtl">	  
									<div class="col-md-2">

										<img src="<?=$pimg?>">
											</div>

											<div class="col-md-7">
												<span class="prd">
													<p>
														<?=$prod->title?></p>
												</span>
											</div>	

											<div class="col-md-3" id="ird">
												<span class="badge1">
													<span class="ordrt">Order Total:</span> &nbsp; <span style="font-size: 15px;font-weight:600;">Rs.<?php echo number_format($price);?>
													</span>
												</span>
											</div>	

											<div class="col-md-12" style="background:#fff;">
												<div class="col-md-10" style="color:<?=$stcolor?>">
                                                 Status: <?=$status;?>
												</div>



												<div class="col-md-2">
													<button class="trackbtn">Track</button>
                                                                         <button class="trackbtn">Cancellation</button>
												</div>
											</div> 
										</div>
									</div>					 


								</div>
								<?php } ?>	
											</div>
										</div>
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
    font-size: 13px;
    margin-bottom: 20px;}

.detl{background:#349acc;
     padding:5px 12px;
     color:#fff;
     text-transform: uppercase;
     border-radius:3px;
    margin-top: 5px;
    width: 116px;
}

#updtl{border:1px solid #f3f3f3;padding:5px 2px;background: ghostwhite;margin-top: 30px;}

#cendtl{border:1px solid #f3f3f3;padding-top: 12px;}
.dti{font-size:11px;}
#ird{border:none;border-left: 1px solid #f1f1f1;height:93px;}
									</style>