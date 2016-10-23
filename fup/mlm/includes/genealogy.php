         <?php
		 include_once 'includes/config.php';
         $conf = new config();
		 $firstinfo = $conf->fetchSingle("firstimeregd WHERE uemail='{$_SESSION['myemail']}'");
		 $uid = $firstinfo->id;
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
            $arr2=array();
            for($i=0;$i < count($arr1);$i++)
            {
			  
                $check = $conf->fetchall("tree where uplinerid='".$arr1[$i]."'");
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
			// get completed layer
			$clayer = 0;
				if(count($arr1) >= 5){
				$clayer=1;
			}
			if(count($arr2) >= 25){
				$clayer=2;
			}
			if(count($arr3) >= 125){
				$clayer=3;
			}
			if(count($arr4) >= 625){
				$clayer=4;
			}
			if(count($arr5) >= 3125){
				$clayer=5;
			}
			if(count($arr6) >= 15625){
				$clayer=6;
			}
			if(count($arr7) >= 78125){
				$clayer=7;
			}
			if(count($arr8) >= 390625){
				$clayer=8;
			}
			if(count($arr9) >= 1953125){
				$clayer=9;
			}
		 
		 ?>
<!--overview-->
<div class="tab-pane fade active in" id="overview">
	<br>
		<p>Hey <strong class="text-primary">
				<?php echo $firstinfo->ufirstname." ".$firstinfo->ulastname; ?></strong>, This section describes information associated with all business associates, referral links and

associates from various sources.
		</p>
		<br>
			<div class="row" style="background: #fff;border: 1px solid #e7e7e7;">
				<div class="col-md-12">
					<h3 class="headline hl-orange">BUSINESS PERFORMANCE</h3>
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge1">
								<?=$total_user?>
							</span>
                       Total Business Associates
						</li>
						<li class="no-style">
							<br>
							</li>
							<!--<li class="list-group-item">
								<span class="badge1">
									<?=$total_user?>
								</span>
                        Joining Through Your Link
							</li>-->
							<li class="list-group-item">
								<span class="badge1">
									<?=$tree_num->cnt;?>
								</span>
                        Joining Through Your ID
							</li>
							<li class="list-group-item">
								<span class="badge1">
									<?php echo $layer;?>
								</span>
                        Current Layer
							</li>
							<li class="list-group-item">
								<span class="badge1">
									<?php echo $clayer;?>
								</span>
                        Layer Completed
							</li>
							<li class="no-style">
								<br>
								</li>
								
							</ul>
<a href="?page=redg"><button class="btn btn-info" id="geneobtn">My Downliner</button></a>
<a href="?page=tree"><button class="btn btn-info" id="geneobtn">Tree View</button></a>
						</div>
						
						</div>
						
						
					</div>
					<!--/#overview-->

					
					