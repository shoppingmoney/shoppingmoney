 <?php
		 include_once 'includes/config.php';
                 $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		
		 $amountr = $conf->fetchSingle("account WHERE mode='Referral Income' AND uid='$uid'","sum(cr) as credit");
		 $creditr = $amountr->credit;
		 $amounts = $conf->fetchSingle("account WHERE mode='Shopping Income' AND uid='$uid'","sum(cr) as credit");
		 $credits = $amounts->credit;
		 $amounttp = $conf->fetchSingle("account WHERE mode='Top Up' AND uid='$uid'","sum(cr) as credit");
		 $credittp = $amounttp->credit;
		 $amountg = $conf->fetchSingle("account WHERE mode='Layer Completion Income' AND uid='$uid'","sum(cr) as credit");
		 $creditg = $amountg->credit;
		 $amountd = $conf->fetchSingle("account WHERE uid='$uid'","sum(dr) as debit");
		 $credit=$creditr+$credits+$creditg+$credittp;
		 $debit=$amountd->debit;
		 $point=$credit - $debit;
		 $tree_num = $conf->fetchSingle("tree WHERE refrenceid='$uid'","count(*) as cnt");
		  if($tree_num->cnt < 5){
		 $debit = 0;
		 $credit = 0;
		 }
		 $sum=$credit - $debit
		 ?>
		 <?php
		 if(isset($_POST['submit1']))
		 {
			 if($bank != '' || $amount != '' || $trans_id != ''){
$dbAccess->insertData("redeem","uid,amount,bank,branch,trans_id,action,date","'$uid','$amount','$bank','$branch','$trans_id','1','$date'");
			 }

		 }
		 
			 
		 
		 ?>
<style>
#big{
padding:10px;
}
</style>
<!--wallet-->
         <div class="tab-pane fade active in " id="wallet">
            <br>
<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, This section describes information associated with all your financial transactions, top up and

redeem of shoppingmoney wallet.
		</p>
           
            <br>
            <div class="row" style="background-color:#fff;border: 1px solid #e7e7e7;">
               <div class="col-md-7">
                  <h3 class="headline hl-orange">ACCOUNT SUMMARY</h3>
                  <ul class="list-group">
				  <li class="list-group-item">
                        <span class="badge1"><?=number_format($point)?></span>
                       Total Point
                     </li>
                     <li class="no-style"><br></li>
					 <li class="list-group-item">
                        <span class="badge1"><?=number_format($creditr)?></span>
                        Referral Income
                     </li>
                     <li class="list-group-item">
                        <span class="badge1"><?=number_format($credittp)?></span>
                       Top Up
                     </li>
                     
                     <li class="list-group-item">
                        <span class="badge1"><?=number_format($credits)?></span>
                        Shopping Income
                     </li>
                     <li class="list-group-item">
                        <span class="badge1"><?php echo number_format($creditg);?></span>
                        Rewards 
                     </li>
                     <li class="no-style"><br></li>
					 <!--<li class="list-group-item">
                        <span class="badge1"><?php echo number_format($debit);?></span>
                        Total Debit Amount 
                     </li>-->
                     <li class="list-group-item">
                        <span class="badge1"><?php echo number_format($sum);?></span>
                        My Wallet Amount
                     </li>
                    
                     
                  </ul>


               </div>
               <div class="col-md-5">
<a href="#" class="modal-view" data-toggle="modal" data-target="#redeemModalq">
            <h3 class="headline hl-orange" id="rechargeW">Recharge wallet</h3></a>

                  <div class="panel panel-default text-center" style="    margin-bottom: 0px;">
<div class="panel-footers">
										<h3>Redeem Now</h3>
									</div>
                     <div class="panel-body">
<form id="rdmfrm" action="panel.php" method="post">
                        <input type="text" class="form-control" name="redeem" id ="rdamount" placeholder="Enter Redeem Amount" required style="width: 273px;" onkeypress="return isNumeric();"> 
<input type="hidden" name="totalRedeem" value="<?php if(isset($bal)){echo $bal;}?>">

<div class="product-select product-type" style="width:100%;">
																									<a onclick="redeemForm('<?php if(isset($bal)){echo $bal;}?>');" id="big" class="toch-button toch-add-cart">
																									 Submit</a>
																									</div> 
</form>           
                     </div>
                     <a href="#" class="modal-view" data-toggle="modal" data-target="#red">
									
								</a>
                  </div>
                  <br>
                  <p class="text-well"><strong>Please Note:</strong>
                     
                    You can't redeem your points in cash (Till 2000 points you can redeem

against your shopping.<br>

Maintain minimum balance of Rs.1000/ in your Wallet.<br>

Minimum Withdrawal Rs.1000/ only.

                  </p>
               </div>
			   
			   <div class="col-md-12">
								<div class="h3 headline hl-blue">
									<div class="pull-right table-filter">
										<a href="panel.php?page=transaction" class="tab-move">View All</a>
									</div>
									<span>Recent Transactions</span>
								</div>
								<div class="table-responsive" style="height:242px;overflow-y: scroll;">
									<table class="table table-striped table-hover">
										<thead>
											<tr>
												<th>
													<span class="glyphicon glyphicon-calendar"/> Date</th>
												<th>
													<span class="glyphicon glyphicon-shopping-cart"/> Mode</th>
												<th>Credit</th>
												<th>Debit</th>
												<th>
													<span class="glyphicon glyphicon-info-sign"/> Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
						$acdetail = $conf->fetchall("account WHERE uid='$uid' order by id desc LIMIT 5");
						foreach($acdetail as $ac){
							$date = $helper->dateFormate($ac->date);
						?>
											<tr>
												<td>
													<?=$date?></td>
												<td>
													<?=$ac->mode?></td>
												<td>
													<?=$ac->cr?></td>
												<td>
													<?=$ac->dr?></td>
												<td class='status_'>Ok</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								<!--/.table-responsive-->
							</div>
							<!---------redeeeeeeemmmmmmmmmmmmmmmmmmmm-------------------->

<div class="modal fade" id="red" tabindex="-1" role="dialog">
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

<!-------------------end----------------------->
			
         </div>
         <!--/#wallet-->

            </div>
			
         </div>
         <!--/#wallet-->
