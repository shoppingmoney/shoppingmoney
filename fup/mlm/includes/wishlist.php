         <?php
		 include_once 'config.php';
         $conf = new config();
		 if(isset($_GET['wdel']))
		 {
//echo"hello123 testing";
			 // delete from wishlist
			$conf->query("delete from wishlist where id='".$_GET['wdel']."'");
			 die();
		 }
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		 ?>
<!--overview-->
<div class="tab-pane fade active in" id="order">
	<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, you can find below a list of your recent transactions including the current cashback
               status, as well the total confirmed cashback and the amount paid out to you so far.
		</p>
		<br>
			<div class="row" style="background:#fff;">        
				<div class="col-md-12" style="background:#fff;">
					<h3 class="headline hl-orange">My Wish List</h3>
					<div class="main">
						<div class="col-md-12" id="updtl">
							
							<div class="table-responsive">
								<table class="table table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<td class="text-center">Image</td>
											<td class="text-left">Product Name</td>
											<td class="text-left">Model</td>
											<td class="text-right">Stock</td>
											<td class="text-right">Unit Price</td>
											<td class="text-right">Action</td>
										</tr>
									</thead>
									<tbody>
					<?php
$order = $conf->fetchall("wishlist WHERE user_id='{$_SESSION['myemail']}'");
foreach($order as $ord){
	$pro_id = $ord->product_id;
	$status = $prod->status;
	//getting product detail
	$prod = $conf->fetchSingle("product_tbl WHERE product_id='$pro_id'");
	$pimg = $conf->single("product_img WHERE product_id='$pro_id'","image");
				
															
				 if($prod->commission_type == 'percent'){
				$commission = ($prod->commission_type*$prod->landing_price)/100;
				}else{
				$commission = $prod->commission_type;
					}

					$atm = $prod->mrp;
					$amt = $prod->mrp-($prod->landing_price+$commission);
					$newatm = $prod->landing_price+$commission;
												
					?>
	

					
										<tr id="tr_<?=$ord->id;?>">
											<td class="text-center">
												<img src="<?=$pimg?>" alt="#">
											</td>
											<td class="text-left">
												<?=$prod->title?>
											</td>
											<td class="text-left"><?=$prod->ptoduct_type?></td>
											<td class="text-right">In Stock</td>
											<td class="text-right">
												<div class="price-box">
													<span class="price"><?php echo $newatm?></span>
												</div>
											</td>
											<td class="text-center">
												<button class="btn btn-primary" data-toggle="tooltip" title="" type="button" data-original-title="Add to Cart" style="float:none;">
													<i class="fa fa-shopping-cart"></i>
												</button>
<a href="javascript:void(0)" onclick="showdelmyy('<?=$ord->id;?>')" class="btn btn-danger" data-toggle="tooltip" title="" data-original-title="Remove">
													<i class="fa fa-times"></i>
												
											</td>
										</tr>
	<script>
function showdelmyy(str) {
	alert(str);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
document.getElementById("tr_"+str).innerHTML = xmlhttp.responseText;
                //document.getElementById("ff"+i).style.display = 'none';

            }
        }
        xmlhttp.open("GET", "includes/wishlist.php?wdel=" + str, true);
        xmlhttp.send();
    }

</script>
								<?php } ?>	
								</tbody>
								</table>
							</div>
							
							
							<div class="buttons clearfix pull-right" style="padding: 3px 31px;">
								<a href="#" class="btn btn-primary">Continue</a>
							</div>
								
							</div>
								</div>
											</div>
										</div>
									</div>
									<!--/#overview-->
									