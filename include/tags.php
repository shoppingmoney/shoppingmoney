<?php

$getData = $dbAccess->selectData("select * from  index_meta group by catid");
?>

<div class="header-area" style="background:#dadbdb;margin-top: 30px;">
		<div class="container">
		<div class="row">
			
			<?php foreach ($getData as $t) {
			 $rool=$dbAccess->selectSingleStmt("select * from product_category where id = '".$t['catid']."' ");
                           $getData1 = $dbAccess->selectData("select * from  index_meta where status='1' and catid='".$t['catid']."'");                            
			?>
			<div class="col-lg-12" style="color:#000;padding-top:10px">
		<div class="brandContainerFooter">
		 			<span class="brandLabelFooter">
		 				<a href="#" class="colr1"><?php echo $rool['category_name']; ?></a> 
		 			</span>
		 			<span class="brandValueFooter">
						<ul class="footerSubCategoriesUl">
	<?php foreach ($getData1 as $t1) {?>
							<li class="footerSubCategory">
									<a href="<?=$t1['link'];?>" class="colr"><?=$t1['title'];?></a>
									<span class="slash">/</span></li>
								<?php }?>	
						<!--	<li class="footerSubCategory">
									<a href="#" class="colr">Apple Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Lava Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Sony Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Nokia Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">LG Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Karbonn Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Spice Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Intex Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
								<a href="#" class="colr">Micromax Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Asus Mobiles</a>
									</li> -->
							</ul>
					</span>
					
	 			</div>
				</div>
			<?php } ?>
				
		<!--		<div class="col-lg-12" style="color:#000;">
		<div class="brandContainerFooter">
		 			<span class="brandLabelFooter">
		 				<a href="#" class="colr1">Tablets:</a> 
		 			</span>
		 			<span class="brandValueFooter">
						<ul class="footerSubCategoriesUl">
							<li class="footerSubCategory">
									<a href="#" class="colr">ipads</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Samsung Tablets</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Lava Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Sony Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Nokia Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">LG Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Karbonn Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Spice Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Intex Mobiles</a>
									<span class="slash">/</span></li>
							
							</ul>
					</span>
					
	 			</div>
				</div> -->
				
				
			<!--	<div class="col-lg-12" style="color:#000;">
		<div class="brandContainerFooter">
		 			<span class="brandLabelFooter">
		 				<a href="#" class="colr1">Computers:</a> 
		 			</span>
		 			<span class="brandValueFooter">
						<ul class="footerSubCategoriesUl">
							<li class="footerSubCategory">
									<a href="#" class="colr">Lenovo Laptops</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Acer Laptops</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Lava Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Sony Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Nokia Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">LG Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Karbonn Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Spice Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Intex Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
								<a href="#" class="colr">Micromax Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Asus Mobiles</a>
									</li>
							</ul>
					</span>
					
	 			</div>
				</div> -->
				
				
			<!--	<div class="col-lg-12" style="color:#000;">
		<div class="brandContainerFooter">
		 			<span class="brandLabelFooter">
		 				<a href="#" class="colr1">Camera:</a> 
		 			</span>
		 			<span class="brandValueFooter">
						<ul class="footerSubCategoriesUl">
							<li class="footerSubCategory">
									<a href="#" class="colr">DSLR Cameras</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Canon Cameras</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Lava Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Sony Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Nokia Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">LG Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Karbonn Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Spice Mobiles</a>
									<span class="slash">/</span></li>
							<li class="footerSubCategory">
									<a href="#" class="colr">Intex Mobiles</a>
									<span class="slash">/</span></li>
						
							</ul>
					</span>
					
	 			</div>
				</div> -->
				
				
				
				
				
				
				</div>
				
				<div class="row" style="margin-top:10px;margin-bottom:40px;">
				<div class="col-lg-12">
				<p style="text-align:justify;"><span>Who We Are -&nbsp;</span>Shoppingmoney.in is a business opportunity for every Indian. We do our daily shopping from various

retail store. Why not start at shoppingmoney.in where shopping and earning both will go hand in

hand.

Every day we expand a lot of money in purchasing various goods and services. But have we ever

imagine that these small expanses at the end of the month are huge. Better say “many a little makes

a mickle”. You may agree that our monthly budget increases with small purchases and these penny

makes no count for us but it makes the shopkeeper rich and prosperous.

If I ask you how much you spend per month for groceries items , every family head will say 5000 and

above that means 5000 is a average amount spend in purchasing groceries in Indian household. So

every month it’s compulsory to spend minimum this much amount to enjoy Dal- Roti.

Have you ever thought that our daily purchase can give a chance to earn a lot of loyalty and reward.

Yes it is possible at shoppingmoney.in just do your monthly shopping of 5000 with us, which you

generally do anywhere. And invite you friends to do the shopping as well.

Although in era of social media and internet we are having a lot of friends. just introduce your best

five friends with us and get your own business platform. These five people will bring business

consciousness in you as five elements of body earth, water, fire, air and ether brings consciousness

in human body. As your five business elements will start replicating every month within nine months

you will start enjoying financial rebirth as a new born baby, which comes out after a struggle of

nine months.

Come join us enjoy shopping, money and lot of rewards.

`Shoppingmoney.in is a shopping portal with a tagline ”shop to earn”. Thousands and thousands of

people are shopping daily; we cater the needs of every Indian across all boundaries. We realize that

every Indian has different choices and based on his/her choices we provide variety to choose. We deal in

all kind of Apparels, electronics , Groceries and many more.

At shopping money.in we believe that we can change the way business is done in Indian online market.

Our dedicated team is working hard each day to give a best shopping experience to our customers. We

have introduced RBMS (Referral Based Marketing System) in the area of shopping. Here shoppers has to

introduce friends to shop .Every individual can become an independent business partner with shopping

money. In with minimum shopping of worth 5000.</p>
				</div>
				</div>
				
			</div></div>