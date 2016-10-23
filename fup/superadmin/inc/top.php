<?php
if (isset($_GET['Readid'])) {
    $dbAccess->updateData("update product_tbl set readonly = '3' where vendor_id = '" . $_GET['Readid'] . "'");
    header("location:vendor_product.php?userID=".$_GET['Readid']."&requestAct=14622");
}
?>
 <div class="top_nav">

        <div class="nav_menu">
          <nav class="" role="navigation">
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="images/img.png" alt=""><?=$_SESSION['aName'];?>
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                 
                 
                  <li>
                    <a href="javascript:;">Help</a>
                  </li>
                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </li>
                </ul>
              </li>
 <?php
                $count = $dbAccess->countDtata("select * from product_tbl where readonly = '2' ");
                ?>
              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green"><?=$count;?></span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <?php
                       $notify = $dbAccess->selectData("select * from product_tbl where readonly = '2' group by vendor_id ");
                       foreach($notify as $tr) {
                            ?>
                            <li>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?Readid=<?= $tr['vendor_id']; ?>">
                                    <span class="image">
                                        <img src="images/4.jpg" alt="Profile Image" />
                                    </span>
                                    <span>
                                        <span><?= $tr['vendor_id']; ?></span>
                                    </span>
                                   
                                    <span class="message">
                                       New product is ready for approval
                                    </span>

                                </a>
                            </li>

                        <?php  } ?>


                    </ul>
              </li>

            </ul>
          </nav>
        </div>

      </div>