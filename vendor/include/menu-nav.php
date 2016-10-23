<?php
$user_data = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
?>
<style>
    #menu_toggle{
        display: none;
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="images/logo.png" style="width: 218px;font-size: 20px;"> <span>SHOPPINGMONEY</span></a>
        </div>
        <div class="clearfix"></div>

        <!-- menu prile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <img src="images/img.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $user_data['name']; ?></h2>
            </div>
        </div>
        <!-- /menu prile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
               <br><br><br>
                <ul class="nav side-menu">
                    <li><a href="index.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-right"></span></a>

                    </li>
<li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile <span class="fa fa-chevron-right"></span></a>

                    </li>
                    <li><a><i class="fa fa-edit"></i> Catalog <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                            <li><a href="product_upload.php">Individual Products</a>
                            </li>
<li><a href="csvuploader.php">Upload Excel</a>
                            </li>
 <li><a href="product_list.php">List Of Products</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li><a><i class="fa fa-hand-paper-o" aria-hidden="true"></i> Order <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                            <li><a href="sales.php?order=NEW">Sales</a>
                            </li>
							 <li><a href="order_toShoppingmoney.php">Bill To Company</a>
                            </li>
                             <li><a href="order_toUser.php">Bill To User</a>
                            </li>
                 </ul>
                  </li>                                      
                    <li><a href="return.php"><i class="fa fa-reply" aria-hidden="true"></i> Return <span class="fa fa-chevron-right"></span></a></li>
    <li><a href="payment.php"><i class="fa fa-money" aria-hidden="true"></i> Payments <span class="fa fa-chevron-right"></span></a></li>
    <li><a href="advertise.php"><i class="fa fa-edit"></i> Advertisements <span class="fa fa-chevron-right"></span></a></li>
	 <li><a><i class="fa fa-envelope-o" aria-hidden="true"></i> Support <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu" style="display: none">
                            <li><a href="ticket.php?order=NEW">Generate Ticket</a>
                            </li>
							 <li><a href="list_request.php">Request List</a>
                            </li>
                 </ul>
                  </li>   
                </ul>
            </div>
            <div class="menu_section">
                
                <ul class="nav side-menu">

                    <!--<li><a href="profile.php"><i class="fa fa-windows"></i> User Profile <span class="fa fa-chevron-down"></span></a>
                    </li>-->
<!--<li><a href="sponsored.php">Request section</a></li>-->



                    <!--<li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true" style="font-size: 21px !important;"> </span></a>

                    </li>-->

                </ul>
            </div>

        </div>

    </div>
</div>
