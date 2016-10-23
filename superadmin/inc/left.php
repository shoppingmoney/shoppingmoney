           <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>ShoppingMoney!</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick info -->
          <div class="profile">
            <div class="profile_pic">
              <img src="images/img.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?=$_SESSION['aName']?></h2>
            </div>
          </div>
          <!-- /menu prile quick info -->

          <br/>
		  <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
              <h3>General Menu</h3>
              <ul class="nav side-menu">
			  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

                    </li>
                <li><a><i class="fa fa-edit"></i> Catalog <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
 <li><a href="add-slider.php">Add Slider</a></li>
 <li><a href="list-slider.php">View &  Slider</a></li>
                    <li><a href="category.php">Category</a>
                    </li>
					 <li><a href="add_category.php">Add Category</a>
                    </li>
					 <li><a href="product_upload.php">Add Product</a>
                    </li>
					 <li><a href="csvuploader.php">Excel Product Upload</a>
                    </li>
					<li><a href="admin_pro.php">Products by Admin</a>
                    </li>
					<li><a href="order_product.php">Order List</a>
                    </li>
<li><a href="add_subcatview.php">Add Sub-Category View</a>
                    </li>
<li><a href="list_subcatview.php">List Sub-Category View</a>
                    </li>
                   
                  </ul>
                </li>
				<li><a><i class="fa fa-user"></i> User <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
				  <li class="active"><a>User List<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li class="sub_menu"><a href="user.php">All Users</a>
                          </li>
                          <li><a href="user.php?tp=new">Just registered</a>
                          </li>
                          <li><a href="user.php?tp=kyc">KYC completed</a>
                          </li>
						   <li><a href="user.php?tp=shop">Shopping Done</a>
                          </li>
                        </ul>
                      </li>
				   
 <li><a href="list_recharge.php">User Recharge</a></li>
                    </li>
<li><a href="list_selfie.php">Selfie</a>
                    </li>
                    <li><a href="redeem.php">Redeem</a>
                    </li>
                    <li><a href="warn.php">Warning</a>
                    </li>
                  </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> Vendor <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                    <li><a href="vendor.php">Vendors</a></li>
<li><a href="ticket_resolve.php">Request</a></li>
<li><a href="review_ctrl.php">Review Control</a></li>
<li><a href="moneyhistory_unit.php">Transaction</a>
                    </li>
                   
                  </ul>
                </li>
				<li><a><i class="fa fa-user"></i> Employee <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
				  <li><a href="add_employee.php">Add Employee</a>
                    </li>
                    <li><a href="employee.php">Employee List</a>
                    </li>
                  </ul>
                </li>
                
                <!-- faisal started from here  -->
				<li><a><i class="fa fa-edit"></i> CMS <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
			 <li><a href="add_brand.php">Add Brand</a>
                    </li>
                    <li><a href="list_brand.php">List Brand</a>
                    </li>
                    <li><a href="list_banner.php">List Banner</a></li>
                   <li><a href="add_latestproB.php">Add Latest Product Banner</a></li>
		<li><a href="list_latestproB.php">List Latest Product Banner</a></li>
		<li><a href="list_catbanner.php">List Category Banner</a></li>
<li><a href="add_rec.php">Add Recommended Products</a></li>
<li><a href="list_rec.php">List Recommended Products</a></li>
<li><a href="add_indexmeta.php">Add Index Meta</a></li>
<li><a href="list_indexmeta.php">List Index Meta</a></li>
                  </ul>
                </li>

				<li><a><i class="fa fa-users" aria-hidden="true"></i> FAQ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
				   <li><a href="add_faq.php">Add FAQ</a>
                    </li>
                    <li><a href="list_faq.php">List FAQ</a>
                    </li>
                    
                  </ul>
                </li>
				
				<li><a><i class="fa fa-users" aria-hidden="true"></i>All Footer CMS<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
				   <li><a href="add_cms.php">Add Cms</a>
                    </li>
                    <li><a href="list_cms.php">List Cms</a>
                    </li>
                   
                    
                  </ul>
                </li>
				

                
              </ul>
            </div>
           

          </div>
          <!-- /sidebar menu -->