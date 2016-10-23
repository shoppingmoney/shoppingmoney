<div class="col-md-3" style="position: absolute;
    z-index: 9999;"  id="inner_menu">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat">
	                            <div class="category-heading">
	                                <h2 style="display:none;">categories</h2>
	                            </div>
	                            <div class="category-menu-list" id="style-3" style="display: none;">
	                                <ul>
	                                  <li class="arrow-plus">
	                                  
										
										<?php
										$submenu = new DBQuery();
										$subsubmenu = new DBQuery();
										$menuctr = $dbAccess -> selectData("select * from product_category where status = '1' And parent_id = '0'");
										foreach($menuctr as $first){										
										?>
										<!-- Single menu start -->
	                                    						<li class="arrow-plus">

	                                        					<!--	<a href="product.php?product=<?=$first['id'];?>"> -->
																	<a href="#" style="cursor:context-menu;">
													<img src="superadmin/ico/<?=$first['icon']; ?>" style="font-size: 16px;padding: 0px 1px;"><?=$first['category_name'];?>
												</a>
											<!--  MEGA MENU START -->
											<div class="cat-left-drop-menu">
											 
	                                        
										<?php
										$submenuctr = $submenu -> selectData("select * from product_category where status = '1' And parent_id = '".$first['id']."'");
										foreach($submenuctr as $second){										
										?>
	                                       
	                                            <div class="cat-left-drop-menu-left">
	                                                <a class="menu-item-heading" href="product.php?product=<?=$second['id'];?>"><?=$second['category_name'];?></a>
	                                                <ul>
													<?php
										$subsubmenuctr = $subsubmenu -> selectData("select * from product_category where status = '1' And parent_id = '".$second['id']."'");
										foreach($subsubmenuctr as $third){										
										?>
													
	                                                    <li><a href="shop.php?product=<?=$third['id'];?>&catid=<?=$first['id'];?>&fethid=<?=$second['id'];?>"><?=$third['category_name'];?></a></li>
														<?php } ?>
	                                                </ul>
	                                            </div>
	                                       
											<?php } ?>
											</div>
											
					        <?php } ?>
											    <!-- Single menu end -->
	                                    </li>
	                                
																
	                                </ul>
	                            </div>
	                        </div>
	                    </div>
	                    <!-- END CATEGORY-MENU-LIST -->
	                </div>