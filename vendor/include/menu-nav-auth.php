<?php
$user_data = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['auth_first'] . "' ");
?>
<style>
    #menu_toggle{
        display: none;
    }
</style>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img src="images/shopplog.png" class="logg"> <span>Shopping money</span></a>
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
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="authentication.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>

                    </li>



                </ul>
            </div>
            <div class="menu_section">

                <ul class="nav side-menu">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-off" aria-hidden="true" style="font-size: 21px !important;"> </span></a>

                    </li>

                </ul>
            </div>

        </div>

    </div>
</div>