<?php
 $banner1= $dbAccess->selectSingleStmt("select * from home_slider where id = 1 AND status = '1'");
 $banner2= $dbAccess->selectSingleStmt("select * from home_slider where id = 2 AND status = '1'");
 $banner3= $dbAccess->selectSingleStmt("select * from home_slider where id = 3 AND status = '1'");
?>

<div class="col-md-9" >
                		<!-- slider -->
						<div class="slider-area" >
							<div class="" >
							
							
														<div id="ensign-nivoslider" class="slides" >	
								<a href="cool.com" ><img src="superadmin/slider/<?php echo $banner1['image']?>" alt="ShoppingMoney" title="#slider-direction-1"/></a>
				 				<img src="superadmin/slider/<?php echo  $banner2['image']?>" alt="ShoppingMoney" title="#slider-direction-2"/>
								<img src="superadmin/slider/<?php echo $banner3['image']?>" alt="ShoppingMoney" title="#slider-direction-3"/>   
							</div>

<!-- direction 1 -->
								<div id="slider-direction-1" class="t-lfr slider-direction">
									
									
									<!-- layer 4 -->
									<div class="layer-1-4" style="padding:0;margin:0;width=:1010px;height:435px">
										<a href="<?php echo  $banner1['link']?>" class="title4" style="padding:0;margin:0;width=:1010px;height:435px">&nbsp</a>
									</div>
								</div>
								<!-- direction 2 -->
								<div id="slider-direction-2" class="slider-direction">
									
									
									<!-- layer 3 -->
									<div class="layer-2-3" style="padding:0;margin:0;width=:1010px;height:435px">
										<a href="<?php echo $banner2['link']?>" class="title3">&nbsp</a>
									</div>
								</div>
								<!-- direction 3 -->
								<div id="slider-direction-3" class="slider-direction">
									
									
									<!-- layer 4 -->
									<div class="layer-3-4" style="padding:0;margin:0;width=:1010px;height:435px">
										<a href="<?php echo $banner3['link']?>" class="title4">&nbsp</a>
									</div>
								</div>


								</div>
</a>
								
							</div>
						</div>
						<!-- slider end-->
	               


