<?php
$user_data = $dbAccess->selectSingleStmt("select * from register_vendor where email = '" . $_SESSION['auth_first'] . "' ");
?>
<div class="top_nav">

    <div class="nav_menu" style="background:#f7f7f7;">
	
        <nav class="" role="navigation">
		
		
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="images/img.png" alt=""><?= $user_data['name']; ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                       
                        
                        
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                        </li>
                    </ul>
                </li>

                

            </ul>
			<table width="33%"  height="auto">
		<tr><td><img src="images/logo.png" id="logohead"></td>
		<td><p class="line">Seller Hub<p></td>
		</tr>
		</table>
        </nav>
    </div>

</div>