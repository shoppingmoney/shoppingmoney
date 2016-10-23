         <?php
		 include_once 'includes/config.php';
         $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
		 // Request for cash redeem
		 if(isset($_POST["redeem"])){
			 $redeem = trim($_POST["redeem"]);
			 $amt =  trim($_POST["totalRedeem"]);
			 if($redeem < $amt && is_numeric($redeem)){
		     $column = "uid,amount,date,status";
             $value = "'$uid','$redeem',now(),'0'";
             $conf->insertValue("redeem", $column, $value);
			 echo "<script>alert('Your request is in process');window.location='panel.php';</script>";
			 }
		 }
		 // Ckecking number of member in tree by id reference
		 $tree_num = $conf->fetchSingle("tree WHERE refrenceid='$uid'","count(*) as cnt");
		 $amount = $conf->fetchSingle("account WHERE uid='$uid'","sum(dr) as debit, sum(cr) as credit");
		 $debit = $amount->debit;
		 $credit = $amount->credit;
		 $point=$bal=$credit - $debit;
		 if($tree_num->cnt < 5){
		 $debit = 0;
		 $credit = 0;
		 }
		 
		 
		 // for member counting
		 
		  if($uid==1 || $uid==2 || $uid==8){ // for company owner
					$tid = 1;
					$uid=8;
				}else{
					$tid = $conf->single("tree WHERE linkid='".$uid."'","id");
				}
		 $tree_num = $conf->fetchSingle("tree WHERE refrenceid='$uid'","count(*) as cnt");
		  if($tree_num->cnt < 5){
		   $debit = 0;
		   $credit = 0;
		 }
		 // for determining layer
            $check = $conf->fetchall("tree where uplinerid='$tid'");
            foreach($check as $chk)
            {
                $arr1[]=$chk->id;
            }
         //total memeber of layer 2  
		 //echo count($arr1)."<br/>";
		 $arr='';
            $arr2=array();
            for($i=0;$i < count($arr2);$i++)
            {
			  
                $check = $conf->fetchall("tree where uplinerid='".$arr2[$i]."'");
                foreach($check as $chk)
                {
                 $arr2[]=$chk->id;
                }
            }
          //total member of layer 3  
            $arr3=array();
            for($i=0;$i < count($arr2);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr2[$i]."'");
                foreach($check as $chk)
                {
                   $arr3[]=$chk->id;
                }
            }
            
            //total member of layer 4  
            $arr4=array();
            for($i=0;$i < count($arr3); $i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr3[$i]."'");
                foreach($check as $chk)
                {
                    $arr4[]=$chk->id;
                }
            }
            
            //total member of layer 5  
            $arr5=array();
            for($i=0;$i<count($arr4);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr4[$i]."'");
                foreach($check as $chk)
                {
                    $arr5[]=$chk->id;
                }
            }
            //total member of layer 6  
            $arr6=array();
            for($i=0;$i<count($arr5);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr5[$i]."'");
                foreach($check as $chk)
                {
                    $arr6[]=$chk->id;
                }
            }
            //layer 7
            $arr7=array();
            for($i=0;$i<count($arr6);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr6[$i]."'");
                foreach($check as $chk)
                {
                    $arr7[]=$chk->id;
                }
            }
            
            //layer 8
            $arr8=array();
            for($i=0;$i<count($arr7);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr7[$i]."'");
                foreach($check as $chk)
                {
                    $arr8[]=$chk->id;
                }
            }
            
            //layer 9
            $arr9=array();
            for($i=0;$i<count($arr8);$i++)
            {
                $check = $conf->fetchall("tree where uplinerid='".$arr8[$i]."'");
                foreach($check as $chk)
                {
                    $arr9[]=$chk->id;
                }
            }
			// finding layer
			$layer = 0;
			$arr1=array();
			if(!empty($arr1) || count($arr1) > 1){
				$layer++;
			}
			if(!empty($arr2) || count($arr2) > 1){
				$layer++;
			}
			if(!empty($arr3) || count($arr3) > 1){
				$layer++;
			}
			if(!empty($arr4) || count($arr4) > 1){
				$layer++;
			}
			if(!empty($arr5) || count($arr5) > 1){
				$layer++;
			}
			if(!empty($arr6) || count($arr6) > 1){
				$layer++;
			}
			if(!empty($arr7) || count($arr7) > 1){
				$layer++;
			}
			if(!empty($arr8) || count($arr8) > 1){
				$layer++;
			}
			if(!empty($arr9) || count($arr9) > 1){
				$layer++;
			}
			$merge = array_merge($arr1,$arr2,$arr3,$arr4,$arr5,$arr6,$arr7,$arr8,$arr9);
			$total_user = count($merge);

		 ?>
<!--overview-->
<div class="tab-pane fade active in" id="overview">
	<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, This section gives an overview of all your activities associated with business associates, wallet

and rewards.
		</p>
		<br>
			<div class="row" style="background: #fff;border: 1px solid #e7e7e7;">
				<div class="col-md-12">
					<h3 class="headline hl-orange">SUMMARY</h3>
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge1">
								<?=number_format($point);?>
							</span>
                        Total Point
						</li>
						<li class="no-style">
							<br>
							</li>
							<li class="list-group-item">
								<span class="badge1">
									<?=number_format($credit)?>
								</span>
                        Wallet amount
							</li>
							<li class="list-group-item">
								<span class="badge1">
									<?=$total_user?>
								</span>
                        Total business associates
							</li>
							<li class="list-group-item">
								<span class="badge1">
									<?php echo $tree_num->cnt;?>
								</span>
                        Direct associates
							</li>
							<li class="no-style">
								<br>
								</li>
								<li class="list-group-item">
									<span class="badge1">
										<?php echo $firstinfo->club;?></span>
                        Rewards Earned
								</li>

<li class="list-group-item">
									<span class="badge1">
										<?php echo "";?></span>
                        Upcoming rewards
								</li>

<li class="list-group-item">
									<span class="badge1">
									<?php echo (!empty($udetail)) ?$udetail->userid : "Shoppingmoney ID Not Available";?>
										</span>
                        Your shoppingmoney ID
								</li>
							</ul>
						</div>
						<!--<div class="col-md-12">
<h3 class="headline hl-orange">Account Balance</h3>
							<div class="panel panel-default text-center" style="margin-bottom: 0px;">
								<div class="panel-body">
									<?=$bal;?>               
								</div>
								<a href="#" class="modal-view" data-toggle="modal" data-target="#redeemModal">
									<div class="panel-footers">
										<h3>Redeem Now</h3>
									</div>
								</a>
							</div>
							<br>
								<p class="text-well">
									<strong>Please Note:</strong>
                     Minimum cash reserve should be Thousand Rupees
								</p>
							</div>-->
						</div>
						
						<div class="row">
							
							<!--/.col-md-12-->
						</div>
						<!--/.row-->
					</div>
					<!--/#overview-->

					
					