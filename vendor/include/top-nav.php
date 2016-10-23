<?php
if (isset($_GET['Readid'])) {
    $dbAccess->updateData("update product_tbl set readonly = '3' where product_id = '" . $_GET['Readid'] . "'");
    header("location:index.php");
}
$user_data = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
?>
<div class="top_nav">

    <div class="nav_menu">
        <nav class="" role="navigation">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
<div class="title_left">
                                <h3 style="margin-left: 43px;font-weight:600;width: 200px;text-transform: uppercase;">Vendor Panel  </h3>
                            </div>

            </div>

            <ul class="nav navbar-nav navbar-right">

<li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.png" alt=""></a><?= $user_data['name']; ?>
                        <span class=" fa fa-angle-down"></span>
                    
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="profile.php">  Profile</a>
                        </li>

                        <li>
                            <a href="javascript:void(0);">Help</a>
                        </li>
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>


                <li class="">
                    <a href="order_list_all.php" class="dropdown-toggle info-number" data-toggle="" >
<?php

$roseangela=$dbAccess->selectSingleStmt("select * from register_vendor where email = '".$_SESSION['userEmail']."' ");
$blackwell = $roseangela['unique_user_id'];
$quality = $dbAccess->selectSingleStmt("select count(id) as ss from checkout_ord where vendor_id = '$blackwell' And status = '0'");


?>
 <i class="fa fa-envelope-o"></i>
<?php if($quality['ss'] > 0){ ?>
                                            <span class="badge bg-green">New</span>
<?php } ?>
                    </a>
                </li>

                <?php
                $read = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['userEmail'] . "' ");
                $vendorId = $read['unique_user_id'];
                $count = $dbAccess->countDtata("select * from product_tbl where readonly = '1' OR readonly = '0' ");
                ?>
                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>

                        <span class="badge bg-green"><?= $count; ?></span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <?php
                        $notify = $dbAccess->selectData("select * from product_tbl where readonly = '1' OR readonly = '0' ");
                        foreach ($notify as $tr) {
                            ?>
                            <li>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?Readid=<?= $tr['product_id']; ?>">
                                    <span class="image">
                                        <img src="images/4.jpg" alt="Profile Image" />
                                    </span>
                                    <span>
                                        <span><?= $tr['title']; ?></span>
                                    </span>
                                    <?php
                                    if ($tr['verify'] == '1') {
                                        $stat = "Approved";
                                    } else {
                                        $stat = "Disapproved";
                                    }
                                    ?>
                                    <span class="message">
                                        Product Status Has Been <?= $stat; ?> By Vendor
                                    </span>

                                </a>
                            </li>

                        <?php } ?>



                    </ul>
                </li>
               
            </ul>
        </nav>
    </div>

</div>